<?php
	class ClassifyModel{
		public $mysqli;
		public function __construct(){
			$this->mysqli = new mysqli("localhost","root","","blog");
			$this->mysqli->query('set names utf8');
		}
		public function getLists(){
			$sql = "select * from classify";
			$res = $this->mysqli->query($sql);
			$data = $res->fetch_all(MYSQL_ASSOC);
			return $data;
		}
		public function audit($status,$id){
			$sql = "update  classify set status={$status} where id = {$id}";
			$this->mysqli->query($sql);
		}
		public function getClassifyByID($id){
			$sql = "select * from classify where id= {$id}";
			$res = $this->mysqli->query($sql);
			$data = $res->fetch_all(MYSQL_ASSOC);
			return isset($data[0]) ? $data[0] :array();
		}
		public function edit($name,$parent_id,$id){
			$sql = "update  classify set name='{$name}',parent_id={$parent_id} where id = {$id}";
			$this->mysqli->query($sql);

		}
		public function getParentLists($parent_id = 0){
			$sql = "select * from classify where parent_id ={$parent_id}";
			$res = $this->mysqli->query($sql);
			$data = $res->fetch_all(MYSQL_ASSOC);
			return $data;
		}
		public function add($name,$parent_id){
			$sql = "insert into classify(name,parent_id) values('{$name}',$parent_id)";
			$this->mysqli->query($sql);
		}
		public function getAllClassify($parent_id= 0){
			$sql = "select * from classify where parent_id = {$parent_id}";
			$res = $this->mysqli->query($sql);
			$data = $res->fetch_all(MYSQL_ASSOC);
			foreach ($data as $key => $value) {
				$sqlChild = "select * from classify where parent_id= {$value['id']}";
				$resChild = $this->mysqli->query($sqlChild);
				$child = $resChild->fetch_all(MYSQL_ASSOC);
				$data[$key]['child'] = $child;
			}
			return $data;
		}
		public function getClassifyId($parent_id){
			$sql = "select classify_id from classify where parent_id ={$parent_id}";
			$res = $this->mysqli->query($sql);
		}
	}
