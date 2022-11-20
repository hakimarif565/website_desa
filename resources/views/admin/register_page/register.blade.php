<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Desa Ngagel Rejo Surabaya</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Open+Sans:300,400,600,700"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
                urls: ['/assets/css/fonts.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/azzara.min.css">
</head>

<body class="login">
    <div class="wrapper wrapper-login">
        <div class="container container-login animated fadeIn">
            <center><img src="{{ asset('img/logo sby.png') }}" width="80px" height="75px"></center><br>
            <h3 class="text-center">Register Akun Admin</h3>

            <form method="POST" action="/registering" enctype="multipart/form-data">
                @csrf
                <div class="register-form">
                    <div class="form-group form-floating-label">
                        <input id="desa_id" name="desa_id" type="text" class="form-control input-border-bottom" required>
                        <label for="name" class="placeholder">Desa</label>
                    </div>
                    <div class="form-group form-floating-label">
                        <input id="user_name" name="user_name" type="text" class="form-control input-border-bottom" required>
                        <label for="name" class="placeholder">Nama Lengkap</label>
                    </div>
                    <div class="form-group form-floating-label">
                        <input id="username" name="username" type="text" class="form-control input-border-bottom" required>
                        <label for="name" class="placeholder">Username</label>
                    </div>
                    <div class="form-group form-floating-label">
                        <input id="email" name="email" type="text" class="form-control input-border-bottom" required>
                        <label for="password" class="placeholder">Email</label>
                    </div>
                    <div class="form-group form-floating-label">
                        <input id="password" name="password" type="password" class="form-control input-border-bottom" required>
                        <label for="password" class="placeholder">Password</label>
                        <div class="show-password">
                            <i class="flaticon-interface"></i>
                        </div>
                    </div>
                    <div class="form-action mb-3 float-left">
                        <a class="btn btn-warning btn-rounded " href="/login">Kembali</a>
                        {{-- <button type="submit" class="btn btn-primary btn-rounded">Login</button> --}}
                    </div>
                    <div class="form-action mb-3 float-right">
                        <button type="submit" class="btn btn-primary btn-rounded">Daftar</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
    <script src="/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="/assets/js/core/popper.min.js"></script>
    <script src="/assets/js/core/bootstrap.min.js"></script>
    <script src="/assets/js/ready.js"></script>
</body>

</html>


