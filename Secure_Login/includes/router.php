<?php
//Information on how the router sees the requests
class Router
{
	public function __construct()
	{
		
	}//end construct
	
	Static public function route()
	{
		include_once("controller/login/LoginController.php");
		
		$controller = new LoginController();
		$controller->invoke();
	}//end route
}//end class
?>