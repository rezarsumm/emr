<?php /* Smarty version Smarty-3.0.7, created on 2022-12-08 13:45:57
         compiled from "application/views\medis/rawat_jalan/add.html" */ ?>
<?php /*%%SmartyHeaderCode:1557863918825842280-79401428%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5be997dbc0535c01251469ea1a1e87a0f9a1ca57' => 
    array (
      0 => 'application/views\\medis/rawat_jalan/add.html',
      1 => 1670481954,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1557863918825842280-79401428',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><!-- include javascript -->
<?php $_template = new Smarty_Internal_Template("medis/rawat_jalan/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of include javascript-->
 
<div class="breadcrum">
    <p>
        <a href="#">Pemeriksaan Dokter</a><span></span>
        <a href="#">History Pasien</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/');?>
">Rawat Jalan</a><span></span>
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="navigation">
    <div class="navigation-button">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('medis/rawat_jalan/history/').($_smarty_tpl->getVariable('result')->value['NO_MR']));?>
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
<form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/add_process');?>
" method="post" method="post" onkeypress="return event.keyCode != 13">
    <input type="hidden" name="FS_KD_REG" value="<?php echo $_smarty_tpl->getVariable('FS_KD_REG')->value;?>
" />
<!--     <input type="hidden" name="FS_KD_REG" value="<?php echo $_smarty_tpl->getVariable('FS_KD_REG2')->value;?>
" /> -->
    <input type="hidden" name="FS_KD_LAYANAN" value="<?php echo $_smarty_tpl->getVariable('result')->value['SPESIALIS'];?>
" />
    <input type="hidden" name="FS_KD_PETUGAS_MEDIS" value="<?php echo $_smarty_tpl->getVariable('result')->value['KODE_DOKTER'];?>
" />
    <input type="hidden" name="FS_MR" value="<?php echo $_smarty_tpl->getVariable('result')->value['NO_MR'];?>
" />
 
    <table class="table-info" width="100%">
        <tr class="headrow">
            <th colspan="4">Data Pasien</th>
        </tr>
        <tr>
            <td width='15%'>Kode Reg</td>
            <td width='35%'><?php echo $_smarty_tpl->getVariable('result')->value['NO_REG'];?>
</td>
            <td width='15%'>No RM</td>
            <td width='35%'><?php echo $_smarty_tpl->getVariable('result')->value['NO_MR'];?>
</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['NAMA_PASIEN'])===null||$tmp==='' ? '' : $tmp);?>
</td>
            <td>Alamat</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['ALAMAT'])===null||$tmp==='' ? '' : $tmp);?>
</td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['TGL_LAHIR'])===null||$tmp==='' ? '' : $tmp);?>
</td>
            <td>Jenis Kelamin</td>
            <td>
                <?php if ($_smarty_tpl->getVariable('result')->value['JENIS_KELAMIN']=='P'){?>
                Perempuan
                <?php }else{ ?>
                Laki-Laki
                <?php }?>
            </td>
        </tr>
        <tr>
            <td>Rekanan</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['NAMAREKANAN'])===null||$tmp==='' ? '' : $tmp);?>
</td>
            <td>Dokter</td>
            <td>  <?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['NAMA_DOKTER'])===null||$tmp==='' ? '' : $tmp);?>
 </td>
        </tr>
    </table>
   <!-- <table class="table-info" width="100%">
        <tr class="headrow">
            <th colspan="5">Riwayat Rawat Inap</th>
        </tr>
        <tr>
            <td width='10%'><b>No</b></td>
            <td width='25%'><b>Operasi</b></td>
            <td width='15%'><b>Tanggal Operasi</b></td>
            <td width='15%'><b>Tanggal Pulang</b></td>
            <td width='35%'><b>Diagnosa Pulang</b></td>
        </tr>
        <?php  $_smarty_tpl->tpl_vars['operasi'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien_inap')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['operasi']->key => $_smarty_tpl->tpl_vars['operasi']->value){
?>
        <tr>
            <td><?php echo $_smarty_tpl->getVariable('no')->value++;?>
</td>
            <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['operasi']->value['TINDAKAN'])===null||$tmp==='' ? "-" : $tmp);?>
</td>
            <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['operasi']->value['TGLOPERASI'])===null||$tmp==='' ? "-" : $tmp);?>
</td>
            <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['operasi']->value['FD_TGL_KELUAR'])===null||$tmp==='' ? "-" : $tmp);?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['operasi']->value['DIAGNOSA'];?>
</td>
        </tr>
        <?php }} else { ?>
        <tr>
            <td colspan="5">Tidak ada riwayat rawat inap</td>
        </tr>
        <?php } ?>
    </table>-->
    <div class="navigation">
        <div class="pageRow">
            <div class="pageNav">
                <ul>
                    <li class="info"></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <div class="navigation-button">
            <ul>
                <li><a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('rm/rawat_jalan/resume/').($_smarty_tpl->getVariable('result')->value['NO_MR']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/printer-icon.png" alt="" /> Resume Rawat Jalan</a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
  <!--   <div class="notification red">
        <p><strong>High Risk :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_HIGH_RISK'])===null||$tmp==='' ? '-' : $tmp);?>
 </p>
        <p><strong>Alergi :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
 (<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_REAK_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
)</p>
        <div class="clear"></div>
    </div> -->
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Pemeriksaan Dokter</th>
        </tr>
        <tr>
            <td width='15%'>Anamnesa (S)</td>
            <td width='35%'>
                <div style="font-weight: bold;"></div>
                <textarea rows="3" cols="50" name="FS_ANAMNESA" onkeypress="handle5(event)" class="form-control anamnesa"><?php echo $_smarty_tpl->getVariable('ases')->value['FS_ANAMNESA'];?>
 </textarea>
            </td>
            <td width='15%'>Daftar Masalah</td>
            <td width='35%'>

                <textarea rows="3" cols="50" name="FS_DAFTAR_MASALAH" onkeypress="handle6(event)" class="form-control daftarmasalah"></textarea>
            </td>
        </tr>
         
        <tr>
            <td>Pemeriksaan Fisik (O)</td>
            <td>
                <div style="font-weight: bold;">
                <!--    Data tanggal : <?php echo $_smarty_tpl->getVariable('kp2')->value['mdd'];?>
 , <?php echo $_smarty_tpl->getVariable('kp2')->value['FS_CATATAN_FISIK'];?>
 -->
               </div>
               <textarea rows="4" cols="50" name='FS_CATATAN_FISIK' style="text-align: justify;">Suhu : <?php echo $_smarty_tpl->getVariable('vs')->value['FS_SUHU'];?>
 C, Nadi : <?php echo $_smarty_tpl->getVariable('vs')->value['FS_NADI'];?>
 x/menit,  Respirasi : <?php echo $_smarty_tpl->getVariable('vs')->value['FS_R'];?>
 x/menit, TD : <?php echo $_smarty_tpl->getVariable('vs')->value['FS_TD'];?>
 mmHg, BB : <?php echo $_smarty_tpl->getVariable('vs')->value['FS_BB'];?>
, TB : <?php echo $_smarty_tpl->getVariable('vs')->value['FS_TB'];?>
, Alergi :  <?php if ($_smarty_tpl->getVariable('alergi')->value['FS_ALERGI']=='1'){?> Belum Diketahui,  <?php }elseif($_smarty_tpl->getVariable('alergi')->value['FS_ALERGI']=='2'){?> Tidak Ada <?php }elseif($_smarty_tpl->getVariable('alergi')->value['FS_ALERGI']=='3'){?>  <b>Ada, <?php echo $_smarty_tpl->getVariable('alergi')->value['FS_ALERGI2'];?>
</b> <?php }else{ ?>
                <?php }?>Skala Nyeri :<?php echo $_smarty_tpl->getVariable('nyeri')->value['FS_NYERIS'];?>
, Skrining Nutrisi :  <?php if ($_smarty_tpl->getVariable('result')->value['FS_KD_LAYANAN']=='P003'||$_smarty_tpl->getVariable('result')->value['FS_KD_LAYANAN2']=='P003'||$_smarty_tpl->getVariable('result')->value['FS_KD_LAYANAN3']=='P003'){?>  <?php if (($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI_ANAK1']+$_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI_ANAK2']+$_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI_ANAK3']+$_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI_ANAK4'])<1){?> Normal <?php }else{ ?>  <b>Terjadi Penurunan Badan Tidak Diinginkan</b>   <?php }?> <?php }else{ ?>   <?php if (($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI1']+$_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI2'])<2){?>  Normal <?php }else{ ?> <b>Terjadi Penurunan Badan Tidak Diinginkan</b> <?php }?> <?php }?>


            </textarea>
        </td>
        <td>Tindakan (P)</td>
        <td>
            <div style="font-weight: bold;">
            <!-- Data tanggal : <?php echo $_smarty_tpl->getVariable('kp2')->value['mdd'];?>
 ,<?php echo $_smarty_tpl->getVariable('kp2')->value['FS_TINDAKAN'];?>
 -->
            </div>
            <textarea rows="4" cols="50" name="FS_TINDAKAN" onkeypress="handle7(event)" class="form-control tindakan">   </textarea>
        </td>
    </tr>
   <tr>
        <td>Diagnosa (A)</td>
        <td> 

            <textarea rows="5" cols="50" name="FS_DIAGNOSA" onkeypress="handle8(event)" class="form-control diagnosa"> </textarea>
        </td>
        <td>
            Hasil USG
          </td>
          <td>
              <textarea rows="5" cols="50" name="FS_USG" onkeypress="handle9(event)" class="form-control usg"> </textarea>
    </td> 
       
    </tr>
   <!--  <tr>
        <td>High Risk</td>
        <td> -->
            <input type="hidden" name="FS_HIGH_RISK" size="55" value="<?php echo $_smarty_tpl->getVariable('result')->value['FS_HIGH_RISK'];?>
"/>
  <!--       </td>
        <td></td> -->
        <!-- <td> -->
            <input type="hidden" name="FS_OBAT_PROLANIS" value="1">  
        <!-- </td> -->
   <!--  </tr> -->
    <tr>
        <td>
            Order Periksa Laboratorium
        </td>
        <td>  <select name="tujuan[]" multiple id="tujuan" style="width:250px">
            <option></option>
            </select>

    </td>
    <td>
        Order Periksa Radiologi
    </td>
    <td>
        <select name="tembusan[]" multiple id="tembusan" style="width:200px">
            <option></option>
        </select>
        Bagian
         <select name="FS_BAGIAN" style="width:70px">
            <option value=""></option>
            <option value="Sinistra">Sinistra</option>
            <option value="Dextra">Dextra</option>
            <option value="Bilateral">Bilateral</option>
        </select>
    </td>
  
</tr> 




 

  <tr>
        <td>
          EKG
        </td>
        <td>
         <select name="FS_EKG" style="width:270px">
            <option value=""></option>
            <option value="Ya">Ya</option>
            <option value="Tidak">Tidak</option>
        </select>
  </td>
</tr>






<?php if ($_smarty_tpl->getVariable('username')->value=='133'){?> 
<tr>
    <td>
      Pilih Paket Obat
    </td>
    <td>
        <select name="namapaketuya" class="namapaketuya select2" id="namapaketuya"  multiple id="namapaketuya" cols="50" style="width:210px">
            <option></option> 
            <option value="Uya 01">Uya 01</option> 
            <option value="Uya 02">Uya 02</option> 
            <option value="Uya 03">Uya 03</option> 
            <option value="Uya 04">Uya 04</option> 
            <option value="Uya 05">Uya 05</option> 
            <option value="Uya 06">Uya 06</option> 
            <option value="Uya 07">Uya 07</option> 
          </select>
</td>
</tr>
<?php }else{ ?>
<?php }?>





<?php if ($_smarty_tpl->getVariable('username')->value=='141'){?> 
<tr>
    <td>
      Pilih Paket Obat
    </td>
    <td>
        <select name="namapaketazz" class="namapaketazz select2" id="namapaketazz"  multiple id="namapaketazz" cols="50" style="width:210px">
            <option></option> 
            <option value="Azh resep 1">Azh resep 1</option>  
            <option value="Azh resep 2">Azh resep 2</option>  
            <option value="Azh resep 3">Azh resep 3</option>  
            <option value="Azh resep 4">Azh resep 4</option>  
            <option value="Azh resep 5">Azh resep 5</option>  
            <option value="Azh resep 6">Azh resep 6</option>  
            <option value="Azh resep 7">Azh resep 7</option>  
            <option value="Azh resep 8">Azh resep 8</option>  
          </select>
</td>
</tr>
<?php }else{ ?>
<?php }?>






<?php if ($_smarty_tpl->getVariable('username')->value=='121'){?> 
<tr>
    <td>
      Pilih Paket Obat
    </td>
    <td>
        <select name="namapakettris" class="namapakettris select2" id="namapakettris"  multiple id="namapakettris" cols="50" style="width:210px">
            <option></option> 
            <option value="Tres 01">Tres 01</option> 
            <option value="Tres 02">Tres 02</option> 
            <option value="Tres 03">Tres 03</option> 
            <option value="Tres 04">Tres 04</option> 
            <option value="Tres 05">Tres 05</option> 
            <option value="Tres 06">Tres 06</option> 

          </select>
</td>
</tr>
<?php }else{ ?>
<?php }?>


<?php if ($_smarty_tpl->getVariable('username')->value=='146'){?> 
<tr>
    <td>
      Pilih Paket Obat
    </td>
    <td>
        <select name="namapaketmul" class="namapaketmul select2" id="namapaketmul"  multiple id="namapaketmul" cols="50" style="width:210px">
            <option></option> 
            <option value="Mul 01">Mully 01</option> 
            <option value="Mul 02">Mully 02</option> 
            <option value="Mul 03">Mully 03</option> 
            <option value="Mul 04">Mully 04</option> 
            <option value="Mul 05">Mully 05</option>  
            <option value="Mul 06">Mully 06</option>
            <option value="Mul 07">Mully 07</option>

          </select>
</td>
</tr>
<?php }else{ ?>
<?php }?>




<?php if ($_smarty_tpl->getVariable('username')->value=='135'){?> 
<tr>
    <td>
      Pilih Paket Obat 
    </td>
    <td>
        <select name="namapaketirs" class="namapaketirs select2" id="namapaketirs"  multiple id="namapaketirs" cols="50" style="width:210px">
            <option></option> 
            <option value="irs 01">irs 01</option> 
            <option value="irs 02">irs 02</option> 
            <option value="irs 03">irs 03</option> 
            <option value="irs 04">irs 04</option> 
            <option value="irs 05">irs 05</option> 
            <option value="irs 06">irs 06</option> 
            <option value="irs 07">irs 07</option> 

          </select>
</td>
</tr>
<?php }else{ ?>
<?php }?>



<?php if ($_smarty_tpl->getVariable('username')->value=='128'){?> 
<tr>
    <td>
      Pilih Paket Obat
    </td>
    <td>
        <select name="namapaketgg" class="namapaketgg select2" id="namapaketgg"  multiple id="namapaketgg" cols="50" style="width:210px">
            <option></option> 
            <option value="gg 1">gg 1</option> 
            <option value="gg 2">gg 2</option> 
            <option value="gg 3">gg 3</option> 
            <option value="gg 4">gg 4</option> 
            <option value="gg 5">gg 5</option> 

          </select>
</td>
</tr>
<?php }else{ ?>
<?php }?>




<?php if ($_smarty_tpl->getVariable('username')->value=='152'){?> 
<tr>
    <td>
      Pilih Paket Obat
    </td>
    <td>
        <select name="namapakettw" class="namapakettw select2" id="namapakettw"  multiple id="namapakettw" cols="50" style="width:210px">
            <option></option> 
            <option value="TW1">TW1</option> 
            <option value="TW2">TW2</option> 
            <option value="TW3">TW3</option> 
            <option value="TW4">TW4</option> 
            <option value="TW5">TW5</option> 
            <option value="TW6">TW6</option> 
            <option value="TW7">TW7</option> 
            <option value="TW8">TW8</option> 
            <option value="TW9">TW9</option> 
            <option value="TW10">TW10</option> 
            <option value="TW11">TW11</option> 
            <option value="TW12">TW12</option> 
            <option value="TW13">TW13</option> 

          </select>
</td>
</tr>
<?php }else{ ?>
<?php }?>




<?php if ($_smarty_tpl->getVariable('username')->value=='137'){?> 
<tr>
    <td>
      Pilih Paket Obat
    </td>
    <td>
       <select name="namapakettht" class="namapakettht select2" id="namapakettht"  multiple id="namapakettht" cols="50" style="width:210px">
            <option></option> 
            <option value="SWD 1">SWD 1</option>
            <option value="SWD 2">SWD 2</option>
            <option value="SWD 3">SWD 3</option>
            <option value="SWD 4">SWD 4</option>
            <option value="SWD 5">SWD 5</option>
            <option value="SWD racik 1">SWD racik 1</option>
            <option value="SWD racik 2">SWD racik 2</option>
          </select>
</td>
</tr>
<?php }else{ ?>
<?php }?>



<tr>
    <td>
      
    </td>
    <td>
    
</td>
</tr>
  <tr>
    <?php if ($_smarty_tpl->getVariable('username')->value=='138'){?> 
    <input type="hidden" name="FS_TERAPI2" value=" ">
    
    <td>
        Pilih Paket  </td>
    <td> 
        <select name="namapaket" class="namapaket select2" id="namapaket"  multiple id="namapaket" cols="50" style="width:210px">
            <option></option> 
            <option value="Ortho A">Ortho A</option>
            <option value="Ortho B">Ortho B</option>
            <option value="Ortho C">Ortho C</option>
            <option value="Ortho D">Ortho D</option>
            <option value="Ortho E">Ortho E</option>
            <option value="Ortho F">Ortho F</option>
            <option value="Ortho G">Ortho G</option>
            <option value="Ortho H">Ortho H</option>
            <option value="Ortho I">Ortho I</option>
            <option value="Ortho J">Ortho J</option>

            
         </select>
    </td>
    <?php }else{ ?>
    <?php }?>

 

    <td>
        Terapi
    </td> 
    <td>
            <table>
                    <tr>
                        <td> Nama Obat </td>
                        <td> Numero </td>
                        <td> Signa </td>
                    </tr>
                     <tr> 
                            <td>  <select name="namaobat[]" class="namaobat select2"   multiple id="namaobat" cols="50" style="width:210px">
                                 <option></option> 
                              </select>
                            </td>
                            <td ><input cols="5" type="text" class="numero" name="numero" style="width: 40px;" onkeypress="handleKeyPress(event)" ></td>
                            <td>
                                <textarea cols="20" name="dosis" class="dosis" style="width: 50px;" onkeypress="handleKeyPress(event)" rows="1" ></textarea>
                               <!--  <input cols="20" type="text" name="dosis" class="dosis" style="width: 50px;" onkeypress="handleKeyPress(event)"></td> -->
                        </tr>
                   </table>


        <textarea rows="18" class="form-control resep"  cols="70" name="FS_TERAPI"> 
            </textarea> 
    </td>
<?php if ($_smarty_tpl->getVariable('username')->value=='138'){?> 
 
<?php }else{ ?>
  <td> 
    Resep Racikan 
  </td>
  <td>
    <table>
            <tr>
                <td> Nama Obat </td>
                <td> Numero </td>
                <td> m.f  </td>
                <td> Signa  </td>
            </tr>
             <tr> 
                    <td>  <select name="namaobat1[]" class="namaobat1 select2"   multiple id="namaobat1" cols="50" style="width:170px">
                         <option></option> 
                      </select>
                    </td>
                    <td ><input cols="5" type="text" class="numero1" name="numero1" style="width: 40px;" onkeypress="handle2(event)" ></td>
                    <td><input cols="20" type="text" name="mf1" class="mf1" style="width: 50px;" onkeypress="handle2(event)"  ></td>
                    <td><input cols="20" type="text" name="dosis1" class="dosis1" style="width: 50px;" onkeypress="handle3(event)"></td>
                </tr>
           </table>
          <textarea rows="15" class="form-control resepracik"   cols="60" name="FS_TERAPI2"> </textarea> 
</td>
<?php }?>
</tr>
<tr>
    <td>
        Kondisi Pulang
    </td>
    <td>
 
        <select name="FS_CARA_PULANG" id="surat_dari" class="select2" style="width: 190px;">
            <option value="0">--Pilih Cara Pulang--</option>
            <option value="0">Tidak Kontrol</option>
            <option value="2">Kontrol</option>
            <option value="3">Rawat Inap</option>
            <option value="4">Rujuk Luar RS</option>
            <!--<option value="5">PRB / Prolanis</option>-->
            <option value="6">Rujuk Internal</option>
            <option value="7">Kembali Ke Faskes Primer</option>
            <option value="8">PRB</option>
        </select>

    </td>
    <td>Planning</td>
    <td>
       <!--  <div style="font-weight: bold;">Data tanggal : <?php echo $_smarty_tpl->getVariable('kp2')->value['mdd'];?>
 ,<?php echo $_smarty_tpl->getVariable('kp2')->value['FS_PLANNING'];?>
</div> -->
        <input type="text" name="FS_PLANNING" size="55" value="<?php echo $_smarty_tpl->getVariable('last')->value['FS_PLANNING'];?>
"/>
    </td>
</tr>
<tr class="submit-box">
    <td colspan="4">
        <input type="submit" name="save" value="Simpan" class="edit-button" /> 
    </td>
</tr>
</table>
</form>
<br>
<br>
<table class="table-view" width="100%" border="0">
    <thead>
        <tr>
            <th colspan="5" style="font-size: 14px;">History Kunjungan<br><em>* untuk melihat history kunjungan klik tanggal di bawah ini</em></th>
        </tr>
    </thead>
    <table class="table-view" width="100%" border="0">
    <thead>
        <tr>
            <th width='10%'>Tanggal Kunjungan</th>

            <th>Dokter</th>
            <th>Layanan</th>
            <th>Catatan</th>
            <th>Status</th>
            <th width='24%'>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
      <?php $_smarty_tpl->tpl_vars['cek_labA'] = new Smarty_variable($_smarty_tpl->getVariable('m_rawat_jalan')->value->get_data_cek_lab_aja(array($_smarty_tpl->tpl_vars['data']->value['NO_REG'])), null, null);?>
        <?php $_smarty_tpl->tpl_vars['form_rm'] = new Smarty_variable($_smarty_tpl->getVariable('m_rawat_jalan')->value->get_berkas_by_rg(array($_smarty_tpl->tpl_vars['data']->value['NO_REG'])), null, null);?>
        <?php $_smarty_tpl->tpl_vars['cek_resepA'] = new Smarty_variable($_smarty_tpl->getVariable('m_rawat_jalan')->value->get_data_cek_resep_aja(array($_smarty_tpl->tpl_vars['data']->value['NO_REG'])), null, null);?>
        <?php $_smarty_tpl->tpl_vars['cek_konsulan'] = new Smarty_variable($_smarty_tpl->getVariable('m_rawat_jalan')->value->get_data_konsulan(array($_smarty_tpl->tpl_vars['data']->value['NO_REG'])), null, null);?>

                <tr <?php if (($_smarty_tpl->getVariable('no')->value++%2)!=1){?>class="blink-row"<?php }?>>
                    <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['TANGGAL'],"%d %B %Y");?>
</td>
                    
                    <td>
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['NAMA_DOKTER'];?>


                        <?php if ($_smarty_tpl->tpl_vars['data']->value['TANGGAL']==$_smarty_tpl->getVariable('noww')->value){?>
                           <?php if ($_smarty_tpl->getVariable('cek_konsulan')->value!=''){?>
                                 <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_KD_MEDIS']==$_smarty_tpl->getVariable('com_user')->value['user_name']){?>
                                    <?php  $_smarty_tpl->tpl_vars['cck'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cek_konsulan')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cck']->key => $_smarty_tpl->tpl_vars['cck']->value){
?>
                                     <br> <?php echo $_smarty_tpl->tpl_vars['cck']->value['NAMA_DOKTER'];?>

                                     <?php }} ?>
                                <?php }else{ ?> 
                                <?php }?>
                           <?php }else{ ?>
                           <?php }?>
                        <?php }else{ ?>

                          <?php if ($_smarty_tpl->tpl_vars['data']->value['KODE_RUANG']!=''){?>
                            <?php $_smarty_tpl->tpl_vars['visite'] = new Smarty_variable($_smarty_tpl->getVariable('m_rawat_jalan')->value->get_data_visite(array($_smarty_tpl->tpl_vars['data']->value['NO_REG'])), null, null);?>
                           <?php  $_smarty_tpl->tpl_vars['vst'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('visite')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['vst']->key => $_smarty_tpl->tpl_vars['vst']->value){
?>
                             <br><?php echo $_smarty_tpl->tpl_vars['vst']->value['NAMA_DOKTER'];?>

                            <?php }} ?>
                                <?php }?>
                        <br>
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['DOK2'];?>

                        <?php }?>
                    </td> 
                    <td>
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['SPESIALIS'];?>
<br>
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['LAYANAN2'];?>

                    </td> 
                    <td>
                        <?php if ($_smarty_tpl->getVariable('cek_labA')->value>='1'){?>
                        -  <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((((('rm/rawat_jalan/cetak_lab/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_FORM']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" >Hasil Laboratorium</a>
                          <br>
                        <?php }?>
                     
                        <?php if ($_smarty_tpl->getVariable('cek_resepA')->value>='1'){?>
                        - <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((((('rm/rawat_jalan/cetak_resep/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_FORM']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" >Resep</a>
                        <?php }?>
                    </td>
                    <td>
                        <center>
                            <b>
                                <?php if ($_smarty_tpl->tpl_vars['data']->value['KODE_RUANG']==''){?>
                                <div style="color: blue;">Rawat Jalan</div>
                                <?php }elseif($_smarty_tpl->tpl_vars['data']->value['KODE_RUANG']!=''){?>
                                <div style="color: green;">Rawat Inap</div>
                                <?php }?>
                            </b>
                        </center>
                    </td> 
                    <td>
                        <?php $_smarty_tpl->tpl_vars['x'] = new Smarty_variable($_smarty_tpl->getVariable('this')->value->com_user['user_name'], null, null);?>
                        <?php if ($_smarty_tpl->getVariable('form_rm')->value['att_name']!=''){?>
                            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('rm/upload/download/').($_smarty_tpl->getVariable('form_rm')->value['att_name']));?>
" class="button-download" target="_blank">Berkas Scan</a>  
                            <?php }?>
                       
                    
                          <?php if ($_smarty_tpl->tpl_vars['data']->value['KODE_RUANG']==''){?>
                             <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((((('rm/rawat_jalan/cetak_rm/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_FORM']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">RM</a>

                           <?php }else{ ?>
                        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('rm/berkas/detail/').($_smarty_tpl->tpl_vars['data']->value['NO_REG']))===null||$tmp==='' ? '' : $tmp));?>
"  class="button-download">Detail</a>             
                        <?php }?>
                        

                         
                        
                         <?php if ($_smarty_tpl->tpl_vars['data']->value['NO_REG']==$_smarty_tpl->tpl_vars['data']->value['MAX_RG']){?>
                      
                        <?php }else{ ?>
                        <?php }?>
                        

                      
                        
                       
             

            </td>
            </tr>
        <?php }} ?>
    </tbody>
</table>
</table>



<script>
        var namaa = $(".namaa").val();
               $('.namaa').val(namaa+'\n R/ \t   no. \n S                    \n ----------------------------------------\n '); 
       
       
                $('.resepracik').val('\n /R');
                
                


               function tambahkop(e){
                   var yhr= new XMLHttpRequest();
                var key=e.keyCode || e.which;
                 if (key==13){
                               var resepracik = $(".resepracik").val(); 
                                   $('.resepracik').val(resepracik+'S                 \n ---------------------------------------- \n \n'+'R/  '); // Close / Tutup Modal Dialog
                 //    // alert(namaa);
                 }
               }
        
       
         $("#namapaket").change(function(){
                var resep = $(".resep").val();
                         if($("#namapaket").val() == "Ortho A"){
                            $('.resep').val(resep+'\n /R meloxicam 15mg no XXX \n  S 2 dd 1 tab  \n ---------------------------------------- \n \n /R Omeprazole 20mg no XXX \n S 1 dd 1 cap  \n ---------------------------------------- \n \n /R Alpentine 100mg no XX \n S 2 dd 1 cap \n ---------------------------------------- \n \n /R Eperison 50mg no XX \n S 2 dd 1 tab \n ---------------------------------------- \n \n /R Mecobalamin no XXX \n S 1 dd 1 cap \n ---------------------------------------- \n');
                            $('#namapaket').select2('data', null);                         
                         }
                         else  if($("#namapaket").val() == "Ortho B"){
                            $('.resep').val(resep+'\n /R meloxicam 15mg no XXX \n S 2 dd 1 tab  \n ---------------------------------------- \n \n /R Omeprazole 20mg no XXX \n S 1 dd 1 cap \n ---------------------------------------- \n \n /R Alpentine 100mg no XX \n S 2 dd 1 cap \n ---------------------------------------- \n \n /R Calcium no XXX \n S 1 dd 1 tab \n ---------------------------------------- \n \n');
                            $('#namapaket').select2('data', null);                         
                         }
                         else  if($("#namapaket").val() == "Ortho C"){
                            $('.resep').val(resep+'\n /R meloxicam 15mg no XV \n S 2 dd 1 tab \n ---------------------------------------- \n \n /R Omeprazole 20mg no X \n S 1 dd 1 cap  \n ---------------------------------------- \n \n /R Alpentine 100mg no XV \n S 2 dd 1 cap  \n ---------------------------------------- \n \n /R Calcium no X  \n S 1 dd 1 tab  \n ---------------------------------------- \n \n /R Cefadroxil 500mg no XV  \n S 2 dd 1 cap  \n ---------------------------------------- \n');
                            $('#namapaket').select2('data', null);                         
                         }
                         else  if($("#namapaket").val() == "Ortho D"){
                            $('.resep').val(resep+'\n /R meloxicam 15mg no XXX \n  S 2 dd 1 tab  \n ---------------------------------------- \n \n /R Omeprazole 20mg no XXX  \n S 1 dd 1 cap  \n ---------------------------------------- \n \n /R Alpentine 100mg no XX  \n S 2 dd 1 cap  \n ---------------------------------------- \n \n /R Calcium no XXX  \n S 1 dd 1 tab  \n ---------------------------------------- \n \n /R Cefadroxil 500mg no XV \n  S 2 dd 1 cap  \n ---------------------------------------- \n');
                            $('#namapaket').select2('data', null);                         
                         }
                         else  if($("#namapaket").val() == "Ortho E"){
                            $('.resep').val(resep+'\n /R meloxicam 15mg no XV  \n S 2 dd 1 tab  \n ---------------------------------------- \n \n /R Omeprazole 20mg no X  \n S 1 dd 1 cap  \n ---------------------------------------- \n \n /R Calcium no X  \n  S 1 dd 1 tab  \n ---------------------------------------- \n \n /R Cefadroxil 500mg no XV \n  S 2 dd 1 cap  \n ---------------------------------------- \n \n /R Clindamisin 300mg no XV  \n S 2 dd 1 cap  \n ---------------------------------------- \n');
                            $('#namapaket').select2('data', null);                         
                         }
                         else  if($("#namapaket").val() == "Ortho F"){
                            $('.resep').val(resep+'\n /R meloxicam 15mg no XXV  \n S 2 dd 1 tab \n ---------------------------------------- \n \n /R Omeprazole 20mg no XV  \n S 1 dd 1 cap  \n ---------------------------------------- \n \n /R Calcium no XV  \n S 1 dd 1 tab  \n ---------------------------------------- \n \n /R Cefadroxil 500mg no XV \n  S 2 dd 1 cap \n ---------------------------------------- \n \n /R Clindamisin 300mg no XXV  \n S 2 dd 1 cap \n ---------------------------------------- \n');
                            $('#namapaket').select2('data', null);                         
                         }
                         else  if($("#namapaket").val() == "Ortho G"){
                            $('.resep').val(resep+'\n /R meloxicam 15mg no XV  \n S 2 dd 1 tab \n ---------------------------------------- \n \n /R Omeprazole 20mg no XV  \n S 1 dd 1 cap \n ---------------------------------------- \n \n /R Calcium no XV  \n S 1 dd 1 tab \n ---------------------------------------- \n \n /R Ciproflosasin 500mg no XV  \n S 2 dd 1 tab \n ---------------------------------------- \n \n /R Clindamisin 300mg no XV  \n S 2 dd 1 cap \n ---------------------------------------- \n');
                            $('#namapaket').select2('data', null);                         
                         }
                         else  if($("#namapaket").val() == "Ortho H"){
                            $('.resep').val(resep+'\n /R meloxicam 15mg no XXV  \n S 2 dd 1 tab \n ---------------------------------------- \n \n /R Omeprazole 20mg no XV  \n S 1 dd 1 cap \n ---------------------------------------- \n \n /R Calcium no XV  \n S 1 dd 1 tab \n ---------------------------------------- \n \n /R Ciproflosasin 500mg no XXV  \n S 2 dd 1 tab \n ---------------------------------------- \n \n /R Clindamisin 300mg no XXV  \n S 2 dd 1 cap \n ---------------------------------------- \n');
                            $('#namapaket').select2('data', null);                         
                         }
                         else  if($("#namapaket").val() == "Ortho I"){
                            $('.resep').val(resep+'\n /R Calcium no X \n  S 1 dd 1 tab  \n ---------------------------------------- \n \n /R Cefadroxil 250mg no XV \n  S 2 dd 1 cap \n ---------------------------------------- \n \n /R Ibuprofen 200mg no XV  \n S 2 dd 1 tab \n ---------------------------------------- \n');
                            $('#namapaket').select2('data', null);                         
                         }
                         else  if($("#namapaket").val() == "Ortho J"){
                            $('.resep').val(resep+'\n /R Calcium no XXX  \n S 1 dd 1 tab \n ---------------------------------------- \n \n /R Cefadroxil 250mg no XV  \n S 2 dd 1 cap \n ---------------------------------------- \n \n /R Ibuprofen 200mg no XXX \n  S 2 dd 1 tab \n ---------------------------------------- \n');
                            $('#namapaket').select2('data', null);                         
                         }
                         else  if($("#namapaket").val() == "Ortho L"){
                            $('.resep').val(resep+'\n /R Cefadroxil sirup no I \n  S 2 dd 1 cth \n ---------------------------------------- \n \n /R Ibuprofen sirup no I  \n S 2 dd 1 cth \n ---------------------------------------- \n');
                            $('#namapaket').select2('data', null);                         
                         }

                });





 $("#namapakettht").change(function(){
                var resep = $(".resep").val();
                         if($("#namapakettht").val() == "SWD 1"){
                            $('.resep').val(resep+'\n /R   levofloksasin 500mg no VII \n  S 1 x 1 tab   \n ---------------------------------------- \n \n /R   tremenza no VII \n  S 1 x 1tab  \n ---------------------------------------- \n \n /R   parasetamol 500mg no XXI \n  S 3 x 1 tab  \n ---------------------------------------- \n \n /R akilen no 1 \n  S 2 x 4 tetes \n ---------------------------------------- \n');
                            $('#namapakettht').select2('data', null);                         
                         }
                         else  if($("#namapakettht").val() == "SWD 2"){
                            $('.resep').val(resep+'\n /R   Ciprofloksasin 500mg no XV \n  S 2 x 1tab  \n ---------------------------------------- \n \n /R   tremenza no VII \n  S 1 x 1 tab   \n ---------------------------------------- \n \n /R   parasetamol 500mg no XXI \n   S 3 x 1 tab    \n ---------------------------------------- \n \n /R   akilen no I S 2 x 4 tetes \n ---------------------------------------- \n');
                            $('#namapakettht').select2('data', null);                         
                         }
                           else  if($("#namapakettht").val() == "SWD 3"){
                            $('.resep').val(resep+'\n /R   tremenza no XV \n  S 2 x 1tab  \n ---------------------------------------- \n \n /R   metilprednisolon 4mg no XV \n  S 2 x 1 tab  \n ---------------------------------------- \n \n /R   cefadroksil 500mg no XV \n  S 2 x 1 cap  \n ---------------------------------------- \n \n /R   neurodek no VII \n  S 1 x 1tab  \n ---------------------------------------- \n');
                            $('#namapakettht').select2('data', null);                         
                         }
                           else  if($("#namapakettht").val() == "SWD 4"){
                            $('.resep').val(resep+'\n /R   tremenza no VII \n  S 1 x 1 tab   \n ---------------------------------------- \n \n /R   citikolin 500mg no VII \n  S 1 x 1 tab  \n ---------------------------------------- \n \n /R   neurodek no XV \n  S 2 x 1 tab  \n ---------------------------------------- \n');
                            $('#namapakettht').select2('data', null);                         
                         }
                           else  if($("#namapakettht").val() == "SWD 5"){
                            $('.resep').val(resep+'\n /R   Lansoprazol 30mg no VII \n  S 1 x 1 cap  \n ---------------------------------------- \n \n /R   sucralfat syp no 1 \n S 3 x 1 C  \n ---------------------------------------- \n \n /R   n asetil sistein no XV \n  S 2 x 1 cap  \n ---------------------------------------- \n \n /R cetirizin tab 10mg no XV \n  S 2 x 1tab   \n ---------------------------------------- \n');
                            $('#namapakettht').select2('data', null);                         
                         }
                            else  if($("#namapakettht").val() == "SWD racik 1"){
                            $('.resep').val(resep+' \n /R   parasetamol 650mg \n       diazepam 2mg \n        Mf caps no XV \n  S    2 kali 1 cap  \n ---------------------------------------- \n');
                            $('#namapakettht').select2('data', null);                         
                         }
                          else  if($("#namapakettht").val() == "SWD racik 2"){
                            $('.resep').val(resep+' \n /R  metilprednisolon 2 mg  \n      cetirizin 2 mg \n      parasetamol 75 mg \n       mf pulv dtd no XV \n  S  2 dd 1 pulv  \n ---------------------------------------- \n');
                            $('#namapakettht').select2('data', null);                         
                         }


                });








 $("#namapaketirs").change(function(){
                var resep = $(".resep").val();
                         if($("#namapaketirs").val() == "irs 01"){
                            $('.resep').val(resep+'\n /R Cefadroxyl 500mg no VI \n S 2 dd 1 cap \n ---------------------------------------- \n\n /R Asam mefenamat 500mg no X \n S 3 dd 1 tab \n ---------------------------------------- \n \n /R Ranitidine 150mg ni VI \n S 2 dd 1 tab \n ---------------------------------------- \n');
                            $('#namapaketirs').select2('data', null);                         
                         } 
                         else   if($("#namapaketirs").val() == "irs 02"){
                            $('.resep').val(resep+'\n /R Eperisone 50mg no VI \n S 2 dd 1 tab \n ---------------------------------------- \n\n /R Natrium diklofenak 50mg no VI \n S 2 dd 1 tab \n ---------------------------------------- \n \n /R Ranitidine 150mg no VI \n S 2 dd 1 tab \n ---------------------------------------- \n');
                            $('#namapaketirs').select2('data', null);                         
                         } 
                         else   if($("#namapaketirs").val() == "irs 03"){
                            $('.resep').val(resep+'\n /R Clindamycin 300mg no X \n S 3 dd 1 cap \n ---------------------------------------- \n \n /R Ibuprofen 400mg no X \n S 3 dd 1 tab \n ---------------------------------------- \n \n /R Omeprazole 20mg no III \n S 1 dd 1 cap \n ---------------------------------------- \n');
                            $('#namapaketirs').select2('data', null);                         
                         } 
                         else   if($("#namapaketirs").val() == "irs 04"){
                            $('.resep').val(resep+'\n /R Eperisone 50mg no VI \n S 2 dd 1 tab \n ---------------------------------------- \n\n /R Ibuprofen 400mg no X \n S 3 dd 1 tab \n ---------------------------------------- \n\n /R Ranitidine 150mg no VI \n S 2 dd 1 tab \n ---------------------------------------- \n');
                            $('#namapaketirs').select2('data', null);                         
                         } 
                         else   if($("#namapaketirs").val() == "irs 05"){
                            $('.resep').val(resep+'\n /R Mecobalamin 500mcg no X \n S 3 dd 1 cap \n ---------------------------------------- \n\n /R Vit B comp tab no III \n S 1 dd 1tab \n ---------------------------------------- \n\n /R Methylprednisolon 4mg no X \n S 3 dd 1 tab \n ---------------------------------------- \n\n /R Omeprazole 20mg no III \n S 1 dd 1 cap \n ---------------------------------------- \n');
                            $('#namapaketirs').select2('data', null);                         
                         } 
                         else   if($("#namapaketirs").val() == "irs 06"){
                            $('.resep').val(resep+'\n /R Cefixime 200mg no VI \n S 2 dd 1 cap \n ---------------------------------------- \n\n /R Metronidazole 500mg no X \n S 3 dd 1 tab \n ---------------------------------------- \n\n /R Asam mefenamat 500mg no X \n S 3 dd 1 tab \n ---------------------------------------- \n\n /R Ranitidine 150mg no VI \n S 2 dd 1 tab \n ---------------------------------------- \n');
                            $('#namapaketirs').select2('data', null);                         
                         } 
                         else   if($("#namapaketirs").val() == "irs 07"){
                            $('.resep').val(resep+'\n /R Amoxicillin clavulanat 500mg no X \n S 3 dd 1 tab \n ---------------------------------------- \n\n /R Metronidazole 500mg no X \n S 3 dd 1 tab \n ---------------------------------------- \n\n /R Ibuprofen 400mg no X \n S 3 dd 1 tab \n ---------------------------------------- \n\n /R Methylprednisolon 4mg no X \n S 3 dd 1 tab \n ---------------------------------------- \n\n /R Ranitidine 150mgno VI \n S 2 dd 1 tab \n ---------------------------------------- \n');
                            $('#namapaketirs').select2('data', null);                         
                         } 


                });





                $("#namapaketuya").change(function(){
                var resep = $(".resep").val();
                         if($("#namapaketuya").val() == "Uya 04"){
                            $('.resep').val(resep+'\n /R   Anbacim no I \n  S 1 dd 1 gr  \n ---------------------------------------- \n \n /R   Metronidazole inf no III \n  S 3 dd 1 flas  \n ---------------------------------------- \n \n /R   Ketorolak inj no III \n  S 3 dd 1 amp  \n ---------------------------------------- \n \n /R   Asam tranexamat inj no III \n  S 3 dd 1 amp  \n ---------------------------------------- \n \n /R   Asam mefenamat tab no III \n  S 3 dd 1 tab  \n ---------------------------------------- \n \n /R   Pronalges supp no III \n  S 3 dd 1 supp  \n ---------------------------------------- \n \n /R   Parasetamol inf no I \n  S 1 dd 1 fls   \n ---------------------------------------- \n \n /R   Calfemil no I \n  S 1 dd 1 cap  \n ---------------------------------------- \n \n /R   Vitamin D no I \n  S 1 dd 1 tab  \n ---------------------------------------- \n');
                            $('#namapaketuya').select2('data', null);                         
                         }
                         else if($("#namapaketuya").val() == "Uya 05"){
                            $('.resep').val(resep+'\n /R   Nifedipin tab no IV \n  S 4 dd 1 tab  \n ---------------------------------------- \n  \n /R   Hystolan no 1 \n  S 2 dd ½ tab  \n ---------------------------------------- \n \n /R   Dexametason inj no IV \n  S 2 dd 2 amp  \n ---------------------------------------- \n \n /R   Calfemil no I \n  S 1 dd 1 cap  \n ---------------------------------------- \n \n /R   Vitamin D no I \n  S 1 dd 1 tab  \n ---------------------------------------- \n');
                            $('#namapaketuya').select2('data', null);                         
                         }
                         else if($("#namapaketuya").val() == "Uya 06"){
                            $('.resep').val(resep+'\n /R   Infus RL kolf no II \n  S 2 dd 1 kolf  \n ---------------------------------------- \n \n /R   Infuse D5% kolf no II \n  S 2 dd 1 kolf  \n ---------------------------------------- \n \n /R   Valamin kolf no I \n  S 1 dd 1 kolf  \n ---------------------------------------- \n \n /R   Folamil cap no I \n  S 1 dd 1 cap  \n ---------------------------------------- \n \n /R   Vitamin D no I \n  S 1 dd 1 tab  \n ---------------------------------------- \n');
                            $('#namapaketuya').select2('data', null);                         
                         }

                           else if($("#namapaketuya").val() == "Uya 01"){
                            $('.resep').val(resep+'\n /R Cefadroxil 500mg no XX \n S 2 dd 1 cap \n ---------------------------------------- \n \n /R Asam mefenamat no XX \n S 3 dd 1 tab \n ---------------------------------------- \n \n /R Pronalges suppo \n S 3 dd 1 suppo \n ---------------------------------------- \n \n /R Calfemil no X \n S 1 dd 1 cap \n ---------------------------------------- \n \n /R Vibumin no V \n S 1 dd 1 tab \n ---------------------------------------- \n');
                            $('#namapaketuya').select2('data', null);                         
                         }
                           else if($("#namapaketuya").val() == "Uya 02"){
                            $('.resep').val(resep+'\n /R Amoxicilin 500mg no XX \n S 3 dd 1 tab \n ---------------------------------------- \n \n /R Asam mefenamat no XX \n S 3 dd 1 tab \n ---------------------------------------- \n \n /R Calfemil no X \n S 1 dd 1 cap \n ---------------------------------------- \n \n /R Vitamin D no x \n S 1 dd 1 tab \n ---------------------------------------- \n');
                            $('#namapaketuya').select2('data', null);                         
                         }
                           else if($("#namapaketuya").val() == "Uya 03"){
                            $('.resep').val(resep+'\n /R Ciproflosasin 500mg no XX \n S 2 dd 1 tab \n ---------------------------------------- \n \n /R Asam mefenamat no XX \n S 3 dd 1 tab \n ---------------------------------------- \n \n /R Calfemil no X \n S 1 dd 1 cap \n ---------------------------------------- \n \n /R Vitamin D no x \n S 1 dd 1 tab \n ---------------------------------------- \n');
                            $('#namapaketuya').select2('data', null);                         
                         }
                           else if($("#namapaketuya").val() == "Uya 07"){
                            $('.resep').val(resep+'\n /R Calfemil No X \n S 1 dd 1  Cap \n ---------------------------------------- \n \n /R Vitamin D No X \n S 1 dd 1 tab \n ---------------------------------------- \n');
                            $('#namapaketuya').select2('data', null);                         
                         }
                        
                });




 $("#namapaketazz").change(function(){
                var resep = $(".resep").val();
                         if($("#namapaketazz").val() == "Azh resep 1"){
                            $('.resep').val(resep+'\n /R  ceterizin syr fl\n  S no.I \n  S 1dd 1 cth \n ---------------------------------------- \n \n /R  prednison 5mg \n Mf pulv dtd no. VII \n  S 1dd 1 pulv \n ---------------------------------------- \n ');
                            $('#namapaketazz').select2('data', null);                         
                         } 
                         else  if($("#namapaketazz").val() == "Azh resep 2"){
                            $('.resep').val(resep+'\n /R  clobetasol 10gr no. 2 \n Cr. Afucid 5gr no.2 \n As. Salisilat 2% \n  S 2 dd ue \n ---------------------------------------- \n \n /R  desolex sol 30l no.1 \n Calamin 70ml \n Mf da in pot \n S 2 dd ue \n ---------------------------------------- \n ');
                            $('#namapaketazz').select2('data', null);                         
                         } 
                          else  if($("#namapaketazz").val() == "Azh resep 3"){
                            $('.resep').val(resep+'\n /R  cefixime 200mg no.III \n  S 1dd 2 tab malam \n ---------------------------------------- \n  \n /R azitromycin 500mg no.III \n  S 1dd 2 tab pagi \n ---------------------------------------- \n ');
                            $('#namapaketazz').select2('data', null);                         
                         } 
                          else  if($("#namapaketazz").val() == "Azh resep 4"){
                            $('.resep').val(resep+'\n /R  clobetasol 10gr no. I \n Cr afucid 5gr no. II  \n  S 2 dd ue \n ---------------------------------------- \n \n /R  medscab 30gr no.½ \n Cr. Clobetasok 10gr no. I \n As. Salisilat 2% \n Mf da in pot \n  S 2 dd ue \n ---------------------------------------- \n  \n /R  loratadine 10mg no. XIV \n  S 1 dd 1tab \n ---------------------------------------- \n ');
                            $('#namapaketazz').select2('data', null);                         
                         } 
                          else  if($("#namapaketazz").val() == "Azh resep 5"){
                            $('.resep').val(resep+'\n /R  medscab 30gr no.1 \n Sue (malam, leher-kaki, 8-10 jam tdk kena air) \n ---------------------------------------- \n  \n /R  medscab 15gr no. I \n Cr. Afucid 5gr no. III \n As. Salisilat 2%  \n  S 2 dd ue \n ---------------------------------------- \n \n /R  loratadin 10mg tab no. XIV \n  S 1 dd 1 tab \n ---------------------------------------- \n  \n /R  co. Amoxiclav no. XXI \n  S 3 dd 1 tab \n ---------------------------------------- \n');
                            $('#namapaketazz').select2('data', null);                         
                         } 
                          else  if($("#namapaketazz").val() == "Azh resep 6"){
                            $('.resep').val(resep+'\n /R  clobetasol 10gr. No.V \n Vaselin 20gr \n Lanolin 10% \n  S 2 dd ue \n ---------------------------------------- \n  \n /R  carmed 10% 40gr no. ½ \n Clobetasol 10gr no. I \n As. Salisilat 2%  \n  S 2 dd ue \n ---------------------------------------- \n  \n /R  metilprednisolon 8mg no. X \n  S 1 dd 1 tab \n ---------------------------------------- \n  \n /R  loratadin 10mg no. X \n  S 1 dd 1 tab \n ---------------------------------------- \n');
                            $('#namapaketazz').select2('data', null);                         
                         } 
                          else  if($("#namapaketazz").val() == "Azh resep 7"){
                            $('.resep').val(resep+'\n /R  ketoconazol 10gr no. IV \n Momrtason 10gr no. I \n As. Salisilat 2% \n  S 2 dd ue \n ---------------------------------------- \n  \n /R  afucid cr 5gr no.II \n As. Salisilat 30% \n  S 2 dd ue \n ---------------------------------------- \n \n /R  loratadin 10mg no. XIV \n  S 1 dd 1 tab \n ---------------------------------------- \n ');
                            $('#namapaketazz').select2('data', null);                         
                         } 
                          else  if($("#namapaketazz").val() == "Azh resep 8"){
                            $('.resep').val(resep+'\n /R  desoximethasone 10gr no. II \n Carmed 10% 40gr no. ½ \n Lcd 2% \n As. Salisilat 2% \n  S 2 dd ue \n ---------------------------------------- \n  \n /R  ketoconazole 10gr no. II \n As. Salisilat 2% \n  S 2 dd ue \n ---------------------------------------- \n  \n /R  albendazole 1000mg \n As. Fucidat 5gr no. 2 \n Mf da in pot \n  S 2 dd ue \n ---------------------------------------- \n');
                            $('#namapaketazz').select2('data', null);                         
                         } 
                        
                });





    $("#namapaketgg").change(function(){
                var resep = $(".resep").val();
                         if($("#namapaketgg").val() == "gg 1"){
                            $('.resep').val(resep+'\n /R   Amoxilin 250mg no X  \n  S 3 dd 1 tab \n ---------------------------------------- \n \n /R   Paracetamol 250mg no X \n  S 3 dd 1 tab \n ---------------------------------------- \n');
                            $('#namapaketgg').select2('data', null);                         
                         }
                         else      if($("#namapaketgg").val() == "gg 2"){
                            $('.resep').val(resep+'\n /R   Amoxilin 500mg no X   \n  S 3 dd 1 tab  \n ---------------------------------------- \n \n /R   Paracetamol 500mg no X   \n  S 3 dd 1 tab  \n ---------------------------------------- \n \n /R   Ibuprofen 400mg no X  \n  S 3 dd 1 tab  \n ---------------------------------------- \n');
                            $('#namapaketgg').select2('data', null);                         
                         }
                         else      if($("#namapaketgg").val() == "gg 3"){
                            $('.resep').val(resep+'\n /R   Cefadroxil 500mg no X \n  S 2 dd 1 cap  \n ---------------------------------------- \n \n /R   Ibuprofen 400mg no X  \n  S 3 dd 1 tab  \n ---------------------------------------- \n');
                            $('#namapaketgg').select2('data', null);                         
                         }
                         else      if($("#namapaketgg").val() == "gg 4"){
                            $('.resep').val(resep+'\n /R   Cefadroxil 500mg no X \n  S 2 dd 1 cap  \n ---------------------------------------- \n \n /R   Ibuprofen 400mg no X  \n  S 3 dd 1 tab  \n ---------------------------------------- \n \n /R   Methylprednisolon 4 mg no X \n  S 2 dd 1 tab  \n ---------------------------------------- \n');
                            $('#namapaketgg').select2('data', null);                         
                         }
                         else      if($("#namapaketgg").val() == "gg 5"){
                            $('.resep').val(resep+'\n /R   Cefadroxil 500mg no X \n  S 2 dd 1 cap  \n ---------------------------------------- \n \n /R   Ibuprofen 400mg no X  \n  S 3 dd 1 tab  \n ---------------------------------------- \n  \n /R   Betadyne kumur fe 1 \n  S Kumur-kumur 2 dd 1  \n ---------------------------------------- \n');
                            $('#namapaketgg').select2('data', null);                         
                         }
                     
                });







                $("#namapakettris").change(function(){
                var resep = $(".resep").val();
                         if($("#namapakettris").val() == "Tres 01"){
                            $('.resep').val(resep+'\n /R   Anbacim 1gr no II \n  S 2 dd 1 vial  \n ---------------------------------------- \n  \n /R   Asam tranexamat inj no III \n  S 3 dd 1 Ampl  \n ---------------------------------------- \n  \n /R   Parasetmalo inf no II \n  S 2 dd 1 inf  \n ---------------------------------------- \n \n /R   Profenit suppo no III \n  S 3 dd 1 suppo  \n ---------------------------------------- \n \n /R   Ondancentron tab no III \n S 3 dd 1 tab  \n ---------------------------------------- \n \n /R   Na diklofenak 25mg no II \n S 2 dd 1 tab \n ---------------------------------------- \n \n /R   Metromidazole inf no III \n  S 1 flas per 8 jam   \n ---------------------------------------- \n ');
                            $('#namapakettris').select2('data', null);                         
                         }
                         else   if($("#namapakettris").val() == "Tres 02"){
                            $('.resep').val(resep+'\n /R   cefotaxime 1gr no II \n  S 2 dd 1 vial  \n ---------------------------------------- \n \n /R   Dexametason inj no II \n  S 2 dd 1 Ampl  \n ---------------------------------------- \n  \n /R   Nifedipin 10mg no IV \n  S 4 dd 1 tab  \n ---------------------------------------- \n \n /R   Profenit suppo no III \n  S 3 dd 1 suppo  \n ---------------------------------------- \n');
                            $('#namapakettris').select2('data', null);                         
                         }
                         else   if($("#namapakettris").val() == "Tres 03"){
                            $('.resep').val(resep+'\n /R   cefotaxime 1gr no II \n  S 2 dd 1 vial  \n ---------------------------------------- \n \n /R   Neurosanbe amp no I \n  S 1 dd 1 Ampl drip  \n ---------------------------------------- \n  \n /R   Omeprazole vial no I \n  S 1 dd 1 vial  \n ---------------------------------------- \n \n /R   Ondancetron amp no III \n  S 3 dd 1 Amp  \n ---------------------------------------- \n');
                            $('#namapakettris').select2('data', null);                         
                         }
                         else   if($("#namapakettris").val() == "Tres 04"){
                            $('.resep').val(resep+'\n /R   Cefixime 200mg tab No XV \n  S 2 dd 1 tab \n ---------------------------------------- \n \n /R   Na diklofenak 25mg No X  \n  S 2 dd 1 tab \n ---------------------------------------- \n \n /R   Antasida tab No XX \n  S 3 dd 1 tab AC \n ---------------------------------------- \n');
                            $('#namapakettris').select2('data', null);                         
                         }
                            else   if($("#namapakettris").val() == "Tres 05"){
                            $('.resep').val(resep+'\n /R   Cefixime 200mg tab no XV \n  S 2 dd 1 tab \n ---------------------------------------- \n \n /R   Metergin tab no XV \n  S 3 dd 1 tab \n ---------------------------------------- \n \n /R   Antasida tab no XX \n  S 3 dd 1 tab AC \n ---------------------------------------- \n');
                            $('#namapakettris').select2('data', null);                         
                         }
                             else   if($("#namapakettris").val() == "Tres 06"){
                            $('.resep').val(resep+'\n /R   Cefixime 200mg cap no X \n  S 2 dd 1 cap \n ---------------------------------------- \n \n /R   Metergin tab no XV \n  S 3 dd 1 tab \n ---------------------------------------- \n ');
                            $('#namapakettris').select2('data', null);                         
                         }
                        
                });



                $("#namapaketmul").change(function(){
                var resep = $(".resep").val();
                         if($("#namapaketmul").val() == "Mul 01"){
                            $('.resep').val(resep+'\n /R   Amoxicilin 500mg no.X  \n  S 3 dd 1 Cap \n /R   Pct 500mg no.X  \n  S  3 dd 1 Tab  \n ---------------------------------------- \n ');
                            $('#namapaketmul').select2('data', null);                         
                         }
                        else if($("#namapaketmul").val() == "Mul 02"){
                            $('.resep').val(resep+'\n /R   Amoxicilin 500mg no.X   \n  S  3 dd 1 Cap \n /R   Asmef 500mg no.X   \n  S  3 dd 1 Tab  \n ---------------------------------------- \n');
                            $('#namapaketmul').select2('data', null);                         
                         }
                         else if($("#namapaketmul").val() == "Mul 03"){
                            $('.resep').val(resep+'\n /R   Clindamycin 150mg no.X   \n  S  2 dd 1 Cap \n /R   Pct 500mg no.X   \n  S  3 dd 1 Tab  \n ---------------------------------------- \n');
                            $('#namapaketmul').select2('data', null);                         
                         }

                         else if($("#namapaketmul").val() == "Mul 04"){
                            $('.resep').val(resep+'\n /R   Clindamycin 150mg no.X   \n  S   2 dd 1 Cap \n /R   Pct 500mg no.X   \n  S  3 dd 1 Tab \n /R   Lansoprazole 30mg no.X   \n  S  2 dd 1 Cap   \n ---------------------------------------- \n');
                            $('#namapaketmul').select2('data', null);                         
                         }

                         else if($("#namapaketmul").val() == "Mul 05"){
                            $('.resep').val(resep+'\n /R   Clindamycin 150mg no.X   \n  S   2 dd 1 Cap \n /R   Asmef 500mg no.X   \n  S  3 dd 1 Tab \n /R   Lansoprazole 30mg no.X   \n  S  2 dd 1 Cap  \n ---------------------------------------- \n');
                            $('#namapaketmul').select2('data', null);                         
                         }
                         else if($("#namapaketmul").val() == "Mul 06"){
                            $('.resep').val(resep+'\n /R Cefadroxil 500mg no VI \n S   2 dd 1 \n /R  Ibuprofen 400mg no X \n S 3 dd 1 \n ----------------------------------------- \n');
                            $('#namapaketmul').select2('data', null);
                         }
                         else if($("#namapaketmul").val() == "Mul 07"){
                            $('.resep').val(resep+'\n /R Cefadroxil 500mg no VI \n S   2 dd 1 \n /R  Asam Mefenamat 500mg no X \n     S 3 dd 1 \n ------------------------------------------ \n');
                            $('#namapaketmul').select2('data',null);
                         }


                        
                });







                   $("#namapakettw").change(function(){
                var resep = $(".resep").val();
                         if($("#namapakettw").val() == "TW1"){
                            $('.resep').val(resep+'\n /R  aspilet 80 mg \n S 1 dd 1 pc pagi  \n ---------------------------------------- \n \n /R  citicoline tab 500 mg \n S 2 dd 1 pc  \n ---------------------------------------- \n \n /R  amlodipin 10 mg \n S 1 dd 1 pc sore  \n ---------------------------------------- \n \n /R  mecobalamin 500 mg \n S 2 dd 1 pc  \n ---------------------------------------- \n \n /R  ranitidin 150 mg \n S 2 dd 1 ac  \n ---------------------------------------- \n ');
                            $('#namapakettw').select2('data', null);                         
                         }
                         else   if($("#namapakettw").val() == "TW2"){
                            $('.resep').val(resep+'\n /R  citicoline tab 500 mg \n S 2 dd 1 pc \n ---------------------------------------- \n \n /R  PCT 500 mg \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  Mecobalamin 500 mg \n S 2 dd 1 pc  \n ---------------------------------------- \n \n /R  amlodipin 10 mg \n S 2 dd 1 pc sore  \n ---------------------------------------- \n \n /R  ranitidin 150 mg \n S 2 dd 1 ac  \n ---------------------------------------- \n');
                            $('#namapakettw').select2('data', null);                         
                         }
                         else   if($("#namapakettw").val() == "TW3"){
                            $('.resep').val(resep+'\n /R  PCT 500 mg \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  diazepam 2 mg \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  ergotamine caffein 1 mg \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  depakote 500 mg \n S 2 dd 1 pc  \n ---------------------------------------- \n \n /R  ranitidin 150 mg \n S 2 dd 1 ac  \n ---------------------------------------- \n');
                            $('#namapakettw').select2('data', null);                         
                         }
                         else   if($("#namapakettw").val() == "TW4"){
                            $('.resep').val(resep+'\n /R  PCT 500 mg \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  analsik \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  ranitidin 150 mg, 2 dd 1 ac  \n ---------------------------------------- \n ');
                            $('#namapakettw').select2('data', null);                         
                         }
                         else   if($("#namapakettw").val() == "TW5"){
                            $('.resep').val(resep+'\n /R  meloxicam 15 mg \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  dexamethasone 0,5 mg \n S 3 dd 1 pc \n ---------------------------------------- \n \n /R  diazepam 2 mg, 3 dd 1 pc  \n ---------------------------------------- \n \n /R  PCT 500 mg \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  Glucosamine 500 mg \n S 2 dd 1 pc  \n ---------------------------------------- \n \n /R  ranitidin 150 mg \n S 2 dd 1 ac  \n ---------------------------------------- \n \n /R  neurodex \n S 2 dd 1 pc \n ---------------------------------------- \n');
                            $('#namapakettw').select2('data', null);                         
                         }
                         else   if($("#namapakettw").val() == "TW6"){
                            $('.resep').val(resep+'\n /R  PCT 500 mg \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  diazepam 2 mg \n S 2 dd 1 pc  \n ---------------------------------------- \n \n /R  amitriptilin 12,5 mg \n S 2 dd 1 pc  \n ---------------------------------------- \n \n /R  Gabapentine 100 mg \n S 2 dd 1 pc  \n ---------------------------------------- \n \n /R  ranitidin 150 mg \n S 2 dd 1 ac  \n ---------------------------------------- \n \n /R  Neurodex \n S 2 dd 1 pc  \n ---------------------------------------- \n');
                            $('#namapakettw').select2('data', null);                         
                         }
                         else   if($("#namapakettw").val() == "TW7"){
                            $('.resep').val(resep+'\n /R  clobazam 5 mg \n S 1 dd 1 malam  \n ---------------------------------------- \n \n /R  haloperidol 0,5 mg \n S 2 dd 1 pc  \n ---------------------------------------- \n \n /R  vitamin B komplek \n S 2 dd 1 pc  \n ---------------------------------------- \n');
                            $('#namapakettw').select2('data', null);                         
                         }
                         else   if($("#namapakettw").val() == "TW8"){
                            $('.resep').val(resep+'\n /R  MP 4 mg \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  Meloxicam 15 mg, 3 dd 1 pc  \n ---------------------------------------- \n \n /R  ranitidin 150 mg \n S 2 dd 1 ac  \n ---------------------------------------- \n \n /R  gabapentine 100 mg \n S 2 dd 1 pc  \n ---------------------------------------- \n \n /R  vit B Komplek \n S 2 dd 1 pc  \n ---------------------------------------- \n');
                            $('#namapakettw').select2('data', null);                         
                         }
                         else   if($("#namapakettw").val() == "TW9"){
                            $('.resep').val(resep+'\n /R  Maprotline HCL / Sandepril 50 mg \n S 1 dd 1 pc  \n ---------------------------------------- \n \n /R  clobazam 10 mg \n S 1 dd 1 pc  \n ---------------------------------------- \n \n /R  Eperison HCL 50 mg \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  PCT 500 mg \n S 3 dd 1 pc \n ---------------------------------------- \n \n /R  vitamin B komplek \n S 2 dd 1 pc \n ---------------------------------------- \n');
                            $('#namapakettw').select2('data', null);                         
                         }
                         else   if($("#namapakettw").val() == "TW10"){
                            $('.resep').val(resep+'\n /R  Levodopa 100 mg \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  Arkin 2 mg, 3 dd 1 pc  \n ---------------------------------------- \n \n /R  vitamin B komplek \n S 3 dd 1 pc  \n ---------------------------------------- \n');
                            $('#namapakettw').select2('data', null);                         
                         }
                         else   if($("#namapakettw").val() == "TW11"){
                            $('.resep').val(resep+'\n /R  donepezil 10 mg \n S 1 dd 1 pc  \n ---------------------------------------- \n \n /R  tebokan 40 mg \n S 2 dd 1 pc  \n ---------------------------------------- \n \n /R  sukralfat syrup \n S 3 dd 1 CTH ac  \n ---------------------------------------- \n \n /R  mecobalamin 500 mg \n S 2 dd 1 pc');
                            $('#namapakettw').select2('data', null);                         
                         }
                         else   if($("#namapakettw").val() == "TW12"){
                            $('.resep').val(resep+'\n /R  mestinon 60 mg \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  MP 16 mg \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  Ranitidin 150 mg \n S 2 dd 1 ac  \n ---------------------------------------- \n \n /R  Vitamin B komplek \n S 2 dd 1 pc  \n ---------------------------------------- \n');
                            $('#namapakettw').select2('data', null);                         
                         }
                           else   if($("#namapakettw").val() == "TW13"){
                            $('.resep').val(resep+'\n /R  betahistine 6 mg \n S 3 dd 2 tab pc  \n ---------------------------------------- \n \n /R  flunarizine 10 mg, 1 dd 1 pc malam \n ---------------------------------------- \n \n /R  PCT 500 mg \n S 3 dd 1 pc  \n ---------------------------------------- \n \n /R  ranitidin 150 mg \n S 2 dd 1 ac  \n ---------------------------------------- \n \n /R  vit B komplek \n S 2 dd 2 pc \n ---------------------------------------- \n');
                            $('#namapakettw').select2('data', null);                         
                         }
                      
                        
                });










       
   function handleKeyPress(e){
                   var yhr= new XMLHttpRequest();
                var key=e.keyCode || e.which;
                 if (key==13){
                               var namaobat = $("#namaobat").val();
                               var numero = $(".numero").val();
                               var dosis = $(".dosis").val();
                             var kolomresep= document.getElementById("kolomresep");
                              var resep = $(".resep").val();
       
       $('.resep').val(resep+'\n /R   '+namaobat+'   no. '+numero+'\n S    '+dosis+'\n ----------------------------------------------- \n '); 
               //    alert(namaobat+numero+dosis);
                  $('#namaobat').select2('data', null);
                  $('.numero').val(null);
                  $('.dosis').val(null);
        
               //    $("#namaobat").select2({}).focus();
                  $("#namaobat").select2('open');
        
                 }
               }

var x=event.key;
if(x=='a'||x=='A'){
    alert("hore");
}
           

 function handle2(e){
                   var key=e.keyCode || e.which;
                 if (key==13){
                               var namaobat1 = $("#namaobat1").val();
                               var numero1 = $(".numero1").val();
                            //    var dosis1 = $(".dosis1").val();
                                var resepracik = $(".resepracik").val();
       
       $('.resepracik').val(resepracik+'    '+namaobat1+'   no. '+numero1+'\n     '); 
               //    alert(namaobat+numero+dosis);
                  $('#namaobat1').select2('data', null);
                  $('.numero1').val(null);
                  $('.dosis1').val(null);
        
               //    $("#namaobat").select2({}).focus();
                  $("#namaobat1").select2('open');
        
                 }
               }


               
 function handle3(e){
                   var key=e.keyCode || e.which;
                 if (key==13){
                               var namaobat1 = $("#namaobat1").val();
                               var numero1 = $(".numero1").val();
                               var dosis1 = $(".dosis1").val();
                               var mf1 = $(".mf1").val();
                                var resepracik = $(".resepracik").val();
       if(namaobat1==null){
        $('.resepracik').val(resepracik+'          '+mf1+'\n   S  '+dosis1+'\n ------------------------------------------------- \n \n   /R'); 
       }
       else{
       $('.resepracik').val(resepracik+'    '+namaobat1+'   no. '+numero1+'\n'+'           '+mf1+'\n    S      '+dosis1+'\n ------------------------------------------ \n \n  /R'); 
            }     //    alert(namaobat+numero+dosis);
                  $('#namaobat1').select2('data', null);
                  $('.numero1').val(null);
                  $('.dosis1').val(null);
                  $('.mf1').val(null);
        
               //    $("#namaobat").select2({}).focus();
                  $("#namaobat1").select2('open');
        
                 }
               }
       




                function handle5(e){
                   var key=e.keyCode || e.which;
                 if (key==13){
                               var anamnesa = $(".anamnesa").val(); 
                               $('.anamnesa').val(anamnesa+'\n');   }
                  }


                    function handle6(e){
                   var key=e.keyCode || e.which;
                 if (key==13){
                               var daftarmasalah = $(".daftarmasalah").val(); 
                               $('.daftarmasalah').val(daftarmasalah+'\n');   }
                  }


                    function handle7(e){
                   var key=e.keyCode || e.which;
                 if (key==13){
                               var tindakan = $(".tindakan").val(); 
                               $('.tindakan').val(tindakan+'\n');   }
                  }


                    function handle8(e){
                   var key=e.keyCode || e.which;
                 if (key==13){
                               var diagnosa = $(".diagnosa").val(); 
                               $('.diagnosa').val(diagnosa+'\n');   }
                  }



                    function handle9(e){
                   var key=e.keyCode || e.which;
                 if (key==13){
                               var usg = $(".usg").val(); 
                               $('.usg').val(usg+'\n');   }
                  }

    </script> 
       
       
       <script type="text/javascript"> 
           var user = $("#user").val(); 
       
           $('#namaobat').select2('data', null);
                   $('#namaobat').select2('data', null);
                   $("#namaobat").removeAttr("disabled");
       
                   jQuery("#namaobat").html('');
                   $.ajax({
                   type: "POST", 
                           url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/list_nama_obat/');?>
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
                                   jQuery("#namaobat").html(showData);
                           }
                   });
                   //tags
                  




























       
                   //tags




                   $('#namaobat1').select2('data', null);
                   $('#namaobat1').select2('data', null);
                   $("#namaobat1").removeAttr("disabled");
       
                   jQuery("#namaobat1").html('');
                   $.ajax({
                   type: "POST", 
                           url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/list_nama_obat/');?>
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
                                   jQuery("#namaobat1").html(showData);
                           }
                   });
       </script>
