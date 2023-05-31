<?php /* Smarty version Smarty-3.0.7, created on 2021-03-15 15:31:39
         compiled from "application/views\rm/upload/index.html" */ ?>
<?php /*%%SmartyHeaderCode:28880604f1b6b989877-04801871%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad2e7b8293f61157743feda205404d35bdf4e0c2' => 
    array (
      0 => 'application/views\\rm/upload/index.html',
      1 => 1608812834,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28880604f1b6b989877-04801871',
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
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['FD_TGL_MASUK'],"%d %B %Y");?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_NM_PASIEN'];?>
</td> 
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_NM_PEG'];?>
</td> 
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_NM_LAYANAN'];?>
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
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/upload/add/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])).('/')).($_smarty_tpl->getVariable('search')->value['FS_KD_PEG']));?>
" class="button-edit">Upload</a>
        </td>
        </tr>
        <?php }} ?>
        </tbody>
    </table>
</div>
