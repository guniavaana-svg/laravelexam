<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Category\CategoryStoreRequest;
use App\Http\Requests\Dashboard\Category\CategoryUpdateRequest;
// რომელი კლასებიც არ გჭირდება, გამოძახებული არ უნდა იყოს
use App\Models\Post;
use App\Http\Requests\Dashboard\Post\PostStoreRequest;
use App\Http\Requests\Dashboard\Post\PostUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // მეთოდში გამოუყენებელი პარამეტრები არ უნდა გქონდეს
    // Request $request არ გჭირდება, რადგან ამ მეთოდში არ გაქვს ძიების ლოგიკა, შესაბამისად არც პარამეტრი გჭირდება
    // გამოიყენე მაშინ როცა დაგჭირდება!!! 
    public function index(Request $request)
    {

        // ძიების ლოგიკა არ გაქვს

        return view('dashboard.categories.index', [
            // ცვლადს რომელსაც არ იყენებ არ უნდა გადააწორო view-ში, (blade-ში)
            'name'=>'categories',
            'categories'=>Category::query()->where('is_active', true)->paginate(2),
        ]);
    }

    // დაკომენარებული რაღაცები მოაშორე ფაილიდან, რომელი ფუნქციებიც არ გჭირდება, ისიც მოაშორე

//    public function show(int $id)
//    {
//
//    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ამ კატეგორიესბ შექმნისთვის არ იყენებ 
        // შესაბამისად აქ არაფერი ესაქმება
        // ტყუილად აკითხავ ბაზას და მოგაქვს კატეგორტიები, რომლებსაც არ იყენებ

        // compact არ გამოიყენო, რადგან არ გჭირდება, უბრალოდ გადაეცი მასივში
        // როცა გჭირდება მონაცაემი მაშინ

        // index მეთოდში კარგად გაქვს

        $categories = Category::all(); // parent categories

        //return view('dashboard.categories.create', compact('categories'));
        return view('dashboard.categories.create', [
            'categories'=>$categories
        ]);
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
        $category = Category::query()->find($id);
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
       // კარგია მაგრამ არა ყოველთვის. მოთხოვნას გააჩნია თუ კატეგორიასთან ერთად პოსტებიც უნდა წაიშალოს მაშინ კი.
       // ძირითადათ არ ხდება ხოლმე ეგრე
       $category->posts()->delete(); //კატეგორიებთან ერთად პოსტების წაშლა
       $category->delete();
        return redirect()->route('dashboard.categories.index');
    }
}
