<?php /* Smarty version Smarty-3.0.7, created on 2021-11-29 08:42:09
         compiled from "application/views\rm/berkas/file.html" */ ?>
<?php /*%%SmartyHeaderCode:2172461a42ff1d50e64-60377677%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29f956f02024e3b9adaa8a82ace2e0364beb9975' => 
    array (
      0 => 'application/views\\rm/berkas/file.html',
      1 => 1638150126,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2172461a42ff1d50e64-60377677',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><div class="breadcrum">
    <p>
     <!--    <a href="#">Medical Record</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('rm/upload');?>
">Upload Berkas</a><span></span> -->
      <!--   <small>Add Data</small> -->
    </p>
    <div class="clear"></div>
</div>
<div class="navigation">
    <div class="navigation-button">
        <ul>
         <!--    <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('rm/upload');?>
"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/back-icon.png" alt="" />  Back</a></li> -->
        </ul> 
    </div>
    <div class="clear"></div>
</div>
<!-- notification template -->
<?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of notification template-->

<div class="dashboard-container">
    <table class="table-view" width="100%" border="0">
        <thead>
            <tr>
                <th width='10%'>Tanggal Upload</th>
                <th>Kode Reg</th>
                <th>Jenis Berkas</th>
                <th>Nama Berkas</th>
                <th width='10%'>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_berkas')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
            <tr>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['mdd'],"%d %B %Y");?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'];?>
</td>
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_JENIS_BERKAS']=='1'){?>
                    Form Scan
                    <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_JENIS_BERKAS']=='2'){?>
                    Rujukan
                    <?php }?>
                </td> 
                <td align='center'>
                    <a class="button-approve" href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('rm/upload/download/').($_smarty_tpl->tpl_vars['data']->value['att_name']))===null||$tmp==='' ? '' : $tmp));?>
">
                        <b><?php echo $_smarty_tpl->tpl_vars['data']->value['att_name'];?>
</b>
                    </a>
                </td>
                <td>
        <center>
           
        </center>     
        </td>
        </tr>
        <?php }} ?>
        </tbody>
    </table>
</div>