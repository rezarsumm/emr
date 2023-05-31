<?php /* Smarty version Smarty-3.0.7, created on 2022-09-02 18:04:34
         compiled from "application/views\igd/medis/add.html" */ ?>
<?php /*%%SmartyHeaderCode:255476311e342985df1-47726845%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4331a8059ce26cd0ca19ab684da8bc2550ce37aa' => 
    array (
      0 => 'application/views\\igd/medis/add.html',
      1 => 1659410696,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '255476311e342985df1-47726845',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("inap/ass_awal_bidan/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

 

<div class="breadcrum">
    <p> 
        <a href="#">IGD</a><span></span>
         <small>Add Data Asesmen Medis IGD</small>
    </p>
    <div class="clear"></div>
</div> 
<div class="content-entry">
    <!-- notification template -->
     <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('igd/medis/add_process');?>
" method="post" onkeypress="return event.keyCode != 13">
        <input name="FS_KD_REG" id="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />
        <input name="FS_KD_LAYANAN" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['KODE_BANGSAL'];?>
" />
        <input name="FS_KD_PETUGAS_MEDIS" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_medis'];?>
" />

        <table class="table-info" width="100%">
            <tr class="headrow">
                <th colspan="2"></th>
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
            <tr>
                <td>UMUR</td>
                <td><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fn_umur'];?>
 Tahun</td>
            </tr>
        </table>
       
        <table class="table-input" width="100%">
            <tr>
               <td>Kendaraan</td>
               <td>  
                     <input type="radio" name="KENDARAAN" <?php if ($_smarty_tpl->getVariable('rs_triase')->value['CARA_MASUK']=='Brandkar'){?> checked <?php }?> value="Pribadi"  /> Pribadi 
                      <input type="radio" name="KENDARAAN" <?php if ($_smarty_tpl->getVariable('rs_triase')->value['CARA_MASUK']=='Kursi Roda'){?> checked <?php }?> value="Ambulance"  /> Ambulance
                 </td></tr>  
             <tr>
                <td>Rujukan Dari</td>
                <td> <input type="text" name="RUJUKAN" size="40" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['rujukan_dari'];?>
">  </td></tr>  
                
                <tr class="headrow">
                    <th colspan="4">I. SUBYEKTIF  </th>
                    
                </tr>
            <tr>
                <td>Keluhan Utama</td>
                <td colspan="3"><textarea style="width: 600px;" name="FS_ANAMNESA"  ><?php if ($_smarty_tpl->getVariable('perawat')->value['KEL_UTAMA']!=''){?><?php echo $_smarty_tpl->getVariable('perawat')->value['KEL_UTAMA'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('bidan')->value['FS_ANAMNESA'];?>
<?php }?></textarea></td>
                
            </tr>
            <tr> 
                <td width='20%'>Riwayat Penyakit Sekarang</td>
                <td width='40%'>
                    <textarea style="width: 300px;" name="RIW_PENYAKIT_NOW"  ><?php if ($_smarty_tpl->getVariable('perawat')->value['KEL_SEKARANG']!=''){?><?php echo $_smarty_tpl->getVariable('perawat')->value['KEL_SEKARANG'];?>
<?php }?> </textarea>

                </td>
               
                <td width='20%'>Riwayat Penyakit dahulu</td>
                <td width='40%'>
                    <input type="text" name="FS_RIW_PENYAKIT_DAHULU" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('perawat')->value['RIWAYAT_SAKIT'])===null||$tmp==='' ? '-' : $tmp);?>
" size="32">
                </td>
            </tr>
            <tr>
                <td width='20%'>Riwayat Perawatan Sebelumnya</td>
                <td width='40%'>
                    <input type="text" name="RIW_PERAWATAN" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result3')->value['FS_RIW_PENYAKIT_DAHULU'])===null||$tmp==='' ? '-' : $tmp);?>
" size="32">
                </td>
                <td width='20%'>Terapi & Tindakan yang pernah dilakukan</td>
                <td width='30%'>
                    <input type="text" name="RIW_TINDAKAN" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result3')->value['FS_RIW_PENYAKIT_DAHULU2'])===null||$tmp==='' ? '-' : $tmp);?>
" size="32">
                </td>
                <!-- <td width='20%'>Riwayat penyakit keluarga</td>
                <td width='30%'>
                    <input type="text" name="FS_RIW_PENYAKIT_DAHULU2" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result3')->value['FS_RIW_PENYAKIT_DAHULU2'])===null||$tmp==='' ? '-' : $tmp);?>
" size="32">
                </td> -->
            </tr>
 
            <tr>
                <td width='20%'>Riwayat Alergi</td>
                <td width='30%'>
                    <input type="text" name="FS_ALERGI" <?php if ($_smarty_tpl->getVariable('perawat')->value['RIWAYAT_ALERGI_MAKANAN']!=''){?> value="<?php echo $_smarty_tpl->getVariable('perawat')->value['RIWAYAT_ALERGI_MAKANAN'];?>
" <?php }else{ ?>  value="<?php echo $_smarty_tpl->getVariable('result3')->value['FS_ALERGI'];?>
" <?php }?>>
                    <em style="color:red">* Wajib Diisi</em>
                </td>
                <td width='20%'>Reaksi Alergi</td>
                <td width='30%'>
                    <input type="text" name="FS_REAK_ALERGI"  value="<?php echo $_smarty_tpl->getVariable('result3')->value['FS_REAK_ALERGI'];?>
">
                    <em style="color:red">* Wajib Diisi</em>
                </td>
            </tr>

            <tr><td colspan="4"> <br><br>Bio Sosio Kultural</td></tr>
            <tr>
                <td width='20%'>Status Pernikahan  </td>
                <td width='30%'> 
                    <input type="radio" name="PERNIKAHAN"  <?php if ($_smarty_tpl->getVariable('perawat')->value['MENIKAH']=='Belum'){?> checked <?php }?>   value="Belum">Belum
                    <input type="radio" name="PERNIKAHAN" <?php if ($_smarty_tpl->getVariable('perawat')->value['MENIKAH']=='Menikah'){?> checked <?php }?>   value="Menikah">Menikah
                    <input type="radio" name="PERNIKAHAN"  <?php if ($_smarty_tpl->getVariable('perawat')->value['MENIKAH']=='Janda/Duda'){?> checked <?php }?>  value="Janda/Duda">Janda/Duda
                 </td>
                <td width='20%'>Pekerjaan    </td>
                <td width='30%'>
                     <input type="text" name="JOB" value="<?php echo $_smarty_tpl->getVariable('perawat')->value['JOB'];?>
"  value=" "> 
                </td>
            </tr>

            <tr>
                <td width='20%'>Agama</td>
                <td width='30%'>
                    <select name="FS_AGAMA" id="surat_dari" class="select2" style="width: 190px;">
                        <option value="1">Islam</option>
                        <option value="2">Kristen</option>
                        <option value="3">Katholik</option>
                        <option value="4">Hindu</option>
                        <option value="5">Buda</option>
                        <option value="6">Konghucu</option>
                    </select>
                </td>
                <td width='20%'>Suku    </td>
                <td>
                    <input type="text" name="SUKU"  value="<?php echo $_smarty_tpl->getVariable('perawat')->value['SUKU'];?>
"> 

                </td>
             </tr>

             <tr class="headrow">
                <th colspan="4">II. OBJEKTIF  </th>
                
            </tr>
            <tr>
                <td width='20%'>Status Psikologis</td>
                <td width='30%'>
                    <select name="FS_STATUS_PSIK">
                        <option value=""  <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']==''){?> selected="" <?php }?>  onclick='document.getElementById("civstaton3").disabled = true'>--Pilih Data--</option>
                        <option value="1" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']=='1'){?> selected="" <?php }?> onclick='document.getElementById("civstaton3").disabled = true'>Tenang</option>
                        <option value="2" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']=='2'){?> selected="" <?php }?> onclick='document.getElementById("civstaton3").disabled = true'>Cemas</option>
                        <option value="3" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']=='3'){?> selected="" <?php }?> onclick='document.getElementById("civstaton3").disabled = true'>Takut</option>
                        <option value="4" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']=='4'){?> selected="" <?php }?> onclick='document.getElementById("civstaton3").disabled = true'>Marah</option>
                        <option value="5" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']=='5'){?> selected="" <?php }?> onclick='document.getElementById("civstaton3").disabled = true'>Sedih</option>
                        <option value="6" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']!=''&&$_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']!='1'&&$_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']!='2'&&$_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']!='3'&&$_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']!='4'&&$_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']!='5'){?>selected="" <?php }?>onclick='document.getElementById("civstaton3").disabled = false'>Lainnya</option>
                    </select>
                    <br><br>
                    <!-- <input type="text" name="FS_STATUS_PSIK2" id="civstaton3" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK2']=='0'){?>disabled=""<?php }?> size="27" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK2'];?>
"> -->
                </td>
                <td width='20%'>Status Mental</td>
                <td width='30%'>
                    <select name="MENTAL">
                         <option value="Kooperatif" <?php if ($_smarty_tpl->getVariable('ases2')->value['MENTAL']=='1'){?> selected="" <?php }?> 
                         onclick='document.getElementById("civstaton3").disabled = true'>Kooperatif</option>
                         <option value="Tidak Kooperatif" <?php if ($_smarty_tpl->getVariable('ases2')->value['MENTAL']=='1'){?> selected="" <?php }?> 
                         onclick='document.getElementById("civstaton3").disabled = true'>Tidak Kooperatif</option>
                         <option value="Gelisah" <?php if ($_smarty_tpl->getVariable('ases2')->value['MENTAL']=='1'){?> selected="" <?php }?> 
                         onclick='document.getElementById("civstaton3").disabled = true'>Gelisah</option>
                       </select>
                    <br><br>
                 </td>
                <!-- <td width='39%'>Hubungan dengan anggota keluarga</td>
                <td width='30%'>
                    <select name="FS_HUB_KELUARGA" id="surat_dari" class="select2" style="width: 170px;">
                        <option value="" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_HUB_KELUARGA']==''){?> selected="" <?php }?>>--Pilih Data--</option>
                        <option value="1" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_HUB_KELUARGA']=='1'){?> selected="" <?php }?>>Baik</option>
                        <option value="2" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_HUB_KELUARGA']=='2'){?> selected="" <?php }?>>Tidak Baik</option>
    
                    </select>
                </td> -->
            </tr>
            <tr><td width='40%'>Tanda Tanda Vital  </td>
                <td width='40%'>
                    <textarea name="PEMERIKSAAN_FISIK" rows="10" style="width:250px;">
                        Kesadaran : <?php if ($_smarty_tpl->getVariable('perawat')->value['KESADARAN']!=''){?><?php echo $_smarty_tpl->getVariable('perawat')->value['KESADARAN'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('bidan')->value['SADAR'];?>
<?php }?>      
                        Suhu      : <?php if ($_smarty_tpl->getVariable('perawat')->value['S']!=''){?><?php echo $_smarty_tpl->getVariable('perawat')->value['S'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('bidan')->value['S'];?>
<?php }?>C
                        Nadi      : <?php if ($_smarty_tpl->getVariable('perawat')->value['N']!=''){?><?php echo $_smarty_tpl->getVariable('vs')->value['N'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('bidan')->value['N'];?>
<?php }?>x/menit            
                        R         : <?php if ($_smarty_tpl->getVariable('perawat')->value['R']!=''){?><?php echo $_smarty_tpl->getVariable('perawat')->value['R'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('bidan')->value['R'];?>
<?php }?> x/menit      
                        TD        : <?php if ($_smarty_tpl->getVariable('perawat')->value['TD']!=''){?><?php echo $_smarty_tpl->getVariable('perawat')->value['TD'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('bidan')->value['TD'];?>
<?php }?>MmHg
                        TB        : <?php if ($_smarty_tpl->getVariable('perawat')->value['TB']!=''){?><?php echo $_smarty_tpl->getVariable('perawat')->value['TB'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('bidan')->value['TB'];?>
<?php }?>cm                
                        BB        : <?php if ($_smarty_tpl->getVariable('perawat')->value['BB']!=''){?><?php echo $_smarty_tpl->getVariable('perawat')->value['BB'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('bidan')->value['BB'];?>
<?php }?>kg           
                        GCS       : <?php echo $_smarty_tpl->getVariable('perawat')->value['GCS'];?>
   
                 </textarea>
                </td>
                <td colspan="2">
                    <table>
                        <tr>  <td>  Lingkar Kepala</td><td><input type="text" name="LINGKAR_KEPALA" value="<?php echo $_smarty_tpl->getVariable('perawat')->value['LINGKAR_KEPALA'];?>
"></td></tr>
                      
                         <tr>  <td> Skor Nyeri</td><td>  <input type="text" name="NYERIS" value="<?php echo $_smarty_tpl->getVariable('nyeri')->value['NYERIS'];?>
"></td></tr>
                         <tr>  <td> Alat Bantu</td><td>  <input type="text" name="ALAT_BANTU" value="<?php echo $_smarty_tpl->getVariable('nyeri')->value['NYERIS'];?>
"></td></tr>
                         <tr>  <td>    Cacat Tubuh</td><td>  <input type="text" name="CACAT" value="<?php echo $_smarty_tpl->getVariable('nyeri')->value['NYERIS'];?>
"></td></tr>
                         <tr>  <td>    ADL</td><td>  <input type="text" name="ADL" value="<?php echo $_smarty_tpl->getVariable('nyeri')->value['NYERIS'];?>
"></td></tr>
                       
                         
                    </table>
                   
                  
                </td>
            </tr>
            <tr>  <td>  Status Gizi</td>
                  <td> 
                    <input type="radio" name="STATUS_GIZI" checked value="Baik">Baik
                    <input type="radio" name="STATUS_GIZI" value="Cukup">Cukup
                    <input type="radio" name="STATUS_GIZI" value="Kurang">Kurang
                </td> 
                 <td>    Resiko Jatuh</td><td>  
                    <input type="radio" name="RESIKO_JATUH" checked value="Ringan">Ringan
                    <input type="radio" name="RESIKO_JATUH" value="Sedang">Sedang
                    <input type="radio" name="RESIKO_JATUH" value="Berat">Berat
                </td></tr>
       
 <tr class="headrow">
            <th colspan="4"> </th> 
        </tr>
        <tr>
            <td width='40%'>Konjungtiva  </td>
            <td width='40%'>
                <input type="radio" name="KONJUNGTIVA" <?php if ($_smarty_tpl->getVariable('medis')->value['KONJUNGTIVA']=='Pucat'){?> checked="" <?php }?> value="Pucat">Pucat
                <input type="radio" name="KONJUNGTIVA" <?php if ($_smarty_tpl->getVariable('medis')->value['KONJUNGTIVA']=='Pink'){?> checked="" <?php }?> value="Pink">Pink
                <input type="hidden" name="KONJUNGTIVA" value="">
            </td>
            <td width='40%'>Deviasi Trakea  </td>
            <td width='40%'>
                <input type="radio" name="DEVIASI" <?php if ($_smarty_tpl->getVariable('medis')->value['DEVIASI']=='Kanan'){?> checked="" <?php }?>  value="Kanan">Kanan
                <input type="radio" name="DEVIASI" <?php if ($_smarty_tpl->getVariable('medis')->value['DEVIASI']=='Kiri'){?> checked="" <?php }?> value="Kiri"> Kiri
                <input type="radio" name="DEVIASI" <?php if ($_smarty_tpl->getVariable('medis')->value['DEVIASI']==''){?> checked="" <?php }?> value=""> Tidak Ada
                <input type="hidden" name="DEVIASI" value="">
                
            </td>
         </tr>
         <tr>
            <td width='20%'>Skelera  </td>
            <td width='40%'>
                <input type="radio" name="SKELERA" <?php if ($_smarty_tpl->getVariable('medis')->value['SKELERA']=='Ikterik'){?> checked="" <?php }?> value="Ikterik">Ikterik
                <input type="radio" name="SKELERA" <?php if ($_smarty_tpl->getVariable('medis')->value['SKELERA']=='Tidak'){?> checked="" <?php }?> value="Tidak"> Tidak Ikterik
                <input type="hidden" name="SKELERA" value="">
                
            </td>
            <td width='20%'>JVP  </td>
            <td width='40%'>
                <input type="radio" name="JVP" <?php if ($_smarty_tpl->getVariable('medis')->value['JVP']=='Meningkat'){?> checked="" <?php }?>  value="Meningkat">Meningkat
                <input type="radio" name="JVP" <?php if ($_smarty_tpl->getVariable('medis')->value['JVP']=='Tidak'){?> checked="" <?php }?>   value="Tidak"> Tidak 
                <input type="hidden" name="JVP" value="">
            
         </tr>
         <tr>
            <td width='20%'>Bibir/Lidah  </td>
            <td width='40%'>
                <input type="radio" name="BIBIR" <?php if ($_smarty_tpl->getVariable('medis')->value['BIBIR']=='Sianosis'){?> checked="" <?php }?>  value="Sianosis">Sianosis
                <input type="radio" name="BIBIR" <?php if ($_smarty_tpl->getVariable('medis')->value['BIBIR']=='Tidak'){?> checked="" <?php }?>  value="Tidak"> Tidak
                <input type="hidden" name="BIBIR" value="">
                
            </td>
         </tr>
         <tr>
            <td width='20%'>Mukosa </td>
            <td width='40%'>
                <input type="radio" name="MUKOSA" <?php if ($_smarty_tpl->getVariable('medis')->value['MUKOSA']=='Kering'){?> checked="" <?php }?>  value="Kering">Kering
                <input type="radio" name="MUKOSA" <?php if ($_smarty_tpl->getVariable('medis')->value['MUKOSA']=='Tidak'){?> checked="" <?php }?>  value="Tidak"> Basah
                <input type="hidden" name="MUKOSA" value="">
          
            </td>
         </tr>

         <tr class="headrow">
            <th colspan="2">THORAX  </th>
            <th colspan="2"> JANTUNG </th>
        </tr>
        <tr>
            <td colspan="2">
                <textarea cols="80" rows="1" name="THORAX"> <?php echo $_smarty_tpl->getVariable('medis')->value['THORAX'];?>
</textarea>
            </td>
            <td colspan="2">
                <textarea cols="80" rows="1" name="JANTUNG"><?php echo $_smarty_tpl->getVariable('medis')->value['JANTUNG'];?>
</textarea>

            </td>
        </tr>

        <tr class="headrow">
            <th colspan="2">PARU  </th>
            <th colspan="2"> ABDOMEN & PINGGANG </th>
        </tr>
        <tr>
            <td colspan="2">
                <textarea cols="80" rows="1" name="ABDOMEN"><?php echo $_smarty_tpl->getVariable('medis')->value['ABDOMEN'];?>
 </textarea>
            </td>
            <td colspan="2">
                <textarea cols="80" rows="1" name="PINGGANG"> <?php echo $_smarty_tpl->getVariable('medis')->value['PINGGANG'];?>
 </textarea>

            </td>
        </tr>

        <tr class="headrow">
            <th colspan="4">EKSTREMITAS  </th> 
        </tr>
        <tr>
            <td colspan="2"> Atas
                <textarea cols="75" rows="1" name="EKS_ATAS"><?php echo $_smarty_tpl->getVariable('medis')->value['EKS_ATAS'];?>
 </textarea>
            </td>
            <td colspan="2">Bawah
                <textarea cols="73" rows="1" name="EKS_BAWAH"><?php echo $_smarty_tpl->getVariable('medis')->value['EKS_BAWAH'];?>
 </textarea>

            </td>
        </tr>
             
        <tr class="headrow">
            <th colspan="4">  Pemeriksaan Penunjang</th>
        </tr>
        <tr>
            <td>Laboratorium</td>
            <td><select name="rlab[]" multiple id="rlab" style="width:250px">
                <option></option>
                </select></td>
            <td>Radiologi</td>
            <td>   <select name="rrad[]" multiple id="rrad" style="width:200px">
                <option></option>
            </select></td>
        </tr>
    


            <tr class="headrow">
                <th colspan="2">Daftar Masalah</th>
                <th colspan="2">Diagnosa</th>
            </tr>
            <tr>
                <td colspan="2">
                      <textarea cols="80" rows="3"  name="MASALAH_KES">
                       <?php echo $_smarty_tpl->getVariable('medis')->value['FS_DAFTAR_MASALAH'];?>

                    </textarea>

                </td>
                <td colspan="2">
                    <textarea cols="80" rows="1" name="FS_DIAGNOSA"><?php echo $_smarty_tpl->getVariable('medis')->value['FS_DIAGNOSA'];?>
  </textarea><br>
                        Kode ICD 10 ( bila terdiagnosa TBC)
                        <select name="kode_icd_x"  class="select2" id="kode" style="width:300px">
                         <option value=""></option>
                         <?php  $_smarty_tpl->tpl_vars['kode'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('icd')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['kode']->key => $_smarty_tpl->tpl_vars['kode']->value){
?> 
                         <option value="<?php echo $_smarty_tpl->tpl_vars['kode']->value['KODE'];?>
"><?php echo $_smarty_tpl->tpl_vars['kode']->value['KET'];?>
 | <?php echo $_smarty_tpl->tpl_vars['kode']->value['KODE'];?>
</option>
                         <?php }} ?>
                         </select>
                   

                </td>
            </tr>
            <tr class="headrow">
                    <th colspan="2">Rencana Tindakan</th>
                    <th colspan="2">Diet</th>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea cols="80" rows="1" name="RENCANA"><?php echo $_smarty_tpl->getVariable('result2')->value['FS_TINDAKAN'];?>
</textarea>
                 </td>
                 <td colspan="2">
                    <textarea cols="80" rows="1" name="DIET"> </textarea>
                 </td>
            </tr>
         
               <tr class="headrow">
                <th colspan="2">Resep</th>
                <th colspan="2">  KONSUL DPJP</th>
            </tr>
            <tr>
                <td colspan="2">   
                     <table>
                    <tr>
                        <td> Nama Obat </td>
                        <td> Numero </td>
                        <td> Signa </td>
                    </tr>
                     <tr> 
                            <td>  <select name="namaobat[]" class="namaobat select2"   multiple id="namaobat" cols="80" style="width:210px">
                                 <option></option> 
                              </select>
                            </td>
                            <td ><input cols="5" type="text" class="numero" name="numero" style="width: 40px;" onkeypress="handleKeyPress(event)" ></td>
                            <td><input cols="20" type="text" name="dosis" class="dosis" style="width: 50px;" onkeypress="handleKeyPress(event)"></td>
                        </tr>
                   </table>


                    <textarea rows="15" class="form-control resep"  cols="60" name="FS_TERAPI"> 
                        <?php echo $_smarty_tpl->getVariable('data')->value['FS_TERAPI'];?>

                        
                    </textarea> 
                </td> 
               <td colspan="2"> Dokter Spesialis
                <select name="KD_DOKTER_KONSUL" id="surat_dari" class="select2" style="width: 300px;">
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
                <br><br>Uraian Konsul (Tanggal, Jam, Instruksi) <br><br>
                <textarea rows="14" class="form-control"  cols="60" name="KONSUL"> </textarea>
                
               </td>
               
            </tr>

            <tr>
                <td>Edukasi</td>
                <td colspan="4">
                   <input type="text" name="EDUKASI" style="width: 250px;">
                </td></tr>
           <tr>
                 <td>Discharge Planning</td>
                <td colspan="1">
                 <input type="radio" name="D_PLANNING" checked class="rad" value="Pulang"> Pulang
                 <input type="radio" name="D_PLANNING" class="rad" value="Inap"> Inap
                 <input type="radio" name="D_PLANNING" class="rad" value="Kontrol"> Kontrol Poli
                 <input type="radio" name="D_PLANNING" class="rad" value="Rujuk"> Rujuk
                 </td>
                 </tr>
            <tr id="form2" style="display: none;">
                <td  > Alasan Rujuk   <input type="text" name="ALASAN_RUJUK"></td>
                <td >  Transport keluar<br>  
                         <input type="radio" name="TRANSPORT_KELUAR" value="Ambulance RS">Ambulance RS <br>
                     <input type="radio" name="TRANSPORT_KELUAR" value="Ambulance 118">Ambulance 118<br>
                     <input type="radio" checked name="TRANSPORT_KELUAR" value="Pribadi">Pribadi <br>
                    </td>
                  
           </tr>
           <tr>
            <td>Kondisi Akhir Pasien</td>
            <td>
               <input type="radio" checked name="KONDISI_AKHIR" value="Membaik">Membaik
               <input type="radio" name="KONDISI_AKHIR" value="Tetap">Tetap
               <input type="radio" name="KONDISI_AKHIR" value="Memburuk">Memburuk
               <input type="radio" name="KONDISI_AKHIR" value="Meninggal">Meninggal
            </td>
            <td>Jam Selesai diperiksa</td>
            <td><input type="time" name="JAM_SELESAI"></td>
       </tr>

 
           

          <tr class="submit-box">
                <td colspan="4">
                    <input type="submit" name="save" value="Simpan" class="edit-button"/>
                </td>
            </tr>
           



        </table>
    </form>
</div>

 

<script type="text/javascript"> 
    var user = $("#user").val(); 
           
    $(".select2").select2({
            placeholder: "Pilih",
            allowClear: true
        });
            $("#namaobat").select2({});
    
     
//rencana lab
           $('#rlab').select2('data', null);
            $('#rlab').select2('data', null);
            $("#rlab").removeAttr("disabled");
            jQuery("#rlab").html('');
            $.ajax({
            type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/list_pemeriksaan_rlab/');?>
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
                            jQuery("#rlab").html(showData);
                    }
            });
             $("#rlab").select2({});



             //rencana radiologi
               $('#rrad').select2('data', null);
            $('#rrad').select2('data', null);
            $("#rrad").removeAttr("disabled");
            jQuery("#rrad").html('');
            $.ajax({
            type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/list_pemeriksaan_rrad/');?>
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
                            jQuery("#rrad").html(showData);
                    }
            });
             $("#rrad").select2({});
</script>


<script>
        var namaa = $(".namaa").val();
               $('.namaa').val(namaa+'\n R/ \t   no. \n S                    \n ----------------------------------------\n '); 
       
       
                $('.resepracik').val('\n /R');
 

               function tambahkop(e){
                   var yhr= new XMLHttpRequest();
                var key=e.keyCode || e.which;
                 if (key==13){
                               var resepracik = $(".resepracik").val(); 
                                   $('.resepracik').val(resepracik+'S                 \n ---------------------------------------- \n \n'+'R/  '); // Close / Tutup Modal Dialog
                 //    // alert(namaa);
                 }
               }
        
       
       
   function handleKeyPress(e){
                   var yhr= new XMLHttpRequest();
                var key=e.keyCode || e.which;
                 if (key==13){
                               var namaobat = $("#namaobat").val();
                               var numero = $(".numero").val();
                               var dosis = $(".dosis").val();
                             var kolomresep= document.getElementById("kolomresep");
                              var resep = $(".resep").val();
       
       $('.resep').val(resep+'\n /R   '+namaobat+'   no. '+numero+'\n S    '+dosis+'\n ----------------------------------------------- \n '); 
               //    alert(namaobat+numero+dosis);
                  $('#namaobat').select2('data', null);
                  $('.numero').val(null);
                  $('.dosis').val(null);
        
               //    $("#namaobat").select2({}).focus();
                  $("#namaobat").select2('open');
        
                 }
               }

var x=event.key;
if(x=='a'||x=='A'){
    alert("hore");
}
           

 function handle2(e){
                   var key=e.keyCode || e.which;
                 if (key==13){
                               var namaobat1 = $("#namaobat1").val();
                               var numero1 = $(".numero1").val();
                            //    var dosis1 = $(".dosis1").val();
                                var resepracik = $(".resepracik").val();
       
       $('.resepracik').val(resepracik+'    '+namaobat1+'   no. '+numero1+'\n     '); 
               //    alert(namaobat+numero+dosis);
                  $('#namaobat1').select2('data', null);
                  $('.numero1').val(null);
                  $('.dosis1').val(null);
        
               //    $("#namaobat").select2({}).focus();
                  $("#namaobat1").select2('open');
        
                 }
               }
 
       
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
                  

                   $('#namaobat1').select2('data', null);
                   $('#namaobat1').select2('data', null);
                   $("#namaobat1").removeAttr("disabled");
       
                   jQuery("#namaobat1").html('');
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
                                   jQuery("#namaobat1").html(showData);
                           }
                   });

                    $("#namaobat1").select2({});


               
      $(":radio.rad").click(function(){
        $("#form2").hide(); 

        if($(this).val() == "Rujuk"){
          $("#form2").show(); 
        }else{
          $("#form2").hide(); 
        }
      });


       </script>
