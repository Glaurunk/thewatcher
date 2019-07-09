@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="content">

      <div class="card">
        <div class="card-body">
          <div class="card-header"><h1>{{ $author->first_name }} {{ $author->last_name }}</h1>
          </div> <!-- here ends card-header -->
          <table>
            <tr>
              <td class="p-3"><img src="{{ URL('/storage') }}/{{ $author->picture }}" alt="author_picture" class=""></td>
              <td class="p-3">
                <p class="">{{ $author->bio }}</p>
                <p class="mt-3">Works in our current collection:</p>
                  <ul class="">
                    @foreach ($author->book as $book)
                      <li><a href="{{ URL('/books') }}/{{ $book->id }}" class="text-bordeaux">{{ $book->title }}</a></li>
                    @endforeach
                  </ul>
              </td>
            </tr>
          </table>
        </div> <!-- here ends card-body -->
      </div> <!-- here ends card -->
    </div> <!-- here ends content -->
  </div> <!-- here ends container -->
@endsection
