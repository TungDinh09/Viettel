<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Exports\DistrictExport;
use Illuminate\Support\Facades\DB;
use App\Imports\DistrictImport;
use Maatwebsite\Excel\Facades\Excel;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $districts = District::all();

        // Trả về dữ liệu sản phẩm dưới dạng JSON
        return response()->json(['districts' => $districts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){

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
            'DistrictName'=>'required|unique:Channels',
            'CityID'=> 'required'
        ]);
        $district = new District();
        $district->DistrictName = $request->input('DistrictName');
        $district->CityID = $request->input('CityID');
        $district->save();

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
        $district = District::find($id);

        if (!$district) {
            DB::rollback(); // Rollback transaction nếu quận huyện không tồn tại
            return response()->json(['message' => 'District not found'], 404);
        }

        $district->DistrictName = $request->input('DistrictName');
        $district->CityID = $request->input('CityID');
        $district->save();

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
        $district = District::find($id);

        if (!$district) {
            DB::rollback(); // Rollback transaction nếu quận huyện không tồn tại
            return response()->json(['message' => 'District not found'], 404);
        }

        $district->delete();

        // Nếu mọi thứ đều thành công, thì chúng ta commit transaction
        DB::commit();

        return response()->json(['message' => 'District deleted'], 200);
    } catch (\Exception $e) {
        // Nếu có lỗi xảy ra, thì chúng ta rollback transaction
        DB::rollback();

        // Bạn có thể xử lý lỗi ở đây hoặc ném ngoại lệ để Laravel xử lý nó
        return response()->json(['message' => 'Delete failed: ' . $e->getMessage()], 500);
    }
    }
    public function export(){
        $districts = District::all();
        return Excel::download(new DistrictExport($districts), 'districts.xlsx');
    }
    public function import(Request $request){
        // $filePath = "C:\\Users\\tungd\\Downloads\\cities.xlsx";
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Lấy đường dẫn tuyệt đối tạm thời cho tệp tin
            $filePath = $file->getRealPath();

            // Import dữ liệu từ tệp tin Excel bằng thư viện Maatwebsite\Excel
            Excel::import(new DistrictImport, $filePath);

            // Thực hiện xử lý khác (nếu cần)


        }
        // chua code route
    }
}
