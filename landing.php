<?php
require "session.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <!-- Font Awesome Awal -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
    <!-- Font Awesome Akhir -->

    <!-- Bootsrap & CSS Awal -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/admin.css">
    <link rel="stylesheet" href="./CSS/landing.css">
    <!-- Bootsrap Akhir -->
</head>

<body>

    <?php
    include "./inc/sidebar.php";
    ?>

    <di class="page-content">
        <?php
        include "./inc/menu-button.php";
        ?>
        <div class="text-header">
            <h1>SMKN 12 JAKARTA</h1>
            <h1>ABSENSI</h1>
        </div>

        <div class="paragraf">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium enim tempore dolores ea deleniti impedit incidunt ipsum officia libero dolor dolore cupiditate magni, recusandae, asperiores eos quod nemo earum repellendus vel cum sapiente sequi veritatis repellat eius! Dicta perferendis placeat dolorem laboriosam adipisci quisquam quo quia vero inventore praesentium facere, quos maxime facilis? Accusamus omnis nulla assumenda quod, provident aperiam aut voluptatem libero! Magni illo deleniti distinctio obcaecati aspernatur ratione.</p>
        </div>

        <section class="py-5">
            <div class="container">
                <div class="row g-4 text-center">
                    <div class="col-md-4">
                        <div class="card stats-card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <i class="fa-solid fa-chalkboard-user fa-2x text-primary mb-2"></i>
                                <h3 class="fw-bold display-6 mb-1" data-target="100">0</h3>
                                <p class="text-muted mb-0">Guru Aktif</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card stats-card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <i class="fa-solid fa-award fa-2x text-warning mb-2"></i>
                                <h3 class="fw-bold display-6 mb-1">
                                    <span class="accreditation-text" data-final="A">-</span>
                                </h3>
                                <p class="text-muted mb-0">Akreditasi</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card stats-card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <i class="fa-solid fa-school fa-2x text-success mb-2"></i>
                                <h3 class="fw-bold display-6 mb-1" data-target="4">0</h3>
                                <p class="text-muted mb-0">Program Keahlian</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <footer class="py-4 bg-dark text-white mt-1">
            <div class="container text-center">
                <small>© 2025 SMKN 12 Jakarta. Semua hak dilindungi.</small>
            </div>
        </footer>


</body>
<script src="./js/sidebar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="./js/numbercount.js"></script>

</html>
