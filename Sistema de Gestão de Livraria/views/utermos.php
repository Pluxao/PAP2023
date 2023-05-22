<?php
     require 'config.php';
     require 'verificar.php';
     require 'user.php';
 
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
    <title>Termos de Uso</title>

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
                <li class="active"><a href="#">SOBRE</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./uplataforma.php">A PLATAFORMA</a></li>
                        <li><a href="./utermos.php">TERMOS DE USO</a></li>
                        <li><a href="./upoliticas.php">POLÍTICAS DE PRIVACIDADE</a></li>
                        <li><a href="./ucontactos.php">CONTACTOS</a></li>
                    </ul>
                </li>
                <li><a href="./ublog.php">BLOG</a></li>
                <li><a href="jogos.php">JOGOS</a></li>
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
                        <a href="./uhome.php"><img src="img/loongoka.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="./uhome.php">INÍCIO</a></li>
                            <li><a href="./utodoslivros.php">LIVROS</a></li>
                            <li class="active"><a href="#">SOBRE</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./uplataforma.php">A PLATAFORMA</a></li>
                                    <li><a href="./utermos.php">TERMOS DE USO</a></li>
                                    <li><a href="./upoliticas.php">POLÍTICAS DE PRIVACIDADE</a></li>
                                    <li><a href="./ucontactos.php">CONTACTOS</a></li>
                                </ul>
                            </li>
                            <li><a href="./ublog.php">BLOG</a></li>
                            <li><a href="./jogos.php">PASSATEMPOS</a></li>
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
                        <h2 style="color: #ff9300;">Termos de Uso</h2>
                        <div class="breadcrumb__option">
                            <a style="color: #ff9300;" href="home.php">Início</a>
                            <span style="color: #ff9300;">Termos de Uso</span>
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
                <h2><b>Sejam bem-vindos!</b></h2><br>
            </div>
            <div class="row" style="flex-direction: column; width: 60%; text-align: justify;">
                <p>A nossa livraria é, portanto, uma organização cujo objetivo é prover e distribuir livros digitais. O nosso papel é disponibilizar livros digitais, dando a oportunidade aos nossos usuários de terem acesso a esses mesmos livros para poderem ter acesso a conteúdos lecionados no nosso país e também para poderem ler livros do seu interesse.</p>
                <div class="d-flex" style="flex-direction:column;width: 50%;">
                    <a style="color: rgb(0,142,255);" href="#copyright">Copyright</a>
                    <a style="color: rgb(0,142,255)" href="#termos">Termos de uso e licença de utilização do site</a>
                    <a style="color: rgb(0,142,255);" href="#garantias"></i>Exclusão de garantias e limite de responsabilidade</a>
                    <a style="color: rgb(0,142,255)" href="#violacao">Violação dos termos de utilização</a>
                    <a style="color: rgb(0,142,255)" href="#alteracoes">Alterações</a>
                </div>
            </div>
        </div>
    </section>
    
    <section id="copyright">
        <div class="container">
            <div>
                <h2><b>Copyright</b></h2><br>
            </div>
            <div class="row d-flex" style="flex-direction: column; width: 60%; text-align: justify;">
                <p>© 2023 LOONGOKA. Todos os direitos reservados.</p>
                <p>Esta aplicação Web é publicado e mantido pela LOONGOKA. Todos os direitos reservados.</p>
            </div>
        </div>
    </section>

    <section id="termos">
        <div class="container">
            <div>
                <h2><b>Termos de uso e licença de utilização do site</b></h2><br>
            </div>
            <div class="row d-flex" style="flex-direction: column; width: 60%; text-align: justify;">
                <p>A utilização deste site está sujeita a estes termos de utilização. Ao usar o site, você declara que concorda inteiramente com as condições descritas aqui, bem como com qualquer outro termo de utilização (no plural, “termos de utilização”) estabelecido neste site. Se não concorda com todos os termos de utilização ou com qualquer parte deles, não use este site.</p>
                <h4>Como é que este site pode ser usado? Em concordância com as restrições descritas abaixo, você pode:</h4>
                <p class="container"><i style="font-size: 10px;" class="fa fa-circle" aria-hidden="true"></i>&nbsp;Visualizar, descarregar e ler livros que se encontram neste sistema bem como usar textos deste site para uso pessoal e não comercial.</p>
                <p class="container"><i style="font-size: 10px;" class="fa fa-circle" aria-hidden="true"></i>&nbsp;Partilhar links ou cópias eletrónicas de livros estão disponíveis para serem descarregados deste sistema.</p>
                <h4>Não pode:</h4>
                <p class="container"><i style="font-size: 10px;" class="fa fa-circle" aria-hidden="true"></i>&nbsp;Distribuir fotografias, imagens, livros eletrónicas e textos deste sistema web como parte de qualquer software ou aplicação (o que inclui guardar esses conteúdos num servidor que é usado por um software ou aplicação).</p>
                <p class="container"><i style="font-size: 10px;" class="fa fa-circle" aria-hidden="true"></i>&nbsp;Reproduzir, duplicar, copiar, distribuir ou usar de outro modo fotografias, imagens, livros eletrónicas e textos deste sistema web para fins comerciais ou em troca de dinheiro (mesmo que não haja lucros envolvidos).</p>
                <p class="container"><i style="font-size: 10px;" class="fa fa-circle" aria-hidden="true"></i>&nbsp;Criar, com o objetivo de distribuir, qualquer software, aplicação, ferramenta ou técnica que sirva especificamente para recolher, copiar, descarregar, extrair ou rastrear dados, HTML, imagens ou textos deste sistema web. (Isso não proíbe a distribuição gratuita, sem fins comerciais, de aplicações projetadas para descarregar ficheiros eletrónicos em PDF das áreas públicas deste sistema.)</p>
                <p class="container"><i style="font-size: 10px;" class="fa fa-circle" aria-hidden="true"></i>&nbsp;Usar indevidamente este site ou os seus serviços. Por exemplo, interferir no funcionamento do site ou aceder ao site e aos seus serviços por métodos que não sejam os claramente fornecidos</p>
                <p class="container"><i style="font-size: 10px;" class="fa fa-circle" aria-hidden="true"></i>&nbsp;Usar este sistema de um modo que cause, ou possa causar, danos ao site ou prejudicar a disponibilidade e a acessibilidade a ele. Também não deve ser usado de modo ilícito, ilegal, fraudulento ou prejudicial, ou para atividades e propósitos de caráter ilícito, ilegal, fraudulento ou prejudicial.</p>
            </div>
        </div>
    </section>

    <section id="garantias">
        <div class="container">
            <div style="width: 60%;">
                <h2><b>Exclusão de garantias e limite de responsabilidade</b></h2><br>
            </div>
            <div class="row d-flex" style="flex-direction: column; width: 60%; text-align: justify;">
                <p>A LOONGOKA não garante que o site esteja livre de vírus ou outros componentes nocivos. A LOONGOKA não se responsabilizará por danos de qualquer tipo que surjam pelo uso de qualquer serviço ou por quaisquer informações, conteúdos, materiais ou outros serviços disponíveis nesta aplicação, incluindo, mas não se limitando a danos diretos, indiretos, acidentais, punitivos e outras consequências (incluindo danos monetários).</p>
            </div>
        </div>
    </section>

    <section id="violacao">
        <div class="container">
            <div>
                <h2><b>Violação dos termos de utilização</b></h2><br>
            </div>
            <div class="row d-flex" style="flex-direction: column; width: 60%; text-align: justify;">
                <p>Sem nenhum prejuízo aos demais direitos que a LOONGOKA possui sob estes termos de uso, se você violar qualquer uma das condições declaradas aqui, a LOONGOKA reserva-se o direito de tomar as medidas que achar necessárias. Entre elas, suspender o seu acesso ao sistema, proibi-lo de aceder ao sistema, contactar o seu provedor de Internet para que ele bloqueie o seu acesso ao site e/ou tomar providências jurídicas contra si.</p>
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
                            <a href="./uhome.php"><img src="img/loongoka-logo.png" alt=""></a>
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
                        Copyright &copy;Todos os direitos reservados | Este Sistema foi feito<i class="fa fa-heart" aria-hidden="true"></i> por <a href="https:loongoka.com" target="_blank">Abel Canas </a>e<a href="#" target="_blank"> Santos Francisco</a></p></div>
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