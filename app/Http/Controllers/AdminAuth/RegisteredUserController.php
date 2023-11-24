<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): Response
    {
        try{
            $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Admin::class,],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $admin = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'Phone' => $request->Phone,
                'Gender'=> $request->Gender,
                'Address' => $request->Address,
            ]);

            event(new Registered($admin));

            // Auth::login($admin);

            return response()->noContent();
        }catch(\Exception $e){
            return responese()->json(["message"=>"Something went really wrong"], 500);     
        }
        
        
    }
}