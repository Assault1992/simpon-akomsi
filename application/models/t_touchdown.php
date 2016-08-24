<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class t_touchdown extends MY_Model {
	public function __construct(){
		parent::__construct('t_touchdown');
	}
	
	public function select_all_arrival_index($limit = 0, $offset = 0){
		$this->db->flush_cache();
		$this->db->select('t_touchdown.id, t_touchdown.date, t_touchdown.time, ( select name from t_contingent where t_contingent.id = t_touchdown.id_contingent ) contingent, ( select name from t_cabor where t_cabor.id = t_touchdown.id_cabor ) cabor, ( select name from t_ha where t_ha.id = t_touchdown.id_ha ) ha, ( select name from t_ra where t_ra.id = t_touchdown.id_ra ) ra, ( select name from t_participant where t_participant.id = t_touchdown.id_participant ) participant ');
		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}
	
	public function select_all_arrival_index_operator($limit = 0, $offset = 0, $ledging = 0,$for=""){
		$this->db->flush_cache();
		$this->db->select('t_participant.name n_partisipan, 
						t_participant.gender gender,
						t_ha.name n_ha,
						t_ra.name n_ra,
						t_cabor.name n_cabor, 
						t_contingent.name n_kontingen, 
						t_touchdown.date tanggal,
						t_touchdown.time waktu,
						sys_user.id_ledging,
						t_touchdown.id');
		$this->db->join('t_participant', 't_touchdown.id_participant = t_participant.id', 'left');
		$this->db->join('t_cabor', 't_participant.id_cabor = t_cabor.id', 'left');
		$this->db->join('t_allocation', 't_allocation.id_cabor = t_cabor.id', 'left');
		$this->db->join('t_ledging', 't_allocation.id_ledging = t_ledging.id', 'left');
		$this->db->join('sys_user', 't_ledging.id = sys_user.id_ledging', 'left');
		$this->db->join('t_contingent', 't_touchdown.id_contingent = t_contingent.id', 'left');
		$this->db->join('t_ha', 't_touchdown.id_ha = t_ha.id', 'left');
		$this->db->join('t_ra', 't_touchdown.id_ra = t_ra.id', 'left');
		$this->db->where('t_touchdown.status = ', 'false');
		$this->db->where('if(t_participant.type_participant != "tp", t_allocation.for="ao", t_allocation.for = "tp")');
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

	public function select_all_arrival_index_operator_total($limit = 0, $offset = 0, $ledging = 0){
		$this->db->flush_cache();
		$this->db->select('t_touchdown.id, t_participant.name participant, t_ha.name ha, t_ra.name ra, t_cabor.name cabor, t_contingent.name contingent, t_touchdown.date, t_touchdown.time, sys_user.id_ledging, t_allocation.for, t_room.name room, count(t_touchdown.date) total');
		$this->db->join('t_participant', 't_touchdown.id_participant = t_participant.id');
		$this->db->join('t_contingent', 't_touchdown.id_contingent = t_contingent.id');
		$this->db->join('t_cabor', 't_participant.id_cabor = t_cabor.id');
		$this->db->join('t_ha', 't_touchdown.id_ha = t_ha.id');
		$this->db->join('t_ra', 't_touchdown.id_ra = t_ra.id');
		$this->db->join('t_room', 't_touchdown.id_room = t_room.id', 'left');
		$this->db->join('t_allocation', 't_allocation.id_cabor = t_cabor.id');
		$this->db->join('t_ledging', 't_allocation.id_ledging = t_ledging.id');
		$this->db->join('sys_user', 't_ledging.id = sys_user.id_ledging');
		$this->db->where('t_touchdown.status', 'false');
		//$this->db->where('t_touchdown.checkin_status', 'false');
		$this->db->where('if(t_participant.type_participant != "tp", t_allocation.for = "ao", t_allocation.for = "tp")');
		$this->db->group_by('t_touchdown.date');
		$this->db->group_by('t_touchdown.time');
		$this->db->group_by('t_ha.id');
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

	public function select_all_arrival_index_operator_detail($limit = 0, $offset = 0, $id = 0, $ledging = 0, $gender = ""){
		$this->db->flush_cache();
		$this->db->select('t_participant.name n_partisipan, 
						t_participant.gender gender,
						t_ha.name n_ha,
						t_ra.name n_ra,
						t_cabor.name n_cabor, 
						t_contingent.name n_contingent, 
						t_cabor.id id_cabor, 
						t_contingent.id id_contingent, 
						t_touchdown.status status,
						sys_user.id_ledging,
						t_room.id id_room,
						t_touchdown.id');
		$this->db->join('t_participant', 't_touchdown.id_participant = t_participant.id', 'left');
		$this->db->join('t_cabor', 't_participant.id_cabor = t_cabor.id', 'left');
		$this->db->join('t_allocation', 't_allocation.id_cabor = t_cabor.id', 'left');
		$this->db->join('t_ledging', 't_allocation.id_ledging = t_ledging.id', 'left');
		$this->db->join('sys_user', 't_ledging.id = sys_user.id_ledging', 'left');
		$this->db->join('t_contingent', 't_touchdown.id_contingent = t_contingent.id', 'left');
		$this->db->join('t_ha', 't_touchdown.id_ha = t_ha.id', 'left');
		$this->db->join('t_ra', 't_touchdown.id_ra = t_ra.id', 'left');
		$this->db->join('t_room', 't_allocation.id = t_room.id_allocation', 'left');
		$this->db->where('t_touchdown.id', $id);
		$this->db->where('t_room.gender', $gender);
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
	public function select_all_arrival_index_operator_checkin($limit = 0, $offset = 0, $ledging = 0){
		$this->db->flush_cache();
		$this->db->select('t_participant.name n_partisipan, 
						t_ha.name n_ha,
						t_ra.name n_ra,
						t_cabor.name n_cabor, 
						t_contingent.name n_kontingen, 
						t_touchdown.date tanggal,
						t_touchdown.time waktu,
						t_room.name n_room,
						sys_user.id_ledging,
						t_touchdown.id');
		$this->db->join('t_participant', 't_touchdown.id_participant = t_participant.id', 'left');
		$this->db->join('t_cabor', 't_participant.id_cabor = t_cabor.id', 'left');
		$this->db->join('t_allocation', 't_allocation.id_cabor = t_cabor.id', 'left');
		$this->db->join('t_ledging', 't_allocation.id_ledging = t_ledging.id', 'left');
		$this->db->join('sys_user', 't_ledging.id = sys_user.id_ledging', 'left');
		$this->db->join('t_contingent', 't_touchdown.id_contingent = t_contingent.id', 'left');
		$this->db->join('t_ha', 't_touchdown.id_ha = t_ha.id', 'left');
		$this->db->join('t_ra', 't_touchdown.id_ra = t_ra.id', 'left');
		$this->db->join('t_room', 't_touchdown.id_room = t_room.id', 'left');
		$this->db->where('t_touchdown.status = ', 'checkin');
		$this->db->where('if(t_participant.type_participant != "tp", t_allocation.for="ao", t_allocation.for = "tp")');
		if($ledging > 0){
			$this->db->where('t_allocation.id_ledging', 75);
		}

		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}
	public function select_all_arrival_index_operator_checkout($limit = 0, $offset = 0, $ledging = 0){
		$this->db->flush_cache();
		$this->db->select('t_participant.name n_partisipan, 
						t_cabor.name n_cabor, 
						t_contingent.name n_kontingen, 
						t_touchdown.co_date tanggal,
						t_touchdown.co_time waktu,
						sys_user.id_ledging,
						t_touchdown.id');
		$this->db->join('t_participant', 't_touchdown.id_participant = t_participant.id', 'left');
		$this->db->join('t_cabor', 't_participant.id_cabor = t_cabor.id', 'left');
		$this->db->join('t_allocation', 't_allocation.id_cabor = t_cabor.id', 'left');
		$this->db->join('t_ledging', 't_allocation.id_ledging = t_ledging.id', 'left');
		$this->db->join('sys_user', 't_ledging.id = sys_user.id_ledging', 'left');
		$this->db->join('t_contingent', 't_touchdown.id_contingent = t_contingent.id', 'left');
		$this->db->join('t_ha', 't_touchdown.id_ha = t_ha.id', 'left');
		$this->db->join('t_ra', 't_touchdown.id_ra = t_ra.id', 'left');
		$this->db->join('t_room', 't_touchdown.id_room = t_room.id', 'left');
		$this->db->where('t_touchdown.status = ', 'checkout');
		$this->db->where('if(t_participant.type_participant != "tp", t_allocation.for="ao", t_allocation.for = "tp")');
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
	public function select_all_arrival_index_operator_cabor($limit = 0, $offset = 0, $ledging = 0){
		$this->db->flush_cache();
		$this->db->select('t_cabor.*');
		$this->db->join('t_cabor', 't_touchdown.id_cabor = t_cabor.id', 'left');
		$this->db->join('t_allocation', 't_cabor.id = t_allocation.id_cabor', 'left');
		$this->db->join('t_ledging', 't_allocation.id_ledging = t_ledging.id', 'left');
		$this->db->where('t_ledging.id', $ledging);
		$this->db->where('t_touchdown.status', 'checkin');
		$this->db->group_by('t_touchdown.id_cabor');

		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}
	public function select_all_arrival_index_operator_contingent($limit = 0, $offset = 0, $ledging = 0){
		$this->db->flush_cache();
		$this->db->select('t_contingent.*');
		$this->db->join('t_contingent', 't_touchdown.id_contingent = t_contingent.id', 'left');
		$this->db->join('t_room', 't_room.id_contingent = t_contingent.id', 'left');
		$this->db->join('t_allocation', 't_allocation.id = t_room.id_allocation', 'left');
		$this->db->join('t_ledging', 't_allocation.id_ledging = t_ledging.id', 'left');
		$this->db->where('t_ledging.id', $ledging);
		$this->db->where('t_touchdown.status', 'checkin');
		$this->db->group_by('t_touchdown.id_contingent');

		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}

	public function count_participant_order($limit = 0, $offset = 0, $cabor, $contingent, $ledging){
		$this->db->flush_cache();
		$this->db->select('COUNT(t_participant.id) total');
		$this->db->join('t_contingent', 't_touchdown.id_contingent = t_contingent.id', 'left');
		$this->db->join('t_room', 't_room.id_contingent = t_contingent.id', 'left');
		$this->db->join('t_allocation', 't_allocation.id = t_room.id_allocation', 'left');
		$this->db->join('t_ledging', 't_allocation.id_ledging = t_ledging.id', 'left');
		$this->db->join('t_participant', 't_touchdown.id_participant = t_participant.id', 'left');
		$this->db->where('t_ledging.id', $ledging);
		$this->db->where('t_touchdown.id_cabor', $cabor);
		$this->db->where('t_touchdown.id_contingent', $contingent);
		$this->db->where('t_touchdown.status', 'checkin');
		$this->db->where('if(t_participant.type_participant != "tp", t_allocation.for="ao", t_allocation.for = "tp")');
		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}
}

/* End of file t_touchdown.php */