<?php /* Smarty version Smarty-3.0.7, created on 2022-07-26 09:09:12
         compiled from "application/views\op/jadwal/detail.html" */ ?>
<?php /*%%SmartyHeaderCode:3200862df4cc8420cf3-92955071%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8e1f9c557886bcf42942a0a519b0c30e479a6b7' => 
    array (
      0 => 'application/views\\op/jadwal/detail.html',
      1 => 1657943373,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3200862df4cc8420cf3-92955071',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
 
 
 
<!-- notification template --> 
<!-- end of notification template-->
 


 
    <input type="hidden" name="FS_KD_REG" value="<?php echo $_smarty_tpl->getVariable('FS_KD_REG')->value;?>
" />
<!--     <input type="hidden" name="FS_KD_REG" value="<?php echo $_smarty_tpl->getVariable('FS_KD_REG2')->value;?>
" /> -->
    <input type="hidden" name="FS_KD_LAYANAN" value="<?php echo $_smarty_tpl->getVariable('result')->value['SPESIALIS'];?>
" />
    <input type="hidden" name="FS_KD_PETUGAS_MEDIS" value="<?php echo $_smarty_tpl->getVariable('result')->value['KODE_DOKTER'];?>
" />
    <input type="hidden" name="FS_MR" value="<?php echo $_smarty_tpl->getVariable('result')->value['NO_MR'];?>
" />
    <?php  $_smarty_tpl->tpl_vars['result'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['result']->key => $_smarty_tpl->tpl_vars['result']->value){
?>
    <table class="table-info" width="100%" style="font-size: 14px;">
        <tr class="headrow">
            <th colspan="4">Data Pasien</th>
        </tr>
        <tr>
            <td width='15%'>Kode Reg</td>
            <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value['NO_REG'])===null||$tmp==='' ? '' : $tmp);?>
</td>
            <td width='15%'>Nama operasi</td>
            <td width='35%'><?php echo $_smarty_tpl->getVariable('rs_op')->value['nmtindakan'];?>
</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value['NAMA_PASIEN'])===null||$tmp==='' ? '' : $tmp);?>
</td>
            <td>Alamat</td>
            <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value['ALAMAT'])===null||$tmp==='' ? '' : $tmp);?>
</td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value['TGL_LAHIR'])===null||$tmp==='' ? '' : $tmp);?>
</td>
            <td>Jenis Kelamin</td>
            <td>
                <?php if ($_smarty_tpl->tpl_vars['result']->value['JENIS_KELAMIN']=='P'){?>
                Perempuan
                <?php }else{ ?>
                Laki-Laki
                <?php }?>
            </td>
        </tr>
      
    </table> 
    <?php }} ?>
  

    <table class="table-view" width="100%" border="0" style="font-size: 14px;">
        <thead>
            <tr>
                <th WIDTH="4%">No</th>
                <th WIDTH="44%">Nama Berkas</th> 
                <th WIDTH="34%">Aksi</th> 
                <th></th> 
            </tr>
        </thead>
        <tbody>
             
            
          <tr>
                <td>1</td>
                <td>      Data Umum Pra Operasi   </td>  
                <td>
                   
                    <?php if ($_smarty_tpl->getVariable('rolenya')->value=='Perawat OK'||$_smarty_tpl->getVariable('rolenya')->value=='Perawat Anestesi'){?> 
                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('op/umumpra/edit/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Entry</a>
                    <?php }?>
               
                    <?php if ($_smarty_tpl->getVariable('cek_umum_pra')->value!=0){?>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('rm/rawat_inap/cetak_data_umum_pra2/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"> Cetak </a>
                    <?php }?>
                </td> </tr>
           <tr>
                <td>2</td>
                <td>     Asuhan Keperawatan Peri Operatif  </td>  
                <td>   <?php if ($_smarty_tpl->getVariable('rolenya')->value=='Perawat OK'||$_smarty_tpl->getVariable('rolenya')->value=='Perawat Anestesi'){?> 
                       <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('op/asuhan/detail/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Entry</a>
                       <?php }?>

                       <?php if ($_smarty_tpl->getVariable('cek_askep')->value!=0){?>
                       <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('rm/rawat_inap/cetak_asuhan_kep_op2/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"> Cetak </a>
                       <?php }?>
                  
                   </td> </tr>
    
        <tr>
            <td>3</td>
            <td>    Check List keselamtan Operasi
            </td>  
            <td>   <?php if ($_smarty_tpl->getVariable('rolenya')->value=='Perawat OK'||$_smarty_tpl->getVariable('rolenya')->value=='Perawat Anestesi'){?> 
                   <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('op/checklist/detail/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Entry</a>
                   <?php }?>

                   <?php if ($_smarty_tpl->getVariable('cek_checklist')->value!=0){?>
                   <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('rm/rawat_inap/cetak_checklist2/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"> Cetak </a>
                   <?php }?>
              
               </td> </tr>
     
            <tr>
            <td>4</td>
            <td>     Asesmen Pra Anestesi
            </td>  
            <td>    <?php if ($_smarty_tpl->getVariable('username')->value=='130'){?> 
                   <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('op/praanestesi/detail/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Entry</a>
                   <?php }?>
              
                   <?php if ($_smarty_tpl->getVariable('cek_ases_pra_anes')->value!=0){?>
                   <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('rm/rawat_inap/cetak_ases_pra_anes2/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"> Cetak </a>
                   <?php }?>
               </td> </tr> 
     
            <tr>
            <td>5</td>
            <td>       Asesmen Pra Bedah
            </td>  
            <td>   
                 <?php if ($_smarty_tpl->getVariable('rolenya')->value=='Dokter'&&$_smarty_tpl->getVariable('username')->value!='130'){?> 
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('op/prabedah/detail/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Entry</a>
                <?php }?>

                <?php if ($_smarty_tpl->getVariable('rolenya')->value=='Perawat OK'){?> 
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('op/prabedah/detail/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Entry</a>
                <?php }?>
                

                
                <?php if ($_smarty_tpl->getVariable('cek_ases_pra_op')->value!=0){?>
                <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('rm/rawat_inap/cetak_ases_pra_bedah2/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"> Cetak </a>
                <?php }?>
            </td> </tr>

      <tr>
            <td>6</td>
            <td>     Laporan Anestesi
            </td>  
            <td> 
                <form method="post" id="make_pdf" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/jadwal/create_pdf');?>
">
                    <input type="hidden" name="hidden_html" id="hidden_html"/> 
                

                    <?php if ($_smarty_tpl->getVariable('username')->value=='130'||$_smarty_tpl->getVariable('rolenya')->value=='Perawat Anestesi'){?>  
                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('op/laporananes/detail/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Entry</a>
                    <?php }?>
                    
                    <?php if ($_smarty_tpl->getVariable('cek_lap_anes')->value!=0){?>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('rm/rawat_inap/cetak_lap_anes2/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"> Cetak </a>
                    <?php }?>
    
                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('op/jadwal/entry_progress/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Grafik Anestesi</a>
                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('op/jadwal/entry_rr/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Recovery Room</a>
                 
                    <!-- <button type="button" name="create_pdf" class="button-edit" id="create_pdf" >Grafik</button> -->

                </form>
              
             

            </td> </tr>

     <tr>
            <td>7</td>
            <td>      Laporan Operasi
            </td>  
            <td>    <?php if ($_smarty_tpl->getVariable('rolenya')->value=='Dokter'&&$_smarty_tpl->getVariable('username')->value!='130'){?> 
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('op/laporan/detail/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Entry</a>
                <?php }?>
                
                <?php if ($_smarty_tpl->getVariable('cek_lap_op')->value!=0){?>
                <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('rm/rawat_inap/cetak_lap_op2/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"> Cetak </a>
                <?php }?>
            </td> </tr>

     <tr>
            <td>8</td>
            <td>   Rencana Medis Pra Operasi
            </td>  
            <td>  <?php if ($_smarty_tpl->getVariable('rolenya')->value=='Dokter'&&$_smarty_tpl->getVariable('username')->value!='130'){?> 
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('op/pascabedah/detail/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Entry</a>
                <?php }?>

                <?php if ($_smarty_tpl->getVariable('cek_rencana_post_op')->value!=0){?>
                <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('rm/rawat_inap/cetak_rencana_medis_post_op2/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"> Cetak </a>
                <?php }?>
                
            </td> </tr>
                
            
    <tr>
            <td>9</td>
            <td>   Data Umum Post Operasi
            </td>  
            <td>    <?php if ($_smarty_tpl->getVariable('rolenya')->value=='Perawat OK'||$_smarty_tpl->getVariable('rolenya')->value=='Perawat Anestesi'){?> 
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('op/umumpost/detail/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Entry</a>
                <?php }?>
                
                <?php if ($_smarty_tpl->getVariable('cek_umum_post')->value!=0){?>
                <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('rm/rawat_inap/cetak_data_umum_post2/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"> Cetak </a>
                <?php }?>
            </td> </tr>
                   
      <tr>
            <td>10</td>
            <td>     Pemakaian Alat Habis Pakai
            </td>  
            <td>  <?php if ($_smarty_tpl->getVariable('rolenya')->value=='Perawat OK'||$_smarty_tpl->getVariable('rolenya')->value=='Perawat Anestesi'){?> 
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('op/alatpakai/detail/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Entry</a>
                <?php }?>

                <?php if ($_smarty_tpl->getVariable('cek_alat_habis_pakai')->value!=0){?>
                <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('rm/rawat_inap/cetak_alat_habis_pakai2/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"> Cetak </a>
                <?php }?>
                
            </td> </tr>


            <tr>
                <td>11</td>
                <td>     Pemantauan Anestesi Lokal
                </td>  
                <td>   
                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('op/anestesi_lokal/detail/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Entry</a>
                   
    
                    <?php if ($_smarty_tpl->getVariable('cek_anestesi_lokal')->value!=0){?>
                    <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @((('rm/rawat_inap/cetak_alat_habis_pakai2/').($_smarty_tpl->getVariable('FS_RG')->value)).('/')).($_smarty_tpl->getVariable('id')->value))===null||$tmp==='' ? '' : $tmp));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"> Cetak </a>
                    <?php }?>
                    
                   
                    
                </td> </tr>

        </tbody>
        </table>
        <script>
            $(document).ready(function(){
                $('#create_pdf').click(function(){
                    $('#hidden_html').val($('#chart').html());
                    $('#make_pdf').submit();
                    // alert($('#hidden_html'));
                });
            });
        </script>