<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
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
        $admin = new Admin();
        $dateofbirth = $request->Year . "/" . $request->Month . "/" . $request->Day;
        $admin->FirstName = $request->FirstName;
        $admin->LastName = $request->LastName;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->Phone = $request->Phone;
        $admin->Gender = $request->Gender;
        $admin->password = Hash::make($request->password);
        $admin->Address = $request->Address;
        $admin->DateOfBirth = $dateofbirth;

        // Kiểm tra xem có tải lên hình ảnh (Avatar) hay không
        if ($request->hasFile('Avatar')) {
            $avatarPath = $request->file('Avatar')->store('avatars', 'public');
            $admin->Avatar = $avatarPath;
        } else {
            $admin->Avatar = null;
        }

        $admin->save();

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
    public function update(Request $request,  $id)
    {
        DB::beginTransaction();

    try {
        $admin = Admin::find($id);

        if (!$admin) {
            DB::rollback(); // Rollback transaction nếu quản trị viên không tồn tại
            return response()->json(['message' => 'Admin not found'], 404);
        }

        $dateofbirth = $request->Year . "/" . $request->Month . "/" . $request->Day;
        $admin->FirstName = $request->FirstName;
        $admin->LastName = $request->LastName;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->Phone = $request->Phone;
        $admin->Gender = $request->Gender;
        $admin->password = Hash::make($request->password);
        $admin->Address = $request->Address;
        $admin->DateOfBirth = $dateofbirth;

        // Kiểm tra xem có tải lên hình ảnh (Avatar) hay không
        if ($request->hasFile('Avatar')) {
            $avatarPath = $request->file('Avatar')->store('avatars', 'public');
            $admin->Avatar = $avatarPath;
        } else {
            $admin->Avatar = null;
        }

        $admin->save();

        // Nếu mọi thứ đều thành công, thì chúng ta commit transaction
        DB::commit();

        return "Cập nhật thành công";
    } catch (\Exception $e) {
        // Nếu có lỗi xảy ra, thì chúng ta rollback transaction
        DB::rollback();

        // Bạn có thể xử lý lỗi ở đây hoặc ném ngoại lệ để Laravel xử lý nó
        return "Cập nhật thất bại: " . $e->getMessage();
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
       DB::beginTransaction();

    try {
        $admin = Admin::find($id);

        if (!$admin) {
            DB::rollback(); // Rollback transaction nếu quản trị viên không tồn tại
            return response()->json(['message' => 'Admin not found'], 404);
        }

        $admin->delete();

        // Nếu mọi thứ đều thành công, thì chúng ta commit transaction
        DB::commit();

        return response()->json(['message' => 'Admin deleted'], 200);
    } catch (\Exception $e) {
        // Nếu có lỗi xảy ra, thì chúng ta rollback transaction
        DB::rollback();

        // Bạn có thể xử lý lỗi ở đây hoặc ném ngoại lệ để Laravel xử lý nó
        return response()->json(['message' => 'Delete failed: ' . $e->getMessage()], 500);
    }
        
    }
}