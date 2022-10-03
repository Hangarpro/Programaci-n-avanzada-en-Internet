<?php
include_once './../app/ProductsController.php';
$temp = new Products();
$productos = $temp->getProducts();

if (isset($_GET['slug'])) {
  foreach ($productos as $producto) {
    if ($producto->slug == $_GET['slug']) {
      $detalles = $temp->getProduct($producto->id);
    }
  }
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "./../templates/head.php"; ?>
  </head>
  <body>
    <!-- navbar -->
    <?php include "./../templates/navbar.php"; ?>
    <div class="container-fluid">
      <div class="row">
        <!-- sidebar -->
        <?php include "./../templates/sidebar.php"; ?>
        <div class="col-lg-10 col-sm-10 mt-4">
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-10">
                <img src="<?php echo $detalles->cover ?>" class="card-img-top" alt="...">
              </div>
              <div class="col-lg-8 col-md-8 col-sm-10">
                <p class="h3"><?php echo $detalles->name ?></p>
                <span class="text-muted"><?php echo $detalles->brand->name ?></span>
                <br><br>
                <p class="h6">Descripción:</p>
                <p><?php echo $detalles->description ?></p>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-lg-9">
                <p class="h6">Caracteristicas:</p>
                <p><?php echo $detalles->features ?></p>
              </div>
              <div class="col-lg-3 offset-lg-0">
                <p class="h6">Categorias:</p>
                <?php foreach ($detalles->categories as $categoria) {?>
                  <li><?php echo $categoria->name ?></li>
                <?php } ?>
                <br>
                <p class="h6">Etiquetas:</p>
                <?php foreach ($detalles->tags as $etiqueta) {?>
                  <li><?php echo $etiqueta->name ?></li>
                <?php } ?>
              </div>
            </div>
        </div>
      </div>
      </div>
    <?php include "./../templates/scripts.php"; ?>

    <script type="text/javascript">
      function remove(target){
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Poof! Your imaginary file has been deleted!", {
              icon: "success",
            });
          } else {
            swal("Your imaginary file is safe!");
          }
        });
      }
    </script>
  </body>
</html>
