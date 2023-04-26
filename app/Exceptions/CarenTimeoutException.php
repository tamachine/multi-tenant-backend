<?php

namespace App\Exceptions;

use Exception;

class CarenTimeoutException extends Exception
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
        //todo: definnir bien las exception
        if ($request->is('api/*')) {
            return response()->json([
                'success'  => false,
                'code'     => 'Caren service timeout',
                'error'    => 500
            ]);
        }

        return view('errors.caren_timeout');
    }
}
