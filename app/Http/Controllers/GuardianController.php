<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGuardianRequest;
use App\Http\Requests\UpdateGuardianRequest;
use App\Models\Child;
use App\Models\Guardian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class GuardianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('guardians.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Child $child)
    {
        return view('guardians.create', compact('child'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGuardianRequest $request, Child $child)
    {

        DB::transaction(function() use ($request, $child) {
            $letters = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 2);
            $numbers = str_pad(random_int(0, 99), 2, '0', STR_PAD_LEFT);
            $pin = $letters . $numbers;

            // Handle the photo upload
            $photoPath = null;
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('guardian-photos', 'public');
            }

            // Create guardian with generated fields
            $guardian = Guardian::create([
                ...$request->validated(),
                'pin' => $pin,
                'qr_code' => Str::uuid(),
                'photo' => $photoPath,
            ]);
    
            $child->guardians()->attach($guardian, [
                'relationship_type' => $request->relationship_type,
            ]);
        });
        
        return redirect()->route('child.show', $child);
    }

    /**
     * Display the specified resource.
     */
    public function show(Guardian $guardian)
    {
        return view('guardians.show', compact('guardian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guardian $guardian)
    {
        //
    }

    public function addPhotoView(Guardian $guardian) {
        return view('guardians.add-photo',  compact('guardian'));
    }

    public function addPhotoStore(Request $request, Guardian $guardian) {
        $request->validate([
            'photo' => 'required|image',
        ]);

        $image = $request->file('photo');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('guardians', $filename, 'public');

        $guardian->photo = $path;
        $guardian->save();
        
        return redirect()->route('guardians.show', $guardian->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGuardianRequest $request, Guardian $guardian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guardian $guardian)
    {
        //
    }
}
