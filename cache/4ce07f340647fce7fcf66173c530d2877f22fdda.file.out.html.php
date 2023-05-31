<?php /* Smarty version Smarty-3.0.7, created on 2022-07-06 11:24:16
         compiled from "application/views\nurse/transfer_pasien/out.html" */ ?>
<?php /*%%SmartyHeaderCode:2980162c50e70e1ddd1-33343076%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ce07f340647fce7fcf66173c530d2877f22fdda' => 
    array (
      0 => 'application/views\\nurse/transfer_pasien/out.html',
      1 => 1656657390,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2980162c50e70e1ddd1-33343076',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
 
    <div class="head-content">
        <div class="head-content-nav">
            <ul>
                <!-- <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('nurse/tf/index/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
" >Pasien Masuk</a></li> -->
                <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('nurse/tf/out/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
" class="active">Pasien Keluar</a></li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>

  
<div class="content-entry">
<form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('nurse/tf/transfer');?>
" method="post">
    <!--<input name="masuk_id" type="hidden" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['masuk_id'])===null||$tmp==='' ? '' : $tmp);?>
" />-->
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="7">Tambah Pasien Transfer Keluar   </th>
        </tr>
        <tr>
            <td>NO MR</td>
            <td colspan="3">
                <select name="FS_KD_REG" id="surat_dari" class="select2" style="width: 400px;">
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
           
                <input type="submit" name="save" value="Tambah" class="edit-button" />
            </td>
        </tr>
    </table>
</form>

<br>
<br>

<h4><b>    Data Transfer Pasien Keluar </b></h4>
<div class="dashboard-container">
    <table class="table-view" width="100%"   style="font-size: 12px;">
        <thead>
            <tr>
                <th width='2%'>No</th>
                <th style="padding:5px">No MR</th>
                <th style="padding:5px">Nama Pasien</th>
                <th style="padding:5px" width='20%'>Alamat</th> 
                <th style="padding:5px">Jenis</th> 
                <th style="padding:5px">Pengirim</th> 
                <th style="padding:5px">Tujuan</th> 
                <th style="padding:5px"> Status Transfer </th> 
                <!-- <th style="padding:5px">DPJP</th>    -->
                <th width='18%'>Aksi</th>
            </tr>
        </thead>
        <tbody><?php $_smarty_tpl->tpl_vars['no'] = new Smarty_variable(1, null, null);?>
            <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tf')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
                 <td><?php echo $_smarty_tpl->tpl_vars['data']->value['MEDIS'];?>
</td> 
                 <td><?php echo $_smarty_tpl->tpl_vars['data']->value['RUANG1'];?>
 oleh <?php echo $_smarty_tpl->tpl_vars['data']->value['PENGIRIM'];?>
 </td> 
                 <td><?php echo $_smarty_tpl->tpl_vars['data']->value['Nama_Ruang'];?>
 </td> 
                <td>
                     <?php if ($_smarty_tpl->tpl_vars['data']->value['STATUS_TF']=='Diterima'){?>
                    <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/icon.approve.png" alt="" />
                    Diterima oleh <?php echo $_smarty_tpl->tpl_vars['data']->value['PENERIMA'];?>

                    <?php }else{ ?>
                    <?php echo $_smarty_tpl->tpl_vars['data']->value['STATUS_TF'];?>
 
                    <?php }?> </td>  
                <!-- <td><?php echo $_smarty_tpl->tpl_vars['data']->value['Nama_Dokter'];?>
</td>   -->
                 <td>
                      <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('igd/ppdftr/cetak/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"> Cetak </a>
                      <?php if ($_smarty_tpl->tpl_vars['data']->value['STATUS_TF']!='Diterima'){?>
                      <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG']!=''){?>
                      <?php if ($_smarty_tpl->getVariable('rolenya')->value!='Dokter'){?>
                      <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('nurse/tf/edit_transfer/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Edit</a>
                      <?php }?>
                      <?php }?>
                      <?php }?>

                </td>
            </tr>
            <?php }} ?>
        </tbody>
    </table>
 </div>
</div>
  
 
<script>
    $(".select2").select2({
         placeholder: "Pilih",
         allowClear: true
     });
</script>