<?php /* Smarty version Smarty-3.0.7, created on 2021-03-15 15:24:03
         compiled from "application/views\medis/rawat_jalan/add_script_js.html" */ ?>
<?php /*%%SmartyHeaderCode:1215604f19a3ef7ea8-22184068%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2bfb527198b5649c587ab0783be55b994b6087d' => 
    array (
      0 => 'application/views\\medis/rawat_jalan/add_script_js.html',
      1 => 1608812809,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1215604f19a3ef7ea8-22184068',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#skdp_alasan").change(function () {
            var skdp_alasan = $("#skdp_alasan").val();
            $.ajax({
                type: "POST",
                url: '<?php echo $_smarty_tpl->getVariable('config')->value->site_url("medis/rawat_jalan/skdp_rencana");?>
',
                data: "skdp_alasan=" + skdp_alasan,
                cache: false,
                success: function (msg) {
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

<script type="text/javascript">
    $(document).ready(function () {
        $(".item_add").click(function () {
            $("#ModalAdd").dialog('open');
        });

        $("#ModalAdd").dialog({
            autoOpen: false,
            resizable: false,
            height: 300,
            width: 700,
            modal: true
        });

        $("#ModalEdit").dialog({
            autoOpen: false,
            resizable: false,
            height: 300,
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

        var FS_KD_REG2 = $('#FS_KD_REG').val();
        var FS_KD_REG_LAMA = $('#FS_KD_REG_LAMA').val();

        $("#loading").hide();
        $("#loading-copy").hide();
        $("#loading-hapus").hide();

        tampil_data_barang(FS_KD_REG_LAMA);
        tampil_resep(FS_KD_REG2);

        function tampil_data_barang(FS_KD_REG_LAMA) {
            $.ajax({
                type: "POST",
                url: '<?php echo $_smarty_tpl->getVariable('config')->value->site_url("medis/rawat_jalan/list_resep");?>
',
                async: false,
                data: '&FS_KD_REG_LAMA=' + FS_KD_REG_LAMA,
                dataType: 'json',
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function (data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                                '<td>' + data[i].FS_NM_BARANG + '</td>' +
                                '<td><center>' + data[i].FN_QTY_BARANG + '</center></td>' +
                                '<td><center>' + data[i].FS_NM_SATUAN + '</center></td>' +
                                '<td><center>' + data[i].FS_ETIKET_QTY + ' x ' + data[i].FS_ETIKET_HARI + '</center></td>' +
                                '<td><center>' +
                                '<a href="javascript:;" class="btn-blue item_edit" data="' + data[i].FS_KD_TRS2 + '">Copy</a>' +
                                '</center></td>' +
                                '</tr>';
                    }
                    $('#show_data').html(html);
                },
                error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.responseText);
                }

            });
        }

        function tampil_resep(FS_KD_REG2) {
            $.ajax({
                type: "POST",
                url: '<?php echo $_smarty_tpl->getVariable('config')->value->site_url("medis/rawat_jalan/list_resep_baru");?>
',
                async: false,
                data: '&FS_KD_REG2=' + FS_KD_REG2,
                dataType: 'json',
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function (data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                                '<tr>' +
                                '<td>' + data[i].FS_NM_BARANG + '</td>' +
                                '<td><center>' + data[i].FN_QTY_BARANG + '</center></td>' +
                                '<td><center>' + data[i].FS_KD_SATUAN + '</center></td>' +
                                '<td><center>' + data[i].FN_ETIKET_QTY + ' x '+data[i].FN_ETIKET_HARI+'</center></td>' +
                                '<td><center>' +
                                '<a href="javascript:;" class="btn-red item_hapus" data="' + data[i].FS_KD_TRS2 + '">Hapus</a>' +
                                '</center></td>' +
                                '</tr>';
                    }
                    $('#show_data_resep_baru').html(html);
                },
                error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.responseText);
                }

            });
        }

        $("#FS_KD_BARANG").change(function () {
            var FS_KD_BARANG = $("#FS_KD_BARANG").val();

            var dataString = '&FS_KD_BARANG=' + FS_KD_BARANG;

            $.ajax({
                type: "POST",
                url: '<?php echo $_smarty_tpl->getVariable('config')->value->site_url("medis/rawat_jalan/SatBarang");?>
',
                data: dataString,
                async: false,
                dataType: 'json',
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function (data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html +=
                                '<input id="FS_KD_SATUAN" name="FS_KD_SATUAN" value="' + data[i].FS_KD_SAT_JUAL + '" class="form-control" type="text" disabled="disabled">' +
                                '<input id="FS_NM_BARANG" name="FS_NM_BARANG" value="' + data[i].FS_NM_BARANG + '" type="hidden">';

                    }
                    $("#show_data_obat").html(html);
                },
                error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.responseText);
                }
            });
        });

        $("#btn-add").click(function () {
            $("#loading").show();
            //Simpan Barang
            var FS_KD_REG = $('#FS_KD_REG').val();
            var FS_KD_BARANG = $('#FS_KD_BARANG').val();
            var FS_NM_BARANG = $('#FS_NM_BARANG').val();
            var FS_KD_SATUAN = $('#FS_KD_SATUAN').val();
            var FN_QTY_BARANG = $('#FN_QTY_BARANG').val();
            var FS_ETIKET_QTY = $('#FS_ETIKET_QTY').val();
            var FN_ETIKET_HARI = $('#FN_ETIKET_HARI').val();
            var FS_ETIKET_CATATAN = $('#FS_ETIKET_CATATAN').val();


            var dataString =
                    '&FS_KD_BARANG=' + FS_KD_BARANG +
                    '&FS_NM_BARANG=' + FS_NM_BARANG +
                    '&FS_KD_SATUAN=' + FS_KD_SATUAN +
                    '&FN_QTY_BARANG=' + FN_QTY_BARANG +
                    '&FS_ETIKET_QTY=' + FS_ETIKET_QTY +
                    '&FN_ETIKET_HARI=' + FN_ETIKET_HARI +
                    '&FS_ETIKET_CATATAN=' + FS_ETIKET_CATATAN +
                    '&FS_KD_REG=' + FS_KD_REG;

            $.ajax({
                type: "POST",
                url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/add_process_resep');?>
",
                dataType: "JSON",
                data: dataString,
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function (data) {
                    $("#loading").hide();
                    $('#ModalAdd').dialog('close');
                    $('[name="FS_KD_BARANG"]').val("");
                    $('[name="FS_KD_SATUAN"]').val("");
                    $('[name="FS_NM_BARANG"]').val("");
                    $('[name="FN_QTY_BARANG"]').val("");
                    $('[name="FS_ETIKET_QTY"]').val("");
                    $('[name="FN_ETIKET_HARI"]').val("");
                    $('[name="FS_ETIKET_CATATAN"]').val("");
                    
                    tampil_data_barang(FS_KD_REG_LAMA);
                    tampil_resep(FS_KD_REG2);
                },
                error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.responseText);
                }
            });
        });

        $("#btn-add-copy").click(function () {
            $("#loading-copy").show();
            //Simpan Barang
            var FS_KD_REG = $('#FS_KD_REG').val();
            var FS_KD_BARANG = $('#FS_KD_BARANG_COPY').val();
            var FS_NM_BARANG = $('#FS_NM_BARANG_COPY').val();
            var FS_KD_SATUAN = $('#FS_KD_SATUAN_COPY').val();
            var FN_QTY_BARANG = $('#FN_QTY_BARANG_COPY').val();
            var FS_ETIKET_QTY = $('#FN_ETIKET_QTY_COPY').val();
            var FN_ETIKET_HARI = $('#FN_ETIKET_HARI_COPY').val();
            var FS_ETIKET_CATATAN = $('#FS_ETIKET_CATATAN_COPY').val();


            var dataString =
                    '&FS_KD_BARANG=' + FS_KD_BARANG +
                    '&FS_NM_BARANG=' + FS_NM_BARANG +
                    '&FS_KD_SATUAN=' + FS_KD_SATUAN +
                    '&FN_QTY_BARANG=' + FN_QTY_BARANG +
                    '&FS_ETIKET_QTY=' + FS_ETIKET_QTY +
                    '&FN_ETIKET_HARI=' + FN_ETIKET_HARI +
                    '&FS_ETIKET_CATATAN=' + FS_ETIKET_CATATAN +
                    '&FS_KD_REG=' + FS_KD_REG;

            $.ajax({
                type: "POST",
                url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/add_process_resep');?>
",
                dataType: "JSON",
                data: dataString,
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function (data) {
                    $("#loading-copy").hide();
                    $('#ModalEdit').dialog('close');
                    $('[name="FS_KD_BARANG"]').val("");
                    $('[name="FS_KD_SATUAN"]').val("");
                    $('[name="FS_NM_BARANG"]').val("");
                    $('[name="FN_QTY_BARANG"]').val("");
                    $('[name="FS_ETIKET_CATATAN"]').val("");
                    $('[name="FS_ETIKET_QTY"]').val("");
                    $('[name="FN_ETIKET_HARI"]').val("");

                    tampil_data_barang(FS_KD_REG_LAMA);
                    tampil_resep(FS_KD_REG2);
                },
                error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.responseText);
                }
            });
        });

        $('#show_data').on('click', '.item_edit', function () {
            var id = $(this).attr('data');
            var dataString = '&id=' + id;
            $.ajax({
                type: "POST",
                url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/get_resep_by_copy');?>
",
                dataType: "JSON",
                data: dataString,
                success: function (data) {
                    $("#ModalEdit").dialog('open');
                    var i;
                    for (i = 0; i < data.length; i++) {
                        $('[name="FS_KD_BARANG"]').val(data[i].FS_KD_BARANG);
                        $('[name="FS_NM_BARANG"]').val(data[i].FS_NM_BARANG);
                        $('[name="FN_QTY_BARANG_EDIT"]').val(data[i].FN_QTY_BARANG);
                        $('[name="FS_ETIKET_QTY"]').val(data[i].FS_ETIKET_QTY);
                        $('[name="FN_ETIKET_HARI"]').val(data[i].FS_ETIKET_HARI);
                        $('[name="FS_KD_SATUAN"]').val(data[i].FS_KD_SATUAN);
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.responseText);
                }
            });
            return false;
        });

        $('#show_data_resep_baru').on('click', '.item_hapus', function () {
            var id = $(this).attr('data');
            $("#ModalHapus").dialog('open');
            $('[name="FS_KD_TRS2"]').val(id);
        });
        
         $('#btn_hapus').on('click', function () {
            $("#loading-hapus").show();
            var kode = $('#FS_KD_TRS2').val();
            var dataString = '&kode=' + kode
            $.ajax({
                type: "POST",
                url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/delete_resep_process');?>
",
                dataType: "JSON",
                data: dataString,
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function (data) {
                    $("#loading-hapus").hide();
                    $('#ModalHapus').dialog('close');
                    tampil_data_barang(FS_KD_REG_LAMA);
                    tampil_resep(FS_KD_REG2);
                }
            });
        });
    });
</script>