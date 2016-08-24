<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends PUBLIC_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->template->add_breadcrumb('home', base_url('index.php/public/home'));

		$this->load->model('t_cabor');
	}

	public function index(){
		$this->template->add_content_view('public/home/list', array(
			'q' => $this->t_cabor->select_cabor_public(0, 0),
		), '');
		$this->template->render();
	}
	/*
	public function index(){
		$this->template->add_breadcrumb('home');
		// $this->template->add_content('welcome welcome!', 'Welcome to CodeIgniter - ci_tpl v3');
		// $this->template->add_content_view('' . $this->sys_user->user_data()->group_name . '/public/list', array(
		// 	'q' => $this->t_cabor->select_all(0, 0),
		// ), 'Cabor List');
		$this->template->add_content_view('public/list', array(
			'q' => $this->t_cabor->select_gambar_cabor(),
		), 'Cabor List');
		// echo "<pre>";
		// print_r($this->t_cabor->select_all(0, 0)->result());
		// echo "</pre>";
		// exit;
		$this->template->render();
	}

	public function detail_cabor($id){
		$this->template->add_breadcrumb('home');
		// $this->template->add_content_view('template/public/single-project', array(
		// 	'q' => $this->t_cabor->select_all_cabor_index()->result(),
		// ), 'Cabor List');


		$this->template->add_content_view(
			'public/detail_cabor', array(
				'q' => $this->t_cabor->select_all_cabor_index($id),
			),'Cabor Detail');
		// print_r($this->t_cabor->select_all_cabor_index($id));
		// die();

		// $this->template->add_content_view('public/detail_cabor');
		// $q['detail'] = $this->t_cabor->select_all_cabor_index()->result();
		// $this->load->view('detail',$q);
		$this->template->render();
	}
	*/
}

/* End of file home.php */