<?php
if (!function_exists('pr')) {
    function pr($data, $type = 0) {
        print '<pre>';
        print_r($data);
        print '</pre>';
        if ($type != 0) {
            exit();
        }
    }
}


function verify_purchase_code($code) {
    $code = urlencode($code);
    $website = str_replace("install/", "", $_SERVER['HTTP_REFERER']);
    $api_endpoint = "https://api.tuyennguyen.ml/license/"; 
    $url = $api_endpoint . "verify?" . http_build_query(array( 
        "purchase_code" => $code, 
        "domain"        => urlencode($_SERVER['HTTP_HOST']), 
        "website"       => urlencode($website), 
        "app"           => urlencode('smartpanel'), 
    )); 
    $result = curl($url);
    if(!empty($result)){
        return json_decode($result);
    }else{
        echo json_encode(array("success" => false, "message" => "There was some request. Please try again"));
        exit();
    }

}

function curl($url){ 
    $ch = curl_init(); curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_VERBOSE, 1); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_AUTOREFERER, false); 
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1); 
    curl_setopt($ch, CURLOPT_HEADER, 0); 
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
    curl_setopt($ch, CURLOPT_TIMEOUT, 60); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch); 
    curl_close($ch); 
    return $result; 
} 