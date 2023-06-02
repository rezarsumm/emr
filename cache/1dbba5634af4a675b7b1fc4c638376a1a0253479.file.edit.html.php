<?php /* Smarty version Smarty-3.0.7, created on 2023-06-02 14:42:23
         compiled from "application/views\igd/bidan/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:1106564799d5fd47012-88396839%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1dbba5634af4a675b7b1fc4c638376a1a0253479' => 
    array (
      0 => 'application/views\\igd/bidan/edit.html',
      1 => 1685691742,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1106564799d5fd47012-88396839',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'F:\xampp\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?> 

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
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('igd/bidan/edit_process');?>
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
            <tr>
               <td>Cara Masuk</td>
               <td>  <input type="radio" name="CARA_MASUK" <?php if ($_smarty_tpl->getVariable('data')->value['CARA_MASUK']=='Jalan'){?> checked <?php }?>  value="Jalan"  /> Jalan
                <input type="radio" name="CARA_MASUK" <?php if ($_smarty_tpl->getVariable('data')->value['CARA_MASUK']=='Brandkar'){?> checked <?php }?> value="Brandkar"  /> Brandkar 
                <input type="radio" name="CARA_MASUK" <?php if ($_smarty_tpl->getVariable('data')->value['CARA_MASUK']=='Kursi Roda'){?> checked <?php }?> value="Kursi Roda"  /> Kursi Roda 
                <input type="radio" name="CARA_MASUK" <?php if ($_smarty_tpl->getVariable('data')->value['CARA_MASUK']=='Digendong'){?> checked <?php }?> value="Digendong"  /> Digendong</td>
                 </td></tr>  
             <tr>
                <td>Rujukan Dari</td>
                <td> <input type="text" name="RUJUKAN" size="40" value="<?php echo $_smarty_tpl->getVariable('data')->value['RUJUKAN'];?>
">  </td></tr>  
            <!-- <tr>
               <td>Asal Masuk</td>
               <td> <input type="text" name="ASAL_MASUK" size="40" value="<?php echo $_smarty_tpl->getVariable('data')->value['ALASAN_DATANG'];?>
" >  </td>
            </tr>   -->
           
            <tr>
                <td> Membawa obat sendiri</td>
                <td>  
                    <input type="radio" name="BAWA_OBAT" <?php if ($_smarty_tpl->getVariable('data')->value['BAWA_OBAT']=='Ya'){?> checked <?php }?> value="BAWA_OBAT">Ya    
                    <input type="radio" name="BAWA_OBAT" <?php if ($_smarty_tpl->getVariable('data')->value['BAWA_OBAT']=='Tidak'){?> checked <?php }?>  value="Tidak">Tidak    
                     <BR>
                  Bila iya,  Diberikan ke petugas 
                    <input type="radio" name="BERI_OBAT" <?php if ($_smarty_tpl->getVariable('data')->value['BERI_OBAT_KE_PETUGAS']=='Ya'){?> checked <?php }?> value="Ya">Ya    
                    <input type="radio" name="BERI_OBAT" <?php if ($_smarty_tpl->getVariable('data')->value['BERI_OBAT_KE_PETUGAS']=='Tidak'){?> checked <?php }?> value="Tidak">Tidak    
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
            <td width='30%'><input type="text" name="NAMA_SUAMI" value="<?php echo $_smarty_tpl->getVariable('ps')->value['NAMA_SUAMI'];?>
" size="50"  /></td>
            <td width='20%'>Tanggal Lahir </td>
            <td width='30%'><input type="date" name="TGL_LAHIR_SUAMI" value="<?php echo $_smarty_tpl->getVariable('ps')->value['TGL_LAHIR_SUAMI'];?>
" size="10"  /></td>
        </tr>
        <tr>
            
            <td width='20%'>  Pekerjaan </td>
            <td width='30%'><input type="text" name="PEKERJAAN_SUAMI" value="<?php echo $_smarty_tpl->getVariable('ps')->value['PEKERJAAN_SUAMI'];?>
" size="50"  /> </td>
            <td width='20%'>Agama</td>
            <td width='30%'> 
                <input type="radio" name="AGAMA_SUAMI" <?php if ($_smarty_tpl->getVariable('ps')->value['AGAMA_SUAMI']=='Islam'){?> checked <?php }?> value="Islam"> Islam
                <input type="radio" name="AGAMA_SUAMI" <?php if ($_smarty_tpl->getVariable('ps')->value['AGAMA_SUAMI']=='Kristen'){?> checked <?php }?> value="Kristen"> Kristen
                <input type="radio" name="AGAMA_SUAMI" <?php if ($_smarty_tpl->getVariable('ps')->value['AGAMA_SUAMI']=='Katolik'){?> checked <?php }?> value="Katolik"> Katolik
                <input type="radio" name="AGAMA_SUAMI" <?php if ($_smarty_tpl->getVariable('ps')->value['AGAMA_SUAMI']=='Budha'){?> checked <?php }?> value="Budha"> Budha
                <input type="radio" name="AGAMA_SUAMI" <?php if ($_smarty_tpl->getVariable('ps')->value['AGAMA_SUAMI']=='Hindu'){?> checked <?php }?> value="Hindu"> Hindu
                <input type="radio" name="AGAMA_SUAMI" <?php if ($_smarty_tpl->getVariable('ps')->value['AGAMA_SUAMI']=='Khonghucu'){?> checked <?php }?>  value="Khonghucu"> Khonghucu
            </td>
        </tr>
        <tr>
            <td width='20%'>Pendidikan</td>
            <td width='30%'><input type="text" name="PENDIDIKAN_SUAMI" value="<?php echo $_smarty_tpl->getVariable('ps')->value['PENDIDIKAN_SUAMI'];?>
" size="50"  /></td>
           
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
                    <input type="text" name="PENDIDIKAN_PASIEN" value="<?php echo $_smarty_tpl->getVariable('data')->value['PENDIDIKAN_PASIEN'];?>
" size="50"  />
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
                    <input type="text" name="JOB_PASIEN" value="<?php echo $_smarty_tpl->getVariable('data')->value['JOB_PASIEN'];?>
" size="50"  />
                </td></TR>
            
        </table>


       <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">I. SUBYEKTIF</th> 
        </tr>
        <tr>
            <td>Keluhan Utama</td>
            <td colspan="3"><textarea style="width: 600px;" name="FS_ANAMNESA" value="<?php echo $_smarty_tpl->getVariable('data')->value['FS_ANAMNESA'];?>
"><?php echo $_smarty_tpl->getVariable('data')->value['FS_ANAMNESA'];?>
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
            <td width='30%'><input type="text" name="FS_HAID_MEN" value="<?php echo $_smarty_tpl->getVariable('data')->value['FS_HAID_MEN'];?>
" size="10"  /></td>
            <td width='20%'>Siklus</td>
            <td width='30%'>
                <input type="radio" name="FS_HAID_SIKLUS"  <?php if ($_smarty_tpl->getVariable('data')->value['FS_HAID_SIKLUS']=='Teratur'){?> checked <?php }?> value="Teratur">Teratur
                <input type="radio" name="FS_HAID_SIKLUS" <?php if ($_smarty_tpl->getVariable('data')->value['FS_HAID_SIKLUS']=='Tidak'){?> checked <?php }?> value="Tidak"> Tidak
            </td>
        </tr>
        <tr>
            <td>Lama Haid</td>
            <td><input type="text" name="FS_HAID_LAMA" size="10"  value="<?php echo $_smarty_tpl->getVariable('data')->value['FS_HAID_LAMA'];?>
"/> Hari</td>
            <td>HPPT</td>
            <td><input type="text" name="FS_HAID_HPHT" size="10"  value="<?php echo $_smarty_tpl->getVariable('data')->value['FS_HAID_HPHT'];?>
"/>  </td>
        </tr>
        <tr>
            <td>  HPL</td>
            <td><input type="text" name="FS_HAID_HPL" size="10" value="<?php echo $_smarty_tpl->getVariable('data')->value['FS_HAID_HPL'];?>
" />  </td>
            <td>Keluhan</td>
            <td><input type="text" name="FS_HAID_KELUHAN" size="10" value="<?php echo $_smarty_tpl->getVariable('data')->value['FS_HAID_KELUHAN'];?>
" />  </td>
        </tr>
        <tr class="headrow">
            <th colspan="4">RIWAYAT PENYAKIT</th>
        </tr>
        <tr> 
            <td>  Riwayat penyakit dahulu </td>
             <td colspan="3"> 
               <input style="width: 600px;" type="text" name="FS_RIW_PENYAKIT_DAHULU" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('data')->value['FS_RIW_PENYAKIT_DAHULU'])===null||$tmp==='' ? '-' : $tmp);?>
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
                   <input type="text" name="FS_ASMA_MULAI"  value="<?php echo $_smarty_tpl->getVariable('data')->value['FS_ASMA_MULAI'];?>
"  size="32">
                </td>
                <td width='20%'>Dalam Terapi</td>
                <td width='30%'>
                    <input type="text" name="FS_ASMA_TERAPI" value="<?php echo $_smarty_tpl->getVariable('data')->value['FS_ASMA_TERAPI'];?>
" size="32">
                
                </td>
            </tr>
            <tr>
                <td width='20%'>Jantung</td>
                <td width='30%'> Mulai Tahun 
                   <input type="text" name="FS_JANTUNG_MULAI"  value="<?php echo $_smarty_tpl->getVariable('data')->value['FS_JANTUNG_MULAI'];?>
" size="32">
                </td>
                <td width='20%'>Dalam Terapi</td>
                <td width='30%'>
                    <input type="text" name="FS_JANTUNG_TERAPI" value="<?php echo $_smarty_tpl->getVariable('data')->value['FS_JANTUNG_TERAPI'];?>
"  size="32">
                
                </td>
            </tr>
            <tr>
                <td width='20%'>Diabetes</td>
                <td width='30%'> Mulai Tahun 
                   <input type="text" name="FS_DIABETES_MULAI"  value="<?php echo $_smarty_tpl->getVariable('data')->value['FS_DIABETES_MULAI'];?>
"  size="32">
                </td>
                <td width='20%'>Dalam Terapi</td>
                <td width='30%'>
                    <input type="text" name="FS_DIABETES_TERAPI" value="<?php echo $_smarty_tpl->getVariable('data')->value['FS_DIABETES_TERAPI'];?>
" size="32">
                
                </td>
            </tr>
            <tr>
                <td width='20%'>Hipertensi</td>
                <td width='30%'> Mulai Tahun 
                   <input type="text" name="FS_HIPERTENSI_MULAI" value="<?php echo $_smarty_tpl->getVariable('data')->value['FS_HIPERTENSI_MULAI'];?>
"  size="32">
                </td>
                <td width='20%'>Dalam Terapi</td>
                <td width='30%'>
                    <input type="text" name="FS_HIPERTENSI_TERAPI" value="<?php echo $_smarty_tpl->getVariable('data')->value['FS_HIPERTENSI_TERAPI'];?>
" size="32">
                
                </td>
            </tr>
            <tr>
                <td width='20%'>Penyakit Lain</td>
                <td width='30%'>  
                   <input type="text" name="FS_SAKIT_LAIN" value="<?php echo $_smarty_tpl->getVariable('data')->value['FS_SAKIT_LAIN'];?>
"  size="52">
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
                <input type="text" name="FS_RIW_PENYAKIT_DAHULU2" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('data')->value['FS_RIW_PENYAKIT_DAHULU2'])===null||$tmp==='' ? '-' : $tmp);?>
" size="32">
            
            </td>
        </tr>
        <tr class="headrow">
            <th colspan="4">   </th>
        </tr>
        <tr>
           
            <td width='20%'>Riwayat Gynekologi</td>
            <td colspan="3"> 
                <textarea cols="100" name="FS_RIWAYAT_GYNEKOLOGI" ><?php echo $_smarty_tpl->getVariable('data')->value['FS_RIWAYAT_GYNEKOLOGI'];?>
</textarea> 
            </td>
        </tr>

    
     
        <tr class="headrow">
            <th colspan="4">Riwayat KB</th>
        </tr>
        <tr>
            <td width='20%'>Riwayat KB (metode, lama) </td>
            <td width='30%'>  
                <textarea cols="50" name="FS_RIWAYAT_KB"><?php echo $_smarty_tpl->getVariable('data')->value['FS_RIWAYAT_KB'];?>
</textarea>  
            </td>
            <td width='20%'>Riwayat Komplikasi KB</td>
            <td width='30%'>
                <textarea cols="50" name="FS_RIWAYAT_KOMPLIKASI_KB"><?php echo $_smarty_tpl->getVariable('data')->value['FS_RIWAYAT_KOMPLIKASI_KB'];?>
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
                    <input type="text" name="FS_ALERGI" size="35" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('data')->value['FS_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
">
                    <em style="color:red">* Wajib Diisi</em>
                </td>
                <td width='20%'>Reaksi Alergi</td>
                <td width='30%'>
                    <input type="text" name="FS_REAK_ALERGI" size="35" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('data')->value['FS_REAK_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
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
            <td> <input type="text" name="POLA_MAKAN" value="<?php echo $_smarty_tpl->getVariable('data')->value['POLA_MAKAN'];?>
"> x/hari </td>
            <td>  Makan Terakhir Jam</td>
            <td> <input type="text" name="JAM_TERAKHIR_MAKAN" value="<?php echo $_smarty_tpl->getVariable('data')->value['JAM_TERAKHIR_MAKAN'];?>
">   </td>
        </tr>
        <tr>
            <td> Pola Minum</td>
            <td> <input type="text" name="POLA_MINUM" value="<?php echo $_smarty_tpl->getVariable('data')->value['POLA_MINUM'];?>
"> cc/hari </td>
            <td>  Minum Terakhir Jam</td>
            <td> <input type="text" name="JAM_TERAKHIR_MINUM" value="<?php echo $_smarty_tpl->getVariable('data')->value['JAM_TERAKHIR_MINUM'];?>
">   </td>
        </tr>
        <tr>
            <td> Pola BAK</td>
            <td> <input type="text" name="POLA_BAK" value="<?php echo $_smarty_tpl->getVariable('data')->value['POLA_BAK'];?>
"> x/hari </td>
            <td>  BAK Terakhir Jam</td>
            <td> <input type="text" name="JAM_TERAKHIR_BAK" value="<?php echo $_smarty_tpl->getVariable('data')->value['JAM_TERAKHIR_BAK'];?>
">  
                Warna BAK  <input type="text" name="WARNA_BAK" value="<?php echo $_smarty_tpl->getVariable('data')->value['WARNA_BAK'];?>
" >
             </td>
        </tr>
        <tr>
            <td> Pola BAB</td>
            <td> <input type="text" name="POLA_BAB" value="<?php echo $_smarty_tpl->getVariable('data')->value['POLA_BAB'];?>
"> x/hari </td>
            <td>  BAB Terakhir Jam</td>
            <td> <input type="text" name="JAM_TERAKHIR_BAB" value="<?php echo $_smarty_tpl->getVariable('data')->value['JAM_TERAKHIR_BAB'];?>
"> 
                Karakteristik BAB  <input type="text" name="KARAKTER_BAB" value="<?php echo $_smarty_tpl->getVariable('data')->value['KARAKTER_BAB'];?>
">  </td>

        </tr>
    </table>


    <table class="table-input" width="100%">
        <tr class="headrow">
           <th colspan="4">  DATA PSIKOLOGI & SOSIAL</th>
       </tr>
       <tr>
           <td width='20%'>Rumah Tinggal </td>
           <td width='30%'>
            <input type="radio" name="RUMAH_MILIK" <?php if ($_smarty_tpl->getVariable('data')->value['RUMAH_MILIK']=='Sendiri'){?> checked <?php }?> class="radh" value="Sendiri" > Milik sendiri <br>
            <input type="radio" name="RUMAH_MILIK" <?php if ($_smarty_tpl->getVariable('data')->value['RUMAH_MILIK']=='Kos'){?> checked <?php }?>  class="radh" value="Kos" > Kos/Kontrak <br>
            <input type="radio" name="RUMAH_MILIK" <?php if ($_smarty_tpl->getVariable('data')->value['RUMAH_MILIK']!='Sendiri'){?> checked <?php }?> class="radh" value="Lain" > Lainnya 
            <input type="text" id="formh" <?php if ($_smarty_tpl->getVariable('data')->value['RUMAH_MILIK']!='Sendiri'){?>  style="display: show;" <?php }?> style="display: none;" name="RUMAH_MILIK2" value="<?php echo $_smarty_tpl->getVariable('data')->value['RUMAH_MILIK'];?>
">  </td>
           <td width='20%'>Tinggal Bersama</td>
           <td width='30%'>
               
            <input type="radio" name="TINGGAL_BERSAMA" <?php if ($_smarty_tpl->getVariable('data')->value['TINGGAL_BERSAMA']=='Suami/Anak'){?> checked <?php }?> class="radt" value="Suami/Anak" > Suami/Anak <br>
            <input type="radio" name="TINGGAL_BERSAMA"  <?php if ($_smarty_tpl->getVariable('data')->value['TINGGAL_BERSAMA']=='Sendiri'){?> checked <?php }?> class="radt" value="Sendiri" > Sendiri <br>
            <input type="radio" name="TINGGAL_BERSAMA" <?php if ($_smarty_tpl->getVariable('data')->value['TINGGAL_BERSAMA']!='Sendiri'){?> checked <?php }?> class="radt" value="Lain" > Lainnya 
            <input type="text" id="formt" <?php if ($_smarty_tpl->getVariable('data')->value['TINGGAL_BERSAMA']!='Sendiri'){?> style="display: show;" <?php }?>  value="<?php echo $_smarty_tpl->getVariable('data')->value['TINGGAL_BERSAMA'];?>
"  style="display: none;" name="TINGGAL_BERSAMA2">
            </td>
       </tr>
       <tr>
           <td>Penanggung Jawab saat Darurat</td>
           <td><input type="text" name="PJ_DARURAT" size="10"  value="<?php echo $_smarty_tpl->getVariable('data')->value['PJ_DARURAT'];?>
"/> </td>
           <td>Hubungan </td>
           <td><input type="text" name="HUBUNGAN_PJ" size="10" value="<?php echo $_smarty_tpl->getVariable('data')->value['HUBUNGAN_PJ'];?>
"/>  </td>
       </tr>
       <tr>
        <td>No HP Penanggung Jawab</td>
        <td><input type="number" name="NO_HP_PJ" size="10"  value="<?php echo $_smarty_tpl->getVariable('data')->value['NO_HP_PJ'];?>
"/> </td>

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
                    <input type="radio" name="AKTIFITAS" <?php if ($_smarty_tpl->getVariable('data')->value['AKTIFITAS']=='Mandiri'){?> checked <?php }?> value="Mandiri" >Mandiri
                    <input type="radio" name="AKTIFITAS" <?php if ($_smarty_tpl->getVariable('data')->value['AKTIFITAS']=='Dibantu'){?> checked <?php }?> value="Dibantu">Dibantu
                </td>
               
            </td>
            </tr>
        
            
        <tr>
            <td> Sosial Support dari </td>
            <td>
                <input type="radio" name="SOSIAL_SUPPORT" <?php if ($_smarty_tpl->getVariable('data')->value['SOSIAL_SUPPORT']=='Suami'){?> checked <?php }?> class="rad" value="Suami" > Suami
                <input type="radio" name="SOSIAL_SUPPORT" <?php if ($_smarty_tpl->getVariable('data')->value['SOSIAL_SUPPORT']=='Orang Tua'){?> checked <?php }?>  class="rad" value="Orang Tua" > Orang Tua
                <input type="radio" name="SOSIAL_SUPPORT" <?php if ($_smarty_tpl->getVariable('data')->value['SOSIAL_SUPPORT']=='Mertua'){?> checked <?php }?> class="rad" value="Mertua" > Mertua
                <input type="radio" name="SOSIAL_SUPPORT" <?php if ($_smarty_tpl->getVariable('data')->value['SOSIAL_SUPPORT']!='Suami'){?> checked <?php }?> class="rad" value="Lain" > Lainnya
                  <input type="text" id="form2" <?php if ($_smarty_tpl->getVariable('data')->value['SOSIAL_SUPPORT']!='Suami'){?> value="<?php echo $_smarty_tpl->getVariable('data')->value['SOSIAL_SUPPORT'];?>
" style="display: show;" <?php }?> style="display: none;" name="SOSIAL_SUPPORT2">
            </td>
            <td>Penerimaan persalinan </td>
            <td>
                <input type="radio" name="PERSALINAN" <?php if ($_smarty_tpl->getVariable('data')->value['PERSALINAN']=='Diharapkan'){?> checked <?php }?> value="Diharapkan" >Diharapkan
                <input type="radio" name="PERSALINAN" <?php if ($_smarty_tpl->getVariable('data')->value['PERSALINAN']=='Tidak'){?> checked <?php }?> value="Tidak">Tidak Diharapkan
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
               <input type="radio" name="KEADAAN_UMUM" <?php if ($_smarty_tpl->getVariable('data')->value['KEADAAN_UMUM']=='Baik'){?> checked <?php }?>  size="50" value="Baik"/>Baik
               <input type="radio" name="KEADAAN_UMUM" <?php if ($_smarty_tpl->getVariable('data')->value['KEADAAN_UMUM']=='Cukup'){?> checked <?php }?> size="50" value="Cukup"/>Cukup
               <input type="radio" name="KEADAAN_UMUM" <?php if ($_smarty_tpl->getVariable('data')->value['KEADAAN_UMUM']=='Lemah'){?> checked <?php }?> size="50" value="Lemah"/>Lemah
            </td>
           <td width='20%'>  Kesadaran</td>
           <td width='30%'><input type="text" name="SADAR" size="50" value="<?php echo $_smarty_tpl->getVariable('data')->value['SADAR'];?>
"/></td>
           
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
            <td width='20%'>Alat Bantu</td>
            <td width='30%'><input type="text" name="ALAT_BANTU" size="50" value="<?php echo $_smarty_tpl->getVariable('data')->value['ALAT_BANTU'];?>
"/>  </td>
            <td>Berat Badan Sebelum Hamil</td>
            <td><input type="text" name="BBO" size="10" value="<?php echo $_smarty_tpl->getVariable('data')->value['ALAT_BANTU'];?>
"/> Kg</td>
       </tr>
 
        <tr class="headrow">
            <th colspan="4">Pemeriksaaan Fisik  </th>
        </tr>
        <tr> 
            <td>  Mata </td>
            <td>
                <input type="radio" name="MATA" <?php if ($_smarty_tpl->getVariable('data')->value['MATA']=='Kabur'){?> checked <?php }?> value="Kabur">Pandangan Kabur
                <input type="radio" name="MATA" <?php if ($_smarty_tpl->getVariable('data')->value['MATA']=='Tidak'){?> checked <?php }?> value="Tidak"> Tidak
            </td>
        </tr>
        <tr>
             <td>Skelera</td>
            <td>
                <input type="radio" name="SCLERA" <?php if ($_smarty_tpl->getVariable('data')->value['SCLERA']=='Ikterik'){?> checked <?php }?> value="Ikterik">  Ikterik
                <input type="radio" name="SCLERA" <?php if ($_smarty_tpl->getVariable('data')->value['SCLERA']=='Tidak'){?> checked <?php }?> value="Tidak"> Tidak
            </td>
          </tr>
          <tr>
              <td>Konjungtiva</td>
            <td>
                <input type="radio" name="KONJUNGTIVA" <?php if ($_smarty_tpl->getVariable('data')->value['KONJUNGTIVA']=='Anemis'){?> checked <?php }?> value="Anemis">  Anemis
                <input type="radio" name="KONJUNGTIVA" <?php if ($_smarty_tpl->getVariable('data')->value['KONJUNGTIVA']=='Tidak'){?> checked <?php }?> value="Tidak"> Tidak
            </td>
        </tr>
        <tr> 
            <td>Kepala</td>
            <td>
                <input type="radio" name="KEPALA" <?php if ($_smarty_tpl->getVariable('data')->value['KEPALA']=='Normal'){?> checked <?php }?> value="Normal" checked>   Normal
                <input type="radio" name="KEPALA" <?php if ($_smarty_tpl->getVariable('data')->value['KEPALA']!='Normal'){?> checked <?php }?> value="">   Kelainan
                <input type="text" name="KEPALA2"  value="<?php echo $_smarty_tpl->getVariable('data')->value['KEPALA'];?>
">   
             </td> </tr>
        <tr>  <td>Telinga</td>
            <td>
                <input type="radio" name="TELINGA" <?php if ($_smarty_tpl->getVariable('data')->value['TELINGA']=='Normal'){?> checked <?php }?> value="Normal" checked>   Normal
                <input type="radio" name="TELINGA" <?php if ($_smarty_tpl->getVariable('data')->value['TELINGA']!='Normal'){?> checked <?php }?>  value="">   Kelainan
                <input type="text" name="TELINGA2" value="<?php echo $_smarty_tpl->getVariable('data')->value['TELINGA'];?>
">    
             </td></tr>
        <tr>  <td>Hidung</td>
            <td>
                <input type="radio" name="HIDUNG" <?php if ($_smarty_tpl->getVariable('data')->value['HIDUNG']=='Normal'){?> checked <?php }?> value="Normal" checked>   Normal
                <input type="radio" name="HIDUNG" <?php if ($_smarty_tpl->getVariable('data')->value['HIDUNG']!='Normal'){?> checked <?php }?> value="">   Kelainan
                <input type="text" name="HIDUNG2" value="<?php echo $_smarty_tpl->getVariable('data')->value['HIDUNG'];?>
">    
 
             </td>
        </tr>
        <tr>  <td>Tenggorokan</td>
            <td>
                <input type="radio" name="TENGGOROKAN" <?php if ($_smarty_tpl->getVariable('data')->value['TENGGOROKAN']=='Normal'){?> checked <?php }?> value="Normal" checked>   Normal
                <input type="radio" name="TENGGOROKAN" <?php if ($_smarty_tpl->getVariable('data')->value['TENGGOROKAN']!='Normal'){?> checked <?php }?>  value="">   Kelainan
                <input type="text" name="TENGGOROKAN2"  value="<?php echo $_smarty_tpl->getVariable('data')->value['TENGGOROKAN'];?>
">   
             </td>
        </tr>
        <tr>  <td>Leher</td>
            <td>
                <input type="radio" name="LEHER" <?php if ($_smarty_tpl->getVariable('data')->value['LEHER']=='Normal'){?> checked <?php }?> value="Normal" checked>   Normal
                <input type="radio" name="LEHER" <?php if ($_smarty_tpl->getVariable('data')->value['LEHER']!='Normal'){?> checked <?php }?> value="">   Kelainan
                <input type="text" name="LEHER2"   value="<?php echo $_smarty_tpl->getVariable('data')->value['LEHER'];?>
">   
                 
             </td>
        </tr>
        <tr>  <td>Dada</td>
            <td>
                <input type="radio" name="DADA" <?php if ($_smarty_tpl->getVariable('data')->value['DADA']=='Normal'){?> checked <?php }?> value="Normal" checked>   Normal
                <input type="radio" name="DADA" <?php if ($_smarty_tpl->getVariable('data')->value['DADA']!='Normal'){?> checked <?php }?> value="">   Kelainan
                <input type="text" name="DADA2" value="<?php echo $_smarty_tpl->getVariable('data')->value['DADA'];?>
">   
                 
 
             </td>
        </tr>
        <tr>  <td>Jantung</td>
            <td>
                <input type="radio" name="JANTUNG" <?php if ($_smarty_tpl->getVariable('data')->value['JANTUNG']=='Normal'){?> checked <?php }?> value="Normal" checked>   Normal
                <input type="radio" name="JANTUNG" <?php if ($_smarty_tpl->getVariable('data')->value['JANTUNG']!='Normal'){?> checked <?php }?>  value="">   Kelainan
                <input type="text" name="JANTUNG2" value="<?php echo $_smarty_tpl->getVariable('data')->value['JANTUNG'];?>
"> 
                 
             </td>
        </tr>
        <tr>  <td>Paru-Paru</td>
            <td>
                <input type="radio" name="PARU_PARU" <?php if ($_smarty_tpl->getVariable('data')->value['PARU_PARU']=='Digendong'){?> checked <?php }?> value="Normal" checked>   Normal
                <input type="radio" name="PARU_PARU" <?php if ($_smarty_tpl->getVariable('data')->value['PARU_PARU']!='Normal'){?> checked <?php }?> value="">   Kelainan
                <input type="text" name="PARU_PARU2" value="<?php echo $_smarty_tpl->getVariable('data')->value['PARU_PARU'];?>
"> 
  
             </td>
        </tr>
        <tr>  <td>Abdomen</td>
            <td>
                <input type="radio" name="ABDOMEN" <?php if ($_smarty_tpl->getVariable('data')->value['ABDOMEN']=='Normal'){?> checked <?php }?> value="Normal" checked>   Normal
                <input type="radio" name="ABDOMEN" <?php if ($_smarty_tpl->getVariable('data')->value['ABDOMEN']!='Normal'){?> checked <?php }?> value="">   Kelainan
                <input type="text" name="ABDOMEN2" value="<?php echo $_smarty_tpl->getVariable('data')->value['ABDOMEN'];?>
"> 
   
             </td>
        </tr>
        <tr>  <td>Anggota Gerak Atas</td>
            <td>
                <input type="radio" name="BADAN_GERAK_ATAS" <?php if ($_smarty_tpl->getVariable('data')->value['BADAN_GERAK_ATAS']=='Normal'){?> checked <?php }?> value="Normal" checked>   Normal
                <input type="radio" name="BADAN_GERAK_ATAS" <?php if ($_smarty_tpl->getVariable('data')->value['BADAN_GERAK_ATAS']!='Normal'){?> checked <?php }?> value="">   Kelainan
                <input type="text" name="BADAN_GERAK_ATAS2" value="<?php echo $_smarty_tpl->getVariable('data')->value['BADAN_GERAK_ATAS'];?>
"> 
 
             </td>
        </tr>
        <tr>  <td>Anggota Gerak Bawah</td>
            <td>
                <input type="radio" name="BADAN_GERAK_BAWAH" <?php if ($_smarty_tpl->getVariable('data')->value['BADAN_GERAK_BAWAH']=='Normal'){?> checked <?php }?> value="Normal" checked>   Normal
                <input type="radio" name="BADAN_GERAK_BAWAH" <?php if ($_smarty_tpl->getVariable('data')->value['BADAN_GERAK_BAWAH']!='Normal'){?> checked <?php }?> value="">   Kelainan
                <input type="text" name="BADAN_GERAK_BAWAH2" value="<?php echo $_smarty_tpl->getVariable('data')->value['BADAN_GERAK_BAWAH'];?>
"> 
 
 
             </td>
        </tr>
        </table>

        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="4">  Pemeriksaan Khusus</th>
            </tr>
            <tr>
                <td rowspan="4">Dada</td>
                <td> <input type="radio" name="CEK_DADA" <?php if ($_smarty_tpl->getVariable('data')->value['CEK_DADA']=='Mammae Simetris'){?> checked <?php }?> value="Mammae Simetris">  Mammae Simetris </td>
                <td> <input type="radio" name="CEK_DADA" <?php if ($_smarty_tpl->getVariable('data')->value['CEK_DADA']=='Mammae Asimetris'){?> checked <?php }?>  value="Mammae Asimetris">  Mammae ASimetris </td>
                <td> <input type="radio" name="CEK_DADA" <?php if ($_smarty_tpl->getVariable('data')->value['CEK_DADA']=='Puting Menonjol'){?> checked <?php }?> value="Puting Menonjol">    Puting Menonjol </td></tr>
            <tr> 
                 <td>
                      <input type="radio" name="CEK_DADA" <?php if ($_smarty_tpl->getVariable('data')->value['CEK_DADA']=='Puting Tidak Menonjol'){?> checked <?php }?>  value="Puting Tidak Menonjol">    Puting Tidak Menonjol </td>
                <td> 
                    <input type="radio" name="CEK_DADA" <?php if ($_smarty_tpl->getVariable('data')->value['CEK_DADA']=='Aerola Hiperpigmentasi'){?> checked <?php }?> value="Aerola Hiperpigmentasi"> Aerola Hiperpigmentasi </td>
                <td> 
                    <input type="radio" name="CEK_DADA" <?php if ($_smarty_tpl->getVariable('data')->value['CEK_DADA']=='Kolostrum'){?> checked <?php }?> value="Kolostrum">   Kolostrum </td>
                </tr>
              <tr>
                    <td > </td>
               <tr> 
               <tr> 
                   <td>Inspeksi Abdomen</td>
                    <td colspan="3"> <input type="radio" name="INSPEKSI_ABDOMEN" <?php if ($_smarty_tpl->getVariable('data')->value['INSPEKSI_ABDOMEN']=='Luka Bekas OP'){?> checked <?php }?> value="Luka Bekas OP">  Luka Bekas OP  
                        <input type="radio" name="INSPEKSI_ABDOMEN" <?php if ($_smarty_tpl->getVariable('data')->value['INSPEKSI_ABDOMEN']=='Linea Alba'){?> checked <?php }?> value="Linea Alba"> Linea Alba  
                        <input type="radio" name="INSPEKSI_ABDOMEN" <?php if ($_smarty_tpl->getVariable('data')->value['INSPEKSI_ABDOMEN']=='Linea Nigra'){?> checked <?php }?> value="Linea Nigra">   Linea Nigra  
                            <input type="radio" name="INSPEKSI_ABDOMEN" <?php if ($_smarty_tpl->getVariable('data')->value['INSPEKSI_ABDOMEN']=='Striae Lividae'){?> checked <?php }?> value="Striae Lividae">     Striae Lividae  
                          <input type="radio" name="INSPEKSI_ABDOMEN" <?php if ($_smarty_tpl->getVariable('data')->value['INSPEKSI_ABDOMEN']=='Striae Albican'){?> checked <?php }?> value="Striae Albican">     Striae Albican </td>
                        
                    </tr>
            <tr> 
                        <td>Palpasi Abdomen</td></tr>
                <tr> 
                         <td>Leopod I     </td>
                         <td> <input type="text" name="LEOPOD_1"  value="<?php echo $_smarty_tpl->getVariable('data')->value['LEOPOD_1'];?>
">    cm </td></tr>
                <tr> 
                         <td>Leopod II      </td>
                         <td>
                            <input type="radio" name="LEOPOD_2" <?php if ($_smarty_tpl->getVariable('data')->value['LEOPOD_2']=='Punggung Kanan'){?> checked <?php }?> value="Punggung Kanan">  Punggung Kanan 
                            <input type="radio" name="LEOPOD_2" <?php if ($_smarty_tpl->getVariable('data')->value['LEOPOD_2']=='Punggung Kiri'){?> checked <?php }?> value="Punggung Kiri">   Punggung Kiri
                           </td>
                    </tr>
            <tr> 
                   <td>Leopod III      </td>
                           <td>
                              <input type="radio" name="LEOPOD_3" <?php if ($_smarty_tpl->getVariable('data')->value['LEOPOD_3']=='Kepala'){?> checked <?php }?> value="Kepala">    Kepala 
                              <input type="radio" name="LEOPOD_3" <?php if ($_smarty_tpl->getVariable('data')->value['LEOPOD_3']=='Bokong'){?> checked <?php }?> value="Bokong">     Bokong
                             </td>
                         </tr>
          <tr> 
                <td>Leopod IV     </td>
                                    <td>
                                       <input type="radio" name="LEOPOD_4" <?php if ($_smarty_tpl->getVariable('data')->value['LEOPOD_4']=='Floating'){?> checked <?php }?>  value="Floating">    Floating 
                                       <input type="radio" name="LEOPOD_4" <?php if ($_smarty_tpl->getVariable('data')->value['LEOPOD_4']=='Enganged'){?> checked <?php }?> value="Enganged">     Enganged
                                      </td>
                                  </tr>
          <tr>
              <td>Auskultasi</td>
              <td colspan="3">
                  <input type="radio" name="AUSKULTASI" <?php if ($_smarty_tpl->getVariable('data')->value['AUSKULTASI']=='Teratur'){?> checked <?php }?> value="Teratur">Teratur
                  <input type="radio" name="AUSKULTASI" <?php if ($_smarty_tpl->getVariable('data')->value['AUSKULTASI']=='Tidak'){?> checked <?php }?> value="Tidak">Tidak Teratur  
                <input type="text" name=" DURASI_AUSKULTASI" value="<?php echo $_smarty_tpl->getVariable('data')->value['DURASI_AUSKULTASI'];?>
" >kali/menit
              </td>
              
          </tr>
          <tr>
            <td>Kontraksi</td>
            <td colspan="3">
                <input type="radio" name="KONTRAKSI" <?php if ($_smarty_tpl->getVariable('data')->value['KONTRAKSI']=='Kuat'){?> checked <?php }?> value="Kuat">Kuat
                <input type="radio" name="KONTRAKSI" <?php if ($_smarty_tpl->getVariable('data')->value['KONTRAKSI']=='Sedang'){?> checked <?php }?> value="Sedang">Sedang
                <input type="radio" name="KONTRAKSI" <?php if ($_smarty_tpl->getVariable('data')->value['KONTRAKSI']=='Lemah'){?> checked <?php }?> value="Lemah">Lemah
                
              <input type="text" name=" DURASI_KONTRAKSI" value="<?php echo $_smarty_tpl->getVariable('data')->value['DURASI_KONTRAKSI'];?>
" >kali/menit
            </td>
        </tr>

        <tr>
            <td>Inspeksi Ano Genital</td>
            <td>
              <input type="text" name="INSPEKSI_ANO_GENITAS" value="<?php echo $_smarty_tpl->getVariable('data')->value['INSPEKSI_ANO_GENITAS'];?>
" >
            </td>
        </tr>
        <tr>
            <td> Vagina Toucher</td>
            <td>
              <input type="text" name="VAGINA_TOUCHER" value="<?php echo $_smarty_tpl->getVariable('data')->value['VAGINA_TOUCHER'];?>
" >
            </td>
        </tr>
        <tr class="headrow">
            <th colspan="4">  Pemeriksaan Penunjang</th>
        </tr>
        <tr>
            <td>Laboratorium</td>
            <td>
                
                <select name="rlab[]" multiple id="rlab" style="width:250px">
                    <option></option>
                </select>
                
                <!-- <select name="rlab[]" multiple id="rlab" style="width:250px">
                <option></option>
                </select> -->
            </td>
            <td>Radiologi</td>
            <td>   

            
              
                    <select name="radiologi[]" multiple id="radiologi" style="width:250px">
                        <option></option>
                    </select>
              
                <!-- <?php if ($_smarty_tpl->getVariable('data')->value['RAD']=='0'||$_smarty_tpl->getVariable('data')->value['RAD']==''){?>
                <select name="radiologi[]" multiple id="radiologi" style="width:350px">
                        <option></option>
                    </select> 
                    <?php }else{ ?>
                <textarea cols="50" name="tembusan"><?php echo $_smarty_tpl->getVariable('data')->value['RAD'];?>
</textarea>
                <?php }?> -->
                
                <!-- <select name="tembusan[]" multiple id="tembusan" style="width:200px">
                <option></option>
            </select> -->
        </td>
        </tr>

        <tr class="headrow">
            <th colspan="4">Kebutuhan Fungsional</th>
        </tr>
        <tr>
            <td width='20%'>Pemenuhan ADL</td>
            <td width='30%'>
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
 
        <tr class="headrow">
            <th colspan="4">Risiko Jatuh
                <input type="hidden" name="FS_KD_JATUH2" value="<?php echo $_smarty_tpl->getVariable('jatuh')->value['FS_KD_JATUH2'];?>
">

            </th>
        </tr>
       
        <tr class="headrow">
            <th colspan="4">Asesmen Jatuh Dewasa Morse Fall Scale (>18-65 tahun)</th>
        <input type="hidden" name="FS_TIPE_RISIKO_JATUH" value='2'/>
        </tr>
        <tr>
            <td width='20%'>Riwayat Jatuh</td>
            <td width='30%'>
                <select name="FS_PARAM_1" class="select2" style="width: 250px;" id="op18">
                    <option value="">--Pilih Data--</option>
                    <option value="25" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_1']=='25'){?> selected="" <?php }?>>< 3 bulan</option>
                    <option value="0" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_1']=='0'){?> selected="" <?php }?>>tidak ada atau > 3 bulan</option>

                </select>
                <span id="sc18"></span>
            </td>
            <td width='20%'>Kesimpulan</td>
            <td width='30%'><b><span id="rjtkesimpuland"></span></b></td>
        </tr>
         <tr>
            <td>Diagnosa medis sekunder</td>
            <td>
                <select name="FS_PARAM_2" class="select2" style="width: 250px;" id="op19">
                    <option value="">--Pilih Data--</option>
                    <option value="15" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_2']=='15'){?> selected="" <?php }?>>> 1 diagnosa penyakit</option>
                    <option value="0" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_2']=='0'){?> selected="" <?php }?>><= 1 diagnosa penyakit</option>
                </select>
                <span id="sc19"></span>
            </td>
            <td></td>
            <td></td>
        </tr>
         <tr>
            <td>Alat bantu jalan</td>
            <td>
                <select name="FS_PARAM_3" class="select2" style="width: 250px;" id="op110">
                    <option value="">--Pilih Data--</option>
                    <option value="30" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_3']=='30'){?> selected="" <?php }?>>Perabot</option>
                    <option value="15" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_3']=='15'){?> selected="" <?php }?>>Tongkat / penopang</option>
                    <option value="0" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_3']=='0'){?> selected="" <?php }?>>Tidak ada / Tirah baring</option>
                </select>
                <span id="sc110"></span>
            </td>
            <td></td>
            <td></td>
        </tr>
         <tr>
            <td>Terapi IV / anti koagulan</td>
            <td>
                <select name="FS_PARAM_4" class="select2" style="width: 250px;" id="op11">
                    <option value="">--Pilih Data--</option>
                    <option value="20" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_4']=='20'){?> selected="" <?php }?>>Terapi IV terus menerus</option>
                    <option value="0" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_4']=='0'){?> selected="" <?php }?>>Tidak</option>
                </select>
                <span id="sc11"></span>
            </td>
            <td></td>
            <td></td>
        </tr>
         <tr>
            <td>Gaya berjalan</td>
            <td>
                <select name="FS_PARAM_5" class="select2" style="width: 250px;" id="op12">
                    <option value="">--Pilih Data--</option>
                    <option value="30" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_5']=='30'){?> selected="" <?php }?>>Kerusakan (Terganggu)</option>
                    <option value="15" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_5']=='15'){?> selected="" <?php }?>>Lemah</option>
                    <option value="0" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_5']=='0'){?> selected="" <?php }?>>Normal / Tirah baring</option>
                </select>
                <span id="sc12"></span>
            </td>
            <td></td>
            <td></td>
        </tr>
         <tr>
            <td>Status Mental</td>
            <td>
                <select name="FS_PARAM_6" class="select2" style="width: 250px;" id="op13">
                    <option value="">--Pilih Data--</option>
                    <option value="15" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_6']=='15'){?> selected="" <?php }?>>Lupa keterbatasan</option>
                    <option value="0" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_PARAM_6']=='0'){?> selected="" <?php }?>>Sadar kemampuan diri</option>
                </select>
                <span id="sc13"></span>
            </td>
            <td></td>
            <td></td>
        </tr>
          
             <!-- <tr>
                <td>Pencegahan Jatuh</td>
                <td colspan="3">
                   <select name="tujuan[]" multiple id="tujuan" style="width:250px">
                    <option></option>
                </select>
                </td>
            </tr> -->
    
            <tr class="headrow">
                <th colspan="4">Asesmen Nyeri
                 

                </th>
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
        <th colspan="4">ANALISIS</th>
    </tr>
    <tr>
        <td width='20%'>Masalah Kebidanan</td>
        <td width='30%' colspan="3">
            <input type="text" style="width: 600px;" name="MASALAH_KEBIDANAN" value="<?php echo $_smarty_tpl->getVariable('data')->value['MASALAH_KEBIDANAN'];?>
">

        </td>
    </tr>
    <tr>
        <td width='20%'>Diagnosa Kebidanan</td>
        <td width='30%' colspan="3">
           <input type="text" name="DIAGNOSA"  style="width: 600px;" value="<?php echo $_smarty_tpl->getVariable('data')->value['DIAGNOSA'];?>
">
        </td> 
    </tr>
    <tr>
        <td width='20%'> Rencana Tindakan Kebidanan</td>
        <td width='30%' colspan="3">
           <input type="text" name="RENCANA_TINDAKAN"  style="width: 600px;" value="<?php echo $_smarty_tpl->getVariable('data')->value['RENCANA_TINDAKAN'];?>
">
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
            <th colspan="4">     Hasil Penanganan</th>
        </tr>
        <tr>
            <td>
                <select name="HASIL" id="surat_dari" class="select2" style="width: 190px;">
                    <option value="0">--Pilih Cara Pulang--</option>
                    <option value="3" <?php if ($_smarty_tpl->getVariable('data')->value['HASIL']=='3'){?> selected <?php }?> >Rawat Inap</option>
                    <option value="0" <?php if ($_smarty_tpl->getVariable('data')->value['HASIL']=='0'){?> selected <?php }?> >Pulang</option>
                    <option value="9" <?php if ($_smarty_tpl->getVariable('data')->value['HASIL']=='9 Rawat'){?> selected <?php }?> >Menolak Rawat</option>
                    
                    <option value="4" <?php if ($_smarty_tpl->getVariable('data')->value['HASIL']=='4'){?> selected <?php }?> >Rujuk</option> 
                    <option value="10" <?php if ($_smarty_tpl->getVariable('data')->value['HASIL']=='10'){?> selected <?php }?> >Meninggal</option>  
                    <option value="11" <?php if ($_smarty_tpl->getVariable('data')->value['HASIL']=='11'){?> selected <?php }?> >Lain lain</option>
                </select>
            </td>
            <td>Jama Selesai diperiksa</td>
            <td><input type="time" name="JAM_SELESAI" value="<?php echo date('H:i',strtotime($_smarty_tpl->getVariable('data')->value['RUJUKAN']));?>
"></td>
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
            $('#tujuan').select2('data', null);
            $('#tujuan').select2('data', null);
            $("#tujuan").removeAttr("disabled");
            jQuery("#tujuan").html('');
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
                            jQuery("#tembusan").html(showData);
                    }
            });
            //tags
            $("#tembusan").select2({});


      


       
            
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
    var user = $("#user").val(); 
           
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



 </script>
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

 