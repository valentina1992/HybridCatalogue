<?php
session_start();

require_once 'include/config.php';
require_once 'include/app.php';
require_once 'smarty/libs/Smarty.class.php';

$smarty = new Smarty;
$smarty->setCompileDir('smarty/application/templates_c');
$smarty->setCacheDir('smarty/application/cache');

/*
** Pagina di consultazione TEAM 
*/

$smarty->display('smarty/application/templates/main_content/about.tpl');
