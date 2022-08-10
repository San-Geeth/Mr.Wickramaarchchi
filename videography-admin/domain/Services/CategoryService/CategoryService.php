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


    public function store($data)
    {
        return $this->category->create($data);
    }

    public function get($category_id)
    {
        return $this->category->find($category_id);
    }

    public function update($category_id, array $data): void
    {
        $category = $this->category->find($category_id);
        $category->update($this->edit($category, $data));
    }


    protected function edit(Category $category, $data): array
    {
        return array_merge($category->toArray(), $data);
    }

    public function delete($category_id)
    {
        $category = $this->category->find($category_id);
        return $category->delete();
    }


    public function changeStatus($category_id)
    {
        $category = $this->category->find($category_id);

        if ($category->status == 0) {
            $category->status = 1;
            $category->update();
            return 1;
        } else {
            $category->status = 0;
            $category->update();
            return 0;
        }
    }
}
