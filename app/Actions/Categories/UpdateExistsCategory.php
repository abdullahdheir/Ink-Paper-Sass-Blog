<?php

namespace App\Actions\Categories;

use App\Models\Category;

class UpdateExistsCategory
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function __invoke(array $data, int $id)
    {
        Category::findOrFail($id)->update($data);
    }
}
