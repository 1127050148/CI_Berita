<?php
	class Vpre_training extends CI_Model
	{
		public function get_all(){
			$sql = "SELECT * FROM berita_training";
			return $this->db->query($sql)->result();
		}

		public function get_id(){
			$sql = "SELECT * FROM berita_training WHERE id_berita_training = '".$id."'";
			return $this->db->query($sql)->row();
		}

		public function jum_dok(){
			$data = $this->db->query('SELECT DISTINCT id_doc from tbindex_baru');
			return $data->num_rows();
		}

		public function jum_term(){
			$data = $this->db->query('SELECT * FROM tbindex_baru ORDER BY id_indexBaru');
			if ($data->num_rows >0 ) {
				return $data;
			}
			else {
				return NULL;
			}
		}

		public function countTerm($term) {
			$data = $this->db->query("SELECT COUNT(*) as jumDoc from tbindex_baru where term = '".$term."'");
			return $data->result();
		}

		public function updateTbIndex($w, $id){
			$data = $this->db->query("UPDATE tbindex_baru SET bobot = '".$w."' WHERE id_indexBaru = '".$id."'");
		}
	}
?>