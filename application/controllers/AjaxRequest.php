<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AjaxRequest extends CI_Controller {

	public function __construct() {

        parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('function_helper');
		$this->load->Model('AdminModel');
        $this->load->library('image_lib');
		$this->load->library('upload');
		// login_check();
		$this->load->helper('security');
        		//  eloquent models
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
	  echo "Nothing to show. Function_control";
	}
    public function processImg($files,$filename = 'files',$upload_path = 'assets/cms_images/')
	{
		$config['upload_path']          = $upload_path;
        $config['allowed_types']        = '*';
        $config['max_size']             = 3000;
       // $config['max_width']            = 3000 ;
        //$config['max_height']           = 2000;
        $new_name = time().mt_rand(1,99999);
		$config['file_name'] = $new_name;
        $photos = "";
        $dataInfo = array();
      	
      	
      	$this->upload->initialize($config);
      	

        if ( ! $this->upload->do_upload($filename))
        {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            exit();
            return false;
        }
        else
        {
             $data = array('upload_data' => $this->upload->data());
             return $data['upload_data']['file_name'];
        }
	}
    public function create_thumbnail($filename,$multi_images = FALSE)
	{
		
		$target_path = $_SERVER['DOCUMENT_ROOT'] . '/'.CMS_PATH.'assets/cms_images/thumbnail';
	   $config = array(
	   'image_library' => 'gd2',
	   'source_image'  => '',
	   'new_image' => $target_path,
	   'maintain_ratio' => TRUE,
	   'create_thumb' => TRUE,
	   'thumb_marker' => '',
	   'width' => 150,
	   'height' => 150
   );
   if ($multi_images)
   {
	   foreach ($filename as $file)
	   {
			$source_path = $_SERVER['DOCUMENT_ROOT'].'/'.CMS_PATH.'assets/cms_images/'.$file;
		   $config['source_image'] = $source_path; 
			$this->image_lib->initialize($config);
		   if (!$this->image_lib->resize())
			   echo $this->image_lib->display_errors();
	   }
   }
   else
   {
	  $source_path = $_SERVER['DOCUMENT_ROOT'].'/'.CMS_PATH.'assets/cms_images/'.$filename;
	   $config['source_image'] = $source_path;
	   $this->image_lib->initialize($config);
	 if (!$this->image_lib->resize())
		  echo $this->image_lib->display_errors();
		   
   }
   $this->image_lib->clear();
	}
	
    // save user
    public function saveUser()
    {
        $this->form_validation->set_rules('email','Email','required');
      $this->form_validation->set_rules('role','Role','required');
      $this->form_validation->set_rules('status','status','required');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[8]');
		$this->form_validation->set_rules('confirm_password','Confirm password','trim|required|matches[password]');
		if ($this->form_validation->run()==TRUE)
		 {

            $email=$this->input->post('email');
           $check= CustomerModel::where('email','=',$email)->first();
            if($check!=null)
            {   
                echo   json_encode(['status'=>0,'data'=>'Email Already exit']);
                return false;
            }
             
            CustomerModel::create([
                'name'=>$this->input->post('name'),
                'email'=>$this->input->post('email'),
                'city'=>$this->input->post('city'),
                'address'=>$this->input->post('address'),
                'role'=>$this->input->post('role'),
                'status'=>$this->input->post('status'),
                'phone'=>$this->input->post('phone'),
                'password'=>md5($this->input->post('password')),

             ] );
             $data=$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action successfull."
				));
           echo  json_encode(['status'=>1,'data'=>$data]);

		}else{
            $data=validation_errors();
          echo   json_encode(['status'=>0,'data'=>$data]);
        }
        
    }
    public function updateUser()
    {
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('role','Role','required');

        if($this->input->post('new_password')):
		$this->form_validation->set_rules('new_password','Password','trim|required|min_length[8]');
        endif;
		// $this->form_validation->set_rules('confirm_password','Confirm_password','trim|required|matches[password]');
		if ($this->form_validation->run()==TRUE)
		 {
            $id=$this->input->post('id');
            $email=$this->input->post('email');
            $check= CustomerModel::where('email','=',$email)->where('user_id','!=',$id)->first();
            $email=$this->input->post('email');
            if($check!=null)
            {   
                echo   json_encode(['status'=>0,'data'=>'Email Already exit']);
                return false;
            }
            $update= CustomerModel::find($id);
            // $update->id=$this->input->post('id');
            //  $update->id=$this->input->post('id');
             $update->name=$this->input->post('name');
             $update->email=$this->input->post('email');
             $update->city=$this->input->post('city');
             $update->role=$this->input->post('role');
             $update->phone=$this->input->post('phone');

             $update->address=$this->input->post('address');
             if($this->input->post('new_password')):
              $update->password=md5($this->input->post('new_password'));
            
            endif;
            $update->save();
             $data=$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action successfull."
				));
           echo  json_encode(['status'=>1,'data'=>$data]);

		}else{
            $data=validation_errors();
          echo   json_encode(['status'=>0,'data'=>$data]);
        }
        
    }
    public function deleteuser()
    {
        # code...
        $id=$this->input->post('value');
        CustomerModel::find($id)->delete();
    }

    // save user
    public function saveProduct()
    {
        $this->form_validation->set_rules('name','name','required');
        $this->form_validation->set_rules('stock','stock','required');
        $this->form_validation->set_rules('details','details','required');
        $this->form_validation->set_rules('status','sratus','required');
        $this->form_validation->set_rules('price','sratus','required');
		if ($this->form_validation->run()==TRUE)
		 {  
            if (isset($_FILES) && !empty($_FILES['files']['name']))
            {
                $photo =  $this->processImg($_FILES);
                $this->create_thumbnail($photo);
                // $data = $data + array('image' => $photo);
            }

            
             
            ProductModel::create([
                'name'=>$this->input->post('name'),
                'status'=>$this->input->post('status'),
                'details'=>$this->input->post('details'),
                'stock'=>$this->input->post('stock'),
                'price'=>$this->input->post('price'),
                'slug'=> str_replace(' ','_',$this->input->post('name')),
                'image'=>$photo
                

             ] );
             $data=$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action successfull."
				));
           echo  json_encode(['status'=>1,'data'=>$data]);

		}else{
            $data=validation_errors();
          echo   json_encode(['status'=>0,'data'=>$data]);
        }
        
    }
    public function updateProduct()
    {
        $this->form_validation->set_rules('name','name','required');
        $this->form_validation->set_rules('stock','stock','required');
        $this->form_validation->set_rules('details','details','required');
        $this->form_validation->set_rules('status','sratus','required');
        $this->form_validation->set_rules('price','sratus','required');

        
		if ($this->form_validation->run()==TRUE)
		 {
             $update= ProductModel::find($this->input->post('id'));
            if (isset($_FILES) && !empty($_FILES['files']['name']))
            {
                $photo =  $this->processImg($_FILES);
                $this->create_thumbnail($photo);
                $update->image=$photo;
                // $data = $data + array('image' => $photo);
            }
            $update->name=$this->input->post('name');
            $update->status=$this->input->post('status');
            $update->details=$this->input->post('details');
            $update->stock=$this->input->post('stock');
            $update->price=$this->input->post('price');
            $update->slug=str_replace(' ','_',$this->input->post('name'));
            $update->save();
             $data=$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action successfull."
				));
           echo  json_encode(['status'=>1,'data'=>$data]);

		}else{
            $data=validation_errors();
          echo   json_encode(['status'=>0,'data'=>$data]);
        }
        
    }
    public function deleteproduct()
    {
        # code...
        $id=$this->input->post('value');
        ProductModel::find($id)->delete();
    }

    public function changeorderStatus()
    {
        # code...
      $type=$this->input->post('type');
      $order_id=$this->input->post('order_id');
      $order=OrderModel::findorfail($order_id);
      $orderStatus=new OrderStatusModel();
      
      if ($type==1) {
        # code...
        $orderStatus->stage=$order->stage;
        $orderStatus->order_id=$order->id;
        $orderStatus->change_by=$this->session->name.'-'.$this->session->role;
        $orderStatus->user_id=$this->session->user_id;
        $orderStatus->type=$this->session->role;
        $orderStatus->status='Accepted';
        $orderStatus->created_at=date('Y-m-d  g:i:s:A');
        $orderStatus->save();
        // order
        $order->status="Processing";
        $order->stage=$order->stage+1;
        $order->save();
      } else if($type==0) {
        $orderStatus->stage=$order->stage;
        $orderStatus->order_id=$order->id;
        $orderStatus->change_by=$this->session->name.'-'.$this->session->role;
        $orderStatus->user_id=$this->session->user_id;
        $orderStatus->type=$this->session->role;
        $orderStatus->status='Rejected';
        $orderStatus->created_at=date('Y-m-d  g:i:s:A');
        $orderStatus->save();
        // order
        $order->status="Rejected";
        $order->stage=0;
        $order->save();
      }
      
    }

    public function getOrderStatus()
    {
      # code...
      $order_id=$this->input->post('order_id');
      $orderStatus=OrderStatusModel::where('order_id',$order_id)->get();
      echo(json_encode($orderStatus));
    }
    public function dispatch_order()
    {
      // $type=$this->input->post('type');
      $order_id=$this->input->post('order_id');
      $driver_name=$this->input->post('driver_name');
      $vehical_no=$this->input->post('vehical_no');
      $shipping_address=$this->input->post('shipping_address');
      $transporter_name=$this->input->post('transporter_name');
      $transporter_contact=$this->input->post('transporter_contact');
      $order=OrderModel::findorfail($order_id);
      $orderStatus=new OrderStatusModel();
      $orderStatus->stage=$order->stage;
        $orderStatus->order_id=$order->id;
        $orderStatus->change_by=$this->session->name.'-'.$this->session->role;
        $orderStatus->user_id=$this->session->user_id;
        $orderStatus->type=$this->session->role;
        $orderStatus->status='Dispatch';
        $orderStatus->created_at=date('Y-m-d  g:i:s:A');
        $orderStatus->save();
        // order
        $order->status="Dispatch";
        $order->save();
        // add address
        $address=new OrderAddressModel();
        $address->order_id=$order->id;
        $address->driver_name=$driver_name;
        $address->vehical_no=$vehical_no;
        $address->shipping_address=$shipping_address;
        $address->user_id=$this->session->user_id;
        $address->change_by=$this->session->name.'-'.$this->session->role;
        $address->create_at=date('Y-m-d  g:i:s:A');
        $address->transporter_contact=$transporter_contact;
        $address->transporter_name=$transporter_name;
        $address->save();
    }
    // city  
    public function saveCity()
    {
      $this->form_validation->set_rules('city_name','City Name','required');
      if ($this->form_validation->run()==TRUE)
		 {
       City_Model::create([
                'city_name'=>$this->input->post('city_name'),
                'created_at'=>date('Y-m-d  g:i:s:A'),

             ] );
        $data=$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action successfull."
				));
           echo  json_encode(['status'=>1,'data'=>$data]);

		}else{
            $data=validation_errors();
          echo   json_encode(['status'=>0,'data'=>$data]);
        }
        
    }
    public function deletecity()
    {
        # code...
        $id=$this->input->post('value');
        City_Model::find($id)->delete();
    }

    public function updateCity()
    {
      $this->form_validation->set_rules('city_name','City Name','required');
      if ($this->form_validation->run()==TRUE)
		 {
       $id=$this->input->post('id');
       $city=City_Model::findorfail($id);
       $city->city_name=$this->input->post('city_name');
       $city->save();
        $data=$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action successfull."
				));
           echo  json_encode(['status'=>1,'data'=>$data]);

		}else{
            $data=validation_errors();
          echo   json_encode(['status'=>0,'data'=>$data]);
        }
        
    }
    
    public function save_sale_coordinator_city()
    {
      $id=$this->input->post('id');
      $location=$this->input->post('location');
      $this->form_validation->set_rules('location[]','City Name','required');
      $this->form_validation->set_rules('id','User uniqe ID','required');
      if ($this->form_validation->run()==TRUE)
		 {
      Sale_coordinator_city_Model::where('user_id',$id)->delete();
      foreach ($location as $key => $value) {
        $loc=array(
          'city_id'=>$value,
          'user_id'=>$id,
          'created_at'=>date('Y-m-d  g:i:s:A')
        );
        Sale_coordinator_city_Model::create($loc);
      }
      $data=$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action successfull."
				));
           echo  json_encode(['status'=>1,'data'=>$data]);
    }else{
      $data=validation_errors();
      echo   json_encode(['status'=>0,'data'=>$data]);
    }
    }

    public function save_telecall()
    {
        $order_id=$this->input->post('order_id');
        $name=$this->input->post('name');
        $contac_no=$this->input->post('contact_no');
        TelecalModel::create([
            'name'=>$name,
            'contact_no'=>$contac_no,
            'order_id'=>$order_id,
            'added_by'=>$this->session->name.'_'.$this->session->role,
            'created_at'=>date('Y-m-d g:i:s:A')

        ]);
        $this->session->set_flashdata('alert_data', array(
                'type' => 'success', 
                'details' => "Action successfull."
                ));
    }

    public function shipped_orders()
    {   

        $order_id=$this->input->post('data');
        ShippedorderModel::create(
            [
                'order_id'=>$order_id,
                'added_by'=>$this->session->name.'_'.$this->session->role,
                'created_at'=>date('Y-m-d g:i:s:A')
            ]
        );
        $order=explode(',',$order_id);
        foreach ($order as $key => $value) {
            $data=OrderModel::findorFail($value);
            $data->stage=8;
            $data->status='Shipped';
            $data->save();
        }
    }

    
	
	
}
