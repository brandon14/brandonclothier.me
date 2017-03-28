<?php
define('EMAIL_ADDRESS', 'brandon14125@gmail.com');

$gResult = array('responseType' => 'ERROR',
                 'response'     => 'Man something broke bad!');

if($_SERVER['REQUEST_METHOD'] === "POST") {
  $gName = isset($_POST['name']) ? strip_tags(trim($_POST['name'])) : 'No Name';
  $gEmail = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : null;
  $gMessage = isset($_POST['message']) ? trim($_POST['message']) : 'No message';

  //TODO: Spruce up the automated email
  if ($gEmail && filter_var($gEmail, FILTER_VALIDATE_EMAIL)) {
    $gEmailContent = "<strong>Name:</strong> $gName<br/>
                      <strong>Email:</strong> $gEmail<br/>
                      <strong>Date:</strong> ".date('F jS, Y').' at '.date('h:i:s A T')."<br/>
                      <br/>
                      <strong>Message:</strong><br/>
                      $gMessage";

    $gSubject = "Contact message from $gName.";
    $gEmailHeaders = "From: $gName <$gEmail>\r\n";
    $gEmailHeaders .= "Content-type: text/html\r\n";

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

echo json_encode($gResult);
