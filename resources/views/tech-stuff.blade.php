@extends('layouts.app')
@section('title', 'Tech Stuff')

@section('content')
   <div class="container">

      <div class="content card">
        <div class="card-body">
          <h2 class="mb-3">Made with Laravel and Voyager</h2>
          <p class="fs-12">This website has been built using Laravel 5.8. In addition, we have been using the <a href="https://laravelvoyager.com" class="text-bordeaux">Voyager</a> multipurpose admin panel for backend functionality just because it is awesome! This means, that besides some basic stuff, many back end features have been implemented directly from Voyager rather than from inside Laravel. For example, the database tables, have been initially created with php artisan, but afterwards, all changes have been made exclusively with Voyager. Don't be upset if you don't find enough migrations! The same goes for user roles and permissions etc.
          <h2 class="mb-3">E-commerce with Laravel</h2>

          <p class="fs-12">The e-commerce part uses <a href="https://github.com/hardevine/LaravelShoppingcart" class="text-bordeaux">hardevine's shopping cart</a>, a pretty nice cart implementation for laravel and some custom code, mainly for the different discounts in various products. The cart, is already fully functional in  most ways. At the moment, there is no order model and the order data do not persist in the database. As a consequence there is no option to review order history, print a copy of the order etc. These features are soon to be implemented, so please be patient!
          <p class="fs-12">In this demo there is no payment gateway connected for security reasons; so there is no real transaction. However implementing something like Stripe would be rather easy at this point.
          </p>
          <h2 class="mb-3">On the front-end</h2>

          <p class="fs-12"> Responsiveness is guaranteed with Bootstrap 4 and some custom queries. The main SASS files are kept as they where, with some minor tweaks at the default color pallette and the custom fonts. Most custom code is held in a regular css file (extra.css). Finally, we use a bit of Javascript for some cart reactivity on the checkout page (extra.js)</p>
          <div class="card mx-5 my-5 bg-dark">
            <p class="fs-12 p-3 text-light">Feel free to explore by logging in as a Special Guest by using user email <span class="text-bordeaux">visitor@qwerty.com</span> and user password <span class="text-bordeaux">visitor</span>. This will give you limited access to the voyager dashboard and the back end. Enjoy!</p>
          </div> <!-- Here ends dark -->


        </div> <!-- Here ends card-body -->
      </div> <!-- Here ends content -->
  </div> <!-- Here ends container -->
@endsection
