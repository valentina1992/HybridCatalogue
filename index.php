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

$stmt = $db->query('SELECT a.*, s.iconUrl
                    as thumb
                    FROM App
                    as a LEFT JOIN StoreAppData
                    as s ON a.idApp = s.App_idApp
                    ORDER BY a.`createdAt`');
$smarty->assign('app',$stmt->fetchAll());

/*
** Visualizzo l'errore del campo di ricerca se non ho
** trovato nessuna applicazione esistente con il nome
** scritto nel campo (file apps.php)
*/
if(isset($_GET['error']) && $_GET['error'] == 1)
{
  $smarty->assign('insertError', 'No applications found');
}

$smarty->display('smarty/application/templates/main_content/index.tpl');
