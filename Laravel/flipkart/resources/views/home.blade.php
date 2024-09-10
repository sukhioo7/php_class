<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
<body class="mb-5">
    @include('navbar') 
    <H1 class="text-center text-dark m-5 p-3">Lets Add Two numbers</H1>
    <div class="container">
      <form action="{{route('register')}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="num1" class="form-label">Name:</label>
          <input type="text" class="form-control" id="num1" name="name" required>
        </div>
        <div class="mb-3">
          <label for="num1" class="form-label">City:</label>
          <input type="text" class="form-control" id="num1" name="city" required>
        </div>
        <div class="mb-3">
          <label for="num1" class="form-label">Age:</label>
          <input type="number" class="form-control" id="num1" name="age" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Register</button>
      </form>
    </div>
    <div class="result">
      @if (isset($success))
        <h3 class="text-center mt-3 text-secondary">{{$success}}</h3>
      @endif
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>