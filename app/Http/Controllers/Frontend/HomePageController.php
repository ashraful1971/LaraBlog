<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $this->data['posts'] = Post::latest()->paginate(6);
        $this->data['main_posts'] = $this->data['posts'];
        $this->data['categories'] = Category::latest()->get();

        return view('frontend.homepage', $this->data);
    }
}
