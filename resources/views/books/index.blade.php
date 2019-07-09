@extends('layouts.app')
@section('title', 'Books Catalogue')

@section('content')
  <div class="container-fluid">
    <h1 class="text-center pt-5">Complete Books Collection</h1>
    <h4 class="text-center pb-5"><em><a href="{{ URL('/books_offers') }}" class="text-bordeaux">go to special offers</a></em></h4>
     <div class="content card-columns">

        @foreach ($books as $book)
          <div class="card">
{{-- Display the book's title --}}
            <div class="card-header text-center"><a href="{{ URL('/books') }}/{{ $book->id }}" class="text-bordeaux"><h4 class="text-center">{{ $book->title }}</h4></a>
{{-- Display the book's author(s) --}}
              @foreach ($book->author as $author)
                <h5><small>by </small><a href="{{ URL('/authors')}}/{{ $author->id }}" class="text-secondary">{{ $author->first_name}} {{ $author->last_name }}</a>
                </h5>
              @endforeach
{{-- If the book is on sale display it here --}}
              @if ($book->discount != 0)
                <p class="bg-dark text-light fs-14 mb-0">on sale!</p>
              @endif
            </div>
{{-- Display the book's cover --}}
              <div class="card-body text-center">
                <a href="{{ URL('/books')}}/{{ $book->id }}"><img src="{{ asset('/storage') }}/{{ $book->cover }}" alt="book_cover" class="thumbnail"></a>
              </div>
              <div class="card-footer mb-0">

{{-- If the book is available and has no discount display the book's price.  --}}
            @if ($book->instock == 1)
              @if ($book->discount == 0)
                  <p class="text-bordeaux text-center fs-16 mb-0">&euro;{{ $book->price}}</p>
{{-- If there is a discount display the discount percentage as well as the original and final price. --}}
                @else
                  <p class="text-center fs-12 mb-0"><span class="text-bordeaux "><del>&euro;{{ $book->price }}</del></span><br>
                    -{{ $book->discount }}% discount!
                <br>
{{-- The discountPrice() is drawn from our model --}}
                  <span class="text-bordeaux text-center fs-14">{{ $book->discountPrice() }} </span></p>
              @endif
              <div class="text-center">
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
              <p class="bg-bordeaux text-center text-light fs-12 mb-0">Temporarily out of stock</p>
            @endif



              </div> <!-- Here ends card footer -->
            </div> <!-- Here ends card -->
        @endforeach

    </div> <!-- Here ends content -->

    <div class="mt-3">
      {{ $books->links() }}
    </div>

  </div> <!-- Here ends container -->

@endsection
