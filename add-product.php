<?php
include "product_class.php";
$addProducts = new Products();

if (isset($_POST['submit'])) {
    $addProducts->add_Product($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a product!</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script>
$(document).ready(function(){
          $("#weightdiv").hide();
          $("#sizediv").hide();
          $("#widthdiv").hide();
          $("#lengthdiv").hide();
          $("#heightdiv").hide();
    $("#productType").change(function(){
        
      var type = $('#productType').find(":selected").text();
      	if (type == "DVD") {
          $("#weightdiv").hide();
          $("#sizediv").show();
          $("#widthdiv").hide();
          $("#lengthdiv").hide();
          $("#heightdiv").hide();
      } else if (type == "Book") {
          $("#weightdiv").show();
          $("#sizediv").hide();
          $("#widthdiv").hide();
          $("#lengthdiv").hide();
          $("#heightdiv").hide();
      } else if (type == "Furniture") {
          $("#weightdiv").hide();
          $("#sizediv").hide();
          $("#widthdiv").show();
          $("#lengthdiv").show();
          $("#heightdiv").show();
      }
    });
});    
</script>
</head>
<body>
    <main>
        <div>
            <form id="product_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                <div class="d-flex">
                    <h2 class="mr-auto m-3">Product add</h2>
                    <button name="submit" type="submit" class="m-3 p-3 btn btn-outline-dark h-50">Save</button>
                    <a href="https://scanditestarmandsk.000webhostapp.com/index.php" class="m-3 p-3 btn btn-outline-dark h-50">Cancel</a>
                </div>
                <hr>
                <div class="ml-5">
                    <div>
                        <label for="sku">SKU</label>
                        <input type="text" name="sku" id="sku">
                    </div>
                    <div>
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div>
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price">
                    </div>
                    <div>
                        <label for="productType">Type Switcher</label>
                        <select name="productType" id="productType">
                            <option value="" selected disabled>Type Switcher</option>
                            <option value="DVD">DVD</option>
                            <option value="Book">Book</option>
                            <option value="Furniture">Furniture</option>
                        </select>
                    </div>
                    <div id="weightdiv" >
                        <label for="weight">Weight</label>
                        <input type="number" name="weight" id="weight">
                        <p class="ml-5">"Product description"</p>
                    </div>
                    <div id="sizediv" >
                        <label for="size">Size</label>
                        <input type="number" name="size" id="size">
                        <p class="ml-5">"Product description"</p>
                    </div>
                    <div id="widthdiv" >
                        <label for="width">Width</label>
                        <input type="number" name="width" id="width">
                    </div>
                    <div id="lengthdiv" >
                        <label for="length">Length</label>
                        <input type="number" name="length" id="length">
                    </div>
                    <div id="heightdiv" >
                        <label for="height">Height</label>
                        <input type="height" name="height" id="height">
                        <p class="ml-5">"Product description"</p>
                    </div>
                </div>
            </form>
        </div>
    </main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>