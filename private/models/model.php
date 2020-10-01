<?php
// Model functions
// In dit bestand zet je ALLE functions die iets met data of de database doen

function getUserEmail() {
	$connection = dbConnect();
	$sql        = "SELECT * FROM `gebruikers` WHERE `email` = :email'";
	$statement  = $connection->query( $sql );

	return $statement->fetchAll();
}
