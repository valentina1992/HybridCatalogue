<?php
session_start();
error_reporting (E_ALL & ~E_NOTICE);

require_once 'include/app.php';
require_once 'smarty/libs/Smarty.class.php';

$smarty = new Smarty;
$smarty->setCompileDir('smarty/application/templates_c');
$smarty->setCacheDir('smarty/application/cache');

require_once 'gestione_errori.php';

$db = Database::getInstance();

$stmt = $db->query('SELECT a.*, s.iconUrl as thumb FROM App  as a LEFT JOIN StoreAppData as s ON a.idApp = s.App_idApp ORDER BY a.`createdAt`');
$smarty->assign('app',$stmt->fetchAll());

$stmt = $db->query('SELECT * FROM `App` WHERE staffPick>0 ORDER BY `createdAt` desc LIMIT 3');
$smarty->assign('appPick',$stmt->fetchAll());

$stmt = $db->query('SELECT * FROM `Store`');
$smarty->assign('store',$stmt->fetchAll());

if(isset($_GET['error']) && $_GET['error'] == 1)
{
  $smarty->assign('insertError', 'Nessuna applicazione trovata');
}
//va sempre alla fine
$smarty->display('smarty/application/templates/main_content/index.tpl');
