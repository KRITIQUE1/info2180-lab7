<?php

$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'world';
$country = $_GET['country'];
$query2 = $_GET['all'];


$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$stmt = $conn->query("SELECT * FROM countries");
$stmt2 = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

if ($query2 == 'true'){
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
else 
{
    $results = $stmt2->fetchAll(PDO::FETCH_ASSOC);
}

echo '<ul>';
foreach ($results as $row) {
  echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
}
echo '</ul>';


?>