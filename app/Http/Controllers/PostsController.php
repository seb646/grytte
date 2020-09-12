<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->hasAnyRole(['administrator', 'manager'])){
            return view('posts.create');
        }
        return redirect('/dashboard/posts')->with('error', 'Insufficent permissions');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle file upload
        if($request->hasFile('cover_image')){
            // Get file name with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            // Get file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            // Create file name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload image
            $path = $request->file('cover_image')->storeAs('public/images/posts', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        // Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect()->to('/posts/'.$post->id.'/edit')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        // Check for correct user
        if(Auth::user()->id == $post->user_id){
            return view('posts.edit')->with('post', $post);
        }elseif(Auth::user()->hasAnyRole(['administrator', 'manager'])){
            return view('posts.edit')->with('post', $post);
        }

        return redirect('/dashboard/posts')->with('error', 'Insufficent permissions');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Create Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        // Handle file upload
        if($request->hasFile('cover_image')){
            // Get file name with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            // Get file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            // Create file name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload image
            $path = $request->file('cover_image')->storeAs('public/images/posts', $fileNameToStore);

            // Save new image
            $post->cover_image = $fileNameToStore;
        }

        $post->save();

        return redirect()->to('/posts/'.$id.'/edit')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        // Check for correct user
        if(auth()->user->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        // Check if image is unique
        if($post->cover_image != 'noimage.jpg'){
            // Delete image
            Storage::delete('public/images/posts/'.$post->cover_image);
        }

        $post->delete();

        return redirect('/posts')->with('success', 'Post Removed');
    }
}
