<?php /* Smarty version Smarty-3.0.7, created on 2022-10-12 00:42:10
         compiled from "application/views\inap/kep/edit_tindakan.html" */ ?>
<?php /*%%SmartyHeaderCode:58016345aaf27c3106-94038735%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e34363b96df314ef6b2f8d2c66593d540c2ace52' => 
    array (
      0 => 'application/views\\inap/kep/edit_tindakan.html',
      1 => 1665472607,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58016345aaf27c3106-94038735',
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
        <small>button-edit Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/kep/edit_tindakan_process');?>
" method="post">
        <input name="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <input name="FS_KD_TRS" type="hidden" value="<?php echo $_smarty_tpl->getVariable('data')->value['FS_KD_TRS'];?>
" />
        <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />

        <table class="table-info" width="70%">
            <tr class="headrow">
                <th colspan="2">Edit Tindakan Keperawatan</th>
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
      
        <div class="content-entry">
            <table class="table-input" width="100%">

                <tr class="headrow">
                    <th colspan="4">Edit Tindakan Keperawatan</th>
                </tr>
                <tr>
                    <td width='20%'>Tindakan</td>
                    <td width='80%' colspan="2">
                       <select name="FS_KD_TRS_KEP_TINDAKAN" class="select2" style="width: 300px;">
                        <option value="0">--Pilih Data--</option>.
                        <?php  $_smarty_tpl->tpl_vars['ata'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_kep_tind')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ata']->key => $_smarty_tpl->tpl_vars['ata']->value){
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['ata']->value['FS_KD_TRS'];?>
" <?php if ($_smarty_tpl->tpl_vars['ata']->value['FS_KD_TRS']==$_smarty_tpl->getVariable('data')->value['FS_KD_TRS_KEP_TINDAKAN']){?> selected <?php }?> ><?php echo $_smarty_tpl->tpl_vars['ata']->value['FS_NM_KEP_TINDAKAN'];?>
</option>
                        <?php }} ?>
                    </select>
                    <textarea cols="80" name="FS_TINDKAN_KEP"><?php echo $_smarty_tpl->getVariable('data')->value['FS_TINDKAN_KEP'];?>
</textarea>
                </td>

            </tr>

            <tr>
                <td>Tanggal Tindakan</td>
                <td colspan="2">
                    <input name="FD_TGL_TINDKAN_KEP" type="text" size="10" maxlength="10" value="<?php echo $_smarty_tpl->getVariable('data')->value['FD_TGL_TINDKAN_KEP'];?>
" class="tanggal" style="text-align: center;" />
                </td>
            </tr>
            <tr>
                <td>Jam Tindakan</td>
                <td colspan="2">
                    <input name="FD_JAM_TINDKAN_KEP" type="text" value="<?php echo $_smarty_tpl->getVariable('data')->value['FD_JAM_TINDKAN_KEP'];?>
" size="10" class="waktu" maxlength="10" style="text-align: center"/>
                </td>
            </tr>
            <tr class="submit-box">
                <td colspan="4">
                   <div style="font-weight: bold;">
                    *Bismillahirohmanirrohim, saya dengan sadar dan penuh tanggung jawab mengisikan formulir ini dengan data yang benar
                </div>
                <br>
                <input type="submit" name="save" value="update" class="edit-button"/>
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
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'])).('/')).('8'));?>
" target="_blank"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/printer-icon.png" alt="" /> Print</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
 