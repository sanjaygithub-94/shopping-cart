<!DOCTYPE html>
<html>

<head>
    <title>Product</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>

<body>
    <div class="container my-5">
        <div class="buttons">
            <a class="btn btn-link" href="{{url('/dashboard')}}">Back</a>
            <a href="cart" style="float:right" class="btn btn-dark">Cart <span class="badge">{{Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span> </a>
        </div>
        <div class="container pt-3">
            @foreach($products as $category)
                <h3>{{$category[0]->category->category_name}}</h3>
                <div class="container p-3 my-3 border">
                    @foreach($category as $product)
                    <div class="container p-3 my-3 border">
                     <p>{{$product->product_name}}</p>
                     <p>{{$product->description}}</p>
                     <p>Rs {{$product->price}}</p>
                     <a href="add-to-cart/{{$product->id}}" class="btn btn-success">Add to cart</a>
                    </div>
                    @endforeach
                </div>
            @endforeach
        </div>
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
