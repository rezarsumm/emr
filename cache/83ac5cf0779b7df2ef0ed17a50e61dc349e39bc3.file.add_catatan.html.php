<?php /* Smarty version Smarty-3.0.7, created on 2022-10-11 14:00:57
         compiled from "application/views\inap/rm17/add_catatan.html" */ ?>
<?php /*%%SmartyHeaderCode:32319634514a9e93c09-53645610%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83ac5cf0779b7df2ef0ed17a50e61dc349e39bc3' => 
    array (
      0 => 'application/views\\inap/rm17/add_catatan.html',
      1 => 1665471656,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32319634514a9e93c09-53645610',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("inap/rm17/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<div class="breadcrum">
    <p>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/form_rm/lists');?>
">Form RM</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/rm17/cari');?>
">RM 17 CATATAN PEMBERIAN OBAT</a><span></span>
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div>

<div class="head-content">
    <div class="head-content-nav">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/rm17/add/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
" >Data Umum</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/rm17/add_catatan/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
" class="active">Data Check List Obat</a></li>
        </ul>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <table class="table-info" width="100%">
        <tr class="headrow"> 
            <th colspan="2">Add Catatan Pemberian Obat</th>
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
 <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/rm17/add_catatan_process');?>
" method="post">
        <input name="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <input name="FS_KD_RM17" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_rm17')->value['FS_KD_RM17'];?>
" />
        <table class="table-input" width="100%">
            <tr>
                <th colspan="2">Tambah Data Catatan Pemberian Obat</th>
            </tr>
            <tr>
                <td width="25%">Obat</td>
                <td width="75%">
                    <input type="text" name="FS_CHK_OBAT" size="40"  value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_NAMA_OBAT'])===null||$tmp==='' ? '' : $tmp);?>
">
                </td>
            </tr>
            <tr>
                <td>Dosis</td>
                <td>
                    <input type="text" name="FS_CHK_DOSIS" size="40" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_DOSIS_OBAT'])===null||$tmp==='' ? '' : $tmp);?>
">
                </td>
            </tr>
            <tr>
                <td>Pasien</td>
                <td>
                    <input type="text" name="FS_CHK_PASIEN" size="40" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['NAMA_PASIEN'])===null||$tmp==='' ? '' : $tmp);?>
">
                </td>
            </tr>
            <tr>
                <td>Rute</td>
                <td>
                    <select name="FS_CHK_RUTE" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <option value="1" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==1){?> selected="selected" <?php }?>>ORAL</option>
                        <option value="2" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==2){?> selected="selected" <?php }?>>TOPIKAL</option>
                        <option value="3" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==3){?> selected="selected" <?php }?>>TETES MATA</option>
                        <option value="4" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==4){?> selected="selected" <?php }?>>IV</option>
                        <option value="5" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==5){?> selected="selected" <?php }?>>IM</option>
                        <option value="6" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==6){?> selected="selected" <?php }?>>SC</option>
                        <option value="7" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==7){?> selected="selected" <?php }?>>IC</option>
                        <option value="8" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==8){?> selected="selected" <?php }?>>TETES TELINGA</option>
                        <option value="9" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==9){?> selected="selected" <?php }?>>IV DRIP</option>
                        <option value="10" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==10){?> selected="selected" <?php }?>>INHALASI</option>
                        <option value="11" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==11){?> selected="selected" <?php }?>>TETES HIDUNG</option>
                        <option value="12" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==12){?> selected="selected" <?php }?>>PEREKTAL</option>
                        <option value="13" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==13){?> selected="selected" <?php }?>>PERVAGINAL</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td>
                    <input type="text" name="FD_WAKTU" size="10">
                </td>
            </tr>
            <tr>
                <td>Perawat 1</td>
                <td>
                    <select name="FS_KD_PEG" id="surat_dari" class="select2" style="width: 300px;">
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
                <td>Perawat 2</td>
                <td>
                    <select name="FS_KD_PEG2" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_perawat')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data2']->key => $_smarty_tpl->tpl_vars['data2']->value){
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data2']->value['NAMAUSER'];?>
"><?php echo $_smarty_tpl->tpl_vars['data2']->value['NAMALENGKAP'];?>
</option>
                        <?php }} ?>

                    </select>
                </td>
            </tr>
            <tr>
                <td>Farmasi</td>
                <td>
                    <select name="FS_KD_PEG3" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_perawat')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data2']->key => $_smarty_tpl->tpl_vars['data2']->value){
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data2']->value['NAMAUSER'];?>
"><?php echo $_smarty_tpl->tpl_vars['data2']->value['NAMALENGKAP'];?>
</option>
                        <?php }} ?>

                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <em>* PASTIKAN OBAT DIBERIKAN DENGAN BENAR</em>
                </td>
            </tr>
            <tr class="submit-box">
                <td colspan="2">
                     <div style="font-weight: bold;">
                    *Bismillahirohmanirrohim, saya dengan sadar dan penuh tanggung jawab mengisikan formulir ini dengan data yang benar
                </div>
                <br>
                    <input type="submit" name="save" value="Simpan" class="edit-button" >
                </td>
            </tr>
        </table>
    </form>
    <table class="table-view" width="100%">
        <tr>
            <th colspan="10">Catatan Pemberian Obat</th>
        </tr>
        <tr>
            <th><center><b>Tanggal Entry</b></center></th>
            <th><center><b>Obat</b></center></th>
        <th><center><b>Dosis</b></center></th>
        <th><center><b>Pasien</b></center></th>
        <th><center><b>Rute</b></center></th>
        <th><center><b>Waktu</b></center></th>
        <th><center><b>Perawat 1</b></center></th>
        <th><center><b>Perawat 2</b></center></th>
        <th><center><b>Farmasi</b></center></th>
        <th><center><b>Aksi</b></center></th>
        </tr>

        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_catatan_obat')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
        <tr>
            <td><center>
            <?php echo $_smarty_tpl->tpl_vars['data']->value['mdd'];?>

        </center></td>
            <td><center>
            <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_CHK_OBAT']==1){?>
            v
            <?php }else{ ?>
            <?php echo $_smarty_tpl->tpl_vars['data']->value['FS_CHK_OBAT'];?>

            <?php }?>
        </center></td>
        <td><center>
            <?php echo $_smarty_tpl->tpl_vars['data']->value['FS_CHK_DOSIS'];?>

        </center></td>
        <td><center>
            <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_CHK_PASIEN']==1){?>
            v
            <?php }else{ ?>
            <?php echo $_smarty_tpl->tpl_vars['data']->value['FS_CHK_PASIEN'];?>

            <?php }?>
        </center></td>
        <td>
            <center>
            
            <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_CHK_RUTE']==1){?>
                ORAL
                <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_CHK_RUTE']==2){?>
                TROPIK
                <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_CHK_RUTE']==3){?>
                TETES MATA
                <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_CHK_RUTE']==4){?>
                IV
                <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_CHK_RUTE']==5){?>
                IM
                <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_CHK_RUTE']==6){?>
                SC
                <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_CHK_RUTE']==7){?>
                IC
                <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_CHK_RUTE']==8){?>
                TETES TELINGA
                <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_CHK_RUTE']==9){?>
                IV DRIP
                <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_CHK_RUTE']==10){?>
                INHALASI
                <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_CHK_RUTE']==11){?>
                TETES HIDUNG
                <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_CHK_RUTE']==12){?>
                PEREKTAL
                <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_CHK_RUTE']==13){?>
                PERVAGINAL
                <?php }?>
        </center></td>
        <td><center><?php echo $_smarty_tpl->tpl_vars['data']->value['FD_WAKTU'];?>
</center></td>
        <td><center><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_KD_PEG'];?>
</center></td>
        <td><center><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_KD_PEG2'];?>
</center></td>
        <td><center><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_KD_PEG3'];?>
</center></td>
        <td><center>
            <?php if ($_smarty_tpl->tpl_vars['data']->value['mdd']>=$_smarty_tpl->getVariable('tgl_kemarin')->value){?>
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((((('inap/rm17/delete_process_catatan/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_RM17_DETAIL'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_RM17']));?>
" class="button-hapus" title="Hapus Catatan"  onclick="return confirm('Apakah Anda Yakin Akan Menghapus?');">Hapus</a>
            <?php }?>
            </center></td>
        </tr>
        <?php }} ?>
    </table>
    <table class="table-input" width="100%">
        <tr>
            <td colspan="8">
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/rm17/add/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
" class="btn-red" style="float:left;"/>Kembali</a>
            </td>
        </tr>
    </table>
</form>
</div>

<!-------------------------------->
<!--open dialog form----->
<!-------------------------------->
<div id="dialog-form" title="Add Data Check List Obat">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/rm17/add_catatan_process');?>
" method="post">
        <input name="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_reg'];?>
" />
        <input name="FS_KD_RM17" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_rm17')->value['FS_KD_RM17'];?>
" />
        <table class="table-input" width="100%">
            <tr>
                <th colspan="2">Tambah Data</th>
            </tr>
            <tr>
                <td width="25%">Obat</td>
                <td width="75%">
                    <input type="text" name="FS_CHK_OBAT" size="40"  value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_NAMA_OBAT'])===null||$tmp==='' ? '' : $tmp);?>
">
                </td>
            </tr>
            <tr>
                <td>Dosis</td>
                <td>
                    <input type="text" name="FS_CHK_DOSIS" size="40" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_DOSIS_OBAT'])===null||$tmp==='' ? '' : $tmp);?>
">
                </td>
            </tr>
            <tr>
                <td>Pasien</td>
                <td>
                    <input type="text" name="FS_CHK_PASIEN" size="40" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['fs_nm_pasien'])===null||$tmp==='' ? '' : $tmp);?>
">
                </td>
            </tr>
            <tr>
                <td>Rute</td>
                <td>
                    <select name="FS_CHK_RUTE" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <option value="1" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==1){?> selected="selected" <?php }?>>ORAL</option>
                        <option value="2" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==2){?> selected="selected" <?php }?>>TOPIKAL</option>
                        <option value="3" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==3){?> selected="selected" <?php }?>>TETES MATA</option>
                        <option value="4" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==4){?> selected="selected" <?php }?>>IV</option>
                        <option value="5" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==5){?> selected="selected" <?php }?>>IM</option>
                        <option value="6" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==6){?> selected="selected" <?php }?>>SC</option>
                        <option value="7" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==7){?> selected="selected" <?php }?>>IC</option>
                        <option value="8" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==8){?> selected="selected" <?php }?>>TETES TELINGA</option>
                        <option value="9" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==9){?> selected="selected" <?php }?>>IV DRIP</option>
                        <option value="10" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==10){?> selected="selected" <?php }?>>INHALASI</option>
                        <option value="11" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==11){?> selected="selected" <?php }?>>TETES HIDUNG</option>
                        <option value="12" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==12){?> selected="selected" <?php }?>>PEREKTAL</option>
                        <option value="13" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==13){?> selected="selected" <?php }?>>PERVAGINAL</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td>
                    <input type="text" name="FD_WAKTU" size="10">
                </td>
            </tr>
            <tr>
                <td>Perawat 1</td>
                <td>
                    <select name="FS_KD_PEG" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_perawat')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['FS_KD_PEG'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_NM_PEG'];?>
</option>
                        <?php }} ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Perawat 2</td>
                <td>
                    <select name="FS_KD_PEG2" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_perawat')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data2']->key => $_smarty_tpl->tpl_vars['data2']->value){
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data2']->value['FS_KD_PEG'];?>
"><?php echo $_smarty_tpl->tpl_vars['data2']->value['FS_NM_PEG'];?>
</option>
                        <?php }} ?>

                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <em>* PASTIKAN OBAT DIBERIKAN DENGAN BENAR</em>
                </td>
            </tr>
            <tr class="submit-box">
                <td colspan="2">
                     <div style="font-weight: bold;">
                    *Bismillahirohmanirrohim, saya dengan sadar dan penuh tanggung jawab mengisikan formulir ini dengan data yang benar
                </div>
                <br>
                    <input type="submit" name="save" value="Simpan" class="edit-button" >
                </td>
            </tr>
        </table>
    </form>
</div>