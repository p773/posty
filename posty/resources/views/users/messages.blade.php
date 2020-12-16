@extends('layouts.app')


@section('content')

<div class="flex justify-center">
  <div class="w-8/12">
      
      
      <div class="bg-white p-6 rounded-lg">
        <i class="far fa-comments"></i>
       
        @foreach ($messages as $message)  
        @if ($messages->count())
                <div class="mb-4 p-6"> 

                     
                    <span class="text-grey-600 text-sm">{{ $message->user->name }}   {{ $message->created_at->diffForHumans() }}</span>
                    <p class="mb-2 flex items-center"> {{ $message->body}} </p>


                    <!--if ($post->ownedBy(auth()->user())) -->
          
              
                   <hr>  
                </div> 
        @else
            <p>There are no messages</p>
        @endif               
      @endforeach

  
  

      @php ($users = [])
      @foreach ($messages as $message) 
      
      @if ($message->user_id != $user  )
          @if (!in_array ( $message->user_id, $users ))   @php ($users[] = $message->user_id )
          <div><a href="{{route ('chat', $message->user_id)}}" class="font-bold"> {{ $message->user->name }}: {{ $message->body }} </a>  @endif 
      @else
      
          @if (!in_array ( $message->receiver_id, $users ))   @php ($users[] = $message->receiver_id) 
          <div> <a href="{{route ('chat', $message->receiver_id)}}" class="font-bold"> {{ $message->receiver_name }}: {{ $message->body }} </a> </div> @endif
      @endif               
      @endforeach
      
             

      </div>
  </div>              
</div>
@endsection