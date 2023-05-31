<?php /* Smarty version Smarty-3.0.7, created on 2021-10-22 08:10:36
         compiled from "application/views\nurse/rawat_jalan_kb/history.html" */ ?>
<?php /*%%SmartyHeaderCode:63736073ad827af877-64442821%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1711e1208c3841e11f93a577c06245ae85f1b30a' => 
    array (
      0 => 'application/views\\nurse/rawat_jalan_kb/history.html',
      1 => 1616210790,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '63736073ad827af877-64442821',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("medis/rawat_jalan/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<div class="breadcrum">
    <p>
        <a href="#">Pemeriksaan Medis</a><span></span>
        <small>History Pasien</small>
    </p>
    <div class="clear"></div>
</div>
<div class="navigation">
    <div class="navigation-button">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('nurse/rawat_jalan/');?>
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
<table class="table-info" width="100%">
    <tr class="headrow">
        <th colspan="4">Data Pasien</th>
    </tr>
    <tr>
        <td width='15%'>No RM</td>
        <td width='35%'><?php echo $_smarty_tpl->getVariable('result')->value['NO_MR'];?>
</td>
        <td width='15%'>Nama</td>
        <td width='35%'><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['NAMA_PASIEN'])===null||$tmp==='' ? '' : $tmp);?>
</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['ALAMAT'])===null||$tmp==='' ? '' : $tmp);?>
</td>
        <td>Tanggal Lahir</td>
        <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['TGL_LAHIR'])===null||$tmp==='' ? '' : $tmp);?>
</td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td><?php if ($_smarty_tpl->getVariable('result')->value['JENIS_KELAMIN']=='P'){?>
            Perempuan
            <?php }else{ ?>
            Laki-Laki
        <?php }?></td>
        <td></td>
        <td></td>
    </tr>
</table>
<div class="navigation">
    <div class="pageRow">
        <div class="pageNav">
            <ul>
                <li class="info"></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
    <div class="navigation-button">
        <ul>
            <li><a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('rm/rawat_jalan/resume/').($_smarty_tpl->getVariable('result')->value['NO_MR']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/printer-icon.png" alt="" /> Profil Ringkas Medis Rawat Jalan</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<table class="table-view" width="100%" border="0">
    <thead>
        <tr>
            <th width='10%'>Tanggal Kunjungan</th>

            <th>Dokter</th>
            <th>Layanan</th>
            <th>Catatan</th>
            <th>Status</th>
            <th width='20%'>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
        <!--<?php $_smarty_tpl->tpl_vars['cek_lab'] = new Smarty_variable($_smarty_tpl->getVariable('m_rawat_jalan')->value->get_data_cek_lab(array($_smarty_tpl->tpl_vars['data']->value['NO_REG'])), null, null);?>
        <?php $_smarty_tpl->tpl_vars['cek_rad'] = new Smarty_variable($_smarty_tpl->getVariable('m_rawat_jalan')->value->get_data_cek_radiologi(array($_smarty_tpl->tpl_vars['data']->value['NO_REG'])), null, null);?>
        <?php $_smarty_tpl->tpl_vars['cek_resep'] = new Smarty_variable($_smarty_tpl->getVariable('m_rawat_jalan')->value->get_data_cek_resep(array($_smarty_tpl->tpl_vars['data']->value['NO_REG'])), null, null);?>
        <?php $_smarty_tpl->tpl_vars['form_rm'] = new Smarty_variable($_smarty_tpl->getVariable('m_rawat_jalan')->value->get_berkas_by_rg(array($_smarty_tpl->tpl_vars['data']->value['NO_REG'])), null, null);?>
        <?php $_smarty_tpl->tpl_vars['cek_ases_perawat'] = new Smarty_variable($_smarty_tpl->getVariable('m_rawat_jalan')->value->cek_ases_perawat_by_rg(array($_smarty_tpl->tpl_vars['data']->value['NO_REG'])), null, null);?>
    -->
    <tr <?php if (($_smarty_tpl->getVariable('no')->value++%2)!=1){?>class="blink-row"<?php }?>>
        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['TANGGAL'],"%d %B %Y");?>
</td>

        <td>
            <?php echo $_smarty_tpl->tpl_vars['data']->value['NAMA_DOKTER'];?>
<br>
            <?php echo $_smarty_tpl->tpl_vars['data']->value['DOK2'];?>

        </td> 
        <td>
            <?php echo $_smarty_tpl->tpl_vars['data']->value['SPESIALIS'];?>
<br>
            <?php echo $_smarty_tpl->tpl_vars['data']->value['LAYANAN2'];?>

        </td> 
        <td>
            <?php if ($_smarty_tpl->getVariable('cek_lab')->value>='1'){?>
            - Hasil Laboratorium <br>
            <?php }?>
            <?php if ($_smarty_tpl->getVariable('cek_rad')->value>='1'){?>
            - Hasil Radiologi <br>
            <?php }?>
            <?php if ($_smarty_tpl->getVariable('cek_resep')->value>='1'){?>
            - Resep Paten
            <?php }?>


        </td>
        <td>
            <center>
                <b>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['KODE_KAMAR']==''){?>
                    <div style="color: blue;">Rawat Jalan</div>
                    <?php }elseif($_smarty_tpl->tpl_vars['data']->value['KODE_KAMAR']!=''){?>
                    <div style="color: green;">Rawat Inap</div>
                    <?php }?>
                </b>
            </center>
        </td> 
        <td>
            <?php if ($_smarty_tpl->getVariable('form_rm')->value['att_name']!=''){?>
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('rm/upload/download/').($_smarty_tpl->getVariable('form_rm')->value['att_name']));?>
" class="button-download" target="_blank">Berkas</a>  
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['data']->value['KODE_KAMAR']==''){?>
            <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((((('rm/rawat_jalan/cetak_rm/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_FORM']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">RM</a>
            <?php }elseif($_smarty_tpl->tpl_vars['data']->value['KODE_KAMAR']!=''){?>
            <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">RM</a>  
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_CARA_PULANG']=='2'){?>
            <a  href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('medis/rawat_jalan/cetak_skdp/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">SKDP</a>
            <?php }else{ ?>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_CARA_PULANG']=='1'){?>
            <a  href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('medis/rawat_jalan/cetak_prb/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">PRB</a>
            <?php }else{ ?>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_CARA_PULANG']=='4'){?>
            <a  href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_jalan/cetak_rujukan/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">Rujukan RS</a>
            <?php }else{ ?>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_TERAPI']==''||$_smarty_tpl->tpl_vars['data']->value['FS_TERAPI']=='<p>-</p>'){?>
            <?php }else{ ?>
            <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('medis/rawat_jalan/cetak_resep/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">Resep</a>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['data']->value['TANGGAL']==$_smarty_tpl->getVariable('now')->value){?>
            <?php if ($_smarty_tpl->getVariable('cek_ases_perawat')->value=='0'){?>
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((((('nurse/rawat_jalan_kb/add/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->getVariable('FS_KD_MEDIS')->value)).('/')).('A'));?>
" class="button-edit">Awal</a>
            <?php }else{ ?>
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('nurse/rawat_jalan_kb/edit/').($_smarty_tpl->tpl_vars['data']->value['NO_REG']))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Edit</a>

            <?php }?>
            <?php }?>
        </td>
    </tr>
    <?php }} ?>
</tbody>
</table>
