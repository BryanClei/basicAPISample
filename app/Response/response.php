<?php

namespace App\Response;

class Response {

    const STATUS_OK = 200;
    const STATUS_CREATED = 201;

    const DELETE_SUCCESS = "Delete Succesfully";
    const RESTORE_SUCCESS = "Restore Succesfully";

    const CREATED_USER = "User Created Successfully";

    public static function response($message, $status_code, $data = NULL){
        return response()->json([
            'message' => $message,
            'data' => $data
        ], $status_code);
    }
}


