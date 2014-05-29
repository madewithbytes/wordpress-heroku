<?php
/*///////////////////////////////////////////////////////////////////////
Part of the code from the book 
Building Findable Websites: Web Standards, SEO, and Beyond
by Aarron Walter (aarron@buildingfindablewebsites.com)
http://buildingfindablewebsites.com

Distrbuted under Creative Commons license
http://creativecommons.org/licenses/by-sa/3.0/us/
///////////////////////////////////////////////////////////////////////*/


function storeAddress(){
	if(!$_GET['email']){ 
		$response = array('text' => "No email address provided", 'success' => 0);
		return json_encode($response);
	} 

	if (!(filter_var($_GET['email'], FILTER_VALIDATE_EMAIL))){
		$response = array('text' => "Email address is invalid", 'success' => 0);
		return json_encode($response); 
	}

	require_once('MCAPI.class.php');
	// grab an API Key from http://admin.mailchimp.com/account/api/
	$api = new MCAPI('b5d25814cf773313016d92011a5b5264-us2');
	
	// grab your List's Unique Id by going to http://admin.mailchimp.com/lists/
	// Click the "settings" link for the list - the Unique Id is at the bottom of that page. 
	//$list_id = "d172e7da71";
	$list_id = '7bafb69bf5';
	
	if($api->listSubscribe($list_id, $_GET['email'], '') === true) {
		// It worked!
		$response = array('text' => "<legend>Thank you!</legend><p>Check your email to confirm your subscription.</p>", 'success' => 1);	
		return json_encode($response);
	}else{
		// An error ocurred, return error message
		$response = array('text' => 'Error: ' . $api->errorMessage, 'success' => 0);	
		return json_encode($response);
	}
	
}

// If being called via ajax, autorun the function
if($_GET['ajax']){ echo storeAddress(); }
?>
