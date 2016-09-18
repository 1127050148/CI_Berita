<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Preproses extends CI_Controller {
		public function index()
		{
			$this->load->model('vpre_baru');
			$konten=$this->vpre_baru->get_all();
			
			$text= array(
				'konten'=>$konten
				);
			$this->load->view('view_berita',$text);
		}
		public function tokenisasi($text)
		{
			$kata = str_word_count(strtolower($text ),1);
			$jumlah = count($kata);
			
			return $kata;
		}
	}

?>