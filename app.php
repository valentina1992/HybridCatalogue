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
** si mette dopo la libreria smarty, altrimenti va in conflitto e
** non riuscirò a leggere gli errori
*/
include 'gestione_errori.php';

/*
** Connessione al database chiamando la classe Database
** scritta nel file app.php, con il metodo getInstance
** ho creato l'instanza in questo modo in quel file
*/
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
/*
** fetchAll restituisce un array contenente tutte le righe dei risultati della query
** assign è libreria smarty e per assegnare la variabile che andremo a prendere dalla
** pagina HTML
*/
$smarty->assign('app', $stmt->fetchAll());

/*
** Per indicare a quale pagina HTML dobbiamo visualizzare
*/
$smarty->display('smarty/application/templates/main_content/application.tpl');
