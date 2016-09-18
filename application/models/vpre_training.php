<?php
	class Vpre_training extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
			$this->tableName = 'preprocess_training';
			$this->tableAdd = 'preprocess_training';
			$this->primaryKey = 'no_preprocess_training';
			$this->orderName = 'no_preprocess_training';
		}
	}

?>