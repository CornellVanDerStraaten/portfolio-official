<?php
// Model functions
// In dit bestand zet je ALLE functions die iets met data of de database doen

function userRegisteredCheck($email) {
	$connection = dbConnect();
    $sql =  'SELECT * FROM `config` WHERE `email`= :email';
    $statement = $connection->prepare($sql);
    $statement->execute(['email' => $email]);
	
	return $statement;
}

function insertProjectStart($postData, $filename) {
    $connection = dbConnect();

    $sql = 'INSERT INTO `projecten` (`project_naam`, `keywords`, `project_image`)
            VALUES (:project_naam, :keywords, :project_image) ';
    $statement = $connection->prepare($sql);

    $params = [
        'project_naam'  => $postData['project_naam'],
        'keywords'      => $postData['project_keywords'],
        'project_image' => $filename
    ];
    $statement->execute($params);
}

function getProjects() {
    $connection = dbConnect();
    $sql = 'SELECT * FROM `projecten` ';
    $statement = $connection->prepare($sql);
    $statement->execute();
    
    return $statement;
}