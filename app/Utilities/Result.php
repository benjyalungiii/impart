<?php

namespace App\Utilities;

use Illuminate\Http\JsonResponse;

class Result
{
    /**
     * @param any $data
     * @param string $message
     * @param integer $code
     * @return JsonResponse
     */
    public function success($data = null, string $message = "success", bool $success = true, int $code = 200): JsonResponse
    {
        return response()->json([
            'success' => $success,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    public function unauthorized($data = [], string $message = "Unauthorized access", int $code = 200)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => $data
        ], $code);
    }
}
