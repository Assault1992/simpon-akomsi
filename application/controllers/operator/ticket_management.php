<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class ticket_management extends ADMIN_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->template->add_breadcrumb('Lihat Tiket Makanan', base_url('index.php/' . $this->sys_user->user_data()->group_name . '/ticket_management'));
		$this->load->model('t_ra');
		$this->load->model('t_ha');
		$this->load->model('t_participant');
		$this->load->model('t_cabor');
		$this->load->model('t_room');
		$this->load->model('t_contingent');
		$this->load->model('sys_user');
		$this->load->model('t_type_menu');
		$this->load->model('t_touchdown');
		$this->load->model('t_menu');
		$this->load->model('t_order');
		$this->load->library('fpdf');
	}

	public function index(){
		$ledging = $this->sys_user->user_data()->id_ledging;

		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/ticket_management/list', array(
			'q_cabor' => $this->t_order->select_all_ticket_cabor(0, 0),
			'q_contingent' => $this->t_order->select_all_ticket_contingent(0, 0),
			'q_tanggal' => $this->t_order->select_all_date(0, 0),
		), 'Tiket Makanan');
		//echo $this->db->last_query();exit;
		$this->template->render();
	}
	public function pdf($cabor,$contingent,$date){
        $ledging = $this->sys_user->user_data()->id_ledging;
        $data['cabor'] = $this->t_cabor->get($cabor);
        $data['contingent'] = $this->t_contingent->get($contingent);
        $data['detail'] = $this->t_order->select_all_ticket_detail(0, 0, $cabor, $contingent, $date);
        $data['date'] = array("tanggal" => $date);
        $data['jumlah'] = $this->t_touchdown->count_participant_order(0, 0, $cabor, $contingent, $ledging)->row();
        $this->load->view('' . $this->sys_user->user_data()->group_name . '/ticket_management/lihat_pdf',$data);
	}
	public function detail(){
		$ledging = $this->sys_user->user_data()->id_ledging;
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_cabor', 'id_cabor', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_contingent', 'id_contingent', 'trim|xss_clean|required');
		$this->form_validation->set_rules('date', 'date', 'trim|xss_clean|required');
		if($this->form_validation->run() === true){
			$cabor = $this->input->post('id_cabor');
			$contingent = $this->input->post('id_contingent');
			$date = $this->input->post('date');
			$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/ticket_management/detail', array(
				'cabor' => $this->t_cabor->get($cabor),
				'contingent' => $this->t_contingent->get($contingent),
				'q_detail' => $this->t_order->select_all_ticket_detail(0, 0, $cabor, $contingent, $date),
			), 'Kedatangan Hari Ini');
		}
		//echo $this->db->last_query();exit;
		$this->template->render();
	}
public function ganti(){
		$notif = '';
		
		$id = intval($this->uri->segment(4));
		$data = $this->t_order->get($id);
		
		if(is_object($data)){
			$this->t_order->update($id, array(
				'status' => 'true',
				'user' => $this->sys_user->user_data()->id,
			));
			$tp = $this->t_cabor->get($this->input->post('n_cabor'));
			$notif = 'Ticket ' . $tp->name . ' updated!';
		}
		redirect(base_url('index.php/' . $this->sys_user->user_data()->group_name . '/ticket_management/?notif=' . $notif));
	}
}

/* End of file arrival_participant.php */