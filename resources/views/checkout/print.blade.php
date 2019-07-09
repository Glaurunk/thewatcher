@include('layouts.head')


<div class="card">
  <div class="card-image">
    <img src="storage/site_images/print-logo.png" alt="wather-banner">
  </div>
  <div class="card-header">
    <h1>Order Information</h1>
    <h5>Order #123456</h5>
  </div>
   <div class="card-body">
{{-- Shipping Address           --}}
     <h4 class="mb-3">Shipping to</h4>
     <h5 class="mb-3">{{ $request->first_name }} {{ $request->last_name }}</h5>
     <p>{{ $request->address }}
     @if (!$request->address2 == '')
       , {{$request->address2 }}</p>
     @endif
     <p>{{ $request->city }}, {{ $request->state }}, {{ $request->zip }}</p>
     <hr>
{{-- Payment method         --}}
     <h4 class="mb-3">Payment Method</h4>
     <p>{{ $request->card }} No: {{ $request->card_number }}
     <p>Expiry date: {{ $request->month }} / {{ $request->year }}</p>
     <p>Card holder: {{ $request->card_name }}</p>
{{-- Order items --}}
     <table class="table">
       <thead class="thead-dark">
         <tr>
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
           <td class="">{{ $item->name }}</td>
           <td>@foreach ($item->model->author as $author)
             {{ $author->first_name }} {{ $author->last_name }}
               @endforeach
           </td>
           <td>&euro;{{ $item->model->price }}</td>
           <td>
             @if ($item->model->discount == 0)
               no discount
             @else
               {{ $item->model->discount }}%
             @endif
           </td>
           <td>
             @if ($item->model->discount == 0)
               &euro;{{ $item->price }}
             @else
               {{ $item->model->discountPrice() }}
             @endif
           </td>
         </tr>
       @endforeach

       <thead class="thead-dark">
         <tr>
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
           <td>Subtotal</td>
           <td class="text-bordeaux">&euro;{{ Cart::subtotal() }}</td>
         </tr>
         <tr>
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
           <td>TOTAL</td>
           <td class="text-bordeaux">&euro;{{  Cart::total() }}</td>
         </tr>
         <tr>
           <td></td>
           <td></td>
           <td></td>
           <td>Shipping</td>
           <td class="text-bordeaux">&euro;{{ $request->shipping }}</td>
         </tr>
         <tr>
           <td></td>
           <td></td>
           <td></td>
           <td>GRAND TOTAL</td>
           <td class="text-bordeaux fs-12">&euro;{{ $request->grand_total }}</td>
         </tr>
       </tbody>
     </table>
<!-- Closing Divs -->
 </div> <!-- here ends card-body -->
</div> <!-- here ends content card -->
