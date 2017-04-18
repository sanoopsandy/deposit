<?php

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

// $OTP=000000
print_r($token);

/*Token*/
function geToken($clientID, $participant_code){

$authUrl = "https://corporateapiprojectwar.mybluemix.net/corporate_banking/mybank/authenticate_client?client_id=$clientID&password=$participant_code";

 $output = file_get_contents($authUrl);

 $token = json_decode($output)[0]->token;
 return $token;
}

// bank summary
function getBankSummary($client_id,$token,$customerId,$accountNo){

$bankSummaryUrl = "https://retailbanking.mybluemix.net/banking/icicibank/account_summary?client_id=$client_id&token=$token&custid=$customerId&accountno=$accountNo";
$output = file_get_contents($bankSummaryUrl);

return $output;
}


// balance enquiry
function getBalanceEnquiry($client_id,$token,$accountNo){
$balanceEnquiry = "https://retailbanking.mybluemix.net/banking/icicibank/balanceenquiry?client_id=$client_id&token=$token&accountno=$accountNo";
$balanceResponse = file_get_contents($balanceEnquiry);
}

//Customer Behavior
function getBalanceEnquiry($client_id,$token,$accountNo){
// Customer behaviour
$customerBehaviourUrl = "https://retailbanking.mybluemix.net/banking/icicibank/behaviour_score?client_id=$client_id&token=$token&accountno=$accountNo";
$output = file_get_contents($customerBehaviourUrl);
}


function getKYC($DATAtoGetKYC){
     
     /*
     Get kyc detail and sent it to validate ofr the user

     */

}

function getMAPLocation($Current_location){
     // take current location to api and get coordinate to show nearest location
}
 

}


?>