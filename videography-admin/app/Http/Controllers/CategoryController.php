<?php

namespace App\Http\Controllers;

use App\Traits\FormHelper;
use domain\Facades\CategoryFacade;
use Illuminate\Http\Request;

class CategoryController extends ParentController
{
    use FormHelper;


    public function index(Request $request)
    {
        $response['categories'] = CategoryFacade::all();
        $response['tc'] = $this;
        return view('Pages.Categories.all')->with($response);
    }

    public function store(Request $request)
    {
        CategoryFacade::store($request->all());
        $response['alert-success'] = 'Category Created Successfully';
        return redirect()->route('categories.all')->with($response);
    }

    public function edit(Request $request)
    {
        $response['category'] = CategoryFacade::get($request['category_id']);
        $response['tc'] = $this;
        return view('Pages.Categories.edit')->with($response);
    }

    public function update(Request $request,$category_id)
    {
        CategoryFacade::update($category_id,$request->all());
        $response['alert-success'] = 'Category Updated Successfully';
        return redirect()->route('categories.all')->with($response);
    }


    public function delete($category_id)
    {
        CategoryFacade::delete($category_id);
        $response['alert-success'] = 'Category Deleted Successfully';
        return redirect()->back()->with($response);
    }

    public function changeStatus($category_id)
    {
        $status = CategoryFacade::changeStatus($category_id);

        if ($status == 1) {
            $response['alert-success'] = 'Category Published successfully';
        } else {
            $response['alert-success'] = 'Category Drafted successfully';
        }
        return redirect()->back()->with($response);
    }
}
