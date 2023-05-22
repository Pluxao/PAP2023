<?php
require 'config.php';
require 'verificar.php';
require 'admin.php';

$categorias = [];
$cat = $pdo->query("SELECT *FROM livros_categorias");
if ($cat->rowCount() > 0) {
    $categorias = $cat->fetchALL(PDO::FETCH_ASSOC);
}

$destaques = [];
$destaques = $pdo->query("SELECT *FROM livros, livros_categorias, usuarios WHERE livros.cod_categoria = livros_categorias.id_categoria AND livros.cadastrador = usuarios.id ORDER BY cod DESC limit 6");
if ($destaques->rowCount() > 0) {
    $desta = $destaques->fetchALL(PDO::FETCH_ASSOC);
}

if (!empty($_GET['search'])) {
    $livros = [];
    $data = $_GET['search'];
    $liv = $pdo->query("SELECT *FROM livros, livros_categorias, usuarios WHERE livros.cod_categoria = livros_categorias.id_categoria AND livros.cadastrador = usuarios.id AND (titulo LIKE '%$data%' or editora LIKE '%$data%' or classe LIKE '%$data%' or disponibilidade LIKE '%$data%' or preco LIKE '%$data%' or nome_categoria LIKE '%$data%') ORDER BY cod DESC limit 6");
    if ($liv->rowCount() > 0) {
        $livros = $liv->fetchALL(PDO::FETCH_ASSOC);
    } else {
        echo "<script>alert('Nenhum Resultado encontado')</script>";
        echo "<script>window.location = 'home.php'</script>";
    }
} else {
    $livros = [];
    $liv = $pdo->query("SELECT *FROM livros, livros_categorias, usuarios WHERE livros.cod_categoria = livros_categorias.id_categoria AND livros.cadastrador = usuarios.id ORDER BY cod DESC limit 8");
    if ($liv->rowCount() > 0) {
        $livros = $liv->fetchALL(PDO::FETCH_ASSOC);
    }
}


