<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSpaceRequest;
use App\Http\Requests\UpdateSpaceRequest;
use App\Models\Center;
use App\Models\Space;


class SpaceController extends Controller
{
    public function index()
    {
        $spaces = Space::with('center')->get();
        return view('spaces.index', compact('spaces'));
    }

    public function create()
    {
        $centers= Center::query()->get();

        return view('spaces.create',compact('centers'));
    }

    public function store(StoreSpaceRequest $request)
    {
        $validated = $request->validated();
        $center = Center::query()->findOrFail($validated['center_id']);
        $center->spaces()->create($validated); //Space::query()->create($validated) فينا نكتب هيك لان بالفورم حاطين انو لازم center_id exit
        return redirect()->route('spaces.index');
    }

    public function show(Space $space)
    {
        $space->load('center');

        return view('spaces.show', compact('space'));
    }
    public function edit(Space $space)
    {
        $centers = Center::query()->get();

        return view('spaces.edit', compact('space', 'centers'));
    }
    public function update(UpdateSpaceRequest $request, Space $space)
    {
        $validated = $request->validated();

        $space->update($validated);

        return redirect()->route('spaces.index');
    }


    public function destroy(Space $space)
    {
        $space->delete();

        return redirect()->route('spaces.index');
    }
}
