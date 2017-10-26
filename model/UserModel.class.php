<?php
	class UserModel{
		public $mysqli;
		public function __construct(){
			$this->mysqli = new mysqli("localhost","root","","blog");
			$this->mysqli->query('set names utf8');
		}
		public function addUser($name,$email,$password,$image,$status=0){
			$createtime = date("Y-m-d H:i:s");
			$sql = "insert into user(name,email,password,image,status,createtime) values('{$name}','{$email}','{$password}','{$image}','{$status}','{$createtime}')";
		 	$res = $this->mysqli->query($sql);
		}
		public function getUserInfoByEmail($email){
			$sql = "select * from user where email = '{$email}'";
			$res = $this->mysqli->query($sql);
			$userInfo = $res->fetch_all(MYSQL_ASSOC);
			return isset($userInfo[0]) ? $userInfo[0]:array();
		}
		public function getUserInfoById($id){
			$sql = "select * from user where id = {$id}";
			$res = $this->mysqli->query($sql);
			$userInfo = $res->fetch_all(MYSQL_ASSOC);
			return isset($userInfo[0]) ? $userInfo[0]:array();
		}
	}