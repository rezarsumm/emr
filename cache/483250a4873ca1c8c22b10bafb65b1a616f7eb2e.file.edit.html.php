<?php /* Smarty version Smarty-3.0.7, created on 2022-05-10 08:10:20
         compiled from "application/views\op/umumpost/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:315016279bb7c718553-77968087%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '483250a4873ca1c8c22b10bafb65b1a616f7eb2e' => 
    array (
      0 => 'application/views\\op/umumpost/edit.html',
      1 => 1651985268,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '315016279bb7c718553-77968087',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?>
 
<div class="breadcrum">
    <p>
        <a href="#">Catatan Operasi </a><span></span>
        <a href="">DAta Umum Post Operasi</a><span></span>
        <small>Edit Data</small>
    </p>
    <div class="clear"></div>
</div> 
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/umumpost/edit_process');?>
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

        <table class="table-info" width="100%">
            <tr class="headrow">
                <th colspan="2">Add Data Umum Post OP</th>
            </tr>
            <tr>
                <td>NAMA</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NAMA_PASIEN'];?>

                </td>
            </tr>
            <tr>
                <td>NO MR</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>

                </td>
            </tr>
            <tr>
                <td>TANGGAL LAHIR</td>
                <td>
                    <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('rs_pasien')->value['TGL_LAHIR'],"%d %b %Y");?>

                </td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['ALAMAT'];?>
</td>
            </tr>
        </table>
   
        <div class="notification red">
            <p><strong>High Risk :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_HIGH_RISK'])===null||$tmp==='' ? '-' : $tmp);?>
 </p>
            <p><strong>Alergi :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
 (<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_REAK_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
)</p>
            <div class="clear"></div>
        </div>
        <table class="table-input" width="100%" style="text-align: justify;">
         
 
            <tr>
                <!-- <td width="20%">Nama Dokter Bedah </td>
                <td width="20%">
                    <select name="KD_OPERATOR" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
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
                </td>  -->

            <input type="hidden" name="KD_OPERATOR" value="<?php echo $_smarty_tpl->getVariable('rs_op')->value['Kode_Dokter'];?>
">

            </tr>


            <tr>
                <td width="20%">Nama Dokter Anestesi</td>
                <td width="20%">
                    <select name="KD_AHLI_ANES" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
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

                <td width="20%">Nama Asisten Anestesi</td>
                <td width="20%">
                    <select name="KD_ANES" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_perawat')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
                <td width="20%">Diagnosa Pra</td>
                <td width="20%">
                    <input type="text" name="DIAGNOSA_PRA" value="<?php echo $_smarty_tpl->getVariable('rs_umum_post3')->value['DIAGNOSA_PRA'];?>
" class="form-control">
                </td>
                <td width="20%">Diagnosa Post</td>
                <td width="20%">
                    <input type="text" name="DIAGNOSA_POST" value="<?php echo $_smarty_tpl->getVariable('rs_umum_post3')->value['DIAGNOSA_POST'];?>
" class="form-control">
                </td>             
            </tr>

            <tr>
                <td width="20%">Jenis Operasi</td>
                <td width="20%">
                    <input type="text" name="JENIS_OP" style="width:100px;" value="<?php echo $_smarty_tpl->getVariable('rs_umum_post3')->value['JENIS_OP'];?>
"  class="form-control"> Jam Operasi
                    <input type="time" name="JAM_OP" style="width:90px;"  value="<?php echo $_smarty_tpl->getVariable('rs_umum_post3')->value['JAM_OP'];?>
"  class="form-control">
                </td>

              <td width="20%">Jenis Anestesi</td>
                <td width="20%">
                    <input type="text" name="JENIS_ANEST" value="<?php echo $_smarty_tpl->getVariable('rs_umum_post3')->value['JENIS_ANEST'];?>
"  class="form-control">
                </td>
            </tr>


 
     <tr><td colspan="2"><b> Serah Terima Post OP</b></td></tr>

     <tr>
        <td colspan="2">
        <table>
            <tr><td>Status Pasien</td><td><input type="radio" name="S1" VALUE="Ya" checked>Ya </td><td><input type="radio" name="SERAH1" VALUE="Tidak">Tidak </td></tr>
            <tr><td> Catatan Anestesi </td><td><input type="radio" name="S2" VALUE="Ya" checked>Ya </td><td><input type="radio" name="SERAH2" VALUE="Tidak">Tidak </td></tr>
            <tr><td>Laporan Pembedahan</td><td><input type="radio" name="S3" VALUE="Ya" >Ya </td><td><input type="radio" name="S8" VALUE="Tidak">Tidak </td></tr>
              
            <tr><td> Perencanaan Medis Pasca Bedah </td><td><input type="radio" name="S4" VALUE="Ya" checked>Ya </td><td><input type="radio" name="SERAH3" VALUE="Tidak">Tidak </td></tr>
            <tr><td> Checklist Keselamatan</td><td><input type="radio" name="S5" VALUE="Ya" checked>Ya </td><td><input type="radio" name="SERAH4" VALUE="Tidak">Tidak </td></tr>
            <tr><td>Checklist Monitoring Alat  </td><td><input type="radio" name="S6" VALUE="Ya" checked>Ya </td><td><input type="radio" name="SERAH5" VALUE="Tidak">Tidak </td></tr>
            <tr><td>  Askep Perioperatif </td><td><input type="radio" name="S7" VALUE="Ya" checked>Ya </td><td><input type="radio" name="SERAH6" VALUE="Tidak">Tidak </td></tr>
            <tr><td>Lembar Pemantauan bedah</td><td><input type="radio" name="S8" VALUE="Ya" checked>Ya </td><td><input type="radio" name="SERAH7" VALUE="Tidak">Tidak </td></tr>
         </table>    
        </td>
        <td colspan="2">
            <table>
                <tr><td> Form Pemeriksaan  </td><td><input type="radio" name="S9" VALUE="Ya" checked>Ya </td><td><input type="radio" name="S9" VALUE="Tidak">Tidak </td></tr>
                <tr><td> Sampel Pemeriksaan </td><td><input type="radio" name="S10" VALUE="Ya" checked>Ya </td><td><input type="radio" name="S10" VALUE="Tidak">Tidak </td></tr>
                <tr><td>Foto Rontgen  </td><td><input type="radio" name="S11" VALUE="Ya" checked>Ya </td><td><input type="radio" name="S12" VALUE="Tidak">Tidak </td></tr>
                <tr><td> Resep </td><td><input type="radio" name="S12" VALUE="Ya" checked>Ya </td><td><input type="radio" name="S13" VALUE="Tidak">Tidak </td></tr>
                <tr><td>Lain lain</td><td><input type="radio" name="S13" VALUE="Ya" checked>Ya </td><td><input type="radio" name="S14" VALUE="Tidak">Tidak </td></tr>
         
            </table>    
            </td>
         </tr>

         <tr><td><b>Terpasang</b></td>
        <td>
            <input type="checkbox" name="TERPASANG[]" value="NGT" class="form-control">NGT<br>
            <input type="checkbox" name="TERPASANG[]" value="DRAIN" class="form-control">DRAIN<br>
            <input type="checkbox" name="TERPASANG[]" value="TAMPON HIDUNG" class="form-control">Tampon HIdung<br>
            <input type="checkbox" name="TERPASANG[]" value="TAMPON GIGI" class="form-control">Tampon Gigi<br>
            <input type="checkbox" name="TERPASANG[]" value="TAMPON ABDOMEN" class="form-control">Tampon Abdomen<br>
            <input type="checkbox" name="TERPASANG[]" value="TAMPON VAGINA" class="form-control">Tampon Vagina<br>
            <input type="checkbox" name="TERPASANG[]" value="TRANFUSI" class="form-control">Tranfusi<br>
            <input type="checkbox" name="TERPASANG[]" value="IVFD" class="form-control">IVFD<br>
            <input type="checkbox" name="TERPASANG[]" value="KOMPRES" class="form-control">Kompres Luka<br>
            <input type="checkbox" name="TERPASANG[]" value="DC" class="form-control">DC<br>
         </td></tr>
 
         
        <tr>
            
            <td width="20%"> Kesadaran </td>
            <td width="20%">
                <input type="text" name="KESADARAN"  value="<?php echo $_smarty_tpl->getVariable('rs_umum_post3')->value['KESADARAN'];?>
"  class="form-control">  
                <input type="hidden" name="TB"  >              
                <input type="hidden" name="BB" >
             </td>
             <td colspan="2">
             <table>
                <tr>

                   <td>     Tekanan Darah </td><td>: <input type="text" name="TD" value="<?php echo $_smarty_tpl->getVariable('rs_umum_post3')->value['TD'];?>
" class="form-control" style="width: 60px;"></td>
                  <td>   Nadi </td><td>: <input type="text" name="ND" value="<?php echo $_smarty_tpl->getVariable('rs_umum_post3')->value['ND'];?>
" class="form-control" style="width: 60px;"></td>
                </tr>
                <tr>
                  <td>     Pernafasan</td><td> : <input type="text" name="P" value="<?php echo $_smarty_tpl->getVariable('rs_umum_post3')->value['P'];?>
" class="form-control" style="width: 60px;"></td>
                  <td>     SH</td><td> : <input type="text" name="sh" value="<?php echo $_smarty_tpl->getVariable('rs_umum_post3')->value['SH'];?>
" class="form-control" style="width: 60px;"></td>
                  <td>  </td><td></td>
               </tr>
             </table>
            </td>
        </tr>

        <tr>
            <td width="20%">Instruksi Dokter Bedah </td>
            <td width="20%">
                <textarea name="INSTRUKSI_DOKTER" class="form-control" rows="3" style="width: 350px;"><?php echo $_smarty_tpl->getVariable('rs_umum_post3')->value['INSTRUKSI_DOKTER'];?>
</textarea> 
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
<table class="table-view" width="100%">
    <tr class="headrow">
        <th colspan="6">List Laporan OP</th>
    </tr>
    <tr>
        <th width="25%">Tanggal</th>
        <th width="10%">Diagnosa </th>
        <th width="30%"> Data Umum</th>
        <th width="15%">Petugas</th>
      
    </tr>
    <?php  $_smarty_tpl->tpl_vars['cppt'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_umum_post')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cppt']->key => $_smarty_tpl->tpl_vars['cppt']->value){
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['TGL'];?>
  
            <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_inap/cetak_data_umum_post/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['id']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['TANGGAL'],"%d %B %Y");?>
</a> 
        </td>
        <td> Pra : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['DIAGNOSA_PRA'];?>
 <br> Post : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['DIAGNOSA_POST'];?>
 </td>
        <td>
            Jenis Op : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['JENIS_OP'];?>
 <br>
         <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['NAMALENGKAP'];?>
 </td>
  

    </tr>
    <?php }} ?>
</table>
<script>
       $(".select2").select2({
            placeholder: "Pilih",
            allowClear: true
        });
</script>




  