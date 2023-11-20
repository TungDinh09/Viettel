<?php

namespace App\Exports;

use App\Models\Admin;
use Maatwebsite\Excel\Concerns\FromCollection;

class AdminExport implements FromArray, WithHeadings, WithMapping
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
            'id',
            'name',
            'email',
            'password',
            'Phone',
            'Avatar',
            'Gender',
            'Address',
            'DateOfBirth',
            'FirstName',
            'LastName',
            'email_verified_at',
            'rememberToken',
            'timestamps',
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
            $row['id'],
            $row[ 'name'],
            $row['email'],
            $row['password'],
            $row['Phone'],
            $row['Avatar'],
            $row['Gender'],
            $row['Address'],
            $row['DateOfBirth'],
            $row['FirstName'],
            $row['LastName'],
            $row['email_verified_at'],
            $row['rememberToken'],
            $row[ 'timestamps'],
        ];
    }
}