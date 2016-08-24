<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class t_room extends MY_Model {
	public function __construct(){
		parent::__construct('t_room');
	}

	public function select_room_index($limit = 0, $offset = 0){
		$this->db->flush_cache();
		$this->db->select('t_room.id, t_room.name, t_room.capacity, t_room.gender, (select (select name from t_ledging where t_ledging.id = t_allocation.id_ledging) ledging from t_allocation where t_allocation.id = t_room.id_allocation) allocation, (select name from t_contingent where t_contingent.id = t_room.id_contingent) contingent ');
		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}

	public function select_room_selection($limit = 0, $offset = 0, $id = 0, $ledging = 0,$gender ="",$for=""){
		$this->db->flush_cache();
		$this->db->select('t_room.id, t_room.name n_room, t_room.capacity, t_allocation.for, t_contingent.name, t_room.gender, t_participant.gender');		
		$this->db->join('t_allocation', 't_room.id_allocation = t_allocation.id');
		$this->db->join('t_contingent', 't_room.id_contingent = t_contingent.id');
		$this->db->join('t_ledging', 't_allocation.id_ledging = t_ledging.id');
		$this->db->join('sys_user', 't_ledging.id = sys_user.id_ledging');
		$this->db->join('t_cabor', 't_allocation.id_cabor = t_cabor.id');
		$this->db->join('t_touchdown', 't_contingent.id = t_touchdown.id_contingent');
		$this->db->join('t_participant', 't_touchdown.id_participant = t_participant.id');
		$this->db->where('t_touchdown.id', $id);
		$this->db->where('t_room.gender ', $gender);
		$this->db->where('t_allocation.for ',$for);
		$this->db->where('COUNT ',$for);
		if($ledging > 0){
			$this->db->where('sys_user.id_ledging', $ledging);
		}
		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}

	public function select_room_per_participant_status($limit = 0, $offset = 0, $ledging = 0, $tid = 0){
		$this->db->flush_cache();
		$this->db->select('t_room.id, t_room.name, t_room.capacity, t_room.gender, t_allocation.for, t_allocation.id_ledging');
		$this->db->join('t_allocation', 't_room.id_allocation = t_allocation.id');
		$this->db->join('t_ledging', 't_allocation.id_ledging = t_ledging.id');
		$this->db->join('sys_user', 't_ledging.id = sys_user.id_ledging');
		$this->db->join('t_cabor', 't_allocation.id_cabor = t_cabor.id');
		$this->db->join('t_touchdown', 't_cabor.id = t_touchdown.id_cabor');
		$this->db->join('t_participant', 't_touchdown.id_participant = t_participant.id');
		$this->db->where('t_touchdown.status', 'false');
		$this->db->where('t_participant.gender = t_room.gender');
		$this->db->where('if(t_participant.type_participant != "tp", t_allocation.for = "ao", t_allocation.for = "tp")');
		$this->db->where('t_touchdown.id', $tid);

		if($ledging > 0){
			$this->db->where('t_allocation.id_ledging', $ledging);
		}

		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}
}

/* End of file t_room.php */