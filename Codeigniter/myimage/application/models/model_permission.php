<?php 
	class Model_permission extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		function view($select = '*',$where = NULL)
		{
			$this->db->select($select);
			$this->db->from('permissions');
			if (isset($where)) {
				$this->db->where($where);
			}
			return $this->db->get()->result_array();
		}
		function insert_batch($data = NULL,$roleid = NULL)
		{
			$this->db->delete('permissions',array('roleid'=>$roleid));
			$this->db->insert_batch('permissions',$data);
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
	}