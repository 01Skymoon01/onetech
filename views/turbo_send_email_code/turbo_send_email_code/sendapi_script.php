<?php

require_once "lib/TurboApiClient.php";


$email = new Email();


$email->setFrom("onetech.admin@onetech.tn");
$email->setToList("nour.khedher@esprit.tn", "nour.khedher@esprit.tn");
$email->setCcList("dd@domain.com,ee@domain.com");
$email->setBccList("ffi@domain.com,rr@domain.com");
$email->setSubject("Inscreption lab");
$email->setContent("");
$email->setHtmlContent("<p>they is a new user </p><p>.Lab.Onetech</p>");




$turboApiClient = new TurboApiClient("nour.khedher@esprit.tn", "pHQg0W0I");


$response = $turboApiClient->sendEmail($email);

var_dump($response);
?>
