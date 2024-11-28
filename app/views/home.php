<!DOCTYPE html>
<html class="no-js" lang="pt-br">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Thememarch" />
    <!-- Favicon Icon -->
    <link rel="icon" href="<?php BASE_URL ?>assets/img/favicon.svg" />
    <!-- Site Title -->
    <title><?php echo $titulo; ?></title>
    <link rel="stylesheet" href="http://localhost/kioficina/public/assets/css/plugins/lightgallery.min.css">
    <link rel="stylesheet" href="http://localhost/kioficina/public/assets/css/plugins/swiper.min.css">
    <link rel="stylesheet" href="http://localhost/kioficina/public/assets/css/plugins/aos.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="http://localhost/kioficina/public/assets/css/style.css">
</head>

<body>

    <?php require_once('template/preloader.php'); ?>

    <?php require_once('template/topo.php'); ?>

    <?php require_once('template/banner.php'); ?>

    <?php require_once('template/serviceProgress.php'); ?>

    <?php require_once('template/mychose.php'); ?>

    <?php require_once('template/servico.php'); ?>

    <?php require_once('template/video.php'); ?>

    <?php require_once('template/factCounter.php'); ?>

    <?php require_once('template/testiomonal.php'); ?>

    <?php require_once('template/trustedCliente.php'); ?>

    <?php require_once('template/team.php'); ?>

    <?php require_once('template/pricing.php'); ?>

    <?php require_once('template/blog.php'); ?>

    <?php require_once('template/scrollUp.php'); ?>

    <?php require_once('template/videoPopup.php'); ?>


    <?php require_once('template/footer.php'); ?>

    
    <div class="modal" id="loginModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="#loginModal" aria-label="Close"></button>
                </div>
 
                <div class="modal-body">
 
                    <form method="POST" action="http://localhost/kioficina/public/auth/login">
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" require>
                        </div>
                        <div class="mb-3">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" id="senha" class="form-control" require>
                        </div>
                     
                        <div class="form-floating">
                            <select class="form-select" name="tipo_usuario" class="form-control"  require>
                                <option value="selecione">Selecione como quer entrar:</option>
                                <option value="cliente">Cliente</option>
                                <option value="funcionario">Fúncionario</option>
 
                            </select>
 
                        </div>
 
                        <div class="modal-footer">
                            <button type="submit    " class="btn btn-secondary" data-bs-dismiss="modal">enviar</button>
                            <button type="button" class="btn btn-primary">fechar</button>
                        </div>
 
                    </form>
 
                </div>
 
 
 
            </div>
        </div>
    </div>
 






    <script src="assets/js/plugins/jquery-3.7.1.min.js"></script>
    
    <script src="assets/js/plugins/lightgallery.min.js"></script>
    <script src="assets/js/plugins/simplePagination.min.js"></script>
    <script src="assets/js/plugins/aos.js"></script>
    <script src="assets/js/plugins/swiper.min.js"></script>
    <script src="assets/js/plugins/SplitText.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

    <?php var_dump($_GET['login-erro'])?>

<?php if (isset($_GET['login-erro'])): ?>
    <script>
        $(document).ready(() => {
            $('exampleModal').modal('show');

        })
    </script>
<?php endif; ?>



</body>

</html>