<?php
	class Vpre_baru extends CI_Model
	{

		public $table = 'berita_baru';
		public $id = 'id_berita_baru';
		public $order ='DESC';

		function get_all(){
			$data = $this->db->query('select * from berita_bru');
			return $data->result_array();
			// $this->db->order_by($this->id, $this->order);
			// return $this->db->get($this->table)->result();
		}
		function get_by_id($id){
			$this->db->where($this->id, $id);
			return $this->db->get($this->table)->row();
		}
		function get_id_1() {
			$query = $this->db->query("SELECT isi_berita FROM berita_baru WHERE id_berita_baru = '1' ");
			return $query;
		}
	}

?>