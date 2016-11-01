<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-13 09:38:48
         compiled from "smarty/application/templates/main_content/search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16483683257ef885e616143-90377278%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f82eb2eff12188211ca5086a3547897e4c3e53dc' => 
    array (
      0 => 'smarty/application/templates/main_content/search.tpl',
      1 => 1476344323,
      2 => 'file',
    ),
    '401f360fb2eb1f6b55783b21966b5b7bf23bdebf' => 
    array (
      0 => 'smarty/application/templates/base.tpl',
      1 => 1476134062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16483683257ef885e616143-90377278',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57ef885e663ca5_49762827',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ef885e663ca5_49762827')) {function content_57ef885e663ca5_49762827($_smarty_tpl) {?><!DOCTYPE html>
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
    <?php  $_smarty_tpl->tpl_vars['result'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['result']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['search']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['result']->key => $_smarty_tpl->tpl_vars['result']->value) {
$_smarty_tpl->tpl_vars['result']->_loop = true;
?>
      <div class="col s12 m3">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <a href="app_details.php?id=<?php echo $_smarty_tpl->tpl_vars['result']->value['idApp'];?>
">
              <img class="circle" src="<?php echo $_smarty_tpl->tpl_vars['result']->value['iconUrl'];?>
">
            </a>
          </div>
          <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">
              <h4 class="tit_home">
                <a href="app_details.php?id=<?php echo $_smarty_tpl->tpl_vars['result']->value['idApp'];?>
"><?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>
</a>
              </h4>
              <div class="icon">
                <?php if ($_smarty_tpl->tpl_vars['result']->value['androidUrl']!='') {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['result']->value['androidUrl'];?>
" target="_blank"><img src="images/android.png"></a>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['result']->value['iosUrl']!='') {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['result']->value['iosUrl'];?>
" target="_blank"><img src="images/apple.png"></a>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['result']->value['windowsUrl']!='') {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['result']->value['windowsUrl'];?>
" target="_blank"><img src="images/windows.png"></a>
                <?php }?>
              </div>
              <div class="bloccoContenuti_home">
                <h6><strong style="color:#FF0000">Category:</strong><br><?php echo $_smarty_tpl->tpl_vars['result']->value['category'];?>
</h6>
                <h6><strong style="color:#FF0000">Added:</strong><br><?php echo $_smarty_tpl->tpl_vars['result']->value['createdAt'];?>
</h6>
              </div>
            </span>
            <p class="buttonView"><a class="waves-effect waves-light btn" href="app_details.php?id=<?php echo $_smarty_tpl->tpl_vars['result']->value['idApp'];?>
">View</a></p>
          </div>
        <!--   <div class="col s12 m2">
            <img class="screen" src="<?php echo $_smarty_tpl->tpl_vars['application']->value['image'];?>
">
          </div> -->
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
