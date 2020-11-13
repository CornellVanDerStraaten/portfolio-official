<?php

namespace Website\Controllers;

/**
 * 
 *
 * Deze handelt de logica van de projectpage af
 * Haalt gegevens uit de "model" laag van de website (de gegevens)
 * Geeft de gegevens aan de "view" laag (HTML template) om weer te geven
 *
 */

class ProjectController
{
	/**
	 * Uses information from admin add Project form to create a template page
	 * where the project content can now be added.
	 */
	public function addProjectContent()
	{	
		$errors = [];

		$new_filename = validateFotoUpload($_FILES, $errors);
		$basic_project_info = ['post_info' => $_POST, 'filename' => $new_filename];
		

		$template_engine = get_template_engine();
		echo $template_engine->render('adminAddProjectContent', ['basic_project_info' => $basic_project_info]);
	}
	/**
	 * Insert project into DB
	 */
	public function insertProject() {
		insertProject($_POST);

		$overviewURL = url('home');
		redirect($overviewURL);
	}
	
	/**
	 * Get project data from db, then fill the project page template.
	 * Data can then be modified.
	 */
	public function ToModifyProjectPage() {
		$project = getProject($_POST['modify_project']);

		$template_engine = get_template_engine();
		echo $template_engine->render('modifyProject', ['project_info' => $project]);
	}
	
	/**
	 * Update modified project in db
	 */
	public function modifyProject() {
		modifyProject($_POST);
		
		$overviewURL = url('home');
		redirect($overviewURL);
	}

	public function adminDeleteProject() {
		deleteProject($_POST['delete_project_id']);
		
		$overviewURL = url('home');
		redirect($overviewURL);
	}

	/**
	 * Get db data where project id, then render page
	 */
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
