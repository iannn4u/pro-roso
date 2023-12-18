    @if (session('download'))
    <meta http-equiv="refresh" content="0; url={{ url('/download/' . session('download')) }}">
    @endif
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="shortcut icon" href="" type="image/svg+xml">
    <meta name="author" content="">