<?php
include ("model/login/User.php");

class Users {
	
	public function __construct() {
		
	}
	
	public function login($user) {
		$inputUsername = $user->getUsername();
		$inputPassword = $user->getPassword();
		
		include ("includes/connection.php");
		try {
			$sql = 'SELECT COUNT(*) FROM user WHERE
					userName = :username AND loginPassword = :password';
			$s = $pdo->prepare($sql);
			$s->bindValue(':username', $inputUsername);
			$s->bindValue(':password', $inputPassword);
			$s->execute();
		}
		catch (PDOException $e) {
			
		}
		
		$row = $s->fetch();
		
		if ($row[0] > 0) {
			return true;
		}
		else {
			return false;
		}
	}
}
?>