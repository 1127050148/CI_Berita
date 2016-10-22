<?php
	class Model_stem extends CI_Model
	{
		function get_all(){
			$sql = "SELECT * FROM kata_dasar ORDER BY id_katadasar";
			return $this->db->query($sql)->result();
		}

		function get_by_kata($kata) {
			$sql = "SELECT * FROM kata_dasar WHERE katadasar = '".$kata."'";
			return $this->db->query($sql)->row();
		}
	}

?>