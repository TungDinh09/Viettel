<?php

namespace App\Imports;

use App\Models\PaymentProduct;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PaymentProductsImport implements ToModel,WithHeadingRow
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
        return new PaymentProduct([
            //
            'PaymentProductID' => $row['paymentproductid'],
            'PaymentID '=> $row['paymentid'],
            'ProductID' => $row['productid'],
        ]);
    }
}