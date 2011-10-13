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

// Create instance of the phpPayPal class
$paypal = new phpPayPal(array(
            'api_username' => '',
            'api_password' => '',
            'api_signature' => ''
                ), true);

// Set your local currency code
$paypal->currency_code = 'EUR';

// Set the total amount for this order
// This may calculated dynamicly by using variables 
$paypal->amount_total = '15';

// You can manually set the return and cancel URLs, or keep the one's pre-set in the class definition
$paypal->return_url = 'http://www.example.com/success.php';
$paypal->cancel_url = 'http://www.example.com/failed.php';

// $paypal->add_item('ItemName', 'ItemNumber', 'ItemQuantity', 'ItemTaxAmount', 'ItemPrice');
$paypal->add_item('SampleItem', 100, 1, 0, 15);

// Make the request
$paypal->set_express_checkout();

// If successful, we need to store the token, and then redirect the user to PayPal
if ( !$paypal->_error ) {
    
    // Store your token
    $_SESSION['token'] = $paypal->token;
    
    // Now go to PayPal
    $paypal->set_express_checkout_successful_redirect();
    
} else {
    // Print out error message
    print_r($paypal);
}
?>