<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Post\PostStoreRequest;
use App\Http\Requests\Dashboard\Post\PostUpdateRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use mysql_xdevapi\Result;
use Throwable;


// CatrgoryController-ში დაგიწერე შენიშვნები აქაც იგივეა, 

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $posts=Post::query()->with('category');
        if($request->has('search') && !empty($request->search)){
            $posts->where('title', 'like', '%'.$request->search.'%');
        }
        $query= $posts->latest()->paginate(2)->appends(request()->query());

        return view('dashboard.posts.index',[
            'title'=>'posts',
            'posts'=>$query,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Category::query()->get() => 'SELECT * FROM categories'
        return view('dashboard.posts.create',[
            'categories'=>Category::query()->get(),
        ]);
    }


    /**
     * @throws Throwable
     */
    public function store(PostStoreRequest $request){
        try {
            DB::beginTransaction();
            $post = new Post();
            $post->category_id=$request->category_id;
            $post->title=$request->title;
            $post->description=$request->description;
            if($post->save()) {
                // When we have BelongsToMany Relation
                // $post->categories()->attach($request->category_id);
                foreach ($request->file('images') as $key => $item) {
                    $fileExt = $item->getClientOriginalExtension();
                    $fileNewName = time() . rand(1, 9000) . '.' . $fileExt;
                    $item->storeAs('images', $fileNewName, 'public');
                    $image = new PostImage();
                    $image->post_id = $post->id;
                    $image->name = $fileNewName;
                    $image->sort = $key + 1;
                    $image->save();
                }
            }
            DB::commit();
        } catch( Throwable $exception ){
            DB::rollBack();

            throw new \Exception($exception->getMessage());
        }
        return redirect()->route('dashboard.posts.index');
    }




    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return view('dashboard.posts.show',[
            'posts'=>Post::query()->findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // ფოტოს რედაქტირება არ გაქვს
    // რომ მომინდეს რა ვქნა??? :))
    public function edit(int $id)
    {
        $post = Post::query()->findOrFail($id);
        // $selectedCategories=$post->categories()->select('id')->get()->pluck('id')->toArray();
        $selectedCategories=[$post->category_id];
        return view('dashboard.posts.edit',[
            'post' => $post,
            
            // 'categories'=>Category::query()->get(),
            'categories' => Category::all(),
            'selectedCategories'=>$selectedCategories,
        ]);

    }

    /**
     * @throws Throwable
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, string $id)
    {
        try {
            DB::beginTransaction();
            $post = Post::query()->find($id);
//        $post->category_id=$request->category_id;
            $post->title=$request->title;
            $post->description=$request->description;
            if($post->save()){
                // $post->categories()->sync($request->category_id);
                $post->category_id = $request->category_id[0];
                $post->save();
            }

            DB::commit();
        } catch(Throwable $exception){
            DB::rollBack();
            throw new Exception($exception->getMessage());
        }







        return redirect()->route('dashboard.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $post_id)
    {
        Post::query()->find($post_id)->delete();
        return redirect()->route('dashboard.posts.index');
    }
}
