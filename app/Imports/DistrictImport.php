<?php

namespace App\Imports;

use App\Models\District;
use Maatwebsite\Excel\Concerns\ToModel;

class DistrictImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // echo("haha");
        // print_r($row);
        return new City([
            'DistrictID'  => $row['districtid'],
           'DistrictName'  => $row['districtname'], 
           'CityID' => $row['cityid']
        ]);
    }
    public function headingRow(): int
    {
        return 1;
    }
}