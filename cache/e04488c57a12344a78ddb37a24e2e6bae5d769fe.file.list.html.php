<?php /* Smarty version Smarty-3.0.7, created on 2023-06-02 14:15:07
         compiled from "application/views\igd/bidan/list.html" */ ?>
<?php /*%%SmartyHeaderCode:32031647996fba78ac5-65136440%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e04488c57a12344a78ddb37a24e2e6bae5d769fe' => 
    array (
      0 => 'application/views\\igd/bidan/list.html',
      1 => 1685690101,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32031647996fba78ac5-65136440',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
 
<div class="breadcrum">
    <p>
        <a href="#">Catatan   IGD</a><span></span>
        <small> </small>
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
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('igd/bidan/cari_process');?>
" method="post">
        <!--<input name="masuk_id" type="hidden" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['masuk_id'])===null||$tmp==='' ? '' : $tmp);?>
" />-->
        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="4">Asesmen Awal Kebidanan IGD</th>
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
<div class="dashboard-container">
    <table class="table-view" width="100%" border="0" style="font-size: 12px;">
        <thead>
            <tr>
                <th width='2%'>No</th>
                <th>No MR</th>
                <th>Nama Pasien</th>
                <th>Alamat</th> 
                <th>Petugas</th> 
                <th>Status</th>
                <th width='18%'>Detail</th>
            </tr>
        </thead>
        <tbody><?php $_smarty_tpl->tpl_vars['no'] = new Smarty_variable(1, null, null);?>
            <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_ases_bidan_igd')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
            <tr>
                <td><?php echo $_smarty_tpl->getVariable('no')->value++;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['No_MR'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['Nama_Pasien'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['Alamat'];?>
</td>  
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['mdb'];?>
</td>  
                <td><?php if ($_smarty_tpl->tpl_vars['data']->value['No_MR']!=''){?> <p style="color:green"><b> Selesai</b> </p> <?php }else{ ?> <b>Belum </b><?php }?></td>  
                <td>
                     <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('igd/bidan/edit/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG']));?>
" class="button-edit">Edit</a>
 
                               
                </td>
            </tr>
            <?php }} ?>
        </tbody>
    </table>
 </div>
<script>
     $(".select2").select2({
            placeholder: "Pilih",
            allowClear: true
        });
</script>