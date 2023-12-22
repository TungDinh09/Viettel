<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel,WithHeadingRow
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
        return new Product([
            //
            'ProductID'=> $row['productid'],
            'ProductName'=> $row['productname'],
            'Speed' => $row['speed'],
            'Bandwidth' => $row['bandwidth'],
            'Price' => $row['price'],
            'Gift' => $row['gift'],
            'Description' => $row['description'],
            'IPstatic' => $row['ipstatic'],
            'UseDay' => $row['useday'],
            'CategoryID' => $row['categoryid'],
            'ServiceID' => $row['serviceid'],

        ]);
    }
}