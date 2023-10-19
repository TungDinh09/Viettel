<?php

namespace App\Imports;

use App\Models\Order;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OrderImport implements ToModel,WithHeadingRow
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
        return new Order([
            //
            'OrderID'=>$row['orderid'],
            'ProductPrice'=>$row['productprice'],
            'Accept'=>$row['accept'],
            'name'=>$row['name'],
            'Phone'=>$row['phone'],
            'email'=>$row['email'],
            'CityID'=>$row['cityid'],
            'DistrictID'=>$row['districtid'],
            'Address'=>$row['address'],
            'DateStart'=>$row['datestart'],
            'ServicePrice'=>$row['serviceprice'],
            'UserID'=>$row['userid'],
            'PaymentID'=>$row['paymentid'],
            'ProductID'=>$row['productid'],
            'ServiceID'=>$row['serviceid'],
        ]);
    }
    
}