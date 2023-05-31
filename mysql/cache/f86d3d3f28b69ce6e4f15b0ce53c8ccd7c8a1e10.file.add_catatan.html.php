<?php /* Smarty version Smarty-3.0.7, created on 2021-03-16 11:00:52
         compiled from "application/views\inap/rm10/add_catatan.html" */ ?>
<?php /*%%SmartyHeaderCode:2042160502d74c334b7-63680907%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f86d3d3f28b69ce6e4f15b0ce53c8ccd7c8a1e10' => 
    array (
      0 => 'application/views\\inap/rm10/add_catatan.html',
      1 => 1608812803,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2042160502d74c334b7-63680907',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\xampp\htdocs\emr_lampung\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("inap/rm10/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
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
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/rm10/edit/').($_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_reg']));?>
" >Data Umum</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/rm10/add_catatan/').($_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_reg']));?>
" class="active">Data Catatan Edukasi</a></li>
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
            <td>RENCANA EDUKASI</td>
            <td>
                <?php  $_smarty_tpl->tpl_vars['edukasi'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_rencana_edukasi')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['edukasi']->key => $_smarty_tpl->tpl_vars['edukasi']->value){
?>
                <?php echo $_smarty_tpl->tpl_vars['edukasi']->value['FS_NM_EDUKASI'];?>
,
                <?php }} ?>
            </td>
        </tr>
    </table>

    <table class="table-input" width="100%">
        <tr>
            <th colspan="6">Bukti Edukasi</th>
        </tr>
        <tr class="submit-box">
            <td colspan="6">
                <a href="#" id="opendialogpengirim"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
/resource/doc/images/icon/add-icon.png" style="height:20px;" alt="Tambah Diagnosis" /></a>
            </td>
        </tr>
        <tr>
            <td><center><b>Topik</b></center></td>
            <td><center><b>Nama Topik</b></center></td>
            <td><center><b>Diberikan Kepada</b></center></td>
            <td><center><b>Tanggal</b></center></td>
            <td><center><b>Jam</b></center></td>
            <td><center><b>Hasil</b></center></td>
        <!--<td><center><b>Aksi</b></center></td>-->
        </tr>
        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('diag')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
        <tr>
            <td>
                 <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_EDUKASI']=='1'){?>
                Hasil asesmen, diagnosis dan rencana asuhan
                <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_EDUKASI']=='2'){?>
                Hasil asuhan dan pengobatan (termasuk hasil yang tidak diharapkan)
                 <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_EDUKASI']=='3'){?>
                 Asuhan lanjutan dirumah
                  <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_EDUKASI']=='4'){?>
                  Penggunaan obat-obatan
                  <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_EDUKASI']=='5'){?>
                  Interaksi obat
                  <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_EDUKASI']=='6'){?>
                  Penggunaan peralatan medis
                  <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_EDUKASI']=='7'){?>
                  Diet dan nutrisi
                  <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_EDUKASI']=='8'){?>
                  Manajemen Nyeri
                  <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_EDUKASI']=='9'){?>
                  Teknik Rehabilitasi
                  <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_EDUKASI']=='10'){?>
                  Cara cuci tangan yang benar
                  <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_EDUKASI']=='11'){?>
                  Menyiapkan inisiasi menyusui dini
                  <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_EDUKASI']=='12'){?>
                  Menyusui anak hingga berusia 2 Tahun
                  <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_EDUKASI']=='13'){?>
                  Memilih metode KB yang sesuai ajaran Islam
                  <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_EDUKASI']=='14'){?>
                  Memotivasi untuk melaksanakan aqiqah
                  <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_EDUKASI']=='15'){?>
                  Menjalani program imunisasi
                  <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_EDUKASI']=='16'){?>
                  Memberikan bimbingan tentang fiqih haid dan nifas
                <?php }?>
            </td>
            <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_TOPIK'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_DIBERIKAN'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_TANGGAL'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_JAM_MULAI'];?>
 s/d <?php echo $_smarty_tpl->tpl_vars['data']->value['FS_JAM_SELESAI'];?>
</td>
            <td><center>
                <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_HASIL']=='1'){?>
                Menunjukkan tingkat pengetahuan yang diharapkan
                <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_HASIL']=='2'){?>
               Hasil asuhan dan pengobatan (termasuk hasil yang tidak diharapkan)
                 <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_HASIL']=='3'){?>
                 Dapat menjelaskan kembali materi edukasi dengan baik
                  <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_HASIL']=='4'){?>
                  Tidak dapat menjelaskan kembali materi edukasi dengan baik
                <?php }?>
            </center></td>
        <!--<td><center>
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('inap/rm10/edit_catatan/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_RM_10_1'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG']));?>
" class="btn-blue" title="Edit">Edit</a>
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('inap/rm10/delete_process_catatan/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_RM_10_1'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG']));?>
" class="btn-red" title="Hapus Catatan"  onclick="return confirm('Apakah Anda Yakin Akan Menghapus?');">Hapus</a>
        </center></td>-->
        </tr>
        <?php }} ?>
        <tr class="submit-box">
            <td colspan="6">
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/rm10/edit/').($_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_reg']));?>
" class="btn-red" style="float:left;"/>Kembali</a>
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/rm10/selesai/').($_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_reg']));?>
" class="btn-green" onclick="return confirm('Apakah Anda Yakin Akan Melanjutkan?');" style="float:right;"/>Lanjutkan</a>
            </td>
        </tr>
    </table>
</form>
</div>

<!-------------------------------->
<!--open dialog form----->
<!-------------------------------->
<div id="dialog-form" title="Add Catatan Edukasi">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/rm10/add_catatan_process');?>
" method="post">
        <input name="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_reg'];?>
" />
        <table class="table-input" width="100%">
            <tr>
                <th colspan="2">Tambah Data</th>
            </tr>
            <tr>
                <td width="25%">Edukasi</td>
                <td width="75%">
                    <select name="FS_EDUKASI" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <option value="1">Hasil asesmen, diagnosis dan rencana asuhan</option>
                        <option value="2">Hasil asuhan dan pengobatan (termasuk hasil yang tidak diharapkan)</option>
                        <option value="3">Asuhan lanjutan dirumah</option>
                        <option value="4">Penggunaan obat-obatan</option>
                        <option value="5">Interaksi obat</option>
                        <option value="6">Penggunaan peralatan medis</option>
                        <option value="7">Diet dan nutrisi</option>
                        <option value="8">Manajemen Nyeri</option>
                        <option value="9">Teknik Rehabilitasi</option>
                        <option value="10">Cara cuci tangan yang benar</option>
                        <option value="11">Menyiapkan inisiasi menyusui dini</option>
                        <option value="12">Menyusui anak hingga berusia 2 Tahun</option>
                        <option value="13">Memilih metode KB yang sesuai ajaran Islam</option>
                        <option value="14">Memotivasi untuk melaksanakan aqiqah</option>
                        <option value="15">Menjalani program imunisasi</option>
                        <option value="16">Memberikan bimbingan tentang fiqih haid dan nifas</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="25%">Materi Edukasi</td>
                <td width="75%">
                    <input type="text" name="FS_TOPIK" size="40">
                </td>
            </tr>
            <tr>
                <td>Diberikan Kepada</td>
                <td>
                    <input type="text" name="FS_DIBERIKAN" size="40">
                </td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>
                    <input name="FS_TANGGAL" type="text" size="10" maxlength="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_TANGGAL'])===null||$tmp==='' ? '' : $tmp);?>
" class="tanggal" readonly="readonly" style="text-align: center;" />
                </td>
            </tr>
            <tr>
                <td>Jam Mulai</td>
                <td>
                    <input name="FS_JAM_MULAI" type="text" size="10" maxlength="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_TANGGAL'])===null||$tmp==='' ? '' : $tmp);?>
" class="waktu" readonly="readonly" style="text-align: center;" />
                </td>
            </tr>
            <tr>
                <td>Jam Selesai</td>
                <td>
                    <input name="FS_JAM_SELESAI" type="text" size="10" maxlength="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_TANGGAL'])===null||$tmp==='' ? '' : $tmp);?>
" class="waktu2" readonly="readonly" style="text-align: center;" />
                </td>
            </tr>
           <!-- <tr>
                <td>Kebutuhan Edukasi</td>
                <td>
                    <select name="FS_KEBUTUHAN" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <option value="1">TINDAKAN PENCEGAHAN</option>
                        <option value="2">INTERVENSI DIET</option>
                        <option value="3">PERALATAN KHUSUS</option>
                        <option value="4">PENCEGAHAN RISIKO JATUH</option>
                        <option value="5">MANAJEMEN NYERI</option>
                        <option value="6">PENYAKIT KHUSUS</option>
                        <option value="7">PENGOBATAN</option>
                        <option value="8">EDUKASI DIABETES</option>
                        <option value="9">TRANFUSI DARAH</option>
                        <option value="10">VAKSINASI</option>
                        <option value="11">AKSES PELAYANAN</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tujuan</td>
                <td>
                    <select name="FS_TUJUAN" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <option value="1">MULAI MENGGUNAKAN INFORMASI YANG DIDAPAT</option>
                        <option value="2">DAPAT MENGUNGKAPKAN SECARA LISAN INFORMASI YANG DIDAPAT</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Kemampuan</td>
                <td>
                    <select name="FS_KEMAMPUAN" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <option value="1">DAPAT MENGUBAH PERILAKU</option>
                        <option value="2">DAPAT MENGUASAI INFORMASI</option>
                        <option value="3">TIDAK JELAS PADA SAAT INI</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Kesiapan</td>
                <td>
                    <select name="FS_KESIAPAN" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <option value="1">SIAP</option>
                        <option value="2">TERTARIK</option>
                        <option value="3">TIDAK TERTARIK / TIDAK MAMPU</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Hambatan</td>
                <td>
                    <select name="FS_HAMBATAN" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <option value="1">TIDAK ADA</option>
                        <option value="2">TAKUT</option>
                        <option value="3">TIDAK TERTARIK</option>
                        <option value="4">NYERI / TIDAK NYAMAN</option>
                        <option value="5">GANGGUAN KOGNITIF</option>
                        <option value="6">HAMBATAN BAHASA</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Intervensi</td>
                <td>
                    <select name="FS_INTERVENSI" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <option value="1">TIDAK ADA</option>
                        <option value="2">MEMBATASI MATERI</option>
                        <option value="3">MENGGUNAKAN PENTERJEMAH</option>
                        <option value="4">MENGULANGI EDUKASI</option>
                        <option value="5">MENGEDUKASI KELUARGA</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Metode Pembelajaran</td>
                <td>
                    <select name="FS_METODE" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <option value="1">DEMONSTRASI</option>
                        <option value="2">DISKUSI</option>
                        <option value="3">LEAFLET / HAND OUT</option>
                    </select>
                </td>
            </tr>-->
            <tr>
                <td>Hasil</td>
                <td>
                    <select name="FS_HASIL" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <!--<option value="1">MENUNJUKKAN TINGKAT PENGETAHUAN YANG DIHARAPKAN</option>
                        <option value="2">MEMBUTUHKAN PETUNJUK TAMBAHAN</option>-->
                        <option value="3">Dapat menjelaskan kembali materi edukasi dengan baik</option>
                        <option value="4">Tidak dapat menjelaskan kembali materi edukasi dengan baik</option>
                    </select>
                </td>
            </tr>
            <!--<tr>
                <td>Catatan (Apabila Ada)</td>
                <td>
                   <textarea name="FS_CATATAN" rows="3" cols="43"></textarea>
                </td>
            </tr>-->
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