<?php

namespace App\Imports;

use App\Models\Admin;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AdminImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
    }
    public function headingRow() : int
    {
        return 1;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            //
            'id'=> $row['id'],
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => $row['password'],
            'Phone' => $row['phone'],
            'Avatar' => $row['avatar'],
            'Gender' => $row['gender'],
            'Address' => $row['address'],
            'DateOfBirth' => $row['dateofbirth'],
            'FirstName' => $row['firstname'],
            'LastName' => $row['lastname'],
        ]);
    }
}