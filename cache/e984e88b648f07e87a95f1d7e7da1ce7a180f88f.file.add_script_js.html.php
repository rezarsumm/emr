<?php /* Smarty version Smarty-3.0.7, created on 2023-06-06 09:54:06
         compiled from "application/views\medis/rawat_inap/add_script_js.html" */ ?>
<?php /*%%SmartyHeaderCode:16390647e9fce023a43-11685128%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e984e88b648f07e87a95f1d7e7da1ce7a180f88f' => 
    array (
      0 => 'application/views\\medis/rawat_inap/add_script_js.html',
      1 => 1685954849,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16390647e9fce023a43-11685128',
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
    
            // auto select bukti kualitas
            $("#notes_judul").change(function(){
    var notes_id = $("#notes_judul").val();
            // nilai kualitas
            $.ajax({
            type: 'POST',
                    data: '&notes_id=' + notes_id,
                    url: '<?php echo $_smarty_tpl->getVariable('config')->value->site_url("surat/draft_st/notes_deskripsi");?>
',
                    success: function(result) {
                    $("#notes_draft").val(result);
                    }
            });
    });
            // chain select
            // tujuan
            var user = $("#user").val();
            $('#tujuan').select2('data', null);
            $('#tujuan').select2('data', null);
            $("#tujuan").removeAttr("disabled");
            jQuery("#tujuan").html('');
            $.ajax({
            type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('nurse/rawat_jalan/list_masalah_kep/');?>
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
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('nurse/rawat_jalan/list_masalah_kep/');?>
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
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('nurse/rawat_jalan/list_masalah_kep/');?>
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


<!--edukasi-->
<script type="text/javascript">
            $(document).ready(function() {
    // chain select
    // edukasi
    var user = $("#user").val();
            $('#edukasi').select2('data', null);
            $('#edukasi').select2('data', null);
            $("#edukasi").removeAttr("disabled");
            jQuery("#edukasi").html('');
            $.ajax({
            type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal/list_edukasi/');?>
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
                            jQuery("#edukasi").html(showData);
                    }
            });
            //tags
            $("#edukasi").select2({});
    });</script>
<?php if (isset($_smarty_tpl->getVariable('result',null,true,false)->value)){?>
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('result')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
<?php if ($_smarty_tpl->tpl_vars['key']->value=='edukasi_loop[]'){?>
<?php $_smarty_tpl->tpl_vars['edukasi_loop'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value, null, null);?>
<?php $_smarty_tpl->tpl_vars['edukasi_var'] = new Smarty_variable('', null, null);?>
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('edukasi_loop')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
<?php $_smarty_tpl->tpl_vars['edukasi_var'] = new Smarty_variable(((($_smarty_tpl->getVariable('edukasi_var')->value).("'")).($_smarty_tpl->tpl_vars['i']->value)).("',"), null, null);?>
<?php }} ?>
<?php $_smarty_tpl->tpl_vars['edukasi_loop'] = new Smarty_variable($_smarty_tpl->getVariable('edukasi_var')->value, null, null);?>
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
            $('#edukasi').select2('data', null);
//        if (operator == '') {
//            $("#tipe_pesawat").attr("disabled", "disabled");
//        } else {
            $("#edukasi").removeAttr("disabled");
            jQuery("#edukasi").html('');
            $.ajax({
            type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal/list_edukasi/');?>
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
                            jQuery("#edukasi").html(showData);
                            $('#edukasi').select2('val', [<?php echo $_smarty_tpl->getVariable('edukasi_loop')->value;?>
]);
                    }
            });
//        }
            $("#user").change(function() {
    user = $(this).val();
            $('#edukasi').select2('data', null);
//            if (user == '') {
//                $("#tipe_pesawat").attr("disabled", "disabled");
//            } else {
            $("#edukasi").removeAttr("disabled");
            jQuery("#edukasi").html('');
            $.ajax({
            type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('nurse/rawat_jalan/list_rencana_kep/');?>
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
                            jQuery("#edukasi").html(showData);
                    }
            });
//            }
    });
            //tags
            $("#edukasi").select2({});
    });</script>
<?php }?>
<?php }} ?>

<?php }?>


<!--Spiritual-->
<script type="text/javascript">
            $(document).ready(function() {
    // chain select
    // edukasi
    var user = $("#user").val();
            $('#spiritual').select2('data', null);
            $('#spiritual').select2('data', null);
            $("#spiritual").removeAttr("disabled");
            jQuery("#spiritual").html('');
            $.ajax({
            type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal/spiritual/');?>
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
                            jQuery("#spiritual").html(showData);
                    }
            });
            //tags
            $("#spiritual").select2({});
    });</script>
<?php if (isset($_smarty_tpl->getVariable('result',null,true,false)->value)){?>
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('result')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
<?php if ($_smarty_tpl->tpl_vars['key']->value=='spiritual_loop[]'){?>
<?php $_smarty_tpl->tpl_vars['spiritual_loop'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value, null, null);?>
<?php $_smarty_tpl->tpl_vars['spiritual_var'] = new Smarty_variable('', null, null);?>
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('spiritual_loop')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
<?php $_smarty_tpl->tpl_vars['spiritual_var'] = new Smarty_variable(((($_smarty_tpl->getVariable('spiritual_var')->value).("'")).($_smarty_tpl->tpl_vars['i']->value)).("',"), null, null);?>
<?php }} ?>
<?php $_smarty_tpl->tpl_vars['spiritual_loop'] = new Smarty_variable($_smarty_tpl->getVariable('spiritual_var')->value, null, null);?>
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
            $('#spiritual').select2('data', null);
//        if (operator == '') {
//            $("#tipe_pesawat").attr("disabled", "disabled");
//        } else {
            $("#spiritual").removeAttr("disabled");
            jQuery("#spiritual").html('');
            $.ajax({
            type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal/spiritual/');?>
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
                            jQuery("#spiritual").html(showData);
                            $('#spiritual').select2('val', [<?php echo $_smarty_tpl->getVariable('edukasi_loop')->value;?>
]);
                    }
            });
//        }
            $("#user").change(function() {
    user = $(this).val();
            $('#spiritual').select2('data', null);
//            if (user == '') {
//                $("#tipe_pesawat").attr("disabled", "disabled");
//            } else {
            $("#spiritual").removeAttr("disabled");
            jQuery("#spiritual").html('');
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
                            jQuery("#spiritual").html(showData);
                    }
            });
//            }
    });
            //tags
            $("#spiritual").select2({});
    });</script>
<?php }?>
<?php }} ?>

<?php }?>
<!--Planning-->
<script type="text/javascript">
            $(document).ready(function() {
    // chain select
    // edukasi
    var user = $("#user").val();
            $('#planning').select2('data', null);
            $('#planning').select2('data', null);
            $("#planning").removeAttr("disabled");
            jQuery("#planning").html('');
            $.ajax({
            type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal/list_planning/');?>
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
                            jQuery("#planning").html(showData);
                    }
            });
            //tags
            $("#planning").select2({});
    });</script>
<?php if (isset($_smarty_tpl->getVariable('result',null,true,false)->value)){?>
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('result')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
<?php if ($_smarty_tpl->tpl_vars['key']->value=='planning_loop[]'){?>
<?php $_smarty_tpl->tpl_vars['planning_loop'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value, null, null);?>
<?php $_smarty_tpl->tpl_vars['planning_var'] = new Smarty_variable('', null, null);?>
<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('planning_loop')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
<?php $_smarty_tpl->tpl_vars['planning_var'] = new Smarty_variable(((($_smarty_tpl->getVariable('planning_var')->value).("'")).($_smarty_tpl->tpl_vars['i']->value)).("',"), null, null);?>
<?php }} ?>
<?php $_smarty_tpl->tpl_vars['planning_loop'] = new Smarty_variable($_smarty_tpl->getVariable('planning_var')->value, null, null);?>
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
            $('#planning').select2('data', null);
//        if (operator == '') {
//            $("#tipe_pesawat").attr("disabled", "disabled");
//        } else {
            $("#planning").removeAttr("disabled");
            jQuery("#planning").html('');
            $.ajax({
            type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal/list_planning/');?>
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
                            jQuery("#planning").html(showData);
                            $('#planning').select2('val', [<?php echo $_smarty_tpl->getVariable('edukasi_loop')->value;?>
]);
                    }
            });
//        }
            $("#user").change(function() {
    user = $(this).val();
            $('#planning').select2('data', null);
//            if (user == '') {
//                $("#tipe_pesawat").attr("disabled", "disabled");
//            } else {
            $("#planning").removeAttr("disabled");
            jQuery("#planning").html('');
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
                            jQuery("#planning").html(showData);
                    }
            });
//            }
    });
            //tags
            $("#planning").select2({});
    });</script>
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
                            file.setAttribute("name", "file_name" + upload_number);
                            d.appendChild(file);
                            document.getElementById("moreUploads").appendChild(d);
                            upload_number++;
                    }
</script>