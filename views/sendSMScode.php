<?php 
 
 
 
$key = "874f1ef2-7833-4787-99be-6869d7089367";
$secret = "6tN792S3AEmGnfqhfTcssg==";
$phone_number = $_POST['num'];

$user = "application\\" . $key . ":" . $secret;
$message = array("message"=> $_POST['message']);
$data = json_encode($message);
$ch = curl_init('https://messagingapi.sinch.com/v1/sms/' . $phone_number);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_USERPWD,$user);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

$result = curl_exec($ch);

if(curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    echo $result;
}

curl_close($ch);




?>