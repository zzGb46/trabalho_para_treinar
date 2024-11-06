<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Thememarch" />
    <!-- Favicon Icon -->
    <link rel="icon" href="<?php BASE_URL ?>assets/img/favicon.svg" />
    <!-- Site Title -->
    <title><?php echo isset($titulo) ? $titulo : 'Ki oficina '; ?></title>
    <link rel="stylesheet" href="<?php BASE_URL ?>assets/css/plugins/lightgallery.min.css">
    <link rel="stylesheet" href="<?php BASE_URL ?>assets/css/plugins/swiper.min.css">
    <link rel="stylesheet" href="<?php BASE_URL ?>assets/css/plugins/aos.css">
    <link rel="stylesheet" href="<?php BASE_URL ?>assets/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="<?php BASE_URL ?>assets/css/style.css">
</head>

<body>

    <?php require_once('template/preloader.php'); ?>

    <?php require_once('template/topo.php'); ?>


    <?php require_once('template/form.php'); ?>


    <?php require_once('template/contact.php'); ?>

    <?php require_once('template/footer.php'); ?>


    <?php require_once('template/scrollUp.php'); ?>

    <?php require_once('template/videoPopup.php'); ?>

    <!-- Script -->
    <script src="assets/js/plugins/jquery-3.7.1.min.js"></script>
    <script src="assets/js/plugins/lightgallery.min.js"></script>
    <script src="assets/js/plugins/simplePagination.min.js"></script>
    <script src="assets/js/plugins/aos.js"></script>
    <script src="assets/js/plugins/swiper.min.js"></script>
    <script src="assets/js/plugins/SplitText.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>