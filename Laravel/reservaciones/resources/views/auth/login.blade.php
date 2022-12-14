<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
      Acceso al panel
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <link rel="stylesheet" href="public/css/main.css"> -->
  </head>
  <body>
    <h1>@if (Auth::user())
      {{Auth::user()->name}}
    @endif</h1>
    <section class="h-screen">
        <div class="flex h-screen justify-center items-center">
          <div class="">

            <div class="">
              <form class="" action="{{ url('login/') }}" method="post">
                @csrf
                <div class="mb-6 flex justify-center ">
                  <img
                  src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/Tailwind_CSS_Logo.svg/2048px-Tailwind_CSS_Logo.svg.png"
                  style="width: 8rem;"
                  class="w-full"
                  alt="Tailwind Logo"
                  />
                </div>
                <div class="mb-6">
                  <input
                  class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                  type="text" name="email" value="" placeholder="Enter email">
                </div>
                <div class="mb-6">
                  <input
                  type="password"
                  name="password"
                  class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                  placeholder="Password">
                </div>
                <button
                type="submit"
                class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full"
                data-mdb-ripple="true"
                data-mdb-ripple-color="light"
                >
                Acceder
                </button>
              </form>
            </div>
          </div>
        </div>
    </section>
  </body>
</html>
