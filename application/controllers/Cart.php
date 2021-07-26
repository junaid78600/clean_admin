<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->helper("function_helper");
		$this->load->model('AdminModel');
		$this->load->model('SiteModel');
		$this->load->Model('eloquent/Admin_Model');
		 $this->load->Model('eloquent/CustomerModel');
		 $this->load->Model('eloquent/ProductModel');
		 $this->load->Model('eloquent/OrderModel');
		 $this->load->Model('eloquent/ItemModel');
		 $this->load->Model('eloquent/OrderAddressModel');
		 $this->load->Model('eloquent/PaymentModel');
		 $this->load->Model('eloquent/City_Model');
		 $this->load->Model('eloquent/Sale_coordinator_city_Model');
	
    }
    public function index()
    {
    	# code...
    	print_r($this->cart->contents());
    }

	public function add_to_cart()
	{	

		$item_id=$this->input->post('id');
		
		
        
        $qty=1;
        

		

		$product=ProductModel::find($item_id);
		$price=$product->price;
		$title=$product->name;
		$data = array(
        'id'      =>$item_id,
        'qty'     => $qty,
        'price'   =>$price,
		'name'    => $title
                             );
        
          
        // if($this->cart->insert($data)){$count=count($this->cart->contents()); echo(json_encode(array('status'=>1,'count'=>$count)));}else{array('status'=>0);}
			// print_r($this->cart->contents());
			
			if($this->cart->insert($data)):
				$data =  array(
					'data' 		=> $cart=$this->cart->contents(),
					'total' 		=> number_format($this->cart->total()),
					'status'=>1
				);
				echo json_encode($data);
			else:
			echo(json_encode(array('status'=>0)));	
			endif;


	}
	public function view_cart()
	{
		
		$data =  array(
			'data' 		=> $cart=$this->cart->contents(),
			'total' 		=> number_format($this->cart->total()),
		);
		echo(json_encode($data));

	}
	public function add_to_cart_single_page()
	{	

		$item_id=$this->input->post('id');
		$qty=$this->input->post('qty');
		$variation=$this->input->post('variation');
		$type=$this->input->post('type');

		

		$product=$this->SiteModel->getRow('e_product',array('id'=>$item_id));
		$price=$product['price'];
		$title=$product['title'];
		$try_now=$product['shipping_price'];
		$data = array(
        'id'      =>$item_id,
        'qty'     => $qty,
        'price'   =>$price,
        'name'    => $title,
        'type'	=>$type,
        'options'=>array('try_now'=>$try_now,'variation'=>$variation)
                             );
        
          
        if($this->cart->insert($data)){$count=count($this->cart->contents()); echo(json_encode(array('status'=>1,'count'=>$count)));}else{array('status'=>0);}
    


	}
	public function update_cart()
	{	

		$item_id=$this->input->post('id');
		$qty=$this->input->post('qty');

		
			$data = array(
        'rowid' => $item_id,
        'qty'   => $qty
        );

       $this->cart->update($data);
       $count=count($this->cart->contents()); echo(json_encode(array('status'=>1,'count'=>$count)));

		


	}
	public function remove()
	{
		# code...
		$id=$this->input->post('row_id');
		$deleteItem = array(
      'rowid' => $id,
       'qty'   => 0
       );

     $this->cart->update($deleteItem);
	}
	

	
	
	
	
	public function print_cart()
	{
		# code...
		// print_r($this->cart->contents());
		 $this->cart->destroy();

		
		// print_r($this->session->coupon);
		// $this->session->unset_userdata('coupon');
	}

	

	public function place_order()
	{   
	    
	    $today = date("Ymd");
	    $dealer=$this->input->post('dealer');
	    $location=$this->input->post('location');
     $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
       $unique = $today . $rand;
	   $order=new OrderModel();
	   if($this->session->role=='Admin')
	   {
		   $role='Admin';
		   $user_id=$this->session->userid;
	   }else
	   {
		   $role='User';
		   $user_id=$this->session->user_id;
	   }
	   if($this->cart->contents())
	   {
		   $order->order_no=$unique;
		   $order->create_at=date('Y-m-d  g:i:s:A');
		   $order->total_order_price=$this->cart->total();
		   $order->type=$role;
		   $order->status='Pending';
		   $order->user_id=$user_id;
		   $order->order_by=$dealer;
		   $order->location_id=$location;
		   $order->save();
		   foreach ($this->cart->contents() as $key => $value) {
			# code...
			$item=array(
				'order_id'=>$order->id,
				'item_id'=>$value['id'],
				'product_name'=>$value['name'],
				'price'    =>$value['price'],
				'qty'    =>$value['qty'],
			);
			// print_r($item);exit();
			ItemModel::create($item);
		}
		$this->cart->destroy();
		echo json_encode(array('status'=>1,'message'=>'Order SuccessFully'));

	   }else
	   {
		  echo json_encode(array('status'=>0,'message'=>' Cart Empty'));
	   }
		
	}

	public function update_order()
	{   
	    
	    $today = date("Ymd");
	    $dealer=$this->input->post('dealer');
	    $location=$this->input->post('location');
	    $order_id=$this->input->post('order_id');
        $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
       $unique = $today . $rand;
	   $order=OrderModel::findorFail($order_id);
	   // if($this->session->role=='Admin')
	   // {
		  //  $role='Admin';
		  //  $user_id=$this->session->userid;
	   // }else
	   // {
		  //  $role='User';
		  //  $user_id=$this->session->user_id;
	   // }
	   if($this->cart->contents())
	   {
		   // $order->order_no=$unique;
		   // $order->create_at=date('Y-m-d  g:i:s:A');
		   $order->total_order_price=$this->cart->total();
		   // $order->type=$role;
		   // $order->status='Pending';
		   // $order->user_id=$user_id;
		   $order->order_by=$dealer;
		   $order->location_id=$location;
		   $order->save();
		   ItemModel::where('order_id', $order_id)->delete();
		   foreach ($this->cart->contents() as $key => $value) {
			# code...
			$item=array(
				'order_id'=>$order->id,
				'item_id'=>$value['id'],
				'product_name'=>$value['name'],
				'price'    =>$value['price'],
				'qty'    =>$value['qty'],
			);
			// print_r($item);exit();
			ItemModel::create($item);
		}
		$this->cart->destroy();
		echo json_encode(array('status'=>1,'message'=>'Order SuccessFully updated'));

	   }else
	   {
		  echo json_encode(array('status'=>0,'message'=>' Cart Empty'));
	   }
		
	}
	
	public function  final_order()
	{
	    	$order_id=$this->SiteModel->insertReturn('e_orders',$_SESSION['order']);


         if($order_id)
			{
				foreach ($this->cart->contents() as $key => $value) {
		 			# code...
		 			$variation=(array_key_exists('variation',$value['options']))?$value['options']['variation']:'';
		 			$item=array(
		 				'order_id'=>$order_id,
		 				'item_id'=>$value['id'],
		 				'title'=>$value['name'],
		 				'try_now_price'=>$value['options']['try_now'],
		 				'price'    =>$value['price'],
		 				'qty'    =>$value['qty'],
		 				'variation'		=>$variation,
		 				'type'			=>$value['type']
		 			);
		 			// print_r($item);exit();
		 			$this->SiteModel->insertData('e_items',$item);
		 		}
		 		 $this->cart->destroy();
		 		return 1;
			}else
			{
			    return 0;
			}
	}

	public function edit_order($order_id)
	{
		$order=OrderModel::where('id',$order_id)->with('oderDetails','dealer','location')->first();
		
		if(!empty($order)):
			foreach ($order->oderDetails as $value) {

				$update = array(
					        'id'      =>$value->item_id,
					        'qty'     => $value->qty,
					        'price'   =>$value->price,
							'name'    => $value->product_name
                             );
				// print_r($update);exit;
				$this->cart->insert($update);
			}
		$dealer=CustomerModel::where('role','=','Dealer')->get();
		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$location=City_Model::all();
		 $send=($this->session->role=='Admin')?base_url().'Admin/orderdetails/'.$order_id :base_url().'user/orderdetails/'.$order_id;
		$data =  array(
			'settings' => $settings,
			'userData' => $userData,
			'dealer'	=>$dealer,
			'location'	=>$location,
			'order'		=>$order,
			'send'		=>$send
		);
		
		$this->load->view('admin_pages/edit_order_view',$data);
	else:
		redirect('/');
	endif;
	}
	

         
      

}

