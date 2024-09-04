<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
<body>
    @include('navbar') 
    <h1>This is Contact Page</h1>
    <h3>Ternary operator</h3>
    <p> Hello Mr. {{$name ? $name : 'Flipkart' }}</p>
    <h3>Blade Template Control Statements</h3>
    <p>
        @if ($name == 'sukhdeep')
            <h2>Welcome Admin</h2>
        @elseif ($name == 'Harman')
            <h2>Welcome Student</h2>
        @else
            <h2>Welcome User</h2>
        @endif
    </p>
    <h3>Blade Loops</h3>
    <ul>
        @foreach ($products as $item)
            <li>{{$item}}</li>
        @endforeach
   
    </ul>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>