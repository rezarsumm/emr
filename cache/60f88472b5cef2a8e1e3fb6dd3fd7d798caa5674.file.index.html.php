<?php /* Smarty version Smarty-3.0.7, created on 2022-02-18 08:43:30
         compiled from "application/views\rad/rawat_inap/index.html" */ ?>
<?php /*%%SmartyHeaderCode:30245620ef9c21b56a5-51496983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60f88472b5cef2a8e1e3fb6dd3fd7d798caa5674' => 
    array (
      0 => 'application/views\\rad/rawat_inap/index.html',
      1 => 1645148580,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30245620ef9c21b56a5-51496983',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("nurse/rawat_jalan/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<div class="breadcrum">
    <p>
        <a href="#">Radiologi</a><span></span>
        <small>Rawat Inap</small>
    </p>
    <div class="clear"></div>
</div>
 
<div class="search-box">
    <h3><a href="#">Search</a></h3>
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('rad/rad_inap/proses_cari');?>
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
                 <th>No MR</th>
                <th>Layanan</th>
                <th>Nama Psien</th>
                <th>Dokter/Perawat</th>
                  <th>Pemeriksaaan</th>
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
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['mdd_time'];?>
</td>
               <td><?php echo $_smarty_tpl->tpl_vars['data']->value['No_MR'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['Nama_Ruang'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['Nama_Pasien'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['NamaLengkap'];?>
</td> 
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_RAD'];?>
</td> 
                 <td>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('rad/rad_inap/cetak_prad/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">Cetak </a>
                </td>
                
              
            </tr>
            <?php }} ?>
        </tbody>
    </table>
</div>