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
	public function addProjectContent()
	{	
		$errors = [];

		$new_filename = validateFotoUpload($_FILES, $errors);
		$basic_project_info = ['post_info' => $_POST, 'filename' => $new_filename];
		

		$template_engine = get_template_engine();
		echo $template_engine->render('adminAddProjectContent', ['basic_project_info' => $basic_project_info]);
	}

	public function insertProject() {
		insertProject($_POST);

		$overviewURL = url('home');
		redirect($overviewURL);
	}
	
	public function toProjectPage($project_id) {
		$project_info = getProject($project_id);

		$template_engine = get_template_engine();
		echo $template_engine->render('projectDetailPage', ['project_info' => $project_info]);
	}

	// JWT setup for tinyDrive
	public function jwt() 
	{
		
		$template_engine = get_template_engine();
		echo $template_engine->render('jwt');
	}
}
