<?php /* Smarty version Smarty-3.0.7, created on 2022-06-04 09:20:42
         compiled from "application/views\op/laporananes/edit_progress.html" */ ?>
<?php /*%%SmartyHeaderCode:6935629ac17a933fc5-19788418%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2d69f3cb6c0bd72e24cc867c5b3e1805351c2e2' => 
    array (
      0 => 'application/views\\op/laporananes/edit_progress.html',
      1 => 1654309239,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6935629ac17a933fc5-19788418',
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
        if (x == "white") y = 14;
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
            
            <table class="table-info" style="float:right ;">
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
                    <td>TANGGAL LAHIR </td>
                    <td>
                        <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('rs_pasien')->value['TGL_LAHIR'],"%d %b %Y");?>

                    </td>
                </tr>
                <tr>
                    <td>ALAMAT </td>
                    <td><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['ALAMAT'];?>
</td>
                </tr>
            </table>
    
        
     

        <div id="generateImg" >
            <input type="hidden" name="img_value" id="img_value" value="" />
        <canvas id="can" width="775" height="560" style="  background-image: url('<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
uploads/<?php echo $_smarty_tpl->getVariable('rs_file_anes')->value['NAMA_FILE'];?>
');" ></canvas>
        <!-- <div style="position:absolute;top:12%;left:43%;">Choose Color</div>
        <div style="position:absolute;top:15%;left:45%;width:10px;height:10px;background:green;" id="green" onclick="color(this)"></div>
        <div style="position:absolute;top:15%;left:46%;width:10px;height:10px;background:blue;" id="blue" onclick="color(this)"></div>
        <div style="position:absolute;top:15%;left:47%;width:10px;height:10px;background:red;" id="red" onclick="color(this)"></div>
        <div style="position:absolute;top:17%;left:45%;width:10px;height:10px;background:yellow;" id="yellow" onclick="color(this)"></div>
        <div style="position:absolute;top:17%;left:46%;width:10px;height:10px;background:orange;" id="orange" onclick="color(this)"></div>
        <div style="position:absolute;top:17%;left:47%;width:10px;height:10px;background:black;" id="black" onclick="color(this)"></div>
        <div style="position:absolute;top:20%;left:43%;">Eraser</div>
        <div style="position:absolute;top:22%;left:45%;width:15px;height:15px;background:white;border:2px solid;" id="white" onclick="color(this)"></div> -->
         
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
