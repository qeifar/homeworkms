<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
//use \Exception;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(Request $request)
    {
        $user = User::find(Auth::id());

        if(empty($user)) {
            abort(404);
        }
        
        return view('profiles.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        try {
            $user = User::find(Auth::id());

            if(empty($user)) {
                abort(404);
            }
            
            $name = $request->input('name');
            $email = $request->input('email');
            
            if(!empty($request->input('password')) || $request->input('password') !== "" ) {
                $pass = Hash::make($request->input('password'));
                $user->password = $pass;
            }
            $user->name = $name;
            $user->email = $email;

            if($user->save()) {
                return redirect()->route('profiles.edit')->with('message', 'Profile updated successfully');
            }else{
                return redirect()->route('profiles.edit')->with('error', 'Profile failed to update');
            }
        }catch (Exception $e) {
            return redirect()->route('profiles.edit')->with('error', 'Profile failed to update');
        }
    }
}
