<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // check user's role, only admin can access
        $user = Auth::user();
        $role = $user->role;
        if ($role != null && $role->slug == 'admin') {
            $rates = Rate::all();
            return view('rates', compact('rates'));
        } elseif($role !==null && $role->slug=='guest'){
            return view('calculate');
        } else {
            // no access
            return 'You cannot access';
        }
    }
}
