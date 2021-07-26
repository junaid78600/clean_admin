<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('__send_curl_request'))
{
	
	if(!function_exists('_get_SESSION_VAL'))
	{
	  function _get_SESSION_VAL($KEY)
	  {
	    if(isset($_SESSION[$KEY]))
	      return $_SESSION[$KEY];
	    else
	      return false;
	  }
	}

	function get_user_credentials()
	{
		$CI = & get_instance();
		$apiuser = $CI->session->username;
		$apipass = $CI->session->password;
		$credentials_arr = array();
		$credentials_arr['username'] = $apiuser;
		$credentials_arr['password'] = $apipass;
		return $credentials_arr;
	}
	
	
	function login_check()
	{
		$CI = & get_instance();
		if (!isset($_SESSION))
		session_start();
		
		if (  $CI->session->logged_in == 'yes' && $CI->session->username != '' && $CI->session->password != '')
		{
			// logged in...
			return true;
		}
		else
		{
			// unauthorized...
			if($CI->router->class != 'AdminLogin')
			{
				$_SESSION = array();
				@session_destroy();
				redirect('AdminLogin');
				exit;
			}
		}
	}
	function user_logincheck()
	{
		$CI = & get_instance();
		if (!isset($_SESSION))
		session_start();
		
		if (  $CI->session->userLoggedIn == 'yes')
		{
			// logged in...
			return true;
			// echo "its fine";
		}
		else
		{
			
			
				$_SESSION = array();
				@session_destroy();
				redirect('user/login');
				exit;
			
		}
	}

	
	function show_time_difference_from_timestamp($timestamp)
	{
		//Function by Ahmed ...
		//returns the verbal time that is past by until the timestamp , 
		
		//ammount of seconds ... 
		//60  3600  86400 2592000 31536000
		//min hour  day   month   year
		
		$secs = time()-strtotime($timestamp);
		
		if($secs<=20)
			$time_msg = 'just now';
		else if($secs < 60)
			$time_msg  = 'about '.floor($secs).' seconds ago';
		else if($secs < 3600)
			$time_msg  = 'about '.floor($secs/60).' mins ago';							
		else if($secs < 86400)
			$time_msg  = 'over '.floor($secs/(60*60)).' hours ago';
		else if($secs < 2592000)
			$time_msg  = 'over '.floor($secs/(60*60*24)).' days ago';
		else if($secs < 31104000)
			$time_msg  = 'over'.floor($secs/(60*60*24*30)).' months ago';
		else if($secs < 31536000)
			$time_msg  = 'about 1 year ago'; // just to handle the discrepency of 365 days AND 30*12 days issue
		else 
			$time_msg  = 'over '.floor($secs/(60*60*24*365)).' years ago';
				
		return $time_msg;
	}
	
	function create_job_label($job_status)
	{
		if($job_status == 'posted') 		echo '<div class="job_label open">Open Job</div>';
		if($job_status == 'assigned') 		echo '<div class="job_label assigned">Contract Assigned</div>';
		if($job_status == 'assigned_to_me')	echo '<div class="job_label assigned_to_me">Assigned to me</div>';
		if($job_status == 'completed')		echo '<div class="job_label completed">Job Finished</div>';
		if($job_status == 'cancelled')		echo '<div class="job_label cancelled">Cancelled</div>';
	}
	
	function create_proposal_label($proposal_status)
	{
		
		if($proposal_status == 'open') 				echo '<div class="proposal_label open">Open for proposals</div>';
		if($proposal_status == 'sent') 				echo '<div class="proposal_label sent">Proposal Already Sent</div>';
		if($proposal_status == 'closed')			echo '<div class="proposal_label closed">Closed for proposals</div>';
	}
	

	function show_flash_data()
	{
		$CI = & get_instance();
		$resp='';
		 if($CI->session->flashdata('alert_data'))
		 {
				$alert = $CI->session->flashdata('alert_data');
				$resp .= '<div class="alert alert-'.$alert['type'].'">';
				$resp .= ' <a class="close" data-dismiss="alert" aria-label="close">&times;</a>';
				$resp .= $alert['details'];
				$resp .= '</div>';
				
         }  
		 return $resp;
	}
	function in_hours($minutes) {
	    //floor($minutes / 60).':'.($minutes -   floor($minutes / 60) * 60);
	    if(!isset($minutes) || empty($minutes) || $minutes == null)
	    {
	    	return '00:00';
	    }
	    $h = ($minutes / 60);
	    $h = floor($h);
	    $m = $minutes -   floor($minutes / 60) *60;
	    if($h<10) {
	        $h = '0'.$h;
	    }
	    $m = floor($m);
	    if($m < 10) {
	        $m = '0'.$m;
	    }
	    $time = $h.':'.$m;
	    return $time;
	}

	function send_curl_by_post($req_url, $post_data)
	{
		$ch = curl_init($req_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

		$returnedData = curl_exec($ch);

		if ($returnedData === false)
		{
			$CI->errors['curl'] = 'curl error #' . curl_errno($ch) . ': ' . curl_error($ch);
			$log_msg = $CI->errors['curl'];
			//$CI->_defined_issues($log_msg, $file . LINE, 2);
			return FALSE;
			die();
		}

		curl_close($ch);
		return $returnedData;

	}
	if (! function_exists('currency')) {
		    function currency($input,$numberFormat = TRUE)
		    {
		        $ci = & get_instance();
		        $ci->load->database();
		        $var = $ci->session->userdata('set_currency');
		        // asign session data to var
		        if (isset($var)) {
		            // check to see thath we have somethink in session
		            $ci->db->select('*');
		            $ci->db->from('currencies');
		            // you need valid database and table
		            $ci->db->where('name', $var);
		            // column with name of the currency from database
		            $query 	= $ci->db->get();
		            $row 	= $query->row();
		            $rate 	= $row->rate;
		            $symbol = $row->symbol;
		            // column with rates from database
		        } else {
		            $rate = 1;
		            // default value for default currency
		        }
		        $total = (double) $input * (double) $rate;
		        if($numberFormat)
		         return $symbol.' '.number_format((double) $total, 2);
		     	else 
		         return $total;
		        // enough preccision for now, change if you want
		    }
		}
	
	//cms helper function
	function getParent($level,$parent_id)
	{
		if ($level == 0) {
			return "No Parent";
		}
		else {
			$CI =& get_instance();
			$CI->load->model('AdminModel');
			$record = $CI->AdminModel->getField('e_menu',array('menuid'=>$parent_id),'name');
			return $record;
		}
	}
	function getParentCat($level,$parent_id)
	{
		if ($level == 0) {
			return "No Parent";
		}
		else {
			$CI =& get_instance();
			$CI->load->model('AdminModel');
			$record = $CI->AdminModel->getField('e_category',array('cat_id'=>$parent_id),'name');
			return $record;
		}
	}
	function getParentOption($select_id)
	{
		$CI =& get_instance();
		$CI->load->model('AdminModel');
		$records = $CI->AdminModel->getRows('e_menu',array('level'=>'0'));
		$selected = "";
		foreach ($records as $row) 
		{
			if($row['menuid'] == $select_id) $selected= "selected";
			else $selected ="";
			echo "<option value=".$row['menuid']." ".$selected." >".$row['name']."</option>";
			
				$records2 = $CI->AdminModel->getRows('e_menu',array('parent_id'=>$row['menuid']));
				if ($records2)
				{
					foreach ($records2 as $row2)
					{
						if($row2['menuid'] == $select_id) $selected= "selected";
						else $selected ="";
						echo "<option value='sub-".$row2['menuid']."' ".$selected.">-- &nbsp;".$row2['name']."</option>";
					}
				}
				
			
		}
	}
	function getParentOptionCatAll($select_id)
	{
		$CI =& get_instance();
		$CI->load->model('AdminModel');
		$records = $CI->AdminModel->getRows('e_category',array('level'=>'0'));
		$selected = "";
		foreach ($records as $row) 
		{
			if($row['cat_id'] == $select_id) $selected= "selected";
			else $selected ="";
			echo "<option value=".$row['cat_id']." ".$selected." >".$row['name']."</option>";

			$records2 = $CI->AdminModel->getRows('e_category',array('parent_id'=>$row['cat_id']));
				if ($records2)
				{
					foreach ($records2 as $row2)
					{
						if($row2['cat_id'] == $select_id) $selected= "selected";
						else $selected ="";
						echo "<option value='".$row2['cat_id']."' ".$selected.">-- &nbsp;".$row2['name']."</option>";
					}
				}
	
		}

		
	}
	

	//////////////////generic function for get option
	function getOption($tableName,$value='id',$showValue='name',$select="",$cond=array(),$selectOption=FALSE)
	{
		$CI =& get_instance();
		$CI->load->model('AdminModel');
		$records2 = $CI->AdminModel->multiCondition($tableName,$cond);
		if ($records2)
		{
			if($selectOption) echo "<option value='' disabled selected>Select option</option>";
			foreach ($records2 as $row2)
			{
				if($row2[$value] == $select) $selected= "selected";
				else $selected ="";
				echo "<option value='".$row2[$value]."' ".$selected.">".$row2[$showValue]."</option>";
			}
		}
		else
			echo "<option value=''>No Options</option>";
	}
	///////////////generic function for get field
	function separator($arr,$field,$delimtr = ',')
	{
		if (!$arr) return "";
		$preparedArr = [];
		foreach ($arr as $row) {
			$preparedArr[] = $row[$field];
		}
		if(!$preparedArr) return "";
		else
		return implode($delimtr, $preparedArr);
	}
	function is_value_exist($tableName,$field_name,$field_value)
	{
		if($field_value == "") return false;
		$CI =& get_instance();
		$CI->load->model('AdminModel');
		return  $CI->AdminModel->checkExistFieldValue($tableName,array($field_name=>$field_value));

	}
	function getField($tableName,$cond = array(),$field)
	{
		$CI =& get_instance();
		$CI->load->model('AdminModel');
		return $records2 = $CI->AdminModel->getField($tableName,$cond,$field);
	}
	function getRow($tableName,$cond = array())
	{
		$CI =& get_instance();
		$CI->load->model('AdminModel');
		return $records2 = $CI->AdminModel->getRow($tableName,$cond);
	}
	function getData($table,$conditions = array(),$result = 'all')
	{
		$CI =& get_instance();
		$CI->load->model('AdminModel');
		return $records2 = $CI->AdminModel->multiCondition($table,$conditions,$result);
	}
	function multiCondition($table,$conditions = array(),$result = 'all')
	{
		$CI =& get_instance();
		$CI->load->model('AdminModel');
		return $records2 = $CI->AdminModel->multiCondition($table,$conditions,$result);
	}
	function countRows($tableName,$cond = array())
	{
		$CI =& get_instance();
		$CI->load->model('AdminModel');
		return $records2 = $CI->AdminModel->countRows($tableName,$cond);
	}
	 function getSumRows($tableName,$sumCol,$cond = array())
	{
		$CI =& get_instance();
		$CI->load->model('AdminModel');
		return $records2 = $CI->AdminModel->getSumRows($tableName,$sumCol,$cond);
	}
	###################site helper##################################
	function getNavMenu($controler,$function,$pageSlug = '')
	{
		$CI =& get_instance();
		$CI->load->model('SiteModel');
		$records = $CI->SiteModel->getMenuRows('e_menu',array('level'=>'0'));
		foreach ($records as $row)
		{
			extract($row);
			if (in_array('navigation',explode(',', $position)))
			{   
				if($row['slug'] == $pageSlug && $row['slug'] != "") $selected =' active ';
				else $selected = "";
			
					$records2 = $CI->SiteModel->getMenuRows('e_menu',array('parent_id'=>$row['menuid']));
				

				$add = "";
				if(!empty($records2)) 
				{
					$add = ' ';
					$li1Class = "  ";
				}
				else $add = $li1Class =  ""; 

				echo '<li  class="dropdown '.$selected.$li1Class.' ">
						<a   href="'.base_url().$slug.'">'.$name.$add.'  </a>';
              
				
				
				 echo   '</li>';
			}
		}
	}
	 function getNavMenu2($controler,$function,$pageSlug = '')
	{
		$CI =& get_instance();
		$CI->load->model('SiteModel');
		$records = $CI->SiteModel->getMenuRows('e_menu',array('level'=>'0'));
		foreach ($records as $row)
		{
			extract($row);
			if (in_array('navigation',explode(',', $position)))
			{   
				$mainSlug = 'pages';
				if($row['slug'] == 'shop' || $row['slug'] == 'Shop') $mainSlug = 'shop';
				$records2 = $CI->SiteModel->getMenuRows('e_category',array('menu'=>$menuid));
				$add = "";
				if(!empty($records2)){$add = '&nbsp;<span class="caret"></span>';$childClass ='menu-item-has-children';}
				else $add = $childClass = ""; 

				echo '<li class="'.$childClass.'">
						<a href="'.base_url().$slug.'">'.$name.$add.'</a>';

				if ($records2)
				{
					echo "<ul class='sub-menu'>";
					foreach ($records2 as $row2)
					{
						$records3 = $CI->SiteModel->getMenuRows('e_category',array('parent_id'=>$row2['cat_id']));
						if(!empty($records3)) $childClass2 ='menu-item-has-children';
							else $childClass2 = ""; 

							echo '<li class="'.$childClass2.'">
								<a href="'.base_url().$mainSlug.'/'.$row2['slug'].'">'.$row2['name'].'</a>';
						
						if ($records3)
						{
							echo "<ul class='sub-menu' style='min-height:252px'>";
							foreach ($records3 as $row3)
							{
								echo '<li >
									<a href="'.base_url().$mainSlug.'/'.$row3['slug'].'">'.$row3['name'].'</a>
	                     		</li>';					
							}
							echo "</ul>";
						}
						 echo   '</li>';					
					}
				  echo "</ul>";
				}
				 echo   '</li>';
			}
		}
	}

	##################################

	
	function status($status)
{
 
 if($status=='pending')
 {
 	return $result='badge badge-primary';
 }
 elseif ($status=='process') {
 	return $result='badge badge-warning';
 	
 }
 elseif ($status=='complete') {
 	return $result='badge badge-success';
 	
 }elseif ($status=='modify') {
 	return $result='badge badge-danger';
 }
 elseif ($status=='done') {
 	return $result='badge badge-success';
 }
}


	

}
