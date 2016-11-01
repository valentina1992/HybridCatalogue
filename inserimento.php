<?php
session_start();
require_once 'include/googlePlay.php';
require_once 'include/app.php';
require_once 'smarty/libs/Smarty.class.php';

$insertError = null;

$smarty = new Smarty();
$smarty->setCompileDir('smarty/application/templates_c');
$smarty->setCacheDir('smarty/application/cache');


if(!isset($_POST['id']) || strlen($_POST['id']) == 0)
{
  $insertError =  'Specificare un id di playstore';
}
else
{
  $appManager = new AppManager();

  if(  $appManager->InsertAppFromGooglePlay($_POST['id']))
  {
    $insertError =  'Applicazione aggiunta';

  }else{
    $insertError =  'Applicazione gi&agrave; presente';
  }

}

$smarty->assign('insertError',$insertError);
//va sempre alla fine
$smarty->display('smarty/application/templates/main_content/inserimento.tpl');
