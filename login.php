<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>facebook</title>
    <!-- link css -->
    <?php include 'asset/inc/SetupLinkCSS.php'; ?>
</head>

<body>

    <!-- form login -->
    <div class="d-flex justify-content-center mt-5">
        <img src="asset/img/logo.svg" width="170" alt="">
    </div>
    <div class="container login">
        <form action="" class="p-3 shadow">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Email Atau Nomor Telepon">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Kata Sandi">
            </div>
            <div class="mb-3">
                <button class="btn btn-masuk form-control">Masuk</button>
            </div>
            <div class="mb-3 d-flex justify-content-center">
                <a href="">Lupa Kata Sandi?</a>
            </div>
            <div class="mb-3">
                <hr>
            </div>
            <div class="mb-3 d-flex justify-content-center">
                <a href="" class="btn btn-daftar">Buat Akun Baru</a>
            </div>
        </form>
    </div>

    <!-- link javascript -->
    <?php include 'asset/inc/SetupLinkJS.php'; ?>
</body>

</html>