<?php /* Smarty version Smarty-3.0.7, created on 2022-05-17 08:44:49
         compiled from "application/views\op/jadwal/bhp.html" */ ?>
<?php /*%%SmartyHeaderCode:285236282fe1112cc87-53890061%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '979ee68a78194a381c72a6f72a87ff65c3b6f2a8' => 
    array (
      0 => 'application/views\\op/jadwal/bhp.html',
      1 => 1652629293,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '285236282fe1112cc87-53890061',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<div class="breadcrum">
    List Data BHP OK
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
                <th>Nama Operasi</th>
                <th>Tanggal Operasi</th>
                <th>Dokter</th>
                <th width='7%'>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('listbhp')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
            <td><?php echo $_smarty_tpl->tpl_vars['data']->value['nmtindakan'];?>
</td> 
            <td><?php echo $_smarty_tpl->tpl_vars['data']->value['TGL_OP'];?>
</td> 
            <td><?php echo $_smarty_tpl->tpl_vars['data']->value['Nama_Dokter'];?>
</td> 
            <td>
                <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('rm/rawat_inap/cetak_alat_habis_pakai2/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['idoperasi']))===null||$tmp==='' ? '' : $tmp));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"> Cetak </a>
         </td>
        </tr>
    <?php }} ?>
    </tbody>
    </table>
    