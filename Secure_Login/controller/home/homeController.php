<?php 
include('model/Users.php');

class HomeController
{
	private $model;
	private $template;
	private $header;
	private $footer;
	private $nav;
	
	public function __construct()
	{
		$this->model = new Users();
		$this->header = 'includes/header.php';
		$this->footer= 'includes/footer.php';
		$this->nav = 'includes/nav.php';
	}//end constructor
	
	public function invoke()
	{
		if(isset($_GET['logout']))
			{
				$_SESSION = array();
				session_destroy();
				include_once("controller/login/LoginController.php");
				$controller = new LoginController();
				$controller->invoke();
			}
		else
		{
			include_once 'view/home/homeView.php';
			$homeView = new HomeView('view/home/homeTemplate.html', $this->header, $this->footer, $this->nav);
		}
	}
}