<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Model_articles extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		function total($where = NULL,$like = NULL)
		{
			$this->db->from('articles');
			if (isset($like)) {
				$this->db->like('title',$like);
			}
			if (isset($where)) {
				$this->db->where($where);
			}
			return $this->db->count_all_results();
		}
		function insert($data)
		{
			$this->db->insert('articles',$data);
		}
		function get($select = NULL,$where = NULL)
		{
			$this->db->select($select);
			$this->db->from('articles');
			$this->db->join('categorys','categorys.id = articles.categoryid');
			$this->db->join('user','user.id = articles.userid');
			if (isset($where)) {
				$this->db->where($where);
			}
			return $this->db->get()->row_array();
		}
		function dropdown($select = '*',$where = NULL)
		{
			$this->db->select($select);
			$this->db->from('categorys');
			if (isset($where)) {
				$this->db->where($where);
			}
			$query = $this->db->get()->result_array();
			$list[0] = 'Chọn danh mục';
			if (isset($query)) {
				foreach ($query as $key => $value) {
					$list[$value['id']] = $value['title'];
				}
			}
			return $list;
		}
		function view($select = '*',$start = NULL,$limit= NULL,$where = NULL)
		{
			$this->db->select($select);
			$this->db->from('articles');
			$this->db->join('user','user.id = articles.userid');
			$this->db->join('categorys','categorys.id = articles.categoryid');
			$this->db->order_by('articles.id','DESC');
			if (isset($where)) {
				$this->db->where($where);
			}
			if (isset($start) && isset($limit)) {
				$this->db->limit($limit,$start);
			}
			
			return $this->db->get()->result_array();
		}
		function delete($where = NULL)
		{
			$this->db->delete('articles',$where);
			$flag = $this->db->affected_rows();
			if ($flag > 0) {
				return array(
					'type' => 'successful',
					'message' =>'Xóa thành công'
					);
			}else{
				return array(
					'type' => 'error',
					'message' =>'Xóa thất bại'
					);
			}	

		}
		function delete_select($data = NULL,$where = NULL)
		{
			$this->db->where_in('id',$data)->delete('articles');
			$flag = $this->db->affected_rows();
			if ($flag > 0) {
				return array(
					'type' => 'successful',
					'message' =>'Xóa ('.count($data).') thành công'
					);
			}else{
				return array(
					'type' => 'error',
					'message' =>'Xóa ('.count($data).') thất bại'
					);
			}	

		}
		function update($data = NULL,$where = NULL)
		{
			if (isset($where)) {
				$this->db->where($where);
			}
			$this->db->update('articles',$data);
			$flag  = $this->db->affected_rows();
			if ($flag > 0) {
				return array(
					'type' => 'successful',
					'message' =>'Cập nhập thành công'
					);
			}else{
				return array(
					'type' => 'error',
					'message' =>'Cập nhập thất bại'
					);
			}	
		}
		function update_select($data = NULL,$where=NULL)
		{
			if (isset($where)) {
				$this->db->where_in('id',$where);
			}
			$this->db->update('articles',$data);
			$flag  = $this->db->affected_rows();
			if ($flag > 0) {
				return array(
					'type' => 'successful',
					'message' =>'Thay đổi bài viết thành công'
					);
			}else{
				return array(
					'type' => 'error',
					'message' =>'Thay đổi bài viết thất bại'
					);
			}
		}
		function search($text = NULL,$start = NULL,$limit= NULL,$where = NULL)
		{
			$this->db->select('*');
			$this->db->from('articles');
			$this->db->like('title',$text);
			$this->db->order_by('articles.id','DESC');
			$this->db->join('user','user.id = articles.userid');
			if (isset($where)) {
				$this->db->where($where);
			}
			if (isset($start) && isset($limit)) {
				$this->db->limit($limit,$start);
			}
			return $this->db->get()->result_array();
		}
	}