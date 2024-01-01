<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use App\Exports\BlogExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        // Trả về dữ liệu sản phẩm dưới dạng JSON
        return response()->json(['blogs' => $blogs]);
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
            $request->validate([
                'BlogContent'=>'required',
                'BlogTitle'=>'required' ,
                'TitleImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            ]);
            // echo($request->TitleImage);
            if ($request->hasFile('TitleImage')) {
                $file = $request->TitleImage;
                $imageName = Str::random(32).'.'.$file->getClientOriginalExtension();
            } else {
                // Handle the case where no file is uploaded
                return response()->json(['error' => 'No TitleImage uploaded'], 400);
            }
            
           

            $blog = new Blog;
            $blog->BlogContent = $request->BlogContent;
            $blog->BlogTitle = $request->BlogTitle;
            // Lưu ý rằng bạn cần gán giá trị của TitleImage từ $request, không phải từ $blog
            $blog->TitleImage = $imageName;
            $blog->save();
            
            Storage::disk('public')->put($imageName, file_get_contents($request->TitleImage));
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
    public function show(string $id)
    {
        $blog = Blog::find($id);
        // Trả về dữ liệu sản phẩm dưới dạng JSON
        return response()->json(['blog' => $blog]); 
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
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $blog = Blog::find($id);

            if (!$blog) {
                // DB::rollback(); // Rollback transaction nếu bài viết không tồn tại
                return response()->json(['message' => 'Blog not found'], 404);
            } 
            $request->validate([
                'BlogContent'=>'required',
                'BlogTitle'=>'required' ,
                'TitleImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            ]);
            
            $blog->BlogContent = $request->BlogContent;
            $blog->BlogTitle = $request->BlogTitle;
            if($request->TitleImage){
                $storage = Storage::disk('public');
                if($storage->exists($blog->TitleImage)){
                    $storage->delete($blog->TitleImage);
                }
                $file = $request->TitleImage;
                $imageName = Str::random(32).'.'.$file->getClientOriginalExtension();
                $blog->TitleImage = $imageName;
                $storage->put($imageName, file_get_contents($file));
            }
            $blog->save();

            DB::commit();

            return response()->json(['message' => 'Cập nhật thành công'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Update failed: ' . $e->getMessage()], 500);
        }
    }
    // public function update(Request $request,  $id)
    // {
    //     DB::beginTransaction();

    //     try {
    //         $product = Blog::find($id);
    //         echo($request->BlogContent);
    //         echo("den");
    //         if (!$product) {
    //             DB::rollback(); // Rollback transaction nếu danh mục không tồn tại
    //             return response()->json(['message' => 'Category not found'], 404);
    //         }

    //         $request->validate([
    //             'ProductName'=>'required',
    //             'Price'=>'required',
    //             'Speed'=>'required',
    //             'Bandwidth'=>'required',
    //             'Description'=>'required',
    //             'IPstatic'=>'required',
    //             'UseDay'=>'required',
    //             'CategoryID'=>'required',
    //             'ServiceID'=>'required',
    //         ]);
    //         $product->ProductName = $request->input('ProductName');
    //         $product->Price = (int)$request->input('Price');
    //         $product->Speed = $request->input('Speed');
    //         $product->Bandwidth = $request->input('Bandwidth');
    //         $product->NTPrice = (int)$request->input('NTPrice');
    //         $product->sort = (int)$request->input('sort');
    //         $product->Description = $request->input('Description');
    //         $product->IPstatic = $request->input('IPstatic');
    //         $product->UseDay = (int)$request->input("UseDay");
    //         $product->Gift = $request->input("Gift");
    //         $product->CategoryID = (int)$request->input('CategoryID');
    //         $product->ServiceID = (int)$request->input("ServiceID");

    //         $product->save();

    //         // Nếu mọi thứ đều thành công, thì chúng ta commit transaction
    //         DB::commit();

    //         return response()->json(['message' => 'Update thành công'], 200);
    //     } catch (\Exception $e) {
    //         // Nếu có lỗi xảy ra, thì chúng ta rollback transaction
    //         DB::rollback();

    //         // Bạn có thể xử lý lỗi ở đây hoặc ném ngoại lệ để Laravel xử lý nó
    //         return response()->json(['message' => 'Update thất bại: ' . $e->getMessage()], 500);
    //     }


    // }
    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $blog = Blog::find($id);

            if (!$blog) {
                DB::rollback(); // Rollback transaction nếu bài viết không tồn tại
                return response()->json(['message' => 'Blog not found'], 404);
            }

            $storage = Storage::disk('public');
                
            if($storage->exists($blog->TitleImage)){
                $storage->delete($blog->TitleImage);
            } 
            
            $blog->delete();
            DB::commit();

            return response()->json(['message' => 'Blog deleted'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Delete failed: ' . $e->getMessage()], 500);
        }
    }
    public function export(){
        $blog = Blog::all();
        return Excel::download(new BlogExport($blog), 'blogs.xlsx');
    }

}
