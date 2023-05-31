<?php /* Smarty version Smarty-3.0.7, created on 2023-04-13 10:37:31
         compiled from "application/views\medis/igd/index.html" */ ?>
<?php /*%%SmartyHeaderCode:32682643778fb704973-15534574%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '457bab430beec8c7d57560ea1f36f0d373edf499' => 
    array (
      0 => 'application/views\\medis/igd/index.html',
      1 => 1616210788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32682643778fb704973-15534574',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("medis/igd/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<div class="breadcrum">
    <p>
        <a href="#">Pemeriksaan Medis</a><span></span>
        <small>Rawat Jalan</small>
    </p>
    <div class="clear"></div>
</div>
<!--<div class="search-box">
    <h3><a href="#">Search</a></h3>
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/igd/proses_cari');?>
" method="post">
        <table class="table-search" width="100%">
            <tr>
                <th width="10%" aligh="left">Periode</th>
                <td width="75%">
                    <input name="FD_TGL_MASUK" value="<?php echo $_smarty_tpl->getVariable('search')->value['FD_TGL_MASUK'];?>
" class="tanggal" size="10" style="text-align: center;"/>
                    <input name="save" type="submit" value="Tampilkan" />
                    <input name="save" type="submit" value="Reset" />
                </td>
            </tr>
        </table>
    </form>
</div>-->
<!-- notification template -->
<?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of notification template-->
<div class="dashboard-container">
    <table class="table-view" width="100%" border="0">
        <thead>
            <tr>
                <th width='4%'>Nomor Antrian</th>
                <th>No MR</th>
                <th>Nama Psien</th>
                <th>Alamat</th>
                <th>Dokter</th>
                <th>Status</th>
                <th width='14%'>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
            <tr <?php if (($_smarty_tpl->tpl_vars['data']->value['FN_NO_URUT']%2)!=1){?>class="blink-row"<?php }?>>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FN_NO_URUT'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_MR'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_NM_PASIEN'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_ALM_PASIEN'];?>
</td> 
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_NM_PEG'];?>
</td> 
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_STATUS']==''){?>
                    <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/icon.waiting.png" alt="" />
                    Periksa Perawat
                    <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_STATUS']=='1'){?>
                    <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/icon.waiting.dokter.png" alt="" />
                    Periksa Dokter
                    <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_STATUS']=='2'){?>
                     <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_TERAPI']==''||$_smarty_tpl->tpl_vars['data']->value['FS_TERAPI']=='<p>-</p>'){?>
                     <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/icon.approve.png" alt="" />
                     Selesai
                     <?php }else{ ?>
                    <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/icon.waiting.farmasi.png" alt="" />
                    Farmasi
                    <?php }?>
                     
                    <?php }?>
                </td> 
                <td>
                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('medis/igd/history/').($_smarty_tpl->tpl_vars['data']->value['FS_MR']))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Entry</a>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_TERAPI']==''||$_smarty_tpl->tpl_vars['data']->value['FS_TERAPI']=='<p>-</p>'){?>
                   <?php }else{ ?>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('medis/igd/cetak_resep/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">Cetak Resep</a>
                <?php }?>
                </td>
            </tr>
            <?php }} ?>
        </tbody>
    </table>
</div>
