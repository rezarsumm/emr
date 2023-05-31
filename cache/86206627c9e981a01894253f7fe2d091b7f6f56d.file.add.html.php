<?php /* Smarty version Smarty-3.0.7, created on 2021-09-20 15:46:53
         compiled from "application/views\inap/aplusan/add.html" */ ?>
<?php /*%%SmartyHeaderCode:15376606e6bbc2d6af6-29134240%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '86206627c9e981a01894253f7fe2d091b7f6f56d' => 
    array (
      0 => 'application/views\\inap/aplusan/add.html',
      1 => 1616214946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15376606e6bbc2d6af6-29134240',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("inap/aplusan/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of include javascript-->
<div class="breadcrum">
    <p>
        <a href="#">Data Arsip</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('surat/aplusan');?>
">Aplusan</a><span></span>
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/aplusan/add_process');?>
" method="post">
        <input type="hidden" name="FS_KD_REG" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <input type="hidden" name="FS_KD_LAYANAN" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['KODE_BANGSAL'];?>
" />
        <input type="hidden" name="FS_MR" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />
        <input type="hidden" name="FS_KD_TRS" value="<?php echo $_smarty_tpl->getVariable('cppt')->value['FS_KD_TRS'];?>
" />
         <table class="table-info" width="100%">
            <tr class="headrow">
                <th colspan="2">Add Aplusan</th>
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
            <tr class="headrow">
                <th colspan="2">Add Apulsan</th>
            </tr>
            <tr>
                <td>Shift</td>
                <td>
                    <select name="FS_SHIFT" id="surat_dari" class="select2" style="width: 400px;">
                        <option value=""></option>
                        <option value="1">PAGI</option>
                        <option value="2">SORE</option>
                        <option value="3">MALAM</option>
                    </select>
                    <em>* wajib diisi</em>
                </td>
            </tr>
            <tr>
                <td>Kondisi Pasien</td>
                <td>
                    <textarea cols="50" name="FS_KONDISI_PASIEN"><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->getVariable('cppt')->value['FS_CPPT_S']);?>
,<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->getVariable('cppt')->value['FS_CPPT_O']);?>
,<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->getVariable('cppt')->value['FS_CPPT_A']);?>
,<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->getVariable('cppt')->value['FS_CPPT_P']);?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>Catatan Lainnya</td>
                <td>
                    <textarea cols="50" name="FS_CATATAN"></textarea>
                </td>
            </tr>
            <tr class="submit-box">
                <td colspan="2">
                    <input type="submit" name="save" value="Simpan" class="edit-button" />
                </td>
            </tr>
        </table>
    </form>
</div>