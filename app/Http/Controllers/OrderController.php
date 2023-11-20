<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use App\Exports\OrderBackUpExport;
use App\Exports\OrderExport;
use App\Imports\OrderImport;
use Maatwebsite\Excel\Facades\Excel;

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
            $userid = Auth::user()->id;
            $productID = $request->productID;
            $order = new Order;
            $order->ProductPrice = Product::find($productID)->select('Price');
            $order->ProductID = $productID;
            $order->Phone = User::find($userid)->select('Phone');
            $order->email = User::find($userid)->select('email');
            $order->CityID = User::find($userid)->select('CityID');
            $order->DistrictID= User::find($userid)->select('DistrictID');
            $order->Address = User::find($userid)->select('Address');
            $order->UserID = $userid;
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
    }
    
    public function exportBackUp(){
        $orderBackup = Order::all(); 
        return Excel::download(new OrderBackUpExport($orderBackup), 'Order_BackUp.xlsx');
    }
    public function export(){
        $order = Order::leftJoin('products', 'orders.ProductID', '=', 'products.ProductID')
    ->leftJoin('payments', 'orders.PaymentID', '=', 'payments.PaymentID')
    ->leftJoin('services', 'orders.ServiceID', '=', 'services.ServiceID')
    ->leftJoin('cities', 'orders.CityID', '=', 'cities.CityID')
    ->leftJoin('districts', 'orders.DistrictID', '=', 'districts.DistrictID')
    ->select([
        'OrderID',
        'ProductPrice',
        'Accept',
        'name',
        'Phone',
        'email',
        'CityName',
        'DistrictName',
        'Addess',
        'DateStart',
        'ServicePrice',
        'UserID',
        'PaymentName',
        'ProductName',
        'ServiceName',
    ])
    ->get();

        return Excel::download(new OrderExport($order), 'Order.xlsx');
                
    }
    public function exportActiveFalse(){
        $order = Order::leftJoin('products', 'orders.ProductID', '=', 'products.ProductID')
    ->leftJoin('payments', 'orders.PaymentID', '=', 'payments.PaymentID')
    ->leftJoin('services', 'orders.ServiceID', '=', 'services.ServiceID')
    ->where('orders.Accept', '=', false)
    ->select([
        'OrderID',
        'ProductPrice',
        'Accept',
        'name',
        'Phone',
        'email',
        'DateStart',
        'ServicePrice',
        'UserID',
        'PaymentName',
        'ProductName',
        'ServiceName',
    ])
    ->get();
        return Excel::download(new OrderExport($order), 'Order_NonAccept.xlsx'); 
    }
    public function import(Request $request){
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Lấy đường dẫn tuyệt đối tạm thời cho tệp tin
            $filePath = $file->getRealPath();
            Excel::import(new OrderImport, $filePath);        
          
        }
    }
    public function OrderForm(Request $request){
        DB::beginTransaction();

        try {
            $userid = Auth::user()->id;
            $productID = $request->productID;
            $order = new Order;
            $order->ProductPrice = Product::find($productID)->select('Price');
            $order->ProductID = $productID;
            $order->Phone = $request->Phone;
            $order->email = $request->email;
            $order->CityID = $request->CityID;
            $order->DistrictID= $request->DistrictID;
            $order->Address = $request->Address;
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
}