<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Models\Category;
use App\Models\Post;
use Dotenv\Util\Str;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     
       $posts = Post::orderBy('created_at','DESC')->paginate(8);

      
        return view('post.index', [
          
             'posts' => $posts 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $categories = Category::all();
        return view('post.create',[
            'categories' => $categories,
        ]);
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $request)
    {
        $data = $request->validated();

        $image = $data['image'];
        // unset($data['image']);

        $data['user_id'] = \Illuminate\Support\Facades\Auth::id(); // ✅ Now it will work
        $data['slug'] = \Illuminate\Support\Str::slug($data['title']);

        $imagePath = $image->store('posts', 'public');
        $data['image'] = $imagePath;

        Post::create($data);

        return redirect()->route('dashboard')->with('success', 'Post uploaded successfully!');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $username, Post $post)
    {
        return view('post.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
