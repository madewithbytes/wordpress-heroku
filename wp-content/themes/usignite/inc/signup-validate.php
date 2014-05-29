<?php	

function testEmail($string)
{
	$tempErr = "";
	
	if (strlen($string) < 1)
	{
		$err = "No email address provided.";
		return $err;
	}

	if (!(filter_var($_GET['email'], FILTER_VALIDATE_EMAIL))){
		$err = "Email address is invalid";
		return $err; 
	}
}

function sanitizeForHTML(){
	$_SESSION['email'] = htmlentities($_SESSION['email']);	
	$_SESSION['email'] = htmlspecialchars($_SESSION['email']);
}
	
	

/////////////////////////////////

session_start();

$_SESSION['email'] = $_GET["email"];
$_SESSION['err'] = "";
$_SESSION['thanks'] = "Thank you! Check your email to confirm your subscription.";
$_SESSION['previous'] = "messageTest";

sanitizeForHTML();

$err = "";

////// Test email

$_SESSION['err'] = testEmail($_SESSION['email']);

if(strlen($_SESSION['err']) > 0)
{
	header("Location: /?page_id=37");
}
else
{
	require_once('MCAPI.class.php');
	// grab an API Key from http://admin.mailchimp.com/account/api/
	$api = new MCAPI('b5d25814cf773313016d92011a5b5264-us2');

	// grab your List's Unique Id by going to http://admin.mailchimp.com/lists/
	// Click the "settings" link for the list - the Unique Id is at the bottom of that page. 
	$list_id = "d172e7da71";

	if($api->listSubscribe($list_id, $_GET['email'], '') === true) {
		// It worked!
		$_SESSION['err'] = "";
		header("Location: /?page_id=37");

		$_SESSION['email'] = "";
		
	}else{
		// An error ocurred, return error message
		echo 'Error: ' . $api->errorMessage;
	}
}


?>
