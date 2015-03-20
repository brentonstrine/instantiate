<?php
$dob = strtotime($_POST['userInput']);
$dobCutoff = strtotime('now -21 year');
if($dob < $dobCutoff){
    $response = json_encode(['passedValidation' => true]);
} else {
    $response = json_encode(['passedValidation' => false, 'desc' => 'You must be over 21 years old to register.']);
}

echo $response;

?>