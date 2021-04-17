<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class MeController extends Controller
{
    public function __invoke(Request $request)
    {
        // TODO: Implement __invoke() method.

        $user = $request->user();

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'user_role_id' => $user->user_role_id,
            'phone' => $user->phone,
            'status_code' => 200
        ],Response::HTTP_OK);
    }
}
