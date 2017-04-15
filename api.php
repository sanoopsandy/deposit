<?php
final class api{
    $OTP=000000
    
    private function __construct() {


    }

    private function decodeJSON(){


    }

    private function curlURL(){

$ch = curl_init("http://www.example.com/reallybigfile.tar.gz");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
$output = curl_exec($ch);
    	
    }

    private function getKYC($DATAtoGetKYC){
     
     /*
     Get kyc detail and sent it to validate ofr the user

     */

    }

    public function getMAPLocation($Current_location){
     // take current location to api and get coordinate to show nearest location
    }
 

}


?>