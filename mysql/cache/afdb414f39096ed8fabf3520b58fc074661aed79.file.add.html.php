<?php /* Smarty version Smarty-3.0.7, created on 2021-03-16 10:49:11
         compiled from "application/views\inap/rm17/add.html" */ ?>
<?php /*%%SmartyHeaderCode:631460502ab796bf21-61658660%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'afdb414f39096ed8fabf3520b58fc074661aed79' => 
    array (
      0 => 'application/views\\inap/rm17/add.html',
      1 => 1608812803,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '631460502ab796bf21-61658660',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\xampp\htdocs\emr_lampung\system\plugins\smarty\libs\plugins\modifier.date_format.php';
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
<div class="head-content">
    <div class="head-content-nav">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/rm17/add/').($_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_reg']));?>
" class="active">Data Umum</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/rm17/add_catatan/').($_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_reg']));?>
">Data Check List Obat</a></li>
        </ul>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/rm17/add_process');?>
" method="post">
        <input name="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_reg'];?>
" />
        <table class="table-info" width="100%">
            <tr class="headrow">
                <th colspan="2">Add Catatan Pemberian Obat</th>
            </tr>
            <tr>
                <td>NAMA</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_nm_pasien'];?>

                </td>
            </tr>
            <tr>
                <td>NO MR</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_mr'];?>

                </td>
            </tr>
            <tr>
                <td>TANGGAL LAHIR</td>
                <td>
                    <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('rs_pasien')->value['FD_TGL_LAHIR'],"%d %b %Y");?>

                </td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['FS_ALM_PASIEN'];?>
</td>
            </tr>
        </table>
        <table class="table-input" width="100%">
            <tr>
                <th colspan="2">DATA UMUM</th>
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
            </tr>
            <tr>
                <td>Nama Obat</td>
                <td>
                    <select name="FS_NAMA_OBAT" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_obat')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data2']->key => $_smarty_tpl->tpl_vars['data2']->value){
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data2']->value['FS_NM_BARANG'];?>
"><?php echo $_smarty_tpl->tpl_vars['data2']->value['FS_NM_BARANG'];?>
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
            </tr>
            <tr>
                <td>
                    Rute
                </td>
                <td>
                    <select name="FS_RUTE" id="surat_dari" class="select2" style="width: 300px;">
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
                </td>
            </tr>
            <tr>
                <td>Interval</td>
                <td>
                    <input type="text" name="FS_INTERVAL" size="40">
                </td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>
                    <input type="text" name="FS_KET" size="40">
                </td>
            </tr>
            <tr class="submit-box">
                <td colspan="2">
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
           <li><a href="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_reg'];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_inap/cetak_rm/').($_tmp1)).('/')).('3'));?>
" target="_blank"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/printer-icon.png" alt="" /> Print</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
    <div class="content-entry search-box">
        <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/rm17/proses_cari2');?>
" method="post">
            <input name="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_reg'];?>
" />
            <!--<table class="table-search" width="100%" >
                <tr>
                    <td> 
                        Periode
                        <input name="tanggal" type="text" size="10" maxlength="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('search')->value['tanggal'])===null||$tmp==='' ? '' : $tmp);?>
" class="tanggal" readonly="readonly" style="text-align: center;" />
                        s/d
                        <input name="tanggal2" type="text" size="10" maxlength="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('search')->value['tanggal2'])===null||$tmp==='' ? '' : $tmp);?>
" class="tanggal" readonly="readonly" style="text-align: center;" />
                    </td>
                    <td>
                        <input class="button" type="submit" value="SEARCH" name="save" />
                        <input class="button" type="submit" value="RESET" name="save" />
                    </td>
                </tr>
            </table>-->
        </form>
    </div>
    
    <table class="table-view" width="100%">
        <tr>
            <th colspan="8">Program Pemberian Obat</th>
        </tr>
        <tr>
            <th WIDTH="7%"><center>Tanggal</center></th>
        <th><center>Nama Obat</center></th>
        <th><center>Dosis</center></th>
        <th><center>Rute</center></th>
        <th><center>Interval</center></th>
        <th><center>Keterangan</center></th>
        <th><center>Keterangan Pemberian</center></th>
    <th width="20%"><center></center></th>
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
        <center>
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('inap/rm17/add_catatan/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_RM17']));?>
" class="button-edit" title="Tambah Catatan" >Add Catatan</a>
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/rm17/edit/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_RM17']));?>
" class="button-edit" title="Tambah Catatan" >Edit</a>
            <!--<a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('inap/rm17/delete_process/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_RM17'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG']));?>
" class="button-hapus" title="Tambah Catatan" onclick="return confirm('Apakah Anda Yakin Akan Menghapus?');">Hapus</a>-->
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