$listapost = [];
$posts = $pdo->query("SELECT *FROM posts ORDER BY id_post DESC limit 3");
if ($posts->rowCount() > 0) {
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
    <link rel="icon" href="./img/wind.png" type="image/x-icon" />
    <title>Início</title>

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

    <style>
        .conteudo {
            border: 1px solid #ccc;
            padding: 10px;
            position: relative;
        }

        .oculto {
            display: none;
        }

        #ic {
            font-size: 30px;
            position: absolute;
            top: 5px;
            right: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body id="inicio">
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
                <li class="active"><a href="home.php">INÍCIO</a></li>
                <li><a href="./atodoslivros.php">LIVROS</a></li>
                <li><a href="#">SOBRE</a>
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
                                <a href="painel/views/meuperfil.php" style="color:black;"><i
                                        class="fa fa-user"></i>&nbsp;&nbsp;Meu Perfil</a>
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
                            <li class="active"><a href="home.php">INÍCIO</a></li>
                            <li><a href="./atodoslivros.php">LIVROS</a></li>
                            <li><a href="#">SOBRE</a>
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

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Todas categorias</span>
                        </div>
                        <ul>
                            <li><a href="atodoslivros.php">Todas Categorias</a></li>
                            <?php foreach ($categorias as $listagem): ?>
                                <li><a href="acategorias.php?id_categoria=<?= $listagem['id_categoria']; ?>"><?php echo $listagem['nome_categoria']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <div>
                                <div style="width: 30%;
                                        float: left;ont-size: 16px;color: #1c1c1c;ont-weight: 700;padding-left: 18px;padding-top: 11px; position: relative;"
                                    class="hero__search__categories">
                                    <b>Todas categorias</b>
                                    <span style="position: absolute;right: 14px;top: 14px;"
                                        class="arrow_carrot-down"></span>
                                </div>
                                <input
                                    style="width: 70%;border: none;height: 48px;font-size: 16px;color: #b2b2b2;padding-left: 20px;"
                                    type="search" id="pesquisar_l" placeholder="O que você procura?">
                                <button style="position: absolute;right: 0;top: -1px;height: 50px;"
                                    onclick="searchLivros()" class="site-btn">PESQUISAR</button>
                            </div>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+244 939.248.383</h5>
                                <span>Atendimento 24/7 horas</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="img/hero/livraria.jpg">
                        <div class="hero__text">
                            <span>A LoongoKa é para si</span>
                            <h2>Literatura Nacional<br>e Internacional</h2>
                            <a href="#livrosl" class="primary-btn">Ver livros</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- text -->
    <div class="container" id="flex">
        <div class="ca">
            <i class="fa fa-book" id="icone" aria-hidden="true"></i>
            <h4 id="pontos"><b>Livros para si</b></h4>
        </div>
        <div class="ca">
            <i class="fa fa-globe" id="icone" aria-hidden="true"></i>
            <h4 id="pontos"><b>Nossa Literatura</b></h4>
        </div>
        <div class="ca">
            <i class="fa fa-hand-o-up" id="icone" aria-hidden="true"></i>
            <h4 id="pontos"><b>Tudo em um Click</b></h4>
        </div>
        <div class="ca">
            <i class="fa fa-volume-control-phone" id="icone" aria-hidden="true"></i>
            <h4 id="pontos"><b>+244 939.248.383</b></h4>
        </div>
    </div>
    <!-- final do text -->

    <!-- Categories Section Begin -->
    <section style="margin-top: 5%;">
        <div class="container">
            <div class="section-title">
                <h2>Destaques</h2>
            </div>
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <?php foreach ($desta as $destaque): ?>
                        <div class="col-lg-3">
                            <div style="border: 1px solid; border-radius: 4px;" class="categories__item set-bg"
                                data-setbg="painel/views/capas_upload/<?php echo $destaque['img_livro'] ?>">
                                <h5 class="card-title"><a
                                        href="adetalhelivro.php?cod=<?= $destaque['cod']; ?>&id_categoria=<?= $destaque['id_categoria']; ?>"><?php echo $destaque['titulo'] ?></a></h5>
                                <h4><a style="border-radius: 4px;" class="primary-btn"
                                        href="adetalhelivro.php?cod=<?= $destaque['cod']; ?>&id_categoria=<?= $destaque['id_categoria']; ?>"
                                        class="btn dtl"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Detalhes</a></h4>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Section Begin -->
    <section class="featured spad" id="livrosl">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>LIVROS - LOONGOKA</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php foreach ($livros as $livraria): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix">
                        <div class="featured__item">
                            <div style="border: 1px solid;" class="featured__item__pic set-bg"
                                data-setbg="painel/views/capas_upload/<?php echo $livraria['img_livro'] ?>">
                                <ul class="featured__item__pic__hover">
                                    <?php
                                    if ($livraria['disponibilidade'] == 'Grátis') {
                                        echo '<li title="Ler livro"><a href="alerlivro.php?cod=' . $livraria["cod"] . '" target="_blank"><i class="fa fa-book" aria-hidden="true"></i></a></li>';
                                        echo '<li><a href="adetalhelivro.php?cod=' .$livraria['cod'] . '&id_categoria='. $livraria["id_categoria"].'"><i class="fa fa-cloud-download"></i></a></li>';
                                    } else {
                                        echo '<li title="A leitura online não está disponível para este livro"><a><i class="fa fa-times-circle" aria-hidden="true"></i></a></li>';
                                        echo '<li><a href="acarrinho.php?livro='.$livraria['livro'].'&cod='.$livraria['cod'].'&id_categoria='.$livraria["id_categoria"].'"><i class="fa fa-money"></i></a></li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <?php
                                if ($livraria['disponibilidade'] == 'Grátis') {
                                    echo '<h5 class="card-title text-success">
                                    Grátis
                                </h5>';
                                } else {
                                    echo '<h5 class="card-title text-danger">
                                    Pago
                                </h5>';

                                }
                                ?>
                                <h5 class="card-title">
                                    <?php echo number_format($livraria['preco'], 2, ",", "."); ?> AOA
                                </h5>
                                <h6>
                                    <?php echo $livraria['titulo'] ?>
                                </h6>
                                <h6 class="primary-btn">
                                    <?php echo $livraria['edicao'] ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Publicações do Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($listapost as $postagem): ?>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img style="height: 200px; width: 266px;"
                                    src="painel/views/post_upload/<?php echo $postagem['img_post'] ?>" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i>&nbsp;&nbsp;
                                        <?= $postagem['data_post']; ?>
                                    </li>
                                </ul>
                                <h5><a href="#">
                                        <?= $postagem['titulo_post']; ?>
                                    </a></h5>
                                <p style="text-align:justify;">
                                    <?= $postagem['post']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section style="margin-top: 5%;">
        <div class="container">
            <div class="section-title">
                <h2>Perguntas frequêntes</h2>
            </div>
            <div class="row">
                <div class="conteudo col-lg-12 col-md-6 col-sm-6">
                    <h3>Como posso criar uma conta na LOONGOKA?</h3><i id="ic" class="fa fa-angle-down" onclick="mostrarConteudo(this)"></i>
                    <div class="oculto">
                        <p>Para criar uma conta na loongoka é muito simplês, é só seguir os passos a baixo:</p>
                        <p>1 - Acesse o Site pesquisando na Internet por LoongoKa;</p>
                        <p>2 - Na página principal, acesse a página de login;</p>
                        <p>3 - Na página de Login acesse  a página de cadastro</p>
                        <p>4 - Na página de cadastro, prencha todos os campos solicitados para criar a sua conta</p>
                    </div>
                </div>
                <div class="conteudo col-lg-12 col-md-6 col-sm-6">
                    <h3>O que é a LOONGOKA?</h3><i id="ic" class="fa fa-angle-down" onclick="mostrarConteudo(this)"></i>
                    <div class="oculto">
                        <p>Somos a LOONGOKA, um ambiente virtual destinada ao auxílio dos alunos, jovens e crianças na obtenção de materiais didácticos para a aprendizagem dos conteúdos programáticos do currículo do Ensino Primário e do Iº. Ciclo do Ensino Secundário bem como também diversos livros que servem de ajuda no ambito académico e investigativo.</p>
                    </div>
                </div>
            </div>
        </div>
    </section><br>
    <!-- Blog Section End -->


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
    <script>
        var search = document.getElementById('pesquisar_l');

        search.addEventListener("keydown", function (event) {
            if (event.key === "Enter") {
                searchLivros();
            }
        });

        function searchLivros() {
            window.location = "home.php?search=" + search.value;
        } function mostrarConteudo(elemento) {
            var divConteudo = elemento.parentNode;
            var conteudoOculto = divConteudo.querySelector('.oculto');
            if (conteudoOculto.style.display === "none") {
                conteudoOculto.style.display = "block";
                elemento.classList.remove("fa-angle-down");
                elemento.classList.add("fa-angle-up");
            } else {
                conteudoOculto.style.display = "none";
                elemento.classList.remove("fa-angle-up");
                elemento.classList.add("fa-angle-down");
            }
        }

    </script>


</body>

</html>