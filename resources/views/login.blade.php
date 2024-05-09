<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style type="text/css">
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }
</style>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <div class="text-center">
                        <h3 class="mt-1 mb-2 pb-1">Sign In</h3>
                        <h5 class="mt-1 mb-5 pb-1">silahkan masukan Akun yang telah di buat</h5>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-danger text-center">
                            {{ session('massage') }}
                        </div>
                    @endif
                    <form action="" method="POST">
                        @csrf
                        <!-- Email input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="text" id="u_name" name="u_name" class="form-control form-control-lg"
                                required />
                            <label class="form-label">Username</label>
                        </div>

                        <!-- Password input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="password" id="password" name="password" class="form-control form-control-lg"
                                required />
                            <label class="form-label">Password</label>
                        </div>

                        <div class="d-flex justify-content-start align-baseline mb-4">
                            <!-- Checkbox -->
                            <a href="register" class="text-success">Belum mempunyai akun?</a>
                        </div>

                        <!-- Submit button -->
                        <div class="d-grid gap-2">
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-success btn-lg btn-block">Sign in</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
