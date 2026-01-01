<?php
require "session.php";
include "service/koneksi.php";

date_default_timezone_set('Asia/Jakarta');

$error = "";
$success = "";

if (isset($_POST['submit']) || isset($_POST['action'])) {
    $pilihan = isset($_POST['pilihan']) ? intval($_POST['pilihan']) : 0;
    $action = isset($_POST['action']) ? $_POST['action'] : (isset($_POST['submit']) ? 'tap1' : '');

    if ($pilihan > 0 && in_array($action, ['tap1', 'tap2', 'reset'])) {
        if ($action === 'tap1') {
            $new_value = 1;
        } elseif ($action === 'tap2') {
            $new_value = 2;
        } else {
            $new_value = 0;
        }

        $stmt = mysqli_prepare($koneksi, "UPDATE opsi SET kehadiran = ? WHERE id = ?");
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ii", $new_value, $pilihan);
            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                header("Location: " . $_SERVER['PHP_SELF'] . "?selected=" . $pilihan . "&ok=1");
                exit;
            } else {
                $error = "Tidak ada perubahan (mungkin baris tidak ditemukan atau sudah bernilai yang sama).";
            }

            mysqli_stmt_close($stmt);
        } else {
            $error = "Gagal menyiapkan query: " . mysqli_error($koneksi);
        }
    } else {
        $error = "Silakan pilih opsi yang valid dan pastikan tindakan benar.";
    }
}

$search_input = "";
if (isset($_POST['tombolcari'])) {
    $search_input = trim($_POST['cari'] ?? "");
}

$rows = [];
if ($search_input !== "") {
    $like = '%' . $search_input . '%';
    $stmt = mysqli_prepare($koneksi, "SELECT id, nip, nama, kehadiran FROM opsi WHERE nama LIKE ? OR nip LIKE ?");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $like, $like);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        if ($res) {
            while ($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            mysqli_free_result($res);
        }
        mysqli_stmt_close($stmt);
    } else {
        $error = "Gagal menyiapkan query pencarian: " . mysqli_error($koneksi);
    }
} else {
    $stmt = mysqli_prepare($koneksi, "SELECT id, nip, nama, kehadiran FROM opsi");
    if ($stmt) {
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        if ($res) {
            while ($r = mysqli_fetch_assoc($res)) {
                $rows[] = $r;
            }
            mysqli_free_result($res);
        }
        mysqli_stmt_close($stmt);
    } else {
        $error = "Gagal menyiapkan query: " . mysqli_error($koneksi);
    }
}

$selected_id = isset($_GET['selected']) ? intval($_GET['selected']) : 0;
$selected_kehadiran = null;
if ($selected_id > 0) {
    $stmt = mysqli_prepare($koneksi, "SELECT kehadiran FROM opsi WHERE id = ?");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $selected_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $kval);
        if (mysqli_stmt_fetch($stmt)) {
            $selected_kehadiran = intval($kval);
        }
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi</title>

    <!-- CSS ABSENSi AWAL -->
    <script src="https://kit.fontawesome.com/84fbd1af82.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/absensi.css">
    <link rel="stylesheet" href="./CSS/admin.css">
    <!-- CSS ABSENSi AKHIR -->

    <!-- Font Googles Awal -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <!-- Font Googles Akhir -->
</head>

<body class="bd">

    <?php
    include "./inc/sidebar.php";
    ?>

<div class="background-content">
    <?php 
     include "./inc/menu-button.php";    
    ?>       
        <div class="container mt-1">
            <?php if (!empty($error)): ?>
            <div class="alert alert-warning"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            <?php if (!empty($success)): ?>
                <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
                <?php endif; ?>
                
                <div class="date-content m-2">
                    <div class="main-date p-2">
                        <?php
               $hari_indo = array(
    'Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa',
    'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat',
    'Saturday' => 'Sabtu');

                $hari_inggris = date('l');
                echo ($hari_indo[$hari_inggris] . "," . " " . date('d') . "-" . date('m') . "-" . date('y'));
                ?>
            </div>
        </div>
        
        <div class="scroll">
            <table class="table table-dark table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIP</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">Status Kehadiran</th>
                        <th scope="col">
                            <form action="" method="post" class="d-flex">
                                <input type="text" name="cari" class="form-control form-control-sm me-2" value="<?php echo htmlspecialchars($search_input); ?>">
                                <button type="submit" name="tombolcari" class="btn btn-secondary btn-sm">Cari</button>
                            </form>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($rows)) {
                        $no = 1;
                        foreach ($rows as $row_sql) {
                            $id = intval($row_sql['id']);
                            $nip = htmlspecialchars($row_sql['nip']);
                            $nama = htmlspecialchars($row_sql['nama']);
                            $kehad = isset($row_sql['kehadiran']) ? intval($row_sql['kehadiran']) : 0;
                            
                            if ($kehad === 0) {
                                $kehadiran_display = '
                                <form method="post" style="display:inline">
                                <input type="hidden" name="pilihan" value="' . $id . '">
                                <button type="submit" name="action" value="tap1" class="btn btn-danger btn-sm">0</button>
                                </form>';
                            } elseif ($kehad === 1) {
                                $kehadiran_display = '
                                <form method="post" style="display:inline">
                                <input type="hidden" name="pilihan" value="' . $id . '">
                                <button type="submit" name="action" value="tap2" class="btn btn-warning btn-sm">1</button>
                                </form>';
                            } elseif ($kehad === 2) {
                                $kehadiran_display = '<button type="button" class="btn btn-success btn-sm" disabled>2</button>';
                            } else {
                                $kehadiran_display = '<button type="button" class="btn btn-secondary btn-sm" disabled>' . htmlspecialchars((string)$kehad) . '</button>';
                            }
                            
                            echo "<tr>";
                            echo "<td>{$no}</td>";
                            echo "<td>{$nip}</td>";
                            echo "<td>{$nama}</td>";
                            echo "<td>{$kehadiran_display}</td>";
                            ?>
                            
                            <td>
                                <form method="post" style="display:inline" onsubmit="return confirmReset();">
                                    <input type="hidden" name="pilihan" value="<?php echo $id; ?>">
                                    <button type="submit" name="action" value="reset" class="btn btn-danger btn-sm">Reset</button>
                                </form>
                            </td>
                            <?php
                            echo "</tr>";
                            $no++;
                        }
                    } else {
                        echo "<tr><td colspan='5'>Tidak ada data.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
    <script>
        function confirmReset() {
            return confirm('Yakin ingin mereset kehadiran menjadi 0 untuk data ini?');
        }
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="./js/sidebar.js"></script>
</body>

</html>
