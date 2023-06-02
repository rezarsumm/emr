<?php /* Smarty version Smarty-3.0.7, created on 2023-06-02 15:14:56
         compiled from "application/views\igd/perawat/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:261786479a5004c66b0-36357508%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f52e88c67745a3b57abf257a90405a1cbe8d229' => 
    array (
      0 => 'application/views\\igd/perawat/edit.html',
      1 => 1685692815,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '261786479a5004c66b0-36357508',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr_dev\system\plugins\smarty\libs\plugins\modifier.date_format.php';
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
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('igd/perawat/edit_process');?>
" method="post" onkeypress="return event.keyCode != 13">
        <input name="FS_KD_REG" id="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />
        <input name="id" type="hidden" value="<?php echo $_smarty_tpl->getVariable('data')->value['id'];?>
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
       <input type="hidden" name="CARA_MASUK" value="<?php echo $_smarty_tpl->getVariable('data')->value['CARA_MASUK'];?>
" > 
       <input type="hidden" name="ASAL_MASUK" value="<?php echo $_smarty_tpl->getVariable('data')->value['ASAL_MASUK'];?>
" > 
        
        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="4">SUBYEKTIF</th> 
            </tr>
            <tr>
                <td>Keluhan Utama  </td>
                <td colspan="3"> <input type="text" name="KEL_UTAMA" size="125" value="<?php echo $_smarty_tpl->getVariable('data')->value['KEL_UTAMA'];?>
">  </td></tr>
                <tr>
                <td>  Keluhan Penyakit Sekarang</td>
                <td colspan="3"> <input type="text" name="KEL_SEKARANG" size="125" value="<?php echo $_smarty_tpl->getVariable('data')->value['KEL_SEKARANG'];?>
">  </td>
             </tr>
             <tr>
                <td width='20%'>Riwayat Penyakit dahulu</td>
                <td width='30%'>
                   <input type="text" name="RIWAYAT_SAKIT" value="<?php echo $_smarty_tpl->getVariable('data')->value['RIWAYAT_SAKIT'];?>
"  size="30">
                </td>
                <td width='20%'>Riwayat  Alergi</td>
                <td width='30%'> 
                    <input type="text" name="RIWAYAT_ALERGI_MAKANAN" value="<?php echo $_smarty_tpl->getVariable('data')->value['RIWAYAT_ALERGI_MAKANAN'];?>
" size="30">
                
                </td>
            </tr>
            <tr>
                <td width='20%'>  Status Kehamilan  </td>
                <td width='30%'>
                   <input type="radio" name="HAMIL" class="radh" value="Tidak"  <?php if ($_smarty_tpl->getVariable('data')->value['HAMIL']=='Tidak'){?> checked <?php }?> size="32">Tidak
                   <input type="radio" name="HAMIL"  class="radh" value="Ya" <?php if ($_smarty_tpl->getVariable('data')->value['HAMIL']!='Tidak'){?> checked <?php }?> size="32">Ya
                   <input type="text"  id="formh" <?php if ($_smarty_tpl->getVariable('data')->value['HAMIL']!='Tidak'){?> style="display:show;"  value="<?php echo $_smarty_tpl->getVariable('data')->value['HAMIL'];?>
" <?php }?> style="display:none"  name="HAMIL2">    
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
                   <input type="radio" name="MENIKAH" value="Janda/Duda" <?php if ($_smarty_tpl->getVariable('data')->value['MENIKAH']=='Janda/Duda'){?> checked <?php }?> size="32">Janda/Duda
                </td>
                <td>Pekerjaan</td>
                <td><input type="text" name="JOB" value="<?php echo $_smarty_tpl->getVariable('data')->value['JOB'];?>
">  </td>
              </tr>
              <tr>
                <td width='20%'>    Suku  </td>
                <td><input type="text" name="SUKU" value="<?php echo $_smarty_tpl->getVariable('data')->value['SUKU'];?>
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
              </table>


              <table class="table-input" width="100%">
                <tr class="headrow">
                    <th colspan="4">OBJEKTIF</th> 
                </tr>
                <tr>
                     <td>Status Psikologis</td>
                    <td>
                        
                        <input type="radio" name="PSIKOLOGIS" value="Tenang" <?php if ($_smarty_tpl->getVariable('data')->value['PSIKOLOGIS']=='Tenang'){?> checked <?php }?>> Tenang
                        <input type="radio" name="PSIKOLOGIS" value="Cemas" <?php if ($_smarty_tpl->getVariable('data')->value['PSIKOLOGIS']=='Cemas'){?> checked <?php }?>> Cemas
                        <input type="radio" name="PSIKOLOGIS" value="Takut" <?php if ($_smarty_tpl->getVariable('data')->value['PSIKOLOGIS']=='Takut'){?> checked <?php }?>> Takut 
                     </td>
                     <td>Status Mental</td>
                    <td>
                        <input type="radio" name="MENTAL" value="Kooperatif" <?php if ($_smarty_tpl->getVariable('data')->value['MENTAL']=='Kooperatif'){?> checked <?php }?>> Kooperatif
                        <input type="radio" name="MENTAL" value="tidak" <?php if ($_smarty_tpl->getVariable('data')->value['MENTAL']=='tidak'){?> checked <?php }?>> Tidak Kooperatif
                        <input type="radio" name="MENTAL" value="Gelisah" <?php if ($_smarty_tpl->getVariable('data')->value['MENTAL']=='Gelisah'){?> checked <?php }?>>  Gelisah 
                     </td>
                  </tr>
                
               
                    <tr>
                       
                                    <td>Kesadaran</td>
                                    <td> 
                                        <input type="radio" name="KESADARAN" <?php if ($_smarty_tpl->getVariable('data')->value['KESADARAN']=='Compos metis'){?> checked <?php }?> required value="Compos metis"> Compos metis
                                        <input type="radio" name="KESADARAN"  <?php if ($_smarty_tpl->getVariable('data')->value['KESADARAN']=='Somnolen'){?> checked <?php }?> value="Somnolen">  Somnolen
                                        <input type="radio" name="KESADARAN" <?php if ($_smarty_tpl->getVariable('data')->value['KESADARAN']=='Apatis'){?> checked <?php }?> value="Apatis">  Apatis
                                        <input type="radio" name="KESADARAN" <?php if ($_smarty_tpl->getVariable('data')->value['KESADARAN']=='Sopor'){?> checked <?php }?> value="Sopor">  Sopor
                                        <input type="radio" name="KESADARAN" <?php if ($_smarty_tpl->getVariable('data')->value['KESADARAN']=='Coma'){?> checked <?php }?>  value="Coma">  Coma
                                        
                                       </td> 
                               
                                     <td> Keadaan Umum </td>
                                     <td>   <input type="text" value="<?php echo $_smarty_tpl->getVariable('data')->value['KEADAAN_UMUM'];?>
" name="KEADAAN_UMUM"> </td>
                            </tr>
                            <tr>      <td> GCS   </td>
                                     <td>   <input type="text" value="<?php echo $_smarty_tpl->getVariable('data')->value['GCS'];?>
" name="GCS"> </td>
                                
                        
                       
                    </tr>
                 
                    <tr class="headrow">
                        <th colspan="4">Vital Sign</th>
                    </tr>
                    <tr>
                        <td width='20%'>Suhu</td>
                        <td width='30%'><input type="text" name="S" size="10" value="<?php echo $_smarty_tpl->getVariable('data')->value['S'];?>
"/></td>
                        <td width='20%'>Nadi</td>
                        <td width='30%'><input type="text" name="N" size="10" value="<?php echo $_smarty_tpl->getVariable('data')->value['N'];?>
"/> x/menit</td>
                    </tr>
                    <tr>
                        <td>R</td>
                        <td><input type="text" name="R" size="10" value="<?php echo $_smarty_tpl->getVariable('data')->value['R'];?>
"/> x/menit</td>
                        <td>TD</td>
                        <td><input type="text" name="TD" size="10" value="<?php echo $_smarty_tpl->getVariable('data')->value['TD'];?>
"/> mmHg</td>
                    </tr>
                    <tr>
                        <td>Tinggi Badan</td>
                        <td><input type="text" name="TB" size="10" value="<?php echo $_smarty_tpl->getVariable('data')->value['TB'];?>
"/> cm</td>
                        <td>Berat Badan</td>
                        <td><input type="text" name="BB" size="10" value="<?php echo $_smarty_tpl->getVariable('data')->value['BB'];?>
"/> Kg</td>
                    </tr>
            

                    <tr>
                        <td>Lingkar Kepala</td>
                        <td>  <input type="text" value="<?php echo $_smarty_tpl->getVariable('data')->value['LINGKAR_KEPALA'];?>
" name="LINGKAR_KEPALA"> </td> 
                     
                         <td>    Status Gizi </td>
                         <td>   
                            <input type="radio" name="STATUS_GIZI"  <?php if ($_smarty_tpl->getVariable('data')->value['STATUS_GIZI']=='Baik'){?> checked <?php }?>  value="Baik">Baik
                            <input type="radio" name="STATUS_GIZI"  <?php if ($_smarty_tpl->getVariable('data')->value['STATUS_GIZI']=='Cukup'){?> checked <?php }?>  value="Cukup">Cukup
                            <input type="radio" name="STATUS_GIZI" <?php if ($_smarty_tpl->getVariable('data')->value['STATUS_GIZI']=='Kurang'){?> checked <?php }?> value="Kurang">Kurang
                         </td>
                    </tr>
                    <tr>
                        <td><b>Kebutuhan Fungsional</b></td>
                    </tr>
                    <tr>
                        <td>Alat Bantu</td>
                        <td> <input type="text" name="ALAT_BANTU"  value="<?php echo $_smarty_tpl->getVariable('data')->value['ALAT_BANTU'];?>
"></td>
                        <td>Cacat  </td>
                        <td> <input type="text" name="CACAT" value="<?php echo $_smarty_tpl->getVariable('data')->value['CACAT'];?>
"></td>
                    </tr>
                    <tr>
                        <td>ADL</td>
                        <td>
                            <input type="radio" required name="ADL" <?php if ($_smarty_tpl->getVariable('data')->value['ADL']=='1'){?> checked <?php }?> value="1">Mandiri
                             <input type="radio" required name="ADL" <?php if ($_smarty_tpl->getVariable('data')->value['ADL']=='2'){?> checked <?php }?> value="2">Dibantu

                        </td>
                         
                         <input type="hidden" name="RESIKO_JATUH" value="<?php echo $_smarty_tpl->getVariable('data')->value['RESIKO_JATUH'];?>
">
                    </tr>
          
     
            <tr class="headrow">
                <th colspan="4">Asesmen Nyeri</th>
            </tr>
            <tr>
                <td width='20%'>Ada Nyeri ?</td>
                <td width='30%'>
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
                    <select name="FS_NYERIP" id="surat_dari" class="select2" style="width: 150px;">
                        <option value="0" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIP']=='0'){?> selected="" <?php }?>>Tidak Ada Nyeri</option>
                        <option value="1" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIP']=='1'){?> selected="" <?php }?>>Biologik</option>
                        <option value="2" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIP']=='2'){?> selected="" <?php }?>>Kimiawi</option>
                        <option value="3" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIP']=='3'){?> selected="" <?php }?>>Mekanik / Rudapaksa</option>
                    </select>
                </td>
                <td>Quality</td>
                <td>
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
                    <input type="text" name="FS_NYERIR" size="30" value="<?php echo $_smarty_tpl->getVariable('nyeri')->value['FS_NYERIR'];?>
"/>
                </td>
                <td>Severity</td>
                <td>
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
                <th colspan="4">   </th>
            </tr>
            <tr>
                <td style="width: 200px;">B1 (Breathing</td>
                <td colspan="3">
                    <table>
                        <tr>
                            <td>Irama Nafas</td>
                            <td><input type="radio" name="IRAMA_NAFAS" <?php if ($_smarty_tpl->getVariable('data')->value['IRAMA_NAFAS']=='Teratur'){?> checked <?php }?> value="Teratur">Teratur </td>
                            <td><input type="radio" name="IRAMA_NAFAS" <?php if ($_smarty_tpl->getVariable('data')->value['IRAMA_NAFAS']=='Tidak'){?> checked <?php }?>  value="Tidak">Tidak Teratur </td>
                        </tr>
                        <tr>
                            <td> Batuk  </td>
                            <td><input type="radio" name="BATUK" <?php if ($_smarty_tpl->getVariable('data')->value['BATUK']=='Tidak'){?> checked <?php }?> value="Tidak">Tidak   </td>
                            <td><input type="radio" name="BATUK" <?php if ($_smarty_tpl->getVariable('data')->value['BATUK']=='Ada'){?> checked <?php }?> value="Ada">Ada </td>
                           
                        </tr>
                        <tr>
                            <td> Pola Pernafasan  </td> 
                            <td><input type="radio" name="POLA_NAFAS" <?php if ($_smarty_tpl->getVariable('data')->value['POLA_NAFAS']=='Tidak'){?> checked <?php }?> value="Tidak">Tidak ada  </td>
                            <td><input type="radio" name="POLA_NAFAS" <?php if ($_smarty_tpl->getVariable('data')->value['POLA_NAFAS']=='Dypsnoe'){?> checked <?php }?> value="Dypsnoe">  Dypsnoe  </td>
                            <td><input type="radio" name="POLA_NAFAS" <?php if ($_smarty_tpl->getVariable('data')->value['POLA_NAFAS']=='Kusmaul'){?> checked <?php }?> value="Kusmaul">  Kusmaul  </td>
                            <td><input type="radio" name="POLA_NAFAS" <?php if ($_smarty_tpl->getVariable('data')->value['POLA_NAFAS']=='Cheyne Stoke'){?> checked <?php }?> value="Cheyne Stoke">  Cheyne Stoke  </td>
                        </tr>
                        <tr>
                            <td> Suara Nafas  </td>
                            <td><input type="radio" name="SUARA_NAFAS" <?php if ($_smarty_tpl->getVariable('data')->value['SUARA_NAFAS']=='Gargling'){?> checked <?php }?> value="Gargling">Gargling  </td>
                            <td><input type="radio" name="SUARA_NAFAS" <?php if ($_smarty_tpl->getVariable('data')->value['SUARA_NAFAS']=='Snoring'){?> checked <?php }?> value="Snoring"> Snoring </td>
                            <td><input type="radio" name="SUARA_NAFAS" <?php if ($_smarty_tpl->getVariable('data')->value['SUARA_NAFAS']=='Stidor'){?> checked <?php }?> value="Stidor">Stidor</td>
                            <td><input type="radio" name="SUARA_NAFAS" <?php if ($_smarty_tpl->getVariable('data')->value['SUARA_NAFAS']=='Tidak'){?> checked <?php }?> value="Tidak">  Tidak Ada  </td>
                        </tr>
                        <tr>
                            <td> Alat Bantu Nafas  </td>
                            <td><input type="radio" name="BANTU_NAFAS" <?php if ($_smarty_tpl->getVariable('data')->value['BANTU_NAFAS']=='Tidak'){?> checked <?php }?> class="rad" value="Tidak">Tidak   </td>
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
                                <td><input type="radio" name="NYERI_DADA" <?php if ($_smarty_tpl->getVariable('data')->value['NYERI_DADA']=='Tidak'){?> checked <?php }?>  value="Tidak">Tidak Ada </td>
                                <td><input type="radio" name="NYERI_DADA" <?php if ($_smarty_tpl->getVariable('data')->value['NYERI_DADA']=='Ada'){?> checked <?php }?>  value="Ada">Ada </td>
                             
                            </tr>
                            <tr>
                                <td> Akral  </td>
                                <td><input type="radio" name="AKRAL" <?php if ($_smarty_tpl->getVariable('data')->value['AKRAL']=='Hangat'){?> checked <?php }?>  value="Hangat">Hangat </td> 
                                <td><input type="radio" name="AKRAL"  <?php if ($_smarty_tpl->getVariable('data')->value['AKRAL']=='Kering'){?> checked <?php }?>  value="Kering">Kering </td> 
                                <td><input type="radio" name="AKRAL" <?php if ($_smarty_tpl->getVariable('data')->value['AKRAL']=='Dingin'){?> checked <?php }?>  value="Dingin">Dingin </td> 
                            </tr>
                            <tr>
                                <td> Perdarahan    </td> 
                                <td><input type="radio" class="radp" <?php if ($_smarty_tpl->getVariable('data')->value['PERDARAHAN']=='Tidak'){?> checked <?php }?>  name="PERDARAHAN" value="Tidak">Tidak ada  </td> 
                                <td><input type="radio" class="radp" <?php if ($_smarty_tpl->getVariable('data')->value['PERDARAHAN']=='Ada'){?> checked <?php }?>   name="PERDARAHAN" value="Ada">  ada
                                   <input type="text"  id="formp" <?php if ($_smarty_tpl->getVariable('data')->value['PERDARAHAN']!='Tidak'){?> style="display: show;" value="<?php echo $_smarty_tpl->getVariable('data')->value['PERDARAHAN'];?>
" <?php }?> style="display:none" name="PERDARAHAN2">    
                                </td> 

                            </tr>
                            <tr>
                                <td>   Cyanosis  </td>
                                <td><input type="radio" name="CYANOSIS" <?php if ($_smarty_tpl->getVariable('data')->value['CYANOSIS']=='Tidak'){?> checked <?php }?> value="Tidak">Tidak Ada  </td> 
                                <td><input type="radio" name="CYANOSIS" <?php if ($_smarty_tpl->getVariable('data')->value['CYANOSIS']=='Ada'){?> checked <?php }?> value="Ada">Ada  </td> 
                             
                            </tr>
                            <tr>
                                <td> CRT  </td>
                                <td><input type="radio" name="CRT" <?php if ($_smarty_tpl->getVariable('data')->value['CRT']=='1-2'){?> checked <?php }?> value="1-2">1-2 </td>
                                <td><input type="radio" name="CRT" <?php if ($_smarty_tpl->getVariable('data')->value['CRT']=='>2'){?> checked <?php }?> value=">2">>2   </td>
                            </tr>
                            <tr>
                                <td> Turgor  </td>
                                <td><input type="radio" name="TURGOR" <?php if ($_smarty_tpl->getVariable('data')->value['TURGOR']=='Elastis'){?> checked <?php }?> value="Elastis">Elastis </td>
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
                                    <td><input type="radio" name="REFLEK_CAHAYA" <?php if ($_smarty_tpl->getVariable('data')->value['REFLEK_CAHAYA']=='Positif'){?> checked <?php }?> value="Positif"> Positif </td>  
                                    <td><input type="radio" name="REFLEK_CAHAYA" <?php if ($_smarty_tpl->getVariable('data')->value['REFLEK_CAHAYA']=='Negatif'){?> checked <?php }?> value="Negatif"> Negatif </td>  
                                </tr>
                                <tr>
                                    <td> Pupil    </td> 
                                    <td><input type="radio" name="PUPIL" <?php if ($_smarty_tpl->getVariable('data')->value['PUPIL']=='Isokor'){?> checked <?php }?> value="Isokor">Isokor  </td> 
                                    <td><input type="radio" name="PUPIL" <?php if ($_smarty_tpl->getVariable('data')->value['PUPIL']=='Anisokor'){?> checked <?php }?>  value="Anisokor">  Anisokor  </td> 
                                </tr>
                                <tr>
                                    <td>   Kelumpuhan  </td>
                                    <td><input type="radio" name="LUMPUH" <?php if ($_smarty_tpl->getVariable('data')->value['LUMPUH']=='Tidak'){?> checked <?php }?> value="Tidak">Tidak Ada  </td> 
                                    <td><input type="radio" name="LUMPUH" <?php if ($_smarty_tpl->getVariable('data')->value['LUMPUH']=='Ada'){?> checked <?php }?> value="Ada">Ada  </td> 
                                    
                                </tr>
                                <tr>
                                    <td> Pusing  </td>
                                    <td><input type="radio" name="PUSING" <?php if ($_smarty_tpl->getVariable('data')->value['PUSING']=='Tidak'){?> checked <?php }?> value="Tidak">Tidak Ada  </td> 
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
                                        <td><input type="radio" name="BAK" <?php if ($_smarty_tpl->getVariable('data')->value['BAK']=='Spontak'){?> checked <?php }?> value="Spontak">Spontak  </td> 
                                        <td><input type="radio" name="BAK" <?php if ($_smarty_tpl->getVariable('data')->value['BAK']=='Tidak'){?> checked <?php }?>  value="Tidak">Tidak  Spontak  </td> 
                                    </tr>
                                    <tr>
                                        <td> Nyeri Tekan  </td>
                                        <td><input type="radio" name="BAK_TEKAN" <?php if ($_smarty_tpl->getVariable('data')->value['BAK_TEKAN']=='Ada'){?> checked <?php }?> value="Ada">Ada  </td> 
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
                                        <td><input type="radio" name="BAB" value="Normal" <?php if ($_smarty_tpl->getVariable('data')->value['BAB']=='Normal'){?> checked <?php }?>>Normal  </td>  
                                        <td><input type="radio" name="BAB" value="Cair" <?php if ($_smarty_tpl->getVariable('data')->value['BAB']=='Cair'){?> checked <?php }?>>Cair  </td>  
                                        <td><input type="radio" name="BAB" value="Konstipasi"  <?php if ($_smarty_tpl->getVariable('data')->value['BAB']=='Konstipasi'){?> checked <?php }?>>Konstipasi  </td>  
                                    </tr>
                                    <tr>
                                        <td>   Abdomen  </td>
                                        <td><input type="radio" name="ABDOMEN" value="Supel" <?php if ($_smarty_tpl->getVariable('data')->value['ABDOMEN']=='Supel'){?> checked <?php }?>>Supel  </td>  
                                        <td><input type="radio" name="ABDOMEN" value="Kembang" <?php if ($_smarty_tpl->getVariable('data')->value['ABDOMEN']=='Kembang'){?> checked <?php }?>>Kembang  </td>  
                                        <td><input type="radio" name="ABDOMEN" value="Ascites" <?php if ($_smarty_tpl->getVariable('data')->value['ABDOMEN']=='Ascites'){?> checked <?php }?>>Ascites  </td>  
                                        <td><input type="radio" name="ABDOMEN" value="Tegang" <?php if ($_smarty_tpl->getVariable('data')->value['ABDOMEN']=='Tegang'){?> checked <?php }?>>Tegang  </td>  
                                    </tr>
                                    <tr>
                                        <td> Nyeri Tekan  </td>
                                        <td><input type="radio" name="BAB_TEKAN" value="Tidak" <?php if ($_smarty_tpl->getVariable('data')->value['BAB_TEKAN']=='Tidak'){?> checked <?php }?>>Tidak Ada  </td> 
                                        <td><input type="radio" name="BAB_TEKAN" value="Ada" <?php if ($_smarty_tpl->getVariable('data')->value['BAB_TEKAN']=='Ada'){?> checked <?php }?>>Ada  </td> 
                                       
                                    </tr> 
                                     
                                    <tr>
                                        <td> Jejas Abdomen    </td>
                                        <td><input type="radio" name="JEJAS_ABDOMEN" value="Tidak" <?php if ($_smarty_tpl->getVariable('data')->value['JEJAS_ABDOMEN']=='Tidak'){?> checked <?php }?>>Tidak Ada  </td> 
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
                                        <td><input type="radio" name="SENDI" value="Bebas" <?php if ($_smarty_tpl->getVariable('data')->value['SENDI']=='Bebas'){?> checked <?php }?>>Bebas  </td>  
                                        <td><input type="radio" name="SENDI" value="Terbatas" <?php if ($_smarty_tpl->getVariable('data')->value['SENDI']=='Terbatas'){?> checked <?php }?>>Terbatas  </td>   
                                    </tr>
                                    <tr>
                                        <td>   DIslokasi  </td>
                                        <td><input type="radio" name="DISLOK" value="Tidak" <?php if ($_smarty_tpl->getVariable('data')->value['DISLOK']=='Tidak'){?> checked <?php }?>>Tidak Ada  </td>   
                                        <td><input type="radio" name="DISLOK" value="Ada" <?php if ($_smarty_tpl->getVariable('data')->value['DISLOK']=='Ada'){?> checked <?php }?>>Ada  </td>   
                                      
                                    </tr>
                                    <tr>
                                        <td> Fraktur    </td>
                                        <td><input type="radio" name="FRAKTUR" class="radf" <?php if ($_smarty_tpl->getVariable('data')->value['FRAKTUR']=='Tidak'){?> checked <?php }?> value="Tidak">Tidak Ada  </td> 
                                        <td><input type="radio" name="FRAKTUR" class="radf" <?php if ($_smarty_tpl->getVariable('data')->value['FRAKTUR']!='Tidak'){?> checked <?php }?> value="Ada">Ada  
                                           <input type="text"  id="formf" <?php if ($_smarty_tpl->getVariable('data')->value['FRAKTUR']!='Tidak'){?> style="display: show;" value="<?php echo $_smarty_tpl->getVariable('data')->value['FRAKTUR'];?>
" <?php }?> style="display:none" name="FRAKTUR2">    
                                            </td> 
                                        
                                    </tr> 
                                     
                                    <tr>
                                        <td> Luka      </td>
                                        <td><input type="radio" name="LUKA" value="Tidak" <?php if ($_smarty_tpl->getVariable('data')->value['LUKA']=='Tidak'){?> checked <?php }?>>Tidak Ada  </td> 
                                        <td><input type="radio" name="LUKA" value="Ada" <?php if ($_smarty_tpl->getVariable('data')->value['LUKA']=='Ada'){?> checked <?php }?>>Ada  </td> 
                                       
                                        <td><input type="radio" name="LUKA" value="Bersih" <?php if ($_smarty_tpl->getVariable('data')->value['BAK_TEKAN']=='Bersih'){?> checked <?php }?>>Bersih  </td> 
                                        <td><input type="radio" name="LUKA" value="Kotor" <?php if ($_smarty_tpl->getVariable('data')->value['BAK_TEKAN']=='Kotor'){?> checked <?php }?>>Kotor  </td> 

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
                                        <option value="4"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_1']=='4'){?> selected <?php }?>>dibawah 3 Tahun</option>
                                        <option value="3"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_1']=='3'){?> selected <?php }?>>3-7 Tahun</option>
                                        <option value="2"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_1']=='2'){?> selected <?php }?>>7-13 Tahun</option>
                                        <option value="1"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_1']=='1'){?> selected <?php }?>>> 13 Tahun</option>
                        
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
                                        <option value="2"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_2']=='2'){?> selected <?php }?>>Laki-Laki</option>
                                        <option value="1"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_2']=='1'){?> selected <?php }?>>Perempuan</option>
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
                                        <option value="4"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_3']=='4'){?> selected <?php }?>>Diagnosis Neurologi</option>
                                        <option value="3"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_3']=='3'){?> selected <?php }?>>Perubahan Oksigenasi</option>
                                        <option value="2"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_3']=='2'){?> selected <?php }?>>Gangguan Perilaku/Psikiatri</option>
                                        <option value="1"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_3']=='1'){?> selected <?php }?>>Diagnosis Lainnya</option>
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
                                        <option value="4"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_5']=='4'){?> selected <?php }?>>Riwayat jatuh/bayi diletakkan di tempat tidur dewasa</option>
                                        <option value="3"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_5']=='3'){?> selected <?php }?>>Pasien Menggunakanalat bantu/bayi diletakkan dalam tempat tifur bayi/perabot rumah</option>
                                        <option value="2"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_5']=='2'){?> selected <?php }?>>Pasien diletakkan di tempat tidur</option>
                                        <option value="1"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_5']=='1'){?> selected <?php }?>>Area diluar rumah sakit</option>
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
                                        <option value="3"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_6']=='3'){?> selected <?php }?>>Dalam 24 jam</option>
                                        <option value="2"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_6']=='2'){?> selected <?php }?>>Dalam 48 jam</option>
                                        <option value="1"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_6']=='1'){?> selected <?php }?> > > 48 jam atau tidak menjalani pembedahan / sedasi/anastesi</option>
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
                                        <option value="3"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_7']=='3'){?> selected <?php }?>>Penggunaan multipel</option>
                                        <option value="2"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_7']=='2'){?> selected <?php }?>>Penggunaan salah satu obat</option>
                                        <option value="1"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_7']=='1'){?> selected <?php }?>>Penggunaan medikasi lainnya/tidak ada medikasi</option>
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
                                        <option value="25" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_1']=='25'){?> selected <?php }?>>< 3 bulan</option>
                                        <option value="0" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_1']=='0'){?> selected <?php }?>>tidak ada atau > 3 bulan</option>
                        
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
                                        <option value="15"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_2']=='15'){?> selected <?php }?>>> 1 diagnosa penyakit</option>
                                        <option value="0"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_2']=='0'){?> selected <?php }?>><= 1 diagnosa penyakit</option>
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
                                        <option value="30"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_3']=='30'){?> selected <?php }?>>Perabot</option>
                                        <option value="15"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_3']=='15'){?> selected <?php }?>>Tongkat / penopang</option>
                                        <option value="0"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_3']=='0'){?> selected <?php }?>>Tidak ada / Tirah baring</option>
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
                                        <option value="20"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_4']=='20'){?> selected <?php }?>>Terapi IV terus menerus</option>
                                        <option value="0"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_4']=='0'){?> selected <?php }?>>Tidak</option>
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
                                        <option value="30"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_5']=='30'){?> selected <?php }?>>Kerusakan (Terganggu)</option>
                                        <option value="15"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_5']=='15'){?> selected <?php }?>>Lemah</option>
                                        <option value="0"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_5']=='0'){?> selected <?php }?>>Normal / Tirah baring</option>
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
                                        <option value="15"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_6']=='15'){?> selected <?php }?>>Lupa keterbatasan</option>
                                        <option value="0"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_6']=='0'){?> selected <?php }?>>Sadar kemampuan diri</option>
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
                                        <option value="4"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_12']=='4'){?> selected <?php }?>>Ya</option>
                                        <option value="0"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_12']=='0'){?> selected <?php }?>>Tidak</option>
                        
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
                                        <option value="4"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_13']=='4'){?> selected <?php }?>>Ya</option>
                                        <option value="0"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_13']=='0'){?> selected <?php }?>>Tidak</option>
                        
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
                                        <option value="2"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_14']=='2'){?> selected <?php }?>>Ya</option>
                                        <option value="0"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_14']=='0'){?> selected <?php }?>>Tidak</option>
                        
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
                                        <option value="2"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_15']=='2'){?> selected <?php }?>>Ya</option>
                                        <option value="0"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_15']=='0'){?> selected <?php }?>>Tidak</option>
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
                                        <option value="1"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_16']=='1'){?> selected <?php }?>>Ya</option>
                                        <option value="0"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_16']=='0'){?> selected <?php }?>>Tidak</option>
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
                                        <option value="1"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_17']=='1'){?> selected <?php }?>>Ya</option>
                                        <option value="0"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_17']=='0'){?> selected <?php }?> >Tidak</option>
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
                                        <option value="0" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI1']=='0'){?>selected=""<?php }?>>Tidak</option>
                                        <option value="1" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI1']=='1'){?>selected=""<?php }?>>Tidak Yakin</option>
                                        <option value="2" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI1']=='2'){?>selected=""<?php }?>>Ya (1-5 Kg)</option>
                                        <option value="3" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI1']=='3'){?>selected=""<?php }?>>Ya (6-10 Kg)</option>
                                        <option value="4" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI1']=='4'){?>selected=""<?php }?>>Ya (11-15 Kg)</option>
                                        <option value="5" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI1']=='5'){?>selected=""<?php }?>>Ya (>15 Kg)</option>
                    
                                    </select>
                                    <span id="snh1"></span>
                                </td>
                                <td width='20%'>Kesimpulan</td>
                                <td width='30%'><b><span id="kesimpulansn"></span></b></td>
                            </tr>
                            <tr>
                                <td>Asupan makanan menurun dikarenakan adanya penurunan nafsu makan</td>
                                <td>
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
                                    <input type="checkbox" name="KRITERIA_DISCHARGE[]" value="Umur>65" <?php if (in_array(' Umur>65',$_smarty_tpl->getVariable('kriteria_discahargers')->value)){?>checked="checked"<?php }?>>Umur>65<br>
                                    <input type="checkbox" name="KRITERIA_DISCHARGE[]" value="Terbatas Mobilitas" <?php if (in_array('Terbatas Mobilitas',$_smarty_tpl->getVariable('kriteria_discahargers')->value)){?>checked="checked"<?php }?>>Terbatas Mobilitas<br>
                                    <input type="checkbox" name="KRITERIA_DISCHARGE[]" value="Perawatan Lanjutan" <?php if (in_array('Perawatan Lanjutan',$_smarty_tpl->getVariable('kriteria_discahargers')->value)){?>checked="checked"<?php }?>>Perawatan Lanjutan<br>
                                    <input type="checkbox" name="KRITERIA_DISCHARGE[]" value="Bantuan Aktifitas Sehari hari" <?php if (in_array('Bantuan Aktifitas Sehari hari',$_smarty_tpl->getVariable('kriteria_discahargers')->value)){?>checked="checked"<?php }?>>Bantuan Aktifitas Sehari hari<br>
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
                                <th colspan="4">        </th>
                            </tr>
                            <tr>
                                <input type="hidden" name="HASIL">
                                 
                                <td>Jam Selesai diperiksa</td>
                                <td><input type="time" value="<?php echo date('H:i',strtotime($_smarty_tpl->getVariable('data')->value['JAM_SELESAI']));?>
" name="JAM_SELESAI"></td>
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
            </form>
            </div>
      <script>



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


 
  </script>     





<!--planning-->
<script type="text/javascript">
    $(document).ready(function() {
        // chain select
        // tembusan
        var user = $("#user").val();
        $('#planning').select2('data', null);
        if (user == '') {
            $("#planning").attr("disabled", "disabled");
        } else {
//            $('#planning').select2('data', null);
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
                        $('#planning').select2('val', [<?php echo $_smarty_tpl->getVariable('rs_planning')->value;?>
]);
                }
            });
        }
        $("#user").change(function() {
            user = $(this).val();
            //get icao code by airlines_id
//            $.ajax({
//                type: "POST",
//                url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('angud/ijin_rute/get_airlines_by_id/');?>
",
//                data: "user=" + user,
//                dataType: 'json',
//                success: function(data) {
//
//                    $('input[name="airlines_icao_cd"]').val(user);
//                }
//            });
            $('#planning').select2('data', null);
            if (user == '') {
                $("#planning").attr("disabled", "disabled");
            } else {
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
            }
        });
        //tags
        $("#planning").select2({});
    });
</script>
<?php if (isset($_smarty_tpl->getVariable('result',null,true,false)->value)){?>
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('result')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
<?php if ($_smarty_tpl->tpl_vars['key']->value=='planning_loop[]'){?>
<?php $_smarty_tpl->tpl_vars['planning_loop'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value, null, null);?>
<?php $_smarty_tpl->tpl_vars['planning_var'] = new Smarty_variable('', null, null);?>
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('planning_loop')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
<?php $_smarty_tpl->tpl_vars['planning_var'] = new Smarty_variable(((($_smarty_tpl->getVariable('planning_var')->value).("'")).($_smarty_tpl->tpl_vars['i']->value)).("',"), null, null);?>
<?php }} ?>
<?php $_smarty_tpl->tpl_vars['planning_loop'] = new Smarty_variable($_smarty_tpl->getVariable('planning_var')->value, null, null);?>
<script type="text/javascript">
    $(document).ready(function() {
        // date picker
        $(".tanggal").datepicker({
            changeMonth: true,
            changeYear: true,
            showOn: "both",
            buttonImage: "<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
/resource/doc/images/icon/calendar.gif",
            buttonImageOnly: true,
            dateFormat: 'yy-mm-dd'
        });
        // chain select
        var user = $("#user").val();
        $('#planning').select2('data', null);
//        if (user == '') {
//            $("#tujuan").attr("disabled", "disabled");
//        } else {
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
                    $('#planning').select2('val', [<?php echo $_smarty_tpl->getVariable('planning_loop')->value;?>
]);

                }
            });
//        }
        $("#user").change(function() {
            user = $(this).val();
            $('#planning').select2('data', null);
//            if (user == '') {
//                $("#tujuan").attr("disabled", "disabled");
//            } else {
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
//            }
        });
        //tags
        $("#planning").select2({});
    });
</script>
<?php }?>
<?php }} ?>

<?php }?>

 
 
<!--edukasi-->
<script type="text/javascript">
    $(document).ready(function() {
        // chain select
        // tembusan
        var user = $("#user").val();
        $('#edukasi').select2('data', null);
        if (user == '') {
            $("#edukasi").attr("disabled", "disabled");
        } else {
//            $('#edukasi').select2('data', null);
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
                        $('#edukasi').select2('val', [<?php echo $_smarty_tpl->getVariable('rs_edukasi')->value;?>
]);
                }
            });
        }
        $("#user").change(function() {
            user = $(this).val();
  
            $('#edukasi').select2('data', null);
            if (user == '') {
                $("#edukasi").attr("disabled", "disabled");
            } else {
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
            }
        });
        //tags
        $("#edukasi").select2({});
    });
</script>

<!-- masalah keperawatan -->
<script type="text/javascript">
    $(document).ready(function() {
        // chain select
        // tembusan
        var user = $("#user").val();
        $('#tujuan').select2('data', null);
        if (user == '') {
            $("#tujuan").attr("disabled", "disabled");
        } else {
//            $('#tujuan').select2('data', null);
                $("#tujuan").removeAttr("disabled");
                jQuery("#tujuan").html('');
                $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal/list_masalah_kep/');?>
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
                        jQuery("#tujuan").html(showData);
                        $('#tujuan').select2('val', [<?php echo $_smarty_tpl->getVariable('rs_tujuan')->value;?>
]);
                }
            });
        }
        $("#user").change(function() {
            user = $(this).val();
  
            $('#tujuan').select2('data', null);
            if (user == '') {
                $("#tujuan").attr("disabled", "disabled");
            } else {
                $("#tujuan").removeAttr("disabled");
                jQuery("#tujuan").html('');
                $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal/list_masalah_kep/');?>
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
                        jQuery("#tujuan").html(showData);
                    }
                });
            }
        });
        //tags
        $("#tujuan").select2({});
    });
</script>

<!-- rencana keperawatan -->
<script type="text/javascript">
    $(document).ready(function() {
        // chain select
        // tembusan
        var user = $("#user").val();
        $('#tembusan').select2('data', null);
        if (user == '') {
            $("#tembusan").attr("disabled", "disabled");
        } else {
//            $('#tembusan').select2('data', null);
                $("#tembusan").removeAttr("disabled");
                jQuery("#tembusan").html('');
                $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal/list_rencana_kep/');?>
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
                        $('#tembusan').select2('val', [<?php echo $_smarty_tpl->getVariable('rs_tembusan')->value;?>
]);
                }
            });
        }
        $("#user").change(function() {
            user = $(this).val();
  
            $('#tembusan').select2('data', null);
            if (user == '') {
                $("#tembusan").attr("disabled", "disabled");
            } else {
                $("#tembusan").removeAttr("disabled");
                jQuery("#tembusan").html('');
                $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal/list_rencana_kep/');?>
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
            }
        });
        //tags
        $("#tembusan").select2({});
    });
</script>

<?php if (isset($_smarty_tpl->getVariable('result',null,true,false)->value)){?>
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('result')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
<?php if ($_smarty_tpl->tpl_vars['key']->value=='edukasi_loop[]'){?>
<?php $_smarty_tpl->tpl_vars['edukasi_loop'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value, null, null);?>
<?php $_smarty_tpl->tpl_vars['edukasi_var'] = new Smarty_variable('', null, null);?>
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('edukasi_loop')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
<?php $_smarty_tpl->tpl_vars['edukasi_var'] = new Smarty_variable(((($_smarty_tpl->getVariable('edukasi_var')->value).("'")).($_smarty_tpl->tpl_vars['i']->value)).("',"), null, null);?>
<?php }} ?>
<?php $_smarty_tpl->tpl_vars['edukasi_loop'] = new Smarty_variable($_smarty_tpl->getVariable('edukasi_var')->value, null, null);?>
<script type="text/javascript">
    $(document).ready(function() {
        // date picker
        $(".tanggal").datepicker({
            changeMonth: true,
            changeYear: true,
            showOn: "both",
            buttonImage: "<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
/resource/doc/images/icon/calendar.gif",
            buttonImageOnly: true,
            dateFormat: 'yy-mm-dd'
        });
        // chain select
        var user = $("#user").val();
        $('#edukasi').select2('data', null);
//        if (user == '') {
//            $("#tujuan").attr("disabled", "disabled");
//        } else {
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
                    $('#edukasi').select2('val', [<?php echo $_smarty_tpl->getVariable('edukasi_loop')->value;?>
]);

                }
            });
//        }
        $("#user").change(function() {
            user = $(this).val();
            $('#edukasi').select2('data', null);
//            if (user == '') {
//                $("#tujuan").attr("disabled", "disabled");
//            } else {
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
//            }
        });
        //tags
        $("#edukasi").select2({});

        
    });
</script>
<?php }?>
<?php }} ?>

<?php }?>




 