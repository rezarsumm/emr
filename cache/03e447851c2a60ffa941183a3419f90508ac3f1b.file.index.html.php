<?php /* Smarty version Smarty-3.0.7, created on 2022-06-30 11:18:41
         compiled from "application/views\inap/transfer_pasien/index.html" */ ?>
<?php /*%%SmartyHeaderCode:2866462bd24214af7f5-59613307%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03e447851c2a60ffa941183a3419f90508ac3f1b' => 
    array (
      0 => 'application/views\\inap/transfer_pasien/index.html',
      1 => 1655710125,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2866462bd24214af7f5-59613307',
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
    <div class="head-content">
        <div class="head-content-nav">
            <ul>
                <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/tf/index/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
" class="active">Pasien Masuk</a></li>
                <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/tf/out/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
">Pasien Keluar</a></li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>

<h4><b>    Data Transfer Pasien Masuk </b></h4>
 
 
<div class="dashboard-container">
    <table class="table-view" width="100%"   style="font-size: 12px;">
        <thead>
            <tr>
                <th width='2%'>No</th>
                <th style="padding:5px">No MR</th>
                <th style="padding:5px">Nama Pasien</th>
                <th style="padding:5px" width='20%'>Alamat</th> 
                <th style="padding:5px">Jenis</th> 
                <th style="padding:5px">Pengirim</th> 
                <th style="padding:5px">Tujuan</th> 
                <th style="padding:5px"> Status Transfer </th> 
                <!-- <th style="padding:5px">DPJP</th>    -->
                <th width='18%'>Aksi</th>
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
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['Nama_Pasien'];?>
</td>
                 <td><?php echo $_smarty_tpl->tpl_vars['data']->value['Alamat'];?>
</td>  
                 <td><?php echo $_smarty_tpl->tpl_vars['data']->value['MEDIS'];?>
</td> 
                 <td><?php echo $_smarty_tpl->tpl_vars['data']->value['RUANG1'];?>
 oleh <?php echo $_smarty_tpl->tpl_vars['data']->value['PENGIRIM'];?>
 </td> 
                 <td><?php echo $_smarty_tpl->tpl_vars['data']->value['Nama_Ruang'];?>
 </td> 
                <td>
                     <?php if ($_smarty_tpl->tpl_vars['data']->value['STATUS_TF']=='Diterima'){?>
                    <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/icon.approve.png" alt="" />
                    Diterima oleh <?php echo $_smarty_tpl->tpl_vars['data']->value['PENERIMA'];?>
 
                    <?php }else{ ?>
                    <?php echo $_smarty_tpl->tpl_vars['data']->value['STATUS_TF'];?>
 
                    <?php }?> </td>  
                <!-- <td><?php echo $_smarty_tpl->tpl_vars['data']->value['Nama_Dokter'];?>
</td>   -->
                 <td>
                      <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('igd/ppdftr/cetak/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"> Cetak </a>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['STATUS_TF']!='Diterima'){?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG']!=''){?>
                    <?php if ($_smarty_tpl->getVariable('rolenya')->value!='Dokter'){?>
                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('inap/tf/approve/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG'])).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Approve</a>
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