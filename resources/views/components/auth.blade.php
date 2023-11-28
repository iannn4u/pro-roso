<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{{ $title }} | {{ config('app.name') }}</title>

  <!-- My CSS-->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <!-- Tailwindcss-->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome-->
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

</head>

<body class="bg-gray-50 grid place-items-center h-screen">


  <!-- Content-->
  {{ $slot }}

  <!-- JQuery-->
  <script src="/vendor/jquery/jquery.min.js"></script>

</body>

</html>