<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class order_management extends ADMIN_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->template->add_breadcrumb('Order Esok Hari', base_url('index.php/' . $this->sys_user->user_data()->group_name . '/order_management'));
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
		$this->load->model('t_kitchen');
		$this->load->model('t_touchdown');
	}

	public function index(){
		$ledging = $this->sys_user->user_data()->id_ledging;

		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/order_management/add', array(
			'q_cabor' => $this->t_touchdown->select_all_arrival_index_operator_cabor(0, 0, $ledging),
			'q_contingent' => $this->t_touchdown->select_all_arrival_index_operator_contingent(0, 0, $ledging),
			'q_menu' => $this->t_type_menu->select_all_type_menu(0, 0),
			'q_venue' => $this->t_venue->select_all_venue_operator(0, 0, $ledging),
			'q_hotel' => $this->t_ledging->select_all_ledging_operator(0, 0, $ledging),
			'q_kitchen' => $this->t_kitchen->select_kitchen_operator(0, 0, $ledging),
		), 'Order Untuk Besok');
		//echo $this->db->last_query();exit;
		$this->template->render();
	}
	public function add(){
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
				$id_type_menu = $makan['id_type_menu'];	
				$tempat = $makan['tempat'];
				$tempat_explode = explode('|', $tempat);
				$idnya = $tempat_explode[0]; 
				$type = $tempat_explode[1];
				if($type=="Hotel"){
				$con->query("INSERT INTO t_order(id_type_menu,id_lo,id_ledging,id_venue,id_cabor,id_contingent,status,user,date) 
					VALUES ($id_type_menu,'NULL',$idnya,0,$id_cabor,'$id_contingent','false','$id_user',CURDATE() + INTERVAL 1 DAY)") or die(mysqli_errno());
				}elseif ($type=="Venue") {
				$con->query("INSERT INTO t_order(id_type_menu,id_lo,id_ledging,id_venue,id_cabor,id_contingent,status,user,date) 
					VALUES ($id_type_menu,'NULL',0,$idnya,$id_cabor,'$id_contingent','false','$id_user',CURDATE() + INTERVAL 1 DAY)") or die(mysqli_errno());
				}
			}
			$cabor = $this->t_cabor->get($id_cabor);
			$contingent = $this->t_contingent->get($id_contingent);
			$notif = 'Cabor ' . $cabor->name . ' Dari Kontingen ' . $contingent->name. 'Berhasil mengorder!';
			$this->template->add_notif($notif);
			$this->index();
			return;
		}

		$this->template->render();
	}
}

/* End of file arrival_participant.php */