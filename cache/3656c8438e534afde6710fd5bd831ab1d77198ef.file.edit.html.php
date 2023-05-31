<?php /* Smarty version Smarty-3.0.7, created on 2022-06-04 09:16:03
         compiled from "application/views\op/prabedah/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:21797629ac0630bd128-25177444%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3656c8438e534afde6710fd5bd831ab1d77198ef' => 
    array (
      0 => 'application/views\\op/prabedah/edit.html',
      1 => 1654140116,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21797629ac0630bd128-25177444',
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
        <small>Edit Data</small>
    </p>
    <div class="clear"></div>
</div> 
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/prabedah/edit_process');?>
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
                <th colspan="2">Add Asesmen Pra Bedah </th>
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
               
        <input type="hidden" name="KD_OPERATOR" value="<?php echo $_smarty_tpl->getVariable('rs_pra3')->value['KD_OPERATOR'];?>
">
        <input type="hidden" name="KD_PERAWAT" value="<?php echo $_smarty_tpl->getVariable('rs_pra3')->value['KD_PERAWAT'];?>
">
                    

                    <?php if ($_smarty_tpl->getVariable('rolenya')->value=='Perawat OK'){?>
                    <input type="hidden" name="DATA_S" value="<?php echo $_smarty_tpl->getVariable('rs_pra3')->value['DATA_S'];?>
" >
                    <input type="hidden" name="DATA_O" value="<?php echo $_smarty_tpl->getVariable('rs_pra3')->value['DATA_O'];?>
" >
                    <input type="hidden" name="DIAGNOSA_PRA" value="<?php echo $_smarty_tpl->getVariable('rs_pra3')->value['DIAGNOSA_PRA'];?>
">
                <?php }?>
    
 
                <?php if ($_smarty_tpl->getVariable('rolenya')->value=='Dokter'){?>
    
                <tr>
                 <td>Data Subjektif (Anamnesis)</td>
                 <td >
                     <textarea name="DATA_S" rows="2" style="width: 350px;" ><?php echo $_smarty_tpl->getVariable('rs_pra3')->value['DATA_S'];?>
 </textarea>
                     </td>
                </tr>
                <tr>
                   <td>Data Objektif (Pemeriksaan Fisik)</td>
                   <td >
                       <textarea name="DATA_O" rows="2" style="width: 350px;" > <?php echo $_smarty_tpl->getVariable('rs_pra3')->value['DATA_O'];?>
</textarea> </td>
                    </tr>
                   <tr>
                      <td>Diagnosa Pra Bedah </td>
                      <td >
                          <textarea name="DIAGNOSA_PRA" rows="1" style="width: 350px;" ><?php echo $_smarty_tpl->getVariable('rs_pra3')->value['DIAGNOSA_PRA'];?>
 </textarea>
                          </td>
                         
                   </tr>
    <?php }?> 
    
      
    
                <tr>
                   <td>Verifikasi Pra Bedah</td>
                        
                       <td width="20%">  
                        <input type="checkbox" name="V_STATUS_PASIEN" <?php if ($_smarty_tpl->getVariable('rs_pra3')->value['V_STATUS_PASIEN']=='Ya'){?> checked <?php }?> value="Ya"> Status Pasien <br> 
                        <input type="checkbox" name="V_INFORMED_BEDAH" <?php if ($_smarty_tpl->getVariable('rs_pra3')->value['V_INFORMED_BEDAH']=='Ya'){?> checked <?php }?> value="Ya"> Informed Consent Bedah <br>
                        <input type="checkbox" name="V_PRA_ANESTESI" <?php if ($_smarty_tpl->getVariable('rs_pra3')->value['V_PRA_ANESTESI']=='Ya'){?> checked <?php }?> value="Ya"> Asesmen Pra Anestesi <br> 
                       <input type="checkbox" name="V_ASES_PRA_LOK" <?php if ($_smarty_tpl->getVariable('rs_pra3')->value['V_ASES_PRA_LOK']=='Ya'){?> checked <?php }?> value="Ya"> Asesmen PraBedah  <br> 
                       <input type="checkbox" name="V_INFORMED_ANESTESI" <?php if ($_smarty_tpl->getVariable('rs_pra3')->value['V_INFORMED_ANESTESI']=='Ya'){?> checked <?php }?> value="Ya"> Informed Consent Anestesi <br>
                       <input type="checkbox" name="V_EDU_ANESTESI" <?php if ($_smarty_tpl->getVariable('rs_pra3')->value['V_EDU_ANESTESI']=='Ya'){?> checked <?php }?> value="Ya"> Edukasi Anestesi <br>
  
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
"  <?php }?> <?php }} ?>  value="" class="form-control"></td>
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
                   
                      <textarea name="RONTGEN" rows="6" style="width: 350px;" > <?php echo $_smarty_tpl->getVariable('rs_pra3')->value['RONTGEN'];?>
</textarea>
                     </td>
               </tr> 
               <tr>
                  <td>   EKG : </td>
                  <td >
                 
                    <textarea name="EKG" rows="1" style="width: 350px;" > <?php echo $_smarty_tpl->getVariable('rs_pra3')->value['EKG'];?>
</textarea>
                   </td>
             </tr> 
             <tr>
               <td>   Pemerikasaan Lain : </td>
               <td >
              
                 <textarea name="LAINNYA" rows="1" style="width: 350px;" ><?php echo $_smarty_tpl->getVariable('rs_pra3')->value['LAINNYA'];?>
</textarea>
                </td>
          </tr>           
          <tr>
            <td>  Darah/Alat yang diperlukan </td>
            <td >
              <textarea name="ALAT_LAIN" rows="1" style="width: 350px;" ><?php echo $_smarty_tpl->getVariable('rs_pra3')->value['ALAT_LAIN'];?>
 </textarea>
             </td>
       </tr>        
       <tr>
         <td>  Obat yang dibawa pasien </td>
         <td >
           <textarea name="OBAT_YG_DIBAWA" rows="1" style="width: 350px;" > <?php echo $_smarty_tpl->getVariable('rs_pra3')->value['OBAT_YG_DIBAWA'];?>
</textarea>
          </td>
         </tr>     
         <tr>
            <td>  Estimasi Waktu  </td>
            <td >
            <textarea name="ESTIMASI_WAKTU" rows="1" style="width: 350px;" > <?php echo $_smarty_tpl->getVariable('rs_pra3')->value['ESTIMASI_WAKTU'];?>
</textarea>
            </td>
      </tr>    
      <tr>
         <td>  Rencana Tindakan Bedah </td>
         <td >
         <textarea name="RENCANA_TINDAKAN" rows="1" style="width: 350px;" > <?php echo $_smarty_tpl->getVariable('rs_pra3')->value['RENCANA_TINDAKAN'];?>
  </textarea>
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



 