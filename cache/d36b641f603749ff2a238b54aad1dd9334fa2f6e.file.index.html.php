<?php /* Smarty version Smarty-3.0.7, created on 2022-03-07 13:00:40
         compiled from "application/views\medis/skh/index.html" */ ?>
<?php /*%%SmartyHeaderCode:1233162259f88d8bcc2-86142513%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd36b641f603749ff2a238b54aad1dd9334fa2f6e' => 
    array (
      0 => 'application/views\\medis/skh/index.html',
      1 => 1646632832,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1233162259f88d8bcc2-86142513',
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
            <?php $_smarty_tpl->tpl_vars['ceksuratsakit'] = new Smarty_variable($_smarty_tpl->getVariable('m_rawat_jalan')->value->cek_hpl(array($_smarty_tpl->tpl_vars['data']->value['NO_REG'])), null, null);?>
          
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
                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('medis/skh/create/').($_smarty_tpl->tpl_vars['data']->value['NO_REG']))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Surat Ket Hamil</a>
                    <?php if ($_smarty_tpl->getVariable('ceksuratsakit')->value>='1'){?>
                    - <a href="javascript:void(0);" class="button-download" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((((('medis/skh/cetak/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_FORM']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" >Cetak Surat </a>
                    <?php }?>
                  
                
                </td>
            </tr>
            <?php }} ?>
        </tbody>
    </table> 
</div>
 