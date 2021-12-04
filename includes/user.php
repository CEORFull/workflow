<?php 
include_once 'conexion.php';

class User extends conexion{

	private $username;
	private $rol;

	public function userExists($user, $pass)
	{
		$query = $this->conectar()->prepare('SELECT * FROM usuario WHERE User = :user AND Contrasena = :pass');
		$query->execute(['user'=>$user, 'pass'=>$pass]);

		if($query->rowCount())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function setUser($user)
	{
		$query = $this->conectar()->prepare('SELECT * FROM usuario WHERE User = :user');
		$query->execute(['user'=>$user]);

		foreach ($query as $currentUser) 
		{
			$this->username = $currentUser['User'];
			$this->rol = $currentUser['Rol'];
		}
	}

	public function getUser()
	{
		return $this->username;
	}

	public function getRol()
	{
		return $this->rol;
	}

	public function tieneTramite($user)
	{
		$query = $this->conectar()->prepare('SELECT * FROM usuario x, tramite y WHERE x.User = :user AND y.Startuser = x.User');
		$query->execute(['user'=>$user]);

		if($query->rowCount())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function getProceso($user)
	{
		$query = $this->conectar()->prepare('SELECT * FROM usuario x, tramite y WHERE x.User = :user AND y.Startuser = x.User');
		$query->execute(['user'=>$user]);

		foreach ($query as $currentUser) 
		{
			$tramiteActual = $currentUser['CodProceso'];
		}
		return $tramiteActual;
	}

	public function getFlujo($user)
	{
		$query = $this->conectar()->prepare('SELECT * FROM usuario x, tramite y WHERE x.User = :user AND y.Startuser = x.User');
		$query->execute(['user'=>$user]);

		foreach ($query as $currentUser) 
		{
			$tramiteActual = $currentUser['CodFlujo'];
		}
		return $tramiteActual;
	}
}

 ?>