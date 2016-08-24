<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cabor_management extends ADMIN_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->template->add_breadcrumb('Cabor management', base_url('index.php/' . $this->sys_user->user_data()->group_name . '/cabor_management'));
		
		$this->load->model('t_cabor');
	}
	
	public function index(){
		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/cabor_management/list', array(
			'q' => $this->t_cabor->select_all(0, 0),
		), 'Cabor List');
		$this->template->render();
	}
	
	public function add(){
		$notif = '';
	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'trim|xss_clean|required');
		if($this->form_validation->run() === true){
			$Cabor_id = $this->t_cabor->insert(array(
				'name' => $this->input->post('name'),
			));
			
			$notif = 'Cabor ' . $this->input->post('name') . ' added!';
			$this->template->add_notif($notif);
			$this->index();
			return;
		}
		
		$this->template->add_breadcrumb('add new');
		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/cabor_management/add', array(
			'Cabor' => $this->t_cabor->select_all(),
		), 'add Cabor');
		$this->template->render();
	}
	
	public function edit(){
		$notif = '';
		$id = intval($this->uri->segment(4));
		$data = $this->t_cabor->get($id);
		
		if(!is_object($data)){
			echo 'id not found!';
			return;
		}
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'trim|xss_clean|required');
		if($this->form_validation->run() === true){
			$this->t_cabor->update($id, array(
				'name' => $this->input->post('name'),
			));
			
			$notif = 'Cabor ' . $data->name . ' updated to ' . $this->input->post('name');
			redirect(base_url('index.php/' . $this->sys_user->user_data()->group_name . '/cabor_management/?notif=' . $notif));
			return;
		}
		
		$this->template->add_breadcrumb('edit');
		$this->template->add_breadcrumb($data->name);
		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/cabor_management/edit', array(
			'data' => $data,
			'cabor' => $this->t_cabor->select_all(),
		), 'edit: ' . $data->name);
		$this->template->render();
	}
	
	public function del(){
		$notif = '';
		
		$id = intval($this->uri->segment(4));
		$data = $this->t_cabor->get($id);
		
		if(is_object($data)){
			$this->t_cabor->delete($id);
			$notif = 'Cabor ' . $data->name . ' deleted!';
		}else{
			$notif = 'error on deleting Cabor ' . $data->name;
		}
		
		redirect(base_url('index.php/' . $this->sys_user->user_data()->group_name . '/cabor_management/?notif=' . $notif));
	}
}

/* End of file cabor_management.php */