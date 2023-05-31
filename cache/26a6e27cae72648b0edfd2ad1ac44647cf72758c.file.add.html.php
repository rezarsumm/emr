<?php /* Smarty version Smarty-3.0.7, created on 2022-07-27 14:05:51
         compiled from "application/views\inap/ass_awal/add.html" */ ?>
<?php /*%%SmartyHeaderCode:934062e0e3cfadc800-35203683%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26a6e27cae72648b0edfd2ad1ac44647cf72758c' => 
    array (
      0 => 'application/views\\inap/ass_awal/add.html',
      1 => 1658904290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '934062e0e3cfadc800-35203683',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><!-- include javascript -->
<?php $_template = new Smarty_Internal_Template("inap/ass_awal/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of include javascript-->
<div class="breadcrum">
    <p>
        <a href="#">Data Arsip</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal/cari');?>
">Asesmen Awal Rawat Inap</a><span></span>
        <small>Add Data</small>
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
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal/add_process');?>
" method="post">
        <input type="hidden" name="FS_KD_REG" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <input type="hidden" name="FS_KD_MEDIS" value="<?php echo $_smarty_tpl->getVariable('FS_KD_MEDIS')->value;?>
" />
        <input type="hidden" name="FS_KD_LAYANAN" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['KODE_BANGSAL'];?>
" />
        <input type="hidden" name="FS_MR" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />

        <table class="table-info" width="100%">
            <tr class="headrow">
                <th colspan="2">Add Asesmen Awal Rawat Inap</th>
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
                    <textarea cols="50" name="FS_ANAMNESA">-</textarea>
                </td>
                <td colspan="2">
                    <textarea cols="50" name="FS_PEMERIKSAAN_FISIK">-</textarea>

                </td>
            </tr>
            <tr>
                <td width='20%'><b>  Bio Sosio  </b>  </td>
               </tr> 
            <tr>
                <td width='20%'>  Status Pernikahan  </td>
                <td width='30%'>
                   <input type="radio" name="MENIKAH" value="Belum" <?php if ($_smarty_tpl->getVariable('data')->value['MENIKAH']=='Belum'){?> checked <?php }?>  size="32"> Belum 
                   <input type="radio" name="MENIKAH" value="Menikah" <?php if ($_smarty_tpl->getVariable('data')->value['MENIKAH']=='Menikah'){?> checked <?php }?>  size="32">Menikah
                   <input type="radio" name="MENIKAH" required="" value="Janda/Duda" <?php if ($_smarty_tpl->getVariable('data')->value['MENIKAH']=='Janda/Duda'){?> checked <?php }?> size="32">Janda/Duda
                </td>
                <td>Pekerjaan</td>
                <td><input type="text" name="JOB" required="" value="<?php echo $_smarty_tpl->getVariable('data')->value['JOB'];?>
">  </td>
              </tr>
              <tr>
                <td width='20%'>    Suku  </td>
                <td><input type="text" name="SUKU" required="" value="<?php echo $_smarty_tpl->getVariable('data')->value['SUKU'];?>
">  </td>
                <td>Agama</td>
                <td>
                    <input type="radio" name="AGAMA" required value="1" <?php if ($_smarty_tpl->getVariable('data')->value['AGAMA']=='1'){?> checked <?php }?>> Islam
                    <input type="radio" name="AGAMA" value="2"  <?php if ($_smarty_tpl->getVariable('data')->value['AGAMA']=='2'){?> checked <?php }?>> Kristen
                    <input type="radio" name="AGAMA" value="3" <?php if ($_smarty_tpl->getVariable('data')->value['AGAMA']=='3'){?> checked <?php }?>> Katolik
                    <input type="radio" name="AGAMA" value="5" <?php if ($_smarty_tpl->getVariable('data')->value['AGAMA']=='5'){?> checked <?php }?>> Budha
                    <input type="radio" name="AGAMA" value="4" <?php if ($_smarty_tpl->getVariable('data')->value['AGAMA']=='4'){?> checked <?php }?>> Hindu
                    <input type="radio" name="AGAMA" value="6" <?php if ($_smarty_tpl->getVariable('data')->value['AGAMA']=='6'){?> checked <?php }?>> Khonghucu
                 </td>
              </tr>
              <tr class="headrow">
                <th colspan="4">OBJEKTIF</th>
              </tr>
              <tr>
                       
                <td>Kesadaran</td>
                <td> 
                    <input type="radio" name="KESADARAN" <?php if ($_smarty_tpl->getVariable('data')->value['KESADARAN']=='Compos metis'){?> checked <?php }?> required value="Compos metis"> Compos metis
                    <input type="radio" name="KESADARAN"  <?php if ($_smarty_tpl->getVariable('data')->value['KESADARAN']=='Somnolen'){?> checked <?php }?> value="Somnolen">  Somnolen
                    <input type="radio" name="KESADARAN" required="" <?php if ($_smarty_tpl->getVariable('data')->value['KESADARAN']=='Apatis'){?> checked <?php }?> value="Apatis">  Apatis
                    <input type="radio" name="KESADARAN" <?php if ($_smarty_tpl->getVariable('data')->value['KESADARAN']=='Sopor'){?> checked <?php }?> value="Sopor">  Sopor
                    <input type="radio" name="KESADARAN" <?php if ($_smarty_tpl->getVariable('data')->value['KESADARAN']=='Coma'){?> checked <?php }?>  value="Coma">  Coma
                    
                   </td> 
           
               <td> GCS   </td>
                 <td>   <input type="text" value="<?php echo $_smarty_tpl->getVariable('data')->value['GCS'];?>
" required="" name="GCS"> </td>
                 </tr>

            <tr class="headrow">
                <th colspan="4">Vital Sign</th>
            </tr>
            <tr>
                <td width='20%'>Suhu</td>
                <td width='30%'><input type="text" name="FS_SUHU" required=""  size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('vs')->value['FS_ANAMNESA'])===null||$tmp==='' ? '-' : $tmp);?>
"/></td>
                <td width='20%'>Nadi</td>
                <td width='30%'><input type="text" name="FS_NADI"  required="" size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('vs')->value['FS_ANAMNESA'])===null||$tmp==='' ? '-' : $tmp);?>
"/> x/menit</td>
            </tr>
            <tr>
                <td>R</td>
                <td><input type="text" name="FS_R" size="10" required="" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('vs')->value['FS_ANAMNESA'])===null||$tmp==='' ? '-' : $tmp);?>
"/> x/menit</td>
                <td>TD</td>
                <td><input type="text" name="FS_TD" size="10" required="" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('vs')->value['FS_ANAMNESA'])===null||$tmp==='' ? '-' : $tmp);?>
"/> mmHg</td>
            </tr>
            <tr>
                <td>Tinggi Badan</td>
                <td><input type="text" name="FS_TB" size="10" required=""  value="<?php echo (($tmp = @$_smarty_tpl->getVariable('vs')->value['FS_ANAMNESA'])===null||$tmp==='' ? '-' : $tmp);?>
"/> cm</td>
                <td>Berat Badan</td>
                <td><input type="text" name="FS_BB" size="10" required="" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('vs')->value['FS_ANAMNESA'])===null||$tmp==='' ? '-' : $tmp);?>
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
                            <td><input type="radio" name="IRAMA_NAFAS" required="" <?php if ($_smarty_tpl->getVariable('data')->value['IRAMA_NAFAS']=='Teratur'){?> checked <?php }?> value="Teratur">Teratur </td>
                            <td><input type="radio" name="IRAMA_NAFAS" <?php if ($_smarty_tpl->getVariable('data')->value['IRAMA_NAFAS']=='Tidak'){?> checked <?php }?>  value="Tidak">Tidak Teratur </td>
                        </tr>
                        <tr>
                            <td> Batuk  </td>
                            <td><input type="radio" name="BATUK" required="" <?php if ($_smarty_tpl->getVariable('data')->value['BATUK']=='Tidak'){?> checked <?php }?> value="Tidak">Tidak   </td>
                            <td><input type="radio" name="BATUK"  <?php if ($_smarty_tpl->getVariable('data')->value['BATUK']=='Ada'){?> checked <?php }?> value="Ada">Ada </td>
                           
                        </tr>
                        <tr>
                            <td> Pola Pernafasan  </td> 
                            <td><input type="radio" name="POLA_NAFAS" required="" <?php if ($_smarty_tpl->getVariable('data')->value['POLA_NAFAS']=='Tidak'){?> checked <?php }?> value="Tidak">Tidak ada  </td>
                            <td><input type="radio" name="POLA_NAFAS" <?php if ($_smarty_tpl->getVariable('data')->value['POLA_NAFAS']=='Dypsnoe'){?> checked <?php }?> value="Dypsnoe">  Dypsnoe  </td>
                            <td><input type="radio" name="POLA_NAFAS" <?php if ($_smarty_tpl->getVariable('data')->value['POLA_NAFAS']=='Kusmaul'){?> checked <?php }?> value="Kusmaul">  Kusmaul  </td>
                            <td><input type="radio" name="POLA_NAFAS" <?php if ($_smarty_tpl->getVariable('data')->value['POLA_NAFAS']=='Cheyne Stoke'){?> checked <?php }?> value="Cheyne Stoke">  Cheyne Stoke  </td>
                        </tr>
                        <tr>
                            <td> Suara Nafas  </td>
                            <td><input type="radio" name="SUARA_NAFAS" required="" <?php if ($_smarty_tpl->getVariable('data')->value['SUARA_NAFAS']=='Gargling'){?> checked <?php }?> value="Gargling">Gargling  </td>
                            <td><input type="radio" name="SUARA_NAFAS" <?php if ($_smarty_tpl->getVariable('data')->value['SUARA_NAFAS']=='Snoring'){?> checked <?php }?> value="Snoring"> Snoring </td>
                            <td><input type="radio" name="SUARA_NAFAS" <?php if ($_smarty_tpl->getVariable('data')->value['SUARA_NAFAS']=='Stidor'){?> checked <?php }?> value="Stidor">Stidor</td>
                            <td><input type="radio" name="SUARA_NAFAS" <?php if ($_smarty_tpl->getVariable('data')->value['SUARA_NAFAS']=='Tidak'){?> checked <?php }?> value="Tidak">  Tidak Ada  </td>
                        </tr>
                        <tr>
                            <td> Alat Bantu Nafas  </td>
                            <td><input type="radio" name="BANTU_NAFAS" required="" <?php if ($_smarty_tpl->getVariable('data')->value['BANTU_NAFAS']=='Tidak'){?> checked <?php }?> class="rad" value="Tidak">Tidak   </td>
                            <td><input type="radio" name="BANTU_NAFAS" <?php if ($_smarty_tpl->getVariable('data')->value['BANTU_NAFAS']!='Tidak'){?> checked <?php }?>  class="rad" value="Ada">Ya 
                                <input type="text"  id="form2" <?php if ($_smarty_tpl->getVariable('data')->value['BANTU_NAFAS']!='Tidak'){?> style="display:show" value="<?php echo $_smarty_tpl->getVariable('data')->value['BANTU_NAFAS'];?>
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
                                <td><input type="radio" name="NYERI_DADA" required="" <?php if ($_smarty_tpl->getVariable('data')->value['NYERI_DADA']=='Tidak'){?> checked <?php }?>  value="Tidak">Tidak Ada </td>
                                <td><input type="radio" name="NYERI_DADA" <?php if ($_smarty_tpl->getVariable('data')->value['NYERI_DADA']=='Ada'){?> checked <?php }?>  value="Ada">Ada </td>
                             
                            </tr>
                            <tr>
                                <td> Akral  </td>
                                <td><input type="radio" name="AKRAL" required="" <?php if ($_smarty_tpl->getVariable('data')->value['AKRAL']=='Hangat'){?> checked <?php }?>  value="Hangat">Hangat </td> 
                                <td><input type="radio" name="AKRAL"  <?php if ($_smarty_tpl->getVariable('data')->value['AKRAL']=='Kering'){?> checked <?php }?>  value="Kering">Kering </td> 
                                <td><input type="radio" name="AKRAL" <?php if ($_smarty_tpl->getVariable('data')->value['AKRAL']=='Dingin'){?> checked <?php }?>  value="Dingin">Dingin </td> 
                            </tr>
                            <tr>
                                <td> Perdarahan    </td> 
                                <td><input type="radio" class="radp" required="" <?php if ($_smarty_tpl->getVariable('data')->value['PERDARAHAN']=='Tidak'){?> checked <?php }?>  name="PERDARAHAN" value="Tidak">Tidak ada  </td> 
                                <td><input type="radio" class="radp" <?php if ($_smarty_tpl->getVariable('data')->value['PERDARAHAN']=='Ada'){?> checked <?php }?>   name="PERDARAHAN" value="Ada">  ada
                                   <input type="text"  id="formp" <?php if ($_smarty_tpl->getVariable('data')->value['PERDARAHAN']!='Tidak'){?> style="display: show;" value="<?php echo $_smarty_tpl->getVariable('data')->value['PERDARAHAN'];?>
" <?php }?> style="display:none" name="PERDARAHAN2">    
                                </td> 

                            </tr>
                            <tr>
                                <td>   Cyanosis  </td>
                                <td><input type="radio" name="CYANOSIS" required="" <?php if ($_smarty_tpl->getVariable('data')->value['CYANOSIS']=='Tidak'){?> checked <?php }?> value="Tidak">Tidak Ada  </td> 
                                <td><input type="radio" name="CYANOSIS" <?php if ($_smarty_tpl->getVariable('data')->value['CYANOSIS']=='Ada'){?> checked <?php }?> value="Ada">Ada  </td> 
                             
                            </tr>
                            <tr>
                                <td> CRT  </td>
                                <td><input type="radio" name="CRT" required="" <?php if ($_smarty_tpl->getVariable('data')->value['CRT']=='1-2'){?> checked <?php }?> value="1-2">1-2 </td>
                                <td><input type="radio" name="CRT" <?php if ($_smarty_tpl->getVariable('data')->value['CRT']=='>2'){?> checked <?php }?> value=">2">>2   </td>
                            </tr>
                            <tr>
                                <td> Turgor  </td>
                                <td><input type="radio" name="TURGOR" required="" <?php if ($_smarty_tpl->getVariable('data')->value['TURGOR']=='Elastis'){?> checked <?php }?> value="Elastis">Elastis </td>
                                <td><input type="radio" name="TURGOR" <?php if ($_smarty_tpl->getVariable('data')->value['TURGOR']=='Tidak'){?> checked <?php }?> value="Tidak">>Tidak Elastis   </td>
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
                                    <td><input type="radio" name="REFLEK_CAHAYA" required="" <?php if ($_smarty_tpl->getVariable('data')->value['REFLEK_CAHAYA']=='Positif'){?> checked <?php }?> value="Positif"> Positif </td>  
                                    <td><input type="radio" name="REFLEK_CAHAYA" <?php if ($_smarty_tpl->getVariable('data')->value['REFLEK_CAHAYA']=='Negatif'){?> checked <?php }?> value="Negatif"> Negatif </td>  
                                </tr>
                                <tr>
                                    <td> Pupil    </td> 
                                    <td><input type="radio" name="PUPIL" required="" <?php if ($_smarty_tpl->getVariable('data')->value['PUPIL']=='Isokor'){?> checked <?php }?> value="Isokor">Isokor  </td> 
                                    <td><input type="radio" name="PUPIL" <?php if ($_smarty_tpl->getVariable('data')->value['PUPIL']=='Anisokor'){?> checked <?php }?>  value="Anisokor">  Anisokor  </td> 
                                </tr>
                                <tr>
                                    <td>   Kelumpuhan  </td>
                                    <td><input type="radio" name="LUMPUH" required="" <?php if ($_smarty_tpl->getVariable('data')->value['LUMPUH']=='Tidak'){?> checked <?php }?> value="Tidak">Tidak Ada  </td> 
                                    <td><input type="radio" name="LUMPUH" <?php if ($_smarty_tpl->getVariable('data')->value['LUMPUH']=='Ada'){?> checked <?php }?> value="Ada">Ada  </td> 
                                    
                                </tr>
                                <tr>
                                    <td> Pusing  </td>
                                    <td><input type="radio" name="PUSING" required="" <?php if ($_smarty_tpl->getVariable('data')->value['PUSING']=='Tidak'){?> checked <?php }?> value="Tidak">Tidak Ada  </td> 
                                    <td><input type="radio" name="PUSING"  <?php if ($_smarty_tpl->getVariable('data')->value['PUSING']=='Ada'){?> checked <?php }?> value="Ada">Ada  </td> 
                                   
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
                                        <td><input type="radio" name="BAK" required="" <?php if ($_smarty_tpl->getVariable('data')->value['BAK']=='Spontak'){?> checked <?php }?> value="Spontak">Spontak  </td> 
                                        <td><input type="radio" name="BAK" <?php if ($_smarty_tpl->getVariable('data')->value['BAK']=='Tidak'){?> checked <?php }?>  value="Tidak">Tidak  Spontak  </td> 
                                    </tr>
                                    <tr>
                                        <td> Nyeri Tekan  </td>
                                        <td><input type="radio" name="BAK_TEKAN" required="" <?php if ($_smarty_tpl->getVariable('data')->value['BAK_TEKAN']=='Ada'){?> checked <?php }?> value="Ada">Ada  </td> 
                                        <td><input type="radio" name="BAK_TEKAN" <?php if ($_smarty_tpl->getVariable('data')->value['BAK_TEKAN']=='Tidak'){?> checked <?php }?> value="Tidak">Tidak Ada  </td> 
                                    </tr>
                                    <tr>
                                        <td> Produksi Urine    </td>
                                        <td><input type="text" name="URINE" value="<?php echo $_smarty_tpl->getVariable('data')->value['URINE'];?>
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
                                        <td><input type="radio" name="BAB" required="" value="Normal" <?php if ($_smarty_tpl->getVariable('data')->value['BAB']=='Normal'){?> checked <?php }?>>Normal  </td>  
                                        <td><input type="radio" name="BAB"  value="Cair" <?php if ($_smarty_tpl->getVariable('data')->value['BAB']=='Cair'){?> checked <?php }?>>Cair  </td>  
                                        <td><input type="radio" name="BAB" value="Konstipasi"  <?php if ($_smarty_tpl->getVariable('data')->value['BAB']=='Konstipasi'){?> checked <?php }?>>Konstipasi  </td>  
                                    </tr>
                                    <tr>
                                        <td>   Abdomen  </td>
                                        <td><input type="radio" required="" name="ABDOMEN" value="Supel" <?php if ($_smarty_tpl->getVariable('data')->value['ABDOMEN']=='Supel'){?> checked <?php }?>>Supel  </td>  
                                        <td><input type="radio" name="ABDOMEN" value="Kembang" <?php if ($_smarty_tpl->getVariable('data')->value['ABDOMEN']=='Kembang'){?> checked <?php }?>>Kembang  </td>  
                                        <td><input type="radio" name="ABDOMEN" value="Ascites" <?php if ($_smarty_tpl->getVariable('data')->value['ABDOMEN']=='Ascites'){?> checked <?php }?>>Ascites  </td>  
                                        <td><input type="radio" name="ABDOMEN" value="Tegang" <?php if ($_smarty_tpl->getVariable('data')->value['ABDOMEN']=='Tegang'){?> checked <?php }?>>Tegang  </td>  
                                    </tr>
                                    <tr>
                                        <td> Nyeri Tekan  </td>
                                        <td><input type="radio" required="" name="BAB_TEKAN" value="Tidak" <?php if ($_smarty_tpl->getVariable('data')->value['BAB_TEKAN']=='Tidak'){?> checked <?php }?>>Tidak Ada  </td> 
                                        <td><input type="radio" name="BAB_TEKAN" value="Ada" <?php if ($_smarty_tpl->getVariable('data')->value['BAB_TEKAN']=='Ada'){?> checked <?php }?>>Ada  </td> 
                                       
                                    </tr> 
                                     
                                    <tr>
                                        <td> Jejas Abdomen    </td>
                                        <td><input type="radio" required="" name="JEJAS_ABDOMEN" value="Tidak" <?php if ($_smarty_tpl->getVariable('data')->value['JEJAS_ABDOMEN']=='Tidak'){?> checked <?php }?>>Tidak Ada  </td> 
                                        <td><input type="radio" name="JEJAS_ABDOMEN" value="Ada" <?php if ($_smarty_tpl->getVariable('data')->value['JEJAS_ABDOMEN']=='Ada'){?> checked <?php }?>>Ada  </td> 
                                       
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
                                        <td><input type="radio" required="" name="SENDI" value="Bebas" <?php if ($_smarty_tpl->getVariable('data')->value['SENDI']=='Bebas'){?> checked <?php }?>>Bebas  </td>  
                                        <td><input type="radio" name="SENDI" value="Terbatas" <?php if ($_smarty_tpl->getVariable('data')->value['SENDI']=='Terbatas'){?> checked <?php }?>>Terbatas  </td>   
                                    </tr>
                                    <tr>
                                        <td>   DIslokasi  </td>
                                        <td><input type="radio" required="" name="DISLOK" value="Tidak" <?php if ($_smarty_tpl->getVariable('data')->value['DISLOK']=='Tidak'){?> checked <?php }?>>Tidak Ada  </td>   
                                        <td><input type="radio" name="DISLOK" value="Ada" <?php if ($_smarty_tpl->getVariable('data')->value['DISLOK']=='Ada'){?> checked <?php }?>>Ada  </td>   
                                      
                                    </tr>
                                    <tr>
                                        <td> Fraktur    </td>
                                        <td><input type="radio" required="" name="FRAKTUR" class="radf" <?php if ($_smarty_tpl->getVariable('data')->value['FRAKTUR']=='Tidak'){?> checked <?php }?> value="Tidak">Tidak Ada  </td> 
                                        <td><input type="radio" name="FRAKTUR" class="radf" <?php if ($_smarty_tpl->getVariable('data')->value['FRAKTUR']!='Tidak'){?> checked <?php }?> value="Ada">Ada  
                                           <input type="text"  id="formf" <?php if ($_smarty_tpl->getVariable('data')->value['FRAKTUR']!='Tidak'){?> style="display: show;" value="<?php echo $_smarty_tpl->getVariable('data')->value['FRAKTUR'];?>
" <?php }?> style="display:none" name="FRAKTUR2">    
                                            </td> 
                                        
                                    </tr> 
                                     
                                    <tr>
                                        <td> Luka      </td>
                                        <td><input type="radio" name="LUKA" required="" value="Tidak" <?php if ($_smarty_tpl->getVariable('data')->value['LUKA']=='Tidak'){?> checked <?php }?>>Tidak Ada  </td> 
                                        <td><input type="radio" name="LUKA" value="Ada" <?php if ($_smarty_tpl->getVariable('data')->value['LUKA']=='Ada'){?> checked <?php }?>>Ada  </td> 
                                       
                                        <td><input type="radio" name="LUKA" required="" value="Bersih" <?php if ($_smarty_tpl->getVariable('data')->value['BAK_TEKAN']=='Bersih'){?> checked <?php }?>>Bersih  </td> 
                                        <td><input type="radio" name="LUKA" value="Kotor" <?php if ($_smarty_tpl->getVariable('data')->value['BAK_TEKAN']=='Kotor'){?> checked <?php }?>>Kotor  </td> 

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
                    <select name="FS_NYERI" id="surat_dari" class="select2" style="width: 190px;">
                        <option value="0">Tidak</option>
                        <option value="1">Ya</option>
                    </select>
                </td>
                <td width='20%'></td>
                <td width='30%'></td>
            </tr>
            <tr>
                <td>Provokatif</td>
                <td>
                    <select name="FS_NYERIP" id="surat_dari" class="select2" style="width: 190px;">
                        <option value="0">Tidak Ada Nyeri</option>
                        <option value="2">Biologik</option>
                        <option value="3">Kimiawi</option>
                        <option value="4">Mekanik / Rudapaksa</option>
                    </select>
                </td>
                <td>Quality</td>
                <td>
                    <select name="FS_NYERIQ" id="surat_dari" class="select2" style="width: 190px;">
                        <option value="0">Tidak Ada</option>
                        <option value="1">Seperti Di Tusuk-Tusuk</option>
                        <option value="2">Seperti Terbakar</option>
                        <option value="3">Seperti Tertimpa Beb</option>
                        <option value="4">Ngilu</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Regio</td>
                <td>
                    <input type="text" name="FS_NYERIR" size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('vs')->value['FS_ANAMNESA'])===null||$tmp==='' ? '-' : $tmp);?>
"/>
                </td>
                <td>Severity</td>
                <td>
                    <select name="FS_NYERIS" id="surat_dari" class="select2" style="width: 190px;">
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
                <td>Time</td>
                <td>
                    <select name="FS_NYERIT" id="surat_dari" class="select2" style="width: 190px;">
                        <option value="0">Tidak Ada</option>
                        <option value="1">Kadang-kadang</option>
                        <option value="2">Sering</option>
                        <option value="3">Menetap</option>
                    </select>
                </td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <input type="hidden" name="FS_SCORE">
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
                            <option value="0">-Pilih Data-</option>
                            <option value="1">7-11 (Risiko Rendah)</option>
                            <option value="2"> >12 (Risiko Tinggi)</option>

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
                            <option value="0">-Pilih Data-</option>
                            <option value="3">0-24  (Risiko Rendah)</option>
                            <option value="4">25-45 (Risiko Sedang)</option>
                            <option value="5">>45   (Risiko Tinggi)</option>

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
                            <option value="0">-Pilih Data-</option>
                            <option value="6">0-5  (Risiko Rendah)</option>
                            <option value="7">6-16 (Risiko Sedang)</option>
                            <option value="8">17-30   (Risiko Tinggi)</option>

                        </select>
                    </td>
                    <td width='20%'></td>
                    <td width='30%'></td>
                </tr>
                <?php }?>
            </table>  -->
            <table class="table-input" width="100%">
                <tr class="headrow">
                    <th colspan="4">Riwayat Alergi</th>
                </tr>
                <tr>
                    <td width='20%'>Riwayat Alergi</td>
                    <td width='30%'>
                        <input type="text" name="FS_ALERGI" size="35" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
">
                        <em style="color:red">* Wajib Diisi</em>
                    </td>
                    <td width='20%'>Reaksi Alergi</td>
                    <td width='30%'>
                        <input type="text" name="FS_REAK_ALERGI" size="35" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_REAK_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
">
                        <em style="color:red">* Wajib Diisi</em>
                    </td>
                </tr>
                <tr>
                    <td width='20%'>  Status Kehamilan  </td>
                    <td width='30%'>
                       <input type="radio" name="HAMIL" class="radh" value="Tidak"  required=""    size="32">Tidak
                       <input type="radio" name="HAMIL"  class="radh" value="Ya"     size="32">Ya
                       <input type="text"  id="formh" <?php if ($_smarty_tpl->getVariable('data')->value['HAMIL']!='Tidak'){?> style="display:show;"  value="<?php echo $_smarty_tpl->getVariable('data')->value['HAMIL'];?>
" <?php }?>    name="HAMIL2">    
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
               <input type="text" name="FS_RIW_PENYAKIT_DAHULU" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_RIW_PENYAKIT_DAHULU'])===null||$tmp==='' ? '-' : $tmp);?>
" size="32">
            </td>
            <td width='20%'>Riwayat penyakit keluarga</td>
            <td width='30%'>
                <input type="text" name="FS_RIW_PENYAKIT_DAHULU2" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_RIW_PENYAKIT_DAHULU'])===null||$tmp==='' ? '-' : $tmp);?>
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
                        <select name="FS_STATUS_PSIK">
                            <option value="1" onclick='document.getElementById("civstaton3").disabled = true'>Tenang</option>
                            <option value="2" onclick='document.getElementById("civstaton3").disabled = true'>Cemas</option>
                            <option value="3" onclick='document.getElementById("civstaton3").disabled = true'>Takut</option>
                            <option value="4" onclick='document.getElementById("civstaton3").disabled = true'>Marah</option>
                            <option value="5" onclick='document.getElementById("civstaton3").disabled = true'>Sedih</option>
                            <option VALUE="6" onclick='document.getElementById("civstaton3").disabled = false'>Lainnya</option>
                        </select>
                        <br><br>
                        <input type="hidden" name="FS_STATUS_PSIK2" id="civstaton3" disabled="" size="32">
                    </td>
                    <td width='20%'>Hubungan dengan anggota keluarga</td>
                    <td width='30%'>
                        <select name="FS_HUB_KELUARGA" id="surat_dari" class="select2" style="width: 190px;">
                            <option value="1">Baik</option>
                            <option value="2">Tidak Baik</option>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Status Mental</td>
                    <td>
                        <input type="radio" required name="MENTAL" value="Kooperatif" <?php if ($_smarty_tpl->getVariable('data')->value['MENTAL']=='Kooperatif'){?> checked <?php }?>> Kooperatif
                        <input type="radio" name="MENTAL" value="tidak" <?php if ($_smarty_tpl->getVariable('data')->value['MENTAL']=='tidak'){?> checked <?php }?>> Tidak Kooperatif
                        <input type="radio" name="MENTAL" value="Gelisah" <?php if ($_smarty_tpl->getVariable('data')->value['MENTAL']=='Gelisah'){?> checked <?php }?>>  Gelisah 
                     </td>
                </tr>
            </table>
            <table class="table-input" width="100%">
                <tr class="headrow">
                    <th colspan="4">Kebutuhan Fungsional</th>
                </tr>
                <tr>
                    <td width='20%'>Makan</td>
                    <td width='30%'>
                        <select name="FS_FUNGSIONAL1" id="op1" class="select2" required style="width: 190px;">
                            <option value="">--Pilih Data--</option>
                            <option value="0">Tidak Mampu</option>
                            <option value="1">Butuh bantuan</option>
                            <option value="2">Mandiri</option>
                        </select>
                         <span id="sc1"></span>
                    </td>
                    <td width='20%'>Kesimpulan</td>
                    <td width='30%'><b><span id="rjtkesimpulan"></span></b></td>
                </tr>
                <tr>
                    <td>Mandi</td>
                    <td>
                        <select name="FS_FUNGSIONAL2" id="op2" class="select2" required style="width: 190px;">
                            <option value="">--Pilih Data--</option>
                            <option value="0">Tergantung orang lain</option>
                            <option value="1">Mandiri</option>
                        </select>
                        <span id="sc2"></span>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Perawatan diri</td>
                    <td>
                        <select name="FS_FUNGSIONAL3" id="op3" class="select2" required style="width: 190px;">
                            <option value="">--Pilih Data--</option>
                            <option value="0">Membutuhkan bantuan orang lain</option>
                            <option value="1">Mandiri</option>
                        </select>
                        <span id="sc3"></span>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Berpakaian</td>
                    <td>
                        <select name="FS_FUNGSIONAL4" id="op4" class="select2" required style="width: 190px;">
                            <option value="">--Pilih Data--</option>
                            <option value="0">Tergantung orang lain</option>
                            <option value="1">Sebagian dibantu</option>
                            <option value="2">Mandiri</option>
                        </select>
                        <span id="sc4"></span>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Buang air kecil</td>
                    <td>
                        <select name="FS_FUNGSIONAL5" id="op5" class="select2"  required style="width: 190px;">
                            <option value="">--Pilih Data--</option>
                            <option value="0">Tidak terkontrol atau pakai kateter</option>
                            <option value="1">Kadang inkontensia</option>
                            <option value="2">Kontensia / teratur (lebih dari 7 hari)</option>
                        </select>
                        <span id="sc5"></span>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Buang air besar</td>
                    <td>
                        <select name="FS_FUNGSIONAL6" id="op6" class="select2" required style="width: 190px;">
                            <option value="">--Pilih Data--</option>
                            <option value="0">Inkontensia (Tidak teratur atau perlu)</option>
                            <option value="1">Kadang inkontensia (sekali seminggu)</option>
                            <option value="2">Kontensia (teratur)</option>
                        </select>
                        <span id="sc6"></span>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Penggunaan toilet</td>
                    <td>
                        <select name="FS_FUNGSIONAL7" id="op7" class="select2" required style="width: 190px;">
                            <option value="">--Pilih Data--</option>
                            <option value="0">Tergantung</option>
                            <option value="1">Membutuhkan bantuan, tapi dapat melakukan beberapa hal sendiri</option>
                            <option value="2">Mandiri</option>
                        </select>
                        <span id="sc7"></span>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Transfer</td>
                    <td>
                        <select name="FS_FUNGSIONAL8" id="op8" class="select2" required style="width: 190px;">
                            <option value="">--Pilih Data--</option>
                            <option value="0">Tidak mampu</option>
                            <option value="1">Butuh bantuan untuk bisa duduk (2 Orang)</option>
                            <option value="2">Bantuan kecil (1 orang)</option>
                            <option value="3">Mandiri</option>
                        </select>
                        <span id="sc8"></span>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Mobilitas</td>
                    <td>
                        <select name="FS_FUNGSIONAL9" id="op9" class="select2" required style="width: 190px;">
                            <option value="">--Pilih Data--</option>
                            <option value="0">Immobile (tidak mampu)</option>
                            <option value="1">Menggunakan kursi roda</option>
                            <option value="2">Berjalan dengan bantuan satu orang</option>
                            <option value="3">Mandiri (meskipun menggunakan alat bantu seperti tongkat)</option>
                        </select>
                        <span id="sc9"></span>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Naik turun tangga</td>
                    <td>
                        <select name="FS_FUNGSIONAL10" id="op10" required class="select2" style="width: 190px;">
                            <option value="">--Pilih Data--</option>
                            <option value="0">Tidak mampu</option>
                            <option value="1">Membutuhkan bantuan (alat bantu)</option>
                            <option value="2">Mandiri</option>
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
                    <td width='20%'>Apakah Pasien menggunakan kursi roda/mmembutuhkan bantuan ?</td>
                    <td width='30%'>
                        <select name="KURSI_RODA" class="select2" style="width: 190px;" id="op1">
                            <option value="">--Pilih Data--</option>
                            <option <?php if ($_smarty_tpl->getVariable('data')->value['KURSI_RODA']!='Ya'){?> selected <?php }?> value="Tidak">TIDAK</option>
                            <option <?php if ($_smarty_tpl->getVariable('data')->value['KURSI_RODA']=='Ya'){?> selected <?php }?> value="Ya">YA</option>
        
                        </select>
                  
                    </td>
                     
                </tr>
                <tr>
                    <td width='20%'>Apakah ada inkontinensiauri / alvi?</td>
                    <td width='30%'>
                        <select name="ALVI" class="select2" style="width: 190px;" id="op2">
                            <option value="">--Pilih Data--</option>
                            <option <?php if ($_smarty_tpl->getVariable('data')->value['ALVI']!='Ya'){?> selected <?php }?> value="Tidak">TIDAK</option>
                            <option <?php if ($_smarty_tpl->getVariable('data')->value['ALVI']=='Ya'){?> selected <?php }?> value="Ya">YA</option>
                        </select>
                        <span id="sc2"></span>
                    </td> 
                </tr>
                <tr>
                    <td>Apakah ada  riwayat dekubitus atau luka dekubitus? </td>
                    <td>
                        <select name="RIWAYAT_DEKUBITUS" class="select2" style="width: 190px;" id="op3">
                            <option value="">--Pilih Data--</option>
                            <option <?php if ($_smarty_tpl->getVariable('data')->value['RIWAYAT_DEKUBITUS']!='Ya'){?> selected <?php }?> value="Tidak">TIDAK</option>
                            <option <?php if ($_smarty_tpl->getVariable('data')->value['RIWAYAT_DEKUBITUS']=='Ya'){?> selected <?php }?> value="Ya">YA</option>
                        </select>
                        <span id="sc3"></span>
                    </td>
                    
                </tr>
                <tr>
                    <td>Apakah Usia diatas 65 tahun? </td>
                    <td>
                        <select name="USIA65" class="select2" style="width: 190px;" id="op3">
                            <option value="">--Pilih Data--</option>
                            <option <?php if ($_smarty_tpl->getVariable('data')->value['USIA65']!='Ya'){?> selected <?php }?> value="Tidak">TIDAK</option>
                            <option <?php if ($_smarty_tpl->getVariable('data')->value['USIA65']=='Ya'){?> selected <?php }?> value="Ya">YA</option>
                        </select>
                        <span id="sc3"></span>
                    </td>
                    
                </tr>
                <tr>
                    <td>Apakah Ekstremitas dan badan tidak sesuai dengan usia perkembangan </td>
                    <td>
                        <select name="ANAK_SESUAI_UMUR" class="select2" style="width: 190px;" id="op3">
                            <option value="">--Pilih Data--</option>
                            <option <?php if ($_smarty_tpl->getVariable('data')->value['ANAK_SESUAI_UMUR']!='Ya'){?> selected <?php }?> value="Tidak">TIDAK</option>
                            <option <?php if ($_smarty_tpl->getVariable('data')->value['ANAK_SESUAI_UMUR']=='Ya'){?> selected <?php }?> value="Ya">YA</option>
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
                        <select name="FS_NUTRISI1" class="select2" style="width: 190px;" id="sn1">
                            <option value="">--Pilih Data--</option>
                            <option value="0">Tidak</option>
                            <option value="2">Tidak Yakin</option>
                            <option value="1">Ya (1-5 Kg)</option>
                            <option value="3">Ya (6-10 Kg)</option>
                            <option value="4">Ya (11-15 Kg)</option>
                            <option value="5">Ya (>15 Kg)</option>

                        </select>
                        <span id="snh1"></span>
                    </td>
                    <td width='20%'>Kesimpulan</td>
                    <td width='30%'><b><span id="kesimpulannutrisi"></span></b></td>
                </tr>
                <tr>
                    <td>Asupan makanan menurun dikarenakan adanya penurunan nafsu makan</td>
                    <td>
                        <select name="FS_NUTRISI2" class="select2" style="width: 190px;" id="sn2">
                            <option value="">--Pilih Data--</option>
                            <option value="0">Tidak</option>
                            <option value="1">Ya</option>
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
                        <select name="FS_AGAMA" id="surat_dari" class="select2" style="width: 190px;">
                            <option value="1">Islam</option>
                            <option value="2">Kristen</option>
                            <option value="3">Katholik</option>
                            <option value="4">Hindu</option>
                            <option value="5">Buda</option>
                            <option value="6">Konghucu</option>
                        </select>
                    </td>
                    <td width='20%'>Nilai/Kepercayaan khusus</td>
                    <td width='30%'>
                        <select name="FS_NILAI_KHUSUS">
                            <option value="1" onclick='document.getElementById("civstaton4").disabled = true'>Tidak Ada</option>
                            <option VALUE="2" onclick='document.getElementById("civstaton4").disabled = false'>Ada</option>
                        </select>
                        <br><br>
                        <input type="text" name="FS_NILAI_KHUSUS2" id="civstaton4" disabled="" size="32">
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
                        <input type="submit" name="save" value="Simpan" class="edit-button"/>
                    </td>
                </tr>
            </table>
    </form>
</div>