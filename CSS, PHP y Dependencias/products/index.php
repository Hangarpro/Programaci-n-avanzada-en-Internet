<?php
include_once './../app/ProductsController.php';
include_once './../app/BrandController.php';
$temp = new Products();
$productos = $temp->getProducts();
$temp = new BrandController();
$marcas = $temp->getBrands();
?>
<html lang="en" dir="ltr">
  <head>
    <?php include  "./../templates/head.php"; ?>
  </head>
  <body>
    <!-- navbar -->
    <?php include "./../templates/navbar.php"; ?>
    <div class="container-fluid">
      <div class="row">
        <!-- sidebar -->
        <?php include "./../templates/sidebar.php"; ?>
        <!-- breadcrumb -->
        <div class="col-lg-10 col-sm-12">
            <div class="row m-2 border-bottom">
              <div class="col">
                <span>Productos</span>
              </div>
              <div class="col">
                <button onclick="addProduct()" class="btn btn-info float-end mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" name="button">Añadir producto</button>
              </div>
            </div>
            <div class="row row-cols-1 row-cols-md-4 g-4">
              <?php foreach ($productos as $producto) {?>
              <div class="col">
                <div class="card border-info h-100" style="width: 18rem;">
                  <img src="<?php echo $producto->cover ?>" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $producto->name ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">
                      <?php
                      if ($producto->brand != null){
                        echo $producto->brand->name;
                      } else{
                        echo "- - -";
                      }
                        ?>
                    </h6>
                    <p class="card-text"><?php echo $producto->description ?></p>

                  </div>
                  <div class="card-footer">
                    <div class="row">
                      <a href="#" data-product='<?php echo json_encode($producto) ?>' onclick="editProduct(this)" class="btn btn-warning col-md-6" data-bs-toggle="modal" data-bs-target="#exampleModal">Editar</a>
                      <a href="#" class="btn btn-danger col-md-6" onclick="remove(this)">Eliminar</a>
                    </div>
                    <div class="row">
                      <a href="./detalles.php?slug=<?php echo $producto->slug?>" class="btn btn-info col-md-12">Detalles</a>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
          <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Añadir Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form enctype="multipart/form-data" action="./../app/ProductsController.php" method="post">


                  <div class="modal-body">
                    <div class="form-floating mb-3">
                      <input type="text" name="name" class="form-control" placeholder="Tostitos Hot" id="name" required>
                      <label for="name">Nombre</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="text" name="slug" class="form-control" placeholder="tostitos-hot" id="slug" required>
                      <label for="slug">Slug</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="text" name="description" class="form-control" placeholder="Tostitos versión picante" id="description" required>
                      <label for="description">Descripción</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="text" name="features" class="form-control" placeholder="Ricos y baratos" id="features" required>
                      <label for="features">Caracteristicas</label>
                    </div>
                    <div class="input-group mb-3">
                      <label class="input-group-text" for="brand">Marca</label>
                      <select class="form-select" id="brand" name="brand" required>
                        <?php foreach ($marcas as $marca) {?>
                        <option value="<?php echo $marca->id; ?>"><?php echo $marca->name ?></option>
                      <?php } ?>
                      </select>
                    </div>
                    <div class="input-group mb-3">
                      <input type="file" name="cover" class="form-control" placeholder="Cover" id="cover" >
                      <span class="input-group-text" for="cover">Subir</span>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Añadir producto</button>
                  </div>
                  <input type="hidden" name="action" id="productInput">
                  <input type="hidden" id="id" name="id">
                  </form>
                </div>
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

      function addProduct() {
        document.getElementById('productInput').value = 'create';
        document.getElementById("name").value = "";
        document.getElementById("slug").value = "";
        document.getElementById("description").value = "";
        document.getElementById("features").value = "";
        document.getElementById("brand").value = 1;
      }

      function editProduct(target) {
        document.getElementById('productInput').value = 'update';
        let product = JSON.parse(target.getAttribute('data-product'));
        document.getElementById("name").value = product.name;
        document.getElementById("slug").value = product.slug;
        document.getElementById("description").value = product.description;
        document.getElementById("features").value = product.features;
        document.getElementById("brand").value = product.brand_id;
        document.getElementById("id").value = product.id;

      }
    </script>
  </body>
</html>
