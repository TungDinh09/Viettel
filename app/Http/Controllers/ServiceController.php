<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
class ServiceController extends Controller
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
        $service = new Service();    
        $service->ServiceName = $request->input('ServiceName');
        $service->Price = $request->input('Price');
        $service ->save();
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
        $service = Service::find($id);

        if (!$service) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        $service->ServiceName = $request->input('ServiceName');
        $service->Price = $request->input('Price');
        $service ->save();
        return;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $service = Service::find($id);
        if (!$service) {
            return response()->json(['message' => 'Service not found'], 404);
        }
        $service->delete();
        return;
    }
}