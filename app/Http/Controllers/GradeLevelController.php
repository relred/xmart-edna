<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGradeLevelRequest;
use App\Http\Requests\UpdateGradeLevelRequest;
use App\Models\GradeLevel;

class GradeLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('levels.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('levels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGradeLevelRequest $request)
    {
        GradeLevel::create($request->validated());
        return redirect()->route('grade-levels.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(GradeLevel $gradeLevel)
    {
        return view('levels.show', compact('gradeLevel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GradeLevel $gradeLevel)
    {
        return view('levels.edit', compact('gradeLevel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGradeLevelRequest $request, GradeLevel $gradeLevel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GradeLevel $gradeLevel)
    {
        $gradeLevel->delete();

        return redirect()->route('grade-levels.index');
    }
}
