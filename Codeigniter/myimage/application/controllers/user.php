<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	public $authentication;
	public function __construct()
	{
		parent::__construct();
		$this->authentication = $this->my_authentication->check();
	}
	public function view()
	{


		//
		$OK = FALSE;
		$q = 1;
		if ($this->input->post('select')) {
			$q = $this->input->post('select');
			$OK = TRUE;
		}
     //
		$this->addRole();

		if (!isset($this->authentication)) {
			
			redirect('home/index');
		}else{
			$permission = $this->authentication['permission'];
			foreach ($permission as $key => $value) {
				$uri[] = $value['permission'];
			}
		}

		$data['permission'] = isset($uri)?$uri:NULL;

		if ($this->input->post('apply')) {
			$action = $this->input->post('action');
			$checkbox = $this->input->post('checkbox');
			if ($action == 'select') {
				$this->session->set_flashdata('message',array('type'=>'error','message'=>'Vui lòng chọn thao tác'));
			}elseif ($action == 'delete') {
				$flag = $this->Model_user->delete_select($checkbox);
				foreach ($checkbox as $key => $value) {
					$flag = $this->Model_comment->delete(array('userid'=>$id));
					$flag = $this->Model_reply->delete(array('userid'=>$id));
					$flag = $this->Model_articles->delete(array('userid'=>$id));
				}
				$this->session->set_flashdata('message',$flag);
			}
			redirect('user/view/'.$page);
		}
		

		$config['full_tag_open'] = '<div class="numbers">';
		$config['full_tag_close'] = '</div> ';

		$config['first_link'] = ' &laquo; First';
		$config['first_tag_open'] = '';
		$config['first_tag_close'] = '';

		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '';
		$config['last_tag_close'] = '';

		$config['next_link']='Next &raquo;';
		$config['next_tag_open'] = '';
		$config['next_tag_close'] = '';

		$config['prev_link']='&laquo; Previous';
		$config['prev_tag_open'] = '';
		$config['prev_tag_close'] = '<span>Page:</span> ';

		$config['cur_tag_open'] = '<span class="current">';
		$config['cur_tag_close'] = ' |</span>';

		$config['num_tag_open'] = '';
		$config['num_tag_close'] = '<span>|</span>';
		
		$config['uri_segment'] = 4;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;
		$config['base_url'] = 'http://localhost/photo/index.php/user/view/'.$q.'/';
		$date1 = gmdate('Y-m-d',time() + 7*3600);
		$date1=date_create($date1);
		if ($q == 1) {
			$config['total_rows'] = $this->Model_user->total();
		}else if($q == 2){
			date_add($date1,date_interval_create_from_date_string("-7 days"));
			$date1 = date_format($date1,"Y-m-d");
			$config['total_rows'] = $this->Model_user->total(array('user.created >='=>$date1));
		}else if($q == 3){
			date_add($date1,date_interval_create_from_date_string("-30 days"));
			$date1 = date_format($date1,"Y-m-d");
			$config['total_rows'] = $this->Model_user->total(array('user.created >='=>$date1));

		}else if($q == 4){
			date_add($date1,date_interval_create_from_date_string("-7 days"));
			$date1 = date_format($date1,"Y-m-d");
			$config['total_rows'] = $this->Model_user->total(array('user.updated >='=>$date1));
		}else if($q == 5){
			date_add($date1,date_interval_create_from_date_string("-30 days"));
			$date1 = date_format($date1,"Y-m-d");
			$config['total_rows'] = $this->Model_user->total(array('user.updated >='=>$date1));
		}else if($q == 6){
			date_add($date1,date_interval_create_from_date_string("-7 days"));
			$date1 = date_format($date1,"Y-m-d");
			$config['total_rows'] = $this->Model_user->total(array('user.last_login >='=>$date1));
		}else if($q == 7){
			date_add($date1,date_interval_create_from_date_string("-30 days"));
			$date1 = date_format($date1,"Y-m-d");
			$config['total_rows'] = $this->Model_user->total(array('user.last_login >='=>$date1));

		}
		$config['per_page'] = 3;
		$this->pagination->initialize($config);
		$data['list_pagination'] = $this->pagination->create_links();
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;

		$page = $page - 1;
		$date = gmdate('Y-m-d',time() + 7*3600);
		$date=date_create($date);
		if($OK){
			if($q==1){
				$created  = $this->Model_user->view('*,user.created,user.id',($page * $config['per_page']),$config['per_page'],array('roleid !='=>1));
			}else if($q==2){
				date_add($date,date_interval_create_from_date_string("-7 days"));
				$date = date_format($date,"Y-m-d");
				$created  = $this->Model_user->view('*,user.created,user.id',($page * $config['per_page']),$config['per_page'],array('roleid !='=>1,'user.created >=' =>$date));
			}else if($q == 3){
				date_add($date,date_interval_create_from_date_string("-30 days"));
				$date = date_format($date,"Y-m-d");
				$created  = $this->Model_user->view('*,user.created,user.id',($page * $config['per_page']),$config['per_page'],array('roleid !='=>1,'user.created >=' =>$date));
			}else if($q==4){
				date_add($date,date_interval_create_from_date_string("-7 days"));
				$date = date_format($date,"Y-m-d");
				$created  = $this->Model_user->view('*,user.created,user.id',($page * $config['per_page']),$config['per_page'],array('roleid !='=>1,'user.updated >=' =>$date));
			}else if($q==5){
				date_add($date,date_interval_create_from_date_string("-30 days"));
				$date = date_format($date,"Y-m-d");
				$created  = $this->Model_user->view('*,user.created,user.id',($page * $config['per_page']),$config['per_page'],array('roleid !='=>1,'user.updated >=' =>$date));
			}else if($q == 6){
				date_add($date,date_interval_create_from_date_string("-7 days"));
				$date = date_format($date,"Y-m-d");
				$created  = $this->Model_user->view('*,user.created,user.id',($page * $config['per_page']),$config['per_page'],array('roleid !='=>1,'user.last_login >=' =>$date));
			}else if($q == 7){
				date_add($date,date_interval_create_from_date_string("-30 days"));
				$date = date_format($date,"Y-m-d");
				$created  = $this->Model_user->view('*,user.created,user.id',($page * $config['per_page']),$config['per_page'],array('roleid !='=>1,'user.last_login >=' =>$date));
			}
		}else{
			$created = $this->Model_user->view('*,user.created,user.id',($page * $config['per_page']),$config['per_page'],array('user.roleid !='=>1));
		}

		$data['session'] = $this->authentication;
		$data['dropdown_option'] = $this->Model_articles->dropdown('*');
		$data['role'] = $this->Model_role->view('*',array('id !='=>1));
		$data['information'] = $this->authentication['email'];
		//$data['data'] = $this->Model_user->view('*,user.created,user.id',($page * $config['per_page']),$config['per_page'],array('roleid !='=>1));
		$data['page'] = $page + 1;
		/*$data['path'] = 'backend/user/account.php';
		$this->load->view('backend/layouts/role.php',$data);*/
		if ($this->input->post("select")) {
			$data['data'] = isset($created)?$created:NULL;
			$this->load->view('backend/user/ajaxaccount.php',$data);
		}else{
			$data['data'] = isset($created)?$created:NULL;
			$data['path'] = 'backend/user/account.php';
			$this->load->view('backend/layouts/role.php',$data);
		}
	}
	public function edit($id=NULL,$page= 0)
	{
		if (!isset($this->authentication)) {
			
			redirect('home/index');
		}else{
			$permission = $this->authentication['permission'];
			foreach ($permission as $key => $value) {
				$uri[] = $value['permission'];
			}
		}
		$data['permission'] = isset($uri)?$uri:NULL;

		if (isset($id)) {
			$data['data'] = $this->Model_user->get('*',array('id'=>$id));
		}

		if ($this->input->post('update')) {
			$this->form_validation->set_rules('email','Email','trim|required');
			$this->form_validation->set_rules('password','Password','trim|required');
			$this->form_validation->set_rules('role','Roles','trim|required|is_natural_no_zero');
			if ($this->form_validation->run()){
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$role = $this->input->post('role');
				$updated = gmdate('Y-m-d H:i:s',time() + 7*3600);
				$flag = $this->Model_user->update(array('email'=>$email,'password'=>$password,'roleid'=>$role,'updated'=>$updated),array('id'=>$id));
				$this->session->set_flashdata('message',$flag);
				redirect('user/edit/'.$id);
			}
		}
		if ($this->input->post('cancel')) {
			redirect('user/view/'.$page);
		}

		$data['information'] = $this->authentication['email'];

		$data['roleid'] = $this->Model_user->get('roleid',array('id'=>$id));
		$data['page'] = $page + 1;
		$data['role'] = $this->Model_role->view('*');
		$data['path'] = 'backend/user/edit.php';
		$this->load->view('backend/layouts/role.php',$data);
	}
	public function delete($id=NULL,$page = 0)
	{
		if (!isset($this->authentication)) {
			
			redirect('home/index');
		}else{
			$permission = $this->authentication['permission'];
			foreach ($permission as $key => $value) {
				$uri[] = $value['permission'];
			}
		}
		$data['permission'] = isset($uri)?$uri:NULL;

		if ($this->input->post('delete')) {
			
			$articlesId = $this->Model_articles->view('articles.id,imgname',NULL,NULL,array('userid'=>$id));
			foreach ($articlesId as $key => $value) {
				$flag = $this->Model_comment->delete(array('articlesid'=>$value['id']));
				$flag = $this->Model_reply->delete(array('articlesid'=>$value['id']));
				$path = 'upload/'.$value['imgname'];
				unlink($path);
			}
			$flag = $this->Model_articles->delete(array('userid'=>$id));
			$flag = $this->Model_user->delete(array('id'=>$id));
			

			$this->session->set_flashdata('message',$flag);
			redirect('user/view/'.$page);
		}
		if (isset($id)) {
			$data['data'] = $this->Model_user->get('*',array('id'=>$id));
		}

		if ($this->input->post('cancel')) {
			redirect('user/view');
		}

		$data['information'] = $this->authentication['email'];
		$data['path'] = 'backend/user/delete.php';
		$this->load->view('backend/layouts/index.php',$data);
	}
	public function editrole($id=NULL,$page= 0)
	{
		if (!isset($this->authentication)) {
			
			redirect('home/index');
		}else{
			$permission = $this->authentication['permission'];
			foreach ($permission as $key => $value) {
				$uri[] = $value['permission'];
			}
		}
		$data['permission'] = isset($uri)?$uri:NULL;

		if (isset($id)) {
			$data['data'] = $this->Model_role->get('*',array('id'=>$id));
		}

		if ($this->input->post('update')) {
			$this->form_validation->set_rules('role','Role','trim|required');
			if ($this->form_validation->run()) {
				$permission = $this->input->post('checkbox');
				$roleid = $id;
				foreach ($permission as $key => $value) {
					$batch[]=array('permission'=>$value,'roleid'=>$roleid);
				}
				$flag = $this->Model_permission->insert_batch($batch,$id);
				$this->session->set_flashdata('message',$flag);
				redirect('user/view');
			}
		}
		if ($this->input->post('cancel')) {
			redirect('user/view/'.$page);
		}

		$check = $this->Model_permission->view('*',array('roleid'=>$id));
		foreach ($check as $key => $value) {
			$data['check'][] = $value['permission'];
		}

		if ($this->input->post('cancel')) {
			redirect('user/view/'.$page);
		}
		
		$data['information'] = $this->authentication['email'];
		$data['page'] = $page + 1;
		$data['role'] = $this->Model_role->view('*');
		$data['path'] = 'backend/user/editrole.php';
		$this->load->view('backend/layouts/role.php',$data);
	}
	private function addRole()
	{
		if ($this->input->post('add')) {
			$this->form_validation->set_rules('addrole','Role','trim|required');
			if ($this->form_validation->run()) {
				$role = $this->input->post('addrole');
				$created = gmdate('Y-m-d H:i:s',time() + 7*3600);
				$flag = $this->Model_role->insert(array('role'=>$role,'created'=>$created));
				$this->session->set_flashdata('messagerole',$flag);
				redirect('user/view/');
			}
		}
	}
}