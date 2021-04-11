<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostPageController extends Controller
{
    public function show($slug)
    {
        $this->data['posts'] = Post::latest()->get();
        $this->data['post'] = Post::where('slug', $slug)->first();
        $this->data['realted_posts'] = Post::where('category_id', $this->data['post']->category_id)->orderBy('title', 'desc')->limit(2)->get();
        $this->data['categories'] = Category::latest()->get();

        return view('frontend.postpage', $this->data);
    }
}
