<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Comment;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }
    
    public function index()
    {
        $posts = Post::latest()->with(['user', 'likes'])->paginate(4); // $posts = Post::latest()->with(['user', 'likes'])->paginate(20);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    


    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
            'category' => 'required',
            'title' => 'required'
        ]);

        //$request->user()->posts()->create($request->with('body','category','title'));
                                                //->only('body'));

        $request->user()->posts()->create([
        'body' => request('body'),
        'category' => request('category'),
        'title' => request('title'),
                                        ]);

        return back();
    }

    public function destroy(Post $post)
    {
        

        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }

    public function comment(Post $post)

    {   $comments = Comment::latest()->where('post_id', $post->id)->paginate(5);
       
        //$comments = $post->latest()->with(['user'])->paginate(5);
        //$comments = Comment::latest()->with(['user'])->paginate(5);
        //$posts = $user->latest()->with(['user','likes'])->paginate(20);
        return view('posts.comments', [
            'comments' => $comments,
            'post' => $post
        ]);
    }

    public function save(Post $post, Request $comment)
    {
        $this->validate($comment, [
            'body' => 'required'
        ]);
            //Comment::create($comment->all());
            //$comment->post()->comments()->create([
                //'body'=> $comment->body ]);

              // Post::create([
                //'body' => request('body'),
                //'user_id' => auth()->id() 
           // ]);

           //$post = Post::find(1);

           $post->comments()->create([
            'body' => request('body'),
            'user_id'=>auth()->user()->id,
]);

        return back();
    }

}





