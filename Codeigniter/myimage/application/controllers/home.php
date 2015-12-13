<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public $authentication;
	public function __construct()
	{

		parent::__construct();
		$this->authentication = $this->my_authentication->check();
	}
	public function index($categoryid=0,$page = 0)
	{
			
			if (isset($this->authentication)) {
				$data['menu'] = TRUE;
			}
			$config['full_tag_open'] = '<ul>';
			$config['full_tag_close'] = '</ul>';

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
			$config['prev_tag_close'] = '';

			$config['cur_tag_open'] = '<li><a href="" class="active">';
			$config['cur_tag_close'] = '</a></li>';

			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['uri_segment'] = 4;
			$config['num_links'] = 2;
			$config['use_page_numbers'] = TRUE;
			$config['base_url'] = 'http://localhost/photo/index.php/home/index/'.$categoryid;
			if ($categoryid==0) {
				$config['total_rows'] = $this->Model_articles->total(array('publish'=>1));
			}else{
				$config['total_rows'] = $this->Model_articles->total(array('publish'=>1,'categoryid'=>$categoryid));
			}
			
			$config['per_page'] = 9;
			$this->pagination->initialize($config);
			$data['list_pagination'] = $this->pagination->create_links();
			$total_page = ceil($config['total_rows']/$config['per_page']);
			$page = ($page > $total_page)?$total_page:$page;
			$page = ($page < 1)?1:$page;

			$page = $page - 1;
			$data['category'] = $this->Model_category->get('*');
			if ($categoryid == 0) {
				$data['data'] = $this->Model_articles->view('*,articles.id,articles.title',($page * $config['per_page']),$config['per_page'],array('publish'=>1));
			}else {
				$data['data'] = $this->Model_articles->view('*,articles.id,articles.title',($page * $config['per_page']),$config['per_page'],array('publish'=>1,'categoryid'=>$categoryid));
			}
			$data['categoryid'] = $categoryid;
			$data['path'] = 'frontend/home/show.php';
			$this->load->view('frontend/layout/index.php',$data);
	}
	public function showsingle($url = NULL,$page = 0)
	{
		if (isset($this->authentication)) {
				$data['menu'] = TRUE;
		}

		$url = base64_decode($url);
		
		$str = explode('/', $url);

		$id = isset($str[0])?$str[0]:NULL;
		$commentid = isset($str[1])?$str[1]:NULL;
		$action = isset($str[2])?$str[2]:NULL;

		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';

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
		$config['prev_tag_close'] = '';

		$config['cur_tag_open'] = '<li><a href="" class="active">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['uri_segment'] = 4;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;
		$config['base_url'] = 'http://localhost/photo/index.php/home/showsingle/'.base64_encode($url).'/';
		$config['total_rows'] = $this->Model_comment->total(array('articlesid'=>$id));
		$config['per_page'] = 9;
		$this->pagination->initialize($config);

		$data['list_pagination'] = $this->pagination->create_links();
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;

		$page = $page - 1;

		if (isset($id) && isset($commentid) && isset($action) && $action == 'reply') {
			if ($this->input->post('submit')) {
				if (!isset($this->authentication)) {
					$this->form_validation->set_rules('name','Họ Và Tên','trim|required');
					$this->form_validation->set_rules('email','Email','trim|required|valid_email');
				}
				
				$this->form_validation->set_rules('comment','Comment','trim|required');

				if ($this->form_validation->run()) {
					if (isset($this->authentication)) {
						$name = $this->authentication['fullname'];
						$email = $this->authentication['email'];
						$comment = $this->input->post('comment');
						$created = gmdate('Y-m-d H:i:s',time() + 7*3600);
						$flag = $this->Model_reply->insert(array('fullname'=>$name,'email'=>$email,'text'=>$comment,'articlesid'=>$id,'created'=>$created,'commentid'=>$commentid));
					}else{
						$name = $this->input->post('name');
						$email = $this->input->post('email');
						$comment = $this->input->post('comment');
						$created = gmdate('Y-m-d H:i:s',time() + 7*3600);
						$flag = $this->Model_reply->insert(array('fullname'=>$name,'email'=>$email,'text'=>$comment,'articlesid'=>$id,'created'=>$created,'commentid'=>$commentid));
					}
					$this->session->set_flashdata('message',$flag);
					//redirect('home/showsingle/'.base64_encode($id));
				}
				
			}
		}elseif (isset($id)) {
			if ($this->input->post('submit')) {
				if (!isset($this->authentication)) {
					$this->form_validation->set_rules('name','Họ Và Tên','trim|required');
					$this->form_validation->set_rules('email','Email','trim|required|valid_email');
				}
				
				$this->form_validation->set_rules('comment','Comment','trim|required');
				if ($this->form_validation->run()) {
					if (isset($this->authentication)) {
						$name = $this->authentication['fullname'];
						$email = $this->authentication['email'];
						$comment = $this->input->post('comment');
						$created = gmdate('Y-m-d H:i:s',time() + 7*3600);
						$flag = $this->Model_comment->insert(array('fullname'=>$name,'email'=>$email,'comments'=>$comment,'articlesid'=>$id,'created'=>$created));
					}else{
						$name = $this->input->post('name');
						$email = $this->input->post('email');
						$comment = $this->input->post('comment');
						$created = gmdate('Y-m-d H:i:s',time() + 7*3600);
						$flag = $this->Model_comment->insert(array('fullname'=>$name,'email'=>$email,'comments'=>$comment,'articlesid'=>$id,'created'=>$created));
					}
					$this->session->set_flashdata('message',$flag);
					//redirect('home/showsingle/'.base64_encode($id));
				}
			}
		}
		$data['path_reply'] = 'frontend/home/reply.php';
		$data['information'] = $this->authentication;
		$data['count_comment'] = $this->Model_comment->count(array('articlesid'=>$id));
		$data['category'] = $this->Model_category->get('*');
		$data['comments'] = $this->Model_comment->get('*',($page * $config['per_page']),$config['per_page'],array('articlesid' =>$id));
		$data['reply'] = $this->Model_reply->get('*',NULL,NULL,array('replys.articlesid' =>$id ));
		$data['data'] = $this->Model_articles->get('*,articles.title,categorys.title AS category_title',array('articles.id'=>$id));
		$data['path'] = 'frontend/home/showsingle.php';
		$this->load->view('frontend/layout/index.php',$data);

		
	}
	public function search($page = 0)
	{
		$s =  $this->input->get('search');
		$data['search'] = $s;
		
		if (isset($this->authentication)) {
				$data['menu'] = TRUE;
		}

		$config['suffix'] = '/?search='.$s;
		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';

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
		$config['prev_tag_close'] = '';

		$config['cur_tag_open'] = '<li><a href="" class="active">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['uri_segment'] = 3;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;
		$config['base_url'] = 'http://localhost/photo/index.php/home/search/';
		$config['total_rows'] = $this->Model_articles->total(array('publish'=>1),$s);
		$config['per_page'] = 9;

		$this->pagination->initialize($config);

		$data['list_pagination'] = $this->pagination->create_links();
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;

		$page = $page - 1;


		$data['category'] = $this->Model_category->get('*');
		$data['data'] = $this->Model_articles->search(isset($s)?$s:NULL,($page * $config['per_page']),$config['per_page'],array('publish'=>1));
		$data['path'] = 'frontend/home/show.php';
		$this->load->view('frontend/layout/index.php',$data);
	}
}
