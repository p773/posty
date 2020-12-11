<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        $posts = Post::latest()->with(['user', 'likes'])->paginate(4); // $posts = Post::latest()->with(['user', 'likes'])->paginate(20);

        return view('dashboard', [
            'posts' => $posts
        ]);
        //return view('dashboard');
    }

    public function showcat (Request $category) {
        //var_dump($category);
        //die;
        //dd($category);
        //$posts = Post::latest()->where('category', $category);// 
    
        $posts = Post::where('category', $category->category)->paginate(4);
       // dd($posts);
        //->take(10) ->with(['user', 'likes'])->
          
        //->get()
        
        //var_dump($pages);
        //die;
        //return view ('dashboard')->with('posts', $post);

        return view ('dashboard')->with('posts', $posts); }

        //return view('dashboard', [ 'posts' => $posts  ]); }

               //$post = Page::find($id);
        //$pages = Page::all();
        //$cat = $_GET['cat'];
        //$pages = Page::find($category);
      
        public function showcatt ($category) {
            //var_dump($category);
            //die;
            //dd($category);
            //$posts = Post::latest()->where('category', $category);// 
            $posts = Post::where('category', $category->category)->paginate(4);
           // dd($posts);
            //->take(10) ->with(['user', 'likes'])->
              
            //->get()
            
            //var_dump($pages);
            //die;
            //return view ('dashboard')->with('posts', $post);
    
            return view ('dashboard')->with('posts', $posts); }





            public function popular()
            {
               
                //$posts = Post::withCount('likes')->with(['user', 'likes'])->paginate(4)->get();
                $posts = Post::withCount('likes')->orderByDesc('likes_count')->paginate(4);
                // $posts = Post::latest()->with(['user', 'likes'])->paginate(20);
               //$sorted = $posts->sortBy('likes')->paginate(4);
                return view('dashboard', [
                    'posts' => $posts
                ]);
            }

            public function commented()
            {
                $posts = Post::withCount('comments')->orderByDesc('comments_count')->paginate(4); // $posts = Post::latest()->with(['user', 'likes'])->paginate(20);

                return view('dashboard', [
                    'posts' => $posts
                ]);
            }

            public function oldest()
            {
                $posts = Post::oldest()->with(['user', 'likes'])->paginate(4); // $posts = Post::latest()->with(['user', 'likes'])->paginate(20);

                return view('dashboard', [
                    'posts' => $posts
                ]);
            }





}