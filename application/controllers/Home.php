<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Home extends Par_Controller
{
	public function __construct()
	{
		parent::__construct(array());
		$this->load->model('Store_model', 'store');
	}

	public function index()
	{
		$this->defaultview();
	}

	public function defaultview()
	{

		$elements = array();
		$element_data = array();
		$param = array();

		$js_arr = array(
			STORE_CREATE_JS
		);

		$css_arr = array(
			STORE_CREATE_CSS
		);

		$res = array();

		$this->data['js_arr'] = $js_arr;
		$this->data['css_arr'] = $css_arr;
		$this->data['param'] = $param;
		$this->data['data'] = $res;

		$this->data['metaTitle'] = 'TEST';
		$this->data['metaDescription'] = 'Test 2';

		$element_data['main'] = $this->data;
		$this->layout->setLayout($this->layoutPath . 'par_layout');
		$this->layout->multiple_view($this->elements, $element_data);
		#        __VIEW_PAGE_TEMPLATE
	}

	
	public function generate_otp()
	{
		$param = array();
		$result = array();

		$param['mobile'] = $this->input->post('mobile', TRUE);
		$result = $this->store->generate_otp($param);
		$result['mobile'] = $param['mobile'];
		$res = array('data' => $result);
		$this->responseData($res);
	}

	public function verify_otp()
	{
		$param = array();
		$result = array();

		$param['mobile'] = $this->input->post('mobile', TRUE);
		$param['otp'] = $this->input->post('otp', TRUE);
		$result = $this->store->verify_otp($param);

		if (empty($result)) {
			$res['status'] = -1;
			$res['msg'] = 'OTP verification failed!!!';
		}
		$res['data'] = $result;
		$this->responseData($res);
	}

	public function register_store()
	{
		$param['uid'] = $this->input->post('uid', TRUE);
		$param['store_name'] = $this->input->post('store_name', TRUE);
		$result = $this->store->register_store($param);

		$store_uri = $this->getStoreUri($param);
		$param['store_uri'] = $store_uri;

		$res['data'] = $param;

		if (!$result) {
			$res['status'] = -1;
			$res['msg'] = 'store addition failed!!!';
			unset($res['data']);
		}

		$this->responseData($res);
	}

	public function add_store_content()
	{
		$res = array();

		$param['uid'] = $this->input->post('uid_stote', TRUE);
		$param['data'] = $this->input->post('content', TRUE);

		$result = $this->store->add_store_content($param);

		if (!$result) {
			$res['status'] = -1;
			$res['msg'] = 'content add failed!!!';
		}

		$this->responseData($res);
	}

	public function responseData($param = array())
	{
		$res = array(
			'status' => (!empty($param['status']) ? $param['status'] : 1),
			'msg' => (!empty($param['msg']) ? $param['msg'] : 'success'),
			'data' => (!empty($param['data']) ? $param['data'] : NULL),
		);
		die(json_encode($res));
	}

	public function getStoreUri($param = array())
	{
		if ($param['store_name']) {
			$url_arr = explode('//',BASE_URL);
			return array($url_arr[0].'//'.$param['store_name'].'.'.$url_arr[1], BASE_URL.'index.php/store/'.$param['store_name'].'/');
			
		} else {
			return false;
		}
	}
	
	public function view_otp()
	{
		$param = array();
		$result = array();

		$param['mobile'] = $this->input->get('mobile', TRUE);
		$result = $this->store->view_otp($param);
		
		$res['data'] = $result;
		$this->responseData($res);
	}
}
