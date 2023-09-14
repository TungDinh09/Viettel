<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $city = new City();    
        $city->CityName = $request->input('CityName');
        $city ->save();
        return;
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $city = $City::find($id);
        if (!$city) {
            return response()->json(['message' => 'Category not found'], 404);
        }
        $city->CityName = $request->input('CityName');
        $city ->save();
        return;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $city = $City::find($id);
        if (!$city) {
            return response()->json(['message' => 'City not found'], 404);
        }
        $city->delete();
        return;
    }
}