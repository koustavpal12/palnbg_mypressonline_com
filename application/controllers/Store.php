<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Store extends Par_Controller
{
	public function __construct()
	{
		parent::__construct(array());
		$this->load->model('Store_model', 'store');
	}

	public function index($store_name=NULL)
	{
		$this->defaultview($store_name);
	}

	public function defaultview($store_name=NULL)
	{

		$elements = array();
		$element_data = array();
		$param = array();

		$js_arr = array();
		$css_arr = array();
		$res = array();

		$host_arr = explode('.',$_SERVER['HTTP_HOST']);
		
		if($host_arr[0]!='palnbg') {
			$store_name = $host_arr[0];
		}
		
		$param['store_name'] = $store_name;

		$result = $this->store->get_store_content($param);
		
		$this->data['js_arr'] = $js_arr;
		$this->data['css_arr'] = $css_arr;
		$this->data['param'] = $param;
		$this->data['data'] = $result;

		$this->data['metaTitle'] = 'STORE VIEW:'.($store_name ? $store_name:'Main Site');
		$this->data['metaDescription'] = 'STORE VIEW:'.($store_name ? $store_name:'Main Site');

		$element_data['main'] = $this->data;
		$this->layout->setLayout($this->layoutPath . 'par_layout');
		$this->layout->multiple_view($this->elements, $element_data);
		
	}

}
