<?php

namespace App\Http\Controllers\Api;

use App\Types;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class TypeController extends Controller
{
    public function getType()
    {
        $types = Types::with('countries')->latest()->get();

        if ($types === null)
        {
            return response()->json([
                'success' => false,
                'error' => 'Record not found',
                'status_code' => 200
            ],Response::HTTP_OK);
        }else{
            return response()->json([
                'types' => $types,
                'status_code' => 200
            ],Response::HTTP_OK);
        }

    }
}
