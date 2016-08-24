<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class check_out extends ADMIN_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->template->add_breadcrumb('Check Out Peserta', base_url('index.php/' . $this->sys_user->user_data()->group_name . '/check_out'));
		
		$this->load->model('t_ra');
		$this->load->model('t_ha');
		$this->load->model('t_participant');
		$this->load->model('t_cabor');
		$this->load->model('t_contingent');
		$this->load->model('sys_user');
		$this->load->model('t_touchdown');
	}

	public function index(){
		$ledging = $this->sys_user->user_data()->id_ledging;

		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name .'/check_out/list', array(
			'q' => $this->t_touchdown->select_all_arrival_index_operator_checkin(0, 0, $ledging),
		), 'Peserta Yang Sudah Check Out');
		$this->template->render();
	}
	public function cekout(){
		$date = getdate();
		$tanggal = $date["year"]."-".$date["mon"]."-".$date["mday"];
		$waktu = $date["hours"].":".$date["minutes"].":".$date["seconds"];
		
		$notif = '';
		
		$id = intval($this->uri->segment(4));
		$data = $this->t_touchdown->get($id);
		
		if(is_object($data)){
			$this->t_touchdown->update($id, array(
				'status' => "checkout",
				'co_date' => $tanggal,
				'co_time' => $waktu,
				'user' => $this->sys_user->user_data()->id,
			));
			$tp = $this->t_participant->get($this->input->post('n_partisipan'));
			$notif = 'Check in ' . $tp->name . ' updated!';
		}
		redirect(base_url('index.php/' . $this->sys_user->user_data()->group_name . '/check_out/?notif=' . $notif));
	}
}

/* End of file arrival_participant.php */