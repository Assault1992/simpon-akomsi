<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ledging_management extends ADMIN_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->template->add_breadcrumb('Ledging Management', base_url('index.php/' . $this->sys_user->user_data()->group_name . '/ledging_management'));
		
		$this->load->model('t_ledging');
		$this->load->model('t_regional');
		$this->load->model('t_type');
	}
	
	public function index(){
		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/ledging_management/list', array(
			'q' => $this->t_ledging->select_all_ledging_index(0, 0),
		), 'Ledging List');
		$this->template->render();
	}
	
	public function add(){
		$notif = '';
	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'trim|xss_clean|required');
		$this->form_validation->set_rules('address', 'address', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_regional', 'id_regional', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_type', 'id_type', 'trim|xss_clean|required');
		$this->form_validation->set_rules('coordinate', 'coordinate', 'trim|xss_clean|required');
		if($this->form_validation->run() === true){
			$Cabor_id = $this->t_ledging->insert(array(
				'name' => $this->input->post('name'),
				'id_regional' => $this->input->post('id_regional'),
				'id_type' => $this->input->post('id_type'),
				'star' => $this->input->post('star'),
				'telp' => $this->input->post('telp'),
				'l_email' => $this->input->post('l_email'),
				'website' => $this->input->post('website'),
				'fax' => $this->input->post('fax'),
				'coordinate' => $this->input->post('coordinate'),
				'address' => $this->input->post('address'),
				'user' => $this->sys_user->user_data()->id,
			));
			
			$notif = 'Ledging ' . $this->input->post('name') . ' added!';
			$this->template->add_notif($notif);
			$this->index();
			return;
		}
		
		$this->template->add_breadcrumb('add new');
		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/ledging_management/add', array(
			'id_regional' => $this->t_regional->select_all(),
			'id_type' => $this->t_type->select_all(),
		), 'add Ledging');
		$this->template->render();
	}
	
	public function edit(){
		$notif = '';
		$id = intval($this->uri->segment(4));
		$data = $this->t_ledging->get($id);
		
		if(!is_object($data)){
			echo 'id not found!';
			return;
		}
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'trim|xss_clean|required');
		$this->form_validation->set_rules('address', 'address', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_regional', 'id_regional', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_type', 'id_type', 'trim|xss_clean|required');
		$this->form_validation->set_rules('coordinate', 'coordinate', 'trim|xss_clean|required');
		if($this->form_validation->run() === true){
			$this->t_ledging->update($id, array(
				'name' => $this->input->post('name'),
				'id_regional' => $this->input->post('id_regional'),
				'id_type' => $this->input->post('id_type'),
				'star' => $this->input->post('star'),
				'telp' => $this->input->post('telp'),
				'l_email' => $this->input->post('l_email'),
				'website' => $this->input->post('website'),
				'fax' => $this->input->post('fax'),
				'coordinate' => $this->input->post('coordinate'),
				'address' => $this->input->post('address'),
				'user' => $this->sys_user->user_data()->id,
			));
			
			$notif = 'ledging ' . $data->name . ' updated to ' . $this->input->post('name');
			redirect(base_url('index.php/' . $this->sys_user->user_data()->group_name . '/ledging_management/?notif=' . $notif));
			return;
		}
		
		$this->template->add_breadcrumb('edit');
		$this->template->add_breadcrumb($data->name);
		$this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/ledging_management/edit', array(
			'data' => $data,
			'id_regional' => $this->t_regional->select_all(),
			'id_type' => $this->t_type->select_all(),
		), 'edit: ' . $data->name);
		$this->template->render();
	}

	public function profile(){
		$notif = '';
		$id = intval($this->uri->segment(4));
		$data = $this->t_ledging->get($id);
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_ledging', 'id_ledging', 'trim|xss_clean|required');
		$this->form_validation->set_rules('company', 'company', 'trim|xss_clean|required');
		$this->form_validation->set_rules('signature', 'signature', 'trim|xss_clean|required');
		$this->form_validation->set_rules('position', 'position', 'trim|xss_clean|required');
		$this->form_validation->set_rules('sign_telp', 'sign_telp', 'trim|xss_clean|required');
		$this->form_validation->set_rules('sign_email', 'sign_email', 'trim|xss_clean|required');
		$this->form_validation->set_rules('npwp', 'npwp', 'trim|xss_clean|required');
		$this->form_validation->set_rules('pic', 'pic', 'trim|xss_clean|required');
		$this->form_validation->set_rules('pic_telp', 'pic_telp', 'trim|xss_clean|required');
		if($this->form_validation->run() === true){
			$ledging_profile = $this->t_org_details->insert(array(
				'id_ledging' => $this->input->post('id_ledging'),
				'company' => $this->input->post('company'),
				'signature' => $this->input->post('signature'),
				'position' => $this->input->post('position'),
				'sign_telp' => $this->input->post('sign_telp'),
				'sign_email' => $this->input->post('sign_email'),
				'npwp' => $this->input->post('npwp'),
				'pic' => $this->input->post('pic'),
				'pic_telp' => $this->input->post('pic_telp'),
				'user' => $this->input->post('user'),
			));

			$tl = $this->t_ledging->get($this->input->post('id_ledging'));
			$notif = 'Profil Penginapan ' . $tl->name . ' dengan perusahaan ' . $this->input->post('company') . ' sudah terupdate!';
			redirect(base_url('index.php/' . $this->sys_user->user_data()->group_name . '/awardess_management/?notif=' . $notif));
			return;
		}
		
		$this->template->add_breadcrumb('');
		$this->template->add_breadcrumb($data->name);
		$this->template->add_content_view($this->sys_user->user_data()->group_name . '/awardess_management/profile', array(
			'data' => $data,
		), 'Edit: ' . $data->name);
		$this->template->render();
	}

	public function profile_edit(){
		$notif = '';
		$id = intval($this->uri->segment(4));
		$data = $this->t_org_details->select_org_edit_profile(0, 0, $id)->row();
		
		if(!is_object($data)){
			echo 'id not found!';
			return;
		}
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_ledging', 'id_ledging', 'trim|xss_clean|required');
		$this->form_validation->set_rules('company', 'company', 'trim|xss_clean|required');
		$this->form_validation->set_rules('signature', 'signature', 'trim|xss_clean|required');
		$this->form_validation->set_rules('position', 'position', 'trim|xss_clean|required');
		$this->form_validation->set_rules('sign_telp', 'sign_telp', 'trim|xss_clean|required');
		$this->form_validation->set_rules('sign_email', 'sign_email', 'trim|xss_clean|required');
		$this->form_validation->set_rules('npwp', 'npwp', 'trim|xss_clean|required');
		$this->form_validation->set_rules('pic', 'pic', 'trim|xss_clean|required');
		$this->form_validation->set_rules('pic_telp', 'pic_telp', 'trim|xss_clean|required');
		if($this->form_validation->run() === true){
			$this->t_org_details->update($id, array(
				'id_ledging' => $this->input->post('id_ledging'),
				'company' => $this->input->post('company'),
				'signature' => $this->input->post('signature'),
				'position' => $this->input->post('position'),
				'sign_telp' => $this->input->post('sign_telp'),
				'sign_email' => $this->input->post('sign_email'),
				'npwp' => $this->input->post('npwp'),
				'pic' => $this->input->post('pic'),
				'pic_telp' => $this->input->post('pic_telp'),
				'user' => $this->input->post('user'),
			));

			$tl = $this->t_ledging->get($this->input->post('id_ledging'));
			$notif = 'Profil Penginapan ' . $tl->name . ' dengan perusahaan ' . $this->input->post('company') . ' sudah terupdate!';
			redirect(base_url('index.php/' . $this->sys_user->user_data()->group_name . '/awardess_management/?notif=' . $notif));
			return;
		}
		
		$this->template->add_breadcrumb('Edit');
		$this->template->add_breadcrumb($data->name);
		$this->template->add_content_view($this->sys_user->user_data()->group_name . '/awardess_management/edit_profile', array(
			'data' => $data,
		), 'Edit: ' . $data->name);
		$this->template->render();
	}
	
	public function del(){
		$notif = '';
		
		$id = intval($this->uri->segment(4));
		$data = $this->t_ledging->get($id);
		
		if(is_object($data)){
			$this->t_ledging->delete($id);
			$notif = 'Ledging ' . $data->name . ' deleted!';
		}else{
			$notif = 'error on deleting Ledging ' . $data->name;
		}
		
		redirect(base_url('index.php/' . $this->sys_user->user_data()->group_name . '/ledging_management/?notif=' . $notif));
	}
}

/* End of file ledging_management.php */