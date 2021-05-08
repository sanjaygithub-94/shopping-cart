<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">

    </h2>
</x-slot>
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
            <a class="btn btn-link" href="{{url('/admin')}}">Back</a>
            <button class="btn btn-dark" data-toggle="modal" data-target="#addProduct">Add Product</button>
        </div>
        <table class="my-5 table table-striped">
            <tr>
                <th>Id</th>
                <th>Category</th>
                <th>Product</th>
                <th>Description</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            @foreach($products as $key => $product)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$product->category->category_name}}</td>
                <td>{{$product->product_name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <button class="btn btn-primary" onclick="editProduct({{$product->id}})">Edit</button>
                    <button class="btn btn-danger" onclick="deleteProduct({{$product->id}})">Delete</button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="modal fade" id="addProduct" role="dialog">
        <div class="modal-dialog">
            <form action="" method="POST" id='add_product_form'>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Product</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        @csrf
                        <label for="category_id">Category:</label>
                        <select name="category_id" id="category_id">
                            <option value="0">Please select</option>
                            @if (!empty($categorys))
                            @foreach ($categorys as $category)
                            <option value="{{ $category['id'] }}">{{ $category['category_name'] }}</option>
                            @endforeach
                            @endif
                        </select><br>
                        <div class="category_id-error"></div>
                        <label for="product_name">Product:</label><br>
                        <input type="text" id="product_name" name="product_name" value=""><br>
                        <div class="product_name-error"></div>
                        <label for="description">Description:</label><br>
                        <input type="text" id="description" name="description" value=""><br>
                        <div class="description-error"></div>
                        <label for="price">Price:</label><br>
                        <input type="text" id="price" name="price" value=""><br>
                        <div class="price-error"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="add_product_submit_btn btn btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="editProduct" role="dialog">
        <div class="modal-dialog">
            <form action="" method="POST" id='edit_product_form'>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Product</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        @csrf
                        <input type="hidden" id="product_id" name="product_id" value="">
                        <label for="category_id">Category:</label>
                        <select name="category_id" id="edit_category_id">
                            <option value="0">Please select</option>
                            @if (!empty($categorys))
                            @foreach ($categorys as $category)
                            <option value="{{ $category['id'] }}">{{ $category['category_name'] }}</option>
                            @endforeach
                            @endif
                        </select><br>
                        @error('category_id')
                        <div class="error"></div>
                        @enderror
                        <label for="product_name">Product:</label><br>
                        <input type="text" id="edit-product_name" name="product_name" value=""><br>
                        <div class="edit-product_name-error"></div>
                        <label for="description">Description:</label><br>
                        <input type="text" id="edit-description" name="description" value=""><br>
                        <div class="edit-description-error"></div>
                        <label for="price">Price:</label><br>
                        <input type="text" id="edit-price" name="price" value=""><br>
                        <div class="edit-price-error"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="edit_product_submit_btn btn btn-success">Save</button>
                    </div>
                </div>
            </form>
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
</x-app-layout>
