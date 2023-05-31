<?php /* Smarty version Smarty-3.0.7, created on 2022-06-17 09:11:39
         compiled from "application/views\rm/upload/index.html" */ ?>
<?php /*%%SmartyHeaderCode:2972162abe2dbe1c4f5-07819765%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad2e7b8293f61157743feda205404d35bdf4e0c2' => 
    array (
      0 => 'application/views\\rm/upload/index.html',
      1 => 1655431897,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2972162abe2dbe1c4f5-07819765',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("nurse/rawat_jalan/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<div class="breadcrum">
    <p>
        <a href="#">Medical Record</a><span></span>
        <small>Berkas</small>
    </p>
    <div class="clear"></div>
</div>
<div class="search-box">
    <h3><a href="#">Search</a></h3>
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('rm/upload/proses_cari');?>
" method="post">
        <table class="table-search" width="100%">
            <tr>
                <th width="10%" aligh="left">No Rekam Medis</th>
                <td width="90%">
                    <input name="FS_MR" value="<?php echo $_smarty_tpl->getVariable('search')->value['FS_MR'];?>
" size="25" style="text-align: center;" maxlength="15"/>
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
                <th width='10%'>Tanggal Kunjungan</th>
                <th>Kode Reg</th>
                <th>Nama Pasien</th>
                <th>Dokter</th>
                <th>Layanan</th>
                <th>Status</th>
                <th width='10%'>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
            <tr>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['TANGGAL'],"%d %B %Y");?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['NO_REG'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMA_PASIEN'];?>
</td> 
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMA_DOKTER'];?>
</td> 
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMA_RUANG'];?>
<?php echo $_smarty_tpl->tpl_vars['data']->value['SPESIALIS'];?>
</td> 
                <td>
       <center>
            <b>
               <?php if ($_smarty_tpl->tpl_vars['data']->value['MEDIS']=='RAWAT JALAN'){?>
                <div style="color: blue;">Rawat Jalan</div>
                <?php }else{ ?>
                <div style="color: green;">Rawat Inap</div>
                <?php }?>
            </b>
        </center>
        </td> 
        <td>
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/upload/add/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->getVariable('search')->value['FS_KD_PEG']));?>
" class="button-edit">Upload</a> 
        </td>
        </tr>
        <?php }} ?>
        </tbody>
    </table>
</div>
