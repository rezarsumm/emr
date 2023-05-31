<?php /* Smarty version Smarty-3.0.7, created on 2022-05-17 09:41:37
         compiled from "application/views\op/laporananes/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:1426162830b61369434-93448020%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b32078aa3a4d2633fb4023e383921d063da4ce26' => 
    array (
      0 => 'application/views\\op/laporananes/edit.html',
      1 => 1652622889,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1426162830b61369434-93448020',
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
        <small>Edit Data</small>
    </p>
    <div class="clear"></div>
</div> 
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/laporananes/edit_process');?>
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
         

          

            <tr>
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
                 
         <td width="20%">Nama Perawat Anestesi</td>
                <td width="20%">
                    <select name="KD_PERAWAT" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_perawat')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP']==$_smarty_tpl->getVariable('rs_lap_anes3')->value['KD_PERAWAT']){?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
</option>
                        <?php }else{ ?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
" ><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
</option>
                        <?php }?>
                        <?php }} ?>
                    </select>
                </td> 
            </tr>

 

            <tr>
                <td width="20%">Diagnosa Pre-operatif</td>
                <td width="20%">
                    <input type="text" name="DIAGNOSA_PRE" value="<?php echo $_smarty_tpl->getVariable('rs_lap_anes3')->value['DIAGNOSA_PRA'];?>
" class="form-control">
                </td>

                <td width="20%">Diagnosa Post-op</td>
                <td width="20%">
                    <input type="text" name="DIAGNOSA_POST" value="<?php echo $_smarty_tpl->getVariable('rs_lap_anes3')->value['DIAGNOSA_POST'];?>
" class="form-control">
                </td>
            </tr>



          
           <tr>
            <td>Tindakan Operasi</td>
            <td >
                <textarea name="TINDAKAN" rows="2" style="width: 350px;" ><?php echo $_smarty_tpl->getVariable('rs_lap_anes3')->value['TINDAKAN'];?>
 </textarea>
                </td>
                <td colspan="2">
                    <table>
                        <tr><td>Jenis Anestesi</td>
                            <td> <input type="radio" name="JENIS" <?php if ($_smarty_tpl->getVariable('rsrs_lap_anes3_sign_in2')->value['JENIS']=='Besar'){?> checked <?php }?> VALUE="Besar">Besar <br>
                            <input type="radio" name="JENIS" <?php if ($_smarty_tpl->getVariable('rs_lap_anes3')->value['JENIS']=='Sedang'){?> checked <?php }?> VALUE="Sedang">Sedang <br>
                            <input type="radio" name="JENIS" <?php if ($_smarty_tpl->getVariable('rs_lap_anes3')->value['JENIS']=='Kecil'){?> checked <?php }?> VALUE="Kecil"> Kecil</td>
                            <td style="padding-left:30px">Resiko Anestesi</td> 
                            <td> <input type="radio" name="RESIKO" <?php if ($_smarty_tpl->getVariable('rs_lap_anes3')->value['RESIKO']=='Besar'){?> checked <?php }?> VALUE="Besar">Besar <br>
                                <input type="radio" name="RESIKO" <?php if ($_smarty_tpl->getVariable('rs_lap_anes3')->value['RESIKO']=='Sedang'){?> checked <?php }?> VALUE="Sedang">Sedang <br>
                                <input type="radio" name="RESIKO"<?php if ($_smarty_tpl->getVariable('rs_lap_anes3')->value['RESIKO']=='Kecil'){?> checked <?php }?>  VALUE="Kecil"> Kecil</td></tr>
                    </table>
                
                </td>
            </tr> 
                
           <tr>
            <td><b>Pre_Operatif</b></td>
            <td >
                <textarea name="PEMERIKSAAN_FISIK"  rows="2" style="width: 350px;" > <?php echo $_smarty_tpl->getVariable('rs_lap_anes3')->value['TINDAKAN'];?>
</textarea>
                </td>
                <td>
                   Catatan Lain
                </td>
                <td>
                <textarea name="CATATAN_LAIN" rows="2" style="width: 350px;" > Alergi : <?php echo $_smarty_tpl->getVariable('rs_pra_anes')->value['RIWAYAT_ALERGI'];?>
 | Riwayat Sakit : <?php echo $_smarty_tpl->getVariable('rs_pra_anes')->value['RIWAYAT_SAKIT'];?>
 | Riwayat Sakit Keluarga : <?php echo $_smarty_tpl->getVariable('rs_pra_anes')->value['RIWAYAT_SAKIT_KELUARGA'];?>
 | Riwayat Op :  <?php echo $_smarty_tpl->getVariable('rs_pra_anes')->value['RIWAYAT_OP'];?>
  </textarea>   
                 </td>
               
            </tr> 

          
            <tr>
                    <td>Teknik Anestesia</td>
                    <td >
                        <input type="text" name="TEKNIS_ANESTESI"  value="<?php echo $_smarty_tpl->getVariable('rs_lap_anes3')->value['TEKNIS_ANESTESI'];?>
" class="form-control" style="width:350px"> </input>
                        </td>
                     </tr> 
           <tr>
                     <td><b>Obat Anestesia  </b></td>
                       <td colspan="3">
                        <table>
                                <tr><td>Premedikasi</td><td>  <input type="text" name="OBAT_PRE" value="<?php echo $_smarty_tpl->getVariable('rs_lap_anes3')->value['OBAT_PRE'];?>
" class="form-control"> </td><td>Muscal Relasan</td><td>  <input type="text" name="OBAT_MUSCAL" value="" class="form-control"> </td></tr>
                            <tr><td>Induksi</td><td>  <input type="text" name="OBAT_INDUKSI" value="<?php echo $_smarty_tpl->getVariable('rs_lap_anes3')->value['OBAT_INDUKSI'];?>
" class="form-control"> </td><td>  Maintenance</td><td>  <input type="text" name="OBAT_MAINT" value="" class="form-control"> </td></tr>
                            
                        </table>
                        </td>
             
           </tr>
           <tr>
            <td width="20%">Mulai Anestesi</td>
            <td width="20%">
                <input type="time" name="MULAI_ANEST"  class="form-control">
            </td>

            <td width="20%">Selesai Anestesi</td>
            <td width="20%">
                <input type="time" name="SELESAI_ANEST"   class="form-control">
            </td>
        </tr>

        <tr>
            <td width="20%">Obat Masuk</td>
            <td width="20%">
                <textarea name="OBAT_MASUK" rows="2" style="width: 350px;" > <?php echo $_smarty_tpl->getVariable('rs_lap_anes3')->value['OBAT_MASUK'];?>
</textarea>
            </td>

          
        </tr>

        <tr><td></td></tr>
        <tr>
            <td colspan="4">
                <table>
                    <tr>
                        <td style="width:600px"><b> Cairan Masuk </b><br>
                            <table>
                                <tr><td>RL</td><td>  <input type="text" name="RL" value="<?php echo $_smarty_tpl->getVariable('rs_lap_anes3')->value['RL'];?>
" class="form-control"> </td><td>Dextran</td><td>  <input type="text" name="DEXTRAN" value="" class="form-control"> </td></tr>
                                <tr><td>NaCL</td><td>  <input type="text" name="NACL" value="<?php echo $_smarty_tpl->getVariable('rs_lap_anes3')->value['NACL'];?>
" class="form-control"> </td><td>Darah</td><td>  <input type="text" name="DARAH_MASUK" value="" class="form-control"> </td></tr>
                              
                                <tr><td>Lain-lain</td><td>  <input type="text" name="CAIRAN_MASUK_LAIN" value="<?php echo $_smarty_tpl->getVariable('rs_lap_anes3')->value['CAIRAN_MASUK_LAIN'];?>
" class="form-control"> </td></tr>
                              </table>
                            </td>
                        <td><b>Cairan Keluar </b><br>
                            <table>
                                <tr><td>Pendarahan</td><td>  <input type="text" name="PENDARAHAN" value="<?php echo $_smarty_tpl->getVariable('rs_lap_anes3')->value['PENDARAHAN'];?>
" class="form-control"> </td></tr>
                                <tr><td>Urine</td><td>  <input type="text" name="URINE" value="<?php echo $_smarty_tpl->getVariable('rs_lap_anes3')->value['URINE'];?>
" class="form-control"> </td></tr>
                                <tr><td>Lain-lain</td><td>  <input type="text" name="CAIRAN_KELUAR_LAIN" value="<?php echo $_smarty_tpl->getVariable('rs_lap_anes3')->value['CAIRAN_KELUAR_LAIN'];?>
" class="form-control"> </td></tr>
                               
                              </table>
                            </td>
                    </tr>
                </table>

                </td>
         </tr>
         <tr>
            <td width="20%">Catatan</td>
            <td width="20%">
                <textarea name="CATATAN" rows="2" style="width: 350px;" ><?php echo $_smarty_tpl->getVariable('rs_lap_anes3')->value['CATATAN'];?>
 </textarea>
            </td>
            <td width="20%">Posisi</td>
            <td width="20%">
               <select name="POSISI">
                   <option value="Terlentang">Terlentang</option>
                   <option value="Tengkurap">Tengkurap</option>
                   <option value="Litotomi">Litotomi</option>
                   <option value="Miring">Miring</option>
                   <option value="Duduk">Duduk</option>
            </td> 
        </tr>
         <tr>
            <td>  Skala Nyeri</td>
            <td >
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

            <tr>
                <td colspan="2"><b><br> INSTRUKSI PASCA ANESTESIA </b> </td>
            </tr>
            <tr>
                <td width="20%">Bila Kesakitan</td>
                <td width="20%">
                    <input type="text" name="BILA_SAKIT" value="<?php echo $_smarty_tpl->getVariable('rs_lap_anes3')->value['BILA_SAKIT'];?>
"  class="form-control">
                </td>

                <td width="20%">Bila Mual</td>
                <td width="20%">
                    <input type="text" name="BILA_MUAL" value="<?php echo $_smarty_tpl->getVariable('rs_lap_anes3')->value['BILA_MUAL'];?>
" class="form-control">
                </td>
            </tr>
            <tr>
                <td width="20%">Antibiotik</td>
                <td width="20%">
                    <input type="text" name="ANTIBIOTIK" value="<?php echo $_smarty_tpl->getVariable('rs_lap_anes3')->value['ANTIBIOTIK'];?>
"  class="form-control">
                </td>

                <td width="20%">Obat Obatan Lain</td>
                <td width="20%">
                    <input type="text" name="OBAT_LAIN" value="<?php echo $_smarty_tpl->getVariable('rs_lap_anes3')->value['OBAT_LAIN'];?>
" class="form-control">
                </td>
            </tr>
            <tr>
                <td width="20%">MInum</td>
                <td width="20%">
                    <input type="text" name="MINUM" value="<?php echo $_smarty_tpl->getVariable('rs_lap_anes3')->value['MINUM'];?>
"  class="form-control">
                </td>

                <td width="20%">Infus</td>
                <td width="20%">
                    <input type="text" name="INFUS" value="<?php echo $_smarty_tpl->getVariable('rs_lap_anes3')->value['INFUS'];?>
" class="form-control">
                </td>
            </tr>
            <tr>
                <td width="20%">MOnitor</td>
                <td width="20%">
                    <input type="text" name="MONITOR" value="<?php echo $_smarty_tpl->getVariable('rs_lap_anes3')->value['MONITOR'];?>
"  class="form-control">
                </td>

               
            </tr>
            <tr>
                <td width="20%">Pindah Ke</td>
                <td width="20%">
                    <input type="text" name="PINDAH_KE"  value="<?php echo $_smarty_tpl->getVariable('rs_lap_anes3')->value['PINDAH_KE'];?>
"  class="form-control">
                </td>
                <td width="20%"> Jam </td>
                <td width="20%">
                    <input type="time" name="JAM_KELUAR" value="<?php echo $_smarty_tpl->getVariable('rs_lap_anes3')->value['JAM_KELUAR'];?>
"  class="form-control">
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
       $(".select2").select2({
            placeholder: "Pilih",
            allowClear: true
        });
</script>




  