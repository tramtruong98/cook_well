<?php

namespace App\Imports;

use App\Models\Course;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CourseImport implements ToModel, WithHeadingRow, WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function headingRow() : int
    {
        return 1;
    }

    public function model(array $row)
    {
        return new Course([
            'cate_id' => $row['cate_id'],
            'name' => $row['name'],
            'description' => $row['description'],
        ]);
    }
    
    public function batchSize(): int
    {
        return 50;
    }
}
