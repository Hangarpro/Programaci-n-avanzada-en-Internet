<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="{{ url('/clients/') }}" method="post">
      @method('PUT')
      @csrf
      <label for="name">Nombre</label>
      <input type="text" name="name" value="{{$client->name}}" placeholder="Mauricio">
      <label for="email">Email</label>
      <input type="text" name="email" value="{{$client->email}}" placeholder="example@domain.com">
      <label for="phone_number">Número de telefono</label>
      <input type="text" name="phone_number" value="{{$client->phone_number}}" placeholder="612XXXXXXX">
      <button type="submit" name="button">Actualizar</button>
      <input type="hidden" name="id" value="{{$client->id}}">
    </form>
  </body>
</html>
