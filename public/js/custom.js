/* Javascript for Shopping cart */
$(document).ready(function() {
    // add category
    $('.add_category_submit_btn').click(function(e) {
        e.preventDefault();
        var formData = $("#add_category_form").serialize();
        $.ajax({
            url: '/category',
            type: 'POST',
            data: formData,
            success: function(data) {
                if (data.success) {
                    $('#addCategory').modal('toggle');
                    document.getElementById("add_category_form").reset();
                    window.location.reload();
                }
            },
            error: function(xhr) {
                $("#spinner-text").html('');
                if (xhr.status == 422) {
                    var data = xhr.responseJSON;
                    $.each(data.errors, function(key, val) {
                        $("." + key + "-error").text(val[0]);
                    });
                }
            }
        });
    });

    // update category
    $('.edit_category_submit_btn').click(function(e) {
        e.preventDefault();
        var formData = $("#edit_category_form").serialize();
        $.ajax({
            url: '/update-category',
            type: 'POST',
            data: formData,
            success: function(data) {
                if (data.success) {
                    $('#editCategory').modal('toggle');
                    window.location.reload();
                }
            },
            error: function(xhr) {
                $("#spinner-text").html('');
                if (xhr.status == 422) {
                    var data = xhr.responseJSON;
                    $.each(data.errors, function(key, val) {
                        $(".edit-" + key + "-error").text(val[0]);
                    });
                }
            }
        });
    });

    // add product
    $('.add_product_submit_btn').click(function(e) {
        e.preventDefault();
        var formData = $("#add_product_form").serialize();
        $.ajax({
            url: '/product',
            type: 'POST',
            data: formData,
            success: function(data) {
                if (data.success) {
                    $('#addProduct').modal('toggle');
                    document.getElementById("add_product_form").reset();
                    window.location.reload();
                }
            },
            error: function(xhr) {
                $("#spinner-text").html('');
                if (xhr.status == 422) {
                    var data = xhr.responseJSON;
                    $.each(data.errors, function(key, val) {
                        $("." + key + "-error").text(val[0]);
                    });
                }
            }
        });
    });

    // update product
    $('.edit_product_submit_btn').click(function(e) {
        e.preventDefault();
        var formData = $("#edit_product_form").serialize();
        $.ajax({
            url: '/update-product',
            type: 'POST',
            data: formData,
            success: function(data) {
                if (data.success) {
                    $('#editProduct').modal('toggle');
                    window.location.reload();
                }
            },
            error: function(xhr) {
                $("#spinner-text").html('');
                if (xhr.status == 422) {
                    var data = xhr.responseJSON;
                    $.each(data.errors, function(key, val) {
                        $(".edit-" + key + "-error").text(val[0]);
                    });
                }
            }
        });
    });

    // add user
    $('.add_user_submit_btn').click(function(e) {
        e.preventDefault();
        var formData = $("#add_user_form").serialize();
        $.ajax({
            url: '/user',
            type: 'POST',
            data: formData,
            success: function(data) {
                if (data.success) {
                    $('#addUser').modal('toggle');
                    document.getElementById("add_user_form").reset();
                    window.location.reload();
                }
            },
            error: function(xhr) {
                $("#spinner-text").html('');
                if (xhr.status == 422) {
                    var data = xhr.responseJSON;
                    $.each(data.errors, function(key, val) {
                        $("." + key + "-error").text(val[0]);
                    });
                }
            }
        });
    });

    // update user
    $('.edit_user_submit_btn').click(function(e) {
        e.preventDefault();
        var formData = $("#edit_user_form").serialize();
        $.ajax({
            url: '/update-user',
            type: 'POST',
            data: formData,
            success: function(data) {
                if (data.success) {
                    $('#editUser').modal('toggle');
                    window.location.reload();
                }
            },
            error: function(xhr) {
                $("#spinner-text").html('');
                if (xhr.status == 422) {
                    var data = xhr.responseJSON;
                    $.each(data.errors, function(key, val) {
                        $(".edit-" + key + "-error").text(val[0]);
                    });
                }
            }
        });
    });
});

//edit category
function editCategory(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'edit-category/' + id,
        type: 'get',
        success: function(data) {
            console.log(data.category_name);
            $('#category_id').val(data.id);
            $('#edit_name').val(data.category_name);
            $('#editCategory').modal('show');
        }
    });
}

//delete category
function deleteCategory(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "delete-category/" + id,
        method: "POST",
        data: {
            "id": id,
            "_method": 'POST'
        },
        success: function(data) {
            if (data.success) {
                window.location.reload();
            }
        }
    });
}

//edit product
function editProduct(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'edit-product/' + id,
        type: 'get',
        success: function(data) {
            $("#edit_category_id").val(data.category.id).trigger('change');
            $('#product_id').val(data.id);
            $('#edit-product_name').val(data.product_name);
            $('#edit-description').val(data.description);
            $('#edit-price').val(data.price);
            $('#editProduct').modal('show');
        }
    });
}

//delete product
function deleteProduct(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "delete-product/" + id,
        method: "POST",
        data: {
            "id": id,
            "_method": 'POST'
        },
        success: function(data) {
            if (data.success) {
                window.location.reload();
            }
        }
    });
}

//edit user
function editUser(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'edit-user/' + id,
        type: 'get',
        success: function(data) {
            $('#user_id').val(data.id);
            $('#edit_name').val(data.name);
            $('#edit_email').val(data.email);
            $('#editUser').modal('show');
        }
    });
}

//delete user
function deleteUser(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "delete-user/" + id,
        method: "POST",
        data: {
            "id": id,
            "_method": 'POST'
        },
        success: function(data) {
            if (data.success) {
                window.location.reload();
            }
        }
    });
}
