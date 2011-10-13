<?php

/*
  Created by unikat-media, 2011, unikatmedia.de.
 
  Special thanks fly out to Drew Johnston (drewjoh.com) for phpPaypal.php.
 
  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

  http://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License.

 */

 // Include phpPayPal class
 include 'phpPayPal.php';



// Include phpPayPal class
include 'phpPayPal.php';

// Create instance of the phpPayPal class
$paypal = new phpPayPal(array(
            'api_username' => '',
            'api_password' => '',
            'api_signature' => ''
                ), true);

 // Store the token and PayerID sent by PayPal
 $paypal->token = $_GET['token'];
 $paypal->payer_id = $_GET['PayerID'];
 
 // Transfer the money to the seller
 $paypal->do_express_checkout_payment();


 // If successful, we need to store the token, and then redirect the user to PayPal
 if ( !$paypal->_error && $paypal->get_transaction_details()) {
     
      /*
      * if ("COMPLETED" == $paypal->payment_status && ("SUCCESS" == $paypal->ack || "SUCCESSWITHWARNING" == $paypal->ack)) {
      * 
      *     Call additional functions
      * 
      * }
      */
     
 } else {
     // Print out error message
     print_r($paypal);
 }
 
?>