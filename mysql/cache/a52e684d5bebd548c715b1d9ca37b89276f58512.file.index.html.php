<?php /* Smarty version Smarty-3.0.7, created on 2021-03-16 14:02:58
         compiled from "application/views\rm/berkas_pinjam/index.html" */ ?>
<?php /*%%SmartyHeaderCode:17837605058225b6c64-51366441%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a52e684d5bebd548c715b1d9ca37b89276f58512' => 
    array (
      0 => 'application/views\\rm/berkas_pinjam/index.html',
      1 => 1608812828,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17837605058225b6c64-51366441',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\xampp\htdocs\emr_lampung\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("nurse/rawat_jalan/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<div class="breadcrum">
    <p>
        <a href="#">Medical Record</a><span></span>
        <small>Peminjaman Berkas</small>
    </p>
    <div class="clear"></div>
</div>
<!-- notification template -->
<?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of notification template-->
<div class="dashboard-container">
     
    <table class="table-view" width="100%" border="0">
        <thead>
            <tr>
                <th width='19%'>Tanggal Kunjungan</th>
                <th>Kode Reg</th>
                <th>Nama</th>
                <th>Dokter</th>
                <th>Layanan</th>
                <th>Tanggal Expired</th>
                <th>Status</th>
                <th width='15%'>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
            <!--
            <?php $_smarty_tpl->tpl_vars['form_rm'] = new Smarty_variable($_smarty_tpl->getVariable('m_rawat_jalan')->value->get_berkas_by_rg(array($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])), null, null);?>
            -->
            <tr>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['FD_TGL_MASUK'],"%d %B %Y");?>
 - <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['FD_TGL_KELUAR'],"%d %B %Y");?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_NM_PASIEN'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_NM_PEG'];?>
</td> 
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_NM_LAYANAN'];?>
</td> 
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FD_TGL_EXPIRED'];?>
</td>
                <td>
        <center>
            <b>
                <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_KD_JENIS_REG']=='0'){?>
                <div style="color: blue;">Rawat Jalan</div>
                <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_KD_JENIS_REG']=='1'){?>
                <div style="color: green;">Rawat Inap</div>
                <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_KD_JENIS_REG']=='3'){?>
                <div style="color: red;">Rawat Darurat</div>
                <?php }?>
            </b>
        </center>
        </td> 
        <td>
            <?php if ($_smarty_tpl->getVariable('form_rm')->value['FS_JENIS_BERKAS']=='1'){?>
    
    <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_KD_JENIS_REG']=='0'){?>
            <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((((('rm/rawat_jalan/cetak_rm/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_FORM']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">RM</a>
            <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_KD_JENIS_REG']=='1'){?>
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('rm/berkas/detail/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG']))===null||$tmp==='' ? '' : $tmp));?>
"  class="button-download">Detail</a> 
            
            <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_KD_JENIS_REG']=='3'){?>
            <?php }?>
            
            <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_CARA_PULANG']=='2'){?>
                    <a  href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_jalan/cetak_skdp/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">SKDP</a>
                    <?php }else{ ?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_CARA_PULANG']=='1'){?>
                    <a  href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_jalan/cetak_prb/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">PRB</a>
                    <?php }else{ ?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_CARA_PULANG']=='4'){?>
                    <a  href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_jalan/cetak_rujukan/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">Rujukan RS</a>
                    <?php }else{ ?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_TERAPI']==''||$_smarty_tpl->tpl_vars['data']->value['FS_TERAPI']=='<p>-</p>'){?>
                    <?php }else{ ?>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('medis/rawat_jalan/cetak_resep/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">Resep</a>
                    <?php }?>
        </td>
        </tr>
        <?php }} ?>
        </tbody>
    </table>
</div>
