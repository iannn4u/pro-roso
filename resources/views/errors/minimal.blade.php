<!DOCTYPE html>
<html lang="en">

<head>
    <x-partial.head.meta></x-partial.head.meta>
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Inter:regular,600,700" rel="stylesheet" />
    <style>
        *,
        html,
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: inter;
        }

        ::selection {
            background-color: #242323;
            color: #ddd;
        }

        body {
            min-height: 100vh;
            display: grid;
            place-items: center;
        }

        .container {
            text-align: center;
        }

        .title {
            display: inline-block;
            font-size: calc(5em + 5vh);
            line-height: 1;
        }

        .description {
            font-weight: 700;
            font-size: calc(1.05em + 1vh);
            color: #333;
        }

        .back-link {
            text-decoration: none;
            margin-top: 1.15em;
            display: inline-block;
        }

        .back-link:hover {
            text-decoration: underline;
            text-underline-offset: 3px;
        }

        .back-link:focus,
        .back-link:active {
            color: rgba(0, 0, 238, 0.764);
        }

        @media (max-width: 768px) {
            body {
                font-size: 74.5%;
            }

            .description {
                font-size: 150%;
            }
        }
    </style>
</head>

<body class="antialiased">
    <div class="container">
        <h1 class="title">@yield('code')</h1>
        <p class="description">@yield('message')</p>
        <a href="/" class="back-link" aria-label="return">Return <code>/</code></a>
    </div>
</body>

</html>