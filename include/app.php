<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

class Utils
{

	/*
	** Controlla se l'url di google play, ios e windows sono
	** corretti con una funzione di PHP 'validate_url'
	*/

	public static function checkUrl($_url){
		if($_url == NULL || $_url == '')
			return TRUE;

		if(filter_var($_url, FILTER_VALIDATE_URL) === FALSE)
			return FALSE;

		$handle = curl_init($_url);
		curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
		$response = curl_exec($handle);
		$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
		curl_close($handle);

		if($httpCode != 200)
			return FALSE;

		return TRUE;
	}
}

class App {

	/*
	** Questi sono i dati che servono per far visualizzare
	** la nostra applicazione e prenderci i dati con Web Scraping
	** tutti inizializzati a NULL o stringhe vuote
	*/

	public $data = NULL;
	public $id = NULL;
	public $name = '';
	public $oneLiner = '';
	public $category = '';
	public $createdAt = '';
	public $image = '';
	public $screenshots = array();
	public $iconUrl = '';
	public $description = '';
	public $latestRelease = '';
	public $rating = 0;
	public $reviewsCount = 0;
	public $size = 0;
	public $platformVersion = 0;
	public $version = 0;
	public $iosUrl = '';
	public $androidUrl = '';
	public $windowsUrl = '';
	public $sourceCodeUrl = '';
	public $submitterName = '';
	public $submitterWebSite = '';
	public $submitterEmail = '';
	public $isSubmitterDeveloper = '';
	public $technicalNotes = '';

}

class Store{}

	/*
	** Inizio Connessione al database con i seguenti paramentri
	** del db: con username, password, nome del db e la porta di
	** apache se è necessario, altrimenti potrebbe anche essere eliminata
	*/
class Database {
	public static $dsn = 'mysql:host=localhost;dbname=mydb;port=8889';
	public static $username = 'root';
	public static $password = 'root';
	private static $db = null;
	private function __construct(){}

	public static function getInstance() {
		if (self::$db === null) {
			try {
				self::$db = new PDO(self::$dsn, self::$username, self::$password, array());
				self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
				self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$db->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, FALSE);
				self::$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
				self::$db->query('SET CHARACTER SET utf8');
				self::$db->query('SET NAMES utf8');
			} catch(PDOException $e){
					echo "Connection Error: " . $e->getMessage();
				}
		}
		return self::$db;
	}
}
/*
** Fine Connessione al database
*/

