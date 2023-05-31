<?php /* Smarty version Smarty-3.0.7, created on 2022-02-04 11:44:39
         compiled from "application/views\medis/asesmenawal/index.html" */ ?>
<?php /*%%SmartyHeaderCode:1142961fcaf37422c02-26484914%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98ceaa6193f690ccdd1e504b449ece19a3c5e47b' => 
    array (
      0 => 'application/views\\medis/asesmenawal/index.html',
      1 => 1643949875,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1142961fcaf37422c02-26484914',
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
                <th width='2%'>No</th>
                <th>No MR</th>
                <th>Nama Psien</th>
                <th >Alamat</th>
                <th>Dokter</th>
                <!-- <th>Status</th> -->
                <th width='22%'>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['NOMOR'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['NO_MR'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMA_PASIEN'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['ALAMAT'];?>
</td> 
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMA_DOKTER'];?>
</td> 
                <!-- <td>
                    
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_STATUS']==''){?>
                    <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/icon.waiting.png" alt="" />
                  Perawat
                    <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_STATUS']=='1'){?>
                    <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/icon.waiting.dokter.png" alt="" />
                   Dokter
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
                </td>  -->
                <td>
                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('medis/asesmenawal/create/').($_smarty_tpl->tpl_vars['data']->value['NO_REG']))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Entry</a>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_TERAPI']==''||$_smarty_tpl->tpl_vars['data']->value['FS_TERAPI']=='<p>-</p>'){?>
                   <?php }else{ ?>
                    <!-- <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('medis/rawat_jalan/cetak_resep/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">Cetak Resep</a> -->
                <?php }?>
                </td>
            </tr>
            <?php }} ?>
        </tbody>
    </table>

    
<br><br>
List Pasien Konsul
    <table class="table-view" width="100%" border="0">
        <thead>
            <tr>
                <!-- <th width='2%'>No</th> -->
                <th>No MR</th>
                <th>Nama Psien</th>
                <th>Alamat</th>
                <th>Dokter Pengirim</th>
                <th width='18%'>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['kata'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('pasien_konsul')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['kata']->key => $_smarty_tpl->tpl_vars['kata']->value){
?>
            <tr>
                <!-- <td><?php echo $_smarty_tpl->getVariable('data')->value['NOMOR'];?>
</td> -->
                <td><?php echo $_smarty_tpl->tpl_vars['kata']->value['NO_MR'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['kata']->value['NAMA_PASIEN'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['kata']->value['ALAMAT'];?>
</td> 
                <td><?php echo $_smarty_tpl->tpl_vars['kata']->value['NAMA_DOKTER'];?>
</td> 
                <!-- <td>
                    
                    <?php if ($_smarty_tpl->getVariable('data')->value['FS_STATUS']==''){?>
                    <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/icon.waiting.png" alt="" />
                  Perawat
                    <?php }elseif($_smarty_tpl->getVariable('data')->value['FS_STATUS']=='1'){?>
                    <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/icon.waiting.dokter.png" alt="" />
                   Dokter
                    <?php }elseif($_smarty_tpl->getVariable('data')->value['FS_STATUS']=='2'){?>
                     <?php if ($_smarty_tpl->getVariable('data')->value['FS_TERAPI']==''||$_smarty_tpl->getVariable('data')->value['FS_TERAPI']=='<p>-</p>'){?>
                     <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/icon.approve.png" alt="" />
                     Selesai
                     <?php }else{ ?>
                    <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/icon.waiting.farmasi.png" alt="" />
                    Farmasi
                    <?php }?>
                     
                    <?php }?>
                </td>  -->
                <td>
                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('medis/rawat_jalan/history/').($_smarty_tpl->tpl_vars['kata']->value['NO_MR'])).('/x'));?>
" class="button-edit">Entry</a>
                 
                    <?php if ($_smarty_tpl->tpl_vars['kata']->value['FS_TERAPI']==''||$_smarty_tpl->tpl_vars['kata']->value['FS_TERAPI']=='<p>-</p>'){?>
                    <?php }else{ ?>
                     <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('medis/rawat_jalan/cetak_resep/').($_smarty_tpl->tpl_vars['kata']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['kata']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">Cetak Resep</a>
                 <?php }?>
                    
                </td>
            </tr>
            <?php }} ?>
        </tbody>
    </table>
<br>
<br>
</div>
