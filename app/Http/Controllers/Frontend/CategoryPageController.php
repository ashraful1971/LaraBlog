<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryPageController extends Controller
{
    public function show($slug)
    {
        $this->data['posts'] = Post::latest()->get();
        $this->data['main_posts'] = Post::whereHas('category', function($q) use ($slug){
            $q->where('slug', $slug);
        })->paginate(6);
        $this->data['categories'] = Category::latest()->get();

        return view('frontend.categorypage', $this->data);
    }
}
