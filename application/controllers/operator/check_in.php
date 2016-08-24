<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class check_in extends ADMIN_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->template->add_breadcrumb('Check In Peserta', base_url('index.php/' . $this->sys_user->user_data()->group_name . '/check_in'));
		
		$this->load->model('t_ra');
		$this->load->model('t_ha');
		$this->load->model('t_participant');
		$this->load->model('t_cabor');
		$this->load->model('t_contingent');
		$this->load->model('sys_user');
		$this->load->model('t_room');
		$this->load->model('t_touchdown');
	}
	public function index(){
		$ledging = $this->sys_user->user_data()->id_ledging;

		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/check_in/list', array(
			'q' => $this->t_touchdown->select_all_arrival_index_operator(0, 0, $ledging),
		), 'Peserta Yang Sudah Check In');
		$this->template->render();
	}
	public function edit(){
		$ledging = $this->sys_user->user_data()->id_ledging;
		
		$notif = '';
		$id = intval($this->uri->segment(4));
		$id_participant = $this->t_touchdown->get($id)->id_participant;
		$gender = $this->t_participant->get($id_participant)->gender;
		$type = $this->t_participant->get($id_participant)->type_participant;

		$data = $this->t_touchdown->select_all_arrival_index_operator_detail(0,0,$id,$ledging,$gender)->row();
		if(!is_object($data)){
			echo 'id not found!';
			return;
		}

		$date = getdate();
		$tanggal = $date["year"]."-".$date["mon"]."-".$date["mday"];
		$waktu = $date["hours"].":".$date["minutes"].":".$date["seconds"];
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id', 'id', 'trim|xss_clean|required');
		if($this->form_validation->run() === true){
			$this->t_touchdown->update($id, array(
				'status' => "checkin",
				'ci_date' => $tanggal,
				'ci_time' => $waktu,
				'id_room' => $this->input->post('id_room'),
				'user' => $this->sys_user->user_data()->id,
			));
			$tp = $this->t_participant->get($this->input->post('n_partisipan'));
			$notif = 'Touchdown ' . $tp->name . ' updated!';
			redirect(base_url('index.php/' . $this->sys_user->user_data()->group_name . '/check_in/?notif=' . $notif));
			return;
		}
		if($type != "tp"){
			$type_ = "ao";
		}else {
			$type_ = "tp";
		}
		$this->template->add_breadcrumb('edit');
		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/check_in/edit', array(
			'data' => $data,
			'id_participant' => $this->t_participant->select_all(0, 0),
			'id_ra' => $this->t_ra->select_all(),
			'id_ha' => $this->t_ha->select_all(),
			'id_cabor' => $this->t_cabor->select_all(),
			'id_contingent' => $this->t_contingent->select_all(),
			'data_room' => $this->t_room->select_room_selection(0,0,$id,$ledging,$gender,$type_),
		), 'edit: ' . $data->n_partisipan);
		$this->template->render();
	}
	public function edit2(){
		$date = getdate();
		$tanggal = $date["year"]."-".$date["mon"]."-".$date["mday"];
		$waktu = $date["hours"].":".$date["minutes"].":".$date["seconds"];
		
		$notif = '';
		
		$id = $this->input->post('id');
		$data = $this->t_touchdown->get($id);
		if(is_object($data)){
			$this->t_touchdown->update($id, array(
				'status' => "checkin",
				'ci_date' => $tanggal,
				'ci_time' => $waktu,
				'id_room' => $this->input->post('id_room'),
				'user' => $this->sys_user->user_data()->id,
			));
			$tp = $this->input->post('n_partisipan');
			$notif = $tp->name.' Berhasil Check in !';
		}
		redirect(base_url('index.php/' . $this->sys_user->user_data()->group_name . '/check_in/?notif=' . $notif));
	}
}

/* End of file check_in.php */