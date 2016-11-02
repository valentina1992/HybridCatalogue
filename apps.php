<?php
/*
** session_start () crea una sessione
** o riprende quello attuale sulla base di un identificatore
** di sessione passata attraverso una richiesta GET o POST
*/
session_start();

/*
** In caso di erore, non riesco a visualizzare la pagina
** mi riporterà gli errori con questo metodo
*/
error_reporting(E_ALL);
ini_set("display_errors", 1);

/*
** sto includendo il file app.php con la posizione per fare la connessione
** al database, senza non avrò nulla
*/
require_once 'include/app.php';
require_once 'smarty/libs/Smarty.class.php';

/*
** Vanno dichiarate sempre all'inizio di un file
** per far capire che stiamo utilizzando un libreria smarty
*/
$smarty = new Smarty();
$smarty->setCompileDir('smarty/application/templates_c');
$smarty->setCacheDir('smarty/application/cache');

/*
** si mette dopo la libreria smarty, altrimenti va in conflitto e
** non riuscirò a leggere gli errori
*/
include 'gestione_errori.php';

/*
** Questa condizione serve a far capire se nel campo ricerca
** è stato scritto qualcosa che esiste nel Database
*/
$searchString = '%';
if(isset($_REQUEST['search']) && strlen($_REQUEST['search']) > 0)
	$searchString .= $_REQUEST['search'] . '%';

/*
** Connessione al database chiamando la classe Database
** scritta nel file app.php, con il metodo getInstance
** ho creato l'instanza in questo modo in quel file
*/
$db = Database::getInstance();

/*
** Funzione di ricerca, in questa query controlla se nella tabella App
** esiste il nome scritto nel campo ricerca
*/
$stmt = $db->prepare('SELECT a.* , s.iconUrl
											from App AS a
											LEFT JOIN StoreAppData
											AS s ON a.idApp = s.idStoreAppData
											WHERE a.name like :search');
/*
** bindValue - associa un valore di un parametro in questo caso l'id
** Si lega un valore ad un corrispondente segnaposto di nome o punto
** di domanda nell'istruzione SQL che è stato utilizzato per
** preparare la dichiarazione.
*/
$stmt->bindValue(':search', $searchString);
/*
** Execute - Esegue una dichiarazione preparata
** Se la dichiarazione preparata include indicatori di parametro, sia:
** bindValue () deve essere chiamato per associare variabili
** o valori (rispettivamente) per gli indicatori di parametro.
** variabili vincolate passano il loro valore come input e ricevono il
** valore di uscita, se del caso, dei loro indicatori di parametro associati
*/
$stmt->execute();

/*
** fetchAll restituisce un array contenente tutte le righe dei risultati della query
*/
$result = $stmt->fetchAll();

/*
** Se la condizione if è null cioè non ha trovato nessun campo di testo scritto dall'utente
** uscirà nel display un messaggio di errore
*/
if($result == NULL || count($result) == 0)
{
	$param = '';
	if(isset($_REQUEST['search']) && strlen($_REQUEST['search']) > 0)
	{
		$param = '?error=1';

	}

	/*
	**	Se non ha trovato niente va nella homepage principale
	** con l'errore $param scritta sopra
	*/
	header("Location: index.php$param");
	exit(0);
}

/*
** result è una variabile scritta sopra con la fetchAll
** assign è libreria smarty e per assegnare la variabile che andremo a prendere dalla
** pagina HTML
*/
$smarty->assign('search',$result);

/*
** Per indicare a quale pagina HTML dobbiamo visualizzare
*/
$smarty->display('smarty/application/templates/main_content/search.tpl');
