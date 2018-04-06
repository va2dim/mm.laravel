<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);

        return view('categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'description' => 'required',
            ]
        );

        $category = Category::updateOrCreate([
                'id' => $request->id
            ], [
                'name' => $request->name,
                'description' => $request->description,
        ]);

        return redirect('categories/'.$category->id);

    }

    public function show(Category $category)
    {

        return view('categories.show', ['category' => $category]);
    }

    public function update(Category $category)
    {

        return view('categories.update', ['category' => $category]);
    }

    public function destroy(Category $category)
    {
        Category::destroy($category->id);

        return redirect('categories/');
    }
}
