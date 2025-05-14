<?php

namespace App\Exports;

use App\Models\Enroll;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EnrollsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Fetch all enrolls data
        $enrolls = DB::table('enrolls')
            ->select(
                'full_name',
                'school_name',
                'designation',
                'email',
                'phone',
                'category',
                'course_title',
                'created_at'
            )
            ->orderByDesc('created_at')
            ->get();

        // Format the data to include both UTC and IST
        $formatted = $enrolls->map(function ($row) {
            $createdAtUTC = $row->created_at;
            $createdAtIST = Carbon::parse($row->created_at)
                ->setTimezone('Asia/Kolkata')
                ->format('Y-m-d H:i:s');

            return [
                'full_name'     => $row->full_name,
                'school_name'   => $row->school_name,
                'designation'   => $row->designation,
                'email'         => $row->email,
                'phone'         => $row->phone,
                'category'      => $row->category,
                'course_title'  => $row->course_title,
                'created_at_utc' => $createdAtUTC,
                'created_at_ist' => $createdAtIST,
            ];
        });

        return $formatted;
    }

    public function headings(): array
    {
        return [
            'Full Name',
            'School Name',
            'Designation',
            'Email',
            'Phone',
            'Category',
            'Course Title',
            'Created At (UTC)',    
            'Created At (IST)',   
        ]; 
    }
}
