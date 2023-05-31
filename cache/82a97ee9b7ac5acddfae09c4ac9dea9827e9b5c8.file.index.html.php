<?php /* Smarty version Smarty-3.0.7, created on 2022-02-04 09:52:48
         compiled from "application/views\medis/surat_sakit/index.html" */ ?>
<?php /*%%SmartyHeaderCode:1306761fc95001e4933-89976934%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '82a97ee9b7ac5acddfae09c4ac9dea9827e9b5c8' => 
    array (
      0 => 'application/views\\medis/surat_sakit/index.html',
      1 => 1643940465,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1306761fc95001e4933-89976934',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("medis/rawat_jalan/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<div class="breadcrum">
    <p>
        <a href="#">Pemeriksaan Medis</a><span></span>
        <small>Rawat Jalan</small>
    </p>
    <div class="clear"></div>
</div> 
<div class="dashboard-container">
    <table class="table-view"  width="100%" border="0">
        <thead>
            <tr>
                <th width='2%'>No</th>
                <th width='5%'>No MR</th>
                <th width='25%'>Nama Psien</th>
                <th width='30%'>Alamat</th>
                 <th width='38%'>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
            <?php $_smarty_tpl->tpl_vars['ceksuratsakit'] = new Smarty_variable($_smarty_tpl->getVariable('m_rawat_jalan')->value->cek_surat_sakit(array($_smarty_tpl->tpl_vars['data']->value['NO_REG'])), null, null);?>
            <?php $_smarty_tpl->tpl_vars['cekskd'] = new Smarty_variable($_smarty_tpl->getVariable('m_rawat_jalan')->value->cek_skd(array($_smarty_tpl->tpl_vars['data']->value['NO_REG'])), null, null);?>

            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['NOMOR'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['NO_MR'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMA_PASIEN'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['ALAMAT'];?>
</td> 
                 <td>
                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('medis/surat_sakit/create_suratsakit/').($_smarty_tpl->tpl_vars['data']->value['NO_REG']))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Surat Sakit</a>
                    <?php if ($_smarty_tpl->getVariable('ceksuratsakit')->value>='1'){?>
                    - <a href="javascript:void(0);" class="button-download" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((((('medis/surat_sakit/cetak_suratsakit/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_FORM']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" >Cetak Surat Sakit</a>
                    <?php }?>
                  
                
                </td>
            </tr>
            <?php }} ?>
        </tbody>
    </table> 
</div>
 