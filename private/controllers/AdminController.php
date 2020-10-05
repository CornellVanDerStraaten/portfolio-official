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
	public function adminLogInPage()
	{

		// If already logged in, go directly to dashboard
		if (isset($_SESSION['user_id'])) {
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

					$adminURL = site_url('/adminDashboard');
					echo $adminURL;
					redirect($adminURL);
				} else {
					$result['errors']['wachtwoord'] = 'Wrong password, try again.';
				}
			}
		} else {
			$result['errors']['wrong'] = 'Wrong password or unknown e-mail address.';
		}

		$template_engine = get_template_engine();
		echo $template_engine->render('adminLogIn', ['errors' => $result['errors']]);
	}

	public function adminDashboard() {
		session_start();
		if( isset($_SESSION['user_id']) ) {
			$template_engine = get_template_engine();
			echo $template_engine->render('adminHome');
		} else {
			$adminURL = url('adminLogInPage');
			redirect($adminURL);
		}

		
	}
}
