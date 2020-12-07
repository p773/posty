<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;

class UserPostController extends Controller
{
    public function index(User $user)
    {
        $posts = $user->posts()->latest()->with(['user','likes'])->paginate(20);
        // $posts = Post::latest()->with(['user', 'likes'])->paginate(4); //
        return view ('users.posts.index',[
            'user' => $user,
            'posts' =>  $posts ]);
    }
}
