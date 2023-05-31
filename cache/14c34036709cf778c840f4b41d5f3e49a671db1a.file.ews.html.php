<?php /* Smarty version Smarty-3.0.7, created on 2022-07-06 11:30:19
         compiled from "application/views\igd/ews.html" */ ?>
<?php /*%%SmartyHeaderCode:2696562c50fdb7a05b1-62569872%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14c34036709cf778c840f4b41d5f3e49a671db1a' => 
    array (
      0 => 'application/views\\igd/ews.html',
      1 => 1655882684,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2696562c50fdb7a05b1-62569872',
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
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('igd/ews/add_process');?>
" method="post">
        <input name="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />

        <table class="table-info" width="100%">
            <tr class="headrow">
                <th colspan="4"></th>
            </tr>
            <tr>
                <td>NAMA</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NAMA_PASIEN'];?>

                </td>
                <td>TANGGAL LAHIR</td>
                <td>
                    <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('rs_pasien')->value['TGL_LAHIR'],"%d %b %Y");?>

                </td>
            </tr>
            <tr>
                <td>NO MR</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>

                </td>
             
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
                    <th colspan="4">Lembar Observasi Early Warning Score</th>
                </tr>
               
            <tr>
                <td>Tanggal Observasi</td>
                <td colspan="2">
                    <input name="TGL" type="text" size="50" maxlength="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FD_TGL_DICAPAI'])===null||$tmp==='' ? '' : $tmp);?>
" class="tanggal" style="text-align: center; width:100px ;" />
               Jam Observasi 
                    <input name="JAM" type="time" style="time" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FD_JAM_DICAPAI'])===null||$tmp==='' ? '' : $tmp);?>
"   maxlength="10" />
                </td>
            </tr>
            <tr>
                <td> Pernafasan  </td>
                <td colspan="2">
                    <input name="NAFAS" type="text" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FD_JAM_DICAPAI'])===null||$tmp==='' ? '' : $tmp);?>
"  maxlength="10" />
                </td>
            </tr>
            <tr>
                <td> Saturasi O2  </td>
                <td colspan="2">
                    <input name="O2" type="text" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FD_JAM_DICAPAI'])===null||$tmp==='' ? '' : $tmp);?>
"   maxlength="10" />
                   Alat Bantu O2  
                    <input name="AB" type="radio" value="Ya"  maxlength="10" />Ya
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
                <td>    Tekanan Darah Sistolik  </td>
                <td colspan="2">
                    <input name="TD" type="text" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FD_JAM_DICAPAI'])===null||$tmp==='' ? '' : $tmp);?>
"   maxlength="10" />
                </td>
            </tr>
            <tr>
                <td>   Kesadaran  </td>
                <td colspan="2">
                    <input name="SADAR" type="radio" value="A"   />A
                    <input name="SADAR" type="radio" value="P"   />P
                    <input name="SADAR" type="radio" value="V"   />V
                    <input name="SADAR" type="radio" value="U"   />U
                </td>
            </tr>

            <tr class="submit-box">
                <td colspan="4">
                   <!-- <div style="font-weight: bold;">
                    *Bismillahirohmanirrohim, saya dengan sadar dan penuh tanggung jawab mengisikan formulir ini dengan data yang benar
                </div>
                <br> -->
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