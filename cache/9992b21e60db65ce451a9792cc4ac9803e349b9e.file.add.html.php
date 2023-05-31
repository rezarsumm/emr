<?php /* Smarty version Smarty-3.0.7, created on 2022-11-25 14:32:00
         compiled from "application/views\medis/asesmenawal/add.html" */ ?>
<?php /*%%SmartyHeaderCode:563563806f70b16a30-48183474%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9992b21e60db65ce451a9792cc4ac9803e349b9e' => 
    array (
      0 => 'application/views\\medis/asesmenawal/add.html',
      1 => 1669361518,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '563563806f70b16a30-48183474',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?> 
<div class="breadcrum">
    <p>
        <a href="#">Data Arsip</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_inap/cari');?>
">Asesmen Awal Rawat Inap</a><span></span>
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="navigation">
    <div class="navigation-button">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_inap/');?>
"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/back-icon.png" alt="" />  Back</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?> 
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/asesmenawal/add_process');?>
" method="post" onkeypress="return event.keyCode != 13"> 
        <input type="hidden" name="FS_KD_REG" value="<?php echo $_smarty_tpl->getVariable('result')->value['NO_REG'];?>
" />
         <input type="hidden" name="FS_KD_LAYANAN" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['KODE_BANGSAL'];?>
" />
        <input type="hidden" name="FS_MR" value="<?php echo $_smarty_tpl->getVariable('result')->value['NO_MR'];?>
" />

        <table class="table-info" width="50%">
            <tr class="headrow">
                <th colspan="2">Add Asesmen Awal Rawat Inap</th>
            </tr>
            <tr>
                <td>NAMA</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('result')->value['NAMA_PASIEN'];?>

                </td>
            </tr>
            <tr>
                <td>NO MR</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('result')->value['NO_MR'];?>

                </td>
            </tr>
            <tr>
                <td>TANGGAL LAHIR</td>
                <td>
                    <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('result')->value['TGL_LAHIR'],"%d %b %Y");?>

                </td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td><?php echo $_smarty_tpl->getVariable('result')->value['ALAMAT'];?>
</td>
            </tr>
        </table>

        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="2">Anamnesa</th>
                <th colspan="2">Pemeriksaan Fisik</th>
            </tr>
            <tr> 
                <td colspan="2">
                    <textarea cols="80" rows="3"  name="FS_ANAMNESA"><?php echo $_smarty_tpl->getVariable('medis')->value['FS_ANAMNESA'];?>
</textarea>

                </td>
                <td colspan="2">
                    <textarea cols="80" rows="3" name="FS_CATATAN_FISIK"><?php echo $_smarty_tpl->getVariable('medis')->value['FS_CATATAN_FISIK'];?>
</textarea>

                </td>
            </tr>

            <tr>
                <td width='20%'>Riweayat Penyakit dahulu</td>
                <td width='40%'>
                    <input type="text" name="FS_RIW_PENYAKIT_DAHULU" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result3')->value['FS_RIW_PENYAKIT_DAHULU'])===null||$tmp==='' ? '-' : $tmp);?>
" size="32">
                </td>
                <td width='20%'>Riwayat penyakit keluarga</td>
                <td width='30%'>
                    <input type="text" name="FS_RIW_PENYAKIT_DAHULU2" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result3')->value['FS_RIW_PENYAKIT_DAHULU2'])===null||$tmp==='' ? '-' : $tmp);?>
" size="32">
                </td>
            </tr>
 
            <tr>
                <td width='20%'>Riwayat Alergi</td>
                <td width='30%'>
                    <input type="text" name="FS_ALERGI"   value="<?php echo $_smarty_tpl->getVariable('result3')->value['FS_ALERGI'];?>
">
                    <em style="color:red">* Wajib Diisi</em>
                </td>
                <td width='20%'>Reaksi Alergi</td>
                <td width='30%'>
                    <input type="text" name="FS_REAK_ALERGI"  value="<?php echo $_smarty_tpl->getVariable('result3')->value['FS_REAK_ALERGI'];?>
">
                    <em style="color:red">* Wajib Diisi</em>
                </td>
            </tr>

            <tr>
                <td width='20%'>Status Psikologis</td>
                <td width='30%'>
                    <select name="FS_STATUS_PSIK">
                        <option value=""  <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']==''){?> selected="" <?php }?>  onclick='document.getElementById("civstaton3").disabled = true'>--Pilih Data--</option>
                        <option value="1" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']=='1'){?> selected="" <?php }?> onclick='document.getElementById("civstaton3").disabled = true'>Tenang</option>
                        <option value="2" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']=='2'){?> selected="" <?php }?> onclick='document.getElementById("civstaton3").disabled = true'>Cemas</option>
                        <option value="3" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']=='3'){?> selected="" <?php }?> onclick='document.getElementById("civstaton3").disabled = true'>Takut</option>
                        <option value="4" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']=='4'){?> selected="" <?php }?> onclick='document.getElementById("civstaton3").disabled = true'>Marah</option>
                        <option value="5" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']=='5'){?> selected="" <?php }?> onclick='document.getElementById("civstaton3").disabled = true'>Sedih</option>
                        <option value="6" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']!=''&&$_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']!='1'&&$_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']!='2'&&$_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']!='3'&&$_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']!='4'&&$_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']!='5'){?>selected="" <?php }?>onclick='document.getElementById("civstaton3").disabled = false'>Lainnya</option>
                    </select>
                    <br><br>
                    <input type="text" name="FS_STATUS_PSIK2" id="civstaton3" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK2']=='0'){?>disabled=""<?php }?> size="27" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK2'];?>
">
                </td>
                <td width='39%'>Hubungan dengan anggota keluarga</td>
                <td width='30%'>
                    <select name="FS_HUB_KELUARGA" id="surat_dari" class="select2" style="width: 170px;">
                        <option value="" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_HUB_KELUARGA']==''){?> selected="" <?php }?>>--Pilih Data--</option>
                        <option value="1" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_HUB_KELUARGA']=='1'){?> selected="" <?php }?>>Baik</option>
                        <option value="2" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_HUB_KELUARGA']=='2'){?> selected="" <?php }?>>Tidak Baik</option>
    
                    </select>
                </td>
            </tr>

       
 <tr class="headrow">
            <th colspan="2">KEPALA  </th>
            <th colspan="2"> LEHER </th>
        </tr>
        <tr>
            <td width='40%'>Konjungtiva  </td>
            <td width='40%'>
                <input type="checkbox" name="KONJUNGTIVA" <?php if ($_smarty_tpl->getVariable('medis')->value['KONJUNGTIVA']=='Pucat'){?> checked="" <?php }?> value="Pucat">Pucat
                <input type="checkbox" name="KONJUNGTIVA" <?php if ($_smarty_tpl->getVariable('medis')->value['KONJUNGTIVA']=='Pink'){?> checked="" <?php }?> value="Pink">Pink
             </td>
            <td width='40%'>Deviasi Trakea  </td>
            <td width='40%'>
                <input type="checkbox" name="DEVIASI" <?php if ($_smarty_tpl->getVariable('medis')->value['DEVIASI']=='Kanan'){?> checked="" <?php }?>  value="Kanan">Kanan
                <input type="checkbox" name="DEVIASI" <?php if ($_smarty_tpl->getVariable('medis')->value['DEVIASI']=='Kiri'){?> checked="" <?php }?> value="Kiri"> Kiri
                <input type="checkbox" name="DEVIASI" <?php if ($_smarty_tpl->getVariable('medis')->value['DEVIASI']==''){?> checked="" <?php }?> value=""> Tidak Ada
            </td>
         </tr>
         <tr>
            <td width='20%'>Skelera  </td>
            <td width='40%'>
                <input type="checkbox" name="SKELERA" <?php if ($_smarty_tpl->getVariable('medis')->value['SKELERA']=='Ikterik'){?> checked="" <?php }?> value="Ikterik">Ikterik
                <input type="checkbox" name="SKELERA" <?php if ($_smarty_tpl->getVariable('medis')->value['SKELERA']=='Tidak'){?> checked="" <?php }?> value="Tidak"> Tidak Ikterik
            </td>
            <td width='20%'>JVP  </td>
            <td width='40%'>
                <input type="checkbox" name="JVP" <?php if ($_smarty_tpl->getVariable('medis')->value['JVP']=='Meningkat'){?> checked="" <?php }?>  value="Meningkat">Meningkat
                <input type="checkbox" name="JVP" <?php if ($_smarty_tpl->getVariable('medis')->value['JVP']=='Tidak'){?> checked="" <?php }?>   value="Tidak"> Tidak 
            
         </tr>
         <tr>
            <td width='20%'>Bibir/Lidah  </td>
            <td width='40%'>
                <input type="checkbox" name="BIBIR" <?php if ($_smarty_tpl->getVariable('medis')->value['BIBIR']=='Sianosis'){?> checked="" <?php }?>  value="Sianosis">Sianosis
                <input type="checkbox" name="BIBIR" <?php if ($_smarty_tpl->getVariable('medis')->value['BIBIR']=='Tidak'){?> checked="" <?php }?>  value="Tidak"> Tidak
            </td>
         </tr>
         <tr>
            <td width='20%'>Mukosa </td>
            <td width='40%'>
                <input type="checkbox" name="MUKOSA" <?php if ($_smarty_tpl->getVariable('medis')->value['MUKOSA']=='Kering'){?> checked="" <?php }?>  value="Kering">Kering
                <input type="checkbox" name="MUKOSA" <?php if ($_smarty_tpl->getVariable('medis')->value['MUKOSA']=='Tidak'){?> checked="" <?php }?>  value="Tidak"> Basah
            </td>
         </tr>

         <tr class="headrow">
            <th colspan="2">THORAX  </th>
            <th colspan="2"> JANTUNG </th>
        </tr>
        <tr>
            <td colspan="2">
                <textarea cols="80" rows="1" name="THORAX"> <?php echo $_smarty_tpl->getVariable('medis')->value['THORAX'];?>
</textarea>
            </td>
            <td colspan="2">
                <textarea cols="80" rows="1" name="JANTUNG"><?php echo $_smarty_tpl->getVariable('medis')->value['JANTUNG'];?>
</textarea>

            </td>
        </tr>

        <tr class="headrow">
            <th colspan="2">PARU  </th>
            <th colspan="2"> ABDOMEN & PINGGANG </th>
        </tr>
        <tr>
            <td colspan="2">
                <textarea cols="80" rows="1" name="ABDOMEN"><?php echo $_smarty_tpl->getVariable('medis')->value['ABDOMEN'];?>
 </textarea>
            </td>
            <td colspan="2">
                <textarea cols="80" rows="1" name="PINGGANG"> <?php echo $_smarty_tpl->getVariable('medis')->value['PINGGANG'];?>
 </textarea>

            </td>
        </tr>

        <tr class="headrow">
            <th colspan="4">EKSTREMITAS  </th> 
        </tr>
        <tr>
            <td colspan="2"> Atas
                <textarea cols="80" rows="1" name="EKS_ATAS"><?php echo $_smarty_tpl->getVariable('medis')->value['EKS_ATAS'];?>
 </textarea>
            </td>
            <td colspan="2">Bawah
                <textarea cols="80" rows="1" name="EKS_BAWAH"><?php echo $_smarty_tpl->getVariable('medis')->value['EKS_BAWAH'];?>
 </textarea>

            </td>
        </tr>
             
            <tr class="headrow">
                <th colspan="2">Hasil Pemeriksaan Penunjang</th>
                <th colspan="2">Diagnosa</th>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea cols="80" rows="4" name="FS_HASIL_PEMERIKSAAN_PENUNJANG"><?php echo $_smarty_tpl->getVariable('result')->value['FS_HASIL_PEMERIKSAAN_PENUNJANG'];?>
</textarea>
                </td>
                <td colspan="2">
                    <textarea cols="80" rows="4" name="FS_DIAGNOSA"><?php echo $_smarty_tpl->getVariable('result')->value['FS_DIAGNOSA'];?>
</textarea>
    
                </td>
            </tr>
    


            <tr class="headrow">
                <th colspan="2">Daftar Masalah</th>
                <th colspan="2">Diagnosa</th>
            </tr>
            <tr>
                <td colspan="2">
                      <textarea cols="80" rows="3"  name="FS_DAFTAR_MASALAH">
                       <?php echo $_smarty_tpl->getVariable('medis')->value['FS_DAFTAR_MASALAH'];?>

                    </textarea>

                </td>
                <td colspan="2">
                    <textarea cols="80" rows="3" name="FS_DIAGNOSA"><?php echo $_smarty_tpl->getVariable('medis')->value['FS_DIAGNOSA'];?>
</textarea>

                </td>
            </tr>
            <tr class="headrow">
                <th colspan="2">Hasil Pemeriksaan Penunjang</th>
                <th colspan="2">Rencana Tindakan</th>
            </tr>
            <tr>
                <td colspan="2">
                 <textarea cols="80" rows="3" name="FS_HASIL_PEMERIKSAAN_PENUNJANG"></textarea>
                </td>
                <td colspan="2">
                    <textarea cols="80" rows="3" name="FS_TINDAKAN"><?php echo $_smarty_tpl->getVariable('result2')->value['FS_TINDAKAN'];?>
</textarea>

                </td>
            </tr>
            <tr class="headrow">
                <th colspan="2">Rencana Pemeriksaan Penunjang Lab</th>
                <th colspan="2">Rencana Pemeriksaan Penunjang Radiologi</th>
            </tr>

            <tr>
                <td colspan="2">
                    <?php if ($_smarty_tpl->getVariable('result2')->value['FS_PLANNING_LAB']=='0'||$_smarty_tpl->getVariable('result2')->value['FS_PLANNING_LAB']==''){?>
                    <select name="FS_PLANNING_LAB[]" multiple id="rlab" style="width:350px">
                            <option></option>
                        </select> 
                        <?php }else{ ?>
                    <textarea cols="50" name="FS_PLANNING_LAB"><?php echo $_smarty_tpl->getVariable('result2')->value['FS_PLANNING_LAB'];?>
</textarea>
                    <?php }?>
              <input type="hidden" value="<?php echo $_smarty_tpl->getVariable('result2')->value['FS_PLANNING_LAB'];?>
" class="inilablama" >
                </td>
                <td colspan="2">
                     <?php if ($_smarty_tpl->getVariable('result2')->value['FS_PLANNING_RAD']=='0'||$_smarty_tpl->getVariable('result2')->value['FS_PLANNING_RAD']==''){?>
                      <select name="FS_PLANNING_RAD[]" multiple id="rrad" style="width:350px">
                            <option></option>
                        </select>  
                        <?php }else{ ?>
                    <textarea cols="50" name="FS_PLANNING_RAD"><?php echo $_smarty_tpl->getVariable('result2')->value['FS_PLANNING_RAD'];?>
</textarea>
                    <?php }?>
                    <input type="hidden" value="<?php echo $_smarty_tpl->getVariable('result2')->value['FS_PLANNING_RAD'];?>
" class="iniradlama" >
    
                </td>
            </tr> 

  
               <tr class="headrow">
                <th colspan="2">Resep</th>
                <th colspan="2">Resep Racik</th>
            </tr>
            <tr>
                <td colspan="2">   
                     <table>
                    <tr>
                        <td> Nama Obat </td>
                        <td> Numero </td>
                        <td> Signa </td>
                    </tr>
                     <tr> 
                            <td>  <select name="namaobat[]" class="namaobat select2"   multiple id="namaobat" cols="80" style="width:210px">
                                 <option></option> 
                              </select>
                            </td>
                            <td ><input cols="5" type="text" class="numero" name="numero" style="width: 40px;" onkeypress="handleKeyPress(event)" ></td>
                            <td><input cols="20" type="text" name="dosis" class="dosis" style="width: 50px;" onkeypress="handleKeyPress(event)"></td>
                        </tr>
                   </table>


                    <textarea rows="15" class="form-control resep"  cols="60" name="FS_TERAPI"> 
                        <?php echo $_smarty_tpl->getVariable('medis')->value['FS_TERAPI'];?>

                        
                    </textarea> 
                </td> 
                <td colspan="2">
                    <table>
                            <tr>
                                <td> Nama Obat </td>
                                <td> Numero </td>
                                <td> m.f  </td>
                                <td> Signa  </td>
                            </tr>
                             <tr> 
                                    <td>  <select name="namaobat1[]" class="namaobat1 select2"   multiple id="namaobat1" cols="80" style="width:170px">
                                         <option></option> 
                                      </select>
                                    </td>
                                    <td ><input cols="5" type="text" class="numero1" name="numero1" style="width: 40px;" onkeypress="handle2(event)" ></td>
                                    <td><input cols="20" type="text" name="mf1" class="mf1" style="width: 50px;" onkeypress="handle2(event)"  ></td>
                                    <td><input cols="20" type="text" name="dosis1" class="dosis1" style="width: 50px;" onkeypress="handle3(event)"></td>
                                </tr>
                           </table>
                          <textarea rows="15" class="form-control resepracik"   cols="60" name="FS_TERAPI2"> 
                      </textarea> 
                </td>
            </tr>


            <tr class="headrow">
                <th colspan="2"> </th>
               <th colspan="2">  <?php if ($_smarty_tpl->getVariable('com_user')->value['role_nm']=='Perawat Poli'){?> Catatan/Pesan  <?php }else{ ?>
                    <?php }?></th>
            </tr>
            <tr>
                <td colspan="2">
                   <!--  <textarea   class="form-control namaa"   value="<<?php ?>?= set_value('ket');?<?php ?>>" rows="7"  cols="80" name="FS_TERAPI"  onkeypress="handleKeyPress(event)" data-minwords="6" data-required="true"  ><?php echo $_smarty_tpl->getVariable('medis')->value['FS_TERAPI'];?>
</textarea> -->

                 </td>
                   <td colspan="2">
                    <?php if ($_smarty_tpl->getVariable('com_user')->value['role_nm']=='Perawat Poli'){?>
                     
                 <textarea rows="5" cols="80" name="FS_PESAN">
              
                 </textarea>
          
                    <?php }else{ ?>
                    <input type="hidden" name="FS_PESAN">
                    <?php }?>
                </td>
            </tr>


          <tr class="submit-box">
                <td colspan="4">
                    <input type="submit" name="save" value="Simpan" class="edit-button"/>
                </td>
            </tr>
           



        </table>
    </form>
</div>

 

<script type="text/javascript"> 
    var user = $("#user").val(); 
           
            $("#namaobat").select2({});
    
     
//rencana lab
           $('#rlab').select2('data', null);
            $('#rlab').select2('data', null);
            $("#rlab").removeAttr("disabled");
            jQuery("#rlab").html('');
            $.ajax({
            type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/list_pemeriksaan_rlab/');?>
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
                            jQuery("#rlab").html(showData);
                    }
            });
             $("#rlab").select2({});



             //rencana radiologi
               $('#rrad').select2('data', null);
            $('#rrad').select2('data', null);
            $("#rrad").removeAttr("disabled");
            jQuery("#rrad").html('');
            $.ajax({
            type: "POST",
                    url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/list_pemeriksaan_rrad/');?>
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
                            jQuery("#rrad").html(showData);
                    }
            });
             $("#rrad").select2({});
</script>


<script>
        var namaa = $(".namaa").val();
               $('.namaa').val(namaa+'\n R/ \t   no. \n S                    \n ----------------------------------------\n '); 
       
       
                $('.resepracik').val('\n /R');
 

               function tambahkop(e){
                   var yhr= new XMLHttpRequest();
                var key=e.keyCode || e.which;
                 if (key==13){
                               var resepracik = $(".resepracik").val(); 
                                   $('.resepracik').val(resepracik+'S                 \n ---------------------------------------- \n \n'+'R/  '); // Close / Tutup Modal Dialog
                 //    // alert(namaa);
                 }
               }
        
       
       
   function handleKeyPress(e){
                   var yhr= new XMLHttpRequest();
                var key=e.keyCode || e.which;
                 if (key==13){
                               var namaobat = $("#namaobat").val();
                               var numero = $(".numero").val();
                               var dosis = $(".dosis").val();
                             var kolomresep= document.getElementById("kolomresep");
                              var resep = $(".resep").val();
       
       $('.resep').val(resep+'\n /R   '+namaobat+'   no. '+numero+'\n S    '+dosis+'\n ----------------------------------------------- \n '); 
               //    alert(namaobat+numero+dosis);
                  $('#namaobat').select2('data', null);
                  $('.numero').val(null);
                  $('.dosis').val(null);
        
               //    $("#namaobat").select2({}).focus();
                  $("#namaobat").select2('open');
        
                 }
               }

var x=event.key;
if(x=='a'||x=='A'){
    alert("hore");
}
           

 function handle2(e){
                   var key=e.keyCode || e.which;
                 if (key==13){
                               var namaobat1 = $("#namaobat1").val();
                               var numero1 = $(".numero1").val();
                            //    var dosis1 = $(".dosis1").val();
                                var resepracik = $(".resepracik").val();
       
       $('.resepracik').val(resepracik+'    '+namaobat1+'   no. '+numero1+'\n     '); 
               //    alert(namaobat+numero+dosis);
                  $('#namaobat1').select2('data', null);
                  $('.numero1').val(null);
                  $('.dosis1').val(null);
        
               //    $("#namaobat").select2({}).focus();
                  $("#namaobat1").select2('open');
        
                 }
               }


               
 function handle3(e){
                   var key=e.keyCode || e.which;
                 if (key==13){
                               var namaobat1 = $("#namaobat1").val();
                               var numero1 = $(".numero1").val();
                               var dosis1 = $(".dosis1").val();
                               var mf1 = $(".mf1").val();
                                var resepracik = $(".resepracik").val();
       if(namaobat1==null){
        $('.resepracik').val(resepracik+'          '+mf1+'\n   S  '+dosis1+'\n ------------------------------------------------- \n \n   /R'); 
       }
       else{
       $('.resepracik').val(resepracik+'    '+namaobat1+'   no. '+numero1+'\n'+'           '+mf1+'\n    S      '+dosis1+'\n ------------------------------------------ \n \n  /R'); 
            }     //    alert(namaobat+numero+dosis);
                  $('#namaobat1').select2('data', null);
                  $('.numero1').val(null);
                  $('.dosis1').val(null);
                  $('.mf1').val(null);
        
               //    $("#namaobat").select2({}).focus();
                  $("#namaobat1").select2('open');
        
                 }
               }
       
    </script> 
       
       
       <script type="text/javascript"> 
           var user = $("#user").val(); 
       
           $('#namaobat').select2('data', null);
                   $('#namaobat').select2('data', null);
                   $("#namaobat").removeAttr("disabled");
       
                   jQuery("#namaobat").html('');
                   $.ajax({
                   type: "POST", 
                           url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/list_nama_obat/');?>
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
                                   jQuery("#namaobat").html(showData);
                           }
                   });
                   //tags
                  

                   $('#namaobat1').select2('data', null);
                   $('#namaobat1').select2('data', null);
                   $("#namaobat1").removeAttr("disabled");
       
                   jQuery("#namaobat1").html('');
                   $.ajax({
                   type: "POST", 
                           url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/list_nama_obat/');?>
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
                                   jQuery("#namaobat1").html(showData);
                           }
                   });

                    $("#namaobat1").select2({});
       </script>
