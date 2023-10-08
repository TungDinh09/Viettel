<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Support\Facades\DB;
use App\Exports\CityExport;
use App\Imports\CitiesImport;
use Maatwebsite\Excel\Facades\Excel;


class CityController extends Controller
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
        $city = new City();
        $city->CityName = $request->input('CityName');
        $city->save();

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
    public function show( $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
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
        $city = City::find($id);

        if (!$city) {
            DB::rollback(); // Rollback transaction nếu thành phố không tồn tại
            return response()->json(['message' => 'City not found'], 404);
        }

        $city->CityName = $request->input('CityName');
        $city->save();

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
        DB::beginTransaction();

    try {
        $city = City::find($id);

        if (!$city) {
            DB::rollback(); // Rollback transaction nếu thành phố không tồn tại
            return response()->json(['message' => 'City not found'], 404);
        }

        $city->delete();

        // Nếu mọi thứ đều thành công, thì chúng ta commit transaction
        DB::commit();

        return response()->json(['message' => 'City deleted'], 200);
    } catch (\Exception $e) {
        // Nếu có lỗi xảy ra, thì chúng ta rollback transaction
        DB::rollback();

        // Bạn có thể xử lý lỗi ở đây hoặc ném ngoại lệ để Laravel xử lý nó
        return response()->json(['message' => 'Delete failed: ' . $e->getMessage()], 500);
    }
    }
    public function export(){
        $cities = City::all();
        return Excel::download(new CityExport($cities), 'cities.xlsx');
    }
    public function showForm()
{
    return view('import');
}

public function import(Request $request)
{
    // $request->validate([
    //     'file' => 'required|mimes:xlsx,xls',
    // ]);

    Excel::import(new CitiesImport, $request->file('file'));

    return redirect('/import')->with('success', 'Excel file imported successfully.');
}
}
