<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_function extends CI_Controller {

	public function __construct() {

        parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('function_helper');
		$this->load->Model('AdminModel');
		$this->load->Model('SiteModel');
		$this->load->library('image_lib');
		$this->load->library('upload');
		if (!isset($_SESSION))
		session_start();
    }

	public function index()
	{
	  echo "Nothing to show. Site_function";
	}
	#################gilgit bazar#########
	
	
	//by data
	public function postReview()
	{
		$data['re_name'] = $this->input->post('name');
		$data['re_email'] = $this->input->post('email');
		$data['reviews'] = $this->input->post('reviews');
		$data['user_id'] = $this->input->post('user_id');
		if ($this->AdminModel->insertData('e_reviews',$data))
		{
			$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Thankyou for Reviews. Will be posted soon."
				));
		}
		else
			$this->session->set_flashdata('alert_data', array(
				'type' => 'danger', 
				'details' => "Action Failed(@query postReview)"
				));
	}




	
	
	
	

	
	
	
	
	############################renderSummary 
	
	########################### end RenderData
	protected function prepareOr($arr,$index)
	{
		$newArr = array();
		foreach ($arr as $item) {
			$newArr[] = " $index = '$item' ";
		}
		return implode(' || ', $newArr);
	}
	######################analysis search function
	
	
	

	################generic save and update
	public function saveSimple()
	{
		if (isset($_FILES) && !empty($_FILES['files']['name']))
		{
			$photo =  $this->processImg($_FILES);
			$this->create_thumbnail($photo);
		}
		else
			$photo = "";
		$data = $_POST;
		$tableName = $data['tableName'];
		unset($data['tableName']);
		$data = $data + array('image' => $photo);
		//   echo "<pre>";
		//  print_r($data);
		// echo $tableName;

		if ($this->AdminModel->insertData($tableName,$data))
		{
			$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action Success"
				));
		}
		else
			$this->session->set_flashdata('alert_data', array(
				'type' => 'danger', 
				'details' => "Action Failed"
				));
	}
	public function updateSimple()
	{
		$index 		= $_POST['keyIndex'];
		$tableName 	= $_POST['tableName'];
		$id = $this->input->post($index);
		$data = $_POST;
		unset($data['keyIndex']);
		unset($data['tableName']);

		if (isset($_FILES) && !empty($_FILES['files']['name']))
		{
			$this->deleteImage($tableName,$index,$id,'image','assets/cms_images/');
			$photo =  $this->processImg($_FILES);
			$this->create_thumbnail($photo);
			$data = $data + array('image'=>$photo);
		}

		// echo "<pre>";
		// print_r($data);
		
		if ($this->AdminModel->updateRow($tableName,$index,$id,$data))
		{
			$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action Success"
				));
		}
		else
			$this->session->set_flashdata('alert_data', array(
				'type' => 'danger', 
				'details' => "Action Failed(@query updateSimple)"
				));

	}

	////////////////////saving career application
	public function saveApplication()
	{
		$data = $_POST;
		if (strcasecmp($_SESSION['captchaWord'], $data['captcha']) == 0) 
		{
			unset($_SESSION['captchaWord']);
			unset($data['captcha']);

			if (isset($_FILES) && !empty($_FILES['files']['name']))
			{
				 $file =  $this->processFile($_FILES);
			}
			else
				$file = "";
			

			$data = $data + array('cv' => $file);
			  //  echo "<pre>";
			  // print_r($data);

			if ($this->AdminModel->insertData('e_applications',$data))
			{

				echo "<div>Application Saved successfully<br>Redircting...</div>";
			}
			else
				
			echo "<div>Your Application Not sent <br>Redircting...</div>";
		}
		else
			echo "<div> Invalid Captcha Value<br>Redircting...</div>";
	}

	//////////////////////saving contact us site page
	public function saveContactUs()
	{

		$data = array();
		$data['name'] = $this->input->post('name');
		$data['email'] = $this->input->post('email');
		$data['phone'] = $this->input->post('phone');
		$data['message'] = $this->input->post('message');
		

			if ($this->AdminModel->insertData('e_contact_us',$data))
			{
				$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Your Message sent successfully."
				));
			}
			else
				$this->session->set_flashdata('alert_data', array(
				'type' => 'danger', 
				'details' => "Your Message was not sent."
				));
	}
	//////////////// GENERIC Function for delete row//////////////
	public function deleteImage($tableName,$key,$value,$fieldName,$filePath)
	{
		 $filename = $this->AdminModel->getField($tableName,$key,$value,$fieldName);
		if (!empty($filename) && $filename != '0') 
		{
			$image = $_SERVER['DOCUMENT_ROOT'].'/'.CMS_PATH.$filePath.$filename;
			$image_thumbnail = $_SERVER['DOCUMENT_ROOT'].'/'.CMS_PATH.$filePath.'thumbnail/'.$filename;
			if (file_exists($image)) unlink($image);
			if (file_exists($image_thumbnail)) unlink($image_thumbnail);
		}
	}
	public function deleteMultipleImage($tableName,$key,$value,$fieldName,$filePath)
	{
		 $filename = $this->AdminModel->getField($tableName,$key,$value,$fieldName);
		if (!empty($filename) && $filename != '0') 
		{
			$images = explode(';', $filename);
			foreach ($images as $file)
			{
				$image = $_SERVER['DOCUMENT_ROOT'].'/'.CMS_PATH.$filePath.$file;
				//$image_thumbnail = $_SERVER['DOCUMENT_ROOT'].'/'.CMS_PATH.$filePath.'thumbnail/'.$file;
				if (file_exists($image)) unlink($image);
				//if (file_exists($image_thumbnail)) unlink($image_thumbnail);
			}
			
		}
	}
	 public function processImg($files,$filename = 'files')
	{
		$config['upload_path']          = "assets/cms_images/";
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 3000;
       // $config['max_width']            = 3000 ;
        //$config['max_height']           = 2000;
        $new_name = time().mt_rand(1,999).trim($_FILES[$filename]['name']);
		$config['file_name'] = $new_name;
        $photos = "";
        $dataInfo = array();
      	
      	$this->load->library('upload', $config);


        if ( ! $this->upload->do_upload($filename))
        {
            $error = array('error' => $this->upload->display_errors());
            //print_r($error);
            //exit();
            //return false;
        }
        else
        {
             $data = array('upload_data' => $this->upload->data());
             return $data['upload_data']['file_name'];
        }
	}

		public function processMultipleIamges($files,$filename = 'files',$thumbnail = FALSE)
	{
		$config['upload_path']          = "assets/cms_images/";
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 3000;
       // $config['max_width']            = 3000 ;
        //$config['max_height']           = 2000;
        
        $photos = array();
        $dataInfo = array();
        // echo "<pre>";
        // print_r($_FILES);
       
        
        $cpt = count($_FILES[$filename]['name']);
        for($i=0; $i<$cpt; $i++)
        {   
   			$new_name = time().rand(9,99999);
			$config['file_name'] = $new_name;       
            $_FILES[$filename]['name']= $files[$filename]['name'][$i];
            $_FILES[$filename]['type']= $files[$filename]['type'][$i];
            $_FILES[$filename]['tmp_name']= $files[$filename]['tmp_name'][$i];
            $_FILES[$filename]['error']= $files[$filename]['error'][$i];
            $_FILES[$filename]['size']= $files[$filename]['size'][$i];  

            $this->upload->initialize($config);
            // $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload($filename))
            {
                $error = array('error' => $this->upload->display_errors());
                // print_r($error);
            }
            else
            {  
                $dataInfo = array('upload_data' => $this->upload->data());
                $photos[] = $dataInfo['upload_data']['file_name'];
               
            }

            
        }
        if($thumbnail) $this->create_thumbnail($photos,TRUE);
        return implode(';',$photos );
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

   	 public function processFile($files,$filename = 'files')
	{
		$config['upload_path']          = "assets/lib/uploads";
        $config['allowed_types']        = 'docx|doc|pdf';
        $config['max_size']             = 4000;
       // $config['max_width']            = 3000 ;
        //$config['max_height']           = 2000;
        $new_name = time().mt_rand(1,999000); 
		$config['file_name'] = $new_name;
        $photos = "";
        $dataInfo = array();
      	
      	$this->load->library('upload', $config);
        if ( ! $this->upload->do_upload($filename))
        {
            $error = array('error' => $this->upload->display_errors());
             //print_r($error);
             //exit();
            //return false;
        }
        else
        {
             $data = array('upload_data' => $this->upload->data());
             return $data['upload_data']['file_name'];
        }
	}




	
}
