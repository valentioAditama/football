<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

  <!-- IziToats Notify -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
        integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
        crossorigin="anonymous" referrerpolicy="no-referrer"/>

  <!-- AlpineJS -->
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

  <!-- Scripts -->
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>

<div id="app">
  <main>
    @yield('content')
  </main>
</div>

{{-- loading page content loaded data --}}
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Show loading spinner when the page starts loading
    document.getElementById("loading").style.display = "block";

    // Hide loading spinner when the page finishes loading
    window.addEventListener("load", function () {
      document.getElementById("loading").style.display = "none";
    });
  });

</script>

{{-- loading button after submit--}}
<script>
  document.getElementById('form').addEventListener('submit', function () {
    // hidden loading before
    document.getElementById('beforeButton').style.display = "none";

    // Show loading spinner
    document.getElementById('afterButton').style.display = 'block';

    // You may also want to disable the submit button to prevent multiple submissions
    document.querySelector('button[type="submit"]').setAttribute('disabled', 'true');
  });

</script>

<!-- tailwind css -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- IziToats Notify -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
        integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Flowbit Components -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

</body>
</html>
