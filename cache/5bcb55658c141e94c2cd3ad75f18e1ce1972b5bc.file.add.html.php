<?php /* Smarty version Smarty-3.0.7, created on 2022-06-04 08:44:40
         compiled from "application/views\op/asuhan/add.html" */ ?>
<?php /*%%SmartyHeaderCode:17543629ab908ddc579-52060561%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5bcb55658c141e94c2cd3ad75f18e1ce1972b5bc' => 
    array (
      0 => 'application/views\\op/asuhan/add.html',
      1 => 1653712632,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17543629ab908ddc579-52060561',
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
        <a href="">Asuhan Keperawatan Operasi</a><span></span>
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div> 
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/asuhan/add_process2');?>
" method="post" onkeypress="return event.keyCode != 13">
        <input name="FS_KD_REG" id="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />  
            <input name="TGL_LAHIR" id="TGL_LAHIR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['TGL_LAHIR'];?>
" /> 
        <input name="idoperasi" type="hidden" value="<?php echo $_smarty_tpl->getVariable('idoperasi')->value;?>
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
            <!-- <p><strong>High Risk :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_HIGH_RISK'])===null||$tmp==='' ? '-' : $tmp);?>
 </p> -->
            <p><strong>Alergi :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
 (<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_REAK_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
)</p>
            <div class="clear"></div>
        </div>
        <table class="table-input" width="100%" style="text-align: justify;">
         

            <input type="hidden" name="KD_OPERATOR" value="<?php echo $_smarty_tpl->getVariable('rs_op')->value['Kode_Dokter'];?>
">

          

            <tr>
                <!-- <td width="20%">Nama Dokter Bedah </td>
                <td width="20%">
                    <select name="KD_OPERATOR" id="surat_dari" class="select2" style="width: 300px;">
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
                </td> -->
                <td width="20%">Nama Dokter Anestesi</td>
                <td width="20%">
                    <!-- <select name="KD_AHLI_ANESTESI" id="surat_dari" class="select2" style="width: 300px;">
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
                    </select> -->
                    <input type="text" name="KD_AHLI_ANESTESI" value="dr. Yusnita Debora, Sp.An" disabled>
                    <input type="hidden" name="KD_AHLI_ANESTESI" value="dr. Yusnita Debora, Sp.An" >
                </td>
            </tr>


            <tr>
                <td width="20%">Nama Asisten Anestesi </td>
                <td width="20%">
                    <select name="KD_PERAWAT_ANES" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_perawat_anes')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMAUSER'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
</option>
                        <?php }} ?>
                    </select>
                </td>

                <td width="20%">Nama Perawat Sirkuler</td>
                <td width="20%">
                    <select name="KD_PERAWAT_SERK" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_perawat')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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


         
            <tr>
                <td width="20%">Jam Mulai Operasi</td>
                <td width="20%">
                    <input type="time" name="JAM_MULAI" rows="1"   style="width: 80px;" > </input>  
                    <!-- sampai
                    <input type="time" name="JAM_SELESAI" rows="1"  style="width: 80px;" > </input> -->
                </td>
             </tr>

             
            <tr>
                <td width="20%">Jenis Anestesi </td>
                <td width="20%">
                    <input type="radio" name="JENIS_ANES" value="Umum" class="form-control">Umum 
                    <input type="radio" name="JENIS_ANES" value="Regional" class="form-control">Regional
                    <input type="radio" name="JENIS_ANES" value="Lokal" class="form-control">Lokal
                </td>

                <td width="20%">Sifat Operasi</td>
                <td width="20%">
                    <input type="radio" name="SIFAT_OP" value="Cito" class="form-control">Cito
                    <input type="radio" name="SIFAT_OP" value="Elektif" class="form-control">Elektif
                </td>
            </tr>

            
            <tr>
                <td width="20%">Diagnosa Pre-operatif</td>
                <td width="20%">
                    <input type="text" name="DIAGNOSA_PRA" value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['DIAGNOSA'];?>
" class="form-control">

                    <input type="hidden" name="DIAGNOSA_POST" value="" class="form-control">

                </td>


                <!-- <td width="20%">Diagnosa Post-op</td>
                <td width="20%">
                    <input type="text" name="DIAGNOSA_POST" value="<?php echo $_smarty_tpl->getVariable('rs_pra_anes')->value['DIAGNOSA_POST'];?>
" class="form-control">
                </td> -->
            </tr>



            <tr>
                <td>Tindakan Operasi</td>
                <td >
                    <textarea name="TINDAKAN_OP" rows="2" style="width: 350px;" > </textarea>
                    </td>
                    </tr>

            <tr><td colspan="4">  <hr></td></tr>
            <tr><td> <B>PENGKAJIAN PRE OPERASI</B></td></tr>
               
                 
                    <tr>
                        <td>  Kesadaran</td>
                        <td  >
                            <input type="radio" name="KESADARAN" value="Composmentis"> Composmentis <br>
                            <input type="radio" name="KESADARAN" value="Apatis"> Apatis <br>
                            <input type="radio" name="KESADARAN" value="Samnolen" > Samnolen  <br>
                            <input type="radio" name="KESADARAN" value="Sopor"> Sopor  <br>
                            <input type="radio" name="KESADARAN" value="Soporokoma"> Soporokoma  <br>
                            <input type="radio" name="KESADARAN" value="Koma"> Koma  <br>
                            </td>
                        <td>  Status Psikologi</td>
                            <td  >
                                <input type="radio" name="STATUS_PSIKOLOGI" value="Tenang">Tenang <br>
                                <input type="radio" name="STATUS_PSIKOLOGI" value="Cemas">Cemas <br>
                                <input type="radio" name="STATUS_PSIKOLOGI" value="Tegang">Tegang <br>
                                <input type="radio" name="STATUS_PSIKOLOGI" value="Gelisah">Gelisah <br>
                                 </td>
                      
                    </tr>     

                    <tr><td><b>Tanda Tanda Vital </b></td></tr>
                    <tr>
                         <td colspan="4">
                           <table>
                              <tr>
                                  <td>     Tekanan Darah </td><td>: <input type="text" value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['TD'];?>
" name="TD"  class="form-control" style="width: 60px;"></td>
                              
                                <td>   Nadi </td><td>: <input type="text" name="ND"  value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['ND'];?>
" class="form-control" style="width: 60px;"></td>
                                <td>     Pernafasan</td><td> : <input type="text" value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['P'];?>
" name="P"  class="form-control" style="width: 60px;"></td>
                                <td>     Suhu</td><td> : <input type="text" name="SH" value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['SH'];?>
"  class="form-control" style="width: 60px;"></td>
                                <td>     SPO2</td><td> : <input type="text" name="SPO2" value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['SPO2_umum_pra'];?>
"  class="form-control" style="width: 60px;"></td>
                                <td>  </td><td></td>
                             </tr>
                           </table>
                           </td>
                 </tr>


                 <tr>
                    <td width="20%">Puasa  </td>
                    <td width="20%">
                        <input type="time" name="PUASA" value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra')->value['MAKAN_TERAKHIR'];?>
" style="width: 100px;" class="form-control">
                        <!-- <input type="radio" name="JENIS_PUASA"  value="Lavamen">Lavamen -->
                        <input type="radio" name="JENIS_PUASA"  value="Klisma">KLisma
                    </td>
    
                    <!-- <td width="20%">Kulit</td>
                    <td width="20%"> -->
                        <input type="hidden" name="KULIT"   class="form-control">
                    <!-- </td> -->
                </tr>

                <tr>
                    <td><b>Evaluasi</b></td></tr>
                <tr>
                    
                    <td colspan="4">
                        <table>
                            <tr><td>S</td><td>  <textarea name="EVALUASI1" rows="3" style="width: 350px;" > </textarea></td><td>A</td><td> <textarea name="EVALUASI3" rows="3" style="width: 350px;" > </textarea></td> </tr>
                            <tr><td>O</td><td><textarea name="EVALUASI2" rows="3" style="width: 350px;" > </textarea></td> <td>P</td><td> <textarea name="EVALUASI4" rows="3" style="width: 350px;" > </textarea></td></tr>
                        </table>
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
        <th width="10%"> Pra Operasi</th> 
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
         <td>Selesai</td>
         <td><?php if ($_smarty_tpl->tpl_vars['cppt']->value['SP02']!=''){?> Selesai 
            <?php }else{ ?> 
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('op/asuhan/intra/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['id']));?>
"   class="button-edit"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['TANGGAL'],"%d %B %Y");?>
</a> 
             <?php }?></td>
         <td><?php if ($_smarty_tpl->tpl_vars['cppt']->value['TURGOR']!=''){?> Selesai 
                <?php }else{ ?> 
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('op/asuhan/post/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['id']));?>
"   class="button-edit"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['TANGGAL'],"%d %B %Y");?>
</a> 
                 <?php }?></td>

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
</script>




  