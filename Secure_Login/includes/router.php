<?php
//Information on how the router sees the requests
class Router
{
	public function __construct()
	{
		
	}//end construct
	
	Static public function route()
	{
		//fetch the passed request
		$request = $_SERVER['QUERY_STRING'];
		
		//parse the page request and other GET variables
		$parsed = explode('&', $request);
		
		//the location is the first element
		$location = array_shift($parsed);
		
		$page = explode('=', $location);
		
		//the rest of the array are get statements, parse them out
		$getVars = array();
		
		foreach($parsed as $argument)
		{
			//explode GET vars along '=' symbol to separate variable, values
			list($variable, $value) = explode('=' , $argument);
			$getVars[$variable] = $value;
		}//endforeach
		
		if(isset($page[1]))
		{
			if($page[1] == "page1")
			{
				echo "The page you requested is '$page[1]' Get a list of all persons";
				echo '<br />';
				$vars = print_r($getVars, TRUE);
				echo "The following GET vars were passed to the page: <pre>" . $vars . "</pre>";
				
				include_once("controller/UserController.php");
				
				$controller = new UserController();
				$controller->invoke();
			}//end if
			else if($page[1] == "page2")
			{
				echo "The page you requested is '$page[1]' Get details of a user with id of " . $_GET['id'];
				echo '<br/>';
				$vars = print_r($getVars, TRUE);
				echo "The following GET vars were passed to the page:<pre>" . $vars . "</pre>";
				
				include_once("controller/UserController.php");
				
				$controller = new UserController();
				$controller->invoke();
			}//end else if
			else if($_GET['location'] == "page4")
			{
				//echo "The page you requested is $_GET['location'] ";
				echo '<br/>';
				$vars = print_r($getVars, TRUE);
				echo "The following GET vars were passed to the page:<pre>" . $vars . "</pre>";
				
				include_once("controller/RegisterController.php");
				
				$controller = new RegisterController();
				$controller->invoke();
			}//end else if
		}//end if
		else
		{
			include_once("controller/UserController.php");
			
			$controller = new UserController();
			$controller->invoke();
		}//end else
	}//end route
}//end class
?>