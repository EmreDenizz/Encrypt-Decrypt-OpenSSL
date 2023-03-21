<?php

$output_string = false;

// Set action value 
$action = "Encrypt";

// Set input string value
$input_string = "test_string";

// Encryption method
$encrypt_method = "AES-256-CBC";

// Set these secret values on your codebase
$secret_key = 'XXXXXXXXXXXXXXXX';
$secret_iv = 'XXXXXXXXXXXXXXXX';

$key = hash('sha256', $secret_key);
$iv = substr(hash('sha256', $secret_iv), 0, 16);

// Encrypt string
if ($action === "Encrypt") {
    $output_string = openssl_encrypt($input_string, $encrypt_method, $key, 0, $iv);
    $output_string = base64_encode($output_string);
}
// Decrypt string
else if ($action === "Decrypt") {
    $output_string = openssl_decrypt(base64_decode($input_string), $encrypt_method, $key, 0, $iv);
}

// Print output string
var_dump($output_string);

exit;

?>
