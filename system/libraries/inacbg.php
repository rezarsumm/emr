<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class inacbg {

    function getKey() {
        $keyRS = "409ae4cd338c72016b21939d579cff0a62f27efdf3e65c72821b3d2d6366f359";
        return $keyRS;
    }

    function getUrlWS() {
        $UrlWS = "http://192.168.20.8/E-Klaim/ws.php";
        return $UrlWS;
    }

    function getKelasRS() {
        $kelasRS = "CS";
        return $kelasRS;
    }

    function mc_encrypt($data, $strkey) {
        $key = hex2bin($strkey);
        if (mb_strlen($key, "8bit") !== 32) {
            throw new Exception("Needs a 256-bit key!");
        }

        $iv_size = openssl_cipher_iv_length("aes-256-cbc");
        $iv = openssl_random_pseudo_bytes($iv_size);
        $encrypted = openssl_encrypt($data, "aes-256-cbc", $key, OPENSSL_RAW_DATA, $iv);
        $signature = mb_substr(hash_hmac("sha256", $encrypted, $key, true), 0, 10, "8bit");
        $encoded = chunk_split(base64_encode($signature . $iv . $encrypted));
        return $encoded;
    }

    function mc_decrypt($str, $strkey) {
        $key = hex2bin($strkey);
        if (mb_strlen($key, "8bit") !== 32) {
            throw new Exception("Needs a 256-bit key!");
        }

        $iv_size = openssl_cipher_iv_length("aes-256-cbc");
        $decoded = base64_decode($str);
        $signature = mb_substr($decoded, 0, 10, "8bit");
        $iv = mb_substr($decoded, 10, $iv_size, "8bit");
        $encrypted = mb_substr($decoded, $iv_size + 10, NULL, "8bit");
        $calc_signature = mb_substr(hash_hmac("sha256", $encrypted, $key, true), 0, 10, "8bit");
        if (!$this->mc_compare($signature, $calc_signature)) {
            return "SIGNATURE_NOT_MATCH";
        }

        $decrypted = openssl_decrypt($encrypted, "aes-256-cbc", $key, OPENSSL_RAW_DATA, $iv);
        return $decrypted;
    }

    function mc_compare($a, $b) {
        if (strlen($a) !== strlen($b)) {
            return false;
        }

        $result = 0;

        for ($i = 0; $i < strlen($a); $i ++) {
            $result |= ord($a[$i]) ^ ord($b[$i]);
        }

        return $result == 0;
    }

    // view file for view
    public function BuatKlaimBaru($nomor_kartu, $nomor_sep, $nomor_rm, $nama_pasien, $tgl_lahir, $gender) {
        $request = '{
                        "metadata":{
                            "method":"new_claim"
                        },
                        "data":{
                            "nomor_kartu":"' . $nomor_kartu . '",
                            "nomor_sep":"' . $nomor_sep . '",
                            "nomor_rm":"' . $nomor_rm . '",
                            "nama_pasien":"' . $nama_pasien . '",
                            "tgl_lahir":"' . $tgl_lahir . '",
                            "gender":"' . $gender . '"
                        }
                    }';
        $msg = $this->Request($request);
        return$msg['metadata']['message'];
    }

    function UpdateDataPasien($nomor_rmlama, $nomor_kartu, $nomor_rm, $nama_pasien, $tgl_lahir, $gender) {
        $request = '{
                        "metadata": {
                            "method": "update_patient",
                            "nomor_rm": "' . $nomor_rmlama . '"
                        },
                        "data": {
                            "nomor_kartu": "' . $nomor_kartu . '",
                            "nomor_rm": "' . $nomor_rm . '",
                            "nama_pasien": "' . $nama_pasien . '",
                            "tgl_lahir": "' . $tgl_lahir . '",
                            "gender": "' . $gender . '"
                        }
                   }';
        $msg = Request($request);
        echo $msg['metadata']['message'] . "";
    }

    function HapusDataPasien($nomor_rm, $coder_nik) {
        $request = '{
                        "metadata": {
                            "method": "delete_patient",
                        },
                        "data": {
                            "nomor_rm": "' . $nomor_rm . '",
                            "coder_nik": "' . $coder_nik . '"
                        }
                   }';
        $msg = Request($request);
        echo $msg['metadata']['message'] . "";
    }

    function UpdateDataKlaim($nomor_sep,$nomor_kartu,$tgl_masuk,$tgl_pulang,$jenis_rawat,$kelas_rawat,$adl_sub_acute,
                            $adl_chronic,$icu_indikator,$icu_los,$ventilator_hour,$upgrade_class_ind,$upgrade_class_class,
                            $upgrade_class_los,$add_payment_pct,$birth_weight,$discharge_status,$diagnosa,$procedure,
                            $tarif_rs,$tarif_poli_eks,$nama_dokter,$kode_tarif,$payor_id,$payor_cd,$cob_cd,$coder_nik){	
        $request ='{
                        "metadata": {
                            "method": "set_claim_data",
                            "nomor_sep": "'.$nomor_sep.'"
                        },
                        "data": {
                            "nomor_sep": "'.$nomor_sep.'",
                            "nomor_kartu": "'.$nomor_kartu.'",
                            "tgl_masuk": "'.$tgl_masuk.'",
                            "tgl_pulang": "'.$tgl_pulang.'",
                            "jenis_rawat": "'.$jenis_rawat.'",
                            "kelas_rawat": "'.$kelas_rawat.'",
                            "adl_sub_acute": "'.$adl_sub_acute.'",
                            "adl_chronic": "'.$adl_chronic.'",
                            "icu_indikator": "'.$icu_indikator.'",
                            "icu_los": "'.$icu_los.'",
                            "ventilator_hour": "'.$ventilator_hour.'",
                            "upgrade_class_ind": "'.$upgrade_class_ind.'",
                            "upgrade_class_class": "'.$upgrade_class_class.'",
                            "upgrade_class_los": "'.$upgrade_class_los.'",
                            "add_payment_pct": "'.$add_payment_pct.'",
                            "birth_weight": "'.$birth_weight.'",
                            "discharge_status": "'.$discharge_status.'",
                            "diagnosa": "'.$diagnosa.'",
                            "procedure": "'.$procedure.'",
                            "tarif_rs": "'.$tarif_rs.'",
                            "tarif_poli_eks": "'.$tarif_poli_eks.'",
                            "nama_dokter": "'.$nama_dokter.'",
                            "kode_tarif": "'.$kode_tarif.'",
                            "payor_id": "'.$payor_id.'",
                            "payor_cd": "'.$payor_cd.'",
                            "cob_cd": "'.$cob_cd.'",
                            "coder_nik": "'.$coder_nik.'"
                        }
                   }';
        //echo "Data : ".$request;
        $msg = $this->Request($request);
        return $msg['metadata']['message'];
    }

    function UpdateDataProsedur($nomor_sep, $procedure, $coder_nik) {
        $request = '{
                        "metadata": {
                            "method": "set_claim_data",
                            "nomor_sep": "' . $nomor_sep . '",
                        },
                        "data": {
                            "procedure": "' . $procedure . '",
                            "coder_nik": "' . $coder_nik . '"
                        }
                   }';
        $msg = $this->Request($request);
        echo $msg['metadata']['message'] . "";
    }

    function HapusSemuaProsedur($nomor_sep, $coder_nik) {
        $request = '{
                        "metadata": {
                            "method": "set_claim_data",
                            "nomor_sep": "' . $nomor_sep . '",
                        },
                            "data": {
                            "procedure": "#",
                            "coder_nik": "' . $coder_nik . '"
                        }
                   }';
        $msg = $this->Request($request);
        echo $msg['metadata']['message'] . "";
    }

    function GroupingStage1($nomor_sep, $coder_nik, $FS_KD_REG) {
        $request = '{
                        "metadata": {
                            "method":"grouper",
                            "stage":"1"
                        },
                        "data": {
                            "nomor_sep":"' . $nomor_sep . '"
                        }
                   }';
        $msg = $this->Request($request);
        return array($msg['metadata']['message'], $msg['response']['cbg']['code'], $msg['response']['cbg']['tariff'],
            $msg['tarif_alt'][0]['tarif_inacbg'], $msg['tarif_alt'][1]['tarif_inacbg'],
            $msg['tarif_alt'][2]['tarif_inacbg'], $msg, $msg['response']['cbg']['description']);
    }

    function GroupingStage2($nomor_sep, $special_cmg) {
        $request = '{
                        "metadata": {
                            "method":"grouper",
                            "stage":"2"
                        },
                        "data": {
                            "nomor_sep":"' . $nomor_sep . '",
                            "special_cmg": "' . $special_cmg . '"
                        }
                   }';
        $msg = Request($request);
        echo $msg['metadata']['message'] . "";
    }

    function FinalisasiKlaim($nomor_sep, $coder_nik) {
        $request = '{
                        "metadata": {
                            "method":"claim_final"
                        },
                        "data": {
                            "nomor_sep":"' . $nomor_sep . '",
                            "coder_nik": "' . $coder_nik . '"
                        }
                   }';
        $msg = $this->Request($request);
        return $msg['metadata']['message'];
    }

    function EditUlangKlaim($nomor_sep) {
        $request = '{
                        "metadata": {
                            "method":"reedit_claim"
                        },
                        "data": {
                            "nomor_sep":"' . $nomor_sep . '"
                        }
                   }';
        $msg = $this->Request($request);
        return $msg['metadata']['code'];
    }

    function KirimKlaimPeriodeKeDC($start_dt, $stop_dt, $jenis_rawat) {
        $request = '{
                        "metadata": {
                            "method":"send_claim"
                        },
                        "data": {
                            "start_dt":"' . $start_dt . '",
                            "stop_dt":"' . $stop_dt . '",
                            "jenis_rawat":"' . $jenis_rawat . '"
                        }
                   }';
        $msg = Request($request);
        echo $msg['metadata']['message'] . "";
    }

    function KirimKlaimIndividualKeDC($nomor_sep) {
        $request = '{
                        "metadata": {
                            "method":"send_claim_individual"
                        },
                        "data": {
                            "nomor_sep":"' . $nomor_sep . '"
                        }
                   }';
        $msg = $this->Request($request);
        echo $msg['metadata']['message'] . "";
    }

    function MenarikDataKlaimPeriode($start_dt, $stop_dt, $jenis_rawat) {
        $request = '{
                        "metadata": {
                            "method":"pull_claim"
                        },
                        "data": {
                            "start_dt":"' . $start_dt . '",
                            "stop_dt":"' . $stop_dt . '",
                            "jenis_rawat":"' . $jenis_rawat . '"
                        }
                   }';
        $msg = Request($request);
        echo $msg['metadata']['message'] . "";
    }

    function MengambilDataDetailPerklaim($nomor_sep) {
        $request = '{
                        "metadata": {
                            "method":"get_claim_data"
                        },
                        "data": {
                            "nomor_sep":"' . $nomor_sep . '"
                        }
                   }';
        $msg = $this->Request($request);
        return $msg['response']['data']['klaim_status_cd'];
    }

    function MengambilSetatusPerklaim($nomor_sep) {
        $request = '{
                        "metadata": {
                            "method":"get_claim_status"
                        },
                        "data": {
                            "nomor_sep":"' . $nomor_sep . '"
                        }
                   }';
        $msg = Request($request);
        echo $msg['metadata']['message'] . "";
    }

    function MenghapusKlaim($nomor_sep, $coder_nik) {
        $request = '{
                        "metadata": {
                            "method":"delete_claim"
                        },
                        "data": {
                            "nomor_sep":"' . $nomor_sep . '",
                            "coder_nik":"' . $coder_nik . '"
                        }
                  }';
        $msg = Request($request);
        echo $msg['metadata']['message'] . "";
    }

    function CetakKlaim($nomor_sep) {
        $request = '{
                        "metadata": {
                            "method": "claim_print"
                        },
                        "data": {
                            "nomor_sep": "' . $nomor_sep . '"
                        }
                   }';
        $msg = Request($request);
        echo $msg['metadata']['message'] . "";
    }

    function Request($request) {
        $json = $this->mc_encrypt($request, $this->getKey());
        $header = array("Content-Type: application/x-www-form-urlencoded");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->getUrlWS());
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        $response = curl_exec($ch);
        $first = strpos($response, "\n") + 1;
        $last = strrpos($response, "\n") - 1;
        $hasilresponse = substr($response, $first, strlen($response) - $first - $last);
        $hasildecrypt = $this->mc_decrypt($hasilresponse, $this->getKey());
        //echo $hasildecrypt;
        $msg = json_decode($hasildecrypt, true);
        return $msg;
    }

}
