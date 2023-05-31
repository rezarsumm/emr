<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_fisio extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_last_inserted_id() {
        return $this->db->insert_id();
    }
    
    function list_intervensi_umum_by_rg($params) {
        $sql = "SELECT FS_NM_INT_UMUM FROM
                TAC_RJ_FISIO4 a
                LEFT JOIN TAC_COM_FIS_MASTER_UMUM b ON a.FS_KD_FISIO_INTERVENSI_UMUM=b.FS_KD_TRS
                WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
}