<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Nette\Utils\Random;
use App\Models\Apartment;

class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($token)
    {
        $invitation = Invitation::where('token' , $token)->with('user')->with('apartment')->first();

        if(Auth()->user()->email != $invitation->email || $invitation->status == 'accepted' || $invitation->status == 'refused'){
            abort(404);
        }

        return view('invitation.index' , compact('token' , 'invitation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , $apartmentId)
    {

        $apartment = Apartment::where('id' , $apartmentId)->with('users')->first();

        foreach($apartment->users as $user){
            if($user->email == $request->email){
                return redirect()->back()->with(['error' => 'the user aready exist !']);
            }
        }

        $request->validate([
            'email' => 'email|required'
        ]);
        
        $invitation = Invitation::create([
            'token' => Str::random(20),
            'email' => $request->email,
            'created_by' => Auth()->id(),
            'apartment_id' => $apartmentId,
        ]);

        $url = 'http://127.0.0.1:8000/invitation/' . $invitation->token;

        return redirect()->back()->with(['token' => $invitation->token , 'url' => $url]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Invitation $invitation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invitation $invitation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invitation $invitation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invitation $invitation)
    {
        //
    }

    public function accepted($token)
    {

        $invitation = Invitation::where('token' , $token)->with('apartment')->first();

        if(Auth()->user()->email != $invitation->email || $invitation->status == 'accepted' || $invitation->status == 'refused'){
            abort(404);
        }

        $apartment = $invitation->apartment;

        $apartment->users()->attach(auth()->id(), [
            'role' => 'member',
            'status' => 'active',
            'joined_at' => now(),
        ]);

        $invitation->update([
            'status' => 'accepted'
        ]);

        return redirect(route('apartment.index'));
    }

    public function refused($token)
    {
        $invitation = Invitation::where('token' , $token)->first();

        if(Auth()->user()->email != $invitation->email || $invitation->status == 'accepted' || $invitation->status == 'refused'){
            abort(404);
        }

        $invitation->update([
            'status' => 'refused'
        ]);

        return redirect(route('dashboard'));
    }
}
