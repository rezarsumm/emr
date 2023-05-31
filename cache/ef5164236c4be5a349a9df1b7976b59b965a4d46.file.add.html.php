<?php /* Smarty version Smarty-3.0.7, created on 2022-12-01 12:33:26
         compiled from "application/views\op/anestesi_lokal/add.html" */ ?>
<?php /*%%SmartyHeaderCode:558963883ca64afc54-34821813%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef5164236c4be5a349a9df1b7976b59b965a4d46' => 
    array (
      0 => 'application/views\\op/anestesi_lokal/add.html',
      1 => 1657938631,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '558963883ca64afc54-34821813',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><html> 
    <head><link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
</head>
<body>
<div class="breadcrum">
    
    <p>
        <a href="#">Catatan Operasi </a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('op/jadwal/detail/').($_smarty_tpl->getVariable('idoperasi')->value)).('/')).($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']))===null||$tmp==='' ? '' : $tmp));?>
"> Detail</a><span></span>
        <small>FORM PEMANTAUAN DENGAN ANESTESI LOKAL </small>
    </p>
    <div class="clear"></div>
</div> 
<div class="content-entry">
    <!-- notification template --> 
    <!-- end of notification template-->
    <table>
        <tr>
            <td width="50%">
                <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/anestesi_lokal/add_process');?>
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
                            <th colspan="2">PEMANTAUAN DENGAN ANESTESI LOKAL</th>
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
                        <tr>
                            <td>UMUR</td>
                            <td><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fn_umur'];?>
 Tahun</td>
                        </tr>
                    </table>
                <table>
                    <tr>
                        <td>
                            <table class="table-input" width="100%" style="text-align: justify;">
                      
             
                                 <tr>
                                       <td><b> PRA BEDAH </b></td>
                                     <td colspan="3" > 
                                        </td>  </tr>
                              <tr>
                                 <td> Tanggal Tindakan </td>
                               <td>  <input type="date" name="Tgl" > 
                                  Jam 
                                  <input type="time" name="Jam"> 
                                 </td>   </tr>
                             <tr> 
                                <td>   Diagnosa </td>
                               <td>  <input type="text" name="diagnosa"> 
                                   </td>  </tr>
                             <tr>
                                   <td>   Nama Tindakan </td>
                                   <td>  <input type="text" name="nm_tindakan"> 
                                   </td>    </tr>
                             <tr>
                                   <td>   Dokter Bedah   </td>
                                   <td>  
                                     <input type="text" name="dokter" value="<?php echo $_smarty_tpl->getVariable('data_operasi')->value['Nama_Dokter'];?>
" style="width: 200px;" readonly> 
                                   </td>    </tr>     
                                 <tr>
                                         <td>   Riwayat Sakit/OP </td>
                                         <td >
                                           <textarea name="riwayat_op" rows="1" style="width: 350px;" > -</textarea>
                                          </td>
                                    </tr> 
                                    <tr>
                                       <td>   Riwayat Alergi  : </td>
                                       <td >
                                         <textarea name="riwayat_alergi" rows="1" style="width: 350px;" > -</textarea>
                                        </td>
                                  </tr> 
                     
                                 </table>
                            <br>
                           
                          
                              
                        </td>
            
            
            
            
                    </tr>
                    <tr>
                        <td>
                            <table class="table-input" width="100%">
                                <tr> <td><b>PASCA BEDAH </b></td></tr>
                   
                   
                                <tr>
                                        <td>   Kesadaran </td>
                                        <td >
                                         <input type="text" name="pasca_SADAR"> 
                                         </td>
                                   </tr> 
                                   <tr>
                                      <td>    Tekanan Darah : </td>
                                      <td >
                                       <input type="text" name="pasca_TD"> MmHg
                                       </td>
                                 </tr> 
                                 <tr>
                                   <td>    Nadi : </td>
                                   <td >
                                    <input type="text" name="pasca_N"> x/menit
                                    </td>
                              </tr> 
                              <tr>
                               <td>    Respirasi : </td>
                               <td >
                                <input type="text" name="pasca_R"> 
                                </td>
                                 </tr> 
                                 <tr>
                                   <td>   Suhu: </td>
                                   <td >
                                   <input type="text" name="pasca_S"> C
                                   </td>
                             </tr> 
                             <tr>
                               <td>    Reaksi Alergi : </td>
                               <td >
                                 <textarea name="pasca_ALERGI" rows="1" style="width: 350px;" > -</textarea>
                               </td>
                           </tr> 
                           <tr>
                             <td>     Komplikasi Lain   : </td>
                             <td >
                               <textarea name="pasca_KOMPLI" rows="1" style="width: 350px;" > -</textarea>
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
                        </td>
                    </tr>
                </table>
                  
                  
                </form>

            </td>
            
            
            <td width="50%" style="padding-left: 20px; position:fixed;">
                <table class="table-input"  width="100%" style="text-align: justify; ">
                    <tr><td colspan="2">PEMANTAUAN STATUS FISIOLOGIS
                        <button class="btn btn-primary btn-sm fa fa-pencil" data-toggle="modal" data-target="#tambahanakModal"> Add  </button>
                       </td></tr>
                    
                    <tr>
                        <td colspan="2">
                            <table >
                                <tr>
                                    <td style="width:80px ;">Tanggal</td>
                                    <td style="width:50px ;">Waktu</td>
                                    <td style="width:50px ;">Sadar</td>
                                    <td style="width:30px ;">TD</td>
                                    <td style="width:30px ;">N</td>
                                    <td style="width:30px ;">R</td>
                                    <td style="width:30px ;">S</td>
                                    <td style="width:50px ;">Obat</td>
                                    <td style="width:50px ;">Cairan</td>
                                    <td style="width:50px ;">Ket</td>
                                </tr>
                                <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('status')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
?>  <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['Tgl'];?>
</td>
                                    <td><?php echo date('H:i',strtotime($_smarty_tpl->tpl_vars['row']->value['Jam']));?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['SADAR'];?>
    </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['TD'];?>
    </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['N'];?>
    </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['R'];?>
    </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['S'];?>
    </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['OBAT'];?>
    </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['CAIRAN'];?>
    </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['KET'];?>
    </td>
                                </tr>  <?php }} ?>
                               
                                
                            </table>
                    
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
  
</div>




<!-- tambah modal      -->
<div class="modal fade" id="tambahanakModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
               <div class="modal-header" >
            <button type="button" class="close"   data-dismiss="modal">&times;</button>
            <center><font ><h3>PEMANTAUAN STATUS FISIOLOGIS</h3></font> </center>
                 
            </div>
          <div class="modal-body" style="padding:40px 50px;" width>
            <div class="login-block"> 
                <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/anestesi_lokal/simpan_catatan');?>
" method="post" onkeypress="return event.keyCode != 13">
                     <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />
                    <input name="idoperasi" type="hidden" value="<?php echo $_smarty_tpl->getVariable('idoperasi')->value;?>
" />
                     <input name="FS_KD_REG" id="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />  

                
                     <div class="form-group row">
                        <label for="exampleInputUsername2"  class="col-sm-3 col-form-label">Tanggal, Jam</label>
                        <div class="col-sm-4">
                         <input type="date" name="Tgl" required class="form-control">
                        </div> <div class="col-sm-4">
                         <input type="time" name="Jam" required class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Kesadaran</label>
                        <div class="col-sm-9">
                         <input type="text" name="SADAR"   class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tekanan Darah</label>
                        <div class="col-sm-4">
                         <input type="text" name="TD"    class="form-control">
                        </div>
                       
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nadi</label>
                        <div class="col-sm-4">
                         <input type="text" name="N"   class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Respirasi</label>
                        <div class="col-sm-4">
                         <input type="text" name="R"    class="form-control">
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Suhu</label>
                        <div class="col-sm-4">
                         <input type="text" name="S"   class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Obat</label>
                        <div class="col-sm-9">
                         <input type="text" name="OBAT"   class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Cairan</label>
                        <div class="col-sm-9">
                         <input type="text" name="CAIRAN" class="form-control">
                        </div>
                      </div>
                  
                      
                      
                      
                      
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                        <textarea name="KET" rows="3" cols="50" ></textarea>
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


 