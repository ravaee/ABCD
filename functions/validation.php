<?php 

function validationRequired($items) {

    $status = ['STATUS' => 'SUCCESS', 'COMMENT' => '', 'ERRORS' => [] ];
    // $errors = array();
    foreach ( $items as $key=>$value) {
        $value = trim($value);
        // if( empty($value) ){ // validating by regix
        if( strlen($value) == 0 ){ // validating by regix
            $status['STATUS'] = 'ERROR';
            $status['ERRORS'][] = $key . " is required. " ;
            // array_push($errors, $key . ' is required. ');
        }
    }
    // $status['ERRORS'] = $errors;
    return $status;
}

function validationEmail($email) {
    return filter_var($email , FILTER_VALIDATE_EMAIL);
}