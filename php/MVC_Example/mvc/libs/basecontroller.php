<?php 
	class BaseController{
		protected $url;
		protected $action;
		protected $model;
		protected $view;

		public function __construct($action,$url){
			$this->action = $action;
			$this->url = $url;

			$this->view = new View();
		}

		public function executeAction(){
			return $this->{$this->action}();
		}
	}