<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
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
        $blog = new Blog;
        
        $blog->BlogContent = $request->BlogContent;
        $blog->BlogTilte = $request->BlogTilte;
        $blog->TilteImage = $blog->TilteImage;
        $blog->AdminID =  Auth::admin()->AdminID;
        $blog->save();
         return "Insert thanh cong";
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
        $blog = Blog::find($id);
        if (!$blog) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $blog->BlogContent = $request->BlogContent;
        $blog->BlogTilte = $request->BlogTilte;
        $blog->TilteImage = $blog->TilteImage;
        $blog->AdminID =  Auth::admin()->AdminID;
        $blog->save();
         return "Insert thanh cong";
    }

    /**
     * Remove the specified resource from storage.
     * 
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        if (!$blog) {
            return response()->json(['message' => 'Blog not found'], 404);
        }
        $blog->delete();
        return;
    }
}