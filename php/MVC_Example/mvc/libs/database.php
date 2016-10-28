<?php
	class Database{
		var $_dbh = '';
		var $_sql = '';
		var $_cursor = '';
		/*Phương thức khởi tạo kết nối đến database*/
		public function Database(){
			$this->_dbh = new PDO("mysql:host=localhost;dbname=shop", 'root', '');
			$this->_dbh->query('set names "utf8"');			
		}
		/*Phương thức thiết lập câu lệnh truy vấn*/
		public function setQuery($sql){
			$this->_sql = $sql;
		}
		/*Phương thức thực thi câu lệnh truy vấn*/
		public function execute($options = array()){
			$this->_cursor = $this->_dbh->prepare($this->_sql);
			if ($options) {
				for ($i=0; $i < count($options); $i++) { 
					$this->_cursor->bindParam($i+1,$options[$i]);
				}
			}
			/*Hoặc Dùng*/
			/*$this->_cursor->execute($options);*/
			$this->_cursor->execute();
			return $this->_cursor;
		}
		/*Phương thức lấy dữ liệu trong bảng và gán vào mảng đối tượng*/
		public function loadAllRows($options=array()){
			if (!$options) {
				if(!$result = $this->execute()){
					return false;
				}
			}else{
				if(!$result = $this->execute($options))
					return false;
			}
			return $result->fetchAll(PDO::FETCH_OBJ);
		}
		/*Phương thức lấy một dòng trong bảng và gán vào đối tượng*/
		public function loadRow($options=array()){
			if (!$options) {
				if(!$result = $this->execute()){
					return false;
				}
			}else{
				if(!$result = $this->execute($options))
					return false;
			}
			return $result->fetch(PDO::FETCH_OBJ);			
		}
		/*Phương thức đếm số dòng kết quả*/
		public function loadRecord($options=array()){
			if (!$options) {
				if(!$result = $this->execute()){
					return false;
				}
			}else{
				if(!$result = $this->execute($options))
					return false;
			}
			return $result->fetch(PDO::FETCH_COLUMN);	
		}
		/*Phương thức tìm id cuối cùng*/
		public function getLastId(){
			return $this->_dbh->lastInsertId();
		}
		/*Phương thức ngắt kết nối*/
		public function disconnect(){
			$this->_dbh = NULL;
		}

	}