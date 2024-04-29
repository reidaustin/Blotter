<?php

namespace App\Exports;

use App\Models\Tour;
use Maatwebsite\Excel\Concerns\FromCollection;

class ToursExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tour::all();
    }
}
