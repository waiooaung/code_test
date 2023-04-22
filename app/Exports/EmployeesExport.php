<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class EmployeesExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    use Exportable;

    public function headings(): array
    {
        return [
            'id',
            'name',
            'email',
            'password',
            'created_user_id',
            'created_at',
            'updated_at'
        ];
    }

    public function collection()
    {
        return Employee::orderByDesc('id','desc')->limit(10000)->get();
    }
}
