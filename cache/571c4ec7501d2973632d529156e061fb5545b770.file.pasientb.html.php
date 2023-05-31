<?php /* Smarty version Smarty-3.0.7, created on 2022-07-01 11:41:44
         compiled from "application/views\lab/pasientb.html" */ ?>
<?php /*%%SmartyHeaderCode:3112762be7b0874b953-99243292%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '571c4ec7501d2973632d529156e061fb5545b770' => 
    array (
      0 => 'application/views\\lab/pasientb.html',
      1 => 1656474829,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3112762be7b0874b953-99243292',
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
    
  <p style="font-size: 15px;">  Hasil Penyisiran Data Pasien TB </p>
<?php if ($_smarty_tpl->getVariable('rolenya')->value!='Perawat IGD'){?> 
 
            <!-- <button class="btn btn-success btn-xs fa fa-pencil" data-toggle="modal" data-target="#tambahanakModal"> Tambah Data  </button> -->

   
<?php }?>
 <br>
 <br>
<div class="dashboard-container">
    <table class="table-view" width="100%" border="0" style="font-size: 12px;">
        <thead>
            <tr>
                <th width='1%'>No</th>
                <th style="width:3%;padding:6px 1px">No MR</th>
                <th style="width:12% ; padding:6px 5px">Nama Pasien</th>
                <th style="width:10%;padding:6px 5px">Alamat</th> 
                <!-- <th style="width:10%;padding:6px 5px">Tanggal  </th>  -->
                <th style="width:8%;padding:6px 5px">Sebelum Pengobatan</th> 
                <th style="width:1%;padding:6px 5px">ICD</th> 
                <th style="width:8%;padding:6px 5px">Paduan OAT</th> 
                <th style="width:8%;padding:6px 5px;">Progres (Mikroskopis)</th> 
                <th style="width:8%;padding:6px 5px;">Akhir Pengobatan</th> 
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
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['kode_icd_x'];?>
</td>  
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['paduan_oat'];?>
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
            <center><font ><h3>Edit Data Pasien TB </h3></font> </center>
                 
            </div>
          <div class="modal-body" style="padding:10px 20px;" width>
            <div class="login-block"> 
                <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('pasien_tb/edit_process');?>
" method="post" onkeypress="return event.keyCode != 13">
                   
                    <input type="hidden" name="idpasientb" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['idlab'];?>
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
                    <input type="hidden" name="tglmulailama" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['tanggal_mulai_pengobatan'];?>
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
                                        <td width="40%">Kode ICD X  </td>
                                        <td width="20%">
                                            <select name="kode_icd_x"  class="form-control select2" id="kode" style="width:300px">
                                                <option value=""></option>
                                                <?php  $_smarty_tpl->tpl_vars['kode'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('icd')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['kode']->key => $_smarty_tpl->tpl_vars['kode']->value){
?> 
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['kode']->value['KODE'];?>
" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['kode']->value['KODE'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1==$_smarty_tpl->tpl_vars['data']->value['kode_icd_x']){?> selected <?php }?> >  <?php echo $_smarty_tpl->tpl_vars['kode']->value['KODE'];?>
</option>
                                                <?php }} ?>
                                                </select>
                                          </td>
                                    </tr>
                                    <tr>
                                        <td width="40%">Tipe Diagnosa  </td>
                                        <td width="20%">
                                            <input type="radio" name="tipe_diagnosis"  value="1" <?php if ($_smarty_tpl->tpl_vars['data']->value['tipe_diagnosis']=='1'){?> checked <?php }?>   >  Bakteriologis  
                                            <input type="radio" name="tipe_diagnosis"  value="2" <?php if ($_smarty_tpl->tpl_vars['data']->value['tipe_diagnosis']=='2'){?> checked <?php }?>    > Klinis  </td>
                                    </tr>
                                    <tr>
                                        <td width="40%">  Riwayat Pengobatan  </td>
                                        <td width="20%">
                                            <select name="klasifikasi_riwayat_pengobatan"  class="form-control select2"   style="width:300px">
                                                <option value=""></option> 
                                                <option value="1" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data']->value['klasifikasi_riwayat_pengobatan'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2=='1'){?> selected <?php }?> >  Baru</option>
                                                <option value="2 " <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data']->value['klasifikasi_riwayat_pengobatan'];?>
<?php $_tmp3=ob_get_clean();?><?php if ($_tmp3=='2 '){?> selected <?php }?> >  Kambuh </option>
                                                <option value="3" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data']->value['klasifikasi_riwayat_pengobatan'];?>
<?php $_tmp4=ob_get_clean();?><?php if ($_tmp4=='3'){?> selected <?php }?> >     Diobati Setelah Gagal </option>
                                                <option value="4" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data']->value['klasifikasi_riwayat_pengobatan'];?>
<?php $_tmp5=ob_get_clean();?><?php if ($_tmp5=='4'){?> selected <?php }?> >  Diobati Setelah Putus Berobat</option>
                                                <option value="5" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data']->value['klasifikasi_riwayat_pengobatan'];?>
<?php $_tmp6=ob_get_clean();?><?php if ($_tmp6=='5'){?> selected <?php }?> >  Lain-lain </option>
                                                <option value="6" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data']->value['klasifikasi_riwayat_pengobatan'];?>
<?php $_tmp7=ob_get_clean();?><?php if ($_tmp7=='6'){?> selected <?php }?> >   Riwayat Pengobatan Sebelumnya Tidak Diketahui</option>
                                               
                                                </select>
                                          </td>
                                    </tr>
                                    <tr>
                                        <td width="40%"> Mulai Pengobatan   </td>
                                        <td width="20%">
                                            <input type="date" name="tanggal_mulai_pengobatan" style="width: 200px;" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['tanggal_mulai_pengobatan'];?>
"   class="form-control">

                                         </td>
                                    </tr>
                                     <tr>
                                        <td width="40%">  Paduan OAT  </td>
                                        <td width="20%">
                                            <select name="paduan_oat"   class="form-control select2" style="width:300px">
                                                <option value=""></option> 
                                                <option value="Isoniazid, Rifampicin, Pyranizanimid, dan Etambutol" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data']->value['paduan_oat'];?>
<?php $_tmp8=ob_get_clean();?><?php if ($_tmp8=='Isoniazid, Rifampicin, Pyranizanimid, dan Etambutol'){?> selected <?php }?> >  Isoniazid, Rifampicin, Pyranizanimid, dan Etambutol</option>
                                                <option value="Isoniazid dan Rifampicin" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data']->value['paduan_oat'];?>
<?php $_tmp9=ob_get_clean();?><?php if ($_tmp9=='Isoniazid dan Rifampicin'){?> selected <?php }?> >   Isoniazid dan Rifampicin</option>
                                                <option value="Rifampicin, Isoniazid, Pyrazinamid, Etambutol, dan Streptomicin" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data']->value['paduan_oat'];?>
<?php $_tmp10=ob_get_clean();?><?php if ($_tmp10=='Rifampicin, Isoniazid, Pyrazinamid, Etambutol, dan Streptomicin'){?> selected <?php }?> >   Rifampicin, Isoniazid, Pyrazinamid, Etambutol, dan Streptomicin</option>
                                                <option value="Rifampicin, Isoniazid, dan Etambutol" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data']->value['paduan_oat'];?>
<?php $_tmp11=ob_get_clean();?><?php if ($_tmp11=='Rifampicin, Isoniazid, dan Etambutol'){?> selected <?php }?> >   Rifampicin, Isoniazid, dan Etambutol </option>
                                                <option value="Rifampicin, Isoniazid, dan Pyrazinamid" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data']->value['paduan_oat'];?>
<?php $_tmp12=ob_get_clean();?><?php if ($_tmp12=='Rifampicin, Isoniazid, dan Pyrazinamid'){?> selected <?php }?> >  Rifampicin, Isoniazid, dan Pyrazinamid </option>
                                                <option value="Rifampicin dan Isoniazid" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data']->value['paduan_oat'];?>
<?php $_tmp13=ob_get_clean();?><?php if ($_tmp13=='Rifampicin dan Isoniazid'){?> selected <?php }?> >  Rifampicin dan Isoniazid </option>
                                                </select>
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
                                        <td width="40%"> Akhir Pengobatan   </td>
                                        <td width="20%">
                                            <input type="date" name="tanggal_hasil_akhir_pengobatan" style="width: 200px;" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['tanggal_hasil_akhir_pengobatan'];?>
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
                                    <tr>
                                        <td width="40%"> Hasil Akhir  </td>
                                        <td width="20%">
                                            <select name="hasil_akhir_pengobatan"  class="form-control select2"  style="width:300px">
                                                <option value=""></option> 
                                                <option value="sembuh" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data']->value['hasil_akhir_pengobatan'];?>
<?php $_tmp14=ob_get_clean();?><?php if ($_tmp14=='sembuh'){?> selected <?php }?> > sembuh </option>
                                                <option value="pengobatan lengkap" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data']->value['hasil_akhir_pengobatan'];?>
<?php $_tmp15=ob_get_clean();?><?php if ($_tmp15=='pengobatan lengkap'){?> selected <?php }?> > pengobatan lengkap </option>
                                                <option value="lost to follow up" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data']->value['hasil_akhir_pengobatan'];?>
<?php $_tmp16=ob_get_clean();?><?php if ($_tmp16=='lost to follow up'){?> selected <?php }?> > lost to follow up </option>
                                                <option value="meninggal" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data']->value['hasil_akhir_pengobatan'];?>
<?php $_tmp17=ob_get_clean();?><?php if ($_tmp17=='meninggal'){?> selected <?php }?> > meninggal </option>
                                                <option value="gagal" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data']->value['hasil_akhir_pengobatan'];?>
<?php $_tmp18=ob_get_clean();?><?php if ($_tmp18=='gagal'){?> selected <?php }?> > gagal </option>
                                                <option value="tidak dievaluasi" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data']->value['hasil_akhir_pengobatan'];?>
<?php $_tmp19=ob_get_clean();?><?php if ($_tmp19=='tidak dievaluasi'){?> selected <?php }?> > tidak dievaluasi </option>

                                                </select>
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