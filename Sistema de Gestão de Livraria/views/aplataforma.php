<?php
     require 'config.php';
     require 'verificar.php';
     require 'admin.php';

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
<html lang="pt-pt">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="./img/wind.png" type="image/x-icon"/>
    <title>Sobre a plataforma</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/adicionais.css" type="text/css">
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
            <a href="home.php"><img src="img/loongoka.png" alt=""></a>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/lingua.png" alt="">
                <div>Português</div>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li><a href="home.php">INÍCIO</a></li>
                <li><a href="./atodoslivros.php">LIVROS</a></li>
                <li class="active"><a href="#">SOBRE</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./aplataforma.php">A PLATAFORMA</a></li>
                        <li><a href="./atermos.php">TERMOS DE USO</a></li>
                        <li><a href="./apoliticas.php">POLÍTICAS DE PRIVACIDADE</a></li>
                        <li><a href="./acontactos.php">CONTACTOS</a></li>
                    </ul>
                </li>
                <li><a href="./blog.php">BLOG</a></li>
                <li><a href="./ajogos.php">PASSATEMPOS</a></li>
                <li><a href="painel/views/dashboard.php" style="color: black;">Painel</a></li>
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
                                <a href="painel/views/dashboard.php" style="color: black;">Painel</a>
                            </div>
                            <div class="header__top__right__language">
                                <a href="painel/views/meuperfil.php" style="color:black;"><i class="fa fa-user"></i>&nbsp;&nbsp;Meu Perfil</a>
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
                        <a href="./home.php"><img src="img/loongoka.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="home.php">INÍCIO</a></li>
                            <li><a href="./atodoslivros.php">LIVROS</a></li>
                            <li class="active"><a href="#">SOBRE</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./aplataforma.php">A PLATAFORMA</a></li>
                                    <li><a href="./atermos.php">TERMOS DE USO</a></li>
                                    <li><a href="./apoliticas.php">POLÍTICAS DE PRIVACIDADE</a></li>
                                    <li><a href="./acontactos.php">CONTACTOS</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.php">BLOG</a></li>
                            <li><a href="./ajogos.php">PASSATEMPOS</a></li>
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

   <!-- Breadcrumb Section Begin -->
   <section class="breadcrumb-section set-bg" style="background-color: #ff9300;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>A plataforma</h2>
                        <div class="breadcrumb__option">
                            <a href="home.php">Início</a>
                            <span>A plataforma</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><br><br>
    <!-- Breadcrumb Section End -->

    <!-- Hero Section Begin -->
   <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2><b>QUEM SOMOS?</b></h2><br>
                    <div class="sobre" style="text-align: justify;">
                        <p>Somos a <b>LOONGOKA</b>, um ambiente virtual destinada ao auxílio dos alunos, jovens e crianças na obtenção de materiais didácticos para a aprendizagem dos conteúdos programáticos do currículo do Ensino Primário e do Iº. Ciclo do Ensino Secundário bem como também diversos livros que servem de ajuda no ambito académico e investigativo.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img style="width: 100%; height:300px;"src="img/jovens.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- termos de uso -->
    <section class="hero" style="background-color: #ff9300;"><br>
        <div class="container">
            <div class="row" style="align-item: center;">
                <div class="col-lg-6">
                    <img src="img/aluna.png" alt="">
                </div>
                <div class="col-lg-6">
                    <h2 style="color: white;"><b>Quem pode usar?</b></h2><br>
                    <div class="sobre" style="text-align: justify;">
                        <p style="color: white;">Esta livraria digital <b>LOONGOKA</b> destina-se aos alunos do Ensino Primário, alunos do Iº. Ciclo do Ensino Secundário, alunos do IIº. Ciclo do Ensino Secundário bem como também alunos universitários que queiram obter livros com finalidade de leitura e pesquisas</p>
                        <p style="color: white;">Pessoas que procuram obter livros de graça também podem aderir a esta plataforma!</p>
                        <div class="text-center">
                            <img src="img/livros.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><br>
    <!-- fim dos termos de uso -->

    <!-- Desenvolvedores -->
    <section class="hero"><br>
        <h2 class="container"><b>O QUE PODES FAZER?</b></h2><br>
        <div class="container">
            <div class="row" style="align-item: center;">
                <div class="col-lg-6">
                    <ul class="container">
                        <li>Visualizar Livros</li>
                        <li>Ler Livros</li>
                        <li>Baixar Livros</li>
                        <li>Ver postes</li>
                        <li>Comentar</li>
                        <li>Passatempos</li>    
                    </ul>
                </div>
                <div class="col-lg-6">
                    <a href="uhome.php"><img src="img/loongoka-logo.png" alt=""></a>   
                </div>
            </div>
        </div>
    </section>
    
    <!-- fim desenvolvedores -->

   <!-- Footer Section Begin -->
   <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./home.php"><img src="img/loongoka-logo1.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Endereço: Travessa 22 Rua-E Luanda</li>
                            <li>Telefone: +244 939.248.383</li>
                            <li>Email: loongoka@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Links Úteis</h6>
                        <ul>
                            <li><a href="#inicio">Início</a></li>
                            <li><a href="atodoslivros.php">Livros</a></li>
                            <li><a href="aplataforma.php">Plataforma</a></li>
                            <li><a href="atermos.php">Termos de uso</a></li>
                            <li><a href="apoliticas.php">Políticas de privacidade</a></li>
                            <li><a href="acontactos.php">Contactos</a></li>
                        </ul>
                        <ul>
                            <li><a href="blog.php">Blog</a></li>
                            <li><a href="ajogos.php">Passatempos</a></li>
                            <li><a href="cadastrar.php">Cadastrar-se</a></li>
                            <li><a href="#">Perfil</a></li>
                            <li><a href="login.php">Login</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Compre com a carteira digital</h6>
                        <p>Obter um livro nunca foi tão fácil como agora</p>
                        <img src="img/paypal-logo.png" alt="">
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>document.write(new Date().getFullYear());</script> Todos os direitos reservados
                                | Este Sistema foi desenvolvido por <b>Abel Canas</b> e <b>Santos Francisco</b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    

</body>
</html>