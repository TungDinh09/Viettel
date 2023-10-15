<?php

namespace App\Imports;

use App\Models\ProductChannel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Payment;


class ProductChannelImport implements ToModel,WithHeadingRow
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
        return new ProductChannel([
            //
            'ProductChannelID'=> $row['productchannelid'],
            'ChannelID' => $row['channelid'],
            'ProductID' => $row['productid'],

        ]);
    }
    
}