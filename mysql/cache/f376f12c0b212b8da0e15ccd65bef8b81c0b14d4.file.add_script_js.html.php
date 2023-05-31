<?php /* Smarty version Smarty-3.0.7, created on 2021-03-18 08:59:05
         compiled from "application/views\inap/kep/add_script_js.html" */ ?>
<?php /*%%SmartyHeaderCode:327446052b3e92677f5-44680747%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f376f12c0b212b8da0e15ccd65bef8b81c0b14d4' => 
    array (
      0 => 'application/views\\inap/kep/add_script_js.html',
      1 => 1608812800,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '327446052b3e92677f5-44680747',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript">
    $(document).ready(function () {
        var htmlobjek;
//apabila terjadi event onchange terhadap object <select id=propinsi>
        $("#kep1").change(function () {
            var kep1 = $("#kep1").val();
            $.ajax({
                type: "POST",
                url: '<?php echo $_smarty_tpl->getVariable('config')->value->site_url("inap/kep/list_diagnosa");?>
',
                data: "kep1=" + kep1,
                cache: false,
                success: function (msg) {
//jika data sukses diambil dari server kita tampilkan
//di <select id=kota>
                    $("#diag").html(msg);
                }
            });
        });
        $("#diag").change(function () {
            var diag = $("#diag").val();
            $.ajax({
                type: "POST",
                url: '<?php echo $_smarty_tpl->getVariable('config')->value->site_url("inap/kep/list_noc");?>
',
                data: "diag=" + diag,
                cache: false,
                success: function (msg) {
//jika data sukses diambil dari server kita tampilkan
//di <select id=kota>
                    $("#noc").html(msg);
                }
            });
        });
        $("#noc").change(function () {
            var noc = $("#noc").val();
            $.ajax({
                type: "POST",
                url: '<?php echo $_smarty_tpl->getVariable('config')->value->site_url("inap/kep/list_indikator");?>
',
                data: "noc=" + noc,
                cache: false,
                success: function (msg) {
//jika data sukses diambil dari server kita tampilkan
//di <select id=kota>
                    $("#indikator").html(msg);
                }
            });
        });
        $("#indikator").change(function () {
            var indikator = $("#indikator").val();
            $.ajax({
                type: "POST",
                url: '<?php echo $_smarty_tpl->getVariable('config')->value->site_url("inap/kep/list_nic");?>
',
                data: "indikator=" + indikator,
                cache: false,
                success: function (msg) {
//jika data sukses diambil dari server kita tampilkan
//di <select id=kota>
                    $("#nic").html(msg);
                }
            });
        });
        $("#nic").change(function () {
            var nic = $("#nic").val();
            $.ajax({
                type: "POST",
                url: '<?php echo $_smarty_tpl->getVariable('config')->value->site_url("inap/kep/list_nic2");?>
',
                data: "nic=" + nic,
                cache: false,
                success: function (msg) {
//jika data sukses diambil dari server kita tampilkan
//di <select id=kota>
                    $("#nic2").html(msg);
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
        // dialog form
        $("#opendialogpengirim")
                .button()
                .click(function () {
                    $("#dialog-form").dialog('open');
                });
        $("#opendialogklas")
                .button()
                .click(function () {
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
        // auto select bukti kualitas
        $("#notes_judul").change(function () {
            var notes_id = $("#notes_judul").val();
            // nilai kualitas
            $.ajax({
                type: 'POST',
                data: '&notes_id=' + notes_id,
                url: '<?php echo $_smarty_tpl->getVariable('config')->value->site_url("surat/draft_st/notes_deskripsi");?>
',
                success: function (result) {
                    $("#notes_draft").val(result);
                }
            });
        });
        // chain select
        // nic2
        var user = $("#user").val();
        $('#nic2').select2('data', null);
        $('#nic2').select2('data', null);
        $("#nic2").removeAttr("disabled");
        jQuery("#nic2").html('');
        $.ajax({
            type: "POST",
            url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('surat/undangan/list_instansi/');?>
",
            data: "user=" + user,
            dataType: 'json',
            success: function (data) {
                var showData;
                jQuery.each(data, function (index, result) {
                    if (result.value == 0) {
                    } else {
                        showData += "<option value='" + result.value + "'>" + result.label + "</option>";
                    }
                })
                jQuery("#nic2").html(showData);
            }
        });
        //tags
        $("#nic2").select2({});
    });</script>
<?php if (isset($_smarty_tpl->getVariable('result',null,true,false)->value)){?>
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('result')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
<?php if ($_smarty_tpl->tpl_vars['key']->value=='nic2_loop[]'){?>
<?php $_smarty_tpl->tpl_vars['nic2_loop'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value, null, null);?>
<?php $_smarty_tpl->tpl_vars['nic2_var'] = new Smarty_variable('', null, null);?>
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('nic2_loop')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
<?php $_smarty_tpl->tpl_vars['nic2_var'] = new Smarty_variable(((($_smarty_tpl->getVariable('nic2_var')->value).("'")).($_smarty_tpl->tpl_vars['i']->value)).("',"), null, null);?>
<?php }} ?>
<?php $_smarty_tpl->tpl_vars['nic2_loop'] = new Smarty_variable($_smarty_tpl->getVariable('nic2_var')->value, null, null);?>
<script type="text/javascript">
    $(document).ready(function () {
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
        $('#nic2').select2('data', null);
//        if (operator == '') {
//            $("#tipe_pesawat").attr("disabled", "disabled");
//        } else {
        $("#nic2").removeAttr("disabled");
        jQuery("#nic2").html('');
        $.ajax({
            type: "POST",
            url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('surat/masuk/list_user/');?>
",
            data: "user=" + user,
            dataType: 'json',
            success: function (data) {
                var showData;
                jQuery.each(data, function (index, result) {
                    if (result.value == 0) {
                    } else {
                        showData += "<option value='" + result.value + "'>" + result.label + "</option>";
                    }
                })
                jQuery("#nic2").html(showData);
                        $('#nic2').select2('val', [<?php echo $_smarty_tpl->getVariable('nic2_loop')->value;?>
]);
            }
        });
//        }
        $("#user").change(function () {
            user = $(this).val();
            $('#nic2').select2('data', null);
//            if (user == '') {
//                $("#tipe_pesawat").attr("disabled", "disabled");
//            } else {
            $("#nic2").removeAttr("disabled");
            jQuery("#nic2").html('');
            $.ajax({
                type: "POST",
                url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('surat/keluar/list_instansi/');?>
",
                data: "user=" + user,
                dataType: 'json',
                success: function (data) {
                    var showData;
                    jQuery.each(data, function (index, result) {
                        if (result.value == 0) {
                        } else {
                            showData += "<option value='" + result.value + "'>" + result.label + "</option>";
                        }
                    })
                    jQuery("#nic2").html(showData);
                }
            });
//            }
        });
        //tags
        $("#nic2").select2({});
    });</script>
<?php }?>
<?php }} ?>

<?php }?>


<!--Tembusan-->
<script type="text/javascript">
    $(document).ready(function () {
        // chain select
        // tembusan
        var user = $("#user").val();
        $('#tembusan').select2('data', null);
        $('#tembusan').select2('data', null);
        $("#tembusan").removeAttr("disabled");
        jQuery("#tembusan").html('');
        $.ajax({
            type: "POST",
            url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('surat/keluar/list_instansi/');?>
",
            data: "user=" + user,
            dataType: 'json',
            success: function (data) {
                var showData;
                jQuery.each(data, function (index, result) {
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
    $(document).ready(function () {
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
            url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('surat/masuk/list_user/');?>
",
            data: "user=" + user,
            dataType: 'json',
            success: function (data) {
                var showData;
                jQuery.each(data, function (index, result) {
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
        $("#user").change(function () {
            user = $(this).val();
            $('#tembusan').select2('data', null);
//            if (user == '') {
//                $("#tipe_pesawat").attr("disabled", "disabled");
//            } else {
            $("#tembusan").removeAttr("disabled");
            jQuery("#tembusan").html('');
            $.ajax({
                type: "POST",
                url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('surat/keluar/list_instansi/');?>
",
                data: "user=" + user,
                dataType: 'json',
                success: function (data) {
                    var showData;
                    jQuery.each(data, function (index, result) {
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
    $(document).ready(function () {
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
            success: function (data) {
                var showData;
                jQuery.each(data, function (index, result) {
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
    $(document).ready(function () {
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
            success: function (data) {
                var showData;
                jQuery.each(data, function (index, result) {
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
        $("#user").change(function () {
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
                success: function (data) {
                    var showData;
                    jQuery.each(data, function (index, result) {
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
<script type="text/javascript">
    // autocomplete instansi
    $(function () {
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
        file.setAttribute("name", "file_name" + upload_number);
        d.appendChild(file);
        document.getElementById("moreUploads").appendChild(d);
        upload_number++;
    }
</script>