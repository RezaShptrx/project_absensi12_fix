<?php
    require "session.php"
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
    <!-- Bootsrap Akhir -->

    <title>Dashboard Admin</title>
</head>

<body>

    <?php
    include "./inc/sidebar.php";
    ?>

    <div class="background-content">
        <?php 
         include  "./inc/menu-button.php"        
        ?>
        <!-- CARD AWAL -->
        <div class="card-content m-5">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">SMKN 12 JAKARTA</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Card</h6>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore consequuntur quas est aliquid qui tenetur repudiandae vitae sequi, quo accusamus ducimus vel debitis fuga obcaecati harum pariatur. Ad, optio. Adipisci?</p>
                </div>
            </div>
        </div>
        <!-- CARDA AKHIR-->
    </div>


</body>
<script src="./js/sidebar.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script> -->

</html>