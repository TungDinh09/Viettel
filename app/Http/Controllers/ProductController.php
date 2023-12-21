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
        $request->validate([
            'Speed'=>'required',
            'Bandwidth'=>'required',
            'IPstatic'=>'required',
            'UseDay'=>'required',
            'CategoryID'=>'required',
        ]);

        try {
            $product = new Product;
            $product->ProductID = $request->input('ProductID');
            $product->Speed = $request->input('Speed');
            $product->Bandwidth = $request->input('Bandwidth');
            $product->Price = (float)$request->input('Price');
            $product->Gift = $request->input('Gift');
            $product->Description = $request->input('Description');
            $product->IPstatic = $request->input('IPstatic');
            $product->UseDay = $request->input('UseDay');
            $product->CategoryID = (int)$request->input('CategoryID');


            if (!isset($request->ServiceID)) {
                $product->ServiceID = null;
            } else {
                $product->ServiceID = (int)$request->input('ServiceID');
            }

            // echo($product);


            $product->save();
            DB::commit();

            return response()->json(['message' => 'Insert thành công'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Insert thất bại: ' . $e->getMessage()], 500);
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
    // $validator = Validator::make($request->all(), [
    //     'ProductID' => 'required',
    //     'Speed' => 'required',
    //     'Bandwidth' => 'required',
    //     'Price' => 'required',
    //     'Description' => 'required',
    //     // Add validation rules for other fields
    // ]);

    // if ($validator->fails()) {
    //     return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 400);
    // }

    try {
        // Start a database transaction
        DB::beginTransaction();

        // Update the product
        $product = Product::find($id);

        $request->validate([
            'Speed'=>'required',
            'Bandwidth'=>'required',
            'IPstatic'=>'required',
            'UseDay'=>'required',
            'CategoryID'=>'required',
        ]);
        $product->Speed = $request->input('Speed');
        $product->Bandwidth = $request->input('Bandwidth');
        $product->Price = (float)$request->input('Price');
        $product->Gift = $request->input('Gift');
        $product->Description = $request->input('Description');
        $product->IPstatic = $request->input('IPstatic');
        $product->UseDay = $request->input('UseDay');
        $product->CategoryID = (int)$request->input('CategoryID');



        if (!isset($request->ServiceID)) {
            $product->ServiceID = null;
        } else {
            $product->ServiceID = (int)$request->input('ServiceID');
        }

        $product->save();


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
    // public function import_payment_product(Request $request){

    //     // $request->validate([
    //     //     'file' => 'required|mimes:xlsx,xls',
    //     // ]);

    //     if ($request->hasFile('file')) {
    //         $file = $request->file('file');

    //         // Lấy đường dẫn tuyệt đối tạm thời cho tệp tin
    //         $filePath = $file->getRealPath();
    //         Excel::import(new PaymentProductImport, $filePath);

    //     }
    // }
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
    public function filter(Request $request){
        // echo(gettype( $request->input('CategoryID')));
        // echo(gettype($request->input('sort')) );
        // echo(gettype($request->input('min_Price')) );
        // echo(gettype($request->input('max_Price') ));
        $products = Product::with('category','service')->get();


        // echo($products);

        if($request->input('CategoryID') != null){
            $products = $products->whereIn('CategoryID',(int)$request->input('CategoryID'));
        }


        // if($request->input('ServiceID') != null){
        //     $products->whereIn('service.ServiceID', $request->input('ServiceID'));
        // }

        if($request->input('sort') == 'A_Z'){
            $products->sortBy(function ($item) {
            return $item->ProductID;
        });
        } elseif($request->sort == 'Z_A'){
            $products->sortByDesc(function ($item) {
            return $item->ProductID;
            });
        }

        if($request->input('min_Price') != null){
            $products->where('products.Price','>=' ,$request->input('min_Price'));
        }
        if($request->input('max_Price') != null){
            $products->where('products.Price','<=' ,$request->input('max_Price'));
        }

        return response()->json(['products' => $products]);
    }

}
