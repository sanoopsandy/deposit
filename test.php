<?php

 /**
  * This PHP file uses the Slim Framework to construct a REST API.
  * See Cloudant.php for the database functionality
  */

require 'vendor/autoload.php';
require_once('./Cloudant.php');
$app = new \Slim\Slim();
$dotenv = new Dotenv\Dotenv(__DIR__);
$client_id = "saurabh.hello@yahoo.com";
$participant_code = "2RMD5ACS";
$accountNo = "4444777755551185";
$customerId = "33336185";
$authUrl = "https://corporateapiprojectwar.mybluemix.net/corporate_banking/mybank/authenticate_client?client_id=$client_id&password=$participant_code";
$participantUrl = "https://retailbanking.mybluemix.net/banking/icicibank/participantmapping?client_id=$client_id";
$output = file_get_contents($authUrl);
echo "<pre>";
$token = json_decode($output)[0]->token;

// bank summary
// $bankSummaryUrl = "https://retailbanking.mybluemix.net/banking/icicibank/account_summary?client_id=$client_id&token=$token&custid=$customerId&accountno=$accountNo";
// $output = file_get_contents($bankSummaryUrl);

// balance enquiry
// $balanceEnquiry = "https://retailbanking.mybluemix.net/banking/icicibank/balanceenquiry?client_id=$client_id&token=$token&accountno=$accountNo";
// $balanceResponse = file_get_contents($balanceEnquiry);

// Customer behaviour
// $customerBehaviourUrl = "https://retailbanking.mybluemix.net/banking/icicibank/behaviour_score?client_id=$client_id&token=$token&accountno=$accountNo";
// $output = file_get_contents($customerBehaviourUrl);


// ATM location
$locationUrl = "https://retailbanking.mybluemix.net/banking/icicibank/BranchAtmLocator?client_id=$client_id&token=$token&locate=ATM&lat=72.9376984&long=19.1445007";
$output = file_get_contents($locationUrl);

// Participant Response
// $output = file_get_contents($participantUrl);

echo $output;
?>