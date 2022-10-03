<?php

$dsn='mysql:host=' . $_SERVER['HOST'] . ';dbname=' . $_ENV['DB'];
$conn = new PDO($dsn, $_ENV['USER'], $_ENV['PASWORD']);

$data = [
    ':description' => $_POST['description'],
    ':tag' => json_encode($_POST['tag'])
];

$query = "INSERT INTO tareas (description, tag) VALUES(:description, :tag)";
$statement = $conn->prepare($query);

try {
    if ($statement->execute($data))
        echo 'todo bien';
} catch(PDOException $e) {
    echo $e->getMessage();
}