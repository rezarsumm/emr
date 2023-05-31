<?php /* Smarty version Smarty-3.0.7, created on 2022-03-07 09:48:55
         compiled from "application/views\medis/rawat_inap/addr.html" */ ?>
<?php /*%%SmartyHeaderCode:1885962257297b76652-27100658%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c818787990e388e55f40cd5f958e4d7ad183df9d' => 
    array (
      0 => 'application/views\\medis/rawat_inap/addr.html',
      1 => 1646619827,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1885962257297b76652-27100658',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><!-- <script>
    tinymce.init({
        selector: "textarea",
        theme: "modern",
        plugins: [
        ],
        external_plugins: {
//"moxiemanager": "/moxiemanager-php/plugin.js"
        },
        content_css: "css/development.css",
        add_unload_trigger: false,
        toolbar: "bold italic | alignleft aligncenter alignright alignjustify",
        image_advtab: true,
        setup: function (ed) {
            /*ed.on(
             'Init PreInit PostRender PreProcess PostProcess BeforeExecCommand ExecCommand Activate Deactivate ' +
             'NodeChange SetAttrib Load Save BeforeSetContent SetContent BeforeGetContent GetContent Remove Show Hide' +
             'Change Undo Redo AddUndo BeforeAddUndo', function(e) {
             console.log(e.type, e);
             });*/
        },
        spellchecker_callback: function (method, data, success) {
            if (method == "spellcheck") {
                var words = data.match(this.getWordCharPattern());
                var suggestions = {};
                for (var i = 0; i < words.length; i++) {
                    suggestions[words[i]] = ["First", "second"];
                }

                success();
            }

            if (method == "addToDictionary") {
                success();
            }
        }
    });</script> -->
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
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_inap/add_process');?>
" method="post" onkeypress="return event.keyCode != 13"> 
        <input type="hidden" name="FS_KD_REG" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <input type="hidden" name="FS_KD_MEDIS" value="<?php echo $_smarty_tpl->getVariable('FS_KD_MEDIS')->value;?>
" />
        <input type="hidden" name="FS_KD_LAYANAN" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['KODE_BANGSAL'];?>
" />
        <input type="hidden" name="FS_MR" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />

        <table class="table-info" width="100%">
            <tr class="headrow">
                <th colspan="2">Add Asesmen Awal Rawat Inap</th>
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

        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="2">Anamnesa</th>
                <th colspan="2">Pemeriksaan Fisik</th>
            </tr>
            <tr> 
                <td colspan="2">
                    <textarea cols="50" rows="3"  name="FS_ANAMNESA"><?php echo $_smarty_tpl->getVariable('medis')->value['FS_ANAMNESA'];?>
</textarea>

                </td>
                <td colspan="2">
                    <textarea cols="50" rows="4" name="FS_CATATAN_FISIK"><?php echo $_smarty_tpl->getVariable('medis')->value['FS_CATATAN_FISIK'];?>
</textarea>

                </td>
            </tr>
            <tr class="headrow">
                <th colspan="2">Daftar Masalah</th>
                <th colspan="2">Diagnosa</th>
            </tr>
            <tr>
                <td colspan="2">
                      <textarea cols="50" rows="3"  name="FS_DAFTAR_MASALAH">
                       <?php echo $_smarty_tpl->getVariable('medis')->value['FS_DAFTAR_MASALAH'];?>

                    </textarea>

                </td>
                <td colspan="2">
                    <textarea cols="50" rows="3" name="FS_DIAGNOSA"><?php echo $_smarty_tpl->getVariable('medis')->value['FS_DIAGNOSA'];?>
</textarea>

                </td>
            </tr>
            <tr class="headrow">
                <th colspan="2">Hasil Pemeriksaan Penunjang</th>
                <th colspan="2">Rencana Tindakan</th>
            </tr>
            <tr>
                <td colspan="2">
                 <textarea cols="50" rows="3" name="FS_HASIL_PEMERIKSAAN_PENUNJANG"></textarea>
                </td>
                <td colspan="2">
                    <textarea cols="50" rows="3" name="FS_TINDAKAN"></textarea>

                </td>
            </tr>
            <tr class="headrow">
                <th colspan="2">Rencana Pemeriksaan Penunjang Lab</th>
                <th colspan="2">Rencana Pemeriksaan Penunjang Radiologi</th>
            </tr>
            <tr>
                <td colspan="2">  
                     <select name="FS_PLANNING_LAB[]" multiple id="rlab" style="width:350px">
                        <option></option>
                    </select>
                  <!--   <textarea cols="50" rows="3" name="FS_PLANNING_LAB"></textarea> -->
                </td> 
                <td colspan="2">
                      <select name="FS_PLANNING_RAD[]" multiple id="rrad" style="width:350px">
                        <option></option>
                    </select>
                   <!--  <textarea cols="50" rows="3" name="FS_PLANNING_RAD"></textarea> -->

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
                            <td>  <select name="namaobat[]" class="namaobat select2"   multiple id="namaobat" cols="50" style="width:210px">
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
                                    <td>  <select name="namaobat1[]" class="namaobat1 select2"   multiple id="namaobat1" cols="50" style="width:170px">
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
                   <!--  <textarea   class="form-control namaa"   value="<<?php ?>?= set_value('ket');?<?php ?>>" rows="7"  cols="50" name="FS_TERAPI"  onkeypress="handleKeyPress(event)" data-minwords="6" data-required="true"  ><?php echo $_smarty_tpl->getVariable('medis')->value['FS_TERAPI'];?>
</textarea> -->

                 </td>
                   <td colspan="2">
                    <?php if ($_smarty_tpl->getVariable('com_user')->value['role_nm']=='Perawat Poli'){?>
                     
                 <textarea rows="5" cols="50" name="FS_PESAN">
              
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

 <script>
 


      



</script> 


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
