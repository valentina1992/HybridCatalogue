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
** ricevo  l'id con la get, inizializzata per avere un codice pulito
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
** Questa query prepara se nella tabella App
** esiste nel db tramite l'id chiave primaria
*/
$stmt= $db->prepare('SELECT * FROM `App` WHERE `idApp` = :id');

/*
** bindValue - associa un valore di un parametro in questo caso l'id
** Si lega un valore ad un corrispondente segnaposto di nome o punto
** di domanda nell'istruzione SQL che è stato utilizzato per
** preparare la dichiarazione.
*/
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

/*
** Execute - Esegue una dichiarazione preparata
** Se la dichiarazione preparata include indicatori di parametro, sia:
** bindValue () deve essere chiamato per associare variabili
** o valori (rispettivamente) per gli indicatori di parametro.
** variabili vincolate passano il loro valore come input e ricevono il
** valore di uscita, se del caso, dei loro indicatori di parametro associati
*/
$stmt->execute();

/*
** fetch contiene tutte le righe dei risultati dalla query
** assign è libreria smarty
*/
$smarty->assign('store',$stmt->fetch());

/*
** Questa query vede se nella tabella Screenshots
** esiste nel db tramite l'App_idApp in relazione
*+ con la tabella App
*/
$stmt = $db->prepare('SELECT * FROM Screenshot WHERE App_idApp = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();

/*
** fetchAll restituisce un array contenente tutte le righe dei risultati della query
** assign è libreria smarty
*/
$smarty->assign('screenshots',$stmt->fetchAll());

/*
** Per indicare a quale pagina HTML dobbiamo visualizzare
*/
$smarty->display('smarty/application/templates/main_content/app_details.tpl');
