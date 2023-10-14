<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserExport;


class UserController extends Controller
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
    // Sử dụng transaction để đảm bảo tính toàn vẹn của dữ liệu
    DB::beginTransaction();

    try {
        $user = new User;
        
        $dateofbirth = $request->Year+"/"+$request->Month+"/"+$request->Day;
        $user->FirstName = $request->FirstName;
        $user->LastName = $request->LastName;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->Phone = $request->Phone;
        $user->Gender = $request->Gender;
        $user->password = Hash::make($request->password);
        $user->CityID = $request->CityID;
        $user->DistrictID = $request->DistrictID;
        $user->Address = $request->Address;
        $user->DateOfBirth = $dateofbirth;
        if(!isset($user->Avatar)){
            $user->Avatar = null;
        } else{
            $user->Avatar = $request->Avatar;
        }
        $user->save();

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
    public function update(Request $request, $id)
    {
        try {
    DB::beginTransaction();

    $user = User::find($id);
    if (!$user) {
        DB::rollback(); // Rollback the transaction if the user is not found
        return response()->json(['message' => 'User not found'], 404);
    }

        $dateofbirth = $request->Year+"/"+$request->Month+"/"+$request->Day;
            $user->FirstName = $request->FirstName;
            $user->LastName = $request->LastName;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->Phone = $request->Phone;
            $user->Gender = $request->Gender;
            $user->password = Hash::make($request->password);
            $user->CityID = $request->CityID;
            $user->DistrictID = $request->DistrictID;
            $user->Address = $request->Address;
            $user->DateOfBirth = $dateofbirth;
            if(!isset($user->Avatar)){
                $user->Avatar = null;
            } else{
                $user->Avatar = $request->Avatar;
            }

        $user->save();

        DB::commit(); // Commit the transaction if everything is successful
        return "Insert thành công"; // Return success message
    } catch (\Exception $e) {
        DB::rollback(); // Rollback the transaction in case of any exception
        return response()->json(['message' => 'An error occurred'], 500); // Return an error response
    }
        
        
        
        //   $user->RoleID = 1
        
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        DB::beginTransaction();

    try {
        $user = User::find($id);

        if (!$user) {
            DB::rollback(); // Rollback transaction nếu người dùng không tồn tại
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        // Nếu mọi thứ đều thành công, thì chúng ta commit transaction
        DB::commit();

        return response()->json(['message' => 'User deleted'], 200);
    } catch (\Exception $e) {
        // Nếu có lỗi xảy ra, thì chúng ta rollback transaction
        DB::rollback();

        // Bạn có thể xử lý lỗi ở đây hoặc ném ngoại lệ để Laravel xử lý nó
        return response()->json(['message' => 'Delete failed: ' . $e->getMessage()], 500);
    }
    }
    public function export(){
        $user = User::all();
        return Excel::download(new UserExport($admin), 'users.xlsx');
    }
}