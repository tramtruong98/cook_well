<?php

namespace App\Imports;

use App\Models\Recipe;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RecipeImport implements ToModel, WithHeadingRow
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
        return new Recipe([
            'cate_id' => $row['cate_id'],
            'course_id' => $row['course_id'],
            'title' => $row['description'],
            'minutes' => $row['minutes'],
            'ingredients' => $row['ingredients'],
            'description' => $row['description'],
        ]);
    }
}
