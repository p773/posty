@extends('layouts.app')


@section('content')

<div class="flex justify-center">
  <div class="w-8/12">
      
      
      <div class="bg-white p-6 rounded-lg">
        <div class="text-center"><i class="far fa-comments"></i></div>

        <form action="{{ route('messages') }}" method="post" class="mb-4">
          @csrf
          <div class="mb-1">
              <label for="body" class="sr-only">Body</label>
              <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Napisz wiadomość do użytkownika"></textarea>

              @error('body')
                  <div class="text-red-500 mt-2 text-sm">
                      {{ $message }}
                      </div>
              @enderror
          </div>
        <input  name="user" type="hidden" value="{{ $receiverr->id}}">
          <input  name="receiver_name" type="hidden" value="{{ $receiverr->name}}">
          <div>
              <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium ">Wyślij</button>
          </div>
      </form>
    
        @foreach ($messages as $message)  
        @if ($messages->count())
          @if ($message->user_id === $user)<div class="bg-gray-100 mb-2 p-2 rounded-lg"> @else <div class=" mb-2 p-2 text-right">  @endif

                    <span class="text-grey-600 text-sm"> <a href="{{ route('users.posts',  $message->user->name ) }}" class="font-bold"> {{$message->user->name}}</a> {{ $message->created_at->diffForHumans() }}</span>
                    <p class="mb-2  "> {{ $message->body}} </p>
           
                </div> 
        @else
            <p>There are no messages</p>
        @endif               
      @endforeach

      </div>
  </div>              
</div>
@endsection