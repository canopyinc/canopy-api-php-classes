<?php

require 'Auth.php';
require 'Accounts.php';

/* Globals are the variables that will always need to be available to make API calls to Canopy */
$username = 'your_username_goes_here';
$password = 'your_password_goes_here';
$system_realm = 'your_account_name_goes_here.canopyvoice.com';


################################## GenerateAuthToken Class #####################################

/* Generating auth tokens to authenticate*/
$my_auth_token = new Auth;
$my_auth_token->get_auth_token_by_hash($system_realm,$username,$password);

//retrieving auth token from inside of request result
$auth_token = $my_auth_token->request_result->auth_token;

//print auth_token from inside of request result
print_r($my_auth_token->request_result->auth_token);

echo'<br />';

//print account_id used (i.e. your account) to create auth token from inside of request result
print_r($my_auth_token->request_result->data->account_id);

##############################################################################################


?>