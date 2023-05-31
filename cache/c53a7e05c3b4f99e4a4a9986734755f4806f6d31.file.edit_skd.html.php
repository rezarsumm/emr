<?php /* Smarty version Smarty-3.0.7, created on 2022-01-31 15:45:01
         compiled from "application/views\medis/surat/edit_skd.html" */ ?>
<?php /*%%SmartyHeaderCode:555261f7a18d881323-26172226%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c53a7e05c3b4f99e4a4a9986734755f4806f6d31' => 
    array (
      0 => 'application/views\\medis/surat/edit_skd.html',
      1 => 1643164589,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '555261f7a18d881323-26172226',
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
        <small>Add Surat Keterangan Dokter</small>
    </p>
    <div class="clear"></div>
</div>
<!-- <div class="navigation">
    <div class="navigation-button">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('medis/rawat_jalan/history/').($_smarty_tpl->getVariable('result')->value['NO_MR']));?>
"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/back-icon.png" alt="" />  Back</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div> -->
<!-- notification template -->
<?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of notification template-->
<form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/suratt/update_skd');?>
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
 
    <center> 
    <table class="table-input" width="90%">
        <tr class="headrow">
            <th colspan="4">Form Surat Keterangan Dokter</th>
        </tr>
        
        <tr>
            <td>
               Pekerjaan
            </td>
            <td > <input type="text" value="<?php echo $_smarty_tpl->getVariable('ket_skd')->value['PEKERJAAN'];?>
" name="PEKERJAAN" style="width: 500px;">
            </td>
        </tr>
        <tr>
            <td>
               Tujuan Surat
            </td>
            <td > 
                <select id="dasar" name="TUJUANSURAT">
                    <option>--- pilih ---</option>
                    <option  <?php if ($_smarty_tpl->getVariable('ket_skd')->value['TUJUANSURAT']=='Untuk Memperpanjang STR'){?> selected <?php }?> value="Untuk Memperpanjang STR">Untuk Memperpanjang STR</option>
                    <option <?php if ($_smarty_tpl->getVariable('ket_skd')->value['TUJUANSURAT']=='Untuk Keperluan Mendaftar Sekolah'){?> selected <?php }?> value="Untuk Keperluan Mendaftar Sekolah">Untuk Keperluan Mendaftar Sekolah</option>
                    <option <?php if ($_smarty_tpl->getVariable('ket_skd')->value['TUJUANSURAT']=='Untuk Keperluan Mendaftar Kerja'){?> selected <?php }?> value="Untuk Keperluan Mendaftar Kerja">Untuk Keperluan Mendaftar Kerja</option>
                    <option <?php if ($_smarty_tpl->getVariable('ket_skd')->value['TUJUANSURAT']==''){?> selected <?php }?> value="lainnya">Lainnya</option>
                </select>
                <br>
                <div id="formp" style="display:none">
                 <input type="text"    name="TUJUANSURAT2" style="width: 500px;"> 
                 </div> 
            </td>
        </tr>
        <tr>
            <td>
               Berat Badan
            </td>
            <td > <input type="text"  value="<?php echo $_smarty_tpl->getVariable('ket_skd')->value['FS_BB'];?>
"  name="FS_BB" style="width: 500px;">
            </td>
        </tr>
        <tr>
            <td>
               Tinggi Badan
            </td>
            <td > <input type="text" value="<?php echo $_smarty_tpl->getVariable('ket_skd')->value['FS_TB'];?>
"  name="FS_TB" style="width: 500px;">
            </td>
        </tr>
        <tr>
            <td>
               Tensi Darah  
            </td>
            <td > <input type="text" value="<?php echo $_smarty_tpl->getVariable('ket_skd')->value['FS_TD'];?>
" name="FS_TD" style="width: 500px;">
            </td>
        </tr>
        <tr>
            <td>
               Buta Warna  
            </td>
            <td > 
                <select style="width: 200px;" name="BUTA_WARNA">
                    <option></option>
                    <option <?php if ($_smarty_tpl->getVariable('ket_skd')->value['BUTA_WARNA']=='Ya'){?> selected <?php }?> value="Ya">Ya</option>
                    <option  <?php if ($_smarty_tpl->getVariable('ket_skd')->value['BUTA_WARNA']=='Tidak'){?> selected <?php }?> value="Tidak">Tidak</option>
                </select>
                 Kacamata   
                <select style="width: 200px;" name="KACAMATA">
                    <option></option>
                    <option   <?php if ($_smarty_tpl->getVariable('ket_skd')->value['BUTA_WARNA']=='Ya'){?> selected <?php }?> value="Ya">Ya</option>
                    <option  <?php if ($_smarty_tpl->getVariable('ket_skd')->value['BUTA_WARNA']=='Tidak'){?> selected <?php }?> value="Tidak">Tidak</option>
                </select>
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


<script>
    $("#dasar").change(function(){
    
        var dasar = $("#dasar").val();
      
            
                if($("#dasar").val() == "lainnya"){
                 
                     $("#formp").show();
                  
                  }
                
           
        });
      </script>