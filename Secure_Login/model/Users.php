<?php
include_once("model/User.php");

class Users {
	public function getUserList()
	{
		return array(
			"1" => new User("1","Jim Maguire", "19", "Male"),
			"2" => new User("2", "Hugh Maguire", "47", "Male"),
			"3" => new User("3", "Lisa Maguire", "47", "Female"),
			"4" => new User("4", "Liam Maguire", "16", "Male")
		);
	}// end function
	
	public function getUser($id)
	{
		$allUsers = $this->getUserList();
		return $allUsers[$id];
	}//end function
	
}//end class

?>