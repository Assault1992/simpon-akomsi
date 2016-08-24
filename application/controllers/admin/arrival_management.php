<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class arrival_management extends ADMIN_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->template->add_breadcrumb('Arrival Management', base_url('index.php/' . $this->sys_user->user_data()->group_name . '/arrival_management'));
		
		$this->load->model('t_ra');
		$this->load->model('t_ha');
		$this->load->model('t_participant');
		$this->load->model('t_cabor');
		$this->load->model('t_contingent');
		$this->load->model('t_touchdown');
	}
	
	public function index(){
		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/arrival_management/list', array(
			'q' => $this->t_touchdown->select_all_arrival_index(0, 0),
		), 'Arrival List');
		$this->template->render();
	}
	
	public function add(){
		$notif = '';
	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('date', 'date', 'trim|xss_clean|required');
		$this->form_validation->set_rules('time', 'time', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_participant', 'id_participant', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_ra', 'id_ra', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_ha', 'id_ha', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_cabor', 'id_cabor', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_contingent', 'id_contingent', 'trim|xss_clean|required');
		if($this->form_validation->run() === true){
			$arrival_id = $this->t_touchdown->insert(array(
				'date' => $this->input->post('date'),
				'time' => $this->input->post('time'),
				'id_participant' => $this->input->post('id_participant'),
				'id_ra' => $this->input->post('id_ra'),
				'id_ha' => $this->input->post('id_ha'),
				'id_cabor' => $this->input->post('id_cabor'),
				'id_contingent' => $this->input->post('id_contingent'),
				'status_hotel' => "false",
				'status_venue' => "false",
				'user' => $this->sys_user->user_data()->id,
			));
			
			$tp = $this->t_participant->get($this->input->post('id_participant'));
			$notif = 'Participant ' . $tp->name . ' added to Arrival Schedule!';
			$this->template->add_notif($notif);
			$this->index();
			return;
		}
		
		$this->template->add_breadcrumb('add new');
		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/arrival_management/add', array(
			'id_participant' => $this->t_participant->select_all(0, 0),
			'id_ra' => $this->t_ra->select_all(),
			'id_ha' => $this->t_ha->select_all(),
			'id_cabor' => $this->t_cabor->select_all(),
			'id_contingent' => $this->t_contingent->select_all(),
		), 'add Arrival');
		$this->template->render();
	}
	
	public function edit(){
		$notif = '';
		$id = intval($this->uri->segment(4));
		$data = $this->t_touchdown->get($id);
		
		if(!is_object($data)){
			echo 'id not found!';
			return;
		}
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('date', 'date', 'trim|xss_clean|required');
		$this->form_validation->set_rules('time', 'time', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_participant', 'id_participant', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_ra', 'id_ra', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_ha', 'id_ha', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_cabor', 'id_cabor', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_contingent', 'id_contingent', 'trim|xss_clean|required');
		if($this->form_validation->run() === true){
			$this->t_touchdown->update($id, array(
				'date' => $this->input->post('date'),
				'time' => $this->input->post('time'),
				'id_participant' => $this->input->post('id_participant'),
				'id_ra' => $this->input->post('id_ra'),
				'id_ha' => $this->input->post('id_ha'),
				'id_cabor' => $this->input->post('id_cabor'),
				'id_contingent' => $this->input->post('id_contingent'),
				'status_hotel' => "false",
				'status_venue' => "false",
				'user' => $this->sys_user->user_data()->id,
			));
			
			$tp = $this->t_participant->get($this->input->post('id_participant'));
			$notif = 'Arrival Schedule ' . $tp->name . ' updated!';
			redirect(base_url('index.php/' . $this->sys_user->user_data()->group_name . '/arrival_management/?notif=' . $notif));
			return;
		}
		
		$this->template->add_breadcrumb('edit');
		$this->template->add_breadcrumb($data->date);
		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/arrival_management/edit', array(
			'data' => $data,
			'id_participant' => $this->t_participant->select_all(0, 0),
			'id_ra' => $this->t_ra->select_all(),
			'id_ha' => $this->t_ha->select_all(),
			'id_cabor' => $this->t_cabor->select_all(),
			'id_contingent' => $this->t_contingent->select_all(),
		), 'edit: ' . $data->date);
		$this->template->render();
	}
	
	public function del(){
		$notif = '';
		
		$id = intval($this->uri->segment(4));
		$data = $this->t_touchdown->get($id);
		
		if(is_object($data)){
			$this->t_touchdown->delete($id);
			$notif = 'Arrival ' . $data->date . ' deleted!';
		}else{
			$notif = 'error on deleting Arrival ' . $data->date;
		}
		
		redirect(base_url('index.php/' . $this->sys_user->user_data()->group_name . '/arrival_management/?notif=' . $notif));
	}
}

/* End of file arrival_management.php */