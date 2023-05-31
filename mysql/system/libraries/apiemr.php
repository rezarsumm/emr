<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Apiemr {

    function getUrlWS() {
        $UrlWS = "http://192.168.20.18/pkuapi/";
        return $UrlWS;
    }

    public function getDokter() {
        $response = "" . $this->getUrlWs() . "getDokter.php";
        $msg = $this->Request($response);
        return ($msg);
    }

    public function getPasienPoliByDokter($FS_TGL_MASUK, $FS_KD_PEG) {
        $response = "" . $this->getUrlWs() . "getPasienPoliByDokter.php?FS_TGL_MASUK=$FS_TGL_MASUK&FS_KD_PEG=$FS_KD_PEG";
        $msg = $this->Request($response);
        return ($msg);
    }

    public function getpxbyrm($now, $FS_MR) {
        $response = "" . $this->getUrlWs() . "getpxbyrm.php?now=$now&FS_MR=$FS_MR";
        $msg = $this->Request($response);
        return ($msg);
    }

    public function getpxhistory($now, $medis, $FS_MR) {
        $response = "" . $this->getUrlWs() . "getpxhistory.php?now=$now&medis=$medis&FS_MR=$FS_MR";
        $msg = $this->Request($response);
        return ($msg);
    }

    public function getRiwayatRawatInap($FS_MR) {
        $response = "" . $this->getUrlWs() . "getRiwayatRawatInap.php?FS_MR=$FS_MR";
        $msg = $this->Request($response);
        return ($msg);
    }
    
    public function getRiwayatRawatByRmByJenisReg($FS_MR,$FS_KD_JENIS_REG) {
        $response = "" . $this->getUrlWs() . "getRiwayatRawatByRmByJenisReg.php?FS_MR=$FS_MR&FS_KD_JENIS_REG=$FS_KD_JENIS_REG";
        $msg = $this->Request($response);
        return ($msg);
    }

    public function getRiwayatRawatJalan($FS_MR) {
        $response = "" . $this->getUrlWs() . "getRiwayatRawatJalan.php?FS_MR=$FS_MR";
        $msg = $this->Request($response);
        return ($msg);
    }
    
    public function getPasienBangsalAdmin($date,$date2) {
        $response = "" . $this->getUrlWs() . "getPasienBangsalAdmin.php?date=$date&date2=$date2";
        $msg = $this->Request($response);
        return ($msg);
    }
    
    public function getPasienBangsal($date,$date2,$FS_KD_PEG) {
        $response = "" . $this->getUrlWs() . "getPasienBangsal.php?date=$date&date2=$date2&FS_KD_PEG=$FS_KD_PEG";
        $msg = $this->Request($response);
        return ($msg);
    }
    
    public function getPasienByRg($FS_KD_REG) {
        $response = "" . $this->getUrlWs() . "getPasienByRg.php?FS_KD_REG=$FS_KD_REG";
        $msg = $this->Request($response);
        return ($msg);
    }
    
    public function getPasienBangsalByBangsal($date,$date2,$fs_kd_layanan) {
        $response = "" . $this->getUrlWs() . "getPasienBangsalByBangsal.php?date=$date&date2=$date&fs_kd_layanan=$fs_kd_layanan";
        $msg = $this->Request($response);
        return ($msg);
    }
    
    public function getObat() {
        $response = "" . $this->getUrlWs() . "getObat.php";
        $msg = $this->Request($response);
        return ($msg);
    }
    
    public function getUnitKerja() {
        $response = "" . $this->getUrlWs() . "getUnitKerja.php";
        $msg = $this->Request($response);
        return ($msg);
    }
    
    public function getUnitKerjaLayanan() {
        $response = "" . $this->getUrlWs() . "getUnitKerjaLayanan.php";
        $msg = $this->Request($response);
        return ($msg);
    }
    public function getHeader1() {
        $response = "" . $this->getUrlWs() . "getHeader1.php";
        $msg = $this->Request($response);
        return ($msg);
    }
    public function getHeader2() {
        $response = "" . $this->getUrlWs() . "getHeader2.php";
        $msg = $this->Request($response);
        return ($msg);
    }
    public function getAlamat() {
        $response = "" . $this->getUrlWs() . "getAlamat.php";
        $msg = $this->Request($response);
        return ($msg);
    }
    
    public function getDataLabByRg($FS_KD_REG) {
        $response = "" . $this->getUrlWs() . "getDataLabByRg.php?FS_KD_REG=$FS_KD_REG";
        $msg = $this->Request($response);
        return ($msg);
    }
    
    public function getDataRadByRg($FS_KD_REG) {
        $response = "" . $this->getUrlWs() . "getDataRadByRg.php?FS_KD_REG=$FS_KD_REG";
        $msg = $this->Request($response);
        return ($msg);
    }
    
    public function getDataTerapiByRg($FS_KD_REG) {
        $response = "" . $this->getUrlWs() . "getDataTerapiByRg.php?FS_KD_REG=$FS_KD_REG";
        $msg = $this->Request($response);
        return ($msg);
    }
    
    public function getDataOrderLabByRg($FS_KD_REG) {
        $response = "" . $this->getUrlWs() . "getDataOrderLabByRg.php?FS_KD_REG=$FS_KD_REG";
        $msg = $this->Request($response);
        return ($msg);
    }
    
    public function getDataOrderRadByRg($FS_KD_REG) {
        $response = "" . $this->getUrlWs() . "getDataOrderRadByRg.php?FS_KD_REG=$FS_KD_REG";
        $msg = $this->Request($response);
        return ($msg);
    }
    
    public function getPasienPoliByDokterHd() {
        $response = "" . $this->getUrlWs() . "getPasienPoliByDokterHd.php";
        $msg = $this->Request($response);
        return ($msg);
    }

    function Request($response) {
        $ch = curl_init($response);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($ch, CURLOPT_HTTPHEADER, $this->Header());
        $responses = curl_exec($ch);
        $msg = json_decode($responses, true);
        return $msg;
    }

}