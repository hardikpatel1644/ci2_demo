<?php

class Cms_model extends CI_Model {

    /**
     * Function for get cms data
     * @param $snId
     * return array
     */
    function getDataById($snId = 0) {
        $ssQuery = $this->db->query('SELECT c.* FROM cms as c WHERE c.id_cms = ' . $snId . '');

        if ($ssQuery->num_rows() != 0) {
            return $ssQuery->row_array();
        }
        return array();
    }

    /**
     * Function for get All data
     * return array
     */
    function getAllData($snOffset, $snLimit) {

        echo $snOffset;
        if (isset($snOffset) && $snLimit != '' && is_numeric($snLimit)) {

            echo 'SELECT c.* FROM  cms as c ORDER BY  c.id_cms desc LIMIT ' . $snOffset . ',' . $snLimit;
            //exit;
            $ssQuery = $this->db->query('SELECT c.* FROM  cms as c ORDER BY  c.id_cms desc LIMIT ' . $snOffset . ',' . $snLimit);

            //echo $ssQuery;exit;
            if ($ssQuery->num_rows() != 0) {
                return $ssQuery->result_array();
            }
            return array();
        }
        return false;
    }

    /**
     * Function to get total
     * @return boolean
     */
    function getTotal() {
        $ssQuery = $this->db->query('SELECT c.* FROM  cms as c ORDER BY  c.id_cms desc ');
        if ($ssQuery->num_rows() != 0) {
            return $ssQuery->num_rows();
        }
        return false;
    }

    /**
     * Function for update status of cms
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
            $this->db->insert('cms', $asData);
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
            $this->db->where('id_cms', $snId);
            $this->db->update('cms', $asData);
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
            $this->db->where('id_cms', $snId);
            $this->db->delete('cms');
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
