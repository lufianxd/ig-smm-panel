<?php

$project_name = "SmartPanel - SMM panel Tool";
$php_version_success = false;
$mysql_success = false;
$curl_success = false;
$gd_success = false;
$allow_url_fopen_success = false;
$allow_install_success = false;
$php_version_required = "5.6.0";
$current_php_version = PHP_VERSION;

//check required php version
if (version_compare($current_php_version, $php_version_required) >= 0) {
    $php_version_success = true;
}

//check mySql 
if (function_exists("mysqli_connect")) {
    $mysql_success = true;
}

//check curl 
if (function_exists("curl_version")) {
    $curl_success = true;
}

//check gd
if (extension_loaded('gd') && function_exists('gd_info')) {
    $gd_success = true;
}



//check allow_url_fopen
if (ini_get('allow_url_fopen')) {
    $allow_url_fopen_success = true;
}

//check if all requirement is success
if ($php_version_success && $mysql_success && $curl_success && $gd_success && $allow_url_fopen_success) {
    $all_requirement_success = true;
} else {
    $all_requirement_success = false;
}


$writeable_directories = array(
    'config' => '/app/config.php',
    'index'  => '/index.php',
    // 'install'  => '/install/instal/',
);

foreach ($writeable_directories as $value) {
    if (!is_writeable(".." . $value)) {
        $all_requirement_success = false;
    }
}

$dashboard_url = $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];
$dashboard_url = preg_replace('/install.*/', '', $dashboard_url); //remove everything after index.php
if (!empty($_SERVER['HTTPS'])) {
    $dashboard_url = 'https://' . $dashboard_url;
} else {
    $dashboard_url = 'http://' . $dashboard_url;
}

if ( ! function_exists('tz_list')){
    function tz_list() {
        $zones_array = array();
        $timestamp = time();
        foreach(timezone_identifiers_list() as $key => $zone) {
            date_default_timezone_set($zone);
            $zones_array[$key]['zone'] = $zone;
            $zones_array[$key]['diff_from_GMT'] = 'UTC/GMT ' . date('P', $timestamp);
        }
        return $zones_array;
    }
}

include "view/index.php";
?>