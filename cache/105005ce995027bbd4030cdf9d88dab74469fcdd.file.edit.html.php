<?php /* Smarty version Smarty-3.0.7, created on 2021-09-21 17:47:37
         compiled from "application/views\inap/aplusan/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:31571606e87050d4199-50341528%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '105005ce995027bbd4030cdf9d88dab74469fcdd' => 
    array (
      0 => 'application/views\\inap/aplusan/edit.html',
      1 => 1616214946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31571606e87050d4199-50341528',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><!-- include javascript -->
<script>
    function hitungkarakter(field, sisa, maksimal) {
//                menambahkan atribute maxlength pada field sesuai jumlah maksimal
        field.maxLength = maksimal;
//                menghitung sisa karakter, maksimal dikurangi panjang karakter pada field
        sisa.value = maksimal - field.value.length;
    }
//            parameter hitung karakter :
//            - field adalah name dari input yang diisi
//            - sisa adalah name dari input sisa karakter
//            - maksimal adalah jumlah karakter maksimal yg bisa diinput, sesuaikan dengan
//              atribute value pada input dengan name sisa
</script>
<?php $_template = new Smarty_Internal_Template("inap/aplusan/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of include javascript-->
<div class="breadcrum">
    <p>
        <a href="#">Data Arsip</a>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('surat/apulsan');?>
"></a>
        <small>Edit Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/aplusan/edit_process');?>
" method="post">
        <input name="FS_KD_APULSAN" type="hidden" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_KD_APULSAN'])===null||$tmp==='' ? '' : $tmp);?>
" />
        <input name="FS_KD_APULSAN_ADMIN" type="hidden" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['fs_kd_apulsan'])===null||$tmp==='' ? '' : $tmp);?>
" />
        <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />
        <input name="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <table class="table-info" width="100%">
            <tr class="headrow">
                
                <th colspan="2">Edit Aplusan</th>
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
                <th colspan="2">Edit Apulsan</th>
            </tr>
            <tr>
                <td>Shift</td>
                <td>
                    <select name="FS_SHIFT" id="surat_dari" class="select2" style="width: 400px;">
                        <option value=""></option>
                        <option value="1" <?php if ($_smarty_tpl->getVariable('result')->value['FS_SHIFT']=='1'){?>selected="selected"<?php }?>>PAGI</option>
                        <option value="2" <?php if ($_smarty_tpl->getVariable('result')->value['FS_SHIFT']=='2'){?>selected="selected"<?php }?>>SORE</option>
                        <option value="3" <?php if ($_smarty_tpl->getVariable('result')->value['FS_SHIFT']=='3'){?>selected="selected"<?php }?>>MALAM</option>
                    </select>
                    <em>* wajib diisi</em>
                </td>
            </tr>
            <tr>
                <td>Kondisi Pasien</td>
                <td>
                    <textarea cols="50" name="FS_KONDISI_PASIEN"><?php echo $_smarty_tpl->getVariable('result')->value['FS_KONDISI_PASIEN'];?>
</textarea>
                </td>
            </tr>

            <tr>
                <td>Catatan Lainnya</td>
                <td>
                    <textarea cols="50" name="FS_CATATAN"><?php echo $_smarty_tpl->getVariable('result')->value['FS_CATATAN'];?>
</textarea>
                </td>
            </tr>

            <tr class="submit-box">
                <td colspan="2">
                    <input type="submit" name="save" value="Edit" class="edit-button" />
                </td>
            </tr>
        </table>
    </form>
</div>