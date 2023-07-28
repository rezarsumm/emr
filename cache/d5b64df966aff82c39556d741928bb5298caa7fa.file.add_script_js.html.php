<?php /* Smarty version Smarty-3.0.7, created on 2023-07-28 13:35:44
         compiled from "application/views\inap/cppt/add_script_js.html" */ ?>
<?php /*%%SmartyHeaderCode:2838364c361c002c288-67608162%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5b64df966aff82c39556d741928bb5298caa7fa' => 
    array (
      0 => 'application/views\\inap/cppt/add_script_js.html',
      1 => 1645081753,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2838364c361c002c288-67608162',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
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
        // tujuan
        
        $(".item_add").click(function () {
            $("#ModalAdd").dialog('open');
        });
        
        $(".item_status_add").click(function () {
            $("#ModalAddStatus").dialog('open');
        });

        $("#ModalAdd").dialog({
            autoOpen: false,
            resizable: false,
            height: 300,
            width: 700,
            modal: true
        });
        
        $("#ModalAddStatus").dialog({
            autoOpen: false,
            resizable: false,
            height: 250,
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

        $("#loading").hide();
        $("#loading-hapus").hide();
        $("#loadingStatus").hide();

        var FS_KD_REG2 = $('#FS_KD_REG').val();
        tampil_resep(FS_KD_REG2);

        function tampil_resep(FS_KD_REG2) {
            $.ajax({
                type: "POST",
                url: '<?php echo $_smarty_tpl->getVariable('config')->value->site_url("inap/cppt/list_resep_baru");?>
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
                                '<td><center>' + data[i].FN_ETIKET_QTY + ' x '+ data[i].FN_ETIKET_HARI + 'Per Hari</center></td>' +
                                '<td><center>' + data[i].FS_ETIKET_CATATAN + '</center></td>' +
                                '<td><center>' +
                                '<a href="javascript:;" class="btn-red item_hapus" data="' + data[i].FS_KD_TRS + '">Hapus</a>' +
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
                url: '<?php echo $_smarty_tpl->getVariable('config')->value->site_url("inap/cppt/SatBarang");?>
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
                                '<input id="FS_KD_SATUAN" name="FS_KD_SATUAN" value="' + data[i].SATUAN + '" class="form-control" type="text" disabled="disabled">' +
                                '<input id="FS_NM_BARANG" name="FS_NM_BARANG" value="' + data[i].NAMA_OBAT + '" type="hidden">';

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
            var FN_ETIKET_QTY = $('#FN_ETIKET_QTY').val();
            var FN_ETIKET_HARI = $('#FN_ETIKET_HARI').val();
            var FS_ETIKET_CATATAN = $('#FS_ETIKET_CATATAN').val();


            var dataString =
                    '&FS_KD_BARANG=' + FS_KD_BARANG +
                    '&FS_KD_SATUAN=' + FS_KD_SATUAN +
                    '&FS_NM_BARANG=' + FS_NM_BARANG +
                    '&FN_QTY_BARANG=' + FN_QTY_BARANG +
                    '&FN_ETIKET_QTY=' + FN_ETIKET_QTY +
                    '&FN_ETIKET_HARI=' + FN_ETIKET_HARI +
                    '&FS_ETIKET_CATATAN=' + FS_ETIKET_CATATAN +
                    '&FS_KD_REG=' + FS_KD_REG;

            $.ajax({ 
                type: "POST",
                url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/cppt/add_process_resep');?>
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
                    $('[name="FN_ETIKET_QTY"]').val("");
                    $('[name="FN_ETIKET_HARI"]').val("");
                    $('[name="FS_ETIKET_CATATAN"]').val("");
                    tampil_resep(FS_KD_REG2);
                },
                error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.responseText);
                }
            });
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
                url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/cppt/delete_resep_process');?>
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

                    tampil_resep(FS_KD_REG2);
                }
            });
        });
        
         $("#btn-addStatus").click(function () {
            $("#loadingStatus").show();
            //Simpan Barang
            var FS_KD_REG = $('#FS_KD_REG').val();
            var FS_CARA_PULANG = $('#FS_CARA_PULANG').val();
            var FS_DIAG_UTAMA = $('#FS_DIAG_UTAMA').val();
            var FS_DIAG_SEK = $('#FS_DIAG_SEK').val();

            var dataString =
                    '&FS_KD_REG=' + FS_KD_REG +
                    '&FS_DIAG_UTAMA=' + FS_DIAG_UTAMA +
                    '&FS_CARA_PULANG=' + FS_CARA_PULANG +
                    '&FS_DIAG_SEK=' + FS_DIAG_SEK;

            $.ajax({
                type: "POST",
                url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/cppt/add_process_cara_pulang');?>
",
                dataType: "JSON",
                data: dataString,
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function (data) {
                    $("#loadingStatus").hide();
                    $('#ModalAddStatus').dialog('close');
                    $('[name="FS_CARA_PULANG"]').val("");
                    $('[name="FS_DIAG_UTAMA"]').val("");
                    $('[name="FS_DIAG_SEK"]').val("");
                },
                error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.responseText);
                }
            });
        });
    });
</script>