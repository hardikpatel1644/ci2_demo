<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');		
		$user = $this->session->userdata('auth');
		
		if(!$user)		
			redirect(site_url('login/index'));
	
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		//Standard Functions
		$data['title'] = 'Admin : Dashboard';
		$data['page_view'] = 'welcome';
		$data['js_view'] = '';
		$data['css_view'] = '';
		$data['section'] = 'login';	
		$this->load->view('layout',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
