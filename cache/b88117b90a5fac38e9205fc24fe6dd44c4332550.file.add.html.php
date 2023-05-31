<?php /* Smarty version Smarty-3.0.7, created on 2023-04-14 10:12:14
         compiled from "application/views\op/prabedah/add.html" */ ?>
<?php /*%%SmartyHeaderCode:26576438c48e23b4a5-54157422%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b88117b90a5fac38e9205fc24fe6dd44c4332550' => 
    array (
      0 => 'application/views\\op/prabedah/add.html',
      1 => 1657766087,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26576438c48e23b4a5-54157422',
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
        <a href=" ">Asesmen Pra Bedah</a><span></span>
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div> 
<div class="content-entry">
    <!-- notification template --> 
    <!-- end of notification template-->
   
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/prabedah/add_process2');?>
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

        <input type="hidden" name="KD_OPERATOR" value="<?php echo $_smarty_tpl->getVariable('rs_op')->value['Kode_Dokter'];?>
">

        <table class="table-info" width="100%">
            <tr class="headrow">
                <th colspan="2">Add Asesmen Pra Bedah  <?php if ($_smarty_tpl->getVariable('rolenya')->value=='Perawat OK'){?> Perawat  <?php }?></th>
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
         

          
<input type="hidden" name="KD_PERAWAT" value="">
<!-- 
        <tr>

                <td width="20%">   </td>
                <td width="20%"> -->
                    <!-- <select name="KD_PERAWAT" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_perawat')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
</option>
                        <?php }} ?>
                    </select> -->
                <!-- </td>
                <td width="20%">Verifikasi Pra Bedah : </td>
                <td width="20%">  
                    </td>
                
            </tr> -->
    
            <?php if ($_smarty_tpl->getVariable('rolenya')->value=='Perawat OK'){?>
                <input type="hidden" name="DATA_S">
                <input type="hidden" name="DATA_O" value="TD : <?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['TD'];?>
 | ND : <?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['ND'];?>
 | Pernafasan : <?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['TD'];?>
 | SH : <?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['SH'];?>
" >
                <input type="hidden" name="DIAGNOSA_PRA" value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['DIAGNOSA'];?>
">
            <?php }?>

            <?php if ($_smarty_tpl->getVariable('rolenya')->value=='Dokter'){?>

            <tr>
             <td>Data Subjektif (Anamnesis)</td>
             <td >
                 <textarea name="DATA_S" rows="2" style="width: 350px;" > </textarea>
                 </td>
            </tr>
            <tr>
               <td>Data Objektif (Pemeriksaan Fisik)</td>
               <td >
                   <textarea name="DATA_O" rows="2" style="width: 350px;" >TD : <?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['TD'];?>
 | ND : <?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['ND'];?>
 | Pernafasan : <?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['TD'];?>
 | SH : <?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['SH'];?>
  </textarea>
                   </td>
                </tr>
               <tr>
                  <td>Diagnosa Pra Bedah </td>
                  <td >
                      <textarea name="DIAGNOSA_PRA" rows="1" style="width: 350px;" ><?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['DIAGNOSA'];?>
  </textarea>
                      </td>
                     
               </tr>
<?php }?> 

  

            <tr>
               <td>Verifikasi Pra Bedah</td>
                    
                   <td width="20%">  
                      <input type="checkbox" name="V_STATUS_PASIEN" value="Ya"> Status Pasien <br> 
                      <input type="checkbox" name="V_INFORMED_BEDAH" value="Ya"> Informed Consent Bedah <br>
                      <input type="checkbox" name="V_PRA_ANESTESI" value="Ya"> Asesmen Pra Anestesi <br> 
                     <input type="checkbox" name="V_ASES_PRA_LOK" value="Ya"> Asesmen PraBedah  <br> 
                     <input type="checkbox" name="V_INFORMED_ANESTESI" value="Ya"> Informed Consent Anestesi <br>
                     <input type="checkbox" name="V_EDU_ANESTESI" value="Ya"> Edukasi Anestesi <br>

                    </td>
                    <td></td>
               </tr>


                

            <tr>
                <td >Hasil Pemeriksaan Penunjang </td>
                <td  colspan="3">
                   <table>
                      <tr>
                         <td>   Hb </td><td>: <input type="text" name="HB"  <?php  $_smarty_tpl->tpl_vars['x'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('hasil_lab')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['x']->key => $_smarty_tpl->tpl_vars['x']->value){
?> <?php if ($_smarty_tpl->tpl_vars['x']->value['Pemeriksaan']=='Hemoglobin'){?> value="<?php echo $_smarty_tpl->tpl_vars['x']->value['Hasil'];?>
"  <?php }?> <?php }} ?> class="form-control"></td>
                         <td>   Trombosit </td><td>: <input type="text" name="TROMBOSIT"  <?php  $_smarty_tpl->tpl_vars['x'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('hasil_lab')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['x']->key => $_smarty_tpl->tpl_vars['x']->value){
?> <?php if ($_smarty_tpl->tpl_vars['x']->value['Pemeriksaan']=='Trombosit'){?> value="<?php echo $_smarty_tpl->tpl_vars['x']->value['Hasil'];?>
"  <?php }?> <?php }} ?> class="form-control"></td>
                         <td>     BT </td><td>: <input type="text" name="BT"  <?php  $_smarty_tpl->tpl_vars['x'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('hasil_lab')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['x']->key => $_smarty_tpl->tpl_vars['x']->value){
?> <?php if ($_smarty_tpl->tpl_vars['x']->value['Pemeriksaan']=='BT'){?> value="<?php echo $_smarty_tpl->tpl_vars['x']->value['Hasil'];?>
"  <?php }?> <?php }} ?> class="form-control"></td>
                      </tr>
                      <tr>
                        <td>   Leukosit </td><td>: <input type="text" name="LEUKOSIT"  <?php  $_smarty_tpl->tpl_vars['x'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('hasil_lab')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['x']->key => $_smarty_tpl->tpl_vars['x']->value){
?> <?php if ($_smarty_tpl->tpl_vars['x']->value['Pemeriksaan']=='Leukosit'){?> value="<?php echo $_smarty_tpl->tpl_vars['x']->value['Hasil'];?>
"  <?php }?> <?php }} ?>    class="form-control"></td>
                        <td>     Hematokrit</td><td> : <input type="text" name="HEMATOKRIT"  <?php  $_smarty_tpl->tpl_vars['x'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('hasil_lab')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['x']->key => $_smarty_tpl->tpl_vars['x']->value){
?> <?php if ($_smarty_tpl->tpl_vars['x']->value['Pemeriksaan']=='Hematrokit'){?> value="<?php echo $_smarty_tpl->tpl_vars['x']->value['Hasil'];?>
"  <?php }?> <?php }} ?> class="form-control"></td>
                        <td>   CT </td><td>: <input type="text" name="CT"  <?php  $_smarty_tpl->tpl_vars['x'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('hasil_lab')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['x']->key => $_smarty_tpl->tpl_vars['x']->value){
?> <?php if ($_smarty_tpl->tpl_vars['x']->value['Pemeriksaan']=='CT'){?> value="<?php echo $_smarty_tpl->tpl_vars['x']->value['Hasil'];?>
"  <?php }?> <?php }} ?>  class="form-control"></td>
                     </tr>
                   </table>
                   </td>
         </tr>
          


        
      

          
            <tr>
                    <td>   Rontgen : </td>
                    <td >
                   
                      <textarea name="RONTGEN" rows="6" style="width: 550px;" ><?php  $_smarty_tpl->tpl_vars['x'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('hasil_rad')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['x']->key => $_smarty_tpl->tpl_vars['x']->value){
?>  <?php echo str_replace('\r\n',' ',$_smarty_tpl->tpl_vars['x']->value['Ket']);?>
  <?php }} ?> </textarea>
                     </td>
               </tr> 
               <tr>
                  <td>   EKG : </td>
                  <td >
                 
                    <textarea name="EKG" rows="1" style="width: 350px;" > </textarea>
                   </td>
             </tr> 
             <tr>
               <td>   Pemerikasaan Lain : </td>
               <td >
              
                 <textarea name="LAINNYA" rows="1" style="width: 350px;" > </textarea>
                </td>
          </tr>           
          <tr>
            <td>  Darah/Alat yang diperlukan </td>
            <td >
              <textarea name="ALAT_LAIN" rows="1" style="width: 350px;" > </textarea>
             </td>
       </tr>        
       <tr>
         <td>  Obat yang dibawa pasien </td>
         <td >
           <textarea name="OBAT_YG_DIBAWA" rows="1" style="width: 350px;" > </textarea>
          </td>
         </tr>     
         <tr>
            <td>  Estimasi Waktu  </td>
            <td >
            <textarea name="ESTIMASI_WAKTU" rows="1" style="width: 350px;" > </textarea>
            </td>
      </tr>    
      <tr>
         <td>  Rencana Tindakan Bedah </td>
         <td >
         <textarea name="RENCANA_TINDAKAN" rows="1" style="width: 350px;" >   </textarea>
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
        <th colspan="6">List Asesmen Pra Bedah</th>
    </tr>
    <tr>
        <th width="15%">Tanggal</th>
        <th width="25%">Asesmen</th>
        <!-- <th width="18%">Verifikasi RM</th> -->
        <th width="15%">Pemeriksaan Penunjang</th>
        <th width="10%">Rencana</th>
        <th width="17%">Petugas</th>
      
    </tr>
    <?php  $_smarty_tpl->tpl_vars['cppt'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pra')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cppt']->key => $_smarty_tpl->tpl_vars['cppt']->value){
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['TGL_OP'];?>
  
             <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_inap/cetak_ases_pra_bedah/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['id']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"></a> 
        </td>
        <td> 
         S : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['DATA_S'];?>
<br>
         O : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['DATA_O'];?>
<br>
         A : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['DIAGNOSA_PRA'];?>

              </td>
        <!-- <td>
         - Status Pasien<br>
         - Asesmen Pra Bedah<br>
         - Informed Consent Bedah<br>
         - Informed Consent Anestesi<br>
         - Asesmen Pra Anestesi<br>
         - Edukasi Anestesi 
            </td> -->
        <td> 
            Hb : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['HB'];?>
 | Leu : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['LEUKOSIT'];?>
 | Trom : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['TROMBOSIT'];?>
 | Hema : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['HEMATOKRIT'];?>
 | BT : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['BT'];?>
 | CT : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['CT'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['RENCANA_TINDAKAN'];?>
 </td>
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['NAMALENGKAP'];?>
 </td>
 
     
    </tr>
    <?php }} ?>
</table>



 