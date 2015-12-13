<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Model_user extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		function total($where = NULL)
		{
			$this->db->from('user');
			if (isset($where)) {
				$this->db->where($where);
			}
			return $this->db->count_all_results();
		}
		function count($select = '*',$where = NULL)
		{
			$this->db->select($select);
			$this->db->from('user');
			if (isset($where)) {
				$this->db->where($where);
			}
			return $this->db->count_all_results();

		}
		function get($select='*',$where=NULL)
		{
			$this->db->select($select);
			$this->db->from('user');
			if (isset($where)) {
				$this->db->where($where);
			}
			return $this->db->get()->row_array();
		}
		function insert($data = NULL)
		{
			$this->db->insert('user',$data);
			$flag  = $this->db->affected_rows();
			if ($flag > 0) {
				return array(
					'type' => 'successful',
					'message' =>'Đăng ký thành công'
					);
			}else{
				return array(
					'type' => 'error',
					'message' =>'Đăng ký thất bại'
					);
			}	
		}
		function view($select='*',$start = NULL,$limit= NULL,$where = NULL)
		{
			$this->db->select($select);
			$this->db->from('user');
			$this->db->join('roles','roles.id = user.roleid');
			if (isset($where)) {
				$this->db->where($where);
			}
			if (isset($start) && isset($limit)) {
				$this->db->limit($limit,$start);
			}
			return $this->db->get()->result_array();
		}
		function update($data = NULL,$where = NULL)
		{
			if (isset($where)) {
				$this->db->where($where);
			}
			$this->db->update('user',$data);
			$flag  = $this->db->affected_rows();
			if ($flag > 0) {
				return array(
					'type' => 'successful',
					'message' =>'Thay đổi thành công'
					);
			}else{
				return array(
					'type' => 'error',
					'message' =>'Thay đổi thất bại'
					);
			}	
		}
		function delete($where = NULL)
		{
			$this->db->delete('user',$where);
			$flag  = $this->db->affected_rows();
			if ($flag > 0) {
				return array(
					'type' => 'successful',
					'message' =>'Thay đổi thành công'
					);
			}else{
				return array(
					'type' => 'error',
					'message' =>'Thay đổi thất bại'
					);
			}
		}
		function delete_select($where = NULL)
		{
			$this->db->where_in('id',$where)->delete('user');
			$flag = $this->db->affected_rows();
			if ($flag > 0) {
				return array(
					'type' => 'successful',
					'message' =>'Thay đổi thành công'
					);
			}else{
				return array(
					'type' => 'error',
					'message' =>'Thay đổi thất bại'
					);
			}
		}
		
	}