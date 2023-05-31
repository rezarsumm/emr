<?php /* Smarty version Smarty-3.0.7, created on 2022-05-17 09:43:12
         compiled from "application/views\op/alatpakai/add.html" */ ?>
<?php /*%%SmartyHeaderCode:1581962830bc06fe8a9-61761975%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42d270c52a2b2b24d088bc9148ef9ff2d01e84d0' => 
    array (
      0 => 'application/views\\op/alatpakai/add.html',
      1 => 1652408035,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1581962830bc06fe8a9-61761975',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?>
 
<div class="breadcrum">
    <p>
        <a href="#">Catatan Operasi </a><span></span>
        <span></span>
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div> 
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/alatpakai/add_process2');?>
" method="post" onkeypress="return event.keyCode != 13">
        <input name="FS_KD_REG" id="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />  
            <input name="TGL_LAHIR" id="TGL_LAHIR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['TGL_LAHIR'];?>
" /> 
        <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />
        <input name="idoperasi" type="hidden" value="<?php echo $_smarty_tpl->getVariable('idoperasi')->value;?>
" />

        <input name="FS_KD_LAYANAN" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['KODE_BANGSAL'];?>
" />
        <input name="FS_KD_PETUGAS_MEDIS" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_medis'];?>
" />

        <table class="table-info" width="100%">
            <tr class="headrow">
                <th colspan="2">Add Laporan Anestesi</th>
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
        </table>
  
        <table class="content" style="font-size: 11px;">
        <tr>
          
              <input type="hidden" name="TGL_OP" value="<?php echo $_smarty_tpl->getVariable('rs_op')->value['tanggalop'];?>
"> 
         
            </tr>
        <tr>
            <td>
                <table>
                    <tr><td>Pilih Paket
                        <select name="namapaketuya" class="namapaketuya select2" id="namapaketuya"  multiple id="namapaketuya" cols="50" style="width:210px">
                            <option></option> 
                            <option value="BHP SECTIO CAESAR">BHP SECTIO CAESAR</option> 
                            <option value="BHP KISTA UTERI">BHP KISTA UTERI</option> 
                            <option value="BHP HISTEREKTOMI">BHP HISTEREKTOMI</option> 
                            <option value="BHP REHECTING VAGINA">BHP REHECTING VAGINA</option> 
                            <option value="BHP UROLOGY ( TURP )">BHP UROLOGY ( TURP )</option> 
                            <option value="BHP UROLOGY ( URS / LITOTRIPSI /SACHE)">BHP UROLOGY ( URS / LITOTRIPSI /SACHE)</option> 
                            <option value="BHP UROLOGY AFF DJ STEN">BHP UROLOGY AFF DJ STEN</option> 
                            <option value="OPERASI ORTHO KECIL">OPERASI ORTHO KECIL</option> 
                            <option value="OPERASI ORTHO SEDANG">OPERASI ORTHO SEDANG</option> 
                            <option value="OPERASI ORTHO BESAR">OPERASI ORTHO BESAR</option> 
                            <option value="BHP THT ( SINUSITIS/TUMOR NASAL/POLIP NASAL )">BHP THT ( SINUSITIS/TUMOR NASAL/POLIP NASAL )</option> 
                            <option value="BHP THT (TONSILLITIS)">BHP THT (TONSILLITIS)</option> 
                            <option value="OPERASI KECIL BEDAH UMUM">OPERASI KECIL BEDAH UMUM</option> 
                            <option value="OPERASI SEDANG BEDAH UMUM">OPERASI SEDANG BEDAH UMUM</option> 
                            <option value="OPERASI BESAR BEDAH UMUM">OPERASI BESAR BEDAH UMUM</option> 
                            <option value="BHP PECO">BHP PECO</option> 
                            <option value="BHP PETEREGIUM">BHP PETEREGIUM</option> 
                            <option value="BHP TRABEKTOMI">BHP TRABEKTOMI</option> 
                          </select>
                    </td></tr>
                    <tr>
                        <td> Nama Barang </td>
                         <td> Jumlah </td>
                    </tr>
                     <tr> 
                            <td>  <select name="namaobat[]" class="namaobat select2"   multiple id="namaobat" cols="50" style="width:210px">
                                 <option></option> 
                              </select>
                            </td>
 
                            <td><input cols="20" type="text" name="dosis" class="dosis" style="width: 50px;" onkeypress="handleKeyPress(event)"></td>
                        </tr>
                   </table>


        <textarea rows="20" class="form-control resep"  cols="60" name="FS_TERAPI"> 
          <?php if ($_smarty_tpl->getVariable('alat')->value==0){?><?php }else{ ?>  <?php echo $_smarty_tpl->getVariable('alat_habis_pakai3')->value['namabarang'];?>
<?php }?>
           
        </textarea> 
            </td>
            <td></td>
        </tr>
           
 
        <tr class="submit-box">
            <td  >
                 <br>
                <input type="submit" name="save" value="Simpan" class="edit-button"/>
            </td>
        </tr>
        </table>
    </form>
</div> 
<br>
<table class="table-view" width="100%">
    <tr class="headrow">
        <th colspan="6">List Data Alat Habis Pakai OP</th>
    </tr>
    <tr>
        <th width="25%">Tanggal</th>
         <th width="60%">Nama Barang </th>
      
    </tr>
    <?php  $_smarty_tpl->tpl_vars['cppt'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('alat_habis_pakai')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cppt']->key => $_smarty_tpl->tpl_vars['cppt']->value){
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['TGL_OP'];?>
  
            <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_inap/cetak_alat_habis_pakai/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['id']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['TANGGAL'],"%d %B %Y");?>
</a> 
        </td>
       <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['namabarang'];?>
</td>
     
 
    </tr>
    <?php }} ?>
</table>
<script>
       $(".select2").select2({
            placeholder: "Pilih",
            allowClear: true
        });
 
        $('.resep').val('');
        
        function handleKeyPress(e){
                   var yhr= new XMLHttpRequest();
                var key=e.keyCode || e.which;
                 if (key==13){
                               var namaobat = $("#namaobat").val();
                               var numero = $(".numero").val();
                               var dosis = $(".dosis").val();
                             var kolomresep= document.getElementById("kolomresep");
                              var resep = $(".resep").val();
       
       $('.resep').val(resep+'\n '+namaobat+'   '+'= '+dosis+''); 
               //    alert(namaobat+numero+dosis);
                  $('#namaobat').select2('data', null);
                  $('.numero').val(null);
                  $('.dosis').val(null);
        
               //    $("#namaobat").select2({}).focus();
                  $("#namaobat").select2('open');
        
                 }
               }


               var user = $("#user").val(); 
                      
           $('#namaobat').select2('data', null);
                   $('#namaobat').select2('data', null);
                   $("#namaobat").removeAttr("disabled");
       
                   jQuery("#namaobat").html('');
                   $.ajax({
                   type: "POST", 
                           url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/alatpakai/list_nama_obat/');?>
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
                  

                   $("#namapaketuya").change(function(){
                var resep = $(".resep").val();
                       
                      if($("#namapaketuya").val() == "BHP SECTIO CAESAR"){
                            $('.resep').val(resep+'\n Handscon 7/7.5/8/8.5 =1/1/1/1 \n Betadhin = 200 ml \n Alkohol = 200 ml \n Underpath =1 pcs \n Cateter no. 16= 1 pcs \n Urine bag =1 pcs \n Spuit 10 cc= 1pcs \n Cromic 1 = 1 pcs \n Optime 2 = 2 pcs \n Optime 3/0 cuting = 1  \n Adventime 1= 1 pcs \n Lomatul =1 pcs \n Gentamicin zalp = 1 pcs \n Harum plate = 1 pcs \n Harum pen = 1pcs \n Kasa = 40 pcs \n Nacl = 2 botol \n Hypafix =30 cm ');
                            $('#namapaketuya').select2('data', null);                         
                         }
                     else  if($("#namapaketuya").val() == "BHP KISTA UTERI"){
                            $('.resep').val(resep+'\n Handscon 7/7.5/8/8.5 =1/1/1/1 \n Betadhin = 200 ml \n Alcohol = 1 pcs \n Underpath =1 pcs \n Cateter no. 16= 1 pcs \n Urine bag =1 pcs \n Spuit 10 cc= 1pcs \n Silk 1 cuting = 1pcs \n Optime 2 = 2  pcs \n Optime 3/0 cuting = 1  \n Big has = 1pcs \n Lomatul =1 pcs \n Gentamicin zalp = 1 pcs \n Harum plate = 1 pcs \n Harum pen = 1pcs \n Kasa = 40 pcs \n Nacl = 2 botol \n Hypafix= 30 cm ');
                            $('#namapaketuya').select2('data', null);                         
                         }
                     else  if($("#namapaketuya").val() == "BHP HISTEREKTOMI"){
                            $('.resep').val(resep+'\n Handscon 7/7.5/8/8.5 =1/2/1/1 \n Betadhin = 200 ml \n Underpath =1 pcs \n Cateter no. 16= 1 pcs \n Urine bag =1 pcs \n Spuit 10 cc= 1pcs \n Silk 1 cuting = 1pcs \n Optime 2 = 3 pcs \n Optime 3/0 cuting = 1  \n Kasa = 40 pcs \n Lomatul =1 pcs \n Gentamicin zalp = 1 pcs \n Harum plate = 1 pcs \n Harum pen = 1pcs \n Big has = 1 pcs \n Nacl = 3 botol \n Hypafix= 30 cm ');
                            $('#namapaketuya').select2('data', null);                         
                         }
                      else  if($("#namapaketuya").val() == "BHP REHECTING VAGINA"){
                            $('.resep').val(resep+'\n Handscon 7/7.5/8/8.5 =1/1/1/1 \n Betadhin = 200 ml \n Underpath =1 pcs \n Cateter no. 16= 1 pcs \n Urine bag =1 pcs \n Spuit 10 cc= 1pcs \n Optime 2/0 = 1 pcs \n Optime 3/0 cuting = 1  \n Kasa = 20 pcs pcs \n Gentamicin zalp = 1 pcs \n Harum plate = 1 pcs \n Harum pen = 1pcs \n Nacl = 1 botol \n Hypafix= 20 cm ');
                            $('#namapaketuya').select2('data', null);                         
                         }
                      else  if($("#namapaketuya").val() == "BHP UROLOGY ( TURP )"){
                            $('.resep').val(resep+'\n Handscon 7/7.5 = 1/1 \n Kassa = 20 pcs \n Underpads = 1pcs \n Betadin= 100 ml  \n Alcohol = 50 ml \n Cateter triway 20/22/24= 1 pcs \n Spuit 20 cc= 1 pcs \n Blood set = 1pcs \n Nacl =3 botol \n Gallon air mineral = 1galon \n Jelly = 40 gram \n Urine bag = 1 pcs \n Hypafix = 30 cm ');
                            $('#namapaketuya').select2('data', null);                         
                         }
                      else  if($("#namapaketuya").val() == "BHP UROLOGY ( URS / LITOTRIPSI /SACHE)"){
                            $('.resep').val(resep+'\n Handscon 7/7.5 = 1/1 \n Kassa = 20 pcs \n Underpads = 1 pcs \n Betadin= 100 ml  \n Alcohol = 50 ml \n Cateter no.16= 1 pcs \n Spuit 10 cc= 1 pcs \n Blood set = 1pcs \n Nacl 3 botol \n Jelly = 40 gram \n Urine bag = 1 pcs ');
                            $('#namapaketuya').select2('data', null);                         
                         }
                      else  if($("#namapaketuya").val() == "BHP UROLOGY AFF DJ STEN"){
                            $('.resep').val(resep+'\n Handscon 7/7.5 = 1/1 \n Kassa = 20 pcs \n Underpads = 1 pcs \n Betadin= 100 ml  \n Alcohol = 50 ml \n Blood set = 1pcs \n Nacl =1 botol \n Jelly = 20 gram ');
                            $('#namapaketuya').select2('data', null);                         
                         }
                      else  if($("#namapaketuya").val() == "OPERASI ORTHO KECIL"){
                            $('.resep').val(resep+'\n Betadhin = 50 cc \n Alcohol = 30 cc \n H2O2 =10 cc \n Nacl =1 botol \n Bisturi 11/24 = 1 pcs \n Handscon 7.5/8/8.5 = 1/1/1 \n Kassa = 20 pcs \n Optime 2/0 =1 pcs \n Premilent =1 pcs \n Underpads =1 pcs  \n Lomatul =1 pcs  \n Hypafix =20 cm \n Apron =3 pcs \n Gentamicin zalp =1 pcs \n Harum pen =1 pcs \n Harum plate =1 pcs ');
                            $('#namapaketuya').select2('data', null);                         
                         }
                      else  if($("#namapaketuya").val() == "OPERASI ORTHO SEDANG"){
                            $('.resep').val(resep+'\n Betadhin = 100 cc \n Alcohol = 50 cc \n H2O2 =30 cc \n Nacl =2 botol \n Bisturi 11/24 = 1 pcs \n Handscon 7.5/8/8.5 = 2/1/1 \n Kassa = 60 pcs \n Optime =1 pcs \n Premilent =1 pcs \n Underpads =1 pcs  \n Lomatul =1 pcs  \n Hypafix =40 cm \n Apron =4 pcs \n Gentamicin zalp =1 pcs \n Harum pen =1 pcs \n Harum plate =1 pcs ');
                            $('#namapaketuya').select2('data', null);                         
                         }
                      else  if($("#namapaketuya").val() == "OPERASI ORTHO BESAR"){
                            $('.resep').val(resep+'\n Betadhin = 200 cc \n Alcohol = 100 cc \n H2O2 =100 cc \n Nacl =4 botol \n Bisturi 11/24 = 1 pcs \n Handscon 7.5/8/8.5 = 2/1/1 \n Kassa = 50 pcs \n Optime =2 pcs \n Premilent =1 pcs \n Silk =1 pcs \n Underpads =1 pcs  \n Lomatul =1 pcs  \n Hypafix =50 cm \n Apron =4 pcs \n Cateter no 16 1 pcs \n Urine bag = 1 pcs \n NGT 18 =1 pcs \n Spuit 10 cc = 1 pcs \n Elastis perban = 1 pcs ');
                            $('#namapaketuya').select2('data', null);                         
                         }
                     else  if($("#namapaketuya").val() == "BHP THT ( SINUSITIS/TUMOR NASAL/POLIP NASAL )"){
                            $('.resep').val(resep+'\n Handscon 7/7.5/8 =1/1/1/ \n Betadhin = 50 ml \n Alkohol = 20 ml \n Underpath =1 pcs \n Spuit 10 cc= 1pcs \n Optime  = 1 \n Gentamicin zalp = 1 pcs \n Harum plate = 1 pcs \n Harum pen = 1pcs \n Kasa = 20 pcs \n Nacl = 1 botol \n Hypafix 10 cm \n Apron =3 pcs \n H202 =10 cc ');
                            $('#namapaketuya').select2('data', null);                         
                         }
                     else  if($("#namapaketuya").val() == "BHP THT (TONSILLITIS)"){
                            $('.resep').val(resep+'\n Handscon 7/7.5/8 =1/1/1/ \n Betadhin = 50 ml \n Alkohol = 20 ml \n Underpath =1 pcs \n Cromic no. 1=2 pcs \n Harum plate = 1 pcs \n Harum pen = 1pcs \n Kasa = 20 pcs \n Nacl = 1 botol \n Apron =2 pcs ');
                            $('#namapaketuya').select2('data', null);                         
                         }
                     else  if($("#namapaketuya").val() == "OPERASI KECIL BEDAH UMUM"){
                            $('.resep').val(resep+'\n Handscon 7/7.5/8/=1/1/1/ \n Betadhin = 100 ml \n Alkohol = 50 ml \n Underpath =1 pcs \n Apron= 2pcs \n Plain 2/0 =1 pcs \n Optime 3/0 cuting = 1  \n Lomatul =1 pcs \n Gentamicin zalp = 1 pcs \n Harum plate = 1 pcs \n Harum pen = 1pcs \n Kasa = 20 pcs \n Nacl = 1 botol \n Hypafix =20 cm ');
                            $('#namapaketuya').select2('data', null);                         
                         }
                     else  if($("#namapaketuya").val() == "OPERASI SEDANG BEDAH UMUM"){
                            $('.resep').val(resep+'\n Handscon 7/7.5/8/=1/1/1/ \n Betadhin = 100 ml \n Alkohol = 50 ml \n Underpath =1 pcs \n Apron= 3 pcs \n Plain 2/0 =1 pcs \n Optime 3/0 cuting = 1  \n Lomatul =1 pcs \n Gentamicin zalp = 1 pcs \n Harum plate = 1 pcs \n Harum pen = 1pcs \n Kasa = 30 pcs \n Nacl = 2 botol \n Hypafix =30 cm ');
                            $('#namapaketuya').select2('data', null);                         
                         }
                     else  if($("#namapaketuya").val() == "OPERASI BESAR BEDAH UMUM"){
                            $('.resep').val(resep+'\n Handscon 7/7.5/8/=1/2/1/ \n Betadhin = 200 ml \n Alkohol = 200 ml \n Underpath =1 pcs \n Apron= 4 pcs \n Plain = 1 pcs \n Optime = 2 pcs \n Silk = 1pcs \n Lomatul =1 pcs \n Gentamicin zalp = 1 pcs \n Harum plate = 1 pcs \n Harum pen = 1pcs \n Kasa = 40 pcs \n Nacl = 3 botol \n Hypafix =30 cm \n Bighas= 1 pcs \n NGT no.18/16= 1/1pcs \n Urine bag= 2 pcs ');
                            $('#namapaketuya').select2('data', null);                         
                         }
                     else  if($("#namapaketuya").val() == "BHP PECO"){
                            $('.resep').val(resep+'\n Betadhin = 50 ml \n Gentamicin Injek = 1 \n PL =1 \n Alkohol = 30 cc \n Handscon Teal no.7=2 \n Handscon Teal no.8=1 \n Kasa = 10 pcs \n Spuit 10 cc= 2 pcs \n Spuit 5 cc= 1 pcs \n Spuit 3 cc= 1 pcs \n Spuit 1 cc= 2 pcs \n Eye drop =1 \n Eye shield =1 \n Knief MVR=1 \n Knief ceratome=1 \n Miochol =1 \n Op blue=1 \n Cravit tetes mata =1 \n Troboson =1 \n Midriatil=1 \n Pantokain=1 \n OVD HPME =1 \n OVD 3.0%=1 \n Lensa tol=1 \n Hypafix =5cm \n Underpad =1 ');
                            $('#namapaketuya').select2('data', null);                         
                         }
                     else  if($("#namapaketuya").val() == "BHP PETEREGIUM"){
                            $('.resep').val(resep+'\n Betadhin = 50 ml \n Alkohol = 30 cc \n Underpath =1 pcs \n Handscon Teal no.7=2 \n Handscon Teal no.8=1 \n Hypafix =10cm \n Underpad =1 \n Spuit 10 cc= 2 pcs \n Spuit 1 cc= 1 pcs \n RL \n Gentamicin Injek = 1 \n Kasa = 10 pcs \n Lidocain=1 \n Cressent knife =1  \n Eye shield =1 pcs \n Couter bovie=1 \n Berriplast=1 ');
                            $('#namapaketuya').select2('data', null);                         
                         }
 
                    else if($("#namapaketuya").val() == "BHP TRABEKTOMI"){
                            $('.resep').val(resep+'\n Betadhin = 50 ml \n Alkohol = 30 cc \n Underpad =1 \n Hypafix =5cm \n Handscon Teal no.7=2 \n Handscon Teal no.8=1 \n Spuit 10 cc= 2 pcs \n Spuit 1 cc= 1 pcs  \n Lidocain=1 \n Pehacain=1  \n Cressent knife =1 \n MVR knife =1 \n Eye shield =1 ');
                            $('#namapaketuya').select2('data', null);                         
                         }
                        

                    });

</script>




  