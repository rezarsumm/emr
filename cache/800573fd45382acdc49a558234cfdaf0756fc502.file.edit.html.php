<?php /* Smarty version Smarty-3.0.7, created on 2022-10-12 09:55:46
         compiled from "application/views\inap/ass_awal/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:26163462cb264da34-97156458%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '800573fd45382acdc49a558234cfdaf0756fc502' => 
    array (
      0 => 'application/views\\inap/ass_awal/edit.html',
      1 => 1664866683,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26163462cb264da34-97156458',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("inap/ass_awal/edit_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<div class="breadcrum">
    <p>
        <a href="#">Nursing Record</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal/');?>
">Asesmen Awal Rawat Inap</a><span></span>
        <small>Edit Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="navigation">
    <div class="navigation-button">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal/');?>
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
<form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal/edit_process');?>
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
    <div class="notification red">
            <p><strong>High Risk :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_HIGH_RISK'])===null||$tmp==='' ? '-' : $tmp);?>
 </p>
            <p><strong>Alergi :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
 (<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_REAK_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
)</p>
            <div class="clear"></div>
        </div>
    <table class="table-input" width="100%">
         <tr class="headrow">
                <th colspan="2">Anamnesa/Riwayat Masuk Rumah Sakit</th>
                <th colspan="2">Pemeriksaan Fisik</th>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="hidden" name="FS_ANAMNESA_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_ANAMNESA'];?>
">
                    <textarea cols="50" name="FS_ANAMNESA"><?php echo $_smarty_tpl->getVariable('ases2')->value['FS_ANAMNESA'];?>
</textarea>
                </td>
                 <td colspan="2">
                    <input type="hidden" name="FS_PEMERIKSAAN_FISIK_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_PEMERIKSAAN_FISIK'];?>
">
                    <textarea cols="50" name="FS_PEMERIKSAAN_FISIK"><?php echo $_smarty_tpl->getVariable('ases2')->value['FS_PEMERIKSAAN_FISIK'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td width='20%'><b>  Bio Sosio  </b>  </td>
               </tr>
            <tr>
                <td width='20%'>  Status Pernikahan  </td>
                <td width='30%'>
                    <input type="hidden" name="MENIKAH_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['MENIKAH'];?>
">
                   <input type="radio" name="MENIKAH" required value="Belum" <?php if ($_smarty_tpl->getVariable('ases2')->value['PERNIKAHAN']=='Belum'){?> checked <?php }?>  size="32"> Belum 
                   <input type="radio" name="MENIKAH" value="Menikah" <?php if ($_smarty_tpl->getVariable('ases2')->value['PERNIKAHAN']=='Menikah'){?> checked <?php }?>  size="32">Menikah
                   <input type="radio" name="MENIKAH" value="Janda/Duda" <?php if ($_smarty_tpl->getVariable('ases2')->value['PERNIKAHAN']=='Janda/Duda'){?> checked <?php }?> size="32">Janda/Duda
                </td>
                <td>Pekerjaan</td>
                <td>
                    <input type="hidden" name="JOB_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['JOB'];?>
"><input type="text" name="JOB" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['JOB'];?>
">  </td>
              </tr>
              <tr>
                <td width='20%'>    Suku  </td>
                <td>
                    <input type="hidden" name="SUKU_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['SUKU'];?>
"><input type="text" name="SUKU" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['SUKU'];?>
">  </td>
                <td>Agama</td>
                <td>
                    <input type="hidden" name="AGAMA_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['AGAMA'];?>
">
                    <input type="radio" name="AGAMA" required value="1" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_AGAMA']=='1'){?> checked <?php }?>> Islam
                    <input type="radio" name="AGAMA" value="2"  <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_AGAMA']=='2'){?> checked <?php }?>> Kristen
                    <input type="radio" name="AGAMA" value="3" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_AGAMA']=='3'){?> checked <?php }?>> Katolik
                    <input type="radio" name="AGAMA" value="5" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_AGAMA']=='5'){?> checked <?php }?>> Budha
                    <input type="radio" name="AGAMA" value="4" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_AGAMA']=='4'){?> checked <?php }?>> Hindu
                    <input type="radio" name="AGAMA" value="6" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_AGAMA']=='6'){?> checked <?php }?>> Khonghucu
                 </td>
              </tr>


              <tr class="headrow">
                <th colspan="4">OBJEKTIF</th>
              </tr>
              <tr>
                       
                <td>Kesadaran</td>
                <td> 
                    <input type="hidden" name="KESADARAN_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['KESADARAN'];?>
">
                    <input type="radio"  name="KESADARAN" <?php if ($_smarty_tpl->getVariable('ases2')->value['KESADARAN']=='Compos metis'){?> checked <?php }?> required value="Compos metis"> Compos metis
                    <input type="radio" name="KESADARAN"  <?php if ($_smarty_tpl->getVariable('ases2')->value['KESADARAN']=='Somnolen'){?> checked <?php }?> value="Somnolen">  Somnolen
                    <input type="radio" name="KESADARAN" <?php if ($_smarty_tpl->getVariable('ases2')->value['KESADARAN']=='Apatis'){?> checked <?php }?> value="Apatis">  Apatis
                    <input type="radio" name="KESADARAN" <?php if ($_smarty_tpl->getVariable('ases2')->value['KESADARAN']=='Sopor'){?> checked <?php }?> value="Sopor">  Sopor
                    <input type="radio" name="KESADARAN" <?php if ($_smarty_tpl->getVariable('ases2')->value['KESADARAN']=='Coma'){?> checked <?php }?>  value="Coma">  Coma
                    
                   </td> 
           
                 <td> GCS   </td>
                 <td>  
                    <input type="hidden" name="GCS_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['GCS'];?>
"> <input type="text" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['GCS'];?>
" name="GCS"> </td>
                 </tr>


        <tr class="headrow">
            <th colspan="4">Vital Sign</th>
        </tr>
        <tr>
            <td width='15%'>Suhu</td>
            <td width='35%'>
                <input type="hidden" name="FS_SUHU_0" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_SUHU'];?>
"><input type="text" name="FS_SUHU" size="10" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_SUHU'];?>
"/></td>
            <td width='15%'>Nadi</td>
            <td width='35%'>
                <input type="hidden" name="FS_NADI_0" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_NADI'];?>
"><input type="text" name="FS_NADI" size="10" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_NADI'];?>
" /> x/menit</td>
        </tr>
        <tr> 
            <td>R</td>
            <td>
                <input type="hidden" name="FS_R_0" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_R'];?>
"><input type="text" name="FS_R" size="10" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_R'];?>
" /> x/menit</td>
            <td>TD</td>
            <td>
                <input type="hidden" name="FS_TD_0" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_TD'];?>
"><input type="text" name="FS_TD" size="10" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_TD'];?>
" /> mmHg</td>
        </tr>
        <tr>
            <td>Tinggi Badan</td>
            <td>
                <input type="hidden" name="FS_TB_0" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_TB'];?>
"><input type="text" name="FS_TB" size="10" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_TB'];?>
"/> cm</td>
            <td>Berat Badan</td>
            <td>
                <input type="hidden" name="FS_TB_0" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_BB'];?>
"><input type="text" name="FS_BB" size="10" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_BB'];?>
"/> Kg</td>
        </tr>
        
    </table>

    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">   </th>
        </tr>
        <tr>
            <td style="width: 200px;">B1 (Breathing</td>
            <td colspan="3">
                <table>
                    <tr>
                        <td>Irama Nafas</td>
                        <td>
                            <input type="hidden" name="IRAMA_NAFAS_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['IRAMA_NAFAS'];?>
"><input type="radio" name="IRAMA_NAFAS" <?php if ($_smarty_tpl->getVariable('ases2')->value['IRAMA_NAFAS']=='Teratur'){?> checked <?php }?> value="Teratur">Teratur </td>
                        <td><input type="radio" name="IRAMA_NAFAS" <?php if ($_smarty_tpl->getVariable('ases2')->value['IRAMA_NAFAS']=='Tidak'){?> checked <?php }?>  value="Tidak">Tidak Teratur </td>
                    </tr>
                    <tr>
                        <td> Batuk  </td>
                        <td>
                            <input type="hidden" name="BATUK_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['BATUK'];?>
"><input type="radio" name="BATUK" <?php if ($_smarty_tpl->getVariable('ases2')->value['BATUK']=='Tidak'){?> checked <?php }?> value="Tidak">Tidak   </td>
                        <td><input type="radio" name="BATUK" <?php if ($_smarty_tpl->getVariable('ases2')->value['BATUK']=='Ada'){?> checked <?php }?> value="Ada">Ada </td>
                       
                    </tr>
                    <tr>
                        <td> Pola Pernafasan  </td> 
                        <td>
                            <input type="hidden" name="POLA_NAFAS_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['POLA_NAFAS'];?>
"><input type="radio" name="POLA_NAFAS" <?php if ($_smarty_tpl->getVariable('ases2')->value['POLA_NAFAS']=='Tidak'){?> checked <?php }?> value="Tidak">Tidak ada  </td>
                        <td><input type="radio" name="POLA_NAFAS" <?php if ($_smarty_tpl->getVariable('ases2')->value['POLA_NAFAS']=='Dypsnoe'){?> checked <?php }?> value="Dypsnoe">  Dypsnoe  </td>
                        <td><input type="radio" name="POLA_NAFAS" <?php if ($_smarty_tpl->getVariable('ases2')->value['POLA_NAFAS']=='Kusmaul'){?> checked <?php }?> value="Kusmaul">  Kusmaul  </td>
                        <td><input type="radio" name="POLA_NAFAS" <?php if ($_smarty_tpl->getVariable('ases2')->value['POLA_NAFAS']=='Cheyne Stoke'){?> checked <?php }?> value="Cheyne Stoke">  Cheyne Stoke  </td>
                    </tr>
                    <tr>
                        <td> Suara Nafas  </td>
                        <td>
                            <input type="hidden" name="SUARA_NAFAS_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['DIAGNOSA'];?>
"><input type="radio" name="SUARA_NAFAS" <?php if ($_smarty_tpl->getVariable('ases2')->value['SUARA_NAFAS']=='Gargling'){?> checked <?php }?> value="Gargling">Gargling  </td>
                        <td><input type="radio" name="SUARA_NAFAS" <?php if ($_smarty_tpl->getVariable('ases2')->value['SUARA_NAFAS']=='Snoring'){?> checked <?php }?> value="Snoring"> Snoring </td>
                        <td><input type="radio" name="SUARA_NAFAS" <?php if ($_smarty_tpl->getVariable('ases2')->value['SUARA_NAFAS']=='Stidor'){?> checked <?php }?> value="Stidor">Stidor</td>
                        <td><input type="radio" name="SUARA_NAFAS" <?php if ($_smarty_tpl->getVariable('ases2')->value['SUARA_NAFAS']=='Tidak'){?> checked <?php }?> value="Tidak">  Tidak Ada  </td>
                    </tr>
                    <tr>
                        <td> Alat Bantu Nafas  </td>
                        <input type="hidden" name="BANTU_NAFAS_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['BANTU_NAFAS'];?>
">

                        <td><input type="radio" name="BANTU_NAFAS" <?php if ($_smarty_tpl->getVariable('ases2')->value['BANTU_NAFAS']=='Tidak'){?> checked <?php }?> class="rad" value="Tidak">Tidak   </td>
                        <td><input type="radio" name="BANTU_NAFAS" <?php if ($_smarty_tpl->getVariable('ases2')->value['BANTU_NAFAS']!='Tidak'){?> checked <?php }?>  class="rad" value="Ada">Ya 
                            <input type="text"  id="form2" <?php if ($_smarty_tpl->getVariable('ases2')->value['BANTU_NAFAS']!='Tidak'){?> style="display:show" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['BANTU_NAFAS'];?>
" <?php }?>  style="display:none" name="BANTU_NAFAS2">    
                        </td>
                       
                    </tr>
                  </table> 
            </td>
        </tr>
        </table>

        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="4">   </th>
            </tr>
            <tr>
                <td style="width: 200px;">B2 (Blood)</td>
                <td colspan="3">
                    <table>
                        <tr>
                            <td>Nyeri Dada  </td>
                               <input type="hidden" name="NYERI_DADA_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['NYERI_DADA'];?>
">
                            <td><input type="radio" name="NYERI_DADA" <?php if ($_smarty_tpl->getVariable('ases2')->value['NYERI_DADA']=='Tidak'){?> checked <?php }?>  value="Tidak">Tidak Ada </td>
                            <td><input type="radio" name="NYERI_DADA" <?php if ($_smarty_tpl->getVariable('ases2')->value['NYERI_DADA']=='Ada'){?> checked <?php }?>  value="Ada">Ada </td>
                         
                        </tr>
                        <tr>
                            <td> Akral  </td>
                            <input type="hidden" name="AKRAL_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['AKRAL'];?>
">
                            <td><input type="radio" name="AKRAL" <?php if ($_smarty_tpl->getVariable('ases2')->value['AKRAL']=='Hangat'){?> checked <?php }?>  value="Hangat">Hangat </td> 
                            <td><input type="radio" name="AKRAL"  <?php if ($_smarty_tpl->getVariable('ases2')->value['AKRAL']=='Kering'){?> checked <?php }?>  value="Kering">Kering </td> 
                            <td><input type="radio" name="AKRAL" <?php if ($_smarty_tpl->getVariable('ases2')->value['AKRAL']=='Dingin'){?> checked <?php }?>  value="Dingin">Dingin </td> 
                        </tr>
                        <tr>
                            <td> Perdarahan    </td> 
                            <input type="hidden" name="PERDARAHAN_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['PERDARAHAN'];?>
">
                            <td><input type="radio" class="radp" <?php if ($_smarty_tpl->getVariable('ases2')->value['PERDARAHAN']=='Tidak'){?> checked <?php }?>  name="PERDARAHAN" value="Tidak">Tidak ada  </td> 
                            <td><input type="radio" class="radp" <?php if ($_smarty_tpl->getVariable('ases2')->value['PERDARAHAN']=='Ada'){?> checked <?php }?>   name="PERDARAHAN" value="Ada">  ada
                               <input type="text"  id="formp" <?php if ($_smarty_tpl->getVariable('ases2')->value['PERDARAHAN']!='Tidak'){?> style="display: show;" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['PERDARAHAN'];?>
" <?php }?> style="display:none" name="PERDARAHAN2">    
                            </td> 

                        </tr>
                        <tr>
                            <td>   Cyanosis  </td>
                            <input type="hidden" name="CYANOSIS_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['CYANOSIS'];?>
">
                            <td><input type="radio" name="CYANOSIS" <?php if ($_smarty_tpl->getVariable('ases2')->value['CYANOSIS']=='Tidak'){?> checked <?php }?> value="Tidak">Tidak Ada  </td> 
                            <td><input type="radio" name="CYANOSIS" <?php if ($_smarty_tpl->getVariable('ases2')->value['CYANOSIS']=='Ada'){?> checked <?php }?> value="Ada">Ada  </td> 
                         
                        </tr>
                        <tr>
                            <td> CRT  </td>
                            <input type="hidden" name="CRT_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['CRT'];?>
">
                            <td><input type="radio" name="CRT" <?php if ($_smarty_tpl->getVariable('ases2')->value['CRT']=='1-2'){?> checked <?php }?> value="1-2">1-2 </td>
                            <td><input type="radio" name="CRT" <?php if ($_smarty_tpl->getVariable('ases2')->value['CRT']=='>2'){?> checked <?php }?> value=">2">>2   </td>
                        </tr>
                        <tr>
                            <td> Turgor  </td>
                            <input type="hidden" name="TURGOR_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['TURGOR'];?>
">
                            <td><input type="radio" name="TURGOR" <?php if ($_smarty_tpl->getVariable('ases2')->value['TURGOR']=='Elastis'){?> checked <?php }?> value="Elastis">Elastis </td>
                            <td><input type="radio" name="TURGOR" <?php if ($_smarty_tpl->getVariable('ases2')->value['TURGOR']=='Tidak'){?> checked <?php }?> value="Tidak">>Tidak Elastis   </td>
                        </tr>
                      </table> 
                </td>
            </tr>
            </table>

            <table class="table-input" width="100%">
                <tr class="headrow">
                    <th colspan="4">   </th>
                </tr>
                <tr>
                    <td style="width: 200px;">B3 (Brain)</td>
                    <td colspan="3">
                        <table>
                           
                            <tr>
                                <td> Reflek Cahaya  </td>
                                <input type="hidden" name="REFLEK_CAHAYA_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['REFLEK_CAHAYA'];?>
">
                                <td><input type="radio" name="REFLEK_CAHAYA" <?php if ($_smarty_tpl->getVariable('ases2')->value['REFLEK_CAHAYA']=='Positif'){?> checked <?php }?> value="Positif"> Positif </td>  
                                <td><input type="radio" name="REFLEK_CAHAYA" <?php if ($_smarty_tpl->getVariable('ases2')->value['REFLEK_CAHAYA']=='Negatif'){?> checked <?php }?> value="Negatif"> Negatif </td>  
                            </tr>
                            <tr>
                                <td> Pupil    </td> 
                                <input type="hidden" name="PUPIL_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['PUPIL'];?>
">
                                <td><input type="radio" name="PUPIL" <?php if ($_smarty_tpl->getVariable('ases2')->value['PUPIL']=='Isokor'){?> checked <?php }?> value="Isokor">Isokor  </td> 
                                <td><input type="radio" name="PUPIL" <?php if ($_smarty_tpl->getVariable('ases2')->value['PUPIL']=='Anisokor'){?> checked <?php }?>  value="Anisokor">  Anisokor  </td> 
                            </tr>
                            <tr>
                                <td>   Kelumpuhan  </td>
                                <input type="hidden" name="LUMPUH_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['LUMPUH'];?>
">
                                <td><input type="radio" name="LUMPUH" <?php if ($_smarty_tpl->getVariable('ases2')->value['LUMPUH']=='Tidak'){?> checked <?php }?> value="Tidak">Tidak Ada  </td> 
                                <td><input type="radio" name="LUMPUH" <?php if ($_smarty_tpl->getVariable('ases2')->value['LUMPUH']=='Ada'){?> checked <?php }?> value="Ada">Ada  </td> 
                                
                            </tr>
                            <tr>
                                <td> Pusing  </td>
                                <input type="hidden" name="PUSING_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['PUSING'];?>
">
                                <td><input type="radio" name="PUSING" <?php if ($_smarty_tpl->getVariable('ases2')->value['PUSING']=='Tidak'){?> checked <?php }?> value="Tidak">Tidak Ada  </td> 
                                <td><input type="radio" name="PUSING"  <?php if ($_smarty_tpl->getVariable('ases2')->value['PUSING']=='Ada'){?> checked <?php }?> value="Ada">Ada  </td> 
                               
                            </tr>
                           
                          </table> 
                    </td>
                </tr>
                </table>
    
                <table class="table-input" width="100%">
                    <tr class="headrow">
                        <th colspan="4">   </th>
                    </tr>
                    <tr>
                        <td style="width: 200px;">B4 (BAK)</td>
                        <td colspan="3">
                            <table>
                               
                               
                                <tr>
                                    <td>   BAK  </td>
                                    <input type="hidden" name="BAK_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['BAK'];?>
">
                                    <td><input type="radio" name="BAK" <?php if ($_smarty_tpl->getVariable('ases2')->value['BAK']=='Spontak'){?> checked <?php }?> value="Spontak">Spontak  </td> 
                                    <td><input type="radio" name="BAK" <?php if ($_smarty_tpl->getVariable('ases2')->value['BAK']=='Tidak'){?> checked <?php }?>  value="Tidak">Tidak  Spontak  </td> 
                                </tr>
                                <tr>
                                    <td> Nyeri Tekan  </td>
                                    <input type="hidden" name="BAK_TEKAN_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['BAK_TEKAN'];?>
">
                                    <td><input type="radio" name="BAK_TEKAN" <?php if ($_smarty_tpl->getVariable('ases2')->value['BAK_TEKAN']=='Ada'){?> checked <?php }?> value="Ada">Ada  </td> 
                                    <td><input type="radio" name="BAK_TEKAN" <?php if ($_smarty_tpl->getVariable('ases2')->value['BAK_TEKAN']=='Tidak'){?> checked <?php }?> value="Tidak">Tidak Ada  </td> 
                                </tr>
                                <tr>
                                    <td> Produksi Urine    </td>
                                    <input type="hidden" name="URINE_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['URINE'];?>
">
                                    <td><input type="text" name="URINE" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['URINE'];?>
"></td>
                                    </tr>
                               
                              </table> 
                        </td>
                    </tr>
                    </table>

         <table class="table-input" width="100%">
                    <tr class="headrow">
                        <th colspan="4">   </th>
                    </tr>
                    <tr>
                        <td style="width: 200px;">B5 (Bowel)</td>
                        <td colspan="3">
                            <table>
                               
                               
                                <tr>
                                    <td>   BAB  </td>
                                    <input type="hidden" name="BAB_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['BAB'];?>
">
                                    <td><input type="radio" name="BAB" value="Normal" <?php if ($_smarty_tpl->getVariable('ases2')->value['BAB']=='Normal'){?> checked <?php }?>>Normal  </td>  
                                    <td><input type="radio" name="BAB" value="Cair" <?php if ($_smarty_tpl->getVariable('ases2')->value['BAB']=='Cair'){?> checked <?php }?>>Cair  </td>  
                                    <td><input type="radio" name="BAB" value="Konstipasi"  <?php if ($_smarty_tpl->getVariable('ases2')->value['BAB']=='Konstipasi'){?> checked <?php }?>>Konstipasi  </td>  
                                </tr>
                                <tr>
                                    <td>   Abdomen  </td>
                                    <input type="hidden" name="ABDOMEN_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['ABDOMEN'];?>
">
                                    <td><input type="radio" name="ABDOMEN" value="Supel" <?php if ($_smarty_tpl->getVariable('ases2')->value['ABDOMEN']=='Supel'){?> checked <?php }?>>Supel  </td>  
                                    <td><input type="radio" name="ABDOMEN" value="Kembang" <?php if ($_smarty_tpl->getVariable('ases2')->value['ABDOMEN']=='Kembang'){?> checked <?php }?>>Kembang  </td>  
                                    <td><input type="radio" name="ABDOMEN" value="Ascites" <?php if ($_smarty_tpl->getVariable('ases2')->value['ABDOMEN']=='Ascites'){?> checked <?php }?>>Ascites  </td>  
                                    <td><input type="radio" name="ABDOMEN" value="Tegang" <?php if ($_smarty_tpl->getVariable('ases2')->value['ABDOMEN']=='Tegang'){?> checked <?php }?>>Tegang  </td>  
                                </tr>
                                <tr>
                                    <td> Nyeri Tekan  </td>
                                    <input type="hidden" name="BAB_TEKAN_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['BAB_TEKAN'];?>
">
                                    <td><input type="radio" name="BAB_TEKAN" value="Tidak" <?php if ($_smarty_tpl->getVariable('ases2')->value['BAB_TEKAN']=='Tidak'){?> checked <?php }?>>Tidak Ada  </td> 
                                    <td><input type="radio" name="BAB_TEKAN" value="Ada" <?php if ($_smarty_tpl->getVariable('ases2')->value['BAB_TEKAN']=='Ada'){?> checked <?php }?>>Ada  </td> 
                                   
                                </tr> 
                                 
                                <tr>
                                    <td> Jejas Abdomen    </td>
                                    <input type="hidden" name="JEJAS_ABDOMEN_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['JEJAS_ABDOMEN'];?>
">
                                    <td><input type="radio" name="JEJAS_ABDOMEN" value="Tidak" <?php if ($_smarty_tpl->getVariable('ases2')->value['JEJAS_ABDOMEN']=='Tidak'){?> checked <?php }?>>Tidak Ada  </td> 
                                    <td><input type="radio" name="JEJAS_ABDOMEN" value="Ada" <?php if ($_smarty_tpl->getVariable('ases2')->value['JEJAS_ABDOMEN']=='Ada'){?> checked <?php }?>>Ada  </td> 
                                   
                                </tr> 
                               
                              </table> 
                        </td>
                    </tr>
                    </table>


                      <table class="table-input" width="100%">
                    <tr class="headrow">
                        <th colspan="4">   </th>
                    </tr>
                    <tr>
                        <td style="width: 200px;">B6 (Bone)</td>
                        <td colspan="3">
                            <table>
                               
                               
                                <tr>
                                    <td>   Pergerakan Sendi  </td>
                                    <input type="hidden" name="SENDI_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['SENDI'];?>
">
                                    <td><input type="radio" name="SENDI" value="Bebas" <?php if ($_smarty_tpl->getVariable('ases2')->value['SENDI']=='Bebas'){?> checked <?php }?>>Bebas  </td>  
                                    <td><input type="radio" name="SENDI" value="Terbatas" <?php if ($_smarty_tpl->getVariable('ases2')->value['SENDI']=='Terbatas'){?> checked <?php }?>>Terbatas  </td>   
                                </tr>
                                <tr>
                                    <td>   DIslokasi  </td>
                                    <input type="hidden" name="DISLOK_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['DISLOK'];?>
">
                                    <td><input type="radio" name="DISLOK" value="Tidak" <?php if ($_smarty_tpl->getVariable('ases2')->value['DISLOK']=='Tidak'){?> checked <?php }?>>Tidak Ada  </td>   
                                    <td><input type="radio" name="DISLOK" value="Ada" <?php if ($_smarty_tpl->getVariable('ases2')->value['DISLOK']=='Ada'){?> checked <?php }?>>Ada  </td>   
                                  
                                </tr>
                                <tr>
                                    <td> Fraktur    </td>
                                    <input type="hidden" name="FRAKTUR_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FRAKTUR'];?>
">
                                    <td><input type="radio" name="FRAKTUR" class="radf" <?php if ($_smarty_tpl->getVariable('ases2')->value['FRAKTUR']=='Tidak'){?> checked <?php }?> value="Tidak">Tidak Ada  </td> 
                                    <td><input type="radio" name="FRAKTUR" class="radf" <?php if ($_smarty_tpl->getVariable('ases2')->value['FRAKTUR']!='Tidak'){?> checked <?php }?> value="Ada">Ada  
                                       <input type="text"  id="formf" <?php if ($_smarty_tpl->getVariable('ases2')->value['FRAKTUR']!='Tidak'){?> style="display: show;" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FRAKTUR'];?>
" <?php }?> style="display:none" name="FRAKTUR2">    
                                        </td> 
                                    
                                </tr> 
                                 
                                <tr>
                                    <td> Luka      </td>
                                    <input type="hidden" name="LUKA_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['LUKA'];?>
">
                                    <td><input type="radio" name="LUKA" value="Tidak" <?php if ($_smarty_tpl->getVariable('ases2')->value['LUKA']=='Tidak'){?> checked <?php }?>>Tidak Ada  </td> 
                                    <td><input type="radio" name="LUKA" value="Ada" <?php if ($_smarty_tpl->getVariable('ases2')->value['LUKA']=='Ada'){?> checked <?php }?>>Ada  </td> 
                                   
                                    <td><input type="radio" name="LUKA" value="Bersih" <?php if ($_smarty_tpl->getVariable('ases2')->value['LUKA']=='Bersih'){?> checked <?php }?>>Bersih  </td> 
                                    <td><input type="radio" name="LUKA" value="Kotor" <?php if ($_smarty_tpl->getVariable('ases2')->value['LUKA']=='Kotor'){?> checked <?php }?>>Kotor  </td> 

                                </tr> 
                               
                              </table> 
                        </td>
                    </tr>
                    </table>


    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Asesmen Nyeri</th>
        </tr>
        <tr>
            <td width='20%'>Ada Nyeri ?</td>
            <td width='30%'>
                <input type="hidden" name="FS_NYERI_0" value="<?php echo $_smarty_tpl->getVariable('nyeri')->value['FS_NYERI'];?>
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
                <input type="hidden" name="FS_NYERIP_0" value="<?php echo $_smarty_tpl->getVariable('nyeri')->value['FS_NYERIP'];?>
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
                <input type="hidden" name="FS_NYERIQ_0" value="<?php echo $_smarty_tpl->getVariable('nyeri')->value['FS_NYERIQ'];?>
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
                <input type="hidden" name="FS_NYERIR_0" value="<?php echo $_smarty_tpl->getVariable('nyeri')->value['FS_NYERIR'];?>
">
                <input type="text" name="FS_NYERIR" size="30" value="<?php echo $_smarty_tpl->getVariable('nyeri')->value['FS_NYERIR'];?>
"/>
            </td>
            <td>Severity</td>
            <td>
                <input type="hidden" name="FS_NYERIS_0" value="<?php echo $_smarty_tpl->getVariable('nyeri')->value['FS_NYERIS'];?>
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
                <input type="hidden" name="FS_NYERIT_0" value="<?php echo $_smarty_tpl->getVariable('nyeri')->value['FS_NYERIT'];?>
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
    <!-- <table>
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
        </table> -->

        <input type="hidden" name="FS_SCORE">
    <table class="table-input" width="100%">
                <tr class="headrow">
                    <th colspan="4">Riwayat Alergi</th>
                </tr>
                <tr>
                    <td width='20%'>Riwayat Alergi</td>
                    <td width='30%'>
                        <input type="hidden" name="FS_ALERGI_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_ALERGI'];?>
">
                        <input type="text" name="FS_ALERGI" size="35" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('alergi')->value['FS_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
">
                        <em style="color:red">* Wajib Diisi</em>
                    </td>
                    <td width='20%'>Reaksi Alergi</td>
                    <td width='30%'>
                        <input type="hidden" name="FS_REAK_ALERGI_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_REAK_ALERGI'];?>
">
                        <input type="text" name="FS_REAK_ALERGI" size="35" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('alergi')->value['FS_REAK_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
">
                        <em style="color:red">* Wajib Diisi</em>
                    </td>
                </tr>
                <tr>
                    <td width='20%'>  Status Kehamilan  </td>
                    <td width='30%'>
                        <input type="hidden" name="HAMIL_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['HAMIL'];?>
">
                       <input type="radio" name="HAMIL" class="radh" value="Tidak"  <?php if ($_smarty_tpl->getVariable('ases2')->value['HAMIL']=='Tidak'){?> checked <?php }?> size="32">Tidak
                       <input type="radio" name="HAMIL"  class="radh" value="Ya" <?php if ($_smarty_tpl->getVariable('ases2')->value['HAMIL']!='Tidak'){?> checked <?php }?> size="32">Ya
                       <input type="text"  id="formh" <?php if ($_smarty_tpl->getVariable('ases2')->value['HAMIL']!='Tidak'){?> style="display:show;"  value="<?php echo $_smarty_tpl->getVariable('ases2')->value['HAMIL'];?>
" <?php }?>   name="HAMIL2">    
                    </td>
                </tr>
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
               <input type="text" name="FS_RIW_PENYAKIT_DAHULU" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('alergi')->value['FS_RIW_PENYAKIT_DAHULU'])===null||$tmp==='' ? '-' : $tmp);?>
" size="32">
            </td>
            <td width='20%'>Riwayat penyakit keluarga</td>
            <td width='30%'>
                <input type="hidden" name="FS_RIW_PENYAKIT_DAHULU2_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_RIW_PENYAKIT_DAHULU2'];?>
">
                <input type="text" name="FS_RIW_PENYAKIT_DAHULU2" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('alergi')->value['FS_RIW_PENYAKIT_DAHULU2'])===null||$tmp==='' ? '-' : $tmp);?>
" size="32">
            
            </td>
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
                <input type="hidden" name="FS_STATUS_PSIK2_0" id="civstaton3" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK2']=='0'){?>disabled=""<?php }?> size="27" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK2'];?>
">
                <input type="hidden" name="FS_STATUS_PSIK2" id="civstaton3" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK2']=='0'){?>disabled=""<?php }?> size="27" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK2'];?>
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
        <tr>
            <td>Status Mental</td>
            <td>
                <input type="hidden" name="MENTAL_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['MENTAL'];?>
">
                <input type="radio" required name="MENTAL" value="Kooperatif" <?php if ($_smarty_tpl->getVariable('ases2')->value['MENTAL']=='Kooperatif'){?> checked <?php }?>> Kooperatif
                <input type="radio" name="MENTAL" value="tidak" <?php if ($_smarty_tpl->getVariable('ases2')->value['MENTAL']=='tidak'){?> checked <?php }?>> Tidak Kooperatif
                <input type="radio" name="MENTAL" value="Gelisah" <?php if ($_smarty_tpl->getVariable('ases2')->value['MENTAL']=='Gelisah'){?> checked <?php }?>>  Gelisah 
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
                <input type="hidden" name="FS_FUNGSIONAL1_0" value="<?php echo $_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL1'];?>
">
                        <select name="FS_FUNGSIONAL1"  id="op1" class="select2" style="width: 190px;">
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
                        <input type="hidden" name="FS_FUNGSIONAL2_0" value="<?php echo $_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL2'];?>
">
                        <select name="FS_FUNGSIONAL2" id="op2"  class="select2" style="width: 190px;">
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
                        <input type="hidden" name="FS_FUNGSIONAL3_0" value="<?php echo $_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL3'];?>
">
                        <select name="FS_FUNGSIONAL3" id="op3"  class="select2" style="width: 190px;">
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
                        <input type="hidden" name="FS_FUNGSIONAL4_0" value="<?php echo $_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL4'];?>
">
                        <select name="FS_FUNGSIONAL4" id="op4"  class="select2" style="width: 190px;">
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
                        <input type="hidden" name="FS_FUNGSIONAL5_0" value="<?php echo $_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL5'];?>
">
                        <select name="FS_FUNGSIONAL5" id="op5"   class="select2" style="width: 190px;">
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
                        <select name="FS_FUNGSIONAL6" id="op6"  class="select2" style="width: 190px;">
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
                        <input type="hidden" name="FS_FUNGSIONAL7_0" value="<?php echo $_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL7'];?>
">
                        <select name="FS_FUNGSIONAL7" id="op7"  class="select2" style="width: 190px;">
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
                        <input type="hidden" name="FS_FUNGSIONAL8_0" value="<?php echo $_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL8'];?>
">
                        <select name="FS_FUNGSIONAL8" id="op8"  class="select2" style="width: 190px;">
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
                        <input type="hidden" name="FS_FUNGSIONAL9_0" value="<?php echo $_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL9'];?>
">
                        <select name="FS_FUNGSIONAL9" id="op9"  class="select2" style="width: 190px;">
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
                        <input type="hidden" name="FS_FUNGSIONAL10_0" value="<?php echo $_smarty_tpl->getVariable('fungsi')->value['FS_FUNGSIONAL10'];?>
">
                        <select name="FS_FUNGSIONAL10" id="op10"  class="select2" style="width: 190px;">
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
    

    
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Asesmen Resiko Dekubitus</th>
        </tr>
        <tr>
            <input type="hidden" name="KURSI_RODA_0" value="<?php echo $_smarty_tpl->getVariable('fungsi')->value['KURSI_RODA'];?>
">

            <td width='20%'>Apakah Pasien menggunakan kursi roda/mmembutuhkan bantuan ?</td>
            <td width='30%'>
                <select name="KURSI_RODA" class="select2" style="width: 190px;" id="op1">
                    <option value="">--Pilih Data--</option>
                    <option <?php if ($_smarty_tpl->getVariable('ases2')->value['KURSI_RODA']!='Ya'){?> selected <?php }?> value="Tidak">TIDAK</option>
                    <option <?php if ($_smarty_tpl->getVariable('ases2')->value['KURSI_RODA']=='Ya'){?> selected <?php }?> value="Ya">YA</option>

                </select>
          
            </td>
             
        </tr>
        <tr> 

            <td width='20%'>Apakah ada inkontinensiauri / alvi?</td>
            <td width='30%'>
                <input type="hidden" name="ALVI_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['ALVI'];?>
">
                <select name="ALVI" class="select2" style="width: 190px;" id="op2">
                    <option value="">--Pilih Data--</option>
                    <option <?php if ($_smarty_tpl->getVariable('ases2')->value['ALVI']!='Ya'){?> selected <?php }?> value="Tidak">TIDAK</option>
                    <option <?php if ($_smarty_tpl->getVariable('ases2')->value['ALVI']=='Ya'){?> selected <?php }?> value="Ya">YA</option>
                </select>
                <span id="sc2"></span>
            </td> 
        </tr>
        <tr>
            <td>Apakah ada  riwayat dekubitus atau luka dekubitus? </td>
            <td>
                <input type="hidden" name="RIWAYAT_DEKUBITUS_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['RIWAYAT_DEKUBITUS'];?>
">
                <select name="RIWAYAT_DEKUBITUS" class="select2" style="width: 190px;" id="op3">
                    <option value="">--Pilih Data--</option>
                    <option <?php if ($_smarty_tpl->getVariable('ases2')->value['RIWAYAT_DEKUBITUS']!='Ya'){?> selected <?php }?> value="Tidak">TIDAK</option>
                    <option <?php if ($_smarty_tpl->getVariable('ases2')->value['RIWAYAT_DEKUBITUS']=='Ya'){?> selected <?php }?> value="Ya">YA</option>
                </select>
                <span id="sc3"></span>
            </td>
            
        </tr>
        <tr>
            <td>Apakah Usia diatas 65 tahun? </td>
            <td>
                <input type="hidden" name="USIA65_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['USIA65'];?>
">
                <select name="USIA65" class="select2" style="width: 190px;" id="op3">
                    <option value="">--Pilih Data--</option>
                    <option <?php if ($_smarty_tpl->getVariable('ases2')->value['USIA65']!='Ya'){?> selected <?php }?> value="Tidak">TIDAK</option>
                    <option <?php if ($_smarty_tpl->getVariable('ases2')->value['USIA65']=='Ya'){?> selected <?php }?> value="Ya">YA</option>
                </select>
                <span id="sc3"></span>
            </td>
            
        </tr>
        <tr>
            <td>Apakah Ekstremitas dan badan tidak sesuai dengan usia perkembangan </td>
            <td>
                <input type="hidden" name="ANAK_SESUAI_UMUR_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['ANAK_SESUAI_UMUR'];?>
">
                <select name="ANAK_SESUAI_UMUR" class="select2" style="width: 190px;" id="op3">
                    <option value="">--Pilih Data--</option>
                    <option <?php if ($_smarty_tpl->getVariable('ases2')->value['ANAK_SESUAI_UMUR']!='Ya'){?> selected <?php }?> value="Tidak">TIDAK</option>
                    <option <?php if ($_smarty_tpl->getVariable('ases2')->value['ANAK_SESUAI_UMUR']=='Ya'){?> selected <?php }?> value="Ya">YA</option>
                </select>
                <span id="sc3"></span>
            </td>
            
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
            <th colspan="4">Keperawatan</th>
        </tr>
        <tr>
            <td width='20%'>Masalah Keperawatan</td>
            <td width='30%'>
                <select name="tujuan[]" multiple id="tujuan" style="width:250px">
                        <option></option>
                    </select>
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
                <input type="submit" name="save" value="Simpan" class="edit-button" /> 
            </td>
        </tr>
    </table>
</form>