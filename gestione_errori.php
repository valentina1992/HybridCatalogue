<?php

/*
** Vanno dichiarate sempre all'inizio di un file
** per far capire che stiamo utilizzando un libreria smarty
*/
require_once 'smarty/libs/Smarty.class.php';

$smarty = new Smarty;
$smarty->setCompileDir('smarty/application/templates_c');
$smarty->setCacheDir('smarty/application/cache');

/*
** questi errori sono se l'app è inserita correttamente
** oppure è vuota
*/
$errore_app= true;
if(empty($_SESSION['errore_app'])){
	$errore_app = false;
}
else{
	$_SESSION['errore_app']="";
}
$smarty->assign('errore_app' , $errore_app);

/*
** questi errori sono se l'app è aggiunta correttamente 
** oppure è vuota
*/
$add_app= true;
if(empty($_SESSION['add_app'])){
	$add_app = false;
}
else{
	$_SESSION['add_app']="";
}
$smarty->assign('add_app' , $add_app);
