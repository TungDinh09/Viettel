<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
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
        $payment = new Payment();    
        $payment->PaymentName = $request->input('PaymentName');
        $payment->PaymentDescription = $request->input('PaymentDescription');
        $payment->DayPayment = $request->input("Dayment");
        $payment ->save();
        return;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $payment = Payment::find($id);

        if (!$payment) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        $payment->PaymentName = $request->input('PaymentName');
        $payment->PaymentDescription = $request->input('PaymentDescription');
        $payment->DayPayment = $request->input("Dayment");
        $payment ->save();
        return;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $payment = Payment::find($id);
        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }
        $payment->delete();
        return;
    }
}