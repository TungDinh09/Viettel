<?php

namespace App\Imports;

use App\Models\City;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CityImport implements ToModel, WithHeadingRow
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
            'CityID'     => $row['cityid'],
           'CityName'    => $row['cityname'], 
        ]);
    }
    public function headingRow(): int
    {
        return 1;
    }
}