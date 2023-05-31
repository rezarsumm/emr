<?php /* Smarty version Smarty-3.0.7, created on 2022-07-26 09:41:40
         compiled from "application/views\nurse/rencana_op/add.html" */ ?>
<?php /*%%SmartyHeaderCode:219162df5464909803-40443934%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7a95e3aa75af239ef894e0751eebe28ab8da564' => 
    array (
      0 => 'application/views\\nurse/rencana_op/add.html',
      1 => 1658109874,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '219162df5464909803-40443934',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

 
<div class="breadcrum">
    <p>
        <a href="#">Data Operasi </a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/laporan/');?>
">Jadwal Operasi</a><span></span>
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div> 
<div class="content-entry">
    <!-- notification template -->
    
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('nurse/rencana_op/add_process1');?>
" method="post" onkeypress="return event.keyCode != 13">
        <input name="FS_KD_REG" id="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />  
            <input name="TGL_LAHIR" id="TGL_LAHIR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['TGL_LAHIR'];?>
" /> 
        <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />
        <input name="idoperasi" type="hidden" value="<?php echo $_smarty_tpl->getVariable('idoperasi')->value;?>
" />
        
        <input name="FS_KD_LAYANAN" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['KODE_BANGSAL'];?>
" />
        <input name="FS_KD_PETUGAS_MEDIS" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_medis'];?>
" />
 
        <table class="table-input" width="100%" style="text-align: justify;">
         

          

            <tr>
           

            
                <td width="20%">Nama Pasien</td>
                <td width="20%">
                    <select name="FS_KD_REG" id="surat_dari" class="select2"   style="width: 600px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien_bangsal')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NO_REG'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMA_PASIEN'];?>
 |   <?php echo $_smarty_tpl->tpl_vars['data']->value['NO_MR'];?>
  </option>
                        <?php }} ?>
                    </select>
                </td>
            </tr>
            <tr> 
                <td width="20%">Nama Dokter Bedah </td>
                <td width="20%">
                    <select name="Kode_Dokter" id="surat_dari"    class="select2" style="width: 300px;">
                        <option value="" ></option>
                        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_dokter_sp')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMAUSER'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
</option>
                        <?php }} ?>
                    </select>
                </td>
            </tr>


            
         
            <tr>
                <td width="20%">Nama Operasi</td>
                <td width="60%">
                    <input type="text" name="nmtindakan" required value="<?php echo $_smarty_tpl->getVariable('rs_op')->value['nmtindakan'];?>
" style="width: 300px;" class="form-control">
                </td>
             </tr>

             <tr>
                <td width="20%">Tanggal Operasi</td>
                <td width="20%">
                    <input type="date" name="tanggalop"   required class="form-control">
                </td>
             </tr>

             <input type="hidden" name="STATUS_OP" value="Belum" checked class="form-control"> 

             <!-- <tr>
                <td width="20%">Status Operasi</td>
                <td width="20%">
                    <input type="radio" name="STATUS_OP" value="Belum" checked class="form-control">Belum
                    <input type="radio" name="STATUS_OP" value="Terlaksana"  class="form-control">Terlaksana
                    <br>
                    <br>
                </td>
             </tr> -->
           
          
           <tr class="submit-box">
            <td colspan="4">
                <div style="font-weight: bold;">
                    *Bismillahirohmanirrohim, saya dengan sadar dan penuh tanggung jawab mengisikan formulir ini dengan data yang benar
                </div>
                <br>
                <input type="submit" name="save" value="Simpan" class="edit-button"/>
            </td>
        </tr>

        </table>
    </form>
</div>
 

<br>
<table class="table-view" width="100%" border="0">
    <thead>
        <tr>
            <th width='2%'>No</th>
            <th>No MR</th>
            <th>Nama Pasien</th>
            <th>Alamat</th> 
            <th>Tindakan</th> 
            <th>Dokter</th> 
            <th>Status</th>
            <th width='18%'>Detail</th>
        </tr>
    </thead>
    <tbody><?php $_smarty_tpl->tpl_vars['no'] = new Smarty_variable(1, null, null);?>
        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
            <td><?php echo $_smarty_tpl->tpl_vars['data']->value['nmtindakan'];?>
</td>  
            <td><?php echo $_smarty_tpl->tpl_vars['data']->value['Nama_Dokter'];?>
</td>  
            <td><?php echo $_smarty_tpl->tpl_vars['data']->value['STATUS_OP'];?>
</td>  
            <td>
                          
            </td>
        </tr>
        <?php }} ?>
    </tbody>
</table>

<script>
       $(".select2").select2({
            placeholder: "Pilih",
            allowClear: true
        });
</script>




  