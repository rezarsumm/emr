<?php /* Smarty version Smarty-3.0.7, created on 2022-10-18 13:36:06
         compiled from "application/views\rm/berkas/cppt.html" */ ?>
<?php /*%%SmartyHeaderCode:3751634e49567adc31-89859367%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99a520044f3679d5ffcfe6dd70d094c13211f2fd' => 
    array (
      0 => 'application/views\\rm/berkas/cppt.html',
      1 => 1666074298,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3751634e49567adc31-89859367',
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
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/cppt/');?>
">CPPT</a><span></span>
    
    </p>
    <div class="clear"></div>
</div> 
<div class="content-entry"> 
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/cppt/add_process2');?>
" method="post" onkeypress="return event.keyCode != 13">
        <input name="FS_KD_REG" id="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />
        <input name="FS_KD_LAYANAN" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['KODE_BANGSAL'];?>
" />
        <input name="FS_KD_PETUGAS_MEDIS" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_medis'];?>
" />
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
            <li> <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'])).('/1'));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">
                  <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/printer-icon.png" alt="" /> Print</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
        <table class="table-info" width="100%">
            <tr class="headrow">
                <th colspan="4">  CPPT</th>
            </tr>
            <tr>
                <td>NAMA</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NAMA_PASIEN'];?>

                </td>
            
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
           
                <td>ALAMAT</td>
                <td><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['ALAMAT'];?>
</td>
            </tr>
            <tr>
                <td>UMUR</td>
                <td><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fn_umur'];?>
 tahun</td>
            </tr>
        </table>
      
       
    </form>
</div>
 



<table class="table-view" width="100%">
    <tr class="headrow">
        <th colspan="6">List CPPT </th>
    </tr>
    <tr>
        <th width="7%">Tanggal</th>
        <th>SOAP/ADIME/SBAR</th>
        <th width="15%">PPA</th>          
        <th width="10%">Aksi</th>
    </tr>
    <?php  $_smarty_tpl->tpl_vars['cppt'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_cppt')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cppt']->key => $_smarty_tpl->tpl_vars['cppt']->value){
?>
     <tr  <?php if (($_smarty_tpl->tpl_vars['cppt']->value['TGL']%2)!=1&&$_smarty_tpl->tpl_vars['cppt']->value['role_id']=='5'||$_smarty_tpl->tpl_vars['cppt']->value['role_id']=='9'){?>
        style="background-color:#ffe6ff;color:red;"
        <?php }elseif(($_smarty_tpl->tpl_vars['cppt']->value['TGL']%2)!=1&&$_smarty_tpl->tpl_vars['cppt']->value['role_id']=='11'){?>
        style="background-color:#ffe6ff;color:green;"
        <?php }elseif(($_smarty_tpl->tpl_vars['cppt']->value['TGL']%2)!=1&&$_smarty_tpl->tpl_vars['cppt']->value['role_id']=='12'){?>
        style="background-color:#ffe6ff;color:blue;"
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['cppt']->value['role_id']=='5'||$_smarty_tpl->tpl_vars['cppt']->value['role_id']=='9'){?>
        style="color:red;"
        <?php }elseif($_smarty_tpl->tpl_vars['cppt']->value['role_id']=='11'){?>
        style="color:green;"
        <?php }elseif($_smarty_tpl->tpl_vars['cppt']->value['role_id']=='12'){?>
        style="color:blue;"
        <?php }?>
         
        >
        <td> 
            <?php echo $_smarty_tpl->tpl_vars['cppt']->value['mdd_date'];?>
/<?php echo $_smarty_tpl->tpl_vars['cppt']->value['mdd_time'];?>

           
        </td>
        <td>
            S / A / S : <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['cppt']->value['FS_CPPT_S']);?>
<br>
            O / D / B : <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['cppt']->value['FS_CPPT_O']);?>
<br>
            A / I / A : <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['cppt']->value['FS_CPPT_A']);?>
<br>
            P / ME / R : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['FS_CPPT_P'];?>
<br>
            Resep :  <br> 
             <?php echo $_smarty_tpl->tpl_vars['cppt']->value['FS_CPPT_TERAPI'];?>

         
          <?php if ($_smarty_tpl->tpl_vars['cppt']->value['FS_LAB']!=''){?> 
               <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('lab/lab_inap/cetak_plab/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">Permintaan Lab </a>
               <?php }?>

                 <?php if ($_smarty_tpl->tpl_vars['cppt']->value['FS_RAD']!=''){?> 
               <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('rad/rad_inap/cetak_prad/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">Permintaan Radiologi </a>
               <?php }?>
            <hr>
           
        </td>
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['NAMALENGKAP'];?>
</td>
        
        <?php if ($_smarty_tpl->getVariable('role_id')->value=='12'||$_smarty_tpl->getVariable('role_id')->value=='6'){?>
        <!-- <td>
            
        </td> -->
        <?php }else{ ?>
        <?php }?>
        <?php if ($_smarty_tpl->getVariable('role_id')->value=='5'||$_smarty_tpl->getVariable('role_id')->value=='6'||$_smarty_tpl->getVariable('role_id')->value=='9'){?>
        <!-- <td>

            <?php if ($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_MEDIS_VERIF_DATE']=='3000-01-01'&&$_smarty_tpl->tpl_vars['cppt']->value['mdb']!=$_smarty_tpl->getVariable('com_user')->value['user_name']){?>
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('inap/cppt/verif/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_TRS']));?>
" class="button-download">Verifikasi</a>  
            <?php }else{ ?>
            DOKTER : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['FS_NM_MEDIS_VERIF'];?>
<br><br>
            CATATAN : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['FS_KET_VERIF'];?>
 <br><br>
              <?php if ($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_MEDIS_VERIF_DATE']=='3000-01-01'){?>
                 <?php }else{ ?>

                  <?php echo $_smarty_tpl->tpl_vars['cppt']->value['FS_KD_MEDIS_VERIF_DATE'];?>
<br><?php echo $_smarty_tpl->tpl_vars['cppt']->value['FS_KD_MEDIS_VERIF_TIME'];?>

                  <?php }?>
            <?php }?>
        </td> -->
        <?php }else{ ?>
        <?php }?>
       <td>  
         <?php if ($_smarty_tpl->tpl_vars['cppt']->value['mdd_date']>=$_smarty_tpl->getVariable('tgl_kemarin')->value||$_smarty_tpl->getVariable('com_user')->value['role_nm']=='Admin E-MR'){?>
            <?php if ($_smarty_tpl->getVariable('role_id')->value=='5'||$_smarty_tpl->getVariable('role_id')->value=='6'||$_smarty_tpl->getVariable('role_id')->value=='9'){?>
            
                <?php if ($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_MEDIS_VERIF_DATE']=='3000-01-01'&&$_smarty_tpl->tpl_vars['cppt']->value['mdb']!=$_smarty_tpl->getVariable('com_user')->value['user_name']){?>
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('inap/cppt/verif/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_TRS']));?>
" class="button-download">Verifikasi</a>  
                <?php }else{ ?>
                DOKTER : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['FS_NM_MEDIS_VERIF'];?>
<br><br>
                CATATAN : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['FS_KET_VERIF'];?>
 <br><br>
                <?php if ($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_MEDIS_VERIF_DATE']=='3000-01-01'){?>
                    <?php }else{ ?>

                    <?php echo $_smarty_tpl->tpl_vars['cppt']->value['FS_KD_MEDIS_VERIF_DATE'];?>
<br><?php echo $_smarty_tpl->tpl_vars['cppt']->value['FS_KD_MEDIS_VERIF_TIME'];?>

                    <?php }?>
                <?php }?>
             
            <?php }?>
                 <?php if ($_smarty_tpl->getVariable('x')->value==$_smarty_tpl->tpl_vars['cppt']->value['mdb']){?>
                    <br><br><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((((('inap/cppt/edit/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_TRS'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->getVariable('data')->value['FS_KD_TRS_KP']));?>
" class="button-edit">  Edit</a><br><br>
                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((((('inap/cppt/delete/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_TRS'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->getVariable('data')->value['FS_KD_TRS_KP']));?>
" class="button-hapus">  Hapus</a><br>
                 <?php }?>
        <?php }?>
       </td>
    </tr>
    <?php }} ?>
</table>
 


 
