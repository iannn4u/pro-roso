<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <x-partial.head.meta></x-partial.head.meta>
  
  <title>{{ $title }} - {{ config('app.name') }}</title>

  <x-partial.head.css></x-partial.head.css>

</head>

<body class="bg-gray-50 grid place-items-center min-h-screen">

  <!-- Content-->
  {{ $slot }}


  <!-- Additional Script -->
  @stack('js')
  <!-- CDN Script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>

</body>

</html>
