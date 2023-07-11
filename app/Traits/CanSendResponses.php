<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait CanSendResponses
{
    /**
     * Send a success response.
     *
     * @param  array<string, mixed>  $data
     * @param  string  $message
     * @param  int  $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResponse(array $data, string $message = '', int $status = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => $message,
        ], $status);
    }

    /**
     * Send an error response.
     *
     * @param  string  $error
     * @param  array<string, mixed>  $errorMessages
     * @param  int  $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError(string $error, array $errorMessages = [], int $status = 404): JsonResponse
    {
        return response()->json([
            'success' => false,
            'error' => $error,
            'error_messages' => $errorMessages,
        ], $status);
    }

}