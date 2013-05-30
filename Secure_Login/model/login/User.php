<?php
class User {
	private $username;
	private $email;
	private $password;
	private $accessLevel;
	
	public function __construct($username, $password) {
		$this->username = $username;
		$this->password = $password;
	} 
	
	public function getUsername() {
		return $this->username;
	}
	
	public function setUsername($username) {
		$this->username = $username;
	}
	
	public function getPassword() {
		return $this->password;
	}
	
	public function setPassword($password) {
		$this->password = $password;
	}
}//end class
?>