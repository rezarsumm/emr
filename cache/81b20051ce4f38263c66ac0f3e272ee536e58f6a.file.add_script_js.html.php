<?php /* Smarty version Smarty-3.0.7, created on 2021-12-06 14:36:22
         compiled from "application/views\nurse/rawat_jalan/add_script_js.html" */ ?>
<?php /*%%SmartyHeaderCode:219961adbd76103e20-62804762%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81b20051ce4f38263c66ac0f3e272ee536e58f6a' => 
    array (
      0 => 'application/views\\nurse/rawat_jalan/add_script_js.html',
      1 => 1638775814,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '219961adbd76103e20-62804762',
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