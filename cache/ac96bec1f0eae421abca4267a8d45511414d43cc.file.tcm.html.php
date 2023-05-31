<?php /* Smarty version Smarty-3.0.7, created on 2022-07-01 10:11:32
         compiled from "application/views\lab/tcm.html" */ ?>
<?php /*%%SmartyHeaderCode:3099662be65e4646725-99250108%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac96bec1f0eae421abca4267a8d45511414d43cc' => 
    array (
      0 => 'application/views\\lab/tcm.html',
      1 => 1656474387,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3099662be65e4646725-99250108',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<html>
    
<head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>

</head>
<body>
    <br>
    
  <p style="font-size: 15px;">  Data Hasil Uji Lab TCM </p>
<?php if ($_smarty_tpl->getVariable('rolenya')->value!='Perawat IGD'){?> 
 
            <!-- <button class="btn btn-success btn-xs fa fa-pencil" data-toggle="modal" data-target="#tambahanakModal"> Tambah Data  </button> -->

   
<?php }?>
 <br>
 <br>
<div class="dashboard-container">
    <table class="table-view" width="100%" border="0" style="font-size: 12px;">
        <thead>
            <tr>
                <th width='2%'>No</th>
                <th style="width:3%;padding:6px 1px">No MR</th>
                <th style="width:15% ; padding:6px 5px">Nama Pasien</th>
                <th style="width:10%;padding:6px 5px">Alamat</th> 
                <!-- <th style="width:10%;padding:6px 5px">Tanggal  </th>  -->
                <th style="width:10%;padding:6px 5px">Sebelum Pengobatan</th> 
                <th style="width:10%;padding:6px 5px;">Progres</th> 
                <th style="width:10%;padding:6px 5px;">Akhir Pengobatan</th> 
                <th width='2%'>Aksi</th>
            </tr>
        </thead>
        <tbody><?php $_smarty_tpl->tpl_vars['no'] = new Smarty_variable(1, null, null);?>
            <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
            <tr>
                <td><?php echo $_smarty_tpl->getVariable('no')->value++;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['No_MR'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['Nama_Pasien'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['Alamat'];?>
</td>  
                <td>
                     Mikroskopis : <?php echo $_smarty_tpl->tpl_vars['data']->value['sebelum_pengobatan_hasil_mikroskopis'];?>
 <br>
                     TCM : <?php echo $_smarty_tpl->tpl_vars['data']->value['sebelum_pengobatan_hasil_tes_cepat'];?>
 <br>
                     Biakan : <?php echo $_smarty_tpl->tpl_vars['data']->value['sebelum_pengobatan_hasil_biakan'];?>
 

                </td>  
                <td>
                    Bulan 2 : <?php echo $_smarty_tpl->tpl_vars['data']->value['hasil_mikroskopis_bulan_2'];?>
 <br> 
                    Bulan 3 : <?php echo $_smarty_tpl->tpl_vars['data']->value['hasil_mikroskopis_bulan_2'];?>
 <br> 
                    Bulan 5 : <?php echo $_smarty_tpl->tpl_vars['data']->value['hasil_mikroskopis_bulan_5'];?>
  

               </td>  
               <td>
               Hasil Lab Akhir : <?php echo $_smarty_tpl->tpl_vars['data']->value['akhir_pengobatan_hasil_mikroskopis'];?>
 <br> 
               Tgl Akhir : <?php echo $_smarty_tpl->tpl_vars['data']->value['tanggal_hasil_akhir_pengobatan'];?>
 </td>  
                <!-- <td> Permintaan : <?php echo date('d-m-Y',strtotime($_smarty_tpl->tpl_vars['data']->value['tglp']));?>
<br> Hasil : <?php echo $_smarty_tpl->tpl_vars['data']->value['Tgl_hasil_muncul'];?>

                </td>   -->
                <!-- <td><?php if ($_smarty_tpl->tpl_vars['data']->value['Jenis']=='1'){?> TCM <?php }?> <?php if ($_smarty_tpl->tpl_vars['data']->value['Jenis']=='2'){?> Mikroskopis <?php }?></td>   -->
                
                 <td>
                    <button class="btn btn-primary btn-xs fa fa-pencil" data-toggle="modal" data-target="#etambahanakModal<?php echo $_smarty_tpl->tpl_vars['data']->value['idlab'];?>
"> Edit  </button>
                </td>
            </tr>
            <?php }} ?>
        </tbody>
    </table>
 </div>


 
 <div class="modal fade" id="tambahanakModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
               <div class="modal-header" >
            <button type="button" class="close"   data-dismiss="modal">&times;</button>
            <center><font ><h3>Tambah Data <br>Pengantar Pendaftaran Rawat Inap dan Rawat Jalan </h3></font> </center>
                 
            </div>
          <div class="modal-body" style="padding:40px 50px;" width>
            <div class="login-block"> 
                <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('igd/ppdftr/add_process');?>
" method="post" onkeypress="return event.keyCode != 13">
                
                    <tr>
                        <td colspan="2">
                             <!-- Pasien telah mendaftar 
                            <input type="radio" name="status"  class="rad" required value="Tidak" class="form-control">Belum
                            <input type="radio" name="status" class="rad" required value="Ya" class="form-control">Sudah
                            <br> -->
                            <br>
                            <!-- <div id="form2" style="display:"  >
                                  <table>
                                    <tr>
                                        <td width="40%">Nama Pasien </td>
                                        <td width="40%">
                                            <select name="FS_KD_REG" id="surat_dari" class="select2" style="width: 400px;">
                                                <option value=""></option>
                                                <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien2')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['No_Reg'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['Nama_Pasien'];?>
 | <?php echo $_smarty_tpl->tpl_vars['data']->value['No_MR'];?>
</option>
                                                <?php }} ?>
                                            </select>
                                        </td>
                                    </tr>
                                  </table>
                                </div> -->
        
                                <div id="form3" style="display:"  >
                                    <table>
                                      <tr>
                                          <td width="40%">Nama Pasien </td>
                                          <td width="40%">
                                            <input type="text" name="Nama" style="width: 400px;" class="form-control">
                                          </td>
                                      </tr>
                                      <tr>
                                        <td width="40%">  Alamat </td>
                                        <td width="40%">
                                          <input type="text" name="alamat" class="form-control" style="width: 400px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%">  Umur </td>
                                        <td width="40%">
                                          <input type="text" name="umur" class="form-control" style="width: 400px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%">  Perawatan </td>
                                        <td width="40%">
                                            <input type="radio" name="JENIS_RAWAT" value="Rawat Jalan" checked>Rawat Jalan
                                            <input type="radio" name="JENIS_RAWAT" value="Rawat Inap" >Rawat Inap
                                        </td>
                                    </tr>
                                    <input type="hidden" name="REKANAN" value="Umum" checked >Umum

                                    <!-- <tr>
                                        <td width="40%">  Rekanan </td>
                                        <td width="80%">
                                            <input type="radio" name="REKANAN" value="Umum" checked >Umum
                                            <input type="radio" name="REKANAN" value="BPJS" >BPJS
                                            <input type="radio" name="REKANAN" value="DANA SEHAT">Dana Sehat
                                            <input type="radio" name="REKANAN" value="LAINNYA">Lainnya
                                            <!-- <input type="text" name="REKANAN" value="" class="form-control" style="width: 100px ;"> -->
                                        </td>
                                    </tr> -->
                                    <tr>
                                        <td width="40%">  Unit 1</td>
                                        <td width="40%">
                                            <select class="select2" name="UNIT1">
                                                <option></option>
                                                <option value="Penyakit Saraf" >Penyakit Saraf</option>
                                                <option value="Penyakit Dalam" >Penyakit Dalam</option>
                                                <option value="Perawatan Anak" >Perawatan Anak </option>
                                                <option value="Kebidanan" > Kebidanan </option>
                                                <option value="Bedah" > Bedah </option>
                                                <option value="Perina" > Perinatologi </option>
                                                <option value="ICU" > ICU </option>
                                                <option value="Imunokompromised" > Imunokompromised </option>
                                                <option value="Kohort" > Kohort</option>
                 
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%">  Ruang 1 </td>
                                        <td width="40%">
                                            <select name="RUANG1" id="surat_dari" class="select2" style="width: 400px;">
                                                <option value=""></option>
                                                <?php  $_smarty_tpl->tpl_vars['gata'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ruang')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['gata']->key => $_smarty_tpl->tpl_vars['gata']->value){
?>
                                                
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['gata']->value['Kode_Ruang'];?>
"><?php echo $_smarty_tpl->tpl_vars['gata']->value['Nama_Ruang'];?>
 </option>
                                              
                                                <?php }} ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%">  DPJP 1</td>
                                        <td width="40%">
                                            <select name="KD_DOKTER1" id="surat_dari" class="select2" style="width: 400px;">
                                                <option value=""></option>
                                                <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_dokter')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMAUSER'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
 </option>
                                                <?php }} ?>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr><td><br><br></td></tr>
                                    <tr>
                                        <td width="40%">  Unit 2</td>
                                        <td width="40%">
                                            <select class="select2" name="UNIT2">
                                                <option></option>
                                                <option value="Penyakit Saraf" >Penyakit Saraf</option>
                                                <option value="Penyakit Dalam" >Penyakit Dalam</option>
                                                <option value="Perawatan Anak" >Perawatan Anak </option>
                                                <option value="Kebidanan" > Kebidanan </option>
                                                <option value="Bedah" > Bedah </option>
                                                <option value="Perina" > Perinatologi </option>
                                                <option value="ICU" > ICU </option>
                                                <option value="Imunokompromised" > Imunokompromised </option>
                                                <option value="Kohort" > Kohort</option>
                 
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%">  Ruang 2 </td>
                                        <td width="40%">
                                            <select name="RUANG2" id="surat_dari" class="select2" style="width: 400px;">
                                                <option value=""></option>
                                                <?php  $_smarty_tpl->tpl_vars['gata'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ruang')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['gata']->key => $_smarty_tpl->tpl_vars['gata']->value){
?>
                                                
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['gata']->value['Kode_Ruang'];?>
"><?php echo $_smarty_tpl->tpl_vars['gata']->value['Nama_Ruang'];?>
 </option>
                                              
                                                <?php }} ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%">  DPJP 2</td>
                                        <td width="40%">
                                            <select name="KD_DOKTER2" id="surat_dari" class="select2" style="width: 400px;">
                                                <option value=""></option>
                                                <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_dokter')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMAUSER'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
 </option>
                                                <?php }} ?>
                                            </select>
                                        </td>
                                    </tr>


                                    </table>
                                  </div>
                    
                        </td>
                    </tr>
                    <br>
                    <br>
                 



                      
                
                      <button type="submit" class="btn btn-primary btn-sm">
                            <i class="ti ti-save"></i> Simpan
                        </button>
                    <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Batal</button>
               </form>
            </div>
          </div>
      </div>
    </div>
  </div>




  
 <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>


 <div class="modal fade" id="etambahanakModal<?php echo $_smarty_tpl->tpl_vars['data']->value['idlab'];?>
" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
               <div class="modal-header" >
            <button type="button" class="close"   data-dismiss="modal">&times;</button>
            <center><font ><h3>Edit Data Hasil Uji Lab </h3></font> </center>
                 
            </div>
          <div class="modal-body" style="padding:10px 20px;" width>
            <div class="login-block"> 
                <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('lab/tcm/edit_process');?>
" method="post" onkeypress="return event.keyCode != 13">
                   
                    <input type="hidden" name="idpasientb" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['idlab'];?>
">
                    <input type="hidden" name="tanggal_mulai_pengobatan" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['tanggal_mulai_pengobatan'];?>
">
                    <input type="hidden" name="paduan_oat" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['paduan_oat'];?>
">
                    <input type="hidden" name="kode_icd_x" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['kode_icd_x'];?>
">
                    <input type="hidden" name="id_tb_03" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id_tb_03'];?>
">
                    <input type="hidden" name="nik" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['nik'];?>
">
                    <input type="hidden" name="alamat_lengkap" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['alamat_lengkap'];?>
">
                    <input type="hidden" name="id_propinsi_pasien" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id_propinsi_pasien'];?>
">
                    <input type="hidden" name="kd_kabupaten_pasien" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['kd_kabupaten_pasien'];?>
">  
                    <input type="hidden" name="jenis_kelamin" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['jenis_kelamin'];?>
">
                    <input type="hidden" name="klasifikasi_lokasi_anatomi" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['klasifikasi_lokasi_anatomi'];?>
">
                    <input type="hidden" name="tgl_lahir" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['tgl_lahir'];?>
">
                    <input type="hidden" name="FS_KD_REG" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['No_Reg'];?>
">
                    
                   <table>              
                                      <tr>
                                          <td width="40%">Nama Pasien    </td>
                                          <td width="20%">
                                            <input type="text" name="Nama" style="width: 400px;" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['Nama_Pasien'];?>
" readonly class="form-control">
                                          </td>
                                      </tr>
                                      <tr>
                                        <td width="40%">  Alamat </td>
                                        <td width="20%">
                                          <input type="text" name="Alamat" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['Alamat'];?>
" readonly style="width: 400px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%">No  MR    </td>
                                        <td width="20%">
                                          <input type="text" name="No_MR" style="width: 400px;" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['No_MR'];?>
" readonly class="form-control">
                                        </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <td width="40%">Mikroskopis Sebelum   </td>
                                        <td width="20%">
                                            <input type="text" name="sebelum_pengobatan_hasil_mikroskopis" style="width: 400px;" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['sebelum_pengobatan_hasil_mikroskopis'];?>
"   class="form-control">
                                          </td>
                                    </tr>
                                   
                                    <tr>
                                        <td width="40%">TCM Sebelum   </td>
                                        <td width="20%">
                                            <input type="text" name="sebelum_pengobatan_hasil_tes_cepat" style="width: 400px;" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['sebelum_pengobatan_hasil_tes_cepat'];?>
"   class="form-control">
                                         </td>
                                    </tr>
                                    <tr>
                                        <td width="40%">Biakan Sebelum   </td>
                                        <td width="20%">
                                            <input type="text" name="sebelum_pengobatan_hasil_biakan" style="width: 400px;" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['sebelum_pengobatan_hasil_biakan'];?>
"   class="form-control">
                                            
                                         </td>
                                    </tr>
                                    <tr>
                                        <td width="40%">Mikroskopis Bulan-2   </td>
                                        <td width="20%">
                                            <input type="text" name="hasil_mikroskopis_bulan_2" style="width: 400px;" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['hasil_mikroskopis_bulan_2'];?>
"   class="form-control">

                                         </td>
                                    </tr>
                                    <tr>
                                        <td width="40%">Mikroskopis Bulan-3   </td>
                                        <td width="20%">
                                            <input type="text" name="hasil_mikroskopis_bulan_3" style="width: 400px;" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['hasil_mikroskopis_bulan_3'];?>
"   class="form-control">

                                         </td>
                                    </tr>
                                    <tr>
                                        <td width="40%">Mikroskopis Bulan-5   </td>
                                        <td width="20%">
                                            <input type="text" name="hasil_mikroskopis_bulan_5" style="width: 400px;" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['hasil_mikroskopis_bulan_5'];?>
"   class="form-control">

                                         </td>
                                    </tr>
                                    <tr>
                                        <td width="40%">Mikroskopis Akhir   </td>
                                        <td width="20%">
                                            <input type="text" name="akhir_pengobatan_hasil_mikroskopis" style="width: 400px;" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['akhir_pengobatan_hasil_mikroskopis'];?>
"   class="form-control">

                                         </td>
                                    </tr>
                                    </table>
                                  
                     
                    <br>
                    <br>
                 
                
                      <button type="submit" class="btn btn-primary btn-sm">
                            <i class="ti ti-save"></i> Simpan
                        </button>
                    <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Batal</button>
               </form>
            </div>
          </div>
      </div>
    </div>
  </div>

  <?php }} ?>


 </body>
 </html>
 

 <script>
    $(".select2").select2({
         placeholder: "Pilih",
         allowClear: true
     });

   
   $(":radio.rad").click(function(){
    //  $("#form2").hide();
    //  $("#form3").hide();

    //  if($(this).val() == "Ya"){
    //    $("#form2").show();
    //    $("#form3").hide()
    //  }else if($(this).val() == "Tidak"){
    //    $("#form2").hide();
    //    $("#form3").show()
    //  }
    alert("h");
   });

 </script>