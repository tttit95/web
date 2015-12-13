<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articles extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->authentication = $this->my_authentication->check();
	}
	public function do_upload()
	{

		$this->addCategory();
		$this->deleteCategory();
		$this->changePassword();
		
		if (!isset($this->authentication)) {
				redirect('home/index');
		}else{
			$permission = $this->authentication['permission'];
			foreach ($permission as $key => $value) {
				$uri[] = $value['permission'];
			}
		}
		$data['permission'] = isset($uri)?$uri:NULL;
		$OK = FALSE;
		if ($this->input->post('upload')) {
			$this->form_validation->set_rules('title','Tiêu đề','trim|required');
			$this->form_validation->set_rules('description','Mô tả','trim|required');
			$this->form_validation->set_rules('source','Nguồn','trim|required');
			$this->form_validation->set_rules('category','Danh Mục','trim|required|is_natural_no_zero');
			if ($this->form_validation->run()){
				$title = $this->input->post('title');
				$description = $this->input->post('description');
				$category = $this->input->post('category');
				$source = $this->input->post('source');
				//xử lý upload ảnh
				$config['upload_path'] = './upload/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '100';
				$config['max_width']  = '1024';
				$config['max_height']  = '1024';
				$this->upload->initialize($config);
				if (!$this->upload->do_upload()) {
					$OK = FALSE;
				}else{
					$title = $this->input->post('title');
					$description = $this->input->post('description');
					$created = gmdate('Y-m-d H:i:s',time() + 7*3600);
					$userid = $this->authentication['id'];
					$OK = TRUE;
				}

			}
		}

		$data['information'] = $this->authentication['email'];
		//lấy dữ liệu để tạo dropdown danh mục
		$data['dropdown_option'] = $this->Model_articles->dropdown('*');
		$data['category'] = $this->Model_category->get('*');
		if ($OK) {
			$data['upload_data'] = $this->upload->data();
			$file_name = $data['upload_data']['file_name'];

			//đưa dữ liệu lên db
			$this->Model_articles->insert(array('title' =>$title,'description'=>$description,'imgname'=>$file_name,'created'=>$created,'categoryid'=>$category,'userid'=>$userid,'source'=>$source));
			$data['upload_path'] = 'upload/upload_success.php';
			$this->load->view('backend/layouts/index.php',$data);
		}else{
			$data['error'] = $this->upload->display_errors('<span class="notification n-error">','</span>');
			$data['upload_path'] = 'upload/upload_form.php';
			$this->load->view('backend/layouts/index.php',$data);
		}
		if ($this->input->post('cancel')) {
			redirect('articles/view');
		}


	
	}
	public function view($page = 0)
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


		$this->addCategory();
		$this->deleteCategory();
		$this->changePassword();
		$OK = FALSE;
		if ($this->input->post('apply')) {
			$action = $this->input->post('action1');
			$checkbox = $this->input->post('checkbox1');
			if ($action == 'select') {
				$this->session->set_flashdata('message',array('type'=>'error','message'=>'Vui lòng chọn thao tác'));
			}elseif ($action == 'delete') {
				foreach ($checkbox as $key => $value) {
					$imgname = $this->Model_articles->get('imgname',array('articles.id'=>$value));
					$path = 'upload/'.$imgname['imgname'];
					unlink($path);
				}
				
				
				$flag = $this->Model_comment->delete_select($checkbox);
				$flag = $this->Model_reply->delete_select($checkbox);
				$flag = $this->Model_articles->delete_select($checkbox);
				
				$this->session->set_flashdata('message',$flag);
			}elseif ($action == 'publish') {
				$flag = $this->Model_articles->update_select(array('publish'=>1),$checkbox);
				$this->session->set_flashdata('message',$flag);
			}elseif ($action == 'unpublish') {
				$flag = $this->Model_articles->update_select(array('publish'=>0),$checkbox);
				$this->session->set_flashdata('message',$flag);
			}
			redirect('articles/view/'.$page);
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
		
		$config['uri_segment'] = 3;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;
		$config['base_url'] = 'http://localhost/photo/index.php/articles/view/';
		$config['total_rows'] = $this->Model_articles->total();
		$config['per_page'] = 3;
		$this->pagination->initialize($config);
		$data['list_pagination'] = $this->pagination->create_links();
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;

		$page = $page - 1;

		$data['dropdown_option'] = $this->Model_articles->dropdown('*');
		$data['category'] = $this->Model_category->get('*');

		if ($OK) {
			$data['data'] = $data;
		}else{
			if (isset($data['permission']) && in_array('articles/view/myself', $data['permission'])) {
				$data['data'] = $this->Model_articles->view('articles.id,email,articles.title,categorys.title AS category_title,publish,articles.created',($page * $config['per_page']),$config['per_page'],array('userid'=>$this->authentication['id']));
			}else{
				$data['data'] = $this->Model_articles->view('articles.id,email,articles.title,categorys.title AS category_title,publish,articles.created',($page * $config['per_page']),$config['per_page']);
			}
		}

		$data['information'] = $this->authentication['email'];
		$data['page'] = $page + 1;
		if ($this->input->post("ajax")) {
			$this->load->view('backend/home/ajaxshow.php',$data);
		}else{
			$data['path'] = 'backend/home/show.php';
			$this->load->view('backend/layouts/index.php',$data);
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
			$data['data'] = $this->Model_articles->get('articles.title,categorys.id ,categorys.title AS category_title,description',array('articles.id'=>$id));
		}

		if ($this->input->post('update')) {
			$this->form_validation->set_rules('title','Tiêu đề','trim|required');
			$this->form_validation->set_rules('description','Mô tả','trim|required');
			$this->form_validation->set_rules('category','Danh Mục','trim|required|is_natural_no_zero');
			if ($this->form_validation->run()) {
				$title = $this->input->post('title');
				$description = $this->input->post('description');
				$category = $this->input->post('category');
				$updated = gmdate('Y-m-d H:i:s',time() + 7*3600);
				$flag = $this->Model_articles->update(array('title'=>$title,'description'=>$description,'categoryid'=>$category,'updated'=>$updated),array('id'=>$id));
				$this->session->set_flashdata('message',$flag);
				redirect('articles/edit/'.$id);
			}
		}
		if ($this->input->post('cancel')) {
			redirect('articles/view/'.$page);
		}

		$data['information'] = $this->authentication['email'];
		$data['dropdown_option'] = $this->Model_articles->dropdown('*');
		$data['path'] = 'backend/home/edit.php';
		$this->load->view('backend/layouts/index.php',$data);
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

			$imgname = $this->Model_articles->get('imgname',array('articles.id'=>$id));
			$path = 'upload/'.$imgname['imgname'];
			$flag = $this->Model_comment->delete(array('articlesid'=>$id));
			$flag = $this->Model_reply->delete(array('articlesid'=>$id));
			$flag = $this->Model_articles->delete(array('id'=>$id));
			unlink($path);


			$this->session->set_flashdata('message',$flag);
			redirect('articles/view/'.$page);
		}
		if (isset($id)) {
			$data['data'] = $this->Model_articles->get('articles.title,categorys.id ,categorys.title AS category_title,description',array('articles.id'=>$id));
		}
		if ($this->input->post('cancel')) {
			redirect('articles/view');
		}

		$data['information'] = $this->authentication['email'];
		$data['path'] = 'backend/home/delete.php';
		$this->load->view('backend/layouts/index.php',$data);
	}
	
	public function publish($id = NULL,$publish = NULL,$page = 0)
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
		
		if (isset($publish)) {
			if ($publish == 1) {
				$this->Model_articles->update(array('publish'=>0),array('id'=>$id));
				redirect('articles/view/'.$page);
			}else{
				$this->Model_articles->update(array('publish'=>1),array('id'=>$id));
				redirect('articles/view/'.$page);
			}
		}

		$data['information'] = $this->authentication['email'];
		$data['path'] = 'backend/home/show.php';
		$this->load->view('backend/layouts/index.php',$data);
	}

	public function manageaccount()
	{
		$data['data'] = $this->Model_user->view('*');
		$data['path'] = 'backend/home/account.php';
		$this->load->view('backend/layouts/index.php',$data);
	}

	private function changePassword()
	{
		if ($this->input->post('changepassword')) {
			$this->form_validation->set_rules('password','Password','trim|required');
			$this->form_validation->set_rules('repeatpassword','Repeat password','trim|required|callback__repeatpassword');
			if ($this->form_validation->run()) {
				$password = $this->input->post('password');
				$flag = $this->Model_user->update(array('password'=>$password),array('id'=>$this->authentication['id']));
				$this->session->set_flashdata('messagepassword',$flag);
				redirect('articles/view/');
			}

		}
	}

	private function addCategory()
	{
		if ($this->input->post('add')) {
			$this->form_validation->set_rules('addcategory','Danh Mục','trim|required');
			if ($this->form_validation->run()) {
				$title = $this->input->post('addcategory');
				$created = gmdate('Y-m-d H:i:s',time() + 7*3600);
				$flag = $this->Model_category->insert(array('title'=>$title,'created'=>$created));
				$this->session->set_flashdata('messagecategory',$flag);
				redirect('articles/view/');
			}
		}
	}

	private function deleteCategory()
	{
		if ($this->input->post('applycategory')) {
			$action = $this->input->post('action');
			$checkbox = $this->input->post('checkbox');
			if ($action == 'select') {
				$this->session->set_flashdata('messagecategory',array('type'=>'error','message'=>'Vui lòng chọn thao tác'));
				redirect('articles/view/');
			}else
			if ($action == 'delete') {
				foreach ($checkbox as $key => $catid) {
					$articlesId = $this->Model_articles->view('articles.id,imgname',NULL,NULL,array('categoryid'=>$catid));
					foreach ($articlesId as $key => $value) {
						$this->Model_comment->delete(array('articlesid'=>$value['id']));
						$this->Model_reply->delete(array('articlesid'=>$value['id']));
						$path = 'upload/'.$value['imgname'];
						unlink($path);
					}	

					$this->Model_articles->delete(array('categoryid'=>$catid));
				}
				$flag = $this->Model_category->delete_select($checkbox);
				$this->session->set_flashdata('messagecategory',$flag);
				redirect('articles/view/');
			}
		}
	}

	public function _repeatpassword($repeatpassword)
	{
		$password = $this->input->post('password');
		if ($password == $repeatpassword) {
			$this->form_validation->set_message('_repeatpassword','Mật khẩu không khớp');
			return TRUE;
		}
		return FALSE;

	}
	
}
