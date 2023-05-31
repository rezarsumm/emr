<?php /* Smarty version Smarty-3.0.7, created on 2023-01-20 13:53:23
         compiled from "application/views\inap/cppt/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:672763ca3a63ef2800-79828905%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cec16fb71aa4e27e47c53a0be0ca279900162195' => 
    array (
      0 => 'application/views\\inap/cppt/edit.html',
      1 => 1674183151,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '672763ca3a63ef2800-79828905',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("inap/cppt/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<div class="breadcrum">
  <p>
    <a href="#">Catatan Rawat Inap</a><span></span>
    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/cppt/');?>
">CPPT</a><span></span>
    <small>Edit Data</small>
  </p>
  <div class="clear"></div>
</div>
<div class="content-entry">
  <!-- notification template -->
  <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
  <!-- end of notification template-->
  <form
    action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/cppt/edit_process');?>
"
    method="post"
    onkeypress="return event.keyCode != 13"
  >
    <input
      name="FS_KD_REG"
      id="FS_KD_REG"
      type="hidden"
      value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
"
    />
    <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />
    <input
      name="FS_KD_LAYANAN"
      type="hidden"
      value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['KODE_BANGSAL'];?>
"
    />
    <input
      name="FS_KD_PETUGAS_MEDIS"
      type="hidden"
      value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_medis'];?>
"
    />
    <input name="FS_KD_TRS" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_cppt')->value['FS_KD_TRS'];?>
" />
    <input name="FS_KD_KP" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_cppt')->value['FS_KD_KP'];?>
" />

    <table class="table-info" width="100%">
      <tr class="headrow">
        <th colspan="2">Edit CPPT</th>
      </tr>
      <tr>
        <td>NAMA</td>
        <td><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NAMA_PASIEN'];?>
</td>
      </tr>
      <tr>
        <td>NO MR</td>
        <td><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
</td>
      </tr>
      <tr>
        <td>TANGGAL LAHIR</td>
        <td><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('rs_pasien')->value['TGL_LAHIR'],"%d %b %Y");?>
</td>
      </tr>
      <tr>
        <td>ALAMAT</td>
        <td><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['ALAMAT'];?>
</td>
      </tr>
      <tr>
        <td>UMUR</td>
        <td><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fn_umur'];?>
 tahun</td>
      </tr>
    </table>
    <table class="table-info" width="100%" style="text-align: justify">
      <tr class="headrow">
        <td colspan="3"><center>Asesmen Awal Medik</center></td>
      </tr>
      <tr>
        <td width="18%">Anamnesa</td>
        <td width="1%">:</td>
        <td width="80%"><?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_ANAMNESA'];?>
</td>
      </tr>
      <tr>
        <td width="18%">Diagnosa</td>
        <td width="2%">:</td>
        <td width="80%"><?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_DIAGNOSA'];?>
</td>
      </tr>
      <tr>
        <td width="18%">Hasil Pemeriksaan Penunjang</td>
        <td width="2%">:</td>
        <td width="80%"><?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_HASIL_PEMERIKSAAN_PENUNJANG'];?>
</td>
      </tr>
      <tr>
        <td width="18%">Pemeriksaan Fisik</td>
        <td width="2%">:</td>
        <td width="80%"><?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_CATATAN_FISIK'];?>
</td>
      </tr>
      <tr>
        <td width="18%">Daftar Masalah</td>
        <td width="2%">:</td>
        <td width="80%"><?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_DAFTAR_MASALAH'];?>
</td>
      </tr>
      <tr>
        <td width="18%">Rencana Tindakan</td>
        <td width="2%">:</td>
        <td width="80%"><?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_TINDAKAN'];?>
</td>
      </tr>
      <tr>
        <td width="18%">Rencana Pemeriksaan Penunjang</td>
        <td width="2%">:</td>
        <td width="80%"><?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_PLANNING'];?>
</td>
      </tr>
      <!-- <tr>
                <td width="18%">Terapi</td>
                <td width="2%">:</td>
                <td width="80%">  <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_TERAPI'];?>

                </td>
            </tr> -->
      <tr>
        <td width="18%">Waktu Asesmen</td>
        <td width="2%">:</td>
        <td width="80%"><?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['mdd'];?>
 / <?php echo $_smarty_tpl->getVariable('rs_ases_medis')->value['FS_JAM_TRS'];?>
</td>
      </tr>
    </table>
    <!-- <div class="notification red">
            <p><strong>High Risk :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_HIGH_RISK'])===null||$tmp==='' ? '-' : $tmp);?>
 </p>
            <p><strong>Alergi :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
 (<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_REAK_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
)</p>
            <div class="clear"></div>
        </div> -->
    <table class="table-input" width="100%" style="text-align: justify">
      <tr>
        <th colspan="4">CPPT</th>
      </tr>
      <tr>
        <td width="13%">Jenis CPPT</td>
        <td width="87%">
          <input <?php if ($_smarty_tpl->getVariable('rs_cppt')->value['jenis_cppt']=='soap'){?> checked <?php }?> type="radio"
          name="jenis_cppt" value="soap" class="idjenis" />SOAP <input <?php if ($_smarty_tpl->getVariable('rs_cppt')->value['jenis_cppt']=='sbar'){?> checked <?php }?> type="radio"
          name="jenis_cppt" value="sbar" class="idjenis" />SBAR <input <?php if ($_smarty_tpl->getVariable('rs_cppt')->value['jenis_cppt']=='adime'){?> checked <?php }?> type="radio"
          name="jenis_cppt" value="adime" class="idjenis" />ADIME
        </td>
      </tr>

      <tr>
        <td width="13%">
          <a
            class="soap"
            style="display: <?php if ($_smarty_tpl->getVariable('rs_cppt')->value['jenis_cppt']=='soap'){?> show <?php }else{ ?> none <?php }?>"
          >
            S
          </a>
          <a
            class="adime"
            style="display:  <?php if ($_smarty_tpl->getVariable('rs_cppt')->value['jenis_cppt']=='adime'){?> show <?php }else{ ?> none <?php }?>"
          >
            A
          </a>
          <a
            class="sbar"
            style="display:  <?php if ($_smarty_tpl->getVariable('rs_cppt')->value['jenis_cppt']=='sbar'){?> show <?php }else{ ?> none <?php }?>"
          >
            S
          </a>
        </td>
        <td width="87%">
          <textarea
            name="FS_CPPT_S"
            rows="3"
            cols="100%"
            onkeypress="handle5(event)"
            class="form-control anamnesa"
          >
 <?php echo $_smarty_tpl->getVariable('rs_cppt')->value['FS_CPPT_S'];?>
</textarea
          >
        </td>
      </tr>
      <tr>
        <td>
          <a
            class="soap"
            style="display:  <?php if ($_smarty_tpl->getVariable('rs_cppt')->value['jenis_cppt']=='soap'){?> show <?php }else{ ?> none <?php }?>"
          >
            O
          </a>
          <a
            class="adime"
            style="display:  <?php if ($_smarty_tpl->getVariable('rs_cppt')->value['jenis_cppt']=='adime'){?> show <?php }else{ ?> none <?php }?>"
          >
            D
          </a>
          <a
            class="sbar"
            style="display:  <?php if ($_smarty_tpl->getVariable('rs_cppt')->value['jenis_cppt']=='sbar'){?> show <?php }else{ ?> none <?php }?>"
          >
            B
          </a>
        </td>
        <td>
          <div
            class="1"
            style="
              background-color: white;
              border: 1px solid darkgrey;
              width: 100%;
            "
          >
            <?php if ($_smarty_tpl->getVariable('namarole')->value!='Dokter'){?>
            <input type="hidden" name="umur" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fn_umur'];?>
" />
            <table>
              <tr>
                <td>
                  RR <input type="text" name="NAFAS" style="width: 20px" />
                </td>
                <td>O2 <input type="text" name="O2" style="width: 20px" /></td>
                <td>
                  Bantu O2
                  <input type="text" name="AB" value="-" style="width: 25px" />
                </td>
                <td>T <input type="text" name="S" style="width: 25px" /></td>
                <td>N <input type="text" name="J" style="width: 25px" /></td>
                <td>TD <input type="text" name="TD" style="width: 35px" /></td>
                <td>
                  CRT <input type="text" name="CRT" style="width: 15px" />
                </td>
                <td>
                  Retraksi<input name="RETRAKSI" type="radio" value="0" />Normal
                  <input name="RETRAKSI" type="radio" value="1" />Ringan
                  <input name="RETRAKSI" type="radio" value="2" />Sedang
                  <input name="RETRAKSI" type="radio" value="3" />Parah
                </td>

                <td>
                  Sadar <input type="radio" name="SADAR" value="A" />A
                  <input type="radio" name="SADAR" value="P" />P
                  <input type="radio" name="SADAR" value="V" />V
                  <input type="radio" name="SADAR" value="U" />U
                </td>
              </tr>
            </table>
            <?php }?>
            <textarea
              name="FS_CPPT_O"
              rows="3"
              style="border: none; width: 98%"
              onkeypress="handle6(event)"
              class="form-control objek"
            >
 <?php echo $_smarty_tpl->getVariable('rs_cppt')->value['FS_CPPT_O'];?>
 </textarea
            >
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <a
            class="soap"
            style="display:  <?php if ($_smarty_tpl->getVariable('rs_cppt')->value['jenis_cppt']=='soap'){?> show <?php }else{ ?> none <?php }?>"
          >
            A
          </a>
          <a
            class="adime"
            style="display:  <?php if ($_smarty_tpl->getVariable('rs_cppt')->value['jenis_cppt']=='adime'){?> show <?php }else{ ?> none <?php }?>"
          >
            I
          </a>
          <a
            class="sbar"
            style="display:  <?php if ($_smarty_tpl->getVariable('rs_cppt')->value['jenis_cppt']=='sbar'){?> show <?php }else{ ?> none <?php }?>"
          >
            A
          </a>
        </td>
        <td>
          <textarea
            name="FS_CPPT_A"
            rows="3"
            cols="100%"
            onkeypress="handle7(event)"
            class="form-control analisis"
          >
<?php echo $_smarty_tpl->getVariable('rs_cppt')->value['FS_CPPT_A'];?>
</textarea
          >
        </td>
      </tr>
      <tr>
        <td>
          <a
            class="soap"
            style="display:  <?php if ($_smarty_tpl->getVariable('rs_cppt')->value['jenis_cppt']=='soap'){?> show <?php }else{ ?> none <?php }?>"
          >
            P
          </a>
          <a
            class="adime"
            style="display:  <?php if ($_smarty_tpl->getVariable('rs_cppt')->value['jenis_cppt']=='adime'){?> show <?php }else{ ?> none <?php }?>"
          >
            ME
          </a>
          <a
            class="sbar"
            style="display:  <?php if ($_smarty_tpl->getVariable('rs_cppt')->value['jenis_cppt']=='sbar'){?> show <?php }else{ ?> none <?php }?>"
          >
            R
          </a>
        </td>
        <td>
          <textarea
            name="FS_CPPT_P"
            rows="3"
            cols="100%"
            onkeypress="handle8(event)"
            class="form-control plan"
          >
<?php echo $_smarty_tpl->getVariable('rs_cppt')->value['FS_CPPT_P'];?>
</textarea
          >
        </td>
      </tr>
      <tr>
        <td>Diagnosa Utama</td>
        <td>
          <input
            type="text"
            name="FS_DIAG_UTAMA"
            size="70"
            value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_DIAG_UTAMA'];?>
"
          />
        </td>
      </tr>

      <tr>
        <td>Diagnosa Sekunder</td>
        <td>
          <input
            type="text"
            name="FS_DIAG_SEK"
            size="70"
            value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_DIAG_SEK'];?>
"
          />
        </td>
      </tr>

      <tr>
        <td></td>
        <td>
          Kode ICD 10 ( bila terdiagnosa TBC)
          <select
            name="kode_icd_x"
            class="select2"
            id="kode"
            style="width: 300px"
          >
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

      <!-- <tr class="submit-box">
                <td colspan="5">
                    <a href="javascript:;" class="btn-blue item_add">Tambah Resep</a>
                </td> 
            </tr>  -->
      <!-- <tr>
                <td colspan="5">
                    <table width='100%'>
                        <thead>
                            <tr class="headrow">
                                <th colspan="6"><center>Resep Dokter</center></th>
            </tr> 
            <tr class="headrow">
                <th><center>Nama Obat</center></th>
            <th><center>Jumlah</center></th>
            <th><center>Satuan</center></th>
            <th><center>Waktu Pemberian</center></th>
            <th><center>Catatan Lain</center></th>
            <th><center>Aksi</center></th>

            </tr>  
            </thead>
            <tbody id="show_data_resep_baru"></tbody>
        </table>

        </td>
        </tr> -->
      <tr>
        <td>Pemeriksaan Laboratorium</td>
        <td>
          <?php if ($_smarty_tpl->getVariable('result2')->value['FS_PLANNING_LAB']=='0'||$_smarty_tpl->getVariable('result2')->value['FS_PLANNING_LAB']==''){?>
          <select
            name="FS_PLANNING_LAB[]"
            multiple
            id="rlab"
            style="width: 350px"
          >
            <option></option>
          </select>
          <?php }else{ ?>
          <textarea cols="50" name="FS_PLANNING_LAB">
<?php echo $_smarty_tpl->getVariable('result2')->value['FS_PLANNING_LAB'];?>
</textarea
          >
          <?php }?>
          <input
            type="hidden"
            value="<?php echo $_smarty_tpl->getVariable('result2')->value['FS_PLANNING_LAB'];?>
"
            class="inilablama"
          />
          Untuk tanggal
          <input type="date" name="TGL_TUJUAN_LAB" value="<?php echo $_smarty_tpl->getVariable('tgl')->value;?>
" />
        </td>
      </tr>
      <tr>
        <td>Pemeriksaan Radiologi</td>
        <td>
          <?php if ($_smarty_tpl->getVariable('result2')->value['FS_PLANNING_RAD']=='0'||$_smarty_tpl->getVariable('result2')->value['FS_PLANNING_RAD']==''){?>
          <select
            name="FS_PLANNING_RAD[]"
            multiple
            id="rrad"
            style="width: 350px"
          >
            <option></option>
          </select>
          <?php }else{ ?>
          <textarea cols="50" name="FS_PLANNING_RAD">
<?php echo $_smarty_tpl->getVariable('result2')->value['FS_PLANNING_RAD'];?>
</textarea
          >
          <?php }?>
          <input
            type="hidden"
            value="<?php echo $_smarty_tpl->getVariable('result2')->value['FS_PLANNING_RAD'];?>
"
            class="iniradlama"
          />
        </td>
      </tr>

      <?php if ($_smarty_tpl->getVariable('namarole')->value=='Dokter'||$_smarty_tpl->getVariable('namarole')->value=='Admin'){?>
      <tr class="headrow">
        <th colspan="2">Resep</th>
        <th colspan="2">Resep Racik</th>
      </tr>
      <tr>
        <td colspan="2">
          <?php if ($_smarty_tpl->getVariable('username')->value=='138'){?> Pilih Paket
          <select
            name="namapaket"
            class="namapaket select2"
            id="namapaket"
            multiple
            id="namapaket"
            cols="50"
            style="width: 210px"
          >
            <option></option>
          </select>
          <?php }else{ ?> <?php }?> <?php if ($_smarty_tpl->getVariable('username')->value=='133'){?> Pilih Paket
          <select
            name="namapaketuya"
            class="namapaketuya select2"
            id="namapaketuya"
            multiple
            id="namapaketuya"
            cols="50"
            style="width: 210px"
          >
            <option></option>
          </select>

          <?php }else{ ?> <?php }?> <?php if ($_smarty_tpl->getVariable('username')->value=='152'){?> Pilih Paket
          <select
            name="namapakettw"
            class="namapakettw select2"
            id="namapakettw"
            multiple
            id="namapakettw"
            cols="50"
            style="width: 210px"
          >
            <option></option>
          </select>

          <?php }else{ ?> <?php }?> <?php if ($_smarty_tpl->getVariable('username')->value=='121'){?> Pilih Paket
          <select
            name="namapakettris"
            class="namapakettris select2"
            id="namapakettris"
            multiple
            id="namapakettris"
            cols="50"
            style="width: 210px"
          >
            <option></option>
          </select>

          <?php }else{ ?> <?php }?> <?php if ($_smarty_tpl->getVariable('username')->value=='128'){?>
          <tr>
            <td>Pilih Paket Obat</td>
            <td>
              <select
                name="namapaketgg"
                class="namapaketgg select2"
                id="namapaketgg"
                multiple
                id="namapaketgg"
                cols="50"
                style="width: 210px"
              >
                <option></option>
              </select>
            </td>
          </tr>
          <?php }else{ ?> <?php }?> <?php if ($_smarty_tpl->getVariable('username')->value=='135'){?> Pilih Paket Obat

          <select
            name="namapaketirs"
            class="namapaketirs select2"
            id="namapaketirs"
            multiple
            id="namapaketirs"
            cols="50"
            style="width: 210px"
          >
            <option></option>
          </select>

          <?php }else{ ?> <?php }?>

          <br />
          <br />
          <table>
            <tr>
              <td>Nama Obat</td>
              <td>Numero</td>
              <td>Signa</td>
            </tr>
            <tr>
              <td>
                <select
                  name="namaobat[]"
                  class="namaobat select2"
                  multiple
                  id="namaobat"
                  cols="80"
                  style="width: 210px"
                >
                  <option></option>
                </select>
              </td>
              <td>
                <input
                  cols="5"
                  type="text"
                  class="numero"
                  name="numero"
                  style="width: 40px"
                  onkeypress="handleKeyPress(event)"
                />
              </td>
              <td>
                <input
                  cols="20"
                  type="text"
                  name="dosis"
                  class="dosis"
                  style="width: 50px"
                  onkeypress="handleKeyPress(event)"
                />
              </td>
            </tr>
          </table>

          <textarea
            rows="18"
            class="form-control resep"
            cols="60"
            name="FS_TERAPI"
          >
 
                <?php echo $_smarty_tpl->getVariable('rs_cppt')->value['FS_CPPT_TERAPI'];?>

            </textarea
          >
        </td>
        <td colspan="2">
          <table>
            <tr>
              <td>Nama Obat</td>
              <td>Numero</td>
              <td>m.f</td>
              <td>Signa</td>
            </tr>
            <tr>
              <td>
                <select
                  name="namaobat1[]"
                  class="namaobat1 select2"
                  multiple
                  id="namaobat1"
                  cols="80"
                  style="width: 170px"
                >
                  <option></option>
                </select>
              </td>
              <td>
                <input
                  cols="5"
                  type="text"
                  class="numero1"
                  name="numero1"
                  style="width: 40px"
                  onkeypress="handle2(event)"
                />
              </td>
              <td>
                <input
                  cols="20"
                  type="text"
                  name="mf1"
                  class="mf1"
                  style="width: 50px"
                  onkeypress="handle2(event)"
                />
              </td>
              <td>
                <input
                  cols="20"
                  type="text"
                  name="dosis1"
                  class="dosis1"
                  style="width: 50px"
                  onkeypress="handle3(event)"
                />
              </td>
            </tr>
          </table>
          <textarea
            rows="15"
            class="form-control resepracik"
            cols="60"
            name="FS_TERAPI2"
          >
          </textarea>
        </td>
      </tr>
      <?php }else{ ?>
      <input type="hidden" name="FS_TERAPI" value="" />
      <input type="hidden" name="FS_TERAPI2" value="" />
      <?php }?>

      <tr class="submit-box">
        <td colspan="4">
          <div style="font-weight: bold">
            *Bismillahirohmanirrohim, saya dengan sadar dan penuh tanggung jawab
            mengisikan formulir ini dengan data yang benar
          </div>
          <br />
          <input type="submit" name="save" value="Simpan" class="edit-button" />
        </td>
      </tr>
    </table>
  </form>
</div>

<script type="text/javascript">
  var user = $("#user").val();
  $(".resepracik").val("\n /R");

  $("#namaobat").select2({});

  //rencana lab
  $("#rlab").select2("data", null);
  $("#rlab").select2("data", null);
  $("#rlab").removeAttr("disabled");
  jQuery("#rlab").html("");
  $.ajax({
    type: "POST",
    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/list_pemeriksaan_rlab/');?>
",
    data: "user=" + user,
    dataType: "json",
    success: function (data) {
      var showData;
      jQuery.each(data, function (index, result) {
        if (result.value == 0) {
        } else {
          showData +=
            "<option value='" +
            result.value +
            "'>" +
            result.label +
            "</option>";
        }
      });
      jQuery("#rlab").html(showData);
    },
  });
  $("#rlab").select2({});

  //rencana radiologi
  $("#rrad").select2("data", null);
  $("#rrad").select2("data", null);
  $("#rrad").removeAttr("disabled");
  jQuery("#rrad").html("");
  $.ajax({
    type: "POST",
    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/list_pemeriksaan_rrad/');?>
",
    data: "user=" + user,
    dataType: "json",
    success: function (data) {
      var showData;
      jQuery.each(data, function (index, result) {
        if (result.value == 0) {
        } else {
          showData +=
            "<option value='" +
            result.value +
            "'>" +
            result.label +
            "</option>";
        }
      });
      jQuery("#rrad").html(showData);
    },
  });
  $("#rrad").select2({});
</script>

<script>
  var namaa = $(".namaa").val();
  $(".namaa").val(
    namaa +
      "\n R/ \t   no. \n S                    \n ----------------------------------------\n "
  );

  function tambahkop(e) {
    var yhr = new XMLHttpRequest();
    var key = e.keyCode || e.which;
    if (key == 13) {
      var resepracik = $(".resepracik").val();
      $(".resepracik").val(
        resepracik +
          "S                 \n ---------------------------------------- \n \n" +
          "R/  "
      ); // Close / Tutup Modal Dialog
      //    // alert(namaa);
    }
  }

  $("#namapaket").change(function () {
    var resep = $(".resep").val();
    if ($("#namapaket").val() == "Ortho Inap 1") {
      $(".resep").val(
        resep +
          "\n /R   ceftizoxim inj no II \n  S 2x1 gram \n ---------------------------------------- \n \n /R   ketoralac inj no II  \n   S 2x1 amp \n ---------------------------------------- \n \n /R   ranitidin inj no II \n   S 2x 1 amp\n ---------------------------------------- \n "
      );
      $("#namapaket").select2("data", null);
    } else if ($("#namapaket").val() == "Ortho Inap 2") {
      $(".resep").val(
        resep +
          "\n /R   ceftizoxim no I \n  S 2x1/2 vial \n ---------------------------------------- \n \n /R   ranitidin no I  \n  S 2x1/2 amp \n ---------------------------------------- \n \n /R   ketoralac no I \n  S 2x1/2 amp \n ---------------------------------------- \n "
      );
      $("#namapaket").select2("data", null);
    } else if ($("#namapaket").val() == "Ortho Inap 3") {
      $(".resep").val(
        resep +
          " \n /R   cefotaxime inj no I \n  S 2x250 mg \n ---------------------------------------- \n \n /R   ketoralac no I \n  S 2x1/2 amp \n ---------------------------------------- \n \n /R   ranitidin no I \n  S 2x1/2 amp \n ---------------------------------------- \n"
      );
      $("#namapaket").select2("data", null);
    } else if ($("#namapaket").val() == "Ortho A") {
      $(".resep").val(
        resep +
          "\n /R meloxicam 15mg no XXX \n  S 2 x 1 tab  \n ---------------------------------------- \n \n /R Omeprazole 20mg no XXX \n S 1 x 1 cap  \n ---------------------------------------- \n \n /R Alpentine 100mg no XX \n S 2 x 1 cap \n ---------------------------------------- \n \n /R Eperison 50mg no XX \n S 2 x 1 tab \n ---------------------------------------- \n \n /R Mecobalamin no XXX \n S 1 x 1 cap \n ---------------------------------------- \n"
      );
      $("#namapaket").select2("data", null);
    } else if ($("#namapaket").val() == "Ortho B") {
      $(".resep").val(
        resep +
          "\n /R meloxicam 15mg no XXX \n S 2 x 1 tab  \n ---------------------------------------- \n \n /R Omeprazole 20mg no XXX \n S 1 x 1 cap \n ---------------------------------------- \n \n /R Alpentine 100mg no XX \n S 2 x 1 cap \n ---------------------------------------- \n \n /R Calcium no XXX \n S 1 x 1 tab \n ---------------------------------------- \n \n"
      );
      $("#namapaket").select2("data", null);
    } else if ($("#namapaket").val() == "Ortho C") {
      $(".resep").val(
        resep +
          "\n /R meloxicam 15mg no XV \n S 2 x 1 tab \n ---------------------------------------- \n \n /R Omeprazole 20mg no X \n S 1 x 1 cap  \n ---------------------------------------- \n \n /R Alpentine 100mg no XV \n S 2 x 1 cap  \n ---------------------------------------- \n \n /R Calcium no X  \n S 1 x 1 tab  \n ---------------------------------------- \n \n /R Cefadroxil 500mg no XV  \n S 2 x 1 cap  \n ---------------------------------------- \n"
      );
      $("#namapaket").select2("data", null);
    } else if ($("#namapaket").val() == "Ortho D") {
      $(".resep").val(
        resep +
          "\n /R meloxicam 15mg no XXX \n  S 2 x 1 tab  \n ---------------------------------------- \n \n /R Omeprazole 20mg no XXX  \n S 1 x 1 cap  \n ---------------------------------------- \n \n /R Alpentine 100mg no XX  \n S 2 x 1 cap  \n ---------------------------------------- \n \n /R Calcium no XXX  \n S 1 x 1 tab  \n ---------------------------------------- \n \n /R Cefadroxil 500mg no XV \n  S 2 x 1 cap  \n ---------------------------------------- \n"
      );
      $("#namapaket").select2("data", null);
    } else if ($("#namapaket").val() == "Ortho E") {
      $(".resep").val(
        resep +
          "\n /R meloxicam 15mg no XV  \n S 2 x 1 tab  \n ---------------------------------------- \n \n /R Omeprazole 20mg no X  \n S 1 x 1 cap  \n ---------------------------------------- \n \n /R Calcium no X  \n  S 1 x 1 tab  \n ---------------------------------------- \n \n /R Cefadroxil 500mg no XV \n  S 2 x 1 cap  \n ---------------------------------------- \n \n /R Clindamisin 300mg no XV  \n S 2 x 1 cap  \n ---------------------------------------- \n"
      );
      $("#namapaket").select2("data", null);
    } else if ($("#namapaket").val() == "Ortho F") {
      $(".resep").val(
        resep +
          "\n /R meloxicam 15mg no XXV  \n S 2 x 1 tab \n ---------------------------------------- \n \n /R Omeprazole 20mg no XV  \n S 1 x 1 cap  \n ---------------------------------------- \n \n /R Calcium no XV  \n S 1 x 1 tab  \n ---------------------------------------- \n \n /R Cefadroxil 500mg no XV \n  S 2 x 1 cap \n ---------------------------------------- \n \n /R Clindamisin 300mg no XXV  \n S 2 x 1 cap \n ---------------------------------------- \n"
      );
      $("#namapaket").select2("data", null);
    } else if ($("#namapaket").val() == "Ortho G") {
      $(".resep").val(
        resep +
          "\n /R meloxicam 15mg no XV  \n S 2 x 1 tab \n ---------------------------------------- \n \n /R Omeprazole 20mg no XV  \n S 1 x 1 cap \n ---------------------------------------- \n \n /R Calcium no XV  \n S 1 x 1 tab \n ---------------------------------------- \n \n /R Ciproflosasin 500mg no XV  \n S 2 x 1 tab \n ---------------------------------------- \n \n /R Clindamisin 300mg no XV  \n S 2 x 1 cap \n ---------------------------------------- \n"
      );
      $("#namapaket").select2("data", null);
    } else if ($("#namapaket").val() == "Ortho H") {
      $(".resep").val(
        resep +
          "\n /R meloxicam 15mg no XXV  \n S 2 x 1 tab \n ---------------------------------------- \n \n /R Omeprazole 20mg no XV  \n S 1 x 1 cap \n ---------------------------------------- \n \n /R Calcium no XV  \n S 1 x 1 tab \n ---------------------------------------- \n \n /R Ciproflosasin 500mg no XXV  \n S 2 x 1 tab \n ---------------------------------------- \n \n /R Clindamisin 300mg no XXV  \n S 2 x 1 cap \n ---------------------------------------- \n"
      );
      $("#namapaket").select2("data", null);
    } else if ($("#namapaket").val() == "Ortho I") {
      $(".resep").val(
        resep +
          "\n /R Calcium no X \n  S 1 x 1 tab  \n ---------------------------------------- \n \n /R Cefadroxil 250mg no XV \n  S 2 x 1 cap \n ---------------------------------------- \n \n /R Ibuprofen 200mg no XV  \n S 2 x 1 tab \n ---------------------------------------- \n"
      );
      $("#namapaket").select2("data", null);
    } else if ($("#namapaket").val() == "Ortho J") {
      $(".resep").val(
        resep +
          "\n /R Calcium no XXX  \n S 1 x 1 tab \n ---------------------------------------- \n \n /R Cefadroxil 250mg no XV  \n S 2 x 1 cap \n ---------------------------------------- \n \n /R Ibuprofen 200mg no XXX \n  S 2 x 1 tab \n ---------------------------------------- \n"
      );
      $("#namapaket").select2("data", null);
    } else if ($("#namapaket").val() == "Ortho L") {
      $(".resep").val(
        resep +
          "\n /R Cefadroxil sirup no I \n  S 2 x 1 cth \n ---------------------------------------- \n \n /R Ibuprofen sirup no I  \n S 2 x 1 cth \n ---------------------------------------- \n"
      );
      $("#namapaket").select2("data", null);
    }
  });

  $("#namapaketirs").change(function () {
    var resep = $(".resep").val();
    if ($("#namapaketirs").val() == "irs 01") {
      $(".resep").val(
        resep +
          "\n /R Cefadroxyl 500mg no X \n S 2 x 1 cap \n ---------------------------------------- \n\n /R Asam mefenamat 500mg no X \n S 3 x 1 tab \n ---------------------------------------- \n \n /R Ranitidine 150mg ni X \n S 2 x 1 tab \n ---------------------------------------- \n"
      );
      $("#namapaketirs").select2("data", null);
    } else if ($("#namapaketirs").val() == "irs 02") {
      $(".resep").val(
        resep +
          "\n /R Eperisone 50mg no x \n S 2 x 1 tab \n ---------------------------------------- \n\n /R Natrium diklofenak 50mg no VI \n S 2 x 1 tab \n ---------------------------------------- \n \n /R Ranitidine 150mg no X \n S 2 x 1 tab \n ---------------------------------------- \n"
      );
      $("#namapaketirs").select2("data", null);
    } else if ($("#namapaketirs").val() == "irs 03") {
      $(".resep").val(
        resep +
          "\n /R Clindamycin 300mg no X \n S 3 x 1 cap \n ---------------------------------------- \n \n /R Ibuprofen 400mg no X \n S 3 x 1 tab \n ---------------------------------------- \n \n /R Omeprazole 20mg no III \n S 1 x 1 cap \n ---------------------------------------- \n"
      );
      $("#namapaketirs").select2("data", null);
    } else if ($("#namapaketirs").val() == "irs 04") {
      $(".resep").val(
        resep +
          "\n /R Eperisone 50mg no X \n S 2 x 1 tab \n ---------------------------------------- \n\n /R Ibuprofen 400mg no X \n S 3 x 1 tab \n ---------------------------------------- \n\n /R Ranitidine 150mg no X \n S 2 x 1 tab \n ---------------------------------------- \n"
      );
      $("#namapaketirs").select2("data", null);
    } else if ($("#namapaketirs").val() == "irs 05") {
      $(".resep").val(
        resep +
          "\n /R Mecobalamin 500mcg no X \n S 3 x 1 cap \n ---------------------------------------- \n\n /R Vit B comp tab no III \n S 1 x 1tab \n ---------------------------------------- \n\n /R Methylprednisolon 4mg no X \n S 3 x 1 tab \n ---------------------------------------- \n\n /R Omeprazole 20mg no III \n S 1 x 1 cap \n ---------------------------------------- \n"
      );
      $("#namapaketirs").select2("data", null);
    } else if ($("#namapaketirs").val() == "irs 06") {
      $(".resep").val(
        resep +
          "\n /R Cefixime 200mg no X \n S 2 x 1 cap \n ---------------------------------------- \n\n /R Metronidazole 500mg no X \n S 3 x 1 tab \n ---------------------------------------- \n\n /R Asam mefenamat 500mg no X \n S 3 x 1 tab \n ---------------------------------------- \n\n /R Ranitidine 150mg no X \n S 2 x 1 tab \n ---------------------------------------- \n"
      );
      $("#namapaketirs").select2("data", null);
    } else if ($("#namapaketirs").val() == "irs 07") {
      $(".resep").val(
        resep +
          "\n /R Amoxicillin clavulanat 500mg no X \n S 3 x 1 tab \n ---------------------------------------- \n\n /R Metronidazole 500mg no X \n S 3 x 1 tab \n ---------------------------------------- \n\n /R Ibuprofen 400mg no X \n S 3 x 1 tab \n ---------------------------------------- \n\n /R Methylprednisolon 4mg no X \n S 3 x 1 tab \n ---------------------------------------- \n\n /R Ranitidine 150mgno X \n S 2 x 1 tab \n ---------------------------------------- \n"
      );
      $("#namapaketirs").select2("data", null);
    }
  });

  $("#namapaketuya").change(function () {
    var resep = $(".resep").val();
    if ($("#namapaketuya").val() == "Uya 04") {
      $(".resep").val(
        resep +
          "\n /R   Anbacim no I \n  S 1 x 1 gr  \n ---------------------------------------- \n \n /R   Metronidazole inf no III \n  S 3 x 1 flas  \n ---------------------------------------- \n \n /R   Ketorolak inj no III \n  S 3 x 1 amp  \n ---------------------------------------- \n \n /R   Asam tranexamat inj no III \n  S 3 x 1 amp  \n ---------------------------------------- \n \n /R   Asam mefenamat tab no III \n  S 3 x 1 tab  \n ---------------------------------------- \n \n /R   Pronalges supp no III \n  S 3 x 1 supp  \n ---------------------------------------- \n \n /R   Parasetamol inf no I \n  S 1 x 1 fls   \n ---------------------------------------- \n \n /R   Calfemil no I \n  S 1 x 1 cap  \n ---------------------------------------- \n \n /R   Vitamin D no I \n  S 1 x 1 tab  \n ---------------------------------------- \n"
      );
      $("#namapaketuya").select2("data", null);
    } else if ($("#namapaketuya").val() == "Uya 05") {
      $(".resep").val(
        resep +
          "\n /R   Nifedipin tab no IV \n  S 4 x 1 tab  \n ---------------------------------------- \n  \n /R   Hystolan no 1 \n  S 2 x ½ tab  \n ---------------------------------------- \n \n /R   Dexametason inj no IV \n  S 2 x 2 amp  \n ---------------------------------------- \n \n /R   Calfemil no I \n  S 1 x 1 cap  \n ---------------------------------------- \n \n /R   Vitamin D no I \n  S 1 x 1 tab  \n ---------------------------------------- \n"
      );
      $("#namapaketuya").select2("data", null);
    } else if ($("#namapaketuya").val() == "Uya 06") {
      $(".resep").val(
        resep +
          "\n /R   Infus RL kolf no II \n  S 2 x 1 kolf  \n ---------------------------------------- \n \n /R   Infuse D5% kolf no II \n  S 2 x 1 kolf  \n ---------------------------------------- \n \n /R   Valamin kolf no I \n  S 1 x 1 kolf  \n ---------------------------------------- \n \n /R   Folamil cap no I \n  S 1 x 1 cap  \n ---------------------------------------- \n \n /R   Vitamin D no I \n  S 1 x 1 tab  \n ---------------------------------------- \n"
      );
      $("#namapaketuya").select2("data", null);
    } else if ($("#namapaketuya").val() == "Uya 01") {
      $(".resep").val(
        resep +
          "\n /R Cefadroxil 500mg no XX \n S 2 x 1 cap \n ---------------------------------------- \n \n /R Asam mefenamat no XX \n S 3 x 1 tab \n ---------------------------------------- \n \n /R Pronalges suppo \n S 3 x 1 suppo \n ---------------------------------------- \n \n /R Calfemil no X \n S 1 x 1 cap \n ---------------------------------------- \n \n /R Vibumin no v \n S 1 x 1 tab \n ---------------------------------------- \n"
      );
      $("#namapaketuya").select2("data", null);
    } else if ($("#namapaketuya").val() == "Uya 02") {
      $(".resep").val(
        resep +
          "\n /R Amoxicilin 500mg no XX \n S 3 x 1 tab \n ---------------------------------------- \n \n /R Asam mefenamat no XX \n S 3 x 1 tab \n ---------------------------------------- \n \n /R Calfemil no X \n S 1 x 1 cap \n ---------------------------------------- \n \n /R Vitamin D no x \n S 1 x 1 tab \n ---------------------------------------- \n"
      );
      $("#namapaketuya").select2("data", null);
    } else if ($("#namapaketuya").val() == "Uya 03") {
      $(".resep").val(
        resep +
          "\n /R Ciproflosasin 500mg no XX \n S 2 x 1 tab \n ---------------------------------------- \n \n /R Asam mefenamat no XX \n S 3 x 1 tab \n ---------------------------------------- \n \n /R Calfemil no X \n S 1 x 1 cap \n ---------------------------------------- \n \n /R Vitamin D no x \n S 1 x 1 tab \n ---------------------------------------- \n"
      );
      $("#namapaketuya").select2("data", null);
    } else if ($("#namapaketuya").val() == "Uya 07") {
      $(".resep").val(
        resep +
          "\n /R Calfemil No X \n S 1 x 1  Cap \n ---------------------------------------- \n \n /R Vitamin D No X \n S 1 x 1 tab \n ---------------------------------------- \n"
      );
      $("#namapaketuya").select2("data", null);
    }
  });

  $("#namapaketgg").change(function () {
    var resep = $(".resep").val();
    if ($("#namapaketgg").val() == "gg 1") {
      $(".resep").val(
        resep +
          "\n /R   Amoxilin 250mg no X  \n  S 3 x 1 tab \n ---------------------------------------- \n \n /R   Paracetamol 250mg no X \n  S 3 x 1 tab \n ---------------------------------------- \n"
      );
      $("#namapaketgg").select2("data", null);
    } else if ($("#namapaketgg").val() == "gg 2") {
      $(".resep").val(
        resep +
          "\n /R   Amoxilin 500mg no X   \n  S 3 x 1 tab  \n ---------------------------------------- \n \n /R   Paracetamol 500mg no X   \n  S 3 x 1 tab  \n ---------------------------------------- \n \n /R   Ibuprofen 400mg no X  \n  S 3 x 1 tab  \n ---------------------------------------- \n"
      );
      $("#namapaketgg").select2("data", null);
    } else if ($("#namapaketgg").val() == "gg 3") {
      $(".resep").val(
        resep +
          "\n /R   Cefadroxil 500mg no X \n  S 2 x 1 cap  \n ---------------------------------------- \n \n /R   Ibuprofen 400mg no X  \n  S 3 x 1 tab  \n ---------------------------------------- \n"
      );
      $("#namapaketgg").select2("data", null);
    } else if ($("#namapaketgg").val() == "gg 4") {
      $(".resep").val(
        resep +
          "\n /R   Cefadroxil 500mg no X \n  S 2 x 1 cap  \n ---------------------------------------- \n \n /R   Ibuprofen 400mg no X  \n  S 3 x 1 tab  \n ---------------------------------------- \n \n /R   Methylprednisolon 4 mg no X \n  S 2 x 1 tab  \n ---------------------------------------- \n"
      );
      $("#namapaketgg").select2("data", null);
    } else if ($("#namapaketgg").val() == "gg 5") {
      $(".resep").val(
        resep +
          "\n /R   Cefadroxil 500mg no X \n  S 2 x 1 cap  \n ---------------------------------------- \n \n /R   Ibuprofen 400mg no X  \n  S 3 x 1 tab  \n ---------------------------------------- \n  \n /R   Betadyne kumur fe 1 \n  S Kumur-kumur 2 x 1  \n ---------------------------------------- \n"
      );
      $("#namapaketgg").select2("data", null);
    }
  });

  $("#namapakettris").change(function () {
    var resep = $(".resep").val();
    if ($("#namapakettris").val() == "Tres 01") {
      $(".resep").val(
        resep +
          "\n /R   Anbacim 1gr no II \n  S 2 dd 1 vial  \n ---------------------------------------- \n  \n /R   Asam tranexamat inj no III \n  S 3 dd 1 Ampl  \n ---------------------------------------- \n  \n /R   Parasetmalo inf no II \n  S 2 dd 1 inf  \n ---------------------------------------- \n \n /R   Profenit suppo no III \n  S 3 dd 1 suppo  \n ---------------------------------------- \n \n /R   Ondancentron tab no III \n S 3 dd 1 tab  \n ---------------------------------------- \n \n /R   Na diklofenak 25mg no II \n S 2 dd 1 tab \n ---------------------------------------- \n \n /R   Metromidazole inf no III \n  S 1 flas per 8 jam   \n ---------------------------------------- \n "
      );
      $("#namapakettris").select2("data", null);
    } else if ($("#namapakettris").val() == "Tres 02") {
      $(".resep").val(
        resep +
          "\n /R   cefotaxime 1gr no II \n  S 2 x 1 vial  \n ---------------------------------------- \n \n /R   Dexametason inj no II \n  S 2 x 1 Ampl  \n ---------------------------------------- \n  \n /R   Nifedipin 10mg no IV \n  S 4 x 1 tab  \n ---------------------------------------- \n \n /R   Profenit suppo no III \n  S 3 x 1 suppo  \n ---------------------------------------- \n"
      );
      $("#namapakettris").select2("data", null);
    } else if ($("#namapakettris").val() == "Tres 03") {
      $(".resep").val(
        resep +
          "\n /R   cefotaxime 1gr no II \n  S 2 x 1 vial  \n ---------------------------------------- \n \n /R   Neurosanbe amp no I \n  S 1 x 1 Ampl drip  \n ---------------------------------------- \n  \n /R   Omeprazole vial no I \n  S 1 x 1 vial  \n ---------------------------------------- \n \n /R   Ondancetron amp no III \n  S 3 x 1 Amp  \n ---------------------------------------- \n"
      );
      $("#namapakettris").select2("data", null);
    } else if ($("#namapakettris").val() == "Tres 04") {
      $(".resep").val(
        resep +
          "\n /R   Cefixime 200mg tab No XV \n  S 2 x 1 tab \n ---------------------------------------- \n \n /R   Na diklofenak 25mg No X  \n  S 2 x 1 tab \n ---------------------------------------- \n \n /R   Antasida tab No XX \n  S 3 x 1 tab AC \n ---------------------------------------- \n"
      );
      $("#namapakettris").select2("data", null);
    } else if ($("#namapakettris").val() == "Tres 05") {
      $(".resep").val(
        resep +
          "\n /R   Cefixime 200mg tab no XV \n  S 2 x 1 tab \n ---------------------------------------- \n \n /R   Metergin tab no XV \n  S 3 x 1 tab \n ---------------------------------------- \n \n /R   Antasida tab no XX \n  S 3 x 1 tab AC \n ---------------------------------------- \n"
      );
      $("#namapakettris").select2("data", null);
    } else if ($("#namapakettris").val() == "Tres 06") {
      $(".resep").val(
        resep +
          "\n /R   Cefixime 200mg cap no X \n  S 2 x 1 cap \n ---------------------------------------- \n \n /R   Metergin tab no XV \n  S 3 x 1 tab \n ---------------------------------------- \n "
      );
      $("#namapakettris").select2("data", null);
    }
  });

  $("#namapakettw").change(function () {
    var resep = $(".resep").val();
    if ($("#namapakettw").val() == "TW1") {
      $(".resep").val(
        resep +
          "\n /R  aspilet 80 mg \n S 1 x 1 pc pagi  \n ---------------------------------------- \n \n /R  citicoline tab 500 mg \n S 2 x 1 pc  \n ---------------------------------------- \n \n /R  amlodipin 10 mg \n S 1 x 1 pc sore  \n ---------------------------------------- \n \n /R  mecobalamin 500 mg \n S 2 x 1 pc  \n ---------------------------------------- \n \n /R  ranitidin 150 mg \n S 2 x 1 ac  \n ---------------------------------------- \n "
      );
      $("#namapakettw").select2("data", null);
    } else if ($("#namapakettw").val() == "TW2") {
      $(".resep").val(
        resep +
          "\n /R  citicoline tab 500 mg \n S 2 x 1 pc \n ---------------------------------------- \n \n /R  PCT 500 mg \n S 3 x 1 pc  \n ---------------------------------------- \n \n /R  Mecobalamin 500 mg \n S 2 x 1 pc  \n ---------------------------------------- \n \n /R  amlodipin 10 mg \n S 2 x 1 pc sore  \n ---------------------------------------- \n \n /R  ranitidin 150 mg \n S 2 x 1 ac  \n ---------------------------------------- \n"
      );
      $("#namapakettw").select2("data", null);
    } else if ($("#namapakettw").val() == "TW3") {
      $(".resep").val(
        resep +
          "\n /R  PCT 500 mg \n S 3 x 1 pc  \n ---------------------------------------- \n \n /R  diazepam 2 mg \n S 3 x 1 pc  \n ---------------------------------------- \n \n /R  ergotamine caffein 1 mg \n S 3 x 1 pc  \n ---------------------------------------- \n \n /R  depakote 500 mg \n S 2 x 1 pc  \n ---------------------------------------- \n \n /R  ranitidin 150 mg \n S 2 x 1 ac  \n ---------------------------------------- \n"
      );
      $("#namapakettw").select2("data", null);
    } else if ($("#namapakettw").val() == "TW4") {
      $(".resep").val(
        resep +
          "\n /R  PCT 500 mg \n S 3 x 1 pc  \n ---------------------------------------- \n \n /R  analsik \n S 3 x 1 pc  \n ---------------------------------------- \n \n /R  ranitidin 150 mg, 2 x 1 ac  \n ---------------------------------------- \n "
      );
      $("#namapakettw").select2("data", null);
    } else if ($("#namapakettw").val() == "TW5") {
      $(".resep").val(
        resep +
          "\n /R  meloxicam 15 mg \n S 3 x 1 pc  \n ---------------------------------------- \n \n /R  dexamethasone 0,5 mg \n S 3 x 1 pc \n ---------------------------------------- \n \n /R  diazepam 2 mg, 3 x 1 pc  \n ---------------------------------------- \n \n /R  PCT 500 mg \n S 3 x 1 pc  \n ---------------------------------------- \n \n /R  Glucosamine 500 mg \n S 2 x 1 pc  \n ---------------------------------------- \n \n /R  ranitidin 150 mg \n S 2 x 1 ac  \n ---------------------------------------- \n \n /R  neurodex \n S 2 x 1 pc \n ---------------------------------------- \n"
      );
      $("#namapakettw").select2("data", null);
    } else if ($("#namapakettw").val() == "TW6") {
      $(".resep").val(
        resep +
          "\n /R  PCT 500 mg \n S 3 x 1 pc  \n ---------------------------------------- \n \n /R  diazepam 2 mg \n S 2 x 1 pc  \n ---------------------------------------- \n \n /R  amitriptilin 12,5 mg \n S 2 x 1 pc  \n ---------------------------------------- \n \n /R  Gabapentine 100 mg \n S 2 x 1 pc  \n ---------------------------------------- \n \n /R  ranitidin 150 mg \n S 2 x 1 ac  \n ---------------------------------------- \n \n /R  Neurodex \n S 2 x 1 pc  \n ---------------------------------------- \n"
      );
      $("#namapakettw").select2("data", null);
    } else if ($("#namapakettw").val() == "TW7") {
      $(".resep").val(
        resep +
          "\n /R  clobazam 5 mg \n S 1 x 1 malam  \n ---------------------------------------- \n \n /R  haloperidol 0,5 mg \n S 2 x 1 pc  \n ---------------------------------------- \n \n /R  vitamin B komplek \n S 2 x 1 pc  \n ---------------------------------------- \n"
      );
      $("#namapakettw").select2("data", null);
    } else if ($("#namapakettw").val() == "TW8") {
      $(".resep").val(
        resep +
          "\n /R  MP 4 mg \n S 3 x 1 pc  \n ---------------------------------------- \n \n /R  Meloxicam 15 mg, 3 x 1 pc  \n ---------------------------------------- \n \n /R  ranitidin 150 mg \n S 2 x 1 ac  \n ---------------------------------------- \n \n /R  gabapentine 100 mg \n S 2 x 1 pc  \n ---------------------------------------- \n \n /R  vit B Komplek \n S 2 x 1 pc  \n ---------------------------------------- \n"
      );
      $("#namapakettw").select2("data", null);
    } else if ($("#namapakettw").val() == "TW9") {
      $(".resep").val(
        resep +
          "\n /R  Maprotline HCL / Sandepril 50 mg \n S 1 x 1 pc  \n ---------------------------------------- \n \n /R  clobazam 10 mg \n S 1 x 1 pc  \n ---------------------------------------- \n \n /R  Eperison HCL 50 mg \n S 3 x 1 pc  \n ---------------------------------------- \n \n /R  PCT 500 mg \n S 3 x 1 pc \n ---------------------------------------- \n \n /R  vitamin B komplek \n S 2 x 1 pc \n ---------------------------------------- \n"
      );
      $("#namapakettw").select2("data", null);
    } else if ($("#namapakettw").val() == "TW10") {
      $(".resep").val(
        resep +
          "\n /R  Levodopa 100 mg \n S 3 x 1 pc  \n ---------------------------------------- \n \n /R  Arkin 2 mg, 3 x 1 pc  \n ---------------------------------------- \n \n /R  vitamin B komplek \n S 3 x 1 pc  \n ---------------------------------------- \n"
      );
      $("#namapakettw").select2("data", null);
    } else if ($("#namapakettw").val() == "TW11") {
      $(".resep").val(
        resep +
          "\n /R  donepezil 10 mg \n S 1 x 1 pc  \n ---------------------------------------- \n \n /R  tebokan 40 mg \n S 2 x 1 pc  \n ---------------------------------------- \n \n /R  sukralfat syrup \n S 3 x 1 CTH ac  \n ---------------------------------------- \n \n /R  mecobalamin 500 mg \n S 2 x 1 pc"
      );
      $("#namapakettw").select2("data", null);
    } else if ($("#namapakettw").val() == "TW12") {
      $(".resep").val(
        resep +
          "\n /R  mestinon 60 mg \n S 3 x 1 pc  \n ---------------------------------------- \n \n /R  MP 16 mg \n S 3 x 1 pc  \n ---------------------------------------- \n \n /R  Ranitidin 150 mg \n S 2 x 1 ac  \n ---------------------------------------- \n \n /R  Vitamin B komplek \n S 2 x 1 pc  \n ---------------------------------------- \n"
      );
      $("#namapakettw").select2("data", null);
    } else if ($("#namapakettw").val() == "TW13") {
      $(".resep").val(
        resep +
          "\n /R  betahistine 6 mg \n S 3 x 2 tab pc  \n ---------------------------------------- \n \n /R  flunarizine 10 mg, 1 x 1 pc malam \n ---------------------------------------- \n \n /R  PCT 500 mg \n S 3 x 1 pc  \n ---------------------------------------- \n \n /R  ranitidin 150 mg \n S 2 x 1 ac  \n ---------------------------------------- \n \n /R  vit B komplek \n S 2 x 2 pc \n ---------------------------------------- \n"
      );
      $("#namapakettw").select2("data", null);
    }
  });

  function handleKeyPress(e) {
    var yhr = new XMLHttpRequest();
    var key = e.keyCode || e.which;
    if (key == 13) {
      var namaobat = $("#namaobat").val();
      var numero = $(".numero").val();
      var dosis = $(".dosis").val();
      var kolomresep = document.getElementById("kolomresep");
      var resep = $(".resep").val();

      $(".resep").val(
        resep +
          "\n /R   " +
          namaobat +
          "   no. " +
          numero +
          "\n S    " +
          dosis +
          "\n ----------------------------------------------- \n "
      );
      //    alert(namaobat+numero+dosis);
      $("#namaobat").select2("data", null);
      $(".numero").val(null);
      $(".dosis").val(null);

      //    $("#namaobat").select2({}).focus();
      $("#namaobat").select2("open");
    }
  }

  var x = event.key;
  if (x == "a" || x == "A") {
    alert("hore");
  }

  function handle2(e) {
    var key = e.keyCode || e.which;
    if (key == 13) {
      var namaobat1 = $("#namaobat1").val();
      var numero1 = $(".numero1").val();
      //    var dosis1 = $(".dosis1").val();
      var resepracik = $(".resepracik").val();

      $(".resepracik").val(
        resepracik + "    " + namaobat1 + "   no. " + numero1 + "\n     "
      );
      //    alert(namaobat+numero+dosis);
      $("#namaobat1").select2("data", null);
      $(".numero1").val(null);
      $(".dosis1").val(null);

      //    $("#namaobat").select2({}).focus();
      $("#namaobat1").select2("open");
    }
  }

  function handle3(e) {
    var key = e.keyCode || e.which;
    if (key == 13) {
      var namaobat1 = $("#namaobat1").val();
      var numero1 = $(".numero1").val();
      var dosis1 = $(".dosis1").val();
      var mf1 = $(".mf1").val();
      var resepracik = $(".resepracik").val();
      if (namaobat1 == null) {
        $(".resepracik").val(
          resepracik +
            "          " +
            mf1 +
            "\n   S  " +
            dosis1 +
            "\n ------------------------------------------------- \n \n   /R"
        );
      } else {
        $(".resepracik").val(
          resepracik +
            "    " +
            namaobat1 +
            "   no. " +
            numero1 +
            "\n" +
            "           " +
            mf1 +
            "\n    S      " +
            dosis1 +
            "\n ------------------------------------------ \n \n  /R"
        );
      } //    alert(namaobat+numero+dosis);
      $("#namaobat1").select2("data", null);
      $(".numero1").val(null);
      $(".dosis1").val(null);
      $(".mf1").val(null);

      //    $("#namaobat").select2({}).focus();
      $("#namaobat1").select2("open");
    }
  }

  function handle5(e) {
    var key = e.keyCode || e.which;
    if (key == 13) {
      var anamnesa = $(".anamnesa").val();
      $(".anamnesa").val(anamnesa + "\n");
    }
  }

  function handle6(e) {
    var key = e.keyCode || e.which;
    if (key == 13) {
      var objek = $(".objek").val();
      $(".objek").val(objek + "\n");
    }
  }

  function handle7(e) {
    var key = e.keyCode || e.which;
    if (key == 13) {
      var analisis = $(".analisis").val();
      $(".analisis").val(analisis + "\n");
    }
  }

  function handle8(e) {
    var key = e.keyCode || e.which;
    if (key == 13) {
      var plan = $(".plan").val();
      $(".plan").val(plan + "\n");
    }
  }
</script>

<script type="text/javascript">
  var user = $("#user").val();

  $("#namaobat").select2("data", null);
  $("#namaobat").select2("data", null);
  $("#namaobat").removeAttr("disabled");

  jQuery("#namaobat").html("");
  $.ajax({
    type: "POST",
    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/list_nama_obat/');?>
",
    data: "user=" + user,
    dataType: "json",
    success: function (data) {
      var showData;
      jQuery.each(data, function (index, result) {
        if (result.value == 0) {
        } else {
          showData +=
            "<option value='" +
            result.value +
            "'>" +
            result.label +
            "</option>";
        }
      });
      jQuery("#namaobat").html(showData);
    },
  });
  //tags

  $("#namapaket").select2("data", null);
  $("#namapaket").select2("data", null);
  $("#namapaket").removeAttr("disabled");

  jQuery("#namapaket").html("");
  $.ajax({
    type: "POST",
    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/list_nama_paket_inap_kumbang/');?>
",
    data: "user=" + user,
    dataType: "json",
    success: function (data) {
      var showData;
      jQuery.each(data, function (index, result) {
        if (result.value == 0) {
        } else {
          showData +=
            "<option value='" +
            result.value +
            "'>" +
            result.label +
            "</option>";
        }
      });
      jQuery("#namapaket").html(showData);
    },
  });
  //tags

  $("#namapakettw").select2("data", null);
  $("#namapakettw").select2("data", null);
  $("#namapakettw").removeAttr("disabled");

  jQuery("#namapakettw").html("");
  $.ajax({
    type: "POST",
    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/list_nama_paket_tw/');?>
",
    data: "user=" + user,
    dataType: "json",
    success: function (data) {
      var showData;
      jQuery.each(data, function (index, result) {
        if (result.value == 0) {
        } else {
          showData +=
            "<option value='" +
            result.value +
            "'>" +
            result.label +
            "</option>";
        }
      });
      jQuery("#namapakettw").html(showData);
    },
  });
  //tags

  $("#namapaketgg").select2("data", null);
  $("#namapaketgg").select2("data", null);
  $("#namapaketgg").removeAttr("disabled");

  jQuery("#namapaketgg").html("");
  $.ajax({
    type: "POST",
    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/list_nama_paket_gg/');?>
",
    data: "user=" + user,
    dataType: "json",
    success: function (data) {
      var showData;
      jQuery.each(data, function (index, result) {
        if (result.value == 0) {
        } else {
          showData +=
            "<option value='" +
            result.value +
            "'>" +
            result.label +
            "</option>";
        }
      });
      jQuery("#namapaketgg").html(showData);
    },
  });
  //tags

  $("#namapaketuya").select2("data", null);
  $("#namapaketuya").select2("data", null);
  $("#namapaketuya").removeAttr("disabled");

  jQuery("#namapaketuya").html("");
  $.ajax({
    type: "POST",
    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/list_nama_paket_uya/');?>
",
    data: "user=" + user,
    dataType: "json",
    success: function (data) {
      var showData;
      jQuery.each(data, function (index, result) {
        if (result.value == 0) {
        } else {
          showData +=
            "<option value='" +
            result.value +
            "'>" +
            result.label +
            "</option>";
        }
      });
      jQuery("#namapaketuya").html(showData);
    },
  });
  //tags

  $("#namapaketirs").select2("data", null);
  $("#namapaketirs").select2("data", null);
  $("#namapaketirs").removeAttr("disabled");

  jQuery("#namapaketirs").html("");
  $.ajax({
    type: "POST",
    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/list_nama_paket_irs/');?>
",
    data: "user=" + user,
    dataType: "json",
    success: function (data) {
      var showData;
      jQuery.each(data, function (index, result) {
        if (result.value == 0) {
        } else {
          showData +=
            "<option value='" +
            result.value +
            "'>" +
            result.label +
            "</option>";
        }
      });
      jQuery("#namapaketirs").html(showData);
    },
  });
  //tags

  $("#namapakettris").select2("data", null);
  $("#namapakettris").select2("data", null);
  $("#namapakettris").removeAttr("disabled");

  jQuery("#namapakettris").html("");
  $.ajax({
    type: "POST",
    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/list_nama_paket_tris/');?>
",
    data: "user=" + user,
    dataType: "json",
    success: function (data) {
      var showData;
      jQuery.each(data, function (index, result) {
        if (result.value == 0) {
        } else {
          showData +=
            "<option value='" +
            result.value +
            "'>" +
            result.label +
            "</option>";
        }
      });
      jQuery("#namapakettris").html(showData);
    },
  });
  //tags

  $("#namaobat1").select2("data", null);
  $("#namaobat1").select2("data", null);
  $("#namaobat1").removeAttr("disabled");

  jQuery("#namaobat1").html("");
  $.ajax({
    type: "POST",
    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/list_nama_obat/');?>
",
    data: "user=" + user,
    dataType: "json",
    success: function (data) {
      var showData;
      jQuery.each(data, function (index, result) {
        if (result.value == 0) {
        } else {
          showData +=
            "<option value='" +
            result.value +
            "'>" +
            result.label +
            "</option>";
        }
      });
      jQuery("#namaobat1").html(showData);
    },
  });

  $("#namaobat1").select2({});
</script>
<script type="text/javascript">
  $(function () {
    $(":radio.idjenis").click(function () {
      if ($(this).val() == "soap") {
        $(".soap").show();
        $(".adime").hide();
        $(".sbar").hide();
      } else if ($(this).val() == "sbar") {
        $(".sbar").show();
        $(".soap").hide();
        $(".adime").hide();
      } else if ($(this).val() == "adime") {
        $(".adime").show();
        $(".soap").hide();
        $(".sbar").hide();
      }
    });
  });
</script>
