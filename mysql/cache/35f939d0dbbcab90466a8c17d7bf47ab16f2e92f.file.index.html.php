<?php /* Smarty version Smarty-3.0.7, created on 2021-03-15 15:23:51
         compiled from "application/views\nurse/rawat_jalan_kb/index.html" */ ?>
<?php /*%%SmartyHeaderCode:30051604f199724ec45-46709483%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35f939d0dbbcab90466a8c17d7bf47ab16f2e92f' => 
    array (
      0 => 'application/views\\nurse/rawat_jalan_kb/index.html',
      1 => 1608812823,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30051604f199724ec45-46709483',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("nurse/rawat_jalan/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<div class="breadcrum">
    <p>
        <a href="#">Nursing Record</a><span></span>
        <small>Rawat Jalan</small>
    </p>
    <div class="clear"></div>
</div>
<div class="search-box">
    <h3><a href="#">Search</a></h3>
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('nurse/rawat_jalan_kb/proses_cari');?>
" method="post">
        <table class="table-search" width="100%">
            <tr>
                <th width="10%" aligh="left">Dokter</th>
                <td>
                    <select name="FS_KD_PEG" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_dokter')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['FS_KD_PEG'];?>
" <?php if ($_smarty_tpl->getVariable('search')->value['FS_KD_PEG']==$_smarty_tpl->tpl_vars['data']->value['FS_KD_PEG']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_NM_PEG'];?>
</option>
                        <?php }} ?>
                    </select>
                <th width="10%" aligh="left"></th>
                <td width="75%">
                    <input name="save" type="submit" value="Tampilkan" />
                    <input name="save" type="submit" value="Reset" />
                </td>
            </tr>
        </table>
    </form>
</div>
<!--<div class="navigation">
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
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('nurse/rawat_jalan_kb/rekap_excel/').(''));?>
"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/printer-icon.png" alt="" /> Cetak Rekap Laporan</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>-->
<!-- notification template -->
<?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of notification template-->
<div class="dashboard-container">
    <table class="table-view" width="100%" border="0">
        <thead>
            <tr>
                <th width='5%'>Nomor Antrian</th>
                <th>No MR</th>
                <th>Nama Psien</th>
                <th>Alamat</th>
                <th>Status</th>
                <th width='23%'>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
            <!--<?php $_smarty_tpl->tpl_vars['cek_lab'] = new Smarty_variable($_smarty_tpl->getVariable('m_rawat_jalan')->value->cek_data_order_lab_by_rg2(array($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])), null, null);?>
        <?php $_smarty_tpl->tpl_vars['cek_rad'] = new Smarty_variable($_smarty_tpl->getVariable('m_rawat_jalan')->value->cek_data_order_rad_by_rg2(array($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])), null, null);?>-->
            <tr <?php if (($_smarty_tpl->tpl_vars['data']->value['FN_NO_URUT']%2)!=1){?>class="blink-row"<?php }?>>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FN_NO_URUT'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_MR'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_NM_PASIEN'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_ALM_PASIEN'];?>
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
                    
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_STATUS']>='1'){?>
                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('nurse/rawat_jalan_kb/history/').($_smarty_tpl->tpl_vars['data']->value['FS_MR'])).('/')).($_smarty_tpl->getVariable('search')->value['FS_KD_PEG']));?>
" class="button-edit">Entry</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('rm/rawat_jalan/kendali/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">Kendali</a>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_CARA_PULANG']=='2'){?>
                    <a  href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_jalan/cetak_skdp/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">SKDP</a>
                    <?php }else{ ?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_CARA_PULANG']=='1'){?>
                    <a  href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('medis/rawat_jalan/cetak_prb/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">PRB</a>
                    <?php }else{ ?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_CARA_PULANG']=='3'){?>
                    <a  href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])).('/11'));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">Rawat Inap</a>
                    <?php }else{ ?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_CARA_PULANG']=='4'){?>
                    <a  href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_jalan/cetak_rujukan/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">Rujukan RS</a>
                    <?php }else{ ?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_CARA_PULANG']=='5'){?>
                    <a  href="#" class="button-edit">PRB/Prolanis</a>
                    <?php }else{ ?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_CARA_PULANG']=='6'){?>
                    <a  href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_jalan/cetak_rujukan/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">Rujukan Internal</a>
                    <?php }else{ ?>
                    <?php }?>
                    <?php if ($_smarty_tpl->getVariable('cek_lab')->value!=''){?>
                    <a  href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_jalan/cetak_rujukan_lab/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">Lab</a>
                    <?php }else{ ?>
                    <?php }?>
                    <?php if ($_smarty_tpl->getVariable('cek_rad')->value!=''){?>
                    <a  href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_jalan/cetak_rujukan_rad/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">Radiologi</a>
                    <?php }else{ ?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_TERAPI']==''||$_smarty_tpl->tpl_vars['data']->value['FS_TERAPI']=='<p>-</p>'){?>
                    <?php }else{ ?>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('medis/rawat_jalan/cetak_resep/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">Resep</a>
                    <?php }?>
                    <?php }else{ ?>
                   <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('nurse/rawat_jalan_kb/history/').($_smarty_tpl->tpl_vars['data']->value['FS_MR'])).('/')).($_smarty_tpl->getVariable('search')->value['FS_KD_PEG']));?>
" class="button-edit">Entry</a>
                   <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('rm/rawat_jalan/kendali/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">Kendali</a>
                    
                   <?php }?>
                  
                </td>
            </tr>
            <?php }} ?>
        </tbody>
    </table>
</div>
