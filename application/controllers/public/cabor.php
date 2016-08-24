<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cabor extends PUBLIC_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->template->add_breadcrumb('cabor', base_url('index.php/public/cabor'));

		$this->load->model('t_cabor');
	}

	public function index(){
		$this->template->add_content_view('public/cabor/list', array(
			'q' => $this->t_cabor->select_cabor_public(0, 0),
		), '');
		$this->template->render();
	}
	
	public function detail(){
		$id = intval($this->uri->segment(4));
		$data = $this->t_cabor->select_cabor_detail(0, 0, $id)->row();
		
		if(!is_object($data)){
			echo 'id not found!';
			return;
		}
		
		$this->template->add_breadcrumb('detail');
		$this->template->add_content_view('/public/cabor/detail', array(
			'q' => $this->t_cabor->select_cabor_detail(0, 0, $id),
			'data' => $data,
		), '');
		$this->template->render();
	}
}

/* End of file home.php */