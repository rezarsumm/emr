<?php

class m_jabatan extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    //insert data
    function insert_jabatan($params) {
        $sql = "INSERT INTO jabatan ( jabatan_parent, jabatan_nama, mdb, mdd)
            VALUES ( ?, ?, ?, NOW())";
        return $this->db->query($sql, $params);
    }

    //update data
    function update_jabatan($params) {
        $sql = "UPDATE jabatan 
            SET  jabatan_parent = ?, jabatan_nama = ?, mdb = ?, mdd = NOW() WHERE jabatan_id = ?";
        return $this->db->query($sql, $params);
    }

    //delete data
    function delete_jabatan($params) {
        $sql = "DELETE FROM jabatan WHERE jabatan_id = ?";
        return $this->db->query($sql, $params);
    }

    //get all data
    function get_all_jabatan() {
        $sql = "SELECT * FROM jabatan";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    //get by id for searching
    function get_jabatan_by_id($id) {
        $sql = "SELECT * FROM jabatan WHERE jabatan_id = ?";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    //get total data
    function get_total_jabatan($params) {
        $sql = "SELECT COUNT(*)'total' FROM jabatan";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result['total'];
        } else {
            return 0;
        }
    }

    //get all data for pagination
    function get_all_jabatan_limit($params) {
        $sql = "SELECT * FROM jabatan LIMIT ?, ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    // get all jabatan name by parent
    function get_all_jabs_by_parent($params) {
        $sql = "SELECT * FROM jabatan WHERE jabatan_parent = ?
            ORDER BY jabatan_nama ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    //gabung get_all_jabatan_limit + get_all_jabatan_by_parent
    function get_all_jabatan_by_parent($params) {
        $sql = "SELECT * FROM jabatan WHERE jabatan_parent = ? 
            ORDER BY jabatan_nama ASC";
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
