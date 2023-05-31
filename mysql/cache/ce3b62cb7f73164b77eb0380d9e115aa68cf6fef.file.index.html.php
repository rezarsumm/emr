<?php /* Smarty version Smarty-3.0.7, created on 2021-03-15 15:38:11
         compiled from "application/views\farmasi/rawat_inap/index.html" */ ?>
<?php /*%%SmartyHeaderCode:21341604f1cf39547b3-53692651%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce3b62cb7f73164b77eb0380d9e115aa68cf6fef' => 
    array (
      0 => 'application/views\\farmasi/rawat_inap/index.html',
      1 => 1608812793,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21341604f1cf39547b3-53692651',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("nurse/rawat_jalan/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<div class="breadcrum">
    <p>
        <a href="#">Farmasi</a><span></span>
        <small>Rawat Inap</small>
    </p>
    <div class="clear"></div>
</div>
<div class="head-content">
    <div class="head-content-nav">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('farmasi/rawat_inap/');?>
" class="active">Data Realtime</a></li>
        </ul>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<div class="search-box">
    <h3><a href="#">Search</a></h3>
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('farmasi/rawat_inap/proses_cari');?>
" method="post">
        <table class="table-search" width="100%">
            <tr>
                <th width="10%" aligh="left">Tanggal Pelayanan</th>
                <td width="90%">
                    <input name="FD_TGL_TRS" value="<?php echo $_smarty_tpl->getVariable('search')->value['FD_TGL_TRS'];?>
" class="tanggal" size="10" style="text-align: center;"/>
                    <input name="save" type="submit" value="Tampilkan" />
                    <input name="save" type="submit" value="Reset" />
                </td>
            </tr>
        </table>
    </form>
</div>
<!-- notification template -->
<?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of notification template-->
<div class="dashboard-container">
    <table class="table-view" width="100%" border="0">
        <thead>
            <tr>
                <th>Jam Order</th>
                <th>Jaminan</th>
                <th>No MR</th>
                <th>Layanan</th>
                <th>Nama Psien</th>
                <th>Dokter</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['fs_jam_trs'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['fs_nm_tipe_jaminan'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_MR'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['fs_nm_layanan'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['fs_nm_pasien'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['fs_nm_peg'];?>
</td> 
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['fs_kd_du']==' '){?>
                    <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/icon.waiting.png" alt="" />
                    Belum Terlayani
                    <?php }else{ ?>
                    <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/icon.approve.png" alt="" />
                    Terlayani
                    <?php }?>
                </td> 
                <td>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('rm/rawat_inap/cetak_resep/').($_smarty_tpl->tpl_vars['data']->value['fs_kd_trs']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">Cetak Resep</a>
                </td>
            </tr>
            <?php }} ?>
        </tbody>
    </table>
</div>