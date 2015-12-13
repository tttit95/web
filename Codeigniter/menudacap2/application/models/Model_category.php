<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Model_category extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		function get($select = '*',$where = NULL, $start = NULL,$limit = NULL)
		{
			$this->db->select($select);
			$this->db->from('category');
			if (isset($where)) {
				$this->db->where($where);
			}
			if (isset($start) && isset($limit)) {
				$this->db->limit($start,$limit);
			}
			return $this->db->get()->result_array();
		}
		function add()
		{
			$category = $this->input->post('category');
			$parentid = $this->input->post('parentid');
			$created = gmdate('Y-m-d H:i:s',time() + 7*3600);
			$data = array('category'=>$category,
							'parentid'=>$parentid,
							'created'=>$created);
			$this->db->insert('category', $data);
			$flag  = $this->db->affected_rows();
			if ($flag > 0) {
				return array(
					'type' => 'successful',
					'message' =>'Successful'
					);
			}else{
				return array(
					'type' => 'error',
					'message' =>'Error'
					);
			}
		}
	}