<?php /* Smarty version Smarty-3.0.7, created on 2022-12-01 12:29:55
         compiled from "application/views\op/laporananes/evaluasi_rr.html" */ ?>
<?php /*%%SmartyHeaderCode:2535163883bd3c44ed2-46916345%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9def5de188dae1ca842b9bbf099ec5e8e3ad5773' => 
    array (
      0 => 'application/views\\op/laporananes/evaluasi_rr.html',
      1 => 1658219409,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2535163883bd3c44ed2-46916345',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><html>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
    <script type="text/javascript">
    var canvas, ctx, flag = false,
        prevX = 0,
        currX = 0,
        prevY = 0,
        currY = 0,
        dot_flag = false;

    var x = "black",
        y = 2;
    
    function init() {
        canvas = document.getElementById('can');
        ctx = canvas.getContext("2d");
        w = canvas.width;
        h = canvas.height;

    ctx.font="15px arial";
    ctx.fillText("EVALUASI POST OPERASI DI RUANG PULIH SADAR (RECOVERY ROOM)",130,13);
   //garis atas
   ctx.beginPath();
    ctx.moveTo(0,20);
    ctx.lineTo(745,20);
    ctx.stroke();

    ctx.font="12px arial";
    ctx.fillText("Jam Masuk RR : ",6,36);
    //garis atas
    ctx.beginPath();
    ctx.moveTo(0,40);
    ctx.lineTo(745,40);
    ctx.stroke();

    ctx.fillText("TE",6,56);

    ctx.beginPath();
    ctx.moveTo(0,65);
    ctx.lineTo(745,65);
    ctx.stroke();
    
    ctx.beginPath();
    ctx.moveTo(30,40);
    ctx.lineTo(30,486);
    ctx.stroke();

    ctx.fillText("41",6,86);
    ctx.fillText("40",6,116);
    ctx.fillText("39",6,146);
    ctx.fillText("38",6,176);
    ctx.fillText("37",6,206);
    ctx.fillText("36",6,236);
    ctx.fillText("35",6,266);
    ctx.fillText("34",6,296);
    ctx.fillText("33",6,326);
    ctx.fillText("32",6,356);
    ctx.fillText("31",6,386);
    ctx.fillText("30",6,416);
    ctx.fillText("29",6,446);
    ctx.fillText("28",6,476);
    // ctx.strokeText("ANisa",6,120);
    
    ctx.beginPath();
    ctx.moveTo(60,40);
    ctx.lineTo(60,486);
    ctx.stroke();

    ctx.fillText("R",40,56);
    ctx.fillText("36",36,86);
    ctx.fillText("32",36,116);
    ctx.fillText("28",36,146);
    ctx.fillText("24",36,176);
    ctx.fillText("20",36,206);
    ctx.fillText("16",36,236);
    ctx.fillText("12",36,266);
    ctx.fillText("8",36,296);

    ctx.beginPath();
    ctx.moveTo(90,40);
    ctx.lineTo(90,486);
    ctx.stroke();

    ctx.fillText("N",66,56);
    ctx.fillText("180",64,206);
    ctx.fillText("160",64,236);
    ctx.fillText("140",64,266);
    ctx.fillText("120",64,296);
    ctx.fillText("100",64,326);
    ctx.fillText("80",64,356);
    ctx.fillText("60",64,386);
    ctx.fillText("40",64,416);

    ctx.beginPath();
    ctx.moveTo(120,40);
    ctx.lineTo(120,486);
    ctx.stroke();

    ctx.fillText("T",94,56);
    ctx.fillText("220",94,86);
    ctx.fillText("200",94,116);
    ctx.fillText("180",94,146);
    ctx.fillText("160",94,176);
    ctx.fillText("140",94,206);
    ctx.fillText("120",94,236);
    ctx.fillText("100",94,266);
    ctx.fillText("80",94,296);
    ctx.fillText("60",94,326);
    ctx.fillText("40",94,356);
    ctx.fillText("20",94,386);
    ctx.fillText("0",94,416);


  
    for(x=137; x<=732; x+=17){
        ctx.beginPath();
        ctx.moveTo(x,65);
        ctx.lineTo(x,486);
        ctx.stroke();
    }

    for(x=80; x<=485; x+=15){
        ctx.beginPath();
        ctx.moveTo(120,x);
        ctx.lineTo(732,x);
        ctx.stroke();
    }


    for(x=95; x<=485; x+=30){
        ctx.beginPath();
        ctx.moveTo(0,x);
        ctx.lineTo(732,x);
        ctx.stroke();
    }

        ctx.beginPath();
        ctx.moveTo(324,40);
        ctx.lineTo(324,486);
        ctx.stroke();


        ctx.beginPath();
        ctx.moveTo(528,40);
        ctx.lineTo(528,486);
        ctx.stroke();

        ctx.beginPath();
        ctx.moveTo(732,40);
        ctx.lineTo(732,486);
        ctx.stroke();
  
    
        canvas.addEventListener("mousemove", function (e) {
            findxy('move', e)
        }, false);
        canvas.addEventListener("mousedown", function (e) {
            findxy('down', e)
        }, false);
        canvas.addEventListener("mouseup", function (e) {
            findxy('up', e)
        }, false);
        canvas.addEventListener("mouseout", function (e) {
            findxy('out', e)
        }, false);
    }
    
    function color(obj) {
        switch (obj.id) {
            case "green":
                x = "green";
                break;
            case "blue":
                x = "blue";
                break;
            case "red":
                x = "red";
                break;
            case "yellow":
                x = "yellow";
                break;
            case "orange":
                x = "orange";
                break;
            case "black":
                x = "black";
                break;
            case "white":
                x = "white";
                break;
        }
        if (x == "white") y = 3;
        else y = 2;
    
    }
    
    function draw() {
        ctx.beginPath();
        ctx.moveTo(prevX, prevY);
        ctx.lineTo(currX, currY);
        ctx.strokeStyle = x;
        ctx.lineWidth = y;
        ctx.stroke();
        ctx.closePath();
    }
    
    function erase() {
        var m = confirm("Want to clear");
        if (m) {
            ctx.clearRect(0, 0, w, h);
            document.getElementById("canvasimg").style.display = "none";
        }
    }
    
  
    
    function findxy(res, e) {
        if (res == 'down') {
            prevX = currX;
            prevY = currY;
            currX = e.clientX - canvas.offsetLeft;
            currY = e.clientY - canvas.offsetTop;
    
            flag = true;
            dot_flag = true;
            if (dot_flag) {
                ctx.beginPath();
                ctx.fillStyle = x;
                ctx.fillRect(currX, currY, 2, 2);
                ctx.closePath();
                dot_flag = false;
            }
        }
        if (res == 'up' || res == "out") {
            flag = false;
        }
        if (res == 'move') {
            if (flag) {
                prevX = currX;
                prevY = currY;
                currX = e.clientX - canvas.offsetLeft;
                currY = e.clientY - canvas.offsetTop;
                draw();
            }
        }
    }
    </script>
    <body onload="init()">

        
 
            <input name="FS_KD_REG" id="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />  
             <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />
            <input name="idoperasi" id="idoperasi" type="hidden" value="<?php echo $_smarty_tpl->getVariable('idoperasi')->value;?>
" />
            
            <table class="table-info" style="float:right ; width: 370px">
                <tr class="headrow">
                    <th colspan="2"> </th>
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
                <tr><td><br></td></tr>
                <tr><td colspan="2">CATATAN PERAWAT 
                    <button class="btn btn-primary btn-sm fa fa-pencil" data-toggle="modal" data-target="#tambahanakModal"> Add  </button>
<!-- 
                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('op/jadwal/edit/').($_smarty_tpl->getVariable('data')->value['id']));?>
" class="button-edit">Add</a> -->
                </td></tr>
                
                <tr>
                    <td colspan="2">
                        <table >
                            <tr>
                                <td style="width:80px ;">Tanggal</td>
                                <td style="width:50px ;">Waktu</td>
                                <td>Catatan</td>
                            </tr>
                            <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('catatan_rr')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['tgl_rr'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['jam_rr'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['catatan_rr'];?>

                                    <!-- <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('op/jadwal/edit/').($_smarty_tpl->getVariable('data')->value['id']));?>
" class="button-edit">Hapus</a> -->
                                </td>
                            </tr>
                            <?php }} ?>
                           
                            
                        </table>
                
                    </td>
                </tr>

            </table>

      
        
     

        <div id="generateImg" >
            <input type="hidden" name="img_value" id="img_value" value="" />
        <canvas id="can"  width="732" height="486" style="position: ;left:10%;border:2px solid; " ></canvas>
         <img id="canvasimg" style="position:absolute;top:10%;left:52%;" style="display:none;">
  <br>
  <table>
    <tr>
     
<td style="width:50px ;"> <div style="position:;top:15%;left:45%;width:20px;height:20px;background:green;" id="green" onclick="color(this)">   </div>nadi </td>
<td style="width:50px ;"><div style="position:;top:15%;left:46%;width:20px;height:20px;background:blue;" id="blue" onclick="color(this)"> </div>N2O </td>
<td style="width:50px ;"><div style="position:;top:15%;left:47%;width:20px;height:20px;background:red;" id="red" onclick="color(this)">   </div> TD </td>
<td style="width:50px ;"><div style="position:;top:17%;left:45%;width:20px;height:20px;background:yellow;" id="yellow" onclick="color(this)">  </div> S </td>
<!-- <div style="position:;top:17%;left:46%;width:10px;height:10px;background:orange;" id="orange" onclick="color(this)"></div> -->
<td style="width:50px ;">  <div style="position:;top:17%;left:47%;width:20px;height:20px;background:white;" id="white" onclick="color(this)"> </div> O2 </td>
<td style="width:50px ;"> <div style="position:;top:17%;left:47%;width:20px;height:20px;background:black;" id="black" onclick="color(this)"> </div> Mulai </td>
      <td style="padding-left: 100px;">  <input type="button" value="save" id="btn" size="30" onclick="save()" style="top:55%;left:10%;">
        <input type="button" value="clear" id="clr" size="23"  onClick="window.location.reload()"  style="top:55%;left:15%;">
   </td>     
    </tr>
</table>
       
   
    </div>
   
 <br>
 <br>
 
 <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/laporananes/simpan_skor');?>
" method="post" onkeypress="return event.keyCode != 13">
    <input name="FS_KD_REG" id="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />  
        <input name="TGL_LAHIR" id="TGL_LAHIR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['TGL_LAHIR'];?>
" /> 
    <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />
    <input name="idoperasi" type="hidden" value="<?php echo $_smarty_tpl->getVariable('idoperasi')->value;?>
" />
  
    <table style="background-color: white;">
        <tr>
            <td colspan="2"> <center><br>KEADAAN DI RUANG PULIH SADAR </center></td>
        </tr>
          <tr>
              <td style="padding-right: 50px;">
                <b> Aldrete Score </b> (Pindah ruangan bila skore >8)
                <table class="table-input" style="text-align: justify;">
                  <tr>
                      <td>  Aktivitas</td>
                      <td width="120px">
                         <!-- <select name="N_AKTIVITAS_ALDRETE">
                             <option></option>
                             <option value="2">Gerak 4 Ekstremitas</option>
                             <option value="1">Gerak 2 Ekstremitas</option>
                             <option value="0">Tidak Ada Gerakan</option>
                         </select> -->
                         </td></tr>
                         <tr>
                         <td> <table>

                              <tr>
                                  <td>
                                    Gerak 4 Ekstremitas <br>
                                    Gerak 2 Ekstremitas <br>
                                    Tidak Ada Gerakan 
                                  </td>
                                  <td>
                                    <input type="radio" class="akt_al" <?php if ($_smarty_tpl->getVariable('skor_rr')->value['N_AKTIVITAS_ALDRETE']=='2'){?> checked <?php }?> name="N_AKTIVITAS_ALDRETE" value="2">2<br>
                                    <input type="radio" class="akt_al"  <?php if ($_smarty_tpl->getVariable('skor_rr')->value['N_AKTIVITAS_ALDRETE']=='1'){?> checked <?php }?>  name="N_AKTIVITAS_ALDRETE" value="1">1<br>
                                    <input type="radio" class="akt_al"  <?php if ($_smarty_tpl->getVariable('skor_rr')->value['N_AKTIVITAS_ALDRETE']=='0'){?> checked <?php }?>  name="N_AKTIVITAS_ALDRETE" value="0">0
                                    </td>
                              </tr>
                          </table>
                      </td>
                  </tr>
                  <tr>
                      <td>  Respirasi</td>
                      <td width="120px">
                    </td></tr>
                    <tr>
                    <td> <table>

                         <tr>
                             <td>
                               Nafas dalam & Batuk <br>
                               Sesak / Nafas Terbatas 
                              </td>
                             <td>
                                <input type="radio" class="resp_al" <?php if ($_smarty_tpl->getVariable('skor_rr')->value['N_RESPIRASI_ALDRETE']=='2'){?> checked <?php }?> name="N_RESPIRASI_ALDRETE" value="2">2<br>
                               <input type="radio"  class="resp_al" <?php if ($_smarty_tpl->getVariable('skor_rr')->value['N_RESPIRASI_ALDRETE']=='1'){?> checked <?php }?> name="N_RESPIRASI_ALDRETE" value="2">1
                               </td>
                         </tr>
                     </table>
                         <!-- <select name="N_RESPIRASI_ALDRETE">
                          <option></option>
                             <option value="2"> Nafas dalam & Batuk</option>
                             <option value="1">Sesak / Nafas Terbatas</option>
                          </select> -->
                      </td>
                  </tr>
                  <tr>
                      <td>  Sikulasi</td>
                      <td width="120px">
                    </td></tr>
                    <tr>
                    <td> <table>

                         <tr>
                             <td>
                                Tekanan Darah >= 20% preop <br>
                                Tekanan Darah 20-50% preop <br>
                                Tekanan Darah 50% preop
                              </td>
                             <td>
                                <input type="radio"  class="sir_al" <?php if ($_smarty_tpl->getVariable('skor_rr')->value['N_SIRKULASI_ALDRETE']=='2'){?> checked <?php }?> name="N_SIRKULASI_ALDRETE" value="2">2<br>
                                <input type="radio"  class="sir_al" <?php if ($_smarty_tpl->getVariable('skor_rr')->value['N_SIRKULASI_ALDRETE']=='1'){?> checked <?php }?> name="N_SIRKULASI_ALDRETE" value="1">1<br>
                               <input type="radio"  class="sir_al" <?php if ($_smarty_tpl->getVariable('skor_rr')->value['N_SIRKULASI_ALDRETE']=='0'){?> checked <?php }?> name="N_SIRKULASI_ALDRETE" value="0">0
                               </td>
                         </tr>
                     </table>
                         <!-- <select name="N_SIRKULASI_ALDRETE">
                          <option></option>
                             <option value="2"> Tekanan Darah >= 20% preop</option>
                             <option value="1"> Tekanan Darah 20-50% preop</option>
                             <option value="0"> Tekanan Darah 50% preop</option>
                          </select> -->
                      </td>
                  </tr>
                  <tr>
                      <td>  Kesadaran</td>
                      <td width="120px">
                    </td></tr>
                    <tr>
                    <td> <table>

                         <tr>
                             <td> 
                                Sadar bila dipanggil <br>
                                Tidak respon
                              </td>
                             <td> 
                                <input type="radio"  class="sadar_al" <?php if ($_smarty_tpl->getVariable('skor_rr')->value['N_KESADARAN_ALDRETE']=='1'){?> checked <?php }?> name="N_KESADARAN_ALDRETE" value="1">1<br>
                               <input type="radio" class="sadar_al" <?php if ($_smarty_tpl->getVariable('skor_rr')->value['N_KESADARAN_ALDRETE']=='0'){?> checked <?php }?> name="N_KESADARAN_ALDRETE" value="0">0
                               </td>
                         </tr>
                     </table>
                         <!-- <select name="N_KESADARAN_ALDRETE">
                          <option></option>
                             <option value="1"> Sadar bila dipanggil</option>
                             <option value="0">Tidak respon</option>
                           </select> -->
                      </td>
                  </tr>
                  <tr>
                      <td>  Warna Kulit</td>
                      <td width="120px">
                    </td></tr>
                    <tr>
                    <td> <table>

                         <tr>
                             <td>
                                Merah Muda<br>
                                Pucat <br>
                                Sianosis
                              </td>
                             <td>
                                <input type="radio" class="kulit_al" <?php if ($_smarty_tpl->getVariable('skor_rr')->value['N_WARNA_KULIT_ALDRETE']=='2'){?> checked <?php }?> name="N_WARNA_KULIT_ALDRETE" value="2">2<br>
                                <input type="radio" class="kulit_al" <?php if ($_smarty_tpl->getVariable('skor_rr')->value['N_WARNA_KULIT_ALDRETE']=='1'){?> checked <?php }?> name="N_WARNA_KULIT_ALDRETE" value="1">1<br>
                               <input type="radio" class="kulit_al" <?php if ($_smarty_tpl->getVariable('skor_rr')->value['N_WARNA_KULIT_ALDRETE']=='0'){?> checked <?php }?> name="N_WARNA_KULIT_ALDRETE" value="0">0
                               </td>
                         </tr>
                     </table>
                         <!-- <select name="N_WARNA_KULIT_ALDRETE">
                          <option></option>
                             <option value="2"> Merah muda</option>
                             <option value="1">Pucat</option>
                             <option value="0">Sianosis</option>
                           </select> -->
                      </td>
                  </tr>
                  </table>
              </td>
              <td style="padding-right: 50px;">
               <br><br><b> Steward Score </b> (Pindah ruangan bila skore >5)
                <table class="table-input" style="text-align: justify;">
                  <tr>
                      <td>  Aktivitas</td>
                      <td width="120px">
                    </td></tr>
                    <tr>
                    <td> <table>

                         <tr>
                             <td>
                                Gerak bertujuan<br>
                                Gerak tak bertujuan  <br>
                                Tidak ada gerakan
                              </td>
                             <td>
                                <input type="radio" class="akt_ste" <?php if ($_smarty_tpl->getVariable('skor_rr')->value['N_AKTIVITAS_STEWARD']=='2'){?> checked <?php }?> name="N_AKTIVITAS_STEWARD" value="2">2<br>
                                <input type="radio" class="akt_ste" <?php if ($_smarty_tpl->getVariable('skor_rr')->value['N_AKTIVITAS_STEWARD']=='1'){?> checked <?php }?> name="N_AKTIVITAS_STEWARD" value="1">1<br>
                               <input type="radio" class="akt_ste" <?php if ($_smarty_tpl->getVariable('skor_rr')->value['N_AKTIVITAS_STEWARD']=='0'){?> checked <?php }?> name="N_AKTIVITAS_STEWARD" value="0">0
                               </td>
                         </tr>
                     </table>
                         <!-- <select name="N_AKTIVITAS_STEWARD">
                             <option></option>
                             <option value="2">Gerak bertujuan</option>
                             <option value="1"> Gerak tak bertujuan s</option>
                             <option value="0">Tidak Ada Gerakan</option>
                         </select> -->
                      </td>
                    </tr>
                    <tr>
                      <td>  Respirasi</td>
                      <td width="120px">
                    </td></tr>
                    <tr>
                    <td> <table>

                         <tr>
                             <td>
                               Menangis/Batuk<br>
                               Pertahankan jalan nafas<br>
                               Apnoe
                              </td>
                             <td> 
                                <input type="radio" class="resp_ste" <?php if ($_smarty_tpl->getVariable('skor_rr')->value['N_RESPIRASI_STEWARD']=='2'){?> checked <?php }?> name="N_RESPIRASI_STEWARD" value="2">2<br>
                                <input type="radio" class="resp_ste" <?php if ($_smarty_tpl->getVariable('skor_rr')->value['N_RESPIRASI_STEWARD']=='1'){?> checked <?php }?> name="N_RESPIRASI_STEWARD" value="1">1<br>
                               <input type="radio" class="resp_ste" <?php if ($_smarty_tpl->getVariable('skor_rr')->value['N_RESPIRASI_STEWARD']=='0'){?> checked <?php }?> name="N_RESPIRASI_STEWARD" value="0">0
                               </td>
                         </tr>
                     </table>
                         <!-- <select name="N_RESPIRASI_STEWARD">
                          <option></option>
                             <option value="2"> Nafas dalam & Batuk</option>
                             <option value="1">Sesak / Nafas Terbatas</option>
                          </select> -->
                      </td>
                    </tr>
                    <tr>
                      <td>  Kesadaran</td>
                      <td width="120px">
                    </td></tr>
                    <tr>
                    <td> <table>

                         <tr>
                             <td>
                               Menangis <br>
                               Bereaksi terhadap rangsangan <br>
                               Tidak ada respon
                              </td>
                             <td>
                                <input type="radio" class="sadar_ste" <?php if ($_smarty_tpl->getVariable('skor_rr')->value['N_KESADARAN_STEWARD']=='2'){?> checked <?php }?> name="N_KESADARAN_STEWARD" value="2">2<br>
                                <input type="radio" class="sadar_ste" <?php if ($_smarty_tpl->getVariable('skor_rr')->value['N_KESADARAN_STEWARD']=='1'){?> checked <?php }?> name="N_KESADARAN_STEWARD" value="1">1<br>
                                <input type="radio" class="sadar_ste" <?php if ($_smarty_tpl->getVariable('skor_rr')->value['N_KESADARAN_STEWARD']=='0'){?> checked <?php }?>  name="N_KESADARAN_STEWARD" value="0">0 
                               </td>
                         </tr>
                     </table>
                         <!-- <select name="N_KESADARAN_STEWARD">
                          <option></option>
                             <option value="1"> Sadar bila dipanggil</option>
                             <option value="0">Tidak respon</option>
                           </select> -->
                      </td>
                  
                  </tr>
                  </table>
            
                  
          <br><b> Bromage Score </b> (Pindah ruangan bila skore <=2)
          <table class="table-input" style="text-align: justify;">
            <tr>
                <td>  Aktivitas</td>
                <td width="120px">
                </td></tr>
                <tr>
                <td> <table>

                     <tr>
                         <td>
                            Gerakan penuh dari tungkai<br>
                            Tidak mampu akstensi tungkai<br>
                            Tidak mampu akstensi lutut <br>
                            Tidak mampu fleksi pergelangan kaki 
                          </td>
                         <td>
                           <input type="radio" class="akt_bro" <?php if ($_smarty_tpl->getVariable('skor_rr')->value['N_AKTIVITAS_BROMAGE']=='0'){?> checked <?php }?> name="N_AKTIVITAS_BROMAGE" value="0">0<br>
                           <input type="radio" class="akt_bro" <?php if ($_smarty_tpl->getVariable('skor_rr')->value['N_AKTIVITAS_BROMAGE']=='1'){?> checked <?php }?> name="N_AKTIVITAS_BROMAGE" value="1">1<br>
                           <input type="radio" class="akt_bro" <?php if ($_smarty_tpl->getVariable('skor_rr')->value['N_AKTIVITAS_BROMAGE']=='2'){?> checked <?php }?> name="N_AKTIVITAS_BROMAGE" value="2">2<br>
                           <input type="radio" class="akt_bro" <?php if ($_smarty_tpl->getVariable('skor_rr')->value['N_AKTIVITAS_BROMAGE']=='3'){?> checked <?php }?> name="N_AKTIVITAS_BROMAGE" value="3">3
                           </td>
                     </tr>
                 </table>
                   <!-- <select name="N_AKTIVITAS_STEWARD">
                       <option></option>
                       <option value="0">Gerakan penuh dari tungkai</option>
                       <option value="1">Tidak mampu akstensi tungkai</option>
                       <option value="2">Tidak mampu akstensi lutut</option>
                       <option value="3">Tidak mampu fleksi pergelangan kaki  </option>
                   </select> -->
                </td>
                </tr>
          </table>
          <br>
          <br>
              </td>
          </tr>
      </table>
          <br>
              </td>
          </tr>
      </table>
      <input type="submit" name="save" value="Simpan" class="edit-button"/>
    
     </form>
     

  





<!-- tambah modal      -->
<div class="modal fade" id="tambahanakModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
               <div class="modal-header" >
            <button type="button" class="close"   data-dismiss="modal">&times;</button>
            <center><font ><h3>Tambah Data Catatan Perawat</h3></font> </center>
                 
            </div>
          <div class="modal-body" style="padding:40px 50px;" width>
            <div class="login-block"> 
                <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/laporananes/simpan_catatan');?>
" method="post" onkeypress="return event.keyCode != 13">
                     <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />
                    <input name="idoperasi" type="hidden" value="<?php echo $_smarty_tpl->getVariable('idoperasi')->value;?>
" />
                     <input name="FS_KD_REG" id="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />  

                
                     <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                         <input type="date" name="tgl_rr" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Jam</label>
                        <div class="col-sm-9">
                         <input type="time" name="jam_rr" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Catatan</label>
                        <div class="col-sm-9">
                        <textarea name="catatan_rr" rows="3" cols="50" ></textarea>
                        </div>
                      </div>
                
                      <button type="submit" class="btn btn-primary btn-sm">
                            <i class="ti ti-save"></i> Simpan
                        </button>
                    <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Batal</button>
               </form>
            </div>
          </div>
      </div>
    </div>
  </div>
<!-- end tambah modal-->
 
    </body>
    </html>
    <script>

function save() {
        // document.getElementById("canvasimg").style.border = "2px solid";
        var dataURL = canvas.toDataURL();
        // document.getElementById("canvasimg").src = dataURL;
        // document.getElementById("canvasimg").style.display = "inline";
       var idoperasi=$('#idoperasi').val();
       var FS_KD_REG=$('#FS_KD_REG').val();
     

             // url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/jadwal/save_img');?>
",

             html2canvas($("#can"), {
         	onrendered: function(canvas) {
         	var imgsrc = canvas.toDataURL("image/png");
 
             
         	// console.log(imgsrc);
         	// $("#newimg").attr('src',imgsrc);
         	// $("#img").show();
         var dataURL = canvas.toDataURL();
            $.ajax({
           type: "POST",
           url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/jadwal/save_rr');?>
",
           data: { 
              imgBase64: dataURL,
              idoperasi: idoperasi,
              FS_KD_REG: FS_KD_REG
           }
           
         }).done(function(o) { 
        //    alert(FS_KD_REG);
           
              window.location.href = "http://192.168.2.253/emr/index.php/op/jadwal/detail/"+idoperasi+"/"+FS_KD_REG;

           // If you want the file to be visible in the browser 
           // - please modify the callback in javascript. All you
           // need is to return the url to the file, you just saved 
           // and than put the image in your browser.
         });
         }
         });

    }



    

    $(function(){
      $(":radio.akt_al").click(function(){
       var akt_al=$(this).val();
       var idoperasi=$('#idoperasi').val();
     //    alert(akt_al);
            $.ajax({
                type: "POST",
                url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/laporananes/update_skor_akt_al');?>
",
                data: { 
                    akt_al: akt_al,
                    idoperasi: idoperasi
                }
                
                }).done(function(o) {  });

      });
    });

    $(function(){
      $(":radio.resp_al").click(function(){
       var nilai=$(this).val();
       var idoperasi=$('#idoperasi').val();
     //    alert(akt_al);
            $.ajax({
                type: "POST",
                url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/laporananes/update_skor_resp_al');?>
",
                data: { 
                    nilai: nilai,
                    idoperasi: idoperasi
                }
                
                }).done(function(o) {  });

      });
    });

    $(function(){
      $(":radio.sir_al").click(function(){
       var nilai=$(this).val();
       var idoperasi=$('#idoperasi').val();
     //    alert(akt_al);
            $.ajax({
                type: "POST",
                url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/laporananes/update_skor_sir_al');?>
",
                data: { 
                    nilai: nilai,
                    idoperasi: idoperasi
                }
                
                }).done(function(o) {  });

      });
    });

    $(function(){
      $(":radio.sadar_al").click(function(){
       var nilai=$(this).val();
       var idoperasi=$('#idoperasi').val();
     //    alert(akt_al);
            $.ajax({
                type: "POST",
                url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/laporananes/update_skor_sadar_al');?>
",
                data: { 
                    nilai: nilai,
                    idoperasi: idoperasi
                }
                
                }).done(function(o) {  });

      });
    });


    $(function(){
      $(":radio.kulit_al").click(function(){
       var nilai=$(this).val();
       var idoperasi=$('#idoperasi').val();
     //    alert(akt_al);
            $.ajax({
                type: "POST",
                url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/laporananes/update_skor_kulit_al');?>
",
                data: { 
                    nilai: nilai,
                    idoperasi: idoperasi
                }
                
                }).done(function(o) {  });

      });
    });


    $(function(){
      $(":radio.akt_ste").click(function(){
       var nilai=$(this).val();
       var idoperasi=$('#idoperasi').val();
     //    alert(akt_al);
            $.ajax({
                type: "POST",
                url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/laporananes/update_skor_akt_ste');?>
",
                data: { 
                    nilai: nilai,
                    idoperasi: idoperasi
                }
                
                }).done(function(o) {  });

      });
    });

    $(function(){
      $(":radio.resp_ste").click(function(){
       var nilai=$(this).val();
       var idoperasi=$('#idoperasi').val();
     //    alert(akt_al);
            $.ajax({
                type: "POST",
                url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/laporananes/update_skor_resp_ste');?>
",
                data: { 
                    nilai: nilai,
                    idoperasi: idoperasi
                }
                
                }).done(function(o) {  });

      });
    });


    $(function(){
      $(":radio.sadar_ste").click(function(){
       var nilai=$(this).val();
       var idoperasi=$('#idoperasi').val();
     //    alert(akt_al);
            $.ajax({
                type: "POST",
                url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/laporananes/update_skor_sadar_ste');?>
",
                data: { 
                    nilai: nilai,
                    idoperasi: idoperasi
                }
                
                }).done(function(o) {  });

      });
    });

    $(function(){
      $(":radio.akt_bro").click(function(){
       var nilai=$(this).val();
       var idoperasi=$('#idoperasi').val();
     //    alert(akt_al);
            $.ajax({
                type: "POST",
                url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/laporananes/update_skor_akt_bro');?>
",
                data: { 
                    nilai: nilai,
                    idoperasi: idoperasi
                }
                
                }).done(function(o) {  });

      });
    });
    </script>