<?php
	class UserController extends BaseController{
		public function dangky(){
			$data = array('title' =>'My title');
			$this->view->output('user/dangky',$data);
		}
	}