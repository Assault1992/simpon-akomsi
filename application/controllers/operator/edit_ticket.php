<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class edit_ticket extends ADMIN_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->template->add_breadcrumb('Edit Ticket Makanan', base_url('index.php/' . $this->sys_user->user_data()->group_name . '/edit_ticket'));
		$this->load->model('t_ra');
		$this->load->model('t_ha');
		$this->load->model('t_participant');
		$this->load->model('t_cabor');
		$this->load->model('t_room');
		$this->load->model('t_contingent');
		$this->load->model('sys_user');
		$this->load->model('t_type_menu');
		$this->load->model('t_venue');
		$this->load->model('t_ledging');
		$this->load->model('t_touchdown');
		$this->load->model('t_menu');
		$this->load->model('t_order');
	}

	public function index(){
		$ledging = $this->sys_user->user_data()->id_ledging;

		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/edit_ticket/list', array(
			'q_cabor' => $this->t_order->select_all_ticket_cabor(0, 0),
			'q_contingent' => $this->t_order->select_all_ticket_contingent(0, 0),
			'q_tanggal' => $this->t_order->select_all_date(0, 0),
		), 'Tiket Makanan');
		//echo $this->db->last_query();exit;
		$this->template->render();
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
			$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/edit_ticket/detail', array(
				'cabor' => $this->t_cabor->get($cabor),
				'contingent' => $this->t_contingent->get($contingent),
				'q_detail' => $this->t_order->select_all_ticket_detail(0, 0, $cabor, $contingent, $date),
				'q_venue' => $this->t_venue->select_all_venue_operator(0, 0, $ledging),
				'q_hotel' => $this->t_ledging->select_all_ledging_operator(0, 0, $ledging),
			), 'Edit Ticket');
		}
		//echo $this->db->last_query();exit;
		$this->template->render();
		}
	public function edit(){
		$notif = '';
	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_cabor', 'id_cabor', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_contingent', 'id_contingent', 'trim|xss_clean|required');
		$this->form_validation->set_rules('makan[0][tempat]', 'makan[0][tempat]', 'trim|xss_clean|required');
		$this->form_validation->set_rules('makan[1][tempat]', 'makan[1][tempat]', 'trim|xss_clean|required');
		$this->form_validation->set_rules('makan[2][tempat]', 'makan[2][tempat]', 'trim|xss_clean|required');
		$this->form_validation->set_rules('makan[3][tempat]', 'makan[3][tempat]', 'trim|xss_clean|required');
		$this->form_validation->set_rules('makan[4][tempat]', 'makan[4][tempat]', 'trim|xss_clean|required');
		if($this->form_validation->run() === true){
			$id_cabor = $this->input->post('id_cabor');
			$id_contingent = $this->input->post('id_contingent');
			$id_user = $this->sys_user->user_data()->id;
			$con = new mysqli('localhost','root','','simponv2-force-majeure');
			foreach($_POST['makan'] as $makan)
			{	
				$id_order = $makan['id_order'];	
				$tempat = $makan['tempat'];
				$tempat_explode = explode('|', $tempat);
				$idnya = $tempat_explode[0]; 
				$type = $tempat_explode[1];
				if($type=="Hotel"){
				$con->query("UPDATE t_order SET id_ledging=$idnya,id_venue=0 WHERE id=$id_order") or die(mysqli_errno());
				}elseif ($type=="Venue") {
				$con->query("UPDATE t_order SET id_ledging=0,id_venue=$idnya WHERE id=$id_order") or die(mysqli_errno());
				}
			}
			$cabor = $this->t_cabor->get($id_cabor);
			$contingent = $this->t_contingent->get($id_contingent);
			$notif = 'Cabor ' . $cabor->name . ' Dari Kontingen ' . $contingent->name. ' Edited!';
		}
		redirect(base_url('index.php/' . $this->sys_user->user_data()->group_name . '/edit_ticket/?notif=' . $notif));
	}
	public function edit2(){
		
	}
}

/* End of file arrival_participant.php */