<?php

namespace App\Imports;

use App\Models\Channel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;

class ChannelsImport implements ToModel,WithHeadingRow
{
    /**
    * @param Collection $collection
    */

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
        return new Channel([
            //
            'ChannelID '=> $row['channelid'],
            'ChanelName' => $row['channelname'],
            'Price' => $row['price']
        ]);
    }
}
