<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="http://127.0.0.1:8000/clients" method="post">
      @csrf
      <label for="name">Nombre</label>
      <input type="text" name="name" value="" placeholder="Mauricio">
      <label for="email">Email</label>
      <input type="text" name="email" value="" placeholder="example@domain.com">
      <label for="phone_number">Número de telefono</label>
      <input type="text" name="phone_number" value="" placeholder="612XXXXXXX">
      <button type="submit" name="button">Guardar</button>
    </form>
  </body>
</html>
