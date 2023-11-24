<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\PaymentProduct;
use App\Models\ProductChannel;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductExport;
use App\Imports\ProductImport;
use App\Exports\PaymentProductExport;
use App\Imports\PaymentProductImport;
use App\Exports\ProductChannelExport;
use App\Imports\ProductChannelImport;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category','service')->get();

        // Trả về dữ liệu sản phẩm dưới dạng JSON
        return response()->json(['products' => $products]);
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
        DB::beginTransaction();

        try {
            $product = [
                'ProductID' => $request->input('ProductID'),
                'Speed' => $request->input('Speed'),
                'Bandwidth' => $request->input('Bandwidth'),
                'Price' => $request->input('Price'),
                'Gift' => $request->input('Gift'),
                'Description' => $request->input('Description'),
                'IPstatic' => $request->input('IPstatic'),
                'UseDay' => $request->input('UseDay'),
                'CategoryID' => $request->input('CategoryID'),
            ];

            if (!isset($request->ServiceID)) {
                $product['ServiceID'] = null;
            } else {
                $product['ServiceID'] = $request->input('ServiceID');
            }

            // Assuming you have a Product model and corresponding database table
            $productID = Product::insertGetId($product);

            $payments = $request->payments;
            $channels = $request->channels;

            if ($payments !== null) {
                $paymentproduct = [];
                foreach ($payments as $paymentID) {
                    $paymentproduct[] = ['PaymentID' => $paymentID, "ProductID" => $productID];
                }
                PaymentProduct::insert($paymentproduct);
            }

            if ($channels !== null) {
                $productChannel = [];
                foreach ($channels as $channelID) {
                    $productChannel[] = ['ChannelID' => $channelID, "ProductID" => $productID];
                }
                ProductChannel::insert($productChannel);
            }

            DB::commit();

            return redirect()->route('products.index')->with('success', 'Product created successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('products.index')->with('error', 'Product creation failed. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $productID = '"' + $id + '"';
        // echo($productID);
        $product = Product::where('ProductID','=',$id)->get();
        // Trả về dữ liệu sản phẩm dưới dạng JSON
        
        return response()->json(['product' => $product]);
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
    // Validate input data
    $validator = Validator::make($request->all(), [
        'ProductID' => 'required',
        'Speed' => 'required',
        'Bandwidth' => 'required',
        'Price' => 'required',
        'Description' => 'required',
        // Add validation rules for other fields
    ]);

    if ($validator->fails()) {
        return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 400);
    }

    try {
        // Start a database transaction
        DB::beginTransaction();

        // Update the product
        $product = [
            'ProductID' => $request->input('ProductID'),
            'Speed' => $request->input('Speed'),
            'Bandwidth' => $request->input('Bandwidth'),
            'Price' => $request->input('Price'),
            'Description' => $request->input('Description'),
            // Update other fields as needed
        ];

        if (!$request->has('ServiceID')) {
            $product['ServiceID'] = null;
        } else {
            $product['ServiceID'] = $request->input('ServiceID');
        }

        Product::where('id', $id)->update($product);

        // Update payments
        $payments = $request->input('payments');
        PaymentProduct::where('ProductID', $id)->delete();
        if ($payments !== null) {
            $paymentproduct = [];
            foreach ($payments as $paymentID) {
                $paymentproduct[] = ['PaymentID' => $paymentID, "ProductID" => $id];
            }
            PaymentProduct::insert($paymentproduct);
        }

        // Update channels
        $channels = $request->input('channels');
        ProductChannel::where('ProductID', $id)->delete();
        if ($channels !== null) {
            $productChannel = [];
            foreach ($channels as $channelID) {
                $productChannel[] = ['ChannelID' => $channelID, "ProductID" => $id];
            }
            ProductChannel::insert($productChannel);
        }

        // Commit the transaction
        DB::commit();

        return response()->json(['message' => 'Product updated successfully']);
    } catch (\Exception $e) {
        // Something went wrong, rollback the transaction
        DB::rollBack();
        return response()->json(['message' => 'Failed to update product', 'error' => $e->getMessage()], 500);
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        try {
        // Start a database transaction
        DB::beginTransaction();

        // Delete payments related to the product
        PaymentProduct::where('ProductID', $id)->delete();

        // Delete product channels related to the product
        ProductChannel::where('ProductID', $id)->delete();

        // Find and delete the product
        $product = Product::find($id);

        if (!$product) {
            // Rollback the transaction and return a 404 response
            DB::rollBack();
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();

        // Commit the transaction
        DB::commit();

        return response()->json(['message' => 'Product deleted successfully']);
        } catch (\Exception $e) {
            // Something went wrong, rollback the transaction
            DB::rollBack();
            return response()->json(['message' => 'Failed to delete product', 'error' => $e->getMessage()], 500);
        }
    }
    public function export_backup(){
        $products = Product::all();
        return Excel::download(new ProductExport($products), 'products.xlsx');
        $PaymentProducts = PaymentProduct::all();
        return Excel::download(new PaymentProductExport($PaymentProducts), 'payment_of_products.xlsx');
        $productchannels = ProductChannel::all();
        return Excel::download(new ProductChannelExport($productchannels), 'channel_of_products.xlsx');
    }
    public function import_product(Request $request){
      
        // $request->validate([
        //     'file' => 'required|mimes:xlsx,xls',
        // ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Lấy đường dẫn tuyệt đối tạm thời cho tệp tin
            $filePath = $file->getRealPath();
            Excel::import(new ProductImport, $filePath);        
          
        }  
    }
    public function import_payment_product(Request $request){
      
        // $request->validate([
        //     'file' => 'required|mimes:xlsx,xls',
        // ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Lấy đường dẫn tuyệt đối tạm thời cho tệp tin
            $filePath = $file->getRealPath();
            Excel::import(new PaymentProductImport, $filePath);        
          
        }  
    }
    public function import_product_channel(Request $request){
      
        // $request->validate([
        //     'file' => 'required|mimes:xlsx,xls',
        // ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Lấy đường dẫn tuyệt đối tạm thời cho tệp tin
            $filePath = $file->getRealPath();
            Excel::import(new ProductChannelImport, $filePath);        
          
        }  
    }
}