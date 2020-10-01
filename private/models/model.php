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
