@extends('layouts.app')
@section('title', 'Authors Index')

@section('content')
   <div class="container">
     <h1 class="text-center py-5">Authors Index</h1>

      <div class="content card-columns">
          @foreach ($authors as $author)
            <div class="card ">
              <div class="card-header"><a href="{{ URL('/authors') }}/{{ $author->id }}" class="text-bordeaux"><h4 class="text-center">{{ $author->last_name }}, {{ $author->first_name }}</h4></a></div>
                <div class="card-body text-center">
                  <img src="{{ URL('/storage') }}/{{ $author->picture }}" alt="author_picture" class="">
                </div> <!-- here ends card-body -->
              </div> <!-- here ends card -->
          @endforeach
        </div><!-- Here ends content -->


      <div class="mt-3">
        {{ $authors->links() }}
      </div>
  </div> <!-- Here ends container -->
@endsection
