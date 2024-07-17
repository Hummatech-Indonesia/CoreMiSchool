<?php

namespace App\Helpers;

class ResponseHelper
{
    /**
     * Create a JSON response.
     *
     * @param string $status
     * @param string $message
     * @param mixed $data
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public static function jsonResponse($status = 'success', $message = 'Berhasil', $data = null, $code = 200)
    {
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($response, $code);
    }
}
