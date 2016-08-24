<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class t_venue extends MY_Model {
	public function __construct(){
		parent::__construct('t_venue');
	}

	public function select_all_venue($limit = 0, $offset = 0){
		$this->db->flush_cache();
		$this->db->select('t_venue.id, t_venue.name, (select name from t_cabor where t_cabor.id = t_venue.id_cabor) as cabor, t_venue.address, t_venue.coordinate, (select name from t_regional where t_regional.id = t_venue.id_regional) as regional');
		$this->db->order_by('cabor asc');
		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}
	public function select_all_venue_operator($limit = 0, $offset = 0, $ledging = 0){
		$this->db->flush_cache();
		$this->db->select('t_venue.id id, t_venue.name name,t_cabor.name n_cabor');
		$this->db->join('t_cabor','t_venue.id_cabor = t_cabor.id','left');
		$this->db->join('t_allocation','t_cabor.id = t_allocation.id_cabor','left');
		$this->db->join('t_ledging','t_allocation.id_ledging = t_ledging.id','left');
		$this->db->where('t_ledging.id', $ledging);
		$this->db->group_by('t_venue.id');
		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}
	
}

/* End of file t_venue.php */