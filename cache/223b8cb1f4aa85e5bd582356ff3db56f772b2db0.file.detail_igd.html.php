<?php /* Smarty version Smarty-3.0.7, created on 2022-10-12 15:08:36
         compiled from "application/views\rm/berkas/detail_igd.html" */ ?>
<?php /*%%SmartyHeaderCode:287863467604582ca7-24347232%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '223b8cb1f4aa85e5bd582356ff3db56f772b2db0' => 
    array (
      0 => 'application/views\\rm/berkas/detail_igd.html',
      1 => 1665562114,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '287863467604582ca7-24347232',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?> 
<div class="breadcrum">
    <p>
        <a href="#">Medical Record</a><span></span>
        <small>Berkas</small>
    </p>
    <div class="clear"></div>
</div>
 
<div class="dashboard-container" style="margin:30px; font-size: 15px;">

    <table class="table-info" width="80%">
        <tr class="headrow">
            <th colspan="4"> <h3>Data Pasien</h3></th>
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


<div class="row">
    <div class="col-md-6">
    
         <table class="table-view" width="80%" border="0" style="font-size: 13px;">
        <thead>
            <tr>
              
                <th>Nama Berkas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody> 
            <!-- <tr>
              
                <td>
                     <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('rm/rawat_jalan/cetak_rm/').($_smarty_tpl->getVariable('result')->value['NO_REG'])).('/11'));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">
                    Asesmen IGD
                     </a>
                     </td>
                
                    </tr>
            <tr> -->
               
                <td>  Asesmen Awal Medis Rawat Inap    </td> 
                 <td> 
                    <?php if ($_smarty_tpl->getVariable('ases_medis')->value['mdd']!=''){?>

                         <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('result')->value['NO_REG'])).('/11'));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"> Cetak 
                        </a>
                    <?php }?>

                    <?php if ($_smarty_tpl->getVariable('ases_medis')->value['mdd']>=$_smarty_tpl->getVariable('tgl_kemarin')->value||$_smarty_tpl->getVariable('com_user')->value['role_nm']=='Admin E-MR'){?>   
                            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('medis/rawat_inap/edit_umum/').($_smarty_tpl->getVariable('ases_medis')->value['FS_KD_REG']))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit"> Edit</a> 
                    <?php }?>
                </td> 
                 </tr>
            <tr> 
                
                <td>   Asesmen Awal Keperawatan Rawat Inap   </td>
                <td>
                    <?php if ($_smarty_tpl->getVariable('ases_perawat')->value['mdd']!=''){?>


                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('result')->value['NO_REG'])).('/5'));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"> Cetak </a>

                    <?php }?>
                    <?php if ($_smarty_tpl->getVariable('ases_perawat')->value['mdd']>=$_smarty_tpl->getVariable('tgl_kemarin')->value||$_smarty_tpl->getVariable('com_user')->value['role_nm']=='Admin E-MR'){?>   
                        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('inap/ass_awal/edit/').($_smarty_tpl->getVariable('ases_perawat')->value['FS_KD_REG']))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit"> Edit</a> 
                    <?php }?>

                </td></tr>
           <tr>
           
            <td>  Asesmen Awal Kebidanan Rawat Inap  </td> 
                <td>
                    <?php if ($_smarty_tpl->getVariable('ases_bidan')->value['mdd']!=''){?>

                         <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('result')->value['NO_REG'])).('/12'));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"> Cetak </a>

                     <?php }?>

                    <?php if ($_smarty_tpl->getVariable('ases_bidan')->value['mdd']>=$_smarty_tpl->getVariable('tgl_kemarin')->value||$_smarty_tpl->getVariable('com_user')->value['role_nm']=='Admin E-MR'){?>   
                        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('inap/ass_awal_bidan/edit/').($_smarty_tpl->getVariable('ases_bidan')->value['FS_KD_REG']))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit"> Edit</a> 
                    <?php }?>

                </td>
            </tr>
            
            <tr>
               
                <td>   Rencana Keperawatan  </td> 
                <td>  
                    
                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('rm/berkas/detail_rencana/').($_smarty_tpl->getVariable('result')->value['NO_REG']))===null||$tmp==='' ? '' : $tmp));?>
"  class="button-show">Detail</a>  
                 
       
                </td>
            </tr>
            <tr>
              
                <td>   Tindakan Keperawatan   </td>
                <td>  
                  
                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('rm/berkas/detail_tindakan/').($_smarty_tpl->getVariable('result')->value['NO_REG']))===null||$tmp==='' ? '' : $tmp));?>
"  class="button-show">Detail</a>  
                 
       
                </td>
            </tr>
            <tr>
               
                <td>   Catatan Pemberian Obat    </td>
                     <td>  
                         
                        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('rm/berkas/detail_obat/').($_smarty_tpl->getVariable('rencana')->value['FS_KD_REG']))===null||$tmp==='' ? '' : $tmp));?>
"  class="button-show">Detail</a>  
                       
           
                    </td>
                 </tr>

           
               
                <td>  CPPT  </td>
                    <td>  
                          
                        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('rm/berkas/detail_cppt/').($_smarty_tpl->getVariable('result')->value['NO_REG']))===null||$tmp==='' ? '' : $tmp));?>
"  class="button-show">Detail</a>  
                       
           
                    </td>
                 </tr>

                 <tr>
              
                    <td>  Catatan Edukasi 
                        </td>
                        <td> 
                             <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('result')->value['NO_REG'])).('/4'));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"> Cetak
                            </a>
                          </td>
                      </tr>
                <tr>

                <tr> 
                 <td>  EWS
                        </td>
                        <td> 
                             <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('rm/berkas/detail_ews/').($_smarty_tpl->getVariable('result')->value['NO_REG']))===null||$tmp==='' ? '' : $tmp));?>
"  class="button-show">Detail</a>    </td>
                      </tr>
                <tr>
                   
                    <td>  Asesmen Jatuh  
                         </td> 
                    <td>

                         <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('result')->value['NO_REG'])).('/')).('6'));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"> Cetak </a>
                        </td>
                      

                    </tr>

                      <tr>
                   
                    <td>  Rencana Pulang Pasien   
                         </td> 
                    <td>
                        <?php if ($_smarty_tpl->getVariable('rencana_pulang')->value['MDD']!=''){?>
                         <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('igd/ews/cetak_pulang/').($_smarty_tpl->getVariable('result')->value['NO_REG'])).('/')).('6'));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"> Cetak </a>
                        </td>
                      <?php }?>

                    </tr>

                <tr>


                  <?php if ($_smarty_tpl->getVariable('dataop')->value!='0'){?>
           <tr>
                
                <td>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('rm/rawat_inap/cetak_rm_ok/').($_smarty_tpl->getVariable('result')->value['NO_REG'])).('/1'));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">

                  Catatan Operasi
                     </a>
                     </td></tr>
          
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
               
                <td> Hasil laboratorium dan Radiologi </td>
                <td>

                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('result')->value['NO_REG'])).('/10'));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"> Cetak </a>
                </td>
                   
                </tr>
            <tr>
                
                <td>  Resume Pasien Pulang     </td>
                <td>
                    <?php if ($_smarty_tpl->getVariable('rs_resume')->value['mdd_update']!=''){?>


                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('result')->value['NO_REG'])).('/2'));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"> Cetak </a>
                    <?php }?>
                    <?php if ($_smarty_tpl->getVariable('rs_resume')->value['mdd_update']>=$_smarty_tpl->getVariable('tgl_kemarin')->value||$_smarty_tpl->getVariable('com_user')->value['role_nm']=='Admin E-MR'){?>   
                        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('inap/resume/edit/').($_smarty_tpl->getVariable('rs_resume')->value['FS_KD_REG']))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit"> Edit</a> 
                    <?php }?>
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
    <div class="col-md-6">

        <br><br> 
        File Scan 
        <table class="table-view" width="80%" border="0">
            <thead>
                <tr>
                    <th width='10%'>Tanggal Upload</th>
                    <th>Kode Reg</th>
                    <th>Jenis Berkas</th>
                    <th>Nama Berkas</th>
                    <th width='10%'>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_berkas')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                <tr>
                    <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['mdd'],"%d %B %Y");?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'];?>
</td>
                    <td>
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_JENIS_BERKAS']=='1'){?>
                        Form Scan
                        <?php }elseif($_smarty_tpl->tpl_vars['data']->value['FS_JENIS_BERKAS']=='2'){?>
                        Rujukan
                        <?php }?>
                    </td> 
                    <td align='center'>
                        <a class="button-approve" href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('rm/upload/download/').($_smarty_tpl->tpl_vars['data']->value['att_name']))===null||$tmp==='' ? '' : $tmp));?>
">
                            <b><?php echo $_smarty_tpl->tpl_vars['data']->value['att_name'];?>
</b>
                        </a>
                    </td>
                    <td>
            <center>
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/upload/delete_process/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG']));?>
" onclick="return confirm('Tenan Meh Mbok Hapus???');" class="button-hapus">Hapus</a>
            </center>     
            </td>
            </tr>
            <?php }} ?>
            </tbody>
        </table>
      </div>
    </div>
</div>
