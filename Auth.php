<?php

class Auth {
    
    var $request_result;
    
    function get_auth_token_by_hash($system_realm,$username,$password) {
      
    $user_creds = ''.$username.':'.$password.'';
    $user_creds_to_hash = md5($user_creds);
    $data = '{"data":{"credentials": "' . $user_creds_to_hash . '","realm": "' . $system_realm . '"}}';
                                                                                                                                          
    $ch = curl_init('http://' . $system_realm . ':8000/v2/user_auth'); //the URI to call                                                                     
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");                                                                    
          curl_setopt($ch, CURLOPT_POSTFIELDS, $data);                                                                 
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                     
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(  
          'Content-Length: '.strlen($data),                                                              
          'Content-Type: application/json'                                                                   
          ));                                                                                                                  

    $result = curl_exec($ch);
    $result_json_decoded = json_decode($result);
    
    return $this->request_result = $result_json_decoded;
  
    }  
}

?>
