<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['posts'] = Post::latest()->get();
        return view('backend.post.posts', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['categories'] = Category::all();
        return view('backend.post.add_post', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $image_name = '';
        $slug = str_replace(' ', '_', strtolower($request->slug ?? $request->title));
        $slug = preg_replace('/[^A-Za-z0-9\_]/', '', $slug ); // Removes special chars.

        // Checking if the image is added
        if($request->hasFile('image')){
            $image_name = $slug.'.'.$request->image->extension();

            //moving file
            $request->image->move(public_path('storage'), $image_name);
        }

        $post = Post::create([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'image' => $image_name,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id
        ]);
        return redirect()->back()->with('msg', 'New post has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['post'] = Post::findOrFail($id);
        $this->data['categories'] = Category::all();

        return view('backend.post.edit_post', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {

        //Checking if the user is owner of this post
        $post = Post::findOrFail($id);
        if($post->user_id != auth()->user()->id){
            return redirect()->back()->with('error_msg', 'You are not allowed to edit this post!');
        }

        $image_name = $post->image;
        $slug = str_replace(' ', '_', strtolower($request->slug ?? $request->title));
        $slug = preg_replace('/[^A-Za-z0-9\_]/', '', $slug ); // Removes special chars.

        // Checking if the image is added
        if($request->hasFile('image')){

            //removing old image if exist
            if($image_name){
                unlink(public_path('storage/'.$image_name));
            }

            $image_name = $slug.'.'.$request->image->extension();

            //moving file
            $request->image->move(public_path('storage'), $image_name);
        }

        $post->update([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'image' => $image_name,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id
        ]);
        return redirect()->back()->with('msg', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->back()->with('msg', 'Post has been removed!');
    }
}
