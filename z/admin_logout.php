<?php
session_start();

			if (isset($_SESSION['admin']))
			{
				unset($_SESSION['admin']);
				echo "<script>alert('logout');</script>";
				header('Location: home.php');
				if (isset($_SESSION['user']))
				{
					unset($_SESSION['user']);
				}
			}

?>