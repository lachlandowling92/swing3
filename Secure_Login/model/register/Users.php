<?php
include ("model/register/User.php");

class RegisterUsers {
	
	public function __construct() {
		
	}
	
	public function register($registerUser) {
		$inputUsername = $registerUser->getUsername();
		$inputEmail = $registerUser->getEmail();
		$inputPassword = $registerUser->getPassword();
		
		include ("includes/connection.php");
		try {
			
			//insert owner data into act table
			$sql = "INSERT INTO user SET
			userName = :username,
			email = :email,
			loginPassword = :password
			";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':username', $inputUsername);
			$stmt->bindParam(':email', $inputEmail);
			$stmt->bindParam(':password', $inputPassword);
			$stmt->execute();
		}
		catch (PDOException $e) {
			return $e;
		}
		
		return null;
	}
}
?>