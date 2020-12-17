@extends('layouts.app')


@section('content')

<div class="flex justify-center">
  <div class="w-8/12">
      
      
      <div class="bg-white p-6 rounded-lg">
        <div class="text-center"><i class="far fa-comments"></i></div>
      <div class=" flex space-x-4  ">  
          <div class=" flex w-1/2 justify-center">Użytkownik</div>
          <div class=" flex w-1/2 justify-center">Ostatnia wiadomość</div> 
      </div>

      @php ($users = [])
      @foreach ($messages as $message) 
     
        @if ($message->user_id != $user  )
            @if (!in_array ( $message->user_id, $users ))   @php ($users[] = $message->user_id )
            <div>
            <div class="flex justify-center">
              <div class="text-center  w-1/2 justify-center  w-max"> {{ $message->user->name }}</div><div class="flex justify-center float-left w-1/2  w-max"><a href="{{route ('chat', $message->user_id)}}" class="font-bold w-max"> {{ $message->body }} </a></div>
            </div>  <hr>  @endif 
            
            @else
        
            @if (!in_array ( $message->receiver_id, $users ))   @php ($users[] = $message->receiver_id) 
        
            <div class="flex justify-center">
              <div class="text-center  w-1/2 justify-center w-max"> {{ $message->receiver_name }}</div> <div class="flex justify-center float-left w-1/2  w-max"> <a href="{{route ('chat', $message->receiver_id)}}" class="font-bold w-max"> {{ $message->body }} </a></div>
            </div>  <hr>  @endif
            
            @endif      
           
      @endforeach
      
             

      </div>
  </div>              
</div>
@endsection