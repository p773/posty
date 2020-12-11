@extends('layouts.app')


@section('content')

<div class="flex justify-center">
  <div class="w-8/12">
  
    <div class="p-6">
      <h1 class="text-2xl font-medium mb-1">{{ $user->name }}</h1>
      <p> Liczba postów: {{ $posts->count() }}. Liczba polubień: {{ $user->receivedLikes->count() }}. W serwisie od {{ $user->created_at->format('Y-m-d') }}.</p>
    </div>

      <div class="bg-white p-6 rounded-lg">
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