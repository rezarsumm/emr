<?php /* Smarty version Smarty-3.0.7, created on 2022-01-26 11:33:00
         compiled from "application/views\rm/laporanmedis/index.html" */ ?>
<?php /*%%SmartyHeaderCode:2804161f0cefcd06ef3-58073679%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a15e85804cbec8c2ce7a26f6a17d571cf9e3d0f1' => 
    array (
      0 => 'application/views\\rm/laporanmedis/index.html',
      1 => 1643005395,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2804161f0cefcd06ef3-58073679',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="breadcrum">
    <p>
        <a href="#">Rekam Medis</a><span></span>
        <small>Laporan Rekam Medis Harian</small>
    </p>
    <div class="clear"></div>
</div>

<div class="search-box">
    <h3><a href="#"></a></h3>
</div>



<div class="row" style="padding:30px;">
    <div class="col-md-9 grid-margin stretch-card" style="background-color:white; width: 500px;padding: 20px; border: solid 1px;" >
 
    <h4>Eksport Laporan Medis</h4>
     <br>
     <br> 
     <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('rm/laporanmedis/eksport');?>
" method="post" onkeypress="return event.keyCode != 13">
       
       <div class="form-group row">
        <label for="exampleInputUsername2" class="col-sm-3 col-form-label"> Cetak Laporan Berdasarkan Tanggal : </label>
        <br>
        <br>
        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tanggal Awal: </label> 
         <input type="date" class="tglawal" name="tglawal" style="width: 200px;">
           
        <br>
        <br>
         

        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tanggal Akhir: </label> 
        <input type="date" class="tglakhir" name="tglakhir" style="width: 200px;">
           
        <br>
        <br>
      
        <input type="submit" name="save" value="Eksport" class="eksport" /> 
     
  </div>
  </form>
 
  </div>
</div>

<script>
     
  $('.eksport').on('click', function(){ 

    var tglawal = $(".tglawal").val();
      var tglakhir = $(".tglakhir").val();

    //   alert(tglawal);
  });
</script>