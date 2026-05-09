<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * Daftar exception yang tidak perlu dilaporkan
     */
    protected $dontReport = [];

    /**
     * Daftar input yang tidak boleh di-flash ke session
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Render exception
     */
    public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
    }

    /**
     * HANDLE UNAUTHORIZED API (SANCTUM)
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        // Khusus API
        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized. Token invalid.'
            ], 401);
        }

        // Untuk web (jika ada)
        // return redirect()->guest(route('login'));
    }
}
