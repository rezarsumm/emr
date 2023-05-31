<?php /* Smarty version Smarty-3.0.7, created on 2021-09-22 15:11:46
         compiled from "application/views\medis/rawat_jalan/edit_prb.html" */ ?>
<?php /*%%SmartyHeaderCode:10445613b0bd9a982d1-76540903%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3891623b36f37aedee7eab3c716c36a17d8c0b43' => 
    array (
      0 => 'application/views\\medis/rawat_jalan/edit_prb.html',
      1 => 1631258412,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10445613b0bd9a982d1-76540903',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("medis/rawat_jalan/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<script type="text/javascript">
    
</script>
<div class="breadcrum">
    <p>
        <a href="#">Pemeriksaan Dokter</a><span></span>
        <a href="#">History Pasien</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/');?>
">Rawat Jalan</a><span></span>
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="navigation">
    <div class="navigation-button">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('medis/rawat_jalan/history/').($_smarty_tpl->getVariable('result')->value['NO_MR']));?>
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
<form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/edit_prb_process');?>
" method="post">
    <input type="hidden" name="FS_KD_TRS" value="<?php echo $_smarty_tpl->getVariable('result')->value['FS_KD_TRS'];?>
" />
    <input type="hidden" name="FS_KD_REG" value="<?php echo $_smarty_tpl->getVariable('result')->value['NO_REG'];?>
" />
    <table class="table-info" width="100%">
        <tr class="headrow">
            <th colspan="4">Data Pasien</th>
        </tr>
        <tr>
            <td width='15%'>Kode Reg</td>
            <td width='35%'><?php echo $_smarty_tpl->getVariable('result')->value['NO_REG'];?>
</td>
            <td width='15%'>No RM</td>
            <td width='35%'><?php echo $_smarty_tpl->getVariable('result')->value['NO_MR'];?>
</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['NAMA_PASIEN'])===null||$tmp==='' ? '' : $tmp);?>
</td>
            <td>Alamat</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['ALAMAT'])===null||$tmp==='' ? '' : $tmp);?>
</td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['TGL_LAHIR'])===null||$tmp==='' ? '' : $tmp);?>
</td>
            <td>Jenis Kelamin</td>
            <td>
                <?php if ($_smarty_tpl->getVariable('result')->value['JENIS_KELAMIN']=='P'){?>
                Perempuan
                <?php }else{ ?>
                Laki-Laki
                <?php }?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Dokter</td>
            <td>1. <?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['NAMA_DOKTER'])===null||$tmp==='' ? '' : $tmp);?>
<br> 2. <?php echo $_smarty_tpl->getVariable('result')->value['DOK2'];?>
</td>
        </tr>
    </table>
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4"></th>
        </tr>
     <tr>
            <td width='25%'>Kontrol setelah dari FKTP ke RS tanggal </td>
            <td width='65%'>
                <input type="text" name="FS_TGL_PRB" class="tanggal" size="10"/>

            </td>

        </tr>
                 <input type="hidden" name="FS_TUJUAN_" value="-"/>
     <!--    <tr>
            <td>Rumah Sakit Tujuan</td>
            <td>
                 <input type="text" name="FS_TUJUAN_RUJUKAN2" size="55"/> <em>*wajib diisi</em>
            </td>

        </tr> -->
    <!--     <tr>
            <td>Alasan di rujuk</td>
            <td>
                <textarea rows="3" cols="60" name="FS_ALASAN_RUJUK"></textarea> <em>*wajib diisi</em>
            </td>

        </tr> -->
        <tr class="submit-box">
            <td colspan="4">
                <input type="submit" name="save" value="Simpan" class="edit-button" /> 
            </td>
        </tr>
    </table>
</form>