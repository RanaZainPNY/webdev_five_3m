<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{-- <h1><?php echo 'hello'; ?></h1> --}}
    @php
        $name = 'zain';
        $products = ['a', 'b', 'c', 'd', 'e'];
    @endphp
    <h1>{{ $name }} </h1>

    <ul>
        @foreach ($products as $product)
            <li>{{ $product }}</li>
        @endforeach
    </ul>
</body>

</html>
