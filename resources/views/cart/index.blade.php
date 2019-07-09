@extends('layouts.app')
@section('title', 'my Cart')

@section('content')
  <div class="container">
     <div class="content card">
       <div class="card-body">
         <h1>Shopping Cart</h1>
{{-- Check if the cart is empty and output the number of items  --}}
              @if (Cart::count() == 0)
                <h4 class="py-3">Your cart is empty.</h4>
              @elseif (Cart::count() == 1)
                <h4 class="py-3">You have <spam class="text-bordeaux">one title</spam> in your cart:</h4>
              @else
                <h4 class="py-3">You have <spam class="text-bordeaux">{{  Cart::count() }} titles</spam> in your cart:</h4>
              @endif
{{-- If the cart is not empty display a table with the items and the total price --}}
              @if (Cart::count() > 0)
              <div class="table-responsive">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col"></th>
                      <th scope="col">Cover</th>
                      <th scope="col">Title</th>
                      <th scope="col">Author</th>
                      <th scope="col">Price</th>
                      <th scope="col">Discount</th>
                      <th scope="col">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach (Cart::content() as $item)
                    <tr>
{{-- Add a button to remove selected item from cart --}}
                      <th scope="row" class="align-middle">
                        <form class="form" action="/cart/{{ $item->rowId }}" method="post">
                          @csrf
                          @method('delete')
                          <button type="submit" name="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Remove from cart">X</button>
                        </form>
                      </th>
{{-- Add a cover thumbnail --}}
                      <td><img src="{{ asset('/storage') }}/{{ $item->model->cover }}" alt="book_cover" class="thumbnail"></td>
{{-- Add item title --}}
                      <td class="">{{ $item->name }}</td>
{{-- Add author(s) Our schema supports multiple authors --}}
                      <td>@foreach ($item->model->author as $author)
                        {{ $author->first_name }} {{ $author->last_name }}
                          @endforeach
                      </td>
{{-- Add price --}}
                      <td>&euro;{{ $item->model->price }}</td>
{{-- Add discount (if any) in percentage --}}
                      <td>
                        @if ($item->model->discount == 0)
                          no discount
                        @else
                          {{ $item->model->discount }}%
                        @endif
                      </td>
{{-- Show final price after discount --}}
                      <td>
                        @if ($item->model->discount == 0)
                          &euro;{{ $item->price }}
                        @else
                          {{ $item->model->discountPrice() }}
                        @endif
                      </td>
                    </tr>
                  @endforeach

{{-- List subtotals, include VAT, display Grand total. In case we had products with different tax rates we would have entered the correspondind tax rate to each title in tour database and we would have used a simple formula to calculate the tax per item as we did with the different discounts.  --}}
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col"></th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>Subtotal</td>
                      <td class="text-bordeaux">&euro;{{ Cart::subtotal() }}</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>VAT 6%</td>
                      <td class="text-bordeaux">&euro;{{  Cart::tax() }}</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>TOTAL</td>
                      <td class="text-bordeaux fs-12">&euro;{{  Cart::total() }}</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td ></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="row justify-content-center">
                  <a class="btn btn-outline-secondary " href="{{ route('checkout') }}">Proceed to Checkout</a>
              </div>
            @endif
       </div>
     </div>
   </div>
@endsection
