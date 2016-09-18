<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ScrawlingKompas extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// $this->load->view('vclassification');
	}

	public function readHTML($url)
	{
		// inisialisasi CURL
	    $data = curl_init();
	    // setting CURL
	    curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($data, CURLOPT_URL, $url);
	    // menjalankan CURL untuk membaca isi file
	    $hasil = curl_exec($data);
	    curl_close($data);
	    return $hasil;
	}
	$kodeHTML =  bacaHTML('localhost://CI_Berita/Kompas/parkir.html'); echo $kodeHTML;
	// $pecah = explode('<article>', $kodeHTML);

	// $pecahLagi = explode('</article>', $pecah[1]);


	// echo $pecahLagi[0];
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */