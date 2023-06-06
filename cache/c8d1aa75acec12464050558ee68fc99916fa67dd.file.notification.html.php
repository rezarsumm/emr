<?php /* Smarty version Smarty-3.0.7, created on 2023-06-06 08:34:01
         compiled from "application/views\base/templates/notification.html" */ ?>
<?php /*%%SmartyHeaderCode:27456647e8d09e5dfb1-37409287%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8d1aa75acec12464050558ee68fc99916fa67dd' => 
    array (
      0 => 'application/views\\base/templates/notification.html',
      1 => 1685954848,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27456647e8d09e5dfb1-37409287',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_capitalize')) include 'F:\xampp\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.capitalize.php';
?><!-- notification template -->
<?php if ((($tmp = @$_smarty_tpl->getVariable('notification_header')->value)===null||$tmp==='' ? '' : $tmp)=="error"){?>
<div class="notification red">
    <p><strong><?php echo smarty_modifier_capitalize($_smarty_tpl->getVariable('notification_header')->value);?>
 :</strong> <?php echo $_smarty_tpl->getVariable('notification_message')->value;?>
 </p>
    <?php echo $_smarty_tpl->getVariable('notification_error')->value;?>

    <div class="clear"></div>
</div>
<?php }elseif((($tmp = @$_smarty_tpl->getVariable('notification_header')->value)===null||$tmp==='' ? '' : $tmp)=="success"){?>
<div class="notification green">
    <p><strong><?php echo smarty_modifier_capitalize($_smarty_tpl->getVariable('notification_header')->value);?>
 :</strong> <?php echo $_smarty_tpl->getVariable('notification_message')->value;?>
 </p>
    <?php echo $_smarty_tpl->getVariable('notification_error')->value;?>

    <div class="clear"></div>
</div>
<?php }else{ ?>
<?php }?>
<!-- End of notification template -->