<?php /* Smarty version Smarty-3.0.7, created on 2022-10-11 14:01:41
         compiled from "application/views\inap/rm17/add.html" */ ?>
<?php /*%%SmartyHeaderCode:14236634514d52551f6-33360676%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'afdb414f39096ed8fabf3520b58fc074661aed79' => 
    array (
      0 => 'application/views\\inap/rm17/add.html',
      1 => 1665471698,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14236634514d52551f6-33360676',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><!-- include javascript -->
<?php $_template = new Smarty_Internal_Template("inap/rm17/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of include javascript-->
<div class="breadcrum">
    <p>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/form_rm/lists');?>
">Form RM</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/rm17/cari');?>
">RM 17 CATATAN PEMBERIAN OBAT</a><span></span>
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div>
<!-- <div class="head-content">
    <div class="head-content-nav">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/rm17/add/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
" class="active">Program Pemberian Obat</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/rm17/add_catatan/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
">Catatan Pemberian Obat</a></li>
        </ul>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div> -->
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
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
        <table class="table-input" width="100%">
            <tr>
                <th colspan="4">DATA UMUM</th>
            </tr>
            <tr>
                <td>
                    Tanggal
                </td>
                <td>
                    <input name="FD_TGL_PEMBERIAN_OBAT" type="text" size="10" maxlength="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_TANGGAL'])===null||$tmp==='' ? '' : $tmp);?>
" class="tanggal" style="text-align: center;" />
                    <em>* Wajib Diisi</em>
                </td>
            </tr>
            <tr>
                <td>
                    Jenis Obat
                </td>
                <td>
                    <select name="FS_JENIS_OBAT" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <option value="1">TABLET</option>
                        <option value="2">INJEKSI</option>
                        <option value="3">SALEP</option>
                        <option value="4">LL</option>
                        <option value="5">KAPLET</option>
                        <option value="6">KAPSUL</option>
                        <option value="7">INFUS</option>
                        <option value="8">NEBULIZER</option>
                        <option value="9">SYRUP</option>
                        <option value="10">RACIKAN (PUYER)</option>
                        <option value="11">RACIKAN (KAPSUL)</option>
                        <option value="12">SUPOSITORIA</option>
                    </select>
                </td>
            
                <td>Nama Obat</td>
                <td>
                    <select name="FS_NAMA_OBAT" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_obat')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data2']->key => $_smarty_tpl->tpl_vars['data2']->value){
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data2']->value['NAMA_OBAT'];?>
"><?php echo $_smarty_tpl->tpl_vars['data2']->value['NAMA_OBAT'];?>
</option>
                        <?php }} ?>
                    </select>
                    <!--<input type="text" name="FS_NAMA_OBAT" size="40">-->
                </td>
            </tr>
            <tr>
                <td>Dosis</td>
                <td>
                    <input type="text" name="FS_DOSIS_OBAT" size="40">
                </td>
            
                <td>
                    Rute
                </td>
                <td>
                    <select name="FS_RUTE" id="surat_dari" class="select2" style="width: 150px;">
                        <option value=""></option>
                        <option value="1">ORAL</option>
                        <option value="2">TOPIKAL</option>
                        <option value="3">TETES MATA</option>
                        <option value="4">IV</option>
                        <option value="5">IM</option>
                        <option value="6">SC</option>
                        <option value="7">IC</option>
                        <option value="8">TETES TELINGA</option>
                        <option value="9">IV DRIP</option>
                        <option value="10">INHALASI</option>
                        <option value="11">TETES HIDUNG</option>
                        <option value="12">PEREKTAL</option>
                        <option value="13">PERVAGINAL</option>
                    </select>
                 Interval 
                    <input type="text" name="FS_INTERVAL" size="20">
                </td>
            </tr>
            <tr>
            
                <td>Keterangan</td>
                <td>
                    <input type="text" name="FS_KET" size="40">
                </td>
            
                <td>
                    Stop Obat
                </td>
                <td>
                    <select name="FS_KET2" id="surat_dari" class="select2" style="width: 150px;">
                        <option value="0"></option>
                        <option value="1">Stop</option>
                    </select>
                </td>
            </tr>
            <tr class="submit-box">
                <td colspan="4">
                   <div style="font-weight: bold;">
                    *Bismillahirohmanirrohim, saya dengan sadar dan penuh tanggung jawab mengisikan formulir ini dengan data yang benar
                </div>
                <br>
                <input type="submit" name="save" value="Simpan" class="edit-button"/>
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
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('inap/rm17/add_catatan/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_RM17']));?>
" class="button-edit" title="Tambah Catatan" >Catat Pemberian</a>
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/rm17/edit/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_RM17']));?>
" class="button-edit" title="Tambah Catatan" >Edit</a>

                <?php if ($_smarty_tpl->tpl_vars['data']->value['mdd']>=$_smarty_tpl->getVariable('tgl_kemarin')->value||$_smarty_tpl->getVariable('com_user')->value['role_nm']=='Admin E-MR'){?>                  
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