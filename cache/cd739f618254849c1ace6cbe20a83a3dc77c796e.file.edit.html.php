<?php /* Smarty version Smarty-3.0.7, created on 2022-07-06 08:48:14
         compiled from "application/views\op/umumpra/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:1323662c4e9de99d6d3-26721262%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd739f618254849c1ace6cbe20a83a3dc77c796e' => 
    array (
      0 => 'application/views\\op/umumpra/edit.html',
      1 => 1657072089,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1323662c4e9de99d6d3-26721262',
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
        <a href="">DAta Umum Pra Bedah</a><span></span>
        <small>edit Data</small>
    </p>
    <div class="clear"></div>
</div> 
<div class="content-entry">
 
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/umumpra/edit_process');?>
" method="post" onkeypress="return event.keyCode != 13">
        <input name="FS_KD_REG" id="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />  
            <input name="TGL_LAHIR" id="TGL_LAHIR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['TGL_LAHIR'];?>
" /> 
            <input name="idoperasi" type="hidden" value="<?php echo $_smarty_tpl->getVariable('idoperasi')->value;?>
" />
            <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
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
   
        <!-- <div class="notification red">
            <p><strong>High Risk :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_HIGH_RISK'])===null||$tmp==='' ? '-' : $tmp);?>
 </p>
            <p><strong>Alergi :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
 (<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_REAK_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
)</p>
            <div class="clear"></div>
        </div> -->
        <table class="table-input" width="100%" style="text-align: justify;">
         

          
            <input type="hidden" name="KD_OPERATOR" value="<?php echo $_smarty_tpl->getVariable('rs_op')->value['Kode_Dokter'];?>
">
            

            <tr>
                <td width="20%">Diagnosa Pre-</td>
                <td width="20%">
                    <input type="text" name="DIAGNOSA"  value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['DIAGNOSA'];?>
"  class="form-control">
                </td>

                <td width="20%">Jenis Operasi</td>
                <td width="20%">
                    <input type="text" name="JENIS_OP"   value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['JENIS_OP'];?>
"  class="form-control">
                </td>
            </tr>

            <tr>
                <td width="20%">Makan Minum Terakhir /Puasa Jam</td>
                <td width="20%">
                    <input type="time" name="MAKAN_TERAKHIR"  value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['MAKAN_TERAKHIR'];?>
"  class="form-control">
                    <input type="hidden" name="PUASA_JAM"  value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['PUASA_JAM'];?>
"  class="form-control">
                </td>

               
            </tr>


            <tr>
                <td width="20%">Riwayat Asma</td>
                <td width="20%">
                    <input type="text" name="RIWAYAT_ASMA"  value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['RIWAYAT_ASMA'];?>
"  class="form-control">
                </td>
 
            </tr>
            <tr> 
                <td width="20%">Riwayat Alergi</td>
                <td width="20%">
                    <input type="radio" name="RIWAYAT_ALERGI" <?php if ($_smarty_tpl->getVariable('rs_umum_pra')->value['RIWAYAT_ALERGI']=='Tidak'){?> checked <?php }?> class="radal" value="Tidak" class="form-control">Tidak
                    <input type="radio" name="RIWAYAT_ALERGI" <?php if ($_smarty_tpl->getVariable('rs_umum_pra')->value['RIWAYAT_ALERGI']!='Tidak'){?> checked <?php }?> class="radal" value="Ya" class="form-control">Ya
                    <input type="text" name="RIWAYAT_ALERGI1" <?php if ($_smarty_tpl->getVariable('rs_umum_pra')->value['RIWAYAT_ALERGI']!='Tidak'){?>   style="display:show" value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['RIWAYAT_ALERGI'];?>
" <?php }?>  id="formal"  class="form-control">
 
                </td>
            </tr>
            <input type="hidden" name="KD_OPERATOR" value="<?php echo $_smarty_tpl->getVariable('rs_op')->value['Kode_Dokter'];?>
">

            <tr>
            <td width="20%">Antibiotik </td>
            <td width="20%">
                <input type="text" name="ANTIBIOTIK"  value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['ANTIBIOTIK'];?>
"  class="form-control">
            </td>

          
        </tr>


        <tr><td><b>PEMERIKSAAN FISIK </b></td></tr>
        <tr>
             <td colspan="4">
               <table>
                  <tr>
                     <td>   Tinggi </td><td>: <input type="text" name="TB"  value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['TB'];?>
"  class="form-control" style="width: 60px;"></td>
                     <td>   Berat </td><td>: <input type="text" name="BB"  value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['BB'];?>
"  class="form-control" style="width: 60px;"></td>
                     <td>     Tekanan Darah </td><td>: <input type="text" name="TD"  value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['TD'];?>
"  class="form-control" style="width: 60px;"></td>
                  
                    <td>   Nadi </td><td>: <input type="text" name="ND"  value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['ND'];?>
"  class="form-control" style="width: 60px;"></td>
                    <td>     Pernafasan</td><td> : <input type="text" name="P"  value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['P'];?>
"  class="form-control" style="width: 60px;"></td>
                    <td>     Suhu</td><td> : <input type="text" name="SH"  value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['SH'];?>
"  class="form-control" style="width: 60px;"></td>
                    <td>     SPO2</td><td> : <input type="text" name="SPO2"   value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['SPO2_umum_pra'];?>
"  class="form-control" style="width: 60px;"></td>
                    
                    <td>  </td><td></td>
                 </tr>
               </table>
               </td>
     </tr>

     <tr><td><b>Persiapan Pre Operasi</b></td></tr>

     <tr>
        <td colspan="2">
        <table>
            <tr><td>Melapor ke Dokter Bedah</td><td><input type="radio" name="LAPOR_DOKTER" VALUE="Ya" checked>Ya </td><td><input type="radio" name="LAPOR_DOKTER" VALUE="Tidak">Tidak </td></tr>
            <tr><td>Melapor ke Kamar Bedah</td> <td><input type="radio" name="LAPOR_OK" VALUE="Ya" checked>Ya </td><td><input type="radio" name="LAPOR_OK" VALUE="Tidak">Tidak </td></tr>
            <tr><td>Mengisi Surat Izin Pembedahan </td> <td><input type="radio" name="SURAT_IZIN" VALUE="Ya" checked>Ya </td><td><input type="radio" name="SURAT_IZIN" VALUE="Tidak">Tidak </td></tr>
            <tr><td>Menandai Daerah OP </td> <td><input type="radio" name="TANDA_LOKASI" VALUE="Ya" checked>Ya </td><td><input type="radio" name="TANDA_LOKASI" VALUE="Tidak">Tidak </td></tr>
            <tr><td>Memakai Gelang Pasien </td> <td><input type="radio" name="GELANG" VALUE="Ya" checked>Ya </td><td><input type="radio" name="GELANG" VALUE="Tidak">Tidak </td></tr>
            <tr><td> Melepas Gigi Palsu, aksesoris</td> <td><input type="radio" name="LEPAS_BEHEL" VALUE="Ya" checked>Ya </td><td><input type="radio" name="LEPAS_BEHEL" VALUE="Tidak">Tidak </td></tr>
            <tr><td> Menghapus Lipstik</td> <td><input type="radio" name="HAPUS_LIPS" VALUE="Ya" checked>Ya </td><td><input type="radio" name="HAPUS_LIPS" VALUE="Tidak">Tidak </td></tr>
            <tr><td> Melakukan Oral Hygiene </td> <td><input type="radio" name="ORAL_HYG" VALUE="Ya" checked>Ya </td><td><input type="radio" name="ORAL_HYG" VALUE="Tidak">Tidak </td></tr>
        </table>    
        </td>
        <td colspan="2">
            <table>
                <tr><td>Memasang Bidai, Fiksasi Leher</td><td><input type="radio" name="FIKS_LEHER" VALUE="Ya" checked>Ya </td><td><input type="radio" name="FIKS_LEHER" VALUE="Tidak">Tidak </td></tr>
                <tr><td>Memasang Infus</td> <td><input type="radio" name="INFUS" VALUE="Ya" checked>Ya </td><td><input type="radio" name="INFUS" VALUE="Tidak">Tidak </td></tr>
                <tr><td>Memasang DC</td> <td><input type="radio" name="PASANG_DC" VALUE="Ya" checked>Ya </td><td><input type="radio" name="PASANG_DC" VALUE="Tidak">Tidak </td></tr>
                <tr><td>Memasang NGT</td> <td><input type="radio" name="NGT" VALUE="Ya" checked>Ya </td><td><input type="radio" name="NGT" VALUE="Tidak">Tidak </td></tr>
                <tr><td>Memasang Drainage</td> <td><input type="radio" name="DRAINAGE" VALUE="Ya" checked>Ya </td><td><input type="radio" name="DRAINAGE" VALUE="Tidak">Tidak </td></tr>
                <tr><td>Memasang WSD</td> <td><input type="radio" name="WSD" VALUE="Ya" checked>Ya </td><td><input type="radio" name="WSD" VALUE="Tidak">Tidak </td></tr>
                <tr><td>Mencukur Daerah OP</td> <td><input type="radio" name="CUKUR" VALUE="Ya" checked>Ya </td><td><input type="radio" name="CUKUR" VALUE="Tidak">Tidak </td></tr>
                <tr><td>Lain-lain</td> <td colspan="2"><input type="text" name="LAIN" VALUE=" ">  </td> </tr>
             </table>    
            </td>
         </tr>
        <tr><td></td></tr>

        <tr>
            <td width="20%">Sakit Kronis</td>
            <td width="20%">
                <textarea name="SAKIT_KRONIS" value=""  class="form-control" rows="2" style="width: 350px;"><?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['SAKIT_KRONIS'];?>
</textarea> 
            </td>

        </tr>

             <tr>
                <td width="20%">Premedikasi</td>
                <td width="20%">
                    <input type="text" name="PREMEDIKASI"   value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['PREMEDIKASI'];?>
"  class="form-control">
                </td>

                <td width="20%">IVFD</td>
                <td width="20%">
                    <input type="text" name="IVFD"   value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['IVFD'];?>
"  class="form-control">
                </td>
            </tr>

            <tr>
                <td width="20%">DC No</td>
                <td width="20%">
                    <input type="text" name="DC"   value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['DC'];?>
"  class="form-control">
                </td>

                <td width="20%">Yang disertakan dengan Pasien</td>
                <td width="20%">
                    <input type="checkbox" name="LAMPIRAN[]" value="Asesmen Pra Bedah" value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['DIAGNOSA'];?>
" checked class="form-control">Asesmen Pra Bedah<br>
                    <input type="checkbox" name="LAMPIRAN[]" value="Edukasi Anestesi" value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['DIAGNOSA'];?>
" checked class="form-control">Edukasi Anestesi<br>
                    <input type="checkbox" name="LAMPIRAN[]" value="Informed Consent Bedah" value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['DIAGNOSA'];?>
" checked class="form-control"> Informed Consent Bedah
                </td>
            </tr>
            <tr>
                <td width="20%">Gol Darah</td>
                <td width="20%">
                    <input type="text" name="DARAH"  style="width: 20px;"  value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['DARAH'];?>
"  class="form-control"> Sebanyak <input type="text" name="JUM_DARAH"   value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['JUM_DARAH'];?>
"  class="form-control">
                </td>

                <td width="20%">Foto Rontgen</td>
                <td width="20%">
                    <input type="text" name="RONTGEN"  value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['RONTGEN'];?>
"  class="form-control">
                </td>
            </tr>
            <tr>
                <td width="20%">Obat Obat</td>
                <td width="20%">
                    <textarea name="OBAT" value=""  class="form-control" rows="2" style="width: 350px;"><?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['OBAT'];?>
</textarea> 
                </td>

                <td width="20%">Waktu Penginputan Data</td>
                <td width="20%">
                    <input type="datetime-local" name="Time_input_umum_pra"   value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['Time_input_umum_pra'];?>
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
  

 <table class="table-view" width="100%">
    <tr class="headrow">
        <th colspan="6">List Data Umum Pra OP</th>
    </tr>
    <tr>
        <th width="25%">Tanggal</th>
        <th width="10%">Diagnosa </th>
        <th width="30%"> Data Umum</th>
        <th width="20%">Sakit Kronis </th>
        <th width="15%">Petugas Anestesi</th>
      
    </tr>
    <?php  $_smarty_tpl->tpl_vars['cppt'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_umum_pra3')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cppt']->key => $_smarty_tpl->tpl_vars['cppt']->value){
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['TGL'];?>
  
            <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_inap/cetak_data_umum_pra/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['id']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['TANGGAL'],"%d %B %Y");?>
</a> 
        </td>
        <td> <?php echo $_smarty_tpl->tpl_vars['cppt']->value['DIAGNOSA'];?>
</td>
        <td>
            Jenis Op : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['JENIS_OP'];?>
 <br>
            Puasa Jam : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['PUASA'];?>
 <br>
            Antibiotik : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['ANTIBIOTIK'];?>
 <br>
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['SAKIT_KRONIS'];?>
 </td>
        <td> <?php echo strtoupper($_smarty_tpl->tpl_vars['cppt']->value['KD_PERAWAT']);?>
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
<script type="text/javascript">
    $(function(){
      $(":radio.rad").click(function(){
        $("#form2").hide()
        if($(this).val() == "Ya"){
          $("#form2").show();
        }else if($(this).val() == "Tidak"){
          $("#form2").hide();
        }
      });
    });


    $(function(){
      $(":radio.radal").click(function(){
        $("#formal").hide()
        if($(this).val() == "Ya"){
          $("#formal").show();
        }else if($(this).val() == "Tidak"){
          $("#formal").hide();
        }
      });
    });
  </script>   




  




  