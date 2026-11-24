<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\Space;
use Illuminate\Http\Request;

class SpaceController extends Controller
{
    public function index($center_id)
    {
        $spaces = Space::where('center_id', $center_id)->get();
        $center = Center::findOrFail($center_id);
        return response()->json([
            'message' => 'Spaces retrieved successfully',
            'data' =>[ 
                'spaces'=> $spaces,
                'center'=> $center,
                ]
        ]);
    }
    public function show($id)
    {
        $space = Space::find($id);
        if(!$space){
            return response()->json([
                'message'=>'Space not found'

            ],404);
        }

        return response()->json([
            'message' => 'Space details retrieved successfully',
            'data' => $space
        ]);
    }
}
