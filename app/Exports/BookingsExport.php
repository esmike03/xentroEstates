<?php

namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookingsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Booking::select('fname', 'lname', 'email', 'phone', 'property', 'inquiring', 'communication', 'notes', 'created_at')->get();
    }

    public function headings(): array
    {
        return [
            'First Name',
            'Last Name',
            'Email',
            'Phone Number',
            'Property',
            'Inquiring',
            'Communication',
            'Notes',
            'Date',
        ];
    }
}

