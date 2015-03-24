<?php

	define ("INDEX_PATH", "http://astaldo.noip.me:13001/");
	$success = session_start();

	if ($success){

		try {

			$bdd = new PDO('mysql:host=localhost;dbname=amigo', 'waxa', 'topami123');

		} catch(Exception $e) {

			die('Error : '.$e->getMessage());

		}

		$user = filter_input(INPUT_POST,"user",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$pass = filter_input(INPUT_POST,"pass",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$confPass = filter_input(INPUT_POST,"conf-pass",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$friend = filter_input(INPUT_POST,"friend",FILTER_SANITIZE_FULL_SPECIAL_CHARS);

		if ($user && $pass && $confPass && $friend){

			if ($pass != $confPass){

				header("Location:" . INDEX_PATH . "?code=4");

			} else {

				$select = $bdd->query('SELECT * FROM Usuario ORDER BY user');
				$found = false;

				while (($respuesta = $select->fetch()) && !$found) {

					if ($respuesta["user"] == $user && $respuesta["pass"] == $pass){

						$found = true;

					}
				}

				if ($found){

					$select = $bdd->query('SELECT id FROM Amigo WHERE id = "' . $user . '"');

					if ($select->rowCount() == 0){

						$req = $bdd->prepare('INSERT INTO Amigo (id, friend) VALUES (?, ?)');
						$req->execute(array($user, $friend));


						header("Location:" . INDEX_PATH . "?code=0");

					} else {

						header("Location:" . INDEX_PATH . "?code=1");

					}

				} else {

					header("Location:" . INDEX_PATH . "?code=2");

				}
			}

		} else {

			header("Location:" . INDEX_PATH . "?code=3");

		}
	}
	
	exit();

?>