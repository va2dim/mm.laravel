<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(7);

        return view('categories.index', compact('categories'));
    }

    //TODO Смотри метод пост в роутинге
    public function store(Request $request)
    {
        $this->validate(
            request(),
            [
                'name' => 'required',
                'content' => 'required',
            ]
        );

        Category::updateOrCreate(
            [
                'id' => request('id'),
            ],
            [
                'name' => request('name'),
                'description' => request('description'),
            ]
        );


    }

    public function show(Category $category)
    {
        //echo $id->comments;
        /*$category = Category::where('id', $id)->first();
         $categoryComments = $category->getComments();
 */

        //return view('categories.show', compact('category', 'categoryComments'));
        return view('categories.show', ['category' => $category]);
    }

    public function update(Category $id)
    {

        //$category = Category::where('id', $id)->first();

        return view('categories.update', ['category' => $id]);
    }
}
