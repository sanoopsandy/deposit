<?php

require 'vendor/autoload.php';
require_once('./Cloudant.php');
require_once('./sag/Sag.php');


$DB_NOT_FOUND = "CouchDB Error: not_found (missing)";
$services_json = json_decode(getenv('VCAP_SERVICES'),true);
$VcapSvs = $services_json["cloudantNoSQLDB"][0]["credentials"];
$myUsername = "82b4c353-746b-4261-ae02-dc817b9449e0-bluemix";
$myPassword = "772f08e7f77fc30cc805483567f6842750bd5d18a6e39cd8f14f710ad73743fe";
$sag = new Sag($myUsername . ".cloudant.com");
$sag->login($myUsername, $myPassword);

// Now that we are logged in, we can create a database to use
$sag->setDatabase("user_otp");

$rand = rand(100000,999999);
$body = array();
$body['otp'] = $rand;
$bodyJson = json_encode($body);
try {
  $resp = $sag->get('otp3')->body;
	$resp->otp = $rand;
	$resp = $sag->put('otp3', $resp);
} catch (Exception $e) {
  if ($e->getMessage() == $DB_NOT_FOUND) {
  	$resp = $sag->put('otp3', $bodyJson);
  }
}
echo $bodyJson;

?>


