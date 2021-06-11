<?php

$id = ['{ "answer_id": "answer_id" ,"confirmation_id" : "confirmation_id","user_id" : "user_id",
              "type" : "common","contract_id" :"contract_id"}'];

    $plaintext = $id[0];
        $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
        $iv = openssl_random_pseudo_bytes($ivlen);
        $key = openssl_digest("21154144956921401", 'MD5', TRUE);
        $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
        $ciphertext = base64_encode($iv . $hmac . $ciphertext_raw);
        $urlEncodeCiphertext = urlencode($ciphertext);
echo $urlEncodeCiphertext;


?>