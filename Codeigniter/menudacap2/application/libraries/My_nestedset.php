<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class My_nestedset{
		public $arr;
		public $count;
		public $left;
		public $right;

		public function __construct()
		{
			$this->count = 1;
			$this->left[0] = 0;
			$this->right = NULL;
			$this->arr = NULL;
		}
		public function nestedset($parentid = 0,$data = NULL)
		{
			foreach ($data as $key => $value) {
				if ($value['parentid'] == $parentid) {
					$this->left[$value['id']] = $this->count++;
					$this->nestedset($value['id'],$data);
				}
				
			}
			$this->right[$parentid] = $this->count;
			$this->count++;
		}

	}