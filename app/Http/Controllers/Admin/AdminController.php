<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
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
        $admin =  new Admin;
        
        $dateofbirth = $request->Year+"/"+$request->Month+"/"+$request->Day;
        $admin->FirstName = $request->FirstName;
        $admin->LastName = $request->LastName;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->Phone = $request->Phone;
        $admin->Gender = $request->Gender;
        $admin->password = Hash::make($request->password);
        $admin->Address = $request->Address;
        $admin->DateOfBirth = $dateofbirth;
        if(!isset($admin->Avatar)){
            $admin->Avatar = null;
        } else{
            $admin->Avatar = $request->Avatar;
        }
        
        //   $admin->RoleID = 1
        
        $admin->save();
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
    public function update(Request $request,  $id)
    {
        $admin = Admin::find($id);
        if (!$admin) {
            return response()->json(['message' => 'Admin not found'], 404);
        }
        $dateofbirth = $request->Year+"/"+$request->Month+"/"+$request->Day;
        $admin->FirstName = $request->FirstName;
        $admin->LastName = $request->LastName;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->Phone = $request->Phone;
        $admin->Gender = $request->Gender;
        $admin->password = Hash::make($request->password);
        $admin->Address = $request->Address;
        $admin->DateOfBirth = $dateofbirth;
        if(!isset($admin->Avatar)){
            $admin->Avatar = null;
        } else{
            $admin->Avatar = $request->Avatar;
        }
        
        //   $admin->RoleID = 1
        
        $admin->save();
        return "Insert thanh cong";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $admin = Admin::find($id);
        if (!$admin) {
            return response()->json(['message' => 'Admin not found'], 404);
        }
        $admin->delete();
        return;
        
    }
}