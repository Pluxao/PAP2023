<?php
    require '../../config.php';
    require '../../verificar.php';
    $usuario = [];
    $id = filter_input(INPUT_GET, 'id');
    if($id){
        $sql = $pdo->prepare("SELECT *FROM usuarios WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $usuario = $sql->fetch(PDO::FETCH_ASSOC);
            }else{
                header("location:./umeuperfil.php");
            }
        }else{
            header("location:./umeuperfil.php");
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
    <title>Loongoka | INÍCIO</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../../css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../../css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/style.css" type="text/css">
    <link rel="stylesheet" href="../../css/adicionais.css" type="text/css">
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
            <a href="uhome.php"><img src="../../img/loongoka.png" alt=""></a>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/lingua.png" alt="">
                <div>Português</div>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="../../uhome.php">INÍCIO</a></li>
                <li><a href="../../utodoslivros.php">LIVROS</a></li>
                <li><a href="#">SOBRE</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">A PLATAFORMA</a></li>
                        <li><a href="./shoping-cart.html">CRIADORES</a></li>
                        <li><a href="./checkout.html">TERMOS DE USO</a></li>
                        <li><a href="./blog-details.html">POLÍTICAS DE PRIVACIDADE</a></li>
                    </ul>
                </li>
                <li><a href="../../ublog.php">BLOG</a></li>
                <li><a href="../../contact.html">CONTACTOS</a></li>
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
                                <img src="../../img/lingua.png" alt="">
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
                        <a href="../../uhome.php"><img src="../../img/loongoka.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="../../uhome.php">INÍCIO</a></li>
                            <li><a href="../../utodoslivros.php">LIVROS</a></li>
                            <li><a href="#">SOBRE</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">A PLATAFORMA</a></li>
                                    <li><a href="./shoping-cart.html">CRIADORES</a></li>
                                    <li><a href="./checkout.html">TERMOS DE USO</a></li>
                                    <li><a href="./blog-details.html">POLÍTICAS DE PRIVACIDADE</a></li>
                                </ul>
                            </li>
                            <li><a href="../../ublog.php">BLOG</a></li>
                            <li><a href="../../contact.html">CONTACTOS</a></li>
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

    <section class="text-center">
    <div class="login">
        <div class="login_texto">
            <p>Actualize a,</p>
            <h1>Sua senha facilmente</h1>
        </div><br>
        <div class="login_form">
        <form action="usenha_action.php" method="post">
            <input type="text" name="id" value="<?=$usuario['id']?>" hidden>
            <input type="password" placeholder="Nova senha" name="senha"><br><br>
            <input type="password" placeholder="Confirmar nova senha" name="confsenha"><br><br>
            <button class="primary-btn" type="submit">Actualizar senha</button>
        </form>
        </div><br><br>
    </div>
    </section>
    
    
    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="../../img/loongoka-logo.png" alt=""></a>
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
                            <li><a href="#">Início</a></li>
                            <li><a href="#">Livros</a></li>
                            <li><a href="#">Plataforma</a></li>
                            <li><a href="#">Criadores</a></li>
                            <li><a href="#">Termos de uso</a></li>
                            <li><a href="#">Políticas de privacidade</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Contactos</a></li>
                            <li><a href="#">Login</a></li>
                            <li><a href="#">Cadastrar-se</a></li>
                            <li><a href="#">Manuais Escolares</a></li>
                            <li><a href="#">Tecnologias</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Envie-nos o seu E-mail</h6>
                        <p>E receba atualizações por e-mail sobre nossa livraria.</p>
                        <form action="#">
                            <input type="text" placeholder="Coloque o seu E-mail">
                            <button type="submit" class="site-btn">Inscrever-se</button>
                        </form>
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
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados | Este Sistema foi feito<i class="fa fa-heart" aria-hidden="true"></i> por <a href="https:loongoka.com" target="_blank">Abel Canas </a>e<a href="#" target="_blank"> Santos Francisco</a></p></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.nice-select.min.js"></script>
    <script src="../../js/jquery-ui.min.js"></script>
    <script src="../../js/jquery.slicknav.js"></script>
    <script src="../../js/mixitup.min.js"></script>
    <script src="../../js/owl.carousel.min.js"></script>
    <script src="../../js/main.js"></script>
  </body>
  </html>