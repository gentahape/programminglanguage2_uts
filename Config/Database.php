<?php 

/**
 * 
 */
class Database
{
	var $host = 'localhost';
	var $uname = 'root';
	var $pass = '';
	var $db = 'kuliah_pl2_uts';

	function connect()
	{
		$this->connection = mysqli_connect($this->host,$this->uname,$this->pass,$this->db);
		return $this->connection;
	}
}