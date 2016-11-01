<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-13 10:23:25
         compiled from "smarty/application/templates/main_content/app_details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:97100903157ef84f3d3aa53-59947165%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d78a4a32f7872100bf2308c13a694d1bf4401af' => 
    array (
      0 => 'smarty/application/templates/main_content/app_details.tpl',
      1 => 1476347004,
      2 => 'file',
    ),
    '401f360fb2eb1f6b55783b21966b5b7bf23bdebf' => 
    array (
      0 => 'smarty/application/templates/base.tpl',
      1 => 1476134062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97100903157ef84f3d3aa53-59947165',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57ef84f3da6eb2_10840278',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ef84f3da6eb2_10840278')) {function content_57ef84f3da6eb2_10840278($_smarty_tpl) {?><!DOCTYPE html>
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

<!--onload='document.form1.ValidateEmail.focus()'-->





<div class="container">
   <div class="row">
      <div class="col m3">
         <a href="<?php echo $_smarty_tpl->tpl_vars['storeData']->value['iconUrl'];?>
"> <img style="width:150px; margin-top:25px;" src="<?php echo $_smarty_tpl->tpl_vars['storeData']->value['iconUrl'];?>
"></a>
      </div>
      <div class="col m3">
         <h4 class="media-heading"><?php echo $_smarty_tpl->tpl_vars['store']->value['name'];?>
</h4>
         <br>
         <strong><?php echo $_smarty_tpl->tpl_vars['store']->value['createdAt'];?>
</strong></br></br>
         <?php if ($_smarty_tpl->tpl_vars['store']->value['androidUrl']!='') {?>
         <a href="<?php echo $_smarty_tpl->tpl_vars['store']->value['androidUrl'];?>
" target="_blank"><img src="images/android.png"></a>
         <?php }?>
         <?php if ($_smarty_tpl->tpl_vars['store']->value['iosUrl']!='') {?>
         <a href="<?php echo $_smarty_tpl->tpl_vars['store']->value['iosUrl'];?>
" target="_blank"><img src="images/apple.png"></a>
         <?php }?>
         <?php if ($_smarty_tpl->tpl_vars['store']->value['windowsUrl']!='') {?>
         <a href="<?php echo $_smarty_tpl->tpl_vars['store']->value['windowsUrl'];?>
" target="_blank"><img src="images/windows.png"></a>
         <?php }?>
      </div>
      <div class="col m4"><br>
        <?php if ($_smarty_tpl->tpl_vars['store']->value['submitterWebSite']!='') {?>
        <strong>Sviluppatore</strong><br>
        <a href="<?php echo $_smarty_tpl->tpl_vars['store']->value['submitterWebSite'];?>
">Visita il sito web</a><br>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['store']->value['submitterEmail']!='') {?>
        <p><?php echo $_smarty_tpl->tpl_vars['store']->value['submitterEmail'];?>
</p>
        <?php }?>
      </div>
   </div>

</div>
<div class="container">
   <div class="row">
      <div class="col m12">
         <h4>Screenshot:</h4>
      </div>
      <div class="carousel">
         <?php  $_smarty_tpl->tpl_vars['screenshot'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['screenshot']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['screenshots']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['screenshot']->key => $_smarty_tpl->tpl_vars['screenshot']->value) {
$_smarty_tpl->tpl_vars['screenshot']->_loop = true;
?>
         <a href="<?php echo $_smarty_tpl->tpl_vars['screenshot']->value['url'];?>
">
         <img style="width:25%;" src="<?php echo $_smarty_tpl->tpl_vars['screenshot']->value['url'];?>
">
         </a>
         <?php } ?>
      </div>
      <!-- <?php  $_smarty_tpl->tpl_vars['screenshot'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['screenshot']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['screenshots']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['screenshot']->key => $_smarty_tpl->tpl_vars['screenshot']->value) {
$_smarty_tpl->tpl_vars['screenshot']->_loop = true;
?>
         <a href="<?php echo $_smarty_tpl->tpl_vars['screenshot']->value['url'];?>
" target="_blank">
         <img class="screen" src="<?php echo $_smarty_tpl->tpl_vars['screenshot']->value['url'];?>
">
         </a>
         <?php } ?> -->
   </div>
   <div class="col m12">
      <h5>The app is compatible with some of your devices:</h5>
      <div class="row">
         <div class="col s12">
            <ul class="tabs">
               <li class="tab col s3"><a href="#test1"><img src="images/android.png"></a></li>
               <li class="tab col s3"><img src="images/apple.png"></li>
               <li class="tab col s3"><img src="images/windows.png"></li>
            </ul>
         </div>
         <div id="test1" class="col s12">
            <table>
               <thead>
                  <tr>
                     <th>Version</th>
                     <th>Rating</th>
                     <th>Size</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td><?php echo $_smarty_tpl->tpl_vars['storeData']->value['version'];?>
</td>
                     <td><?php echo $_smarty_tpl->tpl_vars['storeData']->value['rating'];?>
</td>
                     <td><?php echo $_smarty_tpl->tpl_vars['storeData']->value['size'];?>
</td>
                  </tr>
               </tbody>
            </table>
            <table>
               <thead>
                  <tr>
                     <th>Reviews Count</th>
                     <th>Platform Version</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td><?php echo $_smarty_tpl->tpl_vars['storeData']->value['reviewsCount'];?>
</td>
                     <td>
                        <?php echo $_smarty_tpl->tpl_vars['storeData']->value['platformVersion'];?>

                     </td>
                  </tr>
               </tbody>
            </table>
            <table>
               <thead>
                  <tr>
                     <th>Description</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td><?php echo $_smarty_tpl->tpl_vars['store']->value['oneLiner'];?>
</td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>
   <!--<div class="content" itemprop="softwareVersion">(.+?)<\/div> VERSIONE-->
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
