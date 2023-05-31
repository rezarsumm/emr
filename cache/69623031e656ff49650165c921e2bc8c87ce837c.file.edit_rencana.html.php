<?php /* Smarty version Smarty-3.0.7, created on 2022-10-11 13:50:26
         compiled from "application/views\inap/kep/edit_rencana.html" */ ?>
<?php /*%%SmartyHeaderCode:396063451232896228-18880239%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69623031e656ff49650165c921e2bc8c87ce837c' => 
    array (
      0 => 'application/views\\inap/kep/edit_rencana.html',
      1 => 1665373103,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '396063451232896228-18880239',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><!-- include javascript -->
<?php $_template = new Smarty_Internal_Template("inap/kep/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of include javascript-->
<div class="breadcrum">
    <p> 
        <a href="#">Catatan Rawat Inap</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/kep/');?>
">Rencana Keperawatan</a><span></span>
        <small>Edit Data</small>
    </p>
    <div class="clear"></div>
</div> 
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/kep/edit_rencana_process');?>
" method="post">
        <input name="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />
        <input name="FS_KD_TRS" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rencana')->value['FS_KD_TRS'];?>
" />

        <table class="table-info" width="100%">
            <tr class="headrow">
                <th colspan="2">Edit rencana keperawatan</th>
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
        <div class="content-entry">
            <table class="table-input" width="100%">

                <tr class="headrow">
                    <th colspan="4">Rencana Keperawatan</th>
                </tr>
                <tr>
                    <td width='20%'>Masalah Keperawatan</td>
                    <td width='80%' colspan="2">
                       <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_masalah_kep')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                       <?php echo $_smarty_tpl->tpl_vars['data']->value['FS_NM_DIAGNOSA'];?>
,
                       <?php }} ?>
                    </td>
                </tr>
                <tr> 
                    <td>Diagnosa  <?php echo $_smarty_tpl->getVariable('rencana')->value['FS_KD_DAFTAR_DIAGNOSA'];?>
 </td>
                    <td>
                        <select name="FS_KD_DAFTAR_DIAGNOSA" id="diag" class="select2" style="width: 300px;">
                            <option value="0">--Pilih Data--</option>.
                            <?php  $_smarty_tpl->tpl_vars['ata'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_diagnosa')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ata']->key => $_smarty_tpl->tpl_vars['ata']->value){
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['ata']->value['FS_KD_DAFTAR_DIAGNOSA'];?>
" <?php if ($_smarty_tpl->getVariable('rencana')->value['FS_KD_DAFTAR_DIAGNOSA']==$_smarty_tpl->tpl_vars['ata']->value['FS_KD_DAFTAR_DIAGNOSA']){?> selected <?php }?> ><?php echo $_smarty_tpl->tpl_vars['ata']->value['FS_NM_DIAGNOSA'];?>
</option>
                            <?php }} ?>
                        </select>
                    </td>

                </tr>
                <tr>
                    <td>Tujuan  </td>
                    <td colspan="2">
                        <select name="FS_KD_NOC" id="noc"  class="select2" style="width: 300px;">
                            <?php  $_smarty_tpl->tpl_vars['ata'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tujuan')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ata']->key => $_smarty_tpl->tpl_vars['ata']->value){
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['ata']->value['FS_KD_NOC'];?>
" <?php if ($_smarty_tpl->getVariable('rencana')->value['FS_KD_NOC']==$_smarty_tpl->tpl_vars['ata']->value['FS_KD_NOC']){?> selected <?php }?> ><?php echo $_smarty_tpl->tpl_vars['ata']->value['FS_NM_NOC'];?>
</option>
                            <?php }} ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Akan Dicapai</td>
                    <td colspan="2">
                        <input name="FD_TGL_DICAPAI" type="text" size="10" maxlength="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rencana')->value['FD_TGL_DICAPAI'])===null||$tmp==='' ? '' : $tmp);?>
" class="tanggal" style="text-align: center;" />
                    </td>
                </tr>
                <tr>
                    <td>Waktu Akan Dicapai</td>
                    <td colspan="2">
                        <input name="FD_JAM_DICAPAI" type="text" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rencana')->value['FD_JAM_DICAPAI'])===null||$tmp==='' ? '' : $tmp);?>
" size="10" class="waktu" maxlength="10" style="text-align: center"/>
                    </td>
                </tr>
                <tr>
                    <td>Kriteria</td>
                    <td colspan="2">
                        <select name="FS_KD_INDIKATOR"  id="indikator"  class="select2" style="width: 300px;">
                            <?php  $_smarty_tpl->tpl_vars['ata'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('indikator')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ata']->key => $_smarty_tpl->tpl_vars['ata']->value){
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['ata']->value['FS_KD_INDIKATOR'];?>
" <?php if ($_smarty_tpl->getVariable('rencana')->value['FS_KD_INDIKATOR']==$_smarty_tpl->tpl_vars['ata']->value['FS_KD_INDIKATOR']){?> selected <?php }?> ><?php echo $_smarty_tpl->tpl_vars['ata']->value['FS_NM_INDIKATOR'];?>
</option>
                            <?php }} ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Perencanaan</td>
                    <td colspan="2">
                        <select name="FS_KD_NIC" id="nic"  class="select2" style="width: 300px;">
                            <?php  $_smarty_tpl->tpl_vars['ata'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('nic')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ata']->key => $_smarty_tpl->tpl_vars['ata']->value){
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['ata']->value['FS_KD_NIC'];?>
" <?php if ($_smarty_tpl->getVariable('rencana')->value['FS_KD_NIC']==$_smarty_tpl->tpl_vars['ata']->value['FS_KD_NIC']){?> selected <?php }?> ><?php echo $_smarty_tpl->tpl_vars['ata']->value['FS_NM_NIC'];?>
</option>
                            <?php }} ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Rincian Perencanaan <?php echo $_smarty_tpl->getVariable('nic2')->value;?>
</td>
                    <td colspan="2">

                        <select name="FS_KD_NIC2[]" id="nic2"  multiple class="select2" style="width: 300px;">
                            <?php  $_smarty_tpl->tpl_vars['ata'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('nic2')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ata']->key => $_smarty_tpl->tpl_vars['ata']->value){
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['ata']->value['FS_KD_NIC2'];?>
"    ><?php echo $_smarty_tpl->tpl_vars['ata']->value['FS_NM_NIC2'];?>
</option>
                            <?php }} ?>
                        </select>
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
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'])).('/')).('7'));?>
" target="_blank"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/printer-icon.png" alt="" /> Print</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div> 