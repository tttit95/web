<?php
	class Getarticles extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
      $this->load->helper(array('form', 'url'));
			$this->authentication = $this->my_authentication->check();
		}
		public function ajaxload()
		{

     
     
    $OK = FALSE;
    $q = 1;
     if ($this->input->post('select')) {
      $q = $this->input->post('select');
       $OK = TRUE;
     }


      if (!isset($this->authentication)) {
        redirect('home/index');
    }else{
      $permission = $this->authentication['permission'];
      foreach ($permission as $key => $value) {
        $uri[] = $value['permission'];
      }
    }
      $data['permission'] = isset($uri)?$uri:NULL;
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
      $config['base_url'] = 'http://localhost/photo/index.php/getarticles/ajaxload/'.$q.'/';
      
      $date1 = gmdate('Y-m-d',time() + 7*3600);
      $date1=date_create($date1);

      if ($q == 1) {
        $config['total_rows'] = $this->Model_articles->total();
      }else if($q == 2){
        date_add($date1,date_interval_create_from_date_string("-7 days"));
        $date1 = date_format($date1,"Y-m-d");
        $config['total_rows'] = $this->Model_articles->total(array('articles.created >='=>$date1));
      }else if($q == 3){
        date_add($date1,date_interval_create_from_date_string("-30 days"));
        $date1 = date_format($date1,"Y-m-d");
        $config['total_rows'] = $this->Model_articles->total(array('articles.created >='=>$date1));

      }else if($q == 4){
        date_add($date1,date_interval_create_from_date_string("-7 days"));
        $date1 = date_format($date1,"Y-m-d");
        $config['total_rows'] = $this->Model_articles->total(array('articles.updated >='=>$date1));
      }else if($q == 5){
        date_add($date1,date_interval_create_from_date_string("-30 days"));
        $date1 = date_format($date1,"Y-m-d");
        $config['total_rows'] = $this->Model_articles->total(array('articles.updated >='=>$date1));
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
          if (in_array('articles/view/myself', $uri)) {
            $created = $this->Model_articles->view("*,categorys.title AS category_title,articles.title,articles.id,articles.created",($page * $config['per_page']),$config['per_page'],array('userid'=>$this->authentication['id']));
          }else{
            $created = $this->Model_articles->view("*,categorys.title AS category_title,articles.title,articles.id,articles.created",($page * $config['per_page']),$config['per_page']);
          }
        }else if($q==2){
         if (in_array('articles/view/myself', $uri)) {
          date_add($date,date_interval_create_from_date_string("-7 days"));
          $date = date_format($date,"Y-m-d");
          $created = $this->Model_articles->view("*,categorys.title AS category_title,articles.title,articles.id,articles.created",($page * $config['per_page']),$config['per_page'],array('userid'=>$this->authentication['id'],'articles.created >=' =>$date));
        }else{
          date_add($date,date_interval_create_from_date_string("-7 days"));
          $date = date_format($date,"Y-m-d");
          $created = $this->Model_articles->view("*,categorys.title AS category_title,articles.title,articles.id,articles.created",($page * $config['per_page']),$config['per_page'],array('articles.created >='=>$date));
        }
      }else if($q == 3){
       if (in_array('articles/view/myself', $uri)) {
        date_add($date,date_interval_create_from_date_string("-30 days"));
        $date = date_format($date,"Y-m-d");
        $created = $this->Model_articles->view("*,categorys.title AS category_title,articles.title,articles.id,articles.created",($page * $config['per_page']),$config['per_page'],array('userid'=>$this->authentication['id'],'articles.created >=' =>$date));
      }else{
        date_add($date,date_interval_create_from_date_string("-30 days"));
        $date = date_format($date,"Y-m-d");
        $created = $this->Model_articles->view("*,categorys.title AS category_title,articles.title,articles.id,articles.created",($page * $config['per_page']),$config['per_page'],array('articles.created >='=>$date));
      }
    }else if($q==4){
      if (in_array('articles/view/myself', $uri)) {
        date_add($date,date_interval_create_from_date_string("-7 days"));
        $date = date_format($date,"Y-m-d");
        $created = $this->Model_articles->view("*,categorys.title AS category_title,articles.title,articles.id,articles.created",($page * $config['per_page']),$config['per_page'],array('userid'=>$this->authentication['id'],'articles.updated >=' =>$date));
      }else{
        date_add($date,date_interval_create_from_date_string("-7 days"));
        $date = date_format($date,"Y-m-d");
        $created = $this->Model_articles->view("*,categorys.title AS category_title,articles.title,articles.id,articles.created",($page * $config['per_page']),$config['per_page'],array('articles.updated >='=>$date));
      }
    }else if($q==5){
      if (in_array('articles/view/myself', $uri)) {
        date_add($date,date_interval_create_from_date_string("-30 days"));
        $date = date_format($date,"Y-m-d");
        $created = $this->Model_articles->view("*,categorys.title AS category_title,articles.title,articles.id,articles.created",($page * $config['per_page']),$config['per_page'],array('userid'=>$this->authentication['id'],'articles.updated >=' =>$date));
      }else{
        date_add($date,date_interval_create_from_date_string("-30 days"));
        $date = date_format($date,"Y-m-d");
        $created = $this->Model_articles->view("*,categorys.title AS category_title,articles.title,articles.id,articles.created",($page * $config['per_page']),$config['per_page'],array('articles.updated >='=>$date));
      }
    }
  }else{
    if (in_array('articles/view/myself', $uri)) {
      $created = $this->Model_articles->view("*,categorys.title AS category_title,articles.title,articles.id,articles.created",($page * $config['per_page']),$config['per_page'],array('userid'=>$this->authentication['id']));
    }else{
      $created = $this->Model_articles->view("*,categorys.title AS category_title,articles.title,articles.id,articles.created",($page * $config['per_page']),$config['per_page']);
    }
  }

      





			
      $data['information'] = $this->authentication['email'];
      $data['page'] = $page + 1;
      if ($this->input->post("select")) {
          $data['data'] = isset($created)?$created:NULL;
          $this->load->view('backend/home/ajaxshow.php',$data);
      }else{
          $data['data'] = isset($created)?$created:NULL;
          $data['path'] = 'backend/home/show.php';
          $this->load->view('backend/layouts/index.php',$data);
      }


      
		}

	}
