<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class t_allocation extends MY_Model {
	public function __construct(){
		parent::__construct('t_allocation');
	}
	
	public function select_all_allocation_index($limit = 0, $offset = 0){
		$this->db->flush_cache();
		$this->db->select("t_allocation.id, t_allocation.for, t_allocation.allocation, (select name from t_cabor where id = t_allocation.id_cabor) cabor, (select name from t_ledging where id = t_allocation.id_ledging) ledging");
		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}

	public function select_all_allocation_room($limit = 0, $offset = 0){
		$this->db->flush_cache();
		$this->db->select("t_allocation.id, t_allocation.for, t_allocation.allocation, (select name from t_cabor where id = t_allocation.id_cabor) cabor, (select name from t_ledging where id = t_allocation.id_ledging) as ledging");
		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}
}

/* End of file t_allocation.php */