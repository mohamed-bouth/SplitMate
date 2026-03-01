<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Apartment;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {    
        $user = auth()->user();
        $apartment = $user->apartments()->wherePivot('status', 'active')
        ->with(['users' => function($query) {
            $query->where('apartment_user.status', 'active');
        }])->first();
        $categories = Category::where('apartment_id' , $apartment->id)->get();

        return view('category.index' , compact('categories' , 'apartment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
        ]);

        $apartment = auth()->user()->apartments()->first();

        Category::create([
            'name' => $request->name,
            'apartment_id' => $apartment->id
        ]);

        return redirect(route('category.index'))->with(['success' => 'Category has seccesfuly created']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit' , compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:20'
        ]);

        $category->update([
            'name' => $request->name
        ]);

        return redirect(route('category.index'))->with(['success' => 'Category has seccesfuly updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {

        if($category->expenses()->exists()){
            return redirect(route('category.index'))->with(['error' => 'Category can not delete !']);
        }

        $category->delete();
        return redirect(route('category.index'))->with(['success' => 'Category has seccesfuly deleted']);
    }
}
