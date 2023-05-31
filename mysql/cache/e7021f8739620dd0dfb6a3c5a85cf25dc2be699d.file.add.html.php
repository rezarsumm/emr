<?php /* Smarty version Smarty-3.0.7, created on 2021-03-16 10:52:37
         compiled from "application/views\inap/rm10/add.html" */ ?>
<?php /*%%SmartyHeaderCode:2280060502b85a61342-04944381%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7021f8739620dd0dfb6a3c5a85cf25dc2be699d' => 
    array (
      0 => 'application/views\\inap/rm10/add.html',
      1 => 1608812803,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2280060502b85a61342-04944381',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\xampp\htdocs\emr_lampung\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><!-- include javascript -->
<?php $_template = new Smarty_Internal_Template("inap/rm10/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of include javascript-->
<div class="breadcrum">
    <p>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/rm10/');?>
">Catatan Edukasi</a><span></span>
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="head-content">
    <div class="head-content-nav">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/rm10/add/').($_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_reg']));?>
" class="active">Data Umum</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/rm10/add_catatan/').($_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_reg']));?>
">Data Catatan Edukasi</a></li>
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
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/rm10/add_process');?>
" method="post">
        <input name="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_reg'];?>
" />
        <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_mr'];?>
" />

        <table class="table-info" width="100%">
            <tr class="headrow">
                <th colspan="2">Add Catatan Edukasi</th>
            </tr>
            <tr>
                <td>NAMA</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_nm_pasien'];?>

                </td>
            </tr>
            <tr>
                <td>NO MR</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_mr'];?>

                </td>
            </tr>
            <tr>
                <td>TANGGAL LAHIR</td>
                <td>
                    <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('rs_pasien')->value['FD_TGL_LAHIR'],"%d %b %Y");?>

                </td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['FS_ALM_PASIEN'];?>
</td>
            </tr>
            <tr>
                <td>TANGGAL MASUK</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('rs_pasien')->value['fd_tgl_masuk'],"%d %b %Y");?>
</td>
            </tr>
        </table>
        <table class="table-input" width="100%">
            <tr>
                <th colspan="2">Asesmen Edukasi</th>
            </tr>
            <tr>
                <td width='20%'>
                    Keyakinan serta nilai-nilai pasien dan keluarga (Khusus)
                </td>
                <td width='80%'>
                    <select name="FS_NILAI">
                        <option value="1" onclick='document.getElementById("civstaton1").disabled = true'>Tidak Ada</option>
                        <option VALUE="2" onclick='document.getElementById("civstaton1").disabled = false'>Ada</option>
                    </select>
                    <input type="text" name="FS_NILAI2" id="civstaton1" disabled="" size="32">
                </td>
            </tr>

            <tr>
                <td>
                    Kemampuan Membaca
                </td>
                <td>
                    <select name="FS_MEMBACA" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <option value="1">BAIK</option>
                        <option value="2">TIDAK BISA MEMBACA</option>
                    </select>

                </td>
            </tr>
            <tr>
                <td>
                    Kemampuan Berbahasa 1
                </td>
                <td>
                    <select name="FS_TIPE_BAHASA1" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <option value="1" <?php if ($_smarty_tpl->getVariable('rs_rm10')->value['FS_TIPE_BAHASA1']=='1'){?>selected="selected"<?php }?>>BAHASA INDONESIA</option>
                        <option value="2" <?php if ($_smarty_tpl->getVariable('rs_rm10')->value['FS_TIPE_BAHASA1']=='2'){?>selected="selected"<?php }?>>BAHASA JAWA</option>
                        <option value="3" <?php if ($_smarty_tpl->getVariable('rs_rm10')->value['FS_TIPE_BAHASA1']=='3'){?>selected="selected"<?php }?>>BAHASA INGGRIS</option>
                        <option value="4" <?php if ($_smarty_tpl->getVariable('rs_rm10')->value['FS_TIPE_BAHASA1']=='4'){?>selected="selected"<?php }?>>BAHASA ARAB</option>
                    </select>

                    <select name="FS_BAHASA1" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <option value="1">BAIK</option>
                        <option value="2">CUKUP BAIK</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Kemampuan Berbahasa 2
                </td>
                <td>
                    <select name="FS_TIPE_BAHASA2" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <option value="1" <?php if ($_smarty_tpl->getVariable('rs_rm10')->value['FS_TIPE_BAHASA2']=='1'){?>selected="selected"<?php }?>>BAHASA INDONESIA</option>
                        <option value="2" <?php if ($_smarty_tpl->getVariable('rs_rm10')->value['FS_TIPE_BAHASA2']=='2'){?>selected="selected"<?php }?>>BAHASA JAWA</option>
                        <option value="3" <?php if ($_smarty_tpl->getVariable('rs_rm10')->value['FS_TIPE_BAHASA2']=='3'){?>selected="selected"<?php }?>>BAHASA INGGRIS</option>
                        <option value="4" <?php if ($_smarty_tpl->getVariable('rs_rm10')->value['FS_TIPE_BAHASA2']=='4'){?>selected="selected"<?php }?>>BAHASA ARAB</option>
                    </select> 

                    <select name="FS_BAHASA2" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <option value="1">BAIK</option>
                        <option value="2">CUKUP BAIK</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Hambatan Emosional dan Motivasi
                </td>
                <td>
                    <select name="FS_HAMBATAN_EMOSI">
                        <option value="1" onclick='document.getElementById("civstaton2").disabled = true'>Tidak Ada</option>
                        <option VALUE="2" onclick='document.getElementById("civstaton2").disabled = false'>Ada</option>
                    </select>
                    <input type="text" name="FS_HAMBATAN_EMOSI2" id="civstaton2" disabled="" size="32">
                </td>
            </tr>
            <tr>
                <td>
                    Keterbatasan Fisik
                </td>
                <td>
                    <select name="FS_KETERBATASAN_FISIK">
                        <option value="1" onclick='document.getElementById("civstaton3").disabled = true'>Tidak Ada</option>
                        <option VALUE="2" onclick='document.getElementById("civstaton3").disabled = false'>Ada</option>
                    </select>
                    <input type="text" name="FS_KETERBATASAN_FISIK2" id="civstaton3" disabled="" size="32">
                </td>
            </tr>
            <tr>
                <td>
                    Keterbatasan Kognitif
                </td>
                <td>
                    <select name="FS_KETERBATASAN_KOGNITIF">
                        <option value="1" onclick='document.getElementById("civstaton4").disabled = true'>Tidak Ada</option>
                        <option VALUE="2" onclick='document.getElementById("civstaton4").disabled = false'>Ada</option>
                    </select>
                    <input type="text" name="FS_KETERBATASAN_KOGNITIF2" id="civstaton4" disabled="" size="32">
                </td>
            </tr>
            <tr>
                <td>
                    Kesediaan menerima informasi
                </td>
                <td>
                    <select name="FS_MENERIMA_INFO" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <option value="1">BERSEDIA</option>
                        <option value="2">TIDAK BERSEDIA</option>
                    </select>
                </td>
            </tr>
            <tr class="submit-box">
                <td colspan="2">
                     <div style="font-weight: bold;">
                    *Bismillahirohmanirrohim, saya dengan sadar dan penuh tanggung jawab mengisikan formulir ini dengan data yang benar
                </div>
                <br>
                    <input type="submit" name="save" value="Lanjutkan & Simpan" class="edit-button" style="float:right;"/>
                </td>
            </tr>
        </table>
    </form>
</div>