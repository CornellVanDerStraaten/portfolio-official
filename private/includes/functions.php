<?php
// Dit bestand hoort bij de router, enb bevat nog een aantal extra functiesdie je kunt gebruiken
// Lees meer: https://github.com/skipperbent/simple-php-router#helper-functions
require_once __DIR__ . '/route_helpers.php';

// Hieronder kun je al je eigen functies toevoegen die je nodig hebt
// Maar... alle functies die gegevens ophalen uit de database horen in het Model PHP bestand

/**
 * Verbinding maken met de database
 * @return \PDO
 */
function dbConnect()
{

	$config = get_config('DB');

	try {
		$dsn = 'mysql:host=' . $config['HOSTNAME'] . ';dbname=' . $config['DATABASE'] . ';charset=utf8';

		$connection = new PDO($dsn, $config['USER'], $config['PASSWORD']);
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

		return $connection;
	} catch (\PDOException $e) {
		echo 'Fout bij maken van database verbinding: ' . $e->getMessage();
		exit;
	}
}

/**
 * Geeft de juiste URL terug: relatief aan de website root url
 * Bijvoorbeeld voor de homepage: echo url('/');
 *
 * @param $path
 *
 * @return string
 */
function site_url($path = '')
{
	return get_config('BASE_URL') . $path;
}

function get_config($name)
{
	$config = require __DIR__ . '/config.php';
	$name   = strtoupper($name);

	if (isset($config[$name])) {
		return $config[$name];
	}

	throw new \InvalidArgumentException('Er bestaat geen instelling met de key: ' . $name);
}

/**
 * Hier maken we de template engine en vertellen de template engine waar de templates/views staan
 * @return \League\Plates\Engine
 */
function get_template_engine()
{

	$templates_path = get_config('PRIVATE') . '/views';

	return new League\Plates\Engine($templates_path);
}

/**
 * Geef de naam (name) van de route aan deze functie, en de functie geeft
 * terug of dat de route is waar je nu bent
 *
 * @param $name
 *
 * @return bool
 */
function current_route_is($name)
{
	$route = request()->getLoadedRoute();

	if ($route) {
		return $route->hasName($name);
	}

	return false;
}

function isSessionStarted()
{
	if (!isset($_SESSION)) {
		session_start();
	}
}

function validateLogIn($data)
{
	$errors = [];

	$email      = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
	$password = trim($data['password']);

	if ($email === false) {
		$errors['email'] = 'Not a valid e-mail address.';
	}

	if (empty($password)) {
		$errors['password'] = 'Not a valid password!';
	}
	$data = [
		'email' => $data['email'],
		'password' => $password
	];

	return [
		'data' => $data,
		'errors' => $errors
	];
}

function validateFotoUpload($myfile, $errors)
{

	// Check if file was uploaded
	if (!isset($_FILES['project_image'])) {
		$errors['myfile'] = "No file uploaded.";

		$template_engine = get_template_engine();
		echo $template_engine->render('adminHome', ['errors' => $errors]);
		exit;
	}

	//  Checken van upload fouten
	$file_error = $myfile['project_image']['error'];
	switch ($file_error) {
		case UPLOAD_ERR_OK:
			break;
		case UPLOAD_ERR_NO_FILE:
			$errors['myfile'] = 'No file uploaded.';
			break;
		case UPLOAD_ERR_CANT_WRITE:
			$errors['myfile'] = 'Could not write to disk.';
			break;
		case UPLOAD_ERR_INI_SIZE:
		case UPLOAD_ERR_FORM_SIZE:
			$errors['myfile'] = 'File size too big.';
			break;
		default:
			$errors['myfile'] = 'Unknown error';
	}

	if (count($errors) === 0) {

		$file_name = $myfile['project_image']['name'];
		$file_size = $myfile['project_image']['size'];
		$file_tmp = $myfile['project_image']['tmp_name'];
		$file_type = $myfile['project_image']['type'];

		// Is it an image check 
		$valid_image_types = [
			2 => 'jpg',
			3 => 'png'
		];
		$image_type        = exif_imagetype($file_tmp);
		if ($image_type !== false) {
			// Find correct extension for the new filename
			$file_extension = $valid_image_types[$image_type];
		} else {
			$errors['myfile'] = 'This is not an image';
		}
	}
	if (count($errors) === 0) {

		// Generate filename
		$new_filename   = sha1_file($file_tmp) . '.' . $file_extension;
		$final_filename = 'uploads/' . $new_filename;

		// Move to temporary position
		move_uploaded_file($file_tmp, $final_filename); // Move to correct folder

		return $new_filename;
	}
}

function processArticleInfo($postData)
{
	$article_title  = $postData['article_name'];
	$today			= date("j F, Y");

	// Change cat ID's from form into actual names
	$categories		= getAllCats();

	// Got actual Cat Id's from form
	$postCategories = [];

	foreach ($categories as $row) {
		if (isset($postData['article_categories_id'][$row['id']])) {
			array_push($postCategories, $row['id']);
		}
	}

	$categoryNames = catIdToStrings($postCategories, $categories);

	$article_info = [
		'title' => $article_title,
		'date'	=> $today,
		'cats'	=> $categoryNames
	];

	return $article_info;
}

/**
 * Does like title suggest
 *  
 * input = array with cat ID's & getAllCats()
 * 
 * output = array with cat names
 */
function catIdToStrings($postCategories, $categorieInfo)
{
	$catNames = [];

	foreach ($postCategories as $postCatRow) {
		// Loop for every cat in POST
		foreach ($categorieInfo as $catRow) {
			// Loop for every row in DB
			if ($postCatRow == $catRow['id']) {
				array_push($catNames, $catRow['category_name']);
			}
		}
	}
	return $catNames;
}
