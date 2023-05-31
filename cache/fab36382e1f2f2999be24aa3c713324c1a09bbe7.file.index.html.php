<?php /* Smarty version Smarty-3.0.7, created on 2022-12-12 06:57:44
         compiled from "application/views\rm/berkas/index.html" */ ?>
<?php /*%%SmartyHeaderCode:991563966e78a0d926-24846794%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fab36382e1f2f2999be24aa3c713324c1a09bbe7' => 
    array (
      0 => 'application/views\\rm/berkas/index.html',
      1 => 1670803059,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '991563966e78a0d926-24846794',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?> <?php $_template = new Smarty_Internal_Template("nurse/rawat_jalan/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<div class="breadcrum">
    <p>
        <a href="#">Medical Record</a><span></span>
        <small>Berkas</small>
    </p>
    <div class="clear"></div>
</div>
<div class="search-box">
    <h3><a href="#">Search</a></h3>
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('rm/berkas/proses_cari');?>
" method="post">
        <table class="table-search" width="100%">
            <tr>
                <th width="10%" aligh="left">No Rekam Medis</th>
                <td width="90%">
                    <input name="FS_MR" value="<?php echo $_smarty_tpl->getVariable('search')->value['FS_MR'];?>
" size="25" style="text-align: center;" maxlength="15"/>
                    <!-- <select name="FS_KD_JENIS_REG">
                        <option value='J' <?php if ($_smarty_tpl->getVariable('search')->value['FS_KD_JENIS_REG']=='J'){?> selected="" <?php }?>> Rawat Jalan</option>
                        <option value='I' <?php if ($_smarty_tpl->getVariable('search')->value['FS_KD_JENIS_REG']=='I'){?> selected="" <?php }?>> Rawat Inap</option>
                        <option value='G' <?php if ($_smarty_tpl->getVariable('search')->value['FS_KD_JENIS_REG']=='G'){?> selected="" <?php }?>> Rawat Darurat</option>
                    </select>-->
                    <input name="save" type="submit" value="Tampilkan" />
                    <input name="save" type="submit" value="Reset" />
                </td>
            </tr>
        </table>
    </form>
</div>

<!-- notification template -->
<?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of notification template-->
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
            <li><a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('rm/rawat_jalan/resume/').($_smarty_tpl->getVariable('result')->value['NO_MR']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/printer-icon.png" alt="" /> Profil Ringkas Medis Rawat Jalan</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
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
                <th width='9%'>Tanggal </th>
                <th>Kode Reg</th>
                <th>Dokter</th>
                <th>Layanan</th>
                <th>Status</th>
                <th width='35%'>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
            <!--<?php $_smarty_tpl->tpl_vars['form_rm'] = new Smarty_variable($_smarty_tpl->getVariable('m_rawat_jalan')->value->get_berkas_by_rg(array($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])), null, null);?>-->
            <tr>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['TANGGAL'],"%d %b %Y");?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['TGL_KELUAR'],"%d %B %Y");?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['NO_REG'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMA_DOKTER'];?>
  </td> 
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMA_RUANG'];?>
</td> 
                <td>
        <center>
            <b>
                <?php if ($_smarty_tpl->tpl_vars['data']->value['MEDIS']=='RAWAT JALAN'){?>
                <div style="color: blue;">Rawat Jalan</div>
                <?php }else{ ?>
                <div style="color: green;">Rawat Inap </div>
                <?php }?>
            </b>
        </center>
        </td>  
        <td>

           
           
            <?php if ($_smarty_tpl->tpl_vars['data']->value['KODEREKANAN']=='032'){?>
                 <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_jalan/lembar_verif/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->getVariable('search')->value['FS_NO_MR']));?>
" class="button-download">  Verif</a>
             <?php }?>



            <?php if ($_smarty_tpl->tpl_vars['data']->value['MEDIS']=='RAWAT JALAN'){?> 
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/berkas/file/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->getVariable('search')->value['FS_KD_PEG']));?>
" class="button-download"> Scan</a>
                <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((((('rm/rawat_jalan/cetak_rm/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_FORM']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">RM</a>

            

           <?php }else{ ?>
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('rm/berkas/detail/').($_smarty_tpl->tpl_vars['data']->value['NO_REG']))===null||$tmp==='' ? '' : $tmp));?>
"  class="button-info">Detail</a>             
            <?php }?>


             
            <!-- <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_CARA_PULANG']=='2'){?>
                    <a  href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_jalan/cetak_skdp/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">SKDP</a>
                    <?php }else{ ?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_CARA_PULANG']=='1'){?>
                    <a  href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_jalan/cetak_prb/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">PRB</a>
                    <?php }else{ ?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_CARA_PULANG']=='4'){?>
                    <a  href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_jalan/cetak_rujukan/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">Rujukan RS</a>
                    <?php }else{ ?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_TERAPI']==''||$_smarty_tpl->tpl_vars['data']->value['FS_TERAPI']=='<p>-</p>'){?>
                    <?php }else{ ?>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('medis/rawat_jalan/cetak_resep/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-edit">Resep</a>
                    <?php }?> -->

                   
                       
        </td>
        </tr>
        <?php }} ?>
        </tbody>
    </table>
</div>
