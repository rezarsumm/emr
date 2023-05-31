<?php /* Smarty version Smarty-3.0.7, created on 2022-07-14 09:37:43
         compiled from "application/views\op/laporananes/add.html" */ ?>
<?php /*%%SmartyHeaderCode:2732862cf8177716b87-93332909%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '387de2366577dba4408f2d9a83afee7d2b6b5b1f' => 
    array (
      0 => 'application/views\\op/laporananes/add.html',
      1 => 1657766247,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2732862cf8177716b87-93332909',
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
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/laporananes/add_process2');?>
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
                <th colspan="2">Add Laporan Anestesi</th>
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
         

          

            <!-- <tr> -->
                <!-- <td width="20%">Nama Ahli Bedah </td>
                <td width="20%">
                    <select name="KD_ANESTESI" id="surat_dari" class="select2" style="width: 300px;">
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
                <!-- <td width="20%">Nama Perawat Anestesi</td>
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
                </td>  -->
            <!-- </tr> -->
            <input type="hidden" name="KD_PERAWAT" value="">
 

            <tr>
                <td width="20%">Diagnosa Pre-operatif</td>
                <td width="20%">
                    <input type="hidden" name="DIAGNOSA_PRA" value="<?php echo $_smarty_tpl->getVariable('rs_pra_anes')->value['DIAGNOSA'];?>
" class="form-control">
                    <input type="text" name="DIAGNOSA_PRA" value="<?php echo $_smarty_tpl->getVariable('rs_pra_anes')->value['DIAGNOSA'];?>
" class="form-control" disabled>
                </td>
            </tr>
                <tr>

                <td width="20%">Diagnosa Post-op</td>
                <td width="20%">
                    <input type="text" name="DIAGNOSA_POST" value="<?php echo $_smarty_tpl->getVariable('rs_pra_anes')->value['DIAGNOSA_POST'];?>
" class="form-control">
                </td>
            </tr>



           <tr>
            <td>Tindakan Operasi</td>
            <td >
                <textarea name="TINDAKAN" rows="2" style="width: 350px;" ><?php echo $_smarty_tpl->getVariable('rs_op')->value['nmtindakan'];?>
  </textarea>
                </td>
                <td colspan="2">
                    <table>
                        <tr><td>Jenis Anestesi</td>
                            <td> <input type="radio" name="JENIS" VALUE="Besar">Besar <br>
                            <input type="radio" name="JENIS" VALUE="Sedang">Sedang <br>
                            <input type="radio" name="JENIS" VALUE="Kecil"> Kecil</td>
                            <td style="padding-left:30px">Resiko Anestesi</td> 
                            <td> <input type="radio" name="RESIKO" VALUE="Besar">Besar <br>
                                <input type="radio" name="RESIKO" VALUE="Sedang">Sedang <br>
                                <input type="radio" name="RESIKO" VALUE="Kecil"> Kecil</td></tr>
                    </table>
                
                </td>
            </tr> 
                
           <tr>
            <td><b>Data Pre_Operatif</b></td>
            <td colspan="3">
                <textarea name="PRE_OP"  rows="12" style="width: 850px;" > <?php echo $_smarty_tpl->getVariable('rs_pra_anes')->value['PEMERIKSAAN_FISIK'];?>
 | Riwayat penyakit : <?php echo $_smarty_tpl->getVariable('rs_pra_anes')->value['RIWAYAT_SAKIT'];?>
 | Riwayat Op : <?php echo $_smarty_tpl->getVariable('rs_pra_anes')->value['RIWAYAT_OP'];?>
 | Jantung :  | Hb : <?php echo $_smarty_tpl->getVariable('rs_pra3')->value['HB'];?>
 | Ht : <?php echo $_smarty_tpl->getVariable('rs_pra3')->value['HEMATOKRIT'];?>
| 
                    EKG : <?php echo $_smarty_tpl->getVariable('rs_pra3')->value['EKG'];?>
 
                    Paru : <?php echo $_smarty_tpl->getVariable('rs_pra3')->value['RONTGEN'];?>
</textarea>
                </td>               
            </tr> 

          
            <tr>
                    <td><b>Teknik Anestesia </b></td>
                    <td >
                         <input type="radio"  class="rad" id="tanes" name="TEKNIS_ANESTESI" <?php if ($_smarty_tpl->getVariable('rs_pra_anes')->value['TEKNIS_ANESTESI']=='Spinal'){?> checked <?php }?> value="Spinal">Spinal
                         <input type="radio" class="rad" id="tanes" name="TEKNIS_ANESTESI" <?php if ($_smarty_tpl->getVariable('rs_pra_anes')->value['TEKNIS_ANESTESI']=='GA'){?> checked <?php }?> value="GA">GA
                        <input type="radio" class="rad" id="tanes" name="TEKNIS_ANESTESI" <?php if ($_smarty_tpl->getVariable('rs_pra_anes')->value['TEKNIS_ANESTESI']=='Tiva'){?> checked <?php }?> value="Tiva">Tiva
                     
                    </td>
           </tr> 

            <tr></tr>
            
           <tr>
                     <td><b>Obat Anestesia  </b></td> </tr>
            <tr>
                       <td colspan="4">
                        <table>
                                <tr><td>Premedikasi</td><td>  <input type="text" name="OBAT_PRE" value="" style="width:400px" class="form-control"> </td><td>Muscal Relasan</td><td>  <input type="text" style="width:400px" name="OBAT_MUSCAL" value="Atracurium, Reculax" class="form-control"> </td></tr>
                            <tr><td>Induksi</td><td>  <input type="text" name="OBAT_INDUKSI" value="" style="width:400px" class="form-control"> </td><td>  Maintenance</td><td>  <input type="text" style="width:400px" name="OBAT_MAINT" value="" class="form-control"> </td></tr>
                            
                        </table>
                        </td>
             
           </tr>
           <tr>
            <td width="20%">Waktu Anestesi</td>
            <td  colspan="3" width="80%">
                
            
                <input type="hidden" name="tanggalop" value="<?php echo $_smarty_tpl->getVariable('rs_op')->value['tanggalop'];?>
">

                <input type="time" name="MULAI_ANEST" style="width: 100px;" class="form-control">
            
                 sampai
                <input type="time" name="SELESAI_ANEST" style="width: 100px;" class="form-control">
            </td>
        </tr>

        <tr>
            <td width="20%">Obat Masuk</td>
            <td width="80%" colspan="2">
                 <!-- <select name="namaobat[]" class="namaobat select2"   multiple id="namaobat" cols="50" style="width:210px" onkeypress="handleKeyPress(event)">
                    <option></option> 
                 </select> -->
             
                <textarea name="OBAT_MASUK" rows="13" id="obatmasuk" style="width: 300px;" > </textarea>
            </td>

          
        </tr>

        <tr><td></td></tr>
        <tr>
            <td colspan="4">
                <table>
                    <tr>
                        <td style="width:600px"><b> Cairan Masuk </b><br>
                            <table>
                                <tr><td>RL</td><td>  <input type="text" name="RL" value="" class="form-control"> </td></tr>
                                <tr> <td>Dextran</td><td>  <input type="text" name="DEXTRAN" value="" class="form-control"> </td></tr>
                                <tr><td>NaCL</td><td>  <input type="text" name="NACL" value="" class="form-control"> </td> </tr>
                                <tr><td>Darah</td><td>  <input type="text" name="DARAH_MASUK" value="" class="form-control"> </td></tr>
                              
                                <tr><td>Lain-lain</td><td>  <input type="text" name="CAIRAN_MASUK_LAIN" value="" class="form-control"> </td></tr>
                              </table>
                            </td>
                        <td><b>Cairan Keluar </b><br>
                            <table>
                                <tr><td>Pendarahan</td><td>  <input type="text" name="PENDARAHAN" value="" class="form-control"> </td></tr>
                                <tr><td>Urine</td><td>  <input type="text" name="URINE" value="" class="form-control"> </td></tr>
                                <tr><td>Lain-lain</td><td>  <input type="text" name="CAIRAN_KELUAR_LAIN" value="" class="form-control"> </td></tr>
                               
                              </table>
                            </td>
                    </tr>
                </table>

                </td>
         </tr>
         <tr>
            <td width="40%">Catatan/Komplikasi/Penanganan</td>
            <td width="20%">
                <textarea name="CATATAN" rows="2" style="width: 350px;" > </textarea>
            </td>
            <td colspan="2">
                 <table>
                     <tr>
                        <td  >Posisi</td>
                        <td width="30%">
                           <select name="POSISI">
                               <option value="Terlentang">Terlentang</option>
                               <option value="Tengkurap">Tengkurap</option>
                               <option value="Litotomi">Litotomi</option>
                               <option value="Miring">Miring</option>
                               <option value="Duduk">Duduk</option>
                        </td> 
                   
                        <td>  Skala Nyeri 
                            <select name="SKALA_NYERI">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                            </td> 
                     </tr>
                 </table>
                 </td>
            </tr>

            <tr>
                <td colspan="2"><b><br> INSTRUKSI PASCA ANESTESIA </b> </td>
            </tr>
            <tr>
                <td width="20%">Bila Kesakitan</td>
                <td colspan="3" width="80%">
                    <input type="text" name="BILA_SAKIT" style="width: 600px"  class="form-control">
                </td>
            </tr>
            <tr> 
                 <td width="20%">Bila Mual</td>
                 <td colspan="3" width="80%">
                    <input type="text" name="BILA_MUAL" style="width: 600px" class="form-control">
                </td>
            </tr>
            <tr>
                <td width="20%">Antibiotik</td>
                <td colspan="3" width="80%">
                    <input type="text" name="ANTIBIOTIK" style="width: 600px"  class="form-control">
                </td>
            </tr>
            <tr>
                <td width="20%">Obat Obatan Lain</td>
                <td colspan="3" width="80%">
                    <input type="text" name="OBAT_LAIN" style="width: 600px" class="form-control">
                </td>
            </tr>
            <tr>
                <td width="20%">MInum</td>
                <td colspan="3" width="80%">
                    <input type="text" name="MINUM" style="width: 600px"  class="form-control">
                </td>
            </tr>
            <tr>
                <td width="20%">Infus</td>
                <td colspan="3" width="80%">
                    <input type="text" name="INFUS" style="width: 600px" class="form-control">
                </td>
            </tr>
            <tr>
                <td width="20%">Monitor</td>
                <td colspan="3" width="80%">
                    <input type="text" name="MONITOR" style="width: 600px"  class="form-control">
                </td>     
            </tr>
            <tr>
                <td width="20%">Pindah Ke</td>
                <td width="20%" colspan="2">
                    <input type="text" name="PINDAH_KE"  style="width: 600px" class="form-control">
                 Jam  
                    <input type="time" name="JAM_KELUAR"   class="form-control">
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
        <th width="10%">Diagnosa </th>
        <th width="10%"> Tindakan</th>
        <th width="20%">Anestesi </th>
        <th width="20%">Ket </th>
        <th width="15%">Petugas</th>
      
    </tr>
    <?php  $_smarty_tpl->tpl_vars['cppt'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_lap_anes')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cppt']->key => $_smarty_tpl->tpl_vars['cppt']->value){
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['TGL'];?>
 jam <?php echo $_smarty_tpl->tpl_vars['cppt']->value['MULAI_ANEST'];?>
 - <?php echo $_smarty_tpl->tpl_vars['cppt']->value['SELESAI_ANEST'];?>
  
            <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_inap/cetak_lap_anes/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['id']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['TANGGAL'],"%d %B %Y");?>
</a> 
        </td>
        <td>pra : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['DIAGNOSA_PRA'];?>
<BR>
            post : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['DIAGNOSA_POST'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['TINDAKAN'];?>
</td>
        <td>
            Jenis : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['JENIS'];?>
 <br>
            Resiko : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['RESIKO'];?>
 <br>
            Teknik : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['TEKNIS_ANESTESI'];?>
 <br>
            Obat Predikasi : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['OBAT_PRE'];?>
 <br>
            Obat Induksi : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['OBAT_INDUKSI'];?>
 <br>
            Obat Muscal Relasan : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['OBAT_MUSCAL'];?>
 <br>
            Obat Maintenance : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['OBAT_MAINT'];?>
 <br></td>
        <td>
                Cairan Masuk : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['NACL'];?>
 NaCL, <?php echo $_smarty_tpl->tpl_vars['cppt']->value['RL'];?>
 RL, <?php echo $_smarty_tpl->tpl_vars['cppt']->value['DEXTRAN'];?>
 Dextran, <?php echo $_smarty_tpl->tpl_vars['cppt']->value['DARAH'];?>
 Darah, <?php echo $_smarty_tpl->tpl_vars['cppt']->value['CAIRAN_MASUK_LAIN'];?>
  <br>
                Obat Masuk : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['OBAT_MASUK'];?>
 <br>
                Cairan Keluar : Pendarahn : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['PENDARAHAN'];?>
, Urine : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['URINE'];?>
, <?php echo $_smarty_tpl->tpl_vars['cppt']->value['CAIRAN_KELUAR_LAIN'];?>
 <br>
             </td>
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['NAMALENGKAP'];?>
 </td>
  

    </tr>
    <?php }} ?>
</table>
<script>

function handleKeyPress(e){
                   var yhr= new XMLHttpRequest();
                var key=e.keyCode || e.which;
                 if (key==13){
                               var namaobat = $(".namaobat").val();
                              var obatmasuk= document.getElementById("obatmasuk");
        
                $('.obatmasuk').val(obatmasuk+'\n'.namaobat); 
                   $('#namaobat').select2('data', null);
         
               //    $("#namaobat").select2({}).focus();
                  $("#namaobat").select2('open');
        
                 }
               }
               
       $(".select2").select2({
            placeholder: "Pilih",
            allowClear: true
        });

        var tanes=$("#tanes").val();
        if(tanes==='Spinal'){
            $("#obatmasuk").val("Sepinocain no 26 \n Bunascan \n Epedrin \n Henscon (7, 7,5) \n Spuid 5,10cc \n O2 (60L/30menit)");
        }
        else    if(tanes==='Tiva'){
            $("#obatmasuk").val("Sedacum \n Ketemin \n Fentanyl \n Profopol \n Tramadol \n Sulfat atropin(sa) \n Sepuit 3,5,10cc \n O2(60L/30menit)");
        }
        else    if(tanes==='GA'){
            $("#obatmasuk").val("fentanyl \n Profopol \n Reculax \n Tramadol \n Ketrolak(bila tidak ada riwayat sakit asma) \n Sulfat atropin(sa) \n Neostigmine \n Spuit 3,5,10cc \n Ondansentron \n Rl \n O2 (60L/30menit) \n N2o (60L/30menit) \n Sevofluran(15/30menit)");
        }

        $(function(){
      $(":radio.rad").click(function(){
        if($(this).val() == "GA"){
            $("#obatmasuk").val("fentanyl \n Profopol \n Reculax \n Tramadol \n Ketrolak(bila tidak ada riwayat sakit asma) \n Sulfat atropin(sa) \n Neostigmine \n Spuit 3,5,10cc \n Ondansentron \n Rl \n O2 (60L/30menit) \n N2o (60L/30menit) \n Sevofluran(15/30menit)");
        }else if($(this).val() == "Tiva"){
            $("#obatmasuk").val("Sedacum \n Ketemin \n Fentanyl \n Profopol \n Tramadol \n Sulfat atropin(sa) \n Sepuit 3,5,10cc \n O2(60L/30menit)");
        }else if($(this).val() == "Spinal"){
            $("#obatmasuk").val("Sepinocain no 26 \n Bunascan \n Epedrin \n Henscon (7, 7,5) \n Spuid 5,10cc \n O2 (60L/30menit)");
        }
      });
    });
    
</script>

<script type="text/javascript"> 
    var user = $("#user").val(); 

    $('#namaobat').select2('data', null);
            $('#namaobat').select2('data', null);
            $("#namaobat").removeAttr("disabled");

            jQuery("#namaobat").html('');
            $.ajax({ 
            type: "POST", 
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/list_nama_obat/');?>
",
                    data: "user=" + user,
                    dataType: 'json',
                    success: function(data) {
                    var showData;
                            jQuery.each(data, function(index, result) {
                            if (result.value == 0) {
                            } else {
                            showData += "<option value='" + result.value + "'>" + result.label + "</option>";
                            }
                            })
                            jQuery("#namaobat").html(showData);
                    }
            });
            //tags


          
           
</script>




  