<?php
/*///////////////////////////////////////////////////////////////////////
Part of the code from the book 
Building Findable Websites: Web Standards, SEO, and Beyond
by Aarron Walter (aarron@buildingfindablewebsites.com)
http://buildingfindablewebsites.com

Distrbuted under Creative Commons license
http://creativecommons.org/licenses/by-sa/3.0/us/
///////////////////////////////////////////////////////////////////////*/


function emailAddress(){
	
	// Validation
	if(!$_GET['email']){ 
		return "wrong"; 
	} 

	if (filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)){
		return "right"; 
	}else{
		return "wrong";
	}
}

// If being called via ajax, autorun the function
if($_GET['ajax']){ echo emailAddress(); }

?>
