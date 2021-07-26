<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->helper("function_helper");
		$this->load->model('AdminModel');
        user_logincheck();
         $this->load->Model('eloquent/Admin_Model');
		 $this->load->Model('eloquent/CustomerModel');
		 $this->load->Model('eloquent/ProductModel');
		 $this->load->Model('eloquent/OrderModel');
		 $this->load->Model('eloquent/ItemModel');
		 $this->load->Model('eloquent/OrderStatusModel');
		 $this->load->Model('eloquent/OrderAddressModel');
		 $this->load->Model('eloquent/City_Model');
		 $this->load->Model('eloquent/Sale_coordinator_city_Model');
		 $this->load->Model('eloquent/TelecalModel');
         $this->load->Model('eloquent/ShippedorderModel');

	
    }

	public function index()
	{	
        $settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();

		
		$data =  array(
			'settings' => $settings,
			'userData' => $userData
		);
        $this->load->view('user_pages/index',$data);
		

	}
    public function profile($id)
	{		
		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$user=CustomerModel::find($id);
		
		$data =  array(
			'settings' => $settings,
			'userData' => $userData,
			'user'=>$user
			
		);
        $this->load->view('user_pages/profile',$data);
	}


	public function new_order()
	{


		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$orderList=OrderModel::query();
		// print_r($this->session->role);exit;
		if($this->session->role=='Sales_Coordinator')
		{
			$orderList->where('stage',1);
		}
		$orderList->with('oderDetails');
		$orderList=$orderList->get();
		$location=Sale_coordinator_city_Model::select('city_id')->where('user_id',$this->session->user_id)->get();
		
		$data =  array(
			'settings' => $settings,
			'userData' => $userData,
			'orderList'=>$orderList,
			'heading'	=>'New Order List',
			'location'=>$location
		);
		
		$this->load->view('user_pages/orderList_view',$data);
	}
	public function adminapproved()
	{


		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$orderList=OrderModel::query();
		// print_r($this->session->role);exit;
		if($this->session->role=='Sales_Coordinator')
		{
			$orderList->where('stage',4);
		}
		$orderList->with('oderDetails');
		$orderList=$orderList->get();
		$location=Sale_coordinator_city_Model::select('city_id')->where('user_id',$this->session->user_id)->get();

		$data =  array(
			'settings' => $settings,
			'userData' => $userData,
			'orderList'=>$orderList,
			'heading'	=>'Read to Dispatch Order List',
			'location'	=>$location
		);
		
		$this->load->view('user_pages/orderList_view',$data);
	}
	// dispather order
	public function dispatcher_order()
	{

		if($this->session->role != 'Dispatcher') redirect('user/login');
		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$orderList=OrderModel::query();
		// print_r($this->session->role);exit;
		
		$orderList->where('stage',5);
		$orderList->with('oderDetails');
		$orderList=$orderList->get();
		$data =  array(
			'settings' => $settings,
			'userData' => $userData,
			'orderList'=>$orderList,
			'heading'	=>'Dispatcher  Order List'
		);
		
		$this->load->view('user_pages/dispatcher_orderList_view',$data);
	}
	public function ready_to_ship()
	{

		if($this->session->role != 'Dispatcher') redirect('user/login');
		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$orderList=OrderModel::query();
		// print_r($this->session->role);exit;
		
		$orderList->where('stage',7);
		$orderList->with('oderDetails','dealer','shipping','telecal');
		$orderList=$orderList->get();
		$data =  array(
			'settings' => $settings,
			'userData' => $userData,
			'orderList'=>$orderList,
			'heading'	=>'Dispatcher Order List'
		);
		
		$this->load->view('user_pages/dispatcher_orderList_view',$data);
	}
	// orderdetails
	public function orderdetails($id)
	{

		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$orderList=OrderModel::query();
		$orderList->where('id','=',$id);
		$orderList->with('oderDetails','dealer','shipping','telecal');
		$orderList=$orderList->first();
		$data =  array(
			'settings' => $settings,
			'userData' => $userData,
			'order'=>$orderList,
			'heading'	=>'All Order List'
		);
		
		$this->load->view('user_pages/orderdetils_view',$data);
	}
	
	public function orderList()
	{	
		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$orderList=OrderStatusModel::query();	
		$orderList->where('user_id',$this->session->user_id);
		$orderList->with('order','statusList');
		$orderList=$orderList->groupBy('order_id')->get();
		// echo"<pre>";
		// print_r($orderList->toArray());exit;
		$data =  array(
			'settings' => $settings,
			'userData' => $userData,
			'orderList'=>$orderList,
			'heading'	=>'All Order List'
		);
		$this->load->view('user_pages/all_orderList_view',$data);

	}
	// sub admin order show 
	public function subadmin_new_order()
	{
		if($this->session->role != 'sub_admin') redirect('user');

		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$orderList=OrderModel::query();
		$orderList->with('oderDetails');
		$orderList->where('stage','=',2);
		$orderList=$orderList->get();
		$data =  array(
			'settings' => $settings,
			'userData' => $userData,
			'orderList'=>$orderList,
			'heading'	=>'Accepted Order List'
		);
		
		$this->load->view('user_pages/subadmin_new_order',$data);
	}
	public function orderdispatch()
	{
		if($this->session->role != 'sub_admin') redirect('user');

		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$orderList=OrderModel::query();
		$orderList->with('oderDetails');
		$orderList->where('stage','=',5);
		$orderList=$orderList->get();
		$data =  array(
			'settings' => $settings,
			'userData' => $userData,
			'orderList'=>$orderList,
			'heading'	=>'Dispatch Order List'
		);
		
		$this->load->view('user_pages/subadmin_new_order',$data);
	}

	public function shipped_orders()
	{

		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$orderList=ShippedorderModel::all();
		$final=$orderList->toArray();
		foreach ($orderList as $key => $value) {
			// code...
			$ids=explode(',',$value->order_id);
		// print_r($ids);exit;
			$order_ids=array();
			foreach ($ids as $k => $v) {
				// code...
			
			$order=OrderModel::query();
			$order->where('id','=',$v);
			$order->with('oderDetails','dealer');
			$order=$order->first();
			array_push($order_ids,$order);


		    }
		    $final[$key]['order']=$order_ids;
		}
		// echo"<pre>";
		// print_r($final);exit();
		$data =  array(
			'settings' => $settings,
			'userData' => $userData,
			'orderList'=>$final,
			'heading'	=>'Shipped Order List'
		);
		
		$this->load->view('user_pages/shipped_orderList_view',$data);
	}

	




}

