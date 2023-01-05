<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard</title>
</head>
<body>

<?php include("menu.php");?>
<?php include("functions.php");?>
<div class="container pt-5">
<?php 
$is_auth = is_autheniticated();
if(!$is_auth){header('Location: index.php');}

if(isset($_GET["view"]) && $_GET["view"] == "product"){
    echo '
    <h1>Products 
        <small class="float-right" style="font-size:50%;">
            <button type="button" onclick="return on_add(`product`);" class="btn btn-xs btn-secondary">
            <i class="fas fa-plus"></i> Add Product</button>
        </small>
    </h1>
    ';
    
    $products = product_read_all();
    
    ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
    <?php
        foreach($products as $product) {
            echo '
            <tr>
                <td>'.$product["id"].'</td>
                <td>'.$product["title"].'</td>
                <td class="text-center">
                    <button type="button" onclick="return on_edit('.$product["id"].', `product`);" class="btn btn-sm btn-warning">Edit</button>
                    <button type="button" onclick="return on_delete('.$product["id"].', `product`);" class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>
            ';
        }
        if($products === null) {
            echo '
            <tr>
                <td colspan="3" class="text-center">No product added yet</td>
            </tr>
            ';
        }
    ?>
        </tbody>
    <table>
    <?php
} else {
    ?>
    <div class="card">
        <div class="card-body">
            <h1><i class="fas fa-home"></i> Welcome to Dashboard</h1>
        </div>
    </div>
    <?php
}
?>
</div>
<div id="modal_product_add" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form_product_add" action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="form-group">
                        <label>Body</label>
                        <textarea class="form-control" name="body" cols="30" rows="10" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" step="0.01" min="0" max="1000000" class="form-control" name="price" required>
                    </div>
                    <input type="hidden" name="type" value="product">
                    <input type="hidden" name="action" value="add">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="modal_product_edit" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form_product_edit" action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label>Body</label>
                        <textarea class="form-control" name="body" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" step="0.01" min="0" max="1000000" class="form-control" name="price">
                    </div>
                    <input type="hidden" name="type" value="product">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id" value="-1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script>
(function($){
window.on_delete = function(id, type){
    if (type == "product") {
        var result = confirm("Are you sure to delete ?");
        if (result) {
            //console.log(action);
            $.ajax({
                type: 'POST',
                url: '/functions.php?view=product',
                data: {id: id, type: type, action: 'delete'},
                dataType: 'json',
                success: function(res){
                    console.log(res);
                    window.location.reload();
                },
                error: function(e){}
            })
        }
    }
}
window.on_edit = function(id, type){
    if (type == "product") {
        $.ajax({
            type: 'POST',
            url: '/functions.php?view=product',
            data: {id: id, type: type, action: 'read'},
            dataType: 'json',
            success: function(res){
                //console.log(res.title);
                $("#modal_product_edit input[name=title]").val(res.title);
                $("#modal_product_edit textarea[name=body]").val(res.body);
                $("#modal_product_edit input[name=price]").val(res.price);
                $("#modal_product_edit input[name=action]").val('update');
                $("#modal_product_edit input[name=id]").val(res.id);
                $('#modal_product_edit').modal('show');
            },
            error: function(e){}
        });
    }
}
window.on_add = function(type){
    if (type == "product") {
        $('#modal_product_add').modal('show');
    }
}
var request;
$("#form_product_add,#form_product_edit").on("submit", function(e){
    // Prevent default posting of form - put here to work in case of errors
    e.preventDefault();
    // Abort any pending request
    if (request) {request.abort();}
    var $form = $(this);
    // Let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");
    // Serialize the data in the form
    var serializedData = $form.serialize();
    // Let's disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);
    request = $.ajax({
        url: '/functions.php?view=product',
        type: 'POST',
        data: serializedData,
        dataType: 'json',
    });
    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        console.log("Hooray, it worked!");
        window.location.reload();
    });
    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });
    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });
});

})(jQuery);
</script>
</body>
</html>



