<?php
     require 'config.php';


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
    <title>Políticas de Privacidade</title>

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
    <link rel="stylesheet" href="css/buttons.css">
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
            <a href="#"><img src="img/loongoka.png" alt=""></a>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/lingua.png" alt="">
                <div>Português</div>
                <span class="arrow_carrot-down"></span>
            </div>
            <div class="header__top__right__auth">
                <a href="login.php"><i class="fa fa-user"></i>LODIN</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.php">INÍCIO</a></li>
                <li><a onclick="fazerLogin()">LIVROS</a></li>
                <li><a>SOBRE</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./nplataforma.php">A PLATAFORMA</a></li>
                        <li><a href="./ntermos.php">TERMOS DE USO</a></li>
                        <li><a href="./npoliticas.php">POLÍTICAS DE PRIVACIDADE</a></li>
                        <li><a href="./ncontactos.php">CONTACTOS</a></li>
                    </ul>
                </li>
                <li><a onclick="fazerLogin()">BLOG</a></li>
                <li><a href="#">Passatempos</a></li>
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
                                <div>Português</div>
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
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/loongoka.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./index.php">INÍCIO</a></li>
                            <li><a onclick="fazerLogin()">LIVROS</a></li>
                            <li><a>SOBRE</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./nplataforma.php">A PLATAFORMA</a></li>
                                    <li><a href="./ntermos.php">TERMOS DE USO</a></li>
                                    <li><a href="./npoliticas.php">POLÍTICAS DE PRIVACIDADE</a></li>
                                    <li><a href="./ncontactos.php">CONTACTOS</a></li>
                                </ul>
                            </li>
                            <li><a onclick="fazerLogin()">BLOG</a></li>
                            <li><a href="#">Passatempos</a></li>
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
   <section class="breadcrumb-section set-bg" data-setbg="img/termos.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2 style="color: #ff9300;">Políticas de Privacidade</h2>
                        <div class="breadcrumb__option">
                            <a style="color: #ff9300;" href="home.php">Início</a>
                            <span style="color: #ff9300;">Políticas de Privacidade</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- termos de uso -->
    <section style="margin-top: 5%;">
        <div class="container">
            <div>
                <h2><b>Políticas de Privacidade</b></h2><br>
            </div>
            <div class="row" style="flex-direction: column; width: 60%; text-align: justify;">
                <p>AO UTILIZAR O NOSSO SITE E/OU FORNECER QUAISQUER DADOS PESSOAIS, ESTÁ A PRESTAR O SEU CONSENTIMENTO EXPLÍCITO PARA QUE OS DADOS PESSOAIS QUE SUBMETEU POSSAM SER PROCESSADOS NOS TERMOS E PARA AS FINALIDADES DESCRITOS NA SEGUINTE POLÍTICA DE PRIVACIDADE E EM CONFORMIDADE COM AS LEIS E REGULAMENTOS EM VIGOR RELACIONADOS COM DADOS PESSOAIS.</p>
                <div class="d-flex" style="flex-direction:column;width: 50%;">
                    <a style="color: rgb(0,142,255);" href="#privacidade">RESPEITO PELA SUA PRIVACIDADE</a>
                    <a style="color: rgb(0,142,255)" href="#seguranca">SEGURANÇA DE DADOS E CONFIDENCIALIDADE</a>
                    <a style="color: rgb(0,142,255);" href="#menores"></i>MENORES</a>
                    <a style="color: rgb(0,142,255)" href="#notificacao">NOTIFICAÇÃO DE ALTERAÇÕES A ESTA POLÍTICA</a>
                    <a style="color: rgb(0,142,255)" href="#alteracoes">ALTERAÇÕES</a>
                </div>
            </div>
        </div>
    </section>
    
    <section id="privacidade">
        <div class="container">
            <div>
                <h2><b>RESPEITO PELA SUA PRIVACIDADE</b></h2><br>
            </div>
            <div class="row d-flex" style="flex-direction: column; width: 60%; text-align: justify;">
                <p>Estamos empenhados em proteger e respeitar a sua privacidade. Esta Política estabelece a base na qual são processados no nosso site quaisquer dados pessoais que obtemos de si ou que são fornecidos por si. Guardamos alguma informação básica quando visita o nosso site e reconhecemos a importância de mantermos essa informação segura e de o mantermos informado sobre o que faremos com essa informação. Talvez escolha fornecer dados que são considerados pessoais. O termo “dados pessoais”, conforme usado nesta Política, refere-se a determinada informação como o seu nome, endereço de e-mail, endereço, número de telefone ou qualquer outra informação que possa ser usada para o identificar.</p>
            </div>
        </div>
    </section>

    <section id="seguranca">
        <div class="container">
            <div style="width: 60%;">
                <h2><b>SEGURANÇA DE DADOS E CONFIDENCIALIDADE</b></h2><br>
            </div>
            <div class="row d-flex" style="flex-direction: column; width: 60%; text-align: justify;">
                <p>Levamos muito a sério a segurança dos seus dados pessoais. Usamos métodos atualizados de armazenamento de dados e de segurança para proteger a sua informação pessoal contra acesso sem permissão, uso impróprio, modificação sem permissão, destruição ilegal ou perda acidental. Todos os processadores de dados pessoais e terceiros contratados para processar dados pessoais estão obrigados a respeitar a confidencialidade da sua informação. Mantemos os seus dados pessoais apenas durante o tempo que for necessário para atingir o objetivo para o qual foram fornecidos ou para cumprir quaisquer requisitos legais de comunicação ou de conservação de documentos.</p>
            </div>
        </div>
    </section>

    <section id="menores">
        <div class="container">
            <div style="width: 60%;">
                <h2><b>MENORES</b></h2><br>
            </div>
            <div class="row d-flex" style="flex-direction: column; width: 60%; text-align: justify;">
                <p>Se for considerado menor de idade no país em que está a aceder ao nosso site, só poderá submeter os seus dados pessoais no site com o conhecimento dos seus pais ou tutor. Se for pai ou tutor e der o seu consentimento a um menor para submeter dados pessoais neste site, está a concordar com esta Política no que diz respeito à utilização feita pelo menor.</p>
            </div>
        </div>
    </section>

    <section id="notificacao">
        <div class="container">
            <div style="width: 60%;">
                <h2><b>NOTIFICAÇÃO DE ALTERAÇÕES A ESTA POLÍTICA</b></h2><br>
            </div>
            <div class="row d-flex" style="flex-direction: column; width: 60%; text-align: justify;">
                <p>Estamos continuamente a melhorar e a adicionar novas funcionalidades a este site e a todas as aplicações associadas, e a melhorar e aumentar os serviços existentes. Por causa destas mudanças constantes, assim como mudanças legais e relacionadas com tecnologia, a maneira como lidamos com dados mudará ocasionalmente. Quando for necessário alterar a nossa Política, publicaremos quaisquer mudanças nesta página para que esteja sempre atualizado sobre a informação que recolhemos e como a utilizamos.</p>
            </div>
        </div>
    </section>
    <!-- fim dos termos de uso -->`

    <!-- termos de uso -->
    <section id="alteracoes">
        <div class="container">
            <div>
                <h2><b>Alterações</b></h2><br>
            </div>
            <div class="row d-flex" style="flex-direction: column; width: 60%; text-align: justify;">
                <p>A LOONGOKA pode rever periodicamente os termos de utilização. Os termos atualizados passarão a vigorar no momento em que forem publicados no site. Por isso, visite regularmente esta página para estar sempre informado das mudanças mais recentes.</p>
            </div>
        </div>
    </section>
    <!-- fim dos termos de uso -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer__about">
                            <div class="footer__about__logo">
                                <a href="./index.php"><img src="img/loongoka-logo1.png" alt=""></a>
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
                                <li><a onclick="fazerLogin()">Livros</a></li>
                                <li><a href="nplataforma.php">Plataforma</a></li>
                                <li><a href="ntermos.php">Termos de uso</a></li>
                                <li><a href="npoliticas.php">Políticas de privacidade</a></li>
                                <li><a href="ncontactos.php">Contactos</a></li>
                            </ul>
                            <ul>
                                <li><a onclick="fazerLogin()">Blog</a></li>
                                <li><a href="ajogos.php">Passatempos</a></li>
                                <li><a onclick="fazerLogin()">Cadastrar-se</a></li>
                                <li><a onclick="fazerLogin()">Perfil</a></li>
                                <li><a href="login.php">Login</a></li>
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
                                    <script>document.write(new Date().getFullYear());</script> Todos os direitos
                                    reservados
                                    | Este Sistema foi desenvolvido por <b>Abel Canas</b> e <b>Santos Francisco</b>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->


        <!--Todos os modais-->
        <div class="modal fade" id="logar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Informação</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <i style="font-size: 6rem; color: #ff9300;" class="fa fa-info-circle" aria-hidden="true"></i>
                        <p>Para acessar essa página é necessário estar logado!</p>
                        <h4 style="color: #ff9300;">Quer fazer Login?</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="login.php"><button type="button"
                                style="border-color: #ff9300; background-color: #ff9300;"
                                class="btn btn-primary">Sim</button></a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Pesquisar-->
        <div class="modal fade" id="pesquisar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Informação</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <i style="font-size: 6rem; color: #ff9300;" class="fa fa-info-circle" aria-hidden="true"></i>
                        <p>Para pesquisar é necessário estar logado!</p>
                        <h4 style="color: #ff9300;">Quer fazer Login?</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="login.php"><button type="button"
                                style="border-color: #ff9300; background-color: #ff9300;"
                                class="btn btn-primary">Sim</button></a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Livro-->
        <div class="modal fade" id="lerlivro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Informação</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <i style="font-size: 6rem; color: #ff9300;" class="fa fa-info-circle" aria-hidden="true"></i>
                        <p>Para acessar este livro é necessário estar logado!</p>
                        <h4 style="color: #ff9300;">Quer fazer Login?</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="login.php"><button type="button"
                                style="border-color: #ff9300; background-color: #ff9300;"
                                class="btn btn-primary">Sim</button></a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                    </div>
                </div>
            </div>
        </div>


        <!--categorias-->
        <div class="modal fade" id="categoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Informação</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <i style="font-size: 6rem; color: #ff9300;" class="fa fa-info-circle" aria-hidden="true"></i>
                        <p>Para acessar os livros desta categoria é necessário estar logado!</p>
                        <h4 style="color: #ff9300;">Quer fazer Login?</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="login.php"><button type="button"
                                style="border-color: #ff9300; background-color: #ff9300;"
                                class="btn btn-primary">Sim</button></a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                    </div>
                </div>
            </div>
        </div>

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.nice-select.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/jquery.slicknav.js"></script>
        <script src="js/mixitup.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/adicionais.js"></script>
    

</body>
</html>