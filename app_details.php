<?php
session_start();

require_once 'include/app.php';
require_once 'smarty/libs/Smarty.class.php';

$smarty = new Smarty();
$smarty->setCompileDir('smarty/application/templates_c');
$smarty->setCacheDir('smarty/application/cache');

include 'gestione_errori.php';

$id = $_GET['id'];

$db = Database::getInstance();

$stmt = $db->prepare('SELECT * FROM StoreAppData WHERE idStoreAppData = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();

$smarty->assign('storeData', $stmt->fetch());

$stmt= $db->prepare('SELECT * FROM `App` WHERE `idApp` = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$smarty->assign('store',$stmt->fetch());

$stmt = $db->prepare('SELECT * FROM Screenshot WHERE App_idApp = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$smarty->assign('screenshots',$stmt->fetchAll());

$smarty->display('smarty/application/templates/main_content/app_details.tpl');
