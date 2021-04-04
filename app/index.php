<?php
session_start();
if(!$_SESSION['usuario']){
    session_destroy();
    header('Location: ../');
    die();
}
$usuario = $_SESSION['usuario'];
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/css/icon.css">
    <link rel="stylesheet" href="../assets/css/material.indigo-pink.min.css">
    <script defer src="../assets/js/material.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Material Design for Bootstrap fonts and icons -->
    <link rel="stylesheet" href="../assets/css/css.css">

    <!-- Material Design for Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap-material-design.min.css">

    <script src="../assets/js/sweetalert.min.js"></script>


    <title>Home </title>
</head>
<body>

<?php
    if($_GET['message']){
        ?>
        <script>
            swal("Aviso", "<?php echo $_GET['message'] ?>", "info");
        </script>
        <?php
    }
?>
<div id="aplicacion">

    <home-app user="<?php echo $usuario['name'] ?>"></home-app>

</div>

<?php
include '../components/componentes.php';
?>
<!-- Optional JavaScript -->
<script src="../assets/js/jquery-3.2.1.slim.min.js"></script>
<script src="../assets/js/popper.js"></script>
<script src="../assets/js/bootstrap-material-design.js" ></script>
<script src="../assets/js/vue@2.js"></script>
<script src="../components/main.js"></script>
<script>
    var app = new Vue({
        el: '#aplicacion'
    })
</script>
</body>
</html>

