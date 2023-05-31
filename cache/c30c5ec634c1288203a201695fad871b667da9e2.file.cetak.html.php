<?php /* Smarty version Smarty-3.0.7, created on 2021-11-30 08:21:25
         compiled from "application/views\medis/rawat_jalan/cetak.html" */ ?>
<?php /*%%SmartyHeaderCode:1111361a57c953b7e36-72166555%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c30c5ec634c1288203a201695fad871b667da9e2' => 
    array (
      0 => 'application/views\\medis/rawat_jalan/cetak.html',
      1 => 1638235136,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1111361a57c953b7e36-72166555',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="breadcrum">
       <p>
        <a href="#">Pemeriksaan Dokter</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/');?>
">Rawat Jalan</a><span></span>
        <small>Cetak Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="navigation">
    <div class="navigation-button">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/');?>
"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/back-icon.png" alt="" />  Back</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<!-- notification template -->
<?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of notification template-->
<table class="table-info" width="100%">
        <tr class="headrow">
            <th colspan="4">Data Pasien</th>
        </tr>
        <tr>
        <td width='15%'>No RM</td>
        <td width='35%'><?php echo $_smarty_tpl->getVariable('result')->value['NO_MR'];?>
</td>
        <td width='15%'>Nama</td>
        <td width='35%'><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['NAMA_PASIEN'])===null||$tmp==='' ? '' : $tmp);?>
</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['ALAMAT'])===null||$tmp==='' ? '' : $tmp);?>
</td>
        <td>Tanggal Lahir</td>
        <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['TGL_LAHIR'])===null||$tmp==='' ? '' : $tmp);?>
</td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td><?php if ($_smarty_tpl->getVariable('result')->value['JENIS_KELAMIN']=='P'){?>
            Perempuan
            <?php }else{ ?>
            Laki-Laki
            <?php }?></td>
        <td></td>
        <td></td>
    </tr>
    </table>
<table class="table-info" width="100%">
        <tr class="headrow">
            <th colspan="4">Resume Pemeriksaan</th>
        </tr>
        <tr>
            <td width='15%'>Anamnesa (S)</td>
            <td width='40%'><?php echo $_smarty_tpl->getVariable('medis')->value['FS_ANAMNESA'];?>
</td>
            <td width='10%'></td>
            <td width='35%'></td>
        </tr>
         <tr>
            <td>Pemeriksaan Fisik (O)</td>
            <td><?php echo $_smarty_tpl->getVariable('medis')->value['FS_CATATAN_FISIK'];?>
</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Diagnosa (A)</td>
            <td><?php echo $_smarty_tpl->getVariable('medis')->value['FS_DIAGNOSA'];?>
</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Daftar Masalah</td>
            <td><?php echo $_smarty_tpl->getVariable('medis')->value['FS_DAFTAR_MASALAH'];?>
</td>
            <td></td>
            <td></td>
        </tr> 
        <tr>
            <td>Tindakan (P)</td>
            <td><?php echo $_smarty_tpl->getVariable('medis')->value['FS_TINDAKAN'];?>
</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Terapi</td>
            <td><?php echo $_smarty_tpl->getVariable('medis')->value['FS_TERAPI'];?>
</td>
            <td></td>
            <td></td>
        </tr>
        
    <tr class="submit-box">
        <td colspan="4" align="center">
            <br />
            <!--<a href="javascript:void(0);" class="button-approve" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('medis/rawat_jalan/cetak_rm/').($_smarty_tpl->getVariable('result')->value['FS_KD_REG'])).('/')).($_smarty_tpl->getVariable('medis')->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')">
                <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/printer-icon.png"> CETAK RM
            </a>
            &nbsp;&nbsp;&nbsp
            <a class="button-approve" href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('medis/rawat_jalan/cetak_resep/').($_smarty_tpl->getVariable('result')->value['FS_KD_REG'])).('/')).($_smarty_tpl->getVariable('medis')->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')">
                <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/printer-icon.png"> CETAK RESEP
            </a>
            &nbsp;&nbsp;&nbsp;
            <a class="button-approve" href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('medis/rawat_jalan/cetak_skdp/').($_smarty_tpl->getVariable('result')->value['FS_KD_REG'])).('/')).($_smarty_tpl->getVariable('medis')->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')">
                <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/printer-icon.png"> CETAK SKDP
            </a>
            &nbsp;&nbsp;&nbsp;
            <a class="button-approve" href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('medis/rawat_jalan/cetak_prb/').($_smarty_tpl->getVariable('result')->value['FS_KD_REG'])).('/')).($_smarty_tpl->getVariable('medis')->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')">
                <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/printer-icon.png"> CETAK PRB
            </a>-->
            <br />
            <br />
        </td>
    </tr>
</table>