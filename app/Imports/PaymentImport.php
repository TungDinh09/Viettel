<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Payment;

class PaymentImport implements ToModel,WithHeadingRow
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
        return new Payment([
            //
            'PaymentID '=> $row['paymentid'],
            'PaymentName' => $row['paymentname'],
            'PaymentDescription' => $row['paymentdescription'],
            'DayPayment' => $row['daypayment'],
        ]);
    }
}