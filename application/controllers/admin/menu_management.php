<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class menu_management extends ADMIN_Controller {

	public function __construct(){
		parent::__construct();
		$this->template->add_breadcrumb('Menu management', base_url('index.php/' . $this->sys_user->user_data()->group_name . '/menu_management'));

		$this->load->model('t_menu');
		$this->load->model('t_type_menu');
	}

	public function index(){
		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/menu_management/list', array(
			'q' => $this->t_menu->select_menu_index(0, 0),
		), 'Menu List');
		$this->template->render();
	}

	public function add(){
		$notif = '';

		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_type_menu', 'id_type_menu', 'trim|xss_clean|required');
		$this->form_validation->set_rules('menu', 'menu', 'trim|xss_clean|required');
		$this->form_validation->set_rules('day', 'day', 'trim|xss_clean|required');
		if($this->form_validation->run() === true){
			$menu_id = $this->t_menu->insert(array(
				'id_type_menu' => $this->input->post('id_type_menu'),
				'menu' => $this->input->post('menu'),
				'day' => $this->input->post('day'),
				'user' => $this->sys_user->user_data()->id,
			));

			$ttm = $this->t_type_menu->get($this->input->post('id_ledging'));
			$notif = 'Menu hari ke' .  $this->input->post('day') . ' added!';
			$this->template->add_notif($notif);
			$this->index();
			return;
		}

		$this->template->add_breadcrumb('add new');
		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/menu_management/add', array(
			'id_type_menu' => $this->t_type_menu->select_all(),
		), 'add Menu');
		$this->template->render();
	}

	public function edit(){
		$notif = '';
		$id = intval($this->uri->segment(4));
		$data = $this->t_menu->get($id);

		if(!is_object($data)){
			echo 'id not found!';
			return;
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_type_menu', 'id_type_menu', 'trim|xss_clean|required');
		$this->form_validation->set_rules('menu', 'menu', 'trim|xss_clean|required');
		$this->form_validation->set_rules('day', 'day', 'trim|xss_clean|required');
		if($this->form_validation->run() === true){
			$this->t_menu->update($id, array(
				'id_type_menu' => $this->input->post('id_type_menu'),
				'menu' => $this->input->post('menu'),
				'day' => $this->input->post('day'),
				'user' => $this->sys_user->user_data()->id,
			));

			$ttm = $this->t_type_menu->get($this->input->post('id_ledging'));
			$notif = 'Menu' . $ttm->name . ' updated to ' . $ttm->name;
			redirect(base_url('index.php/' . $this->sys_user->user_data()->group_name . '/menu_management/?notif=' . $notif));
			return;
		}

		$this->template->add_breadcrumb('edit');
		$this->template->add_breadcrumb($data->id_type_menu);
		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/menu_management/edit', array(
			'data' => $data,
			'id_type_menu' => $this->t_type_menu->select_all(),
		), 'edit: ' . $data->id_type_menu);
		$this->template->render();
	}

	public function del(){
		$notif = '';

		$id = intval($this->uri->segment(4));
		$data = $this->t_menu->get($id);

		if(is_object($data)){
			$this->t_menu->delete($id);
			$notif = 'Menu' . $data->id_ledging . ' deleted!';
		}else{
			$notif = 'error on deleting Menu' . $data->id_ledging;
		}

		redirect(base_url('index.php/' . $this->sys_user->user_data()->group_name . '/menu_management/?notif=' . $notif));
	}
}

/* End of file menu_management.php */
