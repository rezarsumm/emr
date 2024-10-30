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

        require_once APPPATH . 'libraries/lzstring/src/LZCompressor/LZString.php';

    }

// bridging icare bpjs
    

    public function index($no_bpjs="",$kode_dokter_jkn="") {

        // var_dump($kode_dokter_jkn);
        // die;
        // Mengatur konsumen dan secret key
        $this->load->helper('signature');
    
        // Data dan secret key
        $constid = "14170";
        $secretKey = "xu6zblhi49";
    
        // Generate signature
        $signatureData = generate_signature($constid, $secretKey);

        // var_dump($signatureData['X-timestamp'],$signatureData['X-signature']);
        // die;

        // Menyiapkan cURL
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apijkn-dev.bpjs-kesehatan.go.id/ihs_dev/api/rs/validate',
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
                'user_key: 2f51b00ee2808e7698e1e09dc01c11ad',
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
            echo $hasilakhir;
        } else {
            echo "Response tidak valid.";
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