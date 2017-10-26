<?php
	class ClassifyController{
		public function getLists(){
			$classmodel = new ClassifyModel();
			$data       = $classmodel ->getLists();
			include "./view/classify/lists.html";
		}
		public function online(){
			$id = $_GET['id'];
			$classmodel = new ClassifyModel();
			$classmodel ->audit(1,$id);
			header('Refresh:3,Url=index.php?c=Classify&a=getLists');
			echo "上线成功，3秒后跳转";
		}
		public function outline(){
			$id = $_GET['id'];
			$classmodel = new ClassifyModel();
			$classmodel ->audit(0,$id);
			header('Refresh:3,Url=index.php?c=Classify&a=getLists');
			echo "下线成功，3秒后跳转";
		}
		public function edit(){
			$id = $_GET['id'];
			$classmodel = new ClassifyModel();
			$classifyParent = $classmodel ->getParentLists();
			$data = $classmodel ->getClassifyByID($id);
			include "./view/classify/edit.html";
		}
		public function doEdit(){
			$id = $_POST['id'];
			$name = $_POST['name'];
			$parent_id = $_POST['parent_id'];
			$classmodel = new ClassifyModel();
			$classmodel ->edit($name,$parent_id,$id);
			header('Refresh:3,Url=index.php?c=Classify&a=getLists');
				echo "发布成功，3秒后跳转";
		}
		public function add(){
			$classmodel = new ClassifyModel();
			$classifyParent = $classmodel ->getParentLists();
			include "./view/classify/add.html";
		}
		public function doAdd(){
			$name = $_POST['name'];
			$parent_id = $_POST['parent_id'];
			$classmodel = new ClassifyModel();
			$classmodel->add($name,$parent_id);
				header('Refresh:3,Url=index.php?c=Classify&a=getLists');
				echo "发布成功，3秒后跳转";
		}
	}