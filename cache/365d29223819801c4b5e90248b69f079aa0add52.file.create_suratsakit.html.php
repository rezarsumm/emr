<?php /* Smarty version Smarty-3.0.7, created on 2022-03-25 15:35:12
         compiled from "application/views\medis/skh/create_suratsakit.html" */ ?>
<?php /*%%SmartyHeaderCode:2189623d7ec04c0818-76679901%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '365d29223819801c4b5e90248b69f079aa0add52' => 
    array (
      0 => 'application/views\\medis/skh/create_suratsakit.html',
      1 => 1646634363,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2189623d7ec04c0818-76679901',
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
        <small>Add Surat Keterangan Kehamilan</small>
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
<form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/skh/simpan_suratsakit');?>
" method="post">
    <!-- <input type="hidden" name="FS_KD_TRS" value="<?php echo $_smarty_tpl->getVariable('result')->value['FS_KD_TRS'];?>
" /> -->
    <input type="hidden" name="FS_KD_REG" value="<?php echo $_smarty_tpl->getVariable('result')->value['NO_REG'];?>
" />
    <table class="table-info" width="100%">
        <tr class="headrow">
            <th colspan="4">Data Pasien</th>
        </tr>
         <tr>
            <td width='15%'>Kode Reg</td>
            <td width='35%'><?php echo $_smarty_tpl->getVariable('result')->value['NO_REG'];?>
</td></tr>
        <tr>
            <td width='15%'>No RM</td>
            <td width='35%'><?php echo $_smarty_tpl->getVariable('result')->value['NO_MR'];?>
</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['NAMA_PASIEN'])===null||$tmp==='' ? '' : $tmp);?>
</td></tr>
        <tr>    <td>Alamat</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['ALAMAT'])===null||$tmp==='' ? '' : $tmp);?>
</td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['TGL_LAHIR'])===null||$tmp==='' ? '' : $tmp);?>
</td></tr>
         <tr>    <td>Jenis Kelamin</td>
            <td>
                <?php if ($_smarty_tpl->getVariable('result')->value['JENIS_KELAMIN']=='P'){?>
                Perempuan
                <?php }else{ ?>
                Laki-Laki
                <?php }?>
            </td>
        </tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
    </table>
    <br> 
    <center> 
    <table class="table-input" width="80%">
        <tr class="headrow">
            <th colspan="4">Form Surat Keterangan Kehamilan</th>
        </tr>
        <tr><td> </td></tr>
     
        <tr>
            <td>
               Pekerjaan
            </td>
            <td > <input type="text" value="-" name="pekerjaan" style="width: 400px;">
            </td>
        </tr>
          <tr>
            <td>
              Anak ke
            </td>
            <td > <input type="text" name="Anakke" style="width: 400px;">
            </td>
        </tr>
          <tr>
            <td>
              Usia Kehamilan
            </td>
            <td > <input type="text" name="Usia_hamil" style="width: 400px;" onkeypress="return angka(event);"> Minggu
            </td>
        </tr>
        <tr>
            <td>
               Tanggal Perkiraan Kelahiran
            </td>
            <td > <input type="date" name="hpl"   style="width: 400px;">
            </td>
        </tr>
      
        <tr><td> </td></tr>
      
        <tr class="submit-box">
            <td colspan="4">
                <input type="submit" name="save" value="Simpan" class="edit-button" /> 
            </td>
        </tr>
    </table>
    </center>
</form> 

<script type="text/javascript">
  function angka(evt){
    var charCode=(evt.which)?evt.which:event.keyCode
    if(charCode>31 && (charCode<48||charCode>57))
      return false;
    return true;
  }
</script> 