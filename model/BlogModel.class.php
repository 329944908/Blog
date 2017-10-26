<?php
	class BlogModel{
		public $mysqli;
		function __construct(){
			$this->mysqli = new mysqli("localhost","root","","blog");
			$this->mysqli->query('set names utf8');
		}
		public function add($data){
			$createtime = date("Y-m-d H:i:s");
			$sql = "insert into blog(title,content,image,classify_id,createtime) values('{$data['title']}','{$data['content']}','{$data['image']}',{$data['classify_id']},'{$createtime}')";
			$this->mysqli->query($sql);
		} 
		function getBlogLists($offset=0,$pageSize=20,$order ='id asc',$where='1'){
			$sql = "select * from blog where {$where} order by {$order} limit {$offset},{$pageSize}";
			$res = $this->mysqli->query($sql);
			$data = $res->fetch_all(MYSQL_ASSOC);
			return $data;
		}
		function getBlogInfo($id){
			$sql = "select * from blog where id = {$id}";
			$res = $this->mysqli->query($sql);
			$data = $res->fetch_all(MYSQL_ASSOC);
			return isset($data[0]) ? $data[0] : array();
		}
	}