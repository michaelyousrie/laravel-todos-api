<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Response;

class UnifiedResponse
{
    public static function success(array $data = [])
    {
        return self::response([
            'status' => true,
            'message' => 'Request was processed successfully :)',
            'data' => $data
        ], 200);
    }

    public static function created(array $data)
    {
        return self::response([
            'status' => true,
            'message' => 'Resource Created Successfully :)',
            'data' => $data
        ], 201);
    }

    public static function unprocessable(array $data)
    {
        return self::response([
            'status' => false,
            'message' => 'Request validation failed :(',
            'data' => $data
        ], 422);
    }

    public static function notFound(array $data = [])
    {
        return self::response([
            'status' => false,
            'message' => 'Resource not found :(',
            'data' => $data
        ], 404);
    }

    private static function response(array $data, int $statusCode)
    {
        return Response::json($data, $statusCode);
    }
}
