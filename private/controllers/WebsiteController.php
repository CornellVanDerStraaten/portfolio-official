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

class WebsiteController {
	public function home() {

		$project_list = getProjects();
		$template_engine = get_template_engine();
		echo $template_engine->render('homepage',[ 'projecten' => $project_list]);

	}
	
	public function logOut() {
		session_start();
		session_destroy();

		$template_engine = get_template_engine();
		echo $template_engine->render('homepage');
	}


}

