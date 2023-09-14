<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Auth;

class DonationController extends Controller
{
   public function show()
   {
        return view('side/show');
    }
}
