<?php /* Smarty version Smarty-3.0.7, created on 2022-12-01 12:28:13
         compiled from "application/views\op/pascabedah/add.html" */ ?>
<?php /*%%SmartyHeaderCode:250763883b6dd2fdd1-21444190%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42cf3daf99d68a3ef39823619bdd0915c3cdde15' => 
    array (
      0 => 'application/views\\op/pascabedah/add.html',
      1 => 1653807913,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '250763883b6dd2fdd1-21444190',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?> 
<div class="breadcrum">
    <p>
        <a href="#">Catatan Operasi </a><span></span>
        <a href="">Asesmen Pasca Operasi </a><span></span>
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div> 
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
   
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/pascabedah/add_process2');?>
" method="post" onkeypress="return event.keyCode != 13">
        <input name="FS_KD_REG" id="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />
        <input name="idoperasi" type="hidden" value="<?php echo $_smarty_tpl->getVariable('idoperasi')->value;?>
" />
        <input name="FS_KD_LAYANAN" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['KODE_BANGSAL'];?>
" />
        <input name="FS_KD_PETUGAS_MEDIS" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_medis'];?>
" />

        <table class="table-info" width="100%">
            <tr class="headrow">
                <th colspan="2">Add Asesmen Pasca Operasi</th>
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
        <!-- <table class="table-info" width="100%" style="text-align: justify;">
            <tr class="headrow">
                <th colspan="3">Asesmen Awal Medik</th>
            </tr>
            <tr>
                <td width="18%">Anamnesa</td>
                <td width="1%">:</td>
                <td width="80%"> <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_ANAMNESA'];?>

                </td>
            </tr>
            <tr>
               <td width="18%">Diagnosa</td>
                <td width="2%">:</td>
                <td width="80%">  <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_DIAGNOSA'];?>

                </td>
            </tr>
            <tr>
                <td width="18%">Hasil Pemeriksaan Penunjang</td>
                <td width="2%">:</td>
                <td width="80%">  <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_HASIL_PEMERIKSAAN_PENUNJANG'];?>

                </td>
            </tr>
            <tr>
                 <td width="18%"> Pemeriksaan Fisik</td>
                <td width="2%">:</td>
                <td width="80%">   <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_CATATAN_FISIK'];?>

                </td>
            </tr>
            <tr>
                <td width="18%">Daftar Masalah</td>
                <td width="2%">:</td>
                <td width="80%"> <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_DAFTAR_MASALAH'];?>

                </td>
            </tr>
            <tr>
                 <td width="18%">Rencana Tindakan</td>
                <td width="2%">:</td>
                <td width="80%">  <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_TINDAKAN'];?>

                </td>
            </tr>
            <tr>
                <td width="18%">Rencana Pemeriksaan Penunjang</td>
                <td width="2%">:</td>
                <td width="80%">  <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_PLANNING'];?>

                </td>
            </tr>
          
            <tr>
                <td width="18%">Waktu Asesmen</td>
                <td width="2%">:</td>
                <td width="80%"> <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['mdd'];?>
 / <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_JAM_TRS'];?>

                </td>
            </tr>
        </table> -->
        <div class="notification red">
            <p><strong>High Risk :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_HIGH_RISK'])===null||$tmp==='' ? '-' : $tmp);?>
 </p>
            <p><strong>Alergi :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
 (<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_REAK_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
)</p>
            <div class="clear"></div>
        </div>
        <table class="table-input" width="100%" style="text-align: justify;">
         


            
           <tr>
            <td>Tanggal Operasi</td>
            <td >
                <input type="date" name="TGL_OP" rows="1" value="<?php echo $_smarty_tpl->getVariable('tgl')->value;?>
" style="width: 150px;" > </input>
                </td>
            <td>Tingkat Perawatan Medis</td>
                <td>
                    <input type="radio" name="TINGKAT_PERAWATAN" VALUE="Tinggi">Tinggi (ICU) <br>
                    <input type="radio" name="TINGKAT_PERAWATAN" VALUE="Sedang">Sedang (HCU) <br>
                    <input type="radio" name="TINGKAT_PERAWATAN" VALUE="Rendah">Rendah (Ruang rawat/pulang) 
                </td>
            </tr> 


            <tr>
                 <td>Monitor TD, Nadi, RR, Suhu Setiap </td>
                 <td >
                    <input type="text" name="PERIODE_MONITOR" rows="1" style="width: 350px;" > </input>
                  </td>
                  <td>Sampai </td>
                  <td >
                     <input type="text" name="PERIODE_MONITOR2" rows="1" style="width: 150px;" > </input>
                   </td>
                          
            </tr> 
            <tr>
                <td>Konsultasi pemberi layanan lain </td>
                <td >
                   <textarea name="KONSUL_LAYANAN_LAIN" rows="3" style="width: 350px;" > </textarea>
                 </td>
                </tr>
            <tr>
                    <td>Pengobatan yang diperlukan </td>
                    <td >
                       <textarea name="TERAPI" rows="3" style="width: 350px;" > </textarea>
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
</div>
 <table class="table-input" width="100%">
     <tr>
                <th colspan="4">Shortcut Navigation</th>
            </tr>
<tr class="submit-box">
                <td colspan="5">
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('medis/rawat_inap/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-green">Asesmen Awal Medis Rawat Inap</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/ass_awal/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-red2">Asesmen Awal Keperawatan</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/ass_jatuh/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-blue2">Asesmen Jatuh</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/kep/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-green2">Rencana dan Tindakan Keperawatan</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/rm10/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-orange">Catatan Edukasi</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/rm17/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-pink">Catatan Pemberian Obat</a>
                    <!--<a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/dp/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-brown">Discharge Planning</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('farmasi/rekon/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-yellow">Rekonsiliasi Obat</a>
                    -->
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/resume/cari_process_cppt/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-red">Resume Pasien Pulang</a>
                    <!--<a href="javascript:;" class="btn-green item_status_add">Status Pasien</a>-->
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'])).('/10'));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-red2">Hasil Penunjang</a>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('rm/rawat_jalan/resume/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_MR']));?>
', 'nama_window_pop_up', 'width=1000,height=1000,scrollbars=yes,resizeable=no')" class="btn-blue2">Resume Rawat Jalan</a>
                </td> 
            </tr>
 </table>
<table class="table-view" width="100%">
    <tr class="headrow">
        <th colspan="6">List Laporan OP</th>
    </tr>
    <tr>
        <th width="8%">Tanggal</th>
        <th width="8%">Tingkat perawtan</th>
        <th width="12%">Periode Monitor </th>
        <th width="20%">Konsul</th>
        <th width="27%">Terapi</th>
        <th width="12%">Dokter</th>
      
    </tr>
    <?php  $_smarty_tpl->tpl_vars['cppt'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasca_op')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cppt']->key => $_smarty_tpl->tpl_vars['cppt']->value){
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['TGL_OP'];?>
 </td>
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['TINGKAT_PERAWATAN'];?>
 </td>
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['PERIODE_MONITOR'];?>
 </td>
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['KONSUL_LAYANAN_LAIN'];?>
 </td>
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['TERAPI'];?>
 </td>
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['NAMALENGKAP'];?>
 </td>
        </td>
 
     
    </tr>
    <?php }} ?>
</table>


 