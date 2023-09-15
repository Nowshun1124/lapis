<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Follow;
use App\Models\Donation;
use Auth;

class DonationController extends Controller
{
    public function index(Request $request, User $user)
    {
        return view('side/donation_index')->with(['users' => $user]);
    }
   
    public function donate(Request $request, Donation $donation)
    {
        $inputs = request()->validate([
            'message' => 'required|max:300'
        ]);

        $donation = Donation::create([
            'message' => $inputs['message'],
            'money' => $request->input('money'),
            'user_from_id' => auth()->user()->id,
            'user_to_id' => $request->input('user_to_id')
        ]);
        
        return back();
    }
}
