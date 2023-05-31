<?php /* Smarty version Smarty-3.0.7, created on 2023-05-31 10:38:31
         compiled from "application/views\igd/daftar.html" */ ?>
<?php /*%%SmartyHeaderCode:3067262be66b85ddda6-46959618%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a60d190f1be0c831586bbfcf9e79f587ac7d18d' => 
    array (
      0 => 'application/views\\igd/daftar.html',
      1 => 1685501796,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3067262be66b85ddda6-46959618',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<html>
    
<head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>

</head>
<body>
    <br> 
    
  <p style="font-size: 19px;">  Data Pengantar Pendaftaran Rawat Jalan dan Rawat Inap </p>
<?php if ($_smarty_tpl->getVariable('rolenya')->value!='IGD'){?> 
 
  <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('igd/ppdftr/add');?>
"> <button class="btn btn-success btn-xs fa fa-pencil"> Tambah Data </button></a> 

         <!--    <button class="btn btn-success btn-xs fa fa-pencil" data-toggle="modal" data-target="#tambahanakModal"> Tambah Data  </button> -->
 
   
<?php }?>
 <br>
 <br>
<div class="dashboard-container">
    <table class="table-view" width="100%" border="0" style="font-size: 12px;">
        <thead>
            <tr>
                <th width='1%'>No</th>
                <th style="width:3%;padding:1px 2px;"> No MR</th>
                <th style="width:8%;padding:1px 2px;">Nama Pasien</th>
                <th style="width:8%;padding:1px 2px;">Alamat</th> 
                <th style="width:3%;padding:1px 3px;">Jenis</th> 
                <th style="width:8%;padding:1px 2px;">Layanan</th> 
                <!-- <th style="width:8%;padding:1px 2px;">Ruang</th>  -->
                <th style="width:8%;padding:1px 2px;"> Admisi </th> 
                <th style="width:8%;padding:1px 2px;"> Transfer Pasien</th> 
                <th style="width:8%;padding:1px 2px;">DPJP</th>   
                <th width='4%'>Aksi</th>
            </tr>
        </thead>
        <tbody><?php $_smarty_tpl->tpl_vars['no'] = new Smarty_variable(1, null, null);?>
            <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
            <tr>
                <td><?php echo $_smarty_tpl->getVariable('no')->value++;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['No_MR'];?>
</td>
                <td><?php if ($_smarty_tpl->tpl_vars['data']->value['rg']==''){?> <?php echo $_smarty_tpl->tpl_vars['data']->value['Nama'];?>
 <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['data']->value['NM'];?>
 <?php }?></td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['alamat'];?>
</td>  
                <td style="color: green;"> <?php echo $_smarty_tpl->tpl_vars['data']->value['JENIS_RAWAT'];?>
</td> 
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['UNIT1'];?>
 <br> Ruang :
                     <?php echo $_smarty_tpl->tpl_vars['data']->value['Nama_Ruang'];?>
</td> 
                <td>  <?php echo $_smarty_tpl->tpl_vars['data']->value['KD_ADMISI'];?>
</td> 
                <td>Tujuan : <?php echo $_smarty_tpl->tpl_vars['data']->value['TUJUAN'];?>
  <br>
                    Status :
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['STATUS_TF']=='Diterima'){?>
                    <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/icon.approve.png" alt="" />
                    Diterima  oleh <?php echo $_smarty_tpl->tpl_vars['data']->value['PENERIMA'];?>

                    <?php }else{ ?>
                    <?php echo $_smarty_tpl->tpl_vars['data']->value['STATUS_TF'];?>

                    <?php }?> </td>  
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['Nama_Dokter'];?>
</td>  
                 <td>
                    <?php if ($_smarty_tpl->getVariable('rolenya')->value!='IGD'){?> 
                      <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('igd/ppdftr/edit/').($_smarty_tpl->tpl_vars['data']->value['id'])).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
">  
                    <button class="btn btn-primary btn-xs fa fa-pencil"> Edit  </button></a>
                    <!-- <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('igd/ppdftr/edit/').($_smarty_tpl->tpl_vars['data']->value['id']));?>
" class="button-edit">Edit</a>             -->
                    <?php }?>
                    <!-- <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('igd/ppdftr/cetak/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"> Cetak </a> -->
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['STATUS_TF']!='Diterima'){?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG']!=''){?>
                    <?php if ($_smarty_tpl->getVariable('rolenya')->value=='IGD'){?>
                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('igd/perawat/tf/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Transfer</a>
                    <?php }?>
                    <?php }?>
                    <?php }?>

                </td>
            </tr>
            <?php }} ?>
        </tbody>
    </table>
 </div>


 
 </body>
 </html>
 
 

<script>
    $(".select2").select2({
         placeholder: "Pilih",
         allowClear: true
     });

   
   $(":radio.rad").click(function(){
    //  $("#form2").hide();
    //  $("#form3").hide();

    //  if($(this).val() == "Ya"){
    //    $("#form2").show();
    //    $("#form3").hide()
    //  }else if($(this).val() == "Tidak"){
    //    $("#form2").hide();
    //    $("#form3").show()
    //  }
    alert("h");
   });

 </script>