<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'include/app.php';
require_once 'smarty/libs/Smarty.class.php';

$smarty = new Smarty;
$smarty->setCompileDir('smarty/application/templates_c');
$smarty->setCacheDir('smarty/application/cache');

include 'gestione_errori.php';

/*
** Funzione di ricerca, controlla se nella tabella app esiste il nome scritto
		nel campo ricerca
*/
$searchString = '%';

if(isset($_REQUEST['search']) && strlen($_REQUEST['search']) > 0)
	$searchString .= $_REQUEST['search'] . '%';

$db = Database::getInstance();

$stmt = $db->prepare('SELECT a.* , s.iconUrl
											from App AS a
											LEFT JOIN StoreAppData
											AS s ON a.idApp = s.idStoreAppData
											WHERE a.name like :search');

$stmt->bindValue(':search', $searchString);
$stmt->execute();

$result = $stmt->fetchAll();
if($result == NULL || count($result) == 0)
{
	$param = '';
	if(isset($_REQUEST['search']) && strlen($_REQUEST['search']) > 0)
	{
		$param = '?error=1';

	}

	/*
	**	Se non ha trovato niente va nella homepage principale
	*/
	header("Location: index.php$param");
	exit(0);
}

$smarty->assign('search',$result);

//va sempre alla fine
$smarty->display('smarty/application/templates/main_content/search.tpl');