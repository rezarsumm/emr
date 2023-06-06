<?php /* Smarty version Smarty-3.0.7, created on 2023-06-06 15:05:03
         compiled from "application/views\base/templates/notification.html" */ ?>
<?php /*%%SmartyHeaderCode:25187647ee8afb5c124-37584564%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8d1aa75acec12464050558ee68fc99916fa67dd' => 
    array (
      0 => 'application/views\\base/templates/notification.html',
      1 => 1616210784,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25187647ee8afb5c124-37584564',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_capitalize')) include 'D:\XAMPP\htdocs\emr_dev\system\plugins\smarty\libs\plugins\modifier.capitalize.php';
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