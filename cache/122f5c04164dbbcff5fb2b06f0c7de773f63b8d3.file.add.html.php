<?php /* Smarty version Smarty-3.0.7, created on 2021-09-21 13:54:14
         compiled from "application/views\rm/upload/add.html" */ ?>
<?php /*%%SmartyHeaderCode:1783960a48847bb4a39-54016443%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '122f5c04164dbbcff5fb2b06f0c7de773f63b8d3' => 
    array (
      0 => 'application/views\\rm/upload/add.html',
      1 => 1616214944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1783960a48847bb4a39-54016443',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><div class="breadcrum">
    <p>
        <a href="#">Medical Record</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('rm/upload');?>
">Upload Berkas</a><span></span>
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="navigation">
    <div class="navigation-button">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('rm/upload');?>
"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/back-icon.png" alt="" />  Back</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<!-- notification template -->
<?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of notification template-->
<form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('rm/upload/add_process');?>
" method="post" enctype="multipart/form-data">
    <input type="hidden" name="FS_KD_REG" value="<?php echo $_smarty_tpl->getVariable('FS_KD_REG')->value;?>
"/>
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Add Data</th>
        </tr>
        <tr>
            <td width="15%">Upload File</td>
            <td width="35%">
                <?php if ($_smarty_tpl->getVariable('result')->value['att_name']!=null){?>
                <label><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('rm/upload/download/').($_smarty_tpl->getVariable('result')->value['att_name']))===null||$tmp==='' ? '' : $tmp));?>
">
                        <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/pdf.png" alt="" height="15"/>
                        <b><?php echo $_smarty_tpl->getVariable('result')->value['att_name'];?>
 (<?php echo $_smarty_tpl->getVariable('result')->value['att_size'];?>
K)</b></a>
                </label>
                <br />
                <?php }?>
                <br />
                <input type="file" name="att_name" id="upload_file1" readonly="true"/>
                <em>* pdf only</em>
            </td>
            <td width="15%">Jenis Berkas</td>
            <td width="35%">
                <select name="FS_JENIS_BERKAS">
                    <option value="0">--Pilih Data--</option>
                    <option value="1">Form Scan</option>
                    
                </select> 
                <em>* wajib diisi</em>
            </td>
        </tr>
        <tr class="submit-box">
            <td colspan="4">
                <input type="submit" name="save" value="Simpan" class="edit-button" tabindex="11"/>
                <input type="reset" name="save" value="Reset" class="edit-button" tabindex="12"/>
            </td>
        </tr>
    </table>
</form>
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
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/upload/delete_process/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG']));?>
" onclick="return confirm('Tenan Meh Mbok Hapus???');" class="button-hapus">Hapus</a>
        </center>     
        </td>
        </tr>
        <?php }} ?>
        </tbody>
    </table>
</div>