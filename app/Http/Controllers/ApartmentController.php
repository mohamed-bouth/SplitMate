<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Models\User;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apartment = Auth()->user()->apartments()->with('users')->first();
        return view('apartment.index' , compact('apartment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth()->user()->hasApartment()){
            abort(404);
        }
        return view('apartment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        $apartment = Apartment::create([
            'name' => $request->name,
            'status' => 'active'
        ]);

        $apartment->users()->attach(auth()->id(), [
            'role' => 'owner',
            'status' => 'active',
            'joined_at' => now(),
        ]);

        return redirect(route('apartment.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Apartment $apartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apartment $apartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apartment $apartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apartment $apartment)
    {
        //
    }
}
