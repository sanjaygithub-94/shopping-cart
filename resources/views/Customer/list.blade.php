<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">

    </h2>
</x-slot>
<!DOCTYPE html>
<html>

<head>
    <title>User</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <div class="buttons">
            <a class="btn btn-link" href="{{url('/admin')}}">Back</a>
            <!-- <button class="btn btn-dark" data-toggle="modal" data-target="#addUser">Add User</button> -->
        </div>
        <table class="my-5 table table-striped">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <!-- <th>Action</th> -->
            </tr>
            @foreach($users as $key => $user)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <!-- <td>
                    <button class="btn btn-primary" onclick="editUser({{$user->id}})">Edit</button>
                    <button class="btn btn-danger" onclick="deleteUser({{$user->id}})">Delete</button>
                </td> -->
            </tr>
            @endforeach
        </table>
    </div>



    <div class="modal fade" id="addUser" role="dialog">
        <div class="modal-dialog">
            <form action="" method="POST" id='add_user_form'>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add User</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        @csrf
                        <label for="name">Name:</label><br>
                        <input type="text" id="name" name="name" value=""><br>
                        <div class="name-error"></div>
                        <label for="email">Email:</label><br>
                        <input type="text" id="email" name="email" value=""><br>
                        <div class="emil-error"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success add_user_submit_btn">Save</button>
                    </div>
                </div>
        </div>
        </form>
    </div>

    <div class="modal fade" id="editUser" role="dialog">
        <div class="modal-dialog">
            <form action="" method="POST" id='edit_user_form'>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit User</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        @csrf
                        <input type="hidden" id="user_id" name="user_id" value="">
                        <label for="name">Name:</label><br>
                        <input type="text" id="edit_name" name="name" value=""><br>
                        <div class="edit-name-error"></div>
                        <label for="email">Email:</label><br>
                        <input type="text" id="edit_email" name="email" value=""><br>
                        <div class="edit-email-error"></div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success edit_user_submit_btn">Save</button>
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
