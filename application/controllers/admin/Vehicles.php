<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vehicles extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        if ( ! $this->session->userdata('isLogin')) { 
            redirect('login');
        }
		
		$this->load->model('model_vehicle');
        $this->load->model('model_manufacturer');
        $this->load->model('model_car_model');
	}

	public function index()
	{
        $data['udata']=$this->session->userdata;
        if ($this->session->userdata('adminlevel') > 0) {
            $data['vehicles'] = $this->model_vehicle->getAll();
        } else {
            $data['vehicles'] = $this->model_vehicle->getAllByUserID($this->session->userdata('id'));
        }
        
        $data['manufacturers'] = $this->model_manufacturer->getAllManufacturers();
        $data['models'] = $this->model_car_model->getAllModels();
        
        //$this->load->view('view_vehicle', $data); 
        $this->parser->parse('admin/view_vehicle', $data);   
    }


	public function sell()
	{
        if ($this->input->server('REQUEST_METHOD') == 'POST'){	
            $vid = $this->input->post('vehicle_id');
            if(!$this->input->post('btn-sell'))
    		{
    			$this->model_vehicle->sell($vid);
    		}
            redirect('admin/vehicles');
        }
        else {
            redirect('admin/vehicles');
        }
	}


    public function grant()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST'){  
            $vid = $this->input->post('vehicle_id');
            if(!$this->input->post('btn-grant'))
            {
                $this->model_vehicle->grant($vid);
            }
            redirect('admin/vehicles');
        }
        else {
            redirect('admin/vehicles');
        }
    }


    public function deny()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST'){  
            $vid = $this->input->post('vehicle_id');
            if(!$this->input->post('btn-deny'))
            {
                $this->model_vehicle->deny($vid);
            }
            redirect('admin/vehicles');
        }
        else {
            redirect('admin/vehicles');
        }
    }


    public function togglefeatured()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST'){  
            $vid = $this->input->post('vehicle_id');
            $featured = $this->input->post('featured');
            if(!$this->input->post('btn-togglefeatured'))
            {
                $this->model_vehicle->setFeatured($vid, !$featured);
            }
            redirect('admin/vehicles');
        }
        else {
            redirect('admin/vehicles');
        }
    }


	public function add()
	{	
		if($this->input->post('buttonSubmit')) {
			$data['message'] = '';
		
				$this->form_validation->set_rules('manufacturer_id', 'Manufacturer', 'required');
				$this->form_validation->set_rules('model_id', 'Model', 'required');
				$this->form_validation->set_rules('category', 'Category ', 'required');
				$this->form_validation->set_rules('price', 'Price ', 'required');
				$this->form_validation->set_rules('mileage', 'Mileage', 'required');
				$this->form_validation->set_rules('registration_year', 'Registration Year Date', 'required');
				$this->form_validation->set_rules('gear', 'Gear', 'required');
				$this->form_validation->set_rules('doors', 'Number of Doors', 'required');
				$this->form_validation->set_rules('seats', 'Number of Seats', 'required');
				$this->form_validation->set_rules('tank', 'Tank capacity', 'required');
				$this->form_validation->set_rules('e_no', 'Engine No', 'required');
				$this->form_validation->set_rules('c_no', 'Chasis No', 'required');
				$this->form_validation->set_rules('v_color', 'Color', 'required');		
				
				if($this->form_validation->run() == FALSE)
				{
					//$data['vRow'] = $this->model_vehicle->get($cid);
                    $this->load->view('admin/view_vehicle');
				}
				else{
					
		
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_width']    = '2048';
            $config['max_height']   = '2048';
            $this->load->library('upload', $config);
            
            
            $manufacturer_name = $this->input->post('manufacturer_id');
		    $model_name = $this->input->post('model_id');
            $category = $this->input->post('category');
            $price = $this->input->post('price');
        
            $mileage = $this->input->post('mileage');
            $add_date = date('Y-m-d');
            $status = ($this->session->userdata('adminlevel') > 0) ? "available" : "pending";
            $registration_year = $this->input->post('registration_year');
            $gear = $this->input->post('gear');
            $doors = $this->input->post('doors');
            $seats = $this->input->post('seats');
            $tank = $this->input->post('tank');
            $e_no = $this->input->post('e_no');
            $c_no = $this->input->post('c_no');
            $u_id = $this->session->userdata('id');
            $v_color = $this->input->post('v_color');
            $featured = 0;
            
            $this->upload->do_upload('image');
            $data = $this->upload->data();
            $image = $data['file_name']; 
			
            $this->model_vehicle->insert($featured,$image,$manufacturer_name,$model_name,$category,$price,$mileage,$add_date,$status,$registration_year,$gear,$doors,$seats,$tank,$e_no,$c_no,$u_id,$v_color);
			$this->session->set_flashdata('message','Vehicle Successfully Created.');
			redirect('admin/vehicles');
		
			}
		}
		else{
		redirect('admin/vehicles');
		}
	}



	public function DeleteVehicle()
	{
        if ($this->input->server('REQUEST_METHOD') == 'POST'){	
             
            $id = $this->input->post('vehicle_id');
            $this->model_vehicle->delete($id);
			$this->session->set_flashdata('message','Vehicle Successfully Deleted.');
            redirect('admin/vehicles');
        }
        else {
            redirect('admin/vehicles');
	    }
    }
}

