<?php

namespace App\Export;
use App\transaksi;
​
use Maatwebsite\Excel\Concerns\FromCollection;
​
class TransaksisReport implements FromCollection
{
    public function collection()
    {
        return transaksi::all();
    }
}