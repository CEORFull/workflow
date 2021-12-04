<?php 
	
	include_once 'includes/user.php';
	include_once 'includes/user_session.php';

	$userSession = new UserSession();
	$user = new User();

	if(isset($_SESSION['user']))
	{
		$user->setUser($userSession->getCurrentUser());
	}
	else if(isset($_POST['username']) && isset($_POST['password']))
	{
		$userForm = $_POST['username'];
		$passForm = $_POST['password'];

		if($user->userExists($userForm, $passForm))
		{
			$userSession->setCurrentUser($userForm);
			$user->setUser($userForm);

			
			if($user->getRol() == 'po')
			{
				if ($user->tieneTramite($userForm))
				{

					$flujo = $user->getFlujo($userForm);
					$proceso = $user->getProceso($userForm);
					header('location: vistas/home.php?codflujo='.$flujo.'&codproceso='.$proceso.'&usuario='.$userForm);
				}
				else
				{
					header('location: vistas/home.php?codflujo=F1&codproceso=P1&usuario='.$userForm);
				}
				
			}
			else
			{
				header('location: vistas/homeAdmin.php?codflujo=F1&codproceso=P4&usuario='.$userForm);
			}

		}
		else
		{
			$errorLogin = "Datos Incorrectos";
			include_once 'vistas/login.php';
		}
	}
	else
	{
		include_once 'vistas/login.php';
	}

 ?>