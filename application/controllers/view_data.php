<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_data extends CI_Controller {

public function index() {
			//$this->mod_keamanan->keamanan();
			$isi['data']		= $this->db->get('berita_baru');
			$this->load->view('view_berita',$isi);
		}
}