    <?php
    session_start();
    if (isset($_SESSION["login"])) {
        header("Location: home.php");
        exit;
    }

    require 'asset/sistem/sis_regis.php';
    // sis regis
    if (isset($_POST["regis"])) {
        if (regis($_POST) > 0) {
            echo "
            <script>
            alert('Registrasi Berhasil Silahkan Login');
            document.location.href = 'index.php';
            </script>
            ";
        } else {
            echo "
            <script>
            alert('Email atau Nomor seluler Sudah Terdaftar!');
            document.location.href = 'index.php';
            </script>
            ";
        }
    }

    $error1 = "";
    $error2 = "";
    // sis login
    if (isset($_POST["masuk"])) {
        global $conn;

        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

        if (mysqli_num_rows($result) === 1) {
            // cek password
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])) {
                // set session
                $_SESSION["login"] = true;
                header("Location: home.php");
                exit;
            } else {
                $error2 = true;
            }
        } else {
            $error1 = true;
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Facebook Masuk atau Daftar</title>
        <!-- link css -->
        <?php include 'asset/inc/SetupLinkCSS.php'; ?>
    </head>

    <body>

        <!-- form login -->
        <div class="d-flex justify-content-center mt-5">
            <img src="asset/img/logo.svg" width="170" alt="">
        </div>
        <div class="container login">
            <form action="" class="p-3 shadow" method="post">
                <?php if ($error2) : ?>
                    <div class="mb-3" id="alertError">
                        <div class="alert alert-danger d-flex justify-content-between" role="alert">
                            <p>Kata Sandi Salah!</p>
                            <button class="btn btn-close" onclick="closeAlert();"></button>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($error1) : ?>
                    <div class="mb-3">
                        <div class="alert alert-danger d-flex justify-content-between" id="alertError" role="alert">
                            <p>Akun Tidak Ditemukan!</p>
                            <button class="btn btn-close" onclick="closeAlert();"></button>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Email Atau Nomor Telepon">
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Kata Sandi">
                </div>
                <div class="mb-3">
                    <button class="btn btn-masuk form-control" type="submit" name="masuk">Masuk</button>
                </div>
                <div class="mb-3 d-flex justify-content-center">
                    <a href="">Lupa Kata Sandi?</a>
                </div>
                <div class="mb-3">
                    <hr>
                </div>
                <div class="mb-3 d-flex justify-content-center">
                    <a type="button" class="btn btn-daftar" data-bs-toggle="modal" data-bs-target="#exampleModal">Buat Akun Baru</a>
                </div>
            </form>
        </div>

        <!-- modal register -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 style="font-weight: bold;" class="modal-title" id="exampleModalLabel">Daftar</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body regis">
                        <form action="" method="post">
                            <div class="mb-3 d-flex">
                                <input type="text" style="margin-right: 5px;" required name="namaDepan" placeholder="Nama depan" class="form-control">
                                <input type="text" style="margin-left: 5px;" required name="namaBelakang" placeholder="Nama belakang" class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" required name="username" placeholder="Nomor seluler atau email">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="password" required placeholder="Kata sandi baru">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" required name="tanggalLahir" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-control" required name="jenisKelamin">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <p class="infoRegis">Dengan mengklik Daftar, Anda menyetujui Ketentuan, Kebijakan Privasi, dan Kebijakan Cookie kami. Anda akan menerima Notifikasi SMS dari kami dan bisa berhenti kapan saja.</p>
                            </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" name="regis" class="btn btn-daftar" style="height: 40px; width: 150px; font-size: 16px;">Daftar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>



        <!-- link javascript -->
        <?php include 'asset/inc/SetupLinkJS.php'; ?>
        <script>
            function closeAlert() {
                let alertError = document.getElementById("alertError");

                alertError.remove();
            }
        </script>
    </body>

    </html>