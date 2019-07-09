@if (count($errors) > 0)
  @foreach ($errors->all() as $error)
      <div class="alert alert-danger">
        {{ $error }}
      </div>
  @endforeach
@endif


@if (session('success'))
  <div class="alert alert-danger">
    <p class="text-center fs-12">{{ session('success') }}</p>
  </div>
@endif


@if (session('error'))
  <div class="alert alert-danger">
    <p class="text-center fs-12">{{ session('error') }}</p>
  </div>
@endif
