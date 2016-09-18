<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Preprocessing extends CI_Controller
	{
		protected $this;

		public function index(){
			// $this->load->model('vpre_baru');
			// $konten=$this->vpre_baru->get_all();
			
			// $text= array(
			// 	'konten'=>$konten
			// 	);
			// $this->load->view('view_berita',$text);
		}

		public function text()
		{
			$data['isi_berita'] = $this->vpre_baru->get_all();
			$this->load->view('view_berita', $data, array('data'=>$data));
		}

		public function pecah_kalimat($text) //no $text
		{
			// $isi = $this->index($text);
			// foreach ($isi as $key => $value) {
			// 	$pecah = explode(".", $this->$text); //pake ini
			// 	return $pecah; //pake ini
			// }

			$pecah = explode(".", $this->$text);
			return $pecah;
		}

		public function case_folding($text)
		{
			$looping_data = $this->pecah_kalimat($text);
			foreach ($looping_data as $key => $value) 
			{
				$input = preg_replace('@[?:;,./"+=!#()0-9]+@', " ", strtolower($value));
				$data[] = $input;
			}
			return $data;
		}

		public function tokenizing($text)
		{
			$data = $this->case_folding($text);
			foreach ($data as $key => $values) 
			{
				$case[] = explode(" ", $values);
			}
			foreach ($case as $key => $value) 
			{
				$response[] = $value;
			}
			return $response;
		}

		public function filtering($kalimat) 
		{
			// menghilangkan array yang sama
			$data = $this->tokenizing($kalimat);
			foreach ($data as $key => $value) 
			{
				$index_array = $this->array_empty_remover($value);
				// $uniq = array_unique($index_array);
				$filtering[] = $index_array; // array_merge($uniq);
			}
			return $filtering;
		}

		public function stopword($array_kalimat, $array_stopword)
		{
			return str_replace($array_stopword, " ", $array_kalimat);
		}

		public function array_empty_remover($array, $remove_null_number = TRUE)
		{
			$array_remove = (
					'yang'
				);
		}

		public function stemming($word) {
			/*$stem = NaziefStemmer::Stem($word);
			return $stem;*/
		}
	}

	// $ir = new Preprocessing;
	// echo $ir->index;
?>