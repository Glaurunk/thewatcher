<div class="row justify-content-center">
  <ul class="nav">
    <li class="nav-item fs-flex">
      <a class="nav-link active text-bordeaux" href="{{ URL('/') }} ">Home</a>
    </li>
    <li class="nav-item dropdown fs-flex">
    <a class="nav-link dropdown-toggle text-bordeaux" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Books</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="{{ URL('/books') }}">Entire Collection</a>
      <a class="dropdown-item" href="{{ URL('/books_offers') }}">Special Offers</a>
  </li>
    <li class="nav-item fs-flex">
      <a class="nav-link text-bordeaux" href="{{ URL('/authors') }}">Authors</a>
    </li>
    <li class="nav-item fs-flex">
      <a class="nav-link text-bordeaux" href="{{ URL('/tech-stuff') }}">Tech Stuff</a>
    </li>
  </ul>
</div>
