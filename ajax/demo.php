<?php
$demo = $_POST['userInput'];
if($demo == "ajax1234"){
    $response = json_encode(['passedValidation' => true]);
} else {
    $response = json_encode(['passedValidation' => false, 'desc' => 'Your username must be exactly: "ajax1234"!']);
}
echo $response;
?>

