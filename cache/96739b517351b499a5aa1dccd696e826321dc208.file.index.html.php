<?php /* Smarty version Smarty-3.0.7, created on 2023-07-28 13:46:18
         compiled from "application/views\nurse/rawat_jalan/index.html" */ ?>
<?php /*%%SmartyHeaderCode:1982764c3643a00f023-23317509%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96739b517351b499a5aa1dccd696e826321dc208' => 
    array (
      0 => 'application/views\\nurse/rawat_jalan/index.html',
      1 => 1656656353,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1982764c3643a00f023-23317509',
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
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('nurse/rawat_jalan/proses_cari');?>
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
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['KODE_DOKTER'];?>
" <?php if ($_smarty_tpl->getVariable('search')->value['FS_KD_PEG']==$_smarty_tpl->tpl_vars['data']->value['KODE_DOKTER']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMA_DOKTER'];?>
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
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('nurse/rawat_jalan/rekap_excel/').($_smarty_tpl->getVariable('data')->value['FS_MR']));?>
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
                <th width='2%'>No </th>
                <th>No MR</th>
                <th>Nama Pasien</th>
                <th>Alamat</th>
                <th>Status</th>
                <th width='39%'>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
            <!--<?php $_smarty_tpl->tpl_vars['cek_lab'] = new Smarty_variable($_smarty_tpl->getVariable('m_rawat_jalan')->value->cek_data_order_lab_by_rg2(array($_smarty_tpl->tpl_vars['data']->value['NO_REG'])), null, null);?>
                <?php $_smarty_tpl->tpl_vars['cek_rad'] = new Smarty_variable($_smarty_tpl->getVariable('m_rawat_jalan')->value->cek_data_order_rad_by_rg2(array($_smarty_tpl->tpl_vars['data']->value['NO_REG'])), null, null);?>-->
                <tr <?php if (($_smarty_tpl->tpl_vars['data']->value['NOMOR']%2)!=1){?>class="blink-row"<?php }?>>
                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['NOMOR'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['NO_MR'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMA_PASIEN'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['ALAMAT'];?>
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

                        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('nurse/rawat_jalan/history/').($_smarty_tpl->tpl_vars['data']->value['NO_MR'])).('/')).($_smarty_tpl->getVariable('search')->value['FS_KD_PEG']));?>
" class="button-edit">Entry</a>                    
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_CARA_PULANG']=='1'){?>
                        <a  href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('medis/rawat_jalan/cetak_rb/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">RB</a>
                        <?php }else{ ?>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_CARA_PULANG']=='2'){?>
                        <a  href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_jalan/cetak_skdp/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">SKDP</a>

                         <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('medis/rawat_jalan/isiskdp/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->getVariable('search')->value['FS_NO_MR']));?>
" class="button-edit">Edit SKDP</a>    

                          
                        <?php }else{ ?>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_CARA_PULANG']=='3'){?>
                        <a  href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('rm/rawat_inap/cetak_asesmen_awal_medis/').($_smarty_tpl->tpl_vars['data']->value['NO_REG']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">Rawat Inap</a>
                         <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('medis/rawat_jalan/editranap/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->getVariable('search')->value['FS_NO_MR']));?>
" class="button-edit">Edit Rawat Inap </a>    

                        <?php }else{ ?>
                        <?php }?>
                         <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_CARA_PULANG']=='7'){?>
                        <a  href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('medis/rawat_jalan/cetak_faskes/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">Faskes</a>
                        <?php }else{ ?>
                        <?php }?>
                         <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_CARA_PULANG']=='8'){?>
                        <a  href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('medis/rawat_jalan/cetak_prb/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">PRB</a>
                        <?php }else{ ?>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_CARA_PULANG']=='4'){?>
                        <a  href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_jalan/cetak_rujukan/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">Rujukan RS</a>
                        <?php }else{ ?>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_CARA_PULANG']=='5'){?>
                        <a  href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_jalan/cetak_prb/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">PRB/Prolanis</a>
                        <?php }else{ ?>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_CARA_PULANG']=='6'){?>
                        <a  href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_jalan/cetak_rujukan/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">Rujukan Internal</a>
                        <?php }else{ ?>
                        <?php }?>
                        <?php if ($_smarty_tpl->getVariable('cek_lab')->value!=''){?>
                        <a  href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_jalan/cetak_rujukan_lab/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">Lab</a>
                        <?php }else{ ?>
                        <?php }?>
                        <?php if ($_smarty_tpl->getVariable('cek_rad')->value!=''){?>
                        <a  href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_jalan/cetak_rujukan_rad/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">Radiologi</a>
                        <?php }else{ ?>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_TERAPI']==''||$_smarty_tpl->tpl_vars['data']->value['FS_TERAPI']=='<p>-</p>'){?>
                        <?php }else{ ?>
                        <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('medis/rawat_jalan/cetak_resep/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">Resep</a>
                        <?php }?>
 

  <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_STATUS']=='2'){?> 

                            <?php if ($_smarty_tpl->tpl_vars['data']->value['KODEREKANAN']=='032'){?>
                            
                            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_jalan/lembar_verif/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->getVariable('search')->value['FS_NO_MR']));?>
" class="button-download"> Verif</a>    
    
                            <?php }?>
                        <?php }?>
                        
                    </td>
                </tr>
                <?php }} ?>
            </tbody>
        </table>
    </div>
