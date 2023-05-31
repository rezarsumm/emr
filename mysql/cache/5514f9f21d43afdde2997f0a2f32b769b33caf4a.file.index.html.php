<?php /* Smarty version Smarty-3.0.7, created on 2021-03-15 15:24:03
         compiled from "application/views\medis/rawat_jalan/index.html" */ ?>
<?php /*%%SmartyHeaderCode:23262604f19a3dfde67-24978233%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5514f9f21d43afdde2997f0a2f32b769b33caf4a' => 
    array (
      0 => 'application/views\\medis/rawat_jalan/index.html',
      1 => 1608812808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23262604f19a3dfde67-24978233',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("medis/rawat_jalan/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
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
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/proses_cari');?>
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
<!-- end of notification template
<table class="table-info" width="100%">
    <tr class="headrow">
        <th colspan="4">Data Harian</th>
    </tr>
    <tr>
        <td width='15%'>Jumlah Pasien</td>
        <td width='35%'><?php echo $_smarty_tpl->getVariable('rs_jmlpx')->value['TOTAL'];?>
 Pasien</td>
        <td width='15%'></td>
        <td width='35%'></td>
    </tr>
    <tr>
        <td>Jumlah Pasien BPJS</td>
        <td><?php echo (($tmp = @$_smarty_tpl->getVariable('rs_jmlpx_bpjs')->value['TOTAL'])===null||$tmp==='' ? '' : $tmp);?>
 Pasien</td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Jumlah Pasien Umum</td>
        <td><?php echo $_smarty_tpl->getVariable('rs_jmlpx_umum')->value['TOTAL'];?>
 Pasien</td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Jumlah Pasien Relasi</td>
        <td><?php echo $_smarty_tpl->getVariable('rs_jmlpx')->value['TOTAL']-($_smarty_tpl->getVariable('rs_jmlpx_bpjs')->value['TOTAL']+$_smarty_tpl->getVariable('rs_jmlpx_umum')->value['TOTAL']);?>
 Pasien</td>
        <td></td>
        <td></td>
    </tr>
</table>-->
<div class="dashboard-container">
    <table class="table-view" width="100%" border="0">
        <thead>
            <tr>
                <td colspan="6">
                    <b><span style="color:red;">*</span> Pasien dengan umur lebih dari 70 tahun</b> <br>
                    <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/icon.star.png" alt="" width="15" /><b>Pasien Poli Eksekutif</b>
                </td>
            </tr>
            <tr>
                <th width='4%'>Nomor</th>
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
            <!--<?php $_smarty_tpl->tpl_vars['cek_resep'] = new Smarty_variable($_smarty_tpl->getVariable('m_rawat_jalan')->value->get_data_cek_resep_kp(array($_smarty_tpl->tpl_vars['data']->value['FS_KD_KP'])), null, null);?>-->
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FN_NO_URUT'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_MR'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_NM_PASIEN'];?>

                    <?php if ($_smarty_tpl->tpl_vars['data']->value['fn_umur']>='70'){?>
                    <b style="color:red;">*</b>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_KD_LAYANAN']=='P064'){?>
                    <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/icon.star.png" alt="" width="15" />
                    <?php }else{ ?>
                    <?php }?>
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
                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('medis/rawat_jalan/history/').($_smarty_tpl->tpl_vars['data']->value['FS_MR']))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Entry</a>
                    <?php if ($_smarty_tpl->getVariable('cek_resep')->value>='1'){?>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('rm/rawat_inap/cetak_resep/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_KP']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">Resep</a>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_TERAPI']==''||$_smarty_tpl->tpl_vars['data']->value['FS_TERAPI']=='<p>-</p>'){?>
                    <?php }else{ ?>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_jalan/cetak_resep/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">Resep</a>
                    <?php }?>
                </td>
            </tr>
            <?php }} ?>
        </tbody>
    </table>
</div>
