<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {	

	function __construct()
	{
		parent::__construct();
		$this->load->model('mtampil');
	}

	public function index()
	{
		// $this->load->model('mtampil');
		$data['daftar'] = $this->mtampil->get_all_berita();
		$this->load->view('home');
		// $this->load->view('slide');
		$this->load->view('badan', $data);
	}

	public function classification(){
		$this->load->view('home');
		$this->load->view('vclassification');
	}

	public function result(){
		// $this->load->model('mtampil');
		$data['daftar'] = $this->mtampil->get_all();
		$this->load->view('home');
		$this->load->view('vresult', $data);
	}

	public function kompas(){
		// $this->load->model('mtampil');
		$data['daftar'] = $this->mtampil->get_kompas();
		$this->load->view('home');
		$this->load->view('vsumberkompas', $data);
	}

	public function detik(){
		// $this->load->model('mtampil');
		$data['daftar'] = $this->mtampil->get_detik();
		$this->load->view('home');
		$this->load->view('vsumberdetik', $data);
	}

	public function liputan6(){
		// $this->load->model('mtampil');
		$data['daftar'] = $this->mtampil->get_liputan6();
		$this->load->view('home');
		$this->load->view('vsumberliputan', $data);
	}

	public function tribunNews(){
		// $this->load->model('mtampil');
		$data['daftar'] = $this->mtampil->get_tribun();
		$this->load->view('home');
		$this->load->view('vsumbertribun', $data);
	}

	public function vivaNews(){
		// $this->load->model('mtampil');
		$data['daftar'] = $this->mtampil->get_viva();
		$this->load->view('home');
		$this->load->view('vsumberviva', $data);
	}

	public function readmore($id) {
		// $id = $this->uri->segment(3);
		$data['daftar'] = $this->mtampil->readmore($id);
		$this->load->view('home');
		$this->load->view('tampilBerita',$data);
	}

	public function politik(){
		// $this->load->model('mtampil');
		$data['daftar'] = $this->mtampil->get_politik();
		$this->load->view('home');
		$this->load->view('vpolitik', $data);
	}

	public function olahraga(){
		// $this->load->model('mtampil');
		$data['daftar'] = $this->mtampil->get_olahraga();
		$this->load->view('home');
		$this->load->view('volahraga', $data);
	}

	public function pendidikan(){
		// $this->load->model('mtampil');
		$data['daftar'] = $this->mtampil->get_pendidikan();
		$this->load->view('home');
		$this->load->view('vpendidikan', $data);
	}

	public function otomotif(){
		// $this->load->model('mtampil');
		$data['daftar'] = $this->mtampil->get_otomotif();
		$this->load->view('home');
		$this->load->view('votomotif', $data);
	}

	public function umum(){
		// $this->load->model('mtampil');
		$data['daftar'] = $this->mtampil->get_umum();
		$this->load->view('home');
		$this->load->view('vumum', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */