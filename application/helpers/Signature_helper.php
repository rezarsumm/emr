<?php defined('BASEPATH') OR exit('No direct script access allowed');

function generate_signature($data, $secretKey) {
    // Computes the timestamp
    date_default_timezone_set('UTC');
    $tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));

    // Computes the signature by hashing the data with the secret key
    $signature = hash_hmac('sha256', $data . "&" . $tStamp, $secretKey, true);

    // Base64 encode the signature
    $encodedSignature = base64_encode($signature);

    return [
        'X-cons-id' => $data,
        'X-timestamp' => $tStamp,
        'X-signature' => $encodedSignature
    ];
}

?>