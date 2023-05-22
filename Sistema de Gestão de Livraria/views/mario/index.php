<?php
     require '../config.php';
     require '../verificar.php';

     $categorias = [];
    $cat = $pdo->query("SELECT *FROM livros_categorias");
    if($cat->rowCount() > 0){
        $categorias = $cat->fetchALL(PDO::FETCH_ASSOC);
    }
    $antigos = [];
    $livl = $pdo->query("SELECT *FROM livros, livros_categorias, usuarios WHERE livros.cod_categoria = livros_categorias.id_categoria AND livros.cadastrador = usuarios.id ORDER BY cod_categoria DESC limit 3");
    if($livl->rowCount() > 0){
        $antigos = $livl->fetchALL(PDO::FETCH_ASSOC);
    }

    $novos = [];
    $livl = $pdo->query("SELECT *FROM livros, livros_categorias, usuarios WHERE livros.cod_categoria = livros_categorias.id_categoria AND livros.cadastrador = usuarios.id ORDER BY cod_categoria limit 3");
    if($livl->rowCount() > 0){
        $novos = $livl->fetchALL(PDO::FETCH_ASSOC);
    }

    $destaques = [];
    $destaques = $pdo->query("SELECT *FROM livros, livros_categorias, usuarios WHERE livros.cod_categoria = livros_categorias.id_categoria AND livros.cadastrador = usuarios.id ORDER BY cod_categoria DESC limit 6");
    if($destaques->rowCount() > 0){
        $desta = $destaques->fetchALL(PDO::FETCH_ASSOC);
    }
    $livros = [];
    $liv = $pdo->query("SELECT *FROM livros, livros_categorias, usuarios WHERE livros.cod_categoria = livros_categorias.id_categoria AND livros.cadastrador = usuarios.id ORDER BY cod_categoria DESC limit 8");
    if($liv->rowCount() > 0){
        $livros = $liv->fetchALL(PDO::FETCH_ASSOC);
    }
    $listapost = [];
    $posts = $pdo->query("SELECT *FROM posts");
    if($posts->rowCount() > 0){
        $listapost = $posts->fetchALL(PDO::FETCH_ASSOC);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilo.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../css/adicionais.css" type="text/css">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <title>Mário Jump - LOONGOKA</title>
</head>
<body>
   <!-- Page Preloder -->
   <div id="preloder">
    <div class="loader"></div>
</div>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="uhome.php"><img src="img/loongoka.png" alt=""></a>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <img src="img/lingua.png" alt="">
            <div>Português</div>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li><a href="./uhome.php">INÍCIO</a></li>
            <li><a href="./utodoslivros.html">LIVROS</a></li>
            <li><a href="#">SOBRE</a>
                <ul class="header__menu__dropdown">
                    <li><a href="./shop-details.html">A PLATAFORMA</a></li>
                    <li><a href="./shoping-cart.html">CRIADORES</a></li>
                    <li><a href="./checkout.html">TERMOS DE USO</a></li>
                    <li><a href="./blog-details.html">POLÍTICAS DE PRIVACIDADE</a></li>
                    <li><a href="./blog-details.html">CONTACTOS</a></li>
                </ul>
            </li>
            <li><a href="./ublog.php">BLOG</a></li>
            <li  class="active"><a href="../jogos.php">JOGOS</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i>loongoka@gmail.com</li>
        </ul>
    </div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i>loongoka@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__language">
                            <img src="img/lingua.png" alt="">
                        </div>
                        <div class="header__top__right__language">
                            <a href="painel/views/umeuperfil.php" style="color:black;"><i class="fa fa-user"></i>&nbsp;&nbsp;Meu Perfil</a>
                        </div>
                        <div class="header__top__right__auth">
                            <a href="logout.php"><i class="fa fa-sign-out"></i>LOGOUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="./index.html"><img src="img/loongoka.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li><a href="./uhome.php">INÍCIO</a></li>
                        <li><a href="./utodoslivros.php">LIVROS</a></li>
                        <li><a href="#">SOBRE</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="./shop-details.html">A PLATAFORMA</a></li>
                                <li><a href="./shoping-cart.html">CRIADORES</a></li>
                                <li><a href="./checkout.html">TERMOS DE USO</a></li>
                                <li><a href="./blog-details.html">POLÍTICAS DE PRIVACIDADE</a></li>
                                <li><a href="./blog-details.html">CONTACTOS</a></li>
                            </ul>
                        </li>
                        <li><a href="./ublog.php">BLOG</a></li>
                        <li class="active"><a href="../jogos.php">JOGOS</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->
    <div class="estagios">
        <a class="primary-btn" href="estagio1.php">Estágio 1</a>
        <a class="primary-btn" href="estagio2.php">Estágio 2</a>
        <a class="primary-btn" href="estagio3.php">Estágio 3</a>
        <a class="primary-btn" href="estagio4.php">Estágio 4</a>
        <a class="primary-btn" href="estagio5.php">Estágio 5</a>
        
        

    </div>
    <script src="./js/script.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script src="./js/bootstrap.min.js"></script>

    <!-- Js Plugins -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.nice-select.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/jquery.slicknav.js"></script>
    <script src="../js/mixitup.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>