@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            @auth
                <form action="{{ route('comment', $post->id) }}" method="post" class="mb-4">
                    @csrf
                    <div class="mb-4">
                        <label for="body" class="sr-only">Body</label>
                        <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Write your comment here!"></textarea>

                        @error('body')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                                </div>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Comment</button>
                    </div>
                </form>
            @endauth

            
            
               
                        <div class="mb-4"> 

                            <a href="{{ route('users.posts', $post->user) }}" class="font-bold"> {{ $post->user->name }} </a>
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

                              

                            @endauth
                        
                            

                            <span> {{ $post->likes->count() }} likes </span>
                            </div> 
                           <hr>  
                        </div>
          
           <!-- WYŚWIETLANIE WSZYSTKICH KOMENTARZY -->

           @foreach ($comments as $comment)  
                @if ($comments->count())
                        <div class="mb-4 p-6"> 

                            <a href="{{ route('users.posts', $comment->user) }}" class="font-bold"><i class="fas fa-caret-right"></i> {{ $comment->user->name }} </a>
                            <span class="text-grey-600 text-sm">{{ $comment->created_at->diffForHumans() }}</span>
                            <p class="mb-2"> {{ $comment->body}} </p>


                            <!--if ($post->ownedBy(auth()->user())) -->
                        
                            <div class="flex items-center">

                                <span>
                                    @can('delete', $comment)
                                       
                                            <form action="{{ route('posts.destroy', $post) }}" method="post" class="mr-1">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-blue-500"><i class="fas fa-trash"></i>   Delete  </button>
                                            </form>
                                      
                                    @endcan
                                    <!-- endif -->     
                                </span>

                         
                        
                            

                            </div> 
                           <hr>  
                        </div>
                @else
                    <p>There are no comments</p>
                @endif               
            @endforeach

            {{ $comments->links() }}
                   
       
            
          
                
            
        </div>
    </div>
@endsection