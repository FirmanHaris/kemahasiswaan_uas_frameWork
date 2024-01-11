<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('assetLogin') }}/css/style.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="col-12">
                <div class="row justify-content-center">

                    <div class="col-6">
                        @if (session()->has('LoginError'))
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                <use xlink:href="#exclamation-triangle-fill" />
                            </svg>
                            <div>
                                {{ session('LoginError') }}
                            </div>
                        </div>
                        @endif
                        <div class="wrap d-flex ">
                            <!-- <div class="img" style="background-image:url({{ asset('assetLogin/images/bg-1.jpg') }});">
                        </div> -->
                            <div class="col-12 p-4">
                                <div class="d-flex justify-content-center">
                                    <div class="">
                                        <h3 class="mb-4"><img src="{{ asset('assetLogin/images/logo.png') }}" width="200"></h3>
                                    </div>
                                </div>
                                <form action="{{ route('loginAct') }}" class="signin-form" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label class="label" for="email">Email</label>
                                        <input type="text" name="email" class="form-control" placeholder="email" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="label" for="password">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign
                                            In</button>
                                    </div>
                                    <div class="form-group d-md-flex">
                                        <div class="w-50 text-left">
                                            <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                                <input type="checkbox" checked>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="w-50 text-md-right">
                                            <a href="#">Forgot Password</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('assetLogin') }}/js/jquery.min.js"></script>
    <script src="{{ asset('assetLogin') }}/js/popper.js"></script>
    <script src="{{ asset('assetLogin') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('assetLogin') }}/js/main.js"></script>

</body>

</html>