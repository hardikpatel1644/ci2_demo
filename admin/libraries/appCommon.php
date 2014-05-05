<?php

class appCommon {

    public $oForm;
    public $oRequest;
    public $ssModuleName;
    public $ssModelName;
    public $ssBaseId;
    public $ssTableName;
    public $oContent;
    public $oQuery;
    public $oPager;
    public $oResults;
    public $ssTitle;
    public $ssSortOn;
    public $ssSortBy;
    public $snItemPerPage;
    public $aSearchOptions;
    public $aFields;
    public $ssLink;
    public $ssDivId = 'getList';
    public $ssParams = '';
    public $ssShowDeleteButton = true;
    public $ssShowCreateButton = true;
    public $ssShowSendButton = false; // Shows Send Button.
    public $ssShowPaging = true;
    public $ssShowCheckBox = true;
    public $ssButtonMenu = false;
    public $ssButtonTopMenu = false;
    public $ssRenderListFileName = 'global/recordListing';
    public $ssMetaDataRequired = false;
    public $ssRankRequired = false;
    public $ssPostForm = false;
    public $ssDeleteButton = false;
    public $ssPageView = '';
    
                function appCommon($ssModuleName) {
        $CI = & get_instance();
        $CI->load->helper('url');
        $CI->load->library('session');
        $CI->config->item('base_url');
        $CI->load->model($this->ssModelName);

        $this->ssModuleName = strtolower($CI->uri->segment(1));
        $this->oRequest = $_REQUEST;
    }

    /*
     *  THis function for get All Records For Listing
     */

    public function getList() {
        $CI = & get_instance();
        
    }

    /*
     *  THis function for Generate Form
     */

    public function processForm($ssValidateRule, $asPost) {
        if ($ssValidateRule != "" && $asPost != '') {
            if (isset($_POST) && !empty($_POST)) {
                if ($this->form_validation->run($ssValidateRule) == FALSE) {
                    $this->load->view('layout', $data);
                } else {
                    $CI->$ssModelName->insertData($asPost);
                    $this->session->set_flashdata('succ_msg', '$ssModuleName has been added succefully');
                    redirect(site_url($ssModuleName . '/index'));
                }
            }
        }
        return false;
    }

}
