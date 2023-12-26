<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class WithdrawExport implements FromCollection, WithHeadings
{
    private $withdraws;

    public function __construct(Collection $withdraws)
    {
        $this->withdraws = $withdraws;
    }

    public function collection()
    {
        return $this->withdraws;
    }

    public function headings(): array
    {
        // Customize the headings based on your database columns
        return [
            'ID',
            'Date',
            'User Name',
            'Bank',
            'Account Number',
            'UTR',
            'Withdraw Amount',
            'D Bonus',
            'Rolling',
            'Admin Status',
            'Banker Status',
            'CC Status',
            'Created By',
            
            // Add other headings...
        ];
    }
}
