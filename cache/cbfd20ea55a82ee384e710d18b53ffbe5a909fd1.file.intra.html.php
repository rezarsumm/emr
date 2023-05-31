<?php /* Smarty version Smarty-3.0.7, created on 2022-06-04 08:46:46
         compiled from "application/views\op/asuhan/intra.html" */ ?>
<?php /*%%SmartyHeaderCode:6454629ab9860b28b2-45510203%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cbfd20ea55a82ee384e710d18b53ffbe5a909fd1' => 
    array (
      0 => 'application/views\\op/asuhan/intra.html',
      1 => 1653797079,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6454629ab9860b28b2-45510203',
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
      <small>  Intra Operasi</small>
  </p>
  <div class="clear"></div>
</div> 
<div class="content-entry">
  <!-- notification template -->
  <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
  <!-- end of notification template-->
  <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/asuhan/add_process3');?>
" method="post" onkeypress="return event.keyCode != 13">
      <input name="FS_KD_REG" id="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />  
          <input name="TGL_LAHIR" id="TGL_LAHIR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['TGL_LAHIR'];?>
" /> 
          <input name="idasuhan"   type="hidden" value="<?php echo $_smarty_tpl->getVariable('id')->value;?>
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
       

        
 

     
        <tr><td colspan="4">  <hr></td></tr>
        <tr><td> <B>PENGKAJIAN INTRA OPERASI</B></td></tr>
        
        <tr><td><b>Tanda Tanda Vital </b></td></tr>
        <tr>
             <td colspan="4">
               <table> 
                  <tr>
                      <td>     Tekanan Darah </td><td>: <input type="text" name="TD2" value="<?php echo $_smarty_tpl->getVariable('rs_intra')->value['TD'];?>
"  class="form-control" style="width: 60px;"></td>
                  
                    <td>   Nadi </td><td>: <input type="text" name="ND2" value="<?php echo $_smarty_tpl->getVariable('rs_intra')->value['ND'];?>
" class="form-control" style="width: 60px;"></td>
                    <td>     Pernafasan</td><td> : <input type="text" value="<?php echo $_smarty_tpl->getVariable('rs_intra')->value['P'];?>
" name="P2"  class="form-control" style="width: 60px;"></td>
                    <td>     SH</td><td> : <input type="text" name="SH2" value="<?php echo $_smarty_tpl->getVariable('rs_intra')->value['SH'];?>
" class="form-control" style="width: 60px;"></td>
                    <td>     SPO2</td><td> : <input type="text" name="SP02" value="<?php echo $_smarty_tpl->getVariable('rs_intra')->value['SP02'];?>
" class="form-control" style="width: 60px;"></td>
                    <td>  </td><td></td>
                 </tr>
               </table>
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
               Waktu Penginputan  <input type="datetime-local" name="Time_input_askep_intra"   value="<?php echo $_smarty_tpl->getVariable('rs_intra')->value['Time_input_askep_intra'];?>
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
       <td><?php if ($_smarty_tpl->tpl_vars['cppt']->value['SP02']!=''){?> Selesai    <?php }?>
       
          <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('op/asuhan/intra/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['id']));?>
"   class="button-edit"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['TANGGAL'],"%d %B %Y");?>
</a> 
        </td>
       <td><?php if ($_smarty_tpl->tpl_vars['cppt']->value['TURGOR']!=''){?> Selesai    <?php }?>
             
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
</script>




