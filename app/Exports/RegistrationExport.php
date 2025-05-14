<?php

namespace App\Exports;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RegistrationExport implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct(Collection $data)
    {
        $this->data = $data;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->data->map(function ($row) {

            $createdAtUTC = $row->created_at;
            $createdAtIST = Carbon::parse($row->created_at)
                ->setTimezone('Asia/Kolkata')
                ->format('Y-m-d H:i:s');

            return [
                $row->id,
                $row->full_name,
                $row->school_name,
                $row->designation,
                $row->email,
                $row->mobile_number,
                $row->preferred_month,
                $row->estimated_participants,
                $row->additional_notes,
                // $row->created_at,
                // $row->updated_at,  
                $createdAtUTC,
                $createdAtIST, // New IST Time Column
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Full Name',
            'School Name',
            'Designation',
            'Email',
            'Mobile Number',
            'Preferred Month',
            'Estimated Participants',
            'Additional Notes',
            // 'Created At',
            // 'Updated At',    
            'Created At (UTC)',
            'Created At (IST)', // New Heading 
        ];
    }
}
