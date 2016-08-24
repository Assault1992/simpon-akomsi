<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class t_ledging extends MY_Model {
	public function __construct(){
		parent::__construct('t_ledging');
	}

	public function select_all_ledging_index($limit = 0, $offset = 0){
		$this->db->flush_cache();
		$this->db->select('t_ledging.id, t_ledging.name, t_ledging.address, t_ledging.star, t_ledging.telp, t_ledging.l_email, t_ledging.fax, t_ledging.website, t_ledging.coordinate, t_ledging.picture, (select name from t_type where t_type.id = t_ledging.id_type) as type, (select name from t_regional where t_regional.id = t_ledging.id_regional) as regional, (select name from t_org_details where t_org_details.id_ledging = t_ledging.id) company, (select id from t_org_details where t_org_details.id_ledging = t_ledging.id) oid');
		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}
	
	public function select_all_ledging_operator($limit = 0, $offset = 0,$ledging =0){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->where('id',$ledging);
		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}
}

/* End of file t_ledging.php */