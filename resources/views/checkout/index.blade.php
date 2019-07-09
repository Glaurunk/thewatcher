@extends('layouts.app')
@section('title', 'Checkout')

@section('content')

  <div class="container">
     <div class="content card">
       <div class="card-body">
         <h1 class="mb-5">Checkout</h1>
          <div class="row">
<!-- Left Column (Shipping Information)-->
            <div class="col-md-6">
              <form name="checkoutForm" action="/checkout" onsubmit="validateCard()" method="post">
                @csrf
                <h3 class="">Shipping Address</h3>
                <hr>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="Name">First Name</label>
                    <input type="text" class="form-control" id="inputFirstName" placeholder="John" name="first_name" value="John" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="Name">Last Name</label>
                    <input type="text" class="form-control" id="inputLastName" placeholder="Doe" name="last_name" value="Doe" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputAddress">Address</label>
                  <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address" value="1234 Main St" required>
                </div>
                <div class="form-group">
                  <label for="inputAddress2">Address 2</label>
                  <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="address2" value="{{ old('address2') }}">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="inputCity" name="city" placeholder="Horroville" value="Horrorville" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <select id="inputState" class="form-control" name="state" onchange="calculateShipping()">
                      <option selected>Very Close</option>
                      <option>Close Enough</option>
                      <option>Far</option>
                      <option>In a galaxy far, far away...</option>
                    </select>
                    <small>Choose from the dropdown menu</small>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" id="inputZip" name="zip" value="12345" placeholder="12345" required>
                  </div>
                </div>
            </div>
<!-- Middle Column (Billing Information)-->

            <div class="col-md-6">
              <form>
                <h3 class="">Payment Information</h3>
                <hr>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="card" id="mastercard" value="MasterCard" disabled>
                  <label class="form-check-label" for="mastercard"><img src="/storage/site_images/mastercard_icon.png" alt="mastercard-icon" class="cc-icon"> MasterCard
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="card" id="visa" value="VISA" disabled>
                  <label class="form-check-label" for="visa"><img src="/storage/site_images/visa_icon.png" alt="visa-icon" class="cc-icon"> VISA
                  </label>
                </div>
                <div class="form-check disabled">
                  <input class="form-check-input" type="radio" name="card" id="defaultPayment" value="Some Card" checked>
                  <label class="form-check-label" for="defaultPayment"><img src="/storage/site_images/somecard_icon.png" alt="card-icon" class="cc-icon">
                    Some Card
                  </label>
                </div>
                  <div class="form-group mt-3">
                    <label for="inputCardFirstName">Cardholder Name</label>
                    <input type="text" class="form-control" id="inputCardFirstName" name="card_name" value="John Doe" placeholder="John Doe" required>
                    <small>As shown on the card</small>
                  </div>

                <div class="form-row">
                  <div class="form-group col-md-8">
                    <label for="cardNumber">Card Number</label>
                    <input type="text" class="form-control" id="cardNumber" placeholder="1234-5678-9012-3456" name="card_number" value="1234-5678-9012-3456" required>
                  </div>
                  <div class="form-group">
                    <label for="csv">CSV</label>
                    <input id="csv" class="form-control col-md-4" type="text" name="csv" value="123" placeholder="123" required>
                  </div>
                </div>

                <label for="expiration">Expiration Date</label>
                <div class="form-row" id="expiration">
                  <div class="form-group col-md-2">
                    <select id="expYear" class="form-control" name="year">
                      <option>2019</option>
                      <option>2020</option>
                      <option>2021</option>
                      <option selected>2022</option>
                    </select>
                    <small>Year</small>
                  </div>
                  <div class="form-group col-md-2">
                    <select id="expMonth" class="form-control" name="month">
                      <option selected>01</option>
                      <option>02</option>
                      <option>03</option>
                      <option>04</option>
                      <option>05</option>
                      <option>06</option>
                      <option>07</option>
                      <option>08</option>
                      <option>09</option>
                      <option>10</option>
                      <option>11</option>
                      <option>12</option>
                    </select>
                    <small>Month</small>
                  </div> <!-- Here ends form-group -->
                </div> <!-- Here ends row-form column -->
            </div> <!-- Here ends middle column -->

<!-- Right Column -->
        <div class="col-md-6">
          <h3>Order Information</h3>
          <hr>
          @if (Cart::count() > 0)
            <div class="table-responsive">
              <table class="table" id="orderInfo">
                <thead class="thead-dark">
                  <tr>
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

{{-- Add a cover thumbnail --}}
                    <td><img src="{{ asset('/storage') }}/{{ $item->model->cover }}" alt="book_cover" class="mini-thumbnail"></td>
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
                  </tr>
                </thead>
                  <tr>
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
                    <td>VAT 6%</td>
                    <td class="text-bordeaux">&euro;{{  Cart::tax() }}</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td id="total" class="text-bordeaux">&euro;{{  Cart::total() }}</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Shipping</td>
                    <td id="shipping" class="text-bordeaux">&euro;0.00</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>GRAND TOTAL</td>
                    <td id="grandTotal" class="text-bordeaux fs-12">&euro;{{  Cart::total() }}</td>
                  </tr>
                </tbody>
              </table>
              @endif

          </div> <!-- here ends table-responsive -->
        </div> <!-- here ends right column -->
      </div> <!-- here ends starter row -->
<!-- The custom checkbox -->
      <div class="row form-row">
        <div class="custom-control form-group custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck1" required checked>
            <label class="custom-control-label" for="customCheck1">I agree with the <a href="/policy">Terms and Conditions</a></label>
        </div>
      </div>
<!-- The form's hidden inputs with the order's info -->
      <div id="hiddenInputs">
        <input id="hiddenShipping" type="hidden" name="shipping" value="0.00">
        <input id="hiddenGrandTotal" type="hidden" name="grand_total" value="{{ Cart::total() }}">
      </div>
<!-- Submit & end Form -->
        <div class="row justify-content-center">
            <button type="submit" name="PlaceOrder" class="btn btn-outline-secondary">Place Order</button>
        </div> <!-- here ends place order button -->
      </form>
<!-- Closing Divs -->
     </div> <!-- here ends card-body -->
   </div> <!-- here ends content card -->
 </div> <!-- here ends container -->

 <!-- Information Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title text-bordeaux" id="exampleModalLabel">Notice</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         Since no real transactions can take place, the form is filled with dummy data for your convenience. If you need to check form validation, feel free to enter your own data. Change the "State" field to see shipping costs adjusting dynamically!
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div> <!-- Here ends modal-footer -->
     </div> <!-- Here ends modal-content -->
   </div> <!-- Here ends modal-dialog -->
 </div> <!-- Here ends modal -->

<script type="text/javascript">
// Some JQ to trigger the information modal
  window.onload = function()
      {
        $('#exampleModal').modal('show');
      }
</script>

@endsection
