<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Model_role extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		function get($select = '*', $where = NULL)
		{
			$this->db->select($select);
			$this->db->from('roles');
			if (isset($where)) {
				$this->db->where($where);
			}
			return $this->db->get()->row_array();
		}
		function view($select = '*', $where = NULL)
		{
			$this->db->select($select);
			$this->db->from('roles');
			if (isset($where)) {
				$this->db->where($where);
			}
			return $this->db->get()->result_array();
		}
		function insert($data = NULL)
		{
			$this->db->insert('roles',$data);
			$flag  = $this->db->affected_rows();
			if ($flag > 0) {
				return array(
					'type' => 'successful',
					'message' =>'Thêm role thành công'
					);
			}else{
				return array(
					'type' => 'error',
					'message' =>'Thêm role thất bại'
					);
			}
		}
	}