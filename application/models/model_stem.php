<?php
	class Model_stem extends CI_Model
	{
		public $table = 'kata_dasar';
		public $id = 'id_katadasar';
		public $order ='DESC';

		function get_all(){
			$this->db->order_by($this->id, $this->order);
			return $this->db->get($this->table)->result();
		}

		function get_by_kata($dasar) {
			$query = $this->db->query("SELECT * FROM".$table." WHERE katadasar = ".$dasar);
			return $query;
		}
	}

?>