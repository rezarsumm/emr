<?php /* Smarty version Smarty-3.0.7, created on 2021-03-16 10:37:10
         compiled from "application/views\inap/cppt/add.html" */ ?>
<?php /*%%SmartyHeaderCode:21780605027e6d5ae22-76689863%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bee9aa24e452939fb2a2a1d574a4d580e6982e71' => 
    array (
      0 => 'application/views\\inap/cppt/add.html',
      1 => 1614129256,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21780605027e6d5ae22-76689863',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\xampp\htdocs\emr_lampung\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><!-- include javascript -->
<?php $_template = new Smarty_Internal_Template("inap/cppt/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of include javascript-->
<script>
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
            toolbar: "bold italic",
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
        <a href="#">Catatan Rawat Inap</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/cppt/');?>
">CPPT</a><span></span>
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/cppt/add_process');?>
" method="post">
        <input name="FS_KD_REG" id="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_reg'];?>
" />
        <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_mr'];?>
" />
        <input name="FS_KD_LAYANAN" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_layanan'];?>
" />
        <input name="FS_KD_PETUGAS_MEDIS" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_medis'];?>
" />

        <table class="table-info" width="100%">
            <tr class="headrow">
                <th colspan="2">Add CPPT</th>
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
            <tr>
                <td>Dokter</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_nm_medis2'];?>

                </td>
            </tr>
        </table>
        <table class="table-info" width="100%">
            <tr class="headrow">
                <th colspan="2">Asesmen Awal Medik</th>
            </tr>
            <tr>
                <td>Anamnesa</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_ANAMNESA'];?>

                </td>
            </tr>
            <tr>
                <td>Diagnosa</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_DIAGNOSA'];?>

                </td>
            </tr>
            <tr>
                <td>Hasil Pemeriksaan Penunjang</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_HASIL_PEMERIKSAAN_PENUNJANG'];?>

                </td>
            </tr>
            <tr>
                <td>Pemeriksaan Fisik</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_CATATAN_FISIK'];?>

                </td>
            </tr>
            <tr>
                <td>Daftar Masalah</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_DAFTAR_MASALAH'];?>

                </td>
            </tr>
            <tr>
                <td>Rencana Tindakan</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_TINDAKAN'];?>

                </td>
            </tr>
            <tr>
                <td>Rencana Pemeriksaan Penunjang</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_PLANNING'];?>

                </td>
            </tr>
            <tr>
                <td>Terapi</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_TERAPI'];?>

                </td>
            </tr>
            <tr>
                <td>Waktu Asesmen</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['mdd'];?>
 / <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_JAM_TRS'];?>

                </td>
            </tr>
        </table>
        <div class="notification red">
            <p><strong>High Risk :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_HIGH_RISK'])===null||$tmp==='' ? '-' : $tmp);?>
 </p>
            <p><strong>Alergi :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
 (<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_REAK_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
)</p>
            <div class="clear"></div>
        </div>
        <table class="table-input" width="100%">
            <tr>
                <th colspan="4">CPPT</th>
            </tr>
            <tr>
                <td width="15%">S / A</td>
                <td width="85%">
                    <textarea name="FS_CPPT_S" rows="3" cols="75"></textarea>
                </td>
            </tr>
            <tr>
                <td>O / D</td>
                <td>
                    <textarea name="FS_CPPT_O" rows="3" cols="75"></textarea>
                </td>
            </tr>
            <tr>
                <td>A / I</td>
                <td>
                    <textarea name="FS_CPPT_A" rows="3" cols="75"></textarea>
                </td> 
            </tr>
            <tr>
                <td>P / ME</td>
                <td>
                    <textarea name="FS_CPPT_P" rows="3" cols="75"></textarea>
                </td>
            </tr>
            <tr>
                <td>Diagnosa Utama</td>
                <td>
                    <input type="text" name="FS_DIAG_UTAMA" size="70" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_DIAG_UTAMA'];?>
">
                </tr>
                <tr>
                    <td>Diagnosa Sekunder</td>
                    <td>
                        <input type="text" name="FS_DIAG_SEK" size="70" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_DIAG_SEK'];?>
">
                </tr>
            <tr class="submit-box">
                <td colspan="5">
                    <a href="javascript:;" class="btn-blue item_add">Tambah Resep</a>
                </td> 
            </tr>
            <tr>
                <td colspan="5">
                    <table width='100%'>
                        <thead>
                            <tr class="headrow">
                                <th colspan="6"><center>Resep Dokter</center></th>
            </tr>
            <tr class="headrow">
                <th><center>Nama Obat</center></th>
            <th><center>Jumlah</center></th>
            <th><center>Satuan</center></th>
            <th><center>Waktu Pemberian</center></th>
            <th><center>Catatan Lain</center></th>
            <th><center>Aksi</center></th>

            </tr>
            </thead>
            <tbody id="show_data_resep_baru"></tbody>
        </table>

        </td>
        </tr>
        <!--<tr>
       <td>
           Order Periksa Laboratorium
       </td>
       <td>

          <select name="tujuan[]" multiple id="tujuan" style="width:250px">
               <option></option>
           </select>
           
       </td>
        <td>
           Order Periksa Radiologi
       </td>
       <td>
           <select name="tembusan[]" multiple id="tembusan" style="width:250px">
               <option></option>
           </select>
       </td>
   </tr>
       <tr>
           <td></td>
           <td>
              
           </td>
           <td>Resep</td>
           <td>
               <textarea name="FS_CPPT_TERAPI" rows="3" cols="75"></textarea>
           </td>
       </tr>-->

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
 <table class="table-input" width="100%">
     <tr>
                <th colspan="4">Shortcut Navigation</th>
            </tr>
<tr class="submit-box">
                <td colspan="5">
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('medis/rawat_inap/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_reg']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-green">Asesmen Awal Medis Rawat Inap</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/ass_awal/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_reg']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-red2">Asesmen Awal Keperawatan</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/ass_jatuh/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_reg']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-blue2">Asesmen Jatuh</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/kep/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_reg']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-green2">Rencana dan Tindakan Keperawatan</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/rm10/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_reg']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-orange">Catatan Edukasi</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/rm17/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_reg']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-pink">Catatan Pemberian Obat</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/dp/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_reg']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-brown">Discharge Planning</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('farmasi/rekon/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_reg']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-yellow">Rekonsiliasi Obat</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/resume/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_reg']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-red">Resume Pasien Pulang</a>
                    <!--<a href="javascript:;" class="btn-green item_status_add">Status Pasien</a>-->
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_reg'])).('/10'));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-red2">Hasil Penunjang</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('rm/rawat_jalan/resume/').($_smarty_tpl->getVariable('rs_pasien')->value['fs_mr']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-blue2">Resume Rawat Jalan</a>
                </td> 
            </tr>
 </table>
<table class="table-view" width="100%">
    <tr class="headrow">
        <th colspan="6">List CPPT</th>
    </tr>
    <tr>
        <th width="7%">Tanggal</th>
        <th>SOAP</th>
        <th width="15%">PPA</th>

        <th width="5%">Copy</th>
        <?php if ($_smarty_tpl->getVariable('role_id')->value=='12'||$_smarty_tpl->getVariable('role_id')->value=='6'||$_smarty_tpl->getVariable('role_id')->value=='22'||$_smarty_tpl->getVariable('role_id')->value=='24'){?>
        <th width="7%">Operan Jaga</th>
        <?php }else{ ?>
        <?php }?>

        <?php if ($_smarty_tpl->getVariable('role_id')->value=='5'||$_smarty_tpl->getVariable('role_id')->value=='6'||$_smarty_tpl->getVariable('role_id')->value=='9'){?>
        <th width="7%">Verifikasi DPJP</th>
        <?php }else{ ?>
        <th width="7%">Verifikasi DPJP</th>
        <?php }?>
        <!--<th width="10%">Aksi</th>-->
    </tr>
    <?php  $_smarty_tpl->tpl_vars['cppt'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_cppt')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cppt']->key => $_smarty_tpl->tpl_vars['cppt']->value){
?>
    <tr <?php if (($_smarty_tpl->tpl_vars['cppt']->value['TGL']%2)!=1&&$_smarty_tpl->tpl_vars['cppt']->value['role_id']=='5'||$_smarty_tpl->tpl_vars['cppt']->value['role_id']=='9'){?>
        style="background-color:#ffe6ff;color:red;"
        <?php }elseif(($_smarty_tpl->tpl_vars['cppt']->value['TGL']%2)!=1&&$_smarty_tpl->tpl_vars['cppt']->value['role_id']=='11'){?>
        style="background-color:#ffe6ff;color:green;"
        <?php }elseif(($_smarty_tpl->tpl_vars['cppt']->value['TGL']%2)!=1&&$_smarty_tpl->tpl_vars['cppt']->value['role_id']=='12'||$_smarty_tpl->getVariable('role_id')->value=='22'||$_smarty_tpl->getVariable('role_id')->value=='24'){?>
        style="background-color:#ffe6ff;color:blue;"
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['cppt']->value['role_id']=='5'||$_smarty_tpl->tpl_vars['cppt']->value['role_id']=='9'||$_smarty_tpl->tpl_vars['cppt']->value['role_id']=='13'){?>
        style="color:red;"
        <?php }elseif($_smarty_tpl->tpl_vars['cppt']->value['role_id']=='11'){?>
        style="color:green;"
        <?php }elseif($_smarty_tpl->tpl_vars['cppt']->value['role_id']=='12'){?>
        style="color:blue;"
        <?php }?>
        
        >
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['mdd_date'];?>
/<?php echo $_smarty_tpl->tpl_vars['cppt']->value['mdd_time'];?>
</td>
        <td>
            S / A: <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['cppt']->value['FS_CPPT_S']);?>
<br>
            O / D: <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['cppt']->value['FS_CPPT_O']);?>
<br>
            A / I: <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['cppt']->value['FS_CPPT_A']);?>
<br>
            P / ME: <?php echo $_smarty_tpl->tpl_vars['cppt']->value['FS_CPPT_P'];?>
<br>
            Resep : <br>
            <?php $_smarty_tpl->tpl_vars['rs_resep2'] = new Smarty_variable($_smarty_tpl->getVariable('m_cppt')->value->get_resep_by_trs(array($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_KP'])), null, null);?>
            <?php  $_smarty_tpl->tpl_vars['resep'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_resep2')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['resep']->key => $_smarty_tpl->tpl_vars['resep']->value){
?>
            <?php echo $_smarty_tpl->tpl_vars['resep']->value['FS_NM_BARANG'];?>
 <?php echo $_smarty_tpl->tpl_vars['resep']->value['FN_QTY_BARANG'];?>
 <?php echo $_smarty_tpl->tpl_vars['resep']->value['FS_KD_SATUAN'];?>
 <?php echo $_smarty_tpl->tpl_vars['resep']->value['FN_ETIKET_QTY'];?>
 x <?php echo $_smarty_tpl->tpl_vars['resep']->value['FS_ETIKET_HARI'];?>
 per Hari (<?php echo (($tmp = @$_smarty_tpl->tpl_vars['resep']->value['FS_ETIKET_CATATAN'])===null||$tmp==='' ? '-' : $tmp);?>
)<br>
            <?php }} ?>
            <hr>
        </td>
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['FS_NM_PEG'];?>
</td>
        <td>
            <?php if ($_smarty_tpl->tpl_vars['cppt']->value['mdb']==$_smarty_tpl->getVariable('com_user')->value['user_name']){?>
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('inap/cppt/edit/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_TRS']));?>
" class="button-edit">Edit</a> 
            <?php }?>
        </td>
        <?php if ($_smarty_tpl->getVariable('role_id')->value=='12'||$_smarty_tpl->getVariable('role_id')->value=='6'||$_smarty_tpl->getVariable('role_id')->value=='22'||$_smarty_tpl->getVariable('role_id')->value=='24'){?>
        <td>
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('inap/aplusan/add/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_TRS']));?>
" class="button-edit">Aplusan</a>  
        </td>
        <?php }else{ ?>
        <?php }?>
        <?php if ($_smarty_tpl->getVariable('role_id')->value=='5'||$_smarty_tpl->getVariable('role_id')->value=='6'||$_smarty_tpl->getVariable('role_id')->value=='9'){?>
        <td>

            <?php if ($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_MEDIS_VERIF_DATE']=='3000-01-01'&&$_smarty_tpl->tpl_vars['cppt']->value['mdb']!=$_smarty_tpl->getVariable('com_user')->value['user_name']){?>
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('inap/cppt/verif/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_TRS']));?>
" class="button-download">Verifikasi</a>  
            <?php }else{ ?>
            DOKTER : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['FS_NM_MEDIS_VERIF'];?>
<br><br>
            CATATAN : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['FS_KET_VERIF'];?>
 <br><br>
            <?php echo $_smarty_tpl->tpl_vars['cppt']->value['FS_KD_MEDIS_VERIF_DATE'];?>
<br><?php echo $_smarty_tpl->tpl_vars['cppt']->value['FS_KD_MEDIS_VERIF_TIME'];?>

            <?php }?>
        </td>
        <?php }else{ ?>
        <td>
        <?php if ($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_MEDIS_VERIF_DATE']=='3000-01-01'&&$_smarty_tpl->tpl_vars['cppt']->value['mdb']!=$_smarty_tpl->getVariable('com_user')->value['user_name']){?>
            <?php }else{ ?>
            DOKTER : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['FS_NM_MEDIS_VERIF'];?>
<br><br>
            CATATAN : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['FS_KET_VERIF'];?>
 <br><br>
            <?php echo $_smarty_tpl->tpl_vars['cppt']->value['FS_KD_MEDIS_VERIF_DATE'];?>
<br><?php echo $_smarty_tpl->tpl_vars['cppt']->value['FS_KD_MEDIS_VERIF_TIME'];?>

            <?php }?>
        <?php }?>
        </td>
        <!-- <td>
             <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('inap/cppt/edit/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_TRS']));?>
" class="button-edit">Edit</a>  
             <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('inap/cppt/delete_process/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_TRS']));?>
" onclick="return confirm('Apakah Anda Yakin Akan Menghapus?');" class="button-hapus">Hapus</a>  
             </td>-->
    </tr>
    <?php }} ?>
</table>

<div id="ModalAdd">
    <div class="modal-dialog">
        <div class="modal-content">
            <input name="FN_ITER_BARANG" id="FN_ITER_BARANG" value="0" type="hidden" size="2">
            <table class="table-input" width="100%">
                <tr >
                    <th colspan="2">Add Data <span id="loading">LOADING...</span></th>
                </tr>
                <tr>
                    <td>Nama Barang</td>
                    <td>
                        <select name="FS_KD_BARANG" class="select2" style="width: 320px;" id="FS_KD_BARANG">
                            <option value="">--Pilih Data--</option>
                            <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_resep')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['FS_KD_BARANG'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_NM_BARANG'];?>
</option>
                            <?php }} ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Jumlah</td>
                    <td>
                        <input name="FN_QTY_BARANG" id="FN_QTY_BARANG" class="form-control" type="text" size="2">
                        <em style="color:red;">* Masukkan Angka</em>
                </tr>
                <tr>
                    <td>Satuan</td>
                    <td>
                        <div id="show_data_obat"></div>
                </tr>
                <tr>
                    <td>Waktu Pemberian</td>
                    <td>
                        <input name="FN_ETIKET_QTY" id="FN_ETIKET_QTY" class="form-control" type="text" size="2">
                        x 
                        <input name="FN_ETIKET_HARI" id="FN_ETIKET_HARI" class="form-control" type="text" size="2">
                        Per Hari
                        <em style="color:red;">* Masukkan Angka</em>
                    </td>
                </tr>
                <tr>
                    <td>Catatan Lain</td>
                    <td>
                        <input name="FS_ETIKET_CATATAN" id="FS_ETIKET_CATATAN" class="form-control" type="text">
                    </td>
                </tr>
                <!--<tr>
                    <td>Iter</td>
                    <td>
                        <input name="FN_ITER_BARANG" id="FN_ITER_BARANG" value="0" type="text" size="2">
                </tr>-->

                <tr class="submit-box">
                    <td colspan="2">
                        <button type="button" id="btn-add" class="btn-blue">Tambah</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div id="ModalHapus">
    <table class="table-input" width="100%">
        <tr>
            <th colspan="2">Hapus Data <span id="loading-hapus">LOADING...</span></th>
        </tr>
        <tr>
        <input type="hidden" name="FS_KD_TRS2" id="FS_KD_TRS2" value="" />
        <td><div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus barang ini?</p></div></td>
        </tr>
        <tr class="submit-box">
            <td colspan="2">
                <button type="button" id="btn_hapus" class="btn-red">Hapus</button>
            </td>
        </tr>
    </table>
</div>

<div id="ModalAddStatus">
    <div class="modal-dialog">
        <div class="modal-content">
            <table class="table-input" width="100%">
                <tr >
                    <th colspan="2">Add Data <span id="loadingStatus">LOADING...</span></th>
                </tr>
                <tr>
                    <td>Cara Pulang</td>
                    <td>
                        <select name="FS_CARA_PULANG" class="select2" style="width: 320px;" id="FS_CARA_PULANG">
                            <option value="">-- Pilih --</option>
                            <option value="1">Sembuh</option>
                            <option value="2">Tampak Masih Sakit</option>
                            <option value="3">Pulang Atas Permintaan Sendiri</option>
                            <option value="4">Meninggal</option>
                            <option value="5">Pindah Rumah Sakit</option>
                        </select>

                    </td>
                </tr>
                <tr>
                    <td>Diagnosa Utama</td>
                    <td>
                        <input type="text" name="FS_DIAG_UTAMA" id="FS_DIAG_UTAMA" size="70">

                </tr>
                <tr>
                    <td>Diagnosa Sekunder</td>
                    <td>
                        <input type="text" name="FS_DIAG_SEK" id="FS_DIAG_SEK" size="70">
                </tr>
                <tr class="submit-box">
                    <td colspan="2">
                        <button type="button" id="btn-addStatus" class="btn-blue">Tambah</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>