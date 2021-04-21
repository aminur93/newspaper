<?php

namespace App\Http\Controllers\Api;

use App\Divison;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class DivisionController extends Controller
{
    public function getDivision()
    {
        $division = Divison::with('zilla','upzilla')->latest()->get();

        if ($division === null)
        {
            return response()->json([
                'success' => false,
                'error' => 'Record not found',
                'status_code' => 500
            ],Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            'success' => true,
            'division' => $division,
            'status_code' => 200
        ],Response::HTTP_OK);
    }
}
