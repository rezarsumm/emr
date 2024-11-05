<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class icare extends ApplicationBase {
 
// constructor
    public function __construct() {
// parent constructor
        parent::__construct();
// load model

        $this->load->model('m_igd');
        $this->load->model('m_cppt');
        $this->load->model('m_rawat_jalan');
        $this->load->model('m_rawat_jalan_nurse');
        $this->smarty->assign('m_cppt', $this->m_cppt);
        $this->smarty->assign('m_rawat_jalan', $this->m_rawat_jalan);
        $this->load->library('tnotification');
        require_once(APPPATH . 'libraries/src/LZCompressor/LZReverseDictionary.php');
        require_once (APPPATH . 'libraries/src/LZCompressor/LZString.php');
        require_once(APPPATH . 'libraries/src/LZCompressor/LZData.php');
        require_once(APPPATH . 'libraries/src/LZCompressor/LZUtil.php');

    }

// bridging icare bpjs
    

    public function index($no_bpjs="",$kode_dokter_jkn="",$No_Reg="",$kode_dokter_rs="") {
        
        // Mengatur konsumen dan secret key
        $kode_dokter_jkn = intval($kode_dokter_jkn);
        $this->load->helper('signature');
    
        // Data dan secret key
        $constid = "7749";
        $secretKey = "7hEF4A8987";
    
        // Generate signature
        $signatureData = generate_signature($constid, $secretKey);

        // var_dump($signatureData['X-timestamp'],$signatureData['X-signature']);
        // die;

        // Menyiapkan cURL
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apijkn.bpjs-kesehatan.go.id/wsihs/api/rs/validate',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode(array(
                "param" => $no_bpjs,
                "kodedokter" => $kode_dokter_jkn
            )),
            CURLOPT_HTTPHEADER => array(
                'X-cons-id: ' . $signatureData['X-cons-id'],
                'X-timestamp: ' . $signatureData['X-timestamp'],
                'X-signature: ' . $signatureData['X-signature'],
                'user_key: 766ea39f78ae41ee1a3bd95cd1b75d39',
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);

        // var_dump($response);
        // die;

        if (curl_errno($curl)) {
            echo 'Curl error: ' . curl_error($curl);
            return;
        }

        curl_close($curl);

        $data = json_decode($response, true);
 
        if (isset($data['response'])) {
            $nilairespon = $data['response'];
            $kunci = $constid . $secretKey . $signatureData['X-timestamp'];

            // Dekripsi dan dekompresi
            $hasilakhir = $this->decompress($this->stringDecrypt($kunci, $nilairespon));

            // var_dump($hasilakhir);
            // die;

            // Mengonversi hasil akhir dari JSON menjadi array
             $hasilArray = json_decode($hasilakhir, true);
    
                // Memeriksa dan mengambil URL jika ada
                if (isset($hasilArray['url'])) {
                    $url = $hasilArray['url']; // Mengambil nilai URL
                    // Menampilkan hanya URL
                    $keterangan = $data['metaData']['message'];
                    $log_icare = array (
                        date('Y-m-d H:i:s'),
                        $kode_dokter_rs,
                        $kode_dokter_jkn,
                        $No_Reg,
                        $keterangan
                        
                    );
                        $this->m_rawat_jalan->insert_log_icare($log_icare);
                        redirect($url);
              
                    
                } else {
                    $keterangan = $data['metaData']['message'];
                    $log_icare = array (
                        date('Y-m-d H:i:s'),
                        $kode_dokter_rs,
                        $kode_dokter_jkn,
                        $No_Reg,
                        $keterangan
                        
                    );
                    $this->m_rawat_jalan->insert_log_icare($log_icare);
                    
                    // Jika tidak ada URL, Anda bisa menampilkan pesan kesalahan atau tindakan lain
                
                    $errorMessage = isset($data['metaData']['message']) ? $data['metaData']['message'] : 'URL Tidak ditemukan.';
                
                    // Menyusun pesan akhir
                    $finalMessage = "Respons bpjs: " . htmlspecialchars($errorMessage);
                            $this->tnotification->sent_notification("error",$finalMessage);
                            redirect("medis/rawat_jalan/add/" . $No_Reg . '/' . $No_Reg);
                }

            // echo $hasilakhir;
        } else {
          // Mengambil pesan dari metaData jika ada
          $keterangan = $data['metaData']['message'];
          $log_icare = array (
              date('Y-m-d H:i:s'),
              $kode_dokter_rs,
              $kode_dokter_jkn,
              $No_Reg,
              $keterangan
              
          );
          $this->m_rawat_jalan->insert_log_icare($log_icare);

                $errorMessage = isset($data['metaData']['message']) ? $data['metaData']['message'] : 'Tidak ada pesan error yang tersedia.';
                
                // Menyusun pesan akhir
                $finalMessage = "Respons bpjs: " . htmlspecialchars($errorMessage);
                        $this->tnotification->sent_notification("error",$finalMessage);
                        redirect("medis/rawat_jalan/add/" . $No_Reg . '/' . $No_Reg);
                    }
    }

    public function icare_edit($no_bpjs="",$kode_dokter_jkn="",$No_Reg="",$kode_dokter_rs="") {
        
        // Mengatur konsumen dan secret key
        $kode_dokter_jkn = intval($kode_dokter_jkn);
        $this->load->helper('signature');
    
        // Data dan secret key
        $constid = "7749";
        $secretKey = "7hEF4A8987";
    
        // Generate signature
        $signatureData = generate_signature($constid, $secretKey);

        // var_dump($signatureData['X-timestamp'],$signatureData['X-signature']);
        // die;

        // Menyiapkan cURL
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apijkn.bpjs-kesehatan.go.id/wsihs/api/rs/validate',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode(array(
                "param" => $no_bpjs,
                "kodedokter" => $kode_dokter_jkn
            )),
            CURLOPT_HTTPHEADER => array(
                'X-cons-id: ' . $signatureData['X-cons-id'],
                'X-timestamp: ' . $signatureData['X-timestamp'],
                'X-signature: ' . $signatureData['X-signature'],
                'user_key: 766ea39f78ae41ee1a3bd95cd1b75d39',
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);

        // var_dump($response);
        // die;

        if (curl_errno($curl)) {
            echo 'Curl error: ' . curl_error($curl);
            return;
        }

        curl_close($curl);

        $data = json_decode($response, true);
 
        if (isset($data['response'])) {
            $nilairespon = $data['response'];
            $kunci = $constid . $secretKey . $signatureData['X-timestamp'];

            // Dekripsi dan dekompresi
            $hasilakhir = $this->decompress($this->stringDecrypt($kunci, $nilairespon));

            // var_dump($hasilakhir);
            // die;

            // Mengonversi hasil akhir dari JSON menjadi array
             $hasilArray = json_decode($hasilakhir, true);
    
                // Memeriksa dan mengambil URL jika ada
                if (isset($hasilArray['url'])) {
                    $url = $hasilArray['url']; // Mengambil nilai URL
                    // Menampilkan hanya URL
                    $keterangan = $data['metaData']['message'];
                    $log_icare = array (
                        date('Y-m-d H:i:s'),
                        $kode_dokter_rs,
                        $kode_dokter_jkn,
                        $No_Reg,
                        $keterangan
                        
                    );
                    $this->m_rawat_jalan->insert_log_icare($log_icare);
                        redirect($url);
    
                    
                } else {
                    // Jika tidak ada URL, Anda bisa menampilkan pesan kesalahan atau tindakan lain

                    $keterangan = $data['metaData']['message'];
                    $log_icare = array (
                        date('Y-m-d H:i:s'),
                        $kode_dokter_rs,
                        $kode_dokter_jkn,
                        $No_Reg,
                        $keterangan
                        
                    );
                    $this->m_rawat_jalan->insert_log_icare($log_icare);
                
                    $errorMessage = isset($data['metaData']['message']) ? $data['metaData']['message'] : 'URL Tidak ditemukan.';
                
                    // Menyusun pesan akhir
                    $finalMessage = "Respons bpjs: " . htmlspecialchars($errorMessage);
                            $this->tnotification->sent_notification("error",$finalMessage);
                            redirect("medis/rawat_jalan/add/" . $No_Reg . '/' . $No_Reg);
                }

            // echo $hasilakhir;
        } else {
          // Mengambil pesan dari metaData jika ada

          $keterangan = $data['metaData']['message'];
          $log_icare = array (
              date('Y-m-d H:i:s'),
              $kode_dokter_rs,
              $kode_dokter_jkn,
              $No_Reg,
              $keterangan
              
          );
          $this->m_rawat_jalan->insert_log_icare($log_icare);
                $errorMessage = isset($data['metaData']['message']) ? $data['metaData']['message'] : 'Tidak ada pesan error yang tersedia.';
                
                // Menyusun pesan akhir
                $finalMessage = "Respons bpjs: " . htmlspecialchars($errorMessage);
                        $this->tnotification->sent_notification("error",$finalMessage);
                        redirect("medis/rawat_jalan/add/" . $No_Reg . '/' . $No_Reg);
                    }
    }
    // Fungsi untuk mendekripsi string
    private function stringDecrypt($key, $string) {
        $encrypt_method = 'AES-256-CBC';
        $key_hash = hex2bin(hash('sha256', $key));
        $iv = substr(hex2bin(hash('sha256', $key)), 0, 16);
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key_hash, OPENSSL_RAW_DATA, $iv);
        return $output;
    }

    // Fungsi untuk mendekompresi string
    private function decompress($string) {
        return \LZCompressor\LZString::decompressFromEncodedURIComponent($string);
        
    }
}

    ?>