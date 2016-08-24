<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class t_org_details extends MY_Model {
	public function __construct(){
		parent::__construct('t_org_details');
	}

	public function select_org_edit_profile($limit = 0, $offset = 0, $id = 0){
		$this->db->flush_cache();
		$this->db->select('t_org_details.*, t_ledging.name');
		$this->db->join('t_ledging', 't_org_details.id_ledging = t_ledging.id');
		$this->db->where('t_org_details.id', $id);
		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}
	
}

/* End of file t_org_details.php */