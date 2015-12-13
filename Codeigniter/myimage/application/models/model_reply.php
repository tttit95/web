<?php
	class Model_reply extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		function insert($data = NULL)
		{
			$this->db->insert('replys',$data);
			$flag = $this->db->affected_rows();
			if ($flag > 0) {
				return array(
					'type' => 'successful',
					'message' =>'Post thành công'
					);
			}else{
				return array(
					'type' => 'error',
					'message' =>'Post thất bại'
					);
			}
		}
		function get($select = '*',$start = NULL,$limit= NULL,$where = NULL)
		{
			$this->db->select($select);
			$this->db->from('comments');
			$this->db->join('replys','replys.commentid = comments.id');
			if (isset($where)) {
				$this->db->where($where);
			}
			if (isset($start) && isset($limit)) {
				$this->db->limit($limit,$start);
			}
			return $this->db->get()->result_array();
		}
		function get_ajax($select = '*',$where = NULL)
		{
			$this->db->select($select);
			$this->db->from('comments');
			$this->db->join('replys','replys.commentid = comments.id');
			if (isset($where)) {
				$this->db->where($where);
			}
			return $this->db->get()->row_array();
		}
		function delete($where = NULL)
		{
			$this->db->delete('replys',$where);
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
			$this->db->where_in('articlesid',$data)->delete('replys');
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
	}