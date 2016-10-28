<?php
	class View{

		protected $viewPath;

		public function __construct(){
		}

		public function output($link,$data = array(), $template = "maintemplate"){

			$this->viewPath = __VIEW_PATH.$link.".php";
			$templatePath = __TEMPLATES_PATH.$template.".php";

			if(!empty($data)){
				foreach ($data as $key => $value) {
					$$key = $value;
				}
			}

			if (file_exists($this->viewPath)) {
				if ($template) {
					if (file_exists($templatePath)) {
						require ($templatePath);
					}else{
						 require(__VIEW_PATH."error/badtemplate.php");
					}
				}else{
					require ($this->viewPath);
				}
			
			}else{
				require(__VIEW_PATH."error/badview.php");
			}
			
		}

		public function redirect($link = ''){

		}

	}