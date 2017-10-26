<?php
	class HomeController{
		public function lists(){
			$blogModel = new BlogModel();
			$classifyModel = new ClassifyModel();
			$data = $blogModel->getBlogLists(0,30,$order ='id desc');
			foreach ($data as $key => $value) {
				$data[$key]['year'] = substr($value['createtime'], 0,4);
				$data[$key]['month'] = substr($value['createtime'], 5,5);
				$data[$key]['classify'] = $classifyModel ->getClassifyByID($value['classify_id']);
				$data[$key]['classify_name'] = $data[$key]['classify']['name'];
			}
			include "./view/home/index.html";
		}
		public function getBlogInfo(){
			$id = $_GET['id'];
			$blogModel = new BlogModel();
			$classifyModel = new ClassifyModel();
			$commentModel = new CommentModel();
			$userModel = new UserModel();
			$blogInfo = $blogModel->getBlogInfo($id);
			$where = "classify_id = {$blogInfo['classify_id']}";
			$brotherBlog = $blogModel ->getBlogLists(0,20,'id asc',$where);
			$blogInfo['createtime'] = substr($blogInfo['createtime'], 0,10);
			$where = "classify_id = {$blogInfo['classify_id']} and id != {$id}";
			$relation = $blogModel->getBlogLists(0, 10,'id asc',$where);
			$comment = $commentModel->getComments($blogInfo['id']); 
			$count = $commentModel->count($blogInfo['id']);
			foreach ($comment as $key => $value) {
				$comment[$key]['commenter'] = $userModel-> getUserInfoById($value['user_id']);
				$comment[$key]['createdate'] = date('Y年m月d日 H时s分', strtotime($value['createtime']));
			}
			include "./view/home/blogInfo.html";
		}

		public function study(){
			$classify_id = isset($_GET['classify_id']) ? $_GET['classify_id'] : 0;
			$where = '1';
			if ($classify_id) {
				$where .= " and classify_id in ({$classify_id})";
			} else {
				$where .= " and classify_id in (3,4,9,10)";
			}
			$where .= " and status = 1";
			
			$classifyModel = new ClassifyModel();
			$blogModel = new BlogModel();
			
			$daohang2 = $classifyModel->getParentLists(2);
			$data = $blogModel->getBlogLists(0,20,'id desc',$where);
			foreach ($data as $key => $value) {
				$data[$key]['year'] = substr($value['createtime'], 0,4);
				$data[$key]['month'] = substr($value['createtime'], 5,5);
				$data[$key]['classify'] = $classifyModel ->getClassifyByID($value['classify_id']);
				$data[$key]['classify_name'] = $data[$key]['classify']['name'];
			}

			include "./view/home/study.html";
		}
		public function comment(){
			$user_id = $_SESSION['me']['id'];
			$blog_id = $_POST['blog_id'];
			$parent_id = 0;
			$content=$_POST['content'];
			$commentModel = new CommentModel();
			$status = $commentModel->add($user_id,$blog_id,$parent_id,$content);
			if ($status) {
				header('Location:index.php?c=Home&a=getBlogInfo&id='.$blog_id);
				echo '评论成功，1秒后跳转到list';
				die();
			} else {
				die('error');
			}
		}
	}