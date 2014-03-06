canopy-api-php-classes
======================

A full set of simple PHP classes for interacting with Canopy's API. For more info, see the [full API reference docs at 
Canopy](http://canopyvoice.com/docs/api.php).

## USAGE

### Auth.php Class:

To generate the auth token, simply create a new instance of the "Auth" class, passing the following three variables as arguments 
to the get_auth_token_by_hash() method: 

```php
$username = 'your_username_goes_here';
$password = 'your_password_goes_here';
$system_realm = 'your_account_name_goes_here.canopyvoice.com';
```

```php
/* Generating a new auth token */
$my_auth_token = new Auth;
$my_auth_token->get_auth_token_by_hash($system_realm,$username,$password);

/* Retrieve auth token from the returned request result */
$auth_token = $my_auth_token->request_result->auth_token;
```

A full sample program to generate an auth token looks like this:

```php
<?php

require 'Auth.php';

$username = 'your_username_goes_here';
$password = 'your_password_goes_here';
$system_realm = 'your_account_name_goes_here.canopyvoice.com';

$my_auth_token = new Auth;
$my_auth_token->get_auth_token_by_hash($system_realm,$username,$password);
$auth_token = $my_auth_token->request_result->auth_token;

?>
```

If the request was successful, the "request_result" property returned by the object looks like this:

```
{
    "auth_token":"093820cs88509389048320df89234038",
    "status":"success",
    "data":{"account_id":"032qfd09re90584905030s3249028099"}
}
```

The entire request result is returned, allowing you to easily retrieve any object from within the
response, such as the "auth_token" or the "account_id" (to get the account_id, use request_result->data->account_id). For more 
information about the error and status codes, visit the [full API reference docs at Canopy](http://canopyvoice.com/docs/api.php).

### Account.php Class: