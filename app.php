<?php
session_start();

require_once 'include/app.php';
require_once 'smarty/libs/Smarty.class.php';

$smarty = new Smarty();
$smarty->setCompileDir('smarty/application/templates_c');
$smarty->setCacheDir('smarty/application/cache');

include 'gestione_errori.php';

$db = Database::getInstance();

/*
** in questa query faccio un integrazione tra tabelle App e StoreAppData
** facendo riferimento all'id chiave primaria ordinato in base alla data 'createdAt'
*/
$stmt = $db->query('SELECT a.* , s.iconUrl
                    from App
                    AS a
                    LEFT JOIN StoreAppData
                    AS s
                    ON a.idApp = s.idStoreAppData
                    ORDER BY a.createdAt');
$smarty->assign('app', $stmt->fetchAll());

$smarty->display('smarty/application/templates/main_content/application.tpl');
