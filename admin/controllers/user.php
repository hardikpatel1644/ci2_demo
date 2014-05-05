<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
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

        $this->load->model('user_model');
        $this->load->library('pagination');

        //Standard Functions
        $data['title'] = 'Admin : User';
        $data['page_view'] = 'user/index';
        $data['js_view'] = '';
        $data['css_view'] = '';
        $data['section'] = 'user';

        $snId = $this->uri->segment(3);
        $ssActionType = $this->uri->segment(4);

        $config['base_url'] = site_url('user/index/page');
        $config['total_rows'] = '20';
        $config['per_page'] = '3';

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();


        if ($snId != '' && $ssActionType != '') {
            if ($ssActionType == 'status') {
                $this->user_model->updateStatus($snId);
                $this->session->set_flashdata('succ_msg', 'User has been updated succefully');
                redirect('user/index');
            }
            if ($ssActionType == 'delete') {
                $this->user_model->deleteData($snId);
                $this->session->set_flashdata('succ_msg', 'User has been deleted succefully');
                redirect('user/index');
            }
        }
        $asResult = $this->user_model->getAllData();
        $data['asResult'] = $asResult;
        //echo "<pre>";print_r($asResult);exit;
        $this->load->view('layout', $data);
    }

    /**
     *
     * Change password action for this controller
     * @return unknown_type
     */
    public function changepassword() {
        $asUser = $this->session->userdata('auth');
        if (!$asUser)
            redirect(site_url('login/index'));



        //Standard Functions
        $data['title'] = 'Admin : Change Password';
        $data['page_view'] = 'user/changepassword';
        $data['js_view'] = '';
        $data['css_view'] = '';
        $data['section'] = 'user';

        if (isset($_POST)) {
            if ($this->form_validation->run('user/changepassword') == FALSE) {
                $this->load->view('layout', $data);
            } else {
                $oldPassword = $this->input->post('oldPassword');
                $newPassword = $this->input->post('newPassword');
                $changePassword = $this->input->post('changePassword');
            }
        } else
            $this->load->view('layout', $data);
    }

    /**
     *
     * Forgot password for this controller
     * @return unknown_type
     */
    public function forgotpassword() {

        //Standard Functions
        $data['title'] = 'Admin : Forgot Password';
        $data['page_view'] = 'user/forgotpassword';
        $data['js_view'] = '';
        $data['css_view'] = '';
        $data['section'] = 'user';

        if (isset($_POST)) {
            if ($this->form_validation->run('forgot_password') == FALSE) {
                $this->load->view('login_layout', $data);
                return true;
            } else {
                $asAdmin = $this->user_model->getAdminData(); // Get admin data

                $ssEmail = $this->input->post('femail');
                $this->auth->sendEmailForgotpass($ssEmail, $asAdmin);
                $this->session->set_flashdata('succ_msg', '<div id="success" class="success">Email has been send successfully. Please check your mail for new password.</div>');
                redirect('user/forgotpassword');
            }
        } else
            $this->load->view('login_layout', $data);
    }

    /**
     * Function to validate unique email
     * @param $ssValue string
     * return boolean
     */
    public function valid_email($ssValue) {

        $asUser = $this->user_model->getDataByFieldName($ssValue, 'email');

        if ($asUser) {
            $this->form_validation->set_message('valid_email', 'Email does not exist');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
