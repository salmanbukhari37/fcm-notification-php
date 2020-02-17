<?php
define('SERVER_KEY', 'AIzaSyC-Kc2zl5FjdD8pZ7Ryw5pxVWZHrpqIuqo');

$token = ['f2b2YNVPUNFIkqF74g_VqL:APA91bEmofo6tLGLZh9acGdcm1ITun7mTfoX9jM9o1LbSt16VLC8BeRTw0Vr3ZUADTn59CrSEX9SO8ZwKi3T_M6v8urUfu0vYlTr9ne5gluCpRI8Eas0XpBSzK1erTjyGqQ9u2pkUDQc'];

$header = array(
    'Authorization: key=' . SERVER_KEY,
    'Content-Type: application/json'
);

$message = array(
    'title' => 'My First Notification',
    'body'  => 'Notification from FredFrog',
    'icon'  => 'favicon.ico',
    'image' => 'https://linkclip.in/logo.png',
    'click_action' => 'https://linkclip.in/signup.php'
);

$payload = array (
    'registration_ids'  => $token,
    'data'              => $message
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode( $payload ),
  CURLOPT_HTTPHEADER => $header
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
