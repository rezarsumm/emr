<?php /* Smarty version Smarty-3.0.7, created on 2021-09-21 08:14:38
         compiled from "application/views\farmasi/rawat_jalan/index.html" */ ?>
<?php /*%%SmartyHeaderCode:1297960ab43d8af88a8-32489420%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c859f404de6db23aab8e633ea061f5894e954ee' => 
    array (
      0 => 'application/views\\farmasi/rawat_jalan/index.html',
      1 => 1621836760,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1297960ab43d8af88a8-32489420',
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
        <small>Rawat Jalan</small>
    </p>
    <div class="clear"></div>
</div>
<div class="head-content">
    <div class="head-content-nav">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('farmasi/rawat_jalan/');?>
" class="active">Data Realtime</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('farmasi/rawat_jalan/proses_cari2');?>
">Data Manual</a></li>
        </ul>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<div class="search-box">
    <h3><a href="#">Search</a></h3>
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('farmasi/rawat_jalan/proses_cari');?>
" method="post">
        <table class="table-search" width="100%">
            <tr>
                <th width="10%" aligh="left">No Register</th>
                <td width="90%">
                     <select name="FS_KD_REG" id="surat_dari" class="select2" style="width: 350px;">
                                <option value="">--Pilih Data--</option>
                                <?php  $_smarty_tpl->tpl_vars['result'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien2')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['result']->key => $_smarty_tpl->tpl_vars['result']->value){
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['result']->value['NO_REG'];?>
" <?php if ($_smarty_tpl->tpl_vars['result']->value['NOREG']==$_smarty_tpl->getVariable('search')->value['FS_KD_REG']){?>selected=""<?php }?>><?php echo $_smarty_tpl->tpl_vars['result']->value['NO_MR'];?>
 | <?php echo $_smarty_tpl->tpl_vars['result']->value['NAMA_PASIEN'];?>
</option>
                                <?php }} ?>
                            </select>
                    <!--<input name="FS_KD_REG" value="<?php echo $_smarty_tpl->getVariable('search')->value['FS_KD_REG'];?>
" size="15" style="text-align: center;"/>-->
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
                <th>Nomor Antrian</th>
                <th>Kode Reg</th>
                <th>No MR</th>
                <th>Nama Psien</th>
                <th>Alamat</th>
                <th>Dokter</th>
                <th>Status</th>
                <th width='18%'>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['NOURUTDR'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['NO_REG'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['NO_MR'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMA_PASIEN'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['ALAMAT'];?>
</td> 
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMA_DOKTER'];?>
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
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_TERAPI']==''||$_smarty_tpl->tpl_vars['data']->value['FS_TERAPI']=='<p>-</p>'){?>
                    <?php }else{ ?>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('medis/rawat_jalan/cetak_resep/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">Cetak Resep</a>
                    <?php }?>
<!--                      <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('medis/rawat_jalan/cetak_resep/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">Cetak Resep</a> -->
                </td>
            </tr>
            <?php }} ?>
        </tbody>
    </table>
</div>

