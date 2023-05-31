<?php /* Smarty version Smarty-3.0.7, created on 2022-12-01 12:05:31
         compiled from "application/views\igd/triase/index.html" */ ?>
<?php /*%%SmartyHeaderCode:111826388361b5bd099-17000854%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65cfcded9f4af7556ad2a62d30a8e1e9c6893683' => 
    array (
      0 => 'application/views\\igd/triase/index.html',
      1 => 1657249219,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '111826388361b5bd099-17000854',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="breadcrum">
    <p>
        <a href="#">  IGD  </a><span></span>
        <small>  Triase </small>
    </p>
    <div class="clear"></div>
</div> 
<?php if ($_smarty_tpl->getVariable('rolenya')->value=='IGD'){?> 
<div class="navigation">
    <div class="navigation-button">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('igd/triase/add');?>
"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/add-icon.png" alt="" />  Tambah Data</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<?php }?>
 
<div class="dashboard-container">
    <table class="table-view" width="100%" border="0" style="font-size: 12px;">
        <thead>
            <tr>
                <th width='2%'>No</th>
                <th>No MR</th>
                <th>Nama Pasien</th>
                <th>Alamat</th> 
                <th>Petugas</th> 
                <th>Status</th>
                <th width='18%'>Detail</th>
            </tr>
        </thead>
        <tbody><?php $_smarty_tpl->tpl_vars['no'] = new Smarty_variable(1, null, null);?>
            <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_triase')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
            <tr>
                <td><?php echo $_smarty_tpl->getVariable('no')->value++;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['No_MR'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['Nama_Pasien'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['Alamat'];?>
</td>  
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['KD_PERAWAT'];?>
</td>  
                <td><?php if ($_smarty_tpl->tpl_vars['data']->value['No_MR']!=''){?> <p style="color:green"><b> Selesai</b> </p> <?php }else{ ?> <b>Belum </b><?php }?></td>  
                <td>
                     <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('igd/triase/edit/').($_smarty_tpl->tpl_vars['data']->value['id']));?>
" class="button-edit">Edit</a>
 
                               
                </td>
            </tr>
            <?php }} ?>
        </tbody>
    </table>
 </div>