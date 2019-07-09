@extends('layouts.app')
@section('title', 'Home Page')
@section('content')
   <div class="container">

      <div class="content card">
        <div class="card-body">
          <h2 class="mb-3">Welcome to the Watcher</h2>

          <p class="fs-12">"The Watcher" is the website of a fictitious bookstore, selling selected pieces of horror literature, ranging from the gothic era to the modern age! An we are using Laravel to do all this! Find all the details at the <a href="/tech-stuff" class="text-bordeaux">Tech Stuff</a> page.</p>
          <h2 class="mb-3">Regarding the content</h2>
          <p class="fs-12">All titles are real. The selection as well as the description text have been taken 'as is' from pastemagazine's list of The 50 Best Horror Novels of All Time. Feel free to visit the collection and read the articles if you are interested in horror literature. You can find the original complete list <a href="https://www.pastemagazine.com/articles/2018/08/the-best-horror-novels-of-all-time.html" class="text-bordeaux">here</a>.
          The authors' biographies have been taken from wikipedia and their photos from random sites on the web. I do not own any rights of this content, I used it only as a sample. All prices are imaginary, just to fill in the necessary product info for the e-commerce functionality.</p>
          <div class="card mx-5 my-5 bg-dark">
            <p class="fs-12 p-3 text-light">In order to keeps things nice and tidy, no registration is allowed. However you can log in to a Special Guest account using the following information: user email: <span class="text-bordeaux">visitor@qwerty.com</span> and user password: <span class="text-bordeaux">visitor</span>. This account will give you limited access to the voyager panel and also allow you to make virtual purchases. For more information on the technical stuff visit the <a href="/tech-stuff" class="text-bordeaux">Tech Stuff </a> link. Enjoy!</p>
          </div>
        </div>
      </div> <!-- Here end content -->

  </div> <!-- Here end container -->
@endsection
