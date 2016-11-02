<?php
/*
** session_start () crea una sessione
** o riprende quello attuale sulla base di un identificatore
** di sessione passata attraverso una richiesta GET o POST
*/
session_start();

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
** Pagina di consultazione TEAM
*/

/*
** Per indicare a quale pagina HTML dobbiamo visualizzare
*/
$smarty->display('smarty/application/templates/main_content/about.tpl');
