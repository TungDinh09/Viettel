<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
class DistrictController extends Controller
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
    public function create(){
    
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $district = new District();    
        $district->DistrictName = $request->input('DistrictName');
        $district->CityID = $request->input('CityID');
        $category ->save();
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
        $district = District::find($id);
        if (!$district) {
            return response()->json(['message' => 'District not found'], 404);
        }
        $district->DistrictName = $request->input('DistrictName');
        $district->CityID = $request->input('CityID');
        $district ->save();
        return;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $district = District::find($id);
        if (!$district) {
            return response()->json(['message' => 'District not found'], 404);
        }
        $district->delete();
        return;
    }
}