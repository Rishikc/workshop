<?php  
  
  $host="localhost";
  $user="root";
  $pass="";
  $db="delta";
 
  $dbc = mysqli_connect($host,$user,$pass,$db)
  or die('error connecting to mysql server');

  $name = mysqli_escape_string($dbc,$_POST['name']);
  $mobile=mysqli_escape_string($dbc,$_POST['mobile']);
  $coll=mysqli_escape_string($dbc,$_POST['coll']);
  $email=mysqli_escape_string($dbc,$_POST['email']);

$secret_key="ttjdikjn59aa2q7mz4lb88w4lna7wywprao96ysla6nzf90w9o"; 
		$api_key="jqf8314utrhyp60kh0a7trqnqu665ky8v1sd51a8nnrig6iebl";   
		$api_url="http://thecollegefever.com/tcfwebapi/api/thecollegefever_api.php"; 
		$pageURL = 'http';
		$pageURL.= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
		  $pageURL.= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
		  $pageURL.= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		} 
		
		$data = array(                         
			"secret_key"=>$secret_key,
			"api_key"=>$api_key,
			"client_id"=>"3vTzyh", 
			"task"=>"make_payment",                      
	        "user_name"=>$name,                          
	        // User name                       
		    "user_uid"=>$name,                           
		    // User Unique ID Number                      
		    "user_email"=>$email,                         
		    // User Email Address (to get Ticket)
		    "user_contact_number"=>$mobile,                
		    // User Contact Number
		    "user_gender"=>"",                        
		    // User Gender              
		    "user_college_name"=>$coll,                  
		    // User Collge Name              
		    "user_pursuing_year"=>"",                 
		    // User Pursuing Year
		    "user_address"=>"",                       
		    // User Address
		    "user_event_registered"=>"Rolling Reels",              
		    // User registered event(Example :General Fees,Accomodation)
		    "user_event_charge"=>"",                  
		    // Per Event charge (Example : 1,2)             
		    "user_event_total_amount"=>"1",            
		    // Total Charge (Example: 3)
		    "user_acomdation_status"=>"Pending",             
		    // User Accomdation Status
		    "user_arrival_date"=>"",                  
		    // User Arrival Date              
		    "user_departure_date"=>"",                
		    // User Departure Date
		    "event_logo"=>"http://thecollegefever.com/tcfwebapi/images/logo.png",                         
		    // Event Logo        
		    "event_admin_email"=>"admin.test@test.com",                  
		    // Event admin email (to get user notification Ticket)        
		    "event_name"=>"Rolling Reels",                         
		    // Event Name
		    "event_college_name"=>"Nit trichy",                 
		    // Event College Name
		    "event_address"=>"Nit trichy",                      
		    // Event Address    
                   "event_date"=>"2015-07-14",                      
		    // Set Event Date
                   "orgnaniser_details"=>"Orgnaniser details",                      
		    // Orgnaniser Details
		    "url_origin"=>$pageURL
	    );
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $api_url,
			CURLOPT_USERAGENT => 'Curl Request for making payment',
			CURLOPT_POST => 1,
			CURLOPT_POSTFIELDS =>$data
		));
		$response = curl_exec($curl);
		echo $response;

mysqli_close($dbc);

          
echo 'you have successfully submitted :)';
  	
?>