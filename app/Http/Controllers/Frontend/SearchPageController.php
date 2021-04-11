<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchPageController extends Controller
{
    public function index(Request $request)
    {
        $this->data['posts'] = Post::latest()->get();
        $this->data['main_posts'] = Post::where('title', 'like', '%'.$request->keyword.'%')->paginate(6);
        $this->data['categories'] = Category::latest()->get();

        return view('frontend.homepage', $this->data);
    }
}
