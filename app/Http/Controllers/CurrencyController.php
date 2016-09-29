<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rate;
use App\Http\Requests;

class CurrencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function calculate(Request $request) {
        $usdValue = $request->usd;
        $rate = Rate::all()->first()->rate;
        $sgdValue = $usdValue * $rate;
        
        return view('currency', compact('usdValue', 'sgdValue'));
    }

    public function rates(){
        // check user's role, only admin can access
        $user = Auth::user();
        $role = $user->role;
        if ($role != null && $role->slug == 'admin') {
            $rates = Rate::all();

            return view('rates', compact('rates'));
        } elseif($role !==null && $role->slug=='guest'){
            return 'you are guest';
        } else {
            // no access
            return redirect(url('/'));
        }
        
    }

    public function createRate(Request $request){
        $rate = Rate::create([
            'currency' => $request->currency,
            'rate' => $request->rate,
        ]);

        return redirect()->back();
    }
    
    public function deleteRate($id){
        $rate = Rate::find($id);
        $rate->delete();
        return redirect()->back();
    }
}
