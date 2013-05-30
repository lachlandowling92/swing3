<?php
class RegisterUser {
	private $username;
	private $email;
	private $password;
	//private $accessLevel;
	
	public function __construct($username, $email, $password) {
		$this->username = $username;
		$this->password = $password;
		$this->email = $email;
		
	} 
	
	public function getUsername() {
		return $this->username;
	}
	
	public function setUsername($username) {
		$this->username = $username;
	}
	
		public function getEmail() {
		return $this->email;
	}
	
	public function setEmail($email) {
		$this->email = $email;
	}
	
	public function getPassword() {
		return $this->password;
	}
	
	public function setPassword($password) {
		$this->password = $password;
	}
	
		public function getConfirmPassword() {
		return $this->confirmPassword;
	}
	
	public function setconfirmPassword($confirmPassword) {
		$this->confirmPpassword = $confirmPassword;
	}
}//end class
?>