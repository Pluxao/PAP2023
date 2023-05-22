<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilo4.css">
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
            <li  class="active"><a href="index.php">JOGOS</a></li>
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
                        <li class="active"><a href="index.php">JOGOS</a></li>
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
    <div class="game-board2">
        <img src="./imagens/arvores1.png" class="cactos">
        <img src="./imagens/lua.png" class="sol">
        <img src="./imagens/passaros.gif" class="passaros">
        <img src="./imagens/nuvens1.png" class="nuvens">
        <img src="./imagens/mario.gif" class="mario">
        <img src="./imagens/pipe.png" class="pipe"> 
    </div>
    <audio hidden controls class="pular">
        <source src="./som/saltar.mp3" type="audio/mp3">
    </audio>
    <audio hidden controls class="over">
        <source src="./som/gameover.mp3" type="audio/mp3">
    </audio>
    <audio controls loop autoplay class="somjogo">
        <source src="./som/mario.mp3" type="audio/mp3">
    </audio>
    <!-- Acesso -->
<div class="modal fade" id="acesso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Fim do jogo</h5>
          <a href="home.php"><button type="button" style="width: 40px; height: 40px;" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></a>
        </div>
        <div class="modal-body text-center">
            <img src="./imagens/mario.webp">
            <h1 class="text-danger"><b>GAME OVER</b></h1>
            <a class="btn btn-danger" style ="color: white;"href="index.html"><img style="width: 40px;" src="./imagens/arrow-repeat.svg" alt=""></i></a>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
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