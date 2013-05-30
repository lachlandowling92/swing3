<?php 
include('model/register/Users.php');

class RegisterController
{
	private $model;
	private $template;
	private $header;
	private $footer;
	private $nav;
	
	public function __construct()
	{
		$this->model = new RegisterUsers();
		$this->header = 'includes/header.php';
		$this->footer= 'includes/footer.php';
		$this->nav = 'includes/nav.php';
	}//end constructor
	
	public function invoke()
	{
	ECHO "INVOKED";
		if(isset($_SESSION['userLoggedin']))
		{
			include_once("controller/home/homeController.php");
			$controller = new HomeController();
			$controller->invoke();
		} 
		else
		{
			if(isset($_POST['registerSubmit']))
			{
				if (isset($_GET['register'])) 
				{
					if($_POST['password'] == $_POST['confirmPassword'])
					{
						$registerUser = new RegisterUser($_POST['username'], $_POST['email'], $_POST['password']);
						$data = $_POST['username']. $_POST['password'];
						if ($this->model->register($registerUser)) 
						{
							$data = 'Registration Successful';
							
							include_once("controller/login/loginController.php");
							$controller = new HomeController();
							$controller->invoke();
							/*include_once("controller/login/LoginController.php");
							$controller = new LoginController();
							$controller->invoke();	*/
						}
						else 
						{
							$data = 'Registration Unsuccessful';
							include_once 'view/register/registerView.php';
							$this->template =  'view/register/registerTemplate.html';
							$registerView = new RegisterView($this->template, $this->header, $this->footer, $this->nav);
							$registerView->assign($data);
						}
												
					}
					else
					{
						$data = 'Passwords do not match, please enter again';
							include_once 'view/register/registerView.php';
							$this->template =  'view/register/registerTemplate.html';
							$registerView = new RegisterView($this->template, $this->header, $this->footer, $this->nav);
							$registerView->assign($data);
					}
				}
			}
			else if(isset($_POST['cancelButton']))
			{
				include_once("controller/login/LoginController.php");
				$controller = new LoginController();
				$controller->invoke();	
			}
			else
			{
				$data = $_POST;
				include_once 'view/register/registerView.php';
				$registerView = new RegisterView('view/register/registerTemplate.html', $this->header, $this->footer, $this->nav);
						$registerView->assign($data);
			}						
		}
	}
}//end class