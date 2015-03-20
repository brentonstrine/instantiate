<?php
$email = $_POST['userInput'];

// do validation here

$response = json_encode(['passedValidation' => true]);

echo $response;

?>

