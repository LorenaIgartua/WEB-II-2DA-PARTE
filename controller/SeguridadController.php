<?php
class SeguridadController extends Controller

	{
	function __construct()
		{
		session_start();
		if (isset($_SESSION['USER']))
			{
			if (time() - $_SESSION['LAST_ACTIVITY'] > 1000)
				{
				header('Location: ' . CERRARSESION);
				die();
				}

			$_SESSION['LAST_ACTIVITY'] = time();
			}
		  else
			{
			header('Location: ' . INICIOSESION);
			die();
			}
		}
	}

?>
