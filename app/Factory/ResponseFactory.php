<?php

namespace App\Factory;

class ResponseFactory
{
    public static function toJson($data = [], $message = null, $code = 200, $success = false)
    {
        return response()->json([
            'success' => $success,
            'message' => $message,
            'data' => $data,
        ], $code);
    }
}
