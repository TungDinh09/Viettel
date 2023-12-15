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
        $orders = Order::with('product','service','payment','district','city')->get();

        // Trả về dữ liệu sản phẩm dưới dạng JSON
        return response()->json(['orders' => $orders]);
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
            
            
            $productID = $request->ProductID;
            $order = new Order;
            $order->ProductID = $productID;
            $order->name = $request->name;
            $order->Phone = $request->Phone;
            $order->email = null;
            $order->CityID = (int)$request->CityID;
            $order->DistrictID= (int)$request->DistrictID;
            $order->Address = $request->Address;
            $order->Accept = FALSE;
            $order->DateStart = now();
            
            $paymentID = $request->PaymentID;
            
            if ($paymentID !== null) {
                $order->PaymentID = (int)$paymentID;
                
            } else {
                $order->PaymentID = null;
            }
            
            $product = Product::find($productID);   
            $serviceID = $product->ServiceID;
            if ($serviceID !== null) {
                $order->ServiceID = $serviceID;
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
    public function Accept(string $id){
        try {
        // Start a database transaction
        DB::beginTransaction();

        // Update the product
        $order = [
            'Accept' => True,
        ];

        Order::where('OrderID', $id)->update($order);
        
        // Commit the transaction
        DB::commit();

        return response()->json(['message' => 'Product updated successfully']);
        } catch (\Exception $e) {
            // Something went wrong, rollback the transaction
            DB::rollBack();
            return response()->json(['message' => 'Failed to update product', 'error' => $e->getMessage()], 500);
        }
    }
    public function UnAccept(string $id){
        try {
        // Start a database transaction
        DB::beginTransaction();

        // Update the product
        $order = [
            'Accept' => FALSE,
        ];

        Order::where('OrderID', $id)->update($order);
        
        // Commit the transaction
        DB::commit();

        return response()->json(['message' => 'Product updated successfully']);
        } catch (\Exception $e) {
            // Something went wrong, rollback the transaction
            DB::rollBack();
            return response()->json(['message' => 'Failed to update product', 'error' => $e->getMessage()], 500);
        }
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
            
            $ServiceID = Product::find($productID)->select('ServiceID');
            
            if ($ServiceID !== null) {
                $order->ServiceID = $ServiceID;
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