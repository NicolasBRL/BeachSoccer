<?php require 'db.php'; 

$stmt = $pdo->prepare("SELECT * FROM terrains");
$stmt->execute(); 
$terrains = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($terrains);