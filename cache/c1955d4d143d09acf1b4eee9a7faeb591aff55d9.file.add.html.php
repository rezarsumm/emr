<?php /* Smarty version Smarty-3.0.7, created on 2022-06-04 09:10:48
         compiled from "application/views\op/praanestesi/add.html" */ ?>
<?php /*%%SmartyHeaderCode:32703629abf28ed8049-37805113%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1955d4d143d09acf1b4eee9a7faeb591aff55d9' => 
    array (
      0 => 'application/views\\op/praanestesi/add.html',
      1 => 1654152177,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32703629abf28ed8049-37805113',
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
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('op/jadwal/detail/').($_smarty_tpl->getVariable('idoperasi')->value)).('/')).($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']))===null||$tmp==='' ? '' : $tmp));?>
"> Detail</a><span></span>
        <small>Add Data Ases Pra Anestesi</small>
    </p>
    <div class="clear"></div>
</div> 
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/praanestesi/add_process2');?>
" method="post" onkeypress="return event.keyCode != 13">
        <input name="FS_KD_REG" id="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />  
            <input name="TGL_LAHIR" id="TGL_LAHIR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['TGL_LAHIR'];?>
" /> 
        <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />
        <input name="idoperasi" type="hidden" value="<?php echo $_smarty_tpl->getVariable('idoperasi')->value;?>
" />

        <input name="FS_KD_LAYANAN" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['KODE_BANGSAL'];?>
" />
        <input name="FS_KD_PETUGAS_MEDIS" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_medis'];?>
" />

        <table class="table-info" width="100%">
            <tr class="headrow">
                <th colspan="2">Add Asesmen Pra Anestesia </th>
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
    
      
        <table class="table-input" width="100%" style="text-align: justify;">
          

           <!-- <tr><td><b>PEMERIKSAAN FISIK </b></td></tr> -->
            <tr>
                
                <td><b>PEMERIKSAAN FISIK </b></td>
                <td colspan="3" > 
                    <textarea name="FISIK" rows="2" value="" style="width: 600px;" >  Tinggi : <?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['TB'];?>
 cm  |  Berat : <?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['BB'];?>
 kg  | Tekanan darah : <?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['TD'];?>
 mmhg  | Nadi : <?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['ND'];?>
 /menit  | Pernafasan : <?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['P'];?>
   
                     </textarea>


                   <!-- <table>
                      <tr>
                         <td>   Tinggi </td><td>: <input type="text" name="Tinggi"  class="form-control" value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['TB'];?>
" style="width: 60px;"></td>
                         <td>   Berat </td><td>: <input type="text" name="Berat" value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['BB'];?>
" class="form-control" style="width: 60px;"></td>
                         <td>     Tekanan Darah </td><td>: <input type="text" name="Tekanan" value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['TD'];?>
" class="form-control" style="width: 60px;"></td>
                      
                        <td>   Nadi </td><td>: <input type="text" name="Nadi" value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['ND'];?>
" class="form-control" style="width: 60px;"></td>
                        <td>     Pernafasan</td><td> : <input type="text" name="Pernafasan" value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['P'];?>
" class="form-control" style="width: 60px;"></td>
                        <td>  </td><td></td>
                     </tr>
                   </table> -->
                   </td>
         </tr>
          <tr> <td><b>KEADAAN UMUM</b></td></tr>


            <tr>
                    <td>   Kebisaan Merokok Sebanyak : </td>
                    <td >
                      <textarea name="K_ROKOK" rows="1" style="width: 350px;" > -</textarea>
                     </td>
               </tr> 
               <tr>
                  <td>   Kebisaan Minum teh/kopi/alhohol Sebanyak : </td>
                  <td >
                    <textarea name="K_MINUM_KOPI" rows="1" style="width: 350px;" > -</textarea>
                   </td>
             </tr> 
             <tr>
               <td>   Kebisaan Olahraga teratur Sebanyak : </td>
               <td >
                 <textarea name="K_OLGA" rows="1" style="width: 350px;" > -</textarea>
                </td>
          </tr> 
          <tr>
            <td>  Riwayat Alergi : </td>
            <td >
                
                <input type="radio" name="RIWAYAT_ALERGI" <?php if ($_smarty_tpl->getVariable('rs_umum_pra')->value['RIWAYAT_ALERGI']=='Tidak'){?> checked <?php }?>  class="radal" value="Tidak" class="form-control">Tidak
                <input type="radio" name="RIWAYAT_ALERGI" <?php if ($_smarty_tpl->getVariable('rs_umum_pra')->value['RIWAYAT_ALERGI']!='Tidak'){?> checked <?php }?> class="radal" value="Ya" class="form-control">Ya
                <input type="text" name="RIWAYAT_ALERGI1" <?php if ($_smarty_tpl->getVariable('rs_umum_pra')->value['RIWAYAT_ALERGI']!='Tidak'){?> style="display:show" value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['RIWAYAT_ALERGI'];?>
" <?php }?>  id="formal" style="display:none"  class="form-control">
             </td>
       </tr> 
            <tr>
               <td>   Riwayat Penyakit : </td>
               <td >
                <input type="radio" name="RIWAYAT_SAKIT" checked   class="rad" value="Tidak" class="form-control">Tidak
                <input type="radio" name="RIWAYAT_SAKIT"   class="rad" value="Ya" class="form-control">Ya
                <input type="text" name="RIWAYAT_SAKIT1"    id="form2" style="display:none"  class="form-control">
             
               </td>
         </tr> 
            <tr>
               <td>   Riwayat Sakit Keluarga  : </td>
               <td >
                <input type="radio" name="RIWAYAT_SAKIT_KELUARGA"  checked  class="radas" value="Tidak" class="form-control">Tidak
                <input type="radio" name="RIWAYAT_SAKIT_KELUARGA"   class="radas" value="Ya" class="form-control">Ya
                <input type="text" name="RIWAYAT_SAKIT_KELUARGA1"    id="formas" style="display:none"  class="form-control">
              
               </td>
         </tr> 
         <tr>
            <td>   Riwayat Operasi : </td>
            <td >
                <input type="radio" name="RIWAYAT_OP" checked   class="radim" value="Tidak" class="form-control">Tidak
                <input type="radio" name="RIWAYAT_OP"   class="radim" value="Ya" class="form-control">Ya
                <input type="text" name="RIWAYAT_OP1"    id="formim" style="display:none"  class="form-control">
               
             </td>
       </tr> 
       <tr>
         <td>   Riwayat Pemeriksaan HIV : </td>
         <td >
            <input type="radio" name="TES_HIV"  checked  class="radiv" value="Tidak" class="form-control">Tidak
            <input type="radio" name="TES_HIV"   class="radiv" value="Ya" class="form-control">Ya
            <input type="text" name="TES_HIV1"    id="formiv" style="display:none"  class="form-control">
           
 
          </td>
    </tr> 



    <?php if ($_smarty_tpl->getVariable('namarole')->value=='Dokter'||$_smarty_tpl->getVariable('namarole')->value=='Admin'){?>
    <tr><td><b>  KAJIAN SISTEM </b></td></tr>
    <tr>   <td width="20%"> Hilang Gigi </td>
               <td width="20%">  <input type="radio" name="HILANG_GIGI" value="Ya"  class="form-control"  >Ya  
                                <input type="radio" name="HILANG_GIGI" value="Tidak" checked  class="form-control"  >Tidak </td>
                 <td width="20%">Muntah </td>
                 <td>  <input type="radio" name="MUNTAH" value="Ya"  class="form-control"  >Ya  
                   <input type="radio" name="MUNTAH" value="Tidak" checked  class="form-control"  >Tidak </td>
    </tr>
    <tr>   <td width="20%"> Mobilisasi Leher </td>
      <td width="20%">  <input type="radio" name="LEHER" value="Ya"  class="form-control"  >Ya  
                      <input type="radio" name="LEHER" value="Tidak" checked  class="form-control"  >Tidak </td>
        <td width="20%">Pingsan </td>
        <td>  <input type="radio" name="PINGSAN" value="Ya"  class="form-control"  >Ya  
             <input type="radio" name="PINGSAN" value="Tidak" checked  class="form-control"  >Tidak </td>
   </tr>
   <tr>   <td width="20%"> Leher Pendek </td>
      <td width="20%"> 
          <input type="radio" name="LEHER_PENDEK" value="Ya"  class="form-control"  >Ya  
          <input type="radio" name="LEHER_PENDEK" value="Tidak" checked  class="form-control"  >Tidak </td>
        <td width="20%">Stroke </td>
        <td>  <input type="radio" name="STROKE" value="Ya"  class="form-control"  >Ya  
             <input type="radio" name="STROKE" value="Tidak" checked  class="form-control"  >Tidak </td>
   </tr>
   <tr>   <td width="20%"> Batuk</td>
      <td width="20%">  <input type="radio" name="BATUK" value="Ya"  class="form-control"  >Ya  
                         <input type="radio" name="BATUK" value="Tidak" checked  class="form-control"  >Tidak </td>
        <td width="20%">Kejang </td>
        <td>  <input type="radio" name="KEJANG" value="Ya"  class="form-control"  >Ya  
              <input type="radio" name="KEJANG" value="Tidak" checked  class="form-control"  >Tidak </td>
      </tr>
      <tr>   <td width="20%"> Sesak Nafas</td>
         <td width="20%">  <input type="radio" name="SESAK" value="Ya"  class="form-control"  >Ya  
                         <input type="radio" name="SESAK" value="Tidak" checked  class="form-control"  >Tidak </td>
         <td width="20%">Hamil </td>
         <td>  <input type="radio" name="HAMIL" value="Ya"  class="form-control"  >Ya  
                 <input type="radio" name="HAMIL" value="Tidak" checked  class="form-control"  >Tidak </td>
      </tr>
      <tr>   <td width="20%"> Infeksi Saluran Nafas</td>
         <td width="20%">  <input type="radio" name="SALURAN_NAPAS" value="Ya"  class="form-control"  >Ya  
                         <input type="radio" name="SALURAN_NAPAS" value="Tidak" checked  class="form-control"  >Tidak </td>
         <td width="20%">Kelainan Tulang Belakang </td>
         <td>  <input type="radio" name="TULANG_BLK" value="Ya"  class="form-control"  >Ya  
             <input type="radio" name="TULANG_BLK" value="Tidak" checked  class="form-control"  >Tidak </td>
      </tr>
      <tr>   <td width="20%"> Sakit Dada</td>
         <td width="20%">  <input type="radio" name="DADA" value="Ya"  class="form-control"  >Ya  
                           <input type="radio" name="DADA" value="Tidak" checked  class="form-control"  >Tidak </td>
         <!-- <td width="20%">Jantung tidak normal </td>
         <td>  <input type="radio" name="JANTUNG" value="Ya"  class="form-control"  >Ya  
               <input type="radio" name="JANTUNG" value="Tidak" checked  class="form-control"  >Tidak </td> -->
      </tr>

      <tr>
        <td width="20%">Jantung tidak normal </td>
          <td>
            <input type="radio" name="JANTUNG"    class="radja" value="Tidak" class="form-control">Tidak
            <input type="radio" name="JANTUNG"   class="radja" value="Ya" class="form-control">Ya
            <input type="text" name="JANTUNG1"    id="formja" style="display:none"  class="form-control">
         
          </td>
      </tr>
      <tr>
         <td>   Keterangan : </td>
         <td >
           <textarea name="KET" rows="1" style="width: 350px;" > </textarea>
          </td>
    </tr> 

    <tr>
      <td>   Hasil Pemeriksaan Penunjang : </td>
      <td colspan="3">
        <table>
          <tr>
            <td>  <input type="text" name="hp1" <?php  $_smarty_tpl->tpl_vars['x'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('hasil_lab')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['x']->key => $_smarty_tpl->tpl_vars['x']->value){
?> <?php if ($_smarty_tpl->tpl_vars['x']->value['Pemeriksaan']=='Hemoglobin'){?> value="Hb:<?php echo $_smarty_tpl->tpl_vars['x']->value['Hasil'];?>
" <?php }?> <?php }} ?>><br>
              <input type="text" name="hp2"<?php  $_smarty_tpl->tpl_vars['x'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('hasil_lab')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['x']->key => $_smarty_tpl->tpl_vars['x']->value){
?> <?php if ($_smarty_tpl->tpl_vars['x']->value['Pemeriksaan']=='Leukosit'){?> value="Leukosit:<?php echo $_smarty_tpl->tpl_vars['x']->value['Hasil'];?>
"  <?php }?> <?php }} ?>><br>
              <input type="text" name="hp3"<?php  $_smarty_tpl->tpl_vars['x'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('hasil_lab')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['x']->key => $_smarty_tpl->tpl_vars['x']->value){
?> <?php if ($_smarty_tpl->tpl_vars['x']->value['Pemeriksaan']=='Hematrokit'){?> value="Ht:<?php echo $_smarty_tpl->tpl_vars['x']->value['Hasil'];?>
"  <?php }?> <?php }} ?>><br>
              <input type="text" name="hp4"<?php  $_smarty_tpl->tpl_vars['x'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('hasil_lab')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['x']->key => $_smarty_tpl->tpl_vars['x']->value){
?> <?php if ($_smarty_tpl->tpl_vars['x']->value['Pemeriksaan']=='SGPT'){?> value="PT:<?php echo $_smarty_tpl->tpl_vars['x']->value['Hasil'];?>
"  <?php }?> <?php }} ?>><br>
              <input type="text" name="hp5"<?php  $_smarty_tpl->tpl_vars['x'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('hasil_lab')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['x']->key => $_smarty_tpl->tpl_vars['x']->value){
?> <?php if ($_smarty_tpl->tpl_vars['x']->value['Pemeriksaan']=='Glukosa'){?> value="Glukosa:<?php echo $_smarty_tpl->tpl_vars['x']->value['Hasil'];?>
"  <?php }?> <?php }} ?>><br>
              <input type="text" name="hp6"<?php  $_smarty_tpl->tpl_vars['x'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('hasil_lab')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['x']->key => $_smarty_tpl->tpl_vars['x']->value){
?> <?php if ($_smarty_tpl->tpl_vars['x']->value['Pemeriksaan']=='Creatinin'){?> value="Creatinin:<?php echo $_smarty_tpl->tpl_vars['x']->value['Hasil'];?>
"  <?php }?> <?php }} ?>><br>
              <input type="text" name="hp7"<?php  $_smarty_tpl->tpl_vars['x'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('hasil_lab')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['x']->key => $_smarty_tpl->tpl_vars['x']->value){
?> <?php if ($_smarty_tpl->tpl_vars['x']->value['Pemeriksaan']=='Ureum'){?> value="Ureum:<?php echo $_smarty_tpl->tpl_vars['x']->value['Hasil'];?>
"  <?php }?> <?php }} ?>><br>
              <input type="text" name="hp8"<?php  $_smarty_tpl->tpl_vars['x'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('hasil_lab')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['x']->key => $_smarty_tpl->tpl_vars['x']->value){
?> <?php if ($_smarty_tpl->tpl_vars['x']->value['Pemeriksaan']=='Kalium'){?> value="Kalium:<?php echo $_smarty_tpl->tpl_vars['x']->value['Hasil'];?>
"  <?php }?> <?php }} ?>><br>
              <input type="text" name="hp10"  value="Ekg : " <br>
             </td>
            <td>  Rontgen 
              <textarea name="hp9" rows="11" style="width: 550px;" >Thorax : <?php  $_smarty_tpl->tpl_vars['x'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('hasil_rad')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['x']->key => $_smarty_tpl->tpl_vars['x']->value){
?>  <?php echo $_smarty_tpl->tpl_vars['x']->value['Ket'];?>
  <?php }} ?> </textarea>
              <br> 
            </td>
          
          </tr>
        </table>
  
        
       </td>
 </tr> 

      <tr>
         <td>  Diagnosa  : </td>
         <td >
           <textarea name="DIAGNOSA" rows="1" style="width: 350px;" >  <?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['DIAGNOSA'];?>
</textarea>
          </td>
    </tr> 

    <tr>
        <td>  Klasifikasi ASA  : </td>
        <td >
          <input type="radio" name="CLASS_ASA" checked value="1">ASA 1 (normal & sehat) <br>
          <input type="radio" name="CLASS_ASA" value="2">ASA 2 (terdapat sakit sistemik ringan) <br>
          <input type="radio" name="CLASS_ASA" value="3">ASA 3 (terdapat sakit sistemik berat) <br>
          <input type="radio" name="CLASS_ASA" value="4">ASA 4 (terdapat sakit sistemik berat yang mengancam jiwa)  
         </td>
   </tr> 

      <tr>
         <td> Penyulit Anestesia Lain : </td>
         <td >
         <textarea name="PENYULIT_ANESTESI" rows="1" style="width: 350px;" > </textarea>
         </td>
      </tr> 
      <tr>
         <td>  Catatan Tindak Lanjut  : </td>
         <td >
         <textarea name="TL" rows="2" style="width: 350px;" > </textarea>
         </td>
      </tr> 
      <tr>
         <td>  Teknik Anestesi & Sedasi  : </td>
         <td >
           <input type="radio" name="TEKNIS_ANESTESI" value="Spinal">Spinal
           <input type="radio" name="TEKNIS_ANESTESI" value="Epidural">Epidural
           <input type="radio" name="TEKNIS_ANESTESI" value="GA">GA
           <input type="radio" name="TEKNIS_ANESTESI" value="Tiva">Tiva
         </td> 
      </tr> 

      <tr>
         <td>  Teknik Khusus : </td>
         <td >
         <textarea name="TEKNIS_KHUSUS" rows="1" style="width: 350px;" > - </textarea>
         
         </td>
      </tr> 
      <tr>
         <td>  Perawatan Pasca Anestesia : </td>
         <td >
         <textarea name="PERAWATAN" rows="1" style="width: 350px;" > </textarea>
         </td>
      </tr> 


      <tr><td><b>  PERSIAPAN PRA ANESTESIA </b></td></tr>
      <tr> 
         <td></td>
         <td colspan="3">
            <table>
               <tr>
                  <td>Puasa mulai jam </td>
                  <td> <input type="time" name="PUASA2" value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['MAKAN_TERAKHIR'];?>
" style="width: 80px;">  </td>
                  <td> Tanggal </td>
                  <td> <input type="date" name="PUASA1" value="<?php echo $_smarty_tpl->getVariable('tgl')->value;?>
"  class="form-control"  >  </td>
               </tr>
               <tr>
                  <td>Pra medikasi </td>
                  <td> <input type="time" name="PRE_MEDIK2" style="width: 80px;">  </td>
                  <td> Tanggal </td>
                  <td> <input type="date" name="PRE_MEDIK1" value="<?php echo $_smarty_tpl->getVariable('tgl')->value;?>
"  class="form-control"  >  </td>
               </tr>
               <tr>
                  <td>Tranport ke kamar operasi </td>
                  <td> <input type="time" name="TRANSPORT_RUANG_OP2" value="<?php echo date('H:i:s',strtotime($_smarty_tpl->getVariable('rs_umum_pra')->value['MDD']));?>
" style="width: 80px;">  </td>
                  <td> Tanggal </td>
                  <td> <input type="date" name="TRANSPORT_RUANG_OP1" value="<?php echo $_smarty_tpl->getVariable('tgl')->value;?>
"  class="form-control"  >  </td>
               </tr>
               <tr>
                  <td>Rencana Operasi</td>
                  <td> <input type="time" name="RENCANA_OP2" style="width: 80px;">  </td>
                  <td> Tanggal </td>
                  <td> <input type="date" name="RENCANA_OP1" value="<?php echo $_smarty_tpl->getVariable('tgl')->value;?>
"  class="form-control"  >  </td>
               </tr>
            </table>
         
      </tr>
      <tr>
         <td>  Catatana : </td>
         <td >
         <textarea name="CATATAN" rows="1" style="width: 350px;" > </textarea>
         </td>
      </tr> 

<?php }?>


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
 <table class="table-input" width="100%">
     <tr>
                <th colspan="4">Shortcut Navigation</th>
            </tr>
<tr class="submit-box">
                <td colspan="5">
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('medis/rawat_inap/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-green">Asesmen Awal Medis Rawat Inap</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/ass_awal/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-red2">Asesmen Awal Keperawatan</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/ass_jatuh/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-blue2">Asesmen Jatuh</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/kep/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-green2">Rencana dan Tindakan Keperawatan</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/rm10/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-orange">Catatan Edukasi</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/rm17/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-pink">Catatan Pemberian Obat</a>
                    <!--<a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/dp/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-brown">Discharge Planning</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('farmasi/rekon/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-yellow">Rekonsiliasi Obat</a>
                    -->
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/resume/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-red">Resume Pasien Pulang</a>
                    <!--<a href="javascript:;" class="btn-green item_status_add">Status Pasien</a>-->
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'])).('/10'));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-red2">Hasil Penunjang</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('rm/rawat_jalan/resume/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_MR']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-blue2">Resume Rawat Jalan</a>
                </td> 
            </tr>
 </table>
<table class="table-view" width="100%">
    <tr class="headrow">
        <th colspan="6">List Asesmen Pra Bedah</th>
    </tr>
    <tr>
        <th width="15%">Tanggal</th>
        <th width="15%">Pemeriksaan</th>
        <th width="15%">Keadaaan Umum</th>
        <th width="15%">Kajian Sistem</th>
        <th width="10%">Diagnosa</th>
        <th width="15%">Perencanaan</th>
        <th width="15%">Persiapan</th>
      
    </tr>
    <?php  $_smarty_tpl->tpl_vars['cppt'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pra_anes')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cppt']->key => $_smarty_tpl->tpl_vars['cppt']->value){
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['TGL_OP'];?>
  
             <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_inap/cetak_ases_pra_anes/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['id']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"></a> 
        </td>
        <td>  <?php echo $_smarty_tpl->tpl_vars['cppt']->value['PEMERIKSAAN_FISIK'];?>
  </td>
        <td> Merokok: <?php echo $_smarty_tpl->tpl_vars['cppt']->value['K_ROKOK'];?>
, Minum teh/kopi/alkohol : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['K_KOPI'];?>
, Olahraga: <?php echo $_smarty_tpl->tpl_vars['cppt']->value['K_OLGA'];?>
  </td>
        <td> 
            Hilang Gigi : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['GIGI'];?>
 <br>
            Leher : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['LEHER'];?>
, Pendek : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['LEHER_PENDEK'];?>
<br>
            Batuk : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['BATUK'];?>
, Sesak : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['SESAK'];?>
  <br>
            Muntah : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['MUNTAH'];?>
 <br>
            Pingsan : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['PINGSAN'];?>
 <br>
            Stroke : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['STROKE'];?>
 <br>
            Kejang : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['KEJANG'];?>
 <br>
            Hamil : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['HAMIL'];?>
 <br>
            Kelainan Tulang Blk : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['TULANG_BLK'];?>
 <br>
            Sakit Dada : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['DADA'];?>
, Jantung :<?php echo $_smarty_tpl->tpl_vars['cppt']->value['JANTUNG'];?>
  <br>
              </td>
          <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['DIAGNOSA'];?>
 </td>
        <td>Teknik : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['TEKNIS_ANESTESI'];?>
<br>
            Teknik Khusus : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['TEKNIS_KHUSUS'];?>
<br>
            Perawatan : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['PERAWATAN'];?>
<br>
         </td>
         <td>Puasa : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['PUASA'];?>
<br>
             Pra Medikasi : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['PRE_MEDIK'];?>
<br>
            Transport OK : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['TRANSPORT_RUANG_OP'];?>
<br>
            Rencana OP : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['RENCANA_OP'];?>
<br>
         </td>
 
     
    </tr>
    <?php }} ?>
</table>




<script>
   $("#dasar").change(function(){
   
       var dasar = $("#dasar").val();
     
             
                    $("#formp").show();
            
               
          
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
      $(":radio.radja").click(function(){
        $("#formja").hide()
        if($(this).val() == "Ya"){
          $("#formja").show();
        }else if($(this).val() == "Tidak"){
          $("#formja").hide();
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


    $(function(){
      $(":radio.radas").click(function(){
        $("#formas").hide()
        if($(this).val() == "Ya"){
          $("#formas").show();
        }else if($(this).val() == "Tidak"){
          $("#formas").hide();
        }
      });
    });

    $(function(){
      $(":radio.radiv").click(function(){
        $("#formiv").hide()
        if($(this).val() == "Ya"){
          $("#formiv").show();
        }else if($(this).val() == "Tidak"){
          $("#formiv").hide();
        }
      });
    });


    $(function(){
      $(":radio.radim").click(function(){
        $("#formim").hide()
        if($(this).val() == "Ya"){
          $("#formim").show();
        }else if($(this).val() == "Tidak"){
          $("#formim").hide();
        }
      });
    });
  </script> 