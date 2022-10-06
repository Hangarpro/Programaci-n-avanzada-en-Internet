<?php
include_once 'config.php';

if (isset($_POST['action'])) {
  if (isset($_POST['g_token']) && $_POST['g_token'] == $_SESSION['g_token']) {
    switch ($_POST['action']) {
      case 'create':
      $name = strip_tags($_POST['name']);
      $slug = strip_tags($_POST['slug']);
      $description = strip_tags($_POST['description']);
      $features = strip_tags($_POST['features']);
      $brand = strip_tags($_POST['brand']);
      $productsController = new Products;
      $productsController->createProduct($name, $slug, $description, $features, $brand);
      break;

      case 'update':
      $name = strip_tags($_POST['name']);
      $slug = strip_tags($_POST['slug']);
      $description = strip_tags($_POST['description']);
      $features = strip_tags($_POST['features']);
      $brand = strip_tags($_POST['brand']);
      $id = strip_tags($_POST['id']);
      $productsController = new Products;
      $productsController->editProduct($name, $slug, $description, $features, $brand, $id);
      break;

      case 'remove':
      $id = strip_tags($_POST['id']);
      $productsController = new Products;
      $productsController->remove($id);
      break;

      default:
      // code...
      break;
    }
  }
}
/**
 *
 */
class Products
{

  public function getProducts()
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer ' . $_SESSION['token']
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $response = json_decode($response);
    if (isset ($response->code) && $response->code > 0){
      return $response->data;
    } else {
      array();
    }
  }

  public function createProduct($name, $slug, $description, $features, $brand)
  {
    $img = $_FILES["cover"]["tmp_name"];
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('name' => $name,
                                  'slug' => $slug,
                                  'description' => $description,
                                  'features' => $features,
                                  'brand_id' => $brand,
                                  'cover' => new CURLFILE($img)),
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['token']
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $response = json_decode($response);
    if (isset ($response->code) && $response->code > 0){
      header("Location:./../products?success=true");
    } else{
      header("Location:../products?error=true");
    }
  }

  public function getProduct($id)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/' . $id,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['token']
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $response = json_decode($response);
    if (isset ($response->code) && $response->code > 0){
        return $response->data;
    } else{
      header("Location:../products?error=true");
    }
  }

  public function editProduct($name, $slug, $description, $features, $brand, $id)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'PUT',
      CURLOPT_POSTFIELDS => 'name=' . $name. '&slug=' . $slug. '&description=' . $description.'&features=' . $features.'&brand_id=' . $brand.'&id=' . $id,
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['token']
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    if (isset ($response->code) && $response->code > 0){
          header("Location:../products");
    } else {
      header("Location:../products?error=true");
    }
  }

  public function remove($id)
  {
    $curl = curl_init();

       curl_setopt_array($curl, array(
       CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/'.$id,
       CURLOPT_RETURNTRANSFER => true,
       CURLOPT_ENCODING => '',
       CURLOPT_MAXREDIRS => 10,
       CURLOPT_TIMEOUT => 0,
       CURLOPT_FOLLOWLOCATION => true,
       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
       CURLOPT_CUSTOMREQUEST => 'DELETE',
       CURLOPT_HTTPHEADER => array(
           'Authorization: Bearer ' . $_SESSION['token']
       ),
       ));

       $response = curl_exec($curl);

       curl_close($curl);
       $response = json_decode ($response);
       if (isset ($response->code) && $response->code > 0) {
           return true;
       } else {
           return false;
       }
  }
}


 ?>
