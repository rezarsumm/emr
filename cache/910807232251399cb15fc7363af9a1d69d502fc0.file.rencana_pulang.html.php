<?php /* Smarty version Smarty-3.0.7, created on 2022-06-30 11:45:16
         compiled from "application/views\inap/rencana_pulang.html" */ ?>
<?php /*%%SmartyHeaderCode:1953762bd2a5c2424e8-31674317%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '910807232251399cb15fc7363af9a1d69d502fc0' => 
    array (
      0 => 'application/views\\inap/rencana_pulang.html',
      1 => 1655883011,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1953762bd2a5c2424e8-31674317',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><!-- include javascript -->
<?php $_template = new Smarty_Internal_Template("inap/kep/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of include javascript-->
<div class="breadcrum">
    <p>
        <a href="#">Catatan Rawat Inap</a><span></span>
       
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/rencana_pulang/add_process');?>
" method="post">
        <input name="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />

        <table class="table-info" width="100%">
            <tr class="headrow">
                <th colspan="2"></th>
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
        <div class="head-content">
            <div class="head-content-nav">
                <ul>
                    <!-- <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/kep/add_tindakan/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
" class="active">Tindakan Keperawatan</a></li> -->
                </ul>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        
        <div class="content-entry">
            <table class="table-input" width="100%">

                <tr class="headrow">
                    <th colspan="4">Renana Pemulangan Pasien (DISCHARGE PLANNING)</th>
                </tr>
                <tr>
                    <td> Diagnosa  </td>
                    <td colspan="2">
                        <input name="DIAGNOSA" type="text" value="<?php echo $_smarty_tpl->getVariable('rp')->value['DIAGNOSA'];?>
"  style="width: 400px;"/>
                    </td>
                </tr>
            <tr>
                <td>Tanggal MRS</td>
                <td colspan="2">
                    <input name="TGL_MRS" type="text" size="30" maxlength="10" value="<?php echo date('Y-m-d',strtotime($_smarty_tpl->getVariable('rp')->value['TGL_MRS']));?>
" class="tanggal" style="text-align: center; width:80px ;" />
                Jam MRS 
                    <input name="JAM_MRS" type="time" style="time" value="<?php echo date('d-m-Y',strtotime($_smarty_tpl->getVariable('rp')->value['JAM_MRS']));?>
"   maxlength="10" />
                </td>
            </tr>
           
            <tr>
                <td> Alasan MRS   </td>
                <td colspan="2">
                    <input name="ALASAN_MRS" type="text" value="<?php echo $_smarty_tpl->getVariable('rp')->value['ALASAN_MRS'];?>
"    style="width: 400px;" />
                </td>
            </tr>
          
            <tr>
                <td>Tanggal Rencana Pemulangan</td>
                <td colspan="2">
                    <input name="TGL_RENCANA_PULANG" type="date" size="30" value="<?php echo date('Y-m-d',strtotime($_smarty_tpl->getVariable('rp')->value['TGL_RENCANA_PULANG']));?>
"   class="tanggal" style="text-align: center; width:80px ;" />
                 Jam Rencana Pemulangan 
                    <input name="JAM_RENCANA_PULANG" type="time" style="time" value="<?php echo date('H:i',strtotime($_smarty_tpl->getVariable('rp')->value['JAM_RENCANA_PULANG']));?>
"   maxlength="30" />
                </td>
            </tr>

            <tr>
                <td>Estimasi Tanggal Pemulangan</td>
                <td colspan="2">
                    <input name="ESTIMASI_TGL" type="date" size="30" maxlength="10" value="<?php echo date('Y-m-d',strtotime($_smarty_tpl->getVariable('rp')->value['ESTIMASI_TGL']));?>
" class="tanggal" style="text-align: center; width:80px ;" />
                </td>
            </tr>


 </table>

        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="4"> KETERANGAN RENCANA PEMULANGAN</th> 
            </tr>
            <tr>
                <td> Pengaruh Rawat Inap Terhadap Pasien  </td>
                <td colspan="3">
                    <input type="radio" name="PENGARUH_P" <?php if ($_smarty_tpl->getVariable('rp')->value['PENGARUH_P']=='Tidak'){?> checked <?php }?> value="Tidak">Tidak
                    <input type="radio" name="PENGARUH_P" <?php if ($_smarty_tpl->getVariable('rp')->value['PENGARUH_P']!='Tidak'){?> checked <?php }?>  value="Ya">Ya
                  
                </td>
                
            </tr>
            <tr>
                <td> Pengaruh Rawat Inap Terhadap Pekerjaan  </td>
                <td colspan="3">
                    <input type="radio" name="PENGARUH_JOB" <?php if ($_smarty_tpl->getVariable('rp')->value['PENGARUH_JOB']=='Tidak'){?> checked <?php }?> value="Tidak">Tidak
                    <input type="radio" name="PENGARUH_JOB"  <?php if ($_smarty_tpl->getVariable('rp')->value['PENGARUH_JOB']!='Tidak'){?> checked <?php }?> value="Ya">Ya
                  
                </td>
                
            </tr>
            <tr>
                <td> Pengaruh Rawat Inap Terhadap Keuangan  </td>
                <td colspan="3">
                    <input type="radio" name="PENGARUH_K" <?php if ($_smarty_tpl->getVariable('rp')->value['PENGARUH_K']=='Tidak'){?> checked <?php }?> value="Tidak">Tidak
                    <input type="radio" name="PENGARUH_K" <?php if ($_smarty_tpl->getVariable('rp')->value['PENGARUH_K']!='Tidak'){?> checked <?php }?>  value="Ya">Ya
                  
                </td>
                
            </tr>

            <tr>
                <td> Antisipasi Terhadap Masalah ketika pulang  </td>
                <td colspan="3">
                   
                    <input type="radio" name="ANTI" <?php if ($_smarty_tpl->getVariable('rp')->value['ANTI']=='Tidak'){?> checked <?php }?> value="Tidak">Tidak
                    <input type="radio" name="ANTI" <?php if ($_smarty_tpl->getVariable('rp')->value['ANTI']!='Tidak'){?> checked <?php }?>  value="Ya">Ya
                    <input type="text" name="ANTI2" value="<?php echo $_smarty_tpl->getVariable('rp')->value['ANTI'];?>
" >
                </td>
                
            </tr>

            <tr>
                <td> Bantuan diperlukan dalam hal </td>
                <td  colspan="3">
                    <input type="text" name="BANTUAN" style="width: 400px;" value="<?php echo $_smarty_tpl->getVariable('rp')->value['BANTUAN'];?>
" >  
                </td>
            </tr>

            <tr>
                <td  > Adakah yang membantu keperluan tersebut  </td>
                <td  >
                    <input type="radio" name="PEMBANTU" value="Tidak" <?php if ($_smarty_tpl->getVariable('rp')->value['PEMBANTU']=='Tidak'){?> checked <?php }?>>Tidak
                       <input type="radio" name="PEMBANTU" value="Ya" <?php if ($_smarty_tpl->getVariable('rp')->value['PEMBANTU']!='Tidak'){?> checked <?php }?>>Ya
                       <input type="text" name="PEMBANTU2" value="<?php echo $_smarty_tpl->getVariable('rp')->value['PEMBANTU'];?>
" >  
                 
                </td>
                
            </tr>
            <tr>
                <td  > Apakah pasien hidup sendiri saat pulang dari rumah sakit  </td>
                <td  >  
                    <input type="radio" name="TINGGAL" value="Tidak" <?php if ($_smarty_tpl->getVariable('rp')->value['TINGGAL']=='Tidak '){?> checked <?php }?>>Tidak
                    <input type="radio" name="TINGGAL" value="Ya" <?php if ($_smarty_tpl->getVariable('rp')->value['TINGGAL']=='Ya '){?> checked <?php }?>>Ya
                    <input type="text" name="TINGGAL2" value="<?php echo $_smarty_tpl->getVariable('rp')->value['TINGGAL'];?>
" >  
                </td>
                
            </tr>

            <tr>
                <td  > Apakah pasien menggunakan alat medis setelah keluar rs  </td>
                <td  >   
                    <input type="radio" name="ALAT_MEDIS" value="Tidak" <?php if ($_smarty_tpl->getVariable('rp')->value['ALAT_MEDIS']=='Tidak '){?> checked <?php }?>>Tidak
                    <input type="radio" name="ALAT_MEDIS" value="Ya" <?php if ($_smarty_tpl->getVariable('rp')->value['ALAT_MEDIS']=='Ya '){?> checked <?php }?>>Ya
                    <input type="text" name="ALAT_MEDIS2"  value="<?php echo $_smarty_tpl->getVariable('rp')->value['ALAT_MEDIS'];?>
">
                </td>
                
            </tr>

            <tr>
                <td  > Apakah pasien memerlukan alat bantu saat keluar dari rs  </td>
                <td  >  
                    <input type="radio" name="ALAT_BANTU" value="Tidak" <?php if ($_smarty_tpl->getVariable('rp')->value['ALAT_BANTU']=='Tidak '){?> checked <?php }?>>Tidak
                    <input type="radio" name="ALAT_BANTU" value="Ya" <?php if ($_smarty_tpl->getVariable('rp')->value['ALAT_BANTU']=='Ya '){?> checked <?php }?>>Ya
                    <input type="text" name="ALAT_BANTU2"  >
                </td>
                
            </tr>


            <tr>
                <td  > Apakah pasien memerlukan bantuan perawatan saat keluar dari rs </td>
                <td  >  
                    <input type="radio" name="BANTU_KHUSUS" value="Tidak"  <?php if ($_smarty_tpl->getVariable('rp')->value['BANTU_KHUSUS']=='Tidak '){?> checked <?php }?>>Tidak
                    <input type="radio" name="BANTU_KHUSUS" value="Ya"  <?php if ($_smarty_tpl->getVariable('rp')->value['BANTU_KHUSUS']=='Ya '){?> checked <?php }?>>Ya
                    <input type="text" name="BANTU_KHUSUS2" value="<?php echo $_smarty_tpl->getVariable('rp')->value['BANTU_KHUSUS'];?>
">
                </td>
                
            </tr>

            <tr>
                <td  > Apakah pasien bermasalah dalam memenuhi kebutuhan pribadi setelah keluar dari rs </td>
                <td  >  
                    <input type="radio" name="K_PRIBADI" value="Tidak" <?php if ($_smarty_tpl->getVariable('rp')->value['K_PRIBADI']=='Tidak'){?> checked <?php }?>>Tidak
                    <input type="radio" name="K_PRIBADI" value="Ya" <?php if ($_smarty_tpl->getVariable('rp')->value['K_PRIBADI']=='Ya'){?> checked <?php }?>>Ya
                    <input type="text" name="K_PRIBADI2" value="<?php echo $_smarty_tpl->getVariable('rp')->value['K_PRIBADI2'];?>
">
                </td>
                
            </tr>

            <tr>
                <td  > Apakah pasien memiliki nyeri kronis dan kelelahan saat keluar dari rs </td>
                <td  >  
                    <input type="radio" name="NYERI" value="Tidak" <?php if ($_smarty_tpl->getVariable('rp')->value['NYERI']=='Tidak '){?> checked <?php }?>>Tidak
                    <input type="radio" name="NYERI" value="Ya" <?php if ($_smarty_tpl->getVariable('rp')->value['NYERI']=='Ya '){?> checked <?php }?>>Ya
                    <input type="text" name="NYERI2" value="<?php echo $_smarty_tpl->getVariable('rp')->value['NYERI'];?>
">
                </td>
                
            </tr>

            <tr>
                <td  > Apakah pasien dan keluarga memerlukan edukasi saat keluar dari rs </td>
                <td  >  
                    <input type="radio" name="EDUKASI" value="Tidak" <?php if ($_smarty_tpl->getVariable('rp')->value['EDUKASI']=='Tidak '){?> checked <?php }?>>Tidak
                    <input type="radio" name="EDUKASI" value="Ya" <?php if ($_smarty_tpl->getVariable('rp')->value['EDUKASI']=='Ya '){?> checked <?php }?>>Ya
                    <input type="text" name="EDUKASI2" value="<?php echo $_smarty_tpl->getVariable('rp')->value['EDUKASI'];?>
">>
                </td>
                
            </tr>
            <tr>
                <td  > Apakah pasien dan keluarga memerlukan keterampilan khusus saat keluar dari rs </td>
                <td  >  
                    <input type="radio" name="KETR" value="Tidak" <?php if ($_smarty_tpl->getVariable('rp')->value['KETR']=='Tidak '){?> checked <?php }?>>Tidak
                    <input type="radio" name="KETR" value="Ya" <?php if ($_smarty_tpl->getVariable('rp')->value['KETR']=='Ya '){?> checked <?php }?>>Ya
                    <input type="text" name="KETR2" value="<?php echo $_smarty_tpl->getVariable('rp')->value['KETR'];?>
">>
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
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('igd/ews/cetak_pulang/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'])).('/')).('15'));?>
" target="_blank"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/printer-icon.png" alt="" /> Print</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div> 