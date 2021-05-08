<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">

    </h2>
</x-slot>
<!DOCTYPE html>
<html>

<head>
    <title>Category</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <div class="buttons">
            <a class="btn btn-link" href="{{url('/shopping')}}">Back</a>
        </div>
        @if(Session::has('cart'))
            <div class="row">
                @foreach($products as $product)
                <div class="container p-3 my-3 border">
                    <span class="badge">{{$product['qty']}}</span>
                    <strong>{{$product['item']['product_name']}}</strong>
                    <span style="float:right">{{$product['item']['price']}}</span>
                </div>
                @endforeach
            </div>
            <div class="row" style="float:right">
                <p >Total Price: {{$totalPrice}}</p>
            </div>
            <div class="row">
                <a class="btn btn-success" href="{{url('checkout')}}">Checkout</a>
            </div>
        @else
            <div class="container">
                <p>No product added!</p>
            </div>
        @endif
    </div>


    <script src="https://code.jquery.com/jquery-3.5.0.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
    </script>
    <script src="/js/custom.js"></script>
</body>

</html>
</x-app-layout>
