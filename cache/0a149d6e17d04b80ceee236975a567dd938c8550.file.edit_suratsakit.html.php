<?php /* Smarty version Smarty-3.0.7, created on 2022-03-07 11:53:44
         compiled from "application/views\medis/ket_sakit/edit_suratsakit.html" */ ?>
<?php /*%%SmartyHeaderCode:3078762258fd8473070-52305897%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a149d6e17d04b80ceee236975a567dd938c8550' => 
    array (
      0 => 'application/views\\medis/ket_sakit/edit_suratsakit.html',
      1 => 1646628822,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3078762258fd8473070-52305897',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
 
<div class="breadcrum">
    <p>
        <a href="#">Pemeriksaan Dokter</a><span></span>
         <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/');?>
">Rawat Jalan</a><span></span>
        <small>Add Surat Keterangan Sakit</small>
    </p>
    <div class="clear"></div>
</div>
<div class="navigation">
    <div class="navigation-button">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('medis/rawat_jalan/history/').($_smarty_tpl->getVariable('result')->value['NO_MR']));?>
"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/back-icon.png" alt="" />  Back</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<!-- notification template -->
<?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of notification template-->
<form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/ket_sakit/update_suratsakit');?>
" method="post">
    <!-- <input type="hidden" name="FS_KD_TRS" value="<?php echo $_smarty_tpl->getVariable('result')->value['FS_KD_TRS'];?>
" /> -->
    <input type="hidden" name="FS_KD_REG" value="<?php echo $_smarty_tpl->getVariable('result')->value['NO_REG'];?>
" />
    <table class="table-info" width="100%">
        <tr class="headrow">
            <th colspan="4">Data Pasien</th>
        </tr>
         <tr>
            <td width='15%'>Kode Reg</td>
            <td width='35%'><?php echo $_smarty_tpl->getVariable('result')->value['NO_REG'];?>
</td></tr>
        <tr>
            <td width='15%'>No RM</td>
            <td width='35%'><?php echo $_smarty_tpl->getVariable('result')->value['NO_MR'];?>
</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['NAMA_PASIEN'])===null||$tmp==='' ? '' : $tmp);?>
</td></tr>
        <tr>    <td>Alamat</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['ALAMAT'])===null||$tmp==='' ? '' : $tmp);?>
</td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['TGL_LAHIR'])===null||$tmp==='' ? '' : $tmp);?>
</td></tr>
         <tr>    <td>Jenis Kelamin</td>
            <td>
                <?php if ($_smarty_tpl->getVariable('result')->value['JENIS_KELAMIN']=='P'){?>
                Perempuan
                <?php }else{ ?>
                Laki-Laki
                <?php }?>
            </td>
        </tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
    </table>
    <br> 
    <center> 
    <table class="table-input" width="80%">
        <tr class="headrow">
            <th colspan="4">Form Edit Surat Keterangan Sakit</th>
        </tr>
        <tr><td> </td></tr>
        <tr>
            <td>
                 Sekolah 
            </td>
            <td > <input type="text" name="sekolah" value="<?php echo $_smarty_tpl->getVariable('ket_sakit')->value['SEKOLAH'];?>
" style="width: 400px;">
            </td>
        </tr>
        <tr>
            <td>
               Pekerjaan
            </td>
            <td > <input type="text" name="pekerjaan" value="<?php echo $_smarty_tpl->getVariable('ket_sakit')->value['PEKERJAAN'];?>
" style="width: 400px;">
            </td>
        </tr>
        <tr>
            <td>
               Tanggal Mulai Sakit
            </td>
            <td > <input type="date" name="tglmulai" value="<?php echo $_smarty_tpl->getVariable('ket_sakit')->value['TGLMULAI'];?>
" style="width: 400px;">
            </td>
        </tr>
        <tr>
            <td>
               Jumlah Hari
            </td>
            <td > <input type="text" name="jumlahhari"  value="<?php echo $_smarty_tpl->getVariable('ket_sakit')->value['JUMLAHHARI'];?>
" style="width: 400px;" onkeypress="return angka(event);">
            </td>
        </tr>
           <tr>
            <td>
              Dokter
            </td>
            <td > 
                  <select name="mdb" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_dokter')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['KODE_DOKTER'];?>
" <?php if ($_smarty_tpl->getVariable('ket_sakit')->value['mdb']==$_smarty_tpl->tpl_vars['data']->value['KODE_DOKTER']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMA_DOKTER'];?>
</option>
                        <?php }} ?>
                    </select>
            </td>
        </tr>
        <tr><td> </td></tr>
      
        <tr class="submit-box">
            <td colspan="4">
                <input type="submit" name="save" value="Simpan" class="edit-button" /> 
            </td>
        </tr>
    </table>
    </center>
</form>


<br>
   
<!-- <a href="javascript:void(0);" class="button-download" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((((('medis/ket_sakit/cetak/').($_smarty_tpl->getVariable('result')->value['NO_REG'])).('/')).($_smarty_tpl->getVariable('data')->value['FS_KD_TRS'])).('/')).($_smarty_tpl->getVariable('data')->value['FS_FORM']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" >
    <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/printer-icon.png" alt="" width="30px"/> Cetak Surat </a> -->


<script type="text/javascript">
  function angka(evt){
    var charCode=(evt.which)?evt.which:event.keyCode
    if(charCode>31 && (charCode<48||charCode>57))
      return false;
    return true;
  }
</script> 










