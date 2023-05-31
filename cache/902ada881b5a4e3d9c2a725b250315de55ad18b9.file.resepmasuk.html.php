<?php /* Smarty version Smarty-3.0.7, created on 2022-02-17 15:50:02
         compiled from "application/views\medis/rawat_jalan/resepmasuk.html" */ ?>
<?php /*%%SmartyHeaderCode:23206620e0c3ad5c247-71212698%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '902ada881b5a4e3d9c2a725b250315de55ad18b9' => 
    array (
      0 => 'application/views\\medis/rawat_jalan/resepmasuk.html',
      1 => 1645085980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23206620e0c3ad5c247-71212698',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<div class="breadcrum">
List Data Resep Masuk
    <div class="clear"></div>
</div>

<div class="navigation">
    <div class="pageRow">
        <div class="pageNav">
            <ul>
                <li class="info"></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
    <div class="navigation-button">
     <!--    <ul>
            <li><a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('rm/rawat_jalan/resume/').($_smarty_tpl->getVariable('result')->value['NO_MR']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/printer-icon.png" alt="" /> Resume Rawat Jalan</a></li>
        </ul> -->
    </div>
    <div class="clear"></div>
</div>
<table class="table-view" width="100%" border="0">
    <thead>
        <tr>
            <th width='10%'>Kode Register</th>
            <th>NO MR</th>
            <th>Nama Pasien</th>
            <th>Alamat</th>
            <th>Dokter</th>
            <th width='24%'>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('listresep')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'];?>
</td> 
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['No_MR'];?>
</td> 
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['Nama_Pasien'];?>
</td> 
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['Alamat'];?>
</td> 
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['Nama_Dokter'];?>
</td> 
        <td> <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('medis/rawat_jalan/cetak_resep/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">Cetak Resep</a></td>
    </tr>
<?php }} ?>
</tbody>
</table>
