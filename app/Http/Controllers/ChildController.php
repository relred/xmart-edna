<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChildRequest;
use App\Http\Requests\UpdateChildRequest;
use App\Models\Child;
use App\Models\GradeLevel;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('children.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('children.create', [
            'levels' => GradeLevel::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChildRequest $request)
    {
        GradeLevel::find($request->grade_level)->children()->create($request->validated());
        return redirect()->route('child.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Child $child)
    {
        return view('children.show', compact('child'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Child $child)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChildRequest $request, Child $child)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Child $child)
    {
        //
    }
}
