<?php /* Smarty version Smarty-3.0.7, created on 2022-06-04 08:47:21
         compiled from "application/views\op/asuhan/post.html" */ ?>
<?php /*%%SmartyHeaderCode:13571629ab9a988fb61-05712895%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8052c2a5aeb80e51d95ca378f56e3a1b1c1db783' => 
    array (
      0 => 'application/views\\op/asuhan/post.html',
      1 => 1653797316,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13571629ab9a988fb61-05712895',
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
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/laporan/');?>
">Asuhan Keperawatan Operasi</a><span></span>
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
  </div> 
  <div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/asuhan/add_process4');?>
" method="post" onkeypress="return event.keyCode != 13">
        <input name="FS_KD_REG" id="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />  
        <input name="idasuhan" id="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('id')->value;?>
" />  
            <input name="TGL_LAHIR" id="TGL_LAHIR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['TGL_LAHIR'];?>
" /> 
        <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />
        <input name="FS_KD_LAYANAN" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['KODE_BANGSAL'];?>
" />
        <input name="FS_KD_PETUGAS_MEDIS" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_medis'];?>
" />
  
        <table class="table-info" width="50%">
            <tr class="headrow">
                <th colspan="2">Add Asuhan Keperawatan Operasi</th>
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
   
        <div class="notification red">
            <p><strong>High Risk :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_HIGH_RISK'])===null||$tmp==='' ? '-' : $tmp);?>
 </p>
            <p><strong>Alergi :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
 (<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_REAK_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
)</p>
            <div class="clear"></div>
        </div>
        <table class="table-input" width="100%" style="text-align: justify;">
         
  
          
  
            <tr>
                <td width="20%"> </td>
                <td width="20%">  </td>
                <td width="20%"> </td>
                <td width="20%">  </td>
               
            </tr>
              
            <tr>
                <td width="20%">Jam Selesai Operasi</td>
                <td width="20%">
               
                    <input type="time" value="<?php echo date('H:i',strtotime($_smarty_tpl->getVariable('rs_asuhan4')->value['JAM_SELESAI']));?>
" name="JAM_SELESAI" rows="1"  style="width: 80px;" >   
                </td>
             </tr>
  
   
            <tr><td colspan="4">  <hr></td></tr>
            <tr><td> <B>PENGKAJIAN POST OPERASI</B></td></tr>
            
            <tr><td><b>Tanda Tanda Vital </b></td></tr>
            <tr>
               <td colspan="4">
                 <table>
                    <tr>
                        <td>     Tekanan Darah </td><td>: <input type="text" name="TD3" value="<?php echo $_smarty_tpl->getVariable('rs_asuhan4')->value['TD3'];?>
" class="form-control" style="width: 60px;"></td>
                    
                      <td>   Nadi </td><td>: <input type="text" name="ND3" value="<?php echo $_smarty_tpl->getVariable('rs_asuhan4')->value['ND3'];?>
"  class="form-control" style="width: 60px;"></td>
                      <td>     Pernafasan</td><td> : <input type="text" name="P3" value="<?php echo $_smarty_tpl->getVariable('rs_asuhan4')->value['P3'];?>
"  class="form-control" style="width: 60px;"></td>
                      <td>     SH</td><td> : <input type="text" name="SH3" value="<?php echo $_smarty_tpl->getVariable('rs_asuhan4')->value['SH3'];?>
" class="form-control" style="width: 60px;"></td>
                      <td>     SPO2</td><td> : <input type="text" name="SP02" value="<?php echo $_smarty_tpl->getVariable('rs_asuhan4')->value['SP02'];?>
" class="form-control" style="width: 60px;"></td>
                      <td>  </td><td></td>
                   </tr>
                 </table>
                 </td>
            </tr>
            
            
            <tr>
            <td width="20%">Kulit Turgor </td>
            <td width="20%">
            <input type="hidden" name="KULIT"  class="form-control"> <br>
            <input type="checkbox" name="TURGOR" <?php if ($_smarty_tpl->getVariable('rs_asuhan4')->value['TURGOR']=='Elastis'){?> checked <?php }?> value="Elastis" class="form-control">Elastis<br>
            <input type="checkbox" name="TURGOR" <?php if ($_smarty_tpl->getVariable('rs_asuhan4')->value['TURGOR']=='Luka'){?> checked <?php }?> value="Luka" class="form-control">Luka<br>
            <input type="checkbox" name="TURGOR" <?php if ($_smarty_tpl->getVariable('rs_asuhan4')->value['TURGOR']=='Jelek'){?> checked <?php }?> value="Jelek" class="form-control">Jelek<br>
            </td>
            
            <td width="20%">Terpasang Implant didaerah</td>
            <td width="20%">
            <input type="hidden" name="LOKASI" class="form-control">
            <!-- <input type="text" name="IMPLANT" value="<?php echo $_smarty_tpl->getVariable('rs_asuhan4')->value['IMPLANT'];?>
" class="form-control"> -->

                <input type="radio" name="IMPLANT"  class="rad" value="Tidak" class="form-control">Tidak
                <input type="radio" name="IMPLANT" class="rad" value="Ya" class="form-control">Ya
                <input type="text" name="IMPLANT" id="form2" style="display:none"  class="form-control">
        

            </td>
            </tr>
            
             
              <tr>
                <td width="20%">Infus Masuk </td>
                <td width="20%">
                    <input type="text" name="INFUS_MASUK" value="<?php echo $_smarty_tpl->getVariable('rs_asuhan4')->value['INFUS_MASUK'];?>
" class="form-control">
                
                </td>
            
                <td width="20%">    Darah Masuk</td>
                <td width="20%">
                    <input type="text" name="DARAH_MASUK" value="<?php echo $_smarty_tpl->getVariable('rs_asuhan4')->value['DARAH_MASUK'];?>
" class="form-control">
                </td>
            </tr>
            <tr>
                <td width="20%">Pendarahan  </td>
                <td width="20%">
                    <input type="text" name="PENDARAHAN" value="<?php echo $_smarty_tpl->getVariable('rs_asuhan4')->value['PENDARAHAN'];?>
" class="form-control">
                
                </td>
            
                <td width="20%">    Urine</td>
                <td width="20%">
                    <input type="text" name="URINE" value="<?php echo $_smarty_tpl->getVariable('rs_asuhan4')->value['URINE'];?>
" class="form-control">
                </td>
            </tr>
            
            <tr>
                <td width="20%">  Asites </td>
                <td width="20%">
                    <input type="text" name="ASITES" value="<?php echo $_smarty_tpl->getVariable('rs_asuhan4')->value['ASITES'];?>
" class="form-control">
                
                </td>
            
                <td width="20%">    Pus</td>
                <td width="20%">
                    <input type="text" name="PUS" value="<?php echo $_smarty_tpl->getVariable('rs_asuhan4')->value['PUS'];?>
" class="form-control">
                </td>
            </tr>
            
          
                    <tr>
                      <td><b>Evaluasi</b></td></tr>
                  <tr>
                      
                      <td colspan="4">
                        <table>
                            <tr><td>S</td><td>  <textarea name="EVALUASI1" rows="3" style="width: 350px;" > <?php echo $_smarty_tpl->getVariable('s')->value;?>
 </textarea></td>
                                 <td>A</td><td><textarea name="EVALUASI3" rows="3" style="width: 350px;" > <?php echo $_smarty_tpl->getVariable('a')->value;?>
</textarea></td></tr>
                            <tr><td>O</td><td> <textarea name="EVALUASI2" rows="3" style="width: 350px;" > <?php echo $_smarty_tpl->getVariable('o')->value;?>
</textarea></td>
                                 <td>P</td><td> <textarea name="EVALUASI4" rows="3" style="width: 350px;" > <?php echo $_smarty_tpl->getVariable('p')->value;?>
</textarea></td></tr>
                        </table>
                                               </td>
                          </tr>
                    
         <tr>
             <td>
               Waktu Penginputan  <input type="datetime-local" name="Time_input_askep_post"   value="<?php echo $_smarty_tpl->getVariable('rs_intra')->value['Time_input_askep_post'];?>
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
        <th colspan="6">List Data </th>
    </tr>
    <tr>
        <th width="25%">Tanggal</th>
        <th width="10%">Diagnosa </th>
        <th width="10%"> Sifat</th> 
        <th width="10%"> Post Operasi</th> 
        <th width="10%"> Intra Operasi</th> 
        <th width="10%"> Post Operasi</th> 
        <th width="15%">Petugas</th>
      
    </tr>
    <?php  $_smarty_tpl->tpl_vars['cppt'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_asuhan')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cppt']->key => $_smarty_tpl->tpl_vars['cppt']->value){
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['TGL'];?>
  
            <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('rm/rawat_inap/cetak_asuhan_kep_op2/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['idoperasi']))===null||$tmp==='' ? '' : $tmp));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">  <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['TANGGAL'],"%d %B %Y");?>
</a> 
        </td>
        <td> Pra : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['DIAGNOSA_PRA'];?>
 <br> Post : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['DIAGNOSA_PRA'];?>
 </td>
         <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['SIFAT_OP'];?>
 </td> 
         <td>Selesai </td> 
         <td><?php if ($_smarty_tpl->tpl_vars['cppt']->value['SP02']!=''){?> Selesai  <?php }?>
          
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('op/asuhan/intra/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['id']));?>
"   class="button-edit"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['TANGGAL'],"%d %B %Y");?>
</a> 
            </td>
         <td><?php if ($_smarty_tpl->tpl_vars['cppt']->value['TURGOR']!=''){?> Selesai  <?php }?>
               
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('op/asuhan/post/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['id']));?>
"   class="button-edit"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['TANGGAL'],"%d %B %Y");?>
</a> 
               </td>
  
                 <td>Perawat : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['KD_PERAWAT_INS'];?>
 <BR> Dokter :  <?php echo $_smarty_tpl->tpl_vars['cppt']->value['NAMALENGKAP'];?>
 </td>
  
  
    </tr> 
    <?php }} ?>
  </table>
  <script>
       $(".select2").select2({
            placeholder: "Pilih",
            allowClear: true
        });


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
  </script>
  
  
  
  
  