<?php /* Smarty version Smarty-3.0.7, created on 2021-09-20 15:46:50
         compiled from "application/views\inap/resume/add_script_js.html" */ ?>
<?php /*%%SmartyHeaderCode:691606e7f0a70f795-79066195%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ff1575f0bf58a32da512a3de8201cb63670470a' => 
    array (
      0 => 'application/views\\inap/resume/add_script_js.html',
      1 => 1616214946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '691606e7f0a70f795-79066195',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
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
         $(".select2").select2({
            placeholder: "Pilih",
            allowClear: true
        });
                    // timepicker
    $('.waktu').timepicker({
            timeFormat: 'HH:mm:ss',
            showOn: "both",
            buttonImage: "<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
/resource/doc/images/icon/clock.png",
            buttonImageOnly: true
    });
        // dialog form
        $("#opendialogpengirim")
                .button()
                .click(function() {
            $("#dialog-form").dialog('open');
        });
        $("#opendialogklas")
                .button()
                .click(function() {
            $("#dialog-klas").dialog('open');
        });
        $("#dialog-form").dialog({
            autoOpen: false,
            resizable: false,
            height: 380,
            width: 750,
            modal: true
        });
        $("#dialog-klas").dialog({
            autoOpen: false,
            resizable: false,
            height: 300,
            width: 750,
            modal: true
        });
        
        $("#poli").change(function () {
            var poli = $("#poli").val();
            $.ajax({
                type: "POST",
                url: '<?php echo $_smarty_tpl->getVariable('config')->value->site_url("inap/resume/list_dokter");?>
',
                data: "poli=" + poli,
                cache: false,
                success: function (msg) {
//jika data sukses diambil dari server kita tampilkan
//di <select id=kota>
                    $("#dokter").html(msg);
                }
            });
        });
        
        $("#dokter").change(function () {
            var dokter = $("#dokter").val();
            $.ajax({
                type: "POST",
                url: '<?php echo $_smarty_tpl->getVariable('config')->value->site_url("inap/resume/list_jadwal");?>
',
                data: "dokter=" + dokter,
                cache: false,
                success: function (msg) {
//jika data sukses diambil dari server kita tampilkan
//di <select id=kota>
                    $("#jadwal").html(msg);
                }
            });
        });
        
        // tujuan
        var user = $("#user").val();
        $('#tujuan').select2('data', null);
//            $('#tujuan').select2('data', null);
        if (user == '') {
            $("#tujuan").attr("disabled", "disabled");
        } else {
                $("#tujuan").removeAttr("disabled");
                jQuery("#tujuan").html('');
                $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/resume/list_diet/');?>
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
                        $('#tujuan').select2('val', [<?php echo $_smarty_tpl->getVariable('rs_tujuan')->value;?>
]);
                    }
                });
        }
        $("#user").change(function() {
            user = $(this).val();
            //get icao code by airlines_id
//            $.ajax({
//                type: "POST",
//                url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('angud/ijin_rute/get_airlines_by_id/');?>
",
//                data: "user=" + user,
//                dataType: 'json',
//                success: function(data) {
//
//                    $('input[name="airlines_icao_cd"]').val(user);
//                }
//            });
            $('#tujuan').select2('data', null);
            if (user == '') {
                $("#tujuan").attr("disabled", "disabled");
            } else {
                $("#tujuan").removeAttr("disabled");
                jQuery("#tujuan").html('');
                $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/resume/list_diet/');?>
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
//        if (user == '') {
//            $("#tujuan").attr("disabled", "disabled");
//        } else {
            $("#tujuan").removeAttr("disabled");
            jQuery("#tujuan").html('');
            $.ajax({
                type: "POST",
                url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/resume/list_diet/');?>
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
//                $("#tujuan").attr("disabled", "disabled");
//            } else {
                $("#tujuan").removeAttr("disabled");
                jQuery("#tujuan").html('');
                $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/resume/list_diet/');?>
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
    });
</script>
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
        if (user == '') {
            $("#tembusan").attr("disabled", "disabled");
        } else {
//            $('#tembusan').select2('data', null);
                $("#tembusan").removeAttr("disabled");
                jQuery("#tembusan").html('');
                $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/resume/indikasi_dirawat/');?>
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
                        $('#tembusan').select2('val', [<?php echo $_smarty_tpl->getVariable('rs_tembusan')->value;?>
]);
                }
            });
        }
        $("#user").change(function() {
            user = $(this).val();
            //get icao code by airlines_id
//            $.ajax({
//                type: "POST",
//                url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('angud/ijin_rute/get_airlines_by_id/');?>
",
//                data: "user=" + user,
//                dataType: 'json',
//                success: function(data) {
//
//                    $('input[name="airlines_icao_cd"]').val(user);
//                }
//            });
            $('#tembusan').select2('data', null);
            if (user == '') {
                $("#tembusan").attr("disabled", "disabled");
            } else {
                $("#tembusan").removeAttr("disabled");
                jQuery("#tembusan").html('');
                $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/resume/indikasi_dirawat/');?>
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
            }
        });
        //tags
        $("#tembusan").select2({});
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
//        if (user == '') {
//            $("#tujuan").attr("disabled", "disabled");
//        } else {
            $("#tembusan").removeAttr("disabled");
            jQuery("#tembusan").html('');
            $.ajax({
                type: "POST",
                url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/resume/indikasi_dirawat/');?>
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
//                $("#tujuan").attr("disabled", "disabled");
//            } else {
                $("#tembusan").removeAttr("disabled");
                jQuery("#tembusan").html('');
                $.ajax({
                    type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/resume/indikasi_dirawat/');?>
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
    });
</script>
<?php }?>
<?php }} ?>

<?php }?>

<script type="text/javascript">
    // autocomplete instansi
    $(function() {
        var availableTags = [
        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_instansi')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
        "<?php echo $_smarty_tpl->tpl_vars['data']->value['instansi_name'];?>
",
        <?php }} ?>
        ];
                $("#tags").autocomplete({
            source: availableTags
        });
    });
    // multiple upload file
    var upload_number = 2;
    function addFileInput() {
        var d = document.createElement("div");
        var file = document.createElement("input");
        file.setAttribute("type", "file");
        file.setAttribute("name", "att_name" + upload_number);
        d.appendChild(file);
        document.getElementById("moreUploads").appendChild(d);
        upload_number++;
    }
</script>