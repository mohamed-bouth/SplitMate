<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Apartment;
use App\Models\Expense;

class AdminController extends Controller
{
    public function index(){
        $usersCount = User::count();

        $activeApartments = Apartment::count();

        $totalMoney = Expense::sum('amount');

        $recentUsers = User::latest()->take(5)->get();

        return view('admin.dashboard' , compact('usersCount' , 'activeApartments' , 'totalMoney' , 'recentUsers'));
    }

    public function users(Request $request){
        $query = User::query();

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        $users = $query->latest()->paginate(10);

        return view('admin.users.index' , compact('users'));
    }

    public function ban (User $user) {
        
        if($user->is_active == true){

            $user->update([
                'is_active' => false
            ]);

        }else{

            $user->update([
                'is_active' => true
            ]);

        }
        

        return redirect(route('admin.users'));
    }
}
