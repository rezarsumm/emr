<?php /* Smarty version Smarty-3.0.7, created on 2022-05-09 15:00:46
         compiled from "application/views\rm/berkas/detail.html" */ ?>
<?php /*%%SmartyHeaderCode:13946278ca2ebf8a82-20452569%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd35abebbd7cd2a523e6643480769877fe642a74' => 
    array (
      0 => 'application/views\\rm/berkas/detail.html',
      1 => 1652083244,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13946278ca2ebf8a82-20452569',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("nurse/rawat_jalan/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<div class="breadcrum">
    <p>
        <a href="#">Medical Record</a><span></span>
        <small>Berkas</small>
    </p>
    <div class="clear"></div>
</div>

<!-- notification template -->
<?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of notification template-->
<div class="dashboard-container">
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
            <td>
                
            </td>
        </tr>
       
    </table>
    <table class="table-view" width="100%" border="0">
        <thead>
            <tr>
                <th WIDTH="4%">No</th>
                <th>Nama Berkas</th>
               
            </tr>
        </thead>
        <tbody>
            
            
            <tr>
                <td>1</td>
                <td>
                     <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('result')->value['NO_REG'])).('/11'));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">
                    Asesmen Awal Medis
                     </a>
                     </td>
                
       
        </tr>
            <tr>
                <td>2</td>
                <td>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('result')->value['NO_REG'])).('/5'));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">
                    Asesmen Awal Keperawatan
                    </a>
                    </td>
       
        </tr>

           <tr>
            <td>2</td>
            <td>
                <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('result')->value['NO_REG'])).('/12'));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">
                Asesmen Awal Kebidanan
                </a>
                </td>
   
    </tr>
            
            <tr>
                <td>3</td>
                <td>
                     <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('result')->value['NO_REG'])).('/')).('7'));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">
                    Rencana Keperawatan
                    </a>
                </td>
                
       
        </tr>
            <tr>
                <td>4</td>
                <td>
                     <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('result')->value['NO_REG'])).('/')).('8'));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">
                    Tindakan Keperawatan
                    </a>
                </td>
                
       
        </tr>
            <tr>
                <td>5</td>
                <td>
                     <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('result')->value['NO_REG'])).('/3'));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">
                    Catatan Pemberian Obat
                     </a>
                     </td>
                
       
        </tr>
            <tr>
                <td>6</td>
                <td>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('result')->value['NO_REG'])).('/4'));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">
                    Catatan Edukasi
                    </a>
                    </td>
                
       
        </tr>
            <tr>
                <td>7</td>
                <td>
                     <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('result')->value['NO_REG'])).('/')).('6'));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">
                    Asesmen Jatuh
                     </a>
                     </td>
                
       
        </tr>
            <tr>
                <td>8</td>
                <td>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('result')->value['NO_REG'])).('/1'));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">
                    CPPT
                    </a>
                    </td>
                
       
        </tr>

          <?php if ($_smarty_tpl->getVariable('dataop')->value!='0'){?>
           <tr>
                <td>9</td>
                <td>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('rm/rawat_inap/cetak_rm_ok/').($_smarty_tpl->getVariable('result')->value['NO_REG'])).('/1'));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">

                  Catatan Operasi
                     </a>
                     </td>
                
        
        </tr>
          
                <?php }?>
           <!-- <tr>
                <td>9</td>
                <td>
                     <a href="#" class="button-download">
                    Asuhan Gizi
                     </a>
                     </td>
                
        
        </tr>-->
            <tr>
                <td>10</td>
                <td>
                    <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('form_rm')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                     <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('rm/berkas/download/').($_smarty_tpl->tpl_vars['data']->value['att_name']));?>
" class="button-download">
                         <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_JENIS_BERKAS']=='1'){?>
                         Form Scan
                         <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_JENIS_BERKAS']=='2'){?>
                         Rujukan
                         <?php }else{ ?>
                         Lain-Lain
                         <?php }?>
                     </a>
                    <br><br>
                    <?php }} ?>
                    
                   
                    
                     
                    
                     </td>
                
        
        </tr>
            <tr>
                <td>11</td>
                <td>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('result')->value['NO_REG'])).('/10'));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">
                    Hasil Penunjang Diagnosis
                    </a>
                    </td>
                
       
        </tr>
            <tr>
                <td>12</td>
                <td>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('result')->value['NO_REG'])).('/2'));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">
                    Resume Pasien Pulang
                    </a>
                </td>
            </tr>
            
            <!--<tr>
                <td>13</td>
                <td>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('result')->value['NO_REG'])).('/9'));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">
                    Rekonsiliasi Obat
                    </a>
                </td>
            </tr>
            
            <tr>
                <td>13</td>
                <td>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('result')->value['NO_REG'])).('/12'));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">
                    HHC
                    </a>
                </td>
            </tr>-->
       
        </tbody>
    </table>
</div>
