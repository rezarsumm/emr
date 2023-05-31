<?php /* Smarty version Smarty-3.0.7, created on 2023-05-25 10:41:26
         compiled from "application/views\igd/ews_anak.html" */ ?>
<?php /*%%SmartyHeaderCode:27624646ed8e67ecd29-76445096%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33d508588a3e12d6562ac5f297e7bcfe6004f707' => 
    array (
      0 => 'application/views\\igd/ews_anak.html',
      1 => 1658906183,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27624646ed8e67ecd29-76445096',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><!-- include javascript -->
 
<!-- end of include javascript-->
<div class="breadcrum">
    <p>
        <a href="#">Catatan Rawat igd</a><span></span>
       
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="content-entry">
    <!-- notification template --> 
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('igd/ews_anak/add_process');?>
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
                    <!-- <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('igd/kep/add_tindakan/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
" class="active">Tindakan Keperawatan</a></li> -->
                </ul>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        
        <div class="content-entry">
            <table class="table-input" width="100%">

                <tr class="headrow">
                    <th colspan="4">Lembar Observasi Early Warning Score Anak</th>
                </tr>
               
            <tr>
                <td>Tanggal Observasi</td>
                <td colspan="2">
                    <input name="TGL" type="date"  style="width:100px" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FD_TGL_DICAPAI'])===null||$tmp==='' ? '' : $tmp);?>
" class="tanggal" style="text-align: center; width:50px ;" />
                Jam Observasi 
                    <input name="JAM" type="time" style="time" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FD_JAM_DICAPAI'])===null||$tmp==='' ? '' : $tmp);?>
"   maxlength="10" />
                    </td>
            </tr>
           
            <tr>
                <td> Respirasi  </td>
                <td colspan="2">
                    <input name="NAFAS" type="text" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FD_JAM_DICAPAI'])===null||$tmp==='' ? '' : $tmp);?>
"  maxlength="10" />
                </td>
            </tr>
            <tr>
                <td> Retrakasi  </td>
                <td colspan="2">
                    <input name="RETRAKSI" type="radio" value="0"   />Normal <br>
                    <input name="RETRAKSI" type="radio" value="1"   />Ringan <br>
                    <input name="RETRAKSI" type="radio" value="2"   />Sedang <br>
                    <input name="RETRAKSI" type="radio" value="3"   />Parah
            </tr>

            <tr>
                <td> Saturasi O2  </td>
                <td colspan="2">
                    <input name="O2" type="text" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FD_JAM_DICAPAI'])===null||$tmp==='' ? '' : $tmp);?>
"   maxlength="10" />
                </td>
            </tr>

            <tr>
                <td> CRT  </td>
                <td colspan="2">
                    <input name="CRT" type="text" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FD_JAM_DICAPAI'])===null||$tmp==='' ? '' : $tmp);?>
"  maxlength="10" />
                </td>
            </tr>

            <tr>
                <td>    Alat Bantu O2  </td>
                <td colspan="2">
                    <input name="AB" type="radio" value="Ya"  maxlength="10" />Ya  <input name="AB2" type="text" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FD_JAM_DICAPAI'])===null||$tmp==='' ? '' : $tmp);?>
"  maxlength="10" /> <br>
                    <input name="AB" type="radio" value="Tidak"  maxlength="10" />Tidak
                </td>
            </tr>
            <tr>
                <td> Suhu    </td>
                <td colspan="2">
                    <input name="S" type="text" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FD_JAM_DICAPAI'])===null||$tmp==='' ? '' : $tmp);?>
"   maxlength="10" />
                </td>
            </tr>
            <tr>
                <td>   Denyut Jantung  </td>
                <td colspan="2">
                    <input name="J" type="text" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FD_JAM_DICAPAI'])===null||$tmp==='' ? '' : $tmp);?>
"   maxlength="10" />
                </td>
            </tr>
            <tr>
                <td>    Tekanan Darah  </td>
                <td colspan="2">
                    Sistol
                    <input name="TD" type="text"  style="width:40px ;"   maxlength="10" />/ diastol
                    <input name="D" type="text"    style="width:40px ;"  maxlength="10" />
                </td>
            </tr>
            <tr>
                <td>   Kesadaran  </td>
                <td colspan="2">
                    <input name="SADAR" type="radio" value="A"   />A (Sadar Penuh) <br>
                    <input name="SADAR" type="radio" value="P"   />P  (Respon Rangsangan Nyeri) <br>
                    <input name="SADAR" type="radio" value="V"   />V  (Respon dengan Kata-kata) <br>
                    <input name="SADAR" type="radio" value="U"   />U  (Tidak Respon)
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
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('igd/ews_anak/cetak/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'])).('/')).('15'));?>
" target="_blank"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/printer-icon.png" alt="" /> Print</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<table class="table-view" width="100%">
    <tr>
        <th width="5%">No</th>
        <!-- <th width="10%">Tanggal / Jam</th> -->
        <th>Respirasi</th>
       
        <th> O2</th>
        
        <th> Inspirasi 02</th>
       
        <th> Suhu</th>
        
        <th> Jantung</th>
       
        <th> TD Sistolik</th>
      
        <th> TD Diastol</th>
       
        <th width="10%">Waktu </th>
        <th width="10%">Frekuensi </th>
    </tr>
    <?php $_smarty_tpl->tpl_vars['no'] = new Smarty_variable(1, null, null);?>
    <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('result')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
   
    <tr> 
        <td><?php echo $_smarty_tpl->getVariable('no')->value++;?>
</td>
        <!-- <td><?php echo $_smarty_tpl->tpl_vars['data']->value['mdd'];?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['mdd_time'],'%H:%M');?>
</td> -->
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['NAFAS'];?>
</td> 
        <!-- <td><?php echo $_smarty_tpl->tpl_vars['data']->value['S_NAFAS'];?>
</td>  -->
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['O2'];?>
</td> 
        <!-- <td><?php echo $_smarty_tpl->tpl_vars['data']->value['S_O2'];?>
</td>  -->
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['AB'];?>
</td> 
        <!-- <td><?php echo $_smarty_tpl->tpl_vars['data']->value['S_AB'];?>
</td>  -->
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['S'];?>
</td> 
        <!-- <td><?php echo $_smarty_tpl->tpl_vars['data']->value['S_S'];?>
</td>  -->
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['J'];?>
</td> 
        <!-- <td><?php echo $_smarty_tpl->tpl_vars['data']->value['S_J'];?>
</td>  -->
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['TD'];?>
</td> 
        <!-- <td><?php echo $_smarty_tpl->tpl_vars['data']->value['S_TD'];?>
</td>  -->
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['D'];?>
</td> 
        <!-- <td><?php echo $_smarty_tpl->tpl_vars['data']->value['S_D'];?>
</td>  -->
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['TGL'];?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['JAM'],'%H:%M');?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FREKUENSI'];?>
</td> 
        
    </tr>
    <?php }} ?>
     
</table>