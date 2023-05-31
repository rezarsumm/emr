<?php /* Smarty version Smarty-3.0.7, created on 2021-03-16 10:38:04
         compiled from "application/views\inap/rm17/list.html" */ ?>
<?php /*%%SmartyHeaderCode:199686050281cb9de42-02989784%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '202e2f70bea4ba29f93f57650e3c5d70cbbcc938' => 
    array (
      0 => 'application/views\\inap/rm17/list.html',
      1 => 1608812803,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '199686050281cb9de42-02989784',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- include javascript -->
<?php $_template = new Smarty_Internal_Template("inap/rm17/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of include javascript-->
<div class="breadcrum">
    <p>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/form_rm/lists');?>
">Form RM</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/rm17/cari');?>
">RM 17 Catatan Pemberian Obat</a><span></span>
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="head-content">
    <div class="head-content-nav">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/rm17');?>
" class="active">Cari Data</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/rm17/cari2');?>
">Cari History</a></li>
        </ul>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/rm17/cari_process');?>
" method="post">
        <!--<input name="masuk_id" type="hidden" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['masuk_id'])===null||$tmp==='' ? '' : $tmp);?>
" />-->
        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="4">RM 17 Catatan Pemberian Obat</th>
            </tr>
            <tr>
                <td>NO MR</td>
                <td colspan="3">
                    <select name="FS_RG" id="surat_dari" class="select2" style="width: 400px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['fs_kd_reg'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_MR'];?>
|<?php echo $_smarty_tpl->tpl_vars['data']->value['fs_nm_pasien'];?>
|<?php echo $_smarty_tpl->tpl_vars['data']->value['fs_nm_bed'];?>
</option>
                        <?php }} ?>
                    </select>
                    <em>* wajib diisi</em>
                </td>
            </tr>
            <tr class="submit-box">
                <td colspan="4">
                    <input type="submit" name="save" value="Cari" class="edit-button" />
                </td>
            </tr>
        </table>
    </form>
</div>