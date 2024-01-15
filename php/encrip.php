<?php 

    function encryptIt( $q ) {
        $ciphering_value = "AES-128-CTR";
        $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
        
        $qEncoded = openssl_encrypt($q,$ciphering_value,$cryptKey);
        return( $qEncoded );
    }
    
    function decryptIt( $q ) {
        $ciphering_value = "AES-128-CTR";
        $decryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
        
        $qDecoded = openssl_decrypt($q,$ciphering_value,$decryptKey);
        return( $qDecoded );
    }
?>