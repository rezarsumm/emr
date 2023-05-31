<?php /* Smarty version Smarty-3.0.7, created on 2022-11-23 14:45:51
         compiled from "application/views\medis/rawat_jalan/addx.html" */ ?>
<?php /*%%SmartyHeaderCode:24629637dcfaf99c248-98478834%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77ad68af2f9d7185573c6eee07a4fa92ea4392d6' => 
    array (
      0 => 'application/views\\medis/rawat_jalan/addx.html',
      1 => 1669189548,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24629637dcfaf99c248-98478834',
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
<form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/add_processx');?>
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
            <td></td>
            <td></td>
            <td>Dokter</td>
            <td>1. <?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['NAMA_DOKTER'])===null||$tmp==='' ? '' : $tmp);?>
<br> 2. <?php echo $_smarty_tpl->getVariable('result')->value['DOK2'];?>
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
    <div class="notification red">
        <p><strong>High Risk :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_HIGH_RISK'])===null||$tmp==='' ? '-' : $tmp);?>
 </p>
        <p><strong>Alergi :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
 (<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_REAK_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
)</p>
        <div class="clear"></div>
    </div>
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
                <td width='20%'>Riweayat Penyakit dahulu</td>
                <td width='40%'>
                    <input type="text" name="FS_RIW_PENYAKIT_DAHULU" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result3')->value['FS_RIW_PENYAKIT_DAHULU'])===null||$tmp==='' ? '-' : $tmp);?>
" size="32">
                </td>
                <td width='20%'>Riwayat penyakit keluarga</td>
                <td width='30%'>
                    <input type="text" name="FS_RIW_PENYAKIT_DAHULU2" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result3')->value['FS_RIW_PENYAKIT_DAHULU2'])===null||$tmp==='' ? '-' : $tmp);?>
" size="32">
                </td>
            </tr>
 
    <input type="hidden" name="FS_ALERGI"   value="<?php echo $_smarty_tpl->getVariable('result3')->value['FS_ALERGI'];?>
">
     <input type="hidden" name="FS_REAK_ALERGI"  value="<?php echo $_smarty_tpl->getVariable('result3')->value['FS_REAK_ALERGI'];?>
">


         

             <tr>
                <td width='20%'>Status Psikologis</td>
                <td width='30%'>
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
                    <input type="text" name="FS_STATUS_PSIK2" id="civstaton3" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK2']=='0'){?>disabled=""<?php }?> size="27" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK2'];?>
">
                </td>
                <td width='39%'> MCU </td>
                <td width='30%'>
                    <select name="mcu" id="mcu" class="select2" style="width: 170px;">
                       <option value=""></option>
                       <option value="lpk">LPK</option>
                    </select>
                </td>
            </tr>

          <tr class="headrow">
                <th colspan="2">KEPALA  </th>
                <th colspan="2"> LEHER </th>
            </tr>
            <tr>
                <td width='20%'>Konjungtiva  </td>
                <td width='40%'>
                    <input type="checkbox" name="KONJUNGTIVA" value="Pucat">Pucat
                    <input type="checkbox" name="KONJUNGTIVA" value="Pink"> Pink
                </td>
                <td width='20%'>Deviasi Trakea  </td>
                <td width='40%'>
                    <input type="checkbox" name="DEVIASI" value="Kanan">Kanan
                    <input type="checkbox" name="DEVIASI" value="Kiri"> Kiri
                    <input type="checkbox" name="DEVIASI" value=""> Tidak Ada
                </td>
             </tr>
             <tr>
                <td width='20%'>Skelera  </td>
                <td width='40%'>
                    <input type="checkbox" name="SKELERA" value="Ikterik">Ikterik
                    <input type="checkbox" name="SKELERA" value="Tidak"> Tidak Ikterik
                </td>
                <td width='20%'>JVP  </td>
                <td width='40%'>
                    <input type="checkbox" name="JVP" value="Meningkat">Meningkat
                    <input type="checkbox" name="JVP" value="Tidak"> Tidak 
                
             </tr>
             <tr>
                <td width='20%'>Bibir/Lidah  </td>
                <td width='40%'>
                    <input type="checkbox" name="BIBIR" value="Sianosis">Sianosis
                    <input type="checkbox" name="BIBIR" value="Tidak"> Tidak
                </td>
             </tr>
             <tr>
                <td width='20%'>Mukosa </td>
                <td width='40%'>
                    <input type="checkbox" name="MUKOSA" value="Kering">Kering
                    <input type="checkbox" name="MUKOSA" value="Tidak"> Basah
                </td>
             </tr>
    
             <tr class="headrow">
                <th colspan="2">THORAX  </th>
                <th colspan="2"> JANTUNG </th>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea cols="80" rows="1" name="THORAX"> </textarea>
                </td>
                <td colspan="2">
                    <textarea cols="80" rows="1" name="JANTUNG"> </textarea>
    
                </td>
            </tr>
    
            <tr class="headrow">
                <th colspan="2">PARU  </th>
                <th colspan="2"> ABDOMEN & PINGGANG </th>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea cols="80" rows="1" name="ABDOMEN"> </textarea>
                </td>
                <td colspan="2">
                    <textarea cols="80" rows="1" name="PINGGANG"> </textarea>
    
                </td>
            </tr>
    
            <tr class="headrow">
                <th colspan="4">EKSTREMITAS  </th> 
            </tr>
            <tr>
                <td colspan="2"> Atas
                    <textarea cols="80" rows="1" name="EKS_ATAS"> </textarea>
                </td>
                <td colspan="2">Bawah
                    <textarea cols="80" rows="1" name="EKS_BAWAH"> </textarea>
    
                </td>
            </tr>
         
            <tr class="headrow">
                <th colspan="4">   </th> 
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
, Skrining Nutrisi :
                <?php if ($_smarty_tpl->getVariable('result')->value['FS_KD_LAYANAN']=='P003'||$_smarty_tpl->getVariable('result')->value['FS_KD_LAYANAN2']=='P003'||$_smarty_tpl->getVariable('result')->value['FS_KD_LAYANAN3']=='P003'){?>  <?php if (($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI_ANAK1']+$_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI_ANAK2']+$_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI_ANAK3']+$_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI_ANAK4'])<1){?> Normal
                <?php }else{ ?>
                <b>Terjadi Penurunan Badan Tidak Diinginkan</b>
                <?php }?>
                <?php }else{ ?> 
                <?php if (($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI1']+$_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI2'])<2){?>
                Normal
                <?php }else{ ?>
                <b>Terjadi Penurunan Badan Tidak Diinginkan</b>
                <?php }?>
                <?php }?>


            </textarea>
        </td>
        <td>Tindakan (P)</td>
        <td>
            <div style="font-weight: bold;">
            <!-- Data tanggal : <?php echo $_smarty_tpl->getVariable('kp2')->value['mdd'];?>
 ,<?php echo $_smarty_tpl->getVariable('kp2')->value['FS_TINDAKAN'];?>
 -->
            </div>
            <textarea rows="4" cols="50" name="FS_TINDAKAN" onkeypress="handle7(event)" class="form-control tindakan"> 
            </textarea>
        </td>
    </tr>
   <tr>
        <td>Diagnosa (A)</td>
        <td> 

            <textarea rows="5" cols="50" name="FS_DIAGNOSA" onkeypress="handle8(event)" class="form-control diagnosa"> 

            </textarea>
        </td>
        <td>
            Hasil USG
          </td>
          <td>
              <textarea rows="5" cols="50" name="FS_USG" onkeypress="handle9(event)" class="form-control usg">
                  <?php echo $_smarty_tpl->getVariable('kp2')->value['FS_USG'];?>

             </textarea>
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
<tr>
    <td>
      
    </td>
    <td>
    
</td>
</tr>
  <tr>
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
                               <!--  <input cols="20" type="text" name="dosis" class="dosis" style="width: 50px;" onkeypress="handleKeyPress(event)"> -->
                                 <textarea cols="20" name="dosis" class="dosis" style="width: 50px;" onkeypress="handleKeyPress(event)" rows="1" > </textarea>
                            </td>
                        </tr>
                   </table>


        <textarea rows="15" class="form-control resep"  cols="60" name="FS_TERAPI"><?php if ($_smarty_tpl->getVariable('kp2')->value['FS_TERAPI']==''){?>
            <?php  $_smarty_tpl->tpl_vars['data_t'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('terapi')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data_t']->key => $_smarty_tpl->tpl_vars['data_t']->value){
?> <?php echo $_smarty_tpl->tpl_vars['data_t']->value['NAMA_OBAT'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['data_t']->value['JML_OBAT'],2,".",",");?>
 <?php echo $_smarty_tpl->tpl_vars['data_t']->value['SATUAN'];?>
 <?php echo $_smarty_tpl->tpl_vars['data_t']->value['Dosis'];?>
 
            <?php }} ?>


            <?php }else{ ?>
            <?php echo $_smarty_tpl->getVariable('kp2')->value['FS_TERAPI'];?>

            <?php }?>
        </textarea> 
          
    </td>

  <td colspan="2">
   <b>Konsul</b> <br><br>
  
  <input type="hidden" name="FS_TERAPI2">
  
    DPJP 
    <select name="DPJP_UTAMA" id="surat_dari" class="select2" style="width: 300px;">
                    <option value=""></option>
                    <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_dokter_sp')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMAUSER'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
</option>
                    <?php }} ?>
                </select>
                <br>Uraian Konsul (Tanggal, Jam, Instruksi) <br>
                <textarea rows="2" class="form-control"  cols="60" name="KONSUL_DPJP_UTAMA"> </textarea>
                 <br><br>
     DPJP 1
    <select name="DPJP_I" id="surat_dari" class="select2" style="width: 300px;">
                    <option value=""></option>
                    <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_dokter_sp')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMAUSER'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
</option>
                    <?php }} ?>
                </select>
                 <br>Uraian Konsul (Tanggal, Jam, Instruksi) <br>
                <textarea rows="2" class="form-control"  cols="60" name="KONSUL_DPJP_I"> </textarea><br><br>
     DPJP 2
    <select name="DPJP_II" id="surat_dari" class="select2" style="width: 300px;">
                    <option value=""></option>
                    <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_dokter_sp')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMAUSER'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
</option>
                    <?php }} ?>
                </select> 
                <br>Uraian Konsul (Tanggal, Jam, Instruksi) <br> 
                <textarea rows="2" class="form-control"  cols="60" name="KONSUL_DPJP_II"> </textarea> <br><br>
     DPJP 3
    <select name="DPJP_III" id="surat_dari" class="select2" style="width: 300px;">
                    <option value=""></option>
                    <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_dokter_sp')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMAUSER'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
</option>
                    <?php }} ?>
                </select> 
              <br>Uraian Konsul (Tanggal, Jam, Instruksi) <br> 
                <textarea rows="2" class="form-control"  cols="60" name="KONSUL_DPJP_III"> </textarea>         
</td>
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
        <input type="text" name="FS_PLANNING" size="55" value="<?php echo $_smarty_tpl->getVariable('kp')->value['FS_PLANNING'];?>
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
    <thead>
        <tr>
            <th width='25%'>Tanggal Kunjungan</th>
           <!--  <th>Kode Reg</th> -->
            <th>Dokter</th>
          <!--   <th>Layanan</th> -->
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
      
        <tr>
            <td>

                <?php if ($_smarty_tpl->getVariable('form_rm')->value['FS_JENIS_BERKAS']=='1'){?>
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('rm/upload/download/').($_smarty_tpl->getVariable('form_rm')->value['att_name']));?>
" class="button-download">Operasi</a>  
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['data']->value['STATUS']=='0'){?>
                <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((((('rm/rawat_jalan/cetak_rm/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_FORM']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['TANGGAL'],"%d %B %Y");?>
</a>
                  <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/berkas/file/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->getVariable('search')->value['FS_KD_PEG']));?>
" class="button-download">Scan </a>
                <?php }elseif($_smarty_tpl->tpl_vars['data']->value['STATUS']=='0'){?>
                <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['TANGGAL'],"%d %B %Y");?>
</a>  

                <?php }?>

            </td>

            <td>
                <?php echo $_smarty_tpl->tpl_vars['data']->value['NAMA_DOKTER'];?>

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
                <?php echo $_smarty_tpl->tpl_vars['data']->value['DOK2'];?>

            </td> 
       
            <td>
                <center>
                    <b>
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['KODE_KAMAR']==''){?>
                        <div style="color: blue;">Rawat Jalan</div>
                        <?php }elseif($_smarty_tpl->tpl_vars['data']->value['KODE_KAMAR']!=''){?>
                        <div style="color: green;">Rawat Inap</div>
                        <?php }?>

                    </b>

                </center>
            </td> 
        </tr>
        <?php }} ?>
    </tbody>
</table>



<script>
        var namaa = $(".namaa").val();
               $('.namaa').val(namaa+'\n R/ \t   no. \n S                    \n ----------------------------------------\n '); 
       
       
                $('.resepracik').val('\n /R');
                $('.resep').val('.');


               function tambahkop(e){
                   var yhr= new XMLHttpRequest();
                var key=e.keyCode || e.which;
                 if (key==13){
                               var resepracik = $(".resepracik").val(); 
                                   $('.resepracik').val(resepracik+'S                 \n ---------------------------------------- \n \n'+'R/  '); // Close / Tutup Modal Dialog
                 //    // alert(namaa);
                 }
               }
        
       
       
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








$("#mcu").change(function(){

var mcu = $("#mcu").val();
if($("#mcu").val() == "lpk"){
                $('.tindakan').val(' led, visus');


}
        // if($("#dasar").val() == "alamat"){
        //     $("#form2").show();
        //      $("#formp").hide();
        //     $("#formst").hide();
        //     $("#formu").hide();
        //     $("#formj").hide();
        //     $("#formf").hide();
        //     $("#formbp").hide();
        //     $("#formc").hide();
        //     $("#forma").show();

        //   }
// alert("yes");
    });




       </script>
