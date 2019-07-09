@extends('layouts.app')
@section('title', 'Order Printout')

@section('content')
  <div class="container">

    <div class="jumbotron">
      <h1 class="display-4 text-center">Your order has been recieved!</h1>
      <p class="lead text-center">You can review your purchase and print a copy or save a file to your computer for further use.</p>
    </div>

     @include('checkout.include_orderinfo')

  </div> <!-- here ends container -->
  
@endsection
