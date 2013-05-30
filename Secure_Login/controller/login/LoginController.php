<?php 
include('model/login/Users.php');

class LoginController
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
		if(session_id() == '') 
		{
			session_start();
		}
		if(isset($_SESSION['userLoggedin']))
		{
			/*$data = "";
			include_once 'view/home/homeView.php';
			$homeView = new HomeView('view/home/home.html', $this->header, $this->footer, $this->nav);
			*/
			include_once("controller/home/homeController.php");
				$controller = new HomeController();
				$controller->invoke();
		} 
		else
		{
			if(isset($_POST['loginSubmit']))
			{
				if (isset($_GET['login'])) {
					$loginUser = new User($_POST['username'], $_POST['password']);
					if ($this->model->login($loginUser)) {
						$_SESSION['userLoggedin'] = 'YES'; 	
						$_SESSION['username'] = $_POST['username']; 	
						$data = 'Login Successful' . $_SESSION['userLoggedin'] . $_SESSION['username'];
						include_once 'view/login/loginResult.php';
						$this->template =  'view/login/loginResultTemplate.html';
						$loginResult = new LoginResult($this->template, $this->header, $this->footer, $this->nav);
						$loginResult->assign($data);	
					}
					else {
							$data = 'Login Unsuccessful';
							include_once 'view/login/loginView.php';
							$this->template =  'view/login/loginFormTemplate.php';
							$loginView = new LoginView($this->template, $this->header, $this->footer, $this->nav);
							$loginView->assign($data);
					}
				}
			}	
			else if(isset($_GET['register'])){
				include_once("controller/register/RegisterController.php");
				$controller = new RegisterController();
				$controller->invoke();
			}
			else{
				$data = "";
				include_once 'view/login/loginView.php';
				$loginView = new LoginView('view/login/loginFormTemplate.html', $this->header, $this->footer, $this->nav);
			}
		}
	}
}//end class