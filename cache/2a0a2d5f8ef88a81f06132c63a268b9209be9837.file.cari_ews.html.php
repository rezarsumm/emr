<?php /* Smarty version Smarty-3.0.7, created on 2022-07-25 09:02:10
         compiled from "application/views\inap/cari_ews.html" */ ?>
<?php /*%%SmartyHeaderCode:1729662ddf9a25f9481-35500970%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a0a2d5f8ef88a81f06132c63a268b9209be9837' => 
    array (
      0 => 'application/views\\inap/cari_ews.html',
      1 => 1657852554,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1729662ddf9a25f9481-35500970',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
 
<div class="breadcrum">
    <p>
        <a href="#">Catatan Rawat Inap</a><span></span>
        <small>EWS</small>
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
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ews/add');?>
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