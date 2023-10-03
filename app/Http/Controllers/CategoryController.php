<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\CategoryExport;
use Maatwebsite\Excel\Facades\Excel;


class CategoryController extends Controller
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
        $category = new Category();
        $category->CategoryName = $request->input('CategoryName');
        $category->save();

        // Nếu mọi thứ đều thành công, thì chúng ta commit transaction
        DB::commit();

        return response()->json(['message' => 'Insert thành công'], 200);
    } catch (\Exception $e) {
        // Nếu có lỗi xảy ra, thì chúng ta rollback transaction
        DB::rollback();

        // Bạn có thể xử lý lỗi ở đây hoặc ném ngoại lệ để Laravel xử lý nó
        return response()->json(['message' => 'Insert thất bại: ' . $e->getMessage()], 500);
    }
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
    public function update(Request $request,  $id)
    {
        DB::beginTransaction();

    try {
        $category = Category::find($id);

        if (!$category) {
            DB::rollback(); // Rollback transaction nếu danh mục không tồn tại
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->CategoryName = $request->input('CategoryName');
        $category->save();

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
    public function destroy($id)
    {
         DB::beginTransaction();

    try {
        $category = Category::find($id);

        if (!$category) {
            DB::rollback(); // Rollback transaction nếu danh mục không tồn tại
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->delete();

        // Nếu mọi thứ đều thành công, thì chúng ta commit transaction
        DB::commit();

        return response()->json(['message' => 'Category deleted'], 200);
    } catch (\Exception $e) {
        // Nếu có lỗi xảy ra, thì chúng ta rollback transaction
        DB::rollback();

        // Bạn có thể xử lý lỗi ở đây hoặc ném ngoại lệ để Laravel xử lý nó
        return response()->json(['message' => 'Delete failed: ' . $e->getMessage()], 500);
    }
    }
    public function export(){
        $categories = Category::all();
        return Excel::download(new CategoryExport($categories), 'categories.xlsx');
    }
    
}