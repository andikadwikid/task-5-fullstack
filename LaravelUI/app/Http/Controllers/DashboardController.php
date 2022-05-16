<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $category = Category::count();
        $article = Articles::count();
        $user = User::count();
        // dd($category);
        return view('welcome', compact('category', 'article', 'user'));
    }
}
