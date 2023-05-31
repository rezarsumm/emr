<?php /* Smarty version Smarty-3.0.7, created on 2023-05-25 13:41:54
         compiled from "application/views\igd/triase/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:14779646f0332834700-09554586%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5582faa5e2444dbdf268b444718703816c0caa55' => 
    array (
      0 => 'application/views\\igd/triase/edit.html',
      1 => 1657249024,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14779646f0332834700-09554586',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

 
<div class="breadcrum">
    <p>
        <a href="#">IGD </a><span></span>
        <a href="#">Triase</a><span></span>
        <small>Edit Data</small>
    </p>
    <div class="clear"></div>
</div> 
<div class="content-entry">
    <!-- notification template --> 
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('igd/triase/edit_process');?>
" method="post" onkeypress="return event.keyCode != 13">
    <br>
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('id')->value;?>
">
        <table class="table-input" width="100%" style="text-align: justify;">
         
            <tr>
                <td colspan="2"> Pasien telah mendaftar 
                    <input type="radio" name="status"  class="rad" required value="Tidak" <?php if ($_smarty_tpl->getVariable('rs_triase')->value['FS_KD_REG']==''){?> checked <?php }?>   class="form-control">Belum
                    <input type="radio" name="status" class="rad" required value="Ya" <?php if ($_smarty_tpl->getVariable('rs_triase')->value['FS_KD_REG']!=''){?> checked <?php }?> class="form-control">Sudah
                    <br>
                    <br>
                    <div id="form2" <?php if ($_smarty_tpl->getVariable('rs_triase')->value['FS_KD_REG']!=''){?> style="display:show" <?php }?> style="display:none"  >
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
                                        <?php if ($_smarty_tpl->tpl_vars['data']->value['No_Reg']==$_smarty_tpl->getVariable('rs_triase')->value['FS_KD_REG']){?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['No_Reg'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['data']->value['Nama_Pasien'];?>
 | <?php echo $_smarty_tpl->tpl_vars['data']->value['No_MR'];?>
</option>
                                        <?php }else{ ?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['No_Reg'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['Nama_Pasien'];?>
 | <?php echo $_smarty_tpl->tpl_vars['data']->value['No_MR'];?>
</option>
                                        <?php }?>
                                        <?php }} ?>
                                    </select>
                                </td>
                            </tr>
                          </table>
                        </div>

                        <div id="form3" <?php if ($_smarty_tpl->getVariable('rs_triase')->value['FS_KD_REG']==''){?> style="display:show" <?php }else{ ?> style="display: none;" <?php }?>   >
                            <table>
                              <tr>
                                  <td width="20%">Nama Pasien </td>
                                  <td width="20%">
                                    <input type="text" name="Nama_Pasien" style="width: 400px;" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['Nama_Pasien'];?>
" class="form-control">
                                  </td>
                              </tr>
                              <tr>
                                <td width="20%">  Alamat </td>
                                <td width="20%">
                                  <input type="text" name="Alamat" class="form-control"  value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['Alamat'];?>
" style="width: 400px;">
                                </td>
                            </tr>
                            </table>
                          </div>
            
                </td>
            </tr>
            
              
          </table>

          <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="4">TRIASE</th>
            
            </tr>
            <tr>
                <td>Kontak Awal Pasien</td>
            </tr>
            <tr>
                <td width='20%'>Tanggal</td>
                <td width='30%'><input type="date" required  value="<?php echo date('Y-m-d',strtotime($_smarty_tpl->getVariable('rs_triase')->value['TGL_DATANG']));?>
" name="TGL_DATANG" size="10"  /></td>
                <td width='20%'>Pukul</td>
                <td width='30%'><input type="time" required name="JAM_DATANG" size="10"  value="<?php echo date('H:i',strtotime($_smarty_tpl->getVariable('rs_triase')->value['JAM_DATANG']));?>
" /> </td>
             </tr>
             <tr>
                <td width='20%'>Cara masuk </td>
                <td colspan="3"> 
                    <input type="radio" name="CARA_MASUK"  <?php if ($_smarty_tpl->getVariable('rs_triase')->value['CARA_MASUK']=='Jalan'){?> checked <?php }?>  value="Jalan"  /> Jalan
                    <input type="radio" name="CARA_MASUK" <?php if ($_smarty_tpl->getVariable('rs_triase')->value['CARA_MASUK']=='Brandkar'){?> checked <?php }?> value="Brandkar"  /> Brandkar 
                    <input type="radio" name="CARA_MASUK" <?php if ($_smarty_tpl->getVariable('rs_triase')->value['CARA_MASUK']=='Kursi Roda'){?> checked <?php }?> value="Kursi Roda"  /> Kursi Roda 
                    <input type="radio" name="CARA_MASUK" <?php if ($_smarty_tpl->getVariable('rs_triase')->value['CARA_MASUK']=='Digendong'){?> checked <?php }?> value="Digendong"  /> Digendong</td>
             </tr>
             <tr>
                <td width='20%'>  Sudah terpasang </td>
                <td colspan="3"> 
                    <textarea name="SUDAH_TERPASANG" required style="width:650px" rows="1" class="form-control"><?php echo $_smarty_tpl->getVariable('rs_triase')->value['SUDAH_TERPASANG'];?>
</textarea>
              </tr>
              <tr>
                <td width='20%'>  Alasan Kedatangan </td>
                <td colspan="3"> 
                    <input type="radio" name="ALASAN_DATANG"  <?php if ($_smarty_tpl->getVariable('rs_triase')->value['ALASAN_DATANG']=='Sendiri'){?> checked <?php }?>  value="Sendiri" class="radal" /> Datang Sendiri
                    <input type="radio" name="ALASAN_DATANG" <?php if ($_smarty_tpl->getVariable('rs_triase')->value['ALASAN_DATANG']=='Polisi'){?> checked <?php }?>   value="Polisi" class="radal" /> Polisi
                    <input type="radio" name="ALASAN_DATANG" <?php if ($_smarty_tpl->getVariable('rs_triase')->value['ALASAN_DATANG']=='Rujukan'){?> checked <?php }?>  value="Rujukan"  class="radal"/> Rujukan
                        <input type="text" name="rujukan_dari"  id="formal" style="display:none ;"> 
                    <input type="radio" name="ALASAN_DATANG" <?php if ($_smarty_tpl->getVariable('rs_triase')->value['ALASAN_DATANG']=='Dijemput'){?> checked <?php }?>  value="Dijemput" class="radal" /> Dijemput 
                        <input type="text" name="dijemput" id="formal2" style="display:none ;"> 

                    </td>
             </tr>
             <tr>
                <td width='20%'>  Kendaraan </td>
                <td colspan="3"> 
                    <input type="radio" name="KENDARAAN" <?php if ($_smarty_tpl->getVariable('rs_triase')->value['KENDARAAN']=='Ambulance'){?> checked <?php }?>  value="Ambulance" class="radb"  /> Ambulance
                    <input type="radio" name="KENDARAAN" <?php if ($_smarty_tpl->getVariable('rs_triase')->value['KENDARAAN']!='Ambulance'){?> checked <?php }?>  value="Bukan" class="radb" /> Lainnya
                    <input type="text" name="KENDARAAN1" id="formb" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['KENDARAAN'];?>
" <?php if ($_smarty_tpl->getVariable('rs_triase')->value['KENDARAAN']!='Ambulance'){?> style="display:show" <?php }?>   style="display:none ;"> 

                    </td>
              </tr>

               
        
            <tr>
                <td width='20%'>Identitas Pengantar</td>
                <td colspan="3">Nama <input type="text" required name="NAMA_PENGANTAR" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['NAMA_PENGANTAR'];?>
" size="50"  /> 
                    No Telp <input type="text" required name="TELP_PENGANTAR" size="10" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['TELP_PENGANTAR'];?>
" /> </td>
             </tr>
             <tr>
                <td width='20%'>  Kasus </td>
                <td colspan="3"> 
                    <input type="radio" name="JENIS_KASUS"  value="Trauma" <?php if ($_smarty_tpl->getVariable('rs_triase')->value['JENIS_KASUS']=='Trauma'){?> checked <?php }?>  /> Trauma
                    <input type="radio" name="JENIS_KASUS"  value="Non"  <?php if ($_smarty_tpl->getVariable('rs_triase')->value['JENIS_KASUS']=='Non'){?>  checked <?php }?>/> Non Trauma </td>
              </tr>
              </table>


              <table class="table-input" width="100%">
                <tr class="headrow">
                    <th colspan="4">MEKANISME TRAUMA</th>
                
                </tr>
                  <tr>
                     <td colspan="4"> 
                        <input type="radio" name="JENIS_TRAUMA"  value="1" <?php if ($_smarty_tpl->getVariable('rs_triase')->value['JENIS_TRAUMA']=='1'){?> checked <?php }?>  class="radt" /> Kll Tunggal 
                          <div id="formtunggal" style="display: none;">
                          <input type="text" name="TEMPAT_KEJADIAN" placeholder="tempat kejadian" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['TEMPAT_KEJADIAN'];?>
"  > 
                          <input type="date" name="TGL_KEJADIAN"  value="<?php echo date('Y-m-d',strtotime($_smarty_tpl->getVariable('rs_triase')->value['TGL_KEJADIAN']));?>
"> 
                          <input type="time" name="JAM_KEJADIAN"  value="<?php echo date('H:i',strtotime($_smarty_tpl->getVariable('rs_triase')->value['JAM_KEJADIAN']));?>
"> 
                        </div>
                        <br>
                         <input type="radio" name="JENIS_TRAUMA"  value="2" <?php if ($_smarty_tpl->getVariable('rs_triase')->value['JENIS_TRAUMA']=='2'){?> checked <?php }?>  class="radt"/> Kll Ganda 
                         <div id="formtunggal1" style="display: none;">
                            <input type="text" name="URAIAN_TRAUMA" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['URAIAN_TRAUMA'];?>
"  > 
                            <input type="text" name="TEMPAT_KEJADIAN" placeholder="tempat kejadian"  value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['TEMPAT_KEJADIAN'];?>
"  > 
                            <input type="date" name="TGL_KEJADIAN" value="<?php echo date('Y-m-d',strtotime($_smarty_tpl->getVariable('rs_triase')->value['TGL_KEJADIAN']));?>
" > 
                            <input type="time" name="JAM_KEJADIAN" value="<?php echo date('H:i',strtotime($_smarty_tpl->getVariable('rs_triase')->value['JAM_KEJADIAN']));?>
" > 
                            </div>
                         <br>
                        <input type="radio" name="JENIS_TRAUMA"  value="3"  <?php if ($_smarty_tpl->getVariable('rs_triase')->value['JENIS_TRAUMA']=='3'){?> checked <?php }?> class="radt"/> Jatuh dari ketinggian 
                            <input type="text" name="URAIAN_TRAUMA" id="formj" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['URAIAN_TRAUMA'];?>
"  style="display: none;"  > 
                            <br>

                            <input type="radio" name="JENIS_TRAUMA"  value="7" <?php if ($_smarty_tpl->getVariable('rs_triase')->value['JENIS_TRAUMA']=='7'){?> checked <?php }?>  class="radt"/> Luka Bakar
                            <input type="text" name="URAIAN_TRAUMA" id="formlb" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['URAIAN_TRAUMA'];?>
"  style="display: none;"  > 
                            <br>

                        <input type="radio" name="JENIS_TRAUMA"  value="4" <?php if ($_smarty_tpl->getVariable('rs_triase')->value['JENIS_TRAUMA']=='4'){?> checked <?php }?> class="radt"/> Trauma Listrik
                            <input type="text" name="URAIAN_TRAUMA" id="formlis" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['URAIAN_TRAUMA'];?>
"  style="display: none;"  > 
                            <br>
                        <input type="radio" name="JENIS_TRAUMA"  value="5" <?php if ($_smarty_tpl->getVariable('rs_triase')->value['JENIS_TRAUMA']=='5'){?> checked <?php }?> class="radt"/> Trauma Zat Kimia 
                            <input type="text" name="URAIAN_TRAUMA" id="formz" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['URAIAN_TRAUMA'];?>
"  style="display: none;"  > 
                           <br>
                        <input type="radio" name="JENIS_TRAUMA"  value="6" <?php if ($_smarty_tpl->getVariable('rs_triase')->value['JENIS_TRAUMA']=='6'){?> checked <?php }?> class="radt" /> Lainnya 
                            <input type="text" name="URAIAN_TRAUMA" id="formlain" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['URAIAN_TRAUMA'];?>
"  style="display: none;"  > 

                      
                         
                        </td>

                 </tr>
                 </table>
                 <table class="table-input" width="100%">
                    <tr class="headrow">
                        <th colspan="4">  KELUHAN UTAMA</th>
                     </tr>
                     <tr>
                         <td colspan="4">
                             <textarea name="KELUHAN" required style="width: 650px;" rows="3"><?php echo $_smarty_tpl->getVariable('rs_triase')->value['KELUHAN'];?>
</textarea>
                         </td>
                     </tr>
                   </table>
                 <table class="table-input" width="100%">
                    <!-- <tr class="headrow">
                        <th colspan="4">    LEVEL TRIAGE</th>
                     </tr>
                     <tr>
                         <td colspan="4">
                             <table>
                                 <tr>
                                     <td>  <div class="a" style="width: 200px; height:20px; background-color: red;">    <input type="radio" name="PACS" value="1">PACS 1  </div></td>
                                     <td> <div class="a" style="width: 200px; height:20px; background-color: yellow;">   <input type="radio" name="PACS" value="2">PACS 2</div></td>
                                     <td>  <div class="a" style="width: 200px; height:20px; background-color: yellowgreen;">  <input type="radio" name="PACS" value="3">PACS 3</div> </td>
                                     <td> <div class="a" style="width: 200px; height:20px; background-color: green;"> <input type="radio" name="PACS" value="4">PACS 4</div></td>
                                 </tr>
                             </table> 
                         </td>
                     </tr> -->
                     <input type="hidden" name="PACS" value="">


            <tr class="headrow">
                <th colspan="4">Vital Sign</th>
            </tr>
            <tr>
                <td>Kesadaran</td>
                <td colspan="3">
                    <input type="radio" name="KESADARAN" class="SADAR" value="Sadar">Sadar Penuh
                    <input type="radio" name="KESADARAN" class="SADAR" value="Suara">Respon Suara
                    <input type="radio" name="KESADARAN" class="SADAR" value="Nyeri">Respon Nyeri
                    <input type="radio" name="KESADARAN" class="SADAR" value="Tidak">Tida Ada respon
                </td>
            </tr>
            <tr>
                <td>Tekanan Darah</td>
                <td colspan="3"><input type="text" required name="TD" class="TD" size="10" />  
                      R <input type="text" name="R" required size="10" class="R" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['R'];?>
"/>
                                Satuarasi O2 <input type="text" required class="O2" name="O2" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['O2'];?>
" size="10" /></td>
            </tr>
            <tr> 
                <td width='20%'>Nadi</td>
                <td colspan="3"><input type="text" name="N" required size="10" class="N" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['N'];?>
"/>
                    Suhu
                    <input type="text" name="SUHU" size="10" required class="S"  value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['SUHU'];?>
"/>
                    Nyeri
                    <input type="text" name="NYERI" size="10" required value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['NYERI'];?>
"/>
            </tr>
            <tr>
               
            </tr>
            <tr>
                <td>Tinggi Badan</td>
                <td><input type="text" name="TB" size="10" required value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['TB'];?>
"/> cm</td>
                <td>Berat Badan</td>
                <td><input type="text" name="BB" size="10" required value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['BB'];?>
"/> Kg</td>
            </tr>
            <tr><td><br><br></td></tr>

            <tr>
                <td>Skor</td>
                <td colspan="3">
                    <table>
                        <tr>
                            <td> Kesadaran </td>
                            <td>   <input readonly type="text" name="SKOR_KESADARAN" id="S_SADAR" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['SKOR_KESADARAN'];?>
"></td>
                        </tr>
                        <tr>
                            <td>Tekanan Darah Sistolik </td>
                            <td><input type="text" readonly name="SKOR_TD" id="S_TD" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['SKOR_TD'];?>
"></td>
                        </tr>
                        <tr>
                            <td> Nadi </td>
                            <td>  <input type="text" name="SKOR_N" readonly id="S_N" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['N_SKOR'];?>
"></td>
                        </tr>
                        <tr>
                            <td>Respirasi</td>
                            <td> <input type="text" name="SKOR_R" readonly id="S_R" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['SKOR_R'];?>
"></td>
                        </tr>
                        <tr>
                            <td>Temperatur</td>
                            <td> <input type="text" name="SKOR_SUHU" readonly id="S_S" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['SKOR_SUHU'];?>
"></td>
                        </tr>
                        <tr>
                            <td>Staurasi O2</td>
                            <td><input type="text" name="SKOR_O2" readonly id="S_O2" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['SKOR_O2'];?>
"></td>
                        </tr>
                    </table>
                  
                    Total   :   <input type="text" name="TOTAL_SKOR" readonly id="S_T" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['TOTAL_SKOR'];?>
"><br>
                    <table>
                        <tr>
                            <td>  <div class="a" style="width: 100px; height:20px; color: red;">    <input type="radio" id='radio_1' name="KES" value="1"><b>Priorotas I (>5)  </b></div></td>
                            <td> <div class="a" style="width: 110px; height:20px; color: goldenrod;">   <input type="radio" id='radio_2' name="KES" value="2"><b>Prioritas II (2-4)</b></div></td>
                            <td> <div class="a" style="width: 130px; height:20px; color: green;"> <input type="radio" name="KES" id='radio_3' value="3"> <b>Prioritas III (0-1)</b></div></td>
                            <td> <div class="a" style="width: 130px; height:20px; color: grey;"> <input type="radio" name="KES" id='radio_4' value="DOA"><b>Death on Arrived </b></div></td>
                        </tr>
                    </table> 
                    </td>
                    
            </tr>
            <tr>
                <td> Catatan Khusus </td>
                <td>
                    <textarea name="CAT_KHUSUS" rows="3" required style="width: 300px;"><?php echo $_smarty_tpl->getVariable('rs_triase')->value['CAT_KHUSUS'];?>
</textarea>
                </td>
                </tr>

            <tr> <td >Keputusan </td>
                <td colspan="3">
                     <input type="hidden" name="KEPUTUSAN" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['KEPUTUSAN'];?>
" style="width:500px ;">
                    Pukul
                    <input type="time" required name="JAM_KEP" value="<?php echo $_smarty_tpl->getVariable('rs_triase')->value['JAM_KEP'];?>
"></input>
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



 $(function(){
   $(":radio.radal").click(function(){
     $("#formal").hide();
     $("#formal2").hide();

     if($(this).val() == "Rujukan"){
       $("#formal").show();
       $("#formal2").hide()
     }else if($(this).val() == "Dijemput"){
       $("#formal").hide();
       $("#formal2").show()
     }
   });



   $(":radio.radb").click(function(){
     $("#formb").hide();

     if($(this).val() == "Bukan"){
       $("#formb").show();
     }else if($(this).val() == "Ambulance"){
       $("#formb").hide();
     }
   });

   $('.TD').on('keyup', function(){
     let text = $(this).val();
     var result = text.substring(0, 3);


     if(result>=100){
         $('#S_TD').val(0);
     }
     else  if(result<=99){
         $('#S_TD').val(2);
     }

     var TD=$('#S_TD').val();
         var N=$('#S_N').val();
         var R=$('#S_R').val();
         var S=$('#S_S').val();
         var O2=$('#S_O2').val();
         var SADAR=$('#S_SADAR').val();
            var Total=parseInt(TD) + parseInt(N) + parseInt(R) + parseInt(S) + parseInt(O2) + parseInt(SADAR);
        $('#S_T').val(Total);
        if(Total>=5){
         
         // $("#radio_1").attr('checked', 'checked');
         $("#radio_1").prop( "checked", true );
         $("#radio_2").prop( "checked", false );
         $("#radio_3").prop( "checked", false );
        
        }
        else  if(Total>1 && Total<5){
        
         $("#radio_2").prop( "checked", true );
         $("#radio_1").prop( "checked", false );
         $("#radio_3").prop( "checked", false );
        }
        else  if(Total<=1 ){
         // $("#radio_3").attr('checked', 'checked');
         $("#radio_2").prop( "checked", false );
         $("#radio_1").prop( "checked", false );
         $("#radio_3").prop( "checked", true );
        }


   });

   $('.N').on('keyup', function(){
     if($(this).val()<=101){
         $('#S_N').val(0);
     }
     else  if($(this).val()>=102){
         $('#S_N').val(1);
     }

     var TD=$('#S_TD').val();
         var N=$('#S_N').val();
         var R=$('#S_R').val();
         var S=$('#S_S').val();
         var O2=$('#S_O2').val();
         var SADAR=$('#S_SADAR').val();
            var Total=parseInt(TD) + parseInt(N) + parseInt(R) + parseInt(S) + parseInt(O2) + parseInt(SADAR);
        $('#S_T').val(Total);

        if(Total>=5){
         
         // $("#radio_1").attr('checked', 'checked');
         $("#radio_1").prop( "checked", true );
         $("#radio_2").prop( "checked", false );
         $("#radio_3").prop( "checked", false );
        
        }
        else  if(Total>1 && Total<5){
        
         $("#radio_2").prop( "checked", true );
         $("#radio_1").prop( "checked", false );
         $("#radio_3").prop( "checked", false );
        }
        else  if(Total<=1 ){
         // $("#radio_3").attr('checked', 'checked');
         $("#radio_2").prop( "checked", false );
         $("#radio_1").prop( "checked", false );
         $("#radio_3").prop( "checked", true );
        }

   });


   $('.R').on('keyup', function(){
     if($(this).val()<=19){
         $('#S_R').val(0);
     }
     else  if($(this).val()==20 || $(this).val()==21){
         $('#S_R').val(1);
     }
     else  if($(this).val()>=22){
         $('#S_R').val(2);
     }
     var TD=$('#S_TD').val();
         var N=$('#S_N').val();
         var R=$('#S_R').val();
         var S=$('#S_S').val();
         var O2=$('#S_O2').val();
         var SADAR=$('#S_SADAR').val();
            var Total=parseInt(TD) + parseInt(N) + parseInt(R) + parseInt(S) + parseInt(O2) + parseInt(SADAR);
        $('#S_T').val(Total);
        if(Total>=5){
         
         // $("#radio_1").attr('checked', 'checked');
         $("#radio_1").prop( "checked", true );
         $("#radio_2").prop( "checked", false );
         $("#radio_3").prop( "checked", false );
        
        }
        else  if(Total>1 && Total<5){
        
         $("#radio_2").prop( "checked", true );
         $("#radio_1").prop( "checked", false );
         $("#radio_3").prop( "checked", false );
        }
        else  if(Total<=1 ){
         // $("#radio_3").attr('checked', 'checked');
         $("#radio_2").prop( "checked", false );
         $("#radio_1").prop( "checked", false );
         $("#radio_3").prop( "checked", true );
        }

   });


   $('.S').on('keyup', function(){
     if($(this).val()>=35.3){
         $('#S_S').val(0);
     }
     else {
         $('#S_S').val(3);
     }

     var TD=$('#S_TD').val();
         var N=$('#S_N').val();
         var R=$('#S_R').val();
         var S=$('#S_S').val();
         var O2=$('#S_O2').val();
         var SADAR=$('#S_SADAR').val();
            var Total=parseInt(TD) + parseInt(N) + parseInt(R) + parseInt(S) + parseInt(O2) + parseInt(SADAR);
        $('#S_T').val(Total);
        if(Total>=5){
         
         // $("#radio_1").attr('checked', 'checked');
         $("#radio_1").prop( "checked", true );
         $("#radio_2").prop( "checked", false );
         $("#radio_3").prop( "checked", false );
        
        }
        else  if(Total>1 && Total<5){
        
         $("#radio_2").prop( "checked", true );
         $("#radio_1").prop( "checked", false );
         $("#radio_3").prop( "checked", false );
        }
        else  if(Total<=1 ){
         // $("#radio_3").attr('checked', 'checked');
         $("#radio_2").prop( "checked", false );
         $("#radio_1").prop( "checked", false );
         $("#radio_3").prop( "checked", true );
        }

   });



   
   $('.O2').on('keyup', function(){
     if($(this).val()<92){
         $('#S_O2').val(3);
     }   
     else if($(this).val()>=92 && $(this).val()<=93){
         $('#S_O2').val(2);
     }
     else if($(this).val()>=94 && $(this).val()<=95){
         $('#S_O2').val(1);
     }
     else if($(this).val()>=96 && $(this).val()<=100){
         $('#S_O2').val(0);
     }
     var TD=$('#S_TD').val();
         var N=$('#S_N').val();
         var R=$('#S_R').val();
         var S=$('#S_S').val();
         var O2=$('#S_O2').val();
         var SADAR=$('#S_SADAR').val();
            var Total=parseInt(TD) + parseInt(N) + parseInt(R) + parseInt(S) + parseInt(O2) + parseInt(SADAR);
        $('#S_T').val(Total);
        if(Total>=5){
         
         // $("#radio_1").attr('checked', 'checked');
         $("#radio_1").prop( "checked", true );
         $("#radio_2").prop( "checked", false );
         $("#radio_3").prop( "checked", false );
        
        }
        else  if(Total>1 && Total<5){
        
         $("#radio_2").prop( "checked", true );
         $("#radio_1").prop( "checked", false );
         $("#radio_3").prop( "checked", false );
        }
        else  if(Total<=1 ){
         // $("#radio_3").attr('checked', 'checked');
         $("#radio_2").prop( "checked", false );
         $("#radio_1").prop( "checked", false );
         $("#radio_3").prop( "checked", true );
        }
    });


   $(":radio.SADAR").click(function(){
     if($(this).val() == "Sadar"){
         $('#S_SADAR').val(0);
     }
     else{
         $('#S_SADAR').val(3);
     }

     var TD=$('#S_TD').val();
         var N=$('#S_N').val();
         var R=$('#S_R').val();
         var S=$('#S_S').val();
         var O2=$('#S_O2').val();
         var SADAR=$('#S_SADAR').val();
            var Total=parseInt(TD) + parseInt(N) + parseInt(R) + parseInt(S) + parseInt(O2) + parseInt(SADAR);
        $('#S_T').val(Total);
        if(Total>=5){
         
         // $("#radio_1").attr('checked', 'checked');
         $("#radio_1").prop( "checked", true );
         $("#radio_2").prop( "checked", false );
         $("#radio_3").prop( "checked", false );
        
        }
        else  if(Total>1 && Total<5){
        
         $("#radio_2").prop( "checked", true );
         $("#radio_1").prop( "checked", false );
         $("#radio_3").prop( "checked", false );
        }
        else  if(Total<=1 ){
         // $("#radio_3").attr('checked', 'checked');
         $("#radio_2").prop( "checked", false );
         $("#radio_1").prop( "checked", false );
         $("#radio_3").prop( "checked", true );
        }
 });

   

   $(":radio.radt").click(function(){
    

     if($(this).val() == "1"){
       $("#formtunggal").show();
       $("#formtunggal1").hide();
       $("#formj").hide(); 
       $("#formlis").hide(); 
       $("#formlb").hide(); 
       $("#formz").hide(); 
       $("#formlain").hide(); 
     }else if($(this).val() == "2"){
         $("#formtunggal").hide();
       $("#formtunggal1").show();
       $("#formj").hide(); 
       $("#formlis").hide(); 
       $("#formlb").hide(); 
       $("#formz").hide(); 
       $("#formlain").hide(); 
     }else if($(this).val() == "3"){
         $("#formtunggal").hide();
       $("#formlb").hide(); 
       $("#formtunggal1").hide();
       $("#formj").show(); 
       $("#formlis").hide(); 
       $("#formz").hide(); 
       $("#formlain").hide(); 
     }else if($(this).val() == "4"){
         $("#formtunggal").hide();
       $("#formtunggal1").hide();
       $("#formj").hide(); 
       $("#formlis").show(); 
       $("#formlb").hide(); 
       $("#formz").hide(); 
       $("#formlain").hide(); 
     }else if($(this).val() == "5"){
       $("#formlb").hide(); 
         $("#formtunggal").hide();
       $("#formtunggal1").hide();
       $("#formj").hide(); 
       $("#formlis").hide(); 
       $("#formz").show(); 
       $("#formlain").hide(); 
     }else if($(this).val() == "6"){
         $("#formtunggal").hide();
       $("#formtunggal1").hide();
       $("#formj").hide(); 
       $("#formlis").hide(); 
       $("#formz").hide(); 
       $("#formlain").show(); 
       $("#formlb").hide(); 

     }else if($(this).val() == "7"){
         $("#formtunggal").hide();
       $("#formtunggal1").hide();
       $("#formj").hide(); 
       $("#formlis").hide(); 
       $("#formz").hide(); 
       $("#formlain").hide(); 
       $("#formlb").show(); 

     }

 
   });

 });
</script>




