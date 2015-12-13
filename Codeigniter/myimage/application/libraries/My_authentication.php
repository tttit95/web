<?php
	class My_authentication
	{
		public $CI;
		public function __construct()
		{
			$this->CI = & get_instance();
		}
		public function check()
		{
			$remember = 0;	
			if (isset($_SESSION['authentication']) && !empty($_SESSION['authentication'])) {
				$authentication = $_SESSION['authentication'];
			}else{
				$remember = 1;
				$authentication = $this->CI->session->userdata('authentication');
			}
			if (!isset($authentication) || empty($authentication)) {
				return NULL;
			}
			$user = $this->CI->Model_user->get('*',array('id'=>$authentication['id']));
			$authentication['roleid'] = $user['roleid'];
			$authentication['permission'] = $this->CI->Model_permission->view('*',array('roleid'=>$user['roleid']));
			$count = $this->CI->Model_user->count('*',array(
													'http_user_agent' => $authentication['http_user_agent'],
															));
			if ($count >= 1) {
				return $authentication;
			}else{
				if ($remember == 0) {
					unset($_SESSION['authentication']);
				}else{
					$this->CI->session->unset_userdata('authentication');
				}
				return NULL;
			}
		}
	}