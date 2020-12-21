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
        'receiver_name' => request('receiver_name'),
                                        ]);

        return back();
    }

            public function chat($receiver)
            {   
                $user = auth()->user()->id;
                //$messages = Message::latest()->where('user_id', $user)->orWhere('receiver_id', $receiver)->get(); // $posts = Post::latest()->with(['user', 'likes'])->paginate(20);
                //->Where('user_id', $receiver)->orWhere('receiver_id', $receiver)
                $messages  = Message::latest()->Where([['user_id', $user],[ 'receiver_id', $receiver]])->orWhere([['user_id', $receiver ],[ 'receiver_id', $user]])->get();
                //Model::where([['email','=',$email],['password','=', $password]])
                //->where('user_id', '=',  $user)
                //->where('receiver_id', '=', $user)
             
                
               
                
                $users = User::all();
                $receiverr= User::where('id', $receiver)->first();
                
                //$plucked = $messages->pluck('user_id', 'receiver_id');

                $users = $messages->pluck('user_id');//only('user_id');
                $receivers = $messages->pluck('receiver_id');//only(['receiver_id']);
                $concatenated = $users->concat($receivers);
                //$concatenated->duplicates();

                //dd($concatenated);

                //dd($receiverr);
                return view('users.chat', [
                    'messages' => $messages,
                    'user' => $user,
                    'users' => $users,
                    'receiverr' => $receiverr

                ]);
            }



}
