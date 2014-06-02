canopy-api-php-classes
======================

A full set of simple PHP classes for interacting with Canopy's REST API. For more info, see the [full API reference docs at 
Canopy](http://canopyvoice.com/resources/api/).

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

If the request was successful, the "request_result" property returned by the object looks like this:

```
{
    "auth_token":"093820cs88509389048320df89234038",
    "status":"success",
    "data":{"account_id":"510900d5c3b578b585a2ec47100f7665"}
}
```

The entire request result is returned, allowing you to easily retrieve any object from within the
response, such as the "auth_token" or the "account_id" (to get the account_id, use request_result->data->account_id). For more 
information about the error and status codes, visit the [full API reference docs at Canopy](http://canopyvoice.com/resources/api/
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

### Account.php Class:

A sample program to "GET" an account's data (assumes you've already populated ```$auth_token``` with an authentication token and
```$system_realm``` with your SIP realm name!):

```php
<?php

require 'Auth.php';
require 'Account.php';

$account_id = '510900d5c3b578b585a2ec47100f7665'; //the account_id of the account you wish to retrieve
$my_account_details = new Account;
$my_account_details->get($system_realm,$account_id,$auth_token);

$account_details = $my_account_details->request_result; //retrieve the whole request result
$account_details = $my_account_details->request_result->data->name; //or retrieve the account name, etc.

?>
```

Please note that only those with reseller accounts will be able to "PUT" (create) or "DELETE" accounts. Normal accounts can only
get their account's data or update (POST) their account's data. If you are interested in having a reseller account, call us 
at (303) 653-9473 or send an email to sales@canopyvoice.com

If you are making a new account (or updating an existing one) you'll have to pass a ```$data``` argument to the method. This 
provides the data that will be used to create or update the new account. An example ```$data``` payload can be found below (for a
full list of parameters, see the [ API reference docs at Canopy](http://canopyvoice.com/resources/api/)):

```php
<?php

data = '{
        "data": { 
            "caller_id": { 
                "external": { 
                    "name": "Canopy",
                    "number": "+13036539473"
                },
                "internal": { 
                    "name": "Canopy",
                    "number": "+13036539473"
               }
            },
            "name": "newaccountname_goes_here",
            "realm": "newaccountname_goes_here.canopyvoice.com",
            "available_apps" : [
                "userportal", 
                "voip",
                "developer",
                "numbers"
             ]
        }
}';

?>
```

This is just a basic introduction to using these classes with Canopy's API. To read the full API reference documentation, [go here](http://canopyvoice.com/resources/api/).
