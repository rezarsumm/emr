<?php /* Smarty version Smarty-3.0.7, created on 2023-06-06 09:45:26
         compiled from "application/views\op/jadwal/index.html" */ ?>
<?php /*%%SmartyHeaderCode:23112647e9dc6366b32-41987183%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2276673d155ba23a6536058c75123d2db10984b8' => 
    array (
      0 => 'application/views\\op/jadwal/index.html',
      1 => 1685954849,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23112647e9dc6366b32-41987183',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
 
    <br>
    <p style="font-size: 19px;">  Data Pasien Operasi </p>
    <br>
 

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>


<?php if ($_smarty_tpl->getVariable('rolenya')->value=='Perawat OK'){?>  
<a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/jadwal/add');?>
">
                <button class="btn btn-success btn-xs fa fa-pencil"> Tambah Data </button></a></li>
  <br>
  <br>
<?php }?>
 
<div class="dashboard-container">
    <table class="table-view" width="100%" border="0">
        <thead>
            <tr>
                <th width='2%'>No</th>
                <th>No MR</th>
                <th>Nama Pasien</th>
                <th>Alamat</th> 
                <th>Tindakan</th> 
                <th>Tanggal</th> 
                <th>Dokter</th> 
                <th>Status</th>
                <th width='18%'>Detail</th>
            </tr>
        </thead>
        <tbody><?php $_smarty_tpl->tpl_vars['no'] = new Smarty_variable(1, null, null);?>
            <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['nmtindakan'];?>
</td>  
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['tanggalop'];?>
</td>  
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['Nama_Dokter'];?>
</td>  
                <td <?php if ($_smarty_tpl->tpl_vars['data']->value['STATUS_OP']=='Belum'){?> style="color: blue;" <?php }else{ ?> style="color: green;" <?php }?>>  <?php echo $_smarty_tpl->tpl_vars['data']->value['STATUS_OP'];?>
</td>  
                <td>
                    <?php if ($_smarty_tpl->getVariable('rolenya')->value=='Perawat OK'){?> 
                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('op/jadwal/edit/').($_smarty_tpl->tpl_vars['data']->value['id']));?>
" class="button-edit">Edit</a>
                    <?php }?>
                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('op/jadwal/detail/').($_smarty_tpl->tpl_vars['data']->value['id'])).('/')).($_smarty_tpl->tpl_vars['data']->value['No_Reg']))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Entry</a>
                               
                </td>
            </tr>
            <?php }} ?>
        </tbody>
    </table>
 </div>