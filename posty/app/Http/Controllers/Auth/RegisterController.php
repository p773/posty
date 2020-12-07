<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //dd($request);
        $customMessages = [
            'required' => 'To pole jest wymagane!'
        ];

        $this->validate($request, [
           'name'=>'required|max:255',
           'username'=>'required|max:255',
           'email'=>'required|max:255',
           'password'=>'required|confirmed',
        ], $customMessages);

       
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => hash::make($request->password)

        ]);
        
            
        auth()->attempt($request->only('email', 'password'));

        //auth()->user();


        return redirect()->route('dashboard');
    }


}


