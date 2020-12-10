<?php

namespace App\Imports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostImport implements ToModel, WithHeadingRow, WithBatchInserts
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
        return new Post([
            'cate_id' => $row['cate_id'],
            'course_id' => $row['course_id'],
            'recipe_id' => $row['recipe_id'],
            'image' => $row['picture'],
            'home_flag' => true,
            'blog_flag' => true,
        ]);
    }
    
    public function batchSize(): int
    {
        return 159;
    }
}
