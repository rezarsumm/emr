<?php /* Smarty version Smarty-3.0.7, created on 2022-02-16 13:36:51
         compiled from "application/views\inap/ass_awal_bidan/edit_script_js.html" */ ?>
<?php /*%%SmartyHeaderCode:29747620c9b83f3bcc3-95456590%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc08287a2fa97e8248222f81f4991f7ff3ac52d1' => 
    array (
      0 => 'application/views\\inap/ass_awal_bidan/edit_script_js.html',
      1 => 1616214946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29747620c9b83f3bcc3-95456590',
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
            height: 300,
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
            var notes_id  =$("#notes_judul").val();
            // nilai kualitas
            $.ajax({
                type: 'POST',
                data: '&notes_id=' + notes_id,
                url: '<?php echo $_smarty_tpl->getVariable('config')->value->site_url("inap/draft_st/notes_deskripsi");?>
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
//            $('#tujuan').select2('data', null);
        if (user == '') {
            $("#tujuan").attr("disabled", "disabled");
        } else {
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
//                $("#tujuan").attr("disabled", "disabled");
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
        $('#spiritual').select2('data', null);
        if (user == '') {
            $("#spiritual").attr("disabled", "disabled");
        } else {
//            $('#spiritual').select2('data', null);
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
                        $('#spiritual').select2('val', [<?php echo $_smarty_tpl->getVariable('rs_spiritual')->value;?>
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
            $('#spiritual').select2('data', null);
            if (user == '') {
                $("#spiritual").attr("disabled", "disabled");
            } else {
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
            }
        });
        //tags
        $("#spiritual").select2({});
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
//        if (user == '') {
//            $("#tujuan").attr("disabled", "disabled");
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
                    $('#spiritual').select2('val', [<?php echo $_smarty_tpl->getVariable('spiritual_loop')->value;?>
]);

                }
            });
//        }
        $("#user").change(function() {
            user = $(this).val();
            $('#spiritual').select2('data', null);
//            if (user == '') {
//                $("#tujuan").attr("disabled", "disabled");
//            } else {
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
//            }
        });
        //tags
        $("#spiritual").select2({});
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
        $('#planning').select2('data', null);
        if (user == '') {
            $("#planning").attr("disabled", "disabled");
        } else {
//            $('#planning').select2('data', null);
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
                        $('#planning').select2('val', [<?php echo $_smarty_tpl->getVariable('rs_planning')->value;?>
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
            $('#planning').select2('data', null);
            if (user == '') {
                $("#planning").attr("disabled", "disabled");
            } else {
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
            }
        });
        //tags
        $("#planning").select2({});
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
//        if (user == '') {
//            $("#tujuan").attr("disabled", "disabled");
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
                    $('#planning').select2('val', [<?php echo $_smarty_tpl->getVariable('planning_loop')->value;?>
]);

                }
            });
//        }
        $("#user").change(function() {
            user = $(this).val();
            $('#planning').select2('data', null);
//            if (user == '') {
//                $("#tujuan").attr("disabled", "disabled");
//            } else {
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
//            }
        });
        //tags
        $("#planning").select2({});
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
        $('#edukasi').select2('data', null);
        if (user == '') {
            $("#edukasi").attr("disabled", "disabled");
        } else {
//            $('#edukasi').select2('data', null);
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
                        $('#edukasi').select2('val', [<?php echo $_smarty_tpl->getVariable('rs_edukasi')->value;?>
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
            $('#edukasi').select2('data', null);
            if (user == '') {
                $("#edukasi").attr("disabled", "disabled");
            } else {
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
            }
        });
        //tags
        $("#edukasi").select2({});
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
//        if (user == '') {
//            $("#tujuan").attr("disabled", "disabled");
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
//                $("#tujuan").attr("disabled", "disabled");
//            } else {
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
//            }
        });
        //tags
        $("#edukasi").select2({});
    });
</script>
<?php }?>
<?php }} ?>

<?php }?>
<script type="text/javascript">
    $(document).ready(function () {
        score();
        score_nutrisi();
        
        $("#op1").change(function () {
            var sc = $(this).val();
            $("#sc1").html(sc);
            score();
        });
        $("#op2").change(function () {
            var sc = $(this).val();
            $("#sc2").html(sc);
            score();
        });
        $("#op3").change(function () {
            var sc = $(this).val();
            $("#sc3").html(sc);
            score();
        });
        $("#op4").change(function () {
            var sc = $(this).val();
            $("#sc4").html(sc);
            score();
        });
        $("#op5").change(function () {
            var sc = $(this).val();
            $("#sc5").html(sc);
            score();
        });
        $("#op6").change(function () {
            var sc = $(this).val();
            $("#sc6").html(sc);
            score();
        });
        $("#op7").change(function () {
            var sc = $(this).val();
            $("#sc7").html(sc);
            score();
        });
        score();
        
        $("#op8").change(function () {
            var scd = $(this).val();
            $("#sc8").html(scd);
            score();
        });
        $("#op9").change(function () {
            var scd = $(this).val();
            $("#sc9").html(scd);
            score();
        });
        $("#op10").change(function () {
            var scd = $(this).val();
            $("#sc10").html(scd);
            score();
        });
         //nutrisi
        $("#sn1").change(function () {
            var scn = $(this).val();
            $("#snh1").html(scn);
            score_nutrisi();
        });
        
        $("#sn2").change(function () {
            var scn = $(this).val();
            $("#snh2").html(scn);
            score_nutrisi();
        });
    });
    
    function score() {
        var sc = parseInt($("#sc1").text()) + parseInt($("#sc2").text()) + parseInt($("#sc3").text()) + parseInt($("#sc4").text()) + parseInt($("#sc5").text()) + parseInt($("#sc6").text()) + parseInt($("#sc7").text()) + parseInt($("#sc8").text()) + parseInt($("#sc9").text()) + parseInt($("#sc10").text());
        $("#totalsc").html(sc);
        if (sc >= 0 && sc <= 4) {
            $("#rjtkesimpulan").html("Ketergantungan Total");
        } else if (sc >= 5 && sc <= 8) {
            $("#rjtkesimpulan").html("Ketergantungan Berat");
        } else if (sc >= 9 && sc <= 11) {
            $("#rjtkesimpulan").html("Ketergantungan Sedang");
        } else if (sc >= 12 && sc <= 19) {
            $("#rjtkesimpulan").html("Ketergantungan Ringan");
        } else if (sc >= 20) {
            $("#rjtkesimpulan").html("Mandiri");
        }
    }
    function score_nutrisi() {
        var scn = parseInt($("#snh1").text()) + parseInt($("#snh2").text());
        $("#totalscn").html(scn);
        if (scn >= 0 && scn <= 1) {
            $("#kesimpulannutrisi").html("Tidak Berisiko Malnutrisi");
        } else if (scn >= 2) {
            $("#kesimpulannutrisi").html("Berisiko Malnutrisi");
        }
    }
    
    
</script>