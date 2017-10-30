<?php
	class Model {
		public $mysqli;
		function __construct(){
			include "./conf/config.php"; 
			$this->mysqli = new mysqli($config['host'],$config['user'],$config['password'],$config['dbname']);
			$this->mysqli->query('set names utf8');
		}
		function getLists($offset=0,$pageSize=20,$order ='id asc',$where='1'){
			$sql = "select * from {$this->table} where {$where} order by {$order} limit {$offset},{$pageSize}";
			$res = $this->mysqli->query($sql);
			$data = $res->fetch_all(MYSQLI_ASSOC);
			return $data;
		}
		public function getInfoById($id){
			$sql = "select * from {$this->table} where id = {$id}";
			$res = $this->mysqli->query($sql);
			$Info = $res->fetch_all(MYSQLI_ASSOC);
			return isset($Info[0]) ? $Info[0] : array();
		}
		public function add($data){
			$data['createtime'] = date("Y-m-d H:i:s");
			$sql = "insert into {$this->table}";
			$keys = "(";
			$values = "(";
			foreach ($data as $key => $value) {
				if (!in_array($key, $this->field)) {
					continue;
				}
				$keys .= $key .",";
				if (is_string($value)) {
					$value = "'".$value."'";
				}
				$values .= $value . ",";
				}
				$keys = rtrim($keys, ',') . ")";
				$values = rtrim($values, ',') . ")";

				$sql = "{$sql} {$keys} value {$values}";
				
				$res = $this->mysqli->query($sql);
				return $res;
			
		} 
	}