@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
      <div class="w-8/12 bg-white p-6 rounded-lg justify-center">
      
    
          
              
         
                <div class="p-1 flex justify-center">
                
                    
                 
                <a href="" ><button  class="bg-blue-500 text-white px-4 py-2 rounded font-medium justify-center mr-1">   Najpopularniejsi  </button>
                        
                <a href="{{ route('users.all_AZ') }}" ><button  class="bg-blue-500 text-white px-4 py-2 rounded font-medium justify-center mr-1">   Od A do Z  </button>
                
                <a href="{{ route('users.latest') }}" ><button  class="bg-blue-500 text-white px-4 py-2 rounded font-medium justify-center mr-1">   Najnowsi </button> </a>
                
                <a href="{{ route('users.all') }}" > <button class="bg-blue-500 text-white px-4 py-2 rounded font-medium justify-center mr-1">   Najstarsi </button> </a>
                </div>
          <br>
              <!-- TU WYŚWIETLAMY USERÓW -->
              <div class="text-center"><i class="fas fa-users"></i></div>  

              @foreach ($users as $user)  
              @if ($users->count())
                      <div class="mb-1 p-1"> 
                       
                          <p class="mb-1"><i class="fas fa-user"></i><a href="{{route ('users.post2', $user->id  )}}" class="font-bold w-max"> {{ $user->name }} </a> w serwise od {{ $user->created_at->format('Y-m-d') }}. </p>

                        
                         <hr>  
                      </div>
              @else
                  <p>There are no users</p>
              @endif               
          @endforeach
         
    </div>
   </div>
@endsection