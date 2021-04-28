<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Store_content extends Par_Controller
{
	public function __construct()
	{
		parent::__construct(array());
		$this->load->model('Store_model', 'store');
	}

	public function index()
	{
		
	}

	public function getData($store_name)
	{	
		$res = array();
		$param = array();

		$param['store_name'] = $store_name;
		$result = $this->store->get_store_content($param);
		$res['data'] = $result;
		$this->responseData($res);	
	}

	public function responseData($param = array())
	{
		$res = array(
			'status' => (!empty($param['status']) ? $param['status'] : 2000),
			'msg' => (!empty($param['msg']) ? $param['msg'] : 'success'),
			'data' => (!empty($param['data']) ? $param['data'] : NULL),
		);
		die(json_encode($res));
	}

	
}
