<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $user =  new User;
        
        $dateofbirth = $request->Year+"/"+$request->Month+"/"+$request->Day;
        $user->FirstName = $request->FirstName;
        $user->LastName = $request->LastName;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->Phone = $request->Phone;
        $user->Gender = $request->Gender;
        $user->password = Hash::make($request->password);
        $user->CityID = $request->CityID;
        $user->DistrictID = $request->DistrictID;
        $user->Address = $request->Address;
        $user->DateOfBirth = $dateofbirth;
        if(!isset($user->Avatar)){
            $user->Avatar = null;
        } else{
            $user->Avatar = $request->Avatar;
        }
        
        //   $user->RoleID = 1
        
        $user->save();
        return "Insert thanh cong";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $dateofbirth = $request->Year+"/"+$request->Month+"/"+$request->Day;
        $user->FirstName = $request->FirstName;
        $user->LastName = $request->LastName;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->Phone = $request->Phone;
        $user->Gender = $request->Gender;
        $user->password = Hash::make($request->password);
        $user->CityID = $request->CityID;
        $user->DistrictID = $request->DistrictID;
        $user->Address = $request->Address;
        $user->DateOfBirth = $dateofbirth;
        if(!isset($user->Avatar)){
            $user->Avatar = null;
        } else{
            $user->Avatar = $request->Avatar;
        }
        
        //   $user->RoleID = 1
        
        $user->save();
        return "Insert thanh cong";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $user->delete();
        return;
    }
}