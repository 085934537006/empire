<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	    if ($this->session->userdata('isLogin')) { 
	        redirect('login');
	    }
		//$this->load->database();
		$this->load->model('model_user');
                
	}

	public function index()
	{	
		if(!$this->input->post('buttonSubmit'))
		{
			$data['message'] = '';
			$this->load->view('view_register', $data);
		}
		else
		{
			//$this->load->library('form_validation');
			if($this->form_validation->run('addemp'))
			{
                $u_email = $this->input->post('u_email');
				$f_name = $this->input->post('f_name');
                $l_name = $this->input->post('l_name');
                $u_pass = md5($this->input->post('u_pass'));
                $u_bday = $this->input->post('u_bday');
                $u_type = 0;
                $u_mobile = $this->input->post('u_mobile');
                $u_address = $this->input->post('u_address');
				$this->model_user->insert($u_email,$f_name,$l_name,$u_bday,$u_type,$u_pass,$u_mobile,$u_address);
				$this->session->set_flashdata('message','User Successfully Created.');
				redirect('login');
			}
			else
			{
				$data['message'] = validation_errors();
				$this->load->view('view_register', $data);
			}
		}
	}
}