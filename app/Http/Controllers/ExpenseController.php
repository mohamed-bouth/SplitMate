<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::with('user')->where('user_id', Auth()->id())
        ->whereHas('category.apartment.users', function ($query) {
            $query->where('users.id', Auth()->id());
        })
        ->get();
        return view('expense.index' , compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user()->with('apartments.categories')->first();
        $categories = $user->apartments->first()->categories;
        return view('expense.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:20',
            'amount' => 'required|numeric',
        ]);

        Expense::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'category_id' => $request->category_id,
            'user_id' => Auth()->id()
        ]);

        return redirect(route('expense.index'))->with(['success' => 'Expense has seccesfuly created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        $user = auth()->user()->with('apartments.categories')->first();
        $categories = $user->apartments->first()->categories;
        return view('expense.edit' , compact('expense' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'name' => 'required|max:20',
            'amount' => 'required|numeric',
        ]);

        $expense->update([
            'name' => $request->name,
            'amount' => $request->amount,
            'category_id' => $request->category_id,
        ]);

        return redirect(route('expense.index'))->with(['success' => 'Expense has seccesfuly updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect(route('expense.index'))->with(['success' => 'Expense has seccesfuly deleted']);
    }
}
