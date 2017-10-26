<?php
	
	class Upload{
		private $ext;
		private $fileInfo;
		public function run($name){
			$this ->fileInfo = $_FILES[$name];		
			if(!$this ->checkType($_FILES[$name]['type'])){
				return "格式不正确";
			}
			if(!$this ->checkSize($_FILES[$name]['size'])){
				return "太大了";
			}
			$path = "./public/upload/";
			$ext = $this->getExt($_FILES[$name]['name']);
			$fileName = 'img_'.time().rand(1, 10000000).$ext;
			$fileName =$path.$fileName;
			move_uploaded_file($_FILES[$name]['tmp_name'],$fileName);
			return $fileName;
		}
		public function checkType($type){
			$base = array('image/png','image/jpeg','image/jpg','image/gif');
			if(in_array($type, $base)){
				return true;
			}
			return false;
		}
		public function checkSize(){
			if($this->fileInfo['size']<4000000){
				return true;
			}
			return false;
		}
		public function getExt($name){
			$pos = strrpos($name, '.');
			$ext = substr($name, $pos);
			$this ->ext =$ext;
			return $ext;
		}
		public function getSize(){
			return $this->fileInfo['size'];
		}
	}