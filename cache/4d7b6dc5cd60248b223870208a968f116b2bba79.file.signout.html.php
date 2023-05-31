<?php /* Smarty version Smarty-3.0.7, created on 2022-06-04 08:51:35
         compiled from "application/views\op/checklist/signout.html" */ ?>
<?php /*%%SmartyHeaderCode:23059629abaa74ce965-63298276%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d7b6dc5cd60248b223870208a968f116b2bba79' => 
    array (
      0 => 'application/views\\op/checklist/signout.html',
      1 => 1654249900,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23059629abaa74ce965-63298276',
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
">Check List Keselamatan Operasi</a><span></span>
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div> 
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/add_process4');?>
" method="post" onkeypress="return event.keyCode != 13">
        <input name="FS_KD_REG" id="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />  
        <input name="id"  type="hidden" id="idchecklist" value="<?php echo $_smarty_tpl->getVariable('id')->value;?>
" />  
            <input name="TGL_LAHIR" id="TGL_LAHIR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['TGL_LAHIR'];?>
" /> 
        <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />
        <input name="FS_KD_LAYANAN" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['KODE_BANGSAL'];?>
" />
        <input name="FS_KD_PETUGAS_MEDIS" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_medis'];?>
" />

        <table class="table-info" width="100%">
            <tr class="headrow">
                <th colspan="2">Add Check List Keselamatan Operasi </th>
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
         

          

          
            <tr><td colspan="2"><B><h3> SIGN OUT (sebelum tim bedah keluar kamar operasi )</h3></B></td></tr>
  
               
            <tr><td><b>Data penggunaan Benda Tajam</b></td></tr>
             
            <tr>
                <td colspan="4">
                    <table border="1">
                        <tr>
                            <td> Nama benda </td>
                            <td> Hitungan pertama </td>
                            <td> Tambahan </td>
                         </tr>
                         
                         <?php  $_smarty_tpl->tpl_vars['b'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('benda_tajam')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['b']->key => $_smarty_tpl->tpl_vars['b']->value){
?>

                         <?php if ($_smarty_tpl->tpl_vars['b']->value['kdbarang']=='b1'){?>
                         <tr>
                            <td > <?php echo $_smarty_tpl->tpl_vars['b']->value['namabarang'];?>
 </td>
                            <td><input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['b']->value['hit1'];?>
" class="hit1_b1" class="hit1_b1" name="hit1_mata_pisau" > </td>
                            <td><input type="text" class="tamb_b1" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['tambahan'];?>
" name="tam_mata_pisau"  > </td>
                        </tr>
                        <?php }elseif($_smarty_tpl->tpl_vars['b']->value['kdbarang']=='b2'){?>
                        <tr>
                           <td > <?php echo $_smarty_tpl->tpl_vars['b']->value['namabarang'];?>
 </td>
                           <td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['hit1'];?>
" class="hit1_b2" name="hit1_mata_pisau" > </td>
                           <td><input type="text" class="tamb_b2" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['tambahan'];?>
" name="tam_mata_pisau"  > </td>
                        </tr>
                        <?php }elseif($_smarty_tpl->tpl_vars['b']->value['kdbarang']=='b3'){?>
                        <tr>
                           <td > <?php echo $_smarty_tpl->tpl_vars['b']->value['namabarang'];?>
 </td>
                           <td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['hit1'];?>
" class="hit1_b3" name="hit1_mata_pisau" > </td>
                           <td><input type="text" class="tamb_b3" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['tambahan'];?>
" name="tam_mata_pisau"  > </td>
                       </tr>

                       <?php }elseif($_smarty_tpl->tpl_vars['b']->value['kdbarang']=='b4'){?>
                       <tr>
                          <td > <?php echo $_smarty_tpl->tpl_vars['b']->value['namabarang'];?>
 </td>
                          <td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['hit1'];?>
" class="hit1_b4" name="hit1_mata_pisau" > </td>
                          <td><input type="text" class="tamb_b4" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['tambahan'];?>
" name="tam_mata_pisau"  > </td>
                      </tr>

                      <?php }elseif($_smarty_tpl->tpl_vars['b']->value['kdbarang']=='b5'){?>
                      <tr>
                         <td > <?php echo $_smarty_tpl->tpl_vars['b']->value['namabarang'];?>
 </td>
                         <td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['hit1'];?>
" class="hit1_b5" name="hit1_mata_pisau" > </td>
                         <td><input type="text" class="tamb_b5" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['tambahan'];?>
" name="tam_mata_pisau"  > </td>
                     </tr>

                     <?php }elseif($_smarty_tpl->tpl_vars['b']->value['kdbarang']=='b6'){?>
                     <tr>
                        <td > <?php echo $_smarty_tpl->tpl_vars['b']->value['namabarang'];?>
 </td>
                        <td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['hit1'];?>
" class="hit1_b6" name="hit1_mata_pisau" > </td>
                        <td><input type="text" class="tamb_b6" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['tambahan'];?>
" name="tam_mata_pisau"  > </td>
                    </tr>

                    <?php }elseif($_smarty_tpl->tpl_vars['b']->value['kdbarang']=='b7'){?>
                    <tr>
                       <td > <?php echo $_smarty_tpl->tpl_vars['b']->value['namabarang'];?>
 </td>
                       <td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['hit1'];?>
" class="hit1_b7" name="hit1_mata_pisau" > </td>
                       <td><input type="text" class="tamb_b7" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['tambahan'];?>
" name="tam_mata_pisau"  > </td>
                   </tr>

                   <?php }elseif($_smarty_tpl->tpl_vars['b']->value['kdbarang']=='b8'){?>
                   <tr>
                      <td > <?php echo $_smarty_tpl->tpl_vars['b']->value['namabarang'];?>
 </td>
                      <td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['hit1'];?>
" class="hit1_b8" name="hit1_mata_pisau" > </td>
                      <td><input type="text" class="tamb_b8" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['tambahan'];?>
" name="tam_mata_pisau"  > </td>
                  </tr>

                  <?php }elseif($_smarty_tpl->tpl_vars['b']->value['kdbarang']=='b9'){?>
                  <tr>
                     <td > <?php echo $_smarty_tpl->tpl_vars['b']->value['namabarang'];?>
 </td>
                     <td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['hit1'];?>
" class="hit1_b9" name="hit1_mata_pisau" > </td>
                     <td><input type="text" class="tamb_b9" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['tambahan'];?>
" name="tam_mata_pisau"  > </td>
                 </tr>

                 <?php }elseif($_smarty_tpl->tpl_vars['b']->value['kdbarang']=='b10'){?>
                 <tr>
                    <td > <?php echo $_smarty_tpl->tpl_vars['b']->value['namabarang'];?>
 </td>
                    <td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['hit1'];?>
" class="hit1_b10" name="hit1_mata_pisau" > </td>
                    <td><input type="text" class="tamb_b10" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['tambahan'];?>
" name="tam_mata_pisau"  > </td>
                </tr>

                <?php }elseif($_smarty_tpl->tpl_vars['b']->value['kdbarang']=='b11'){?>
                <tr>
                   <td > <?php echo $_smarty_tpl->tpl_vars['b']->value['namabarang'];?>
 </td>
                   <td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['hit1'];?>
" class="hit1_b11" name="hit1_mata_pisau" > </td>
                   <td><input type="text" class="tamb_b11" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['tambahan'];?>
" name="tam_mata_pisau"  > </td>
               </tr>

               <?php }elseif($_smarty_tpl->tpl_vars['b']->value['kdbarang']=='b12'){?>
               <tr>
                  <td > <?php echo $_smarty_tpl->tpl_vars['b']->value['namabarang'];?>
 </td>
                  <td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['hit1'];?>
" class="hit1_b12" name="hit1_mata_pisau" > </td>
                  <td><input type="text" class="tamb_b12" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['tambahan'];?>
" name="tam_mata_pisau"  > </td>
              </tr>

              

                       <?php }elseif($_smarty_tpl->tpl_vars['b']->value['kdbarang']=='b13'){?>
                            <tr>
                                <td > <input type="text" class="nm_b13" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['namabarang'];?>
" name="namabarang" > </td>
                                <td><input type="text" class="hit1_b1" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['hit1'];?>
" class="hit1_b13" name="hit1_mata_pisau" > </td>
                                <td><input type="text" class="tamb_b13" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['tambahan'];?>
" name="tam_mata_pisau"  > </td>
                            </tr>
                         <?php }elseif($_smarty_tpl->tpl_vars['b']->value['kdbarang']=='b14'){?>
                         <tr>
                             <td > <input type="text" class="nm_b14" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['namabarang'];?>
" name="namabarang" > </td>
                             <td><input type="text" class="hit1_b1" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['hit1'];?>
" class="hit1_b14" name="hit1_mata_pisau" > </td>
                             <td><input type="text" class="tamb_b14" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['tambahan'];?>
" name="tam_mata_pisau"  > </td>
                         </tr>
                         <?php }elseif($_smarty_tpl->tpl_vars['b']->value['kdbarang']=='b15'){?>
                         <tr>
                             <td > <input type="text" class="nm_b14" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['namabarang'];?>
" name="namabarang" > </td>
                             <td><input type="text" class="hit1_b1" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['hit1'];?>
" class="hit1_b15" name="hit1_mata_pisau" > </td>
                             <td><input type="text" class="tamb_b15" value="<?php echo $_smarty_tpl->tpl_vars['b']->value['tambahan'];?>
" name="tam_mata_pisau"  > </td>
                         </tr>
                         <?php }else{ ?>
                        <?php }?>
                         
                        <?php }} ?>

                    </table>
                </td>
            </tr>
            </table>
            <table class="table-input" width="100%" style="text-align: justify;">

            <tr>
                <td colspan="2">Apakah nama tindakan dicatat ?</td>
                <td width="20%">
                    <input type="text" style="width:350px" name="OUT_CATAT_TINDAKAN" value="<?php echo $_smarty_tpl->getVariable('rs_sign_in2')->value['OUT_CATAT_TINDAKAN'];?>
"  class="form-control">            
                </td>
             </tr>

            <tr>
                <td colspan="2">Apakah Instrumen benda tajam dan kasa lengkap ?</td>
                <td width="20%">
                    <input type="text" style="width:350px" name="OUT_INSTRUMEN_LENGKAP" value="<?php echo $_smarty_tpl->getVariable('rs_sign_in2')->value['OUT_INSTRUMEN_LENGKAP'];?>
"  class="form-control"> 
                </td>
             </tr>

            <tr>
               <td colspan="2">Penanganan jaringan yang akan dikirim ke PA</td>
               <td width="20%">
                   <input type="text" style="width:350px" name="OUT_INSTRUMEN_LENGKAP"  value="<?php echo $_smarty_tpl->getVariable('rs_sign_in2')->value['OUT_INSTRUMEN_LENGKAP'];?>
" class="form-control"> 
                </td>
            </tr>
            <tr>
                <td colspan="2">apakah ada masalah peralatan</td>
                <td width="20%">
                    <input type="checkbox" name="OUT_MASALAH_ALAT"  value="Ya" class="form-control">ya 
                    <input type="checkbox" name="OUT_MASALAH_ALAT" value="Tidak" class="form-control">Tidak
                </td>
             </tr>
             <tr>
                <td colspan="2">apakah ada yang menjadi perhatian khusus pada pemulihan pasien ?</td>
                <td width="20%">
                    <input type="checkbox" name="OUT_PERHATIAN" value="Ya" class="form-control">ya 
                    <input type="checkbox" name="OUT_PERHATIAN" value="Tidak" class="form-control">Tidak
                </td>
             </tr>
         
            <tr>
                <td>
                    Waktu Input 
                </td>
                <td>
                    <input type="datetime-local" name="OUT_WAKTU_ISI" required>
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
        <th width="10%">Nama Operasi </th>
        <th width="10%"> Sign In</th>
        <th width="10%"> Time Out</th>
        <th width="10%"> Sign Out</th>
        <th width="15%">Petugas</th>
      
    </tr>
    <?php  $_smarty_tpl->tpl_vars['cppt'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_sign_in')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cppt']->key => $_smarty_tpl->tpl_vars['cppt']->value){
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['TGL'];?>
  
            <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_inap/cetak_checklist/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['id']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['TANGGAL'],"%d %B %Y");?>
</a> 
        </td>
        <td> Pra : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['NAMA_OP'];?>
  </td>
        <td><?php if ($_smarty_tpl->tpl_vars['cppt']->value['NAMA_OP']!=''){?> Selesai <?php }?></td> 
        <td><?php if ($_smarty_tpl->tpl_vars['cppt']->value['TIME_PERKENALAN_ANGGOTA']!=''){?> Selesai  <?php }?>
           
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('op/checklist/timeout/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['id']));?>
"  class="button-edit"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['TANGGAL'],"%d %B %Y");?>
</a> 
            

        </td> 
         <td><?php if ($_smarty_tpl->tpl_vars['cppt']->value['OUT_MASALAH_ALAT']!=''){?>Selesai  <?php }?>
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('op/checklist/signout/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['id']));?>
"   class="button-edit"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['TANGGAL'],"%d %B %Y");?>
</a> 
           </td>
         <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['NAMALENGKAP'];?>
 </td>
  
  
    </tr>
    <?php }} ?>
</table>
<script>
       $(".select2").select2({
            placeholder: "Pilih",
            allowClear: true
        });

        var idchecklist=$('#idchecklist').val();
    
        $('.hit1_b1').on('keyup', function(){
            var mp=$('.hit1_b1').val();
            var kdbarang='b1';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam1');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        hit1: mp,
                        idchecklist: idchecklist
                    }
                    
                    }).done(function(o) {  });
        });


        $('.hit1_b13').on('keyup', function(){
            var mp=$('.hit1_b13').val();
            var kdbarang='b13';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam1');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        hit1: mp,
                        idchecklist: idchecklist
                    }
                    
                    }).done(function(o) {  });
        });


        $('.hit1_b14').on('keyup', function(){
            var mp=$('.hit1_b14').val();
            var kdbarang='b14';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam1');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        hit1: mp,
                        idchecklist: idchecklist
                    }
                    
                    }).done(function(o) {  });
        });


        $('.hit1_b15').on('keyup', function(){
            var mp=$('.hit1_b15').val();
            var kdbarang='b15';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam1');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        hit1: mp,
                        idchecklist: idchecklist
                    }
                    
                    }).done(function(o) {  });
        });



     

        $('.hit1_b2').on('keyup', function(){
            var mp=$('.hit1_b2').val();
            var kdbarang='b2';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam1');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        hit1: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });


        $('.hit1_b3').on('keyup', function(){
            var mp=$('.hit1_b3').val();
            var kdbarang='b3';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam1');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        hit1: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });


        $('.hit1_b4').on('keyup', function(){
            var mp=$('.hit1_b4').val();
            var kdbarang='b4';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam1');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        hit1: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });

        $('.hit1_b5').on('keyup', function(){
            var mp=$('.hit1_b5').val();
            var kdbarang='b5';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam1');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        hit1: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });


        $('.hit1_b6').on('keyup', function(){
            var mp=$('.hit1_b6').val();
            var kdbarang='b6';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam1');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        hit1: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });


        $('.hit1_b7').on('keyup', function(){
            var mp=$('.hit1_b7').val();
            var kdbarang='b7';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam1');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        hit1: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });


        $('.hit1_b8').on('keyup', function(){
            var mp=$('.hit1_b8').val();
            var kdbarang='b8';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam1');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        hit1: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });

        $('.hit1_b9').on('keyup', function(){
            var mp=$('.hit1_b9').val();
            var kdbarang='b9';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam1');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        hit1: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });


        $('.hit1_b10').on('keyup', function(){
            var mp=$('.hit1_b10').val();
            var kdbarang='b10';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam1');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        hit1: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });

        $('.hit1_b11').on('keyup', function(){
            var mp=$('.hit1_b11').val();
            var kdbarang='b11';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam1');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        hit1: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });

        $('.hit1_b12').on('keyup', function(){
            var mp=$('.hit1_b12').val();
            var kdbarang='b12';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam1');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        hit1: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });



        $('.tamb_b1').on('keyup', function(){
            var mp=$('.tamb_b1').val();
            var kdbarang='b1';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam2');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        tambahan: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });


        $('.tamb_b2').on('keyup', function(){
            var mp=$('.tamb_b2').val();
            var kdbarang='b2';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam2');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        tambahan: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });

        $('.tamb_b3').on('keyup', function(){
            var mp=$('.tamb_b3').val();
            var kdbarang='b3';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam2');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        tambahan: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });

        $('.tamb_b4').on('keyup', function(){
            var mp=$('.tamb_b4').val();
            var kdbarang='b4';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam2');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        tambahan: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });

        $('.tamb_b5').on('keyup', function(){
            var mp=$('.tamb_b5').val();
            var kdbarang='b5';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam2');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        tambahan: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });

        $('.tamb_b6').on('keyup', function(){
            var mp=$('.tamb_b6').val();
            var kdbarang='b6';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam2');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        tambahan: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });

        $('.tamb_b7').on('keyup', function(){
            var mp=$('.tamb_b7').val();
            var kdbarang='b7';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam2');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        tambahan: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });

        $('.tamb_b8').on('keyup', function(){
            var mp=$('.tamb_b8').val();
            var kdbarang='b8';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam2');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        tambahan: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });

        $('.tamb_b9').on('keyup', function(){
            var mp=$('.tamb_b9').val();
            var kdbarang='b9';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam2');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        tambahan: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });

        $('.tamb_b10').on('keyup', function(){
            var mp=$('.tamb_b10').val();
            var kdbarang='b10';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam2');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        tambahan: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });

        $('.tamb_b11').on('keyup', function(){
            var mp=$('.tamb_b11').val();
            var kdbarang='b11';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam2');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        tambahan: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });

        $('.tamb_b12').on('keyup', function(){
            var mp=$('.tamb_b12').val();
            var kdbarang='b12';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam2');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        tambahan: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });

        $('.tamb_b13').on('keyup', function(){
            var mp=$('.tamb_b13').val();
            var kdbarang='b13';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam2');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        tambahan: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });


        $('.tamb_b14').on('keyup', function(){
            var mp=$('.tamb_b14').val();
            var kdbarang='b14';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam2');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        tambahan: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });

        $('.tamb_b15').on('keyup', function(){
            var mp=$('.tamb_b15').val();
            var kdbarang='b15';
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam2');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        tambahan: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });


        $('.nm_b13').on('keyup', function(){
            var mp=$('.nm_b13').val();
            var kdbarang='b13';
        
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam3');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        nm_barang: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });

        $('.nm_b14').on('keyup', function(){
            var mp=$('.nm_b14').val();
            var kdbarang='b14';
        
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam3');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        nm_barang: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });

        $('.nm_b15').on('keyup', function(){
            var mp=$('.nm_b15').val();
            var kdbarang='b15';
        
             $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/benda_tajam3');?>
",
                    data: { 
                        kdbarang: kdbarang,
                        nm_barang: mp,
                        idchecklist: idchecklist
                    }
                     }).done(function(o) {  });
        });
</script>




  