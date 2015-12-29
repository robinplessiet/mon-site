<?php /* Smarty version Smarty-3.1.15, created on 2015-11-10 15:34:10
         compiled from "template\article.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1708656420c1b956889-28107932%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c454322435b1cf253ad3b8caa3596c5fbc42df3a' => 
    array (
      0 => 'template\\article.tpl',
      1 => 1447169007,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1708656420c1b956889-28107932',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_56420c1ba7b975_77923804',
  'variables' => 
  array (
    'msg_error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56420c1ba7b975_77923804')) {function content_56420c1ba7b975_77923804($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['msg_error']->value)) {?>
    <div class="alert alert-error" id=notif">
    <?php echo $_smarty_tpl->tpl_vars['msg_error']->value;?>

    </div>
    <?php }?> 
<form action="article.php" method="post" enctype="multipart/form-data" id="form_article" name="form_article">

        <div class="clearfix">
            <label for="titre">Titre: </label>
            <div class="input">
                <input type="text" name="titre" id="titre" value=""/>
            </div>
        </div>
        <div class="clearfix">
            <label for="texte">Texte: </label>
            <div class="textarea">
                <textarea name="texte" id="texte"></textarea>
            </div>
        </div>
        <div class="clearfix">
            <label for="image">Image: </label>
            <div class="input">
                <input type="file" name="image" id="image"/>
            </div>
        </div>
        <br/>
        <div class="clearfix">
            <label for="publie">Publie: </label>
            <div class="input">
                <input type="checkbox" name="publie" id="publie" value="1"/>
            </div>
        </div>
        <br/>
        <div class="form-actions">
            <input type="submit" name="envoyer" value="envoyer" class="btn btn-large btn-primary"/>
        </div>
    </form> <?php }} ?>
