<?php

// Infos connexion base de donnée
$host_name = 'localhost';
$database = 'beachsoccer';
$user_name = 'root';
$password = '';

try {
	$pdo = new PDO("mysql:host=$host_name;dbname=$database", $user_name, $password);
	$pdo->exec("set names utf8mb4");
} catch (PDOException $e) {
	// Affiche une erreur si il y'a un problème de connexion.
	echo "Error: ".$e->getMessage();
}
