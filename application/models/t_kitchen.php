<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class t_kitchen extends MY_Model {
	public function __construct(){
		parent::__construct('t_kitchen');
	}

	public function select_kitchen_index($limit = 0, $offset = 0){
		$this->db->flush_cache();
		$this->db->select('t_kitchen.id, t_kitchen.name, t_kitchen.address, t_kitchen.cp_name, t_kitchen.cp_telp, t_kitchen.cp_email, (select name from t_ledging where t_ledging.id = t_kitchen.id_ledging) as ledging, (select name from t_regional where t_regional.id = t_kitchen.id_regional) as regional');
		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}
	public function select_kitchen_operator($limit = 0, $offset = 0, $ledging = 0){
		$this->db->flush_cache();
		$this->db->select('t_kitchen.*');
		$this->db->join('t_ledging','t_kitchen.id_ledging = t_ledging.id','left');
		$this->db->where('t_ledging.id', $ledging);
		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}
}

/* End of file t_kitchen.php */
