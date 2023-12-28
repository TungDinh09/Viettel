<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Imports\ProductImport;
use App\Exports\ProductExport;

use Illuminate\Http\Request;

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
            $product->ProductName = $request->input('ProductName');
            $product->Speed = $request->input('Speed');
            $product->Bandwidth = $request->input('Bandwidth');
            $product->Price = (int)$request->input('Price');
            $product->NTPrice = (int)$request->input('NTPrice');
            $product->sort = (int)$request->input('sort');
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
        $product = Product::where("ProductID",'=', $id)->with('category','service')->get();
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

    
    public function update(Request $request,  $id)
    {
        DB::beginTransaction();

        try {
            $product = Product::find($id);
            
            if (!$product) {
                DB::rollback(); // Rollback transaction nếu danh mục không tồn tại
                return response()->json(['message' => 'Category not found'], 404);
            }
            $request->validate([
                'ProductName'=>'required',
                'Price'=>'required',
                'Speed'=>'required',
                'Bandwidth'=>'required',
                'Description'=>'required',
                'IPstatic'=>'required',
                'UseDay'=>'required',
                'CategoryID'=>'required',
                'ServiceID'=>'required',
            ]);
            $product->ProductName = $request->input('ProductName');
            $product->Price = (int)$request->input('Price');
            $product->Speed = $request->input('Speed');
            $product->Bandwidth = $request->input('Bandwidth');
            $product->NTPrice = (int)$request->input('NTPrice');
            $product->sort = (int)$request->input('sort');
            $product->Description = $request->input('Description');
            $product->IPstatic = $request->input('IPstatic');
            $product->UseDay = (int)$request->input("UseDay");
            $product->Gift = $request->input("Gift");
            $product->CategoryID = (int)$request->input('CategoryID');
            $product->ServiceID = (int)$request->input("ServiceID");

            $product->save();

            // Nếu mọi thứ đều thành công, thì chúng ta commit transaction
            DB::commit();

            return response()->json(['message' => 'Update thành công'], 200);
        } catch (\Exception $e) {
            // Nếu có lỗi xảy ra, thì chúng ta rollback transaction
            DB::rollback();

            // Bạn có thể xử lý lỗi ở đây hoặc ném ngoại lệ để Laravel xử lý nó
            return response()->json(['message' => 'Update thất bại: ' . $e->getMessage()], 500);
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
    public function export() {
        try {
            $products = Product::all();
            return response()->json(['products' => $products]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
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

}

