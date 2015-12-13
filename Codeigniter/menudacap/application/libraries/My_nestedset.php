<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class My_nestedset{
		public $arr;
		public $checked;
		public $count;
		public $count_level;
		public $left;
		public $right;
		public $level;

		public function __construct()
		{
			$this->checked = NULL;
			$this->count = 0;
			$this->count_level = 0;
			$this->left = NULL;
			$this->right = NULL;
			$this->level = NULL;
			$this->arr = NULL;
		}
		public function set($data = NULL)
		{
			if (isset($data) && is_array($data)) {

				foreach ($data as $key => $value) {
					$this->arr[$value['id']][$value['parentid']] = 1;
					$this->arr[$value['parentid']][$value['id']] = 1;
				}
			}
			return $this->arr;
			
		}
		public function nestedset($start = 0,$arr = NULL)
		{

			$this->left[$start] = ++ $this->count;
			$this->level[$start] = $this->count_level;

			if (isset($arr) && is_array($arr)) {
				foreach ($arr as $key => $value) {
					if ((isset($arr[$start][$key]) || isset($arr[$key][$start])) && (!isset($this->checked[$key][$start]) && !isset($this->checked[$start][$key]))) {
						$this->count_level++;
						$this->checked[$start][$key] = 1;
						$this->checked[$key][$start] = 1;
						$this->nestedset($key,$arr);
						$this->count_level--;

					}
				}
			}
			
			$this->right[$start] = ++$this->count;
		}

	}