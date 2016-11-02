<?php
session_start();

require_once 'include/app.php';
require_once 'smarty/libs/Smarty.class.php';

$smarty = new Smarty();
$smarty->setCompileDir('smarty/application/templates_c');
$smarty->setCacheDir('smarty/application/cache');

include 'gestione_errori.php';

/*
** Prendo l'id con la get
*/

$id = $_GET['id'];

/*
** Connessione al database chiamando la classe Database
** scritta nel file app.php, con il metodo getInstance
** ho creato l'instanza in questo modo in quel file
*/
$db = Database::getInstance();

/*
** Questa query vede se nella tabella StoreAppData
** esiste nel db tramite l'id chiave primaria
*/
$stmt = $db->prepare('SELECT * FROM StoreAppData WHERE idStoreAppData = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$smarty->assign('storeData', $stmt->fetch());

/*
** Questa query vede se nella tabella App
** esiste nel db tramite l'id chiave primaria
*/
$stmt= $db->prepare('SELECT * FROM `App` WHERE `idApp` = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$smarty->assign('store',$stmt->fetch());

/*
** Questa query vede se nella tabella Screenshots
** esiste nel db tramite l'App_idApp in relazione
*+ con la tabella App
*/
$stmt = $db->prepare('SELECT * FROM Screenshot WHERE App_idApp = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$smarty->assign('screenshots',$stmt->fetchAll());

$smarty->display('smarty/application/templates/main_content/app_details.tpl');
