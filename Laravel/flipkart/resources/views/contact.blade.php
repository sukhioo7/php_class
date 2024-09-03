<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>
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

</body>
</html>