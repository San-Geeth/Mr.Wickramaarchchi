<?php

namespace domain\Services\CategoryService;

use App\Models\Category;

class CategoryService
{
    protected $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function all()
    {
        return $this->category->all();
    }


    public function getActive()
    {
        return $this->category->getActive();
    }


    public function get($category_id)
    {
        return $this->category->find($category_id);
    }
}
