<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bpjs21 {

    function getUrlWs() {
        $url = "http://192.168.20.7/WsLokalRest21/";
        return $url;
    }

    function getConsId() {
        $consId = '29595';
        return $consId;
    }

    function getSecretKey() {
        $secretKey = 'rs098muh47jog2';
        return $secretKey;
    }

    function getPPKRs() {
        $PPKRs = '0179R025';
        return $PPKRs;
    }

    function gettSTamp() {
        date_default_timezone_set('UTC');
        $tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
        return $tStamp;
    }

    function getSignature() {
        $data = $this->getConsId();
        $secretKey = $this->getSecretKey();
        $signature = hash_hmac('sha256', $data . "&" . $this->gettSTamp(), $secretKey, true);
        $encodedSignature = base64_encode($signature);
        return $encodedSignature;
    }

    function Header() {
        $headers = array(
            "Accept: application/json; charset=utf-8",
            "X-cons-id:" . $this->getConsId(),
            "X-timestamp: " . $this->gettSTamp(),
            "X-signature: " . $this->getSignature()
        );
        return $headers;
    }

    function getPesertaBpjs($nobpjs) {
        $response = "" . $this->getUrlWs() . "Peserta/Peserta/$nobpjs";
        $msg = $this->Request($response);
        return $msg['response']['peserta']['nama'];
    }
    
    function updtglplg($nosep,$tglplng) {
        $url = "" . $this->getUrlWs() . "Sep/updtglplg";
        $response = '{  
            "request": 
                {    
                "t_sep":
                    {
                        "noSep":"'.$nosep.'",
                        "tglPlg":"'.$tglplng.'",
                        "ppkPelayanan":"'.$this->getPPKRs().'"
                    }
                }
        }   ';
        $msg = $this->Request2($url,$response);
        return $msg['metadata']['message'];
    }

    function Request($response) {
        $ch = curl_init($response);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->Header());
        $responses = curl_exec($ch);
        $msg = json_decode($responses, true);
        return $msg;
    }
    
    function Request2($url,$response) {
        $ch = curl_init($response);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->Header());
        $responses = curl_exec($ch);
        $msg = json_decode($responses, true);
        return $msg;
    }
}