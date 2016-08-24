<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class venue_management extends ADMIN_Controller {

	public function __construct(){
		parent::__construct();
		$this->template->add_breadcrumb('Venue Management', base_url('index.php/' . $this->sys_user->user_data()->group_name . '/venue_management'));

		$this->load->model('t_venue');
		$this->load->model('t_regional');
		$this->load->model('t_cabor');
	}

	public function index(){
		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/venue_management/list', array(
			'q' => $this->t_venue->select_all_venue(0, 0),
		), 'Venue List');
		$this->template->render();
	}

	public function add(){
		$notif = '';

		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'trim|xss_cllean|required');
		$this->form_validation->set_rules('address', 'address', 'trim|xss_cllean|required');
		$this->form_validation->set_rules('id_regional', 'id_regional', 'trim|xss_cllean|required');
		$this->form_validation->set_rules('id_cabor', 'id_cabor', 'trim|xss_cllean|required');
		$this->form_validation->set_rules('coordinate', 'coordinate', 'trim|xss_cllean|required');
		if($this->form_validation->run() === true){
			$venue_id = $this->t_venue->insert(array(
				'name' => $this->input->post('name'),
				'address' => $this->input->post('address'),
				'id_regional' => $this->input->post('id_regional'),
				'id_cabor' => $this->input->post('id_cabor'),
				'coordinate' => $this->input->post('coordinate'),
				'user' => $this->sys_user->user_data()->id,
			));

			$notif = 'Venue ' . $this->input->post('name') . ' added!';
			$this->template->add_notif($notif);
			$this->index();
			return;
		}

		$this->template->add_breadcrumb('add new');
		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/venue_management/add', array(
			'id_regional' => $this->t_regional->select_all(),
			'id_cabor' => $this->t_cabor->select_all(),
		), 'add Venue');
		$this->template->render();
	}

	public function edit(){
		$notif = '';
		$id = intval($this->uri->segment(4));
		$data = $this->t_venue->get($id);

		if(!is_object($data)){
			echo 'id not found!';
			return;
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'trim|xss_cllean|required');
		$this->form_validation->set_rules('address', 'address', 'trim|xss_cllean|required');
		$this->form_validation->set_rules('id_regional', 'id_regional', 'trim|xss_cllean|required');
		$this->form_validation->set_rules('id_cabor', 'id_cabor', 'trim|xss_cllean|required');
		$this->form_validation->set_rules('coordinate', 'coordinate', 'trim|xss_cllean|required');
		if($this->form_validation->run() === true){
			$this->t_venue->update($id, array(
				'name' => $this->input->post('name'),
				'address' => $this->input->post('address'),
				'id_regional' => $this->input->post('id_regional'),
				'id_cabor' => $this->input->post('id_cabor'),
				'coordinate' => $this->input->post('coordinate'),
				'user' => $this->sys_user->user_data()->id,
			));

			$notif = 'Venue ' . $data->name . ' updated to ' . $this->input->post('name');
			redirect(base_url('index.php/' . $this->sys_user->user_data()->group_name . '/venue_management/?notif=' . $notif));
			return;
		}

		$this->template->add_breadcrumb('edit');
		$this->template->add_breadcrumb($data->name);
		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/venue_management/edit', array(
			'data' => $data,
			'id_regional' => $this->t_regional->select_all(),
			'id_cabor' => $this->t_cabor->select_all(),
		), 'edit: ' . $data->name);
		$this->template->render();
	}

	public function del(){
		$notif = '';

		$id = intval($this->uri->segment(4));
		$data = $this->t_venue->get($id);

		if(is_object($data)){
			$this->t_venue->delete($id);
			$notif = 'Venue ' . $data->name . ' deleted!';
		}else{
			$notif = 'error on deleting Venue ' . $data->name;
		}

		redirect(base_url('index.php/' . $this->sys_user->user_data()->group_name . '/venue_management/?notif=' . $notif));
	}
}

/* End of file venue_management.php */
