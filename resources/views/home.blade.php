<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            border: 2px solid black;
            border-collapse: collapse;
            width: 75%;
        }

        td,
        th {
            border: 2px solid black;
        }
    </style>

    {{-- <link rel="stylesheet" href="{{ asset('assets/css/mystyle.css') }}"> --}}
</head>

<body>

    {{-- <img src="{{ asset('assets/images/flower.jpeg') }}" alt=""> --}}

    {{-- <h1><?php echo 'hello'; ?></h1> --}}
    {{-- @php --}}
    // $name = 'zain';
    // $products = ['a', 'b', 'c', 'd', 'e'];
    {{-- // @endphp --}}
    {{-- <h1>{{ $name }} </h1> --}}

    {{-- <ul>
        @foreach ($products as $product)
            <li>{{ $product }}</li>
        @endforeach
    </ul> --}}


    <ul>
        @foreach ($fruit_data as $fruit)
            <li>{{ $fruit }}</li>
        @endforeach
    </ul>


    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Price</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            {{-- @php
                foreach ($products as $product) {
                    dump($product);
                }
            @endphp --}}

            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{-- <script src="{{ asset('assets/js/main.js') }}"></script> --}}
</body>

</html>
