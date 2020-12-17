@extends('layouts.app')


@section('content')

<div class="flex justify-center">
  <div class="w-8/12">
      
      
      <div class="bg-white p-6 rounded-lg">
        <div class="text-center"><i class="far fa-comments"></i></div>
       
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