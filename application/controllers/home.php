<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	

	public function index()
	{
		$this->load->view('home');
		$this->load->view('slide');
		$this->load->view('badan');
	}
	// public function clasification(){
	// 	$this->load->view('form');
	// }
	public function classification(){

		$this->load->view('home');
		$this->load->view('vclassification');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */