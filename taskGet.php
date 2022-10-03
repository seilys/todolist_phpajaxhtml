<?php

$dsn='mysql:host=' . $_SERVER['HOST'] . ';dbname=' . $_ENV['DB'];
$conn = new PDO($dsn, $_ENV['USER'], $_ENV['PASWORD']);

$query = $conn->prepare('SELECT * FROM tareas');
$query->execute();

$result = $query->fetchAll(PDO::FETCH_ASSOC);

$ret = [];
foreach($result as $row) {
    $ret[] = ['id' => $row['id'], 'description' => $row['description'], 'tag' => $row['tag']];
}

echo json_encode($ret);