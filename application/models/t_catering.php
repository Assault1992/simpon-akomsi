<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class t_catering extends MY_Model {
	public function __construct(){
		parent::__construct('t_catering');
	}

	public function select_catering_index($limit = 0, $offset = 0){
		$this->db->flush_cache();
		$this->db->select('t_catering.id, t_catering.name, t_catering.address, t_catering.cp_name, t_catering.cp_telp, t_catering.cp_email, (select name from t_kitchen where t_kitchen.id = t_catering.id_kitchen) as ledging, (select name from t_regional where t_regional.id = t_catering.id_regional) as regional , (select name from t_kitchen where t_catering.id_kitchen = t_kitchen.id) as kitchen');
		if($limit > 0){
			if($offset > 0)
				$this->db->limit($limit, $offset);
			else
				$this->db->limit($limit);
		}
		return $this->db->get($this->table);
	}

}

/* End of file t_catering.php */
