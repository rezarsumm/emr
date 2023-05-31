<?php /* Smarty version Smarty-3.0.7, created on 2022-01-07 09:50:45
         compiled from "application/views\medis/rawat_jalan/add_script_js.html" */ ?>
<?php /*%%SmartyHeaderCode:2216061d7aa851b2e81-95191288%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2bfb527198b5649c587ab0783be55b994b6087d' => 
    array (
      0 => 'application/views\\medis/rawat_jalan/add_script_js.html',
      1 => 1641523810,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2216061d7aa851b2e81-95191288',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript">
    $(document).ready(function() {
        //var htmlobjek;
//apabila terjadi event onchange terhadap object <select id=propinsi>
        $("#skdp_alasan").change(function () {
            var skdp_alasan = $("#skdp_alasan").val();
            $.ajax({
                type: "POST",
                url: '<?php echo $_smarty_tpl->getVariable('config')->value->site_url("medis/rawat_jalan/skdp_rencana");?>
',
                data: "skdp_alasan=" + skdp_alasan,
                cache: false,
                success: function (msg) {
//jika data sukses diambil dari server kita tampilkan
//di <select id=kota>
                    $("#kota").html(msg);
                }
            });
        });
    $(".tanggal").datepicker({
    changeMonth: true,
            changeYear: true,
            showOn: "both",
            buttonImage: "<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
/resource/doc/images/icon/calendar.gif",
            buttonImageOnly: true,
            dateFormat: 'yy-mm-dd'
    });
            // timepicker
    $('.waktu').timepicker({
            timeFormat: 'HH:mm:ss',
            showOn: "both",
            buttonImage: "<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
/resource/doc/images/icon/clock.png",
            buttonImageOnly: true
    });
            $(".select2").select2({
            placeholder: "Pilih",
            allowClear: true
    });    
       // tujuan
            var user = $("#user").val();
            $('#tujuan').select2('data', null);
            $('#tujuan').select2('data', null);
            $("#tujuan").removeAttr("disabled");
            jQuery("#tujuan").html('');
            $.ajax({
            type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/list_pemeriksaan_lab/');?>
",
                    data: "user=" + user,
                    dataType: 'json',
                    success: function(data) {
                    var showData;
                            jQuery.each(data, function(index, result) {
                            if (result.value == 0) {
                            } else {
                            showData += "<option value='" + result.value + "'>" + result.label + "</option>";
                            }
                            })
                            jQuery("#tujuan").html(showData);
                    }
            });
            //tags
            $("#tujuan").select2({});

    });

</script>
<?php if (isset($_smarty_tpl->getVariable('result',null,true,false)->value)){?>
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('result')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
<?php if ($_smarty_tpl->tpl_vars['key']->value=='tujuan_loop[]'){?>
<?php $_smarty_tpl->tpl_vars['tujuan_loop'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value, null, null);?>
<?php $_smarty_tpl->tpl_vars['tujuan_var'] = new Smarty_variable('', null, null);?>
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tujuan_loop')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
<?php $_smarty_tpl->tpl_vars['tujuan_var'] = new Smarty_variable(((($_smarty_tpl->getVariable('tujuan_var')->value).("'")).($_smarty_tpl->tpl_vars['i']->value)).("',"), null, null);?>
<?php }} ?>
<?php $_smarty_tpl->tpl_vars['tujuan_loop'] = new Smarty_variable($_smarty_tpl->getVariable('tujuan_var')->value, null, null);?>
<script type="text/javascript">
            $(document).ready(function() {
    // date picker
    $(".tanggal").datepicker({
    changeMonth: true,
            changeYear: true,
            showOn: "both",
            buttonImage: "<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
/resource/doc/images/icon/calendar.gif",
            buttonImageOnly: true,
            dateFormat: 'yy-mm-dd'
    });
            // chain select
            var user = $("#user").val();
            $('#tujuan').select2('data', null);
//        if (operator == '') {
//            $("#tipe_pesawat").attr("disabled", "disabled");
//        } else {
            $("#tujuan").removeAttr("disabled");
            jQuery("#tujuan").html('');
            $.ajax({
            type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/list_pemeriksaan_lab/');?>
",
                    data: "user=" + user,
                    dataType: 'json',
                    success: function(data) {
                    var showData;
                            jQuery.each(data, function(index, result) {
                            if (result.value == 0) {
                            } else {
                            showData += "<option value='" + result.value + "'>" + result.label + "</option>";
                            }
                            })
                            jQuery("#tujuan").html(showData);
                            $('#tujuan').select2('val', [<?php echo $_smarty_tpl->getVariable('tujuan_loop')->value;?>
]);
                    }
            });
//        }
            $("#user").change(function() {
    user = $(this).val();
            $('#tujuan').select2('data', null);
//            if (user == '') {
//                $("#tipe_pesawat").attr("disabled", "disabled");
//            } else {
            $("#tujuan").removeAttr("disabled");
            jQuery("#tujuan").html('');
            $.ajax({
            type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/list_pemeriksaan_lab/');?>
",
                    data: "user=" + user,
                    dataType: 'json',
                    success: function(data) {
                    var showData;
                            jQuery.each(data, function(index, result) {
                            if (result.value == 0) {
                            } else {
                            showData += "<option value='" + result.value + "'>" + result.label + "</option>";
                            }
                            })
                            jQuery("#tujuan").html(showData);
                    }
            });
//            }
    });
            //tags
            $("#tujuan").select2({});
    });</script>
<?php }?>
<?php }} ?>

<?php }?>

 
<!--Tembusan-->
<script type="text/javascript">
            $(document).ready(function() {
    // chain select
    // tembusan
    var user = $("#user").val();
            $('#tembusan').select2('data', null);
            $('#tembusan').select2('data', null);
            $("#tembusan").removeAttr("disabled");
            jQuery("#tembusan").html('');
            $.ajax({
            type: "POST", 
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/list_pemeriksaan_rad/');?>
",
                    data: "user=" + user,
                    dataType: 'json',
                    success: function(data) {
                    var showData;
                            jQuery.each(data, function(index, result) {
                            if (result.value == 0) {
                            } else {
                            showData += "<option value='" + result.value + "'>" + result.label + "</option>";
                            }
                            })
                            jQuery("#tembusan").html(showData);
                    }
            });
            //tags
            $("#tembusan").select2({});
    });</script>
<?php if (isset($_smarty_tpl->getVariable('result',null,true,false)->value)){?>
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('result')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
<?php if ($_smarty_tpl->tpl_vars['key']->value=='tembusan_loop[]'){?>
<?php $_smarty_tpl->tpl_vars['tembusan_loop'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value, null, null);?>
<?php $_smarty_tpl->tpl_vars['tembusan_var'] = new Smarty_variable('', null, null);?>
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tembusan_loop')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
<?php $_smarty_tpl->tpl_vars['tembusan_var'] = new Smarty_variable(((($_smarty_tpl->getVariable('tembusan_var')->value).("'")).($_smarty_tpl->tpl_vars['i']->value)).("',"), null, null);?>
<?php }} ?>
<?php $_smarty_tpl->tpl_vars['tembusan_loop'] = new Smarty_variable($_smarty_tpl->getVariable('tembusan_var')->value, null, null);?>
<script type="text/javascript">
            $(document).ready(function() {
    // date picker
    $(".tanggal").datepicker({
    changeMonth: true,
            changeYear: true,
            showOn: "both",
            buttonImage: "<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
/resource/doc/images/icon/calendar.gif",
            buttonImageOnly: true,
            dateFormat: 'yy-mm-dd'
    });
            // chain select
            var user = $("#user").val();
            $('#tembusan').select2('data', null);
//        if (operator == '') {
//            $("#tipe_pesawat").attr("disabled", "disabled");
//        } else {
            $("#tembusan").removeAttr("disabled");
            jQuery("#tembusan").html('');
            $.ajax({
            type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/list_pemeriksaan_rad/');?>
",
                    data: "user=" + user,
                    dataType: 'json',
                    success: function(data) {
                    var showData;
                            jQuery.each(data, function(index, result) {
                            if (result.value == 0) {
                            } else {
                            showData += "<option value='" + result.value + "'>" + result.label + "</option>";
                            }
                            })
                            jQuery("#tembusan").html(showData);
                            $('#tembusan').select2('val', [<?php echo $_smarty_tpl->getVariable('tembusan_loop')->value;?>
]);
                    }
            });
//        }
            $("#user").change(function() {
    user = $(this).val();
            $('#tembusan').select2('data', null);
//            if (user == '') {
//                $("#tipe_pesawat").attr("disabled", "disabled");
//            } else {
            $("#tembusan").removeAttr("disabled");
            jQuery("#tembusan").html('');
            $.ajax({
            type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/list_pemeriksaan_rad/');?>
",
                    data: "user=" + user,
                    dataType: 'json',
                    success: function(data) {
                    var showData;
                            jQuery.each(data, function(index, result) {
                            if (result.value == 0) {
                            } else {
                            showData += "<option value='" + result.value + "'>" + result.label + "</option>";
                            }
                            })
                            jQuery("#tembusan").html(showData);
                    }
            });
//            }
    });
            //tags
            $("#tembusan").select2({});
    });</script>
<?php }?>
<?php }} ?>

<?php }?>


<!--Tujuan Eksternal-->
<script type="text/javascript">
            $(document).ready(function() {
    // chain select
    // tembusan
    var user = $("#user").val();
            $('#tujuan_eks').select2('data', null);
            $('#tujuan_eks').select2('data', null);
            $("#tujuan_eks").removeAttr("disabled");
            jQuery("#tujuan_eks").html('');
            $.ajax({
            type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('surat/undangan/list_eksternal/');?>
",
                    data: "user=" + user,
                    dataType: 'json',
                    success: function(data) {
                    var showData;
                            jQuery.each(data, function(index, result) {
                            if (result.value == 0) {
                            } else {
                            showData += "<option value='" + result.value + "'>" + result.label + "</option>";
                            }
                            })
                            jQuery("#tujuan_eks").html(showData);
                    }
            });
            //tags
            $("#tujuan_eks").select2({});
    });</script>
<?php if (isset($_smarty_tpl->getVariable('result',null,true,false)->value)){?>
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('result')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
<?php if ($_smarty_tpl->tpl_vars['key']->value=='tujuan_eks_loop[]'){?>
<?php $_smarty_tpl->tpl_vars['tujuan_eks_loop'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value, null, null);?>
<?php $_smarty_tpl->tpl_vars['tujuan_eks_var'] = new Smarty_variable('', null, null);?>
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tujuan_eks_loop')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
<?php $_smarty_tpl->tpl_vars['tujuan_eks_var'] = new Smarty_variable(((($_smarty_tpl->getVariable('tujuan_eks_var')->value).("'")).($_smarty_tpl->tpl_vars['i']->value)).("',"), null, null);?>
<?php }} ?>
<?php $_smarty_tpl->tpl_vars['tujuan_eks_loop'] = new Smarty_variable($_smarty_tpl->getVariable('tujuan_eks_var')->value, null, null);?>
<script type="text/javascript">
            $(document).ready(function() {
    // date picker
    $(".tanggal").datepicker({
    changeMonth: true,
            changeYear: true,
            showOn: "both",
            buttonImage: "<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
/resource/doc/images/icon/calendar.gif",
            buttonImageOnly: true,
            dateFormat: 'yy-mm-dd'
    });
            // chain select
            var user = $("#user").val();
            $('#tujuan_eks').select2('data', null);
//        if (operator == '') {
//            $("#tipe_pesawat").attr("disabled", "disabled");
//        } else {
            $("#tujuan_eks").removeAttr("disabled");
            jQuery("#tujuan_eks").html('');
            $.ajax({
            type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('surat/undangan/list_eksternal/');?>
",
                    data: "user=" + user,
                    dataType: 'json',
                    success: function(data) {
                    var showData;
                            jQuery.each(data, function(index, result) {
                            if (result.value == 0) {
                            } else {
                            showData += "<option value='" + result.value + "'>" + result.label + "</option>";
                            }
                            })
                            jQuery("#tujuan_eks").html(showData);
                            $('#tujuan_eks').select2('val', [<?php echo $_smarty_tpl->getVariable('tembusan_loop')->value;?>
]);
                    }
            });
//        }
            $("#user").change(function() {
    user = $(this).val();
            $('#tujuan_eks').select2('data', null);
//            if (user == '') {
//                $("#tipe_pesawat").attr("disabled", "disabled");
//            } else {
            $("#tujuan_eks").removeAttr("disabled");
            jQuery("#tujuan_eks").html('');
            $.ajax({
            type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('surat/undangan/list_eksternal/');?>
",
                    data: "user=" + user,
                    dataType: 'json',
                    success: function(data) {
                    var showData;
                            jQuery.each(data, function(index, result) {
                            if (result.value == 0) {
                            } else {
                            showData += "<option value='" + result.value + "'>" + result.label + "</option>";
                            }
                            })
                            jQuery("#tujuan_eks").html(showData);
                    }
            });
//            }
    });
            //tags
            $("#tujuan_eks").select2({});
    });</script>
<?php }?>
<?php }} ?>

<?php }?>