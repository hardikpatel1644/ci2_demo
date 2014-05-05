<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    }

    /**
     * Index Page for this controller.
     *
     */
    public function index() {
        //Standard Functions
        $data['title'] = 'Admin : Login';
        $data['page_view'] = 'login/index';
        $data['js_view'] = '';
        $data['css_view'] = '';
        $data['section'] = 'login';

        if ($this->form_validation->run('login') == FALSE) {
            $data['ssEmail'] = '';
            if (isset($_COOKIE['uid']) && $_COOKIE['uid'] != '') {
                $this->load->model('user_model');
                $uid = base64_decode($_COOKIE['uid']);
                $userdetails = $this->user_model->get_user_data($uid);
                $data['ssEmail'] = $userdetails['email'];
            }
            $this->load->view('login_layout', $data);
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            if ($this->auth->login($email, $password)) {
                if ($this->session->userdata('url')) {
                    $url = $this->session->userdata('url');
                    redirect($url['url']);
                } else {
                    $auth = $this->session->userdata('auth');
                    if ($this->input->post('remember')) {
                        $this->load->helper('cookie');
                        $this->set_cookie("uid", base64_encode($auth['id']), time() + 86400);
                        setcookie("uid", base64_encode($auth['id']), time() + 86400);
                    }
                    redirect(site_url('welcome'));
                }
            } else {
                //Standard functions
                $data['msg'] = '<div class="error">Email and password combination incorrect.</div>';
                $this->load->view('login_layout', $data);
            }
        }
    }

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
