<?php
class User
{
	private $name;
	private $age;
	private $gender;
	
	public function __construct($id, $name, $age, $gender)
	{
		$this->id = $id;
		$this->name = $name;
		$this->age = $age;
		$this->gender = $gender;
	}//end constructor
	
	public function setId($id)
	{
		$this->id = $id;
	}//end function
	
	public function getId()
	{
		return $this->id;
	}//end function
	
	public function setName($name)
	{
		$this->name = $name;
	}//end function
	
	public function getName()
	{
		return $this->name;
	}//end function
	
	public function setAge($age)
	{
		$this->age = $age;
	}//end function
	
	public function getAge()
	{
		return $this->age;
	}//end function
	
	public function setGender($gender)
	{
		$this->gender = $gender;
	}//end function
	
	public function getGender()
	{
		return $this->gender;
	}//end function
	
}//end class
?>