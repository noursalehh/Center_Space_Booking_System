<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Http\Requests\StoreCenterRequest;
use App\Http\Requests\UpdateCenterRequest;

class CenterController extends Controller
{
    
    public function index()
    {
        $centers = Center::query()->get();

        return view('centers.index', compact('centers'));
    }

    
    public function create()
    {
        return view('centers.create');
    }

    
    public function store(StoreCenterRequest $request)
    {
        $validated = $request->validated();

        Center::create($validated);

        return redirect()->route('centers.index');
    }

    
    public function show(Center $center)
    {
        return view('centers.show', compact('center'));
    }

    public function edit(Center $center)
    {
        return view('centers.edit', compact('center'));
    }

    
    public function update(UpdateCenterRequest $request, Center $center)
    {
        $validated = $request->validated();

        $center->update($validated);

        return redirect()->route('centers.index');
    }

    
    public function destroy(Center $center)
    {
        $center->delete();

        return redirect()->route('centers.index');
        
    }
}