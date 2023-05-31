<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class m_preferences extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    
    //insert data
    function insert($params) {
        $sql = "INSERT INTO PKU.dbo.tac_com_preferences (pref_group, pref_nm, pref_value, mdb, mdd)
            VALUES (?, ?, ?, ?, GETDATE())";
        return $this->db->query($sql, $params);
    }

    //update data
    function update($params) {
        $sql = "UPDATE PKU.dbo.tac_com_preferences 
            SET pref_group = ?, pref_nm = ?, pref_value = ?,
            mdb = ?, mdd = GETDATE() WHERE pref_id = ?";
        return $this->db->query($sql, $params);
    }

    //delete data
    function delete($params) {
        $sql = "DELETE FROM PKU.dbo.tac_com_preferences WHERE pref_id = ?";
        return $this->db->query($sql, $params);
    }

    //get all data
    function get_all_preferences() {
        $sql = "SELECT * FROM PKU.dbo.tac_com_preferences ";
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
    function get_preferences_by_id($id) {
        $sql = "SELECT * FROM PKU.dbo.tac_com_preferences WHERE pref_id = ?";
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
    function get_total_preferences() {
        $sql = "SELECT COUNT(*)'total' FROM PKU.dbo.tac_com_preferences";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result['total'];
        } else {
            return 0;
        }
    }
    
    //get all data for pagination
    function get_all_preferences_limit($params) {
        $sql = "SELECT * FROM PKU.dbo.tac_com_preferences 
            ORDER BY pref_id";
        $query = $this->db->query($sql, $params);
        
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    // get all unit name by parent
//    function get_all_unit_by_parent($params) {
//        $sql = "SELECT * FROM PKU.dbo.tac_com_preferences WHERE unit_parent = ?
//            ORDER BY unit_nm ASC";
//        $query = $this->db->query($sql,$params);
//        if ($query->num_rows() > 0) {
//            $result = $query->result_array();
//            $query->free_result();
//            return $result;
//        } else {
//            return array();
//        }
//    }
    
}