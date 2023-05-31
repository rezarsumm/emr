<?php /* Smarty version Smarty-3.0.7, created on 2022-10-12 08:38:43
         compiled from "application/views\rm/berkas/tindakan.html" */ ?>
<?php /*%%SmartyHeaderCode:407263461aa3533378-30939767%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd81f2100ff366efce9f861080a9506c318ec03e' => 
    array (
      0 => 'application/views\\rm/berkas/tindakan.html',
      1 => 1665538705,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '407263461aa3533378-30939767',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?> 
<div class="breadcrum">
    <p>
        <a href="#">Catatan Rawat Inap</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/kep/');?>
">Rencana Keperawatan</a><span></span>
       
    </p>
    <div class="clear"></div>
</div>
<div class="content-entry">
 
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/kep/add_tindakan_process');?>
" method="post">
        <input name="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />
        <table class="table-info" width="60%">
            <tr class="headrow">
                <th colspan="2">Add Rencana Keperawatan</th>
            </tr>
            <tr>
                <td>NAMA</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NAMA_PASIEN'];?>

                </td>
            </tr>
            <tr>
                <td>NO MR</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>

                </td>
            </tr>
            <tr>
                <td>TANGGAL LAHIR</td>
                <td>
                    <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('rs_pasien')->value['TGL_LAHIR'],"%d %b %Y");?>

                </td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['ALAMAT'];?>
</td>
            </tr>
            
        </table>
     
</form>
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
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'])).('/')).('8'));?>
" target="_blank"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/printer-icon.png" alt="" /> Print</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<table class="table-view" width="100%">
    <tr>
        <th width="5%">No</th>
        <th width="10%">Tanggal / Jam</th>
        <th>Tindakan</th>
        <th>Tindakan 2</th>
        <th width="10%">Waktu Tindakan</th>
        <th width="10%">Aksi</th>
    </tr>
    <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('result')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
    <?php $_smarty_tpl->tpl_vars['rs_rincian'] = new Smarty_variable($_smarty_tpl->getVariable('m_kep')->value->get_rincian_kep_by_id(array($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS'])), null, null);?>
    <tr <?php if (($_smarty_tpl->getVariable('no')->value%2)!=1){?>class="blink-row"<?php }?>>
        <td><?php echo $_smarty_tpl->getVariable('no')->value++;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['mdd'];?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['mdd_time'],'%H:%M');?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_TINDKAN_KEP'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_NM_KEP_TINDAKAN'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FD_TGL_TINDKAN_KEP'];?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['FD_JAM_TINDKAN_KEP'],'%H:%M');?>
</td>
        <TD>

        <?php if ($_smarty_tpl->tpl_vars['data']->value['mdd']>=$_smarty_tpl->getVariable('tgl_kemarin')->value||$_smarty_tpl->getVariable('com_user')->value['role_nm']=='Admin E-MR'){?>   
        <a  href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('inap/kep/edit_tindakan/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG']));?>
" class="button-edit" title="Tambah Catatan" >Edit</a>               
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('inap/kep/delete_process_tindakan/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG']));?>
" class="button-hapus" title="Tambah Catatan" onclick="return confirm('Apakah Anda Yakin Akan Menghapus?');">Hapus</a>
        <?php }?>
        </TD>
    </tr>
    <?php }} ?>
</table>