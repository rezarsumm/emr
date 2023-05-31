<?php /* Smarty version Smarty-3.0.7, created on 2022-04-19 11:16:29
         compiled from "application/views\inap/resume/add_ket_kematian.html" */ ?>
<?php /*%%SmartyHeaderCode:720625e379d8d5643-78517980%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af7f111f944e0186c8228d9e6100ff5234f4f5f2' => 
    array (
      0 => 'application/views\\inap/resume/add_ket_kematian.html',
      1 => 1650341787,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '720625e379d8d5643-78517980',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><!-- include javascript -->
<?php $_template = new Smarty_Internal_Template("inap/resume/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of include javascript-->
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
            <li><a href="#">Data Terapi Pasien</a></li>
            <li><a href="#" class="active">Keterangan Meninggal</a></li>
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
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/resume/add_ket_kematian_process');?>
" method="post">
        <input name="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['FS_MR'];?>
" />

        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="2">Add Resume Pasien Pulang</th>
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
                <th colspan="2">Data Kematian</th>
            </tr>
            <tr>
                <td>Sebab Kematian</td>
                <td>
                    <textarea name="FS_SEBAB_KEMATIAN" rows="3" cols="100"></textarea>
                    <br>
                    <em style="font-weight: bold;color: red;">*Wajib diisi, Harap konfirmasi ke dpjp terkait sebab kematian</em>
                </td>
            <tr class="submit-box">
                <td colspan="2">
                    <input type="submit" name="save" value="Lanjutkan & Simpan" class="edit-button" style="float:right;"/>
                </td>
            </tr>
        </table>
    </form>
</div>