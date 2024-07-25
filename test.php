<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        a {
  position: relative;
}

a:after {
  content: '';
  position: absolute;
  bottom: -3px; /* Adjust the bottom position */
  left: 0;
  width: 100%;
  height: 2px; /* Adjust the height of the underline */
  background-color: #333; /* Adjust the color of the underline */
  transform: scaleX(0); /* Initially hide the underline */
  transition: transform 0.3s ease-in-out; /* Add a transition effect */
}

a:hover:after {
  transform: scaleX(1); /* Show the underline on hover */
}

    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="#">Home</a>
</body>
</html>