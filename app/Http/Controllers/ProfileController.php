<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
    
    public function show(User $user)
    {
        return view('profile/show')->with(['users' => $user]);
    }
    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->safe()->only(['name', 'email', 'introduction']));

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        
        $path = null;
        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('profile-icons', 'public');
            $request->user()->profile_photo_path = $path;
        }
        
        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    
    public function select(Request $request)
    {
        //Auth::user()でログインしているユーザの$userインスタンスをとってきて、チェックボックスがtrueであればそのインスタンスのaccount_type変数にtrueを代入して、そのままsaveしたら良さそうですがいかがでしょうか？
        Auth::user();
        if($input = true)
        {
            $request->user()->account_type = true;
        } else {
            $request->user()->account_type = false;
        }
        
        $request->user()->save();
        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
