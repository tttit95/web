<?php
	class Loader{
		private $controllerFileName;//ten file controller
		private $controllerClassName;//ten class controller
		private $action;//method của controllerClassName
		private $url;

		public function __construct(){
			//ex: localhost:8080/mvc?controller=name&action=action
			$this->url = $_GET;
			//ex
			/*$this->url(
				'controller' => "name",
				'action'	 => "action",
			)*/

			if($this->url['controller'] == ""){
				$this->controllerFileName = "home";
				$this->controllerClassName = "HomeController";
			}else{
				$this->controllerFileName = strtolower($this->url['controller']);//ex. chuyển name thành name(chuyển chữ hoa thành chữ thường)
				$this->controllerClassName = ucfirst(strtolower($this->url['controller']))."Controller";//ex. chuyển chữ name thành NameController
			}

			if($this->url['action'] == ""){
				$this->action = "index";
			}else{
				$this->action = $this->url['action'];
			}
		}

		public function createController(){
			//kiểm tra tên file .php có tồn tại hay không?
			if(file_exists(__CONTROLLER_PATH.$this->controllerFileName.".php")){
				require(__CONTROLLER_PATH.$this->controllerFileName.".php");
			}else{
				
				require(__CONTROLLER_PATH."error.php");
				return new ErrorController("badurl",$this->url);
			}
			// nếu file ../controllers/".$this->controllerFileName.".php" tồn tại thì kiểm tra class trong file có tồn tại không?

			if(class_exists($this->controllerClassName)){
				$parents = class_parents($this->controllerClassName);//trả về mảng các lớp cha của class $this->controllerClassName
				// Kiểm tra class BaseController có phải là lớp cha của class $this->controllerClassName không?
				if(in_array("BaseController",$parents)){
					//kiểm tra method $this->action có tồn tại trong class $this->controllerClassName không?
					if(method_exists($this->controllerClassName, $this->action)){
						return new $this->controllerClassName($this->action,$this->url);
					}else {
                    //bad action/method error
                    require(__CONTROLLER_PATH."error.php");
                    return new ErrorController("badurl",$this->url);
                	}
				}else{
					//bad controller error
	                require(__CONTROLLER_PATH."error.php");
	                return new ErrorController("badurl",$this->url);
				}
			}else{
				//bad controller error
	            require(__CONTROLLER_PATH."error.php");
	            return new ErrorController("badurl",$this->url);
			}

		}

	}