<?php /* Smarty version Smarty-3.0.7, created on 2021-03-16 10:12:32
         compiled from "application/views\medis/rawat_inap/add.html" */ ?>
<?php /*%%SmartyHeaderCode:202960502220cfef07-37561978%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef5c788404ca6dd60fda87eca8f3d60a5840ccdc' => 
    array (
      0 => 'application/views\\medis/rawat_inap/add.html',
      1 => 1611545955,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '202960502220cfef07-37561978',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\xampp\htdocs\emr_lampung\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><script>
    tinymce.init({
        selector: "textarea",
        theme: "modern",
        plugins: [
        ],
        external_plugins: {
//"moxiemanager": "/moxiemanager-php/plugin.js"
        },
        content_css: "css/development.css",
        add_unload_trigger: false,
        toolbar: "bold italic | alignleft aligncenter alignright alignjustify",
        image_advtab: true,
        setup: function (ed) {
            /*ed.on(
             'Init PreInit PostRender PreProcess PostProcess BeforeExecCommand ExecCommand Activate Deactivate ' +
             'NodeChange SetAttrib Load Save BeforeSetContent SetContent BeforeGetContent GetContent Remove Show Hide' +
             'Change Undo Redo AddUndo BeforeAddUndo', function(e) {
             console.log(e.type, e);
             });*/
        },
        spellchecker_callback: function (method, data, success) {
            if (method == "spellcheck") {
                var words = data.match(this.getWordCharPattern());
                var suggestions = {};
                for (var i = 0; i < words.length; i++) {
                    suggestions[words[i]] = ["First", "second"];
                }

                success();
            }

            if (method == "addToDictionary") {
                success();
            }
        }
    });</script>
<div class="breadcrum">
    <p>
        <a href="#">Data Arsip</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_inap/cari');?>
">Asesmen Awal Rawat Inap</a><span></span>
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="navigation">
    <div class="navigation-button">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_inap/');?>
"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/back-icon.png" alt="" />  Back</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_inap/add_process');?>
" method="post">
        <input type="hidden" name="FS_KD_REG" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_reg'];?>
" />
        <input type="hidden" name="FS_KD_MEDIS" value="<?php echo $_smarty_tpl->getVariable('FS_KD_MEDIS')->value;?>
" />
        <input type="hidden" name="FS_KD_LAYANAN" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_layanan'];?>
" />
        <input type="hidden" name="FS_MR" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_mr'];?>
" />

        <table class="table-info" width="100%">
            <tr class="headrow">
                <th colspan="2">Add Asesmen Awal Rawat Inap</th>
            </tr>
            <tr>
                <td>NIK</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_identitas'];?>

                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_nm_pasien'];?>

                </td>
            </tr>
            <tr>
                <td>No RM</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_mr'];?>

                </td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>
                    <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('rs_pasien')->value['FD_TGL_LAHIR'],"%d %b %Y");?>
 (<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_umur'];?>
)
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['FS_ALM_PASIEN'];?>
</td>
            </tr>
            <tr>
                <td>Status Sosial / Pekerjaan / Pendidikan</td>
            <td>
                <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['FS_NM_PEKERJAAN_DK'];?>
 / <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['FS_NM_PENDIDIKAN_DK'];?>

            </td>
            </tr>
            <tr>
                <td>Agama</td>
            <td>
                <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['FS_NM_AGAMA'];?>

            </td>
            </tr>
        </table>

        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="2">Anamnesa / Allo Anamnesa</th>
                <th colspan="2">Pemeriksaan Fisik</th>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea cols="50" name="FS_ANAMNESA"><?php echo $_smarty_tpl->getVariable('medis')->value['FS_ANAMNESA'];?>
</textarea>
                </td>
                <td colspan="2">
                    <textarea cols="50" name="FS_CATATAN_FISIK"><?php echo $_smarty_tpl->getVariable('medis')->value['FS_CATATAN_FISIK'];?>
</textarea>

                </td>
            </tr>
            <tr class="headrow">
                <th colspan="2">Hasil Pemeriksaan Penunjang</th>
                <th colspan="2">Diagnosa</th>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea cols="50" name="FS_HASIL_PEMERIKSAAN_PENUNJANG"></textarea>
                </td>
                <td colspan="2">
                    <textarea cols="50" name="FS_DIAGNOSA"><?php echo $_smarty_tpl->getVariable('medis')->value['FS_DIAGNOSA'];?>
</textarea>

                </td>
            </tr>
            <tr class="headrow">
                <th colspan="2">Daftar Masalah</th>
                <th colspan="2">Rencana Tindakan</th>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea cols="50" name="FS_DAFTAR_MASALAH">
                       <?php echo $_smarty_tpl->getVariable('medis')->value['FS_DAFTAR_MASALAH'];?>

                    </textarea>
                </td>
                <td colspan="2">
                    <textarea cols="50" name="FS_TINDAKAN"></textarea>

                </td>
            </tr>
            <tr class="headrow">
                <th colspan="2">Rencana Pemeriksaan Penunjang Lab</th>
                <th colspan="2">Rencana Pemeriksaan Penunjang Radiologi</th>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea cols="50" name="FS_PLANNING_LAB"></textarea>
                </td>
                <td colspan="2">
                    <textarea cols="50" name="FS_PLANNING_RAD"></textarea>

                </td>
            </tr>

            <tr class="headrow">
                <th colspan="2">Terapi</th>
                <th colspan="2"></th>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea cols="50" name="FS_TERAPI"></textarea>
                </td>
                <td colspan="2"></td>
            </tr>

            <tr class="submit-box">
                <td colspan="4">
                    <input type="submit" name="save" value="Simpan" class="edit-button"/>
                </td>
            </tr>
        </table>
    </form>
</div>