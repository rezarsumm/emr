<?php /* Smarty version Smarty-3.0.7, created on 2022-06-30 14:35:28
         compiled from "application/views\igd/add_daftar.html" */ ?>
<?php /*%%SmartyHeaderCode:1045262bd5240cab027-97273367%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d940e9e188ef4f224466d097fa247d85955d4b8' => 
    array (
      0 => 'application/views\\igd/add_daftar.html',
      1 => 1656574527,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1045262bd5240cab027-97273367',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
  

<div class="breadcrum">
    <p>
        <a href="#">IGD</a><span></span>
         <small>Add Data Pendaftaran</small>
    </p>
    <div class="clear"></div>
</div> 
<div class="content-entry">
    <!-- notification template -->
     <!-- end of notification template-->
   <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('igd/ppdftr/add_process');?>
" method="post" onkeypress="return event.keyCode != 13">
            
        <input name="FS_KD_REG" id="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />
        <input name="FS_KD_LAYANAN" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['KODE_BANGSAL'];?>
" />
        <input name="FS_KD_PETUGAS_MEDIS" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_medis'];?>
" />

        
         <table class="table-input" width="100%" style="text-align: justify;">
         
            <tr>
                <td colspan="2"> Pasien telah terdaftar 
                    <input type="radio" name="status"  class="rad" required value="Tidak" class="form-control">Belum
                    <input type="radio" name="status" class="rad" required value="Ya" class="form-control">Sudah
                    <br>
                    <br>
                    <div id="form2" style="display:none"  >
                          <table>
                            <tr>
                                <td width="20%">Nama Pasien </td>
                                <td width="20%">
                                    <select name="FS_KD_REG" id="surat_dari" class="select2" style="width: 400px;">
                                        <option value=""></option>
                                        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['No_Reg'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['Nama_Pasien'];?>
 | <?php echo $_smarty_tpl->tpl_vars['data']->value['No_MR'];?>
</option>
                                        <?php }} ?>
                                    </select>
                                </td>
                            </tr>
                          </table>
                        </div>

                        <div id="form3" style="display:none"  >
                            <table>
                              <tr>
                                  <td width="20%">Nama Pasien </td>
                                  <td width="20%">
                                    <input type="text" name="Nama" style="width: 400px;" class="form-control">
                                  </td>
                              </tr>
                              <tr>
                                <td width="20%">  Alamat </td>
                                <td width="20%">
                                  <input type="text" name="alamat" class="form-control" style="width: 400px;">
                                </td>
                            </tr>
                            </table>
                          </div>
            
                </td>
            </tr>
            
                                    <tr>
                                        <td width="20%">  Umur </td>
                                        <td width="20%">
                                          <input type="text" name="umur" class="form-control" style="width: 400px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">  Perawatan </td>
                                        <td width="20%">
                                            <input type="radio" name="JENIS_RAWAT" value="Rawat Jalan" checked>Rawat Jalan
                                            <input type="radio" name="JENIS_RAWAT" value="Rawat Inap" >Rawat Inap
                                        </td>
                                    </tr>
                                  <!--   <input type="hidden" name="REKANAN" value="Umum" checked >Umum -->

                                    <tr>
                                        <td width="20%">  Rekanan </td>
                                        <td width="80%">
                                            <input type="radio" name="REKANAN" value="Umum" checked >Umum
                                            <input type="radio" name="REKANAN" value="BPJS" >BPJS
                                            <input type="radio" name="REKANAN" value="DANA SEHAT">Dana Sehat
                                            <input type="radio" name="REKANAN" value="LAINNYA">Lainnya
                                          
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">  Unit 1</td>
                                        <td width="20%">
                                            <select class="select2" name="UNIT1" style="width:400px">
                                                <option></option>
                                                <option value="Penyakit Saraf" >Penyakit Saraf</option>
                                                <option value="Penyakit Dalam" >Penyakit Dalam</option>
                                                <option value="Perawatan Anak" >Perawatan Anak </option>
                                                <option value="Kebidanan" > Kebidanan </option>
                                                <option value="Bedah" > Bedah </option>
                                                <option value="Perina" > Perinatologi </option>
                                                <option value="ICU" > ICU </option>
                                                <option value="Imunokompromised" > Imunokompromised </option>
                                                <option value="Kohort" > Kohort</option>
                 
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">  Ruang 1 </td>
                                        <td width="20%">
                                            <?php if ($_smarty_tpl->getVariable('rolenya')->value=='Dokter'){?> 
                                            <input type="text" readonly="" name="RUANG1"><span>*diisi oleh admisi</span>
                                            <?php }else{ ?>
                                            <select name="RUANG1" id="surat_dari" class="select2"   style="width: 400px;">
                                                <option value=""></option>
                                                <?php  $_smarty_tpl->tpl_vars['gata'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ruang')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['gata']->key => $_smarty_tpl->tpl_vars['gata']->value){
?>
                                                
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['gata']->value['Kode_Ruang'];?>
"><?php echo $_smarty_tpl->tpl_vars['gata']->value['Nama_Ruang'];?>
 </option>
                                              
                                                <?php }} ?>
                                            </select>
                                            <?php }?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">  DPJP 1</td>
                                        <td width="20%">
                                            <select name="KD_DOKTER1" id="surat_dari" class="select2" style="width: 400px;">
                                                <option value=""></option>
                                                <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_dokter')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMAUSER'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
 </option>
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
                                                <option value="Penyakit Saraf" >Penyakit Saraf</option>
                                                <option value="Penyakit Dalam" >Penyakit Dalam</option>
                                                <option value="Perawatan Anak" >Perawatan Anak </option>
                                                <option value="Kebidanan" > Kebidanan </option>
                                                <option value="Bedah" > Bedah </option>
                                                <option value="Perina" > Perinatologi </option>
                                                <option value="ICU" > ICU </option>
                                                <option value="Imunokompromised" > Imunokompromised </option>
                                                <option value="Kohort" > Kohort</option>
                 
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">  Ruang 2 </td>
                                        <td width="20%">
                                            <?php if ($_smarty_tpl->getVariable('rolenya')->value=='Dokter'){?> 
                                            <input type="text" readonly="" name="RUANG2"><span>*diisi oleh admisi</span>
                                            <?php }else{ ?>
                                            <select name="RUANG2" id="surat_dari" class="select2" style="width: 400px;">
                                                <option value=""></option>
                                                <?php  $_smarty_tpl->tpl_vars['gata'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ruang')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['gata']->key => $_smarty_tpl->tpl_vars['gata']->value){
?>
                                                
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['gata']->value['Kode_Ruang'];?>
"><?php echo $_smarty_tpl->tpl_vars['gata']->value['Nama_Ruang'];?>
 </option>
                                              
                                                <?php }} ?>
                                            </select>
                                            <?php }?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">  DPJP 2</td>
                                        <td width="20%">
                                            <select name="KD_DOKTER2" id="surat_dari" class="select2" style="width: 400px;">
                                                <option value=""></option>
                                                <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_dokter')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['NAMAUSER'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMALENGKAP'];?>
 </option>
                                                <?php }} ?>
                                            </select>
                                        </td>
                                    </tr>


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
</script>