<?php
	class Authentication extends CI_Controller
	{
		public $authentication;
		public function __construct()
		{

			parent::__construct();
			$this->authentication = $this->my_authentication->check();
		}
		public function login()
		{
			if (isset($this->authentication)) {
				redirect('articles/view');					
			}
			if ($this->input->post('submit')) {
				$this->form_validation->set_rules('email','Email','trim|required|valid_email|callback__login');
				$this->form_validation->set_rules('password','Password','trim|required|callback__password');
				$this->form_validation->set_error_delimiters('<div class="notification error png_bg"><div>','</div></div>');
				if ($this->form_validation->run()) {
					$email = $this->input->post('email');
					$http_user_agent = $_SERVER['HTTP_USER_AGENT'];
					$last_login = gmdate('Y-m-d H:i:s',time() + 7*3600);
					$data = array('http_user_agent' =>$http_user_agent , 'last_login' =>$last_login);
					$flag = $this->Model_user->update($data,array('email' =>$email));
					$this->session->set_flashdata('message',$flag);
					$email = $this->input->post('email');
					$user = $this->Model_user->get('id,fullname,email,http_user_agent',array('email' =>$email ));
					if ($flag['type'] == 'successful') {
						$remember = (int)$this->input->post('remember');
						if ($remember >= 1){
							$this->session->set_userdata('authentication',$user);
						}else{
							$_SESSION['authentication'] = $user;
						}

						redirect('home/index');
					}	
				}
			}
			if ($this->input->post('signup')) {
				redirect('authentication/signup');
			}
			$data['template'] = 'backend/authentication/login';
			$this->load->view('backend/layouts/login.php',isset($data)?$data:NULL);
		}
		public function signup()
		{
			if (isset($this->authentication)) {
				redirect('articles/view');						
			}
			if ($this->input->post('submit')) {
				$this->form_validation->set_rules('email','Email','trim|required|valid_email|min_length[16]|max_length[40]|callback__signup');
				$this->form_validation->set_rules('password','Password','trim|required');
				$this->form_validation->set_rules('confirmpassword','Confirm password','trim|required|callback__confirmpassword');
				if ($this->form_validation->run()) {
					//update lên csdl
					$fullname = $this->input->post('fullname');
					$email = $this->input->post('email');
					$password = $this->input->post('password');
					$created = gmdate('Y-m-d H:i:s',time() + 7*3600);
					$data = array('fullname'=>$fullname,'email' => $email,'password' => $password,'created'=>$created,'roleid'=>3);


					$flag = $this->Model_user->insert($data);
					$this->session->set_flashdata('message',$flag);	
					//nếu chọn đăng nhập sau khi đang ký thì redirect sang trang chủ
					$checkbox = $this->input->post('checkbox');
					if ($checkbox >= 1) {
						//tạo session để lấy thông tin đăng nhập cho trang welcome to
						redirect('admin/view');die;
					}
					redirect('authentication/signup');
				}

			}
			if ($this->input->post('login')) {
					redirect('authentication/login');
				}
			
			$data['template'] = 'backend/authentication/signup';
			$this->load->view('backend/layouts/login.php',isset($data)?$data:NULL);
		}
		public function logout()
		{
			if (!isset($this->authentication) && count($this->authentication)==0) {
				redirect('authentication/login');
			}
			if (isset($_SESSION['authentication'])) {
				unset($_SESSION['authentication']);
			}
			$this->session->unset_userdata('authentication');
			redirect('home/index');
		}
		public function _login($email)
		{
			//kiểm tra tài khoản có tồn tại không
			$where = array('email'=>$email);
			$count = $this->Model_user->count('email',$where);
			if ($count != 0 ) {
				return TRUE;
			}
			$this->form_validation->set_message('_login','Email không tồn tại');
			return FALSE;

		}
		public function _password($_password)
		{
			$email = $this->input->post('email');
			$where = array('email'=>$email);
			$password = $this->Model_user->get('password',$where);
			if (isset($password['password'])) {
					if ($_password ==$password['password']) {
						return TRUE;
					}
			}
			
			$this->form_validation->set_message('_password','Mật khẩu không đúng');
			return FALSE;
			
		}
		public function _signup($email)
		{
			//kiểm tra tài khoản có tồn tại không
			$where = array('email'=>$email);
			$count = $this->Model_user->count('email',$where);
			if ($count == 0 ) {
				return TRUE;
			}
			$this->form_validation->set_message('_signup','Email đã tồn tại');
			return FALSE;


		}
		public function _confirmpassword($confirmpassword)
		{
			//kiểm tra mật khẩu có trùng với mật khẩu trên không
			$password = $this->input->post('password');
			if ($password == $confirmpassword) {
				return TRUE;
			}
			$this->form_validation->set_message('_confirmpassword','Mật khẩu không khớp');
			return FALSE;
		}
	}