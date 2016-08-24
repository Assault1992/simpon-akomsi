<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class t_contingent extends MY_Model {
	public function __construct(){
		parent::__construct('t_contingent');
	}
	
	public function select_contingent_public($limit = 0, $offset = 0){
		$this->db->flush_cache();
		$this->db->select('t_contingent.*');
		$this->db->order_by('t_contingent.name asc');
		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}

	public function select_contingent_detail($limit = 0, $offset = 0, $id = 0){
		$this->db->flush_cache();
		$this->db->select('t_contingent.*, t_cabor.name as cabor, t_ledging.name as ledging, t_ledging.address');
		$this->db->join('t_room', 't_contingent.id = t_room.id_contingent');
		$this->db->join('t_allocation', 't_room.id_allocation = t_allocation.id');
		$this->db->join('t_cabor', 't_allocation.id_cabor = t_cabor.id');
		$this->db->join('t_ledging', 't_allocation.id_ledging = t_ledging.id');
		$this->db->where('t_contingent.id', $id);
		$this->db->group_by('t_cabor.id');
		$this->db->order_by('t_cabor.name asc');
		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}
	
}

/* End of file t_contingent.php */