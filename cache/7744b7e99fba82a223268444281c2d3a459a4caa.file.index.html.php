<?php /* Smarty version Smarty-3.0.7, created on 2022-07-25 10:29:13
         compiled from "application/views\inap/rencana_op/index.html" */ ?>
<?php /*%%SmartyHeaderCode:2840762de0e09d85656-16986053%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7744b7e99fba82a223268444281c2d3a459a4caa' => 
    array (
      0 => 'application/views\\inap/rencana_op/index.html',
      1 => 1657951832,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2840762de0e09d85656-16986053',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
 
    <br>
    <p style="font-size: 19px;">  Data Pasien Rencana Operasi   </p>
    <br>
 

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>

  
<a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/rencana_op/add');?>
">
                <button class="btn btn-success btn-xs fa fa-pencil"> Tambah Data </button></a></li>
  <br>
  <br>
 
<?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<div class="dashboard-container">
    <table class="table-view" width="100%" border="0">
        <thead>
            <tr>
                <th width='2%'>No</th>
                <th>No MR</th>
                <th>Nama Pasien</th>
                <th>Alamat</th> 
                <th>Tindakan</th> 
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
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['Nama_Dokter'];?>
</td>  
                <td <?php if ($_smarty_tpl->tpl_vars['data']->value['STATUS_OP']=='Belum'){?> style="color: blue;" <?php }else{ ?> style="color: green;" <?php }?>>  <?php echo $_smarty_tpl->tpl_vars['data']->value['STATUS_OP'];?>
</td>  
                <td>
                    
                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/rencana_op/edit/').($_smarty_tpl->tpl_vars['data']->value['id']));?>
" class="button-edit">Edit</a>
                     
                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('inap/rencana_op/entry/').($_smarty_tpl->tpl_vars['data']->value['No_Reg'])).('/')).($_smarty_tpl->tpl_vars['data']->value['id']))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Entry</a>
                     
                    
                    <?php if ($_smarty_tpl->getVariable('cek_umum_pra')->value!=0){?>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('rm/rawat_inap/cetak_data_umum_pra2/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"> Cetak </a>
                    <?php }?>

                </td>
            </tr>
            <?php }} ?>
        </tbody>
    </table>
 </div>