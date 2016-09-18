<?php
	class GetURL_Model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
			$this->tableName = 'rss';
			$this->tableAdd = 'rss';
			$this->primaryKey = 'id';
			$this->orderName = 'id';
		}
		// public function get_all(){
		// 	$data = $this->db->query('select * from rss');
		// 	return $data->result_array;
		// }
		// public function input_data($data, $table){
		// 	$this->db->insert($table,$data)
		// }
		public function insert($url){
			$input = $this->db->insert('rss', $url);
			return $input->result_array;
		}
	}

?>