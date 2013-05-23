<?php 
include_once("model/Users.php");

class UserController
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
		if (!isset($_GET['id']))
		{
			//no special user is requested, we'll show a list of all available users
			$this->template = 'view/loginFormTemplate.php';
			$users = $this->model->getUserList();
			include_once('view/UsersView.php');
			//create a new view and pass it our template
			
			$view = new UsersView($this->template);
			
			//show the users list
			$content = "";
			foreach($users as $name => $user)
			{
				$content = $content . '<tr><td><a href="' . SITE_ROOT . '/index.php?location=page2&action=view&id=' . $user->getId() . '">' . $user->getName() . '</a></td><td>' . $user->getAge() . '</td><td>' .$user->getGender() . '</td></tr>';
			}
			
			$view->assign('title', 'Users Details');
			$view->assign('content', $content);
		}//end else
		
		else
		{
			$this->template = 'view/UserTemplate.php';
			$user = $this->model->getUser($_GET['id']);
			include_once('view/UserView.php');
			//create a new view and pass it our template
			
			$view = new UserView($this->template, $this_>header, $this->footer, $this->nav);
			
			//show the requested user
			$content = "";
			$content = 'Name:' . $user->getName() . '<br/>';
			$content = $content . 'Age:' . $user->getAge() . '<br/>';
			$content = $content . 'Gender:' . $user->getGender() . '<br/>';
			
			$view->assign('title', 'user Details');
			$view->assign('content', $content);
		}//end else	
	}//end function
}//end class

?>