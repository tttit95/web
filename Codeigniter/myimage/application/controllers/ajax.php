<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->authentication = $this->my_authentication->check();
	}
	public function demo(){
		if (isset($this->authentication)) {
			$name = $this->authentication['fullname'];
			$email = $this->authentication['email'];
		}else{
			$name = $this->input->post('name');
			$email = $this->input->post('email');
		}
		$commentid = $this->input->post('cmtID');
		$comment = $this->input->post('cmt');
		$articlesid = $this->input->post('artid');
		$created = gmdate('Y-m-d H:i:s',time() + 7*3600);

		$this->Model_reply->insert(array('articlesid'=>$articlesid,'fullname'=>$name,'email'=>$email,'text'=>$comment,'created'=>$created,'commentid'=>$commentid));
		$data['reply'] = $this->Model_reply->get_ajax("*",array('replys.id'=>$this->db->insert_id()));
		
		$this->load->view('frontend/home/ajaxshow',$data);
	}
}