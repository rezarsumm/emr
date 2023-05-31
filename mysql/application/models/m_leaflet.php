<?php

class m_leaflet extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
        $this->load->library('encrypt');
    }
    
    function insert($params) {
        $sql = "INSERT INTO TAC_COM_PARAM_LEAFLET( FS_NM_JUDUL, filename, filesize, mdb, mdd_date, mdd_time)
                VALUES(?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    
    function delete($params) {
        $sql = "DELETE FROM TAC_COM_PARAM_LEAFLET WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }
    
    function get_leaflet($params) {
        $sql = "SELECT *
                FROM TAC_COM_PARAM_LEAFLET
                ORDER BY mdd_date DESC,mdd_time DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_leaflet_by_id($params) {
        $sql = "SELECT *
                FROM TAC_COM_PARAM_LEAFLET
                WHERE FS_KD_TRS = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
}