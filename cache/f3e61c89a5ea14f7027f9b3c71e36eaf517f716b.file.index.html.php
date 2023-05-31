<?php /* Smarty version Smarty-3.0.7, created on 2022-09-07 11:46:08
         compiled from "application/views\inap/aplusan/index.html" */ ?>
<?php /*%%SmartyHeaderCode:26824631822106c02c0-13304826%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3e61c89a5ea14f7027f9b3c71e36eaf517f716b' => 
    array (
      0 => 'application/views\\inap/aplusan/index.html',
      1 => 1662525966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26824631822106c02c0-13304826',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("inap/aplusan/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<div class="breadcrum">
    <p>
        <a href="#">Report</a>
        <small>Aplusan</small>
    </p>
    <div class="clear"></div>
</div>
<div class="search-box">
    <h3><a href="#">Search</a></h3>
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/aplusan/proses_cari');?>
" method="post">
        <table class="table-search" width="100%" >
            <tr>
                <td>
                    Layanan :
                    <select name="layanan">
                        <option value="">--</option>
                        <?php  $_smarty_tpl->tpl_vars['layanan'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_layanan')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['layanan']->key => $_smarty_tpl->tpl_vars['layanan']->value){
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['layanan']->value['KODE_BANGSAL'];?>
" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['layanan']->value['KODE_BANGSAL'];?>
<?php $_tmp1=ob_get_clean();?><?php if ((($tmp = @$_smarty_tpl->getVariable('search')->value['layanan'])===null||$tmp==='' ? '' : $tmp)==$_tmp1){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['layanan']->value['NAMA_BANGSAL'];?>
</option>
                        <?php }} ?>
                    </select>
                </td>
                <td>
                    Periode :
                    <input name="tanggal" type="text" size="10" maxlength="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('search')->value['tanggal'])===null||$tmp==='' ? '' : $tmp);?>
" class="tanggal" readonly="readonly" style="text-align: center;" />

                </td>
                <td>
                    <input class="button" type="submit" value="SEARCH" name="save" />
                    <input class="button" type="submit" value="RESET" name="save" />
                </td>
            </tr>
        </table>
    </form>
</div>
<div class="dashboard-container">
    <table class="table-view" width="100%">
        <tr>
            <th width="4%">No</th>
            <th>Tanggal</th>
            <th>Shift</th>
            <th>Nama/No RM/Km/Bed</th>
            <th>Kondisi pasien</th>
            <th>Catatan lainnya</th>
            <th>PPJP</th>
            <th>AKSI</th>
        </tr>
        <?php  $_smarty_tpl->tpl_vars['result'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_id')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['result']->key => $_smarty_tpl->tpl_vars['result']->value){
?>
        <tr <?php if (($_smarty_tpl->getVariable('no')->value%2)!=1){?>class="blink-row"<?php }?>>
            <td align="center"><?php echo $_smarty_tpl->getVariable('no')->value++;?>
.</td>
            <td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['result']->value['mdd'],"%d %b %Y");?>
</td>
            <td align="center">
                <?php if ($_smarty_tpl->tpl_vars['result']->value['FS_SHIFT']==1){?>
                PAGI
                <?php }elseif($_smarty_tpl->tpl_vars['result']->value['FS_SHIFT']==2){?>
                SORE
                <?php }elseif($_smarty_tpl->tpl_vars['result']->value['FS_SHIFT']==3){?>
                MALAM
                <?php }else{ ?>
                <?php echo $_smarty_tpl->tpl_vars['result']->value['FS_SHIFT'];?>

                <?php }?>
            </td>
            <td><?php echo $_smarty_tpl->tpl_vars['result']->value['NAMA_PASIEN'];?>
/<?php echo $_smarty_tpl->tpl_vars['result']->value['NO_MR'];?>
/<?php echo $_smarty_tpl->tpl_vars['result']->value['NAMA_RUANG'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['result']->value['FS_KONDISI_PASIEN'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['result']->value['FS_CATATAN'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['result']->value['NAMALENGKAP'];?>
</td>
            <td align="center">
                <?php if ($_smarty_tpl->getVariable('com_user')->value['user_name']==$_smarty_tpl->tpl_vars['result']->value['mdb']){?>
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('inap/aplusan/edit/').($_smarty_tpl->tpl_vars['result']->value['FS_KD_APULSAN'])).('/')).($_smarty_tpl->tpl_vars['result']->value['NO_REG']));?>
" class="button-edit">Edit</a>
                <?php }else{ ?>
                   <?php if ($_smarty_tpl->tpl_vars['result']->value['penerima']!=''){?>
                   diterima oleh <?php echo $_smarty_tpl->tpl_vars['result']->value['penerima'];?>
 (<?php echo $_smarty_tpl->tpl_vars['result']->value['tgl_terima'];?>
)
                   <?php }else{ ?>
                          <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('inap/aplusan/terima/').($_smarty_tpl->tpl_vars['result']->value['FS_KD_APULSAN'])).('/')).($_smarty_tpl->tpl_vars['result']->value['NO_REG']));?>
" class="button-edit">Terima</a>
                
                     <?php }?>
                <?php }?>
            </td>

        </tr>
        <?php }} else { ?>
        <tr>
            <td colspan="5">Data not found!</td>
        </tr>
        <?php } ?>
    </table>
</div>