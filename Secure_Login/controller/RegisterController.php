<?php 
include_once("model/Users.php");

class RegisterController
{
	private $model;
	private $template;
	private $header;
	private $footer;
	private $nav;
	private $login;
	
	public function __construct()
	{
		$this->model = new Users();
		$this->header = 'includes/header.php';
		$this->footer= 'includes/footer.php';
		$this->nav = 'includes/nav.php';
	
	}//end constructor
	
	public function invoke()
	{
			//no special user is requested, we'll show a list of all available users
			$this->template = 'view/RegisterTemplate.php';
			$users = $this->model->getUserList();
			include_once('view/RegisterView.php');
			//create a new view and pass it our template
			
			$view = new RegisterView($this->template, $this->header, $this->footer, $this->nav);
			
			//show the users list
			$content = "";
			foreach($users as $name => $user)
			{
				$content = $content . '<tr><td><a href="' . SITE_ROOT . '/index.php?location=page4&action=view&id=' . $user->getId() . '">' . $user->getName() . '</a></td><td>' . $user->getAge() . '</td><td>' .$user->getGender() . '</td></tr>';
			}
			
			$view->assign('title', 'Users Details');
			$view->assign('content', $content);
	}//end function
}//end class

?>