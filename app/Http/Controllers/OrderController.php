<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Product;
use App\Models\Service;
class OrderController extends Controller
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
        DB::beginTransaction();

        try {
            $productID = $request->productID;
            $order = new Order;
            $order->ProductPrice = Product::find($productID)->select('Price');
            $order->ProductID = $productID;
            $order->User = Auth::user()->UserID;
            $order->Accept = FALSE;
            $order->DateStart = now();
            $paymentID = $request->PaymentID;
            
            if ($paymentID !== null) {
                $order->PaymentID = $paymentID;
            } else {
                $order->PaymentID = null;
            }
            
            $ServiceID = $request->ServiceID;
            
            if ($ServiceID !== null) {
                $order->ServiceID = $ServiceID;
                $order->ServicePrice = Service::find($ServiceID)->select('Price');
            } else {
                $order->ServiceID = null;
            }

            $order->save();

            DB::commit(); // Commit the transaction if everything is successful
        } catch (\Exception $e) {
            DB::rollback(); // Rollback the transaction if an error occurs
            // Handle the error, log it, or return an error response
        }
         
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
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
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}