<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class room_management extends ADMIN_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->template->add_breadcrumb('Room Management', base_url('index.php/' . $this->sys_user->user_data()->group_name . '/room_management'));
		
		$this->load->model('t_room');
		$this->load->model('t_allocation');
		$this->load->model('t_contingent');
	}
	
	public function index(){
		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/room_management/list', array(
			'q' => $this->t_room->select_room_index(0, 0),
		), 'Room List');
		$this->template->render();
	}
	
	public function add(){
		$notif = '';
	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_allocation', 'id_allocation', 'trim|xss_clean|required');
		$this->form_validation->set_rules('capacity', 'capacity', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_contingent', 'id_contingent', 'trim|xss_clean|required');
		$this->form_validation->set_rules('gender', 'gender', 'trim|xss_clean|required');
		if($this->form_validation->run() === true){
			$room_id = $this->t_room->insert(array(
				'name' => $this->input->post('name'),
				'id_allocation' => $this->input->post('id_allocation'),
				'capacity' => $this->input->post('capacity'),
				'id_contingent' => $this->input->post('id_contingent'),
				'gender' => $this->input->post('gender'),
				'user' => $this->sys_user->user_data()->id,
			));
			
			$notif = 'Room ' . $this->input->post('name') . ' added!';
			$this->template->add_notif($notif);
			$this->index();
			return;
		}
		
		$this->template->add_breadcrumb('add new');
		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/room_management/add', array(
			'id_allocation' => $this->t_allocation->select_all_allocation_room(0, 0),
			'id_contingent' => $this->t_contingent->select_all(),
		), 'add Room');
		$this->template->render();
	}
	
	public function edit(){
		$notif = '';
		$id = intval($this->uri->segment(4));
		$data = $this->t_room->get($id);
		
		if(!is_object($data)){
			echo 'id not found!';
			return;
		}
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_allocation', 'id_allocation', 'trim|xss_clean|required');
		$this->form_validation->set_rules('capacity', 'capacity', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_contingent', 'id_contingent', 'trim|xss_clean|required');
		$this->form_validation->set_rules('gender', 'gender', 'trim|xss_clean|required');
		if($this->form_validation->run() === true){
			$this->t_room->update($id, array(
				'name' => $this->input->post('name'),
				'id_allocation' => $this->input->post('id_allocation'),
				'capacity' => $this->input->post('capacity'),
				'id_contingent' => $this->input->post('id_contingent'),
				'gender' => $this->input->post('gender'),
				'user' => $this->sys_user->user_data()->id,
			));
			
			$notif = 'Room ' . $data->name . ' updated to ' . $this->input->post('name');
			redirect(base_url('index.php/' . $this->sys_user->user_data()->group_name . '/room_management/?notif=' . $notif));
			return;
		}
		
		$this->template->add_breadcrumb('edit');
		$this->template->add_breadcrumb($data->name);
		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/room_management/edit', array(
			'data' => $data,
			'id_allocation' => $this->t_allocation->select_all_allocation_room(0, 0),
			'id_contingent' => $this->t_contingent->select_all(),
		), 'edit: ' . $data->name);
		$this->template->render();
	}
	
	public function del(){
		$notif = '';
		
		$id = intval($this->uri->segment(4));
		$data = $this->t_room->get($id);
		
		if(is_object($data)){
			$this->t_room->delete($id);
			$notif = 'Room ' . $data->name . ' deleted!';
		}else{
			$notif = 'error on deleting Room ' . $data->name;
		}
		
		redirect(base_url('index.php/' . $this->sys_user->user_data()->group_name . '/room_management/?notif=' . $notif));
	}
}

/* End of file room_management.php */