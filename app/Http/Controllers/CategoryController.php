<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryController;
use App\Http\Requests\UpdateCategoryController;
use Illuminate\Support\Facades\Gate;

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
        $data = $request->all();
        if ($request->hasFile("image")) {
            $categoryImage = $request["image"];
            $path = $categoryImage->store("uploadedImage", 'categories_images');
            $data["image"] = $path;
        }

        categories::create($data);
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
        $allowUser = Gate::inspect("update", $category);
        if ($allowUser->allowed()) {
            $category->update($request->all());
            return to_route("category.index");
        };
        return abort(403);
    }
    public function destroy(categories $category)
    {
        if (Gate::allows('is_admin')) {
            if ($category->image) {
                unlink("images/uploads/{$category->image}");
            }
            $category->delete();
            return to_route("category.index");
        }
        return abort(403);
    }
}
