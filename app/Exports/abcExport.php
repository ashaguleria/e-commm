<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class abcExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    // protected $dateForm;
    // protected $dateTo;
    // public function __construct($dateForm, $dateTo)
    // {
    //     $this->dateForm = $dateForm;
    //     $this->dateTo = $dateTo;
    // }

    protected $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function Collection()
    {
        return collect($this->data);

    }
    public function headings(): array
    {
        return [
            'id',
            'name',
            'email',
            'phone',
            'address',
            'created_at',
            'updated_at',

        ];
    }
}