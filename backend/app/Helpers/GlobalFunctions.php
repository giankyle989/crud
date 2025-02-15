<?php

function handleSuccess($data = null, $message = 'Success'){
    $status_code = 200;

    $response = ['data' => $data, 'message' => $message];

    return response($response, $status_code)->header('Content-Type', 'text/json');
}

function handleError($data = null, $message = 'Failed', $error_code = null){
    $status_code = 400;

    $response = ['data' => $data, 'message' => $message];

    if($error_code){
        $status_code = $error_code;
    }

    return response($response, $status_code)->header('Content-Type', 'text/json');
}