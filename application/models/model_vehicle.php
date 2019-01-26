<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_vehicle extends CI_Model {

	public function insert($featured,$image,$manufacturer_id,$model_id,$category,$price,$mileage,$add_date,$status,$registration_year,$gear,$doors,$seats,$tank,$engine_no,$chesis_no,$user_id,$color)
	{
		$data = array(
			'featured' => $featured,
			'image' => $image,
			'manufacturer_id' => $manufacturer_id,
			'model_id' => $model_id,
			'category' => $category,
			'price' => $price,
			'mileage' => $mileage,
			'add_date' => $add_date,
			'status' => $status,
			'gear' => $gear,
			'doors' => $doors,
			'seats' => $seats,
			'tank' => $tank,
			'engine_no' => $engine_no,
			'chesis_no' => $chesis_no,
			'user_id' => $user_id,
			'registration_year' => $registration_year,
			'color' => $color
        );

		$this->db->insert('vehicles', $data); 
	}

	public function setFeatured($v_id, $featured)
	{
		$data = array(
               'featured' => $featured
            );
		$this->db->where('vehicle_id', $v_id);
		$this->db->update('vehicles', $data); 
	}

	public function getAll()
	{
		// $result = $this->db->get('vehicles');
		$this->db->select('*');
        $this->db->from('vehicles');
        $this->db->join('manufacturers', 'manufacturers.id = vehicles.manufacturer_id','inner');
        $this->db->join('models', 'models.id = vehicles.model_id', 'inner');
        $result = $this->db->get();
		return $result->result_array();
	}


	public function getAllByUserID($user_id)
	{
		// $result = $this->db->get('vehicles');
		$this->db->select('*');
        $this->db->from('vehicles');
        $this->db->join('manufacturers', 'manufacturers.id = vehicles.manufacturer_id','inner');
        $this->db->join('models', 'models.id = vehicles.model_id', 'inner');
        $this->db->where('vehicles.user_id', $user_id);
        $result = $this->db->get();
		return $result->result_array();
	}

	public function getAllByManufacturer()
	{
		// $result = $this->db->get('vehicles');
		$this->db->select('*, COUNT(manufacturer_id) as total');
        $this->db->from('vehicles');
        $this->db->join('manufacturers', 'manufacturers.id = vehicles.manufacturer_id','inner');
        // $this->db->join('models', 'models.id = vehicles.model_id', 'inner');
        $this->db->group_by('manufacturer_id');
        $this->db->order_by('total', 'desc'); 
        $result = $this->db->get();
		return $result->result_array();
	}

	public function getAllByManufacturerSold()
	{
		// $result = $this->db->get('vehicles');
		$this->db->select('*, COUNT(manufacturer_id) as total');
        $this->db->from('vehicles');
        $this->db->where('status', 'sold');
        $this->db->join('manufacturers', 'manufacturers.id = vehicles.manufacturer_id','inner');
        // $this->db->join('models', 'models.id = vehicles.model_id', 'inner');
        $this->db->group_by('manufacturer_id');
        $this->db->order_by('total', 'desc'); 
        $result = $this->db->get();
		return $result->result_array();
	}


	public function getLatest()
	{
		// $result = $this->db->get('vehicles');
		$this->db->select('*');
        $this->db->from('vehicles');
        $this->db->join('manufacturers', 'manufacturers.id = vehicles.manufacturer_id','inner');
        $this->db->join('models', 'models.id = vehicles.model_id', 'inner');
        $this->db->where("status", "available");
        $this->db->order_by("vehicle_id", "desc");
        $this->db->limit(4);
        $result = $this->db->get();
		return $result->result_array();
	}

	public function getFeatured()
	{
		//$result = $this->db->get('vehicles');
		$this->db->select('*');
        $this->db->from('vehicles');
        $this->db->join('manufacturers', 'manufacturers.id = vehicles.manufacturer_id','inner');
        $this->db->join('models', 'models.id = vehicles.model_id', 'inner');
        $this->db->where("featured", 1);
        $this->db->where("status", "available");
        $this->db->order_by("vehicle_id", "desc");
        $this->db->limit(4);
        $result = $this->db->get();
		return $result->result_array();
	}

	public function getById($vehicle_id)
	{
		$this->db->select('*');
        $this->db->from('vehicles');
        $this->db->join('manufacturers', 'manufacturers.id = vehicles.manufacturer_id','inner');
        $this->db->join('models', 'models.id = vehicles.model_id', 'inner');
        $this->db->join('users', 'users.id = vehicles.user_id', 'inner');
        $this->db->where('vehicle_id', $vehicle_id);
        $this->db->limit(1);
        $result = $this->db->get();
		return $result->result_array();
	}
        
	public function get($v_id)
	{
		$this->db->where('vehicle_id', $v_id);
		$result = $this->db->get('vehicles');
		return $result->row_array();
	}
    

    public function sell($v_id)
	{
				
		$data = array(
               'status' => 'sold',
               'sold_date' => date('Y-m-d')
            );
		$this->db->where('vehicle_id', $v_id);
		$this->db->update('vehicles', $data); 
	}


    public function grant($v_id)
	{
				
		$data = array(
               'status' => 'available'
            );
		$this->db->where('vehicle_id', $v_id);
		$this->db->update('vehicles', $data); 
	}

    public function deny($v_id)
	{
		$data = array(
               'status' => 'not granted to sell'
            );
		$this->db->where('vehicle_id', $v_id);
		$this->db->update('vehicles', $data); 
	}

	public function delete($id)
	{
		$this->db->where('vehicle_id', $id);
		$this->db->delete('vehicles');
	}

	public function get_vehicle_by_month(){
        $this->db->select('*, MONTH(add_date) as month,  YEAR(add_date) as year');
        $this->db->from('vehicles');
        $this->db->group_by('month');
        $query = $this->db->get();
        return $query->result();
    }
}