<?php

namespace App\Actions\Categories;

use App\Models\Category;

class CreateNewCategory
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public  function __invoke(array $data)
    {
        return Category::create($data);
    }
}
