<?php
define('EMAIL_ADDRESS', 'brandon14125@gmail.com');

$gResult = array('responseType' => 'ERROR',
                 'response'     => 'Man something broke bad!');

if($_SERVER['REQUEST_METHOD'] === "POST") {
  $gName = isset($_POST['name']) ? strip_tags(trim($_POST['name'])) : 'No Name';
  $gEmail = isset($_POST['email']) ? filter_var(trim($_POST['emai']), FILTER_SANITIZE_EMAIL) : null;
  $gMessage = isset($_POST['email']) ? trim($_POST['message']) : 'No message';

  if ($gEmail && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $gEmailContent = "Name: $gName\nEmail: $gEmail\nMessage: $gMessage";
    $gSubject = "Contact message from $gName.";
    $gEmailHeaders = "From: $gName <$gEmail>";

    if (mail(EMAIL_ADDRESS, $gSubject, $gEmailContent, $gEmailHeaders)) {
      $gResult['responseType'] = 'SUCCESS';
      $gResult['response'] = 'Your message was successfully sent!';
    } else {
      $gResult['responseType'] = 'SERVER_ERROR';
      $gResult['response'] = 'Oops! I broke something and couldn\'t send your message!';
    }
  } else {
    $gResult['responseType'] = 'BAD_EMAIL_ADDRESS';
    $gResult['response'] = 'Oh man I don\'t think I can send this email!';
  }
} else {
  $gResult['responseType'] = 'NO_POST';
  $gResult['response'] = 'Yo! You didn\'t use the POST method!';
}

echo json_encode($gResult, JSON_HEX_QUOT | JSON_HEX_TAG);
?>
