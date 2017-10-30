<?php
	class CommentModel extends Model{
		public $table="comment";
		function add($user_id,$blog_id,$parent_id=0,$content=''){
			$createtime = date('Y年m月d日 H时i分');
			$sql = "insert into comment(user_id,blog_id,parent_id,content,createtime) values({$user_id},{$blog_id},{$parent_id},'{$content}','{$createtime}')";
			$res=$this->mysqli->query($sql);
			return $res;
		}
		function getComments($blog_id){
			$sql = "select * from comment where blog_id ={$blog_id}";
			$res = $this->mysqli->query($sql);
			$data = $res->fetch_all(MYSQLI_ASSOC);
			return $data;
		}
		function count($blog_id){
			$sql = "select count(*) as num from comment where blog_id ={$blog_id}";
			$res = $this->mysqli->query($sql);
			$data = $res->fetch_all(MYSQLI_ASSOC);
			return isset($data[0]['num']) ? $data[0]['num'] : 0;
		}
	}