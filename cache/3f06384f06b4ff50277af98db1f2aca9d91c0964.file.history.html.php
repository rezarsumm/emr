<?php /* Smarty version Smarty-3.0.7, created on 2022-12-10 19:02:12
         compiled from "application/views\medis/rawat_jalan/history.html" */ ?>
<?php /*%%SmartyHeaderCode:180326394754449db65-92010565%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f06384f06b4ff50277af98db1f2aca9d91c0964' => 
    array (
      0 => 'application/views\\medis/rawat_jalan/history.html',
      1 => 1670673589,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180326394754449db65-92010565',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?>
<div class="breadcrum">
    <p>
        <a href="#">Pemeriksaan Medis</a><span></span>
        <small>History Pasien</small>
    </p>
    <div class="clear"></div>
</div>
<div class="navigation">
    <div class="navigation-button">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/');?>
"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/back-icon.png" alt="" />  Back</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>

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
        <td></td>
    </tr>
</table>
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
<table class="table-view" width="100%" border="0">
    <thead>
        <tr>
            <th width='10%'>Tanggal Kunjungan</th>

            <th>Dokter</th>
            <th>Layanan</th>
            <th>Catatan</th>
            <th>Status</th>
            <th width='24%'>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
      <?php $_smarty_tpl->tpl_vars['cek_labA'] = new Smarty_variable($_smarty_tpl->getVariable('m_rawat_jalan')->value->get_data_cek_lab_aja(array($_smarty_tpl->tpl_vars['data']->value['NO_REG'])), null, null);?>
        <?php $_smarty_tpl->tpl_vars['form_rm'] = new Smarty_variable($_smarty_tpl->getVariable('m_rawat_jalan')->value->get_berkas_by_rg(array($_smarty_tpl->tpl_vars['data']->value['NO_REG'])), null, null);?>
        <?php $_smarty_tpl->tpl_vars['cek_resepA'] = new Smarty_variable($_smarty_tpl->getVariable('m_rawat_jalan')->value->get_data_cek_resep_aja(array($_smarty_tpl->tpl_vars['data']->value['NO_REG'])), null, null);?>
        <?php $_smarty_tpl->tpl_vars['cek_konsulan'] = new Smarty_variable($_smarty_tpl->getVariable('m_rawat_jalan')->value->get_data_konsulan(array($_smarty_tpl->tpl_vars['data']->value['NO_REG'])), null, null);?>

                <tr <?php if (($_smarty_tpl->getVariable('no')->value++%2)!=1){?>class="blink-row"<?php }?>>
                    <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['TANGGAL'],"%d %B %Y");?>
</td>
                    
                    <td>
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['NAMA_DOKTER'];?>


                        <?php if ($_smarty_tpl->tpl_vars['data']->value['TANGGAL']==$_smarty_tpl->getVariable('noww')->value){?>
                           <?php if ($_smarty_tpl->getVariable('cek_konsulan')->value!=''){?>
                                 <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_KD_MEDIS']==$_smarty_tpl->getVariable('com_user')->value['user_name']){?>
                                    <?php  $_smarty_tpl->tpl_vars['cck'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cek_konsulan')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cck']->key => $_smarty_tpl->tpl_vars['cck']->value){
?>
                                     <br> <?php echo $_smarty_tpl->tpl_vars['cck']->value['NAMA_DOKTER'];?>

                                     <?php }} ?>
                                <?php }else{ ?> 
                                <?php }?>
                           <?php }else{ ?>
                           <?php }?>
                        <?php }else{ ?>

                          <?php if ($_smarty_tpl->tpl_vars['data']->value['KODE_RUANG']!=''){?>
                            <?php $_smarty_tpl->tpl_vars['visite'] = new Smarty_variable($_smarty_tpl->getVariable('m_rawat_jalan')->value->get_data_visite(array($_smarty_tpl->tpl_vars['data']->value['NO_REG'])), null, null);?>
                           <?php  $_smarty_tpl->tpl_vars['vst'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('visite')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['vst']->key => $_smarty_tpl->tpl_vars['vst']->value){
?>
                             <br><?php echo $_smarty_tpl->tpl_vars['vst']->value['NAMA_DOKTER'];?>

                            <?php }} ?>
                                <?php }?>
                        <br>
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['DOK2'];?>

                        <?php }?>
                    </td> 
                    <td>
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['SPESIALIS'];?>
<br>
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['LAYANAN2'];?>

                    </td> 
                    <td>
                        <?php if ($_smarty_tpl->getVariable('cek_labA')->value>='1'){?>
                        -  <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((((('rm/rawat_jalan/cetak_lab/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_FORM']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" >Hasil Laboratorium</a>
                          <br>
                        <?php }?>
                     
                        <?php if ($_smarty_tpl->getVariable('cek_resepA')->value>='1'){?>
                        - <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((((('rm/rawat_jalan/cetak_resep/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_FORM']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" >Resep</a>
                        <?php }?>
                    </td>
                    <td>
                        <center>
                            <b>
                                <?php if ($_smarty_tpl->tpl_vars['data']->value['KODE_RUANG']==''){?>
                                <div style="color: blue;">Rawat Jalan</div>
                                <?php }elseif($_smarty_tpl->tpl_vars['data']->value['KODE_RUANG']!=''){?>
                                <div style="color: green;">Rawat Inap</div>
                                <?php }?>
                            </b>
                        </center>
                    </td> 
                    <td>
                        <?php $_smarty_tpl->tpl_vars['x'] = new Smarty_variable($_smarty_tpl->getVariable('this')->value->com_user['user_name'], null, null);?>
                        <?php if ($_smarty_tpl->getVariable('form_rm')->value['att_name']!=''){?>
                            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('rm/upload/download/').($_smarty_tpl->getVariable('form_rm')->value['att_name']));?>
" class="button-download" target="_blank">Berkas Scan</a>  
                            <?php }?>
                       
                    
                          <?php if ($_smarty_tpl->tpl_vars['data']->value['KODE_RUANG']==''){?>
                             <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((((('rm/rawat_jalan/cetak_rm/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_FORM']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download">RM</a>

                           <?php }else{ ?>
                        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('rm/berkas/detail/').($_smarty_tpl->tpl_vars['data']->value['NO_REG']))===null||$tmp==='' ? '' : $tmp));?>
"  class="button-detail">Detail</a>             
                        <?php }?>
                        

                         
                        
                         <?php if ($_smarty_tpl->tpl_vars['data']->value['NO_REG']==$_smarty_tpl->tpl_vars['data']->value['MAX_RG']){?>
                      
                        <?php }else{ ?>
                        <?php }?>
                        

                         

                          <?php if (date('Y-m-d',strtotime($_smarty_tpl->tpl_vars['data']->value['TANGGAL']))==$_smarty_tpl->getVariable('now')->value){?> 
                      

                              <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('medis/rawat_jalan/add/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['MAX_RG']));?>
" class="button-edit">Copyy</a> 
                           

                            <!--  <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_KD_MEDIS']==$_smarty_tpl->getVariable('com_user')->value['user_name']){?> -->
                                  <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((((('medis/rawat_jalan/edit/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS_KP']));?>
" class="button-edit">Edit</a>
                            <!-- <?php }else{ ?> 
                            <?php }?> -->

                        
                        <?php }else{ ?> 
                        <?php }?>
                        
                       <!--  <?php if ($_smarty_tpl->tpl_vars['data']->value['NO_REG']==$_smarty_tpl->tpl_vars['data']->value['MAX_RG']&&($_smarty_tpl->tpl_vars['data']->value['FS_KD_MEDIS']==$_smarty_tpl->getVariable('com_user')->value['user_name'])){?>
                        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((((('medis/rawat_jalan/edit/').($_smarty_tpl->tpl_vars['data']->value['NO_REG'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS_KP']));?>
" class="button-edit">Edit</a>
                        <?php }else{ ?> 
                        <?php }?> -->
             

            </td>
            </tr>
        <?php }} ?>
    </tbody>
</table>
<script type="text/javascript">
    function view(data) {
        var att_name = data;
        $.getJSON("<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
index.php/rm/upload/view_file/" + data, function(result) {
            var output = "<embed src='<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
" + result['file'] + "#toolbar=0&navpanes=0&zoom=100' width='100%' height='750' />";
            document.getElementById("result").innerHTML = output;
        });
    }
</script>
