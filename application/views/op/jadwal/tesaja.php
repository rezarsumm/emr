<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RS.Urip Sumoharjo</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">  
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">    
	<!-- Sweetalert CSS -->
	<link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="jquery-2.2.4.min.js"></script> <!-- Load library jquery -->
  
<?php

$mr = $_POST['nim'];

		error_reporting(0);
		session_start();
		include "config/koneksi.php";
		if(isset($_POST['nim'])){
			$nomr=addslashes($_POST['nim']);
			$dokter=addslashes($_POST['siswa']);
			$jenis='UMUM';
			$waktu=addslashes($_POST['waktu']);
			date_default_timezone_set('Asia/Jakarta');
			//$tgl=addslashes($_POST['tgl']);
			$tglN=date('Y-m-d');
			$tgl=date('Y-m-d', strtotime($date. ' + 1 days'));
			$tahun=date('y', strtotime($date. ' + 1 days'));
			$jam=date("Y-m-d H:i:s");
			$sekarang = strtotime(date('H:i:s'));
			$pagi = strtotime('06:00:00');
			$malam = strtotime('20:00:00');				
			$nama=addslashes($_POST['nama']);
			function valid_email($email) {
					return !!filter_var($email, FILTER_VALIDATE_EMAIL);
				}		
			$alamat=addslashes($_POST['alamat']);
			$nohp=addslashes($_POST['nohp']);                                
			$nomor='1';		
			$status='APP';
			$st='1';
			
			function tgl_indo($tanggal){
				$bulan = array (
					1 =>   'Januari',
					'Februari',
					'Maret',
					'April',
					'Mei',
					'Juni',
					'Juli',
					'Agustus',
					'September',
					'Oktober',
					'November',
					'Desember'
				);
				$pecahkan = explode('-', $tanggal);		
				// variabel pecahkan 0 = tanggal
				// variabel pecahkan 1 = bulan
				// variabel pecahkan 2 = tahun
				return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
			}




function jalanin(){
 


/* Begin the transaction. */
if ( sqlsrv_begin_transaction( $conn ) === false ) {
     die( print_r( sqlsrv_errors(), true ));
}

     $sqljad = "SELECT Kuota FROM DOKTER_SMSGATEWAY   where Kode_Dokter='113'";                                                                             
                                   $resultsjad = sqlsrv_query($conn, $sqljad);
                                   $rowjad = sqlsrv_fetch_array( $resultsjad );
                                   $kuota = $rowjad[Kuota];

     $sqlno = "SELECT count(Nomor) as Nomor  FROM ANTRIAN     where Tanggal = '2022-05-20' AND Dokter='113' ";
                                    $resultsno = sqlsrv_query($conn, $sqlno);
                                   $rowno = sqlsrv_fetch_array( $resultsno );
                                   $nolast = $rowno[Nomor];     


     $query="INSERT INTO dbo.ANTRIAN(No_Ponsel,Nomor,No_MR,Tanggal,Jam,Dokter,Jenis,Status) VALUES(?,?,?,?,?,?,?,?)"; $params1 = array('MESIN',$nolast,'112112','2022-05-20','2022-05-20','113','UMUM','ANTRI');  
            $stmt1 = sqlsrv_query($conn, $query, $params1);  
           

 $sqlcek = "SELECT count(*) as Total FROM ANTRIAN where Tanggal = '2022-05-20' AND Dokter='113' and Nomor=$nolast ";
  $resultscek = sqlsrv_query($conn, $sqlcek);
                                   $rowcek = sqlsrv_fetch_array( $resultscek );
                                   $total = $rowcek[Total];       

    if($total>1){
      sqlsrv_rollback( $conn );
       jalanin();
    }        
     else if($nolast>$kuota){                       
      sqlsrv_rollback( $conn );
    }
    else{
     sqlsrv_commit( $conn );

    }

 }


		    $hari = tgl_indo(date('Y-m-d', strtotime($date. ' + 1 days')));       

			
			if($sekarang >= $pagi && $sekarang <= $malam)
			{
			  /*if( valid_email($alamat) ) 
			  {	*/
				$sql = "SELECT No_MR FROM dbo.REGISTER_PASIEN P WHERE P.No_MR = '" . $nomr . "'";
				
				$results = sqlsrv_query($conn, $sql);
				$rowCount = sqlsrv_has_rows( $results );
				
				if ($rowCount === false){
 					echo "<div class='alert alert-danger'>
					  <strong>Error !!! </strong><br> No. MR Pasien belum terdaftar di RSU Muhammadiyah Metro <a href='javascript:history.go(-1)' class='alert-link'><br>Back</a>
					</div>";										
				}
				else
				{
				  $sql2 = "SELECT No_MR FROM dbo.PENDAFTARAN P WHERE P.No_MR = '" . $nomr . "' AND P.Status = '" . $st . "'";
				
				  $results2 = sqlsrv_query($conn, $sql2);
				  $rowCount2 = sqlsrv_has_rows( $results2 );
				
				  if ($rowCount2 === true)
				  {
  					echo "<div class='alert alert-danger'>
					  <strong>Error !!! </strong><br>Mohon maaf, transaksi pendaftaran lama masih aktif di RSUMM, untuk mendaftar ulang silahkan hubungi bagian informasi, Telp.(0725)49490 (24 jam) / WhatsApp di 08117249490 (jam kerja). Terimakasih<a href='javascript:history.go(-1)' class='alert-link'><br>Back</a>
					</div>";					
				  }
				  else			  
				  {					  
					 
						  // Cek Antrian
						  $sqlant = "SELECT A.Nomor,B.Nama_Pasien,C.Nama_Dokter FROM ANTRIAN AS A INNER JOIN REGISTER_PASIEN AS B ON A.No_MR=B.No_MR
									INNER JOIN DOKTER AS C ON A.Dokter = C.Kode_Dokter 
									where A.tanggal = '" . $tgl ."' AND A.No_MR = '" . $nomr . "' AND A.Dokter = '" . $dokter . "'";
															
						  $resultsant = sqlsrv_query($conn, $sqlant);
						  $rowCountant = sqlsrv_has_rows( $resultsant );
						  $rowant = sqlsrv_fetch_array( $resultsant );
						  
						  if ($rowCountant === true)
						  { 
							echo "<div class='alert alert-danger'>
							  <strong>Error !!! </strong><br>Transaksi lama masih aktif..! Silahkan hubungi RSU Muhammadiyah Metro<a href='javascript:history.go(-1)' class='alert-link'><br>Back</a>
							  <strong>Error !!! </strong><br>Maaf, $rowant[Nama_Pasien] sudah mendaftar di praktek $rowant[Nama_Dokter] dengan No.Antrian : $rowant[Nomor]<a href='javascript:history.go(-1)' class='alert-link'><br>Back</a>
							</div>";
						  }
						  else			  
						  {				



						  		  					  			  					  							
							// Cek Nomor Antrian
							$sqlno = "SELECT TOP 1 Nomor,Tanggal FROM ANTRIAN 
								 where Tanggal = '" . $tgl . "' AND Dokter='" . $dokter . "' ORDER BY Nomor DESC";

							$resno = sqlsrv_query($conn, $sqlno);
							$rowCountno = sqlsrv_has_rows( $resno );
							$rowno = sqlsrv_fetch_array( $resno );
							
							//$sLastNo = intval($rowno[Nomor]) + 1;
							if ($rowCountno === true) {
							   $sLastNo = intval($rowno[Nomor]) + 1;}
							   //$sLastNo;}
							else {
							   $sLastNo = "1";
							}				


							
							//echo "<script>alert('No : $sLastNo');history.go(-1);</script>";							
							$sqljad = "SELECT Kuota,Jadwal FROM DOKTER_SMSGATEWAY 
									 where Kode_Dokter='" . $dokter . "'";																
							$resultsjad = sqlsrv_query($conn, $sqljad);
							$rowjad = sqlsrv_fetch_array( $resultsjad );
							$kuota = $rowjad[Kuota];
							$jadwal = $rowjad[Jadwal];								
							//echo "<script>alert('No : $sLastNo $dokter $kuota');history.go(-1);</script>";
							if ($sLastNo > $kuota) { 								
								echo "<div class='alert alert-danger'>
								  <strong>Error !!! </strong><br>Maaf, Kuota Pendaftaran Sudah Penuh. Silahkan Daftar Kembali pada Jadwal Praktek berikutnya<a href='javascript:history.go(-1)' class='alert-link'><br>Back</a>
								</div>";								
							} else
							 {

								// Cek Nomor Antrian
								$sqlno = "SELECT TOP 1 Nomor,Tanggal FROM ANTRIAN 
									 where Tanggal = '" . $tgl . "' AND Dokter='" . $dokter . "' ORDER BY Nomor DESC";

								$resno = sqlsrv_query($conn, $sqlno);
								$rowCountno = sqlsrv_has_rows( $resno );
								$rowno = sqlsrv_fetch_array( $resno );
								
								//$sLastNo = intval($rowno[Nomor]) + 1;
								if ($rowCountno === true) {
								   $sLastNo = intval($rowno[Nomor]) + 1;}
								   //$sLastNo;}
								else {
								   $sLastNo = "1";
								}





								$query="INSERT INTO dbo.ANTRIAN(No_Ponsel,Nomor,No_MR,Tanggal,Jam,Dokter,Jenis,Status) VALUES(?,?,?,?,?,?,?,?)";								
								$params1 = array(  
											   array($nohp, null),  
											   array($sLastNo, null),  
											   array($nomr, null),  
											   array($tgl, null),  
											   array($jam, null),  
											   array($dokter, null),  
											   array('UMUM', null),  											   
											   array($status, null)
										   );  
													
								$stmt1 = sqlsrv_query($conn, $query, $params1);  
								if( $stmt1 === false )  
								{  
									 echo "Error in execution of INSERT.\n";  
									 die( print_r( sqlsrv_errors(), true));  
								}  
								// INSERT PENDAFTARAN
								$KodeRekan ='0001';
								$CaraBayar = '3';
								
								// Cek No Register
								$sqlreg = "SELECT No_Reg FROM PENDAFTARAN WHERE LEFT(No_Reg,2) = '" . $tahun . "' ORDER BY No_Reg DESC";
										$resreg = sqlsrv_query($conn, $sqlreg);
										$rowreg = sqlsrv_fetch_array( $resreg );
								
								$sLastKode = intval(substr($rowreg[No_Reg], 4, 8)); // ambil 8 digit terakhir
								$sLastKode = intval($sLastKode) + 1; // konversi ke integer, lalu tambahkan satu
								$sNextKode = $tahun .'-'. sprintf('%08s', $sLastKode); // format hasilnya dan tambahkan prefix
								if (strlen($sNextKode) > 8) {
									$sNextKode;}
								else { // jika belum ada, gunakan kode yang pertama
									$sNextKode = "00000001";
								}								
								
								$qdaf="INSERT INTO dbo.PENDAFTARAN(No_Reg,Tanggal,Jam,Tgl_Keluar,Kode_Asal,Kode_Masuk,Kode_Datang,Kode_Kondisi,Kode_Bayar,Kode_Keluar,
								Kode_Ruang,KodeRekanan,No_MR,No_Kartu,Referensi,Medis,Kode_Dokter,Status,Aksi,Cetak,NamaUser) 
								VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";								
								$paramsdaf = array(  
											   array($sNextKode, null),  
											   array($tgl, null),  
											   array($jam, null),  
											   array($tgl, null),  
											   array('1', null),  
											   array('2', null),  
											   array('2', null),  
											   array('1', null),  
											   array($CaraBayar, null),  
											   array('0', null), 
											   array('', null),  
											   array($KodeRekan, null),  									   
											   array($nomr, null),  
											   array('-', null),
											   array('DATANG SENDIRI', null),
											   array('RAWAT JALAN', null),
											   array($dokter, null),
											   array('1', null),
											   array('0', null),
											   array('0', null),
											   array('SA', null)  
										   );  
													
								$stmtdaf = sqlsrv_query($conn, $qdaf, $paramsdaf);  
								if( $stmtdaf === false )  
								{  
									 echo "Error in execution of INSERT.\n";  
									 die( print_r( sqlsrv_errors(), true));  
								}  					
								
								if ($sLastNo <= "20") { 
									$Datang = 'Satu Jam sebelumnya';
								} elseif ($sLastNo > "20" || $sLastNo <= "40") {
									$Datang = 'Setengah Jam sebelumnya'; 
								} elseif ($sLastNo > "40" || $sLastNo <= "60") { 
									$Datang = 'pada Jam mulai praktek'; 
								} elseif ($sLastNo > "60" || $sLastNo <= "80") {
									$Datang = 'Setengah Jam setelah mulai praktek'; 
								} elseif ($sLastNo > "80") {
									$Datang = 'Satu Jam setelah mulai praktek';
								}
																																																															
								$stmt = "SELECT TOP 1 A.Nomor,A.No_MR,B.Nama_Pasien,A.Tanggal,C.Nama_Dokter,A.Jenis
										FROM ANTRIAN AS A INNER JOIN REGISTER_PASIEN AS B ON A.No_MR=B.No_MR
										INNER JOIN DOKTER AS C ON A.Dokter=C.Kode_Dokter
										WHERE A.No_MR='" . $nomr . "' AND A.Dokter ='" . $dokter . "' AND 
										A.Nomor = '" . $sLastNo . "' AND A.Tanggal = '" . $tgl . "' AND 
										A.Jenis = 'UMUM' ORDER BY A.Tanggal,A.Jam DESC";
								$qtampil = sqlsrv_query($conn, $stmt);
								$jenis='UMUM';								
								while($hasil = sqlsrv_fetch_array($qtampil, SQLSRV_FETCH_ASSOC)){		 
								// send WA
								$pesan = "*Pendaftaran Online RSU Muhammadiyah Metro*" . PHP_EOL . "" . PHP_EOL . "*No.Antrian  : " . $sLastNo . "*" . PHP_EOL . "*Nama Pasien  : " . trim($hasil[Nama_Pasien]) . "*" . PHP_EOL . "*Tanggal  : " . $hari . "*" . PHP_EOL . "*Waktu  : " . $waktu . "*" . PHP_EOL . "*No. MR  : " . $nomr . "*" . PHP_EOL . "*Jaminan  : " . $jenis . "*" . PHP_EOL . "*Dokter  : " . trim($hasil[Nama_Dokter]) . "*" . PHP_EOL . "" . PHP_EOL . "*Untuk pasien BPJS diharapkan Register Ulang " . $Datang . "*" . PHP_EOL . "*di RSUMM.*";
								$curl = curl_init();
								$token = "IIAe7vfVZnL4lDywIK7jwk3mOlCmYLpfknjR7ywlEVfyibAPyG9R5zo79nqEvJS3";
								$data = [
									'phone' => $nohp,
									'message' => $pesan,
								];

								curl_setopt($curl, CURLOPT_HTTPHEADER,
									array(
										"Authorization: $token",
									)
								);
								curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
								curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
								curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
								curl_setopt($curl, CURLOPT_URL, "https://selo.wablas.com/api/send-message");
								curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
								curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
								$result = curl_exec($curl);
								curl_close($curl);								
								}
								header("location:antrian.php?mr=$nomr&dokter=$dokter&nmr=$sLastNo&tgl=$tgl&jenis=$jenis&datang=$Datang");
							 }
						  }  
					  //} 
				  }    
				}
			  /*} 
			  else 
			  {
				echo "<script>alert('email Not valid!');history.go(-1);</script>";
			  }*/
			}
			else
			{
			  	echo "<div class='alert alert-danger'>
				  <strong>Error !!! </strong><br> Maaf, waktu Pendaftaran dari pukul 06:00 s/d 20:00 <a href='javascript:history.go(-1)' class='alert-link'><br>Back</a>
				</div>";													
			}
			/* Free statement and connection resources. */   		 
			sqlsrv_free_stmt($stmt1);  
			sqlsrv_free_stmt($stmtdaf);  
			sqlsrv_close($conn); 
						
		  }
?>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>

<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- SweetAlert Plugin JS -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- page script -->

</body>
</html>