<?php /* Smarty version Smarty-3.0.7, created on 2022-08-03 08:30:51
         compiled from "application/views\inap/cari_ews_anak.html" */ ?>
<?php /*%%SmartyHeaderCode:2421562e9cfcbac6611-66277380%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7dd40a9b60e52a5ceb933d1b3cffeb99359d8dc7' => 
    array (
      0 => 'application/views\\inap/cari_ews_anak.html',
      1 => 1658894302,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2421562e9cfcbac6611-66277380',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
 
<div class="breadcrum">
    <p>
        <a href="#">Catatan Rawat Inap</a><span></span>
        <small>ews anak</small>
    </p>
    <div class="clear"></div>
</div>
<div class="head-content">
    <div class="head-content-nav">
        <!--<ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/cppt/');?>
" class="active">Cari Data</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/cppt/cari2');?>
">Cari History</a></li>
        </ul>-->
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ews_anak/add');?>
" method="post">
        <!--<input name="masuk_id" type="hidden" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['masuk_id'])===null||$tmp==='' ? '' : $tmp);?>
" />-->
        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="4">CPPT</th>
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
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NO_REG'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['NO_MR'];?>
|<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMA_PASIEN'];?>
|<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMA_RUANG'];?>
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
<script>
     $(".select2").select2({
            placeholder: "Pilih",
            allowClear: true
        });
</script>