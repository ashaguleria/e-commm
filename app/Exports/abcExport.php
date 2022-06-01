<?php

namespace App\Exports;

use App\Models\abc;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class abcExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return abc::all();
    }
    public function headings(): array
    {
        return [
            'id',
            'name',
            'email',
            'phone',
            'address',

        ];
    }
}