<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Logout extends CI_Controller {

    /**
     * Index page for Logout controller
     */
    public function index() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->auth->logout();

        $this->session->set_flashdata('succ_msg', '<div id="success" class="success">Logout successfully.</div>');
        if ($this->session->userdata('url')) {
            $url = $this->session->userdata('url');
            redirect($url['url']);
        } else {
            redirect(site_url('login/index'));
        }
    }

}

/* End of file logout.php */
/* Location: ./application/controllers/logout.php */
