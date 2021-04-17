<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class LogOutController extends Controller
{
    public function __invoke()
    {
        // TODO: Implement __invoke() method.

        auth()->logout();

        return response()->json([
            'message' => 'Logout successful',
            'status_code' => 200
        ],Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
