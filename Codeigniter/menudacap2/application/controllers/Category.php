<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	public $dropdown;
	public $dropdown1;
	public $view;
	public $level;
	public $count;
	public $left;
	public $right;
	public function __construct()
	{
		parent::__construct();
		$this->dropdown[]= 'Trang Chu';
		$this->load->helper(array('form', 'url'));
		$this->load->model('Model_category');
		$this->count = 0;
	}

	public function index($data = NULL)
	{
		$data['url'] = "backend/show.php"; 
		$this->load->view('backend/index.php',$data);
	}
	public function add()
	{
		 $this->load->helper(array('form', 'url'));
         $this->load->library('form_validation');
         $this->load->model('Model_category');
        
         if($this->input->post('submit')){
         	 //set rules
         	$this->form_validation->set_rules('category','Category','required');
         	if($this->form_validation->run()){
	         	$flag = $this->Model_category->add();
	         	$this->session->set_flashdata('message',$flag);
	         	redirect('category/add','refresh');
         	}
         }
         //dropdown
        $list = $this->dropdown(0,'','dropdown');
        $data = $this->Model_category->get('*');
        $this->my_nestedset->nestedset(0,$data);
        $data['data'] = $this->dropdown(0,'','view');
        $this->index($data);   
	}
	//menu da cap
	public function dropdown($parentid = 0,$step = '',$type = 'dropdown')
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
}

