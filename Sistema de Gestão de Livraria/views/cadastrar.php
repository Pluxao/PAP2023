<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./img/wind.png" type="image/x-icon"/>

    <link rel="stylesheet" href="../views/css/cad.css">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>CADASTRAR - LOONGOKA</title>
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
            <a href="#"><img src="img/loongoka.png" alt=""></a>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/lingua.png" alt="">
                <span class="arrow_carrot-down"></span>
            </div>
            <div class="header__top__right__auth">
                <a href="login.php"><i class="fa fa-user"></i>LOGIN</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.php">Página inicial</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i>loongoka@gmail.com</li>
                <li>PAP 2022/2023</li>
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
                                <li>PAP 2022/2023</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__language">
                                <a style="color: black;"href="./index.php">Página inicial</a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/lingua.png" alt="">
                            </div>
                            <div class="header__top__right__auth">
                                <a href="login.php"><i class="fa fa-user"></i>LOGIN</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <section class="cadastrar">
        <div class="cadastrar_texto">
            <center><img src="img/itel.png" alt="Logotipo do Itel"></center>
            <p>Bem-vindo!</p>
            <h2>Os seus dados são protegidos pela lei da proteção dos dados pessoais(Lei n.º22/11, de 17 de Junho).</h2>
            <h1>Faça o seu cadastro</h1>
        </div>
        <div class="cadastrar_form">
            <form method="post" action="cadastrar_action.php" >
                <div class="entradas">
                    <input class="col-md-3" type="text" name="user" placeholder="Nome de Usuário*" minlength="8" maxlength="16" required>
                    <input class="col-md-3" type="text" name="pnome" placeholder="Primeiro nome*" required>
                    <input class="col-md-3" type="text" name="unome" placeholder="Apelido*" required>
                    <input class="col-md-3" type="email" name="email" placeholder="E-mail*" required>
                    <input class="col-md-3" type="text" name="telefone" minlength="9" maxlength="9" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Número de telefone*" required>
                    <input title="Idade superior a 5 anos" class="col-md-3" type="date" name="nasc" min="<?php echo date('Y-m-d', strtotime('-100 year'));?>" max="<?php echo date('Y-m-d', strtotime('-6 year'));?>" required>
                    <select class="col-md-3" name="genero" placeholder="Gênero*" style="margin: 1%;" required>
                        <option value="Masculino">Masculino*</option>
                        <option value="Femenino">Femenino*</option>
                    </select>
                    <input class="col-md-3" type="password" name="senha" placeholder="Senha*" minlength="8" maxlength="16" required>
                    <input class="col-md-3" type="password" name="confsenha" placeholder="Confirmar senha*" minlength="8" maxlength="16" required>
                </div>
                <button type="submit">Cadastrar</button>
            </form>
            <p style="margin: 11px;">Li e aceito os <a href="#">termos e condições</a></p>
            <a href="login.php">Já possui uma conta? Fazer Login!</a>
            <p style="margin: 1%;">*Para campos de carácter obrigatório</p>
        </div>
    </section>

    
    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/loongoka-logo.png" alt=""></a>
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
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <script>
        datePickerId.max = new Date().toISOString().split("T")[0];
    </script>

</body>
</html>