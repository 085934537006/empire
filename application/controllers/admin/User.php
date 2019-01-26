<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		//$this->load->database();
		$this->load->model('model_user');
                
	}
	public function index()
	{
	    if ( ! $this->session->userdata('isLogin') || ($this->session->userdata('adminlevel') != 2)) { 
	        redirect('login');
	    }
        $data['emp'] = $this->model_user->getAll();

        $this->load->view('admin/view_user', $data);  
    }

	public function add()
	{	

	    if ( ! $this->session->userdata('isLogin') || ($this->session->userdata('adminlevel') != 2)) { 
	        redirect('login');
	    }
		if(!$this->input->post('buttonSubmit'))
		{
			$data['message'] = '';
			$this->load->view('admin/view_adduser', $data);
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
                $u_type = $this->getAdminLevelByString($this->input->post('u_type'));
                $u_mobile = $this->input->post('u_mobile');
                $u_address = $this->input->post('u_address');
				$this->model_user->insert($u_email,$f_name,$l_name,$u_bday,$u_type,$u_pass,$u_mobile,$u_address);
				$this->session->set_flashdata('message','User Successfully Created.');
				redirect('admin/user');
			}
			else
			{
				$data['message'] = validation_errors();
				$this->load->view('admin/view_adduser', $data);
			}
		}
	}

	private function getAdminLevelByString($str)
	{
		if(!strcmp($str, 'admin')) return 2;
		else if(!strcmp($str, 'employee')) return 1;
		else return 0;
	}

	public function edit($cid)
	{	
		if(!$this->input->post('buttonSubmit'))
		{
			$data['message'] = '';
			$userRow = $this->model_user->get($cid);
			$data['userRow'] = $userRow;
			$this->load->view('admin/view_edituser', $data);
		}
		else
		{
			if($this->form_validation->run('editemp'))
			{
				$f_name = $this->input->post('f_name');
                $l_name = $this->input->post('l_name');
                $u_bday = $this->input->post('u_bday');
                $u_type = $this->getAdminLevelByString($this->input->post('u_type'));
                $u_pass = md5($this->input->post('u_pass'));
                $u_mobile = $this->input->post('u_mobile');
                $u_address = $this->input->post('u_address');
				$u_id = $this->input->post('u_id');
				$this->model_user->update($f_name,$l_name,$u_bday,$u_type,$u_pass,$u_mobile,$u_address,$u_id);
				redirect(site_url('admin/user'));
			}
			else
			{
				$data['message'] = validation_errors();  //data ta message name er lebel er kase pathay
				$this->load->view('view_user', $data);
			}
		}
	}

	public function delete($cid)
	{	
	    if ( ! $this->session->userdata('isLogin') || ($this->session->userdata('adminlevel') != 2)) { 
	        redirect('login');
	    }
        $this->model_user->delete($cid);
        $this->session->set_flashdata('message','User Successfully deleted.');
        redirect('admin/user');
	}
}

