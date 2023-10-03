<?php

namespace App\Exports;

use App\Models\ProductChannel;
use Maatwebsite\Excel\Concerns\FromCollection;


class ProductChannelExport implements FromArray, WithHeadings, WithMapping
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
            'product_channelID',
            'ChannelID',
            'ProductID',
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
            $row['ServiceIDproduct_channelID'],
            $row['ChannelID'], 
            $row['ProductID'],
        ];
    }
}