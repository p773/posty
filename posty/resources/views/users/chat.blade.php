@extends('layouts.app')


@section('content')

<div class="flex justify-center">
  <div class="w-8/12">
      
      
      <div class="bg-white p-6 rounded-lg">
        <i class="far fa-comments"></i>
       
        @foreach ($messages as $message)  
        @if ($messages->count())
                <div class="mb-4 p-6 "> 

                    <span class="text-grey-600 text-sm">{{ $message->user->name }}   {{ $message->created_at->diffForHumans() }}</span>
                    <p class="mb-2 flex items-center"> {{ $message->body}} </p>
              
                   <hr>  
                </div> 
        @else
            <p>There are no messages</p>
        @endif               
      @endforeach

      </div>
  </div>              
</div>
@endsection