<?php
       session_start();
       require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./img/wind.png" type="image/x-icon"/>
    
    <title>LOGIN - LOONGOKA</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;400;700&display=swap');
    </style>


    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="../views/css/log.css">

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
                <a href="login.php"><i class="fa fa-user"></i>CADASTRAR</a>
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
                                <a href="cadastrar.php"><i class="fa fa-user"></i>CADASTRAR</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">

<style>
    body {
	background-color: #f2f2f2;
}

.login {
	margin: 50px auto;
	width: 400px;
	background-color: #fff;
	padding: 40px;
	border-radius: 5px;
	box-shadow: 0 0 10px rgba(0,0,0,0.1);
	text-align: center;
}

.login h1 {
	margin-bottom: 20px;
}

.login label {
	display: block;
	margin-bottom: 10px;
	color: #888;
}

.login input[type="text"], .login input[type="password"] {
	padding: 10px;
	width: 100%;
	border: none;
	background-color: #f2f2f2;
	border-radius: 5px;
	margin-bottom: 20px;
}

.login button.btn {
	background-color: #ff9300;
	color: #fff;
	padding: 10px;
	width: 100%;
	border: none;
	border-radius: 5px;
	cursor: pointer;
	margin-bottom: 20px;
}

.login button.btn:hover {
	background-color: #ff8300;
}

.login .links {
	display: flex;
	justify-content: space-between;
	margin-top: 20px;
}

.login .links a {
	color: #4CAF50;
	text-decoration: none;
	font-size: 14px;
}

.login .links a:hover {
	text-decoration: underline;
}

</style>
</head>
<body>
	<div class="login">
        <center><img styele="width: 179px;" src="img/itel.png" alt="Logotipo do Itel"></center>
        <p>Bem-vindo de volta,</p>
        <h4>Acesse sua conta</h>
		<form>
			<label for="username"><i class="fas fa-user"></i></label>
			<input type="text" id="username" placeholder="Usuário">

			<label for="password"><i class="fas fa-lock"></i></label>
			<input type="password" id="password" placeholder="Senha">

			<button type="submit" class="btn">Entrar</button>
		</form>

		<div class="links">
			<a href="#">Esqueceu a senha?</a>
			<a href="#">Criar conta</a>
		</div>
	</div>

    
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
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
  
</body>
</html>
