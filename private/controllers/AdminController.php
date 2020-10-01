<?php

namespace Website\Controllers;

/**
 * 
 *
 * Deze handelt de logica van de homepage af
 * Haalt gegevens uit de "model" laag van de website (de gegevens)
 * Geeft de gegevens aan de "view" laag (HTML template) om weer te geven
 *
 */

class AdminController
{
	public function admin()
	{
		if (isset($_SESSION)) {
			$template_engine = get_template_engine();
			echo $template_engine->render('adminHome');
		} else {
			$template_engine = get_template_engine();
			echo $template_engine->render('adminLogIn');
		}
	}

	public function adminLogIn()
	{
		$result = validate($_POST);

		if (count($result['errors']) === 0) {
			// Check if email exists
			$statement = userRegisteredCheck($result['data']['email']);
			if (!$statement->rowCount() === 0 ) {
				// Uitvoeren wanneer email al bekend is
				$userInfo = $statement->fetch();

				if (password_verify($result['data']['wachtwoord'], $userInfo['wachtwoord'])) {
					$_SESSION['user_id'] = $userInfo['id'];

					$overviewURL = url('overview');
					redirect($overviewURL);
				} else {
					$result['errors']['wachtwoord'] = 'Onjuist wachtwoord, probeer overnieuw.';
				}
			}
		} else {
			$result['errors']['wrong'] = 'Wrong password or unknown e-mail address.';
		}

		$template_engine = get_template_engine();
		echo $template_engine->render('adminLogIn', ['errors' => $result['errors']]);
	}
}
