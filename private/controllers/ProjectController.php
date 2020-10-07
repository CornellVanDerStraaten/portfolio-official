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

class ProjectController
{
	public function addProjectStart()
	{
		
		$errors = [];

		$new_filename = validateFotoUpload($_FILES, $errors);
		insertProjectStart($_POST, $new_filename);

		$adminURL = site_url('/adminHome');
		redirect($adminURL);
	}
}
