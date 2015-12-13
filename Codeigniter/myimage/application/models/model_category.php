<?php
	class Model_category extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		function insert($data = NULL)
		{
			$this->db->insert('categorys',$data);
			$flag  = $this->db->affected_rows();
			if ($flag > 0) {
				return array(
					'type' => 'successful',
					'message' =>'Thêm danh mục thành công'
					);
			}else{
				return array(
					'type' => 'error',
					'message' =>'Thêm danh mục thất bại'
					);
			}
		}
		function get($select = '*',$where = NULL)
		{
			$this->db->select($select);
			$this->db->from('categorys');
			$this->db->order_by('created','DESC');
			if (isset($where)) {
				$this->db->where($where);
			}
			return $this->db->get()->result_array();
		}
		function delete($where = NULL)
		{

			$this->db->delete('categorys',$where);
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
		function delete_select($data = NULL)
		{

			$this->db->where_in('id',$data)->delete('categorys');
			$flag = $this->db->affected_rows();
			if ($flag > 0) {
				return array(
					'type' => 'successful',
					'message' =>'Xoá '.count($data). '  danh mục thành công'
					);
			}else{
				return array(
					'type' => 'error',
					'message' =>'Xoá '.count($data).' danh mục thất bại'
					);
			}		
		}
	}