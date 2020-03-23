<?php

namespace App\Imports;

use App\Item;
use Maatwebsite\Excel\Concerns\ToModel;

class ItemsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Item([
            'title' => $row['title'],
            'platform' => $row['platform'],
            'region' => $row['region.title'],
            'type' => $row['type'],
            'condition' => $row['condition'],
            'acquired_at' => $row['acquired_at'],
            'acquisition' => $row['acquisition'],
            'purchase_price' => $row['purchase_price'],
            'notes' => $row['notes'],
            'private_notes' => $row['private_notes'],
            'tags' => array_map('trim', explode(',', $row['tags'])),
        ]);
    }
}
