<?php /* Smarty version Smarty-3.0.7, created on 2022-04-08 11:02:11
         compiled from "application/views\inap/resume/add_terapi.html" */ ?>
<?php /*%%SmartyHeaderCode:13218624fb3c397b256-43127957%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a80c037cf73723943a2faede0553842a4f8d86f' => 
    array (
      0 => 'application/views\\inap/resume/add_terapi.html',
      1 => 1649390529,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13218624fb3c397b256-43127957',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("inap/resume/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<div class="breadcrum">
    <p>
        <a href="#">Data Arsip</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/resume/cari');?>
">Resume Pasien Pulang</a><span></span>
        <small>Edit Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="head-content">
    <div class="head-content-nav">
        <ul>
            <li><a href="#">Data Resume</a></li>
            <li><a href="#">Data Diagnosis</a></li>
            <li><a href="#" class="active">Data Terapi Pasien</a></li>
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
        
        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="2">Add Asesmen Awal Keperawatan</th>
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
        <table class="table-input" width="100%">
            <tr>
                <th colspan="6">Add Terapi</th>
            </tr>
            <tr class="submit-box">
                <td colspan="6">
                    <a href="#" id="opendialogpengirim"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
/resource/doc/images/icon/add-icon.png" style="height:20px;" alt="Tambah Diagnosis" /></a>
                </td>
            </tr>
            <tr>
                <td><center><b>Nama Obat</b></center></td>
            <td><center><b>Jumlah</b></center></td>
            <td><center><b>Dosis</b></center></td>
<!--             <td><center><b>Frekwensi</b></center></td> -->
            <td><center><b>Cara Pemberian</b></center></td>
            <td><center><b>Aksi</b></center></td>
            </tr>
            <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('terapi')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
            <tr>
                <td><center><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_NM_OBAT'];?>
</center></td>
            <td><center><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_JML_OBAT'];?>
</center></td>
            <td><center><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_DOSIS_OBAT'];?>
</center></td>
<!--             <td><center><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_FREK_OBAT'];?>
</center></td> -->
            <td><center><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_CARA_PEM_OBAT'];?>
</center></td>
            <td><center>
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('inap/resume/edit_terapi/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_TERAPI'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG']));?>
" class="btn-blue" title="Edit Resume">Edit</a>
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('inap/resume/delete_process_terapi/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_TERAPI'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG']));?>
" class="btn-red" title="Hapus Resume"  onclick="return confirm('Apakah Anda Yakin Akan Menghapus?');">Hapus</a>
            </center></td>
            </tr>
            <?php }} ?>
            <tr>
                <td colspan="6">
                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/resume/add_diagnosis/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
" class="btn-red" style="float:left;"/>Kembali</a>
                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/resume/selesai_process/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
" class="btn-green" onclick="return confirm('Apakah Anda Yakin Sudah Selesai?');" style="float:right;"/>SELESAI</a>
                </td>
            </tr>
        </table>
</div>

<!-------------------------------->
<!--open dialog form----->
<!-------------------------------->
<div id="dialog-form" title="Add Terapi">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/resume/add_terapi_process');?>
" method="post">
        <input name="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <table class="table-input" width="100%">
            <tr>
                <th colspan="2">Tambah Data</th>
            </tr>
            <tr>
                <td width="25%">Nama Obat</td>
                <td width="75%">
                    <input type="text" name="FS_NM_OBAT">
                </td>
            </tr>
            <tr>
                <td>Jumlah Obat</td>
                <td>
                    <input type="text" name="FS_JML_OBAT">
                </td>
            </tr>
            <tr>
                <td>Dosis Obat</td>
                <td>
                    <input type="text" name="FS_DOSIS_OBAT">
                </td>
            </tr>
         <!--    <tr>
                <td>Frekwensi Obat</td>
                <td>
                    <input type="text" name="FS_FREK_OBAT">
                </td>
            </tr> -->
                    <input type="hidden" name="FS_FREK_OBAT">

            <tr>
                <td>Cara Pemberian Obat</td>
                <td>
                    <input type="text" name="FS_CARA_PEM_OBAT">
                </td>
            </tr>
            <tr class="submit-box">
                <td colspan="2">
                    <input type="submit" name="save" value="Simpan" class="edit-button" >
                </td>
            </tr>
        </table>
    </form>
</div>