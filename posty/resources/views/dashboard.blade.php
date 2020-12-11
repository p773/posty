@extends('layouts.app')

<!--
            <button value="Pozdrawiam" type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">   Pozdrawiam  </button>
            <button value="Szukam" type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">   Szukam  </button>
            <button value="Sprzedam" type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">   Sprzedam  </button>
            <button value="Zagubiono" type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">   Zagubiono  </button>
            <button value="Nie pozdrawiam" type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">   Nie pozdrawiam  </button>
             
 
            <select id="category" class="bg-gray-100 border-2 text-gray-500 w-full px-4 py-2 rounded-lg font-medium" name="category"> 
                              
              <option value="Szukam">Szukam osoby</option>
              <option value="Pozdrawiam">Pozdrawiam</option>
              <option value="Nie pozdrawiam">Nie pozdrawiam</option>
              <option value="Zagubiono">Zagubiono</option>
              
            </select>-->

@section('content')
    <div class="flex justify-center">
      <div class="w-8/12 bg-white p-6 rounded-lg justify-center">
        
    
          
                    <div>
                        <div class="flex justify-center">
                        <form action="{{ route('dashboard') }}" method="post" class="mr-1">
                            @csrf 
                            <input  name="category" type="hidden" value="Pozdrawiam">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">    Pozdrawiam  </button> 
                        </form> 

                        <form action="{{ route('dashboard') }}" method="post" class="mr-1">
                            @csrf 
                        <input  name="category" type="hidden" value="Szukam">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">    Szukam  </button> 
                        </form>

                        <form action="{{ route('dashboard') }}" method="post" class="mr-1">
                            @csrf 
                        <input  name="category" type="hidden" value="Sprzedam">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">    Sprzedam  </button> 
                        </form>

                        <form action="{{ route('dashboard') }}" method="post" class="mr-1">
                            @csrf 
                        <input  name="category" type="hidden" value="Zagubiono">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">    Zagubiono  </button> 
                        </form>

                        <form action="{{ route('dashboard') }}" method="post" class="mr-1">
                            @csrf 
                        <input  name="category" type="hidden" value="Nie pozdrawiam">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">  Nie pozdrawiam  </button> 
                        </form>

                        
                        </div>
         
                <div class="p-1 flex justify-center">
                
                    
                 
                <a href="{{ route('dashboard.popular') }}" ><button  class="bg-blue-500 text-white px-4 py-2 rounded font-medium justify-center mr-1">   Najpopularniejsze  </button>
                        
                <a href="{{ route('dashboard.commented') }}" ><button  class="bg-blue-500 text-white px-4 py-2 rounded font-medium justify-center mr-1">   Najczęściej komentowane  </button>
                
                <a href="{{ route('dashboard') }}" ><button  class="bg-blue-500 text-white px-4 py-2 rounded font-medium justify-center mr-1">   Najnowsze </button> </a>
                
                <a href="{{ route('dashboard.oldest') }}" > <button class="bg-blue-500 text-white px-4 py-2 rounded font-medium justify-center mr-1">   Najstarsze </button> </a>
                </div>
          <br>
              <!-- TU WYŚWIETLAMY POSTY -->


              @if ($posts->count())
              @foreach ($posts as $post)      
                          <div class="mb-4"> 

                              <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->category }} <i class="fas fa-caret-right"></i> {{ $post->title }} <i class="fas fa-caret-right"></i> {{ $post->user->name }} </a>
                              <span class="text-grey-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                              <p class="mb-2"> {{ $post->body}} </p>


                              <!--if ($post->ownedBy(auth()->user())) -->
                          
                              <div class="flex items-center">

                                  <span>
                                      @can('delete', $post)
                                        
                                              <form action="{{ route('posts.destroy', $post) }}" method="post" class="mr-1">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" class="text-blue-500"><i class="fas fa-trash"></i>   Delete  </button>
                                              </form>
                                        
                                      @endcan
                                      <!-- endif -->     
                                  </span>

                              @auth
                                      
                                      @if (!$post->likedBy(auth()->user()))   
                                      <form action="{{ route('posts.likes', $post->id)}}" method="post" class="mr-1">
                                                      @csrf
                                                      <button type="submit" class="text-blue-500"> <i class="far fa-thumbs-up"></i> Like  </button>
                                              </form>
                                      @else
                                          
                                      
                                              <form action="{{ route('posts.likes', $post->id)}}" method="post" class="mr-1">
                                                      @csrf
                                                      @method('DELETE')
                                                      <button type="submit" class="text-blue-500"><i class="far fa-thumbs-down"></i> Unlike  </button>
                                              </form>
                                      @endif

                                          
                                  </form>

                                  <span> <!--
                                      <form action="   " method="post" class="mr-1">
                                      <button type="submit" class="text-blue-500"><i class="fas fa-comment"></i>  Comment  </button>
                                      </form> -->
                                      <a href="{{ route('comments', $post)}}" ><button  class="text-blue-500"><i class="fas fa-comment"></i>  Comment ({{ $post->comments->count() }})   </button></a>
                                  </span>

                              @endauth
                          
                              

                              <span class="text-blue-500 p-1"> <i class="fas fa-heart"></i> {{ $post->likes->count() }}  </span>
                              </div> 
                            <hr>  
                          </div>
                            
              @endforeach
                    
              {{ $posts->links() }}
              @else
                  <p>There are no posts</p>
              @endif
    </div>
   </div>
@endsection