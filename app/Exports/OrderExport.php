<?php

namespace App\Exports;

// use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

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
            'ProductName',
            'ProductPrice',
            'Accept',
            'name',
            'Phone',
            'CityName',
            'DistrictName',
            'Address',
            'DateStart',
            'ServiceName',
            'ServicePrice',
            'PaymentName',
            
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
            $row['ProductName'],
            $row['ProductPrice'],
            $row['Accept'],
            $row['name'],
            $row['Phone'],
            $row['CityName'],
            $row['DistrictName'],
            $row['Address'],
            $row['DateStart'],
            $row['ServiceName'],
            $row['ServicePrice'],
            $row['PaymentName'],
            
            
        ];
    }
}