<?php /* Smarty version Smarty-3.0.7, created on 2023-04-13 11:09:01
         compiled from "application/views\medis/igd/add_skdp.html" */ ?>
<?php /*%%SmartyHeaderCode:60186437805d49ddd1-14895332%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3f6713e392a9d55811b3b5b807bd629cfcc3209' => 
    array (
      0 => 'application/views\\medis/igd/add_skdp.html',
      1 => 1616210788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '60186437805d49ddd1-14895332',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("medis/rawat_jalan/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<script type="text/javascript">
    
</script>
<div class="breadcrum">
    <p>
        <a href="#">Pemeriksaan Dokter</a><span></span>
        <a href="#">History Pasien</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/');?>
">Rawat Jalan</a><span></span>
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="navigation">
    <div class="navigation-button">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('medis/rawat_jalan/history/').($_smarty_tpl->getVariable('result')->value['FS_MR']));?>
"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/back-icon.png" alt="" />  Back</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<!-- notification template -->
<?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of notification template-->
<form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/add_skdp_process');?>
" method="post">
    <input type="hidden" name="FS_KD_TRS" value="<?php echo $_smarty_tpl->getVariable('result')->value['FS_KD_TRS'];?>
" />
    <input type="hidden" name="FS_KD_REG" value="<?php echo $_smarty_tpl->getVariable('result')->value['FS_KD_REG'];?>
" />
    <table class="table-info" width="100%">
        <tr class="headrow">
            <th colspan="4">Data Pasien</th>
        </tr>
        <tr>
            <td width='15%'>Kode Reg</td>
            <td width='35%'><?php echo $_smarty_tpl->getVariable('result')->value['FS_KD_REG'];?>
</td>
            <td width='15%'>No RM</td>
            <td width='35%'><?php echo $_smarty_tpl->getVariable('result')->value['FS_MR'];?>
</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_NM_PASIEN'])===null||$tmp==='' ? '' : $tmp);?>
</td>
            <td>Alamat</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_ALM_PASIEN'])===null||$tmp==='' ? '' : $tmp);?>
</td>
        </tr>
        <tr>
            <td>Umur</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['fn_umur'])===null||$tmp==='' ? '' : $tmp);?>
 Tahun</td>
            <td>Jenis Kelamin</td>
            <td>
                <?php if ($_smarty_tpl->getVariable('result')->value['FS_JNS_KELAMIN']=='1'){?>
                Perempuan
                <?php }else{ ?>
                Laki-Laki
                <?php }?>
            </td>
        </tr>
        <tr>
            <td>Jaminan</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_NM_JAMINAN'])===null||$tmp==='' ? '' : $tmp);?>
</td>
            <td>Dokter</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_NM_PEG'])===null||$tmp==='' ? '' : $tmp);?>
</td>
        </tr>
    </table>
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Surat Keterangan Dalam Perawatan</th>
        </tr>
        <tr>
            <td width='15%'>Belum dapat dikembalikan ke Fasilitas Perujuk dengan alasan</td>
            <td width='85%'>
                <select name="FS_SKDP_1" id="skdp_alasan">
                    <option value='1'>--Pilih Alasan--</option>
                    <?php  $_smarty_tpl->tpl_vars['skdp_alasan'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_skdp_alasan')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['skdp_alasan']->key => $_smarty_tpl->tpl_vars['skdp_alasan']->value){
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['skdp_alasan']->value['FS_KD_TRS'];?>
"><?php echo $_smarty_tpl->tpl_vars['skdp_alasan']->value['FS_NM_SKDP_ALASAN'];?>
</option>
                    <?php }} ?>
                </select>
            </td>

        </tr>
        <tr>
            <td>Rencana tindak lanjut yang akan dilakukan pada kunjungan selanjutnya :</td>
            <td>
                <select name="FS_SKDP_2" id="kota">
                    <option value='1'>--Pilih Rencana Tindakan--</option>
                </select>
                <input type="text" name="FS_SKDP_KET"/>
            </td>

        </tr>
        <tr>
            <td>Tanggal Kontrol Berikutnya :</td>
            <td>
                <input type="text" name="FS_SKDP_KONTROL" class="tanggal" size="10"/>
            </td>

        </tr>
        <tr class="submit-box">
            <td colspan="4">
                <input type="submit" name="save" value="Simpan" class="edit-button" /> 
            </td>
        </tr>
    </table>
</form>