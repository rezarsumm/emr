<?php /* Smarty version Smarty-3.0.7, created on 2022-01-11 13:18:06
         compiled from "application/views\medis/rawat_jalan/edit_skdp.html" */ ?>
<?php /*%%SmartyHeaderCode:1486961dd211e8350d8-39050736%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f1f83488e5b6067a2b298b8d858a02d27e9b09d' => 
    array (
      0 => 'application/views\\medis/rawat_jalan/edit_skdp.html',
      1 => 1641880951,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1486961dd211e8350d8-39050736',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("medis/rawat_jalan/edit_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
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
<form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/edit_skdp_process');?>
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
            <th colspan="4">Surat Keterangan Dalam Perawatan</th>
        </tr>
        <tr>
            <td width='25%'>Belum dapat dikembalikan ke Fasilitas Perujuk dengan alasan</td>
            <td width='75%'>
                <select name="FS_SKDP_1" id="skdp_alasan">
                    <option value='1'>--Pilih Alasan--</option>
                    <?php  $_smarty_tpl->tpl_vars['skdp_alasan'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_skdp_alasan')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['skdp_alasan']->key => $_smarty_tpl->tpl_vars['skdp_alasan']->value){
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['skdp_alasan']->value['FS_KD_TRS'];?>
"><?php echo $_smarty_tpl->tpl_vars['skdp_alasan']->value['FS_NM_SKDP_ALASAN'];?>
</option>
                    <?php }} ?>
                </select>
            </td>

        </tr>
        <tr>
            <td>Rencana tindak lanjut yang akan dilakukan pada kunjungan selanjutnya :</td>
            <td>
                <select name="FS_SKDP_2" id="kota">
                    <option value='1'>--Pilih Rencana Tindakan--</option>
                </select>
                <input type="text" name="FS_SKDP_KET"/>
            </td>

        </tr>
        <tr>
            <td>Tanggal Kontrol Berikutnya :</td>
            <td>
                <input type="text" name="FS_SKDP_KONTROL" class="tanggal" size="10"/>
            </td>

        </tr>
         <tr>
             <td>Tanggal Expired Rujukan Faskes :</td>
            <td>
                <input type="text" name="FS_SKDP_FASKES" class="tanggal" size="10"/>
             <!--    <input type="checkbox" style="width:20px; height: 18px;" name="FS_SKDP_KONTROL" value="habis"/>Rujukan expired -->

            </td>
        </tr>
          <tr>
            <td>
                Rencana Pemeriksaan Laboratorium
            </td>
            <td>

               <select name="tujuan[]" multiple id="tujuan" style="width:250px">
                    <option></option>
                </select> 
                
            </td>
          </tr>
          <tr>
            <td>
                Rencana Pemeriksaan Radiologi
            </td>
            <td>
                <select name="tembusan[]" multiple id="tembusan" style="width:250px">
                    <option></option>
                </select>
            </td>
        </tr>

          <tr>
            <td>Keterangan/Pesan  :</td>
            <td>
                 <textarea rows="5" cols="50" name="FS_PESAN">
              
                 </textarea>
            </td>
         </tr>
        <tr class="submit-box">
            <td colspan="4">
                <input type="submit" name="save" value="Simpan" class="edit-button" /> 
            </td>
        </tr>
    </table>
</form>