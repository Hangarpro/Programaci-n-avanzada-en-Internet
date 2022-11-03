<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h3>Clientes</h3>
    <table>
      <thead>
        <tr>
          <td>#</td>
          <td>Name</td>
          <td>Email</td>
          <td>Phone</td>
          <td>Actions</td>
        </tr>
      </thead>
      <tbody>
        @foreach ($clients as $client)
        <tr>
          <td>
            {{ $client->id }}
          </td>
          <td>
            {{ $client->name }}
          </td>
          <td>
            {{ $client->email }}
          </td>
          <td>
            {{ $client->phone_number }}
          </td>
          <td>
            <a href="{{ url('/clients/edit/'.$client->id) }}">Editar</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>
