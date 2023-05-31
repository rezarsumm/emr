<?php /* Smarty version Smarty-3.0.7, created on 2022-02-18 10:13:11
         compiled from "application/views\inap/ass_awal_bidan/hamil2.html" */ ?>
<?php /*%%SmartyHeaderCode:16454620f0ec787cf52-80394999%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0227310ee14082a45e4a87a9853e15d141eb3b1a' => 
    array (
      0 => 'application/views\\inap/ass_awal_bidan/hamil2.html',
      1 => 1645153968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16454620f0ec787cf52-80394999',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><!-- include javascript -->
<?php $_template = new Smarty_Internal_Template("inap/ass_awal_bidan/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of include javascript-->
<div class="breadcrum">
    <p>
        <a href="#">Data Arsip</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal_bidan/cari');?>
">Asesmen Awal Kebidanan Rawat Inap</a><span></span>
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div>

<div class="head-content">
    <div class="head-content-nav">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/ass_awal_bidan/edit/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
" >Asesmen</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/ass_awal_bidan/riwayat_hamil/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
" class="active"> Riwayat Kehamilan</a></li>
        </ul>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>


<div class="navigation">
    <div class="navigation-button">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal_bidan/');?>
"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/back-icon.png" alt="" />  Back</a></li>
        </ul>
    </div>
    <div class="clear"></div> 
</div>
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
  <!--   <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal_bidan/add_process');?>
" method="post">
        <input type="hidden" name="FS_KD_REG" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <input type="hidden" name="FS_KD_MEDIS" value="<?php echo $_smarty_tpl->getVariable('FS_KD_MEDIS')->value;?>
" />
        <input type="hidden" name="FS_KD_LAYANAN" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['KODE_BANGSAL'];?>
" />
        <input type="hidden" name="FS_MR" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" /> -->

        <table class="table-info" width="100%">
            <tr class="headrow">
                <th colspan="2">Add Asesmen Awal Kebidanan Rawat Inap</th>
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
       <table class="table-info" width="100%">
           <thead>
             <tr>
                <th>No</th>
                <th>Tanggal Partus</th>
                <th>Tempat Partus</th>
                <th>Usia Kehamilan</th>
                <th>Jenis Persalinan</th>
                <th>Penolong Persalinan</th>
                <th>  Penyulit</th>
                <th>  Anak JK/BB</th>
                <th>  Keadaan Anak Sekarang</th>
                <th>   Aksi  </th>
            </tr>
            </thead>
            <tbody> 
<?php $_smarty_tpl->tpl_vars['no'] = new Smarty_variable(1, null, null);?>
    <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data_hamil')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>   
    
    <tr> 
        <td><?php echo $_smarty_tpl->getVariable('no')->value;?>
 </td>  
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['TGL_PARTUS'];?>
</td>  
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['TEMPAT_PARTUS'];?>
</td>  
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['USIA_HAMIL'];?>
</td>  
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['JENIS_LAHIRAN'];?>
</td>  
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['PENOLONG_LAHIRAN'];?>
</td>  
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['PENYULIT'];?>
</td>  
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['ANAK_JK_BB'];?>
</td>  
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['KEADAAN_ANAK_NOW'];?>
</td> 
        <td>
           <a href="javascript:;" class="btn-red item_hapus" style="background-color: yellow;" data="<?php echo $_smarty_tpl->tpl_vars['data']->value['FS_KD_RIWAYAT_HAMIL'];?>
">Hapus</a>

         </td>  
    </tr>
    <?php $_smarty_tpl->tpl_vars['no'] = new Smarty_variable($_smarty_tpl->getVariable('no')->value+1, null, null);?>
   <?php }} ?>

                 
 
 </tbody>
        </table>
    <a href="javascript:;" class="btn-blue item_add">Tambah Data</a>

<!-- <button class="btn btn-primary btn-sm fa fa-pencil" data-toggle="modal" data-target="#tambahanakModal"> Tambah Data </button> -->
        <br><br>
  
<!--     </form> -->
 

</div>


<div id="ModalAdd">
    <div class="modal-dialog">
        <div class="modal-content">
           <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal_bidan/add_process_hamil2');?>
" method="post">
                <input type="hidden" name="FS_KD_REG" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
                <input type="hidden" name="FS_MR" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />
             <table class="table-input" width="100%">
                <tr >
                    <th colspan="2">Tambah Data Riwayat Kehamilan <span id="loading">LOADING...</span></th>
                </tr>

                  <tr>
                    <td>Tanggal Partus</td>
                    <td>
                        <input name="TGL_PARTUS"  class="form-control" type="date"  ></td>
                     <!--    <em style="color:red;">* Masukkan Angka</em> -->
                </tr>

                <tr>
                    <td>Tempat Partus</td>
                    <td>
                        <input name="TEMPAT_PARTUS"  class="form-control" type="text"  ></td>
                     <!--    <em style="color:red;">* Masukkan Angka</em> -->
                </tr>

                  <tr>
                    <td>Usia Kehamilan</td>
                    <td>
                        <input name="USIA_HAMIL"  class="form-control" type="text"  ></td>
                     <!--    <em style="color:red;">* Masukkan Angka</em> -->
                </tr>

                 <tr>
                    <td>Jenis Lahiran</td>
                    <td>
                        <input name="JENIS_LAHIRAN"  class="form-control" type="text"  ></td>
                     <!--    <em style="color:red;">* Masukkan Angka</em> -->
                </tr>

                 <tr>
                    <td>Penolong Lahiran</td>
                    <td>
                        <input name="PENOLONG_LAHIRAN"  class="form-control" type="text"  ></td>
                     <!--    <em style="color:red;">* Masukkan Angka</em> -->
                </tr>

                 <tr>
                    <td>Penyulit Lahiran</td>
                    <td>
                        <input name="PENYULIT"  class="form-control" type="text"  ></td>
                     <!--    <em style="color:red;">* Masukkan Angka</em> -->
                </tr>

                 <tr>
                    <td> Anak JK/BB</td>
                    <td>
                        <input name="ANAK_JK_BB"  class="form-control" type="text"  ></td>
                     <!--    <em style="color:red;">* Masukkan Angka</em> -->
                </tr>
                  <tr>
                    <td>Keadaan Anak Saat Ini </td>
                    <td>
                        <input name="KEADAAN_ANAK_NOW"  class="form-control" type="text"  ></td>
                     <!--    <em style="color:red;">* Masukkan Angka</em> -->
                </tr>
 
              

                <tr class="submit-box">
                    <td colspan="2">
                        <input type="submit" name="save" value="Simpan" class="edit-button"/>
                         </td>
                </tr>
            
            </table>
</form>
        </div>
    </div>
</div>


<div id="ModalHapus">
    <table class="table-input" width="100%">
        <tr>
            <th colspan="2">Hapus Data  </th>
        </tr>
        <tr>
        <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal_bidan/hapus_anak2');?>
" method="post">
                <input type="hidden" name="FS_KD_REG" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
                <input type="hidden" name="FS_MR" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />
           <input type="hidden" name="FS_KD_RIWAYAT_HAMIL" id="FS_KD_RIWAYAT_HAMIL" value="" />
                  <input type="submit" name="save" value="Hapus" class="edit-button"/>
               
            </form>
        </tr>

    </table>
</div>


<script type="text/javascript">
    
      $(".item_add").click(function () {
            $("#ModalAdd").dialog('open');
        });


        $(".item_hapus").click(function () {
              var id = $(this).attr('data');
            $("#ModalHapus").dialog('open');
            $('[name="FS_KD_RIWAYAT_HAMIL"]').val(id);
        });

   $("#loading").hide();

       $("#ModalAdd").dialog({
            autoOpen: false,
            resizable: false,
            height: 400,
            width: 700,
            modal: true
        });

         $("#ModalHapus").dialog({
            autoOpen: false,
            resizable: false,
            height: 200,
            width: 400,
            modal: true
        });

</script>
  