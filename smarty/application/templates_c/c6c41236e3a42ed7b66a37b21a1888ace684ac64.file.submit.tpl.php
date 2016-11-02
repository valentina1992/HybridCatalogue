<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-02 15:31:16
         compiled from "smarty/application/templates/main_content/submit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15657848357ef7e45e892d4-29879147%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6c41236e3a42ed7b66a37b21a1888ace684ac64' => 
    array (
      0 => 'smarty/application/templates/main_content/submit.tpl',
      1 => 1478096954,
      2 => 'file',
    ),
    '401f360fb2eb1f6b55783b21966b5b7bf23bdebf' => 
    array (
      0 => 'smarty/application/templates/base.tpl',
      1 => 1478037551,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15657848357ef7e45e892d4-29879147',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57ef7e45ee35c6_28534178',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ef7e45ee35c6_28534178')) {function content_57ef7e45ee35c6_28534178($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<link rel="stylesheet" href="materialize/css/style.css"/>
<link rel="stylesheet" href="materialize/css/materialize.css"/>
<link rel="stylesheet" href="materialize/css/materialize.min.css"/>

</head>


<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="index.php" class="brand-logo left">Logo</a>
        <ul class="right hide-on-med-and-down">
          <li><a href="app.php">App</a></li>
          <li><a href="about.php">About Us</a></li>
          <li><a href="submit.php">Submit</a></li>

        </ul>


        <ul id="nav-mobile" class="side-nav">
          <li><a href="app.php">App</a></li>
          <li><a href="about.php">About Us</a></li>
          <li><a href="submit.php">Submit</a></li>

        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>





<!--
    Dato che nel file submit.php è stata scritta la funzione
    $mandatoryFields che serve a controllare se i campi sono scritti
    oppure no, questa funzione javascript mi permette di premere il bottone
    fetchFromStore anche senza aver inserito quei campi necessari,
    disabiliteremo per un secondo quel controllo $mandatoryFields
-->
<?php echo '<script'; ?>
>
   function disabledRequired()
   {
     <?php  $_smarty_tpl->tpl_vars['entry'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['entry']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['required']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->key => $_smarty_tpl->tpl_vars['entry']->value) {
$_smarty_tpl->tpl_vars['entry']->_loop = true;
?>
     <?php if ($_smarty_tpl->tpl_vars['entry']->value!='id') {?>
     $('[name="<?php echo $_smarty_tpl->tpl_vars['entry']->value;?>
"]').prop('required', false);
     <?php }?>
     <?php } ?>
   }

<?php echo '</script'; ?>
>

<!--
  Se l'id non è valido mi manderà un messaggio di errore
-->
<div class="container">
   <div class="row">
      <?php if (isset($_smarty_tpl->tpl_vars['insertError']->value)) {?>
      <div class="card-panel teal lighten-2">
         <strong>
            <center>Attenzione!
         </strong>
         <?php echo $_smarty_tpl->tpl_vars['insertError']->value;?>
</center>
      </div>
      <?php }?>
   </div>

   <div class="row">
      <form class="col s12 m12" name="form1" class="form-horizontal" action="submit.php" method="POST">
         <div class="row">
            <div class="input-field col s12 m12">
               <input type="text" class="validate" name="id" placeholder="Id App" required value="<?php echo $_smarty_tpl->tpl_vars['appId']->value;?>
">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="">Id App</a>
               </label>
            </div>
            <div class="input-field col s12">
               <center>
                   <!--
                     Qui è scritta la funzione di javascript onClick
                   -->
                  <button type="submit" onclick="disabledRequired();" class="waves-effect waves-light btn" name="fetchFromStore" value="1">
                  Fetch From Store</button>
               </center>
            </div>
         </div>
         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="name" placeholder="Title App" required value="<?php echo $_smarty_tpl->tpl_vars['appName']->value;?>
">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="insert title app">Title</a>
               </label>
            </div>
         </div>
         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="oneLiner" placeholder="Description App" value="<?php echo $_smarty_tpl->tpl_vars['appDescription']->value;?>
">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="description">Description</a>
               </label>
            </div>
         </div>
         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="seller" placeholder="Name of the seller" value="<?php echo $_smarty_tpl->tpl_vars['appSeller']->value;?>
">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="name of the seller">Seller</a>
               </label>
            </div>
         </div>
         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="sourceCodeUrl" placeholder="CodeUrl Recognition" value="<?php echo $_smarty_tpl->tpl_vars['appSourceCodeUrl']->value;?>
">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="code url recognition">Source Code Url</a>
               </label>
            </div>
         </div>
         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="submitterName" placeholder="Name Developer" value="<?php echo $_smarty_tpl->tpl_vars['appSourceName']->value;?>
">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="name developer">Source Name</a>
               </label>
            </div>
         </div>
         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="submitterWebSite" placeholder="WebSite Developer" value="<?php echo $_smarty_tpl->tpl_vars['appsubmitterWebSite']->value;?>
">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="website developer">Web Site</a>
               </label>
            </div>
         </div>
         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="submitterEmail" placeholder="Email Developer" value="<?php echo $_smarty_tpl->tpl_vars['appsubmitterEmail']->value;?>
">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="email developer">Email</a>
               </label>
            </div>
         </div>
         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="isSubmitterDeveloper" placeholder="Developer" value="<?php echo $_smarty_tpl->tpl_vars['appisSubmitterDeveloper']->value;?>
">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="developer">Developer</a>
               </label>
            </div>
         </div>
         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="technicalNotes" placeholder="Technical Notes" value="<?php echo $_smarty_tpl->tpl_vars['apptechnicalNotes']->value;?>
">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="technical notes">Technical Notes</a>
               </label>
            </div>
         </div>
         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="iconUrl" placeholder="Icon image" required value="<?php echo $_smarty_tpl->tpl_vars['appImage']->value;?>
">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="image">iconUrl</a>
               </label>
            </div>
         </div>
         <div class="row">
            <?php  $_smarty_tpl->tpl_vars['screenshot'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['screenshot']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['appScreenshot']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['screenshot']->key => $_smarty_tpl->tpl_vars['screenshot']->value) {
$_smarty_tpl->tpl_vars['screenshot']->_loop = true;
?>
            <div class="input-field col s12">
               <input type="text" class="validate" name="screenshots[]" placeholder="Image screenshot" value="<?php echo $_smarty_tpl->tpl_vars['screenshot']->value;?>
">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="screenshot">Image ScreenShot</a>
               </label>
            </div>
            <?php } ?>
         </div>
         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="category" placeholder="Category" value="<?php echo $_smarty_tpl->tpl_vars['appCategory']->value;?>
">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="category">Category</a>
               </label>
            </div>
         </div>
         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="createdAt" placeholder="createdAt" value="<?php echo $_smarty_tpl->tpl_vars['appCreatedAt']->value;?>
">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="createdAt">createdAt</a>
               </label>
            </div>
         </div>
         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="version" placeholder="version" value="<?php echo $_smarty_tpl->tpl_vars['appVersion']->value;?>
">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="version">version</a>
               </label>
            </div>
         </div>

         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="reviewsCount" placeholder="reviewsCount" value="<?php echo $_smarty_tpl->tpl_vars['appReviewsCount']->value;?>
">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="reviewsCount">Reviews Count</a>
               </label>
            </div>
         </div>

         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="platformVersion" placeholder="platformVersion" value="<?php echo $_smarty_tpl->tpl_vars['appPlatformVersion']->value;?>
">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="platformVersion">Platform Version</a>
               </label>
            </div>
         </div>

         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="rating" placeholder="rating" value="<?php echo $_smarty_tpl->tpl_vars['appRating']->value;?>
">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="rating">Rating</a>
               </label>
            </div>
         </div>

         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="size" placeholder="size" value="<?php echo $_smarty_tpl->tpl_vars['appSize']->value;?>
">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="size">Size</a>
               </label>
            </div>
         </div>

         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="iosUrl" placeholder="iosUrl" value="<?php echo $_smarty_tpl->tpl_vars['iosUrl']->value;?>
">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="iosUrl">iosUrl</a>
               </label>
            </div>
         </div>


         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="androidUrl" placeholder="androidUrl" value="<?php echo $_smarty_tpl->tpl_vars['androidUrl']->value;?>
">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="androidUrl">androidUrl</a>
               </label>
            </div>
         </div>

         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="windowsUrl" placeholder="windowsUrl" value="<?php echo $_smarty_tpl->tpl_vars['windowsUrl']->value;?>
">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="windowsUrl">windowsUrl</a>
               </label>
            </div>
         </div>

         <center>
             <!--
               Inserisce l'app nel database
             -->
            <button type="submit" name="insert" value="1" class="waves-effect waves-light btn">
            Insert to App</button>
         </center>
      </form>
   </div>
</div>



<footer class="page-footer">
  <div class="footer-copyright">
    <div class="container">
    © 2014 Copyright Text
    <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
    </div>
  </div>
</footer>

<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-2.1.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="materialize/js/materialize.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="materialize/js/materialize.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="materialize/js/init.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="materialize/js/style.js"><?php echo '</script'; ?>
>

</body>
</html>
<?php }} ?>
