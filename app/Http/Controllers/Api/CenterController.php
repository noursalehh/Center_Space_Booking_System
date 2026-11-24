<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Center;
use Illuminate\Http\Request;

class CenterController extends Controller
{
    public function index()
    {
        $centers = Center::where('status', 'active')->get();

        return response()->json([
            'message' => 'Active centers retrieved successfully',
            'data' => $centers
        ]);
    }
    public function show($id)
    {
        $center = Center::find($id);
        if(!$center){
            return response()->json([
                'message'=>'this center not found'

            ],404);
        }
       
        return response()->json([
            'message' => 'Center details retrieved successfully',
            'data' => $center
        ]);
    }

}
