@extends('layouts.app')

@section('content')
  <div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
      <center> 
      <div class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
        Spotted Opole
      </div>
      <div class="font-medium text-gray-500 hover:text-gray-900 p-6">Kategorie postów:</div>
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">   Pozdrawiam  </button>
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">   Szukam  </button>
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">   Sprzedam  </button>
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">   Zagubiono  </button>
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">   Nie pozdrawiam  </button>
     <div class="p-1"></div>

    
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">   Najpopularniejsze  </button>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">   Najczęściej komentowane  </button>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">   Najnowsze </button>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">   Najstarsze </button>
     
    </div>  
  </div>
</center>
@endsection