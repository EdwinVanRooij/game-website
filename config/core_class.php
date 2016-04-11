<?php
if (!defined('INIT_SCRIPT')) exit;

class Database {
	private $num_queries = 0;
	private $connection = "";
	private $last_query = "";
	private $last_result = "";
	
	public function Database($db_url, $db_user, $db_pass) {
		$this->connection = mysql_connect($db_url, $db_user, $db_pass) or trigger_error('Failed to connect to MySQL Server', E_USER_ERROR);
	}
	
	public function select_db($s_db) {
		return mysql_select_db($s_db, $this->connection) or trigger_error('Cannot select database: '.$s_db, E_USER_ERROR);
	}
	
	public function last_error() {
		return mysql_error();
	}
	
	public function last_query() {
		return $this->last_query;
	}
	
	public function last_result() {
		return $this->last_result;
	}
	
	public function num_queries() {
		return $this->num_queries;
	}
	
	public function query($sql_query) {
		$this->last_query = $sql_query;
		if(!$this->last_result = @mysql_query($this->last_query, $this->connection)){
			trigger_error('Failed to execute MySQL Query - '.mysql_error().'<br />Query: '.$sql_query, E_USER_ERROR);
			return false;
		}
		++$this->num_queries;
		return $this->last_result;
	}
	
	public function s_query($sql_query) {
		$query = @mysql_query($sql_query, $this->connection) or trigger_error('Failed to execute MySQL Query: '.mysql_error(), E_USER_ERROR);
		++$this->num_queries;
		return $query;
	}
	
	public function fetch_next() {
		return mysql_fetch_assoc($this->last_result);
	}
	
	public function s_fetch_next($sql_query) {
		return mysql_fetch_assoc($sql_query);
	}
	
	public function fetch_next_simple() {
		return mysql_fetch_rows($this->last_result);
	}
	
	public function s_fetch_array($sql_query) {
		return mysql_fetch_array($sql_query);
	}
	
	public function rows() {
		return mysql_num_rows($this->last_result);
	}
	
	public function s_rows($sql_query) {
		return mysql_num_rows($sql_query);
	}
	
	public function affected_rows() {
		return mysql_affected_rows();
	}
	
	public function free_result() {
		return mysql_free_result($this->last_result);
	}
	
	public function __destruct() {
		if (!@mysql_close($this->connection)) {
			trigger_error('Failed to close MySQL connection', E_USER_ERROR);
		}
		return true;
	}
}