<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    ///////////////////////////////////////////////////////////////////////////
    /////////////////               Category                  /////////////////
    ///////////////////////////////////////////////////////////////////////////

    //INFO: Get all categories with the laravel paginate method
    public function getCategoriesPaginate(Request $request)
    {
        $paginatelimit = intval($request->query('limit')) ?: 10; // '?limit=10'
        return CategoryResource::collection(Category::orderBy('id', 'DESC')->paginate($paginatelimit));
    }

    //INFO: Get all categories
    public function getCategories()
    {
        return CategoryResource::collection(Category::orderBy('id', 'DESC')->get());
    }

    //INFO: Create a new category
    public function createCategory(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'name' => 'required|unique:categories|lowercase'
        ]);
        if ($validators->passes()) {
            Category::create([
                'name' => $request->input('name')
            ]);
            return Response::json(['state' => 'success', 'success' => 'Category created successfully']);
        }

        return Response::json(['state' => 'error', 'error' => $validators->getMessageBag()->toArray()]);
    }

    //INFO: Delete a existing category
    public function deleteCategory(string $id)
    {
        $category = Category::where('id', $id)->first();
        if ($category) {
            $category->delete();
            return Response::json(['state' => 'success', 'success' => 'Category deleted successfully']);
        }
        return Response::json(['state' => 'error', 'error' => 'Category not found!']);
    }
}
