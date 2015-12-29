<?php /* Smarty version Smarty-3.1.15, created on 2015-11-24 16:28:34
         compiled from "template/connexion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12757239755654850f340179-95734984%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce0e7a0a26ed018fc8f576346f88c042cf66d6a9' => 
    array (
      0 => 'template/connexion.tpl',
      1 => 1448382178,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12757239755654850f340179-95734984',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5654850f4a39c2_59148556',
  'variables' => 
  array (
    'connexion' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5654850f4a39c2_59148556')) {function content_5654850f4a39c2_59148556($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['connexion']->value)) {?>
    <div class="alert alert-error" id=notif">
    <?php echo $_smarty_tpl->tpl_vars['connexion']->value;?>

    </div>
    <?php }?>
<h1>Connexion</h1>
    <form action="connexion.php" method="post" enctype="multipart/form-data" id="form_connexion" name="form_connexion">

        <div class="clearfix">
            <label for="email">Email </label>
            <div class="input">
                <input type="text" name="email" id="email" value=""/>
            </div>
        </div>
        <div class="clearfix">
            <label for="mdp">Mots de passe </label>
            <div class="input">
                <input type="password" name="mdp" id="mdp"></textarea>
            </div>
        </div>

        <div class="form-actions">
            <input type="submit" name="connexion" value="connexion" class="btn btn-large btn-primary"/>
        </div>
    </form> <?php }} ?>
