 <?php 
        $paramId = htmlspecialchars($_GET["id"]);
        $c = base64_decode( $paramId );
        $ivlen = openssl_cipher_iv_length( $cipher = 'AES-128-CBC' );
        $iv = substr( $c, 0, $ivlen );
        $key = openssl_digest( '21154144956921401', 'MD5', TRUE );
        $hmac = substr( $c, $ivlen, $sha2len = 32 );
        $ciphertext_raw = substr( $c, $ivlen + $sha2len );
        $original_plaintext = openssl_decrypt( $ciphertext_raw, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv );
        $calcmac = hash_hmac( 'sha256', $ciphertext_raw, $key, $as_binary = true );
        $paramData = json_decode( $original_plaintext );  

        if ( $paramData != null ) {
        echo '<h1>answer_id :'.$paramData->answer_id.'</h1>';
        echo '<h1>confirmation_id :'.$paramData->confirmation_id.'</h1>';
        echo '<h1>user_id :'.$paramData->user_id.'</h1>';
        echo '<h1>type :'.$paramData->type.'</h1>';
        echo '<h1>contract_id :'.$paramData->contract_id.'</h1>';
        }
?>