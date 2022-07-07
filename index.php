<?php
include "product_class.php";
$addProducts = new Products();
$display = $addProducts->displayProduct();

if (isset($_POST['sku'])) {
    $box = $_POST['sku'];
    while(list ($key,$val) = @each ($box)){
    $addProducts->delete($val);}
    echo "<script> location.href='/'; </script>";
    exit;

}
?>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>

<body>
    <div class="">
            <main class="">
                <div class="d-flex">
                    <h1 class="mr-auto p-2">Product List</h1>
                    <a class="p-2 btn btn-outline-dark h-50" href="/add-product">ADD</a>
                    <button class="p-2 btn btn-outline-dark h-50" id="delete-product-btn" form="delete-form" type="submit" name="sku">MASS DELETE</button>
                </div>

                <div class="d-flex align-content-center flex-wrap">
                    <div class="row justify-content-md-center">
                        <div class="col-md-11">
                            <form id="delete-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                <?php
                                if (count(array($display))) {
                                    if (is_array($display) || is_object($display)) {
                                        foreach ($display as $row) {
                                    ?>
                                        <div class="card m-3">
                                            <div class="card-body">
                                                    <input type="checkbox" class="delete-checkbox"
                                                    name="sku[]"
                                                    value="<?php echo $row['SKU'] ?>">
                                                <div class="product-card-body p-3">
    
                                                    <p><?php echo ucfirst($row['SKU']) ?></p>
                                                    <p><?php echo $row['Name'] ?></p>
    
                                                    <p><?php echo $row['Price'] ?> $</p>
                                                    <?php if($row['Size'] != '') { ?><p>Size: <?php echo $row['Size'] ?> MB</p><?php }?>
                                                    <?php if($row['Weight'] != '') { ?><p>Weight: <?php echo $row['Weight'] ?> MB</p><?php }?>
                                                    <!--<p>Weight: <?php echo $row['Weight'] ?>KG</p> -->
                                                    <?php if($row['Width'] != ''){ ?><p>Dimension: <?php echo $row['Width'] ?>x<?php echo $row['Length'] ?>x<?php echo $row['Height'] ?></p><?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }}
                                 }?>
                            </form>
                        </div>
                    </div>
                </div>
             


<!-- Modal 
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form action="product.php" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update the product </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="update_details">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="update" class="btn btn-primary" id="update">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>-->
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
