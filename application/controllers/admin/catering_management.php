<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class catering_management extends ADMIN_Controller {

	public function __construct(){
		parent::__construct();
		$this->template->add_breadcrumb('Catering Management', base_url('index.php/' . $this->sys_user->user_data()->group_name . '/catering_management'));

		$this->load->model('t_catering');
		$this->load->model('t_kitchen');
		$this->load->model('t_regional');
	}

	public function index(){
		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/catering_management/list', array(
			'q' => $this->t_catering->select_catering_index(0, 0),
		), 'Catering List');
		$this->template->render();
	}

	public function add(){
		$notif = '';

		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'trim|xss_clean|required');
		$this->form_validation->set_rules('address', 'address', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_kitchen', 'id_kitchen', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_regional', 'id_regional', 'trim|xss_clean|required');
		$this->form_validation->set_rules('cp_name', 'cp_name', 'trim|xss_clean|required');
		$this->form_validation->set_rules('cp_telp', 'cp_telp', 'trim|xss_clean|required');
		if($this->form_validation->run() === true){
			$catering_id = $this->t_catering->insert(array(
				'name' => $this->input->post('name'),
				'address' => $this->input->post('address'),
				'id_kitchen' => $this->input->post('id_kitchen'),
				'id_regional' => $this->input->post('id_regional'),
				'cp_name' => $this->input->post('cp_name'),
				'cp_telp' => $this->input->post('cp_telp'),
				'cp_email' => $this->input->post('cp_email'),
			));

			$notif = 'Catering ' . $this->input->post('name') . ' added!';
			$this->template->add_notif($notif);
			$this->index();
			return;
		}

		$this->template->add_breadcrumb('add new');
		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/catering_management/add', array(
			'id_kitchen' => $this->t_kitchen->select_all(),
			'id_regional' => $this->t_regional->select_all(),
		), 'add Catering');
		$this->template->render();
	}

	public function edit(){
		$notif = '';
		$id = intval($this->uri->segment(4));
		$data = $this->t_catering->get($id);

		if(!is_object($data)){
			echo 'id not found!';
			return;
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'trim|xss_clean|required');
		$this->form_validation->set_rules('address', 'address', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_kitchen', 'id_kitchen', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_regional', 'id_regional', 'trim|xss_clean|required');
		$this->form_validation->set_rules('cp_name', 'cp_name', 'trim|xss_clean|required');
		$this->form_validation->set_rules('cp_telp', 'cp_telp', 'trim|xss_clean|required');
		if($this->form_validation->run() === true){
			$this->t_catering->update($id, array(
				'name' => $this->input->post('name'),
				'address' => $this->input->post('address'),
				'id_kitchen' => $this->input->post('id_kitchen'),
				'id_regional' => $this->input->post('id_regional'),
				'cp_name' => $this->input->post('cp_name'),
				'cp_telp' => $this->input->post('cp_telp'),
				'cp_email' => $this->input->post('cp_email'),
			));

			$notif = 'Catering ' . $data->name . ' updated to ' . $this->input->post('name');
			redirect(base_url('index.php/' . $this->sys_user->user_data()->group_name . '/catering_management/?notif=' . $notif));
			return;
		}

		$this->template->add_breadcrumb('edit');
		$this->template->add_breadcrumb($data->name);
		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/catering_management/edit', array(
			'data' => $data,
			'id_kitchen' => $this->t_kitchen->select_all(),
			'id_regional' => $this->t_regional->select_all(),
		), 'edit: ' . $data->name);
		$this->template->render();
	}

	public function del(){
		$notif = '';

		$id = intval($this->uri->segment(4));
		$data = $this->t_catering->get($id);

		if(is_object($data)){
			$this->t_catering->delete($id);
			$notif = 'catering ' . $data->name . ' deleted!';
		}else{
			$notif = 'error on deleting catering ' . $data->name;
		}

		redirect(base_url('index.php/' . $this->sys_user->user_data()->group_name . '/catering_management/?notif=' . $notif));
	}
}

/* End of file catering_management.php */
