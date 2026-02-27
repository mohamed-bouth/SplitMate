<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Expense;
use App\Models\Transaction;
use Illuminate\Container\Attributes\Auth;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $apartment = Auth()->user()->apartments()->wherePivot('status', 'active')->with('users')->first();
        $apartmentId = $apartment->id;

        $totalExpenses = Expense::whereHas('category', function ($q) use ($apartmentId) {
            $q->where('apartment_id', $apartmentId);
        })->sum('amount');

        $pendingTransactions = Transaction::where('apartment_id', $apartmentId)
            ->where('status', 'pending')
            ->get();

        $balances = $apartment->users->map(function ($user) use ($pendingTransactions) {


            $owedToMe = $pendingTransactions->where('creditor_id', $user->id)->sum('amount');


            $iOwe = $pendingTransactions->where('debtor_id', $user->id)->sum('amount');


            $netBalance = $iOwe - $owedToMe;

            return [
                'user'       => $user,
                'owed_to_me' => $owedToMe,
                'i_owe'      => $iOwe,
                'balance'    => round($netBalance, 2),

            ];
        });

        $monthlyExpenses = 0;

        return view('apartment.index', compact('monthlyExpenses', 'apartment', 'totalExpenses', 'balances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth()->user()->hasApartment()) {
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
