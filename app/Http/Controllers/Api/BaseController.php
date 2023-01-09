<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

abstract class BaseController extends Controller
{    
    protected $errorCode;

    protected function successResponse($data) {
        return response()->json([
            'success'   => true,
            'data'      => $data,
        ]);
    }

    protected function errorResponse($error) {
        return response()->json([
            'success'  => false,
            'code'     => $this->errorCode,
            'error'    => $error
        ]);
    }

    protected function notFoundError() {        
        $this->errorCode = 404;        
    }

    public function mapApiResponse($collection) {
        return $collection->map(function ($item) {
            return $item->toApiResponse();
        });
    }
}
