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
        //dd($user);
        // $posts = Post::latest()->with(['user', 'likes'])->paginate(4); //
        return view ('users.posts.index',[
            'user' => $user,
            'posts' =>  $posts ]);
    }

    public function index2($user_ID)
    {
        $user =User::where('id', $user_ID)->first();
        $posts = $user->posts()->latest()->with(['user','likes'])->paginate(20);
        //dd($user);
        // $posts = Post::latest()->with(['user', 'likes'])->paginate(4); //
        return view ('users.posts.index',[
            'user' => $user,
            'posts' =>  $posts ]);
    }

    public function all()
    {
        $users =User::all();
        //$posts = $user->posts()->latest()->with(['user','likes'])->paginate(20);
        //$posts = $user->posts()->latest()->with(['user','likes'])->paginate(20);
        //dd($user);
        // $posts = Post::latest()->with(['user', 'likes'])->paginate(4); //
        return view ('users.users',[
            'users' => $users,
          //  'posts' =>  $posts 
            ]);
    }

   

    
    public function all_AZ()
    {
        $users =User::orderBy('name')->get();
        //$posts = $user->posts()->latest()->with(['user','likes'])->paginate(20);
        //$posts = $user->posts()->latest()->with(['user','likes'])->paginate(20);
        //dd($user);
        // $posts = Post::latest()->with(['user', 'likes'])->paginate(4); //
        return view ('users.users',[
            'users' => $users,
          //  'posts' =>  $posts 
            ]);
    }

    public function latest()
    {
        $users =User::latest()->get();
        //$posts = $user->posts()->latest()->with(['user','likes'])->paginate(20);
        //$posts = $user->posts()->latest()->with(['user','likes'])->paginate(20);
        //dd($user);
        // $posts = Post::latest()->with(['user', 'likes'])->paginate(4); //
        return view ('users.users',[
            'users' => $users,
          //  'posts' =>  $posts 
            ]);
    }

    public function popular()
    {
       
        //$posts = Post::withCount('likes')->with(['user', 'likes'])->paginate(4)->get();
        $users = User::with(['posts', 'likes'])->withCount('receivedLikes')->orderByDesc('likes_count')->get()->paginate(4);
        
        //$user->posts()->latest()->with(['user','likes'])-
        // $posts = Post::latest()->with(['user', 'likes'])->paginate(20);
       //$sorted = $posts->sortBy('likes')->paginate(4);
       //dd($users);
       return view ('users.users',[
        'users' => $users,
      //  'posts' =>  $posts 
        ]);
    }

}
