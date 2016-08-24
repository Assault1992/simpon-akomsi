<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class t_order extends MY_Model {
	public function __construct(){
		parent::__construct('t_order');
	}
	public function select_all_ticket_cabor($limit = 0, $offset = 0){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->join('t_cabor', 't_order.id_cabor = t_cabor.id', 'left');
		$this->db->group_by('t_order.id_cabor');
		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}
	public function select_all_ticket_contingent($limit = 0, $offset = 0){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->join('t_contingent', 't_order.id_contingent = t_contingent.id', 'left');
		$this->db->group_by('t_order.id_contingent');
		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}
	public function select_all_ticket_detail($limit = 0, $offset = 0,$id_cabor = 0, $id_contingent = 0, $date = ""){
		$this->db->flush_cache();
		$this->db->select('t_order.id id, 
						   t_order.id_type_menu id_type_menu,
						   t_order.id_ledging id_ledging,
						   t_order.id_venue id_venue,
						   t_order.date date,
						   t_ledging.name n_ledging,
						   t_venue.name n_venue,
						   t_type_menu.name n_type_menu,
						   t_type_menu.time t_type_menu,
						   t_cabor.id id_cabor,
						   t_cabor.name n_cabor,
						   t_order.status status,
						   t_contingent.id id_contingent,
						   t_contingent.name n_contingent');
		$this->db->join('t_cabor', 't_order.id_cabor = t_cabor.id', 'left');
		$this->db->join('t_contingent', 't_order.id_contingent = t_contingent.id', 'left');
		$this->db->join('t_type_menu', 't_order.id_type_menu = t_type_menu.id', 'left');
		$this->db->join('t_ledging', 't_order.id_ledging = t_ledging.id', 'left');
		$this->db->join('t_venue', 't_order.id_venue = t_venue.id', 'left');
		$this->db->where('t_order.date', $date);
		$this->db->where('t_order.id_cabor ', $id_cabor);
		$this->db->where('t_order.id_contingent ', $id_contingent);
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
		$this->db->select('date');
		$this->db->group_by('date');
		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}
}

/* End of file t_order.php */