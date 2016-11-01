<?php
session_start();
require_once 'include/googlePlay.php';
require_once 'include/app.php';
require_once 'smarty/libs/Smarty.class.php';

$insertError = null;

$smarty = new Smarty();
$smarty->setCompileDir('smarty/application/templates_c');
$smarty->setCacheDir('smarty/application/cache');

$smarty->assign('appName','');
$smarty->assign('appId','');
$smarty->assign('appDescription','');
$smarty->assign('appSeller','');

$smarty->assign('appImage','');
$smarty->assign('appScreenshot',array('','','','','',''));
$smarty->assign('appCategory','');
$smarty->assign('appVersion','');
$smarty->assign('appCreatedAt','');

$smarty->assign('appSourceCodeUrl','');
$smarty->assign('appSourceName','');
$smarty->assign('appsubmitterWebSite','');
$smarty->assign('appsubmitterEmail','');
$smarty->assign('appisSubmitterDeveloper','');
$smarty->assign('apptechnicalNotes','');

$smarty->assign('appSize','');
$smarty->assign('appRating','');
$smarty->assign('appPlatformVersion','');
$smarty->assign('appReviewsCount','');


$smarty->assign('iosUrl','');
$smarty->assign('androidUrl','');
$smarty->assign('windowsUrl','');

/*
** Questi campi se non sono inseriti danno errore
*/
$mandatoryFields = ['id', 'name', 'oneLiner', 'iconUrl'];
$smarty->assign('required',$mandatoryFields);

if(isset($_POST['fetchFromStore']) && $_POST['fetchFromStore'] == 1)
{
	if(!isset($_POST['id']) || strlen($_POST['id']) === 0)
	{
		// errore id deve essere settato
		$insertError = 'Specificare l\'id dell\'app nello store';
		$smarty->assign('insertError',$insertError);
		$smarty->display('smarty/application/templates/main_content/submit.tpl');
		exit(0);
	}else {
		$googlePlay = null;
			// riempiamo i campi
			try{
					$googlePlay = new googlePlayParser($_POST['id']);
			}catch(Exception $e){
				$insertError = 'Impossibile trovare app con questo id';
				$smarty->assign('insertError',$insertError);
				$smarty->display('smarty/application/templates/main_content/submit.tpl');
				exit(0);
			}
			$smarty->assign('appId',$_POST['id']);
			$smarty->assign('appName',$googlePlay->getName());
			$smarty->assign('appDescription',$googlePlay->getOneLiner());
			$smarty->assign('appSeller',$googlePlay->getSeller());

			$smarty->assign('appImage',$googlePlay->getImage());
			$smarty->assign('appScreenshot',$googlePlay->getScreenshots());
			$smarty->assign('appCategory',$googlePlay->getCategory());
			$smarty->assign('appVersion',$googlePlay->getVersion());
			$smarty->assign('appCreatedAt',$googlePlay->getCreatedAt());

			$smarty->assign('androidUrl',$googlePlay->getandroidUrl());

			$smarty->assign('appSize',$googlePlay->getSize());
			$smarty->assign('appRating',$googlePlay->getRating());
			$smarty->assign('appPlatformVersion', $googlePlay->getPlatformVersion());

			$insertError = 'Campi inserita Correttamente';
			$smarty->assign('insertError',$insertError);

			$smarty->display('smarty/application/templates/main_content/submit.tpl');
			exit(0);
	}
}else if (isset($_POST['insert']) && $_POST['insert'] == 1) {

	foreach($mandatoryFields as $k=> $v)
	{
		if(isset($_POST[$v]) && strlen($_POST[$v]) > 0)
			continue;

		$insertError = "Compilare i campi obbligatori";
		$smarty->assign('insertError',$insertError);
		$smarty->display('smarty/application/templates/main_content/submit.tpl');

		exit(0);
	}

	$_app = new App();

	$_app->version = $_POST['version'];
	$_app->id = $_POST['id'];
	$_app->oneLiner = $_POST['oneLiner'];
	$_app->screenshots = $_POST['screenshots'];
	$_app->category = $_POST['category'];
	$_app->seller = $_POST['seller'];
	$_app->iconUrl = $_POST['iconUrl'];
	$_app->createdAt = $_POST['createdAt'];
	$_app->name = $_POST['name'];
	$_app->sourceCodeUrl = $_POST['sourceCodeUrl'];
	$_app->submitterName = $_POST['submitterName'];
	$_app->submitterWebSite = $_POST['submitterWebSite'];
	$_app->submitterEmail = $_POST['submitterEmail'];
	$_app->isSubmitterDeveloper = $_POST['isSubmitterDeveloper'];
	$_app->technicalNotes = $_POST['technicalNotes'];

	$_app->size = $_POST['size'];
	$_app->rating = $_POST['rating'];
	$_app->platformVersion = $_POST['platformVersion'];
	$_app->reviewsCount = $_POST['reviewsCount'];


	$_app->iosUrl = $_POST['iosUrl'];
	$_app->androidUrl = $_POST['androidUrl'];
	$_app->windowsUrl = $_POST['windowsUrl'];

	/*
 	** Errori di controllo URL
	*/
	if(!Utils::checkUrl($_app->iosUrl))
	{
		$insertError = "iosUrl indirizzo errato o non raggiungibile!";
		$smarty->assign('insertError',$insertError);
		$smarty->display('smarty/application/templates/main_content/submit.tpl');
		exit(0);
	}

	if(!Utils::checkUrl($_app->androidUrl))
	{
		$insertError = "androidUrl indirizzo errato o non raggiungibile!";
		$smarty->assign('insertError',$insertError);
		$smarty->display('smarty/application/templates/main_content/submit.tpl');
		exit(0);
	}

	if(!Utils::checkUrl($_app->windowsUrl))
	{
		$insertError = "windowsUrl indirizzo errato o non raggiungibile!";
		$smarty->assign('insertError',$insertError);
		$smarty->display('smarty/application/templates/main_content/submit.tpl');
		exit(0);
	}

	if(!AppManager::store($_app))
	{
		$insertError = "Errore nell'inserimento della Applicazione";
		$smarty->assign('insertError',$insertError);
	}

	$insertError = "App inserita correttamente";
	$smarty->assign('insertError',$insertError);

	$smarty->display('smarty/application/templates/main_content/submit.tpl');
	exit(0);
}

$smarty->display('smarty/application/templates/main_content/submit.tpl');
