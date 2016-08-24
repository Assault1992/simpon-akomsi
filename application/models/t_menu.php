<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class t_menu extends MY_Model {
	public function __construct(){
		parent::__construct('t_menu');
	}

	public function select_menu_index($limit = 0, $offset = 0){
		$this->db->flush_cache();
		$this->db->select('t_menu.id, t_menu.menu, t_menu.date, t_menu.day, (select name from t_type_menu where t_type_menu.id = t_menu.id_type_menu) as type_menu, (select time from t_type_menu where t_type_menu.id = t_menu.id_type_menu) as time');
		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}
	public function select_menu_order($limit = 0, $offset = 0){
		$this->db->flush_cache();
		$this->db->select('t_menu.id id_menu,
						   t_menu.menu menu, 
						   t_type_menu.id id_type,
						   t_type_menu.name name_type,
						   t_type_menu.time time_type');
		$this->db->join('t_type_menu','t_menu.id_type_menu = t_type_menu.id','left');
		$this->db->where('t_menu.date = CURDATE()+1');
		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}
	public function select_all_date($limit = 0, $offset = 0){
		$this->db->flush_cache();
		$this->db->select('t_menu.date');
		$this->db->group_by('t_menu.date');
		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}
}

/* End of file t_menu.php */
