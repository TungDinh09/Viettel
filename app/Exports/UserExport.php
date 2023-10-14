<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UserExport implements FromArray, WithHeadings, WithMapping
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
            'UserID',
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
            'CityID',
            'DistrictID',
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
            $row['UserID'],
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
            $row['CityID'],
            $row[ 'DistrictID'],
            $row['email_verified_at'],
            $row['rememberToken'],
            $row[ 'timestamps'],
        ];
    }
}