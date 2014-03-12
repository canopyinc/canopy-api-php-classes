<?php

class Cdr {
    
    var $request_result;


    function get_all($system_realm,$account_id,$auth_token) {
                                                                           
    $ch = curl_init('http://' . $system_realm . ':8000/v2/accounts/' . $account_id . '/cdrs');                                                                    
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

    
    function get($system_realm,$account_id,$cdr_id,$auth_token) {
                                                                           
    $ch = curl_init('http://' . $system_realm . ':8000/v2/accounts/' . $account_id . '/cdrs/' . $cdr_id);                                                                    
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
    
    
}

?>