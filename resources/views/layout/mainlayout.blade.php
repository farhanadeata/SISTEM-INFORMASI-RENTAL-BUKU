<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <title>Rental Buku | @yield('title')</title>
</head>

<style>
    .main {
        height: 100vh;
    }

    .sidebar {
        background: rgb(85, 85, 85);
        color: white;
    }


    .sidebar a {
        color: white;
        text-decoration: none;
        display: block;
        padding: 10px 10px;
    }

    .sidebar a:hover {
        background: #198754;
    }
</style>

<body>

    <div class="main f-flex flex-colum justify-content-between">
        <nav class="navbar navbar-dark  navbar-expand-lg bg-success ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Rental Buku</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarSupportedContent">

                    @if (Auth::user()->role_id == 1)
                        <a href="dashboard">Dashboard</a>
                        <a href="books">Books</a>
                        <a href="#">Categories</a>
                        <a href="#">Users</a>
                        <a href="#">Rent Log</a>
                        <a href="logout">Logout</a>
                    @else
                        <a href="profile">Profile</a>
                        <a href="logout">Logout</a>
                    @endif

                </div>
                <div class="content p-5 col-lg-10">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>



</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
