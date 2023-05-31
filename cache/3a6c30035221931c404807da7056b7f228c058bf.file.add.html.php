<?php /* Smarty version Smarty-3.0.7, created on 2023-05-27 11:35:19
         compiled from "application/views\igd/perawat/add.html" */ ?>
<?php /*%%SmartyHeaderCode:520164718887735260-39980174%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a6c30035221931c404807da7056b7f228c058bf' => 
    array (
      0 => 'application/views\\igd/perawat/add.html',
      1 => 1685162108,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '520164718887735260-39980174',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><script type="text/javascript">
    $(document).ready(function () {
        score();
        $("#opt1").change(function () {
            var sc = $(this).val();
            $("#an1").html(sc);
            score();
        });
        $("#opt2").change(function () {
            var sc = $(this).val();
            $("#an2").html(sc);
            score();
        });
        $("#opt3").change(function () {
            var sc = $(this).val();
            $("#an3").html(sc);
            score();
        });
        // $("#opt4").change(function () {
        //     var sc = $(this).val();
        //     $("#an4").html(sc);
        //     score();
        // });
        $("#opt5").change(function () {
            var sc = $(this).val();
            $("#an5").html(sc);
            score();
        });
        $("#opt6").change(function () {
            var sc = $(this).val();
            $("#an6").html(sc);
            score();
        });
        $("#opt7").change(function () {
            var sc = $(this).val();
            $("#an7").html(sc);
            score();
        });
        score();

        
        
        $("#opt8").change(function () {
            var scd = $(this).val();
            $("#an8").html(scd);
            scored();
        });
        $("#opt9").change(function () {
            var scd = $(this).val();
            $("#an9").html(scd);
            scored();
        });
        $("#opt10").change(function () {
            var scd = $(this).val();
            $("#an10").html(scd);
            scored();
        });
        $("#opt11").change(function () {
            var scd = $(this).val();
            $("#an11").html(scd);
            scored();
        });
        $("#opt12").change(function () {
            var scd = $(this).val();
            $("#an12").html(scd);
            scored();
        });
        $("#opt13").change(function () {
            var scd = $(this).val();
            $("#an13").html(scd);
            scored();
        });









        $("#opt14").change(function () {
            var scd = $(this).val();
            $("#an14").html(scd);
            scoret();
        });
        $("#opt15").change(function () {
            var scd = $(this).val();
            $("#an15").html(scd);
            scoret();
        });
        $("#opt16").change(function () {
            var scd = $(this).val();
            $("#an16").html(scd);
            scoret();
        });
        $("#opt17").change(function () {
            var scd = $(this).val();
            $("#an17").html(scd);
            scoret();
        });
        $("#opt18").change(function () {
            var scd = $(this).val();
            $("#an18").html(scd);
            scoret();
        });
        $("#opt19").change(function () {
            var scd = $(this).val();
            $("#an19").html(scd);
            scoret();
        });
        
    });
</script>
<script type="text/javascript">
    function score() { //ANAK
        var sc = parseInt($("#an1").text()) + parseInt($("#an2").text()) + parseInt($("#an3").text()) +  parseInt($("#an5").text()) + parseInt($("#an6").text()) + parseInt($("#an7").text());
        $("#totalsc").html(sc);
        if (sc <7) {
            $("#rjtkesimpulan").html("RISIKO RENDAH");
        }
        else if (sc >= 7 && sc <= 11) {
            $("#rjtkesimpulan").html("RISIKO SEDANG");
        } else if (sc >= 12) {
            $("#rjtkesimpulan").html("RISIKO TINGGI");
        }
    }
    function scored() {
        var scd = parseInt($("#an8").text()) + parseInt($("#an9").text()) + parseInt($("#an10").text()) + parseInt($("#an11").text()) + parseInt($("#an12").text()) + parseInt($("#an13").text());
        $("#totalscd").html(scd);
        if (scd >= 0 && scd <= 24) {
            $("#rjtkesimpuland").html("RISIKO RENDAH");
        } else if (scd >= 25 && scd <= 45) {
            $("#rjtkesimpuland").html("RISIKO SEDANG");
        } else if (scd > 45) {
            $("#rjtkesimpuland").html("RISIKO TINGGI");
        }
    }


    function scoret() {
        var scd = parseInt($("#an14").text()) + parseInt($("#an15").text()) + parseInt($("#an16").text()) + parseInt($("#an17").text()) + parseInt($("#an18").text()) + parseInt($("#an19").text());
        $("#totalsct").html(scd);
        if (scd >= 0 && scd <= 4) {
            $("#rjtkesimpulant").html("RISIKO RENDAH");
        }  else if (scd > 5) {
            $("#rjtkesimpulant").html("RISIKO TINGGI");
        }
    }
    
</script>
<div class="breadcrum">
    <p>
        <a href="#">IGD</a><span></span>
         <small>Add Data Asesmen Keperawatan IGD</small>
    </p>
    <div class="clear"></div>
</div> 
<div class="content-entry">
    <!-- notification template -->
     <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('igd/perawat/add_process');?>
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
            <!-- <tr>
               <td>Cara Masuk</td>
               <td> <input type="text" name="CARA_MASUK" size="40">  </td></tr> -->
               <!-- <tr>
               <td>Asal Masuk</td>
               <td> <input type="text" name="ASAL_MASUK" size="40">  </td>
            </tr> -->

       </table>
       <input type="hidden" name="CARA_MASUK" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['CARA_MASUK'];?>
" > 
       <input type="hidden" name="ASAL_MASUK" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['ALASAN_DATANG'];?>
" > 
        
        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="4">SUBYEKTIF</th> 
            </tr>
            <tr> 
                <td>Keluhan Utama  </td>
                <td colspan="3"> <input type="text" name="KEL_UTAMA" size="125" required value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['KELUHAN'];?>
">  </td></tr>
                <tr>
                <td>  Keluhan Penyakit Sekarang</td>
                <td colspan="3"> <input type="text" name="KEL_SEKARANG" required size="125" value="-">  </td>
             </tr>
             <tr>
                <td width='20%'>Riwayat Penyakit dahulu</td>
                <td width='30%'>
                   <input type="text" name="RIWAYAT_SAKIT" required  value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_RIW_PENYAKIT_DAHULU'])===null||$tmp==='' ? '-' : $tmp);?>
" size="30">
                </td>
                <td width='20%'>Riwayat  Alergi</td>
                <td width='30%'> 
                    <input type="text" name="RIWAYAT_ALERGI_MAKANAN" required  value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
"  size="30">
                
                </td>
            </tr>
            <tr>
                <td width='20%'>  Status Kehamilan  </td>
                <td width='30%'>
                   <input type="radio" name="HAMIL" checked class="radh" value="Tidak"  size="32">Tidak
                   <input type="radio" name="HAMIL"  class="radh" value="Ya"  size="32">Ya
                   <input type="text"  id="formh" style="display:none" name="HAMIL2">    
                </td>
              </tr>
              <tr> 
                <td width='20%'><b>  Bio Sosio  </b>  </td>
               </tr>
            <tr>
                <td width='20%'>  Status Pernikahan  </td>
                <td width='30%'>
                   <input type="radio" name="MENIKAH" required value="Belum"  size="32"> Belum 
                   <input type="radio" name="MENIKAH" value="Menikah"  size="32">Menikah
                   <input type="radio" name="MENIKAH" value="Janda/Duda"  size="32">Janda/Duda
                </td>
                <td>Pekerjaan</td>
                <td><input type="text" name="JOB">  </td>
              </tr>
              <tr>
                <td width='20%'>    Suku  </td>
                <td><input type="text" name="SUKU">  </td>
                <td>Agama</td>
                <td>
                    <input type="radio" checked name="AGAMA" value="1"> Islam
                    <input type="radio" name="AGAMA" value="2"> Kristen
                    <input type="radio" name="AGAMA" value="3"> Katolik
                    <input type="radio" name="AGAMA" value="4"> Hindu
                    <input type="radio" name="AGAMA" value="5"> Budha
                    <input type="radio" name="AGAMA" value="6"> Khonghucu
                 </td>
              </tr>
              </table>


              <table class="table-input" width="100%">
                <tr class="headrow">
                    <th colspan="4">OBJEKTIF</th> 
                </tr>
                <tr>
                     <td>Status Psikologis</td>
                    <td>
                        <input type="radio" name="PSIKOLOGIS" required value="Tenang"> Tenang
                        <input type="radio" name="PSIKOLOGIS" value="Cemas"> Cemas
                        <input type="radio" name="PSIKOLOGIS" value="Takut"> Takut 
                     </td>
                     <td>Status Mental</td>
                    <td>
                        <input type="radio" name="MENTAL" required value="Kooperatif"> Kooperatif
                        <input type="radio" name="MENTAL" value="tidak"> Tidak Kooperatif
                        <input type="radio" name="MENTAL" value="Gelisah">  Gelisah 
                     </td>
                  </tr>
                
               
                    <tr>
                        <td> Keadaan Umum </td>
                        <td>   <input type="text" required name="KEADAAN_UMUM" value="-"> </td>

                                   <td>Kesadaran</td>
                                    <td> 
                                         <input type="radio" name="KESADARAN" required value="Compos metis"> Compos metis
                                         <input type="radio" name="KESADARAN" value="Somnolen">  Somnolen
                                         <input type="radio" name="KESADARAN" value="Apatis">  Apatis
                                         <input type="radio" name="KESADARAN" value="Sopor">  Sopor
                                         <input type="radio" name="KESADARAN" value="Coma">  Coma
                                    </td> 
                               
                                   
                        </tr>
                        <tr>          <td> GCS   </td>
                                     <td>   <input type="text" required name="GCS" value="-"> </td>
                              
                         
                        </td>
                       
                    </tr>

                    <tr class="headrow">
                        <th colspan="4">Vital Sign</th>
                    </tr>
                    <tr>
                        <td width='20%'>Suhu</td>
                        <td width='30%'><input type="text" name="S" required size="10" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['SUHU'];?>
"/>C</td>
                        <td width='20%'>Nadi</td>
                        <td width='30%'><input type="text" name="N" required size="10" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['N'];?>
"/> x/menit</td>
                    </tr>
                    <tr>
                        <td>R</td>
                        <td><input type="text" name="R" size="10" required value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['R'];?>
"/> x/menit</td>
                        <td>TD</td>
                        <td><input type="text" name="TD" size="10" required value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['TD'];?>
"/> mmHg</td>
                    </tr>
                    <tr>
                        <td>Tinggi Badan</td>
                        <td><input type="text" name="TB" size="10" required value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['TB'];?>
"/> cm</td>
                        <td>Berat Badan</td>
                        <td><input type="text" name="BB" size="10" required value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['BB'];?>
"/> Kg</td>
                    </tr>
            
                   

                 
                    <tr>
                        <td>Lingkar Kepala</td>
                        <td>  <input type="text" name="LINGKAR_KEPALA" required> </td> 
                     
                         <td>    Status Gizi </td>
                         <td>   
                            <input type="radio" name="STATUS_GIZI" required value="Baik">Baik
                            <input type="radio" name="STATUS_GIZI" value="Cukup">Cukup
                            <input type="radio" name="STATUS_GIZI" value="Kurang">Kurang
                         </td>
                    </tr>
                    <tr>
                        <td><b>Kebutuhan Fungsional</b></td>
                    </tr>
                    <tr>
                        <td>Alat Bantu</td>
                        <td> <input type="text" required name="ALAT_BANTU" value="-"></td>
                        <td>Cacat  </td>
                        <td> <input type="text" required name="CACAT" value="-"></td>
                    </tr>
                    <tr>
                        <td>ADL</td>
                        <td>
                             <input type="radio" required name="ADL" value="1">Mandiri
                             <input type="radio" required name="ADL" value="2">Dibantu
                            </td>
                        <!-- <td>Resiko jatuh  </td>  -->
                        <td> <input type="hidden" name="RESIKO_JATUH"></td>
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
                    <input type="text" name="FS_NYERIR" size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_NYERIR'])===null||$tmp==='' ? '-' : $tmp);?>
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
        
        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="4">   </th>
            </tr>
            <tr>
                <td style="width: 200px;">B1 (Breathing)</td>
                <td colspan="3">
                    <table>
                        <tr>
                            <td>Irama Nafas</td>
                            <td><input type="radio" required name="IRAMA_NAFAS" value="Teratur">Teratur </td>
                            <td><input type="radio" name="IRAMA_NAFAS" value="Tidak">Tidak Teratur </td>
                        </tr>
                        <tr>
                            <td> Batuk  </td>
                            <td><input type="radio"  name="BATUK" value="Ada">Ada </td>
                            <td><input type="radio" required name="BATUK" value="Tidak">Tidak   </td>
                        </tr>
                        <tr>
                            <td> Pola Pernafasan  </td> 
                            <td><input type="radio" name="POLA_NAFAS" value="Tidak">Tidak ada  </td>
                            <td><input type="radio" name="POLA_NAFAS" value="Dypsnoe">  Dypsnoe  </td>
                            <td><input type="radio" name="POLA_NAFAS" value="Kusmaul">  Kusmaul  </td>
                            <td><input type="radio" required name="POLA_NAFAS" value="Cheyne Stoke">  Cheyne Stoke  </td>
                        </tr>
                        <tr>
                            <td> Suara Nafas  </td>
                            <td><input type="radio" name="SUARA_NAFAS" value="Gargling">Gargling  </td>
                            <td><input type="radio" name="SUARA_NAFAS" value="Snoring"> Snoring </td>
                            <td><input type="radio" name="SUARA_NAFAS" value="Stidor">Stidor</td>
                            <td><input type="radio" required name="SUARA_NAFAS" value="Tidak">  Tidak Ada  </td>
                        </tr>
                        <tr>
                            <td> Alat Bantu Nafas  </td>
                            <td><input type="radio" name="BANTU_NAFAS" class="rad" value="Tidak">Tidak   </td>
                            <td><input type="radio" name="BANTU_NAFAS"  class="rad" value="Ada">Ya 
                                <input type="text"   id="form2" style="display:none" name="BANTU_NAFAS2">    
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
                                <td><input type="radio" required name="NYERI_DADA" value="Tidak">Tidak Ada </td>
                                <td><input type="radio" name="NYERI_DADA" value="Ada">Ada </td>
                               
                            </tr>
                            <tr>
                                <td> Akral  </td>
                                <td><input type="radio" required name="AKRAL" value="Hangat">Hangat </td> 
                                <td><input type="radio"  name="AKRAL" value="Kering">Kering </td> 
                                <td><input type="radio" name="AKRAL" value="Dingin">Dingin </td> 
                            </tr>
                            <tr>
                                <td> Perdarahan    </td> 
                                <td><input type="radio" required class="radp" name="PERDARAHAN" value="Tidak">Tidak ada  </td> 
                                <td><input type="radio" class="radp"  name="PERDARAHAN" value="Ada">  ada
                                   <input type="text"  id="formp" style="display:none" name="PERDARAHAN2">    
                                </td> 

                            </tr>
                            <tr>
                                <td>   Cyanosis  </td>
                                <td><input type="radio" required name="CYANOSIS" value="Tidak">Tidak Ada  </td> 
                                <td><input type="radio" name="CYANOSIS" value="Ada">Ada  </td> 
                               
                            </tr>
                            <tr>
                                <td> CRT  </td>
                                <td><input type="radio" required name="CRT" value="1-2">1-2 </td>
                                <td><input type="radio" name="CRT" value=">2">>2   </td>
                            </tr>
                            <tr>
                                <td> Turgor  </td>
                                <td><input type="radio" required name="TURGOR" value="Elastis">Elastis </td>
                                <td><input type="radio" name="TURGOR" value="Tidak">>Tidak Elastis   </td>
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
                                    <td><input type="radio" required name="REFLEK_CAHAYA" value="Positif"> Positif </td>  
                                    <td><input type="radio" required name="REFLEK_CAHAYA" value="Negatif"> Negatif </td>  
                                </tr>
                                <tr>
                                    <td> Pupil    </td> 
                                    <td><input type="radio" required name="PUPIL" value="Isokor">Isokor  </td> 
                                    <td><input type="radio" required name="PUPIL" value="Anisokor">  Anisokor  </td> 
                                </tr>
                                <tr>
                                    <td>   Kelumpuhan  </td>
                                    <td><input type="radio" required name="LUMPUH" value="Tidak">Tidak Ada  </td> 
                                    <td><input type="radio" required name="LUMPUH" value="Ada">Ada  </td> 
                                </tr>
                                <tr>
                                    <td> Pusing  </td>
                                    <td><input type="radio" required name="PUSING" value="Tidak">Tidak Ada  </td> 
                                    <td><input type="radio" required name="PUSING" value="Ada">Ada  </td> 
                                  
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
                                        <td><input type="radio" required name="BAK" value="Spontak">Spontak  </td> 
                                        <td><input type="radio" name="BAK" value="Tidak">Tidak  Spontak  </td> 
                                    </tr>
                                    <tr>
                                        <td> Nyeri Tekan  </td>
                                        <td><input type="radio" required name="BAK_TEKAN" value="Ada">Ada  </td> 
                                        <td><input type="radio" name="BAK_TEKAN" value="Tidak">Tidak Ada  </td> 
                                    </tr>
                                    <tr>
                                        <td> Produksi Urine    </td>
                                        <td><input type="text" name="URINE"></td>
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
                                        <td><input type="radio" required name="BAB" value="Normal">Normal  </td>  
                                        <td><input type="radio" name="BAB" value="Cair">Cair  </td>  
                                        <td><input type="radio" name="BAB" value="Konstipasi">Konstipasi  </td>  
                                    </tr>
                                    <tr>
                                        <td>   Abdomen  </td>
                                        <td><input type="radio" required name="ABDOMEN" value="Supel">Supel  </td>  
                                        <td><input type="radio" name="ABDOMEN" value="Kembang">Kembang  </td>  
                                        <td><input type="radio" name="ABDOMEN" value="Ascites">Ascites  </td>  
                                        <td><input type="radio" name="ABDOMEN" value="Tegang">Tegang  </td>  
                                    </tr>
                                    <tr>
                                        <td> Nyeri Tekan  </td>
                                        <td><input type="radio" required name="BAB_TEKAN" value="Tidak">Tidak Ada  </td> 
                                        <td><input type="radio" name="BAB_TEKAN" value="Ada">Ada  </td> 
                                    </tr> 
                                     
                                    <tr>
                                        <td> Jejas Abdomen    </td>
                                        <td><input type="radio" required name="JEJAS_ABDOMEN" value="Tidak">Tidak Ada  </td> 
                                        <td><input type="radio" name="JEJAS_ABDOMEN" value="Ada">Ada  </td> 
                                       
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
                                        <td><input type="radio" required name="SENDI" value="Bebas">Bebas  </td>  
                                        <td><input type="radio" name="SENDI" value="Terbatas">Terbatas  </td>   
                                    </tr>
                                    <tr>
                                        <td>   DIslokasi  </td>
                                        <td><input type="radio" required name="DISLOK" value="Tidak">Tidak Ada  </td>   
                                        <td><input type="radio" name="DISLOK" value="Ada">Ada  </td>   
                                        
                                    </tr>
                                    <tr>
                                        <td> Fraktur    </td>
                                        <td><input type="radio" required name="FRAKTUR" class="radf" value="Tidak">Tidak Ada  </td> 
                                        <td><input type="radio" name="FRAKTUR" class="radf" value="Ada">Ada  
                                           <input type="text"  id="formf" style="display:none" name="FRAKTUR2">    
                                            </td> 
                                        
                                    </tr> 
                                     
                                    <tr>
                                        <td> Luka      </td>
                                        <td><input type="radio" required name="LUKA" value="Tidak">Tidak Ada  </td> 
                                        <td><input type="radio" name="LUKA" value="Ada">Ada  </td> 
                                        <td><input type="radio" name="LUKA" value="Bersih">Bersih  </td> 
                                        <td><input type="radio" name="LUKA" value="Kotor">Kotor  </td> 

                                    </tr> 
                                   
                                  </table> 
                            </td>
                        </tr>
                        </table>

                        <table class="table-input" width="100%">
                            <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['fn_umur']<=18){?>
                            <tr class="headrow">
                                <th colspan="4">Asesmen Jatuh Anak Skala Humpty Dumpty (1-18 tahun)</th>
                            <input type="hidden" name="FS_TIPE_RISIKO_JATUH" value='1'/>
                            </tr>
                            <tr>
                                <td width='20%'>Usia</td>
                                <td width='30%'>
                                    <select name="FS_PARAM_1" class="select2" style="width: 250px;" id="opt1">
                                        <option value="">--Pilih Data--</option>
                                        <option value="4">dibawah 3 Tahun</option>
                                        <option value="3">3-7 Tahun</option>
                                        <option value="2">7-13 Tahun</option>
                                        <option value="1">> 13 Tahun</option>
                        
                                    </select>
                                    <span id="an1"></span>
                                </td>
                                <td width='20%'>Kesimpulan</td>
                                <td width='30%'><b><span id="rjtkesimpulan"></span></b></td>
                            </tr>
                            <tr>
                                <td width='20%'>Jenis Kelamin</td>
                                <td width='30%'>
                                    <select name="FS_PARAM_2" class="select2" style="width: 250px;" id="opt2">
                                        <option value="">--Pilih Data--</option>
                                        <option value="2">Laki-Laki</option>
                                        <option value="1">Perempuan</option>
                                    </select>
                                    <span id="an2"></span>
                                </td>
                                <td></td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <td>Diagnosis</td>
                                <td>
                                    <select name="FS_PARAM_3" class="select2" style="width: 250px;" id="opt3">
                                        <option value="">--Pilih Data--</option>
                                        <option value="4">Diagnosis Neurologi</option>
                                        <option value="3">Perubahan Oksigenasi</option>
                                        <option value="2">Gangguan Perilaku/Psikiatri</option>
                                        <option value="1">Diagnosis Lainnya</option>
                                    </select>
                                    <span id="an3"></span>
                                  
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <!-- <tr>
                                <td>Gangguan Kognitif</td>
                                <td>
                                    <select name="FS_PARAM_4" class="select2" style="width: 250px;" id="opt4">
                                        <option value="">--Pilih Data--</option>
                                        <option value="3">Tidak Menyadari keterbatasan dirinya</option>
                                        <option value="2">Lupa akan adanya keterbatasan</option>
                                        <option value="1">Orientasi baik terhadap diri sendiri</option>
                                    </select>
                                    <span id="an4"></span>
                                </td>
                                <td></td>
                                <td></td>
                            </tr> -->
                            <tr>
                                <td>Faktor Lingkungan</td>
                                <td>
                                    <select name="FS_PARAM_5" class="select2" style="width: 250px;" id="opt5">
                                        <option value="">--Pilih Data--</option>
                                        <option value="4">Riwayat jatuh/bayi diletakkan di tempat tidur dewasa</option>
                                        <option value="3">Pasien Menggunakanalat bantu/bayi diletakkan dalam tempat tifur bayi/perabot rumah</option>
                                        <option value="2">Pasien diletakkan di tempat tidur</option>
                                        <option value="1">Area diluar rumah sakit</option>
                                    </select>
                                    <span id="an5"></span>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Respon Terhadap Pembedahan / Sedasi / Anestesi</td>
                                <td>
                                    <select name="FS_PARAM_6" class="select2" style="width: 250px;" id="opt6">
                                        <option value="">--Pilih Data--</option>
                                        <option value="3">Dalam 24 jam</option>
                                        <option value="2">Dalam 48 jam</option>
                                        <option value="1">> 48 jam atau tidak menjalani pembedahan / sedasi/anastesi</option>
                                    </select>
                                    <span id="an6"></span>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Respon Terhadap Penggunaan medikamentosa</td>
                                <td>
                                    <select name="FS_PARAM_7" class="select2" style="width: 250px;" id="opt7">
                                        <option value="">--Pilih Data--</option>
                                        <option value="3">Penggunaan multipel</option>
                                        <option value="2">Penggunaan salah satu obat</option>
                                        <option value="1">Penggunaan medikasi lainnya/tidak ada medikasi</option>
                                    </select>
                                    <span id="an7"></span>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php }elseif($_smarty_tpl->getVariable('rs_pasien')->value['fn_umur']>18&&$_smarty_tpl->getVariable('rs_pasien')->value['fn_umur']<=65){?>
                             <tr class="headrow">
                                <th colspan="4">Asesmen Jatuh Dewasa Morse Fall Scale (>18-65 tahun</th>
                            <input type="hidden" name="FS_TIPE_RISIKO_JATUH" value='2'/>
                            </tr>
                            <tr>
                                <td width='20%'>Riwayat Jatuh</td>
                                <td width='30%'>
                                    <select name="FS_PARAM_1" class="select2" style="width: 250px;" id="opt8">
                                        <option value="">--Pilih Data--</option>
                                        <option value="25">< 3 bulan</option>
                                        <option value="0">tidak ada atau > 3 bulan</option>
                        
                                    </select>
                                    <span id="an8"></span>
                                </td>
                                <td width='20%'>Kesimpulan</td>
                                <td width='30%'><b><span id="rjtkesimpuland"></span></b></td>
                            </tr>
                             <tr>
                                <td>Diagnosa medis sekunder</td>
                                <td>
                                    <select name="FS_PARAM_2" class="select2" style="width: 250px;" id="opt9">
                                        <option value="">--Pilih Data--</option>
                                        <option value="15">> 1 diagnosa penyakit</option>
                                        <option value="0"><= 1 diagnosa penyakit</option>
                                    </select>
                                    <span id="an9"></span>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                             <tr>
                                <td>Alat bantu jalan</td>
                                <td>
                                    <select name="FS_PARAM_3" class="select2" style="width: 250px;" id="opt10">
                                        <option value="">--Pilih Data--</option>
                                        <option value="30">Perabot</option>
                                        <option value="15">Tongkat / penopang</option>
                                        <option value="0">Tidak ada / Tirah baring</option>
                                    </select>
                                    <span id="an10"></span>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                             <tr>
                                <td>Terapi IV / anti koagulan</td>
                                <td>
                                    <select name="FS_PARAM_4" class="select2" style="width: 250px;" id="opt11">
                                        <option value="">--Pilih Data--</option>
                                        <option value="20">Terapi IV terus menerus</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                    <span id="an11"></span>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                             <tr>
                                <td>Gaya berjalan</td>
                                <td>
                                    <select name="FS_PARAM_5" class="select2" style="width: 250px;" id="opt12">
                                        <option value="">--Pilih Data--</option>
                                        <option value="30">Kerusakan (Terganggu)</option>
                                        <option value="15">Lemah</option>
                                        <option value="0">Normal / Tirah baring</option>
                                    </select>
                                    <span id="an12"></span>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                             <tr>
                                <td>Status Mental</td>
                                <td>
                                    <select name="FS_PARAM_6" class="select2" style="width: 250px;" id="opt13">
                                        <option value="">--Pilih Data--</option>
                                        <option value="15">Lupa keterbatasan</option>
                                        <option value="0">Sadar kemampuan diri</option>
                                    </select>
                                    <span id="an13"></span>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php }else{ ?>
                             <tr class="headrow">
                                <th colspan="4">Asesmen Jatuh Lanjut Usia (Ann Henrich) usia >65 tahun</th>
                            <input type="hidden" name="FS_TIPE_RISIKO_JATUH" value='3'/>
                            </tr>
                            <tr class="headrow">
                                <th colspan="4">Riwayat Jatuh</th>
                            </tr>
                            <tr>
                                <td width='20%'>Disorientasi</td>
                                <td width='30%'>
                                    <select name="FS_PARAM_12" class="select2" style="width: 250px;" id="opt14">
                                        <option value="">--Pilih Data--</option>
                                        <option value="4">Ya</option>
                                        <option value="0">Tidak</option>
                        
                                    </select>
                                    <span id="an14"></span>
                                </td>
                                <td width='20%'>Kesimpulan</td>
                                <td width='30%'><b><span id="rjtkesimpulant"></span></b></td>
                            </tr>
                             <tr>
                                <td>Gangguan Gaya berjalan</td>
                                <td>
                                    <select name="FS_PARAM_13" class="select2" style="width: 250px;" id="opt15">
                                        <option value="">--Pilih Data--</option>
                                        <option value="4">Ya</option>
                                        <option value="0">Tidak</option>
                        
                                    </select>
                                    <span id="an15"></span>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                             <tr>
                                <td>Riwayat Jatuh dalam 12 bulan terakhir</td>
                                <td>
                                    <select name="FS_PARAM_14" class="select2" style="width: 250px;" id="opt16">
                                        <option value="">--Pilih Data--</option>
                                        <option value="2">Ya</option>
                                        <option value="0">Tidak</option>
                        
                                    </select>
                                    <span id="an16"></span>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                             <tr>
                                <td>Obat beresiko tinggi</td>
                                <td>
                                    <select name="FS_PARAM_15" class="select2" style="width: 250px;" id="opt17">
                                        <option value="">--Pilih Data--</option>
                                        <option value="2">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                    <span id="an17"></span>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                             <tr>
                                <td>Gangguan pendengan, penglihan</td>
                                <td>
                                    <select name="FS_PARAM_16" class="select2" style="width: 250px;" id="opt18">
                                        <option value="">--Pilih Data--</option>
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                    <span id="an18"></span>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                             <tr>
                                <td>Pusing/vertigo</td>
                                <td>
                                    <select name="FS_PARAM_17" class="select2" style="width: 250px;" id="opt19">
                                        <option value="">--Pilih Data--</option>
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                    <span id="an19"></span>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            
                            <?php }?>
                        </table>
                

                           <table class="table-input" width="100%">
                            <tr class="headrow">
                                <th colspan="4">Asesmen Resiko Dekubitus</th>
                            </tr>
                            <tr>
                                <td width='20%'>Apakah Pasien menggunakan kursi roda/mmembutuhkan bantuan ?</td>
                                <td width='30%'>
                                    <select name="KURSI_RODA" class="select2" style="width: 190px;" id="op1">
                                         <option value="Tidak">TIDAK</option>
                                        <option value="Ya">YA</option>
                    
                                    </select>
                              
                                </td>
                                 
                            </tr>
                            <tr>
                                <td width='20%'>Apakah ada inkontinensiauri / alvi?</td>
                                <td width='30%'>
                                    <select name="ALVI" class="select2" style="width: 190px;" id="op2">
                                        <option value="Tidak">TIDAK</option>
                                        <option value="Ya">YA</option>
                                    </select>
                                    <span id="sc2"></span>
                                </td> 
                            </tr>
                            <tr>
                                <td>Apakah ada  riwayat dekubitus atau luka dekubitus? </td>
                                <td>
                                    <select name="RIWAYAT_DEKUBITUS" class="select2" style="width: 190px;" id="op3">
                                         <option value="Tidak">TIDAK</option>
                                        <option value="Ya">YA</option>
                                    </select>
                                    <span id="sc3"></span>
                                </td>
                                
                            </tr>
                            <tr>
                                <td>Apakah Usia diatas 65 tahun? </td>
                                <td>
                                    <select name="USIA65" class="select2" style="width: 190px;" id="op3">
                                         <option value="Tidak">TIDAK</option>
                                        <option value="Ya">YA</option>
                                    </select>
                                    <span id="sc3"></span>
                                </td>
                                
                            </tr>
                            <tr>
                                <td>Apakah Ekstremitas dan badan tidak sesuai dengan usia perkembangan </td>
                                <td>
                                    <select name="ANAK_SESUAI_UMUR" class="select2" style="width: 190px;" id="op3">
                                       <option value="Tidak">TIDAK</option>
                                        <option value="Ya">YA</option>
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
                                    <select name="FS_NUTRISI1" required class="select2" style="width: 190px;" id="sn1">
                                        <option value="">--Pilih Data--</option>
                                        <option value="0">Tidak</option>
                                        <option value="1">Tidak Yakin</option>
                                        <option value="2">Ya (1-5 Kg)</option>
                                        <option value="3">Ya (6-10 Kg)</option>
                                        <option value="4">Ya (11-15 Kg)</option>
                                        <option value="5">Ya (>15 Kg)</option>
                    
                                    </select>
                                    <span id="snh1"></span>
                                </td>
                              
                            </tr>
                            <tr>
                                <td>Asupan makanan menurun dikarenakan adanya penurunan nafsu makan</td>
                                <td>
                                    <select name="FS_NUTRISI2" class="select2" style="width: 190px;" id="sn2">
                                      
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
                                    <th colspan="4">  Keperawatan</th>
                                </tr>
                            <tr>
                                <td width='20%'>Masalah Keperawatan</td>
                                <td width='30%'>
                                    <select name="tujuan[]" multiple id="tujuan" style="width:250px">
                                        <option></option>
                                    </select>
                                </td>
                                <td width='20%'>Rencana Keperawatan</td>
                                <td width='30%'>
                                    <select name="tembusan[]" multiple id="tembusan" style="width:250px">
                                        <option></option>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <table class="table-input" width="100%">
                            <tr class="headrow">
                                <th colspan="4">Kebutuhan Edukasi</th>
                            </tr>

                            <tr>
                                <td width='20%'>Butuh Penerjemah?</td>
                                <td width='30%'>
                                    <select name="PENERJEMAH" id="surat_dari" class="select2" style="width: 170px;">
                                       <option value="Tidak">Tidak</option>
                                       <option value="Ya">Ya</option>
                                    </select>
                                </td>
                                 <td width='20%'>Pengelihatan</td>
                                <td width='30%'>
                                    <select name="FS_PENGELIHATAN" id="surat_dari" class="select2" style="width: 190px;">
                                        <option value="1" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENGELIHATAN']=='1'){?> selected="" <?php }?>>Normal</option>
                                        <option value="2" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENGELIHATAN']=='2'){?> selected="" <?php }?>>Kabur</option>
                                        <option value="3" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENGELIHATAN']=='3'){?> selected="" <?php }?>>Kaca Mata</option>
                                        <option value="4" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENGELIHATAN']=='4'){?> selected="" <?php }?>>Lensa Kontak</option>
                    
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Penciuman</td>
                                <td>
                                    <select name="FS_PENCIUMAN" id="surat_dari" class="select2" style="width: 190px;">
                                        <option value="1" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENCIUMAN']=='1'){?> selected="" <?php }?>>Normal</option>
                                        <option value="2" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENCIUMAN']=='2'){?> selected="" <?php }?>>Tidak Normal</option>
                    
                                    </select>
                                </td>
                                <td>Pendengaran</td>
                                <td>
                                    <select name="FS_PENDENGARAN" id="surat_dari" class="select2" style="width: 190px;">
                                        <option value="1" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENDENGARAN']=='1'){?> selected="" <?php }?>>Normal</option>
                                        <option value="2" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENDENGARAN']=='2'){?> selected="" <?php }?>>Tidak Normal (Kanan)</option>
                                        <option value="3" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENDENGARAN']=='3'){?> selected="" <?php }?>>Tidak Normal (Kiri)</option>
                                        <option value="4" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENDENGARAN']=='4'){?> selected="" <?php }?>>Tidak Normal (Kanan & Kiri)</option>
                                        <option value="5" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENDENGARAN']=='5'){?> selected="" <?php }?>>Alat Bantu Dengar (Kanan)</option>
                                        <option value="6" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENDENGARAN']=='6'){?> selected="" <?php }?>>Alat Bantu Dengar (Kiri)</option>
                                        <option value="7" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENDENGARAN']=='7'){?> selected="" <?php }?>>Alat Bantu Dengar (Kanan & Kiri)</option>
                                    </select>
                                </td>
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
                                <td width='20%'>Kriteria Discharge Planning</td>
                                <td width='30%'> 
                                    <input type="checkbox" name="KRITERIA_DISCHARGE[]" value="Umur>65">Umur>65<br>
                                    <input type="checkbox" name="KRITERIA_DISCHARGE[]" value="Terbatas Mobilitas">Terbatas Mobilitas<br>
                                    <input type="checkbox" name="KRITERIA_DISCHARGE[]" value="Perawatan Lanjutan">Perawatan Lanjutan<br>
                                    <input type="checkbox" name="KRITERIA_DISCHARGE[]" value="Bantuan Aktifitas Sehari hari">Bantuan Aktifitas Sehari hari<br>
                                </td>
                                <td width='20%'>Discharge Planning</td>
                                <td width='30%'>
                                    <select name="planning[]" multiple id="planning" style="width:250px">
                                        <option></option>
                                    </select>
                                </td>
                               
                            </tr>
                        </table>
                        <table class="table-input" width="100%">
                            <tr class="headrow">
                                <th colspan="4">      </th>
                            </tr>
                            <tr>
                                <input type="hidden" name="HASIL">

                              
                                <!-- <td>
                                    <select name="HASIL" id="surat_dari" class="select2" style="width: 190px;">
                                        <option value="0">--Pilih Cara Pulang--</option>
                                        <option value="3">Rawat Inap</option>
                                        <option value="0">Pulang</option>
                                        <option value="9">Menolak Rawat</option>
                                        
                                        <option value="4">Rujuk</option> 
                                        <option value="10">Meninggal</option>  
                                        <option value="11">Lain lain</option>
                                    </select>
                                </td> -->
                                <td>Jam Selesai diperiksa</td>
                                <td><input type="time" required name="JAM_SELESAI"></td>

                                <td  > 
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
      <script>


$(".select2").select2({
            placeholder: "Pilih",
            allowClear: true
        });
        
$(function(){
      $(":radio.rad").click(function(){
        $("#form2").hide(); 

        if($(this).val() == "Ada"){
          $("#form2").show(); 
        }else if($(this).val() == "Tidak"){
          $("#form2").hide(); 
        }
      });

      $(":radio.radp").click(function(){
        $("#formp").hide(); 

        if($(this).val() == "Ada"){
          $("#formp").show(); 
        }else if($(this).val() == "Tidak"){
          $("#formp").hide(); 
        }
      });

      $(":radio.radf").click(function(){
        $("#formf").hide(); 

        if($(this).val() == "Ada"){
          $("#formf").show(); 
        }else if($(this).val() == "Tidak"){
          $("#formf").hide(); 
        }
      });


      $(":radio.radh").click(function(){
        $("#formh").hide(); 

        if($(this).val() == "Ya"){
          $("#formh").show(); 
        }else if($(this).val() == "Tidak"){
          $("#formh").hide(); 
        }
      });

    });


             var user = $("#user").val();
            $('#tujuan').select2('data', null);
            $('#tujuan').select2('data', null);
            $("#tujuan").removeAttr("disabled");
            jQuery("#tujuan").html('');
            $.ajax({
            type: "POST", 
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('nurse/rawat_jalan/list_masalah_kep/');?>
",
                    data: "user=" + user,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data)
                    var showData;
                            jQuery.each(data, function(index, result) {
                            if (result.value == 0) {
                            } else {
                            showData += "<option value='" + result.value + "'>" + result.label + "</option>";
                            }
                            })
                            jQuery("#tujuan").html(showData);
                    }
            });
            //tags
            $("#tujuan").select2({});


            var user = $("#user").val();
            $('#tembusan').select2('data', null);
            $('#tembusan').select2('data', null);
            $("#tembusan").removeAttr("disabled");
            jQuery("#tembusan").html('');
            $.ajax({
            type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('nurse/rawat_jalan/list_rencana_kep/');?>
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
                            jQuery("#tembusan").html(showData);
                    }
            });
            //tags
            $("#tembusan").select2({});


            var user = $("#user").val();
            $('#planning').select2('data', null);
            $('#planning').select2('data', null);
            $("#planning").removeAttr("disabled");
            jQuery("#planning").html('');
            $.ajax({
            type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal/list_planning/');?>
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
                            jQuery("#planning").html(showData);
                    }
            });
            //tags
            $("#planning").select2({});


            var user = $("#user").val();
            $('#edukasi').select2('data', null);
            $('#edukasi').select2('data', null);
            $("#edukasi").removeAttr("disabled");
            jQuery("#edukasi").html('');
            $.ajax({
            type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal/list_edukasi/');?>
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
                            jQuery("#edukasi").html(showData);
                    }
            });
            //tags
            $("#edukasi").select2({});
      </script>     
 