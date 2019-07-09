@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="content">

      <div class="card">
        <div class="card-body">
          <div class="card-header text-center">
            <h1>{{ $book->title }}</h1>
              @foreach ($book->author as $author)
                <h5><small>by </small><a href="{{ URL('/authors') }}/{{ $author->id }}" class="text-bordeaux">{{ $author->first_name}} {{ $author->last_name }}</a>
                </h5>
              @endforeach
          </div> <!-- here ends card header -->
            <div class="row">
              <div class="col-md-3 p-3 text-center">
                <img src="{{ URL('/storage') }}/{{ $book->cover }}" alt="book_cover" class="img-fluid max-width">
              </div> <!-- here ends col-md-3 p-3 -->
              <div class="col p-3">
                <p>{{ $book->description}}</p>
                <p>first edition: {{ $book->year }}

{{-- If the book is available and has no discount display the book's price.  --}}
            @if ($book->instock == 1)
              @if ($book->discount == 0)
                  <p class="text-bordeaux fs-16 mb-0">&euro;{{ $book->price}}</p>
{{-- If there is a discount display the discount percentage as well as the original and final price. --}}
                @else
                  <p class="fs-12 mb-0"><span class="text-bordeaux "><del>&euro;{{ $book->price }}</del></span><br>
                    -{{ $book->discount }}% discount!
                <br>
                  <span class="text-bordeaux fs-14">{{ $book->discountPrice() }} </span></p>
              @endif
              <div class="text-left">
                <form class="form" action="{{ route('cart.store') }}" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="id" value="{{ $book->id }}">
                  <input type="hidden" name="title" value="{{ $book->title }}">
                  <input type="hidden" name="price" value="{{ $book->numericPrice() }}">
                  <button class="btn btn-outline-dark" type="submit" name="add-to-cart">Add to cart</button>
                </form>
              </div>
{{-- If the book is out of stock display only "out of stock"  --}}
              @else
              <p class="fs-12 text-bordeaux">Temporarily out of stock</p>
            @endif

              </div> <!-- here ends col p-3 -->
            </div> <!-- here ends row -->
          </div> <!-- here ends card-body -->
        </div> <!-- here ends card -->
      </div> <!-- here ends content -->
    </div> <!-- here ends container -->
@endsection
