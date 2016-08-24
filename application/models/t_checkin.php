<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class t_checkin extends MY_Model {
	public function __construct(){
		parent::__construct('t_checkin');
	}

	public function select_all_arrival_index_operator_checkin($limit = 0, $offset = 0, $ledging = 0){
		$this->db->flush_cache();
		$this->db->select('t_participant.name n_partisipan, 
						t_cabor.name n_cabor, 
						t_contingent.name n_kontingen, 
						t_touchdown.ci_date tanggal,
						t_touchdown.ci_time waktu,
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
		$this->db->where('t_touchdown.status_arrival = ', 'true');
		$this->db->where('t_touchdown.ci_status = ', 'true');
		$this->db->where('t_touchdown.co_status = ', 'false');
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

/* End of file t_checkin.php */