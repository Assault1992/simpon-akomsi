<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class t_type_menu extends MY_Model {
	public function __construct(){
		parent::__construct('t_type_menu');
	}
	public function select_all_type_menu($limit = 0, $offset = 0){
		$this->db->flush_cache();
		$this->db->select('*');
		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}
	
}

/* End of file t_type_menu.php */