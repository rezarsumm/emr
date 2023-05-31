<?php /* Smarty version Smarty-3.0.7, created on 2022-07-26 10:31:38
         compiled from "application/views\op/laporananes/progress.html" */ ?>
<?php /*%%SmartyHeaderCode:1834162df601a8564f9-33053231%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06140e9c3747eb2ac931ef75db08d0f7d9de1737' => 
    array (
      0 => 'application/views\\op/laporananes/progress.html',
      1 => 1658714977,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1834162df601a8564f9-33053231',
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

        ctx.font="10px arial";
    ctx.fillText("PKL",0,10);
    ctx.fillText("O2",10,40);
    ctx.fillText("N2O",10,70);
    ctx.fillText("S",10,100);
     ctx.fillText("E",10,130);
    ctx.fillText("240",10,160);
    ctx.fillText("220",10,190);
    ctx.fillText("200",10,220);
    ctx.fillText("180",10,250);
    ctx.fillText("160",10,280);
    ctx.fillText("140",10,310);
    ctx.fillText("120",10,340);
    ctx.fillText("100",10,370);
    ctx.fillText("80",10,400);
    ctx.fillText("60",10,430);
    ctx.fillText("40",10,460);
    ctx.fillText("20",10,490);
    ctx.fillText("0",10,520);
    ctx.fillText("C",10,540);
    ctx.font="14 px Arial";
    // ctx.strokeText("ANisa",10,120);


   

  
    var co ="755";
    var jam1="10.00";
   
//garis atas
    ctx.beginPath();
    ctx.moveTo(0,20);
    ctx.lineTo(co,20);
    ctx.stroke();
//garis o2
ctx.beginPath();
    ctx.moveTo(35,35);
    ctx.lineTo(co,35);
    ctx.stroke();
 ctx.beginPath();
    ctx.moveTo(35,50);
    ctx.lineTo(co,50);
    ctx.stroke();
//garis n20
ctx.beginPath();
    ctx.moveTo(35,65);
    ctx.lineTo(co,65);
    ctx.stroke();
ctx.beginPath();
    ctx.moveTo(35,80);
    ctx.lineTo(co,80);
    ctx.stroke();
    //garis S
ctx.beginPath();
    ctx.moveTo(35,95);
    ctx.lineTo(co,95);
    ctx.stroke();
ctx.beginPath();
    ctx.moveTo(35,110);
    ctx.lineTo(co,110);
    ctx.stroke(); 
 // garis E
ctx.beginPath();
    ctx.moveTo(35,125);
    ctx.lineTo(co,125);
    ctx.stroke();      
ctx.beginPath();
    ctx.moveTo(35,140);
    ctx.lineTo(co,140);
    ctx.stroke();


    ctx.beginPath();
    ctx.moveTo(35,530);
    ctx.lineTo(co,530);
    ctx.stroke();

    for(x=155; x<=755; x+=15){
        ctx.beginPath();
        ctx.moveTo(35,x);
        ctx.lineTo(co,x);
        ctx.stroke();
    }

    ctx.beginPath();
        ctx.moveTo(35,560);
        ctx.lineTo(co,560);
        ctx.stroke();

 
//garis kebawah
      for(x=35; x<=755; x+=15){
        ctx.beginPath();
        ctx.moveTo(x,20);
        ctx.lineTo(x,560);
        ctx.stroke();
    }

//penebal gari 15 menit
//1
    ctx.beginPath();
    ctx.moveTo(35,20);
    ctx.lineTo(35,560);
    ctx.stroke();

//2
    ctx.beginPath();
    ctx.moveTo(80,20);
    ctx.lineTo(80,560);
    ctx.stroke();
//3
    ctx.beginPath();
    ctx.moveTo(125,20);
    ctx.lineTo(125,560);
    ctx.stroke();
//4
    ctx.beginPath();
    ctx.moveTo(170,20);
    ctx.lineTo(170,560);
    ctx.stroke();
//5
    ctx.beginPath();
    ctx.moveTo(215,20);
    ctx.lineTo(215,560);
    ctx.stroke();
//6
    ctx.beginPath();
    ctx.moveTo(260,20);
    ctx.lineTo(260,560);
    ctx.stroke();
//7
    ctx.beginPath();
    ctx.moveTo(305,20);
    ctx.lineTo(305,560);
    ctx.stroke();
 //8
    ctx.beginPath();
    ctx.moveTo(350,20);
    ctx.lineTo(350,560);
    ctx.stroke();
 //9
 ctx.beginPath();
    ctx.moveTo(395,20);
    ctx.lineTo(395,560);
    ctx.stroke();
 //10
    ctx.beginPath();
    ctx.moveTo(440,20);
    ctx.lineTo(440,560);
    ctx.stroke();
 //11
    ctx.beginPath();
    ctx.moveTo(485,20);
    ctx.lineTo(485,560);
    ctx.stroke();
 //12
    ctx.beginPath();
    ctx.moveTo(530,20);
    ctx.lineTo(530,560);
    ctx.stroke();
 //13
    ctx.beginPath();
    ctx.moveTo(575,20);
    ctx.lineTo(575,560);
    ctx.stroke();
 //14
    ctx.beginPath();
    ctx.moveTo(620,20);
    ctx.lineTo(620,560);
    ctx.stroke();
 //15
    ctx.beginPath();
    ctx.moveTo(665,20);
    ctx.lineTo(665,560);
    ctx.stroke();
 //16
    ctx.beginPath();
    ctx.moveTo(710,20);
    ctx.lineTo(710,560);
    ctx.stroke();
 //17
    ctx.beginPath();
    ctx.moveTo(755,20);
    ctx.lineTo(755,560);
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
            
            <table class="table-info" style="float:right ;width:300px ">
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
            </table>
    
        
     

        <div id="generateImg" >
            <input type="hidden" name="img_value" id="img_value" value="" />
        <canvas id="can" width="775" height="560" style="position: ;left:10%;border:2px solid; " ></canvas>
        <div style="position:;top:12%;left:43%;">Choose Color</div>
        <table>
            <tr>
             
        <td style="width:50px ;"> <div style="position:;top:15%;left:45%;width:20px;height:20px;background:green;" id="green" onclick="color(this)">   </div>nadi </td>
        <td style="width:50px ;"><div style="position:;top:15%;left:46%;width:20px;height:20px;background:blue;" id="blue" onclick="color(this)"> </div>N2O </td>
        <td style="width:50px ;"><div style="position:;top:15%;left:47%;width:20px;height:20px;background:red;" id="red" onclick="color(this)">   </div> TD </td>
        <td style="width:50px ;"><div style="position:;top:17%;left:45%;width:20px;height:20px;background:yellow;" id="yellow" onclick="color(this)">  </div> S </td>
        <!-- <div style="position:;top:17%;left:46%;width:10px;height:10px;background:orange;" id="orange" onclick="color(this)"></div> -->
        <td style="width:50px ;">  <div style="position:;top:17%;left:47%;width:20px;height:20px;background:white;" id="white" onclick="color(this)"> </div> O2 </td>
        <td style="width:50px ;"> <div style="position:;top:17%;left:47%;width:20px;height:20px;background:black;" id="black" onclick="color(this)"> </div> Mulai </td>
                   
            </tr>
        </table>
        <!-- <div style="position:;top:20%;left:43%;">Eraser</div>
        <div style="position:;top:22%;left:45%;width:15px;height:15px;background:white;border:2px solid;" id="white" onclick="color(this)"></div>
        <img id="canvasimg" style="position:absolute;top:10%;left:52%;" style="display:none;"> -->
  <br>
        <input type="button" value="save" id="btn" size="30" onclick="save()" style="position:;top:55%;left:10%;">
        <input type="button" value="clear" id="clr" size="23"  onClick="window.location.reload()"  style="position:;top:55%;left:15%;">
      </div>
  
      <br>
      


    
    </body>
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
           url: "<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/jadwal/save_img');?>
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
    </script>
