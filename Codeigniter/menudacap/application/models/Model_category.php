<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Model_category extends CI_Model
	{
		public $dropdown;
		public $view;
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
		//menu da cap
		function dropdown($parentid = 0,$step = '',$type = 'dropdown')
		{	
			$data = $this->Model_category->get('*');
			foreach ($data as $key => $value) {
				if($value['parentid'] == $parentid){
					if ($type == 'dropdown') {
						$this->dropdown[$value['id']] = $step.$value['category'];
					}else if ($type == 'view'){
						$value['category'] = $step.$value['category'];
						$this->view[$value['id']] = $value;
					}
					$this->dropdown($value['id'],$step.'|----',$type);		
				}
			}
			if ($type == 'dropdown') {
				return $this->dropdown;
			}else{
				return $this->view;
			}
		}
		function nestedset($level = NULL,$left = NULL,$right = NULL)
		{
			foreach ($level as $key => $value) {
				$data = array(
			        'level' => $value,
			        'left' =>$left[$key],
			        'right' =>$right[$key],
				);
				$this->db->where('id', $key);
				$this->db->update('category', $data);
			}

		}
	}