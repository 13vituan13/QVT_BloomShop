<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

//Custom response using to Ajax JQuery 
class APIStatusController extends Controller
{
	/**
     * Success response method.
    */
    public function successResponse($message, $result = [], $code = 200)
    {
    	$response = [
            'success' => true,
            'message' => $message,
            'dataReponse'  => $result
        ];

        return response()->json($response, $code);
    }

    /**
     * Error response method.
    */
    public function errorResponse($message, $result = [], $code = 400)
    {
    	$response = [
            'success' => false,
            'errors' => $message,
        ];

        if (!empty($result)) {
            $response['data'] = $result;
        }

        return response()->json($response, $code);
    }
    
}
