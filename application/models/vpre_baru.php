<?php
	class Vpre_baru extends CI_Model
	{

		public $table = 'berita_baru';
		public $id = 'id_berita_baru';
		public $order ='DESC';

		public function get_all(){
			// $data = $this->db->query('select * from berita_baru');
			// return $data->result_array();
			$sql = "SELECT * FROM berita_baru";
			return $this->db->query($sql)->result();
		}

		public function get_id() {
			$sql = $this->db->query("SELECT * FROM berita_baru WHERE id_berita_baru = '".$id."'");
			return $this->db->query($sql)->row();
		}

		public function cari($keyword){
			$sql =  "SELECT * from berita_baru WHERE isi_berita = '".$keyword."'";
		}

		public function search(){
			$cari = $this->input->POST('cari');
			// $this->db->like('isi_berita', $cari);
			// $query = $this->db->get('berita_baru');
			// return $query->result;
			$sql = "SELECT * FROM berita_baru";
			return $this->db->query($sql)->result();
		}
	}

?>