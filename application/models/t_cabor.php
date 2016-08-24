<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class t_cabor extends MY_Model {
	public function __construct(){
		parent::__construct('t_cabor');
	}

	public function select_cabor_public($limit = 0, $offset = 0){
		$this->db->flush_cache();
		$this->db->select('t_cabor.*');
		$this->db->order_by('t_cabor.name asc');
		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}
	public function select_cabor_detail($limit = 0, $offset = 0, $id = 0){
		$this->db->flush_cache();
		$this->db->select('t_cabor.id, t_cabor.name, t_ledging.name as ledging, t_allocation.for, t_ledging.address, t_ledging.coordinate ');
		$this->db->join('t_allocation', 't_cabor.id = t_allocation.id_cabor');
		$this->db->join('t_ledging', 't_allocation.id_ledging = t_ledging.id');
		$this->db->where('t_cabor.id', $id);
		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}
}

/* End of file t_cabor.php */

