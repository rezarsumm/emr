<?php /* Smarty version Smarty-3.0.7, created on 2022-06-30 17:02:49
         compiled from "application/views\inap/transfer_pasien/edit_transfer.html" */ ?>
<?php /*%%SmartyHeaderCode:1057962bd74c9dfb552-82278279%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '348d7f10a8ff759a3df6991ebb40b982119b3369' => 
    array (
      0 => 'application/views\\inap/transfer_pasien/edit_transfer.html',
      1 => 1655797693,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1057962bd74c9dfb552-82278279',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("nurse/rawat_jalan/edit_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>


<div class="breadcrum">
    <p>
        <a href="#">IGD</a><span></span>
         <small>Transfer internal antar Unit :  IGD - Rawat Inap</small>
    </p>
    <div class="clear"></div>
</div> 
<div class="content-entry">
    <!-- notification template -->
     <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/tf/edit_transfer_process');?>
" method="post" onkeypress="return event.keyCode != 13">
        <input name="FS_KD_REG" id="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />
        <input name="id" type="hidden" value="<?php echo $_smarty_tpl->getVariable('tf')->value['id'];?>
" />
        <input name="FS_KD_LAYANAN" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['KODE_BANGSAL'];?>
" />
        <input name="FS_KD_PETUGAS_MEDIS" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_medis'];?>
" />

        <table class="table-info" width="100%">
            <tr class="headrow">
                <th colspan="4"></th>
            </tr>
            <tr>
                <td>NAMA</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NAMA_PASIEN'];?>

                </td>
                <td>TANGGAL LAHIR</td>
                <td>
                    <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('rs_pasien')->value['TGL_LAHIR'],"%d %b %Y");?>

                </td>
            </tr>
            <tr>
                <td>NO MR</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>

                </td>
                 <td>ALAMAT</td>
                <td><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['ALAMAT'];?>
</td>
            </tr>
        </table>
        <table class="table-input" width="100%">
           

       </table>
     
        <table class="table-input" width="100%">

            <tr>
                <td>DPJP </td>
                <td colspan="3">
                    <select name="KD_DOKTER_DPJP" id="surat_dari" class="select2" style="width: 400px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_dokter')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                        <?php if ($_smarty_tpl->getVariable('tf')->value['KD_DOKTER_DPJP']==$_smarty_tpl->tpl_vars['data']->value['NAMAUSER']){?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMAUSER'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
 </option>
                        <?php }else{ ?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMAUSER'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
 </option>
                        <?php }?>
                        <?php }} ?>
                    </select>
                
                </td></tr>
                <tr>
                <td> Dokter Konsul 1</td>
                <td colspan="1"> 
                    <select name="KD_KONSUL_1" id="surat_dari" class="select2" style="width: 400px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_dokter')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                        <?php if ($_smarty_tpl->getVariable('daftar')->value['KD_DOKTER1']==$_smarty_tpl->tpl_vars['data']->value['NAMAUSER']){?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMAUSER'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
 </option>
                        <?php }else{ ?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMAUSER'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
 </option>
                        <?php }?>
                        <?php }} ?>
                    </select>
                 </td>
                 <td> Dokter Konsul 2</td>
                <td colspan="1"> 
                    <select name="KD_KONSUL_2" id="surat_dari" class="select2" style="width: 400px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_dokter')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                        <?php if ($_smarty_tpl->getVariable('daftar')->value['KD_DOKTER2']==$_smarty_tpl->tpl_vars['data']->value['NAMAUSER']){?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMAUSER'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
 </option>
                        <?php }else{ ?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMAUSER'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
 </option>
                        <?php }?>
                        <?php }} ?>
                    </select>
                 </td>
             </tr>

             <input type="hidden" name="RUANG1" value="<?php echo $_smarty_tpl->getVariable('tf')->value['RUANG1'];?>
">

             <tr>
                <td>Pindah ke ruang   </td>
                <td > 
                    <select name="RUANG2" id="surat_dari" class="select2" style="width: 400px;">
                        <option value=""></option> 
                        <?php  $_smarty_tpl->tpl_vars['gata'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ruang')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['gata']->key => $_smarty_tpl->tpl_vars['gata']->value){
?>
                        <?php if ($_smarty_tpl->getVariable('tf')->value['RUANG2']==$_smarty_tpl->tpl_vars['gata']->value['Kode_Ruang']){?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['gata']->value['Kode_Ruang'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['gata']->value['Nama_Ruang'];?>
 </option>
                        <?php }else{ ?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['gata']->value['Kode_Ruang'];?>
"><?php echo $_smarty_tpl->tpl_vars['gata']->value['Nama_Ruang'];?>
 </option>
                        <?php }?>
                        <?php }} ?>
                    </select>
                  </td> 
                <td>  Tanggal/Jam Pindah</td>
                <td  > <input type="date" name="TGL_PINDAH" size="100" value="<?php echo date('Y-m-d',strtotime($_smarty_tpl->getVariable('tf')->value['TGL_PINDAH']));?>
" required> 
                    <input type="time" name="JAM_PINDAH" size="100" value="<?php echo date('H:i',strtotime($_smarty_tpl->getVariable('tf')->value['JAM_PINDAH']));?>
" required>  </td>

             </tr>



            <tr class="headrow">
                <th colspan="4">RINGKASAN RIWAYAT PASIEN </th> 
            </tr>
            <tr>
                <td>Keluhan Utama  </td>
                <td colspan="3"> <input type="text" name="ANAMNESA" style="width:78% ;" value="<?php echo $_smarty_tpl->getVariable('tf')->value['ANAMNESA'];?>
">  </td></tr>
                
             <tr>
                <td >Riwayat Penyakit </td>
                <td  ><input type="text" name="RIWAYAT_SAKIT" value="<?php echo $_smarty_tpl->getVariable('tf')->value['RIWAYAT_SAKIT'];?>
"  size="30"> </td>
                   <td> Riwayat  Alergi  </td>
                   <td> <input type="text" name="RIWAYAT_ALERGI_MAKANAN" value="<?php echo $_smarty_tpl->getVariable('tf')->value['RIWAYAT_ALERGI_MAKANAN'];?>
" size="30">
                
                </td>
            </tr>
            <tr>
                <td >Diagnosa Awal </td>
                <td  >
                   <input type="text" name="DIAGNOSA1" value="<?php echo $_smarty_tpl->getVariable('tf')->value['DIAGNOSA1'];?>
"  size="30"> </td>
                   <td> Diagnosa  Sekarang  </td>
                   <td>     <input type="text" name="DIAGNOSA2" value="<?php echo $_smarty_tpl->getVariable('tf')->value['DIAGNOSA2'];?>
" size="30">      </td>
            </tr>

            <tr class="headrow">
                <th colspan="2">Pemeriksaan Penunjang </th> 
                <th colspan="2">  Pemberian Therapi </th> 
            </tr>
            <tr>
                <td colspan="2">
                    <textarea name="PENUNJANG" rows="3" style="width:100%">
                        Lab          : <?php echo $_smarty_tpl->getVariable('medis')->value['lab'];?>

                        Radiologi    : <?php echo $_smarty_tpl->getVariable('medis')->value['rad'];?>

                        Lain-lain    :
                        </textarea>
                    
                     </td>
                     <td colspan="2">
                        <textarea name="TERAPI" rows="3" style="width:100%"><?php echo $_smarty_tpl->getVariable('tf')->value['TERAPI'];?>

                             </textarea>
                        
                         </td>
                        </tr>
                
              <tr class="headrow">
                    <th colspan="2">Pemeriksaan Fisik Sebelum Transfer</th> 
                    <th colspan="2">Pemeriksaan Fisik Setelah Transfer</th> 
                </tr>
                <TR>
                    <td colspan="2">
                        <textarea name="PEMERIKSAAN_FISIK1" rows="4" style="width:100%">
                      <?php echo $_smarty_tpl->getVariable('tf')->value['PEMERIKSAAN_FISIK1'];?>

                        </textarea>
                    </td>
                    
                    <td colspan="2">
                        <textarea name="PEMERIKSAAN_FISIK2" rows="4"   style="width:100%"> <?php echo $_smarty_tpl->getVariable('tf')->value['PEMERIKSAAN_FISIK2'];?>

                        </textarea>
                    </td>
                </TR>
               <tr>
                  <td>Derajat Kebutuhan Transfer</td>
                  <td>
                     <input type="radio" name="DERAJAT" <?php if ($_smarty_tpl->getVariable('tf')->value['DERAJAT']=='0'){?> checked <?php }?> value="0">0
                     <input type="radio" name="DERAJAT" <?php if ($_smarty_tpl->getVariable('tf')->value['DERAJAT']=='1'){?> checked <?php }?> value="1">1
                     <input type="radio" name="DERAJAT" <?php if ($_smarty_tpl->getVariable('tf')->value['DERAJAT']=='2'){?> checked <?php }?> value="2">2
                     <input type="radio" name="DERAJAT" <?php if ($_smarty_tpl->getVariable('tf')->value['DERAJAT']=='3'){?> checked <?php }?> value="3">3
                  </td>
                  <td>Catatan </td>
                  <td>
                    <input type="text" name="CAT1" style="width:100% ;" value="<?php echo $_smarty_tpl->getVariable('tf')->value['CAT1'];?>
">
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
            </form>
            </div>
      <script>
 
 
  </script>     


 