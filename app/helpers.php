<?php

//  These helper functions can provide convenient shortcuts for commonly used tasks.

/**
 * Format the API response with a standardized structure.
 */
if (!function_exists('apiResponse')) {
    function apiResponse($data = null, $message = null, $status_code = 200, $error = false)
    {
        $response = [
            'data' => $data,
            'message' => $message,
            'error' => $error,
            'status_code' => $status_code
        ];

        return response()->json($response, $status_code);
    }
}

if (!function_exists('apiResponse')) {
    function apiResponse($data = null, $message = null, $status_code = 200, $error = false)
    {
        $response = [
            'data' => $data,
            'message' => $message,
            'error' => $error,
            'status_code' => $status_code
        ];

        return response()->json($response, $status_code);
    }
}

/**
 * Uploads an image file and saves it to the specified destination folder.
 */

if (!function_exists('uploadImage')) {
    function uploadImage($image)
    {
        // Generate a unique name for the image
        $imageName = time() . '_' . $image->getClientOriginalName();

        // Move the uploaded image to the public storage folder
        $image->move(public_path('uploads'), $imageName);

        return "upload/" . $imageName;
    }
}
