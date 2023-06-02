<?php /* Smarty version Smarty-3.0.7, created on 2023-06-02 10:30:01
         compiled from "application/views\dashboard/welcome/index.html" */ ?>
<?php /*%%SmartyHeaderCode:1979464796239629c54-77538501%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1acb92841b2776ed54df63255e6cf7e24a0c381c' => 
    array (
      0 => 'application/views\\dashboard/welcome/index.html',
      1 => 1641544309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1979464796239629c54-77538501',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr_dev\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><div class="dashboard-home">
    <!--<div class="dashboard-home-content">
        <div class="left">
            <h3>Surat Tanda Registrasi</h3>
            <div class="dashboard-home-box">
                <div class="scroll">
                    <table width="97%">
                        <tr class="head-dashboard">
                            <td>NO</td>
                            <td>NAMA</td>
                            <td>TANGGAL BERAKHIR</td>
                        </tr>
                        <?php  $_smarty_tpl->tpl_vars['str'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_str')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['str']->key => $_smarty_tpl->tpl_vars['str']->value){
?>
                        <tr>
                            <td><center><?php echo $_smarty_tpl->getVariable('no')->value++;?>
</center></td>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['str']->value['FS_NM_PEG'];?>

                        </td>
                        <td>
                        <center><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['str']->value['FD_TGL_EXP_REGISTER'],"%d-%m-%Y");?>
</center>
                        </td>
                        </tr>
                        <?php }} ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="dashboard-home-box">
                <h3>Surat Ijin Praktek</h3>
                <div class="scroll">
                    <table width="97%">
                        <tr class="head-dashboard">
                            <td>NO</td>
                            <td>NAMA</td>
                            <td>TANGGAL BERAKHIR</td>
                        </tr>
                        <?php  $_smarty_tpl->tpl_vars['sip'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_sip')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['sip']->key => $_smarty_tpl->tpl_vars['sip']->value){
?>
                        <tr>
                            <td><center><?php echo $_smarty_tpl->getVariable('no2')->value++;?>
</center></td>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['sip']->value['FS_NM_PEG'];?>

                        </td>
                        <td>
                        <center><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['sip']->value['FD_TGL_AKHIR_IJIN_PRAKTEK'],"%d-%m-%Y");?>
</center>
                        </td>
                        </tr>
                        <?php }} ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-home-content">
        <div class="left">
            <h3>Surat Ijin Kerja</h3>
            <div class="dashboard-home-box">
                <div class="scroll">
                    <table width="97%">
                        <tr class="head-dashboard">
                            <td>NO</td>
                            <td>NAMA</td>
                            <td>TANGGAL BERAKHIR</td>
                        </tr>
                        <?php  $_smarty_tpl->tpl_vars['sik'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_sik')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['sik']->key => $_smarty_tpl->tpl_vars['sik']->value){
?>
                        <tr>
                            <td><center><?php echo $_smarty_tpl->getVariable('no3')->value++;?>
</center></td>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['sik']->value['FS_NM_PEG'];?>

                        </td>
                        <td>
                        <center><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['sik']->value['FD_TGL_AKHIR_IJIN_KERJA'],"%d-%m-%Y");?>
</center>
                        </td>
                        </tr>
                        <?php }} ?>
                    </table>
                </div>
            </div>
        </div>
    </div>-->
</div>