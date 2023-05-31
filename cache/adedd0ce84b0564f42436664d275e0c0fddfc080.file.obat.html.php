<?php /* Smarty version Smarty-3.0.7, created on 2022-10-12 08:38:49
         compiled from "application/views\rm/berkas/obat.html" */ ?>
<?php /*%%SmartyHeaderCode:1815163461aa981fd23-02582396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'adedd0ce84b0564f42436664d275e0c0fddfc080' => 
    array (
      0 => 'application/views\\rm/berkas/obat.html',
      1 => 1665538711,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1815163461aa981fd23-02582396',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?> 
<div class="breadcrum">
    <p>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/form_rm/lists');?>
">Form RM</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/rm17/cari');?>
">RM 17 CATATAN PEMBERIAN OBAT</a><span></span>
      
    </p>
    <div class="clear"></div>
</div>
 
<div class="content-entry">
 
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/rm17/add_process');?>
" method="post">
        <input name="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <table class="table-info" width="100%">
            <tr class="headrow">
                <th colspan="4">Add Catatan Pemberian Obat</th>
            </tr>
            <tr>
                <td>NAMA</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NAMA_PASIEN'];?>

                </td>
                 <td>TANGGAL LAHIR</td>
                <td>
                    <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('rs_pasien')->value['TGL_LAHIR'],"%d %b %Y");?>

                </td>
            </tr>
            <tr>
                <td>NO MR</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>

                </td>
           
                <td>ALAMAT</td>
                <td><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['ALAMAT'];?>
</td>
            </tr>
        </table>
     
</form>
 
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
         <li><a href="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_inap/cetak_rm/').($_tmp1)).('/')).('3'));?>
" target="_blank"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/printer-icon.png" alt="" /> Print</a></li>
     </ul>
 </div>
 <div class="clear"></div>
</div>
    
    <table class="table-view" width="100%">
        <tr>
            <th colspan="9">Program Pemberian Obat</th>
        </tr>
        <tr>
            <th WIDTH="7%"><center>TANGGAL</center></th>

            <th><center>NAMA OBAT</center></th>
            <th><center>DOSIS</center></th>
            <th><center>RUTE</center></th>
            <th><center>INTERVAL</center></th>
            <th><center>KET</center></th>
            <th><center>STATUS </center></th>
            <th><center>Catatan Pemberian </center></th>
            <th width="20%"><center>AKSI</center></th>
        </tr>
        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_rm17')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
        <tr 
        <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_KET2']==1){?>
        style="color:red;"
        <?php }?>
        >
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FD_TGL_PEMBERIAN_OBAT'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_NAMA_OBAT'];?>

           
        </td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_DOSIS_OBAT'];?>
</td>
        <td>
            <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_RUTE']==1){?>
            ORAL
            <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_RUTE']==2){?>
            TOPIKAL
            <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_RUTE']==3){?>
            TETES MATA
            <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_RUTE']==4){?>
            IV
            <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_RUTE']==5){?>
            IM
            <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_RUTE']==6){?>
            SC
            <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_RUTE']==7){?>
            IC
            <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_RUTE']==8){?>
            TETES TELINGA
            <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_RUTE']==9){?>
            IV DRIP
            <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_RUTE']==10){?>
            INHALASI
            <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_RUTE']==11){?>
            TETES HIDUNG
            <?php }?>
        </td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_INTERVAL'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_KET'];?>
</td>
        <td>
            <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_KET2']==1){?>
            Stop
            <?php }else{ ?>
            -
            <?php }?>
        </td>
        <td>
            <table border="0" style="padding: 1px;">
                 <?php $_smarty_tpl->tpl_vars['no'] = new Smarty_variable(1, null, null);?>
                <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('detail')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
               
                <?php if ($_smarty_tpl->tpl_vars['d']->value['FS_KD_RM17']==$_smarty_tpl->tpl_vars['data']->value['FS_KD_RM17']){?>
                   <tr style="padding: 1px;">
                    <td style="color: green ; padding: 1px;"><?php echo $_smarty_tpl->getVariable('no')->value++;?>
. Perawat :<?php echo $_smarty_tpl->tpl_vars['d']->value['FS_KD_PEG'];?>
,<?php echo $_smarty_tpl->tpl_vars['d']->value['FS_KD_PEG2'];?>
 </td>
                    <td style="color: blue"> Farmasi :<?php echo $_smarty_tpl->tpl_vars['d']->value['FS_KD_PEG3'];?>
 </td>
                    <td> Dosis :<?php echo $_smarty_tpl->tpl_vars['d']->value['FS_CHK_DOSIS'];?>
 </td>
                    <td> Rute :<?php echo $_smarty_tpl->tpl_vars['d']->value['FS_CHK_RUTE'];?>
 </td>
                    <td style="color: "> Waktu :<?php echo $_smarty_tpl->tpl_vars['d']->value['wkt'];?>
, <?php echo $_smarty_tpl->tpl_vars['d']->value['FD_WAKTU'];?>
 </td>
                   
                    </tr>
                <?php }?>
                <?php }} ?>

                
            </table>
        </td>
        <td>
            <center>
                <?php if ($_smarty_tpl->tpl_vars['data']->value['mdd']>=$_smarty_tpl->getVariable('tgl_kemarin')->value||$_smarty_tpl->getVariable('com_user')->value['role_nm']=='Admin E-MR'){?>           
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('inap/rm17/add_catatan/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_RM17']));?>
" class="button-edit" title="Tambah Catatan" >Catat Pemberian</a>
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/rm17/edit/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_RM17']));?>
" class="button-edit" title="Tambah Catatan" >Edit</a>

                      
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('inap/rm17/delete_process/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_RM17'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG']));?>
" class="button-hapus" title="Tambah Catatan" onclick="return confirm('Apakah Anda Yakin Akan Menghapus?');">Hapus</a>
                <?php }?>
            </center>
        </td>
    </tr>
    <?php }} else { ?>
    <tr>
        <td colspan="6">Data not found!</td>
    </tr>
    <?php } ?>
</table>
</div>