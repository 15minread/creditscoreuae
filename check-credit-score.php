<?php

// Get the user's Emirates ID number
$EID = $_POST['EID'];

// Check the credit score from AECB
$url = 'https://aecb.gov.ae/api/v1/credit-score/' . $EID;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Decode the JSON response
$data = json_decode($response, true);

// Check if the request was successful
if ($data['success']) {
  // Get the credit score
  $creditScore = $data['creditScore'];

  // Display the credit score to the user
  echo '<h1>Your credit score is: ' . $creditScore . '</h1>';
} else {
  // Display an error message
  echo '<h1>Error: ' . $data['message'] . '</h1>';
}

?>
