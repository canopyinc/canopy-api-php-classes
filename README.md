canopy-api-php-classes
======================

A full set of simple PHP classes for interacting with Canopy's API. 

## USAGE

### Auth.php Class:

Pass the following three variables as arguments to the method to generate an auth token: 
$username = 'your_username_goes_here';
$password = 'your_password_goes_here';
$system_realm = 'your_account_name_goes_here.canopyvoice.com';

/* Generating a new auth token */
$my_auth_token = new Auth;
$my_auth_token->get_auth_token_by_hash($system_realm,$username,$password);

/* Retrieve auth token from inside of the request result */
$auth_token = $my_auth_token->request_result->auth_token;

### Account.php Class: