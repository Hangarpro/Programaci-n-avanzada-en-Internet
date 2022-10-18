<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Hola</h1>
    <form class="" action="http://127.0.0.1:8000/users/" method="post">
      @csrf
      <input type="text" name="name" value="" placeholder="name">
      <input type="text" name="lastname" value="" placeholder="lastname">
      <button type="submit" name="button">Guardar</button>
    </form>
  </body>
</html>
