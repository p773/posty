<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Symfony\Component\Mime\Message;
use App\Models\User;
use App\Models\Post;
use App\Models\Message;
use App\Models\message as AppMessage;

class MessageController extends Controller
{
    //
    public function index()
    {   
        $user = auth()->user()->id;
        $messages = Message::latest()->where('user_id', $user)->orWhere('receiver_id', $user)->get(); // $posts = Post::latest()->with(['user', 'likes'])->paginate(20);
        $users = User::all();
        
        
        //$plucked = $messages->pluck('user_id', 'receiver_id');

        $users = $messages->pluck('user_id');//only('user_id');
        $receivers = $messages->pluck('receiver_id');//only(['receiver_id']);
        $concatenated = $users->concat($receivers);
        //$concatenated->duplicates();

        //dd($concatenated);

        //dd($);
        return view('users.messages', [
            'messages' => $messages,
            'user' => $user,
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        //$user = request('user');
        $this->validate($request, [
            'body' => 'required',
          
        ]);
         //   dd($user);
        //$request->user()->posts()->create($request->with('body','category','title'));
                                                //->only('body'));

        $request->user()->messages()->create([
        'body' => request('body'),
        'user_id'=>auth()->user()->id,
        'receiver_id' => request('user'),
                                        ]);

        return back();
    }





}
