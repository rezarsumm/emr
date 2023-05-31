<?php /* Smarty version Smarty-3.0.7, created on 2022-07-14 09:01:05
         compiled from "application/views\op/laporan/add.html" */ ?>
<?php /*%%SmartyHeaderCode:570662cf78e176e385-49292378%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'abba043c6e1152ebecca0d42025b07a0f0b1710f' => 
    array (
      0 => 'application/views\\op/laporan/add.html',
      1 => 1653985008,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '570662cf78e176e385-49292378',
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
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('op/jadwal/detail/').($_smarty_tpl->getVariable('idoperasi')->value)).('/')).($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']))===null||$tmp==='' ? '' : $tmp));?>
"> Detail</a><span></span>
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div> 
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/laporan/add_process2');?>
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
                <th colspan="2">Add Laporan </th>
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
        <!-- <table class="table-info" width="100%" style="text-align: justify;">
            <tr class="headrow">
                <th colspan="3">Asesmen Awal Medik</th>
            </tr>
            <tr>
                <td width="18%">Anamnesa</td>
                <td width="1%">:</td>
                <td width="80%"> <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_ANAMNESA'];?>

                </td>
            </tr>
            <tr>
               <td width="18%">Diagnosa</td>
                <td width="2%">:</td>
                <td width="80%">  <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_DIAGNOSA'];?>

                </td>
            </tr>
            <tr>
                <td width="18%">Hasil Pemeriksaan Penunjang</td>
                <td width="2%">:</td>
                <td width="80%">  <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_HASIL_PEMERIKSAAN_PENUNJANG'];?>

                </td>
            </tr>
            <tr>
                 <td width="18%"> Pemeriksaan Fisik</td>
                <td width="2%">:</td>
                <td width="80%">   <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_CATATAN_FISIK'];?>

                </td>
            </tr>
            <tr>
                <td width="18%">Daftar Masalah</td>
                <td width="2%">:</td>
                <td width="80%"> <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_DAFTAR_MASALAH'];?>

                </td>
            </tr>
            <tr>
                 <td width="18%">Rencana Tindakan</td>
                <td width="2%">:</td>
                <td width="80%">  <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_TINDAKAN'];?>

                </td>
            </tr>
            <tr>
                <td width="18%">Rencana Pemeriksaan Penunjang</td>
                <td width="2%">:</td>
                <td width="80%">  <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_PLANNING'];?>

                </td>
            </tr>
          
            <tr>
                <td width="18%">Waktu Asesmen</td>
                <td width="2%">:</td>
                <td width="80%"> <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['mdd'];?>
 / <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_JAM_TRS'];?>

                </td>
            </tr>
        </table> -->
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
                <td width="20%">Nama Asisten Bedah </td>
                <td width="20%">
                    <select name="KD_ASISTEN" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_perawat')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
</option>
                        <?php }} ?>
                    </select>
                </td>

                <!-- <td width="20%">Nama Perawat</td>
                <td width="20%">
                    <select name="KD_PERAWAT" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_perawat')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
</option>
                        <?php }} ?>
                    </select>
                </td> -->
                <input type="hidden" name="KD_PERAWAT">

            </tr>




            <tr>
                <!-- <td width="20%">Nama Dokter Anestesi</td>
                <td width="20%">
                    <select name="KD_AHLI_ANESTESI" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_dokter_sp')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
</option>
                        <?php }} ?>
                    </select>
                </td> -->
<!-- 
                <td width="20%">Nama Penata Anestesi</td>
                <td width="20%">
                    <select name="KD_ANESTESI" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_perawat')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
</option>
                        <?php }} ?>
                    </select>
                </td> -->
            </tr>



            <tr>
                <td width="20%">Diagnosa Pre-operatif</td>
                <td width="20%">
                    <input type="text" name="DIAGNOSA_PRE" value="<?php echo $_smarty_tpl->getVariable('rs_lap_anes3')->value['DIAGNOSA_PRA'];?>
" class="form-control">
                </td>

                <td width="20%">Diagnosa Post-operatif</td>
                <td width="20%">
                    <input type="text" name="DIAGNOSA_POST" value="<?php echo $_smarty_tpl->getVariable('rs_lap_anes3')->value['DIAGNOSA_POST'];?>
" value="" class="form-control">
                </td>
            </tr>



            
           <tr>
            <td>Jaringan di eksisi/insisi</td>
            <td >
                <textarea name="BAGIAN_EKSISI" rows="2" style="width: 350px;" > </textarea>
                </td>
                <td> Dikirim untuk Pemerika PA</td>
                <td>
                    <input type="radio" name="KIRIM_PA" VALUE="Ya">Ya <br>
                    <input type="radio" name="KIRIM_PA" VALUE="Tidak"> Tidak
                </td>
            </tr> 
                
           <tr>
            <td>Nama Operasi</td>
            <td >
                <textarea name="NAMA_OPERASI" rows="2" style="width: 350px;" ><?php echo $_smarty_tpl->getVariable('rs_asuhan')->value['TINDAKAN_OP'];?>
 </textarea>
                </td>
               
            </tr> 

          
            <tr>
                    <td>Tanggal Operasi</td>
                    <td >
                        <input type="date" name="TGL_MULAI" rows="1" value="<?php echo $_smarty_tpl->getVariable('tgl')->value;?>
" style="width: 150px;" > </input>
                        </td>
                     <td colspan="2">Jam Operasi  
                            <input type="time" name="JAM_MULAI" rows="1"  style="width: 80px;" > </input>  sampai
                            <input type="time" name="JAM_SELESAI" rows="1"  style="width: 80px;" > </input>
                           
                      
                    </tr> 
            <tr>
                        <td>Laporan Operasi</td>
                        <td >
                            <textarea name="URAIAN_LAPORAN" rows="6" style="width: 350px;" > </textarea>
                            </td>
                          
                        </tr> 
                    <tr>
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
 <table class="table-input" width="100%">
     <tr>
                <th colspan="4">Shortcut Navigation</th>
            </tr>
<tr class="submit-box">
                <td colspan="5">
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('medis/rawat_inap/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-green">Asesmen Awal Medis Rawat Inap</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/ass_awal/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-red2">Asesmen Awal Keperawatan</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/ass_jatuh/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-blue2">Asesmen Jatuh</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/kep/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-green2">Rencana dan Tindakan Keperawatan</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/rm10/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-orange">Catatan Edukasi</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/rm17/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-pink">Catatan Pemberian Obat</a>
                    <!--<a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/dp/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-brown">Discharge Planning</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('farmasi/rekon/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-yellow">Rekonsiliasi Obat</a>
                    -->
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/resume/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-red">Resume Pasien Pulang</a>
                    <!--<a href="javascript:;" class="btn-green item_status_add">Status Pasien</a>-->
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'])).('/10'));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-red2">Hasil Penunjang</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('rm/rawat_jalan/resume/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_MR']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-blue2">Resume Rawat Jalan</a>
                </td> 
            </tr>
 </table>
<table class="table-view" width="100%">
    <tr class="headrow">
        <th colspan="6">List Laporan OP</th>
    </tr>
    <tr>
        <th width="25%">Tanggal</th>
        <th width="10%">Diagnosa Pre</th>
        <th width="10%">Diagnosa Pro</th>
        <th width="15%">Bagian Eksisi</th>
        <th width="10%">Nama Operasi </th>
        <th width="20%">Uraian</th>
        <th width="20%">Petugas</th>
      
    </tr>
    <?php  $_smarty_tpl->tpl_vars['cppt'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_lap_op')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cppt']->key => $_smarty_tpl->tpl_vars['cppt']->value){
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['TGL_MULAI'];?>
 Jam : 
            <?php echo $_smarty_tpl->tpl_vars['cppt']->value['JAM_MULAI'];?>
-<?php echo $_smarty_tpl->tpl_vars['cppt']->value['JAM_SELESAI'];?>

            <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_inap/cetak_lap_op/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['id']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['TANGGAL'],"%d %B %Y");?>
</a> 
        </td>
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['DIAGNOSA_PRE'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['DIAGNOSA_POST'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['BAGIAN_EKSISI'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['NAMA_OPERASI'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['URAIAN_LAPORAN'];?>
 </td>
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




  