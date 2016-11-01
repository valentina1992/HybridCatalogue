<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-12-18 17:41:25
         compiled from "smarty/application/templates/main_content/app_details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6605799856742839b137f4-92093568%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d78a4a32f7872100bf2308c13a694d1bf4401af' => 
    array (
      0 => 'smarty/application/templates/main_content/app_details.tpl',
      1 => 1450456883,
      2 => 'file',
    ),
    '401f360fb2eb1f6b55783b21966b5b7bf23bdebf' => 
    array (
      0 => '/Applications/MAMP/htdocs/tesi/smarty/application/templates/base.tpl',
      1 => 1450455975,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6605799856742839b137f4-92093568',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_56742839c2f458_97454082',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56742839c2f458_97454082')) {function content_56742839c2f458_97454082($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.css" type="text/css"
	media="screen" />

</head>

<body>
	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<div class="container-fluid">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse font-header"
					id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Logo<span class="sr-only">(current)</span>
						</a>
						<li class="active"><a href="#">App <span class="sr-only">(current)</span>
						</a>
						</li>
						<li><a href="about.php">About Us</a>
						</li>
						<li><a href="submit.php">Submit</a>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
		</div>
	</nav>



<div class="col-xs-7">
   <div class="media">
      <div class="media-left"> 
         <a href=""> <img class="media-object img-rounded" src="" alt=""> </a> 
      </div>
      <div class="media-body">
         <h2 class="media-heading">Name APP</h2>
         <a href="#"><button type="button" class="btn btn-link"></button></a>
         <h2>Data creazione APP</h2>
         <a href=""><button type="button" class="btn btn-link">Fluxedo</button></a>
         <a href=""><button type="button" class="btn btn-link">Products</button></a>
      </div>
   </div>
</div>
<hr>
<p>The app is compatible with some of your devices:</p>
<a href="#"><img src = "https://cdn1.iconfinder.com/data/icons/app-stores-2/128/Google_Play_3.png"></a>
<a href="#"><img src = "http://ec.europa.eu/research/conferences/2015/era-of-innovation/images/logos/app_ios.png"></a>
<a href="#"><img src = "https://cdn3.iconfinder.com/data/icons/picons-social/57/72-windows8-128.png"></a>
</div>
<hr>
<h1>Screenshot</h1>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
   <a href ="#">
      <!--immagine screenshot-->
      <img src="#" alt="thumb" style="left: -200%; height: 500px; overflow: hidden;">
   </a>
</div>
<div class = "row">
   <div class = "container">
      <div class="media-body">app</div>
      <hr>
      <h3>Description of The App :</h3>
      <div>description</div>
   </div>
</div>
<hr>
<div class="container well">
   <div class="row">
      <div class="col-xs-6 col-sm-6 col-lg-4 col-md-4">
         <h3>More Information:</h3>
         <ul>
            <li>data creata</li>
            <li>Current Version:</li>
            <li>Update: </li>
            <li>Platform Version:</li>
         </ul>
      </div>
   </div>
</div>
</div>


					
					<div class="container well">
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-lg-4 col-md-4">
								<span class="text-right"> </span>
								<h3>News App</h3>
								<hr>
								<p>Description</p>
							</div>

						</div>
					</div>
					<footer class="container well1">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
									<p>@2015 myWebSite- Copyright © Team. Tel: phone</p>
								</div>
							</div>
						</div>

					</footer>

					<?php echo '<script'; ?>
 src="js/jquery-1.11.2.min.js"><?php echo '</script'; ?>
>
					<?php echo '<script'; ?>
 src="js/bootstrap.min.js"><?php echo '</script'; ?>
>

</body>
</html>
<?php }} ?>
