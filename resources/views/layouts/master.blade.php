<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>@yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <style>
        /*index*/
        .card {
            display: inline-block;
            box-shadow: 0 0 10px #ccc;
            margin: 10px;
            margin-right: 10px
        }

        /*show*/
        .btn-group {
            gap: 5px;
            margin: 5px;
        }

        /*create*/
        .add-form {
            display: flex;
            flex-direction: column;
            width: 25%;
            margin: 0 auto;
        }

        h1 {
            text-align: center
        }

        input[type="text"] {
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-shadow: 0 0 5px #ccc;
        }

        input[type="file"] {
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-shadow: 0 0 5px #ccc;
        }

        #add-btn {
            margin: 10px 0;
            padding: 10px;
        }

        /*edit*/
        .edit-form {
            display: flex;
            flex-direction: column;
            width: 25%;
            margin: 0 auto;
        }

        h1 {
            text-align: center
        }

        input[type="text"] {
            margin: 10px 0;

            border-radius: 5px;
            border: 1px solid #ccc;
            box-shadow: 0 0 5px #ccc;
        }

        #edit-btn {
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.create') }}">Create Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About us</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Enter product name"
                        aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    @yield('content')
    


</body>

</html>
