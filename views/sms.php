<?php
$key = "6c8f177f-8f0d-4ef1-9c4b-3f93dbf23e98";
$secret = "dijltWNmpUua9e/bZ+t07w==";
$phone_number = "+21695164507";

$user = "application\\" . $key . ":" . $secret;
$message = array("message"=>"Alerte Stock,Consulter Dashboard Admin.");
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
echo "<script>
alert('Sms Envoyé(s)');
window.location.href='Afficher_admins.php';
</script>";
?>
