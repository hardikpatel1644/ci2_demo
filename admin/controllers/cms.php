<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cms extends CI_Controller {

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        $this->load->library('appCommon', array('ssModuleName' => 'cms'));
        $this->oAppCommon = new appCommon('cms');



        $this->oAppCommon->ssModuleName = "cms";
        $this->oAppCommon->ssBaseId = 'id_cms';
        $this->oAppCommon->ssModelName = 'cms_model';
        // Table Name Must be in Camel case later
        $this->oAppCommon->ssTableName = 'Cms';
        $this->oAppCommon->ssLink = 'cms/index';
        $this->oAppCommon->ssRankRequired = true;
        $this->oAppCommon->ssShowCreateButton = true;
        $this->oAppCommon->ssShowDeleteButton = true;
        $this->oAppCommon->ssShowCheckBox = false;
        $this->oAppCommon->ssMetaDataRequired = true;


        $this->load->model('cms_model');
        $this->load->model('user_model');
        $this->load->helper(array('form', 'url'));
        $asUser = $this->session->userdata('auth');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    }

    /**
     * Index Page for this controller.
     *
     */
    public function index() {
        $asUser = $this->session->userdata('auth');

        if (!$asUser)
            redirect(site_url('login/index'));


        $this->load->library('pagination');

        //Standard Functions
        $data['title'] = 'Admin : Cms';
        $data['page_view'] = 'cms/index';
        $data['js_view'] = '';
        $data['css_view'] = '';
        $data['section'] = 'cms';

        $snId = $this->uri->segment(3);
        $ssActionType = $this->uri->segment(4);
        $snOffset = ($this->input->get('per_page') != '' ? $this->input->get('per_page') : 0);
        $config['base_url'] = site_url('cms/index?page=' . $snOffset);
        $config['total_rows'] = $this->cms_model->getTotal();
        $config['per_page'] = ADMIN_PER_PAGE;
        $config['num_links'] = 2;
        $config['first_link'] = 'First';
        $config['page_query_string'] = TRUE;
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<div>';
        $config['full_tag_open'] = '<p>';
        $config['first_tag_close'] = '</div>';

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();


        if ($snId != '' && $ssActionType != '') {
            if ($ssActionType == 'status') {
                $this->cms_model->updateStatus($snId);
                $this->session->set_flashdata('succ_msg', 'Cms has been updated succefully');
                redirect('cms/index');
            }
            if ($ssActionType == 'delete') {
                $this->cms_model->deleteData($snId);
                $this->session->set_flashdata('succ_msg', 'Cms has been deleted succefully');
                redirect('cms/index');
            }
        }
        $asResult = $this->cms_model->getAllData($snOffset, ADMIN_PER_PAGE);
        $data['asResult'] = $asResult;

        $this->load->view('layout', $data);
    }

    /**
     * Add Page for this controller.
     *
     */
    public function add() {

        $asUser = $this->session->userdata('auth');
        if (!$asUser)
            redirect(site_url('login/index'));

        $this->load->model('cms_model');
        //Standard Functions
        $data['title'] = 'Admin : Cms - Add';
        $data['page_view'] = 'cms/add';
        $data['js_view'] = '';
        $data['css_view'] = '';
        $data['section'] = 'cms';
        if (isset($_POST) && !empty($_POST)) {
            if ($this->form_validation->run('cms/add') == FALSE) {
                $this->load->view('layout', $data);
            } else {
                $asPost['title'] = $this->input->post('title');
                $asPost['short_desc'] = $this->input->post('short_desc');
                $asPost['long_desc'] = $this->input->post('long_desc');
                $asPost['created_at'] = date('Y-m-d H:i:s');
                $this->cms_model->insertData($asPost);
                $this->session->set_flashdata('succ_msg', 'Cms has been added succefully');
                redirect(site_url('cms/index'));
            }
        } else
            $this->load->view('layout', $data);
    }

    /**
     * Function to get offset for page
     * @return type
     */
    function getOffset() {
        $page = $this->uri->segment('4');
        if (!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        return $offset;
    }

}

/* End of file cms.php */
/* Location: ./application/controllers/cms.php */
