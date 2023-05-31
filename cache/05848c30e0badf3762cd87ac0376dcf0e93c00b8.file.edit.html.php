<?php /* Smarty version Smarty-3.0.7, created on 2022-12-01 12:27:57
         compiled from "application/views\op/jadwal/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:1898063883b5dc75d96-51697022%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05848c30e0badf3762cd87ac0376dcf0e93c00b8' => 
    array (
      0 => 'application/views\\op/jadwal/edit.html',
      1 => 1657764579,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1898063883b5dc75d96-51697022',
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
        <small>Edit Data</small>
    </p>
    <div class="clear"></div>
</div> 
<div class="content-entry">
    <!-- notification template --> 
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/jadwal/edit_process');?>
" method="post" onkeypress="return event.keyCode != 13">
        <input name="FS_KD_REG" id="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />  
            <input name="TGL_LAHIR" id="TGL_LAHIR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['TGL_LAHIR'];?>
" /> 
        <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />
        <input name="id" type="hidden" value="<?php echo $_smarty_tpl->getVariable('data_operasi')->value['id'];?>
" />
        
        <input name="FS_KD_LAYANAN" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['KODE_BANGSAL'];?>
" />
        <input name="FS_KD_PETUGAS_MEDIS" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_medis'];?>
" />
 
        <table class="table-input" width="100%" style="text-align: justify;">
         

          

            <tr>
           

            
                <td width="20%">Nama Pasien</td>
                <td width="20%">
                    <select name="FS_KD_REG" id="surat_dari" class="select2" style="width: 400px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien_inap')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['NO_REG']==$_smarty_tpl->getVariable('data_operasi')->value['FS_KD_REG']){?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NO_REG'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMA_PASIEN'];?>
 | <?php echo $_smarty_tpl->tpl_vars['data']->value['NO_MR'];?>
</option>
                         <?php }else{ ?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NO_REG'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMA_PASIEN'];?>
 | <?php echo $_smarty_tpl->tpl_vars['data']->value['NO_MR'];?>
</option>
                        <?php }?>
                        <?php }} ?>
                    </select>
                </td>
            </tr>
            <tr> 
                <td width="20%">Nama Dokter Bedah </td>
                <td width="20%">
                    <select name="Kode_Dokter" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_dokter_sp')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['NAMAUSER']==$_smarty_tpl->getVariable('data_operasi')->value['Kode_Dokter']){?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMAUSER'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
</option>

                         <?php }else{ ?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMAUSER'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
</option>
                        <?php }?>
                        <?php }} ?>
                    </select>
                </td>
            </tr>


            
         
            <tr>
                <td width="20%">Nama Operasi</td>
                <td width="60%">
                    <input type="text" name="nmtindakan" value="<?php echo $_smarty_tpl->getVariable('data_operasi')->value['nmtindakan'];?>
" style="width: 300px;" class="form-control">
                </td>
             </tr>

             <tr>
                <td width="20%">Tanggal Operasi</td>
                <td width="20%">
                    <input type="date" name="tanggalop" value="<?php echo $_smarty_tpl->getVariable('data_operasi')->value['tanggalop'];?>
" class="form-control">
                </td>
             </tr>


             <tr>
                <td width="20%">Status Operasi</td>
                <td width="20%">
                    <input type="radio" name="STATUS_OP" value="Belum" checked class="form-control">Belum
                    <input type="radio" name="STATUS_OP" value="Terlaksana"  class="form-control">Terlaksana
                    <br>
                    <br>
                </td>
             </tr>
           
          
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
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('op/jadwal/detail/').($_smarty_tpl->tpl_vars['data']->value['id'])).('/')).($_smarty_tpl->tpl_vars['data']->value['No_Reg']))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Entry</a>
                           
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


        $('#tujuan').select2('val', [<?php echo $_smarty_tpl->getVariable('rs_tujuan')->value;?>
]);
</script>




  