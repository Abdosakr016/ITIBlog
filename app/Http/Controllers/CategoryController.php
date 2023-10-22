<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryController;
use App\Http\Requests\UpdateCategoryController;

class CategoryController extends Controller
{
    public function index()
    {
        $category = categories::paginate(5);
        return view("category.index", ["data" => $category], compact('category'));
    }
    public function create()
    {
        return view("category.create");
    }
    public function store(StoreCategoryController $request)
    {
        // request()->validate([
        //     "name" => "required|min:3",
        //     "category" => "required",
        //     "image" => "required"
        // ]);
        categories::create($request->all());
        return to_route("category.index");
    }
    public function show(categories $category)
    {
        return view("category.show", ["data" => $category]);
    }
    public function edit(categories $category)
    {
        return view("category.edit", ["data" => $category]);
    }
    public function update(UpdateCategoryController $request, categories $category)
    {
        $category->update($request->all());
        return to_route("category.index");
    }
    public function destroy(categories $category)
    {
        $category->delete();
        return to_route("category.index");
    }
}
