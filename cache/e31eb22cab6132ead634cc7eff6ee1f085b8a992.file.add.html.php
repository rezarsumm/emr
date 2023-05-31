<?php /* Smarty version Smarty-3.0.7, created on 2022-06-04 08:50:34
         compiled from "application/views\op/checklist/add.html" */ ?>
<?php /*%%SmartyHeaderCode:19424629aba6a858431-36327460%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e31eb22cab6132ead634cc7eff6ee1f085b8a992' => 
    array (
      0 => 'application/views\\op/checklist/add.html',
      1 => 1653797933,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19424629aba6a858431-36327460',
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
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/add_process2');?>
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
                <th colspan="2">Add Check List Keselamatan Operasi</th>
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
                <input type="hidden" name="KD_OPERATOR" value="<?php echo $_smarty_tpl->getVariable('rs_op')->value['Kode_Dokter'];?>
">
             
                <td width="20%">Nama Dokter Anestesi</td>
               <td><input type="text" name="KD_AHLI_ANESTESI" value="dr. Yusnita Debora, Sp.An" disabled>
                <input type="hidden" name="KD_AHLI_ANESTESI" value="dr. Yusnita Debora, Sp.An" ></td> 

                <!-- <td width="20%">Nama Dokter Anestesi</td>
                <td width="20%">
                    <select name="KD_AHLI_ANESTESI" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_dokter_sp')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>

                        <?php if ($_smarty_tpl->tpl_vars['data']->value['NAMAUSER']==$_smarty_tpl->getVariable('rs_asuhan3')->value['KD_AHLI_ANESTESI']){?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMAUSER'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
</option>
                        else
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMAUSER'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
</option>
                        <?php }?>
                        <?php }} ?>
                    </select>
                </td> -->
            </tr>
 

            
         
            <tr>
                <td width="20%">Nama Operasi</td>
                <td width="20%">
                    <input type="text" name="NAMA_OP" value="<?php echo $_smarty_tpl->getVariable('rs_op')->value['nmtindakan'];?>
" class="form-control">
                </td>
             </tr>

             <tr><td><B> SIGN IN (sebelum Induksi Anestesi )</B></td></tr>

             <tr>
                <td colspan="2">Apakah Pasien telah dikonfirmasi <b>Identitas, lokasi operasi dan tindakan operasi dan informed consent ? </b></td>
                <td width="20%">
                    <input type="radio" name="IN_KONFIR_IDENTITAS" value="Ya" class="form-control">ya
                </td>
             </tr>

             <tr>
                <td colspan="2">Apakah lokasi operasi diberi tanda ?</td>
                <td width="20%">
                   
                    <input type="radio" name="IN_TANDA_LOKASI"  class="rad" value="Tidak" class="form-control">Tidak
                    <input type="radio" name="IN_TANDA_LOKASI" class="rad" value="Ya" class="form-control">Ya
                    <input type="text" name="IN_TANDA_LOKASI1" id="form2" style="display:none"  class="form-control">

                </td>
             </tr>

             <tr>
                <td colspan="2">Apakah mesin anestesi dan obat obatan dicek lengkap ?</td>
                <td width="20%">
                   
                    <input type="radio" name="IN_MESIN_LENGKAP" value="Tidak" class="form-control">Tidak
                    <input type="radio" name="IN_MESIN_LENGKAP" value="Ya" class="form-control">Ya
                </td>
             </tr>

             <tr>
                <td colspan="2">Apakah Pasien memiliki alergi ?</td>
                <td width="20%">
                    <input type="radio" name="IN_RIWAYAT_ALERGI" <?php if ($_smarty_tpl->getVariable('rs_umum_pra3')->value['RIWAYAT_ALERGI']=='Tidak'){?> checked <?php }?>  class="radal" value="Tidak" class="form-control">Tidak
                    <input type="radio" name="IN_RIWAYAT_ALERGI" <?php if ($_smarty_tpl->getVariable('rs_umum_pra3')->value['RIWAYAT_ALERGI']!='Tidak'){?> checked <?php }?> class="radal" value="Ya" class="form-control">Ya
                    <input type="text" name="IN_RIWAYAT_ALERGI1" <?php if ($_smarty_tpl->getVariable('rs_umum_pra3')->value['RIWAYAT_ALERGI']!='Tidak'){?> style="display:show" value="<?php echo $_smarty_tpl->getVariable('rs_umum_pra3')->value['RIWAYAT_ALERGI'];?>
" <?php }?>  id="formal" style="display:none"  class="form-control">
 
                </td>
             </tr>

             <tr>
                <td colspan="2">Apakah Pasien memiliki asma ?</td>
                <td width="20%">
                    
                    <input type="radio" name="IN_RIWAYAT_ASMA"  class="radas" value="Tidak" class="form-control">Tidak
                    <input type="radio" name="IN_RIWAYAT_ASMA" class="radas" value="Ya" class="form-control">Ya
                    <input type="text" name="IN_RIWAYAT_ASMA1" id="formas" style="display:none"  class="form-control">

                 
                </td>
             </tr>

             <tr>
                <td colspan="2">Adakah rencana pemasangan implant ?</td>
                <td width="20%">
                    <input type="radio" name="IN_RENCANA_IMPLANT"  class="radim" value="Tidak" class="form-control">Tidak
                    <input type="radio" name="IN_RENCANA_IMPLANT" class="radim" value="Ya" class="form-control">Ya
                    <input type="text" name="IN_RENCANA_IMPLANT1" id="formim" style="display:none"  class="form-control">

             
                </td>
             </tr>

             <tr>
                <td colspan="2">Resiko Kehilangan Darah > 500ml ?</td>
                <td width="20%">
                    <input type="radio" name="IN_RESIKO_HILANG_DARAH" value="Tidak" class="form-control">Tidak
                    <input type="radio" name="IN_RESIKO_HILANG_DARAH" value="Ya" class="form-control">ya
                </td>
             </tr>

             <tr>
                <td>
                    Waktu Input 
                </td>
                <td>
                    <input type="datetime-local" name="IN_WAKTU_ISI">
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
        <td><?php if ($_smarty_tpl->tpl_vars['cppt']->value['NAMA_OP']!=''){?> Done <?php }?></td> 
        <td><?php if ($_smarty_tpl->tpl_vars['cppt']->value['TIME_PERKENALAN_ANGGOTA']!=''){?> Done 
            <?php }else{ ?> 
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('op/checklist/timeout/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['id']));?>
"  class="button-edit"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['TANGGAL'],"%d %B %Y");?>
</a> 
             <?php }?>

        </td> 
         <td><?php if ($_smarty_tpl->tpl_vars['cppt']->value['OUT_MASALAH_ALAT']!=''){?> Done 
            <?php }else{ ?> 
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('op/checklist/signout/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['id']));?>
"   class="button-edit"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['TANGGAL'],"%d %B %Y");?>
</a> 
             <?php }?></td>
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



  