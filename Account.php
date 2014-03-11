<?php

class Account {
    
    var $request_result;
    
    
    function put($system_realm,$parent_account_id,$data,$auth_token) {    
                                                                                 
    $ch = curl_init('http://' . $system_realm . ':8000/v2/accounts/' . $parent_account_id);                                                                      
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");                                                                    
          curl_setopt($ch, CURLOPT_POSTFIELDS, $data);                                                                 
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                     
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(  
          'X-Auth-Token: '.$auth_token,
          'Content-Length: '.strlen($data),                                                              
          'Content-Type: application/json'                                                                   
          ));                                                                                                                  

    $result = curl_exec($ch);
    $result_json_decoded = json_decode($result);
  
    return $this->request_result = $result_json_decoded;
    }


    function get($system_realm,$account_id,$auth_token) {
                                                                           
    $ch = curl_init('http://' . $system_realm . ':8000/v2/accounts/' . $account_id);                                                                    
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                                                                                   
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                     
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(  
          'X-Auth-Token: '.$auth_token,                                                             
          'Content-Type: application/json'                                                                   
          ));                                                                                                                  

    $result = curl_exec($ch);
    $result_json_decoded = json_decode($result);
    
    return $this->request_result = $result_json_decoded;
    }


    function delete($system_realm,$account_id,$auth_token) {
        
    $ch = curl_init('http://' . $system_realm . ':8000/v2/accounts/' . $account_id);                                                                    
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");                                                                                                                                   
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                     
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(  
          'X-Auth-Token: '.$auth_token,                                                             
          'Content-Type: application/json'                                                                   
          ));                                                                                                                  

    $result = curl_exec($ch);
    $result_json_decoded = json_decode($result);
    
    return $this->request_result = $result_json_decoded;        
    }

    
    function update($system_realm,$account_id,$data,$auth_token) {    
                                                                                 
    $ch = curl_init('http://' . $system_realm . ':8000/v2/accounts/' . $account_id);                                                                      
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                    
          curl_setopt($ch, CURLOPT_POSTFIELDS, $data);                                                                 
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                     
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(  
          'X-Auth-Token: '.$auth_token,
          'Content-Length: '.strlen($data),                                                              
          'Content-Type: application/json'                                                                   
          ));                                                                                                                  

    $result = curl_exec($ch);
    $result_json_decoded = json_decode($result);
  
    return $this->request_result = $result_json_decoded;
    }
    
}

?>