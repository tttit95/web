<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	public $dropdown;
	
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
	         	//menu data
      			$d = $this->Model_category->get('*');
        		$d = $this->my_nestedset->set($d);
       			$this->my_nestedset->nestedset(0,$d);
       			$this->Model_category->nestedset($this->my_nestedset->level,$this->my_nestedset->left,$this->my_nestedset->right);
	         	redirect('category/add','refresh');
         	}
         }
         //dropdown 
        $data['dropdown'] = $this->Model_category->dropdown(0,'','dropdown');
        $data['data'] = $this->Model_category->dropdown(0,'','view');
        $this->index($data);   
	}
}

