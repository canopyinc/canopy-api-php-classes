canopy-api-php-classes
======================

A full set of simple PHP classes for interacting with Canopy's API. 

## USAGE

### Auth.php Class:

Pass the following three variables as arguments to the get_auth_token_by_hash() method: 

```php
$username = 'your_username_goes_here';
$password = 'your_password_goes_here';
$system_realm = 'your_account_name_goes_here.canopyvoice.com';
```

To generate the auth token, simply create a new instance of the "Auth" class, passing in the arguments from above.

```php
/* Generating a new auth token */
$my_auth_token = new Auth;
$my_auth_token->get_auth_token_by_hash($system_realm,$username,$password);

/* Retrieve auth token from inside of the request result */
$auth_token = $my_auth_token->request_result->auth_token;
```

A full sample program to generate an auth token looks like this:

```php
<?php

require 'Auth.php';

$my_auth_token = new Auth;
$my_auth_token->get_auth_token_by_hash($system_realm,$username,$password);
$auth_token = $my_auth_token->request_result->auth_token;

?>
```

### Account.php Class: