<?php /* Smarty version Smarty-3.0.7, created on 2023-06-06 08:34:14
         compiled from "application/views\igd/bidan/add.html" */ ?>
<?php /*%%SmartyHeaderCode:31596647e8d1681ffb4-18057371%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '865389c6e1777afed47c19e4a8bf927474e152ab' => 
    array (
      0 => 'application/views\\igd/bidan/add.html',
      1 => 1685954848,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31596647e8d1681ffb4-18057371',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'F:\xampp\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("inap/ass_jatuh/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<script type="text/javascript">
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
         <small>Add Data Asesmen Kebidanan IGD</small>
    </p>
    <div class="clear"></div>
</div> 
<div class="content-entry">
    <!-- notification template -->
     <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('igd/bidan/add_process');?>
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
               <td>Cara Masuk</td>
               <td>  <input type="radio" name="CARA_MASUK" <?php if ($_smarty_tpl->getVariable('rs_triase')->value['CARA_MASUK']=='Jalan'){?> checked <?php }?>  value="Jalan"  /> Jalan
                <input type="radio" name="CARA_MASUK" <?php if ($_smarty_tpl->getVariable('rs_triase')->value['CARA_MASUK']=='Brandkar'){?> checked <?php }?> value="Brandkar"  /> Brandkar 
                <input type="radio" name="CARA_MASUK" <?php if ($_smarty_tpl->getVariable('rs_triase')->value['CARA_MASUK']=='Kursi Roda'){?> checked <?php }?> value="Kursi Roda"  /> Kursi Roda 
                <input type="radio" name="CARA_MASUK" <?php if ($_smarty_tpl->getVariable('rs_triase')->value['CARA_MASUK']=='Digendong'){?> checked <?php }?> value="Digendong"  /> Digendong</td>
                 </td></tr>  
             <tr>
                <td>Rujukan Dari</td>
                <td> <input type="text" name="RUJUKAN" size="40" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['rujukan_dari'];?>
">  </td></tr>  
            <!-- <tr>
               <td>Asal Masuk</td>
               <td> <input type="text" name="ASAL_MASUK" size="40" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['ALASAN_DATANG'];?>
" >  </td>
            </tr>   -->
           
            <tr>
                <td> Membawa obat sendiri</td>
                <td>  
                    <input type="radio" name="BAWA_OBAT" value="Ya">Ya    
                    <input type="radio" name="BAWA_OBAT" checked value="Tidak">Tidak    
                     <BR>
                  Bila iya,  Diberikan ke petugas 
                    <input type="radio" name="BERI_OBAT" value="Ya">Ya    
                    <input type="radio" name="BERI_OBAT" checked value="Tidak">Tidak    
                </td>
             </tr>  

       </table>
        
       <table class="table-input" width="100%">

        <tr class="headrow">
            <th colspan="2">Data Suami</th>
            <th colspan="2"></th>
        </tr>
        <tr>
            <td width='20%'>Nama</td>
            <td width='30%'><input type="text" name="NAMA_SUAMI" size="50" required value="-" /></td>
            <td width='20%'>Tanggal Lahir </td>
            <td width='30%'><input type="date" name="TGL_LAHIR_SUAMI" size="10"  /></td>
        </tr>
        <tr>
            
            <td width='20%'>  Pekerjaan </td>
            <td width='30%'><input type="text" name="PEKERJAAN_SUAMI" size="50" required value="-" /> </td>
            <td width='20%'>Agama</td>
            <td width='30%'> 
                <input type="radio" name="AGAMA_SUAMI" checked  value="Islam"> Islam
                <input type="radio" name="AGAMA_SUAMI" value="Kristen"> Kristen
                <input type="radio" name="AGAMA_SUAMI" value="Katolik"> Katolik
                <input type="radio" name="AGAMA_SUAMI" value="Budha"> Budha
                <input type="radio" name="AGAMA_SUAMI" value="Hindu"> Hindu
                <input type="radio" name="AGAMA_SUAMI" value="Khonghucu"> Khonghucu
            </td>
        </tr>
        <tr>
            <td width='20%'>Pendidikan</td>
            <td width='30%'><input type="text" name="PENDIDIKAN_SUAMI" size="50"  />-</td>
           
        </tr>
        </table>
      
         
    
        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="4">Data pasien</th>
            </tr>
            <tr>
                <td width='20%'>Agama</td>
                <td width='30%'>
                    <select name="FS_AGAMA" id="surat_dari" class="select2" style="width: 100px;">
                        <option value="1">Islam</option>
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
                    <input type="text" name="PENDIDIKAN_PASIEN" required value="-" size="50"  />
                </td>

                <!-- <td width='20%'>Nilai/Kepercayaan khusus</td>
                <td width='30%'>
                    <select name="FS_NILAI_KHUSUS">
                        <option value="1" onclick='document.getElementById("civstaton4").disabled = true'>Tidak Ada</option>
                        <option VALUE="2" onclick='document.getElementById("civstaton4").disabled = false'>Ada</option>
                    </select>
                    <br><br>
                    <input type="text" name="FS_NILAI_KHUSUS2" id="civstaton4" disabled="" size="32">
                </td> -->
            </tr>
            <TR>  <td width='20%'>Pekerjaan Pasien</td>
                <td width='30%'>
                    <input type="text" name="JOB_PASIEN" required size="50"  />
                </td></TR>
            
        </table>


       <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">I. SUBYEKTIF</th> 
        </tr>
        <tr>
            <td>Keluhan Utama</td>
            <td colspan="3"><textarea style="width: 600px;" name="FS_ANAMNESA" required value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['KELUHAN'];?>
"><?php echo $_smarty_tpl->getVariable('rs_triase')->value['KELUHAN'];?>
</textarea></td>
            
        </tr>
        <!-- <tr>
            <td colspan="2">
                
            </td>
            <td colspan="2">
                <textarea cols="50" name="FS_PEMERIKSAAN_FISIK">-</textarea>

            </td>
        </tr> -->
        <tr class="headrow">
            <th colspan="4">RIWAYAT HAID</th>
        </tr>
        <tr>
            <td width='20%'>Menarche</td>
            <td width='30%'><input type="text" name="FS_HAID_MEN" size="10" required value="-"  /></td>
            <td width='20%'>Siklus</td>
            <td width='30%'>
                <input type="radio" required name="FS_HAID_SIKLUS" checked value="Teratur">Teratur
                <input type="radio" required value="-" name="FS_HAID_SIKLUS" value="Tidak"> Tidak
            </td>
        </tr>
        <tr>
            <td>Lama Haid</td>
            <td><input type="text" name="FS_HAID_LAMA" size="10" required value="" /> Hari</td>
            <td>HPPT</td>
            <td><input type="text" name="FS_HAID_HPHT" size="10" required value="-" />  </td>
        </tr>
        <tr>
            <td>  HPL</td>
            <td><input type="text" name="FS_HAID_HPL" size="10" required value="-" />  </td>
            <td>Keluhan</td>
            <td><input type="text" name="FS_HAID_KELUHAN" size="10" required value="-" />  </td>
        </tr>
        <tr class="headrow">
            <th colspan="4">RIWAYAT PENYAKIT</th>
        </tr>
        <tr> 
            <td>  Riwayat penyakit dahulu </td>
             <td colspan="3"> 
               <input style="width: 600px;" type="text" name="FS_RIW_PENYAKIT_DAHULU" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_RIW_PENYAKIT_DAHULU'])===null||$tmp==='' ? '-' : $tmp);?>
" size="32">
                </td>
        </tr>

        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="4">  RIWAYAT PENYAKIT PADA KEHAMILAN SEKARANG</th>
                 
            </tr>
            <tr>
                <td width='20%'>Asma</td>
                <td width='30%'> Mulai Tahun 
                   <input type="text" name="FS_ASMA_MULAI"   size="32">
                </td>
                <td width='20%'>Dalam Terapi</td>
                <td width='30%'>
                    <input type="text" name="FS_ASMA_TERAPI"  size="32">
                
                </td>
            </tr>
            <tr>
                <td width='20%'>Jantung</td>
                <td width='30%'> Mulai Tahun 
                   <input type="text" name="FS_JANTUNG_MULAI"   size="32">
                </td>
                <td width='20%'>Dalam Terapi</td>
                <td width='30%'>
                    <input type="text" name="FS_JANTUNG_TERAPI"   size="32">
                
                </td>
            </tr>
            <tr>
                <td width='20%'>Diabetes</td>
                <td width='30%'> Mulai Tahun 
                   <input type="text" name="FS_DIABETES_MULAI"    size="32">
                </td>
                <td width='20%'>Dalam Terapi</td>
                <td width='30%'>
                    <input type="text" name="FS_DIABETES_TERAPI"  size="32">
                
                </td>
            </tr>
            <tr>
                <td width='20%'>Hipertensi</td>
                <td width='30%'> Mulai Tahun 
                   <input type="text" name="FS_HIPERTENSI_MULAI"   size="32">
                </td>
                <td width='20%'>Dalam Terapi</td>
                <td width='30%'>
                    <input type="text" name="FS_HIPERTENSI_TERAPI"  size="32">
                
                </td>
            </tr>
            <tr>
                <td width='20%'>Penyakit Lain</td>
                <td width='30%'>  
                   <input type="text" name="FS_SAKIT_LAIN"  size="52">
                </td>
               
            </tr>
        
        <!-- <tr class="headrow">
            <th colspan="4">STATUS PERKAWINAN </th>
        </tr>
        <tr>
            <td width='20%'>Status</td>
            <td width='30%'><input type="text" name="FS_STATUS_PERKAWINAN" size="10"  /></td>
            <td width='20%'>Lama</td>
            <td width='30%'><input type="text" name="FS_LAMA_MENIKAH" size="10"  /> </td>
        </tr> -->

     <!--    <tr class="headrow">
            <th colspan="4">RIWAYAT KEHAMILAN (tgl partus, tempat partus, umur hamil, jenis persalinan, penolong persalinan, penyulit, anak JK/BB)  </th>
        </tr>
        <tr>
            <td width='50%' colspan="2" > 
              <textarea cols="100" name="RIWAYAT_KEHAMILAN">-</textarea>  </td> 
              <td width='20%'> </td>
              <td width='30%'> </td>
        </tr>
--> 


        <tr class="headrow">
            <th colspan="4">   </th>
        </tr>
        <tr>
           
            <td width='20%'>Riwayat penyakit keluarga</td>
            <td width='30%'> 
                <input type="text" name="FS_RIW_PENYAKIT_DAHULU2" required value="-" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_RIW_PENYAKIT_DAHULU'])===null||$tmp==='' ? '-' : $tmp);?>
" size="32">
            
            </td>
        </tr>
        <tr class="headrow">
            <th colspan="4">   </th>
        </tr>
        <tr>
           
            <td width='20%'>Riwayat Gynekologi</td>
            <td colspan="3"> 
                <textarea cols="100" name="FS_RIWAYAT_GYNEKOLOGI" required value="-">-</textarea> 
            </td>
        </tr>

    
     
        <tr class="headrow">
            <th colspan="4">Riwayat KB</th>
        </tr>
        <tr>
            <td width='20%'>Riwayat KB (metode, lama) </td>
            <td width='30%'>  
                <textarea cols="50" name="FS_RIWAYAT_KB" required value="-">-</textarea>  
            </td>
            <td width='20%'>Riwayat Komplikasi KB</td>
            <td width='30%'>
                <textarea cols="50" name="FS_RIWAYAT_KOMPLIKASI_KB" required value="-">-</textarea>   
            
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
                    <input type="text" name="FS_ALERGI" size="35" required  value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
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
       </table>

       <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Pola Makan/Minum/Eliminasi</th>
        </tr>
        <tr>
            <td> Pola Makan</td>
            <td> <input type="text" name="POLA_MAKAN"> x/hari </td>
            <td>  Makan Terakhir Jam</td>
            <td> <input type="text" name="JAM_TERAKHIR_MAKAN">   </td>
        </tr>
        <tr>
            <td> Pola Minum</td>
            <td> <input type="text" name="POLA_MINUM"> cc/hari </td>
            <td>  Minum Terakhir Jam</td>
            <td> <input type="text" name="JAM_TERAKHIR_MINUM">   </td>
        </tr>
        <tr>
            <td> Pola BAK</td>
            <td> <input type="text" name="POLA_BAK"> x/hari </td>
            <td>  BAK Terakhir Jam</td>
            <td> <input type="text" name="JAM_TERAKHIR_BAK">  
                Warna BAK  <input type="text" name="WARNA_BAK"> </td>
        </tr>
        <tr>
            <td> Pola BAB</td>
            <td> <input type="text" name="POLA_BAB"> x/hari </td>
            <td>  BAB Terakhir Jam</td>
            <td> <input type="text" name="JAM_TERAKHIR_BAB">
            Karakteristik BAB  <input type="text" name="KARAKTER_BAB">  </td>
        </tr>
        
    </table>


    <table class="table-input" width="100%">
        <tr class="headrow">
           <th colspan="4">  DATA PSIKOLOGI & SOSIAL</th>
       </tr>
       <tr>
           <td width='20%'>Rumah Tinggal </td>
           <td width='30%'>
            <input type="radio" name="RUMAH_MILIK" class="radh" checked value="Sendiri" required  > Milik sendiri <br>
            <input type="radio" name="RUMAH_MILIK" class="radh" value="Kos" > Kos/Kontrak <br>
            <input type="radio" name="RUMAH_MILIK" class="radh" value="Lain" > Lainnya 
            <input type="text" id="formh" style="display: none;" name="RUMAH_MILIK2">  </td>
           <td width='20%'>Tinggal Bersama</td>
           <td width='30%'>
               
            <input type="radio" name="TINGGAL_BERSAMA" class="radt" checked value="Suami/Anak" > Suami/Anak <br>
            <input type="radio" name="TINGGAL_BERSAMA" class="radt" value="Sendiri" > Sendiri <br>
            <input type="radio" name="TINGGAL_BERSAMA" class="radt" value="Lain" > Lainnya 
            <input type="text" id="formt" style="display: none;" name="TINGGAL_BERSAMA2">
            </td>
       </tr>
       <tr>
           <td>Penanggung Jawab saat Darurat</td>
           <td><input type="text" name="PJ_DARURAT" size="10" required value="-" /> </td>
           <td>Hubungan </td>
           <td><input type="text" name="HUBUNGAN_PJ" size="10"  required value="-"/>  </td>
       </tr>
       <tr>
        <td>No HP Penanggung Jawab</td>
        <td><input type="number" name="NO_HP_PJ" size="10"  required value="-"/> </td>

    </tr>
      
        
        <tr>
            <td width='20%'>Status Emosional</td>
            <td width='30%'>
                <select name="FS_STATUS_PSIK">
                    <option value="1" onclick='document.getElementById("civstaton3").disabled = true'>Tenang</option>
                    <option value="2" onclick='document.getElementById("civstaton3").disabled = true'>Cemas</option>
                    <option value="3" onclick='document.getElementById("civstaton3").disabled = true'>Takut</option>
                    <option value="4" onclick='document.getElementById("civstaton3").disabled = true'>Marah</option>
                    <option value="5" onclick='document.getElementById("civstaton3").disabled = true'>Sedih</option>
                    <option VALUE="6" onclick='document.getElementById("civstaton3").disabled = false'>Lainnya</option>
                </select>
                <td>Aktifitas</td>
                <td>
                    <input type="radio" name="AKTIFITAS" required  checked value="Mandiri" >Mandiri
                    <input type="radio" name="AKTIFITAS" value="Dibantu">Dibantu
                </td>
               
            </td>
            </tr>
        
            
        <tr>
            <td> Sosial Support dari </td>
            <td>
                <input type="radio" name="SOSIAL_SUPPORT" required   class="rad" checked value="Suami" > Suami
                <input type="radio" name="SOSIAL_SUPPORT" class="rad" value="Orang Tua" > Orang Tua
                <input type="radio" name="SOSIAL_SUPPORT" class="rad" value="Mertua" > Mertua
                <input type="radio" name="SOSIAL_SUPPORT" class="rad" value="Lain" > Lainnya
                  <input type="text" id="form2" style="display: none;" name="SOSIAL_SUPPORT2">
            </td>
            <td>Penerimaan persalinan </td>
            <td>
                <input type="radio" name="PERSALINAN"  value="Diharapkan" checked>Diharapkan
                <input type="radio" name="PERSALINAN" value="Tidak">Tidak Diharapkan
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
               <input type="radio" name="KEADAAN_UMUM" required size="50" value="Baik" checked />Baik
               <input type="radio" name="KEADAAN_UMUM" size="50" value="Cukup"/>Cukup
               <input type="radio" name="KEADAAN_UMUM" size="50" value="Lemah"/>Lemah
            </td>
           <td width='20%'>  Kesadaran</td>
           <td width='30%'><input type="text" name="SADAR" size="50" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('vs')->value['FS_ANAMNESA'])===null||$tmp==='' ? '-' : $tmp);?>
" required value="-"/></td>
           
       </tr>
    
     
     
       <tr class="headrow">
        <th colspan="4">Vital Sign</th>
    </tr>
    <tr>
        <td width='20%'>Suhu</td>
        <td width='30%'><input type="text" name="S" size="10" required  value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['SUHU'];?>
"/></td>
        <td width='20%'>Nadi</td>
        <td width='30%'><input type="text" name="N" size="10" required value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['N'];?>
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
            <td width='20%'>Alat Bantu</td>
            <td width='30%'><input type="text" name="ALAT_BANTU" size="50" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('vs')->value['FS_ANAMNESA'])===null||$tmp==='' ? '-' : $tmp);?>
"/>  </td>
            <td>Berat Badan Sebelum Hamil</td>
            <td><input type="text" name="BBO" size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('vs')->value['FS_ANAMNESA'])===null||$tmp==='' ? '-' : $tmp);?>
"/> Kg</td>
       </tr>
 
        <tr class="headrow">
            <th colspan="4">Pemeriksaaan Fisik  </th>
        </tr>
        <tr> 
            <td>  Mata </td>
            <td>
                <input type="radio" name="MATA" value="Kabur" required>Pandangan Kabur
                <input type="radio" name="MATA" value="Tidak" checked> Tidak
            </td>
        </tr>
        <tr>
             <td>Skelera</td>
            <td>
                <input type="radio" name="SCLERA" required value="Ikterik">  Ikterik
                <input type="radio" name="SCLERA" value="Tidak"> Tidak
            </td>
          </tr>
          <tr>
              <td>Konjungtiva</td>
            <td>
                <input type="radio" name="KONJUNGTIVA" required value="Anemis">  Anemis
                <input type="radio" name="KONJUNGTIVA" value="Tidak"> Tidak
            </td>
        </tr>
        <tr> 
            <td>Kepala</td>
            <td>
                <input type="radio" name="KEPALA" required value="Normal" checked>   Normal
                <input type="radio" name="KEPALA" value="">   Kelainan
                <input type="text" name="KEPALA2" value=" ">   
             </td> </tr>
        <tr>  <td>Telinga</td>
            <td>
                <input type="radio" name="TELINGA" value="Normal" checked>   Normal
                <input type="radio" name="TELINGA" value="">   Kelainan
                <input type="text" name="TELINGA2" value=" ">    
             </td></tr>
        <tr>  <td>Hidung</td>
            <td>
                <input type="radio" name="HIDUNG" value="Normal" checked>   Normal
                <input type="radio" name="HIDUNG" value="">   Kelainan
                <input type="text" name="HIDUNG2" value=" ">    
 
             </td>
        </tr>
        <tr>  <td>Tenggorokan</td>
            <td>
                <input type="radio" name="TENGGOROKAN" value="Normal" checked>   Normal
                <input type="radio" name="TENGGOROKAN" value="">   Kelainan
                <input type="text" name="TENGGOROKAN2" value=" ">   
             </td>
        </tr>
        <tr>  <td>Leher</td>
            <td>
                <input type="radio" name="LEHER" value="Normal" checked>   Normal
                <input type="radio" name="LEHER" value="">   Kelainan
                <input type="text" name="LEHER2" value=" ">   
                 
             </td>
        </tr>
        <tr>  <td>Dada</td>
            <td>
                <input type="radio" name="DADA" value="Normal" checked>   Normal
                <input type="radio" name="DADA" value="">   Kelainan
                <input type="text" name="DADA2" value=" ">   
                 
 
             </td>
        </tr>
        <tr>  <td>Jantung</td>
            <td>
                <input type="radio" name="JANTUNG" value="Normal" checked>   Normal
                <input type="radio" name="JANTUNG" value="">   Kelainan
                <input type="text" name="JANTUNG2" value=" "> 
                 
             </td>
        </tr>
        <tr>  <td>Paru-Paru</td>
            <td>
                <input type="radio" name="PARU_PARU" value="Normal" checked>   Normal
                <input type="radio" name="PARU_PARU" value="">   Kelainan
                <input type="text" name="PARU_PARU2" value=" "> 
  
             </td>
        </tr>
        <tr>  <td>Abdomen</td>
            <td>
                <input type="radio" name="ABDOMEN" value="Normal" checked>   Normal
                <input type="radio" name="ABDOMEN" value="">   Kelainan
                <input type="text" name="ABDOMEN2" value=" "> 
   
             </td>
        </tr>
        <tr>  <td>Anggota Gerak Atas</td>
            <td>
                <input type="radio" name="BADAN_GERAK_ATAS" value="Normal" checked>   Normal
                <input type="radio" name="BADAN_GERAK_ATAS" value="">   Kelainan
                <input type="text" name="BADAN_GERAK_ATAS2" value=" "> 
 
             </td>
        </tr>
        <tr>  <td>Anggota Gerak Bawah</td>
            <td>
                <input type="radio" name="BADAN_GERAK_BAWAH" value="Normal" checked>   Normal
                <input type="radio" name="BADAN_GERAK_BAWAH" value="">   Kelainan
                <input type="text" name="BADAN_GERAK_BAWAH2" value=" "> 
 
 
             </td>
        </tr>
        </table>

        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="4">  Pemeriksaan Khusus</th>
            </tr>
            <tr>
                <td rowspan="4">Dada</td>
                <td> <input type="radio" name="CEK_DADA" value="Mammae Simetris">  Mammae Simetris </td>
                <td> <input type="radio" name="CEK_DADA" value="Mammae Asimetris">  Mammae ASimetris </td>
                <td> <input type="radio" name="CEK_DADA" value="Puting Menonjol">    Puting Menonjol 
                 
            <tr> 
                 <td>
                      <input type="radio" name="CEK_DADA" value="Puting Tidak Menonjol">    Puting Tidak Menonjol </td>
                <td> 
                    <input type="radio" name="CEK_DADA" value="Aerola Hiperpigmentasi"> Aerola Hiperpigmentasi </td>
                <td> 
                    <input type="radio" name="CEK_DADA" value="Kolostrum"> Kolostrum
                    </td>  
                    
                </tr>
              <tr>
                    <td > </td>
               <tr> 
               <tr> 
                   <td>Inspeksi Abdomen</td>
                    <td colspan="3"> <input type="radio" name="INSPEKSI_ABDOMEN" value="Luka Bekas OP" >  Luka Bekas OP  
                        <input type="radio" name="INSPEKSI_ABDOMEN" value="Linea Alba"> Linea Alba  
                        <input type="radio" name="INSPEKSI_ABDOMEN" value="Linea Nigra">   Linea Nigra  
                            <input type="radio" name="INSPEKSI_ABDOMEN" value="Striae Lividae">     Striae Lividae  
                          <input type="radio" name="INSPEKSI_ABDOMEN" value="Striae Albican"> Striae Albican  
                          <!-- <input type="hidden" name="INSPEKSI_ABDOMEN" value="">   Striae Albican  -->
                        </td>

                        
                    </tr>
            <tr> 
                        <td>Palpasi Abdomen</td></tr>
                <tr> 
                         <td>Leopod I     </td>
                         <td> <input type="text" name="LEOPOD_1"  >    cm </td></tr>
                <tr> 
                         <td>Leopod II      </td>
                         <td>
                            <input type="radio" name="LEOPOD_2" value="Punggung Kanan">  Punggung Kanan 
                            <input type="radio" name="LEOPOD_2" value="Punggung Kiri">   Punggung Kiri
                            <!-- <input type="hidden" name="LEOPOD_2"  >     -->
                           </td>
                    </tr>
            <tr> 
                   <td>Leopod III      </td>
                           <td>
                              <input type="radio" name="LEOPOD_3" value="Kepala">    Kepala 
                              <input type="radio" name="LEOPOD_3" value="Bokong">     Bokong
                            <!-- <input type="hidden" name="LEOPOD_3"  >     -->

                             </td>
                         </tr>
          <tr> 
                <td>Leopod IV     </td>
                                    <td>
                                       <input type="radio" name="LEOPOD_4" value="Floating">    Floating 
                                       <input type="radio" name="LEOPOD_4" value="Enganged">     Enganged
                                   <!-- <input type="hidden" name="LEOPOD_4"  >     -->

                                      </td>
                                  </tr>
          <tr>
              <td>Auskultasi</td>
              <td colspan="3">
                  <input type="radio" name="AUSKULTASI" value="Teratur">Teratur
                  <input type="radio" name="AUSKULTASI" value="Tidak">Tidak Teratur  
                  <!-- <input type="hidden" name="AUSKULTASI"  >     -->

                <input type="text" name=" DURASI_AUSKULTASI"  >kali/menit
              </td>
              
          </tr>
          <tr>
            <td>Kontraksi</td>
            <td colspan="3">
                <input type="radio" name="KONTRAKSI" value="Kuat">Kuat
                <input type="radio" name="KONTRAKSI" value="Sedang">Sedang
                <input type="radio" name="KONTRAKSI" value="Lemah">Lemah
                <!-- <input type="hidden" name="KONTRAKSI"  >   -->

              <input type="text" name=" DURASI_KONTRAKSI"  >kali/menit
            </td>
        </tr>

        <tr>
            <td>Inspeksi Ano Genital</td>
            <td>
              <input type="text" name="INSPEKSI_ANO_GENITAS"  >
            </td>
        </tr>
        <tr>
            <td> Vagina Toucher</td>
            <td>
              <input type="text" name="VAGINA_TOUCHER"  >
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
            <td>   <select name="radiologi[]" multiple id="radiologi" style="width:200px">
                <option></option>
            </select></td>
        </tr>

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
            <select name="FS_FUNGSIONAL5" id="op5" class="select2" style="width: 190px;">
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
            <select name="FS_FUNGSIONAL6" id="op6" class="select2" style="width: 190px;">
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
            <select name="FS_FUNGSIONAL7" id="op7" class="select2" style="width: 190px;">
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
            <select name="FS_FUNGSIONAL8" id="op8" class="select2" style="width: 190px;">
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
            <select name="FS_FUNGSIONAL9" id="op9" class="select2" style="width: 190px;">
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
            <select name="FS_FUNGSIONAL10" id="op10" class="select2" style="width: 190px;">
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
        <th colspan="4">ANALISIS</th>
    </tr>
    <tr>
        <td width='20%'>Masalah Kebidanan</td>
        <td width='30%' colspan="3">
            <input type="text" style="width: 600px;" name="MASALAH_KEBIDANAN">

        </td>
    </tr>
    <tr>
        <td width='20%'>Diagnosa Kebidanan</td>
        <td width='30%' colspan="3">
           <input type="text" name="DIAGNOSA"  style="width: 600px;">
        </td> 
    </tr>
    <tr>
        <td width='20%'> Rencana Tindakan Kebidanan</td>
        <td width='30%' colspan="3">
           <input type="text" name="RENCANA_TINDAKAN"  style="width: 600px;">
        </td> 
    </tr>
   


    
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
                    <option value="1" required <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENCIUMAN']=='1'){?> selected="" <?php }?>>Normal</option>
                    <option value="2" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENCIUMAN']=='2'){?> selected="" <?php }?>>Tidak Normal</option>

                </select>
            </td>
            <td>Pendengaran</td>
            <td>
                <select name="FS_PENDENGARAN" id="surat_dari" class="select2" required style="width: 190px;">
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
            <th colspan="4">     Hasil Penanganan</th>
        </tr>
        <tr>
            <td>
                <select name="HASIL" id="surat_dari" class="select2" style="width: 190px;">
                    <option value="0">--Pilih Cara Pulang--</option>
                    <option value="3">Rawat Inap</option>
                    <option value="0">Pulang</option>
                    <option value="9">Menolak Rawat</option>
                    
                    <option value="4">Rujuk</option> 
                    <option value="10">Meninggal</option>  
                    <option value="11">Lain lain</option>
                </select>
            </td>
            <td>Jama Selesai diperiksa</td>
            <td><input type="time" name="JAM_SELESAI" id="jam_keperawatan" required></td>
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

const inputWaktu = document.getElementById('jam_keperawatan');
  
  // Mengatur waktu awal
  updateTime();

  // Fungsi untuk memperbarui waktu pada input
  function updateTime() {
    const waktuSekarang = new Date();
    const jam = waktuSekarang.getHours();
    const menit = waktuSekarang.getMinutes();
    const detik = waktuSekarang.getSeconds();
    const waktuDefault = jam.toString().padStart(2, '0') + ':' + menit.toString().padStart(2, '0');
    inputWaktu.value = waktuDefault;
  }

  // Memperbarui waktu setiap menit
  setInterval(updateTime, 1000);

$(function(){
      $(":radio.rad").click(function(){
        $("#form2").hide(); 

        if($(this).val() == "Lain"){
          $("#form2").show(); 
        }else{
          $("#form2").hide(); 
        }
      });

      $(":radio.radt").click(function(){
        $("#formt").hide(); 

        if($(this).val() == "Lain"){
          $("#formt").show(); 
        }else {
          $("#formt").hide(); 
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

        if($(this).val() == "Lain"){
          $("#formh").show(); 
        }else {
          $("#formh").hide(); 
        }
      });

    });






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
 
<script type="text/javascript">
    $(document).ready(function () {
        scoree();
        
        $("#j1").change(function () {
            var jc = $(this).val();
            $("#nj1").html(jc);
            scoree();
        });
        $("#j2").change(function () {
            var jc = $(this).val();
            $("#nj2").html(jc);
            scoree();
        }); 
        $("#j3").change(function () {
            var jc = $(this).val();
            $("#nj3").html(jc);
            scoree();
        }); 
    
        $("#j4").change(function () {
            var jc = $(this).val();
            $("#nj4").html(jc);
            scoree();
        }); 
        $("#j5").change(function () {
            var jc = $(this).val();
            $("#nj5").html(jc);
            scoree();
        }); 
        $("#j6").change(function () {
            var jc = $(this).val();
            $("#nj6").html(jc);
            scoree();
        }); 
        $("#j7").change(function () {
            var jc = $(this).val();
            $("#nj7").html(jc);
            scoree();
        }); 
    });
    
    function scoree() {
        var jc = parseInt($("#nj1").text()) + parseInt($("#nj2").text()) + parseInt($("#nj3").text()) + parseInt($("#nj4").text()) + parseInt($("#nj5").text()) + parseInt($("#nj6").text()) + parseInt($("#nj7").text());
        // $("#totalsc").html(jc);
        if (jc >= 0 && jc <= 24) {
            $("#rjtkesimpuland").html("RISIKO RENDAH");
        } else if (jc >= 25 && jc <= 45) {
            $("#rjtkesimpuland").html("RISIKO SEDANG");
        } else if (jc > 45) {
            $("#rjtkesimpuland").html("RISIKO TINGGI");
        }
    }
    
    
</script>


             <script type="text/javascript">
                $(document).ready(function() {
        // chain select
        // tembusan
        var user = $("#user").val();
                $('#radiologi').select2('data', null);
                $('#radiologi').select2('data', null);
                $("#radiologi").removeAttr("disabled");
                jQuery("#radiologi").html('');
                $.ajax({
                type: "POST", 
                        url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/list_pemeriksaan_rad/');?>
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
                                jQuery("#radiologi").html(showData);
                        }
                });
                //tags
                $("#radiologi").select2({});
        });</script>

             <script type="text/javascript">
                $(document).ready(function() {


            $("#rlab").select2({});

            $('#rlab').select2('data', null);
            $('#rlab').select2('data', null);
            $("#rlab").removeAttr("disabled");
            jQuery("#rlab").html('');
            $.ajax({
            type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/list_pemeriksaan_lab/');?>
",
                    data: "user=" + user,
                    dataType: 'json',
                    success: function(data) {
                    var showData;
                            jQuery.each(data, function(index, result) {

                            if (result.value == 0) {
                            } else {
                                console.log(result);
                            showData += "<option value='" + result.value + "'>" + result.label + "</option>";
                            }
                            })
                            jQuery("#rlab").html(showData);
                    }
            });
             $("#rlab").select2({});
        });</script>