<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class OrderBackUpExport implements FromArray, WithHeadings, WithMapping
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
            'DateStart',
            'ServicePrice',
            'UserID',
            'PaymentID',
            'ProductID',
            'ServiceID',
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
            $row['DateStart'],
            $row['ServicePrice'],
            $row['UserID'],
            $row['PaymentID'],
            $row['ProductID'],
            $row['ServiceID'],
        ];
    }
}