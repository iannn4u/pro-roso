    <!-- Main Style-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Tailwindcss-->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome-->
    <!--- <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <!-- Custom Font -->
    {{-- <link href="https://fonts.cdnfonts.com/css/alliance-no1" rel="stylesheet"> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preload" href="{{ asset('css/Mona-Sans.woff2') }}" as="font" type="font/woff2" crossorigin>

    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
          theme: {
            extend: {
                fontFamily: {
                    mona: 'Mona Sans, ui-serif',
                    poppins: 'Poppins, ui-serif',
                }
            }
          }
        }
    </script>

    <!-- Inline  CSS -->
    @stack('style')
