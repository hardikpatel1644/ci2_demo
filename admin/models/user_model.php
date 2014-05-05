<?php

class User_model extends CI_Model {

    /**
     * Function for get user data
     * @param $idUser
     * return array
     */
    function getDataById($snId = 0) {
        $ssQuery = $this->db->query('SELECT u.* FROM user as u WHERE u.id = ' . $snId . '');

        if ($ssQuery->num_rows() != 0) {
            return $ssQuery->row_array();
        }
        return array();
    }

    /**
     * Function for get All data
     * return array
     */
    function getAllData() {
        $ssQuery = $this->db->query('SELECT u.* FROM  user as u WHERE u.user_type = "user" ORDER BY  u.id ASC ');
        if ($ssQuery->num_rows() != 0) {
            return $ssQuery->result_array();
        }
        return array();
    }

    /**
     * Function for update status of user
     * @param $snId = id
     * return true or false
     */
    function updateStatus($snId) {
        if ($snId != '') {
            $asResult = $this->getDataById($snId);
            $asData = array('status' => ($asResult['status'] == 1) ? '0' : 1);
            $this->updateData($snId, $asData);
        }
        return false;
    }

    /**
     * Function for insert data
     * @param $asData  =  array
     * return last inserted id
     */
    function insertData($asData = array()) {
        if (!empty($asData)) {
            $this->db->insert('user', $asData);
            return $this->db->insert_id();
        }
        return false;
    }

    /**
     * Function for update data
     * @param $snId = id
     * @param $asData  =  array
     * return true or false
     */
    function updateData($snId, $asData) {
        if ($snId != '' && is_numeric($snId) && !empty($asData)) {
            $this->db->where('id', $snId);
            $this->db->update('user', $asData);
            return true;
        }
        return false;
    }

    /**
     * Function for delete data
     * @param $snId = id	 
     * return true or false
     */
    function deleteData($snId) {
        if ($snId != '' && is_numeric($snId)) {
            $this->db->where('id', $snId);
            $this->db->delete('user');
            return true;
        }
        return false;
    }

    /**
     * Function for get user data
     * @param $ssValue
     * @param $ssField
     * return array
     */
    function getDataByFieldName($ssValue, $ssField) {
        $ssQuery = $this->db->query('SELECT u.* FROM user as u WHERE ' . $ssField . ' = ' . $ssValue . '');

        if ($ssQuery->num_rows() != 0) {
            return $ssQuery->row_array();
        }
        return array();
    }

    /**
     * Function for get admin data	 
     * return array
     */
    function getAdminData() {
        $ssQuery = $this->db->query('SELECT u.* FROM user as u WHERE user_type="admin"');

        if ($ssQuery->num_rows() != 0) {
            return $ssQuery->row_array();
        }
        return array();
    }

}
