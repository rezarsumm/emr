<?php 

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Rekam Medis.xls");

?>

<center><h3>Laporan Medis Tanggal {$tglawal} - {$tglakhir}</h3></center>
<br>
<table style="font-size:12px" border="1">
    <thead>
        <th> Tanggal Poli </th>
        <th> Lama/Baru  </th>
        <th> No MR </th>
        <th> Nama Pasien </th>
        <th> JK </th>
        <th> Umur </th>
        <th> Range Umur </th>
        <th> Dokter </th>
        <th> Ket </th>
        <th> Diagnosa </th>
        <th> ICD </th>
        <th> Alamat </th>
    </thead>
    <tbody> 
    {foreach from=$hata item=data}
    <tr>
        <td>{date('d-m-Y', strtotime($data.Tanggal))}</td> 
        <td>{if $data.Kode_Datang eq '1'} Baru {else} Lama {/if}</td> 
        <td>{$data.No_MR}</td> 
        <td>{$data.Nama_Pasien}</td> 
        <td> {$data.Jenis_Kelamin}</td> 
        <td>{$data.umur}</td> 
          <td>  </td> 
          <td>{$data.Nama_Dokter}</td> 
         <td>{$data.NamaRekanan}</td> 
         <td>{$data.FS_DIAGNOSA}</td> 
         <td> </td> 
         <td>{$data.Alamat}</td> 
        
        </tr>
        {/foreach}
    </tbody>
</table>