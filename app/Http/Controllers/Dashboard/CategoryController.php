<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\UpdateRequest;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categorias = Category::paginate(2);
        return view('dashboard.category.index', compact('categorias'));
    }

    public function create()
    {
        return view('dashboard.category.create');
    }

    public function store(StoreRequest $request)
    {   
        Category::create($request->validated());
        return to_route('category.index');
    }

    public function show(Category $category)
    {  
        return view('dashboard.category.show', ['categoria' => $category]);
    }

    public function edit(Category $category)
    {

        return view('dashboard.category.edit', compact('category'));
    }

   
    public function update(UpdateRequest $request, Category $category)
    {   
       
        $category->update($request->validated());
        return to_route('category.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('category.index');
    }
}
