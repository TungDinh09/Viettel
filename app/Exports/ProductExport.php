<?php

namespace App\Exports;

// use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class ProductExport implements FromArray, WithHeadings, WithMapping
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
            'ProductID' ,
            'ProductName',
            'Speed' ,
            'Bandwidth' ,
            'Price' ,
            'Gift',
            'Description',
            'IPstatic',
            'UseDay',
            'CategoryID',
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
            $row['ProductID'],
            $row['ProductName'],
            $row['Speed'], 
            $row['Bandwidth'],
            $row['Price'], 
            $row['Gift'].
            $row['Description'],
            $row['IPstatic'],
            $row['UseDay'],
            $row['CategoryID'],
            $row['ServiceID'],
        ];
    }
}