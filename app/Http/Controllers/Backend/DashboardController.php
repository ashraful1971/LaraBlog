<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $this->data['posts'] = Post::count();
        $this->data['categories'] = Category::count();
        $this->data['users'] = User::count();
        return view('backend/dashboard', $this->data);
    }
}
