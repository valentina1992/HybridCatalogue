<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-02 01:03:22
         compiled from "smarty/application/templates/main_content/application.tpl" */ ?>
<?php /*%%SmartyHeaderCode:167790545557ef89ccb415e9-12789413%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10b422ed3a4290dc3fd5a16547e09df289af5a36' => 
    array (
      0 => 'smarty/application/templates/main_content/application.tpl',
      1 => 1478036025,
      2 => 'file',
    ),
    '401f360fb2eb1f6b55783b21966b5b7bf23bdebf' => 
    array (
      0 => 'smarty/application/templates/base.tpl',
      1 => 1478037551,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '167790545557ef89ccb415e9-12789413',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57ef89ccb98332_65038918',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ef89ccb98332_65038918')) {function content_57ef89ccb98332_65038918($_smarty_tpl) {?><!DOCTYPE html>
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



<div class="container">
  <div class="row">
    <div class="col s12 m12">
      <div class="nav-wrapper">
        <form role="search" action="apps.php" method="GET" class="form-inline" style="text-align:center";>
          <h4 class="searchALL">Search ALL:</h4>

          <div class="input-field">
            <input type="search" name="search" required placeholder="search...">
             <button style="text-align:center;" class="waves-effect waves-light btn" type="submit" value="search">Search</button>
            <i class="material-icons">close</i>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <?php  $_smarty_tpl->tpl_vars['application'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['application']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['app']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['application']->key => $_smarty_tpl->tpl_vars['application']->value) {
$_smarty_tpl->tpl_vars['application']->_loop = true;
?>
      <div class="col s12 m3">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <a href="app_details.php?id=<?php echo $_smarty_tpl->tpl_vars['application']->value['idApp'];?>
">
              <img class="circle" src="<?php echo $_smarty_tpl->tpl_vars['application']->value['iconUrl'];?>
">
            </a>
          </div>
          <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">
              <h4 class="tit_home">
                <a href="app_details.php?id=<?php echo $_smarty_tpl->tpl_vars['application']->value['idApp'];?>
"><?php echo $_smarty_tpl->tpl_vars['application']->value['name'];?>
</a>
              </h4>
              <div class="icon">
                <?php if ($_smarty_tpl->tpl_vars['application']->value['androidUrl']!='') {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['application']->value['androidUrl'];?>
" target="_blank"><img src="images/android.png"></a>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['application']->value['iosUrl']!='') {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['application']->value['iosUrl'];?>
" target="_blank"><img src="images/apple.png"></a>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['application']->value['windowsUrl']!='') {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['application']->value['windowsUrl'];?>
" target="_blank"><img src="images/windows.png"></a>
                <?php }?>
              </div>
              <div class="bloccoContenuti_home">
                <h6><strong style="color:#FF0000">Category:</strong><br><?php echo $_smarty_tpl->tpl_vars['application']->value['category'];?>
</h6>
                <h6><strong style="color:#FF0000">Added:</strong><br><?php echo $_smarty_tpl->tpl_vars['application']->value['createdAt'];?>
</h6>
              </div>
            </span>
            <p class="buttonView"><a class="waves-effect waves-light btn" href="app_details.php?id=<?php echo $_smarty_tpl->tpl_vars['application']->value['idApp'];?>
">View</a></p>
          </div>
        </div>
      </div>

    <?php } ?>
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
