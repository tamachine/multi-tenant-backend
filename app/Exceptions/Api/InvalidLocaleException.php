<?php
 
namespace App\Exceptions\Api;
 
use Exception;
 
class InvalidLocaleException extends Exception
{
    /**
     * Report the exception.
     *
     * @return bool|null
     */
    public function report()
    {
        //
    }
 
    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        if ($request->is('api/*')) {            
            return response()->json([
                'success'  => false,
                'code'     => 'Locale does not exist',
                'error'    => 400
            ]);            
        }        
    }
}