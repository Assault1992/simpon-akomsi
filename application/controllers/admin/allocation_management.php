<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class allocation_management extends ADMIN_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->template->add_breadcrumb('Allocation Management', base_url('index.php/' . $this->sys_user->user_data()->group_name . '/allocation_management'));
		
		$this->load->model('t_allocation');
		$this->load->model('t_cabor');
		$this->load->model('t_ledging');
	}
	
	public function index(){
		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/allocation_management/list', array(
			'q' => $this->t_allocation->select_all_allocation_index(0, 0),
		), 'Allocation List');
		
		$this->template->render();
	}
	
	public function add(){
		$notif = '';
	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('for', 'for', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_cabor', 'id_cabor', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_ledging', 'id_ledging', 'trim|xss_clean|required');
		$this->form_validation->set_rules('allocation', 'allocation', 'trim|xss_clean|required');
		if($this->form_validation->run() === true){
			$allocation_id = $this->t_allocation->insert(array(
				'for' => $this->input->post('for'),
				'id_cabor' => $this->input->post('id_cabor'),
				'id_ledging' => $this->input->post('id_ledging'),
				'allocation' => $this->input->post('allocation'),
				'user' => $this->sys_user->user_data()->id,
			));
			
			$il = $this->t_ledging->get($this->input->post('id_ledging'));
			$ic = $this->t_cabor->get($this->input->post('id_cabor'));
			$notif = 'Hotel ' . $il->name . ' For Cabor ' . $ic->name. ' Allocation' . $this->input->post('for') . 'added!';
			$this->template->add_notif($notif);
			$this->index();
			return;
		}
		
		$this->template->add_breadcrumb('add new');
		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/allocation_management/add', array(
			'id_cabor' => $this->t_cabor->select_all(),
			'id_ledging' => $this->t_ledging->select_all(),
		), 'Add Allocation');

		$this->template->render();
	}
	
	public function edit(){
		$notif = '';
		$id = intval($this->uri->segment(4));
		$data = $this->t_allocation->get($id);
		
		if(!is_object($data)){
			echo 'id not found!';
			return;
		}
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('for', 'for', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_cabor', 'id_cabor', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_ledging', 'id_ledging', 'trim|xss_clean|required');
		$this->form_validation->set_rules('allocation', 'allocation', 'trim|xss_clean|required');
		if($this->form_validation->run() === true){
			$this->t_allocation->update($id, array(
				'for' => $this->input->post('for'),
				'id_cabor' => $this->input->post('id_cabor'),
				'id_ledging' => $this->input->post('id_ledging'),
				'allocation' => $this->input->post('allocation'),
				'user' => $this->sys_user->user_data()->id,
			));
			
			$il = $this->t_ledging->get($this->input->post('id_ledging'));
			$ic = $this->t_cabor->get($this->input->post('id_cabor'));
			$notif = 'Hotel ' . $il->name . ' Cabor ' . $ic->name . ' Allocatiin For ' . $this->input->post('for') . ' updated!';
			redirect(base_url('index.php/' . $this->sys_user->user_data()->group_name . '/allocation_management/?notif=' . $notif));
			return;
		}
		
		$this->template->add_breadcrumb('edit');
		$this->template->add_breadcrumb($data->id_ledging);
		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/allocation_management/edit', array(
			'data' => $data,
			'id_cabor' => $this->t_cabor->select_all(),
			'id_ledging' => $this->t_ledging->select_all(),
		), 'edit: ' . $data->id_ledging);
		$this->template->render();
	}
	
	public function del(){
		$notif = '';
		
		$id = intval($this->uri->segment(4));
		$data = $this->t_allocation->get($id);
		
		if(is_object($data)){
			$this->t_allocation->delete($id);
			$notif = 'Allocation ' . $data->t_allocation . ' deleted!';
		}else{
			$notif = 'error on deleting allocation ' . $data->t_allocation;
		}
		
		redirect(base_url('index.php/' . $this->sys_user->user_data()->group_name . '/allocation_management/?notif=' . $notif));
	}
}

/* End of file allocation_management.php */