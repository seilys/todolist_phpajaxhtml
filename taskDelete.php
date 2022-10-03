<?php

$dsn='mysql:host=' . $_SERVER['HOST'] . ';dbname=' . $_ENV['DB'];
$conn = new PDO($dsn, $_ENV['USER'], $_ENV['PASWORD']);

$id = $_POST['id'];

$sql = "DELETE FROM tareas WHERE id = ?";
$stmt= $conn->prepare($sql);
$stmt->execute([$id]);