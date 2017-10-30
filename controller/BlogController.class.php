<?php
	class BlogController{
		public function add(){
			$classmodel = new ClassifyModel();
			$classify = $classmodel->getAllClassify();
			include "./view/blog/add.html";
		}
		public function doAdd(){
			$upload =L("upload");
			$image = $upload->run('image');
			$content = $_POST['content'];
			$classify_id = $_POST['classify_id'];
			$title = $_POST['title'];
			$data = array(
				'title' 	=> $title,
				'content' 	=> $content,
				'image' 	=> $image,
				'classify_id' 	=> $classify_id,			
				);
			$blogModel = new BlogModel();
			$status = $blogModel->add($data);
			if ($status) {
				header('Refresh:3,Url=index.php?c=Home&a=lists');
				echo "发布成功，3秒后跳转";
			}	
		}
		function getBlogInfo(){
			$id = $_GET['id'];
			$blogmodel = new BlogModel();
			$info = $blogmodel-> getBlogInfo($id);
			include "./view/blog/contentInfo.html";
		}
	}