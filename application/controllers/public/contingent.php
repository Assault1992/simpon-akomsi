<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class contingent extends PUBLIC_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->template->add_breadcrumb('contingent', base_url('index.php/public/contingent'));

		$this->load->model('t_contingent');
	}

	public function index(){
		$this->template->add_content_view('public/contingent/list', array(
			'q' => $this->t_contingent->select_contingent_public(0, 0),
		), '');
		$this->template->render();
	}

	public function detail(){
		$id = intval($this->uri->segment(4));
		$data = $this->t_contingent->select_contingent_detail(0, 0, $id)->row();
		
		if(!is_object($data)){
			echo 'id not found!';
			return;
		}
		
		$this->template->add_breadcrumb('detail');
		$this->template->add_content_view('/public/contingent/detail', array(
			'q' => $this->t_contingent->select_contingent_detail(0, 0, $id),
			'data' => $data,
		), '');
		$this->template->render();
	}
	
}

/* End of file contingent.php */