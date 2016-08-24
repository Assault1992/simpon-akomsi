<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class arrival_participant extends ADMIN_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->template->add_breadcrumb('Daftar Kedatangan Peserta', base_url('index.php/' . $this->sys_user->user_data()->group_name . '/arrival_participant'));
		$this->load->model('t_ra');
		$this->load->model('t_ha');
		$this->load->model('t_participant');
		$this->load->model('t_cabor');
		$this->load->model('t_room');
		$this->load->model('t_contingent');
		$this->load->model('sys_user');
		$this->load->model('t_touchdown');
	}

	public function index(){
		$ledging = $this->sys_user->user_data()->id_ledging;

		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/arrival_participant/list', array(
			'q' => $this->t_touchdown->select_all_arrival_index_operator(0, 0, $ledging),
			'q2' => $this->t_touchdown->select_all_arrival_index_operator_total(0, 0, $ledging),
		), 'Kedatangan Hari Ini');
		//echo $this->db->last_query();exit;
		$this->template->render();
	}	
}

/* End of file arrival_participant.php */