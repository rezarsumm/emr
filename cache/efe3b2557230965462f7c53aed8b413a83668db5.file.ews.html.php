<?php /* Smarty version Smarty-3.0.7, created on 2022-10-15 10:19:06
         compiled from "application/views\rm/berkas/ews.html" */ ?>
<?php /*%%SmartyHeaderCode:26144634a26aa49f068-87419808%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'efe3b2557230965462f7c53aed8b413a83668db5' => 
    array (
      0 => 'application/views\\rm/berkas/ews.html',
      1 => 1665717803,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26144634a26aa49f068-87419808',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?> 
<div class="breadcrum">
    <p>
        <a href="#">Catatan Rawat Inap</a><span></span>
       
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="content-entry"> 
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ews/add_process');?>
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
           
</form>
</div> 
EWS Dewasa
<br>
<br>
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
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('igd/ews/cetak/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'])).('/')).('15'));?>
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
        <th>Nafas</th>
        <th>Skor Nafas</th>
        <th> O2</th>
        <th> Skor O2</th>
        <th> Alat Bantu</th>
        <th>Skor  Alat Bantu</th>
        <th> Suhu</th>
        <th> Skor Suhu</th>
        <th> Jantung</th>
        <th> SkorJantung</th>
        <th> TD Sistolik</th>
        <th> Skor TD Sistolik</th>
        <th> Kesadaran</th>
        <th>Skor Kesadaran</th>
        <th width="10%">Waktu Tindakan</th>
    </tr>
    <?php $_smarty_tpl->tpl_vars['no'] = new Smarty_variable(1, null, null);?>
    <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ews_dewasa')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['S_NAFAS'];?>
</td> 
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['O2'];?>
</td> 
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['S_O2'];?>
</td> 
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['AB'];?>
</td> 
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['S_AB'];?>
</td> 
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['S'];?>
</td> 
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['S_S'];?>
</td> 
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['J'];?>
</td> 
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['S_J'];?>
</td> 
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['TD'];?>
</td> 
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['S_TD'];?>
</td> 
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['SADAR'];?>
</td> 
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['S_SADAR'];?>
</td> 
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['TGL'];?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['JAM'],'%H:%M');?>
</td>
        
    </tr>
    <?php }} ?>
     
</table>


<br><br> EWS Anak <br><br>
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
 $_from = $_smarty_tpl->getVariable('ews_anak')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
<br><br>EWS Ibu Hamil

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
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('igd/ews_hamil/cetak/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'])).('/')).('15'));?>
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
 $_from = $_smarty_tpl->getVariable('ews_hamil')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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