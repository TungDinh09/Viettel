<?php

namespace App\Exports;

use App\Models\Service;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class ServiceExport implements FromArray, WithHeadings, WithMapping
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
            'ServiceID',
            'ServiceName',
            'Price',
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
            $row['ServiceID'],
            $row['ServiceName'], 
            $row['Price'],
        ];
    }
}