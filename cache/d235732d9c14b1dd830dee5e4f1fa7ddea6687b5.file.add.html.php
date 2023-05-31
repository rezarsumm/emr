<?php /* Smarty version Smarty-3.0.7, created on 2022-08-08 15:11:09
         compiled from "application/views\nurse/rawat_jalan/add.html" */ ?>
<?php /*%%SmartyHeaderCode:1064762f0c51d3b19d9-53913692%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd235732d9c14b1dd830dee5e4f1fa7ddea6687b5' => 
    array (
      0 => 'application/views\\nurse/rawat_jalan/add.html',
      1 => 1659945909,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1064762f0c51d3b19d9-53913692',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("nurse/rawat_jalan/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
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
        $("#sn1").change(function () { 
            var sn = $(this).val();
            $("#snh1").html(sn);
            score_sn();
        });
        $("#sn2").change(function () {
            var sn = $(this).val();
            $("#snh2").html(sn);
            score_sn();
        });
        $("#sna1").change(function () {
            var sna = $(this).val();
            $("#snha1").html(sna);
            score_sna();
        });
        $("#sna2").change(function () {
            var sna = $(this).val();
            $("#snha2").html(sna);
            score_sna();
        });
        $("#sna3").change(function () {
            var sna = $(this).val();
            $("#snha3").html(sna);
            score_sna();
        });
        $("#sna4").change(function () {
            var sna = $(this).val();
            $("#snha4").html(sna);
            score_sna();
        });
    });
</script>
<script type="text/javascript">
    function score() {
        var sc = parseInt($("#sc1").text()) + parseInt($("#sc2").text()) + parseInt($("#sc3").text());
        $("#totalsc").html(sc);
        if (sc >= 3) {
            $("#rjtkesimpulan").html("RISIKO TINGGI");
        } else if (sc == 2) {
            $("#rjtkesimpulan").html("RISIKO SEDANG");
        } else if (sc <= 1) {
            $("#rjtkesimpulan").html("RISIKO RENDAH");
        }
    }
    function score_sn() {
        var sn = parseInt($("#snh1").text()) + parseInt($("#snh2").text());
        $("#totalsn").html(sn);
        if (sn >= 2) {
            $("#kesimpulansn").html("LAPORKAN KE DOKTER");
        } else if (sn < 2) {
            $("#kesimpulansn").html("NORMAL");
        }
    }
    function score_sna() {
        var sna = parseInt($("#snha1").text()) + parseInt($("#snha2").text()) + parseInt($("#snha3").text()) + parseInt($("#snha4").text());
        $("#totalsna").html(sna);
        if (sna >= 1) {
            $("#kesimpulansna").html("LAPORKAN KE DOKTER");
        } else if (sna <= 0) {
            $("#kesimpulansna").html("NORMAL");
        }
    }
</script>
<div class="breadcrum">
    <p>
        <a href="#">Nursing Record</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('nurse/rawat_jalan/');?>
">Rawat Jalan</a><span></span>
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="navigation">
    <div class="navigation-button">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('nurse/rawat_jalan/');?>
"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/back-icon.png" alt="" />  Back</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<!-- notification template -->
<?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of notification template-->
<form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('nurse/rawat_jalan/add_process');?>
" method="post">
    <input type="hidden" name="FS_KD_REG" value="<?php echo $_smarty_tpl->getVariable('result')->value['NO_REG'];?>
" />
    <input type="hidden" name="FS_MR" value="<?php echo $_smarty_tpl->getVariable('result')->value['NO_MR'];?>
" />
    <input type="hidden" name="FS_KD_MEDIS" value="<?php echo $_smarty_tpl->getVariable('FS_KD_MEDIS')->value;?>
" />
    <input type="hidden" name="FS_KD_LAYANAN" value="<?php echo $_smarty_tpl->getVariable('result')->value['BAGREGDR'];?>
" />
    <input type="hidden" name="FS_JNS_ASESMEN" value="<?php echo $_smarty_tpl->getVariable('FS_JNS_ASESMEN')->value;?>
" />
           
    <table class="table-info" width="100%">
        <tr class="headrow">
            <th colspan="4">Data Pasien</th>
        </tr>
        <tr>
        <td width='15%'>No RM</td>
        <td width='35%'><?php echo $_smarty_tpl->getVariable('result')->value['NO_MR'];?>
</td>
        <td width='15%'>Nama</td>
        <td width='35%'><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['NAMA_PASIEN'])===null||$tmp==='' ? '' : $tmp);?>
</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['ALAMAT'])===null||$tmp==='' ? '' : $tmp);?>
</td>
        <td>Tanggal Lahir</td>
        <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['TGL_LAHIR'])===null||$tmp==='' ? '' : $tmp);?>
</td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td><?php if ($_smarty_tpl->getVariable('result')->value['JENIS_KELAMIN']=='P'){?>
            Perempuan
            <?php }else{ ?>
            Laki-Laki
            <?php }?></td>
        <td></td>
        <td></td>
    </tr>
     <tr>
            <td>Rekanan</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['NAMAREKANAN'])===null||$tmp==='' ? '' : $tmp);?>
</td>
            <td>Dokter</td>
            <td>  <?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['NAMA_DOKTER'])===null||$tmp==='' ? '' : $tmp);?>
 </td>
        </tr>
    </table>
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
            <li><a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('rm/rawat_jalan/resume/').($_smarty_tpl->getVariable('result')->value['NO_MR']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/printer-icon.png" alt="" /> Profil Ringkas Medis Rawat Jalan</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
    <div class="notification red">
    <p><strong>High Risk :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_HIGH_RISK'])===null||$tmp==='' ? '-' : $tmp);?>
 </p>
    <p><strong>Alergi :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
 (<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_REAK_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
)</p>
    <div class="clear"></div>
</div>
        <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="2">Anamnesa / Allow Anamnesa</th>
            <th colspan="2">Pemeriksaan Fisik</th>
        </tr>
        <tr>
            <td colspan="2">
                <textarea cols="50" name="FS_ANAMNESA"><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_ANAMNESA'])===null||$tmp==='' ? '-' : $tmp);?>
</textarea>
                <em style="color:red">* Wajib Diisi</em>
            </td>
            <td colspan="2">
                <textarea cols="50" name="FS_EDUKASI"><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_EDUKASI'])===null||$tmp==='' ? '-' : $tmp);?>
</textarea>
            </td>
        </tr>
        <tr class="headrow">
            <th colspan="4">Vital Sign</th>
        </tr>
        <tr>
            <td width='20%'>Suhu</td>
            <td width='30%'><input type="text" name="FS_SUHU" size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_SUHU'])===null||$tmp==='' ? '-' : $tmp);?>
"/></td>
            <td width='20%'>Nadi</td>
            <td width='30%'><input type="text" name="FS_NADI" size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_NADI'])===null||$tmp==='' ? '-' : $tmp);?>
"/> x/menit</td>
        </tr>
        <tr>
            <td>R</td>
            <td><input type="text" name="FS_R" size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_R'])===null||$tmp==='' ? '-' : $tmp);?>
"/> x/menit</td>
            <td>TD</td>
            <td><input type="text" name="FS_TD" size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_TD'])===null||$tmp==='' ? '-' : $tmp);?>
"/> mmHg</td>
        </tr>
        <tr>
            <td>Tinggi Badan</td>
            <td><input type="text" name="FS_TB" size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_TB'])===null||$tmp==='' ? '-' : $tmp);?>
"/> cm</td>
            <td>Berat Badan</td>
            <td><input type="text" name="FS_BB" size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_BB'])===null||$tmp==='' ? '-' : $tmp);?>
"/> Kg</td>
        </tr>
    </table>
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Asesmen Nyeri</th>
        </tr>
        <tr>
            <td width='20%'>Ada Nyeri ?</td>
            <td width='30%'>
                <select name="FS_NYERI" id="surat_dari" class="select2" style="width: 190px;">
                    <option value="0">Tidak</option>
                    <option value="1">Ya</option>
                </select>
            </td>
            <td width='20%'></td>
            <td width='30%'></td>
        </tr>
        <tr>
            <td>Provokatif</td>
            <td>
                <select name="FS_NYERIP" id="surat_dari" class="select2" style="width: 190px;">
                    <option value="0">Tidak Ada Nyeri</option>
                    <option value="2">Biologik</option>
                    <option value="3">Kimiawi</option>
                    <option value="4">Mekanik / Rudapaksa</option>
                </select>
            </td>
            <td>Quality</td>
            <td>
                <select name="FS_NYERIQ" id="surat_dari" class="select2" style="width: 190px;">
                    <option value="0">Tidak Ada</option>
                    <option value="1">Seperti Di Tusuk-Tusuk</option>
                    <option value="2">Seperti Terbakar</option>
                    <option value="3">Seperti Tertimpa Beb</option>
                    <option value="4">Ngilu</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Regio</td>
            <td>
                <input type="text" name="FS_NYERIR" size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_NYERIR'])===null||$tmp==='' ? '-' : $tmp);?>
"/>
            </td>
            <td>Severity</td>
            <td>
                <select name="FS_NYERIS" id="surat_dari" class="select2" style="width: 190px;">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Time</td>
            <td>
                <select name="FS_NYERIT" id="surat_dari" class="select2" style="width: 190px;">
                    <option value="0">Tidak Ada</option>
                    <option value="1">Kadang-kadang</option>
                    <option value="2">Sering</option>
                    <option value="3">Menetap</option>
                </select>
            </td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Asesmen Jatuh</th>
        </tr>
        <tr> 
            <td width='20%'>Pasien berjalan tidak seimbang / sempoyongan</td>
            <td width='30%'>
                <select name="FS_CARA_BERJALAN1" class="select2" style="width: 190px;" id="op1">
                    <option value="">--Pilih Data--</option>
                    <option value="0">TIDAK</option>
                    <option value="1">YA</option>

                </select>
                <span id="sc1"></span>
            </td>
            <td width='20%'>Kesimpulan</td>
            <td width='30%'><b><span id="rjtkesimpulan"></span></b></td>
        </tr>
        <tr>
            <td width='20%'>Pasien berjalan menggunakan alat bantu</td>
            <td width='30%'>
                <select name="FS_CARA_BERJALAN2" class="select2" style="width: 190px;" id="op2">
                    <option value="">--Pilih Data--</option>
                    <option value="0">TIDAK</option>
                    <option value="1">YA</option>
                </select>
                <span id="sc2"></span>
            </td>
            <td colspan="2"><b>Intervensi </b>
                <br>
                Edukasi <input type="radio" name="intervensi1" value="Ya">Ya
                         <input type="radio" name="intervensi1" value="Tidak">Tidak
                         <input type="hidden" name="intervensi1" value=""> 
                         <br>
                         Pasang Stiker Resiko Jatuh (*resiko tinggi)<input type="radio" name="intervensi2" value="Ya">Ya
                         <input type="radio" name="intervensi2" value="Tidak">Tidak
                         <input type="hidden" name="intervensi2" value="Tidak"> 
            </td>
            
        </tr>
        <tr>
            <td>Pada saat akan duduk pasien memegang benda untuk menopang</td>
            <td>
                <select name="FS_CARA_DUDUK" class="select2" style="width: 190px;" id="op3">
                    <option value="">--Pilih Data--</option>
                    <option value="0">TIDAK</option>
                    <option value="1">YA</option>
                </select>
                <span id="sc3"></span>
            </td>
            <td></td>
            <td>
              
            </td>
        </tr>
    </table>
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Riwayat Kesehatan</th>
        </tr>
        <tr>
            <td width='20%'>Riweayat Penyakit dahulu</td>
            <td width='30%'>
               <input type="text" name="FS_RIW_PENYAKIT_DAHULU" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_RIW_PENYAKIT_DAHULU'])===null||$tmp==='' ? '-' : $tmp);?>
" size="32">
            </td>
            <td width='20%'>Riwayat penyakit keluarga</td>
            <td width='30%'>
                <input type="text" name="FS_RIW_PENYAKIT_DAHULU2" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_RIW_PENYAKIT_DAHULU2'])===null||$tmp==='' ? '-' : $tmp);?>
" size="32">
            </td>
        </tr>
        <?php if ($_smarty_tpl->getVariable('result')->value['FS_KD_LAYANAN']=='P003'||$_smarty_tpl->getVariable('result')->value['FS_KD_LAYANAN2']=='P003'||$_smarty_tpl->getVariable('result')->value['FS_KD_LAYANAN3']=='P003'){?>
        <tr>
            <td>Riwayat Imunisasi</td>
            <td>
                <select name="FS_RIW_IMUNISASI" id="surat_dari" class="select2" style="width: 190px;">
                    <option value="0">--Pilih Data--</option>
                    <option value="1">Lengkap</option>
                    <option value="2">Kurang</option>
                </select>
                <br><br>
                <input type="text" name="FS_RIW_IMUNISASI_KET" size="32">
            </td>
            <td>Riwayat Tumbuh Kembang</td>
            <td>
                <select name="FS_RIW_TUMBUH" id="surat_dari" class="select2" style="width: 190px;">
                    <option value="0">--Pilih Data--</option>
                    <option value="1">Normal</option>
                    <option value="2">Ada Gangguan</option>
                </select>
                <br><br>
                <input type="text" name="FS_RIW_TUMBUH_KET" size="32">
            </td>
        </tr>
        <?php }?>
    </table>
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Riwayat Alergi</th>
        </tr>
        <tr>
            <td width='20%'>Riwayat Alergi</td>
            <td width='30%'>
                <input type="text" name="FS_ALERGI" size="35" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
">
                <em style="color:red">* Wajib Diisi</em>
            </td>
            <td width='20%'>Reaksi Alergi</td>
            <td width='30%'>
                <input type="text" name="FS_REAK_ALERGI" size="35" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_REAK_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
">
                <em style="color:red">* Wajib Diisi</em>
            </td>
        </tr>
    </table>
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="2">Status Psikologis</th>
            <th colspan="2">Status Sosial</th>
        </tr>
        <tr>
            <td width='20%'>Status Psikologis</td>
            <td width='30%'>
                <select name="FS_STATUS_PSIK">
                    <option value="1" onclick='document.getElementById("civstaton3").disabled = true'>Tenang</option>
                    <option value="2" onclick='document.getElementById("civstaton3").disabled = true'>Cemas</option>
                    <option value="3" onclick='document.getElementById("civstaton3").disabled = true'>Takut</option>
                    <option value="4" onclick='document.getElementById("civstaton3").disabled = true'>Marah</option>
                    <option value="5" onclick='document.getElementById("civstaton3").disabled = true'>Sedih</option>
                    <option VALUE="6" onclick='document.getElementById("civstaton3").disabled = false'>Lainnya</option>
                </select>
                <br><br>
                <input type="text" name="FS_STATUS_PSIK2" id="civstaton3" disabled="" size="32">
            </td>
            <td width='20%'>Hubungan dengan anggota keluarga</td>
            <td width='30%'>
                <select name="FS_HUB_KELUARGA" id="surat_dari" class="select2" style="width: 190px;">
                    <option value="1">Baik</option>
                    <option value="2">Tidak Baik</option>

                </select>
            </td>
        </tr>
    </table>
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Status Fungsional</th>
        </tr>
        <tr>
            <td width='20%'>Status Fungsional</td>
            <td width='30%'>
                <select name="FS_ST_FUNGSIONAL" id="surat_dari" class="select2" style="width: 190px;">
                    <option value="1">Mandiri</option>
                    <option value="2">Perlu Bantuan</option>

                </select>
            </td>
            <td width='20%'>Pengelihatan</td>
            <td width='30%'>
                <select name="FS_PENGELIHATAN" id="surat_dari" class="select2" style="width: 190px;">
                    <option value="1">Normal</option>
                    <option value="2">Kabur</option>
                    <option value="3">Kaca Mata</option>
                    <option value="4">Lensa Kontak</option>

                </select>
            </td>
        </tr>
        <tr>
            <td>Penciuman</td>
            <td>
                <select name="FS_PENCIUMAN" id="surat_dari" class="select2" style="width: 190px;">
                    <option value="1">Normal</option>
                    <option value="2">Tidak Normal</option>

                </select>
            </td>
            <td>Pendengaran</td>
            <td>
                <select name="FS_PENDENGARAN" id="surat_dari" class="select2" style="width: 190px;">
                    <option value="1">Normal</option>
                    <option value="2">Tidak Normal (Kanan)</option>
                    <option value="3">Tidak Normal (Kiri)</option>
                    <option value="4">Tidak Normal (Kanan & Kiri)</option>
                    <option value="5">Alat Bantu Dengar (Kanan)</option>
                    <option value="6">Alat Bantu Dengar (Kiri)</option>
                    <option value="7">Alat Bantu Dengar (Kanan & Kiri)</option>

                </select>
            </td>
        </tr>
    </table>
    <?php if ($_smarty_tpl->getVariable('result')->value['FS_KD_LAYANAN']=='P003'||$_smarty_tpl->getVariable('result')->value['FS_KD_LAYANAN2']=='P003'||$_smarty_tpl->getVariable('result')->value['FS_KD_LAYANAN3']=='P003'){?>
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Skrining Nutrisi Anak <b>Adaptasi Strong Kids (Anak usia 1-18 Tahun)</b></th>
        </tr>
        <tr>
            <td width='20%'>Apakah pasien tampak kurus?</td>
            <td width='30%'>
                <select name="FS_NUTRISI_ANAK1" class="select2" style="width: 190px;" id="sna1">
                    <option value="">--Pilih Data--</option>
                    <option value="0">Tidak</option>
                    <option value="1">Ya</option>

                </select>
                <span id="snha1"></span>
            </td>
            <td width='20%'>Kesimpulan</td>
            <td width='30%'><b><span id="kesimpulansna"></span></b></td>
        </tr>
        <tr>
            <td>Apakah terdapat penurunan BB selama satu bulan terakhir?</td>
            <td>
                <select name="FS_NUTRISI_ANAK2" class="select2" style="width: 190px;" id="sna2">
                    <option value="">--Pilih Data--</option>
                    <option value="0">Tidak</option>
                    <option value="1">Ya</option>
                </select>
                <span id="snha2"></span>
            </td>
            <td></td>
            <td>
            </td>
        </tr>
        <tr>
            <td>Apakah ada diare > 5x/hari atau muntah > 3x/hari atau asupan turun dalam 1 minggu?</td>
            <td>
                <select name="FS_NUTRISI_ANAK3" class="select2" style="width: 190px;" id="sna3">
                    <option value="">--Pilih Data--</option>
                    <option value="0">Tidak</option>
                    <option value="1">Ya</option>
                </select>
                <span id="snha3"></span>
            </td>
            <td></td>
            <td>
            </td>
        </tr>
        <tr>
            <td>Apakah terdapat penyakit atau keadaan yang mengakibatkan pasien beresiko malnutrisi?</td>
            <td>
                <select name="FS_NUTRISI_ANAK4" class="select2" style="width: 190px;" id="sna4">
                    <option value="">--Pilih Data--</option>
                    <option value="0">Tidak</option>
                    <option value="1">Ya</option>
                </select>
                <span id="snha4"></span>
            </td>
            <td></td>
            <td>
            </td>
        </tr>
    </table>
    <?php }else{ ?>
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Skrining Nutrisi</th>
        </tr>
        <tr>
            <td width='20%'>Penurunan berat badan yang tidak diinginkan selama 6 bulan terakhir</td>
            <td width='30%'>
                <select name="FS_NUTRISI1" class="select2" style="width: 190px;" id="sn1">
                    <option value="">--Pilih Data--</option>
                    <option value="0">Tidak</option>
                    <option value="1">Tidak Yakin</option>
                    <option value="2">Ya (1-5 Kg)</option>
                    <option value="3">Ya (6-10 Kg)</option>
                    <option value="4">Ya (11-15 Kg)</option>
                    <option value="5">Ya (>15 Kg)</option>

                </select>
                <span id="snh1"></span>
            </td>
            <td width='20%'>Kesimpulan</td>
            <td width='30%'><b><span id="kesimpulansn"></span></b></td>
        </tr>
        <tr>
            <td>Asupan makanan menurun dikarenakan adanya penurunan nafsu makan</td>
            <td>
                <select name="FS_NUTRISI2" class="select2" style="width: 190px;" id="sn2">
                    <option value="">--Pilih Data--</option>
                    <option value="0">Tidak</option>
                    <option value="1">Ya</option>
                </select>
                <span id="snh2"></span>
            </td>
            <td></td>
            <td>
            </td>
        </tr>
    </table>
    <?php }?>
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Spiritual dan Kultural pasien</th>
        </tr>
        <tr>
            <td width='20%'>Agama</td>
            <td width='30%'>
                <select name="FS_AGAMA" id="surat_dari" class="select2" style="width: 190px;">
                    <option value="1">Islam</option>
                    <option value="2">Kristen</option>
                    <option value="3">Katholik</option>
                    <option value="4">Hindu</option>
                    <option value="5">Buda</option>
                    <option value="6">Konghucu</option>
                </select>
            </td>
            <td width='20%'>Nilai/Kepercayaan khusus</td>
            <td width='30%'>
                <select name="FS_NILAI_KHUSUS">
                    <option value="1" onclick='document.getElementById("civstaton4").disabled = true'>Tidak Ada</option>
                    <option VALUE="2" onclick='document.getElementById("civstaton4").disabled = false'>Ada</option>
                </select>
                <br><br>
                <input type="text" name="FS_NILAI_KHUSUS2" id="civstaton4" disabled="" size="32">
            </td>
        </tr>
    </table>
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Keperawatan</th>
        </tr>
        <tr>
            <td width='20%'>Masalah Keperawatan</td>
            <td width='30%'>
                <select name="tujuan[]" multiple id="tujuan" style="width:250px">
                    <option></option>
                </select>
            </td>
            <td width='20%'>Rencana Keperawatan</td>
            <td width='30%'>
                <select name="tembusan[]" multiple id="tembusan" style="width:250px">
                    <option></option>
                </select>
            </td>
        </tr>
        
         <tr class="headrow">
            <th colspan="4">Rujukan</th>
        </tr>
        <tr>
            <td width='20%'>Tanggal Expired Rujukan (jika pasien BPJS)</td>
            <td width='30%'>
                <input type="text" name="FS_SKDP_FASKES" class="tanggal" size="10"/>
            </td>
            <td width='20%'>Pasien terduga TB </td>
            <td width='30%'>
                Kode ICD 10 ( bila terdiagnosa TBC)
                <select name="kode_icd_x"  class="select2" id="kode" style="width:300px">
                 <option value=""></option>
                 <?php  $_smarty_tpl->tpl_vars['kode'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('icd')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['kode']->key => $_smarty_tpl->tpl_vars['kode']->value){
?> 
                 <option value="<?php echo $_smarty_tpl->tpl_vars['kode']->value['KODE'];?>
"><?php echo $_smarty_tpl->tpl_vars['kode']->value['KET'];?>
 | <?php echo $_smarty_tpl->tpl_vars['kode']->value['KODE'];?>
</option>
                 <?php }} ?>
                 </select>
            </td>
        </tr>
        

        <tr class="submit-box">
            <td colspan="4">
                <div style="font-weight: bold;">
                    *Bismillahirohmanirrohim, saya dengan sadar dan penuh tanggung jawab mengisikan formulir ini dengan data yang benar
                </div>
                <br>
                <input type="submit" name="save" value="Simpan" class="edit-button" /> 
            </td>
        </tr>
    </table>
</form>