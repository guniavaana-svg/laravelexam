<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Category\CategoryStoreRequest;
use App\Http\Requests\Dashboard\Category\CategoryUpdateRequest;
use App\Http\Requests\Dashboard\Post\PostStoreRequest;
use App\Http\Requests\Dashboard\Post\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {

        return view('dashboard.categories.index',[
            'name'=>'categories',
            'categories'=>Category::query()->where('is_active', true)->paginate(2),
        ]);
    }

//    public function show(int $id)
//    {
//
//    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); // parent categories

        return view('dashboard.categories.create', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $category=new Category();
        $category->name=$request->name;
        $category->is_active=$request->is_active;
        $category->save();
        return redirect()->route('dashboard.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
//    public function show(int $id)
//    {
//        return view('dashboard.categories.show',[
//            'category'=>Category::query()->findOrFail($id),
//        ]);
//    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        return view('dashboard.categories.edit',[
            'category' =>Category::query()->find($id),
        ]);
    }

    /**
     *
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, string $id)
    {
        $category =Category::query()->find($id);
        $category->name=$request->name;
        $category->is_active=$request->is_active;
        $category->save();

        return redirect()->route('dashboard.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $category=Category::query()->find($id);
       $category->posts()->delete();//ცატეგორიებთან ერთად პოსტების წაშლა
       $category->delete();
        return redirect()->route('dashboard.categories.index');
    }
}