/*
** Controlla se nello StoreAppData esiste un'applicazione
** con la versione vecchia e la aggiorna a quella corrente
*/
class AppManager {
	public static function Store(App $_app) {
		$db = Database::getInstance();
		$db->beginTransaction();
		try {
			if (AppManager::AppExitsByStoreId($_app->id , $_app->version)) {
				return false;
			}

			/*
			** Inserisce l'applicazione nel database nella tabella APP
			*/
			$stmt = $db->prepare('INSERT INTO App
													 (name,
														oneLiner,
														createdAt,
														seller,
														latestFetchAt,
														category,
														sourceCodeUrl,
														submitterName,
														submitterWebSite,
														submitterEmail,
														isSubmitterDeveloper,
														technicalNotes,
														iosUrl,
														androidUrl,
														windowsUrl)
								 VALUES (:name,
												 :oneLiner,
												 :createdAt,
												 :seller,
												 NOW(),
												 :category,
												 :sourceCodeUrl,
												 :submitterName,
												 :submitterWebSite,
												 :submitterEmail,
												 :isSubmitterDeveloper,
												 :technicalNotes,
											 	 :iosUrl,
											 	 :androidUrl,
												 :windowsUrl)');
			$stmt->bindValue(':name', $_app->name , PDO::PARAM_STR);
			$stmt->bindValue(':oneLiner', $_app->oneLiner , PDO::PARAM_STR);
			$stmt->bindValue(':createdAt', $_app->createdAt , PDO::PARAM_STR);
			$stmt->bindValue(':seller', $_app->seller , PDO::PARAM_STR);
			$stmt->bindValue(':sourceCodeUrl', $_app->sourceCodeUrl, PDO::PARAM_STR);
			$stmt->bindValue(':submitterName', $_app->submitterName, PDO::PARAM_STR);
			$stmt->bindValue(':submitterWebSite', $_app->submitterWebSite, PDO::PARAM_STR);
			$stmt->bindValue(':submitterEmail', $_app->submitterEmail, PDO::PARAM_STR);
			$stmt->bindValue(':isSubmitterDeveloper', $_app->isSubmitterDeveloper, PDO::PARAM_STR);
			$stmt->bindValue(':technicalNotes', $_app->technicalNotes, PDO::PARAM_STR);
			$stmt->bindValue(':category', $_app->category , PDO::PARAM_STR);
			$stmt->bindValue(':iosUrl', $_app->iosUrl , PDO::PARAM_STR);
			$stmt->bindValue(':androidUrl', $_app->androidUrl , PDO::PARAM_STR);
			$stmt->bindValue(':windowsUrl', $_app->windowsUrl , PDO::PARAM_STR);

			$stmt->execute();
			$appId = $db->lastInsertId();

			/*
			** Inserisce le immagini nel database nella tabella SCREENSHOT
			*/
			$stmt = $db->prepare('INSERT INTO `Screenshot` (`App_idApp`,`url` ) VALUES(:id, :url)');
			foreach($_app->screenshots as $url)
				{
				$stmt->bindValue(':id', $appId, PDO::PARAM_STR);
				$stmt->bindValue(':url', $url, PDO::PARAM_STR);
				$stmt->execute();
				}

			/*
			** Inserisce i dati o le informazioni nel database
			** nella tabella StoreAppData
			*/
			$stmt = $db->prepare('INSERT INTO `StoreAppData`
													(`idPlayStore`,
													`description`,
													`version`,
													`latestRelease`,
													`rating`,
													`reviewsCount`,
													`size`,
													`platformVersion`,
													`iconUrl`,
													`App_idApp`)
													VALUES (:store,
																	:description,
																	:version,
																	:latestRelease,
																	:rating,
																	:reviewsCount,
																	:size,
																	:platformVersion,
																	:iconUrl,
																	:id)');
			$stmt->bindValue(':store', $_app->id, PDO::PARAM_STR);
			$stmt->bindValue(':description', $_app->description , PDO::PARAM_STR);
			$stmt->bindValue(':version', $_app->version , PDO::PARAM_STR);
			$stmt->bindValue(':latestRelease', $_app->latestRelease , PDO::PARAM_STR);
			$stmt->bindValue(':rating', $_app->rating , PDO::PARAM_STR);
			$stmt->bindValue(':reviewsCount', $_app->reviewsCount , PDO::PARAM_STR);
			$stmt->bindValue(':size', $_app->size , PDO::PARAM_STR);
			$stmt->bindValue(':platformVersion', $_app->platformVersion , PDO::PARAM_STR);
			$stmt->bindValue(':iconUrl', $_app->iconUrl , PDO::PARAM_STR);
			$stmt->bindValue(':id', $appId, PDO::PARAM_INT);
			$stmt->execute();

			$db->commit();
			}


		catch(Exception $e){
			$db->rollBack();
		}

		return true;
		}

	/**
	 *  Questa funzione vede se l'applicazione esiste nel db tramite l'id chiave primaria
	 */
	public static function AppExitsById($_id) {
		$db = Database::getInstance();
		$stmt = $db->prepare('SELECT * FROM App WHERE idApp = :id');
		$stmt->bindValue(':id', $_id, PDO::PARAM_STR);
		$stmt->execute();
		$data = $stmt->fetchAll();
		if (count($data) > 0) return true;
		return false;
	}

	/*
	** Controlla se esiste un applicazione con store id $_id e versione $_version.
	*/
	public static function AppExitsByStoreId($_id, $_version = NULL) {
		$db = Database::getInstance();

		/*
		** Questa funzione vede se l'applicazione esiste nel db tramite l'id chiave primaria
		*/
		$stmt = $db->prepare('SELECT * FROM StoreAppData WHERE idPlayStore = :id');
		$stmt->bindValue(':id', $_id, PDO::PARAM_STR);
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_CLASS, App::class);

		/*
		** Se $_version è impostato su null allora Controlla se esiste almeno un occorrenza nel db.
		** con foreach scorre tante volte quante ne esistono di occorrenze
		** trim è una funzione di php che rimuove gli spazi
		*/
		if ($_version !== NULL) {
			foreach($data as $app) {
				if (trim($_version) == $app->version) {
					return true;
				}
			}
			return false;
		}
		/*
		** Se in $data è stato trovato qualcosa, quindi se è
		** > 0 allora return true altrimenti false
		*/
		if (count($data) > 0) return true;
		return false;
	}
}
