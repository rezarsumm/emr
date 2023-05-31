<?php /* Smarty version Smarty-3.0.7, created on 2022-10-14 08:51:51
         compiled from "application/views\inap/ass_jatuh/add.html" */ ?>
<?php /*%%SmartyHeaderCode:148496348c0b74111e5-36898846%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c83606523ae93d739ec6803478117da8aacc37e' => 
    array (
      0 => 'application/views\\inap/ass_jatuh/add.html',
      1 => 1665712308,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148496348c0b74111e5-36898846',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><!-- include javascript -->
<?php $_template = new Smarty_Internal_Template("inap/ass_jatuh/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of include javascript-->
<script type="text/javascript">
    $(document).ready(function () {
        score();
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
        // $("#op4").change(function () {
        //     var sc = $(this).val();
        //     $("#sc4").html(sc);
        //     score();
        // });
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
            scored();
        });
        $("#op9").change(function () {
            var scd = $(this).val();
            $("#sc9").html(scd);
            scored();
        });
        $("#op10").change(function () {
            var scd = $(this).val();
            $("#sc10").html(scd);
            scored();
        });
        $("#op11").change(function () {
            var scd = $(this).val();
            $("#sc11").html(scd);
            scored();
        });
        $("#op12").change(function () {
            var scd = $(this).val();
            $("#sc12").html(scd);
            scored();
        });
        $("#op13").change(function () {
            var scd = $(this).val();
            $("#sc13").html(scd);
            scored();
        });









        $("#op14").change(function () {
            var scd = $(this).val();
            $("#sc14").html(scd);
            scoret();
        });
        $("#op15").change(function () {
            var scd = $(this).val();
            $("#sc15").html(scd);
            scoret();
        });
        $("#op16").change(function () {
            var scd = $(this).val();
            $("#sc16").html(scd);
            scoret();
        });
        $("#op17").change(function () {
            var scd = $(this).val();
            $("#sc17").html(scd);
            scoret();
        });
        $("#op18").change(function () {
            var scd = $(this).val();
            $("#sc18").html(scd);
            scoret();
        });
        $("#op19").change(function () {
            var scd = $(this).val();
            $("#sc19").html(scd);
            scoret();
        });
        
    });
</script>
<script type="text/javascript">
    function score() { //ANAK
        var sc = parseInt($("#sc1").text()) + parseInt($("#sc2").text()) + parseInt($("#sc3").text()) +  parseInt($("#sc5").text()) + parseInt($("#sc6").text()) + parseInt($("#sc7").text());
        $("#totalsc").html(sc);
        if (sc <7) {
            $("#rjtkesimpulan").html("RISIKO RENDAH");
        }
        else if (sc >= 7 && sc <= 11) {
            $("#rjtkesimpulan").html("RISIKO SEDANG");
        } else if (sc >= 12) {
            $("#rjtkesimpulan").html("RISIKO TINGGI");
        }
    }
    function scored() {
        var scd = parseInt($("#sc8").text()) + parseInt($("#sc9").text()) + parseInt($("#sc10").text()) + parseInt($("#sc11").text()) + parseInt($("#sc12").text()) + parseInt($("#sc13").text());
        $("#totalscd").html(scd);
        if (scd >= 0 && scd <= 24) {
            $("#rjtkesimpuland").html("RISIKO RENDAH");
        } else if (scd >= 25 && scd <= 45) {
            $("#rjtkesimpuland").html("RISIKO SEDANG");
        } else if (scd > 45) {
            $("#rjtkesimpuland").html("RISIKO TINGGI");
        }
    }


    function scoret() {
        var scd = parseInt($("#sc14").text()) + parseInt($("#sc15").text()) + parseInt($("#sc16").text()) + parseInt($("#sc17").text()) + parseInt($("#sc18").text()) + parseInt($("#sc19").text());
        $("#totalsct").html(scd);
        if (scd >= 0 && scd <= 4) {
            $("#rjtkesimpulant").html("RISIKO RENDAH");
        }  else if (scd > 5) {
            $("#rjtkesimpulant").html("RISIKO TINGGI");
        }
    }
    
</script>
<div class="breadcrum">
    <p>
        <a href="#">Catatan Rawat Inap</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_jatuh/');?>
">Asesmen Jatuh</a><span></span>
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_jatuh/add_process');?>
" method="post">
        <input name="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />

        <table class="table-info" width="100%">
            <tr class="headrow">
                <th colspan="2">Add Asesmen Jatuh</th>
            </tr>
            <tr>
                <td>NAMA</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NAMA_PASIEN'];?>

                </td>
            </tr>
            <tr>
                <td>NO MR</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>

                </td>
            </tr>
            <tr>
                <td>TANGGAL LAHIR</td>
                <td>
                    <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('rs_pasien')->value['TGL_LAHIR'],"%d %b %Y");?>

                </td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['ALAMAT'];?>
</td>
            </tr>
            <tr>
                <td>Umur</td>
                <td><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fn_umur'];?>
 Tahun</td>
            </tr>
        </table>
     
        <table class="table-input" width="100%">
            <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['fn_umur']<=18){?>
            <tr class="headrow">
                <th colspan="4">Asesmen Jatuh Anak Skala Humpty Dumpty (1-18 tahun)</th>
            <input type="hidden" name="FS_TIPE_RISIKO_JATUH" value='1'/>
            </tr>
            <tr>
                <td width='20%'>Usia</td>
                <td width='30%'>
                    <select name="FS_PARAM_1" class="select2" style="width: 250px;" id="op1">
                        <option value="">--Pilih Data--</option>
                        <option value="4">dibawah 3 Tahun</option>
                        <option value="3">3-7 Tahun</option>
                        <option value="2">7-13 Tahun</option>
                        <option value="1">> 13 Tahun</option>

                    </select>
                    <span id="sc1"></span>
                </td>
                <td width='20%'>Kesimpulan</td>
                <td width='30%'><b><span id="rjtkesimpulan"></span></b></td>
            </tr>
            <tr>
                <td width='20%'>Jenis Kelamin</td>
                <td width='30%'>
                    <select name="FS_PARAM_2" class="select2" style="width: 250px;" id="op2">
                        <option value="">--Pilih Data--</option>
                        <option value="2">Laki-Laki</option>
                        <option value="1">Perempuan</option>
                    </select>
                    <span id="sc2"></span>
                </td>
                <td></td>
                <td>
                </td>
            </tr>
            <tr>
                <td>Diagnosis</td>
                <td>
                    <select name="FS_PARAM_3" class="select2" style="width: 250px;" id="op3">
                        <option value="">--Pilih Data--</option>
                        <option value="4">Diagnosis Neurologi</option>
                        <option value="3">Perubahan Oksigenasi</option>
                        <option value="2">Gangguan Perilaku/Psikiatri</option>
                        <option value="1">Diagnosis Lainnya</option>
                    </select>
                    <span id="sc3"></span>
                  
                </td>
                <td></td>
                <td></td>
            </tr>
            <!-- <tr>
                <td>Gangguan Kognitif</td>
                <td>
                    <select name="FS_PARAM_4" class="select2" style="width: 250px;" id="op4">
                        <option value="">--Pilih Data--</option>
                        <option value="3">Tidak Menyadari keterbatasan dirinya</option>
                        <option value="2">Lupa akan adanya keterbatasan</option>
                        <option value="1">Orientasi baik terhadap diri sendiri</option>
                    </select>
                    <span id="sc4"></span>
                </td>
                <td></td>
                <td></td>
            </tr> -->
            <tr>
                <td>Faktor Lingkungan</td>
                <td>
                    <select name="FS_PARAM_5" class="select2" style="width: 250px;" id="op5">
                        <option value="">--Pilih Data--</option>
                        <option value="4">Riwayat jatuh/bayi diletakkan di tempat tidur dewasa</option>
                        <option value="3">Pasien Menggunakanalat bantu/bayi diletakkan dalam tempat tifur bayi/perabot rumah</option>
                        <option value="2">Pasien diletakkan di tempat tidur</option>
                        <option value="1">Area diluar rumah sakit</option>
                    </select>
                    <span id="sc5"></span>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Respon Terhadap Pembedahan / Sedasi / Anestesi</td>
                <td>
                    <select name="FS_PARAM_6" class="select2" style="width: 250px;" id="op6">
                        <option value="">--Pilih Data--</option>
                        <option value="3">Dalam 24 jam</option>
                        <option value="2">Dalam 48 jam</option>
                        <option value="1">> 48 jam atau tidak menjalani pembedahan / sedasi/anastesi</option>
                    </select>
                    <span id="sc6"></span>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Respon Terhadap Penggunaan medikamentosa</td>
                <td>
                    <select name="FS_PARAM_7" class="select2" style="width: 250px;" id="op7">
                        <option value="">--Pilih Data--</option>
                        <option value="3">Penggunaan multipel</option>
                        <option value="2">Penggunaan salah satu obat</option>
                        <option value="1">Penggunaan medikasi lainnya/tidak ada medikasi</option>
                    </select>
                    <span id="sc7"></span>
                </td>
                <td></td>
                <td></td>
            </tr>
            <?php }elseif($_smarty_tpl->getVariable('rs_pasien')->value['fn_umur']>18&&$_smarty_tpl->getVariable('rs_pasien')->value['fn_umur']<=65){?>
             <tr class="headrow">
                <th colspan="4">Asesmen Jatuh Dewasa Morse Fall Scale (>18-65 tahun</th>
            <input type="hidden" name="FS_TIPE_RISIKO_JATUH" value='2'/>
            </tr>
            <tr>
                <td width='20%'>Riwayat Jatuh</td>
                <td width='30%'>
                    <select name="FS_PARAM_1" class="select2" style="width: 250px;" id="op8">
                        <option value="">--Pilih Data--</option>
                        <option value="25">< 3 bulan</option>
                        <option value="0">tidak ada atau > 3 bulan</option>

                    </select>
                    <span id="sc8"></span>
                </td>
                <td width='20%'>Kesimpulan</td>
                <td width='30%'><b><span id="rjtkesimpuland"></span></b></td>
            </tr>
             <tr>
                <td>Diagnosa medis sekunder</td>
                <td>
                    <select name="FS_PARAM_2" class="select2" style="width: 250px;" id="op9">
                        <option value="">--Pilih Data--</option>
                        <option value="15">> 1 diagnosa penyakit</option>
                        <option value="0"><= 1 diagnosa penyakit</option>
                    </select>
                    <span id="sc9"></span>
                </td>
                <td></td>
                <td></td>
            </tr>
             <tr>
                <td>Alat bantu jalan</td>
                <td>
                    <select name="FS_PARAM_3" class="select2" style="width: 250px;" id="op10">
                        <option value="">--Pilih Data--</option>
                        <option value="30">Perabot</option>
                        <option value="15">Tongkat / penopang</option>
                        <option value="0">Tidak ada / Tirah baring</option>
                    </select>
                    <span id="sc10"></span>
                </td>
                <td></td>
                <td></td>
            </tr>
             <tr>
                <td>Terapi IV / anti koagulan</td>
                <td>
                    <select name="FS_PARAM_4" class="select2" style="width: 250px;" id="op11">
                        <option value="">--Pilih Data--</option>
                        <option value="20">Terapi IV terus menerus</option>
                        <option value="0">Tidak</option>
                    </select>
                    <span id="sc11"></span>
                </td>
                <td></td>
                <td></td>
            </tr>
             <tr>
                <td>Gaya berjalan</td>
                <td>
                    <select name="FS_PARAM_5" class="select2" style="width: 250px;" id="op12">
                        <option value="">--Pilih Data--</option>
                        <option value="30">Kerusakan (Terganggu)</option>
                        <option value="15">Lemah</option>
                        <option value="0">Normal / Tirah baring</option>
                    </select>
                    <span id="sc12"></span>
                </td>
                <td></td>
                <td></td>
            </tr>
             <tr>
                <td>Status Mental</td>
                <td>
                    <select name="FS_PARAM_6" class="select2" style="width: 250px;" id="op13">
                        <option value="">--Pilih Data--</option>
                        <option value="15">Lupa keterbatasan</option>
                        <option value="0">Sadar kemampuan diri</option>
                    </select>
                    <span id="sc13"></span>
                </td>
                <td></td>
                <td></td>
            </tr>
            <?php }else{ ?>
             <tr class="headrow">
                <th colspan="4">Asesmen Jatuh Lanjut Usia (Ann Henrich) usia >65 tahun</th>
            <input type="hidden" name="FS_TIPE_RISIKO_JATUH" value='3'/>
            </tr>
            <tr class="headrow">
                <th colspan="4">Riwayat Jatuh</th>
            </tr>
            <tr>
                <td width='20%'>Disorientasi</td>
                <td width='30%'>
                    <select name="FS_PARAM_12" class="select2" style="width: 250px;" id="op14">
                        <option value="">--Pilih Data--</option>
                        <option value="4">Ya</option>
                        <option value="0">Tidak</option>

                    </select>
                    <span id="sc14"></span>
                </td>
                <td width='20%'>Kesimpulan</td>
                <td width='30%'><b><span id="rjtkesimpulant"></span></b></td>
            </tr>
             <tr>
                <td>Gangguan Gaya berjalan</td>
                <td>
                    <select name="FS_PARAM_13" class="select2" style="width: 250px;" id="op15">
                        <option value="">--Pilih Data--</option>
                        <option value="4">Ya</option>
                        <option value="0">Tidak</option>

                    </select>
                    <span id="sc15"></span>
                </td>
                <td></td>
                <td></td>
            </tr>
             <tr>
                <td>Riwayat Jatuh dalam 12 bulan terakhir</td>
                <td>
                    <select name="FS_PARAM_14" class="select2" style="width: 250px;" id="op16">
                        <option value="">--Pilih Data--</option>
                        <option value="2">Ya</option>
                        <option value="0">Tidak</option>

                    </select>
                    <span id="sc16"></span>
                </td>
                <td></td>
                <td></td>
            </tr>
             <tr>
                <td>Obat beresiko tinggi</td>
                <td>
                    <select name="FS_PARAM_15" class="select2" style="width: 250px;" id="op17">
                        <option value="">--Pilih Data--</option>
                        <option value="2">Ya</option>
                        <option value="0">Tidak</option>
                    </select>
                    <span id="sc17"></span>
                </td>
                <td></td>
                <td></td>
            </tr>
             <tr>
                <td>Gangguan pendengan, penglihan</td>
                <td>
                    <select name="FS_PARAM_16" class="select2" style="width: 250px;" id="op18">
                        <option value="">--Pilih Data--</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </select>
                    <span id="sc18"></span>
                </td>
                <td></td>
                <td></td>
            </tr>
             <tr>
                <td>Pusing/vertigo</td>
                <td>
                    <select name="FS_PARAM_17" class="select2" style="width: 250px;" id="op19">
                        <option value="">--Pilih Data--</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </select>
                    <span id="sc19"></span>
                </td>
                <td></td>
                <td></td>
            </tr>
            
            <?php }?>
             <tr>
                <td>Pencegahan Jatuh</td>
                <td colspan="3">
                   <select name="tujuan[]" multiple id="tujuan" style="width:250px">
                    <option></option>
                </select>
                </td>
            </tr>
            <tr class="submit-box">
                <td colspan="4">
                     <div style="font-weight: bold;">
                    *Bismillahirohmanirrohim, saya dengan sadar dan penuh tanggung jawab mengisikan formulir ini dengan data yang benar
                </div>
                <br>
                    <input type="submit" name="save" value="Simpan" class="edit-button"/>
                </td>
            </tr>
        </table>
    </form>
</div>
<div class="navigation">
    <div class="pageRow">
        <div class="pageNav">
            <ul>
                <li class="info"></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
    <div class="navigation-button">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_inap/cetak_rm/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'])).('/')).('6'));?>
" target="_blank"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/printer-icon.png" alt="" /> Print</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<table class="table-view" width="100%">
    <tr class="headrow">
        <th colspan="5">List Data Asesmen Resiko Jatuh</th>
    </tr>
    <tr>
        <th width="7%">Tanggal</th>
        <th>Deskripsi</th>
        <th>Pencegahan Jatuh</th>
        <th width="15%">Aksi</th>
    </tr>
    <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['fn_umur']<=14){?>
    <?php  $_smarty_tpl->tpl_vars['data_anak'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_result_anak')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data_anak']->key => $_smarty_tpl->tpl_vars['data_anak']->value){
?>
    <?php $_smarty_tpl->tpl_vars['rs_pencegahan'] = new Smarty_variable($_smarty_tpl->getVariable('m_ass_jatuh')->value->get_pencegahan_jatuh_by_id(array($_smarty_tpl->tpl_vars['data_anak']->value['FS_KD_TRS2'])), null, null);?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['data_anak']->value['mdd'];?>
/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data_anak']->value['mdd_time'],'%H:%M');?>
</td>
        <td>
            
            <?php $_smarty_tpl->tpl_vars["jatuh_anak"] = new Smarty_variable((($_smarty_tpl->tpl_vars['data_anak']->value['FS_PARAM_1']+$_smarty_tpl->tpl_vars['data_anak']->value['FS_PARAM_2']+$_smarty_tpl->tpl_vars['data_anak']->value['FS_PARAM_3']+$_smarty_tpl->tpl_vars['data_anak']->value['FS_PARAM_4']+$_smarty_tpl->tpl_vars['data_anak']->value['FS_PARAM_5']+$_smarty_tpl->tpl_vars['data_anak']->value['FS_PARAM_6']+$_smarty_tpl->tpl_vars['data_anak']->value['FS_PARAM_7'])), null, null);?>
            <?php if ($_smarty_tpl->getVariable('jatuh_anak')->value>='7'&&$_smarty_tpl->getVariable('jatuh_anak')->value<='11'){?>
            <b>RISIKO RENDAH</b>
            <?php }elseif($_smarty_tpl->getVariable('jatuh_anak')->value>='12'){?>
            <b>RISIKO TINGGI</b>
            <?php }?>
        </td>
        <td>
             <?php  $_smarty_tpl->tpl_vars['data2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pencegahan')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data2']->key => $_smarty_tpl->tpl_vars['data2']->value){
?>
            -<?php echo $_smarty_tpl->tpl_vars['data2']->value['FS_NM_PENCEGAHAN_JATUH'];?>
<br>
            <?php }} ?>
        </td>
        <td>
            <?php if ($_smarty_tpl->getVariable('data')->value['mdd']>=$_smarty_tpl->getVariable('tgl_kemarin')->value){?>  
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('inap/ass_jatuh/delete_process').('/')).($_smarty_tpl->getVariable('data')->value['FS_KD_TRS']));?>
" onclick="return confirm('Apakah Anda Yakin Akan Menghapus?');" class="button-hapus">Hapus</a>  
            <?php }?>
        </td>
    </tr>
    <?php }} ?>
    <?php }elseif($_smarty_tpl->getVariable('rs_pasien')->value['fn_umur']>='14'&&$_smarty_tpl->getVariable('rs_pasien')->value['fn_umur']<='65'){?>
    <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_result_dewasa')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
    <?php $_smarty_tpl->tpl_vars['rs_pencegahan'] = new Smarty_variable($_smarty_tpl->getVariable('m_ass_jatuh')->value->get_pencegahan_jatuh_by_id(array($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS2'])), null, null);?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['mdd'];?>
/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['mdd_time'],'%H:%M');?>
</td>
        <td>
            <?php $_smarty_tpl->tpl_vars["jatuh_dewasa"] = new Smarty_variable((($_smarty_tpl->tpl_vars['data']->value['FS_PARAM_1']+$_smarty_tpl->tpl_vars['data']->value['FS_PARAM_2']+$_smarty_tpl->tpl_vars['data']->value['FS_PARAM_3']+$_smarty_tpl->tpl_vars['data']->value['FS_PARAM_4']+$_smarty_tpl->tpl_vars['data']->value['FS_PARAM_5']+$_smarty_tpl->tpl_vars['data']->value['FS_PARAM_6']+$_smarty_tpl->tpl_vars['data']->value['FS_PARAM_7'])), null, null);?>
            <?php if (($_smarty_tpl->getVariable('jatuh_dewasa')->value>='0')&&($_smarty_tpl->getVariable('jatuh_dewasa')->value<='24')){?>
            <b>RISIKO RENDAH</b>
            <?php }elseif(($_smarty_tpl->getVariable('jatuh_dewasa')->value>='25')&&($_smarty_tpl->getVariable('jatuh_dewasa')->value<='45')){?>
            <b>RISIKO SEDANG</b>
            <?php }elseif($_smarty_tpl->getVariable('jatuh_dewasa')->value>'45'){?>
            <b>RISIKO TINGGI</b>
            <?php }?>
        </td>
        <td>
             <?php  $_smarty_tpl->tpl_vars['data2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pencegahan')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data2']->key => $_smarty_tpl->tpl_vars['data2']->value){
?>
            -<?php echo $_smarty_tpl->tpl_vars['data2']->value['FS_NM_PENCEGAHAN_JATUH'];?>
<br>
            <?php }} ?>
        </td>
        <td>
            <?php if ($_smarty_tpl->tpl_vars['data']->value['mdd']>=$_smarty_tpl->getVariable('tgl_kemarin')->value){?>  
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('inap/ass_jatuh/delete_process').('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
" onclick="return confirm('Apakah Anda Yakin Akan Menghapus?');" class="button-hapus">Hapus</a>  
            <?php }?>
        </td>
    </tr>
    <?php }} ?>
    <?php }elseif($_smarty_tpl->getVariable('rs_pasien')->value['fn_umur']>'65'){?>
    <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_result_dewasa2')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
    <?php $_smarty_tpl->tpl_vars['rs_pencegahan'] = new Smarty_variable($_smarty_tpl->getVariable('m_ass_jatuh')->value->get_pencegahan_jatuh_by_id(array($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS2'])), null, null);?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['mdd'];?>
/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['mdd_time'],'%H:%M');?>
</td>
        <td>
            <?php $_smarty_tpl->tpl_vars["jatuh"] = new Smarty_variable((($_smarty_tpl->tpl_vars['data']->value['FS_PARAM_1']+$_smarty_tpl->tpl_vars['data']->value['FS_PARAM_2'])), null, null);?>
            <?php $_smarty_tpl->tpl_vars["mental"] = new Smarty_variable((($_smarty_tpl->tpl_vars['data']->value['FS_PARAM_3']+$_smarty_tpl->tpl_vars['data']->value['FS_PARAM_4']+$_smarty_tpl->tpl_vars['data']->value['FS_PARAM_5'])), null, null);?>
            <?php $_smarty_tpl->tpl_vars["pengelihatan"] = new Smarty_variable((($_smarty_tpl->tpl_vars['data']->value['FS_PARAM_6']+$_smarty_tpl->tpl_vars['data']->value['FS_PARAM_7']+$_smarty_tpl->tpl_vars['data']->value['FS_PARAM_8'])), null, null);?>
            <?php $_smarty_tpl->tpl_vars["kemih"] = new Smarty_variable(($_smarty_tpl->tpl_vars['data']->value['FS_PARAM_9']), null, null);?>
            <?php $_smarty_tpl->tpl_vars["transmob"] = new Smarty_variable((($_smarty_tpl->tpl_vars['data']->value['FS_PARAM_10']+$_smarty_tpl->tpl_vars['data']->value['FS_PARAM_11'])), null, null);?>
            
            <?php if ($_smarty_tpl->getVariable('jatuh')->value>='1'){?>
            <?php $_smarty_tpl->tpl_vars["jatuh"] = new Smarty_variable("6", null, null);?>
            <?php }else{ ?>
            <?php $_smarty_tpl->tpl_vars["jatuh"] = new Smarty_variable("0", null, null);?>
            <?php }?>
            
            <?php if ($_smarty_tpl->getVariable('mental')->value>='1'){?>
            <?php $_smarty_tpl->tpl_vars["mental"] = new Smarty_variable("14", null, null);?>
            <?php }else{ ?>
            <?php $_smarty_tpl->tpl_vars["mental"] = new Smarty_variable("0", null, null);?>
            <?php }?>
            
            <?php if ($_smarty_tpl->getVariable('pengelihatan')->value>='1'){?>
            <?php $_smarty_tpl->tpl_vars["pengelihatan"] = new Smarty_variable("1", null, null);?>
            <?php }else{ ?>
            <?php $_smarty_tpl->tpl_vars["pengelihatan"] = new Smarty_variable("0", null, null);?>
            <?php }?>
            
            <?php if ($_smarty_tpl->getVariable('kemih')->value>='1'){?>
            <?php $_smarty_tpl->tpl_vars["kemih"] = new Smarty_variable("2", null, null);?>
            <?php }else{ ?>
            <?php $_smarty_tpl->tpl_vars["kemih"] = new Smarty_variable("0", null, null);?>
            <?php }?>
            
            <?php if ($_smarty_tpl->getVariable('transmob')->value>='0'&&$_smarty_tpl->getVariable('transmob')->value<='3'){?>
            <?php $_smarty_tpl->tpl_vars["transmob"] = new Smarty_variable("0", null, null);?>
            <?php }elseif($_smarty_tpl->getVariable('transmob')->value>='4'){?>
            <?php $_smarty_tpl->tpl_vars["transmob"] = new Smarty_variable("7", null, null);?>
            <?php }?>
            
             <?php $_smarty_tpl->tpl_vars["sydneyscore"] = new Smarty_variable((($_smarty_tpl->getVariable('jatuh')->value+$_smarty_tpl->getVariable('mental')->value+$_smarty_tpl->getVariable('pengelihatan')->value+$_smarty_tpl->getVariable('kemih')->value+$_smarty_tpl->getVariable('transmob')->value)), null, null);?>
             
             <?php if ($_smarty_tpl->getVariable('sydneyscore')->value>='0'&&$_smarty_tpl->getVariable('sydneyscore')->value<='5'){?>
             <b>RISIKO RENDAH</b>
             <?php }elseif($_smarty_tpl->getVariable('sydneyscore')->value>='6'&&$_smarty_tpl->getVariable('sydneyscore')->value<='16'){?>
             <b>RISIKO SEDANG</b>
             <?php }elseif($_smarty_tpl->getVariable('sydneyscore')->value>='17'&&$_smarty_tpl->getVariable('sydneyscore')->value<='30'){?>
             <b>RISIKO TINGGI</b>
             <?php }?>
        </td>
        <td>
             <?php  $_smarty_tpl->tpl_vars['data2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pencegahan')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data2']->key => $_smarty_tpl->tpl_vars['data2']->value){
?>
            -<?php echo $_smarty_tpl->tpl_vars['data2']->value['FS_NM_PENCEGAHAN_JATUH'];?>
<br>
            <?php }} ?>
        </td>
        <td>
            <?php if ($_smarty_tpl->tpl_vars['data']->value['mdd']>=$_smarty_tpl->getVariable('tgl_kemarin')->value){?>  
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((('inap/ass_jatuh/delete_process').('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_TRS']));?>
" onclick="return confirm('Apakah Anda Yakin Akan Menghapus?');" class="button-hapus">Hapus</a>  
            <?php }?>
        </td>
    </tr>
    <?php }} ?>
    <?php }?>
</table>