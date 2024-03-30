<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

    public function create(){
        $user = User::find(Auth::user()->id);
        return view("admin.auth.profile", compact("user"));
    }
    public function update(Request $request, $id){

        $user = User::find($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'old_password' => ['required'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);        
        
        if (Hash::check($request->old_password, $user->password)) {

            $user->fill([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ])->save();
        
            return back()->with(['success' => 'Profile updated successfully.']);
        } else {
            return back()->withErrors(['old_password' => 'Old password is incorrect.'])->withInput();
        }
    }
}
