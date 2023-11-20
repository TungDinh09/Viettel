<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use App\Exports\BlogExport;
use Maatwebsite\Excel\Facades\Excel;

class BlogController extends Controller
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
         DB::beginTransaction();

    try {
        $blog = new Blog;
        $blog->BlogContent = $request->BlogContent;
        $blog->BlogTitle = $request->BlogTitle;
        // Lưu ý rằng bạn cần gán giá trị của TitleImage từ $request, không phải từ $blog
        $blog->TitleImage = $request->TitleImage;
        $blog->AdminID = Auth::admin()->id;
        $blog->save();

        // Nếu mọi thứ đều thành công, thì chúng ta commit transaction
        DB::commit();

        return "Insert thành công";
    } catch (\Exception $e) {
        // Nếu có lỗi xảy ra, thì chúng ta rollback transaction
        DB::rollback();

        // Bạn có thể xử lý lỗi ở đây hoặc ném ngoại lệ để Laravel xử lý nó
        return "Insert thất bại: " . $e->getMessage();
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, int $id)
    {
         DB::beginTransaction();

    try {
        $blog = Blog::find($id);

        if (!$blog) {
            DB::rollback(); // Rollback transaction nếu bài viết không tồn tại
            return response()->json(['message' => 'Blog not found'], 404);
        }

        $blog->BlogContent = $request->BlogContent;
        $blog->BlogTitle = $request->BlogTitle;
        // Lưu ý rằng bạn cần gán giá trị của TitleImage từ $request, không phải từ $blog
        $blog->TitleImage = $request->TitleImage;
        $blog->AdminID = Auth::admin()->id;
        $blog->save();

        // Nếu mọi thứ đều thành công, thì chúng ta commit transaction
        DB::commit();

        return "Cập nhật thành công";
    } catch (\Exception $e) {
        // Nếu có lỗi xảy ra, thì chúng ta rollback transaction
        DB::rollback();

        // Bạn có thể xử lý lỗi ở đây hoặc ném ngoại lệ để Laravel xử lý nó
        return response()->json(['message' => 'Update failed: ' . $e->getMessage()], 500);
    }
    }

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

        $blog->delete();

        // Nếu mọi thứ đều thành công, thì chúng ta commit transaction
        DB::commit();

        return response()->json(['message' => 'Blog deleted'], 200);
        } catch (\Exception $e) {
            // Nếu có lỗi xảy ra, thì chúng ta rollback transaction
            DB::rollback();

            // Bạn có thể xử lý lỗi ở đây hoặc ném ngoại lệ để Laravel xử lý nó
            return response()->json(['message' => 'Delete failed: ' . $e->getMessage()], 500);
        }
    }
    public function export(){
        $blog = Blog::all();
        return Excel::download(new BlogExport($blog), 'blogs.xlsx');
    }
    
}