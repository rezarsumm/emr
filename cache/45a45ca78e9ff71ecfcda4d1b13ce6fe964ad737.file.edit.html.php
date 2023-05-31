<?php /* Smarty version Smarty-3.0.7, created on 2022-10-12 08:08:44
         compiled from "application/views\inap/ass_awal_bidan/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:260276346139ce7ce45-21187384%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45a45ca78e9ff71ecfcda4d1b13ce6fe964ad737' => 
    array (
      0 => 'application/views\\inap/ass_awal_bidan/edit.html',
      1 => 1664875786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '260276346139ce7ce45-21187384',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("inap/ass_awal_bidan/edit_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<div class="breadcrum">
    <p>
        <a href="#">Nursing Record</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal_bidan/');?>
">Asesmen Awal Kebidanan Rawat Inap</a><span></span>
        <small>Edit Data</small>
    </p>
    <div class="clear"></div>
</div>


<div class="head-content">
    <div class="head-content-nav">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/ass_awal_bidan/edit/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
" class="active">Asesmen</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/ass_awal_bidan/riwayat_hamil2/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
"> Riwayat Kehamilan</a></li>
        </ul>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>


<div class="navigation">
    <div class="navigation-button">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal_bidan/');?>
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
<form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal_bidan/edit_process');?>
" method="post">
    <input type="hidden" name="FS_KD_REG" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
    <input type="hidden" name="FS_MR" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />
     <table class="table-info" width="100%">
            <tr class="headrow">
                <th colspan="2">Edit Asesmen Awal Rawat Inap</th>
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
    <!-- <div class="notification red">
            <p><strong>High Risk :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_HIGH_RISK'])===null||$tmp==='' ? '-' : $tmp);?>
 </p>
            <p><strong>Alergi :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
 (<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_REAK_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
)</p>
            <div class="clear"></div>
        </div> -->
    <table class="table-input" width="100%">

        <tr class="headrow">
            <th colspan="2">Data Suami</th>
            <th colspan="2"></th>
        </tr>
        <tr>
            <td width='20%'>Nama</td>
            <td width='30%'><input type="text" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['NAMA_SUAMI'];?>
" name="NAMA_SUAMI" size="10"  /> 
                <input type="hidden" name="NAMA_SUAMI_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['NAMA_SUAMI'];?>
"></td>
            <td width='20%'>Tanggal Lahir </td>
            <td width='30%'><input type="date" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['TGL_LAHIR_SUAMI'];?>
" name="TGL_LAHIR_SUAMI" size="10"  />
                <input type="hidden" name="TGL_LAHIR_SUAMI_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['TGL_LAHIR_SUAMI'];?>
">
            </td>
        </tr>
        <tr>
            <td width='20%'>Agama</td>
            <td width='30%'><input type="text" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['AGAMA_SUAMI'];?>
" name="AGAMA_SUAMI" size="10"  />
                <input type="hidden" name="AGAMA_SUAMI_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['AGAMA_SUAMI'];?>
"></td>
            <td width='20%'>  Pekerjaan </td>
            <td width='30%'><input type="text" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['JOB_SUAMI'];?>
" name="JOB_LAHIR_SUAMI" size="10"  /> 
                <input type="hidden" name="JOB_SUAMI_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['JOB_SUAMI'];?>
"></td>
        </tr>
        <tr>
            <td width='20%'>Pendidikan</td>
            <td width='30%'><input type="text" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['PENDIDIKAN_SUAMI'];?>
" name="PENDIDIKAN_SUAMI" size="10"  />
                <input type="hidden" name="PENDIDIKAN_SUAMI_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['PENDIDIKAN_SUAMI'];?>
"></td>
            <td width='20%'>    </td>
            <td width='30%'> </td>
        </tr>

        <tr class="headrow">
            <th colspan="4">Data pasien</th>
        </tr>
        <tr>
            <td width='20%'>Agama</td>
            <td width='30%'>
                <input type="hidden" name="FS_AGAMA_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_AGAMA'];?>
">
                <select name="FS_AGAMA" id="surat_dari" class="select2" style="width: 100px;">
                    <option selected value="1">Islam</option>
                    <option value="2">Kristen</option>
                    <option value="3">Katholik</option>
                    <option value="4">Hindu</option>
                    <option value="5">Buda</option>
                    <option value="6">Konghucu</option>
                </select>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr> <td width='20%'>Pendidikan Pasien</td>
            <td width='30%'>
                <input type="text" name="PENDIDIKAN_PASIEN" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['PENDIDIKAN_PASIEN'];?>
" size="50"  />
                <input type="hidden" name="PENDIDIKAN_PASIEN_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['PENDIDIKAN_PASIEN'];?>
">
            </td>

         
        </tr>
        <TR>  <td width='20%'>Pekerjaan Pasien</td>
            <td width='30%'>
                <input type="text" name="JOB_PASIEN" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['JOB_PASIEN'];?>
" size="50"  />
                <input type="hidden" name="JOB_PASIEN_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['JOB_PASIEN'];?>
">
            </td></TR>

         <tr class="headrow">
                <th colspan="4">Anamnesa/Riwayat Masuk Rumah Sakit</th>
               
            </tr>
            <tr>
                <td colspan="2">
                    <textarea cols="50" name="FS_ANAMNESA"><?php echo $_smarty_tpl->getVariable('ases2')->value['FS_ANAMNESA'];?>
</textarea>
                    <input type="hidden" name="FS_ANAMNESA_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_ANAMNESA'];?>
">
                </td>
                <input type="hidden" name="FS_PEMERIKSAAN_FISIK" >
                <input type="hidden" name="FS_PEMERIKSAAN_FISIK_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_PEMERIKSAAN_FISIK'];?>
">
             </tr>

            <tr class="headrow">
                <th colspan="4">RIWAYAT HAID</th>
            </tr>
            <tr>
                <td width='20%'>Menarche</td>
                <td width='30%'>
                    <input type="hidden" name="FS_HAID_MEN_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_HAID_MEN'];?>
">
                    <input type="text" name="FS_HAID_MEN"  value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_HAID_MEN'];?>
"  size="10"  /></td>
                <td width='20%'>Siklus</td>
                <td width='30%'>
                    
                    <input type="hidden" name="FS_HAID_SIKLUS_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_HAID_SIKLUS'];?>
">
                    <input type="checkbox" name="FS_HAID_SIKLUS" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_HAID_SIKLUS']=='Teratur'){?> checked="" <?php }?> value="Teratur">Teratur
                    <input type="checkbox" name="FS_HAID_SIKLUS" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_HAID_SIKLUS']=='Tidak'){?> checked="" <?php }?> value="Tidak"> Tidak
                </td>
            </tr>
            <tr>
                <td>Lama Haid</td>
                <td>
                    <input type="hidden" name="FS_HAID_LAMA_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_HAID_LAMA'];?>
">
                    <input type="text" name="FS_HAID_LAMA"  value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_HAID_LAMA'];?>
" size="10"  /> Hari</td>
                <td>HPPT</td>
                <td>
                    <input type="hidden" name="FS_HAID_HPHT_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_HAID_HPHT'];?>
">
                    <input type="text" name="FS_HAID_HPHT"  value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_HAID_HPHT'];?>
" size="10"  />  </td>
            </tr>
            <tr>
                <td>  HPL</td>
                <td>
                    <input type="hidden" name="FS_HAID_HPL_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_HAID_HPL'];?>
"><input type="text" name="FS_HAID_HPL"  value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_HAID_HPL'];?>
" size="10"  />  </td>

                <td>Keluhan</td>
                <td>
                    <input type="hidden" name="FS_HAID_KELUHAN_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_HAID_KELUHAN'];?>
">
                    <input type="text" name="FS_HAID_KELUHAN"  value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_HAID_KELUHAN'];?>
" size="10"  />  </td>
            </tr>

            <tr class="headrow">
                <th colspan="4">STATUS PERKAWINAN </th>
            </tr>
            <tr>
                <td width='20%'>Status</td>
                <td width='30%'>
                    <input type="hidden" name="FS_STATUS_PERKAWINAN_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PERKAWINAN'];?>
">
                    <input type="text" name="FS_STATUS_PERKAWINAN"  value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PERKAWINAN'];?>
" size="10"  /></td>
                <td width='20%'>Lama</td>
                <td width='30%'>
                    <input type="hidden" name="FS_LAMA_MENIKAH_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_LAMA_MENIKAH'];?>
">
                    <input type="text" name="FS_LAMA_MENIKAH"  value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_LAMA_MENIKAH'];?>
" size="10"  /> </td>
            </tr>

           <!--  <tr class="headrow">
                <th colspan="4">RIWAYAT KEHAMILAN (tgl partus, tempat partus, umur hamil, jenis persalinan, penolong persalinan, penyulit, anak JK/BB)  </th>

            </tr>
            <tr>
                <td width='100%' colspan="4" > 
                  <textarea cols="100" name="RIWAYAT_KEHAMILAN"><?php echo $_smarty_tpl->getVariable('ases2')->value['RIWAYAT_KEHAMILAN'];?>
</textarea>  </td> 
                 
            </tr> -->

 <input type="hidden" name="RIWAYAT_KEHAMILAN">
 <input type="hidden" name="RIWAYAT_KEHAMILAN_0">
            
 

        </table>

        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="4">Riwayat Kesehatan</th>
            </tr>
           <tr>
                <td width='20%'>Riweayat Penyakit dahulu</td>
                <td width='30%'>
                    <input type="hidden" name="FS_RIW_PENYAKIT_DAHULU_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_RIW_PENYAKIT_DAHULU'];?>
">
                   <input type="text" name="FS_RIW_PENYAKIT_DAHULU" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['FS_RIW_PENYAKIT_DAHULU'];?>
" size="32">
                </td>
                <td width='20%'>Riwayat penyakit keluarga</td>
                <td width='30%'>
                    <input type="hidden" name="FS_RIW_PENYAKIT_DAHULU2_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_RIW_PENYAKIT_DAHULU2'];?>
">
                    <input type="text" name="FS_RIW_PENYAKIT_DAHULU2" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['FS_RIW_PENYAKIT_DAHULU2'];?>
" size="32">
                
                </td>
            </tr>
        </table>
        <table class="table-input" width="100%">
            <tr class="headrow"> 
                <th colspan="4">  RIWAYAT PENYAKIT PADA KEHAMILAN SEKARANG</th>
                 
            </tr>
            <tr>
                <td width='20%'>Asma</td>
                <td width='30%'> Mulai Tahun
                    <input type="hidden" name="FS_ASMA_MULAI_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_ASMA_MULAI'];?>
"> 
                   <input type="text" name="FS_ASMA_MULAI" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_ASMA_MULAI'];?>
"  size="32">
                </td>
                <td width='20%'>Dalam Terapi</td>
                <td width='30%'>
                    <input type="hidden" name="FS_ASMA_TERAPI_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_ASMA_TERAPI'];?>
">
                    <input type="text" name="FS_ASMA_TERAPI" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_ASMA_TERAPI'];?>
"  size="32">
                
                </td>
            </tr>
            <tr>
                <td width='20%'>Jantung</td>
                <td width='30%'> Mulai Tahun 
                    <input type="hidden" name="FS_JANTUNG_MULAI_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_JANTUNG_MULAI'];?>
">
                   <input type="text" name="FS_JANTUNG_MULAI" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_JANTUNG_MULAI'];?>
"  size="32">
                </td>
                <td width='20%'>Dalam Terapi</td>
                <td width='30%'>
                    <input type="hidden" name="FS_JANTUNG_TERAPI_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_JANTUNG_TERAPI'];?>
">
                    <input type="text" name="FS_JANTUNG_TERAPI" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_JANTUNG_TERAPI'];?>
"  size="32">
                
                </td>
            </tr>
            <tr>
                <td width='20%'>Diabetes</td>
                <td width='30%'> Mulai Tahun 
                    <input type="hidden" name="FS_DIABETES_MULAI_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_DIABETES_MULAI'];?>
">
                   <input type="text" name="FS_DIABETES_MULAI" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_DIABETES_MULAI'];?>
"   size="32">
                </td>
                <td width='20%'>Dalam Terapi</td>
                <td width='30%'>
                    <input type="hidden" name="FS_DIABETES_TERAPI_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_DIABETES_TERAPI'];?>
">
                    <input type="text" name="FS_DIABETES_TERAPI" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_DIABETES_TERAPI'];?>
" size="32">
                
                </td>
            </tr>
            <tr>
                <td width='20%'>Hipertensi</td>
                <td width='30%'> Mulai Tahun 
                    <input type="hidden" name="FS_HIPERTENSI_MULAI_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_HIPERTENSI_MULAI'];?>
">
                   <input type="text" name="FS_HIPERTENSI_MULAI" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_HIPERTENSI_MULAI'];?>
"   size="32">
                </td>
                <td width='20%'>Dalam Terapi</td>
                <td width='30%'>
                    <input type="hidden" name="FS_HIPERTENSI_TERAPI_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_HIPERTENSI_TERAPI'];?>
">
                    <input type="text" name="FS_HIPERTENSI_TERAPI" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_HIPERTENSI_TERAPI'];?>
"  size="32">
                
                </td>
            </tr>
            <tr>
                <td width='20%'>Penyakit Lain</td>
                <td width='30%'> Mulai Tahun 
                    <input type="hidden" name="FS_SAKIT_LAIN_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_SAKIT_LAIN'];?>
">
                   <input type="text" name="FS_SAKIT_LAIN" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_SAKIT_LAIN'];?>
"  size="32">
                </td>
               
            </tr>
        </table>
        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="4">Riwayat Gynekologi</th>
            </tr>
            <tr>
                <td width='70%'> 
                    <input type="hidden" name="FS_RIWAYAT_GYNEKOLOGI_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_RIWAYAT_GYNEKOLOGI'];?>
">
                  <textarea cols="100" name="FS_RIWAYAT_GYNEKOLOGI"><?php echo $_smarty_tpl->getVariable('ases2')->value['FS_RIWAYAT_GYNEKOLOGI'];?>
</textarea> 
                </td>
                <!-- <td width='20%'>Riwayat penyakit keluarga</td>
                <td width='30%'>
                    <input type="text" name="FS_RIW_PENYAKIT_DAHULU2" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_RIW_PENYAKIT_DAHULU'])===null||$tmp==='' ? '-' : $tmp);?>
" size="32">
                
                </td> -->
            </tr>
        </table>

        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="4">Riwayat KB</th>
            </tr>
            <tr>
                <td width='20%'>Riwayat KB </td>
                <td width='30%'>  
                    <input type="hidden" name="FS_RIWAYAT_KB_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_RIWAYAT_KB'];?>
">
                    <textarea cols="50" name="FS_RIWAYAT_KB"><?php echo $_smarty_tpl->getVariable('ases2')->value['FS_RIWAYAT_KB'];?>
</textarea>  
                </td>
                <td width='20%'>Riwayat Komplikasi KB</td>
                <td width='30%'>
                    <input type="hidden" name="FS_RIWAYAT_KOMPLIKASI_KB_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_RIWAYAT_KOMPLIKASI_KB'];?>
">
                    <textarea cols="50" name="FS_RIWAYAT_KOMPLIKASI_KB"><?php echo $_smarty_tpl->getVariable('ases2')->value['FS_RIWAYAT_KOMPLIKASI_KB'];?>
</textarea>   
                
                </td>
            </tr>
        </table>

        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="4">Riwayat Alergi</th>
            </tr>
            <tr>
                <td width='20%'>Riwayat Alergi</td>
                <td width='30%'>
                    <input type="hidden" name="FS_ALERGI_0" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['FS_ALERGI'];?>
">
                    <input type="text" name="FS_ALERGI" size="35" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
">
                    <em style="color:red">* Wajib Diisi</em>
                </td>
                <td width='20%'>Reaksi Alergi</td>
                <td width='30%'>
                    <input type="hidden" name="FS_REAK_ALERGI_0" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['FS_REAK_ALERGI'];?>
">
                    <input type="text" name="FS_REAK_ALERGI" size="35" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_REAK_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
">
                    <em style="color:red">* Wajib Diisi</em>
                </td>
            </tr>
        </table>


        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="4">Pola Makan/Minum/Eliminasi</th>
            </tr>
            <tr>
                <td> Pola Makan</td>
                <td> 
                    <input type="hidden" name="POLA_MAKAN_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['POLA_MAKAN'];?>
">
                    <input type="text" name="POLA_MAKAN" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['POLA_MAKAN'];?>
"> x/hari </td>
                <td>  Makan Terakhir Jam</td>
                <td> 
                    <input type="hidden" name="JAM_TERAKHIR_MAKAN_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['JAM_TERAKHIR_MAKAN'];?>
">
                    <input type="text" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['JAM_TERAKHIR_MAKAN'];?>
" name="JAM_TERAKHIR_MAKAN">   </td>
            </tr>
            <tr>
                <td> Pola Minum</td>
                <td> 
                    <input type="hidden" name="POLA_MINUM_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['POLA_MINUM'];?>
">
                    <input type="text" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['POLA_MINUM'];?>
" name="POLA_MINUM"> cc/hari </td>
                <td>  Minum Terakhir Jam</td>
                <td> 
                    <input type="hidden" name="JAM_TERAKHIR_MINUM_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['JAM_TERAKHIR_MINUM'];?>
">
                    <input type="text" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['JAM_TERAKHIR_MINUM'];?>
" name="JAM_TERAKHIR_MINUM">   </td>
            </tr>
            <tr>
                <td> Pola BAK</td>
                <td> 
                    <input type="hidden" name="POLA_BAK_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['POLA_BAK'];?>
">
                    <input type="text" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['POLA_BAK'];?>
"  name="POLA_BAK"> x/hari </td>
                <td>  BAK Terakhir Jam</td>
                <td> 
                    <input type="hidden" name="JAM_TERAKHIR_BAK_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['JAM_TERAKHIR_BAK'];?>
">
                    <input type="text" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['JAM_TERAKHIR_BAK'];?>
" name="JAM_TERAKHIR_BAK">   </td>
            </tr>
            <tr>
                <td> Pola BAB</td>
                <td> 
                    <input type="hidden" name="POLA_BAB_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['POLA_BAB'];?>
">
                    <input type="text" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['POLA_BAB'];?>
" name="POLA_BAB"> x/hari </td>
                <td>  BAB Terakhir Jam</td>
                <td> 
                    <input type="hidden" name="JAM_TERAKHIR_BAB_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['JAM_TERAKHIR_BAB'];?>
">
                    <input type="text" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['JAM_TERAKHIR_BAB'];?>
" name="JAM_TERAKHIR_BAB">   </td>
            </tr>
        </table>

        
     <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="2">Status Psikologis</th>
            <th colspan="2">Status Sosial</th>
        </tr>
        <tr>
            <td width='20%'>Status Psikologis</td>
            <td width='30%'>
                <input type="hidden" name="FS_STATUS_PSIK_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK'];?>
">
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
                <input type="hidden" name="FS_STATUS_PSIK2_0"  >
                        <input type="hidden" name="FS_STATUS_PSIK2" size="32">


                <input type="text" name="FS_STATUS_PSIK2" id="civstaton3" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK2']=='0'){?>disabled=""<?php }?> size="27" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK2'];?>
">
            </td>
            <td width='20%'>Hubungan dengan anggota keluarga</td>
            <td width='30%'>
                <input type="hidden" name="FS_HUB_KELUARGA_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_HUB_KELUARGA'];?>
">
                <select name="FS_HUB_KELUARGA" id="surat_dari" class="select2" style="width: 170px;">
                    <option value="" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_HUB_KELUARGA']==''){?> selected="" <?php }?>>--Pilih Data--</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_HUB_KELUARGA']=='1'){?> selected="" <?php }?>>Baik</option>
                    <option value="2" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_HUB_KELUARGA']=='2'){?> selected="" <?php }?>>Tidak Baik</option>

                </select>
            </td>
        </tr>
    </table>
    
     

        <table class="table-input" width="100%">
            <tr class="headrow">
               <th colspan="4">  Pemeriksaan Umum</th>
           </tr>
           <tr>
               <td width='20%'>Keadaan Umum</td>
               <td width='30%'>
                <input type="hidden" name="KEADAAN_UMUM_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['KEADAAN_UMUM'];?>
">
                <input type="text" name="KEADAAN_UMUM" size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('ases2')->value['KEADAAN_UMUM'])===null||$tmp==='' ? '-' : $tmp);?>
"/></td>
               <td width='20%'>Alat Bantu</td>
               <td width='30%'>
                <input type="hidden" name="ALAT_BANTU_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['ALAT_BANTU'];?>
">
                <input type="text" name="ALAT_BANTU" size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('ases2')->value['ALAT_BANTU'])===null||$tmp==='' ? '-' : $tmp);?>
"/>  </td>
           </tr> 
        <tr class="headrow">
            <th colspan="4">Vital Sign</th>
        </tr>
        <tr>
            <td width='15%'>Suhu</td>
            <td width='35%'>
                <input type="hidden" name="FS_SUHU_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_SUHU'];?>
">
                <input type="text" name="FS_SUHU" size="10" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_SUHU'];?>
"/></td>
            <td width='15%'>Nadi</td>
            <td width='35%'>
                <input type="hidden" name="FS_NADI_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_NADI'];?>
">
                <input type="text" name="FS_NADI" size="10" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_NADI'];?>
" /> x/menit</td>
        </tr>
        <tr>
            <td>R</td>
            <td>
                <input type="hidden" name="FS_R_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_R'];?>
">
                <input type="text" name="FS_R" size="10" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_R'];?>
" /> x/menit</td>
            <td>TD</td>
            <td>
                <input type="hidden" name="FS_TD_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_TD'];?>
">
                <input type="text" name="FS_TD" size="10" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_TD'];?>
" /> mmHg</td>
        </tr>
        <tr>
            <td>Tinggi Badan</td>
            <td>
                <input type="hidden" name="FS_TB_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_TB'];?>
">
                <input type="text" name="FS_TB" size="10" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_TB'];?>
"/> cm</td>
            <td>Berat Badan</td>
            <td>
                <input type="hidden" name="FS_BB_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_BB'];?>
">
                <input type="text" name="FS_BB" size="10" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_BB'];?>
"/> Kg</td>
        </tr>
        
    </table>

    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Pemeriksaaan Fisik  </th>
        </tr>
        <tr> 
            <td>  Mata </td>
            <td>
                <input type="hidden" name="MATA_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['MATA_0'];?>
">
                <input type="checkbox" <?php if ($_smarty_tpl->getVariable('ases2')->value['MATA']=='Kabur'){?> checked="" <?php }?> name="MATA" value="Kabur">Pandangan Kabur
                <input type="checkbox" <?php if ($_smarty_tpl->getVariable('ases2')->value['MATA']=='Tidak'){?> checked="" <?php }?>  name="MATA" value="Tidak"> Tidak
            </td>
        </tr>
        <tr>
             <td>Skelera</td>
            <td>
                <input type="hidden" name="SCLERA_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['SCLERA'];?>
">
                <input type="checkbox"  <?php if ($_smarty_tpl->getVariable('ases2')->value['SCLERA']=='Ikterik'){?> checked="" <?php }?> name="SCLERA" value="Ikterik">  Ikterik
                <input type="checkbox"  <?php if ($_smarty_tpl->getVariable('ases2')->value['SCLERA']=='Tidak'){?> checked="" <?php }?> name="SCLERA" value="Tidak"> Tidak
            </td>
          </tr>
          <tr>
              <td>Konjungtiva</td>
            <td>
                <input type="hidden" name="KONJUNGTIVA_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['KONJUNGTIVA'];?>
">
                <input type="checkbox"  <?php if ($_smarty_tpl->getVariable('ases2')->value['KONJUNGTIVA']=='Ikterik'){?> checked="" <?php }?>  name="KONJUNGTIVA" value="Ikterik">  Anemis
                <input type="checkbox"  <?php if ($_smarty_tpl->getVariable('ases2')->value['KONJUNGTIVA']=='Tidak'){?> checked="" <?php }?> name="KONJUNGTIVA" value="Tidak"> Tidak
            </td>
        </tr>
        <tr> 
            <td>Kepala</td>
            <td>
                <input type="hidden" name="KEPALA_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['KEPALA'];?>
">
                <input type="text" name="KEPALA" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['KEPALA'];?>
">  Normal/Kelainan  
             </td> </tr>
        <tr>  <td>Telinga</td>
            <td>
                <input type="hidden" name="TELINGA_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['TELINGA'];?>
">
                <input type="text" name="TELINGA" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['TELINGA'];?>
">  Normal/Kelainan  
             </td></tr>
        <tr>  <td>Hidung</td>
            <td>
                <input type="hidden" name="HIDUNG_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['HIDUNG'];?>
">
                <input type="text" name="HIDUNG" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['HIDUNG'];?>
">  Normal/Kelainan  
             </td>
        </tr>
        <tr>  <td>Tenggorokan</td>
            <td>
                <input type="hidden" name="TENGGOROKAN_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['TENGGOROKAN'];?>
">
                <input type="text" name="TENGGOROKAN" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['TENGGOROKAN'];?>
">  Normal/Kelainan  
             </td>
        </tr>
        <tr>  <td>Leher</td>
            <td>
                <input type="hidden" name="LEHER_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['LEHER'];?>
">
                <input type="text" name="LEHER" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['LEHER'];?>
">  Normal/Kelainan  
             </td>
        </tr>
        <tr>  <td>Dada</td>
            <td>
                <input type="hidden" name="DADA_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['DADA'];?>
">
                <input type="text" name="DADA" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['DADA'];?>
">  Normal/Kelainan  
             </td>
        </tr>
        <tr>  <td>Jantung</td>
            <td>
                <input type="hidden" name="JANTUNG_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['JANTUNG'];?>
">
                <input type="text" name="JANTUNG" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['JANTUNG'];?>
">  Normal/Kelainan  
             </td>
        </tr>
        <tr>  <td>Paru-Paru</td>
            <td>
                <input type="hidden" name="PARU_PARU_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['PARU_PARU'];?>
">
                <input type="text" name="PARU_PARU" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['PARU_PARU'];?>
">  Normal/Kelainan  
             </td>
        </tr>
        <tr>  <td>Abdomen</td>
            <td>
                <input type="hidden" name="ABDOMEN_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['ABDOMEN'];?>
">
                <input type="text" name="ABDOMEN" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['ABDOMEN'];?>
">  Normal/Kelainan  
             </td>
        </tr>
        <tr>  <td>Anggota Gerak Atas</td>
            <td>
                <input type="hidden" name="BADAN_GERAK_ATAS_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['BADAN_GERAK_ATAS'];?>
">
                <input type="text" name="BADAN_GERAK_ATAS" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['BADAN_GERAK_ATAS'];?>
">  Normal/Kelainan  
             </td>
        </tr>
        <tr>  <td>Anggota Gerak Bawah</td>
            <td>
                <input type="hidden" name="BADAN_GERAK_BAWAH_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['BADAN_GERAK_BAWAH'];?>
">
                <input type="text" name="BADAN_GERAK_BAWAH" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['BADAN_GERAK_BAWAH'];?>
">  Normal/Kelainan  
             </td>
        </tr>
        </table>

        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="4">  Pemeriksaan Khusus</th>
            </tr>
            <tr class="headrow">
                <th colspan="4">  Pemeriksaan Khusus</th>
            </tr>
            <tr>
                <td rowspan="4">Dada</td>
                <td>
                    <input type="hidden" name="CEK_DADA_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['CEK_DADA'];?>
">
                     <input type="radio" name="CEK_DADA" required <?php if ($_smarty_tpl->getVariable('ases2')->value['CEK_DADA']=='Mammae Simetris'){?> checked <?php }?> value="Mammae Simetris">  Mammae Simetris </td>
                <td> 
                   <input type="radio" name="CEK_DADA" <?php if ($_smarty_tpl->getVariable('ases2')->value['CEK_DADA']=='Mammae Asimetris'){?> checked <?php }?>  value="Mammae Asimetris">  Mammae ASimetris </td>
                <td> <input type="radio" name="CEK_DADA" <?php if ($_smarty_tpl->getVariable('ases2')->value['CEK_DADA']=='Puting Menonjol'){?> checked <?php }?> value="Puting Menonjol">    Puting Menonjol </td></tr>
            <tr> 
                 <td>
                       <input type="radio" name="CEK_DADA" <?php if ($_smarty_tpl->getVariable('ases2')->value['CEK_DADA']=='Puting Tidak Menonjol'){?> checked <?php }?>  value="Puting Tidak Menonjol">    Puting Tidak Menonjol </td>
                <td> 
                     <input type="radio" name="CEK_DADA" <?php if ($_smarty_tpl->getVariable('ases2')->value['CEK_DADA']=='Aerola Hiperpigmentasi'){?> checked <?php }?> value="Aerola Hiperpigmentasi"> Aerola Hiperpigmentasi </td>
                <td> 
                     <input type="radio" name="CEK_DADA" <?php if ($_smarty_tpl->getVariable('ases2')->value['CEK_DADA']=='Kolostrum'){?> checked <?php }?> value="Kolostrum">   Kolostrum </td>
                </tr>
              <tr>
                    <td > </td>
               <tr> 
               <tr> 
                   <td>Inspeksi Abdomen</td>
                    <td colspan="3">
                        
                        <input type="hidden" name="INSPEKSI_ABDOMEN_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['INSPEKSI_ABDOMEN'];?>
">
                        <input type="radio" name="INSPEKSI_ABDOMEN" <?php if ($_smarty_tpl->getVariable('ases2')->value['INSPEKSI_ABDOMEN']=='Luka Bekas OP'){?> checked <?php }?> value="Luka Bekas OP">  Luka Bekas OP  
                        <input type="radio" name="INSPEKSI_ABDOMEN" <?php if ($_smarty_tpl->getVariable('ases2')->value['INSPEKSI_ABDOMEN']=='Linea Alba'){?> checked <?php }?> value="Linea Alba"> Linea Alba  
                        <input type="radio" name="INSPEKSI_ABDOMEN" <?php if ($_smarty_tpl->getVariable('ases2')->value['INSPEKSI_ABDOMEN']=='Linea Nigra'){?> checked <?php }?> value="Linea Nigra">   Linea Nigra  
                            <input type="radio" name="INSPEKSI_ABDOMEN" <?php if ($_smarty_tpl->getVariable('ases2')->value['INSPEKSI_ABDOMEN']=='Striae Lividae'){?> checked <?php }?> value="Striae Lividae">     Striae Lividae  
                          <input type="radio" name="INSPEKSI_ABDOMEN" <?php if ($_smarty_tpl->getVariable('ases2')->value['INSPEKSI_ABDOMEN']=='Striae Albican'){?> checked <?php }?> value="Striae Albican">     Striae Albican </td>
                        
                    </tr>
            <tr> 
                        <td>Palpasi Abdomen</td></tr>
                <tr> 
                         <td>Leopod I     </td>
                         <td> 
                            <input type="hidden" name="LEOPOD_1_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['LEOPOD_1'];?>
">
                            <input type="text" name="LEOPOD_1"  value="<?php echo $_smarty_tpl->getVariable('ases2')->value['LEOPOD_1'];?>
">    cm </td></tr>
                <tr> 
                         <td>Leopod II      </td>
                         <td>
                            <input type="hidden" name="LEOPOD_2_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['LEOPOD_2'];?>
">
                            <input type="radio" name="LEOPOD_2" required <?php if ($_smarty_tpl->getVariable('ases2')->value['LEOPOD_2']=='Punggung Kanan'){?> checked <?php }?> value="Punggung Kanan">  Punggung Kanan 
                            <input type="radio" name="LEOPOD_2" required <?php if ($_smarty_tpl->getVariable('ases2')->value['LEOPOD_2']=='Punggung Kiri'){?> checked <?php }?> value="Punggung Kiri">   Punggung Kiri
                           
                           </td>
                    </tr>
            <tr> 
                   <td>Leopod III      </td>
                           <td>
                            <input type="hidden" name="LEOPOD_3_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['LEOPOD_3'];?>
">
                              <input type="radio" name="LEOPOD_3" required <?php if ($_smarty_tpl->getVariable('ases2')->value['LEOPOD_3']=='Kepala'){?> checked <?php }?> value="Kepala">    Kepala 
                              <input type="radio" name="LEOPOD_3" required <?php if ($_smarty_tpl->getVariable('ases2')->value['LEOPOD_3']=='Bokong'){?> checked <?php }?> value="Bokong">     Bokong
                              
                             </td>
                         </tr>
          <tr> 
                <td>Leopod IV     </td>
                                    <td>
                                        <input type="hidden" name="LEOPOD_4_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['LEOPOD_4'];?>
">
                                       <input type="radio" name="LEOPOD_4" required <?php if ($_smarty_tpl->getVariable('ases2')->value['LEOPOD_4']=='Floating'){?> checked <?php }?>  value="Floating">    Floating 
                                       <input type="radio" name="LEOPOD_4" required <?php if ($_smarty_tpl->getVariable('ases2')->value['LEOPOD_4']=='Enganged'){?> checked <?php }?> value="Enganged">     Enganged
                                     
                                      </td>
                                  </tr>
          <tr>
              <td>Auskultasi</td>
              <td colspan="3">
                <input type="hidden" name="AUSKULTASI_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['AUSKULTASI'];?>
">
                  <input type="radio" name="AUSKULTASI" required <?php if ($_smarty_tpl->getVariable('ases2')->value['AUSKULTASI']=='Teratur'){?> checked <?php }?> value="Teratur">Teratur
                  <input type="radio" name="AUSKULTASI" <?php if ($_smarty_tpl->getVariable('ases2')->value['AUSKULTASI']=='Tidak'){?> checked <?php }?> value="Tidak">Tidak Teratur  
                  
                  
                <input type="hidden" name="DURASI_AUSKULTASI_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['DURASI_AUSKULTASI'];?>
">
                <input type="text" name=" DURASI_AUSKULTASI" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['DURASI_AUSKULTASI'];?>
" >kali/menit
              </td>
              
          </tr>
          <tr>
            <td>Kontraksi</td>
            <td colspan="3">
                <input type="hidden" name="KONTRAKSI_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['KONTRAKSI'];?>
">
                <input type="radio" name="KONTRAKSI" required <?php if ($_smarty_tpl->getVariable('ases2')->value['KONTRAKSI']=='Kuat'){?> checked <?php }?> value="Kuat">Kuat
                <input type="radio" name="KONTRAKSI" required <?php if ($_smarty_tpl->getVariable('ases2')->value['KONTRAKSI']=='Sedang'){?> checked <?php }?> value="Sedang">Sedang
                <input type="radio" name="KONTRAKSI" required <?php if ($_smarty_tpl->getVariable('ases2')->value['KONTRAKSI']=='Lemah'){?> checked <?php }?> value="Lemah">Lemah
                
                
                <input type="hidden" name="DURASI_KONTRAKSI_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['DURASI_KONTRAKSI'];?>
">
              <input type="text" name=" DURASI_KONTRAKSI" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['DURASI_KONTRAKSI'];?>
" >kali/menit
            </td>
        </tr>

        <tr>
            <td>Inspeksi Ano Genital</td>
            <td>
                <input type="hidden" name="INSPEKSI_ANO_GENITAS_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['INSPEKSI_ANO_GENITAS_0'];?>
">
              <input type="text" name="INSPEKSI_ANO_GENITAS" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['INSPEKSI_ANO_GENITAS'];?>
" >
            </td>
        </tr>
        <tr>
            <td> Vagina Toucher</td>
            <td>
                <input type="hidden" name="VAGINA_TOUCHER_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['VAGINA_TOUCHER'];?>
">
              <input type="text" name="VAGINA_TOUCHER" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['VAGINA_TOUCHER'];?>
" >
            </td>
        </tr>
</table>

<table class="table-input" width="100%">
    <tr class="headrow">
        <th colspan="4">Kebutuhan Fungsional</th>
    </tr>
    <tr>
        <td width='20%'>Pemenuhan ADL</td>
        <td width='30%'>
            <input type="hidden" name="FS_FUNGSIONAL1_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_FUNGSIONAL1'];?>
">
            <select name="FS_FUNGSIONAL1" id="op1" class="select2" style="width: 190px;">
                        <option value="">--Pilih Data--</option>
                        <option value="0" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL1']=='0'){?> selected="" <?php }?>>Tidak Mampu</option>
                        <option value="1" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL1']=='1'){?> selected="" <?php }?>>Butuh bantuan</option>
                        <option value="2" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL1']=='2'){?> selected="" <?php }?>>Mandiri</option>
                    </select>
                     <span id="sc1"></span>
        </td>
         <td width='20%'>Kesimpulan</td>
        <td width='30%'>
            <b><span id="rjtkesimpulan"></span></b>
        </td>
    </tr>
    <tr>
                <td>Mandi</td>
                <td>
                    <input type="hidden" name="FS_FUNGSIONAL2_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_FUNGSIONAL2'];?>
">
                    <select name="FS_FUNGSIONAL2" id="op2" class="select2" style="width: 190px;">
                        <option value="">--Pilih Data--</option>
                        <option value="0" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL2']=='0'){?> selected="" <?php }?>>Tergantung orang lain</option>
                        <option value="1" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL2']=='1'){?> selected="" <?php }?>>Mandiri</option>
                    </select>
                    <span id="sc2"></span>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Perawatan diri</td>
                <td>
                    <input type="hidden" name="FS_FUNGSIONAL3_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_FUNGSIONAL3'];?>
">
                    <select name="FS_FUNGSIONAL3" id="op3" class="select2" style="width: 190px;">
                        <option value="">--Pilih Data--</option>
                        <option value="0" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL3']=='0'){?> selected="" <?php }?>>Membutuhkan bantuan orang lain</option>
                        <option value="1" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL3']=='1'){?> selected="" <?php }?>>Mandiri</option>
                    </select>
                    <span id="sc3"></span>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Berpakaian</td>
                <td>
                    <input type="hidden" name="FS_FUNGSIONAL4_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_FUNGSIONAL4'];?>
">
                    <select name="FS_FUNGSIONAL4" id="op4" class="select2" style="width: 190px;">
                        <option value="">--Pilih Data--</option>
                        <option value="0" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL4']=='0'){?> selected="" <?php }?>>Tergantung orang lain</option>
                        <option value="1" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL4']=='1'){?> selected="" <?php }?>>Sebagian dibantu</option>
                        <option value="2" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL4']=='2'){?> selected="" <?php }?>>Mandiri</option>
                    </select>
                    <span id="sc4"></span>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Buang air kecil</td>
                <td>
                    <input type="hidden" name="FS_FUNGSIONAL5_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_FUNGSIONAL5'];?>
">
                    <select name="FS_FUNGSIONAL5" id="op5" class="select2" style="width: 190px;">
                        <option value="">--Pilih Data--</option>
                        <option value="0" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL5']=='0'){?> selected="" <?php }?>>Tidak terkontrol atau pakai kateter</option>
                        <option value="1" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL5']=='1'){?> selected="" <?php }?>>Kadang inkontensia</option>
                        <option value="2" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL5']=='2'){?> selected="" <?php }?>>Kontensia / teratur (lebih dari 7 hari)</option>
                    </select>
                    <span id="sc5"></span>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Buang air besar</td>
                <td>
                    <input type="hidden" name="FS_FUNGSIONAL6_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_FUNGSIONAL6'];?>
">
                    <select name="FS_FUNGSIONAL6" id="op6" class="select2" style="width: 190px;">
                        <option value="">--Pilih Data--</option>
                        <option value="0" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL6']=='0'){?> selected="" <?php }?>>Inkontensia (Tidak teratur atau perlu)</option>
                        <option value="1" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL6']=='1'){?> selected="" <?php }?>>Kadang inkontensia (sekali seminggu)</option>
                        <option value="2" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL6']=='2'){?> selected="" <?php }?>>Kontensia (teratur)</option>
                    </select>
                    <span id="sc6"></span>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Penggunaan toilet</td>
                <td>
                    <input type="hidden" name="FS_FUNGSIONAL7_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_FUNGSIONAL7'];?>
">
                    <select name="FS_FUNGSIONAL7" id="op7" class="select2" style="width: 190px;">
                        <option value="">--Pilih Data--</option>
                        <option value="0" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL7']=='0'){?> selected="" <?php }?>>Tergantung</option>
                        <option value="1" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL7']=='1'){?> selected="" <?php }?>>Membutuhkan bantuan, tapi dapat melakukan beberapa hal sendiri</option>
                        <option value="2" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL7']=='2'){?> selected="" <?php }?>>Mandiri</option>
                    </select>
                    <span id="sc7"></span>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Transfer</td>
                <td>
                    <input type="hidden" name="FS_FUNGSIONAL8_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_FUNGSIONAL8'];?>
">
                    <select name="FS_FUNGSIONAL8" id="op8" class="select2" style="width: 190px;">
                        <option value="">--Pilih Data--</option>
                        <option value="0" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL8']=='0'){?> selected="" <?php }?>>Tidak mampu</option>
                        <option value="1" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL8']=='1'){?> selected="" <?php }?>>Butuh bantuan untuk bisa duduk (2 Orang)</option>
                        <option value="2" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL8']=='2'){?> selected="" <?php }?>>Bantuan kecil (1 orang)</option>
                        <option value="3" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL8']=='3'){?> selected="" <?php }?>>Mandiri</option>
                    </select>
                    <span id="sc8"></span>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Mobilitas</td>
                <td>
                    <input type="hidden" name="FS_FUNGSIONAL9_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_FUNGSIONAL9'];?>
">
                    <select name="FS_FUNGSIONAL9" id="op9" class="select2" style="width: 190px;">
                        <option value="">--Pilih Data--</option>
                        <option value="0" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL9']=='0'){?> selected="" <?php }?>>Immobile (tidak mampu)</option>
                        <option value="1" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL9']=='1'){?> selected="" <?php }?>>Menggunakan kursi roda</option>
                        <option value="2" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL9']=='2'){?> selected="" <?php }?>>Berjalan dengan bantuan satu orang</option>
                        <option value="3" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL9']=='3'){?> selected="" <?php }?>>Mandiri (meskipun menggunakan alat bantu seperti tongkat)</option>
                    </select>
                    <span id="sc9"></span>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Naik turun tangga</td>
                <td>
                    <input type="hidden" name="FS_FUNGSIONAL10_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_FUNGSIONAL10'];?>
">
                        <select name="FS_FUNGSIONAL10" id="op10" class="select2" style="width: 190px;">
                            <option value="">--Pilih Data--</option>
                            <option value="0" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL10']=='0'){?> selected="" <?php }?>>Tidak mampu</option>
                            <option value="1" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL10']=='1'){?> selected="" <?php }?>>Membutuhkan bantuan (alat bantu)</option>
                            <option value="2" <?php if ($_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL10']=='2'){?> selected="" <?php }?>>Mandiri</option>
                        </select>
                    <span id="sc10"></span>
                </td>
                <td></td>
                <td></td>
            </tr>
</table>

<table>
    <table class="table-input" width="100%">
<tr class="headrow">
    <th colspan="4">Risiko Jatuh</th>
</tr>
<?php if ($_smarty_tpl->getVariable('rs_pasien')->value['fn_umur']<'15'){?>
<tr>
    <td width='20%'>Humty Dumpty Scale</td>
    <td width='30%'>
        <select name="FS_SCORE" id="surat_dari" class="select2" style="width: 190px;">
            <option value="0" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_SCORE']=='0'){?> selected="" <?php }?>>-Pilih Data-</option>
            <option value="1" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_SCORE']=='1'){?> selected="" <?php }?>>7-11 (Risiko Rendah)</option>
            <option value="2" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_SCORE']=='2'){?> selected="" <?php }?>> >12 (Risiko Tinggi)</option>

        </select>
    </td>
    <td width='20%'></td>
    <td width='30%'></td>
</tr>
<?php }elseif($_smarty_tpl->getVariable('rs_pasien')->value['fn_umur']>='15'&&$_smarty_tpl->getVariable('rs_pasien')->value['fn_umur']<='60'){?>
<tr>
    <td width='20%'>Morse Fall Scale</td>
    <td width='30%'>
        <select name="FS_SCORE" id="surat_dari" class="select2" style="width: 190px;">
            <option value="0" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_SCORE']=='0'){?> selected="" <?php }?>>-Pilih Data-</option>
            <option value="3" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_SCORE']=='3'){?> selected="" <?php }?>>0-24  (Risiko Rendah)</option>
            <option value="4" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_SCORE']=='4'){?> selected="" <?php }?>>25-45 (Risiko Sedang)</option>
            <option value="5" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_SCORE']=='5'){?> selected="" <?php }?>>>45   (Risiko Tinggi)</option>

        </select>
    </td>
    <td width='20%'></td>
    <td width='30%'></td>
</tr>
<?php }elseif($_smarty_tpl->getVariable('rs_pasien')->value['fn_umur']>'60'){?>
<tr>
    <td width='20%'>Ontario modified Stratify - Sydney Scoring</td>
    <td width='30%'>
        <select name="FS_SCORE" id="surat_dari" class="select2" style="width: 190px;">
            <option value="0" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_SCORE']=='0'){?> selected="" <?php }?>>-Pilih Data-</option>
            <option value="6" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_SCORE']=='6'){?> selected="" <?php }?>>0-5  (Risiko Rendah)</option>
            <option value="7" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_SCORE']=='7'){?> selected="" <?php }?>>6-16 (Risiko Sedang)</option>
            <option value="8" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_SCORE']=='8'){?> selected="" <?php }?>>17-30   (Risiko Tinggi)</option>

        </select>
    </td>
    <td width='20%'></td>
    <td width='30%'></td>
</tr>
<?php }?>
</table>



<input type="hidden" name="FS_SCORE_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_SCORE'];?>
">

    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Asesmen Nyeri</th>
        </tr>
        <tr>
            <td width='20%'>Ada Nyeri ?</td>
            <td width='30%'>
                <input type="hidden" name="FS_NYERI_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_NYERI'];?>
">
                <select name="FS_NYERI" id="surat_dari" class="select2" style="width: 170px;">
                    <option value="0" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERI']=='0'){?> selected="" <?php }?>>Tidak</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERI']=='1'){?> selected="" <?php }?>>Ya</option>
                </select>
            </td>
            <td width='20%'></td>
            <td width='30%'></td>
        </tr>
        <tr>
            <td>Provokatif</td>
            <td>
                <input type="hidden" name="FS_NYERIP_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_NYERIP'];?>
">
                <select name="FS_NYERIP" id="surat_dari" class="select2" style="width: 150px;">
                    <option value="0" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIP']=='0'){?> selected="" <?php }?>>Tidak Ada Nyeri</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIP']=='1'){?> selected="" <?php }?>>Biologik</option>
                    <option value="2" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIP']=='2'){?> selected="" <?php }?>>Kimiawi</option>
                    <option value="3" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIP']=='3'){?> selected="" <?php }?>>Mekanik / Rudapaksa</option>
                </select>
            </td>
            <td>Quality</td>
            <td>
                <input type="hidden" name="FS_NYERIQ_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_NYERIQ'];?>
">
                <select name="FS_NYERIQ" id="surat_dari" class="select2" style="width: 170px;">
                    <option value="0" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIQ']=='0'){?> selected="" <?php }?>>Tidak Ada</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIQ']=='1'){?> selected="" <?php }?>>Seperti Di Tusuk-Tusuk</option>
                    <option value="2" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIQ']=='2'){?> selected="" <?php }?>>Seperti Terbakar</option>
                    <option value="3" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIQ']=='3'){?> selected="" <?php }?>>Seperti Tertimpa Beb</option>
                    <option value="4" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIQ']=='4'){?> selected="" <?php }?>>Ngilu</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Regio</td>
            <td>
                <input type="hidden" name="FS_NYERIR_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_NYERIR'];?>
">
                <input type="text" name="FS_NYERIR" size="30" value="<?php echo $_smarty_tpl->getVariable('nyeri')->value['FS_NYERIR'];?>
"/>
            </td>
            <td>Severity</td>
            <td>
                <input type="hidden" name="FS_NYERIS_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_NYERIS'];?>
">
                <select name="FS_NYERIS" id="surat_dari" class="select2" style="width: 170px;">
                    <option value="0" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIS']=='0'){?> selected="" <?php }?>>0</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIS']=='1'){?> selected="" <?php }?>>1</option>
                    <option value="2" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIS']=='2'){?> selected="" <?php }?>>2</option>
                    <option value="3" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIS']=='3'){?> selected="" <?php }?>>3</option>
                    <option value="4" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIS']=='4'){?> selected="" <?php }?>>4</option>
                    <option value="5" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIS']=='5'){?> selected="" <?php }?>>5</option>
                    <option value="6" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIS']=='6'){?> selected="" <?php }?>>6</option>
                    <option value="7" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIS']=='7'){?> selected="" <?php }?>>7</option>
                    <option value="8" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIS']=='8'){?> selected="" <?php }?>>8</option>
                    <option value="9" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIS']=='9'){?> selected="" <?php }?>>9</option>
                    <option value="10"<?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIS']=='10'){?> selected="" <?php }?>>10</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Time</td>
            <td>
                <input type="hidden" name="FS_NYERIT_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_NYERIT'];?>
">
                <select name="FS_NYERIT" id="surat_dari" class="select2" style="width: 170px;">
                        <option value="0" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIT']=='0'){?> selected="" <?php }?>>Tidak Ada</option>
                        <option value="1" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIT']=='1'){?> selected="" <?php }?>>Kadang-kadang</option>
                        <option value="2" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIT']=='2'){?> selected="" <?php }?>>Sering</option>
                        <option value="3" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIT']=='3'){?> selected="" <?php }?>>Menetap</option>
                    </select>
            </td>
            <td></td>
            <td></td>
        </tr>
    </table>
 
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Skrining Nutrisi</th>
        </tr>
        <tr>
            <td width='20%'>Penurunan berat badan yang tidak diinginkan selama 6 bulan terakhir</td>
            <td width='30%'>
                <input type="hidden" name="FS_NUTRISI1_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_NUTRISI1'];?>
">
                <select name="FS_NUTRISI1" class="select2" style="width: 190px;" id="sn1">
                    <option value="">--Pilih Data--</option>
                    <option value="0" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI1']=='0'){?>selected=""<?php }?>>Tidak</option>
                    <option value="2" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI1']=='2'){?>selected=""<?php }?>>Tidak Yakin</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI1']=='1'){?>selected=""<?php }?>>Ya (1-5 Kg)</option>
                    <option value="3" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI1']=='3'){?>selected=""<?php }?>>Ya (6-10 Kg)</option>
                    <option value="4" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI1']=='4'){?>selected=""<?php }?>>Ya (11-15 Kg)</option>
                    <option value="5" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI1']=='5'){?>selected=""<?php }?>>Ya (>15 Kg)</option>

                </select>
                <span id="snh1"></span>
            </td>
            <td width='20%'>Kesimpulan</td>
            <td width='30%'><b><span id="kesimpulannutrisi"></span></b></td>
        </tr>
        <tr>
            <td>Asupan makanan menurun dikarenakan adanya penurunan nafsu makan</td>
            <td>
                <input type="hidden" name="FS_NUTRISI2_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_NUTRISI2'];?>
">
                <select name="FS_NUTRISI2" class="select2" style="width: 190px;" id="sn2">
                    <option value="">--Pilih Data--</option>
                    <option value="0" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI2']=='0'){?>selected=""<?php }?>>Tidak</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI2']=='1'){?>selected=""<?php }?>>Ya</option>
                </select>
                <span id="snh2"></span>
            </td>
            <td></td>
            <td>
            </td>
        </tr>
    </table>
     
   
    
  
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Spiritual dan Kultural pasien</th>
        </tr>
        <tr>
            <td width='20%'>Agama</td>
            <td width='30%'>
                <input type="hidden" name="FS_AGAMA_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_AGAMA'];?>
">
                <select name="FS_AGAMA" id="surat_dari" class="select2" style="width: 170px;">
                    <option value="" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_AGAMA']==''){?> selected="" <?php }?>>--Pilih Data--</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_AGAMA']=='1'){?> selected="" <?php }?>>Islam</option>
                    <option value="2" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_AGAMA']=='2'){?> selected="" <?php }?>>Kristen</option>
                    <option value="3" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_AGAMA']=='3'){?> selected="" <?php }?>>Katholik</option>
                    <option value="4" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_AGAMA']=='4'){?> selected="" <?php }?>>Hindu</option>
                    <option value="5" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_AGAMA']=='5'){?> selected="" <?php }?>>Buda</option>
                    <option value="6" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_AGAMA']=='6'){?> selected="" <?php }?>>Konghucu</option>
                </select>
            </td>
            <td width='20%'>Nilai/Kepercayaan khusus</td>
            <td width='30%'>
                <input type="hidden" name="FS_NILAI_KHUSUS_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_NILAI_KHUSUS'];?>
">
                 <select name="FS_NILAI_KHUSUS">
                     <option value="" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_NILAI_KHUSUS']==''){?> selected="" <?php }?> onclick='document.getElementById("civstaton4").disabled = true'>--Pilih Data--</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_NILAI_KHUSUS']=='1'){?> selected="" <?php }?> onclick='document.getElementById("civstaton4").disabled = true'>Tidak Ada</option>
                    <option value="2" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_NILAI_KHUSUS']!=''&&$_smarty_tpl->getVariable('ases2')->value['FS_NILAI_KHUSUS']!='1'){?>selected="" <?php }?>onclick='document.getElementById("civstaton4").disabled = false'>Ada</option>
                </select>
                <br><br>

                
                <input type="hidden" name="FS_NILAI_KHUSUS2_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_NILAI_KHUSUS2'];?>
">
                        <input type="hidden" name="FS_NILAI_KHUSUS2" id="civstaton4"  size="32">

                <input type="text" name="FS_NILAI_KHUSUS2" id="civstaton4" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_NILAI_KHUSUS2']=='0'){?>disabled=""<?php }?> size="27" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_NILAI_KHUSUS2'];?>
">
            </td>
        </tr>
             <tr>
            <td>Bantuan Pemenuhan Kebutuhan Spiritual</td>
            <td>
                
               

                <select name="keb_spirit[]" multiple id="spiritual" style="width:250px">
                    <option></option>
                </select>
            </td>
            <td></td>
            <td></td>
        </tr>
    </table>
     <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Kebutuhan Edukasi</th>
        </tr>
        <tr>
            <td width='20%'>Edukasi</td>
            <td width='30%'>
              
                <select name="edukasi[]" multiple id="edukasi" style="width:250px">
                    <option></option>
                </select>
            </td>
            <td width='20%'></td>
            <td width='30%'></td>
        </tr>
         </table>
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Scrinning Discharge Planning</th>
        </tr>
        <tr>
            <td width='20%'>Discharge Planning</td>
            <td width='30%'>
               
                <select name="planning[]" multiple id="planning" style="width:250px">
                    <option></option>
                </select>
            </td>
            <td width='20%'></td>
            <td width='30%'></td>
        </tr>
         </table>
         <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="4">ANALISIS</th>
            </tr>
            <tr>
                <td width='20%'>Masalah Kebidanan</td>
                <td width='30%'>
                    <input type="hidden" name="MASALAH_KEBIDANAN_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['MASALAH_KEBIDANAN'];?>
">
                    <input type="text" name="MASALAH_KEBIDANAN" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['MASALAH_KEBIDANAN'];?>
">

                </td>
                <td width='20%'></td>
                <td width='30%'></td>
            </tr>
            <tr>
                <td width='20%'>Diagnosa Kebidanan</td>
                <td width='30%'>
                    <input type="hidden" name="DIAGNOSA_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['DIAGNOSA'];?>
">
                   <input type="text" name="DIAGNOSA" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['DIAGNOSA'];?>
">
                </td>
                <td width='20%'></td>
                <td width='30%'></td>
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