<?php
require "session.php";
include "./service/koneksi.php";

if (isset($_POST['btnSimpan']) && $_POST['btnSimpan'] == 'simpan') {
    $NIP = isset($_POST['NIP']) ? trim($_POST['NIP']) : '';
    $Nama = isset($_POST['Nama']) ? trim($_POST['Nama']) : '';

    $nip_digits = preg_replace('/\D/', '', $NIP);

    if (strlen($nip_digits) < 18) {
        echo "<script>alert('Masukan angka 18 digit');</script>";
    } else {
        $NIP_escaped = mysqli_real_escape_string($koneksi, $NIP);
        $Nama_escaped = mysqli_real_escape_string($koneksi, $Nama);

        $query_sql = "insert into opsi (NIP,Nama) values ('$NIP_escaped','$Nama_escaped')";
        $Rs_sql = mysqli_query($koneksi, $query_sql);
        if ($Rs_sql) {
            echo "<script> alert('Sukses Input Data') </script>";
        } else {
            $err = mysqli_error($koneksi);
            echo "<script>alert('Gagal Input Data: " . addslashes($err) . "');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>

    <!-- Font Awesome Awal -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
    <!-- Font Awesome Akhir -->

    <!-- Font Googles Awal -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <!-- Font Googles Akhir -->

    <!-- Bootsrap & CSS Awal -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/admin.css">
    <link rel="stylesheet" href="./CSS/tambahdata.css">
    <!-- Bootsrap Akhir -->

</head>

<body>

    <?php
    include './inc/sidebar.php';
    ?>

    <div class="background-content">
        <?php
        include './inc/menu-button.php';
        ?>
        <div class="input-container">
            <div class="input-form">
                <h2>INPUT DATA</h2>
                <form name="form1" action="" method="post" onsubmit="return validateForm();">

                    <div class="form-group">
                        <label for="NIP">NIP</label>
                        <input type="text" name="NIP" id="NIP" class="form-control" maxlength="18" placeholder="Masukan NIP Anda" minlength="18" inputmode="numeric" pattern="\d{18}" title="Masukan 18 digit angka">
                    </div>

                    <div class="form-group mt-1">
                        <label for="NIP">Nama</label>
                        <input type="text" name="Nama" id="nama" class="form-control" placeholder="Masukan Nama Anda" autocomplete="off">
                    </div>

                    <button type="submit" name="btnSimpan" value="simpan" class="btn1">Input</button>
                    <button type="reset" name="btnReset" class="btn2">Reset</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function validateForm() {
            var nipField = document.getElementById('NIP');
            var nip = nipField.value.trim();
            var digits = nip.replace(/\D/g, '');

            if (digits.length < 18) {
                alert('Masukan angka 18 digit');
                nipField.focus();
                return false;
            }

            return true;
        }
    </script>

    <script src="./js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>