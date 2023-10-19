<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrderExport implements FromArray, WithHeadings, WithMapping
{
    protected $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return $this->data;
    // }
    
    /**
     * @return array
     */
    public function headings(): array{
        return [
            'OrderID',
            'ProductPrice',
            'Accept',
            'name',
            'Phone',
            'email',
            'CityName',
            'DistrictName',
            'Address',
            'DateStart',
            'ServicePrice',
            'UserID',
            'PaymentName',
            'ProductName',
            'ServiceName',
        ];
    }
    /**
    * @return array
    */
    public function array(): array{
        return $this->data->toArray();
    }
    /**
     * @param mixed $row
     * @return array
     */
    public function map($row): array{
        return [
            $row['OrderID'],
            $row['ProductPrice'],
            $row['Accept'],
            $row['name'],
            $row['Phone'],
            $row['email'],
            $row['CityName'],
            $row['DistrictName'],
            $row['Address'],
            $row['DateStart'],
            $row['ServicePrice'],
            $row['UserID'],
            $row['PaymentName'],
            $row['ProductName'],
            $row['ServiceName'],
        ];
    }
}