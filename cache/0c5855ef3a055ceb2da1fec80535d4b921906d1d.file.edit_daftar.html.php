<?php /* Smarty version Smarty-3.0.7, created on 2022-07-01 09:48:44
         compiled from "application/views\igd/edit_daftar.html" */ ?>
<?php /*%%SmartyHeaderCode:2357362be608c651f15-40745493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c5855ef3a055ceb2da1fec80535d4b921906d1d' => 
    array (
      0 => 'application/views\\igd/edit_daftar.html',
      1 => 1656643721,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2357362be608c651f15-40745493',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
 
<div class="breadcrum">
   
    <div class="clear"></div>
</div> 
<div class="content-entry">
    <!-- notification template -->
     <!-- end of notification template-->
   <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('igd/ppdftr/edit_process');?>
" method="post" onkeypress="return event.keyCode != 13">
            
         <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />
        <input name="FS_KD_LAYANAN" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['KODE_BANGSAL'];?>
" />
        <input name="FS_KD_PETUGAS_MEDIS" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_medis'];?>
" />

        <center>Form Edit Pendaftaran Pasien IGD</center>
        <br>
        <br>
         <table class="table-input" width="100%" style="text-align: justify;">
         
            <tr>
                <td colspan="2"> Pasien telah terdaftar 
                    <input type="radio" name="status"  class="rad" required value="Tidak" <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['FS_KD_REG']==''){?> checked="" <?php }?> class="form-control">Belum
                    <input type="radio" name="status" class="rad" <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['FS_KD_REG']!=''){?> checked="" <?php }?>  required value="Ya" class="form-control">Sudah
                    <br>
                    <br>
                    <div id="form2" <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['FS_KD_REG']!=''){?> style="display: show" <?php }?> style="display:none"  >
                          <table>
                            <tr>
                                <td width="20%">Nama Pasien </td>
                                <td width="20%">
                                    <select name="FS_KD_REG" id="surat_dari" class="select2" style="width: 400px;">
                                        <option value=""></option>
                                        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien2')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                                        <option <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['FS_KD_REG']==$_smarty_tpl->tpl_vars['data']->value['No_Reg']){?> selected <?php }?> value="<?php echo $_smarty_tpl->tpl_vars['data']->value['No_Reg'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['Nama_Pasien'];?>
 | <?php echo $_smarty_tpl->tpl_vars['data']->value['No_MR'];?>
</option>
                                        <?php }} ?>
                                    </select>
                                </td>
                            </tr>
                          </table>
                        </div>

                        <div id="form3" <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['FS_KD_REG']==''){?>  style="display: show" <?php }?> style="display:none"  >
                            <table>
                              <tr>
                                  <td width="20%">Nama Pasien </td>
                                  <td width="20%">
                                    <input type="text" name="Nama" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['Nama'];?>
" style="width: 400px;" class="form-control">
                                  </td>
                              </tr>
                              <tr>
                                <td width="20%">  Alamat </td>
                                <td width="20%">
                                  <input type="text" name="alamat" class="form-control" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['alamat'];?>
" style="width: 400px;">
                                </td>
                            </tr>
                            </table>
                          </div>
            
                </td>
            </tr>
            
                                   <tr>
                                        <td width="20%">  Umur </td>
                                        <td width="20%">
                                          <input type="text" name="umur" class="form-control" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['umur'];?>
" style="width: 400px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">  Perawatan </td>
                                        <td width="20%">
                                            <input type="radio" name="JENIS_RAWAT" <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['JENIS_RAWAT']=='Rawat Jalan'){?> checked <?php }?> value="Rawat Jalan" >Rawat Jalan
                                            <input type="radio" name="JENIS_RAWAT" <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['JENIS_RAWAT']=='Rawat Inap'){?> checked <?php }?> value="Rawat Inap" >Rawat Inap
                                        </td>
                                    </tr>
                                   

                                     <tr>
                                        <td width="20%">  Rekanan </td>
                                        <td width="80%">
                                            <input type="radio" name="REKANAN"  <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['REKANAN']=='BPJS'){?> checked <?php }?> value="BPJS" >BPJS
                                             <input type="radio" name="REKANAN"  <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['REKANAN']=='BPJS'){?> checked <?php }?> value="UMUM" >Umum
                                            <input type="radio" name="REKANAN" <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['REKANAN']=='DANA SEHAT'){?> checked <?php }?> value="DANA SEHAT">Dana Sehat
                                            <input type="radio" name="REKANAN" <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['REKANAN']=='LAINNYA'){?> checked <?php }?> value="LAINNYA">Lainnya
                                            <!-- <input type="text" name="REKANAN" value="" class="form-control" style="width: 100px ;"> -->
                                        </td>
                                    </tr>  
                                    <tr>
                                        <td width="20%">  Unit 1</td>
                                        <td width="20%">
                                            <select class="select2" name="UNIT1" style="width:400px">
                                                <option></option>
                                                <option value="Penyakit Saraf" <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['UNIT1']=='Penyakit Saraf'){?> selected <?php }?>>Penyakit Saraf</option>
                                                <option value="Penyakit Dalam" <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['UNIT1']=='Penyakit Dalam'){?> selected <?php }?>>Penyakit Dalam</option>
                                                <option value="Perawatan Anak" <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['UNIT1']=='Perawatan Anak'){?> selected <?php }?>>Perawatan Anak </option>
                                                <option value="Kebidanan" <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['UNIT1']=='Kebidanan'){?> selected <?php }?>> Kebidanan </option>
                                                <option value="Bedah" <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['UNIT1']=='Bedah'){?> selected <?php }?>> Bedah </option>
                                                <option value="Perina" <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['UNIT1']=='Perina'){?> selected <?php }?>> Perinatologi </option>
                                                <option value="ICU" <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['UNIT1']=='ICU'){?> selected <?php }?>> ICU </option>
                                                <option value="Imunokompromised" <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['UNIT1']=='Imunokompromised'){?> selected <?php }?>> Imunokompromised </option>
                                                <option value="Kohort" <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['UNIT1']=='Kohort'){?> selected <?php }?>> Kohort</option>
                 
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">  Ruang 1</td>
                                        <td width="20%">
                                            <select name="RUANG1" id="surat_dari" class="select2" style="width: 400px;">
                                                <option value=""></option>
                                                <?php  $_smarty_tpl->tpl_vars['gata'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ruang')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['gata']->key => $_smarty_tpl->tpl_vars['gata']->value){
?>
                                                <?php if ($_smarty_tpl->tpl_vars['gata']->value['Kode_Ruang']==$_smarty_tpl->getVariable('rs_pasien')->value['RUANG1']){?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['gata']->value['Kode_Ruang'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['gata']->value['Nama_Ruang'];?>
 </option>
                                                <?php }else{ ?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['gata']->value['Kode_Ruang'];?>
"><?php echo $_smarty_tpl->tpl_vars['gata']->value['Nama_Ruang'];?>
 </option>
                                                <?php }?>
                                                <?php }} ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">  DPJP 1</td>
                                        <td width="20%">
                                            <select name="KD_DOKTER1" id="surat_dari" class="select2" style="width: 400px;">
                                                <option value=""></option>
                                                <?php  $_smarty_tpl->tpl_vars['gata'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_dokter')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['gata']->key => $_smarty_tpl->tpl_vars['gata']->value){
?>
                                                <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['KD_DOKTER1']==$_smarty_tpl->tpl_vars['gata']->value['NAMAUSER']){?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['gata']->value['NAMAUSER'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['gata']->value['NAMALENGKAP'];?>
 </option>
                                                <?php }else{ ?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['gata']->value['NAMAUSER'];?>
"><?php echo $_smarty_tpl->tpl_vars['gata']->value['NAMALENGKAP'];?>
 </option>
                                                <?php }?>
                                                <?php }} ?>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr><td><br><br></td></tr>
                                    <tr>
                                        <td width="20%">  Unit 2</td>
                                        <td width="20%">
                                            <select class="select2" name="UNIT2" style="width:400px">
                                                <option></option>
                                                <option value="Penyakit Saraf" <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['UNIT2']=='Penyakit Saraf'){?> selected <?php }?>>Penyakit Saraf</option>
                                                <option value="Penyakit Dalam" <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['UNIT2']=='Penyakit Dalam'){?> selected <?php }?>>Penyakit Dalam</option>
                                                <option value="Perawatan Anak" <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['UNIT2']=='Perawatan Anak'){?> selected <?php }?>>Perawatan Anak </option>
                                                <option value="Kebidanan" <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['UNIT2']=='Kebidanan'){?> selected <?php }?>> Kebidanan </option>
                                                <option value="Bedah" <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['UNIT2']=='Bedah'){?> selected <?php }?>> Bedah </option>
                                                <option value="Perina" <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['UNIT2']=='Perina'){?> selected <?php }?>> Perinatologi </option>
                                                <option value="ICU" <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['UNIT2']=='ICU'){?> selected <?php }?>> ICU </option>
                                                <option value="Imunokompromised" <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['UNIT2']=='Imunokompromised'){?> selected <?php }?>> Imunokompromised </option>
                                                <option value="Kohort" <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['UNIT2']=='Kohort'){?> selected <?php }?>> Kohort</option>
                 
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">  Ruang 2</td>
                                        <td width="20%">
                                            <select name="RUANG2" id="surat_dari" class="select2" style="width: 400px;">
                                                <option value=""></option>
                                                <?php  $_smarty_tpl->tpl_vars['gata'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('bangsal')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['gata']->key => $_smarty_tpl->tpl_vars['gata']->value){
?>
                                                <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['RUANG2']==$_smarty_tpl->tpl_vars['gata']->value['Kode_Bangsal']){?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['gata']->value['Kode_Bangsal'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['gata']->value['Nama_Bangsal'];?>
 </option>
                                                <?php }else{ ?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['gata']->value['Kode_Bangsal'];?>
"><?php echo $_smarty_tpl->tpl_vars['gata']->value['Nama_Bangsal'];?>
 </option>
                                                <?php }?>
                                                <?php }} ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">  DPJP 2</td>
                                        <td width="20%">
                                            <select name="KD_DOKTER2" id="surat_dari" class="select2" style="width: 400px;">
                                                <option value=""></option>
                                                <?php  $_smarty_tpl->tpl_vars['gata'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_dokter')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['gata']->key => $_smarty_tpl->tpl_vars['gata']->value){
?>
                                                <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['KD_DOKTER2']==$_smarty_tpl->tpl_vars['gata']->value['NAMAUSER']){?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['gata']->value['NAMAUSER'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['gata']->value['NAMALENGKAP'];?>
 </option>
                                                <?php }else{ ?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['gata']->value['NAMAUSER'];?>
"><?php echo $_smarty_tpl->tpl_vars['gata']->value['NAMALENGKAP'];?>
 </option>
                                                <?php }?>
                                                <?php }} ?>
                                            </select>
                                        </td>
                                    </tr>
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['id'];?>
">


                                    </table>
                                  </div>
                    
                        </td>
                    </tr>
                  <tr>
                    <td>



                      
                
                      <button type="submit" class="btn btn-primary btn-sm">
                            <i class="ti ti-save"></i> Simpan
                        </button>
                    <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Batal</button>

                </td>
            </tr>
               </form>




 
<script>
       $(".select2").select2({
            placeholder: "Pilih",
            allowClear: true
        });

        $(function(){
      $(":radio.rad").click(function(){
        $("#form2").hide();
        $("#form3").hide();

        if($(this).val() == "Ya"){
          $("#form2").show();
          $("#form3").hide()
        }else if($(this).val() == "Tidak"){
          $("#form2").hide();
          $("#form3").show()
        }
      });
    });
</script>}