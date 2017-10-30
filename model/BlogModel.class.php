<?php
	class BlogModel extends Model{
		public $table="blog";
		public $field = array(
			'title',
			'content',
			'image',
			'classify_id',
			'createtime',
			);
		function getBlogLists($offset=0,$pageSize=20,$order ='id asc',$where='1'){
			return $this->getLists($offset,$pageSize,$order,$where);
		}
		function getBlogInfo($id){
			return $this->getInfoById($id);
		}
	}