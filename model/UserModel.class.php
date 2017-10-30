<?php
	class UserModel extends Model{
		public $table="user";
		public function addUser($name,$email,$password,$image,$status=0){
			$createtime = date("Y-m-d H:i:s");
			$sql = "insert into user(name,email,password,image,status,createtime) values('{$name}','{$email}','{$password}','{$image}','{$status}','{$createtime}')";
		 	$res = $this->mysqli->query($sql);
		}
		public function getUserInfoByEmail($email){
			$sql = "select * from user where email = '{$email}'";
			$res = $this->mysqli->query($sql);
			$userInfo = $res->fetch_all(MYSQLI_ASSOC);
			return isset($userInfo[0]) ? $userInfo[0]:array();
		}
		public function getUserInfoById($id){
			return $this->getInfoById($id);
		}
	}