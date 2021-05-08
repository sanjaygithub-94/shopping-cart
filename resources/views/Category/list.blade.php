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
            <a class="btn btn-link" href="{{url('/admin')}}">Back</a>
            <button class="btn btn-dark" data-toggle="modal" data-target="#addCategory">Add Category</button>
        </div>
        <table class="my-5 table table-striped">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            @foreach($categories as $key => $category)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$category->category_name}}</td>
                <td>
                    <!-- <button class="btn btn-primary" onclick="editCategory({{$category->id}})">Edit</button> -->
                    <button class="btn btn-danger" onclick="deleteCategory({{$category->id}})">Delete</button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>



    <div class="modal fade" id="addCategory" role="dialog">
        <div class="modal-dialog">
            <form action="" method="POST" id='add_category_form'>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Category</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        @csrf
                        <label for="name">Name:</label><br>
                        <input type="text" id="name" name="category_name" value=""><br>
                        <div class="name-error"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success add_category_submit_btn">Save</button>
                    </div>
                </div>
        </div>
        </form>
    </div>

    <div class="modal fade" id="editCategory" role="dialog">
        <div class="modal-dialog">
            <form action="" method="POST" id='edit_category_form'>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Category</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        @csrf
                        <input type="hidden" id="category_id" name="category_id" value="">
                        <label for="name">Name:</label><br>
                        <input type="text" id="edit_name" name="category_name" value=""><br>
                        <div class="edit-name-error"></div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success edit_category_submit_btn">Save</button>
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
